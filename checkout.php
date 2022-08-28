

    <?php 

    $url = 'http://localhost/grocery/api/carts.php?key=6CU1qSJfcs';

    $curl = curl_init();
     
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
     
    $dataUrl = curl_exec($curl);
     
    curl_close($curl);
       $dataUrl=json_decode($dataUrl,true);


      include("headerwebsite.php");
    
    ?>
    <section class="home" id="home">

<div class="content">
   checkout Page 

   
</div>
   
</section>
<?php 

$_SESSION['admin']=1;






?>

<div class="checkout">
     <div class="checkFormDiv">
         <form class="checkoutForm" id="OrderForm">
            <div class="form-group">
              <label for="">Email</label><br>
              <input type="text" placeholder="Customer Email" >
           </div>
           <div class="form-group">
              <label for="">Mobile</label><br>
              <input type="text" placeholder="Customer Number" >
           </div>
          
          
           <div class="form-group" style="clear:both;">
              <label for="">Delivery Address</label><br>
             <textarea id="deliveryAdd" cols="103" rows="3">  </textarea>
           </div>
           <input type="radio">Cash
            <input type="text" value="<?php echo @$_GET['lat']; ?>">
           <input Type="submit" value="place Order" id="orderBtn">
           </form>
     </div>
          <div class="checkitemdetail">
      
           <!---<diV class="itemContainer">
            <h1>Onion  </h1>
            <h1> Quantity 2</h1>
           </div>
           <diV class="itemContainer">
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>    <diV class="itemContainer">
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>    <diV class="itemContainer">
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>---->
           <?php
       
  
       foreach($dataUrl['data'] as $keyitem  => $value){
        ?>
          <diV  class="itemContainer">
          <h1><?php echo $value['productsName'];?> </h1>
           <img src=" image/product_image /<?php echo $value['productImage'];?>">
          <h1> Quantity <?php echo $value['ProductQty'];?> </h1>
          <h1> Unit Price :<?php  echo $value['ProductPrice']; ?> Rs</h1>
          <h1> Sub Total : <?php  echo $value['ProductPrice'] * $value['ProductQty']; ?> Rs </h1>
         </div>
         <?php
       }
         ?>
             <div class="">
                 Cart Total : <span class="cartTotal"> 1200 </span> Rs <br>
                 Gst : 60 Rs
             </div>
          </div>

</div>



<?php include "footer.php";?>