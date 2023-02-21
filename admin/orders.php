<?php include "header.php";





?>
  <main id="main" class="main">
        <?php


         ?>
    

              <div class="modal fade" id="smallModal" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Chnage Order Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <form>
                          Choose Rider  <select class="form-select" id="riders"></select></br>
                          Choose Order Status  <select class="form-select" id="orderStatus"><option>Select  Rider </option></select></br>
                          <input type="hidden" id="order_id"></br>
                       </form>
                    </div>
                    <div id="errs"></div>
                    <div class="modal-footer">
             
                      <button type="button" class="btn btn-primary" onclick="updateOrderStatus()">Update Status</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Small Modal-->

<button type='button'  class='btn btn-primary' onclick="downloadAllOrderReport()">Print All Orders Detail</button>
   <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="productNmae"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
             <p>   Customer Name :<span id="customer_name"></span></p>
             <p>  Customer Mobile :<span id="customer_mobile"></span></p>
             <p>     Delivery Address :<span id="address"></span></p>
             <p>   Order Date :<span id="order_date"></span></p>
             <p>   Order Time :<span id="order_time"></span></p>
             <p>   Order Amount :<span id="order_amount"></span></p>
             <p id="rider_info">  Rider Name :<span id="rider_name"></span></p>
             <p>  Rider Number :<span id="rider_number"></span></p>
             <p>  Order Status :<span id="order_status">
             <button type="button" class="btn btn-danger mb-2" fdprocessedid="7s2u1d"  id="orderStatusBtn">
                Danger 
              </button>



             </span></p>
             <p>  Coupon Code :<span id="coupon_code"></span></p>
             <p>  Discount :<span id="discount"></span></p>
             <p>  GST paid :<span id="gst"></span></p>
             <table class="table table-borderless"">
             
             <thead>
             <tr>
                    <td>S.No</td>
              <td>Product Name</td>
              <td> Qty </td>
                </tr>
</thead>
<tbody  id='orderItemdetail'>
       
</tbody>
</table>
                    </div>
                    <div class="modal-footer">
            
                    </div>
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->

    <div class="pagetitle">
      <h1>Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">order </li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">

<div class="row">
    <div class="col-12">
              <div class="card  overflow-auto">
       

       

         

    
              
                            <!-- End Horizontal Form -->




                <div class="card-body pb-0">
          
        
                  <table class="table table-borderless">
      
                    <thead>
                      <tr>
                        <th scope="col">S.No </th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order ID </th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">View </th>
                        <th scope="col">Edit </th>
                        <th scope="col">Print Invoice </th>
                      </tr>
                    </thead>
                    <tbody  id="orders">
             



                  </tbody>


</table>
                  </div>
                 </div>


                </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>
 
async function displayOrder(){

  var  inventory=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23");
var jsonInventory=await inventory.json();
console.log(jsonInventory);

orderHTML="";
jsonInventory.data.map((item,key)=>{
orderHTML+="<tr>";
orderHTML+="<td>"+(key+1)+"</td>";
orderHTML+="<td>"+item.orderDate+"</td>";
orderHTML+="<td>"+item.orderID+"</td>";
orderHTML+="<td>"+item.customer_name+"</td>";

orderHTML+="<td><button type='button'  onclick=view("+item.orderID+")  class='btn btn-primary'data-bs-toggle='modal'  data-bs-target='#ExtralargeModal'>View</button></td>";
if(item.order_status!=5)
{
  if(item.order_status!=6){
orderHTML+="<td><button type='button'  onclick=updateOrder("+item.orderID+")  class='btn btn-primary'data-bs-toggle='modal'  data-bs-target='#smallModal'>Update Status</button></td>";

  }else{
    orderHTML+="<td><button type='button'    class='btn btn-danger' >"+item.OrderStatus+"</button></td>";
  }

}else{
orderHTML+="<td><button type='button'    class='btn btn-success' >"+item.OrderStatus+"</button></td>";
}

orderHTML+="<td><button type='button'  onclick=downloadInvoice("+item.orderID+")  class='btn btn-primary'>Download Invoice</button></td>";
orderHTML+="</tr>";
});
document.getElementById("orders").innerHTML=orderHTML;

}

displayOrder();



