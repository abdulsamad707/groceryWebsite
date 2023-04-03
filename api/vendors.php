<?php
include("validkey.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
/*
$sql="DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m')";
*/



$sql="select admins.username,admins.mobile,IFNULL(sum(orderdetail.orderqty*orderdetail.price),0) as earning from admins LEFT JOIN products ON products.admin_id=admins.id";
$sql.=" LEFT JOIN orderdetail ON products.id=orderdetail.product_id";
$sql.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id";
$sql.=" WHERE admins.role=2";
$sql.=" GROUP BY products.admin_id order by admins.id ";
$vendor=$data->sql($sql,"read");
print_r($vendor);
die();
$vendorearning["detail_earning"]=$vendor["data"];
$vendorearning["total_vendor"]=$vendor["totalRecord"];
$vendorearntotal=0;
$totalVendor=$vendor["totalRecord"];
$product_sold_total=0;
foreach($vendor["data"] as $val){
    $vendorearntotal=$vendorearntotal+$val['earning'];
    $product_sold_total=$product_sold_total+$val["product_sold"];
}
$vendorearning["totalEarn"]=$vendorearntotal;
$vendorearning["product_sold_total"]= $product_sold_total;
echo  "<pre>";
print_r($vendorearning);
echo json_encode($vendorearning);
?>