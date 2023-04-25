<?php include "header.php";





?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
      
          <li class="breadcrumb-item ">Products</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
    <div class="row"    id="OrdersColumn">
  <div class="col-sm-4">

<input type="text" id="vendor_name" class="form-control mt-3" placeholder="Product Name " min="-1day" max="+1day">
</div>


<div class="col-sm-4" id="submitBTN">
<button class="btn btn-primary mt-3"  id="searchBTN" >Search</button>
</div>
</div>
    <button type="button" class="btn btn-primary"   onclick="add()" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add Product
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
                <label for="inputNumber" class=" col-form-label">Product Description</label>
                <div class="quill-editor-full">
                <p>Hello World!</p>
                <p>This is Quill <strong>full</strong> editor</p>
              </div>

                <input type="text" hidden="true" class="form-control" id="id_product">
          

                


                                <fieldset class="row mb-3">
                                    <legend class="col-form-label  pt-0">Product Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input  type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label  for="gridRadios1">
                    Available
                      </label>
                                        </div>

                             <div class="form-check">
                   <input  type="radio" name="gridRadios" id="gridRadios2" value="option2">
                             <label  for="gridRadios2">
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

                <div id="productInvdetail"></div>
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
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                      
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                     
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.core.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.13/dist/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
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
  var LsId = localStorage.getItem("id");
        console.log("adminTitle");

        LsId = JSON.parse(LsId);
        Token=LsId.token;


        var jwt = Token;
        var jwtData = jwt.split('.')[1]; // Get the data section of the JWT
        var decodedJwtData = atob(jwtData); // Decode the base64-encoded data
        var parsedJwtData = JSON.parse(decodedJwtData);
         role=parsedJwtData.role;  
         id=parsedJwtData.id;  
         if(role==0){
          adminType="admin";
          id=0;  
         }else{
          adminType="vendor";
          id=parsedJwtData.id;  
         }
