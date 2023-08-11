<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include("function.php");
include("validkey.php");
$headers = apache_request_headers();
$auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
if ($auth_header) {
    $bearer_token = explode(" ", $auth_header);
$jwt_token = $bearer_token[1];
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);

    $adminData = $data->DecodeToken($jwt_token, "keys");

if(!empty($userdata["password"] ) && !empty($userdata["username"] ) &&  !empty($userdata["address"] ) && !empty($userdata["mobile"] ) && !empty($userdata["email"] )){
$userdata["password"]=password_hash($userdata["password"],PASSWORD_BCRYPT,['cost'=>12]);
$customer_id=$adminData["id"];
$useraddress=$userdata["address"];


$cusAddress=$data->getData('address',null,null,null,"address='$useraddress' AND user_id='$customer_id'",null,null,null);


$totalRecord=$cusAddress["totalRecord"];
if($totalRecord==1){

$data->updateData("address",["address"=>$useraddress],["user_id"=>$customer_id]);
}else{
    $insertData=[
        "address"=>$useraddress,
        "user_id"=>$customer_id
    ];

    $data->insert("address",$insertData);
}


unset($userdata["address"]);
$profileData=$userdata;

$data->updateData("users",$profileData,["id"=>$customer_id]);

$replyarr["msg"]="User Update  Successfully";
$replyarr["status"]=200;
}else{
    $replyarr["msg"]="** Please Provide All Field";
    $replyarr["status"]=500;
}
echo json_encode($replyarr);
}
?>