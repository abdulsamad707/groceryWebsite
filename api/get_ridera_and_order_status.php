<?php







header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
ob_start();


if(!isset($status)){

$requestMethod=$_SERVER["REQUEST_METHOD"];
   if($requestMethod=="GET"){
       $order=$data->getData("statusorder","status_id,status",null,null,null,null,null);
       $rider=$data->getData("deliveryboy","id,username",null,null,"busy='0'",null,null);
       $orderStatus["orderStatus"]=$order["data"];
       $orderStatus["riders_active"]=$rider["data"];
      echo json_encode($orderStatus);


   }else{

   }
}





















?>