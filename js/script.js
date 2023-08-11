var searchForm = document.querySelector('.search-form');
var shoppingCart = document.querySelector('.shopping-cart');
var loginForm = document.querySelector('.login-form');
var regForm = document.querySelector('.reg-form');
var forgotForm = document.querySelector('.forget-form');
var regFormdata = document.querySelector('.regForm');
var loginOTP = document.querySelector('#loginOTP');
var navbar = document.querySelector('.navbar');
var forgetPass = document.querySelector('#forgotPassword');
var forgot = document.getElementById("forgot");
APIKEY = "avdfheuw23";
WEBSITE_PATHS = "http://localhost/groceryWebsite/";
API_PATH = "api/";
APIKEY = "avdfheuw23";
var currentDomain = window.location.hostname;
console.log(currentDomain);
var currentProtocol = window.location.protocol;
console.log(currentProtocol);

function forgetKey() {
    loginForm.classList.remove('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
    loginOTP.classList.remove("active");
    forgetPass.classList.toggle('active');
    console.log("kTY");
    forgetPass.classList.remove('active');

}
document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
    forgetPass.classList.remove('active');
}
regForm.onclick = () => {
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    forgetPass.classList.remove('active');
    regFormdata.classList.toggle('active');
}
forgotForm.onclick = () => {
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    forgetPass.classList.toggle('active');
}












document.querySelector('#menu-btn').onclick = () => {
        navbar.classList.toggle('active');
        searchForm.classList.remove('active');
        shoppingCart.classList.remove('active');
        loginForm.classList.remove('active');
        regFormdata.classList.remove('active');
        forgetPass.classList.remove('active');
    }
    /*
    window.onscroll = () => {
        searchForm.classList.remove('active');
        shoppingCart.classList.remove('active');
        loginForm.classList.remove('active');
        navbar.classList.remove('active');
        forgetPass.classList.remove('active');

    }*/
$("#SubmitBtn").click(function(e) {

});
loginBTN = document.getElementById("loginBTN");
ForgetBTN = document.getElementById("forgot");
cHANGEBTN = document.getElementById("passForgot");
cHANGEBTN.addEventListener("click", function(e) {

    email = document.getElementById("ForgotEmail").value;
    forgtPas = document.getElementById("ForgotPassword").value;
    otp = document.getElementById("ForgotOTP").value;


    apiurl = API_PATH + "resetpassword.php?key=" + APIKEY;
    loginObj = {
        email: email,
        pass: forgtPas,
        otp: otp
    };
    loginObj = JSON.stringify(loginObj);
    fetch(apiurl, {
        method: "POST",
        body: loginObj
    }).then(function(res) {
        swal("Great Job", "Password Change", "success");
        return res.text();
    }).then(function(response) {
        console.log(response);
        loginForm.classList.toggle('active');
        regFormdata.classList.remove('active');
    });


});
ForgetBTN.addEventListener("click", function(e) {
    apiurl = API_PATH + "reset.php?key=" + APIKEY;

    email = document.getElementById("ForgotEmail").value;
    console.log(email);
    loginObj = {
        email: email

    };

    loginObj = JSON.stringify(loginObj);
    fetch(apiurl, {
        method: "POST",
        body: loginObj
    }).then(function(res) {
        swal("Great Job", "Otp For Change Password Sent to Your Email", "success");
        return res.json();
    }).then(function(response) {
        console.log(response);
    });


});
loginBTN.addEventListener("click", function(e) {


    e.preventDefault();
    var userEmail = document.getElementById("userEmail").value;
    var userPassword = document.getElementById("userPassword").value;

    loginObj = {
        email: userEmail,
        password: userPassword
    };

    loginObj = JSON.stringify(loginObj);



    apiurl = API_PATH + "login.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "POST",
        body: loginObj
    }).then(function(res) {

        return res.json();
    }).then(function(response) {
        console.log(response);

        if (response.key != undefined && response.code != 404) {
            loginForm.classList.remove('active');
            searchForm.classList.remove('active');
            shoppingCart.classList.remove('active');
            navbar.classList.remove('active');
            regFormdata.classList.remove('active');
            loginOTP.classList.toggle("active");




            DisplayCartItem();

            document.getElementById("userId").value = response.key;


            sessionStorage.setItem("key", response.key);
            displayIcon();
            websiteLink();
        } else {

            cartMSG = "<div class='alert alert-danger fade in alert-dismissible show'>";
            cartMSG += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
            cartMSG += "  <span aria-hidden='true' style='font-size:20px'>×</span>";
            cartMSG += "</button><h2>" + response.message + "</h2>";
            cartMSG += "</div>";
            document.getElementById("loginError").innerHTML = cartMSG;
        }





        /*
                message = response.message;
                actionStatusText = response.actionStatusText;
                actionStatusTextSymbol = response.actionStatusTextSymbol;
                console.log(actionStatusTextSymbol);
                if (response.action_status == 1) {
                    swal("Congratulation", message, "success");
                    varco = decodeURIComponent(document.cookie);
                    console.log(varco);
                    console.log(document.cookie);
                } else {
                    swal("Oops", message, "error");
                }
        */

    });
});

