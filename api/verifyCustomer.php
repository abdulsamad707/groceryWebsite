


<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include("validkey.php");

include("function.php");
ob_start();
if(!isset($status)){
     $userdata=file_get_contents("php://input");
           $userdata=json_decode($userdata,true);
          $customer_id=$userdata["id"];

  $insertStatus['message']='Customer Verified Successfully';
  $useraddressdata=$data->getData("users",null,null,null,"id='$customer_id'",null,null,null);
  $email=$useraddressdata["data"][0]["email"];
  $username=$useraddressdata["data"][0]["username"];
  $message="OTP Has Been Verified Login Successfully";
  $subject="OTP Verification";
  sendMail($message,$email,$username,$subject);
  $updatedata=  $data->updateData("users",['otp_verify'=>1,'otp'=>0],["id"=>"'$customer_id'"]);

  echo json_encode($insertStatus);
  
 /*$updatedata=  $data->updateData("users",['verified'=>1,'str_rand'=>'','otp'=>'']
 ,['otp'=>$mobile,'str_rand'=>$token]);
 $sendMailer=sendMail($email_message,$email,$username,$subject);
 $number="+".$mobile;
 $message=" $username Your Account Has Been Verified Successfully  Regards IAD Project Grocery PK";*/
/*    $json= SendSms($number,$message);*/
 
  
 

}
?>