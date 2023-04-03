


<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');


include("validkey.php");

$reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="POST"){
  $userdata=file_get_contents("php://input");
 $userdata=json_decode($userdata,true);
 $data->updateData("setting",$userdata,["id"=>"1"]);
  echo json_encode(["msg"=>"Web Setting has been Updated"]);
}else{
  $setting=  $data->getData("setting",null,null,null,null,null,null);
  echo json_encode($setting);
}


?>