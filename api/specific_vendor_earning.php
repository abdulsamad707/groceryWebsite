<?php


header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");
include("function.php");
$admin_id=$_GET['vendor_id'];
$inv=$_GET["inventory"];

$sql="SELECT sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%M-%Y') as orderDates FROM admins"; 

$sql.=" LEFT JOIN products ON products.admin_id=admins.id";
$sql.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sql.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";

$sql.=" WHERE admins.id='$admin_id'  group by MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username ";

$adminearning=$data->sql($sql,'read');


$sqldaily="SELECT sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%d-%M-%Y') as orderDates FROM admins";
$sqldaily.=" LEFT JOIN products ON products.admin_id=admins.id";
$sqldaily.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sqldaily.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
$sqldaily.=" WHERE admins.id='$admin_id'  group by day(orderscustomer.orderDate),MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username ";
$adminearning=$data->sql($sql,'read');
$adminearningdaily=$data->sql($sqldaily,'read');
$totalVendorEarn=0;
$totalProductSell=0;
if(isset($adminearning["data"][0])){
	foreach($adminearning["data"] as $earningvalue){
		$totalVendorEarn=$totalVendorEarn+$earningvalue["earning"];
		$totalProductSell=$totalProductSell+$earningvalue["productSell"];
	}
}else{
	$totalVendorEarn=0;
$totalProductSell=0;
}

$sql_today="select ifNULL(sum(earning),0) as earningTotal From (SELECT admins.username, sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%M-%Y') as orderDates FROM admins ";
$sql_today.=" LEFT JOIN products ON products.admin_id=admins.id ";
$sql_today.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sql_today.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
$sql_today.=" WHERE admins.id='$admin_id' and DATE_FORMAT(orderscustomer.orderDate,'%d-%M-%Y')= DATE_FORMAT(CURRENT_DATE,'%d-%M-%Y') group by day(orderscustomer.orderDate),MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username) as eartotal ";


$sql_today_data=$data->sql($sql_today,"read");
$sql_yest="select ifNULL(sum(earning),0) as earningTotal From (SELECT admins.username, sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%M-%Y') as orderDates FROM admins ";
$sql_yest.=" LEFT JOIN products ON products.admin_id=admins.id ";
$sql_yest.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sql_yest.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
$sql_yest.=" WHERE admins.id='$admin_id' and DATE_FORMAT(orderscustomer.orderDate,'%d-%M-%Y')= DATE_FORMAT(subdate(CURRENT_DATE,INTERVAL 1 day),'%d-%M-%Y') group by day(orderscustomer.orderDate),MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username) as eartotal ";

$sql_previous="select ifNULL(sum(earning),0) as earningTotal From (SELECT admins.username, sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%M-%Y') as orderDates FROM admins ";
$sql_previous.=" LEFT JOIN products ON products.admin_id=admins.id ";
$sql_previous.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sql_previous.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
$sql_previous.=" WHERE admins.id='$admin_id' and DATE_FORMAT(orderscustomer.orderDate,'%M-%Y')= DATE_FORMAT(subdate(CURRENT_DATE,INTERVAL 1 MONTH),'%M-%Y') group by MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username) as eartotal ";
$sql_current="select ifNULL(sum(earning),0) as earningTotal,ifnull(sum(productSell),0) as totalProduct From (SELECT admins.username, sum(orderdetail.orderqty*orderdetail.price) as earning,IFNULL(sum(orderdetail.orderqty),0) as productSell,DATE_format(orderscustomer.orderDate,'%M-%Y') as orderDates FROM admins ";
$sql_current.=" LEFT JOIN products ON products.admin_id=admins.id ";
$sql_current.=" LEFT JOIN orderdetail ON orderdetail.product_id=products.id ";
$sql_current.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
$sql_current.=" WHERE admins.id='$admin_id' and DATE_FORMAT(orderscustomer.orderDate,'%M-%Y')= DATE_FORMAT(CURRENT_DATE,'%M-%Y') group by MONTH(orderscustomer.orderDate),year(orderscustomer.orderDate),products.admin_id HAVINg earning >0 order by admins.username) as eartotal ";
$sql_today_data=$data->sql($sql_today,"read");
$sql_yest_data=$data->sql($sql_yest,"read");
$sql_previous_data=$data->sql($sql_previous,"read");
$sql_current_data=$data->sql($sql_current,"read");
$productInventorySql="select sum(orderdetail.orderqty*orderdetail.price) as revenue,sum(orderdetail.orderqty) as qty_sold,products.productName from products left join orderdetail ON  orderdetail.product_id=products.id WHERE admin_id='$admin_id' group by products.id LIMIT 2";
$productInventorydata=$data->sql($productInventorySql,"read");
$adminearnings["todayearning"]=$sql_today_data["data"][0]["earningTotal"];
$adminearnings["yesterdayearning"]=$sql_yest_data["data"][0]["earningTotal"];
$adminearnings["previousmonthearning"]=$sql_previous_data["data"][0]["earningTotal"];
$adminearnings["currentmonthearning"]=$sql_current_data["data"][0]["earningTotal"];
$adminearnings["productsellTotal"]=$totalProductSell;
$adminearnings["totalEarn"]=$totalVendorEarn;
$adminearnings["totalProductSellTHismOnth"]=$sql_current_data["data"][0]["totalProduct"];

$adminearnings["earndetailmonthly"]=$adminearning["data"];
$adminearnings["earndetaildaily"]=$adminearningdaily["data"];
$adminearnings["productSellRecord"]=$productInventorydata['data'];
echo json_encode($adminearnings);


?>