
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

 $inventory= inventory();

 extract($inventory);
 

 $diff=(floor(($currentMonthEarning/$totalEarning)*100))-(floor(($previousMonthEarning/$totalEarning)*100));
 $prec=abs($diff);
 if($diff<0){
       $perText="decrease";
    }else{
      $perText="increase";
    }


    $previousMonthItemSold;
  
   $diffinitem =(floor(($CurrentMonthItemSold/$totalItemSold)*100))-(floor(($previousMonthItemSold/$totalItemSold)*100));
 $diffinitem;
    $totalItemSold;
  if($diffinitem>0){
    $diffinitemText="increase";
  }else{
    $diffinitemText="decrease";
  }
      ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

           

                <div class="card-body">
                  <h5 class="card-title">Total Product Sald<span>| This Momth</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$CurrentMonthItemSold?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=abs($diffinitem);?>%</span> <span class="text-muted small pt-2 ps-1"><?= $diffinitemText;?></span>

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
                      <h6><?= $currentMonthEarning; ?> PKR</h6>
                      <span class="text-success small pt-1 fw-bold"><?=$prec; ?>%</span> <span class="text-muted small pt-2 ps-1">    <?=$perText?></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Active Customers <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=  NumberOfActiveUser("current_month")["data"][0]["number_of_customer_this_month"];?></h6>
                      <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <div class="col-xxl-4 col-xl-6">
  
<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Active Riders <span>| This Month</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6><?=  NumberOfActiveRider("active_riders")["data"][0]["numberofriders"];?></h6>
        <span class="text-danger small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">  </span>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->
            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                
               
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>Monthly</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                  async  function loadChart(){

const inventory=await fetch("http://localhost/groceryWebsite/api/inventory.php?key=avdfheuw23&invtype=monthly");
const jsonInventory=await inventory.json();
console.log(inventory);
console.log(jsonInventory);

var inventoryMonth=[];
var inventoryEarning=[];
jsonInventory.data.forEach((value,index)=>{
console.log(value.monthyear);
inventoryMonth.push(value.monthyear);
inventoryEarning.push(value.Earning);
});
console.log(inventoryMonth);  

                      document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: "earning",
                      data: inventoryEarning
                    }],
                    chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                      },
                    },
                    xaxis: {
                      categories: inventoryMonth,
                    }
                  }).render();
                });
                  }
                  loadChart();
                  </script>
                  <!-- End Line Chart -->
                  <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">>Reports <span>Daily</span></h5>

              <!-- Line Chart -->
              <div id="lineChart"></div>

              <script>
                async   function showChart(){
    const inventorydaily=await fetch("http://localhost/groceryWebsite/api/inventory.php?key=avdfheuw23&invtype=daily");

const jsonInventorydaily=await inventorydaily.json();
console.log(inventorydaily);
console.log(jsonInventorydaily);
var inventoryDaily=[];
var inventoryEarningDaily=[];
jsonInventorydaily.data.forEach((value,index)=>{
console.log(value.OrderDate);
inventoryDaily.push(value.OrderDate);
inventoryEarningDaily.push(value.Earning);
});




                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#lineChart"), {
                    series: [{
                      name: "Earning",
                      data: inventoryEarningDaily
                    }],
                    chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.7
                      },
                    },
                    xaxis: {
                      categories: inventoryDaily,
                    }
                  }).render();
                });
              }
              showChart();
              </script>
              <!-- End Line Chart -->

            </div>
          </div>
        </div>
                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Earning</h5>

               
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
   $dataUrlinventorydaily=inveentoryDetail("daily");


      ?>
             
             
             
             
             
             
             
                <table class="table table-borderless ">


                <button type="button"  onclick="downloadReport('daily','pdf')" class="btn btn-primary" fdprocessedid="cxczp">Download Daily Earning Report PDF</button>
                
                <thead>
                      <tr>
                        <th>S.No</th>
                        <th scope="col">Order Date </th>
                        <th scope="col">Earning</th>
                    </thead>
                    <tbody>
                   <?php
                     $arrayEarning=[];
                   $totalRecord=  $dataUrlinventorydaily["totalRecord"];
                 foreach ($dataUrlinventorydaily["data"] as $key => $value){


         
      array_push($arrayEarning,$value["Earning"]);
    

          $classEarning="";
      
$earning=$value["Earning"];


            ?>




                      <tr>


                    
                        <td class="<?=    $classEarning; ?>"><?=$key+1 ?></td>
                        <td class="<?=    $classEarning; ?>"><?= date("d-F-Y",strtotime($value["OrderDate"])) ?></td>
                        <td class="<?=    $classEarning; ?>"><?=$earning;  ?> Rs</td>
                    
                      </tr>
               
                  <?php }
                 
                  ?>

                  <tr>
                      <td>Earning</td>
                     <td> <?= array_sum($arrayEarning); ?> Rs  </TD>
                 </tr>
                    </tbody>
                  </table>








                </div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
               
                <?php

       

 

   $dataUrlinventorymontly=inveentoryDetail("monthly");





      ?>
             
               
               
               
               
               
                <table class="table table-borderless ">
                <button type="button"  onclick="downloadReport('monthly','pdf')" class="btn btn-primary" fdprocessedid="cxczp">Download PDF</button>
          
                    <thead>
                      <tr>
                      <th scope="col">S.No </th>
                        <th scope="col">Month Year </th>
                        <th scope="col">Earning</th>
                        <th scope="col">Tax Expense</th>
                        <th scope="col">Discount  Expense</th>
                        <th scope="col">Delivery Expense</th>
                    </thead>
                    <tbody>
                  
                   
             
                    <?php
                         $arrayEarning=[];
                        foreach($dataUrlinventorymontly['data'] as $key =>$value){
                          array_push($arrayEarning,$value["Earning"]);
                          ?>
                          <tr>
                          <td><?=$key+1 ?></td>
                        <td><?= $value["monthyear"]; ?></td>
                        <td><?= $value["Earning"] ?> Rs</td>
                        <td><?= $value["tax_expense"];?>Rs</td>
                       <td><?= $value["discount_expense"] ?> Rs </td>
                      <td> <?= $value["deliveryExpense"]; ?> Rs <td>



                      </tr>
                      <?php
                       }
                    
                      ?>
                    <tr>
                      <td>Earning</td>
                     <td> <?= array_sum($arrayEarning); ?> Rs  </TD>
                 </tr>
                    </tbody>
                  </table>
                </div>
              
              </div>


                </div>

              </div>
            </div><!-- End Recent Sales -->
            <?php

