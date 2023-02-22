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
WebSite = WebSite.replace('http://localhost/grocery/', '');
WebSite.replace('?', '');



function cartDetail() {
    urlCart = "http://localhost/groceryWebsite/api/carts.php?key=" + APIKEY;
    jwtToken = localStorage.getItem("key");
    fetch(urlCart, {
        method: "GET",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
    }).then(function(res) {
        return res.json();
    }).then(function(response) {

        console.log(response);

        cartData = response.data;
        localStorage.setItem("carts", JSON.stringify(cartData));

        $("#Shopping_container").html('');

        cartHTML = "";
        for (i in cartData) {

            productPath = cartData[i].image;
            pid = cartData[i].productID;
            qty = cartData[i].qty;
            price = cartData[i].price;
            cartHTML += "<div class='box'>";

            cartHTML += "<i class='fas fa-trash' data-product_id='" + pid + "' onclick=deleteItem(this)></i>";


            cartHTML += "<div class='content'>";

            cartHTML += "<h3>" + cartData[i].productName + "</h3>";
            cartHTML += "<span class='price'>Rs" + price + "/-</span>";
            cartHTML += "</span>";

            cartHTML += "<span class='quantity'  id='qty-" + pid + "'>qty:";

            cartHTML += "<i class='fa fa-plus inc' onclick=increase(this)  data-qty='" + qty + "' data-price='" + price + "' data-action='in' data-product_id='" + pid + "'></i>";

            cartHTML += qty;

            cartHTML += "<i class='fa fa-minus de' onclick=decrease(this)   data-qty='" + qty + "' data-price='" + price + "' data-action='de' data-product_id='" + pid + "'></i>";





            cartHTML += "</span>";
            cartHTML += "</div>";
            cartHTML += "</div>";






        }

        console.log(response.cartTotal.cartTotal);

        var checkoutBTN = "<a href='http://localhost/grocerywebsite/checkout.php' class='btn-product' id='nextStep'> Checkout </a>";

        document.getElementById("checkout_btn").innerHTML = checkoutBTN;

        document.getElementById("Shopping_container").innerHTML = cartHTML;

        document.getElementById("cartDisplayTotal").innerText = "Cart Total " + response.cartTotal.cartTotal + " Rs";


        /* cart  total : <span id="cartTotal"></span> 
        deliveryCharge :<span id="deliveryCharge"></span> <br>
        Gst :<span id="gst"></span>  <br>
        Order Total :<span id="orderAmount"></span>
      cartTotalDisplay=   document.getElementById("cartDisplayTotal");
    cartDisplayTotal
         console.log(cartTotalDisplay);
        */
    });

}

function deleteItem(de) {
    var conf = confirm('Are U Sure To delete Item From cart');

    if (conf) {
        pid = de.getAttribute('data-product_id');
        quantity = 0;
        action = "update";
        addtocart(pid, quantity, action);
        cartDetail();
    }
}
cartDetail();

function decrease(de) {

    pid = de.getAttribute('data-product_id');
    qty = de.getAttribute('data-qty');
    /*price=  de.getAttribute('data-price');*/
    action = "update";
    quantity = qty - 1;
    console.log(pid);
    addtocart(pid, quantity, action);
    cartDetail();
}

function increase(de) {

    pid = de.getAttribute('data-product_id');
    qty = de.getAttribute('data-qty');
    /*price=  de.getAttribute('data-price');*/
    action = "update";
    quantity = parseInt(qty) + 1;
    addtocart(pid, quantity, action);
    cartDetail();
}
/*cartDetail();*/
function addtocart(id, quantity, action) {
    var productId = id;
    var productQty = quantity;
    cartObject = {
        productId: productId,
        qty: productQty,
        action: action
    }
    cartObject = JSON.stringify(cartObject);
    console.log(cartObject);
    jwtToken = localStorage.getItem("key");


    if (jwtToken === undefined) {
        swal("Oops", "Please Login to Add To Cart", "error");
        return false;
    }
    console.log(jwtToken);








    apiurl = "http://localhost/groceryWebsite/api/carts.php?key=" + APIKEY;
    fetch(apiurl, {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${jwtToken}`

        },
        body: cartObject
    }).then(function(response) {

        return response.text();
    }).then(function(text) {
        console.log(text);
        cartDetail();
        /*
                    data = text.cartData.data;
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





function displayProduct() {

    searchItem = "";
    apiurl = "http://localhost/groceryWebsite/api/products.php?key=" + APIKEY;
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
          </div>*/




    });
}

/*
displayProduct();
*/
function showItem(item, index, arr) {

}