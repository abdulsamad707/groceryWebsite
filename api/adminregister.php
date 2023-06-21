<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
/*header('Content-Type:appliction/json');*/
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


include("validkey.php");
$admindata=$userdata;


extract($userdata);
if($role==1){
    $sql="select * from deliveryboy where username='$username'";
   $dataFound= $data->sql($sql,"read");

echo $totalRecord=$dataFound["totalRecord"];
    if($totalRecord==0){
        $userReg["password"]=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
        $userReg["username"]=$username;
        $userReg["busy"]=0;
        $userReg["status"]=1;
        $userReg["mobile"]=$mobile;
 
        $data->insert("deliveryboy",$userReg);
    }
}else{
    $sql="select * from admins where username='$username'";
   $dataFound= $data->sql($sql,"read");


    if($totalRecord==0){
        $userReg["password"]=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
        $userReg["username"]=$username;
       
        $userReg["role"]=$role;
        $userReg["mobile"]=$mobile;
 
        $data->insert("admins",$userReg);
    }
}



?>