<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
ob_start();
if(!isset($status)){
         


  /* 1-table
   2-rows
   3-groupBy
   4-join
   5-whereCondition
   6-orderBy
   7-limit


   */

         if(isset($_REQUEST['id'])){
            $orderID=$_REQUEST['id'];
            $whereCondition=" orderscustomer.id ='$orderID'";                                               
          
            $orderBy=null;
            $limit=null;
         }else{
             


             if(isset($_GET['orderType'])){


               $orderType=$_GET["orderType"];
               if($orderType==="topfive"){
               $orderBy="totalAmount  DESC";
               $limit=5;

               }
               if($orderType==="Recent"){
                  $orderBy="orderDate DESC";
                  $limit=5;
               }

            }



            $whereCondition=null;
}
$table="orderscustomer";
$rows="users.mobile as customer_mobile,users.username as customer_name,statusorder.status as OrderStatus,deliveryboy.username as rider_name,deliveryboy.mobile as rider_number,orderscustomer.id as orderID,date_format(orderDate,'%d-%M-%Y') as orderDate , totalAmount,deliveryCharge,deliveryAddress,paymentmethod,discount,couponCode,totalItem";
$join="LEFT JOIN users on orderscustomer.userId=users.id LEFT JOIN  deliveryboy  on orderscustomer.deliveryboyid=deliveryboy.id  LEFT JOIN statusorder ON orderscustomer.orderStatus=statusorder.status_id";
$orderdata = $data->getData($table,$rows,null,$join,$whereCondition,$orderBy,$limit,null);
   echo json_encode($orderdata);
  

  

          
    
           
        
               
   
                        
      
     
    }
  

?>