async  function downloadAllOrderReport(){
  var  inventory=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23");
var jsonInventory=await inventory.json();
console.log(jsonInventory);
var headerPdf= [{ text: 'S.No', style: 'tableHeader' },
{ text: 'Order Status', style: 'tableHeader' },{ text: 'Order Date', style: 'tableHeader' },
{ text: 'Order ID', style: 'tableHeader' },{ text: 'Order Amount', style: 'tableHeader' }
];

currentDate=new Date();
currentDate=new Date().toLocaleString([],{month:"long",day:"numeric",year:"numeric",hour12:true,hour:"numeric",minute:"numeric"});
alert(currentDate);
var docDefinition = {

content: [

  { text:'All Order Report', style: 'header' ,align:"center"},
  {
    table: {
      headerRows:2,
      widths: ['*', '*','*','*','*'],
      body: [


     headerPdf
      
           
      ,

        ...jsonInventory.data.map(function (item,index) {
console.log(index+1);




          IndexPdf=index+1;
      orderDate=new Date(item.orderDate).toLocaleDateString([],{day:"numeric",month:"short",year:"numeric"}).replaceAll(" ","-");
      orderDate=new Date(item.orderDate).toLocaleDateString([],{day:"numeric",month:"short",year:"numeric"}).replaceAll(",","-");
          return [IndexPdf,item.OrderStatus,orderDate,item.orderID,item.totalAmount];
      


        })
      ]

    }
  },


]



};

pdfMake.createPdf(docDefinition).download("all order Invoice"+".pdf");


}





