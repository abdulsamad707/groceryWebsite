<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:POST');

include("validkey.php");
ob_start();


$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);



$status=$userdata["status"];
echo $RiderId=$userdata["RiderId"];

 echo $updateStatus["status"]=$status;

$data->updateData("deliveryboy",$updateStatus,["id"=>"'$RiderId'"]);




?>