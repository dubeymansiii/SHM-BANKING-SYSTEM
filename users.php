<?php

?>
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
table{
    font-size: 1.5rem;
    margin-top: 6rem;
    background: #fff;
}

thead th{
    background: #012970;
    font-family: "Roboto", sans-serif;
    color: #fff;
    letter-spacing: 0.1rem;
}
tbody td{
    font-family: "Roboto", sans-serif;
    text-transform: none;
    font-size: 1.8rem;
    font-weight: 500;
    text-align:center;
    
}
.btn{
    margin-top: 0;
    line-height: 0;
    padding: 1.6rem 3rem;
    border-radius: 0.2em;
    transition: 0.2s;
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    background: #4f15d8;
    }
.btn:hover{
    background: #7b47f5;
    color: #fff;
    transform: scale(1.1);
    transition: 0.2s;
    
.heading{
    text-align:center;
    margin-top:12rem;
    
}
.heading h1{
    color:black;
    font-size:5rem;
    font-weight:800;
    text-decoration:underline;
}
footer{
    margin-top:5rem;
}
</style>
</head>

<body>
<?php
   

  include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);

?>

<?php
  include 'navbar.php';
  
?>
<div class="heading">
    <h1>
    Users List</h1>
</div>

<div class="container">
<form action="users.php" method="post" >
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-3">ID</th>
                            <th scope="col" class="text-center py-3">Name</th>
                            <th scope="col" class="text-center py-3">E - Mail</th>
                            <th scope="col" class="text-center py-3">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                <?php 
               $idofuser=0;
                    while($rows=mysqli_fetch_assoc($result)){
                        $idofuser=$idofuser+1;
                ?>
                    <tr>
                        <td class="py-4 text-center" name="id"><?php echo $idofuser ?></td>
                        <td class="py-3 text-left"><?php echo $rows['name']?></td>
                        <td class="py-3 text-left"><?php echo $rows['email']?></td>
                        <td class="py-3 text-center">&#8377; <?php echo $rows['balance']?></td>
                        <td class="py-3 text-center">
                      
                       
                    </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
                
            </div>
        </div>
    </div> 
    
    </form>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){


$id=$_POST['id'];
$sql = "DELETE FROM users WHERE id=$id";
$query=mysqli_query($conn,$sql);
  if($query){
    echo "<script> alert('User Added Successfully!');
window.location='addnewuser.php';
</script>";                 
}
}



?>

  <?php
  include 'config.php';
  if(isset($_GET['delete']))  {
      $idofuser=$_GET['delete'];
      $delete=true;
      $sql="DELETE FROM `users` WHERE `id` =$idofuser";
      $result = mysqli_query($conn, $sql);

  }       
  ?>     
<footer>
<?php

include 'footer.php';
?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script type="text/javascript">
deletes=document.getElementsByClassName('delete');
Array.from(deletes).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        console.log("delete", );
        idofuser=e.target.id.substr(0,);
        if(confirm("Are you sure?")){
            
            window.location=`users.php?delete=${idofuser}`;
         
        }
        else{
            console.log("No");
        }
    })
})

                </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>