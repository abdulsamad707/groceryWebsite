<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Grocery Website Design Tutorial</title>
    <?php include "function.php";?>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo rand()+time();?>">

</head>
<body>
    
<!-- header section starts  -->


<header class="header">                   

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> grocoery </a>

    <nav class="navbar">
    <?php   $fullPATTH;   $WEBBASEPATH; ?>
        <a href="index.php">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#categories">categories</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
            
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
          <div id="Shopping-container">
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-1.png" alt="">
            <div class="content">
                <h3>watermelon</h3>
                <span class="price"> Rs 180/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-2.png" alt="">
            <div class="content">
                <h3>onion</h3>
                <span class="price"> Rs 59/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-3.png" alt="">
            <div class="content">
                <h3>chicken</h3>
                <span class="price"> Rs 499/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>


     </div>
        <div class="total"> total : $19.69/- </div>
        <a href="http://localhost/grocery/next_step.php" class="btn">Proceed </a>
    </div>

    <form action="" class="login-form" id="LoginFORM">
        <h3>login now</h3>
        <input type="email" name="email" id="userEmail" placeholder="your email" class="box">
        <input type="password" id="userPassword" name="password" placeholder="your password" class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="#" class="reg-form">create now</a></p>
        <input type="submit" value="login now" class="btn" id="loginBTN">
    </form>
    <form action="" class="login-form regForm" id='userregis'>
        <h3> Register Now</h3>
        <div id="Error"><span><span id="ErrorMsg"class="errorHeading">Please Enter Correct Email Address</span></span> </div>
        <input type="email" id="RegisterEmail" placeholder="your email" name="email" class="box">
        <input type="text" id="RegisterUserName"  placeholder="your user name" name="username" class="box">
        <input type="password" id="UserPassword" name="password" placeholder="your password" class="box">
        <input type="text" id="MobileUser" name="mobile" placeholder="your mobile" class="box">
       
        <input type="submit" value="Register now" id="register" class="btn" >
    </form>
  
</header>
