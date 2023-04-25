<?php include "header.php";

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          <?php
  

   /*
     if()
     */







 
 
      ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

           

                <div class="card-body">



   
                  <h5 class="card-title">Total  Product Sold <span>| This Momth</span></h5>
         
              
          
         
                  <div class="d-flex align-items-center">
                    <div class="  d-flex align-items-center justify-content-center">
         
                    </div>
                    <div class="ps-3">
                    
                    <h6  id="monthproduct"></h6>
        <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
          
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
         
                <div class="card-body">

           

                  <h5 class="card-title">Total Product Sold <span>|Total</span></h5>

                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                    <h6  id="totalProduct"></h6>
        <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>
                    

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card --> 
    
            <!-- Customers Card -->

      
<div class="col-xxl-4 col-xl-6">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">My Earning <span>| This month </span></h5>

    <div class="d-flex align-items-center">
      <div class=" d-flex align-items-center justify-content-center">
    
      </div>
      <div class="ps-3">
      <h6  id="monththis"></h6>
        <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>

      </div>
    </div>

  </div>
</div>

</div>
<div class="col-xxl-4 col-xl-6">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">My Earning <span> | Total </span></h5>

    <div class="d-flex align-items-center">
      <div class=" d-flex align-items-center justify-content-center">
    
      </div>
      <div class="ps-3">
       <h6 id="totalEarn"></h6>
        <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>

      </div>
    </div>

  </div>
</div>

</div>











  </div>
</div>

</div>
   
<!-- End Customers Card -->
            <!-- Reports -->
            <?php


  ?>
       

            <!-- Recent Sales -->

        
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Earning </h5>

               
                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Monthly</button>
                </li>
                
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
             
             
                <?php






      ?>
             
             
             
             
             
             
             
                <table class="table table-borderless ">


                <button type="button"  onclick="downloadReport('daily','pdf')" class="btn btn-primary" fdprocessedid="cxczp">Download Daily Earning Report PDF</button>
                
                <thead>
                      <tr>
                        <th>S.No</th>
                        <th scope="col">Order Date </th>
                        <th scope="col">Earning (Rs)</th>
                    </thead>
                    <tbody id="dailyR">
                   <?php



            ?>




                      <tr>


                    
     
                    
                      </tr>
               
                  <?php 
                 
                  ?>

                  <tr>
                      <td>Earning</td>
   
                 </tr>
                    </tbody>
                  </table>








                </div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
               
                <?php

       

 






      ?>
             
               
               
               
               
               
                <table class="table table-borderless ">
                <button type="button"  onclick="downloadReport('monthly','pdf')" class="btn btn-primary" fdprocessedid="cxczp">Download PDF</button>
          
                    <thead>
                      <tr>
                      <th scope="col">S.No </th>
                        <th scope="col">Month Year </th>
                        <th scope="col">Earning(Rs)</th>
                        <?php
                 
                           ?>
               

                 
                    </thead>
                    <tbody id="RMonthly">
                  
                   
             
                
                          <tr>
                         

                       
 

                      </tr>
                      <?php
                   
                      ?>
                    <tr>
                      <td>Earning</td>

                 </tr>
                    </tbody>
                  </table>
                </div>
              
              </div>


                </div>

              </div>
            </div><!-- End Recent Sales -->


            <!-- Top Selling 
            <div class="col-12">
              <div class="card top-selling overflow-auto">

             

                <div class="card-body pb-0">
                  <h5 class="card-title">Top 2  Sell Product  </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                 
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody id="sellProduct">
               


                    
                 
                    </tbody>
                  </table>

                </div>

              </div>
            </div>--><!-- End Top Selling -->
     
       


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
        

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved &reg;
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can devare the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> 
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.core.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.13/dist/jspdf.plugin.autotable.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

<script src="assets/js/constant.js"></script>
<script>
    jwtToken = localStorage.getItem("id");
    jwtToken = JSON.parse(jwtToken);
    jwtToken = jwtToken.token;

        var jwts = jwtToken;
    var jwtData = jwts.split('.')[1]; // Get the data section of the JWT
    var decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    var parsedJwtData = JSON.parse(decodedJwtData);
    admin_id=parsedJwtData.id;

  async  function Earning(admin_id,invType){
    console.log("HT");
  linkToHit=API_PATH+"specific_vendor_earning.php?key=avdfheuw23&inventory="+invType+"&vendor_id="+admin_id;
  console.log(linkToHit);
  vendorEarning=await fetch(linkToHit);
  vendorEarningdata= await   vendorEarning.json();
    console.log(  vendorEarningdata);
    document.getElementById("monththis").innerText=vendorEarningdata.currentmonthearning + " Rs " ;
    document.getElementById("totalEarn").innerText=vendorEarningdata.totalEarn+ " Rs " ;
    document.getElementById("totalProduct").innerText=vendorEarningdata.productsellTotal;
    document.getElementById("monthproduct").innerText=vendorEarningdata.totalProductSellTHismOnth;
dailyReportHTML="";

    vendorEarningdata.earndetaildaily.map((item,index)=>{
      keysTable=index+1;
      dailyReportHTML+="<tr>";
      dailyReportHTML+="<td>"+keysTable+"</td>";
      dailyReportHTML+="<td>"+item.orderDates+"</td>";
      dailyReportHTML+="<td>"+item.earning+"</td>";
      dailyReportHTML+="</tr>";
    });
    MonthlyReportHTML="";

    vendorEarningdata.earndetailmonthly.map((item,index)=>{
      keysTable=index+1;
      MonthlyReportHTML+="<tr>";
      MonthlyReportHTML+="<td>"+keysTable+"</td>";
      MonthlyReportHTML+="<td>"+item.orderDates+"</td>";
      MonthlyReportHTML+="<td>"+item.earning+"</td>";
      MonthlyReportHTML+="</tr>";
    });
document.getElementById("dailyR").innerHTML=   dailyReportHTML;
document.getElementById("RMonthly").innerHTML=MonthlyReportHTML;
  }
  Earning(admin_id,"monthly");
