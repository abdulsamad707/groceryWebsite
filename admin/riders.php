<?php include "header.php";





?>
  <main id="main" class="main">
        <?php


         ?>


    <div class="pagetitle">
      <h1>Rider</h1>
      <nav>
        <ol class="breadcrumb">

          <li class="breadcrumb-item active">Riders</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
    <div class="row"    id="OrdersColumn">
  <div class="col-sm-4">

<input type="text" id="vendor_name" class="form-control mt-3" placeholder="rider name" min="-1day" max="+1day">
</div>


<div class="col-sm-4" id="submitBTN">
<button class="btn btn-primary mt-3"  id="searchBTN" >Search</button>
</div>
</div>
<div class="row">
    <div class="col-12">
              <div class="card  overflow-auto">
       

              <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-center" id="vendor_names">Extra Large Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>Mobile Number : <span id="rider_mobile">  </span> </p>
                    <p>Total Earning : <span id="rider_total_earning">  </span> Rs</p>
                    <p>Total Order Completed : <span id="rider_total_order">  </span>  </p>

 

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
                        <th scope="col"> Name</th>
                       
         
                        <th scope="col">Mobile </th>
                        <th scope="col">View </th>
                        <th scope="col">Status</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.core.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.13/dist/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

<script>


function capitalizeFirstWord(str) {
  return str.split(" ").map(function(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  }).join(" ");
}

var button = document.querySelector('#searchBTN');

button.addEventListener('click', function() {
   console.log("current Time "+new Date());
   let vendor_name= document.getElementById("vendor_name").value;

 if(vendor_name!=""){
    displayUsers(vendor_name);
   }else{
    displayUsers();
   }

});

async  function  displayUsers(rider_name=""){

        
const inventory=await fetch(API_PATH+"riders.php?key=avdfheuw23&rider_name="+rider_name);
const jsonInventory=await inventory.json();
console.log(jsonInventory);

      var     userData="";
          jsonInventory.data.map((item,key)=>{
          
            if(item.status==1){
              Btn="<button onclick=riderstatus('"+item.id+"','"+item.status+"') class='btn btn-success'>Active</button>";
            }else{
              Btn="<button onclick=riderstatus('"+item.id+"','"+item.status+"') class='btn btn-danger'>Deactive</button>";
            }
           userData+="<tr>";
           userData+="<td>"+(key+1)+"</td>";
           userData+="<td>"+capitalizeFirstWord(item.username)+"</td>";
           userData+="<td>"+item.mobile+"</td>";

           userData+="<td><button onclick=view('"+item.id+"') data-bs-toggle='modal' data-bs-target='#ExtralargeModal' class='btn btn-primary'>View</button></td>";
           userData+="<td>"+Btn+"</td>";
     userData+="<td><button onclick= downloadReportProduct('"+item.id+"')   class='btn btn-primary'>Download Report</button></td>";
     
           userData+="</tr>";
          });
         document.getElementById("users").innerHTML=userData;
}
displayUsers();

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
async function view(vendor_id){
 const inventory=await fetch(API_PATH+"riders.php?key=avdfheuw23&rider_id="+vendor_id);
 
const jsonInventory=await inventory.json();
console.log(jsonInventory);
document.getElementById("vendor_names").innerText=jsonInventory.data[0].username;
document.getElementById("rider_total_earning").innerText=jsonInventory.data[0].Earning;
document.getElementById("rider_total_order").innerText=jsonInventory.data[0].number_of_order;
document.getElementById("rider_mobile").innerText=jsonInventory.data[0].mobile;
productEarningHTML="";
if(jsonInventory.data[0].Earning > 0 ){
jsonInventory.earning_detail.map((item,key)=>{
    sno=key+1;
    productEarningHTML+="<tr>";
    productEarningHTML+="<td>"+sno+"</td>";
    productEarningHTML+="<td>"+item.ordermonthyear+"</td>";
    productEarningHTML+="<td>"+item.earning+" Rs </td>";
    productEarningHTML+="</tr>";
  });
}else{
  productEarningHTML+="<tr>";
  productEarningHTML+="<td>"+jsonInventory.data[0].username+" Does Not Earn Any Money  </td>";
  productEarningHTML+="</tr>";
}
  document.getElementById("earningdetail").innerHTML=productEarningHTML;
}

async function downloadReportProduct (id)  {
  var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning (Rs)', style: 'tableHeader' },{ text: 'Number Of Order', style: 'tableHeader' }];

TotalEarning=[];
currDate=new Date().toLocaleString("en-US",{month:"long",day:"numeric",year:"numeric",minute:"numeric",hour:"numeric"}).replace("at"," ");
const inventory=await fetch(API_PATH+"riders.php?key=avdfheuw23&rider_id="+id);
const jsonInventory=await inventory.json();
console.warn(jsonInventory);
data=jsonInventory.earning_detail;
const riderName=capitalize(jsonInventory.data[0].username);

if(jsonInventory.data[0].Earning >0 ){
var docDefinition = {

  content: [
   { text:riderName, style: 'header' ,align:"center"},
   
   { text:' Number of Order :'+jsonInventory.data[0].number_of_order, style: 'header' ,align:"center"},
   { text:' Earning :'+jsonInventory.data[0].Earning+" RS", style: 'header' ,align:"center"},
   { text:'Mobile :'+jsonInventory.data[0].mobile , style: 'header' ,align:"center"},
    {
      table: {
        headerRows:2,
        widths: ['*', '*','*','*'],
        body: [


       headerPdf
        
             
        ,
  
          ...data.map(function (item,index) {
console.log(index+1);





            IndexPdf=index+1;

            return [IndexPdf,item.ordermonthyear,item.earning,item.numberoforder];
         


          })
        ]
  
      },
    
  },

  

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
}else{
  var docDefinition = {

content: [
 { text:riderName, style: 'header' ,align:"center"},
 { text:' Earning :'+jsonInventory.data[0].Earning+" Rs", style: 'header' ,align:"center"},
 { text:' Number Of Order :'+jsonInventory.data[0].number_of_order, style: 'header' ,align:"center"},
 { text:'Mobile :'+jsonInventory.data[0].mobile , style: 'header' ,align:"center"},
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
  }

}

// download the PDF document
pdfMake.createPdf(docDefinition).download("product_inventory_report"+".pdf");

}
</script>
