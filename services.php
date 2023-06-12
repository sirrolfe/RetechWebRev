<?php
    session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php">Home</a>
        <a href="services.php">Services</a>
        <a href="profile.php">Profile</a>
        <a href="aboutus.php">About Us</a>
        <a href="logout.php" class="logout">Logout</a> 
    </div>

    <div class="topnav">
        <div class="left">
            <a href="javascript:void(0);" class="icon" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </a>
            <img src="img\screenshot--72--removebg-2-1@2x.png" class="logo" alt="Company Logo"> 
            <div class="company-name">ReTech</div>
        </div>
    </div>

    <div id="myOverlay" class="overlay"></div>

    <div class="container">
    <h1>Our Services</h1>
    <div class="options">
        <a href="donateform.php" class="option donate">
            <img src="img\recycle.png" alt="Recycle Logo">
            <span>Donate E-Wastes</span>
        </a>
        <a href="sell.php" class="option sell">
            <img src="img\shopping-cart.png" alt="Shopping Cart Logo">
            <span>Sell E-Wastes</span>
        </a>
      </div>
    </div>

    <script src="services.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>

