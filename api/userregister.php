<?php	


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include("function.php");
include("validkey.php");
ob_start();
if(!isset($status)){

$posttye=$_SERVER['REQUEST_METHOD'];
   if($posttye==="POST"){
  $userdata=file_get_contents("php://input");

  $userdata=json_decode($userdata,true);
    
    extract($userdata);

  $password=password_hash($password,PASSWORD_BCRYPT,['cost'=>12]);
      $username=ucfirst($username);


    /*
   
     $checkData=['email'=>"'$email'",'mobile'=>"'$mobile'",'username'=>"''"];
     */
      $checkData="email='$email' and mobile='$mobile' AND  username='$username' ";          
      $userdat=  $data->getData('users','id',null,null,$checkData,null,null,null);
        $totalRecord= $userdat['totalRecord'];

             if($totalRecord<1){
        
      
        

         $randStr= $data->generateRandomString();
          $rdStr=  bin2hex($randStr);
                  $otp=mt_rand(1000,9999);
              
              //Load Composer's autoloader
              $html="";
      $html.="<br> Thanks For Register With Us Please  Verify Your Email At  ";
         $email_message="Your Otp is $otp ".$html;
            $subject="Verification Code";

        $number="+".$mobile;
        $message="Thanks For Registration $username  Regards Vege Seller";
   /*    $json= SendSms($number,$message);*/
   $sendMailer= sendMail($message,$email,$username,$subject);

    
         if($sendMailer==1){
    
    
   
            $insertData=['email'=>$email,'mobile'=>$mobile,'status'=>1,
            'username'=>$username,'password'=>$password,'otp'=>$otp,'otp_verify'=>0];
           $insertStatus=$data->insert('users',$insertData);
           $insertStatus['http_code']=200;
           $insertStatus['message']=' User Register Successfully';
           $insertStatus['operationStatus']="success";
         }else{
          $insertStatus['message']=' User Not Register Due To Internet Connection';
          $insertStatus['code']=500;
          $insertStatus['insertId']=0;
          $insertStatus['http_code']=200;
          $insertStatus['operationStatus']="error";
         }
       
     
       
           
           
      
             }else{
                $insertStatus['message']=' User Exist';
                $insertStatus['code']=500;
                $insertStatus['http_code']=200;
                $insertStatus['insertId']=$userdat['data'][0]['id'];
                $insertStatus['operationStatus']="error";
             }
             $insertStatus=json_encode($insertStatus);
             echo $insertStatus;
          
      
  
            }else{
               $response["message"]="Invalid Response ";
               echo json_encode($response);
               http_response_code(500);
            }
 
   
         

    }
  

?>