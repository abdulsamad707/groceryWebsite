

<?php
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST,PUT');


include("validkey.php");
$userdata=file_get_contents("php://input");
include("function.php");
$headers = apache_request_headers();
$auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
if ($auth_header) {
    $bearer_token = explode(" ", $auth_header);
    $jwt_token = $bearer_token[1];

$userdata=json_decode($userdata,true);
$adminData = $data->DecodeToken($jwt_token, "key");
$password=$userdata["password"];
$admin_id=$adminData["id"];
$admin_role=$adminData["role"];

$whereCondition="id='$admin_id'";
$productData=$data->getData('admins',null,null,null,$whereCondition,null,null,null);
$dbpassword=$productData['data'][0]["password"];
$currentPassword=$userdata["currentPassword"];
if(password_verify($password,$dbpassword)){
echo json_encode(["status"=>"error","msg"=>"New Password Cannot Be Old Password"]);
return false;
}else{
    if(password_verify($password,$dbpassword)){
        $password=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);


$data->updateData("admins",["password"=>$password],["id"=>"'$admin_id'"]);
echo json_encode(["status"=>"success","msg"=>" Password Updated"]);
    }else{
        echo json_encode(["status"=>"error","msg"=>"Enter Correct Password To Change Password"]);
    }
}


}
?>