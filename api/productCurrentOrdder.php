<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");

 

  $headers = apache_request_headers();
  $auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
  if ($auth_header) {
      $bearer_token = explode(" ", $auth_header);
  $jwt_token = $bearer_token[1];
 $userdata=file_get_contents("php://input");

 $userdata=json_decode($userdata,true);
  
      $adminData = $data->DecodeToken($jwt_token, "keys");
      
       $customer_id=0;
    $reqMetod=$_SERVER["REQUEST_METHOD"];
$customer_id=$adminData["id"];

extract($userdata);
$productRating=$rating;
$productID=$product_id;
$orderID=$order_id;
extract($userdata);
$productRatingArr=[
"rating"=>$productRating,
"order_id"=>$orderID,
"user_id"=>$customer_id,
"product_id"=>$productID
];

    $data->updateData("orderdetail",["rated"=>$productRating],["product_id"=>$productID,"order_id"=>$orderID] );
    $data->insert("productrating",$productRatingArr);
  }

?>