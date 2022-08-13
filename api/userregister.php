<?php	


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
include("validkey.php");
ob_start();
if(!isset($status)){



  $userdata=file_get_contents("php://input");
    $userdata=json_decode($userdata,true);
    extract($userdata);
 $pss1='Naseem1@';
  $password=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
      $username=ucfirst($username);
          
    
     $table='users';
     $rows='id';
     $checkData=['email'=>"'$email'",'mobile'=>"'$mobile'",'username'=>"'$username'"];
     
                      print_r($checkData);
      $userdat=  $data->getData('users','id',null,$checkData,null,null,'AND');
        $totalRecord= $userdat['totalRecord'];
             if($totalRecord<1){
              $insertData=['email'=>$email,'mobile'=>$mobile];
           $insertStatus=$data->insert('users',$insertData);
              print_r($insertStatus);
             }
      print_r($userdat);
      
  
     
 
   
      

    }


?>