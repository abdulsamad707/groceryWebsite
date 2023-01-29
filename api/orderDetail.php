<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
$orderId=$_REQUEST["order_id"];





?>