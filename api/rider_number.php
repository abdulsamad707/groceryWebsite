
<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include("validkey.php");
ob_start();
$sql="SELECT count(DISTINCT orderscustomer.deliveryboyid) as numberofriders FROM `orderscustomer` WHERE DATE_format(orderDate,'%Y-%m')=Date_FORMAT(CURRENT_DATE,'%Y-%m') AND orderStatus='5'";
$active_riders=$data->sql($sql,"read");
echo json_encode($active_riders);
?>