<?php include "header.php";





?>
  <main id="main" class="main">
        <?php


         ?>


    <div class="pagetitle">
      <h1>Vendor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Vendors</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">

<div class="row">
    <div class="col-12">
              <div class="card  overflow-auto">
       

              <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-center" id="vendor_name">Extra Large Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>Mobile Number : <span id="vendor_mobile">  </span> </p>
                    <p>Total Earning : <span id="vendor_total_earning">  </span> Rs</p>
                    <p>Total Product In the Store : <span id="vendor_total_product">  </span>  </p>

                    <p><h5>Product Inventory</h5></p>
                        <table  class="table table-borderless">
                          <thead>
                          <tr>
                          <td>S.No</td>
                            <td>Product Name</td>
                         
                            
                            <td>Revenue</td>
                          </tr>
         
                        </thead>
                        <tbody id="produtEarning">
</tbody>
        </table>

                    <p><h5>Earning Inventory</h5></p>
                    <table class="table table-borderless">
                          <thead>
                          <tr>
                          <td>S.No</td>
                            <td>Month Year</td>
                            <td>Earning</td>
                            
                          
                          </tr>
                        </thead>
                      <tbody id ="earningdetail"></tbody>
        </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                    </div>
                  </div>
                </div>
              </div>

    
              
                            <!-- End Horizontal Form -->




                <div class="card-body pb-0">
          
        
                  <table class="table table-borderless">
      
                    <thead>
                      <tr>
                        <th scope="col">S.No </th>
                        <th scope="col">Users Name</th>
                       
                        <th scope="col">Users Mobile</th>
                        <th scope="col">Earning</th>
                        <th scope="col">View Detail</td>
                      </tr>
                    </thead>
                    <tbody  id="users">
             



                  </tbody>


</table>
                  </div>
                 </div>


                </div>
</div>


<?php include "footer.php"?>
<script src="assets/js/constant.js"></script>
<script>


function capitalizeFirstWord(str) {
  return str.split(" ").map(function(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  }).join(" ");
}



async  function  displayUsers(){

        
const inventory=await fetch(API_PATH+"vendors.php?key=avdfheuw23");
const jsonInventory=await inventory.json();
console.log(jsonInventory);

      var     userData="";
          jsonInventory.data.map((item,key)=>{
          
         
           userData+="<tr>";
           userData+="<td>"+(key+1)+"</td>";
           userData+="<td>"+capitalizeFirstWord(item.username)+"</td>";
        
           userData+="<td>"+item.mobile+"</td>";
           userData+="<td>"+item.earning+" Rs </td>";

           userData+="<td><button onclick=view('"+item.admin_id+"') data-bs-toggle='modal' data-bs-target='#ExtralargeModal' class='btn btn-primary'>View</button></td>";
           userData+="</tr>";
          });
         document.getElementById("users").innerHTML=userData;
}
displayUsers();
async function view(vendor_id){
 const inventory=await fetch(API_PATH+"vendors.php?key=avdfheuw23&inventory&vendor_id="+vendor_id);
const jsonInventory=await inventory.json();
console.log(jsonInventory);
document.getElementById("vendor_total_earning").innerText=jsonInventory.vendor_earning_total;
document.getElementById("vendor_name").innerText=jsonInventory.vendor_detail.data[0].username;
document.getElementById("vendor_mobile").innerText=jsonInventory.vendor_detail.data[0].mobile;
document.getElementById("vendor_total_product").innerText=jsonInventory.total_productIn_the_store;
productEarningHtml="";
if(jsonInventory.total_productIn_the_store==0){
  productEarningHtml="<tr>";
  productEarningHtml+="<td>"+jsonInventory.vendor_detail.data[0].username+" Has No Product In Store  </td>";
  productEarningHtml+="</tr>";

}else{
  jsonInventory.product_vendor.data.map((item,key)=>{
    sno=key+1;
    productEarningHtml+="<tr>";
    productEarningHtml+="<td>"+sno+"</td>";
    productEarningHtml+="<td>"+item.productName+"</td>";
    productEarningHtml+="<td>"+item.revenue+" Rs </td>";
    productEarningHtml+="</tr>";
  });
 
}
EarningHtml="";
if(jsonInventory.vendor_earning_total==0){
  EarningHtml="<tr>";
  EarningHtml+="<td>"+jsonInventory.vendor_detail.data[0].username+" Does Not Earn Any Money  </td>";
  EarningHtml+="</tr>";
}
jsonInventory.earning_details.data.map((item,key)=>{
    sno=key+1;
    EarningHtml+="<tr>";
    EarningHtml+="<td>"+sno+"</td>";
    EarningHtml+="<td>"+item.monthyearoder+"</td>";
    EarningHtml+="<td>"+item.earning+" Rs </td>";
    EarningHtml+="</tr>";
  });
  document.getElementById("earningdetail").innerHTML=EarningHtml;
document.getElementById("produtEarning").innerHTML=productEarningHtml;
}
async function riderstatus(rider_id,status){

     if(status==0){
      newStatus=1;
     }else{
      newStatus=0;
     }

     riderObject={
      RiderId:rider_id,
      status:newStatus
     } 

     riderObject=JSON.stringify(riderObject);
rider_data = await fetch(API_PATH+"change_rider.php?key=avdfheuw23",{method:"POST",body:riderObject});
   console.log(await rider_data.text());
displayUsers();
}



</script>