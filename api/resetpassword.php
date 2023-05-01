





<?php
include "validkey.php";
/*
require "../vendor/autoload.php";

$sid = "ACXXXXXX"; // Your Account SID from https://console.twilio.com
$token = "YYYYYY"; // Your Auth Token from https://console.twilio.com
$client = new Twilio\Rest\Client($sid, $token);

// Use the Client to make requests to the Twilio REST API
$client->messages->create(
    // The number you'd like to send the message to
    '+15558675309',
    [
        // A Twilio phone number you purchased at https://console.twilio.com
        'from' => '+15017250604',
        // The body of the text message you'd like to send
        'body' => "Hey Jenny! Good luck on the bar exam!"
    ]
);
*/
header('Access-Control-Allow-Origin:*');
include("function.php");
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


extract($userdata);

$whereCondition="email='$email'";
$userDataformbase=$data->getData("users",null,null,null,$whereCondition,null,null,null);
if(isset($userDataformbase["data"][0])){


    $username= $userDataformbase["data"][0]["username"];
     $databaseotp= $userDataformbase["data"][0]["otp"];

      if($otp==$databaseotp){

 
  $password=password_hash($pass,PASSWORD_BCRYPT,['cost'=>12]);
 $data->updateData("users",["otp"=>0,"password"=>$password],["email"=>"'$email'"]);
    echo json_encode(["message"=>"Password Change Successfully","code"=>200,"status"=>"success"]);
      }else{
        echo json_encode(["message"=>"Invalid OTP","code"=>404,"status"=>"error"]);
      }
}else{
    echo json_encode(["message"=>"User Not Register","code"=>404,"status"=>"error"]);
}


?>