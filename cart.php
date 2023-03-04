<?php include 'headerwebsite.php';  
include("apiCredential.php");
$ch = curl_init();
    $keyApi=API_KEY;
    $token=$_GET['token'];
        $url = API_URL."carts.php?key=".$keyApi."&discount=0&code=''";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $token"
    
));


$response = curl_exec($ch);
$response=json_decode($response,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 


    <title>Checkoutpage</title>
    <style>
    .container {
  max-width: 700px;
  position: relative;
  top:34px;
  /* border:2px solid red; */
  box-shadow: -4px -2px 64px -17px #aaaaaa;


  margin-bottom:70px;
  padding:30px;


}
.container2{
    position: relative;
    top: 114px;
    z-index: 3; 
    display:inline;
    box-shadow: 4px 7px 9px #aaaaaa;

    
}

.lh-condensed
 { line-height: 1.25; }
</style>
</head>
<body>
<div class="container2">
<div class="row">
        <div class="col-md-12 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill" id="numberofcart">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <div id="productOrder">



                <?php
foreach($response["data"] as $value){
$qty=$value["qty"];
$productID= $value["productID"];
$productImage=$value['image'];
?>
                <li class='list-group-item d-flex justify-content-between lh-condensed'>
<div>

                <img src="<?PHP echo $productImage ;?>" width='60'>
                    <h2 class='text-muted priceProduct '> <?php echo $value["productName"];?> </h2>
                  </div>
             <span class='priceProduct'><h2>   Rs</h2></span>

            <span class='productQty'> <span class='productQty'> <i class='fa fa-plus  product_Qty' id='' onclick="increaseQty('<?php echo $qty;?>','<?php echo $productID;?>')"> </i> <?= $qty; ?> <i class='fa fa-minus  product_Qty'  onclick="decreaseQty('2','1')"></i></span> </span>
                </li>
                <?php
}
?>               
           </div>

     


         
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Total Cart (Rs)</h1>
                    <h1 id="cartTotal">$20</h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>GST (RS)</h1>
                    <h1 id="gst">$20</h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Delivery Charge (RS)</h1>
                    <h1 id="deliveryCharge">$20</h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Discount (RS)</h1>
                    <h1 id="discount">$20</h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Final Amount (RS)</h1>
                    <h1 id="finalAmount">$20</h1>
                  
                </li>
                <button class="btn btn-primary btn-lg btn-block" id="placeOrder"  onclick='checkout()'  type="button">Proceed To Checkout</button>
                
            
            </ul>
    
            <ul>

</ul>
</div>
    

<!--
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                      
                        <div class="col-md-12 mb-3">
                            <label for="lastName">customer name</label>
                            <input type="text" class="form-control" id="customerName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>
                    </div>
       
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">Mobile <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="coupon" placeholder="Coupon Code">
                           
                       
                        </div>
                        <div class="col-md-6">
                      
                            <button type="button" class="couponCodeApply"  onclick="applyCoupon()">Apply Coupon </buuton>
                     
                        </div>
                  </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                   
                   
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" checked>
                            <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                        </div>
                    </div>
               
                    <hr class="mb-4">
                    <p id="errorMsg">
       
</p>
                    <button class="btn  btn-primary btn-block" id="backButton" type="button" onclick="backtoHome()">Back To Shopping</button>
                    <button class="btn  btn-lg btn-block" id="placeOrder"  onclick="PlaceOrder()" disabled=true type="button">Place Order</button>
                </form>
            </div>
-->
       
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <?php include "footer.php";?>
</body>

</html>