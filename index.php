<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="
    css/style.css">
    <title>SHM Bank | Basic Banking System</title>
</head>
<body>
   <!-- Navbar start -->
    <?php
     include 'navbar.php';
    ?>
    <!-- Navbar ends -->

    <!-- Hero section starts -->
    <section class="home" id="home" style="flex-wrap:wrap;">
        <div class="home-text">
            <h3>Welcome to SHM Banking System.</h3>
            <p>SHM banking-The users favorite bank. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, inventore.

            </p>
            <a href="addnewuser.php" class="btn"><button>Add User
                <i class="fas fa-arrow-circle-right"></i></button></a>
        </div>
        <div class="image">
            <img src="img/hero.png" alt="">
        </div>
    </section>
    <!-- Hero section ends -->

     <!-- Services section starts -->
    <section class="services" id="services">
    <h1> Our Banking Features</h1>
    <div class="box-container">
        <div class="box">
            <img src="img/user.png">
            <h3>Users</h3>
            <a href="users.php" class="btn"><button>View Users<i class="fas fa-chevron-right"></i></button></a>
            </div>
        <div class="box box-2">
            <img src="img/tranasction history.png" class="block-2">
            <h3>Transaction History</h3>
            <a href="history.php" class="btn"><button>Transaction History <i class="fas fa-chevron-right"></i></button></a>
        </div>

        <div class="box">
            <img src="img/money transfer.png">
            <h3>Transactions</h3>
            <a href="transfer.php" class="btn"><button>Transfer Money<i class="fas fa-chevron-right"></i></button></a>
        </div>
    </div>
</section>
<!-- Services/Features section ends -->

<!-- Contact section -->
<section class="contact" id="contact">
    <h1>Contact Us </h1>
    <div class="row">
        <div class="image">
            <img src="img/contacts.png" alt="" >
        </div>
        <form action="">
            <div class="input">
                <input type="text" placeholder="name" required>
                <input type="email" placeholder="email">
                <input type="number" placeholder="phone">
            </div>
            <textarea placeholder="message" cols="40" rows="8"></textarea>
            <a href="#" class="btn"><button>Submit
                <i class="fa fa-paper-plane"></i>
</button>
            </a>
</form>
    </div>
</section>
<!-- Contact form ended -->

<!-- Footer started -->
<?php
include 'footer.php';
?>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>

</body>
</html>