function login() {
    loginForm.classList.toggle('active');
    regFormdata.classList.remove('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');

    loginOTP.classList.remove("active");
    forgetPass.classList.remove('active');
    console.log("hi");
}


function displayIcon() {

    keys = localStorage.getItem("key");
    if (keys != undefined) {


        htmlCart = "  <div class='glyphicon glyphicon-log-out' id='loginout' onclick=logout() ></div>";

    } else {
        htmlCart = "  <div class='fas fa-user' id='loginout' onclick=login()></div>";
    }

    htmlCart += " <div class='cart-icon'>";
    htmlCart += " <i class='fas fa-shopping-cart' onclick=cart()   ></i>";
    htmlCart += " <span class='cart-count' id='numberofcart'></span>";
    htmlCart += "  </div>";
    document.getElementById("iconContainer").innerHTML = htmlCart;
    DisplayCartItem();
}

function logout() {
    keys = localStorage.removeItem("key");
    window.location.href = "index.php";
    displayIcon();
    DisplayCartItem();
    websiteLink();
}



displayIcon();
async function verifyOTP(id) {
    loginObj = {
        id: id

    };

    loginObj = JSON.stringify(loginObj);



    apiurl = API_PATH + "verifyCustomer.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "POST",
        body: loginObj
    });
}

function updateOTP(customerid) {
    console.log(customerid);
}
registerComplete = document.getElementById("register");
verifyOne = document.getElementById("verifyOtp");
verifyOtp.addEventListener("click", function(e) {
    e.preventDefault();
    verifyOne = document.getElementById("userOtp").value;
    verifyOtp = document.getElementById("userId");

    token = sessionStorage.getItem("key");

    const jwt = token;
    const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
    const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    const parsedJwtData = JSON.parse(decodedJwtData);
    console.log(parsedJwtData);

    console.log(parsedJwtData);
    dataOtp = parsedJwtData.otp;
    console.log("Otp Verify", dataOtp);
    user_id = parsedJwtData.id;
    if (dataOtp == verifyOne) {
        verifyOTP(user_id);
        updateOTP(user_id);
        localStorage.setItem("key", token);
        setTimeout(() => {
            loginOTP.classList.remove("active");
        }, 1000);


    } else {
        cartMSG = "<div class='alert alert-danger fade in alert-dismissible show'>";
        cartMSG += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        cartMSG += "  <span aria-hidden='true' style='font-size:20px'>×</span>";
        cartMSG += "</button><h2> Wrong OTP</h2>";
        cartMSG += "</div>";
        $("#msgdisplay").html(cartMSG);


    }
    /*
    localStorage.setItem("key", token);
    */
    displayIcon();
    DisplayCartItem();
    websiteLink();
});


