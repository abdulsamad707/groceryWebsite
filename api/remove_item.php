<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");

$userdata = file_get_contents("php://input");
$userdata = json_decode($userdata, true);
$adminData=$data->getData("setting",null,null,null,null,null,null,null);

$minOrder=$adminData["data"][0]["minOrder"];
$order_id=$userdata["orderId"];
$price=$userdata["price"];
$product_id=$userdata["product_id"];
$qty=$userdata["qty"];
$orderData=$data->getData("orderscustomer",null,null,null,"id='$order_id'",null,null,null);
$deliveryCharge=$orderData["data"][0]["deliveryCharge"];
$gst=$orderData["data"][0]["gstperc"];
$cartTotal=$orderData["data"][0]["cartTotal"];
$totalItem=$orderData["data"][0]["totalItem"];
 $newTotal=$totalItem-1;
 $order_id;
 $newCartTotal=$cartTotal-($price*$qty);

  $newgst=ceil(($gst/100)*$newCartTotal);
       if($newCartTotal >= $minOrder){
         $newOrderTotal=$newgst+$newCartTotal+$deliveryCharge;
         $orderUpdate["gst"]=$newgst;
         $orderUpdate["totalItem"]=$newTotal;
         $orderUpdate["gstperc"]=$gst;
         $orderUpdate["cartTotal"]= $newCartTotal;
         $orderUpdate["totalAmount"]=$newOrderTotal;
         $order_id;
         $product_id;
         $data->updateData("orderscustomer",$orderUpdate,["id"=>"'$order_id'"]);  
    $data->deleteData("orderdetail","product_id='$product_id'");  

       }

echo json_encode($userdata);
   ?>
