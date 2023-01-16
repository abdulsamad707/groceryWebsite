<?php 
include("validkey.php");
if(!isset($status)){
@$inventoryType=$_GET["invtype"];
if(isset($inventoryType)){
    $Sql="";
    $orderdateFormat="";
    if($inventoryType==="monthly"){

        $orderdateFormat="DATE_FORMAT(orderDate,'%M-%Y')as monthyear";
        $groupBy=" year(orderDate), month(orderDate)";
        $orderBy="year(orderDate), month(orderDate)";
    }else if($inventoryType==="daily"){
        $orderdateFormat="DATE_FORMAT(orderDate,'%d-%M-%Y') as OrderDate";
        $groupBy=" day(orderDate), month(orderDate),year(orderDate)";
        $orderBy=" date(orderDate)";
    }
   
  
    $rows=" $orderdateFormat,(SELECT sum(totalAmount)-(Sum(gst)+sum(deliveryCharge)) from orderscustomer WHERE orderStatus='5' ) as totalEarning, count(*) as orderCompleted  ,sum(totalAmount)-(sum(gst)+sum(deliveryCharge)) as Earning ,sum(totalItem) as itemSold";
    $where="orderStatus='5'";
     $inventorydata = $data->getData("orderscustomer",$rows,$groupBy,null,$where,$orderBy,null,null);





 


}else{
    $inventorydata["data"]="";
    $inventorydata["message"]="Please provide inventory type";
    $inventorydata["code"]=500;

}
echo json_encode($inventorydata);
 

}
 ?>