async function view(id){
 document.getElementById("productNmae").innerHTML="Order Id "+id;
 const inventory=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
let OrderStatus= jsonInventory.data[0].order_status;
let Order_Status= jsonInventory.data[0].OrderStatus;
if(OrderStatus==5){
  OrderStatusClass="btn btn-success";

}else if(OrderStatus===6){
  OrderStatusClass="btn btn-danger";

}else{
  OrderStatusClass="btn btn-primary";
}





let OrderStatusBadge= jsonInventory.data[0].OrderStatus;
document.getElementById("customer_name").innerText=jsonInventory.data[0].customer_name;
document.getElementById("customer_mobile").innerText=jsonInventory.data[0].customer_mobile;
document.getElementById("address").innerText=jsonInventory.data[0].deliveryAddress;
document.getElementById("order_date").innerText=jsonInventory.data[0].orderDate;
document.getElementById("order_amount").innerText=jsonInventory.data[0].totalAmount+" Rs";
document.getElementById("order_time").innerText=jsonInventory.data[0].order_time;
currDate=new Date().toLocaleString("en-US",{minute:"numeric",hour:"numeric"}).replace("at"," ");
RiderName=jsonInventory.data[0].rider_name;
if(RiderName==null){
  RiderName="No Rider Assigned";
}
RiderNumber=jsonInventory.data[0].rider_number;
if(RiderNumber==null){
  RiderNumber="No Rider Assigned";
}
ordersproductHTML="";
jsonInventory.products.map((orderItems,i)=>{
  ordersproductHTML+="<tr>";
  ordersproductHTML+="<td>"+(i+1)+"</td>";
  ordersproductHTML+="<td>"+orderItems.productName+"</td>";
  ordersproductHTML+="<td>"+orderItems.qty+"</td>";
  ordersproductHTML+="</tr>";
});
document.getElementById("orderItemdetail").innerHTML=ordersproductHTML;
document.getElementById("rider_number").innerText=RiderNumber;
document.getElementById("rider_name").innerText=RiderName;
document.getElementById("orderStatusBtn").className=OrderStatusClass;
document.getElementById("orderStatusBtn").innerText=Order_Status;
document.getElementById("coupon_code").innerText=jsonInventory.data[0].couponCode;
document.getElementById("gst").innerText=jsonInventory.data[0].gst;
document.getElementById("discount").innerText=jsonInventory.data[0].discount;




}
async function downloadInvoice(id){
  const inventory=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23&id="+id);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Product Name', style: 'tableHeader' }, { text: 'Qty', style: 'tableHeader' }];
RiderName=jsonInventory.data[0].rider_name;
if(RiderName==null){
  RiderName="No Rider Assigned";
}
RiderNumber=jsonInventory.data[0].rider_number;
if(RiderNumber==null){
  RiderNumber="No Rider Assigned";
}
currentDate=new Date();
currentDate=currentDate.toLocaleString([],{month:"long",day:"numeric",year:"numeric",hour12:true,hour:"numeric",minute:"numeric"});
alert(currentDate);
var docDefinition = {

content: [
  { text:'Order Invoice', style: 'header' ,align:"center"},
  {text:"Customer Name :"+jsonInventory.data[0].customer_name},
  {text:"Customer Number :"+jsonInventory.data[0].customer_mobile},
  {text:"Delivery Address :"+jsonInventory.data[0].deliveryAddress},
  {text:"Order Amount :"+jsonInventory.data[0].totalAmount+" Rs"},
  {text:"Order Date :"+jsonInventory.data[0].orderDate},
  {text:"Order Status :"+jsonInventory.data[0].OrderStatus},
  {text:"Order Time :"+jsonInventory.data[0].order_time},
  {text:"Rider Name :"+RiderName},
  {text:"Rider Number :"+RiderNumber},
    { text:'Product Detail', style: 'header' ,align:"center"},
  {
    table: {
      headerRows:2,
      widths: ['*', '*','*'],
      body: [


     headerPdf
      
           
      ,

        ...jsonInventory.products.map(function (item,index) {
console.log(index+1);




          IndexPdf=index+1;

          return [IndexPdf,item.productName,item.qty];
      


        })
      ]

    }
  },
  {text:"Invoice For Order No "+id},
  {text:"Generate At :"+currentDate}
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
pdfMake.createPdf(docDefinition).download("order Invoice"+".pdf");








}
async function updateOrder(id){
  console.log(id);
  const inventory=await fetch("http://localhost/groceryWebsite/api/get_ridera_and_order_status.php?key=avdfheuw23");
const jsonInventorys=await inventory.json();
const current=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23&id="+id);
const currentOrder=await current.json();
console.log(currentOrder);
console.log(jsonInventorys);

OrderStatusCurrent=currentOrder.data[0].OrderStatus;
OrderStatusRider=currentOrder.data[0].rider_name;
RiderHTML="";
RiderHTML+="<option value='0'> Select Rider </option>";
jsonInventorys.riders_active.map((item,key)=>{
if(OrderStatusRider===item.username){
  RiderHTML+="<option value="+item.id+" selected>"+item.username+"</option>";
}else{
 if(OrderStatusRider!=item.username){
  RiderHTML+="<option value="+item.id+">"+item.username+"</option>";
 }
}
 
});

document.getElementById('riders').innerHTML=RiderHTML;
orderStatusHTML="";
  orderStatusHTML+="<option value='0'> Select Order Status</option>";
jsonInventorys.orderStatus.map((item,key)=>{

  if(OrderStatusCurrent===item.status){
  orderStatusHTML+="<option selected value="+item.status_id+">"+item.status+"</option>";

  }else{
    if(OrderStatusCurrent!=item.status){


    orderStatusHTML+="<option value="+item.status_id+">"+item.status+"</option>";
    }
  }
});
document.getElementById("order_id").value=id;
document.getElementById("orderStatus").innerHTML=orderStatusHTML;
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
document.getElementById("errs").innerHTML=html;

}
async function updateOrderStatus(){
  let rider_id=document.getElementById("riders").value;
let order_status=  document.getElementById("orderStatus").value;
 let    order_id = document.getElementById("order_id").value;

  
 if(order_status==0 ){
  displayMsg("Please Select Order Status","error");

return false;
 }

    if(rider_id==0   &&   order_status==5 ){

    displayMsg("Please Select Rider For Order To Be Delivered","error");

    return false;
   }
  
  alert(order_status);
  OrderStatusObj={
     order_id:order_id,
     orderSt:order_status,
     RiderId:rider_id,
     type:"order_status"
  };
  OrderStatusObj=JSON.stringify(OrderStatusObj);
  var LsId = localStorage.getItem("id");
        LsId = JSON.parse(LsId);

      jwtToken=LsId.token;
 
      sendRequest=await fetch("http://localhost/groceryWebsite/api/orders.php?key=avdfheuw23",
      {method:"POST",
        
        headers: {
    'Authorization': `Bearer ${jwtToken}`,
    'Content-Type': 'application/json'
  },

        body:OrderStatusObj});
      sendRequestText=  await   sendRequest.text();
console.log(      sendRequestText);
      displayOrder();
      console.log( sendRequestText);
}



</script>

<?php include "footer.php"?>
