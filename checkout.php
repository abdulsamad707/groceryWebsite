

    <?php 



      include("headerwebsite.php");

   
  
    ?>
    <section class="home" id="home">

<div class="content">
   checkout Page 

   
</div>
   
</section>
<?php 







   // Decode JSON data into PHP array
   

?>
<!---container start-->
<div class="checkout container-fluid">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
</div>

  <button type="submit" class="btn btn-primary btn-block" id="PlaceOrder">Place Order</button>
</form>








    </div>
    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="text-center"> cart Details </h1>
        <div class="cartAmount">
      Cart Total : <span><?php echo $dataUrl['cartTotal']?></span>Rs<br>
      Delivery Charge : <span><?php echo $dataUrl['deliveryCharge']?></span>Rs<br>
      GST : <span><?php echo $dataUrl['GST']?></span>Rs<br>
      Final Amount : <span><?php echo $dataUrl['FinalOrderAmount']?></span>Rs
      </div>
       </div>
       
     
    </div>

    </div>
</div>
<!---container end-->


<?php include "footer.php";?>