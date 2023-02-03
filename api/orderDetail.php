<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
$orderId=$_REQUEST["order_id"];
echo $orderId;

/*

1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit
*/
$orderTotal=$data->getData("orderdetail",null,null,null,"order_id='$orderId'",null,null,null);
$orderDetail=$data->getData("orderscustomer",null,null,null,"id='$orderId'",null,null,null);

print_r($orderDetail);


print_r($orderTotal);
$cartTotal=0;
foreach($orderTotal['data'] as $value){
    $cartTotal=$cartTotal+($value["qty"]*$value["price"]);
}
echo "<BR>". $cartTotal;
echo $totalRecord=$orderTotal["totalRecord"];
$deliveryCharge=$orderDetail["data"][0]["deliveryCharge"];


$discount=$orderDetail["data"][0]["discount"];
$orderTotalAmount=($cartTotal+$deliveryCharge)-$discount;
echo $sql="UPDATE orderscustomer SET totalItem='$totalRecord', totalAmount ='$orderTotalAmount' Where id='$orderId'";
       $data->sql($sql,"update");




?>