


<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST,PUT');


include("validkey.php");

$reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="POST"){

}else{
  $setting=  $data->getData("setting",null,null,null,null,null,null);
  echo json_encode($setting);
}


?>