<?php
include("important_credential.php");
function sendMail($message,$email,$username,$subject){
    $mail = new PHPMailer(true);
  /*  $mail->SMTPDebug = SMTP::DEBUG_SERVER;  */                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "abdulsamadahsan@gmail.com";                     //SMTP username
    $mail->Password   ="lgbjiahmdxixbqdd" ;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("abdulsamadahsan@gmail.com", 'Grocery.pk');
      //Add a recipient
    $mail->addAddress($email,$username);               //Name is optional
    $mail->addReplyTo('abdulsamadahsan@gmail.com', 'Grocery.pk');
    

    //Attachments

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;

    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

 $sendMailer=   $mail->send();
     return $sendMailer;
      }
     function SendSms($number,$message){
      define('APIKEY', 'd47d5752ecb3350de255ef9322eff59d13925d9e');
      define("SERVER", "https://www.my.zitasms.com");
    
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
  $json = json_decode($response, true);
  return $json;
}

   function encode($data){
     $data= str_split($data);
        
       return $str;
   }
   function cartTotal($userId,$ipadd,$dataBase){
    
         $cartTotal=0;
        $cartDataSql="Select  price,qty FROM carts Where customerID='$userId' AND ip_add ='$ipadd'";
   $dataFromCart=$dataBase->sql($cartDataSql,'read');
            $cartNewData= $dataFromCart['data'];
                  foreach($cartNewData as $key => $value){
                 $cartTotal = $cartTotal + ($value['qty'] * $value['price']);
                  }
           

                  $cartDataSql2="Select products.id as pid,carts.qty as ProductQty,carts.price as ProductPrice,products.productsName, productImage FROM carts,products Where carts.customerID='$userId' AND  products.id=carts.productid  AND carts.ip_add='$ipadd' ";
                     
                  $dataFromCart=$dataBase->sql($cartDataSql2,'read');
                  $cartDetailArray['data']=$dataFromCart['data'];
                  $cartDetailArray['cartTotal']=$cartTotal;
        return $cartDetailArray;
        }
        function get_client_ip() {
          $ipaddress = '';
          if (getenv('HTTP_CLIENT_IP'))
              $ipaddress = getenv('HTTP_CLIENT_IP');
          else if(getenv('HTTP_X_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
          else if(getenv('HTTP_X_FORWARDED'))
              $ipaddress = getenv('HTTP_X_FORWARDED');
          else if(getenv('HTTP_FORWARDED_FOR'))
              $ipaddress = getenv('HTTP_FORWARDED_FOR');
          else if(getenv('HTTP_FORWARDED'))
             $ipaddress = getenv('HTTP_FORWARDED');
          else if(getenv('REMOTE_ADDR'))
              $ipaddress = getenv('REMOTE_ADDR');
          else
              $ipaddress = '::1';
          return $ipaddress;
      }

      function checkCustomerHasItem($customerId,$dataBase){
          $checkSql="select ";
      }
?>
      