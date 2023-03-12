





<?php
include "validkey.php";
header('Access-Control-Allow-Origin:*');
include("function.php");
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


$email=$userdata['email'];
$password=$userdata['password'];
$whereCondition="email='$email' OR username='$email' ";
$userDataformbase=$data->getData("users",null,null,null,$whereCondition,null,null,null);

if(isset($userDataformbase["data"][0])){
$username= $userDataformbase["data"][0]["username"];


$customer_id=$userDataformbase["data"][0]["id"];
$useraddressdata=$data->getData("address",null,null,null,"user_id='$customer_id'",null,null,null);
if(isset($useraddressdata["data"][0])){
  $useraddress=$useraddressdata["data"][0]["address"];
}else{
  $useraddress="";
}

$customer_status=$userDataformbase["data"][0]["status"];
$email=$userDataformbase["data"][0]["email"];
$username=$userDataformbase["data"][0]["username"];
$newPassword=strtolower($username)."123";
$userpassword= $userDataformbase["data"][0]["password"];
$mobile= $userDataformbase["data"][0]["mobile"];
if(password_verify($password,$userpassword)){
          if($customer_status==1){
$otp=mt_rand(1111,9999);

            $payload=[
              "id"=>$customer_id,
              "email"=>$email,
              "username"=>$username,
               "address"=>$useraddress,
               "mobile"=>$mobile,
                 "otp"=>$otp
                      ];


$data->updateData("users",["otp"=>$otp,"otp_verify"=>0],["id"=>"'$customer_id'"]);
                   $jwt=$data-> CreateToken($payload,'keys');
                   $message="Your Otp  Is $otp";
                   $subject="OTP Verification ";
                   	   sendMail($message,$email,$username,$subject);
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