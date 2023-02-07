
<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');


include("validkey.php");
ob_start();
/*1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit




*/


$join="left JOIN orderdetail on orderdetail.product_id=products.id left JOIN productrating on productrating.product_id=products.id";
$groupby="products.id";
$rows="products.id,PRODUCTS.IMAGE, products.productName,products.price,products.image,products.price*ifnull(sum(orderdetail.qty),0) as revenue ,  ifnull(format(AVG(productrating.rating),2),0.00) as rating,ifnull(sum(orderdetail.qty),0) as qty_sold ,if(products.qty-ifnull(sum(orderdetail.qty),0)>0,products.qty-ifnull(sum(orderdetail.qty),0),0) as qty_remaining";
$productData=$data->getData('products',$rows,$groupby,$join,null,null,null,null);


echo json_encode($productData);




?>