async  function  displayProduct(productName=""){

        
  const inventory=await fetch(API_PATH+"products.php?key=avdfheuw23&vendor="+adminType+"&vendor_id="+id+"&productName="+productName);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
  console.log("helle"+Math.floor(Math.random()*10+1));
let html="";
if(jsonInventory.totalRecord > 0 ){
jsonInventory.data.map((item,key)=>{

if(item.status==1){
  status="Active";
  badgeColor="btn-success";
}else{
  status="Deactive";
   badgeColor="btn-danger";
}

  console.log(item.ProductImage);
  html+="<tr>";
html+="<td>"+(key+1)+"</td>";
html+="<td>"+capitalize(item.productName)+"</td>";
html+="<td>"+item.price+" Rs </td>";
html+="<td><img class='productsImage' src='"+item.ProductImage+"'></td>";
html+="<td><button class='btn "+badgeColor+"'>"+status+"</button></td>";
html+="<td><button  class='btn btn-primary'  onclick='edit("+item.id+")'  data-bs-toggle='modal' data-bs-target='#largeModal' type='button'>Edit</button></td>";
html+="<td> <button type='button' onclick='view("+item.id+")' class='btn btn-primary'data-bs-toggle='modal'  data-bs-target='#ExtralargeModal'>View</button></td>";
html+="<td><button onclick='downloadReportProduct("+item.id+")' class='btn btn-outline-primary'>Download Product Sell Report</button></td>";
html+="</tr>";
});


document.getElementById("productDisplay").innerHTML=html;
}else{
  html="<tr>";
  html+="<td colspan='7' class='text-center text-danger'>No Product</td>";
  html+="<tr>";
  document.getElementById("productDisplay").innerHTML=html;
}
}
async function edit(id){
document.getElementById("formHeading").innerText="Edit Product";
const inventory=await fetch(API_PATH+"products.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
const productName=jsonInventory.data[0].productName;
document.getElementById("prices").value=jsonInventory.data[0].price;
document.getElementById("productsNmae").value=productName;

document.getElementById("qty").value=jsonInventory.data[0].productqty;
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
  const inventory=await fetch(API_PATH+"products.php?key=avdfheuw23&id="+key);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
const productName=capitalize(jsonInventory.data[0].productName);
 document.getElementById("productNmae").innerText=productName+" Pid ( "+key+" )";

 document.getElementById("qty_sold").innerText=jsonInventory.data[0].qty_sold;
 document.getElementById("qty_remaining").innerText=jsonInventory.data[0].qty_remaining;
 document.getElementById("revenue").innerText=jsonInventory.data[0].revenue+" Rs  ";
document.getElementById("price").innerText=jsonInventory.data[0].price+"  Rs ";

console.log(productName);
console.log(jsonInventory);
console.log(jsonInventory.productInven);
productInvHTML="";
productInvHTML+="<table class='table table-striped'>";
productInvHTML+="<thead>";
productInvHTML+="<tr>";
productInvHTML+="<td>S.No </td>";
productInvHTML+="<td>Month Year </td>";
productInvHTML+="<td>Qty Sold </td>";
productInvHTML+="<td>Revenue </td>";
productInvHTML+="</tr>";
productInvHTML+="</thead>";
productInvHTML+="<tbody>";
jsonInventory.productInven.map((item,i)=>{
productInvHTML+="<tr>";
productInvHTML+="<td>"+(i+1)+"</td>";
productInvHTML+="<td>"+item.monthorder+" </td>";
productInvHTML+="<td>"+item.qty_sold+" </td>";
productInvHTML+="<td>"+item.revenue+" Rs </td>";
productInvHTML+="</tr>";
});
productInvHTML+="</tbody>";
productInvHTML+="</table>";
document.getElementById("productInvdetail").innerHTML=productInvHTML;
   
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

  jwtToken = localStorage.getItem("id");
jwtToken = JSON.parse(jwtToken);
jwtToken = jwtToken.token;
var jwts = jwtToken;
var jwtData = jwts.split('.')[1]; // Get the data section of the JWT
var decodedJwtData = atob(jwtData); // Decode the base64-encoded data
var parsedJwtData = JSON.parse(decodedJwtData);


    admin_id=parsedJwtData.id;

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
    id=parsedJwtData.id;
formData.append("admin_id",id);
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
formData.append("productqty",qty);
formData.append("price",price);
formData.append("pid",productId);
formData.append("productStatus",available);


console.log(formData);
const inventory=await fetch(API_PATH+"products.php?key=avdfheuw23",
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

var Btn = document.querySelector('#searchBTN');
Btn.addEventListener("click",function(){
let productName= document.getElementById("vendor_name").value;
 if(productName!=""){
  
displayProduct(productName);
 }else{
  displayProduct();
 }
});

async function downloadReportProduct (id)  {
  var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Revenue (Rs)', style: 'tableHeader' },{ text: 'Qty Sold', style: 'tableHeader' }];

TotalEarning=[];
currDate=new Date().toLocaleString("en-US",{month:"long",day:"numeric",year:"numeric",minute:"numeric",hour:"numeric"}).replace("at"," ");
const inventory=await fetch(API_PATH+"products.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
console.warn(jsonInventory);
data=jsonInventory.productInven;
const productName=capitalize(jsonInventory.data[0].productName);
var docDefinition = {

  content: [
   { text:' Sell Report For '+productName, style: 'header' ,align:"center"},
   { text:' Qty Sold :'+jsonInventory.data[0].qty_sold, style: 'header' ,align:"center"},
   { text:' Qty Remaining :'+jsonInventory.data[0].qty_remaining, style: 'header' ,align:"center"},
   { text:' Revenue :'+jsonInventory.data[0].revenue +" Rs", style: 'header' ,align:"center"},
    {
      table: {
        headerRows:2,
        widths: ['*', '*','*','*'],
        body: [


       headerPdf
        
             
        ,
  
          ...data.map(function (item,index) {
console.log(index+1);


TotalEarning.push(item.earning);


            IndexPdf=index+1;

            return [IndexPdf,item.monthorder,item.revenue,item.qty_sold];
         


          })
        ]
  
      },
    
  }

    
  
  ],
  styles: {
      header: {
         fontSize: 22,
         bold: true,
         alignment: 'center',
         fontWeight:900
       
      },
      tableHeader:{
      bold: true

      },
    }
};

// download the PDF document
pdfMake.createPdf(docDefinition).download("product_inventory_report"+".pdf");

}
</script>
