
<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');


include("validkey.php");
ob_start();


$productData=$data->getData('products',null,null,null,null,null,null,null);


echo json_encode($productData);




?>
