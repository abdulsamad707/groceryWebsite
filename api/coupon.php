

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
$reqMetod = $_SERVER["REQUEST_METHOD"];
if($reqMetod==="POST"){ 

  if(!isset($userdata["type"])){
$couponcode=$userdata["couponCode"];
$cartTotal=$userdata["cartTotal"];
$table="couponcodes";
$coupoundata=$data->getData($table,null,null,null,"coupon_code='$couponcode' AND coupon_status='1' ",null,null);
$discount=0;
if(!isset($coupoundata["data"][0])){
$disount=0;
$code="No Coupon Applied";
$couponstatus="error";
$message="Coupon Code  Not Exist";
}else{
   
$couponType=$coupoundata["data"][0]["discount_type"];
$amountCoupon=$coupoundata["data"][0]["discount"];
$max_discount=$coupoundata["data"][0]["max_discount"];

if($couponType==="perc"){
   $discount=floor(($amountCoupon/100)*$cartTotal);
     if($discount > $max_discount){
       $discount =$max_discount;
     }else{
      $discount=$discount;
     }
}else{
    $discount=$amountCoupon;
}
 $code=$couponcode;
 $couponstatus="success";
 $message="$code Applied Successfully";
}
$cartTotal=cartTotal($userdata["cart"],$data,$discount,$code);
$cartTotal["cartTotal"]=$cartTotal;
$cartTotal["msg"]=$message;
$cartTotal["status"]=$couponstatus;
echo json_encode($cartTotal);
  }else{
    $userdata = file_get_contents("php://input");
				$userdata = json_decode($userdata, true);

        $id=$userdata["id"];
        if($id==0){
      $coupon_code=$userdata["coupon_code"];
        unset($userdata["type"]);
        unset($userdata["id"]);
        $couponData=$data->getData("couponcodes",null,null,null,"coupon_code='$coupon_code'",null,null);
       $number_of_record= $couponData["totalRecord"];
       if($number_of_record==0){
        $data->insert("couponcodes",$userdata);
        echo json_encode(["msg"=>"Coupon Code Added Succcessfully"]);
       }else{
        echo json_encode(["msg"=>"Coupon Code Always Exists"]);
       }
        }else{
          unset($userdata["type"]);
          unset($userdata["id"]);
          $data->updateData("couponcodes",$userdata,["coupon_id"=>"'$id'"]);
          echo json_encode(["msg"=>"Coupon Code Update Succcessfully"]);
        }
    
  }
}else{
     if(isset($_GET["id"])){
      $id=$_GET["id"];
      $couponData=$data->getData("couponcodes",null,null,null,"coupon_id='$id'",null,null);
     }else{
      $couponData=$data->getData("couponcodes",null,null,null,null,null,null);
     }
     echo json_encode($couponData);
}
                ?>