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
        

         $randStr= $data->generateRandomString();
          $rdStr=  bin2hex($randStr);
                  $otp=mt_rand(1000,9999);
              
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
              $mail->addReplyTo('abdulsamadahsan@gmail.com', 'Grocery.pk');
                $html="";
                $html.="Thanks For Register With Us Please Verify Your Email At <a href='http://localhost/grocery/verify.php?token=$rdStr'> verify  </a> ";
     
              //Attachments
          
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Verification Of OTP';
              $mail->Body    = 'OTP Is '.$otp.'<br>'.$html;
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             define('APIKEY', 'd47d5752ecb3350de255ef9322eff59d13925d9e');
             define("SERVER", "https://www.my.zitasms.com");
           $sendMailer=   $mail->send();
           $number="+".$mobile;
           $message="Thanks For Registration $username Your OTP is ".$otp;
           $url = SERVER . "/services/send.php";
              $devices="1860|1";
           $postData = array(
            'number' => $number,
            'message' => $message,
             'sender'=>'grocery APK',
            'key' => APIKEY,
            'devices' => $devices,
            'type' => "sms",
       /* IIYwGmVegUdBt3dd*/
            'prioritize' =>  1
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
       $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
         if($sendMailer==1 && $httpCode==200){
          $json = json_decode($response, true);
       $smsData=   $json["data"];
   
            $insertData=['email'=>$email,'mobile'=>$mobile,'verified'=>0,'status'=>1,
            'username'=>$username,'password'=>$password,'otp'=>$otp,'str_rand'=>$rdStr];
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