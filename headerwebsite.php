<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Complete Responsive Grocery Website Design Tutorial</title>
    <?php include 'function.php';?>
    <link rel='stylesheet' href='https://unpkg.com/swiper@7.4.1/swiper-bundle.css' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <!-- font awesome cdn link  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>

    <!-- custom css file link  -->
    <link rel='stylesheet' href='css/style.css?v=<?php echo rand()+time();?>'>
<!--

https://unpkg.com/swiper@7.4.1/swiper-bundle.css
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
-->
<link rel='stylesheet' href='css/bootstrap.css?v=<?php echo rand()+time();?>'>
    </head>
<body>
    
<!-- header section starts  -->

<script>
    function redirect(link){
        window.location.href=link;
    }


</script>
<header class='header'>                   

    <a href='#' class='logo'> <i class='fas fa-shopping-basket'></i> grocoery </a>

    <nav class='navbar'>
       <div id='navBar' >
        <a href='index.php'>home</a>
        <a href='#features'>features</a>
        <a href='#products'>products</a>
        <a href='#categories'[>categories</a>
        <a href='#review'>review</a>
</div>
    </nav>

    <div class='icons'> 
     <div class='fas fa-bars' id='menu-btn'></div>
<div class='fas fa-search' id='search-btn'></div>
   <span id="iconContainer"></span>
</div>


    </div>

    <form action='' class='search-form'>
        <input type='search' id='searchBox' placeholder='search here...'>
        <label for='search-box' class='fas fa-search' onclick='searchproduct()' ></label>
    </form>

    <div class='shopping-cart'>
          <div id=''>
    
    
        
    
   
       <!-- <div class='box'>
            <i class='fas fa-trash'></i>
            <img src='image/cart-img-2.png' alt=''>
            <div class='content'>
                <h3>onion</h3>
                <span class='price'> Rs 59/-</span>
                <span class='quantity'>qty : 1</span>
            </div>
        </div>
       <div class='box'>
            <i class='fas fa-trash'></i>
            <img src='image/cart-img-3.png' alt=''>
            <div class='content'>
                <h3>chicken</h3>
                <span class='price'> Rs 499/-</span>
                <span class='quantity'>qty : 1</span>
            </div>
        </div>-->


     </div>
     <div class='total' id='cartDisplayTotal'> 
    
  
  </div>
   
        <div id='checkout_btn'>
    <button  class=' btn-lg btn-product btn-block '  onclick='cart()'> View Cart <span id='Shopping_container'></sapn>    </button>;
        </div>
    
    </div>

    <form action='' class='login-form' id='LoginFORM'>
        <h3>login now</h3>
        <input type='email' name='email' id='userEmail' placeholder='your email' class='box' autocomplete="off" value="">
        <input type='password' id='userPassword' name='password' placeholder='your password' class='box'>
        <p>forget your password <a href='javascript:void(0)'   class='forget-form'>click here</a></p>
        <p>don't have an account <a href='javascript:void(0)' class='reg-form'>create now</a></p>
        <p> </p>
        <input type='submit' value='login now' class='btn-product' id='loginBTN'>

        
        <span id="loginError"></span>
    </form>
    <form action='' method='POST' class='login-form regForm' id='userregis'>
        <h3> Register Now</h3>
        <div id='Error'><span><span id='ErrorMsg'class='errorHeading'>Please Enter Correct Email Address</span></span> </div>
        <input type='email' id='RegisterEmail' placeholder='your email' name='email' class='box'>
        <input type='text' id='RegisterUserName'  placeholder='your user name' name='username' class='box'>
        <input type='password' id='UserPassword' name='password' placeholder='your password' class='box'>
        <input type='text' id='MobileUser' name='mobile' placeholder='your mobile' class='box'>
       
        <input type='submit' value='Register now' id='register' class='btn' >
    </form>
    <form action='' method='POST' class='login-form regForm' id='forgotPassword'>
        <h3>Forgot Password</h3>
        <div id='Error'><span><span id='ErrorMsg'class='errorHeading'>Please Enter Correct Email Address</span></span> </div>
        <input type='email' id='ForgotEmail' placeholder='your email' name='email' class='box'>

        <input type='password' id='ForgotPassword' name='password' placeholder='your new password' class='box'>
        <input type='text' id='ForgotOTP' name='mobile' placeholder='OTP' class='box'>
      
 
        <input type='button' value='SEND OTP' id='forgot' class='btn'>
     
  
        <input type='button' value='Forgot Password' id='passForgot' class='btn'>
  


      
    </form>

    <form action='' method='POST' class='login-form regForm' id='loginOTP'>
        <h3> Verify OTP</h3>
        <div id='Error'><span><span id='ErrorMsg'class='errorHeading'>Please Enter Correct Email Address</span></span> </div>
 
        <input type='text' id='userOtp'  placeholder='your otp' name='username' class='box'>
        <input type='hidden' id='userId'  placeholder='your user name' name='username' class='box'>
        <input type='submit' value='Verify OTP' id='verifyOtp' class='btn'  >

        <span id="msgdisplay"></span>
    </form>
</header>
<script>

 async function searchproduct(){
    let min = 1;
let max = 10;
let randomInt = Math.floor(Math.random() * (max - min + 1) + min);
console.log(randomInt);
console.log(Math.random());
 productName=document.getElementById('searchBox').value;

 if(productName!=""){

    displayProduct(productName);
    console.log( productName+randomInt);

 }
 }
    </script>