
    <!-- End Sidebar-->
    <?php include "header.php";?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile Setting</h1>

        </div>
        <!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->

                            <div class="tab-content pt-2">

                                <div class="tab-pane fade  profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe
                                        at unde.</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                    </div>

                                </div>

                                <div class="tab-pane show active fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form>


                            <div class="row mb-3">
                     <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName" value="">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Password</label>
    <div class="col-md-8 col-lg-9">
        <div class="input-group">
            <input name="phone" type="password" class="form-control" id="password" value="">
            <button class="btn btn-outline-primary bi bi-eye " id="showPassword" type="button"></button>
        </div>
    </div>
</div>



                                  

                                      




                                        
                                    

   

                       <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
         <input name="twitter" type="text" class="form-control" id="phone_number" value="">
                                            </div>
                                        </div>
                                

                                    

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="submitSetting()">Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">


                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        


                                    

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                    <!-- End Change Password Form -->

                                </div>

                            </div>
                            <!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

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
    </footer>
    <!-- End Footer -->

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
    <script src="assets/js/main.js"></script>
    <script src="assets/js/constant.js"></script>

        <script>
         /* bi bi-eye-slash*/
         role=parsedJwtData.role;



      document.getElementById("fullName").value=parsedJwtData.username;
      const myButton = document.getElementById("showPassword");

myButton.addEventListener("click", function() {
 passwordHidden =  document.getElementById("showPassword");
    let change_password=document.getElementById("password").value;
               input_type=document.getElementById("password").type;
      
              if(input_type=="text"){
                passwordHidden.classList.add("bi-eye-slash");
passwordHidden.classList.remove("bi-eye");
               document.getElementById("password").type="password";
              }
              if(input_type=="password"){

document.getElementById("password").type="text";
console.log( passwordHidden.classList.contains("bi-eye-slash"));
passwordHidden.classList.remove("bi-eye-slash");
passwordHidden.classList.add("bi-eye");
}
  console.log("Button clicked!");
});
         async  function submitSetting(){
const currentDate = new Date();
let username=document.getElementById("fullName").value;
let mobile=document.getElementById("phone_number").value;
let pass=document.getElementById("password").value;
            let randomNumber = Math.floor(Math.random() * 11);
            console.log(parsedJwtData);
       adminRole=parsedJwtData.role;
       adminId=parsedJwtData.id;
let ChangeProfile={
    username:username,
    mobile:mobile,
    password:pass,
    admin_id:adminId,
    admin_role:adminRole
};
ChangeProfile=JSON.stringify(ChangeProfile);
console.log(ChangeProfile);
 responseFromapi=   await fetch(API_PATH+"admin.php?key=avdfheuw23",{method:"POST",body:ChangeProfile});
 responseFromdata=await  responseFromapi.text();
 console.log( responseFromdata);

           }
     


   
            </script>
</body>

</html>