

    <?php 
    include("headerwebsite.php");
   
    ?>
    <section class="home" id="home">

<div class="content">
   checkout Page 

   
</div>
   
</section>
<?php 
print_r($_SESSION);
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
          
           <div class="form-group">
              <label for="">Coupon Code </label><br>
              <input type="text" placeholder="Customer Number" >
            
           </div>
           <div class="form-group">
              <label for="">Delivery Address</label><br>
             <textarea id="deliveryAdd" cols="103" rows="3"></textarea>
           </div>
       
           <input Type="submit" value="place Order">
           </form>
     </div>
          <div class="checkitemdetail">
      
       
            <diV>
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
            <h1> Unit Price :80 </h1>
            <h1> Sub Total : 160 Rs </h1>
           </div>
           <diV>
            <h1>Onion  </h1>
            <h1> Quantity 2</h1>
           </div>
           <diV>
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>    <diV>
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>    <diV>
            <h1>Patato </h1>
            <h1> Quantity 2</h1>
           </div>
             <div class="">
                 Cart Total : 1200 Rs <br>
                 Gst : 60 Rs
             </div>
          </div>

</div>



<?php include "footer.php";?>