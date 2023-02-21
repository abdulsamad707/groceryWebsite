

<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');

include("validkey.php");
ob_start();


$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);

$userId=$userdata["userId"];
$whereConduction="users.id='$userId'";
$productData=$data->getData("users",null,null,null,$whereConduction,null,null,null);
  $status=$productData['data'][0]["status"];
  if($status==0){
    $newStatus=1;
  }else{
    $newStatus=0;
  }
$updateStatus["status"]=  $newStatus;
$data->updateData("users",$updateStatus,["id"=>"'$userId'"]);


?>