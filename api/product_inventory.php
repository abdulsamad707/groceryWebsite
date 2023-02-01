<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
/*
SELECT products.productName,products.image,products.productName,orderdetail.qty,orderdetail.price
,orderdetail.price*orderdetail.qty as revenue

orderdetail left join products on orderdetail.product_id=products.id
left join orderscustomer on 
orderdetail.order_id=orderscustomer.id
WHERE orderscustomer.orderStatus="5"
group by product_id

1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit
*/
$select_row="sum(orderdetail.qty)*orderdetail.price as revenue , orderdetail.price,products.productName,products.id as pid,sum(orderdetail.qty) as sold,products.image";
$join="left join products on orderdetail.product_id=products.id left join orderscustomer on orderdetail.order_id=orderscustomer.id";
$groupby="product_id";
$limit=2;
$orderBy="sum(qty)";
$productInventory=$data->getData("orderdetail",$select_row,$groupby,$join,null,'sum(orderdetail.qty)',$limit,null);

echo json_encode($productInventory);




?>