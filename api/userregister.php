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
        
          include ("phpmail.php");  
          include ("smtp.php");  


              
              //Load Composer's autoloader
            
            
              $mail = new PHPMailer(true);
            /*  $mail->SMTPDebug = SMTP::DEBUG_SERVER;  */                    //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'abdulsamadahsan@gmail.com';                     //SMTP username
              $mail->Password   = 'lgbjiahmdxixbqdd';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
              //Recipients
              $mail->setFrom('abdulsamadahsan@gmail.com', 'Grocery.pk');
                //Add a recipient
              $mail->addAddress($email,$username);               //Name is optional
              $mail->addReplyTo('info@example.com', 'Information');
             
          
              //Attachments
          
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Verification Of OTP';
              $mail->Body    = 'OTP Is ';
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          
           $sendMailer=   $mail->send();
       
         if($sendMailer==1){

            $insertData=['email'=>$email,'mobile'=>$mobile,'verified'=>0,'status'=>1,'username'=>$username,'password'=>$password];
           $insertStatus=$data->insert('users',$insertData);

         }else{
          $insertStatus['message']=' User Not Register Due To Internet Connection';
          $insertStatus['code']=500;
          $insertStatus['insertId']=0;
         }
       
     
       
           
           
      
             }else{
                $insertStatus['message']=' User Exist';
                $insertStatus['code']=500;
                $insertStatus['insertId']=$userdat['data'][0]['id'];
 
             }
             $insertStatus=json_encode($insertStatus);
             echo $insertStatus;
          
      
  
     
 
   
      

    }


?>