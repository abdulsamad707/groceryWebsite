<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>
</head>
<body>
    <?php include "headerwebsite.php"?>
    





<section class="home" id="home">
<div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title" id="productNmae">dddddgfff</h1>
       <button type="button" class="btn"  data-dismiss="modal" >Close</button>
                    </div>
                    <div class="modal-body">
             <p>   Order Total Amount :<span id="qty_sold">13</span></p>
             <p>   Order Status :<span id="qty_remaining">5</span></p>
             <p>    Order Date :<span id="revenue">5</span></p>
             <p>    Order Time :<span id="price">5</span></p>
             <p>    Delivery Charge :<span id="dc">5</span></p>
             <p>    GST :<span id="gst">5</span></p>
          <p>Rider Name: <span id="rider_name"></span></p>



             <h1>   Order Product  Detail</h1>
                <div id="productInvdetail"></div> 
                    </div>
                    <div class="modal-footer">
            
                    </div>
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->

    <div class="content">

        <h1>My Profile </h1>

    </div>

</section>
<section>
       <section class="container">
          <h1 class='text-center'>Profile Page</h1>
        <form >
        <div class="col-md-12 mb-3">
                            <label for="lastName">Your User Name</label>
                            <input type="text" class="form-control" id="customerName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
        </div>
        <div class="col-md-12 mb-3">
                            <label for="lastName">Your Email</label>
                            <input type="text" class="form-control" id="customerEmail" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
        </div>
        <div class="col-md-12 mb-3">
                            <label for="lastName">Your Password</label>
                            <input type="password" class="form-control" id="customerPassword" placeholder="" value="" required="">
                         
                         
      
                         
                            <div class="invalid-feedback"> Valid last name is required. </div>
        </div>
        <div class="col-md-12 mb-3">
                            <label for="lastName">Your Mobile</label>
                            <input type="text" class="form-control" id="customerMobile" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
        </div>

        <div class="col-md-12 mb-3">
                            <label for="lastName">Your Address</label>
                            <input type="text" class="form-control" id="customerAddress" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
        </div>

        <button class="btn  btn-lg btn-block" id="placeOrder"  onclick=""  type="button">Save Change</button>
        </form>


        </section>
</section>

<?php include "footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script>

  function myProfile() {
    jwtToken = localStorage.getItem("key");
    const jwt = jwtToken;

    const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
    const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    const parsedJwtData = JSON.parse(decodedJwtData);
      console.warn(parsedJwtData);
    document.getElementById("customerName").value=parsedJwtData.username;
    document.getElementById("customerEmail").value=parsedJwtData.email;
        document.getElementById("customerMobile").value=parsedJwtData.mobile;
            document.getElementById("customerAddress").value=parsedJwtData.address;
  }
  myProfile();
   submitBTN =  document.getElementById("placeOrder");
             submitBTN.addEventListener("click",async function(e){
         customerName=         document.getElementById("customerName").value;
         console.warn(e);

   customerEmail= document.getElementById("customerEmail").value;
      customerMobile=  document.getElementById("customerMobile").value;
           customerAddress= document.getElementById("customerAddress").value;
         customerPassword= document.getElementById("customerPassword").value;
            console.log(`${customerPassword}`);
 jwtToken = localStorage.getItem("key");
    const jwt = jwtToken;
    APIKEY = "avdfheuw23";
WEBSITE_PATHS = "http://localhost/groceryWebsite/";
API_PATH = "api/";
APIKEY = "avdfheuw23";
/*currentDate = currentDate.toLocaleString("en-NZ", {
                month: "long",
                day: "numeric",
                year: "numeric",
                hour: "numeric",
                minute: "numeric"
            });*/
SubmitRating={
  username:customerName,
 email: customerEmail,
  mobile:customerMobile,
 password: customerPassword,
 address: customerAddress
}
SubmitRating=JSON.stringify(SubmitRating);
console.warn(SubmitRating);
    apiurl = API_PATH + "customerprofile.php?key=" + APIKEY;
 productRa = await fetch(apiurl, {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
        body:   SubmitRating
    });
       console.warn( productRa);
       console.warn(await productRa.text());

             });
  </script>