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
     $checkData=$userdatainsert;
     
     unset($checkData['status']);
     unset($checkData['verified']);
     unset($checkData['password']);
     $dataChecked=   $data->checkRecord($table,$checkData, 'AND' );
   
     extract($dataChecked);
     if($totalRecord==0){
      $data->insert('users',$checkData);
     }else{
      $insertStatus['message']='Cannot Insert Duplicate Data';
      $insertStatus['code']=500;
      $insertStatus['insertId']=0;

     }
     
     print_r($insertStatus);
   
     
     
 
   
      

    }


?>