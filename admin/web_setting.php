
    <!-- End Sidebar-->
    <?php include "header.php";?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Web Setting</h1>

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
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control" id="Facebook" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control" id="Instagram" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="Linkedin" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Government Sales Tax(GST)</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="gst" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Delivery Charge</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="deliveryCharge" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Delivery Charge GST</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="deliveryChargegst" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Min Order</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control" id="minOrder" value="">
                                            </div>
                                        </div>
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">WebSite Status</label>
                                       
                                                <input name="linkedin" type="radio"  id="on"   value=""> ON
                                                <input name="linkedin" type="radio" id="off"   value=""> Off
                                    
                                

                                    

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
            async function setting(){
                var LsId = localStorage.getItem("id");
        console.log("adminTitle");

        LsId = JSON.parse(LsId);
        Token=LsId.token;


        const jwt = Token;
        const jwtData = jwt.split('.')[1]; // Get the data section of the JWT
        const decodedJwtData = atob(jwtData); // Decode the base64-encoded data
        const parsedJwtData = JSON.parse(decodedJwtData);
         role=parsedJwtData.role;

                settingData=await fetch(API_PATH+"setting.php?key=avdfheuw23");
                settingData=await   settingData.json();   
          console.log(   settingData);
       
          document.getElementById('deliveryChargegst').value=settingData.data[0].deliverygst;
          document.getElementById('gst').value=settingData.data[0].gst;
          document.getElementById("deliveryCharge").value=settingData.data[0].deliveryCharge;
          document.getElementById("Linkedin").value=settingData.data[0].company_linkend;
          document.getElementById("Facebook").value=settingData.data[0].comapny_facebook;
          document.getElementById("Twitter").value=settingData.data[0].comapny_twitter;
          document.getElementById("Instagram").value=settingData.data[0].comapny_instragram;
           document.getElementById("Phone").value=settingData.data[0].company_mobile;
           document.getElementById("Email").value=settingData.data[0].company_email;
           document.getElementById("minOrder").value=settingData.data[0].minOrder;
          
           if(settingData.data[0].webSiteStatus==1){
            document.getElementById("on").checked=true;
           }
           if(settingData.data[0].webSiteStatus==0){
            document.getElementById("off").checked=true;
           }
        
         
        
        document.getElementById("fullName").value=settingData.data[0].websiteName;
            }   
         async  function submitSetting(){

  
    gst=document.getElementById('gst').value;
         deliveryCharge=document.getElementById("deliveryCharge").value;
         WebsiteName=document.getElementById("fullName").value;
       linkedIn=document.getElementById("Linkedin").value;
        facebook = document.getElementById("Facebook").value;
    twitter=document.getElementById("Twitter").value;
     instrgam =    document.getElementById("Instagram").value;
         phone = document.getElementById("Phone").value;
      email =    document.getElementById("Email").value;
       minOrder   = document.getElementById("minOrder").value;

      if(document.getElementById("on").checked==true){
        webSiteStatus=1;
      }else{
        webSiteStatus=0;
      }
        let settingObject={
            deliveryCharge:deliveryCharge,
            gst:gst,
            minOrder:minOrder,
            webSiteStatus:webSiteStatus,
            company_mobile:phone,
            company_email:email,
            comapny_instragram:instrgam,
            comapny_twitter:twitter,
            comapny_facebook:facebook,
            company_linkend:linkedIn,
            websiteName:WebsiteName
        }
        settingObject=JSON.stringify(settingObject);
        console.log(settingObject);
        settingData=await fetch(API_PATH+"setting.php?key=avdfheuw23",{method:"POST",body:settingObject});
                settingData=await   settingData.text();

        console.log(settingData);


           }
     


            setting();
            </script>
</body>

</html>