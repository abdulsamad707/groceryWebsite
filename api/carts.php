<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
$headers = apache_request_headers();
$auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
include("validkey.php");


include("function.php");
$headers = apache_request_headers();
$auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
if ($auth_header) {
    $bearer_token = explode(" ", $auth_header);
    $jwt_token = $bearer_token[1];


    $adminData = $data->DecodeToken($jwt_token, "keys");
    extract($adminData);
    $customer_id=$id;
    $reqMetod=$_SERVER["REQUEST_METHOD"];
  if($reqMetod=="POST")
  {
    $userdata = file_get_contents("php://input");
    $userdata = json_decode($userdata, true);


    $ip=get_client_ip();
         extract($userdata);
       


         $curl = curl_init();

// Set the URL and other options
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/groceryWebsite/api/products.php?key=avdfheuw23&id=".$productId,
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

// Handle the response
if ($error) {
  echo "Error: " . $error;
} else {
  $response=json_decode($response,true);

  $qty_remamining=$response["data"][0]["qty_remaining"];
  $price=$response["data"][0]["price"];

}
$cartDataproduct=$data->getData('carts',"ifnull(qty,0) as qty",null,null,"productID='$productId' AND userId='$id'",null,null);
$productincartData=$data->getData('carts',"ifnull(sum(qty),0) as in_cart",null,null,"productID='$productId'",null,null);
$remaining=$response["data"][0]["qty_remaining"]-$productincartData['data'][0]['in_cart'];
$qty;

     $totalRecord=$cartDataproduct["totalRecord"];
    if($totalRecord<=0){

        if($qty < $remaining ){

        $insertCart["userId"]=$id;
        $insertCart["qty"]=$qty;
        $insertCart["productID"]=$productId;
        $insertCart["ip_add"]="::1";
        $insertCart["price"]=$price;
        $insertCart["userType"]="Reg";
        $data->insert("carts",$insertCart);
        echo json_encode(['MSG'=>"product added Successfully"]);
        }else{
          echo json_encode(['MSG'=>"Desired Qty is NOT available"]);
        }
    }else{
        if($qty===0){
         $data->deleteData("carts","productID='$productId'");
         
      echo json_encode(['MSG'=>"product delete from cart"]);
        }else{

          if($action==="add"){
            echo json_encode(['MSG'=>"product already exist in cart"]);
          }else{
            if($qty < $remaining ){
            $data->updateData("carts",["qty"=>$qty],["productID"=>$productId]);
            echo json_encode(['MSG'=>"product update "]);
            }else{
              echo json_encode(['MSG'=>"Desired Qty is NOT available"]);
            }
          }

        }
  
    }
  
 }else{

    $join="LEFT JOIN products ON carts.productID =products.id";
    $cartDataproduct=$data->getData('carts',"carts.userId,carts.productID,products.productName,carts.qty,carts.price,CONCAT('http://localhost/groceryWebsite/api/',products.image) as image",null,$join,"carts.userId='$id'",null,null);
 $discount=$_GET["discount"];
 $code=$_GET["code"];
 if(isset($cartDataproduct["data"][0])){
    $cartTotal=cartTotal($cartDataproduct,$data,$discount,$code);
    $cartDataproduct["cartTotal"]= $cartTotal;
 }


    echo json_encode($cartDataproduct);
 }
}    

?>