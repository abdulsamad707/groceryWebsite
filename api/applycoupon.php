

<?php
$userdata = file_get_contents("php://input");
				$userdata = json_decode($userdata, true);
                header('Access-Control-Allow-Origin:*');

                header('Access-Control-Allow-Methods:GET,POST');
                header(
                    'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'
                );
                include("validkey.php");
                
include("function.php");


$couponcode=$userdata["couponCode"];
$cartTotal=$userdata["cartTotal"];
$table="couponcodes";
$coupoundata=$data->getData($table,null,null,null,"coupon_code='$couponcode'",null,null);
$discount=0;
if(!isset($coupoundata["data"][0])){
$disount=0;
$code="No Coupon Applied";
$couponstatus="error";
$message="$code Not Exist";
}else{
   
$couponType=$coupoundata["data"][0]["discount_type"];
$amountCoupon=$coupoundata["data"][0]["discount"];
if($couponType==="perc"){
   $discount=floor(($amountCoupon/100)*$cartTotal);
}else{
    $discount=$amountCoupon;
}
 $code=$couponcode;
 $couponstatus="success";
 $message="$code Applied Successfully";
}
$cartTotal=cartTotal($userdata["cart"],$data,$discount,$code);
$cartTotal["msg"]=$message;
$cartTotal["status"]=$couponstatus;
echo json_encode($cartTotal);
                ?>