registerComplete.addEventListener("click", function(e) {
    e.preventDefault();
    console.log(e);
    const EmailAddress = document.getElementById("RegisterEmail").value;
    const mobileNumber = document.querySelector('#MobileUser').value;
    const UserPassword = document.querySelector('#UserPassword').value;
    const RegisterUserName = document.querySelector('#RegisterUserName').value;
    const MobilePattern = /[9][2][0-9]{10}/;
    const PassWordPattern = /[A-Za-z]{1,}[0-9]{1,}[@$^*?,'!|#^%';:/-_.]{1,}/;
    const EmailPattern = /[A-Za-z0-9,-_.]{3,}[@]{1}[A-Za-z]{5,7}[.]{1}[A-Za-z]{3,}/;
    ErrorMsg = document.getElementById('ErrorMsg');

    if (EmailAddress == "") {
        swal('Oops', 'Email Must Be Filled Out', 'error');


        return false;
    }
    if (UserPassword == "") {
        swal('Oops', 'Password Must Be Filled Out', 'error');


        return false;
    }
    if (!EmailPattern.test(EmailAddress)) {
        swal('Oops', 'Wrong Email Format ', 'error');
    }


    var formData = new FormData();
    formData.append('email', EmailAddress);

    formData.append('username', RegisterUserName);
    formData.append('mobile', mobileNumber);
    formData.append('password', UserPassword);
    formData = {
        email: EmailAddress,
        password: UserPassword,
        mobile: mobileNumber,
        username: RegisterUserName
    }

    formData = JSON.stringify(formData);
    console.log(formData);
    console.log(this);
    /*
               formData.append('username',RegisterUserName);
               formData.append('mobile',mobileNumber);
               formData.append('email',EmailAddress);
               formData.append('password',UserPassword);
               *
              formData=JSON.stringify(formData);
            console.log(formData);
        */

    urlReg = API_PATH + "userregister.php?key=" + APIKEY;
    fetch(urlReg, {
        method: "POST",
        body: formData
    }).then(function(response) {
        return response.json();
    }).then(function(json) {
        console.log(json);

        var code = json.code;
        var http_code = json.http_code;

        if (http_code = 200) {

            var http_code = json.http_code;
            var operation = json.operationStatus;
            var msg = json.message;
            if (operation === "success") {
                swal("Good job!", msg, operation);
                loginForm.classList.toggle('active');
                regFormdata.classList.remove('active');

            } else {
                swal("Oops!", msg, operation);
            }


        }
    })

});

/*
ed9rX%590
$('#register').click(function(e){
e.preventDefault();
let data=$('#userregis').serializeArray();
let obj= {};
  let dataLength= data.length;
       
      for (let i=0; i<dataLength; i++){
     fieldName=data[i].name;
     fieldValue=data[i].value;
          if(fieldValue==''){
            $('#Error').css('display','block');
            $('#ErrorMsg').text('All Field Are Required To Proceed');
               setTimeout(function(){
          
                
                $('#Error').fadeOut('slow');
               },4000);
            return false;
          }else{
       EmailAddress=$('#RegisterEmail').val();
           EmailPattern=/[A-Za-z0-9,-_.]{3,}[@]{1}[A-Za-z]{5,7}[.]{1}[A-Za-z]{3,}/;
           var mobileNumber=$('#MobileUser').val();
           UserPassword=$('#UserPassword').val();
           RegisterUserName=$('#RegisterUserName').val();
             PassWordPattern=/[A-Za-z]{1,}[0-9]{1,}[@$^*?,'!|#^%';:/-_.]{1,}/;
             if(!PassWordPattern.test(UserPassword)){
              $('#Error').css('display','block');
              $('#ErrorMsg').text('Please Provide Valid Password');
  
                 setTimeout(function(){
            
                  
                  $('#Error').fadeOut('slow');
                 },4000);
                return false;
             }
           var MobileLength=mobileNumber.length;
              var MobilePattern =/[9][2][0-9]{10}/;
               if(!EmailPattern.test(EmailAddress)){
                $('#Error').css('display','block');
                $('#ErrorMsg').text('Please Provide Valid Email Address');
    
                   setTimeout(function(){
              
                    
                    $('#Error').fadeOut('slow');
                   },4000);
                  return false;
               }
                  if(!MobilePattern.test(mobileNumber)){
                    $('#Error').css('display','block');
                    $('#ErrorMsg').text('Please Provide Valid Mobile Number ');
        
                       setTimeout(function(){
                  
                        
                        $('#Error').fadeOut('slow');
                       },4000);
                      return false;
                  }
            obj[fieldName]=fieldValue;
          /*  $(this).prop('disabled',true);
            console.log($(this));
          }
   
  
      }/*
      obj=JSON.stringify(obj);
      $(this).prop("disabled",true);
      $.ajax({
       method:'POST',
       url:'API_PATHuserregister.php?key=6CU1qSJfcs',
        data:obj,
       success:function(response){
      
          
           var code=response.code;
       var http_code=response.http_code;
           
        if(http_code==200){
          var http_code=response.http_code;
          var operation= response.operationStatus;
          var msg= response.message;
            if(operation==="success"){
          swal("Good job!", msg, operation);
            }else{
              swal("Oops!",msg, operation);
            }
          $("#register").prop("disabled",false);
        }
          
           
       }
       
       
       var swiper = new Swiper(".product-slider", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1020: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".review-slider", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1020: {
            slidesPerView: 3,
        },
    },
});
       
       
       
       
       
       
       
       */

