<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
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

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
        
                  <span class="d-none d-lg-block">Admin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your correct username & password to login</p>
                  </div>

                  <form class="row" id="loginForm">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="adminusername" class="form-control" id="yourUsername" >
                        <div class="invalid-feedback" id="feedback_username">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword">
                      <div class="invalid-feedback" id="feedback_password">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                <input type="button"  class="btn btn-primary w-100" value="Login" onclick="adminLogin()">
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/jquery.js"></script>


<script>
function CheckLogin(){
 var LsId=localStorage.getItem("id");
 if(LsId!=null){
  if(window.location=="http://localhost/grocerywebsite/admin/login.php"){
       window.location="index.php";
  }

 }else{
  if(window.location!="http://localhost/grocerywebsite/admin/login.php"){
  window.location="http://localhost/grocerywebsite/admin/login.php";
  }else{

  }
 }
}
CheckLogin();

function adminLogin(e){
  const APIKEY="avdfheuw23";
var username= document.getElementById("yourUsername").value;
var password=document.getElementById("yourPassword").value;
var usernamePattern=/[A-Za-z]/;
if(username==""){
  $("#feedback_username").html("** Please Provide User Name");
  $("#feedback_username").css("display","block");



  return false;
}
if(!usernamePattern.test(username)){
  $("#feedback_username").html("** Please Provide Correct User Name");
  $("#feedback_username").css("display","block");



  return false;
}
if(password==""){
$("#feedback_password").html("** Please provide password");
$("#feedback_password").css("display","block");
return false;
}
console.log(username);
var arrayForm=$("#loginForm").serializeArray();
console.log(arrayForm);
var obj={};
for (i = 0; i < arrayForm.length; i++) {
   obj[arrayForm[i].name]=arrayForm[i].value;
  
}
console.log(obj);
ObjLogin=JSON.stringify(obj);
console.log(ObjLogin);
apiurl="http://localhost/groceryWebsite/api/adminlogin.php?key="+APIKEY;
console.log(apiurl);


fetch(apiurl,{
  method:"POST",
  body:ObjLogin
}).then((response)=>{
console.log(response);
   return response.json();
    
}).then((finalResponse)=>{
console.log(finalResponse.id);
let id=finalResponse.id;

if(id!=undefined || id!=""){
 currentTime= new Date().getTime();
const item={
  userId:id,
  expiry: currentTime+(1000*60*3)
}

localStorage.setItem("id",JSON.stringify(item));



sessionStorage.setItem("id", id);





window.location="index.php";

}

});
}






</script>
</body>

</html>