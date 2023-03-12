


<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');

include("validkey.php");
ob_start();

extract($_GET);








 $reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="GET"){
if(isset($rider_id)){
 
/*
    1-table
    2-rows
    3-groupBy
    4-join
    5-whereCondition
    6-orderBy
    7-limit
  
  SELECT deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0),count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id LEFT JOIN assignorder ON assignorder.deliveryboyid=deliveryboy.id GROUP BY deliveryboy.id order by number_of_order;

SELECT count(DISTINCT orderscustomer.deliveryboyid) as numberofriders FROM `orderscustomer`
 WHERE DATE_format(orderDate,"%Y-%m")=Date_FORMAT(CURRENT_DATE,"%Y-%m");

$sql="SELECT deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy L
 
LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid 
LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id
 LEFT JOIN assignorder ON assignorder.deliveryboyid=deliveryboy.id 
 
 GROUP BY deliveryboy.id order by number_of_order";
*/
$rows="deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order_completed";
  $whereCondition="deliveryboy.id='$rider_id'";
$groupby=" deliveryboy.id ";
$orderby="number_of_order_completed";
$join=" LEFT JOIN assignorder ON assignorder.deliveryboyid=deliveryboy.id  LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id";
  $riderData=$data->getData("deliveryboy",$rows,$groupby,$join,$whereCondition,$orderby,null,null); 

}else{
       if(isset($_GET["rider_type"])){
      $rider_type = $_GET["rider_type"];

       if($rider_type=="active_riders"){
       $sql="SELECT count(DISTINCT orderscustomer.deliveryboyid) as numberofriders FROM `orderscustomer` WHERE DATE_format(orderDate,'%Y-%m')=Date_FORMAT(CURRENT_DATE,'%Y-%m')";
       }if($rider_type=="total_riders"){
        $sql="SELECT count(DISTINCT deliveryboy.id) as numberofriders FROM `deliveryboy`";  
       }
    }else{
        $sql="SELECT  deliveryboy.id,deliveryboy.status,deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0)-IFNULL(sum(orderscustomer.deliverygst),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id group by deliveryboy.id order by number_of_order";
    }
    $riderData=$data->sql($sql,"read");

}
echo json_encode($riderData);  
}else{
    $userdata=file_get_contents("php://input");

    $userdata=json_decode($userdata,true);

    print_r($userdata);
      
}

?>