const screenWidth = window.innerWidth;
console.log(`The width of the screen is ${screenWidth}px`);
var swiper = new Swiper(".product-slider", {

    autoplay: {
        delay: 5000,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1020: {
            slidesPerView: 4,
        },
        1366: {
            slidesPerView: 4,
        },
    },
});




var swiper = new Swiper(".review-slider", {
    loop: true,



});

WebSite = location.href;
WebSite = WebSite.replace(WEBSITE_PATH, '');
token = localStorage.getItem("key");
if (token != undefined && WebSite != 'index.php') {
    WebSite = WebSite.replaceAll('?token=' + token, '');
} else {
    if (token == undefined && WebSite != 'index.php') {
        WebSite = WebSite.replaceAll('?token=null', '');
    }
    console.log(WebSite);
}

function checkout() {
    token = localStorage.getItem("key");
    if (token != undefined) {
        window.location.href = WEBSITE_PATH + "checkout.php?token=" + token;
    }
}

function cart() {

    token = localStorage.getItem("key");
    if (token != undefined) {
        window.location.href = WEBSITE_PATH + "cart.php?token=" + token;
    }
}

async function cartDetail(discount = 0, code = "") {


    urlCart = API_PATH + "carts.php?key=" + APIKEY + "&discount=" + discount + "&code=" + code;
    jwtToken = localStorage.getItem("key");
    carts = await fetch(urlCart, {
        method: "GET",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        }

    });
    response = await carts.json();

    /*
        cartData = response.data;
        cartDatas = localStorage.getItem("carts");
        localStorage.setItem("carts", JSON.stringify(cartData));
        localStorage.setItem("cartTotal", JSON.stringify(response.cartTotal));
    */












    return response;





    /* cart  total : <span id="cartTotal"></span> 
        deliveryCharge :<span id="deliveryCharge"></span> <br>
        Gst :<span id="gst"></span>  <br>
        Order Total :<span id="orderAmount"></span>
      cartTotalDisplay=   document.getElementById("cartDisplayTotal");
    cartDisplayTotal
         console.log(cartTotalDisplay);
        */


}


/*cartDetail();*/
async function addtocart(id, quantity, action) {
    var productId = id;
    var productQty = quantity;
    console.log(action);
    cartObject = {
        productId: productId,
        qty: productQty,
        action: action
    }
    cartObject = JSON.stringify(cartObject);
    console.log(cartObject);
    jwtToken = localStorage.getItem("key");


    if (jwtToken == undefined || jwtToken == '') {
        swal("Oops", "Please Login to Add To Cart", "error");
        return false;
    }
    console.log(jwtToken);








    apiurl = API_PATH + "carts.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
        body: cartObject
    }).then(function(response) {

        return response.json();
    }).then(async function(text) {
        console.log(text);

        if (text.status == "success") {

            statusDisplay = "alert-success";
        } else {
            statusDisplay = "alert-danger";
        }


        cartMSG = "<div class='alert " + statusDisplay + " fade in alert-dismissible show'>";
        cartMSG += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        cartMSG += "  <span aria-hidden='true' style='font-size:20px'>×</span>";
        cartMSG += "</button>" + text.MSG;
        cartMSG += "</div>";
        $("#msgDisplay").html(cartMSG);
        DisplayCartItem();

        /*    data = text.cartData.data;
            cartTotal = text.cartData.cartTotal;
            for (i in data) {
                productQty = data[i].ProductQty;
                productName = data[i].productsName;
                productPrice = data[i].ProductPrice;
                productImage = data[i].productImage;
            }
            message = text.message;
            operationStatus = text.statusOp;
            if (operationStatus == 'success') {
                title = "congratulations";
            } else {
                title = "Oops!";
            }
            swal(title, message, operationStatus);
            cartDetail();
            */

    })

}
async function DisplayCartItem() {


    keyUser = localStorage.getItem('key');
    if (keyUser != undefined) {
        crt = await cartDetail(0, "");
        totalItem = crt.totalRecord;
    } else {
        totalItem = 0;
    }
    console.log(totalItem);
    document.getElementById("numberofcart").innerText = totalItem;
}
DisplayCartItem();




