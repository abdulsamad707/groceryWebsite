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

        <h1>My Order </h1>

    </div>

</section>
<section>


<div class="table-responsive">
  <table class="table">
       <thead>
        <tr>
            <td>S.No</td>
            <td>Order ID </td>
            <td>Order Amount </td>
            <td>Order Date  </td>
            <td>Order Status </td>
            <td>Order Time </td>
        </tr>
    </thead>
       <tbody id="customerorderdisplay">

</tbody>

  </table>
</div>

</section>

</body>
</html>

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

function myOrder() {
  /*$na71l5G4*/
  
    jwtToken = localStorage.getItem("key");
    const jwt = jwtToken;

    const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
    const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    const parsedJwtData = JSON.parse(decodedJwtData);
   const customer_id= parsedJwtData.id;
    apiurl = API_PATH + "orders.php?key=" + APIKEY+"&customer_order="+customer_id;
    console.log(    apiurl);
    console.log(parsedJwtData.id);
      fetch(apiurl, {
        method: "GET"
    }).then(function(response) 
    
    {
    return response.json();
    }).then((re)=>{
        console.log(re);
        OrderCustomerDisplay="";
       if(re.totalRecord==0){
OrderCustomerDisplay="<tr><td colspan='7' style='text-align:center'>No Order Found</td></tr>";
       }else{

        re.data.map((item,index)=>{
            SRNO=index+1;
        OrderCustomerDisplay+="<tr>";
        OrderCustomerDisplay+="<td>"+SRNO+"</td>";
        OrderCustomerDisplay+="<td>"+item.orderID+"</td>";
        OrderCustomerDisplay+="<td>"+item.totalAmount+"Rs </td>";
        OrderCustomerDisplay+="<td>"+item.orderDate+"</td>";
        OrderCustomerDisplay+="<td>"+item.OrderStatus+"</td>";
        OrderCustomerDisplay+="<td>"+item.order_time+"</td>";
        OrderCustomerDisplay+="<td><button type='button'  onclick=downloadInvoice("+item.orderID+")  class='btn '>Download Invoice</button></td>";
        OrderCustomerDisplay+="<td><button type='button'  data-toggle='modal' data-target='#ExtralargeModal' onclick= viewDetail("+item.orderID+")   class='btn '>View</button></td>";
        OrderCustomerDisplay+="</tr>";
        });

       }
      document.getElementById("customerorderdisplay").innerHTML=OrderCustomerDisplay;
console.log(OrderCustomerDisplay);

    });
}

myOrder();
async function rating(e,i,product_id){
  jwtToken = localStorage.getItem("key");
    const jwt = jwtToken;

    const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
    const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    const parsedJwtData = JSON.parse(decodedJwtData);
   const customer_id= parsedJwtData.id;
  console.log(e);
  e.style.color="red";
         console.log(product_id);
       console.warn (e.id);
       e.innerHTML="product rated";
       document.getElementById("product-"+product_id).innerHTML="You Rate "+i+" star";
}
function changeColor(e,i){
  console.log(e);
  e.style.color="red";
  
}
function backOriginal(e,i){
  e.style.color="";
}
async function checkCurrentRating(id,product_id){
  var inventory=await fetch(API_PATH+"productCurrentOrdder.php?key=avdfheuw23&id="+id+"&pid="+product_id);
var jsonInventory=await inventory.json();

Rate={
  rate:jsonInventory.rating
}

return jsonInventory;

}


