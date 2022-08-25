let searchForm = document.querySelector('.search-form');
let shoppingCart = document.querySelector('.shopping-cart');
let loginForm = document.querySelector('.login-form');
let regForm = document.querySelector('.reg-form');
let regFormdata=document.querySelector('.regForm');

let navbar = document.querySelector('.navbar');
document.querySelector('#search-btn').onclick = () =>{
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



document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
}


document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
    regFormdata.classList.remove('active');
}






document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    regFormdata.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
$("#SubmitBtn").click(function(e){
        alert("helle");
});
$("#loginBTN").click(function(e){
  e.preventDefault();
  let data=$('#LoginFORM').serializeArray();
  const userEmail=$("#userEmail").val();
  const userPassword=$("#userPassword").val();
     loginObj={};
     for (i=0; i< data.length; i++){
      fieldName=data[i].name;
      fieldValue=data[i].value;
      loginObj[fieldName]=fieldValue;
     }
     loginObj=JSON.stringify(loginObj);
     $.ajax({
      method:'POST',
      url:'http://localhost/grocery/api/login_api.php?key=6CU1qSJfcs',
       data:loginObj,
      success:function(response){
       console.log(response.message);
      }
    });

});
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
            console.log($(this));*/
          }
   
  
      }
      obj=JSON.stringify(obj);
      $(this).prop("disabled",true);
      $.ajax({
       method:'POST',
       url:'http://localhost/grocery/api/userregister.php?key=6CU1qSJfcs',
        data:obj,
       success:function(response){
        console.log(response);
          
           var code=response.code;
       var http_code=response.http_code;
           
        if(http_code==200){
          var http_code=response.http_code;
          const operation= response.operationStatus;
          const msg= response.message;
            if(operation==="success"){
          swal("Good job!", msg, operation);
            }else{
              swal("Oops!",msg, operation);
            }
          $("#register").prop("disabled",false);
        }
          

           
       }
      });
 
      


});

var swiper = new Swiper(".product-slider", {
    loop:true,
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
    loop:true,
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






const  addtocart= (id,quantity) => {
  const productId=id;
  const productQty=quantity;
    cartObject={
      productId:productId,
      qty:productQty
    }
    cartObject=JSON.stringify(cartObject);
   apiurl="http://localhost/grocery/api/update_add_cart.php?key=6CU1qSJfcs";
        fetch(apiurl,{
      method:"POST",
      body:cartObject
        }).then(function(response){

         return response.text();
        }).then(function(text){


          console.log(text);
        }).catch(function(e){

        });
}

function initMap() {
  currentLongitude=67.1111;
  currentLatitude=24.9283;
  const map = new google.maps.Map(document.getElementById("map"), {
 
    center: { lat:currentLatitude, lng:currentLongitude },
    zoom: 15,
  });
}