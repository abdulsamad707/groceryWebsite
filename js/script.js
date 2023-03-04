const APIKEY = "avdfheuw23";

let searchForm = document.querySelector('.search-form');
let shoppingCart = document.querySelector('.shopping-cart');
let loginForm = document.querySelector('.login-form');
let regForm = document.querySelector('.reg-form');
let regFormdata = document.querySelector('.regForm');

let navbar = document.querySelector('.navbar');
document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
}
regForm.onclick = () => {
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    regFormdata.classList.toggle('active');
}



document.querySelector('#cart-btn').onclick = () => {
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
}


document.querySelector('#login-btn').onclick = () => {
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
}






document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    regFormdata.classList.remove('active');
}

window.onscroll = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
$("#SubmitBtn").click(function(e) {

});

loginBTN = document.getElementById("loginBTN");
loginBTN.addEventListener("click", function(e) {


    e.preventDefault();
    var userEmail = document.getElementById("userEmail").value;
    var userPassword = document.getElementById("userPassword").value;

    loginObj = {
        email: userEmail,
        password: userPassword
    };

    loginObj = JSON.stringify(loginObj);



    apiurl = "http://localhost/groceryWebsite/api/login.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "POST",
        body: loginObj
    }).then(function(res) {

        return res.json();
    }).then(function(response) {
        console.log(response);

        if (response.key != undefined) {
            localStorage.setItem("key", response.key);
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



registerComplete = document.getElementById("register");
registerComplete.addEventListener("click", function(e) {
    e.preventDefault();
    this.setAttribute("disabled", true);
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
    if (!PassWordPattern.test(UserPassword)) {

        swal('Oops', 'Wrong Password Format Must Contain Special Character And AlphaNumeric', 'error');


        return false;
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

    urlReg = "http://localhost/grocery/api/userregister.php?key=6CU1qSJfcs";
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
            this.setAttribute("disabled", false);
            var http_code = json.http_code;
            var operation = json.operationStatus;
            var msg = json.message;
            if (operation === "success") {
                swal("Good job!", msg, operation);
            } else {
                swal("Oops!", msg, operation);
            }


        }
    })

});

/*
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
       url:'http://localhost/grocery/api/userregister.php?key=6CU1qSJfcs',
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
          
           
       }*/






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

WebSite = location.href;
WebSite = WebSite.replace('http://localhost/grocerywebsite/', '');
token = localStorage.getItem("key");
if (token != undefined && WebSite != 'index.php') {
    WebSite = WebSite.replaceAll('?token=' + token, '');
} else {
    WebSite = WebSite;
}
alert(WebSite);

function checkout() {
    token = localStorage.getItem("key");
    window.location.href = "http://localhost/grocerywebsite/checkout.php?token=" + token;
}

function cart() {
    token = localStorage.getItem("key");
    window.location.href = "http://localhost/grocerywebsite/cart.php?token=" + token;
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

        if (text.status === "success") {
            swal("Congrats", text.MSG, "success");
        } else {
            swal("Oops!", text.MSG, "error");
        }
        if (action === "add") {

        }
        crt = await cartDetail(0, "");
        totalItem = "<h1>You Have " + crt.totalRecord + " Item In The Cart</h1>";
        console.log(totalItem);
        document.getElementById("Shopping_container").innerHTML = totalItem;

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
    crt = await cartDetail(0, "");
    totalItem = "<h1> You Have " + crt.totalRecord + " Item In The Cart </h1>";
    console.log(totalItem);
    document.getElementById("Shopping_container").innerHTML = totalItem;
}
DisplayCartItem();




function displayProduct() {

    searchItem = "";
    apiurl = API_PATH + "products.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "GET"
    }).then(function(response) {

        return response.text();
    }).then(function(response) {
        console.log(response);
        const data = response.data;









        result = [];
        html = "";
        if (data != '') {
            for (i in data) {



                html += "<div class='swiper-slide box'>";
                html += "<img src='image/product_image/' alt=''>";
                html += "<h3>" + data[i].productName + "</h3>";
                html += "<div class='price'>" + data[i].price + "Rs /-</div>";

                html += "<a href='javascript:void(0)' onclick=addtocart('1','1','add') class='btn-product'>add to cart</a>";
                html += "</div>";



            }
        } else {
            html = "No product Found";
        }

        $("#swiper").append(html);


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

/*
displayProduct();
*/
async function cartCheckout() {
    /*
        localStorage.setItem("carts", JSON.stringify(cartData));
        localStorage.setItem("cartTotal", JSON.stringify(response.cartTotal));
       localStorage.setItem("carts", JSON.stringify(cartData));
            localStorage.setItem("cartTotal", JSON.stringify(response.cartTotal));
    */
    if (WebSite == "cart.php") {
        checkoutItem = "";
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
                checkoutItem += " </li>";

            });

        } else {

            window.location.href = "index.php";

        }
        document.getElementById("productOrder").innerHTML = checkoutItem;
        document.getElementById("cartTotal").innerText = cartData.cartTotal.cartTotal;
        document.getElementById("gst").innerText = cartData.cartTotal.gst;
        document.getElementById("deliveryCharge").innerText = cartData.cartTotal.deliveryCharge;
        document.getElementById("finalAmount").innerText = cartData.cartTotal.totalAmount;
        document.getElementById("discount").innerText = cartData.cartTotal.discount;
        document.getElementById("numberofcart").innerText = cartData.totalRecord;

    } else if (WebSite == "checkout.php") {

        jwtToken = localStorage.getItem("key");
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



                checkoutItem += " </li>";

            });
            document.getElementById("productOrder").innerHTML = checkoutItem;
            document.getElementById("cartTotal").innerText = cartData.cartTotal.cartTotal;
            document.getElementById("gst").innerText = cartData.cartTotal.gst;
            document.getElementById("deliveryCharge").innerText = cartData.cartTotal.deliveryCharge;
            document.getElementById("finalAmount").innerText = cartData.cartTotal.totalAmount;
            document.getElementById("discount").innerText = cartData.cartTotal.discount;
            document.getElementById("numberofcart").innerText = cartData.totalRecord;
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
    conf = confirm("Are You Sure To Delete ");
    if (conf) {
        updateCart(qty, product_id);
    }
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