<?php include "header.php";





?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Coupon</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Products</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
    <button type="button" class="btn btn-primary"   onclick="add()" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add Coupon
              </button>
<div class="row">
    <div class="col-12">
              <div class="card  overflow-auto">
       

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"  id="formHeading">Add Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <!-- Horizontal Form -->
              <form  id="formProduct"   enctype="multipart/form-data">
          <div id="errorMsgv">

           

</div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="couponCode">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Discount</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="discount">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Min Cart Value</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="min_cart_value">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Max Discount</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="max_discount">
                                    </div>
                                </div>

                   <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Coupon Type</label>
                  <div class="col-sm-10">
                  <input class="form-check-input" type="radio" name="couponType" id="perc" value="option1" checked> Percentage  
                  <input class="form-check-input" type="radio" name="couponType" id="fixed" value="option1" > Fiexed
                  <input class="form-check-input" type="radio" name="couponType"  id="deliveryoff" value="option1" > Delivery Off
                  </div>
                </div>
                <input type="text" hidden="true" class="form-control" id="id_coupon">

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Coupon  Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="avail" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                    Available
                      </label>
                                        </div>
                             <div class="form-check">
                   <input class="form-check-input" type="radio" name="gridRadios" id="notavail" value="option2">
                             <label class="form-check-label" for="gridRadios2">
                      Not Avaliable
                      </label>
                                        </div>
                                    
                                    </div>
                                </fieldset>
                             
                                <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                
                                </div>
                            </form>
                            <!-- End Horizontal Form -->



                    </div>
                    <div class="modal-footer">
                    
           
                      <button type="submit" class="btn btn-primary" onclick="submitProduct()">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->
              <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="productNmae"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
             <p>   Discount:<span id="qty_sold">13</span></p>
             <p>   Max Discount :<span id="qty_remaining">5</span></p>
             <p>  Min Cart Value :<span id="min_cart_values">5</span></p>
         
                    </div>
                    <div class="modal-footer">
            
                    </div>
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->

                <div class="card-body pb-0">
          
        
                  <table class="table table-borderless">
      
                    <thead>
                      <tr>
                        <th scope="col">S.No </th>
                        <th scope="col">Coupon Code</th>
                       
                      
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody id="productDisplay">


<?php



?>


                  </tbody>


</table>
                  </div>
                 </div>


                </div>
</div>


<?php include "footer.php"?>
<script src="assets/js/constant.js"></script>
<script>
let formData = new FormData();
/*
let file = document.querySelector("#file").files[0];
formData.append("file", file);
*/


 function  capitalize(stri){
  let str = stri;
let capitalized = str.charAt(0).toUpperCase() + str.slice(1);
   return capitalized;
  }
