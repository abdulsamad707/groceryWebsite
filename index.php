<?php
include("apiCredential.php");
?>
<!-- header section ends -->

<!-- home section starts  -->
<?php include "headerwebsite.php";?>
<section class="home" id="home">

    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <p></p>
        <a href="#" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p>We ae poviding best quality vegetables at home </p>

        </div>

      <!--  <div class="box">
            <img src="image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="btn">read more</a>
        </div>-->

        <div class="box">
            <img src="image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>Easy And Secure payments</p>
       
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- products section starts  -->

<section class="products" id="products">
<?php
            $keyApi=API_KEY;
        $url = API_URL."products.php?key=$keyApi&productSearch=''&status";
       
 
$curl = curl_init();
 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POST,false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
$dataUrl = curl_exec($curl);
 
curl_close($curl);

   $dataUrl=json_decode($dataUrl,true);




      ?>
    <h1 class="heading"> our <span>products</span> </h1>
    <div id="msgDisplay">          
</div>
    <div class="box-container" id="swipe" >

 
            <?php
      

      ?>

   

  <?php
            foreach($dataUrl['data'] as $key => $value){
  ?>
      
        <div class='box '  >
                <img src="<?=$value['ProductImage'] ;?>" alt="">
                <h3> <?= $value["productName"];?></h3>
                <div class="price"> <?php echo  $value["price"]; ?> Rs </div>
                <div class="stars">
                  <?= $value["rating"]; ?>  <i class="fas fa-star"></i>
               
                </div>
          
                <a href="javascript:void(0)" class="btn-product" onclick="addtocart('<?= $value['id']?>','1','add',this)"  >add to cart</a>
            </div>
            <?php
            }
            ?>
    
        </div>

    </div>

    

</section>

<!-- products section ends -->

<!-- categories section starts  -->

<section class="categories" id="categories">

    <h1 class="heading"> product <span>categories</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/cat-1.png" alt="">
            <h3>vegitables</h3>
 
        </div>

  
        <div class="box">
            <img src="image/cat-2.png" alt="">
            <h3>fruits</h3>
 
        </div>

    </div>

</section>

<!-- categories section ends -->

<!-- review section starts  -->



<!-- review section ends -->

<!-- blogs section starts  -->
<!--
<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/blog-1.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-2.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-3.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

    </div>
  
</section>-->
<div class="whatsApp">
     <a href="https://wa.me/923323565866" width="50"  height="50" target="_blank"> <img src="image/WhatApp.jpg"></a>
     </div>
<?php include "footer.php";?>
<script>


    </script>
<!-- blogs section ends -->

<!-- footer section starts  -->

            