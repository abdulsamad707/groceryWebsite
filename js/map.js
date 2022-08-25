function initMap() {
  try{
    currentLongitude=67.1111;
    currentLatitude=24.9283;
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
      console.log(marker);
      lngPlace=0;
      latPlace=0;
      google.maps.event.addListener(marker, 'dragend', function(e) {
        latPlace=e.latLng.lat();
        lngPlace=e.latLng.lng().toFixed(4);
   

      });



  }catch(Exception){

  }
  $("#proceed").click(function(){
    window.location.href = "http://localhost/grocery/checkout.php?lng="+lngPlace+"&lat="+latPlace;
  });

  }