function displayProduct(productName = "") {

    searchItem = "";
    apiurl = API_PATH + "products.php?key=" + APIKEY + "&status&productName=" + productName;
    fetch(apiurl, {
        method: "GET"
    }).then(function(response) {

        return response.json();
    }).then(function(response) {
        console.log(response);
        const dataProduct = response.data;









        result = [];

        $("#swipe").html("");
        displayProductHtml = "";
        if (dataProduct != '') {
            dataProduct.map((item) => {




                displayProductHtml += "<div class='box '>";

                displayProductHtml += "<img src = '" + item.ProductImage + "'alt = '' >";
                displayProductHtml += " <h3 >" + item.productName + " </h3> <div class = 'price' >" + item.price + "Rs </div> <div class = 'stars'>" + item.rating + " (" + item.countBy + ") <i class = 'fas fa-star'> </i>";

                displayProductHtml += "</div>";


                displayProductHtml += " <a href = 'javascript:void(0)' class = 'btn-product'  onclick =addtocart('" + item.id + "','1','add')> add to cart </a>";
                displayProductHtml += "</div>";
            });




            $("#swipe").append(displayProductHtml);
            console.log(displayProductHtml);

        } else {
            $("#swipe").html("No Product Found");
        }




        /*  <img src='image/product-1.png' alt=''>
          <h3>fresh orange</h3>
          <div class="price"> Rs 150/- </div>
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
          </div>
          <a href="#" class="btn">add to cart</a>
          </div>
          admin_course123@AbdulSamad
*/


    });

}
displayProduct();

