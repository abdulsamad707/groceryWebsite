


function init() {

  try {
    currentLongitude=67.1111;
    currentLatitude=24.9283;
    const map = new google.maps.Map(document.getElementById("map"), {
   
      center: { lat:currentLatitude, lng:currentLongitude },
      zoom: 15,
    });
     
  }catch(err) {
    console.log(err.message);
  }
  } 

  
  
  $("#proceed").click(function(){
    try{
    window.location.href = "http://localhost/grocery/checkout.php?lng="+lngPlae+"&lat="+latPlace;
    }
    catch(Exception){
       console.log(Exception.message);
    }
  });
 