$urlinventorycurrentapi="product_inventory.php";
 $dataUrlinventorycurrent=  getDataFromApi($urlinventorycurrentapi,1);

 ?>


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

             

                <div class="card-body pb-0">
                  <h5 class="card-title">Top 2  Sell Product  </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
               


                         <?php
        
                       foreach($dataUrlinventorycurrent["data"] as $key => $value){
                         ?>
                                <tr>
                        <th scope="row"><a href="#"><img src="<?php echo API_PATH.$value["image"];?>" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold"><?=$value['productName'];?></a></td>
                        <td><?=$value['price'];?></td>
                        <td class="fw-bold"><?=$value["sold"]?></td>
                        <td><?=$value["revenue"]?></td>
                      </tr>
                         <?php
                       }
                         ?>
                 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
 
            <div class="col-12">
              <div class="card top-selling overflow-auto">
<?php
              $totalEarningapi="orders.php?orderType=topfive";
 $totalEarningapi=getDataFromApi($totalEarningapi,2);



?>
                <div class="card-body pb-0">
                  <h5 class="card-title">Top 5 Compvared  Order  </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th scope="col">Customer Nmae</th>
                        <th scope="col">  Rider Name</th>
                        <th scope="col">Order Amount</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Item</th>
                      </tr>
                    </thead>
                    <tbody>
               


                         <?php
        
                       foreach($totalEarningapi["data"] as $key => $value){
                         ?>
                                <tr>

                                <td><?= $key+1 ?></td>
                        <td scope="row"><?= $value["customer_name"] ;?></td>
                        <td><?=$value['rider_name'];?></td>
                        <td><?=$value['totalAmount'];?> Rs </td>
                        <td class="fw-bold"><?=$value["orderDate"]?></td>
                        <td><?=$value["totalItem"]?></td>
                      </tr>
                         <?php
                       }
                         ?>
                 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->










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
async   function downloadReport(urlData,type){
        
  const inventory=await fetch("http://localhost/groceryWebsite/api/inventory.php?key=avdfheuw23&invtype="+urlData);
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
 var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }];
}else{
  var headerPdf=  [{ text: 'S.No', style: 'tableHeader' },{ text: 'Date', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }]
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
    { text: 'Total Earning:'+TotalIncome(TotalEarning)+' Rs', style: 'thanks' }
  
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