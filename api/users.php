<?php	


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');

header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include("validkey.php");
ob_start();
if(!isset($status)){


       if(isset($_GET['id'])){
       $id=  $_GET['id'];
       $sql="SELECT * FROM users WHERE id='$id'";
       }else{
         if(isset($_GET["user_type"])){
           $user_type=$_GET["user_type"];
           if($user_type==="active_user_current_month"){
            $sql="SELECT count(DISTINCT userId) as number_of_customer_this_month FROM orderscustomer WHERE DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m')";
           }
           if($user_type==="active_user_previous_month"){
            $sql="SELECT count(DISTINCT userId) as number_of_customer_this_month FROM orderscustomer WHERE DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(SUBDATE(CURRENT_DATE, INTERVAL 1 MONTH),'%Y-%m')";
           }
           if($user_type==="top_two_active_user_detail"){
           $sql="SELECT count(userId) as number_of_order,users.email,users.username, userId FROM orderscustomer LEFT JOIN users ON users.id=orderscustomer.userId group by userId order by number_of_order DESC LIMIT 2";
           }
        } 
        
     


        else{
       $sql= "SELECT * FROM users";
          }    
       }




       $userdata=$data->sql($sql,"read");


      
        echo json_encode($userdata);
           
    }

     

?>