async function viewDetail(id){
  var inventory=await fetch(API_PATH+"orders.php?key=avdfheuw23&id="+id);
var jsonInventory=await inventory.json();
  console.log(jsonInventory);
  document.getElementById("productNmae").innerText="Order Id "+id;
document.getElementById("qty_sold").innerText=jsonInventory.data[0].totalAmount+" Rs";
document.getElementById("qty_remaining").innerText=jsonInventory.data[0].OrderStatus;
document.getElementById("revenue").innerText=jsonInventory.data[0].orderDate;
document.getElementById("price").innerText=jsonInventory.data[0].order_time;


if(jsonInventory.data[0].rider_name!=null){
  rider_name=jsonInventory.data[0].rider_name;
}else{
  rider_name="No Rider Assigned";
}
document.getElementById("rider_name").innerText=  rider_name;
OrderHTML="<table class='table'>";
OrderHTML+="<tr>";
OrderHTML+="<td>S.No</td>";
OrderHTML+="<td>Product Name</td>";
OrderHTML+="<td>Quantity Order</td>";
OrderHTML+="<td>Unit Price(RS)</td>";
OrderHTML+="<td>Sub Total(RS)</td>";

OrderHTML+="</tr>";
jsonInventory.products.map((item,index)=>{
console.log(item);
itemno=index+1;
OrderHTML+="<tr>";
OrderHTML+="<td>"+itemno+"</td>";
OrderHTML+="<td>"+item.productName+"</td>";
OrderHTML+="<td>"+item.qty+"</td>";
OrderHTML+="<td>"+item.price+"</td>";
OrderHTML+="<td>"+item.price*item.qty+"</td>";
OrderHTML+="<td><span id=product-"+item.product_id+" >";



if(jsonInventory.data[0].order_status==5){
  OrderHTML+=" <td>";
  

if(item.rated==0){

  for(i=1; i<=5; i++){
      OrderHTML+=" <span style='font-size:20px;'>&#9734;</span>";
    }
  }else{
    OrderHTML+=" <span style='font-size:20px;'>"+ item.rated+" &#9734;</span>";
  }
  OrderHTML+=" </td>";
}





 
OrderHTML+="</span></td>";
OrderHTML+="</tr>";
})
OrderHTML+="</table>";
document.getElementById("productInvdetail").innerHTML=OrderHTML;
}
async function downloadInvoice(id){
  var inventory=await fetch(API_PATH+"orders.php?key=avdfheuw23&id="+id);
var jsonInventory=await inventory.json();
console.log("Download ");
console.log(jsonInventory);
var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Product Name', style: 'tableHeader' }, { text: 'Qty', style: 'tableHeader' },{ text: 'Unit Price (Rs)', style: 'tableHeader' },{ text: 'Sub Total (Rs)', style: 'tableHeader' }];
RiderName=jsonInventory.data[0].rider_name;
if(RiderName==null){
  RiderName="No Rider Assigned";
}
RiderNumber=jsonInventory.data[0].rider_number;
if(RiderNumber==null){
  RiderNumber="No Rider Assigned";
}
currentDate=new Date();
currentDate=currentDate.toLocaleString("en-us",{day:"numeric",month:"long",year:"numeric",hour12:true,hour:"numeric",minute:"numeric"});

var discount=jsonInventory.data[0].discount;

  CouponApply=jsonInventory.data[0].couponCode;

if(jsonInventory.data[0].deliveryCharge ==0){
deliveryCharge="Free";
}else{
  deliveryCharge=jsonInventory.data[0].deliveryCharge +" Rs";
}
var docDefinition = {

content: [
  { text:'Order Invoice', style: 'header' ,align:"center"},
  {text:"Customer Name :"+jsonInventory.data[0].customer_name},
  {text:"Customer Number :"+jsonInventory.data[0].customer_mobile},
  {text:"Delivery Address :"+jsonInventory.data[0].deliveryAddress},

  {text:"Gst :"+jsonInventory.data[0].gst+" Rs"},
  {text:"Order Amount :"+jsonInventory.data[0].totalAmount+" Rs"},
  {text:"Cart Total :"+jsonInventory.data[0].cartTotal+" Rs"},
  {text:"Order Date :"+jsonInventory.data[0].orderDate},
  {text:"Order Status :"+jsonInventory.data[0].OrderStatus},
  {text:"Order Time :"+jsonInventory.data[0].order_time},
  {text:"Delivery Charge:"+deliveryCharge},
  {text:"Rider Name :"+RiderName},
  {text:"Rider Number :"+RiderNumber},
    { text:'Product Detail', style: 'header' ,align:"center"},
  {
    table: {
      headerRows:2,
      widths: ['*', '*','*','*','*'],
      body: [


     headerPdf
      
           
      ,

        ...jsonInventory.products.map(function (item,index) {
console.log(index+1);




          IndexPdf=index+1;

          return [IndexPdf,item.productName,item.qty,item.price,item.qty*item.price];
      


        })
      ]

    }
  },
  {text:"Invoice For Order No "+id},
  {text:"Invoice Generate At :"+currentDate}
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



</script>