async function cartCheckout() {
    /*
        localStorage.setItem("carts", JSON.stringify(cartData));
        localStorage.setItem("cartTotal", JSON.stringify(response.cartTotal));
       localStorage.setItem("carts", JSON.stringify(cartData));
            localStorage.setItem("cartTotal", JSON.stringify(response.cartTotal));
    */
    if (WebSite == "cart.php") {
        checkoutItem = "";

        jwtToken = localStorage.getItem("key");


        if (jwtToken === undefined) {
            window.location.href = "index.php";
            return false;

        }
        cartData = await cartDetail(0, "");


        localStorage.setItem("carts", JSON.stringify(cartData.data));
        localStorage.setItem("cartTotal", JSON.stringify(cartData.cartTotal));

        console.log(cartData);
        if (cartData.totalRecord > 0) {
            cartData.data.map((item) => {
                checkoutItem += " <li class='list-group-item d-flex justify-content-between lh-condensed'>";
                checkoutItem += "  <i class='fas fa-trash  delete_cart' onclick=deleteQty('" + item.qty + "','" + item.productID + "')></i><div>";

                checkoutItem += "<img src='" + item.image + "' width='60'>";
                checkoutItem += "    <h2 class='text-muted priceProduct '>" + item.productName + "</h2>";
                checkoutItem += "   </div>";
                checkoutItem += " <span class='priceProduct'><h2>" + item.price + "  Rs</h2></span>";

                checkoutItem += "   <span class='productQty'> <i class='fa fa-plus  product_Qty' id='increaseBtn-" + item.productID + "' onclick=increaseQty('" + item.qty + "','" + item.productID + "')> </i>" + item.qty + " <i class='fa fa-minus  product_Qty'  onclick=decreaseQty('" + item.qty + "','" + item.productID + "')></i></span>";
                checkoutItem += "   <span class='productQty'>" + item.qty * item.price + " Rs </span>";

                checkoutItem += " </li>";

            });

        } else {

            window.location.href = "index.php";

        }
        document.getElementById("productOrder").innerHTML = checkoutItem;
        document.getElementById("cartTotal").innerText = cartData.cartTotal.cartTotal;
        document.getElementById("gst").innerText = cartData.cartTotal.gst;
        document.getElementById("gstperc").innerText = "(" + cartData.cartTotal.gstperc + " %)";
        document.getElementById("deliveryCharge").innerText = cartData.cartTotal.deliveryCharge;
        document.getElementById("finalAmount").innerText = cartData.cartTotal.totalAmount;
        document.getElementById("discount").innerText = cartData.cartTotal.discount;
        document.getElementById("numberofcart").innerText = cartData.totalRecord;

    } else if (WebSite == "checkout.php") {

        jwtToken = localStorage.getItem("key");


        if (jwtToken == undefined) {
            window.location.href = "index.php";
            return false;

        } else {


            const jwt = jwtToken;
            const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
            const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
            const parsedJwtData = JSON.parse(decodedJwtData);
            cartData = await cartDetail(0, "");

            localStorage.setItem("carts", JSON.stringify(cartData.data));
            localStorage.setItem("cartTotal", JSON.stringify(cartData.cartTotal));
            document.getElementById("customerName").value = parsedJwtData.username;
            document.getElementById("email").value = parsedJwtData.email;
            document.getElementById("address2").value = parsedJwtData.mobile;
            if (cartData.cartTotal.code == undefined) {
                code = "No Coupon Code Applied";
            } else {
                code = cartData.cartTotal.code;
            }

            document.getElementById("couponcode").innerText = code;
            console.log(cartData);
            checkoutItem = "";
            if (cartData.totalRecord > 0) {
                cartData.data.map((item) => {
                    checkoutItem += " <li class='list-group-item d-flex justify-content-between lh-condensed'>";


                    checkoutItem += "<img src='" + item.image + "' width='60'>";
                    checkoutItem += "    <h2 class='text-muted priceProduct '>" + item.productName + "</h2>";
                    checkoutItem += "   </div>";
                    checkoutItem += " <span class='priceProduct'><h2>" + item.price + "  Rs</h2></span>";

                    checkoutItem += "   <span class='productQty'>" + item.qty + "</span>";
                    checkoutItem += "   <span class='productQty'>" + item.qty * item.price + " Rs </span>";


                    checkoutItem += " </li>";

                });
                document.getElementById("productOrder").innerHTML = checkoutItem;
                document.getElementById("cartTotal").innerText = cartData.cartTotal.cartTotal;
                document.getElementById("gst").innerText = cartData.cartTotal.gst;
                document.getElementById("deliveryCharge").innerText = cartData.cartTotal.deliveryCharge;
                document.getElementById("finalAmount").innerText = cartData.cartTotal.totalAmount;
                document.getElementById("discount").innerText = cartData.cartTotal.discount;
                document.getElementById("numberofcart").innerText = cartData.totalRecord;
                document.getElementById("gstperc").innerText = "(" + cartData.cartTotal.gstperc + "%)";
                if (cartData.cartTotal.cartTotal < cartData.cartTotal.minOrder) {

                    document.getElementById("placeOrder").disabled = true;
                    errorMsg = "<div class='alert alert-danger alert-dismissible'>";
                    errorMsg += " <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    errorMsg += " <strong>Warning!</strong> <p> Minimum Order Amount is " + cartData.cartTotal.minOrder + " Rs. </p>";
                    errorMsg += "</div>";
                    document.getElementById("errorMsg").innerHTML = errorMsg;
                } else {
                    document.getElementById("placeOrder").disabled = false;




                }
            } else {
                window.location.href = "index.php";
            }

        }
    }

}


cartCheckout();




function increaseQty(qty, product_id) {
    qty = parseInt(qty);
    qty = qty + 1;
    console.log("qty" + qty, "product_id" + product_id);
    updateCart(qty, product_id);
    buttonId = "increaseBtn-" + product_id;
    document.getElementById(buttonId).disabled = true;
    document.getElementById("increaseBtn-" + product_id).disabled = true;
    /*
     getCartItem = localStorage.getItem("carts");
    getCartTotal = localStorage.getItem("cartTotal");       getCartItem = localStorage.getItem("carts");
        getCartTotal = localStorage.getItem("cartTotal");
      */


}

function deleteQty(qty, product_id) {
    console.log(qty);
    qty = 0;

    updateCart(qty, product_id);

}

