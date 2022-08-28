
<?php  
 $_SESSION['locationSelected']=1;

 $_SESSION['admin_id']=3;
?>



    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Grocery Website Design Tutorial</title>
    <?php include "function.php";?>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo rand()+time();?>">

</head>
<div id="map">

</div>

<div class="containermap">
<input type="text" placeholder="Search Loaction" id="SearchLocation" value="">
   <div id="matter">

      <a href="javascript:void(0)" style="text-align:center" id="proceed">Proceed To Checkout</a>
   </div>
</div>

<!-- custom js file link  -->

<script src="js/jquery.js"></script>
<script>

</script>

</body>
<script src="js/map.js?v=<?php echo time();?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALjpQp0rbk7coMTw-X845tOxIuTMkt7wA&callback=init&libraries=places"
defer
></script>


