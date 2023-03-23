<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
/*

1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit
*/
$select_row="sum(orderdetail.qtyorder)*orderdetail.price as revenue , orderdetail.price,products.productName,products.id as pid,sum(orderdetail.qtyorder) as sold,products.image";
$join="left join products on orderdetail.product_id=products.id left join orderscustomer on orderdetail.order_id=orderscustomer.id";
$groupby="product_id";
$limit=2;
$orderBy="sum(qty)";
$productInventory=$data->getData("orderdetail",$select_row,$groupby,$join,null,"revenue DESC",$limit,null);
echo json_encode($productInventory);





?>