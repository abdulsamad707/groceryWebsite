<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
/*header('Content-Type:appliction/json');*/
$userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);


include("validkey.php");
$admindata=$userdata;

unset($admindata["password"]);

$row=$admindata;


unset($row['passwoord']);
if($userdata["role"]==1){
    unset($row["role"]);
    $totolRecord=$data->checkRecord("deliveryboy",$row," AND ");
}else{
    $totolRecord=$data->checkRecord("admins",$row," AND ");
}


$userdata["password"]=password_hash($userdata["password"],PASSWORD_BCRYPT,['cost'=>12]);

if($totolRecord==0){
    if($userdata["role"]==1){
        unset($userdata["role"]);
        $userdata["status"]=1;
        $userdata["busy"]=0;
     $data->insert("deliveryboy",$userdata);
    }else{
        $data->insert("admins",$userdata);
    }

}

?>