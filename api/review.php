<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET');
header('Content-Type:appliction/json');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include("validkey.php");

include("function.php");


  $reqMetod = $_SERVER["REQUEST_METHOD"];
  if($reqMetod=="POST"){
    $userdata=file_get_contents("php://input");

$userdata=json_decode($userdata,true);

  extract($userdata);
  $headers = apache_request_headers();
  $auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;
  if ($auth_header) {
      $bearer_token = explode(" ", $auth_header);
 $jwt_token = $bearer_token[1];
  $adminData = $data->DecodeToken($jwt_token, "keys");
  $customer_id=$adminData["id"];
$userdata["user_id"]=  $customer_id;

$data->insert("reviews",$userdata);

  }
}else{
/*  ($table=null,$rows=null,$groupBy=null,$join=null,$whereCondition=null,string $orderBy=null,$limit=null,$operator=null)*/
  $rows=" DATE_FORMAT(review_date,'%d  %M , %Y') as review_date,review,users.username";
  $join_Row=" INNER JOIN users ON 	reviews.user_id=users.id ";
  
  $review_data=$data->getData("reviews",$rows,null,  $join_Row,null,null,null,null);
  echo json_encode($review_data);
}
?>