<?php include "header.php";?>
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



           
                  <h5 class="card-title">Total Product Sald<span>| This Momth</span></h5>
                
             
          
              
              
          
         
                  <div class="d-flex align-items-center">
                    <div class="  d-flex align-items-center justify-content-center">
         
                    </div>
                    <div class="ps-3">
                      <h6><span id="itemSold"></span></h6>
                 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
         
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

   
                <div class="card-body">

                  <h5 class="card-title">Revenue <span>| This Month</span></h5>
                  
                
         
           
                  <div class="d-flex align-items-center">
                 
                    <div class="ps-3">
                      <h6><span id="earning"></span></h6>
                    

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card --> 
      
            <!-- Customers Card -->

    
     
 

   


            <!-- Recent Sales -->

        
    

    
            <div class="col-12">
              <div class="card top-selling overflow-auto">
<?php
              $totalEarningapi="orders.php?orderType=topfive";
 $totalEarningapi=getDataFromApi($totalEarningapi,2);



?>










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
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
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

async function Earning(){
  jwtToken = localStorage.getItem("id");
    jwtToken = JSON.parse(jwtToken);
    jwtToken = jwtToken.token;

    var jwts = jwtToken;
    var jwtData = jwts.split('.')[1]; // Get the data section of the JWT
    var decodedJwtData = atob(jwtData); // Decode the base64-encoded data
    var parsedJwtData = JSON.parse(decodedJwtData);
    adminId=parsedJwtData.id;
const inventory=await fetch(API_PATH+"myearning.php?vendor="+adminId+"&key=avdfheuw23");
const jsonInventory=await inventory.json();
const inventorysecond=await fetch(API_PATH+"myearning.php?vendor="+adminId+"&key=avdfheuw23&last_two");
const jsonInventorysecond=await inventorysecond.json();

document.getElementById("earning").innerText=jsonInventory.earning+" PKR";
  
document.getElementById("itemSold").innerText=jsonInventory.qtysold;
console.log(jsonInventory);
console.log(jsonInventorysecond);
earningItem="";
jsonInventorysecond.data.forEach((item)=>{
    earningItem+="<tr>";
    earningItem+="<th scope='row'><a href='#'><img src='"+item.productImage+"' alt=''></a></th>";
    earningItem+="<td><a href='#' class='text-primary fw-bold'>"+item.productName+"</a></td>";
    earningItem+="<td>"+item.price+"</td>";
    earningItem+="<td class='fw-bold'>"+item.qtysold+"</td>";
    earningItem+="<td>"+item.revenue+"</td>";
    earningItem+="</tr>";
   document.getElementById("earningDetail").innerHTML="";
   document.getElementById("earningDetail").innerHTML=earningItem;
});
}
Earning();
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
  const inventory=await fetch(API_PATH+"inventory.php?key=avdfheuw23&invtype="+urlData+"&vendorType="+adminType+"&id="+adminID);
const jsonInventory=await inventory.json();
console.log(inventory);
console.log(jsonInventory);


today=new Date();
console.log(today);
console.log(today.getTime()+1000*60*3);
console.log(new Date(today.getTime()+1000*60*3));
// save the PDF document
const name=today.getMonth()+today.getDate();
data=jsonInventory.data;



if(type==="pdf"){
if(urlData=="monthly"){
 var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning (Rs)', style: 'tableHeader' }];
}else{
  var headerPdf=  [{ text: 'S.No', style: 'tableHeader' },{ text: 'Date', style: 'tableHeader' }, { text: 'Earning (Rs)', style: 'tableHeader' }]
}
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


TotalEarning.push(item.Earning);


            IndexPdf=index+1;
          if(urlData=="monthly"){
            return [IndexPdf,item.monthyear,item.Earning];
          }else{
            return [IndexPdf,item.OrderDate,item.Earning];
          }


          })
        ]
  
      }
    },
    { text: 'Total Earning:'+ TotalIncome(TotalEarning)+' Rs', style: 'thanks' }
  
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
 
  <script src="assets/js/main.js?v=<?= time();?>"></script>
  <script>

 </script>
</body>

</html>