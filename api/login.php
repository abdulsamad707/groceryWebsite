





<?php
include "validkey.php";
header('Access-Control-Allow-Origin:*');
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


$email=$userdata['email'];
$password=$userdata['password'];
$whereCondition="email='$email' OR username='$email' ";
$userDataformbase=$data->getData("users",null,null,null,$whereCondition,null,null,null);

if(isset($userDataformbase["data"][0])){
$username= $userDataformbase["data"][0]["username"];
$customer_id=$userDataformbase["data"][0]["id"];
$customer_status=$userDataformbase["data"][0]["status"];
$newPassword=strtolower($username)."123";
$userpassword= $userDataformbase["data"][0]["password"];
if(password_verify($password,$userpassword)){
          if($customer_status==1){


            $payload=[
              "id"=>$customer_id
          
              
                      ];
                   $jwt=$data-> CreateToken($payload,'keys');
            echo json_encode(["message"=>"Login Successfully","key"=>$jwt,"code"=>200,"status"=>"success"]);
          }else{
            echo json_encode(["message"=>"Your Id is blocked By Admin","key"=>" ","code"=>404,"status"=>"error"]);
          }
}else{



        
    echo json_encode(["message"=>"Invalid Credential Password","key"=>"","code"=>404,"status"=>"error"]);
}


}else{
echo json_encode(["message"=>"Invalid Credential","key"=>" ","code"=>404,"status"=>"error"]);

}



?>