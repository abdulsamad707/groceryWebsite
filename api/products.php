
<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");


$join="RIGHT JOIN  products ON  productrating.product_id=products.id";
$rows="ceil(AVG(rating)) as avg_rate ,products.productName,price,products.id as pid";
$groupBy="productrating.product_id";
$productData=$data->getData('productrating',$rows,$groupBy,$join,null,null,null,null);


echo json_encode($productData);




?>
