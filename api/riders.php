


<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');

include("validkey.php");
ob_start();










 $reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="GET"){

  extract($_GET);
if(isset($rider_id)){
  $sql="SELECT  deliveryboy.id,deliveryboy.status,deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0)-IFNULL(sum(orderscustomer.deliverygst),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id WHERE deliveryboy.id= '$rider_id' group by deliveryboy.id order by number_of_order";

  $riderDatas=$data->sql($sql,"read");
  $sqlRiders="select date_format(orderDate,'%M-%Y') as ordermonthyear ,count(*) as numberoforder,sum(deliveryCharge) as earning from orderscustomer WHERE deliveryboyid=' $rider_id ' Group by month(orderDate),year(orderDate),deliveryboyid ";
  $sqlRiders=$data->sql($sqlRiders,"read");
  $riderDatas["earning_detail"]=$sqlRiders["data"];
echo json_encode($riderDatas);
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

}else{
       if(isset($_GET["rider_type"])){
      $rider_type = $_GET["rider_type"];

       if($rider_type=="active_riders"){
       $sql="SELECT count(DISTINCT orderscustomer.deliveryboyid) as numberofriders FROM `orderscustomer` WHERE DATE_format(orderDate,'%Y-%m')=Date_FORMAT(CURRENT_DATE,'%Y-%m') AND orderStatus='5'";
       }if($rider_type=="total_riders"){
        $sql="SELECT count(DISTINCT deliveryboy.id) as numberofriders FROM `deliveryboy`";  
       }
       $riderData=$data->sql($sql,"read");
       echo json_encode($riderData); 
    }else{

      if(isset($_GET['rider_id']) && $_GET['rider_id']!='' ){
       $rider_id= $_GET['rider_id'];
      
       return false;
       die();
      }
      if(isset($_GET['rider_name']) && $_GET['rider_name']!='' ){
        $rider_name=$_GET['rider_name'];
        $sql="SELECT  deliveryboy.id,deliveryboy.status,deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0)-IFNULL(sum(orderscustomer.deliverygst),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id WHERE username LIKE '%$rider_name%' group by deliveryboy.id order by number_of_order";
      }else{
        $sql="SELECT  deliveryboy.id,deliveryboy.status,deliveryboy.username,deliveryboy.mobile,IFNULL(sum(orderscustomer.deliveryCharge),0)-IFNULL(sum(orderscustomer.deliverygst),0) as Earning,count(orderscustomer.deliveryboyid) as number_of_order FROM deliveryboy LEFT JOIN orderscustomer ON deliveryboy.id=orderscustomer.deliveryboyid LEFT JOIN riderrating ON riderrating.rider_id=deliveryboy.id group by deliveryboy.id order by number_of_order";
      }
      $riderData=$data->sql($sql,"read");
      echo json_encode($riderData); 
    }
 

}

}else{
    $userdata=file_get_contents("php://input");

    $userdata=json_decode($userdata,true);

    print_r($userdata);
      
}

?>