function decreaseQty(qty, product_id) {
    qty = parseInt(qty);

    if (qty >= 0) {
        qty = qty - 1;
        if (qty === 0) {
            deleteQty(qty, product_id);
            return false;
        }
        console.log("qty" + qty, "product_id" + product_id);
        updateCart(qty, product_id);
    }

    /*
     getCartItem = localStorage.getItem("carts");
    getCartTotal = localStorage.getItem("cartTotal");       getCartItem = localStorage.getItem("carts");
        getCartTotal = localStorage.getItem("cartTotal");
      */


}

async function updateCart(qty, product_id) {
    console.log("qty" + qty, "product_id" + product_id);

    cartObject = {
        productId: product_id,
        qty: qty,
        action: "update"
    }
    cartObject = JSON.stringify(cartObject);
    jwtToken = localStorage.getItem("key");

    apiurl = API_PATH + "carts.php?key=" + APIKEY;
    const CartDataBase = await fetch(apiurl, {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
        body: cartObject
    });
    replayfromdatabase = await CartDataBase.json();
    buttonId = "increaseBtn-" + product_id;
    console.log(replayfromdatabase);


    if (replayfromdatabase.status == "error") {
        statusDisplay = "alert-danger";
    } else {
        statusDisplay = "alert-success";
    }
    cartMSG = "<div class='alert " + statusDisplay + " fade in alert-dismissible show'>";
    cartMSG += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    cartMSG += "  <span aria-hidden='true' style='font-size:20px'>×</span>";
    cartMSG += "</button>" + replayfromdatabase.MSG;
    cartMSG += "</div>";
    $("#msgDisplay").html(cartMSG);
    /* cartDetail(0, "");*/

    cartCheckout();


}

function deleteItem(de) {
    var conf = confirm('Are U Sure To delete Item From cart');

    if (conf) {
        pid = de.getAttribute('data-product_id');
        quantity = 0;
        action = "update";
        addtocart(pid, quantity, action);
        if (WebSite === 'checkout.php') {
            discount = document.getElementById("discount").innerText;
            code = document.getElementById("couponcode").innerText;
        } else {
            discount = 0;
            code = "";
        }
        cartDetail(discount, code);
    }
}

cartDiscount = localStorage.getItem("cartDiscount");
cartDiscount = JSON.parse(cartDiscount);

if (cartDiscount != undefined) {
    cartDetail(cartDiscount.discount, cartDiscount.code);
} else {
    jwtToken = localStorage.getItem("key");
    if (jwtToken != undefined && jwtToken != '') {
        cartDetail(0, "");
    }
}

function decrease(de) {

    pid = de.getAttribute('data-product_id');
    qty = de.getAttribute('data-qty');
    /*price=  de.getAttribute('data-price');*/
    action = "update";
    quantity = qty - 1;
    console.log(pid);


    if (quantity == 0) {
        var conf = confirm('Are U Sure To delete Item From cart');
        if (conf) {
            addtocart(pid, quantity, action);
        }
    } else {
        addtocart(pid, quantity, action);
    }



    if (WebSite === 'checkout.php') {
        discount = document.getElementById("discount").innerText;
        code = document.getElementById("couponcode").innerText;
    } else {
        discount = 0;
        code = "";
    }
    cartDetail(discount, code);
}

function increase(de) {

    pid = de.getAttribute('data-product_id');
    qty = de.getAttribute('data-qty');
    /*price=  de.getAttribute('data-price');*/
    action = "update";
    quantity = parseInt(qty) + 1;
    addtocart(pid, quantity, action);

    if (WebSite === 'checkout.php') {
        discount = document.getElementById("discount").innerText;
        code = document.getElementById("couponcode").innerText;
    } else {
        discount = 0;
        code = "";
    }

    cartDetail(discount, code);
}

function deleteitemifnotavailavailbe(productId) {

}

function websiteLink() {
    jwtToken = localStorage.getItem("key");

    if (jwtToken != undefined) {
        const jwt = jwtToken;
        const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
        const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
        const parsedJwtData = JSON.parse(decodedJwtData);
        $("#navBar").append("<a href='myorder.php'>My Order</a><a href='myprofile.php'>My Profile</a>");
    } else {

    }
    console.log();


}


websiteLink();