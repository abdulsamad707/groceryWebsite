<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display a map on a webpage</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' />

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<script src="https://kit.fontawesome.com/5fa178239e.js" crossorigin="anonymous"></script>
<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; float: left; }
#matter{
    display: flex; 
position: relative;
    width: 100%;
    margin-top:700px;
    background-color: blue;
    float: right;
    height: auto;
    padding:2rem;
color:white;

 
}
.container{
    display:flex;
    height:auto;
    width: 100%;
}
.d1{
    background-color: yellow;
}
.detailrider{
    float: right;
    font-size: medium;
    font-weight: 400;
    text-align: center;
}
.riderpic{
    border-radius: 50%;
    border: 2px solid red;
    margin: 1.5em;
}
.ridername{
    font-size: 48px;
    font-weight: 900;
    text-align: center;
    padding: 10px;
}
.m{
    background-image: url('pic-1.png');
  height: 100px;
  width: 100px;
  border-radius: 50%;
    background-color: black;
    background-position: 0%;
    backface-visibility: visible;
}
th{
    text-align: center;
    padding: 12px;
    border-top:1px solid black;
    border-bottom: 2px solid black;

}
td{
    padding: 12px;
}
.cartdetail {
    text-align: center;
}
@media screen and (max-width:650px){
    #matter{
        display: block;
        margin-top: 37em;
     
   height:auto;
   
    }

}
@media screen and (max-width:310px){
    #matter{
        display: block;
        margin-top: 37em;
        background-color: aqua;
   height:auto;
   
    }

}
@media screen and (max-width:295px){
    #matter{
        display: grid;
      -  margin-top: 37em;

   height:auto;
   
    }

}
@media screen and (max-width:1350px){
    #matter{
        
        margin-top: 550px;

   
    }

}
#destination{
    position: relative;
    margin: 1px;
}
#location{
    width: max-content;
}
</style>
</head>
<body>

    <div id ="map"></div>
    
 
    <div class="container">
   
       <div id="matter">
        
      <div> <input type="text" id="location"></div>
             <div class="detailrider">  <h1 id="farecost"></h1><h1 class="ridername">Ali Mohammad</h1><p> 4.5 <i class="fas fa-star"></i> </p> <h1 class="ridermobile"> +923357467403 </h1> </div>
             <div> <img src="pic-1.png" class="riderpic"><h1 id="distanceRide"></h1></div>
          
        <div id="orderreceipt">
              <table>
                <i class="fas fa-car"></i>     <button><a href="https:www.google.com/maps/dir/?api=1&origin=24.9283,67.1111&destination=24.9455,67.1154&dir_action=navigate&travelmode=driving&layer=traffic
                " target="_blank"><i class="fas fa-location-arrow"></i></a></button>
                  <caption>Order Summary </caption>
                  <thead>
                  <tr>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="cartdetail itemname">Onion 1kg</td>
                      <td class="cartdetail quantity">1</td>
                      <td class="cartdetail unitprice">90 Rs</td>
                      <td class="cartdetail total">90 Rs</td>
                  </tr>
                  <tr>
                    <td class="cartdetail itemname">Tomato 1/2 kg</td>
                    <td class="cartdetail quantity">2</td>
                    <td class="cartdetail unitprice">40 Rs</td>
                    <td class="cartdetail total">80 Rs</td>
                </tr>
                    <tr><td>Cart Total</td><td>170 Rs</td></tr>
                    <tr><td>GST</td><td>34 Rs</td></tr>
                    <tr><td>Delivery Charge</td><td id="delivery">50 Rs</td></tr>
                    <tr><td>Discount</td><td style="color:red;">64 Rs</td></tr>
                    <tr><td>Final</td><td>190 Rs</td></tr>
                </tbody>
              </table>
         </div>
         </div>
    </div>
   
<script>

function initMap() {
  

 /* const image = {
    url: "http//bike.jpg",
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32),
  };*/




  /*console.log(marker);*/
function handleLocationError(browserHasGeolocation){

}
   navigator.geolocation.getCurrentPosition(showPosition,handleLocationError(true),{maximumAge:10000, timeout:5000, enableHighAccuracy: true});
   function showPosition(position){
       currentLatitude=position.coords.latitude;
       currentLongitude=position.coords.longitude;
   const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat:currentLatitude, lng:currentLongitude },
    zoom: 15,
  });
    image={
        url:'download.png',
        scaledSize:new google.maps.Size(50,50)
    }
  marker= new google.maps.Marker({
    
    
     map: map,
      

     draggable: true,
   });
   marker.setPosition(map.center);
 /*  alert(map.center);
   console.log(marker);
   console.log(marker.position.lat());*/
   const geocoder= new google.maps.Geocoder();
   google.maps.event.addListener(marker, 'dragend', function(e) {
       
       
       latPlace=e.latLng.lat();
       lngPlace=e.latLng.lng();
       const PlaceObject={lat:latPlace,lng:lngPlace};
       geocoder.geocode({location:PlaceObject},function(result,status){
           console.log(result);
           document.getElementById('location').value=result[0].formatted_address;
       });

   });
   google.maps.event.addListener(marker,"click",function(ev){
var url="https:www.google.com/maps/dir/?api=1&origin=24.9283,67.1111&destination=24.9455,67.1154&dir_action=navigate&travelmode=driving&layer=traffic";
window.location.href=url;
   });
   
   const trafficLayer = new google.maps.TrafficLayer();
   console.log(trafficLayer);
   trafficLayer.setMap(map);
   const destinationLatitude=24.9455;
   const destinationLongitude=67.1154;
   const request={
       origin:map.center,
       destination:{lat:destinationLatitude,lng:destinationLongitude},
       travelMode:"DRIVING",
       provideRouteAlternatives:true
    
       
       
   };
   const dS=new google.maps.DirectionsService();
   
   dS.route(request,function(result,status){
     
     if(status=="OK"){
       /*  marker.setMap(null);*/
      dr=   new google.maps.DirectionsRenderer({map:map,directions:result,suppressMarkers:true});
      console.log(dr);
         console.log(result);
         var leg = result.routes[ 0 ].legs[ 0 ];
            console.log(leg);
     }
   });
    dirSer=new google.maps.DistanceMatrixService();
    dirSer.getDistanceMatrix({
        origins:[map.center],
       destinations:[{lat:destinationLatitude,lng:destinationLongitude}],
       travelMode:"DRIVING"
       
    
    },resultDistance);
      function resultDistance(res){
  
        
    
     console.table  ( res.rows[0].elements[0]);
distance= res.rows[0].elements[0].distance.value;
distance=distance/1000;
     if(distance<3){
         message="Our Rider is Near Your Location " + distance + "KM Away From Location";
     }else{
         message="Our Rider is " + distance + " KM Away From Location";
     }

      document.getElementById('distanceRide').innerHTML=message; 

      }
}
    // initialize services
}



window.initMap = initMap;

        
</script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALjpQp0rbk7coMTw-X845tOxIuTMkt7wA&callback=initMap"
defer
></script>


</body>
</html>