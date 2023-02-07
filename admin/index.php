<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header 
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>

        </li>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>

        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>


  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Product</span>
        </a>
      </li>
    </ul>

  </aside>--><!-- End Sidebar-->
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

                <button type="button"  onclick="downloadReport('daily','excel')" class="btn btn-primary" fdprocessedid="cxczp">Download Csv</button>
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
                 foreach ($dataUrlinventorydaily["data"] as $key => $value){
                  array_push($arrayEarning,$value["Earning"]);
                    ?>
                      <tr>
                    
                        <td><?=$key+1 ?></td>
                        <td><?= date("d-F-Y",strtotime($value["OrderDate"])) ?></td>
                        <td><?= $value["Earning"] ?> Rs</td>
                    
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
                <button type="button"  onclick="downloadReport('monthly','excel')" class="btn btn-primary" fdprocessedid="cxczp">Download Csv</button>
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
                  <h5 class="card-title">Top 5 Completed  Order  </h5>

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
                        <td><?=$value['totalAmount'];?></td>
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
      <!-- You can delete the links only if you purchased the pro version. -->
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
// create the PDF document


if(type==="pdf"){
if(urlData=="monthly"){
 var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }];
}else{
  var headerPdf=  [{ text: 'S.No', style: 'tableHeader' },{ text: 'Order Date', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }]
}
TotalEarning=[];
var docDefinition = {

  content: [
    { text: 'Earning Report', style: 'header' ,align:"center"},
    {
      table: {
        headerRows: 1,
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
         margin: [0, 0, 0, 20]
      },
    }
};

// download the PDF document
pdfMake.createPdf(docDefinition).download(urlData+name+"inventory_report"+".pdf");

}else{

data=jsonInventory.data;


console.log(data);
// create a new workbook object
var wb = XLSX.utils.book_new();

// add the data to a worksheet in the workbook
var ws = XLSX.utils.json_to_sheet(data);
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
  function logout(){
  localStorage.removeItem("id");
  window.location="login.php";
 }
 </script>
</body>

</html>