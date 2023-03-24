
<?php


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
/*header('Content-Type:appliction/json');*/
include("validkey.php");


include("function.php");

ob_start();
/*http://localhost/grocerywebsite/api/myearning.php?vendor=2&key=avdfheuw23*/



$vendor_id=$_GET["vendor"];
$sql="SELECT  IFNULL(sum(orderqty),0) as qtysold,IFNULL(orderdetail.price,products.price)*IFNULL(sum(orderqty),0) as revenue,IFNULL(orderdetail.price,products.price) as price,products.productName,concat('http://localhost/grocerywebsite/api/',products.image) as productImage FROM products LEFT JOIN orderdetail ON products.id =orderdetail.product_id WHERE products.admin_id ='$vendor_id' group by products.id";
if(isset($_GET['last_two'])){
    $sql.=" ORDER BY  revenue DESC LIMIT 2";
    $adminEarning=$data->sql($sql,"read");
    echo json_encode($adminEarning);
    return false;
}
$adminEarning=$data->sql($sql,"read");
$earning=0;
$qtysold=0;
foreach ($adminEarning["data"] as $value){
$earning=$earning+$value['revenue'];
$qtysold=$qtysold+$value['qtysold'];
}
$adminEarningArray["productsSoldDetail"]=$adminEarning["data"];
$adminEarningArray["earning"]=$earning;
$adminEarningArray["qtysold"]=$qtysold;
echo json_encode($adminEarningArray);
?>                                                                 
