
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Grocery Website Design Tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=">
<!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
-->
<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo rand()+time();?>">
    </head>
<body>
    
<!-- header section starts  -->


<header class="header">                   

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> grocoery </a>

    <nav class="navbar">

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
          <div id="Shopping_container">
    
    
        
    
   
       <!-- <div class="box">
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
        </div>-->


     </div>
     <div class="total" id="cartDisplayTotal"> 
    
  
  </div>
   
        <div id="checkout_btn">
        
        </div>
    
    </div>

    <form action="" class="login-form" id="LoginFORM">
        <h3>login now</h3>
        <input type="email" name="email" id="userEmail" placeholder="your email" class="box">
        <input type="password" id="userPassword" name="password" placeholder="your password" class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="#" class="reg-form">create now</a></p>
        <input type="submit" value="login now" class="btn-product" id="loginBTN">
    </form>
    <form action="" method="POST" class="login-form regForm" id='userregis'>
        <h3> Register Now</h3>
        <div id="Error"><span><span id="ErrorMsg"class="errorHeading">Please Enter Correct Email Address</span></span> </div>
        <input type="email" id="RegisterEmail" placeholder="your email" name="email" class="box">
        <input type="text" id="RegisterUserName"  placeholder="your user name" name="username" class="box">
        <input type="password" id="UserPassword" name="password" placeholder="your password" class="box">
        <input type="text" id="MobileUser" name="mobile" placeholder="your mobile" class="box">
       
        <input type="submit" value="Register now" id="register" class="btn" >
    </form>
  
</header>

    <section class="home" id="home">

<div class="content">
   checkout Page 

   
</div>
   
</section>
<!--container start-->
<div class="checkout container-fluid">
    <div class="row">
        <div class=" col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <form action="/action_page.php" id="OrderFrom">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control " name="customerEmail" placeholder="Enter email" id="email">
  </div>

  
    
    
    
       



  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile " id="pwd">
  </div>
  <div class="form-group">
  <label for="comment">Address:</label>
  <textarea class="form-control" name="deliveryAddress" rows="5" cols="10" style="resize:none;" id="comment"></textarea>
</div>
<div class="form-check">
  <label class="form-check-label">

    <input type="radio"  name="paymentMethod" value="cod">cash On delivery
  </label>
  <button type="submit" class="btn btn-primary btn-block" id="PlaceOrder">Place Order</button>
</div>


</form>







,     
    </div>
    <div class=" col-lg-6 col-md-12 col-sm-12 col-xs-12 ">

        
        <h1 class="text-center"> cart Details </h1>



        <div class="cartAmount">
      Cart Total : <span class='cartsTotal'></span><br>
      Delivery Charge : <span class="deliveryCharges"></span><br>
      GST : <span class="gsts"></span><br>
      Final Amount : <span></span>


      
      </div>
       </div>
       
     
    </div>

    </div>
</div>
<!---container end-->


