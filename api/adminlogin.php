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


  $username=$productData['data'][0]["username"];
    $dbpassword=$productData['data'][0]["password"];
    $id=$productData['data'][0]["id"];
    $role=$productData['data'][0]["role"];
     if(isset($remember)){

     }  
    if(password_verify($password,$dbpassword)){
        setcookie("userid",$id,time() + (86400 * 30));
        setcookie("user_role",$role,time() + (86400 * 30));
        $_SESSION["user_id"]=1;
        $adminStatus["error"]="  ";
        $adminStatus["error_type"]=" ";
        $adminStatus["id"]=$id;
        $adminStatus["role"]=$role;
        $currentTime=time();

        date_default_timezone_set("Asia/Karachi");

        $timezone_offset = -12 * 60 * 60; // 12 hours in seconds
        $current_time = time() + $timezone_offset;
       date('d-M-Y h:i:s a', $current_time);

     // create a new DateTime object with the current date and time
   
        $payload=[
"id"=>$id,
"role"=>$role,
"username"=>$productData['data'][0]["username"],
'loginTime'=>$currentTime
        ];
        $jwt=  $data-> CreateToken($payload,'key');
        $adminStatus["token"]=$jwt;
    }else{
        $adminStatus["error"]="Wrong Password";
        $adminStatus["error_type"]="Password";
        $adminStatus["id"]="";
    }

 }else{
   $whereCondition="username='$adminusername'";
   $productData=$data->getData('deliveryboy',null,null,null,$whereCondition,null,null,null);
   $totalRecord= $productData["totalRecord"];
   if($totalRecord>0){
  
  
  
      $dbpassword=$productData['data'][0]["password"];
      $id=$productData['data'][0]["id"];
      $username=$productData['data'][0]["username"];
      $role=1;
       
      if(password_verify($password,$dbpassword)){
         setcookie("userid",$id,time() + (86400 * 30));
         setcookie("user_role",$role,time() + (86400 * 30));
         $_SESSION["user_id"]=1;
         $adminStatus["error"]="  ";
         $adminStatus["error_type"]=" ";
         $adminStatus["id"]=$id;
         $adminStatus["role"]=$role;
         $currentTime=time();
 
         date_default_timezone_set("Asia/Karachi");
 
         $timezone_offset = -12 * 60 * 60; // 12 hours in seconds
         $current_time = time() + $timezone_offset;
        date('d-M-Y h:i:s a', $current_time);
 
      // create a new DateTime object with the current date and time
    
         $payload=[
 "id"=>$id,
 "role"=>$role,
 'loginTime'=>$currentTime,
   "username"=>$username
         ];
         $jwt=  $data-> CreateToken($payload,'key');
         $adminStatus["token"]=$jwt;
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
 }


echo json_encode($adminStatus);

?>