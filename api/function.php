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
      function cartTotal($cartData,$database,$discount,$code){
                
         $curl = curl_init();

      $discount;
      $userId=$cartData["data"][0]['userId'];
         // Set the URL and other options
         curl_setopt_array($curl, array(
           CURLOPT_URL => "http://localhost/groceryWebsite/api/users.php?key=avdfheuw23&id=".$userId,
           CURLOPT_RETURNTRANSFER => true,  // Return the response instead of outputting it
           CURLOPT_ENCODING => "",  // Accept any encoding
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "GET",  // Change this to the HTTP method you need
         
         ));
         
         // Send the request and get the response
         $response = curl_exec($curl);
         $error = curl_error($curl);
         
         // Close curl
         curl_close($curl);
         $response=json_decode($response,true);
         $number_of_order=$response["data"][0]["number_of_orders"];
   /*1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit




*/

        $adminData=$database->getData("setting",null,null,null,null,null,null,null);
        $adminDatas=$database->getData("couponcodes",null,null,null,"coupon_code='$code'",null,null,null);
        if(isset($adminDatas["data"][0])){
        $coupon_type=  $adminDatas["data"][0]["discount_type"];
        }else{
            $coupon_type="product";
        }
        $deliverygst=$adminData["data"][0]["deliverygst"];
        if($coupon_type==="deliveryoff"){
            $deliveryCharge=0;
        }else{
            $deliveryCharge=$adminData["data"][0]["deliveryCharge"];
        
        }
   
        $deliverygst=floor(($deliverygst/100)*$deliveryCharge);
        $deliveryCharge=$deliveryCharge+   $deliverygst;

        $minOrder=$adminData["data"][0]["minOrder"];
        $gst=$adminData["data"][0]["gst"];
                $totalprice=0;
               $totalRecord= $cartData["totalRecord"];
                foreach($cartData["data"] as $key => $value){
                    $totalprice=$totalprice+($value["qty"]*$value["price"]);
                }
             $totalprice;    
             if($number_of_order==0){
                if($discount===0){
                    $discount=floor((25/100)*$totalprice);
                    $couponCode="FIRST ORDER";
                }else{

                    $discount=$discount;
                    $couponCode=$code;
                }
   
        
             }else{
                if(empty($code)){
                $couponCode="No Coupon Applied";
                }else{
                    $couponCode=$code;
                }

             }

             if($coupon_type=="deliveryoff"){
              $discount=0;
              $deliveryCharge=0;
              $deliverygst=0;
             }

            $totalPrice=$totalprice-$discount;
           $governmentTax=floor(($gst/100)*$totalPrice);
            
                      $finalAmount=$totalPrice+$governmentTax+$deliveryCharge;
                      $cartTotal["totalAmount"]=$finalAmount;
                      $cartTotal["discount"]=$discount;
                      $cartTotal["deliveryCharge"]=$deliveryCharge;
                      $cartTotal["cartTotal"]=$totalPrice;
                      $cartTotal["gst"]=$governmentTax;
                      $cartTotal["totalItem"]=$totalRecord;
                      $cartTotal["minOrder"]=$minOrder;
                      $cartTotal["couponCode"]=$couponCode;
                      $cartTotal["deliverygst"]=$deliverygst;
                      return $cartTotal;
                }
?>
      