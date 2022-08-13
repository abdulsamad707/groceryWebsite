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

    
   
     $checkData=['email'=>"'$email'",'mobile'=>"'$mobile'",'username'=>"'$username'"];
     
                
      $userdat=  $data->getData('users','id',null,$checkData,null,null,'OR');
        $totalRecord= $userdat['totalRecord'];
             if($totalRecord<1){
              $insertData=['email'=>$email,'mobile'=>$mobile,'verified'=>0,'status'=>1,'username'=>$username,'password'=>$password];
           $insertStatus=$data->insert('users',$insertData);
            try{
        
           $to = $email;
           $subject = "My subject";
           $txt = "Hello world!";
           $headers = "From: abdulsamadahsan@gmail.com" . "\r\n" .
           "CC: somebodyelse@example.com";
           
           mail($to,$subject,$txt,$headers);
            }catch(Exception $e){

            }
     
       
           
           
      
             }else{
                $insertStatus['message']='Already User Exist';
                $insertStatus['code']=500;
                $insertStatus['insertId']=$userdat['data'][0]['id'];
 
             }
             $insertStatus=json_encode($insertStatus);
             echo $insertStatus;
          
      
  
     
 
   
      

    }


?>