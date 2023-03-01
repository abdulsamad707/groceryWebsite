<?php

header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST');
header(
	'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
);
include("validkey.php");


include("function.php");
ob_start();
if (!isset($status)) {
	/* 1-table
   2-rows
   3-groupBy
   4-join
   5-whereCondition
   6-orderBy
   7-limit


   */

															$reqMetod = $_SERVER["REQUEST_METHOD"];
	if ($reqMetod == "GET") {
		if (isset($_REQUEST['id'])) {
			$orderID = $_REQUEST['id'];
			$whereCondition = " orderscustomer.id ='$orderID'";

			$orderBy = null;
			$limit = null;
		} else {
			$orderID = 0;

			if (isset($_GET['orderType'])) {
				$orderType = $_GET["orderType"];
				if ($orderType == "topfive") {
					$orderBy = "totalAmount  DESC";
					$limit = 5;
				}
				if ($orderType === "Recent") {
					$orderBy = "orderDate DESC";
					$limit = 5;
				}
			} else {
				$orderBy = null;
				$limit = null;
			}

			$whereCondition = null;
		}
		$table = "orderscustomer";
		$rows = "orderscustomer.orderStatus as order_status, DATE_format(orderscustomer.orderDate,'%h:%i %p') as order_time,orderscustomer.gst,users.mobile as customer_mobile,users.username as customer_name,statusorder.status as OrderStatus,deliveryboy.username as rider_name,deliveryboy.mobile as rider_number,orderscustomer.id as orderID,date_format(orderDate,'%d-%M-%Y') as orderDate , totalAmount,deliveryCharge,deliveryAddress,paymentmethod,discount,couponCode,totalItem";
		$join = "LEFT JOIN users on orderscustomer.userId=users.id LEFT JOIN  deliveryboy  on orderscustomer.deliveryboyid=deliveryboy.id  LEFT JOIN statusorder ON orderscustomer.orderStatus=statusorder.status_id";

		$orderdata = $data->getData($table, $rows, null, $join, $whereCondition, $orderBy, $limit, null);

		if ($orderID != 0) {
			$tables = "orderdetail";
			$whereConditions = "orderdetail.order_id='$orderID'";
			$joins = "LEFT JOIN products OM orderdetail.product_id=products.id";
			$orderdetail = $data->sql(
				"SELECT product_id,orderdetail.price,products.productName,orderdetail.qtyorder as qty FROM orderdetail LEFT JOIN  products ON orderdetail.product_id=products.id where orderdetail.order_id='$orderID'",
				"read"
			);
			$orderdata["products"] = $orderdetail['data'];
		}

		echo json_encode($orderdata);
	} else {
		$headers = apache_request_headers();
		$auth_header = isset($headers['Authorization']) ? $headers['Authorization'] : null;

		if ($auth_header) {
			$bearer_token = explode(" ", $auth_header);
			$jwt_token = $bearer_token[1];

			$userdata = file_get_contents("php://input");
			$userdata = json_decode($userdata, true);
			$adminData = $data->DecodeToken($jwt_token, "key");
        $type=$userdata["type"];
			if ($type === "order_status") {
		
				$adminId = $adminData["id"];
		
					$rider_id = $userdata["RiderId"];

					$order_id = $userdata["order_id"];
					$ordStat = $userdata["orderSt"];
					if ($rider_id != 0) {
						if ($ordStat == 5) {
							$updateOrder = $data->updateData("deliveryboy", ["busy" => 0], ["id" => "'$rider_id'"]);
							$updateOrder = $data->sql("UPDATE orderdetail set orderqty=qtyorder WHERE order_id='$order_id'",'update');						} else {
					
						 } 
						 if ($ordStat != 5) {
						 		$updateOrder = $data->updateData("deliveryboy", ["busy" => 1], ["id" => "'$rider_id'"]);
						 }
						
						$orderdata = $data->getData("assignorder", null, null, null, "deliveryboyid='$rider_id' AND order_id='$order_id'", null, null, null);
						$totalRecord = $orderdata["totalRecord"];
						if ($totalRecord > 0) {} else {
							$data->insert("assignorder", ["order_id" => $order_id, "deliveryboyid" => $rider_id]);
						}
					}
					if($ordStat == 6){
						$updateOrder = $data->updateData("deliveryboy", ["busy" => 0], ["id" => "'$rider_id'"]);
						
					}

					$orderArray = [
						"deliveryboyid" => $rider_id,
						"orderStatus" => $ordStat
					];
					$updateOrder = $data->updateData("orderscustomer", $orderArray, ["id" => "'$order_id'"]);
                    $updateOrder["msg"]="Order Status Change";
					echo json_encode($updateOrder);
				
			}else{
				$jwt_token = $bearer_token[1];

				$userdata = file_get_contents("php://input");
				$userdata = json_decode($userdata, true);
				$adminData = $data->DecodeToken($jwt_token, "keys");
			/*	Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6NX0.4ZQ6wObWB58fee7Fjcb8utzni72PprldFrLZTvkZXOw*/
				      if(isset($adminData['id'])){
				  $customer_id=$adminData['id'];
					  }else{
						$customer_id=0;

					  }
				 $ip=get_client_ip();
	 $discount=$userdata["discount"];
				$whereCondition="userId='$customer_id' AND ip_add='$ip'";
             $cart=$userDataformbase=$data->getData("carts",null,null,null,$whereCondition,null,null,null);
			 $code=$userdata["couponCode"];
			$cartTotal=cartTotal($cart,$data,$discount,$code);
		
			$userdata["userId"]=$customer_id;
			unset($cartTotal['minOrder']);

			$orderplaceArray=array_merge($userdata,$cartTotal);
            if($orderplaceArray['save']==1){
				$whereConditions="user_id='$customer_id'";
             
			$address=$data->getData("address",null,null,null,$whereConditions,null,null,null);
			$deliveryAddress=$userdata["deliveryAddress"];
  $totalRecord=$address["totalRecord"];
                 if(  $totalRecord  <=0){
				$data->insert("address",["addrees"=>$deliveryAddress,"user_id"=>$customer_id]);
				 }


			}
			unset($orderplaceArray['type']);
			unset($orderplaceArray['save']);
		
		
              $placeOrder=$data->insert("orderscustomer",$orderplaceArray);

			  foreach($cart["data"] as $value){
			$orderDetali["product_id"]=$value["productID"];
			$orderDetali["price"]=$value["price"];
			$orderDetali["qtyorder"]=$value["qty"];
		$order_id=$placeOrder["insertId"];
		$orderDetali["order_id"]=$order_id;
		$orderDetali["user_id"]=$customer_id;
		$orderDetali["orderqty"]=0;
        $data->insert('orderdetail',$orderDetali);
			  }
			  $data->deleteData("carts","userId='$customer_id'");
		
				echo json_encode(["msg"=>"Order Placed Succcessfully","status"=>"succcess"]);


         }





		}
	}
}
?>