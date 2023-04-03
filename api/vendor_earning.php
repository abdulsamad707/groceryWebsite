<?php
include("validkey.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
/*
$sql="DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m')";
*/
$sql="select  count(orderdetail.product_id) as product_sold, DATE_Format(orderscustomer.orderDate,'%M-%Y') as monthyear,SUM(orderdetail.price*orderdetail.orderqty) as earning,admins.username,admins.mobile FROM orderdetail INNER JOIN orderscustomer ON orderdetail.order_id=orderscustomer.id";
$sql.=" INNER JOIN products ON products.id=orderdetail.product_id";
$sql.=" INNER JOIN admins ON admins.id=products.admin_id ";
if(isset($_GET['earntype'])){
$sql.=" WHERE orderscustomer.orderStatus=5 AND admins.role=2 AND DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m') ";
}else{
    $sql.=" WHERE orderscustomer.orderStatus=5  AND admins.role=2";
}


 $sql.= " group by month(orderscustomer.orderDate), year(orderscustomer.orderDate), products.admin_id";

$vendor=$data->sql($sql,"read");
$vendorearning["detail_earning"]=$vendor["data"];
$vendorearntotal=0;
if(!$vendor["data"][0]){
    $totalVendor=0;
}
$totalVendor=$vendor["totalRecord"];
$product_sold_total=0;
foreach($vendor["data"] as $val){
    $vendorearntotal=$vendorearntotal+$val['earning'];
    $product_sold_total=$product_sold_total+$val["product_sold"];
}
if(isset($_GET['earntype'])){
$vendorearning["totalEarn"]=$vendorearntotal;
}else{
    $vendorearning["totalEarns"]=$vendorearntotal;
}
$vendorearning["totalvendor"]=$totalVendor;
$vendorearning["product_sold_total"]= $product_sold_total;
echo json_encode($vendorearning);
?>