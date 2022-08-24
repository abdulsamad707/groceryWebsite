

    <?php 
    include("headerwebsite.php");
  
    ?>
    <section class="home" id="home">

<div class="content">
   checkout Page 

   
</div>
   
</section>
<?php 






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
              <label for="">Delivery Address</label><br>
             <textarea id="deliveryAdd" cols="103" rows="3"></textarea>
           </div>
              <div id="map"></div>
         </form>
     </div>
   
</div>



<?php include "footer.php";?>