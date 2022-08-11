<?php	


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
include("validkey.php");
ob_start();
if(!isset($status)){


       if(isset($_GET['id'])){
       $id=  $_GET['id'];
       $sql="select users.email , count(customerID) as totalOrder, sum(order_amount) as totalAmountExpand
       from ordersCustomers right join users on ordersCustomers.customerID = users.id group by customerID
       ";
       }else{
       $sql=  " select users.email , count(customerID) as totalOrder, sum(order_amount) as totalAmountExpand
         from ordersCustomers right join users on ordersCustomers.customerID = users.id group by customerID
         ";
           
       }
       $userdata=$data->sql($sql,"read");

    $result[]=$userdata;
    
       
      $update= $data->updateData("apikey",["hit"=>$hit+1],["apikey"=>"'$apikey'"]);  
      

           
    }

         $result=json_encode($result);
echo $result;
?>