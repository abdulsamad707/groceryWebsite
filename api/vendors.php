<?php
include("validkey.php");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
/*
$sql="DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m')";
*/





if(isset($_GET["inventory"]) && isset($_GET["vendor_id"]) && $_GET["vendor_id"]!="" ){
    $admin_id=$_GET["vendor_id"];
    $sql="select count(orderdetail.product_id) as numberofproductsold,ifnull(sum(orderdetail.orderqty*orderdetail.price),0) as earning,admins.id as admin_id,DATE_format(orderDate,'%M-%Y') as monthyearoder ,admins.id as admin_id,admins.username,admins.mobile from admins LEFT JOIN products ON products.admin_id=admins.id";
    $sql.=" LEFT JOIN orderdetail ON products.id=orderdetail.product_id";
    $sql.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id ";
    $sql.=" WHERE admins.role =2 AND admins.id='$admin_id' ANd orderscustomer.orderStatus='5'";

    $sql.="  GROUP By month(orderDate),year(orderDate),admins.id HAVing earning > 0  ";
    $sqlproduct="SElect ifnull(sum(orderdetail.orderqty*orderdetail.price),0) as revenue,products.productName From  products LEFT JOIN orderdetail ON orderdetail.product_id=products.id LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id Where  products.admin_id='$admin_id' Group By products.id ";
    $vendorproducts=$data->sql($sqlproduct,"read");
    $vendor["earning_details"]=$data->sql($sql,"read");
    $earning=0;
    if(isset($vendor["earning_details"]["data"][0])){
    foreach($vendor["earning_details"]["data"] as $value){
       $earning=$earning+$value["earning"];
    }
  }else{
    $earning=0;
  }     
    $vendor["vendor_earning_total"]= $earning;
    $vendor["product_vendor"]=$vendorproducts;
    $vendor["total_productIn_the_store"]=$vendorproducts["totalRecord"];
    $vendor["vendor_detail"]=$data->sql("SELECT username,mobile FROM admins WHERE admins.id='$admin_id'","read");

    echo json_encode($vendor);
    return false;
}else{
    $sql="select admins.id as admin_id,admins.username,admins.mobile,IFNULL(sum(orderdetail.orderqty*orderdetail.price),0) as earning from admins LEFT JOIN products ON products.admin_id=admins.id";
    $sql.=" LEFT JOIN orderdetail ON products.id=orderdetail.product_id";
    $sql.=" LEFT JOIN orderscustomer ON orderscustomer.id=orderdetail.order_id";
    $sql.=" WHERE admins.role=2 ";
    $sql.=" GROUP BY products.admin_id order by admins.id ";
    
    $vendor=$data->sql($sql,"read");
  
    echo json_encode($vendor);
}




die();

?>