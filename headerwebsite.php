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
          <div id="Shopping_container">
       <?php
        $httpHOST= $_SERVER['HTTP_HOST'];
        $fileName=$_SERVER["PHP_SELF"];
        $fileName= basename($fileName);
        $ext= pathinfo($fileName,PATHINFO_EXTENSION);
           $ext=".".$ext;
           $shortURL= rtrim($fileName,$ext);
        $urI= $_SERVER["REQUEST_URI"];
        $REQUEST_SCHEME=$_SERVER['REQUEST_SCHEME'];
         
            $fullPATTH=$REQUEST_SCHEME."://".$httpHOST.$urI;
            
           $WEBBASEPATH=rtrim($fullPATTH,$fileName);
          $url = 'http://localhost/grocery/api/carts.php?key=6CU1qSJfcs';

$curl = curl_init();
 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
$dataUrl = curl_exec($curl);
 
curl_close($curl);
   $dataUrl=json_decode($dataUrl,true);
     
   foreach($dataUrl['data'] as $keyitem  => $value){
    $pid=$value['pid'];
  $qty=  $value['ProductQty'];
  $price=$value['ProductPrice'];
    ?>
        <div class="box">

            <?php  if($shortURL=="index"){?>
            <i class="fas fa-trash"></i>
            <?php
            }
            ?>
            <img src=" image/product_image /<?php echo $value['productImage'];?>">
            <div class="content">
                <h3><?php echo $value['productsName'];?></h3>
                <span class="price"><?php echo $value['ProductPrice'];?> Rs /-</span>
                <span class="quantity"><?php if($shortURL=="index.php"){?><i class="fa fa-plus" onclick=" updatecart('<?Php echo $pid;?>','<?php echo $qty?>','<?php echo $price;?>','in')"></i><?php }?><?php echo $value['ProductQty'];?></span>
           <span id="Subtotal-<?php echo $pid;  ?>"> </span>
            </div>
        </div>
        <?php
   } 
   ?>
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
        <div class="total"> total : <span id="cartTotal"><?php echo $dataUrl['cartTotal'];?></span> Rs </div>
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
