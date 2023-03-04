
<?php include 'headerwebsite.php';    ?>
<?php
include("apiCredential.php");
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
<?php
/*
$curl = curl_init();

// Set the URL and other options
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/groceryWebsite/api/currentToken.php?key=avdfheuw23&id=",
  CURLOPT_RETURNTRANSFER => true,  // Return the response instead of outputting it
  CURLOPT_ENCODING => "",  // Accept any encoding
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",  // Change this to the HTTP method you need

));
// API endpoint URL
$url = "";
*/

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

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Output the response
 $response;
// Send the request and get the response

$response=json_decode($response,true);

?>
<div class="row">
        <div class="col-lg-4 order-md-2 col-sm-12 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill" id="numberofcart"><?php echo $response["totalRecord"]; ?></span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <div id="productOrder">
                    <?php
               foreach( $response["data"]  as $key ){
                $image_path=$key["image"];
                ?>
             <li class='list-group-item d-flex justify-content-between lh-condensed'>
<div>

                <img src='<?=$image_path; ?>' width='60'>
                    <h2 class='text-muted priceProduct '> <?= $key["productName"];?></h2>
                  </div>
             <span class='priceProduct'><h2>  <?= $key["price"];?> Rs</h2></span>

            <span class='productQty'> <?php echo $key["qty"];?> </span>
                </li>
<?php
               }
?>


             

            
           </div>

     
<?php


?>

              <li class="list-group-item  d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <h2 id="couponcode">EXAMPLECODE</h2>
                    </div>
                 
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Total Cart (Rs)</h1>
                    <h1 id="cartTotal"><?= $response["cartTotal"]["cartTotal"]; ?></h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>GST (RS)</h1>
                    <h1 id="gst"><?= $response["cartTotal"]["gst"];?></h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Delivery Charge (RS)</h1>
                    <h1 id="deliveryCharge"><?= $response["cartTotal"]["deliveryCharge"];?></h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Discount (RS)</h1>
                    <h1 id="discount"><?= $response["cartTotal"]["discount"];?></h1>
                  
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <h1>Final Amount (RS)</h1>
                    <h1 id="finalAmount"><?= $response["cartTotal"]["totalAmount"];?></h1>
                  
                </li>
            </ul>

            <ul>
     
</ul>
</div>
    
        <div class="container">


            <div class="col-md-8 col-sm-12 order-md-1">
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
                    <button class="btn  btn-lg btn-block" id="placeOrder"  onclick="PlaceOrder()"  type="button">Place Order</button>
                </form>
            </div>
        </div> 
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <?php include "footer.php";?>
</body>

</html>

<script>
async function PlaceOrder(){
   alert("hi");
  var discount= document.getElementById("discount").innerText;
  var couponcode= document.getElementById("couponcode").innerText;
  discount=parseInt(discount);

  alert(discount);
 var samae_addrees =document.getElementById("same-address").checked;
 var save_info= document.getElementById("save-info").checked;

 alert(save_info);
 var paymentmethod="cash";
 var paymentStatus=1;
 var orderStatus=1;
 const APIKEY = "avdfheuw23";

 jwtToken = localStorage.getItem("key");
    const jwt = jwtToken;

    const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
    const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    const parsedJwtData = JSON.parse(decodedJwtData);
localStoreAddrees=parsedJwtData.address;
billingAddrees=document.getElementById("address").value;



if(billingAddrees && localStoreAddrees==""){
      alert("please provide delivery address");
    return false;
}else{
if(billingAddrees==localStoreAddrees){
    saveAddrees=0;
    address=billingAddrees;
}else {



    if(samae_addrees==true){
        address=billingAddrees;
    }else{
        if(localStoreAddrees!=""){
            address=localStoreAddrees;
        }else{
            address=billingAddrees;
        }
    }

    if(save_info==true){
        saveAddrees=1;
    }else{
        saveAddrees=0;
    }

}
}
var OrderObject={
	"orderStatus":1,
"save": saveAddrees,
	"discount":discount,
	"deliveryAddress":address,
	"couponCode":couponcode,
	"type":"order_place",
	"paymentStatus":1,
	"paymentmethod":"cash",
	"deliveryboyid":0
};
OrderObject=JSON.stringify(OrderObject);
console.log(parsedJwtData);
apiurl = API_PATH+"orders.php?key=" + APIKEY;
 const orderResponse  =await fetch(apiurl, {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
        body:OrderObject
    });
response=await orderResponse.json();

swal("Congrats","Order Placed Succesfully","success");
console.log(response);
   localStorage.removeItem("carts");
   localStorage.removeItem("cartTotal");
   localStorage.removeItem("cartDiscount");
   setTimeout(() => {
    window.location.href="index.php";
   },1000);

}

function backtoHome(){
window.location.href="index.php";
}


async function applyCoupon() {
        CouponCode = document.getElementById("coupon").value;
        if (CouponCode == "") {
            alert("please provide coupon code");
        } else {
            CouponCode=CouponCode.toUpperCase();
            getCartItem = localStorage.getItem("carts");
            getCartItem = JSON.parse(getCartItem);
            getCartTotal = localStorage.getItem("cartTotal");
            getCartTotal = JSON.parse(getCartTotal);
            cartData = {
                "cartTotal": getCartTotal.cartTotal,
                "couponCode": CouponCode,
                "cart": {
                    "data": getCartItem,
                    "totalRecord": getCartTotal.totalItem
                }

            };
            cartData = JSON.stringify(cartData);
            console.log(cartData);
            apiurl =  API_PATH+"coupon.php?key=" + APIKEY;
            const orderResponse = await fetch(apiurl, {
                method: "POST",

                body: cartData
            });
            response = await orderResponse.json();
            console.log("Apply Coupon code");
            console.log(response);
           if(response.status=="success"){
            swal("Congrats",response.msg,response.status);
           }else{
            swal("Oops!",response.msg,response.status);
           }
        
            document.getElementById("numberofcart").innerText = response.totalItem;
            document.getElementById("cartTotal").innerText = response.cartTotal.cartTotal;
            document.getElementById("gst").innerText = response.gst;
            document.getElementById("deliveryCharge").innerText = response.deliveryCharge;
            document.getElementById("finalAmount").innerText = response.totalAmount;
            document.getElementById("discount").innerText = response.discount;
            document.getElementById("couponcode").innerText = response.couponCode;
            discount = response.discount;
            code = response.couponCode;
                 var cartDiscount={
                    discount:discount,
                    code:code
                 }
                localStorage.removeItem("cartTotal");
                localStorage.setItem("cartDiscount",JSON.stringify(cartDiscount));
                
        
            cartDetail(discount,code);
        
          
            if (response.cartTotal.cartTotal < response.cartTotal.minOrder) {
              
                alert("min");
        errorMsg="";
        errorMsg+="<div class='alert alert-danger alert-dismissible'>";
        errorMsg+=" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        errorMsg+=" <strong>Warning!</strong> <p> Minimum Amount To Place Is "+ response.cartTotal.minOrder+" Rs . </p>";
        errorMsg+="</div>";
        alert(errorMsg);
        document.getElementById("errorMsg").innerHTML=errorMsg;
                document.getElementById("placeOrder").disabled = true;
            } else {
     
           document.getElementById("placeOrder").disabled = false;
            }
        }

    }

</script>