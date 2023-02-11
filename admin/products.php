<?php include "header.php";





?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="productsNmae">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prices">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Available Qty</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="qty">
                                    </div>
                                </div>

                   <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <input type="text" hidden="true" class="form-control" id="id_product">

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Product Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                    Available
                      </label>
                                        </div>
                             <div class="form-check">
                   <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
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
             <p>   Qty Sold :<span id="qty_sold">13</span></p>
             <p>    Qty Remaining :<span id="qty_remaining">5</span></p>
             <p>    Revenue :<span id="revenue">5</span></p>
             <p>    Price :<span id="price">5</span></p>
                    </div>
                    <div class="modal-footer">
            
                    </div>
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->
              <button type="button" class="btn btn-primary"   onclick="add()" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add Product
              </button>
                <div class="card-body pb-0">
          
        
                  <table class="table table-borderless">
      
                    <thead>
                      <tr>
                        <th scope="col">S.No </th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                      
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody id="productDisplay">





                  </tbody>


</table>
                  </div>
                 </div>


                </div>
</div>
</section>

</main>

<?php include "footer.php"?>
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

        
  const inventory=await fetch("http://localhost/groceryWebsite/api/products.php?key=avdfheuw23");
const jsonInventory=await inventory.json();
console.log(jsonInventory.data);
  console.log("helle"+Math.floor(Math.random()*10+1));
let html="";

jsonInventory.data.map((item,key)=>{

if(item.status==1){
  status="Active";
  badgeColor="bg-success";
}else{
  status="Deactive";
   badgeColor="bg-danger";
}

  console.log(item.ProductImage);
  html+="<tr>";
html+="<td>"+(key+1)+"</td>";
html+="<td>"+capitalize(item.productName)+"</td>";
html+="<td>"+item.price+" Rs </td>";
html+="<td><img class='productsImage' src='"+item.ProductImage+"'></td>";
html+="<td><span class='badge "+badgeColor+"'>"+status+"</span></td>";
html+="<td><button  class='btn btn-primary'  onclick='edit("+item.id+")'  data-bs-toggle='modal' data-bs-target='#largeModal' type='button'>Edit</button></td>";
html+="<td> <button type='button' onclick='view("+item.id+")' class='btn btn-primary'data-bs-toggle='modal'  data-bs-target='#ExtralargeModal'>View</button></td>";
html+="</tr>";
});


document.getElementById("productDisplay").innerHTML=html;
}
async function edit(id){
document.getElementById("formHeading").innerText="Edit Product";
const inventory=await fetch("http://localhost/groceryWebsite/api/products.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
const productName=jsonInventory.data[0].productName;
document.getElementById("prices").value=jsonInventory.data[0].price;
document.getElementById("productsNmae").value=productName;
document.getElementById("qty").value=jsonInventory.data[0].qty;
document.getElementById("id_product").value=id;
document.getElementById("formFile").required=false;
if(jsonInventory.data[0].status==0){
document.getElementById("gridRadios2").checked=true;

document.getElementById("gridRadios1").checked=false;
}else{
  document.getElementById("gridRadios1").checked=true;
  document.getElementById("gridRadios2").checked=false;
}
console.log(id);
}
 async function view(key){
  console.log("d"+key+Math.random()*100);
  const inventory=await fetch("http://localhost/groceryWebsite/api/products.php?key=avdfheuw23&id="+key);
const jsonInventory=await inventory.json();
const productName=capitalize(jsonInventory.data[0].productName);
 document.getElementById("productNmae").innerText=productName;
 document.getElementById("qty_sold").innerText=jsonInventory.data[0].qty_sold;
 document.getElementById("qty_remaining").innerText=jsonInventory.data[0].qty_remaining;
 document.getElementById("revenue").innerText=jsonInventory.data[0].revenue+" Rs  ";
document.getElementById("price").innerText=jsonInventory.data[0].price+"  Rs ";

console.log(productName);
console.log(jsonInventory);

}
displayProduct();
var form = document.getElementById("formProduct");
function add(){

document.getElementById("formFile").required=true;
// Trigger the reset method on the form

// Trigger the reset method on the form

document.getElementById("formHeading").innerText="Add Product";
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
  let file = document.querySelector("#formFile").files[0];



var available=document.getElementById("gridRadios1").checked;
  if(available==true){
    available=1;
  }else{
    available=0;
  }

requiredCheck=document.getElementById("formFile").required;


    if(file==undefined && requiredCheck==true){
      displayMsg("Please Product Image",'error');

      return false;
    }
    if(file!=undefined){
        fileType=file.type;
    const ValidFile = ["image/jpeg", "image/png"];
validImage=ValidFile.includes(fileType);
if(validImage!=true){
  displayMsg("Invalid Image Type",'error');

return false;
}
    }

 let price= document.getElementById("prices").value;
let ProductName=document.getElementById("productsNmae").value;

ProductName=ProductName.trim();
let qty =document.getElementById("qty").value;
let productId=document.getElementById("id_product").value;
if(productId==""){
  productId=0;
}

if(productId==0){
     productMethod="POST";
}else{
  productMethod="PUT";
}

validProductName=validInput(ProductName,/[A-Za-z]+$/,"Invalid Product Name ","product Name");
validProductQty=validInput(qty,/[0-9]$/,"Invalid Product Qty ","product qty");
validProductPrice=validInput(price,/[0-9]$/,"Invalid Product Price ","product price");

console.log(validProductName);
console.log(validProductQty);
if(validProductName!=false && validProductQty!=false && validProductPrice!=false){
  console.log(file);
formData.append("file", file);
formData.append("productName",ProductName);
formData.append("qty",qty);
formData.append("price",price);
formData.append("pid",productId);
formData.append("productStatus",available);
console.log(formData);
const inventory=await fetch("http://localhost/groceryWebsite/api/products.php?key=avdfheuw23",
{

  method:"POST",
  body:formData
});
const dataResponse=await inventory.json();
console.log(dataResponse);


if(productId==0 && dataResponse.status=="success" ){
form.reset();
}
displayMsg(dataResponse.msg,dataResponse.status);

displayProduct();
}


}

</script>