function CheckLogin() {
    var LsId = localStorage.getItem("id");


    if (LsId != null) {
        currentTime = new Date().getTime();
        var LsId = localStorage.getItem("id");
        console.log("adminTitle");

        LsId = JSON.parse(LsId);
        console.log(LsId);
        expirydate = new Date(LsId.expiry);
        console.log(expirydate + LsId.expiry);
        console.log(Math.floor((LsId.expiry - currentTime) / (1000 * 60)));
        if (currentTime > LsId.expiry) {

        }
        
    } else {

        window.location.href = "login.php";
        return false;
    }
}
CheckLogin();
 function  capitalize(stri){
  var str = stri;
var capitalized = str.charAt(0).toUpperCase() + str.slice(1);
   return capitalized;
  }
function TotalIncome(EarningArray){
     console.log(EarningArray);
TotalEarningInv=0;
EarningArray.forEach((item)=>{
     console.log(item);
     TotalEarningInv=TotalEarningInv+item
});
return TotalEarningInv;

}
// data to be exported
async   function downloadReport(urlData,type){

  jwtToken = localStorage.getItem("id");
    jwtToken = JSON.parse(jwtToken);
    jwtToken = jwtToken.token;

        var jwts = jwtToken;
    var jwtData = jwts.split('.')[1]; // Get the data section of the JWT
    var decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    var parsedJwtData = JSON.parse(decodedJwtData);
    if(parsedJwtData.role==0){
     adminID=0;
     adminType="admin";

    }else{
      adminID=parsedJwtData.id;
      adminType="ride";
    }
const inventory=await fetch(API_PATH+"specific_vendor_earning.php?key=avdfheuw23&&inventory="+urlData+"&vendor_id="+adminID);
const jsonInventory=await inventory.json();
console.log(inventory);
console.log(jsonInventory);


today=new Date();
console.log(today);
console.log(today.getTime()+1000*60*3);
console.log(new Date(today.getTime()+1000*60*3));
// save the PDF document
const name=today.getMonth()+today.getDate();


if(urlData=="monthly"){
data=jsonInventory.earndetailmonthly;

}
if(urlData=="daily"){
data=jsonInventory.earndetaildaily;

}



if(type==="pdf"){

 var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning (Rs)', style: 'tableHeader' }];

TotalEarning=[];
currDate=new Date().toLocaleString("en-US",{month:"long",day:"numeric",year:"numeric",minute:"numeric",hour:"numeric"}).replace("at"," ");

var docDefinition = {

  content: [
    { text:capitalize(urlData)+' Earning Report', style: 'header' ,align:"center"},
        { text:currDate ,align:"center"},
    {
      table: {
        headerRows:2,
        widths: ['*', '*','*'],
        body: [


       headerPdf
        
             
        ,
  
          ...data.map(function (item,index) {
console.log(index+1);


TotalEarning.push(item.earning);


            IndexPdf=index+1;

            return [IndexPdf,item.orderDates,item.earning];
         


          })
        ]
  
      }
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
pdfMake.createPdf(docDefinition).download(urlData+name+"inventory_report"+".pdf");

}else{

data=jsonInventory.data;
if(urlData=="daily"){
data.forEach((obj)=>{
  delete obj.discount_expense;
 
});
}
data.forEach((obj)=>{
  return {...obj,id:1}
});



// create a new workbook object
var wb = XLSX.utils.book_new();
/*
ws['!cols'] = [];
for (var i = 0; i < data[0].length; i++) {
  const maxLen = data.reduce((max, row) => Math.max(max, row[i].toString().length), 0);
  ws['!cols'][i] = { wch: maxLen };
}*/

// add the data to a worksheet in the workbook
var ws = XLSX.utils.json_to_sheet(data);
console.log(ws);
ws['!cols'] = [];


count =data.map(obj=>Object.keys(obj).length);
console.log(count);
Max_count=count[0];
console.log(Max_count);

const title = 'People Data';


ws[XLSX.utils.encode_cell({ c:4, r:4 })] ="f";

for (var i =0; i <=Max_count ; i++) {

  const maxLen = data.reduce((max, row) => {
    console.log(row.toString());
   return  Math.max(max, row.toString().length);

  }, 0);
console.log(maxLen);
  ws['!cols'][i] = { wch: maxLen };
}
XLSX.utils.book_append_sheet(wb, ws, 'people');

// write the workbook to a binary string
var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });

// create a download link and trigger a download
var link = document.createElement('a');
link.download = urlData+'.xlsx';
link.href = URL.createObjectURL(new Blob([wbout], { type: 'application/octet-stream' }));
link.click();

}
}
</script>
  <!-- Template Main JS File -->
 
  <script src="assets/js/main.js"></script>
  <script>

 </script>
</body>

</html>