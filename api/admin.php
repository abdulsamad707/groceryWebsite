

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
$password=$userdata["password"];
$password=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
$adminData = $data->DecodeToken($jwt_token, "key");
$admin_id=$adminData["id"];
$admin_role=$adminData["role"];
$data->updateData("admins",["password"=>$password],["id"=>"'$admin_id'"]);
print_r($adminData);
}
?>