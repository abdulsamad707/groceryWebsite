<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");


$product_id=$_GET["pid"];
$order_id=$_GET["id"];
$sql="SELECT  IFNULL(ROUND(AVG(rating),1),0) as rate FROM productrating  Where product_id='$product_id' AND order_id='$order_id'";
$ratingData=$data->sql($sql,"read");


$rdata=[
    "rating"=> $ratingData["data"][0]["rate"]
];
echo json_encode($rdata);

?>