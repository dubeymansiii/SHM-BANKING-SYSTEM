

<!DOCTYPE html>
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
<style>
    .card{
    justify-content: center;
    align-items: center;
    padding: 4rem;
    width: 60%;
    float: center;
    background: #fff;
    box-shadow: 0 .5rem 2rem rgba(0, 0, 0, 0.1);
    border-radius: 1rem;
    border:none;
}
@media(max-width:450px){
  .card {
    width: 100%;

  }
}
  label{
    font-size: 1.5rem;
    font-weight: 800;
    color: #012970;
    margin-top: 1rem;
    flex-shrink:1;
    
   
}
  input{
    font-size: 1rem;
    font-weight: 600;
    padding: 0.2rem;
    font-size: 1.7rem;
    color: #333;
    text-transform: capitalize;
    border: .1rem solid rgba(0, 0, 0, 0.3);
    box-shadow: 0 0.5rem 0.5rem 0.2rem rgba(0, 0, 0, 0.1);
    border-radius: .5rem;
    width: 20rem;
    height: 4rem;
    margin: 0 1rem 0 1rem;
    flex-shrink:1;
    flex-grow:1;
}

</style>

  
</head>
<body>
<?php
include 'navbar.php';
?> 

    <div class="user-container">
        <!-- <h1> <i class="fas fa-user"></i> -->
       <h1 style="color:black; margin-top:8rem; font-weight:800; text-align:center; font-size:5rem;"><i class="fas fa-user" ></i> New User</h1>
    </div>
    <section class="contact registration" id="contact">
   
    
        
        <form action="addnewuser.php" method="post">
        <div class="card mx-auto">
        <label>UserName :<br>
                <input type="text" name="username" required>
</label>   
                <br><br>
                <label>Email :<br>
                <input class="input" type="text" name="useremail" required>
</label> 

<br><br>
<label>Opening Account Balance :<br>
                <input type="number" name="openingbalance" required>
</label>  
<br><br>  
                <div>

               <button class="btn" name="submit" type="submit" id="myBtn"><span>Add User</span>
                <i class="fas fa-chevron-right"></i></button>
                

            
        
            </div>

    </div>
</form>
</section>
<br><br><br>

<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $Name=$_POST['username'];
   
    $Email=$_POST['useremail'];
    echo $Email;
    $Balance=$_POST['openingbalance'];
    echo $Balance;
   $sql= "INSERT INTO users(`name`, `email`, `balance`) VALUES ('$Name','$Email','$Balance')";
  $query=mysqli_query($conn,$sql);
  if($query){
    echo "<script> alert('User Added Successfully!');
window.location='users.php';
</script>";                 
}



}
?>

               
<?php
include 'footer.php';
?>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>

</body>
</html>