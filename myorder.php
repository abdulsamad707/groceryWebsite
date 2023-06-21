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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="assets/js/constant.js"></script>
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
OrderCustomerDisplay="<tr><td>No Order Found</td></tr>";
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
        OrderCustomerDisplay+="</tr>";
        });

       }
      document.getElementById("customerorderdisplay").innerHTML=OrderCustomerDisplay;
console.log(OrderCustomerDisplay);

    });
}

myOrder();
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