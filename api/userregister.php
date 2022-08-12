<?php	


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
include("validkey.php");
ob_start();
if(!isset($status)){



  $userdata=file_get_contents("php://input");
    $userdata=json_decode($userdata,true);
    extract($userdata);

  $password=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
      $username=ucfirst($username);
       
     $userdatainsert=['email'=>$email,'username'=>$username,'password'=>$password,"mobile"=>$mobile,"status"=>1,'verified'=>0];
 
     $table='users';
     $rows='id';
     $checkData=['email'=>"'$email'",'mobile'=>"'$mobile'",'username'=>"'$username'"];
           
           print_r($checkData);
      $userdat=  $data->getData('users','id',null,$checkData,null,null);
      print_r($userdat);
         extract($userdat);

   
     
     
 
   
      

    }


?>