async  function  displayProduct(){

        
  const inventory=await fetch(API_PATH+"coupon.php?key=avdfheuw23");
const jsonInventory=await inventory.json();
console.log(jsonInventory);
  console.log("helle"+Math.floor(Math.random()*10+1));
let html="";

jsonInventory.data.map((item,key)=>{

if(item.coupon_status==1){
  status="Active";
  badgeColor="btn-success";
}else{
  status="Deactive";
   badgeColor="btn-danger";
}

  console.log(item.ProductImage);
  html+="<tr>";
html+="<td>"+(key+1)+"</td>";
html+="<td>"+capitalize(item.coupon_code)+"</td>";

html+="<td><button class='btn "+badgeColor+"'>"+status+"</button></td>";
html+="<td><button  class='btn btn-primary'  onclick='edit("+item.coupon_id+")'  data-bs-toggle='modal' data-bs-target='#largeModal' type='button'>Edit</button></td>";
html+="<td> <button type='button' onclick='view("+item.coupon_id+")' class='btn btn-primary'data-bs-toggle='modal'  data-bs-target='#ExtralargeModal'>View</button></td>";
html+="</tr>";
});


document.getElementById("productDisplay").innerHTML=html;
}
async function edit(id){
document.getElementById("formHeading").innerText="Edit Coupon";
const inventory=await fetch(API_PATH+"coupon.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
const productName=jsonInventory.data[0].max_discount;
document.getElementById("couponCode").value=jsonInventory.data[0].coupon_code;
document.getElementById("max_discount").value=productName;
document.getElementById("min_cart_value").value=jsonInventory.data[0].min_cart_value;
document.getElementById("discount").value=jsonInventory.data[0].discount;
document.getElementById("id_coupon").value=id;



if(jsonInventory.data[0].discount_type=="perc"){
  document.getElementById("fixed").checked=false;
 document.getElementById("perc").checked=true;
 document.getElementById("deliveryoff").checked==false;
}
if(jsonInventory.data[0].discount_type=="value"){
  document.getElementById("fixed").checked=true;
 document.getElementById("perc").checked=false;
 document.getElementById("deliveryoff").checked=false;
}
if(jsonInventory.data[0].discount_type=="deliveryoff"){
  document.getElementById("fixed").checked=false;
 document.getElementById("perc").checked=false;
 document.getElementById("deliveryoff").checked=true;
}
if(jsonInventory.data[0].coupon_status==1){
document.getElementById("avail").checked=true;

document.getElementById("notavail").checked=false;
}else{
  document.getElementById("notavail").checked=true;
  document.getElementById("avail").checked=false;
}
console.log(id);
}
 async function view(key){
  console.log("d"+key+Math.random()*100);
  const inventory=await fetch(API_PATH+"coupon.php?key=avdfheuw23&id="+key);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
const productName=capitalize(jsonInventory.data[0].coupon_code);
 document.getElementById("productNmae").innerText=productName+" Coupon id ( "+key+" )";


 document.getElementById("qty_remaining").innerText=jsonInventory.data[0].max_discount + " Rs";
 if(jsonInventory.data[0].discount_type="perc"){
unit="%";
 }else{
  unit="Rs";
 }

 document.getElementById("min_cart_values").innerText=jsonInventory.data[0].min_cart_value;

 document.getElementById("qty_sold").innerText=jsonInventory.data[0].discount+" "+unit;
console.log(productName);
console.log(jsonInventory);

}
displayProduct();
var form = document.getElementById("formProduct");
function add(){


// Trigger the reset method on the form

// Trigger the reset method on the form

document.getElementById("formHeading").innerText="Add Coupon";
form.reset();
}
function displayMsg(msg,type){


  if(type=="error"){
       icon="bi-exclamation-octagon";
       alertColor="alert-danger";
  }else{
        icon="bi-check-circle";
        alertColor="alert-success";
  }
  html="<div class='alert "+alertColor+" alert-dismissible fade show' role='alert'><i class='bi "+icon+" me-1'></i>"+msg+"   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' fdprocessedid='80bdwc'></button></div>";
document.getElementById("errorMsgv").innerHTML=html;

}

function validInput(input,pattern,msg,type){

 
     if(input==""){
      displayMsg("Please Provide "+type,'error');
       return false;
     }
   



     if(!pattern.test(input)){
      displayMsg(msg,'error');
      return false;
     }



}    

async function  submitProduct(){
 alert("Coupon Code ");

 couponCode=document.getElementById("couponCode").value.toUpperCase();
 max_discount=document.getElementById("max_discount").value;
min_cart_value=document.getElementById("min_cart_value").value;
id_coupon=document.getElementById("id_coupon").value;
 discount=document.getElementById("discount").value;
 fixed=document.getElementById("fixed").checked;
 per=document.getElementById("perc").checked;
 delivery=document.getElementById("deliveryoff").checked;

  if(document.getElementById("avail").checked==true){
    status=1;
  }else{
    status=0;
  }




   if(fixed==true){
    couponType="value";
   }
   if(per==true){
    couponType="perc";
   }
   if(delivery==true){
    couponType="deliveryoff";
   }
   if(id_coupon==""){
    id_coupon=0;
   }
   couponObject={
    "coupon_code": couponCode,
    "discount_type":  couponType,
    "min_cart_value":min_cart_value,
    "discount": discount,
    "max_discount": max_discount,
    "coupon_status":status,
    "id":id_coupon,
    "type":"registerCoupon"
   }
   couponObject=JSON.stringify(couponObject);
   console.log(couponObject);
alert(couponType);
const inventory=await fetch(API_PATH+"coupon.php?key=avdfheuw23",
{

  method:"POST",
  body:couponObject
});
const dataResponse=await inventory.text();
console.log(dataResponse);
displayProduct();
}

</script>
