<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
/*header('Content-Type:appliction/json');*/
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


include("validkey.php");
ob_start();

extract($userdata);
$whereCondition="username='$adminusername'";
$productData=$data->getData('admins',null,null,null,$whereCondition,null,null,null);


 $totalRecord= $productData["totalRecord"];
 if($totalRecord>0){
    $dbpassword=$productData['data'][0]["password"];
    $id=$productData['data'][0]["id"];
    $role=$productData['data'][0]["role"];
     if(isset($remember)){

     }  
    if($dbpassword===$dbpassword){
        setcookie("userid",$id,time() + (86400 * 30));
        setcookie("user_role",$role,time() + (86400 * 30));
        $_SESSION["user_id"]=1;
        $adminStatus["error"]="  ";
        $adminStatus["error_type"]=" ";
        $adminStatus["id"]=$id;
        $adminStatus["role"]=$role;

    }else{
        $adminStatus["error"]="Wrong Password";
        $adminStatus["error_type"]="Password";
        $adminStatus["id"]="";
    }

 }else{
    $adminStatus["error"]="No such username register";
    $adminStatus["error_type"]="Existence";
    $adminStatus["id"]="";
 }


echo json_encode($adminStatus);

?>