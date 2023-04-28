





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


$email=$userdata['email'];

$whereCondition="email='$email'";
$userDataformbase=$data->getData("users",null,null,null,$whereCondition,null,null,null);
if(isset($userDataformbase["data"][0])){
    $username= $userDataformbase["data"][0]["username"];
    $otp=mt_rand(1111,9999);
 
    $data->updateData("users",["otp"=>$otp],["email"=>"'$email'"]);
    $message="The OTP For Forgot Password is :" . $otp;
    $subject="OTP For Forgot Password ";
    sendMail($message,$email,$username,$subject);
}else{
    echo json_encode(["message"=>"Invalid Credential","key"=>" ","code"=>404,"status"=>"error"]);
}


?>