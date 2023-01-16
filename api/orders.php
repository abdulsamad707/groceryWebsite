<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include("validkey.php");
ob_start();
if(!isset($status)){
         
         if(isset($_REQUEST['id'])){
            $orderID=$_REQUEST['id'];
            $whereCondition=" orderscustomer.id ='$orderID'";                                               
          

         }else{

            $whereCondition=null;

}
$table="orderscustomer";
$rows="users.mobile as customer_mobile,users.username as customer_name,statusorder.status as OrderStatus,deliveryboy.username as rider_name,deliveryboy.mobile as rider_number,orderscustomer.id as orderID,date_format(orderDate,'%d-%M-%Y') as orderDate , totalAmount,deliveryCharge,deliveryAddress,paymentmethod,discount,couponCode,totalItem";
$join="LEFT JOIN users on orderscustomer.userId=users.id LEFT JOIN  deliveryboy  on orderscustomer.deliveryboyid=deliveryboy.id  LEFT JOIN statusorder ON orderscustomer.orderStatus=statusorder.status_id";
$orderdata = $data->getData($table,$rows,null,$join,$whereCondition,null,null,null);
   echo json_encode($orderdata);
  

  
  /*  echo "Where condition";
    echo "<pre>";
    print_r($whereArray);
          echo "</pre>";
        echo "Tables";
    echo "<pre>";
    print_r($tables);
          echo "</pre>";
                echo "Table Rows";
    echo "<pre>";
    print_r($tableRows);
          echo "</pre>";
          */
          
    
           
        
               
   
                        
      
     
    }
  

?>