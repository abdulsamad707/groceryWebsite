
<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");

$whereCondition="gst=0";
$orderdata = $data->getData("orderscustomer", null, null,null,$whereCondition,null, null, null);
foreach($orderdata['data'] as $da){
    $order_id=$da["id"];
   print_r($data->deleteData("orderdetail","order_id=' $order_id'"));
   print_r($data->deleteData("orderscustomer","id=' $order_id'"));
}
?>