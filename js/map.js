  function currLoct(){

    currentLongitude=67.1111;
    currentLatitude=24.9284;
  }
 locatObject=[];
  currLoct();
  function errmsg(err){

  }
  navigator.geolocation.getCurrentPosition(showPosition,errmsg(true),{enableHighAccuracy: true});

  function showPosition(position){
    console.log(position);
      
      currentLatitude=position.coords.latitude,
      currentLongitude=position.coords.longitude
      
    locatObject.push(currentLongitude);
    locatObject.push(currentLatitude);
  }
markerCenterLat=0;
markerCenterLng=0;
deliveryAddress=[];
long= currentLongitude;
lat= currentLatitude;
function init() {
  geocoder= new google.maps.Geocoder();
  lengthOfarray=  locatObject.length;
  console.log(lengthOfarray);
long=  locatObject[0];
lat=locatObject[1];

console.log(locatObject);
 


  const map = new google.maps.Map(document.getElementById("map"), {
   center: { lat:lat, lng:long },
   zoom: 15,
 });
 marker= new google.maps.Marker({
    
    
  map: map,
   

  draggable: true,
});
geocoder.geocode({location:{lat:lat,lng:long}},function(result,status){
  console.log(result);
  deliveryAddresses=result[0].formatted_address;
   
  console.log(deliveryAddress);
});
marker.setPosition(map.center);

google.maps.event.addListener(marker, 'dragend', function(e) {
  lat=e.latLng.lat();
  long=e.latLng.lng();
  const PlaceObject={lat:lat,lng:long};
  geocoder.geocode({location:PlaceObject},function(result,status){
      console.log(result);
      deliveryAddresses=result[0].formatted_address;
      
      console.log(deliveryAddress);
  });
   map.setCenter({lat:lat,lng:long});
});
const addressField=document.getElementById("SearchLocation");
autocomplete = new google.maps.places.Autocomplete(addressField, {

  fields: ["formatted_address", "geometry", "name"],
  types: ["establishment"],
});
addressField.focus();
autocomplete.addListener("place_changed", fillInAddress);
// When the user selects an address from the drop-down, populate the
// address fields in the form.
deliveryAddressesplace='';
function fillInAddress(){
      
  const place = autocomplete.getPlace();
  
      deliveryAddressesplace=place.formatted_address;
  map.setCenter(place.geometry.location);
  marker.setPosition(place.geometry.location);
    lat=place.geometry.location.lat();
    long=place.geometry.location.lng();
  map.setZoom(17);

  $("#SearchLocation").val(deliveryAddressesplace);
 }
} 
console.log($("#SearchLocation").val());

console.log(deliveryAddress);


  $("#proceed").click(function(){

    long=long.toFixed(4);
    lat=lat.toFixed(4);
alert( deliveryAddressesplace+lat);

     if(deliveryAddressesplace==""){
      deliveryAddressesplace=deliveryAddresses;
     }
    /*window.location.href = "http://localhost/grocery/checkout.php?lng="+lngPlace+"&lat="+latPlace;*/
    link= "http://localhost/grocery/checkout.php?lng="+long+"&lat="+lat;
    console.log(link);
        setInterval(function(){
        window.location.href=link;
        },4000);
    
  });
 
