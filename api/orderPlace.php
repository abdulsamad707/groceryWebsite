<?php  

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
include("validkey.php");
include("function.php");
ob_start();

 $userdata=file_get_contents("php://input");
$userdata=json_decode($userdata,true);
$userId=$userdata["userId"];
$code=$userdata["couponCode"];
$discount=$userdata["discount"];
print_r($userdata);
setcookie("DISCOUNT",$discount);


/*
$insertStatus=$data->insert('orderscustomer',$userdata);

$ordernewId=$insertStatus["insertId"];
$orderStatus["message"]="Order has been successfully Placed Your Order Is $ordernewId ";
$orderStatus["code"]=200;
echo json_encode($orderStatus);
*/
$ipadd=get_client_ip();

$whereCond="userId='$userId'";
$cartData=$data->getData('carts',null,null,null,$whereCond,null,null,null); 


$cartTotal=cartTotal($cartData,$data,$discount,$code);
print_r($cartTotal);
/*
1- table
2- rows
3- group By
4- Join 
5- where 
6 - order by
7 - limit
8- operator
*/





  
  ?>