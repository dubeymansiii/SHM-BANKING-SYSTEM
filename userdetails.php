<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Sorry! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
                $note="<div class='alert alert-success'>successfully transaction done</div>";
                if($query){
                    echo "<script> alert('Transaction Successful!');
                window.location='history.php';
                </script>";                 
                }
                
                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
.container{
    height:80vh;
}
label{
    font-size: 2.5rem;
    font-weight: 800;
    color: #012970;
    margin-top: 1rem;
}
input{
    font-size: 1.5rem;
    font-weight: 600;
    padding: 0.2rem;
    font-size: 1.7rem;
    color: #333;
    text-transform: capitalize;
    border: .1rem solid rgba(0, 0, 0, 0.3);
    box-shadow: 0 0.5rem 0.5rem 0.2rem rgba(0, 0, 0, 0.1);
    border-radius: .5rem;
    width: 100%;
    height: 3rem;
    margin: 0 1rem 0 1rem;
}
.btn-2{
    margin-left:2rem;
}

.card select{
    font-size: 1.5rem;
    font-weight: 600;
    width: 100%;
    margin: 0 1rem 0 1rem;
    height: 6rem;
    border: .1rem solid rgba(0, 0, 0, 0.3);
    box-shadow: 0 0.5rem 0.5rem 0.2rem rgba(0, 0, 0, 0.1);
    border-radius: .5rem;
}
.btn {
  margin-top: 3rem;
  line-height: 0;
  padding: 1.4rem 2.5rem;
  border-radius: 0.5em;
  transition: 0.5s;
  color: #fff;
  float: left;
  background:  rgb(17, 104, 138);
  box-shadow: 0px 5px 30px rgba(65, 84, 241, 0.4);
  flex-shrink:1;
  flex-grow:1;
}
.btn span {
  font-family: "Nunito", sans-serif;
  font-weight: 700;
  font-size: 1.5rem;
  flex-shrink:1;
  flex-grow:1;
  line-height:1rem;
  line-height:1rem;
}

.btn i {
  margin-left: 0.3rem;
  font-size: 1.3rem;
  transition: 0.3s;
  flex-grow:1;
  flex-shrink:1;

}
.btn-2 span{
    font-size:1rem;
}
.btn-2 span i{
    font-size:1.5rem;
}
.btn:hover i {
  transform: translate(5px);
}
.btn:hover {
  background: rgb(17, 94, 138);;
}
button{
    margin-bottom:3rem;
    flex-shrink:1;
    flex-grow:1;
}
.card{
    justify-content: center;
    align-items: center;
    padding: 4rem;
  
    width: 40%;
    float: center;
    background: #fff;
    box-shadow: 0 .5rem 2rem rgba(0, 0, 0, 0.1);
    border-radius: 1rem;
    border:none;
}
@media(max-width:710px){
  .card {
    width: 100%;
  }

}
@media (max-width:428px) {
    .btn{
      margin-top:0rem;
  }
  .btn-2{
      margin-left:0rem;
  }
  .btn-2 span{
      font-size:0.9rem;
  }
    
}
</style>
  </head>
  <body>
    <!-- Navbar -->
  <?php
  include 'navbar.php';
  ?>
<!-- End Navbar -->

  <!-- Table -->
  <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <!--  -->
        </div>
        <br><br><br>
        <div class="card mx-auto">
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
        <label>Amount :</label>
                <input type="number" name="amount" required>   
                <br><br>
                <div>
               <button class="btn" name="submit" type="submit" id="myBtn"><span>Transfer</span>
                <i class="fa fa-paper-plane"></i></button>
                <a href="users.php">
                <button class="btn btn-2"  id="myBtn" ><span>Transaction History</span>
                <i class="fas fa-chevron-right"></i></button></a>

            </div>
        </form>
    </div>
            </div>

<br> <br><br><br><br>

    <?php
    include 'footer.php';
    ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>