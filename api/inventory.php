<?php 
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include("validkey.php");
if(!isset($status)){
@$inventoryType=$_GET["invtype"];
if(isset($inventoryType)){
    $Sql="";
    $orderdateFormat="";
    if($inventoryType==="yesterday_sale"){
        $orderdateFormat="DATE_FORMAT(orderDate,'%d-%b-%Y') as OrderDate";
        $groupBy=" day(orderDate), month(orderDate),year(orderDate)";
        $orderBy=" date(orderDate)";
        $where="orderStatus='5' AND DATE_format(orderDate,'%Y-%m-%d') =DATE_FORMAT(SUBDATE(CURRENT_DATE, INTERVAL 1 DAY),'%Y-%m-%d')";
    }elseif($inventoryType==="today_sale"){
        $orderdateFormat="DATE_FORMAT(orderDate,'%d-%b-%Y') as OrderDate";
        $groupBy=" day(orderDate), month(orderDate),year(orderDate)";
        $orderBy=" date(orderDate)";
        $where="orderStatus='5' AND DATE_format(orderDate,'%Y-%m-%d') =DATE_FORMAT(CURRENT_DATE,'%Y-%m-%d')";
    }elseif($inventoryType==="monthly"){
        $orderdateFormat="DATE_FORMAT(orderDate,'%M-%Y')as monthyear";
        $groupBy=" month(orderDate), year(orderDate)";
        $orderBy="year(orderDate), month(orderDate)";
        $where="orderStatus='5'";
    }else if($inventoryType==="daily"){
        $orderdateFormat="DATE_FORMAT(orderDate,'%d-%b-%Y') as OrderDate";
        $groupBy=" day(orderDate), month(orderDate),year(orderDate)";
        $orderBy=" date(orderDate)";
        $where="orderStatus='5'";
    }elseif($inventoryType==="current"){
        $where ="orderStatus='5' AND  DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(CURRENT_DATE,'%Y-%m')";
        $orderdateFormat="DATE_FORMAT(orderDate,'%M-%Y')as monthyear";
        $groupBy=" month(orderDate), year(orderDate)";
        $orderBy="year(orderDate), month(orderDate)";
    }elseif($inventoryType==="previous"){
       $where ="orderStatus='5' AND  DATE_format(orderDate,'%Y-%m') =DATE_FORMAT(SUBDATE(CURRENT_DATE, INTERVAL 1 MONTH),'%Y-%m')";
       $orderdateFormat="DATE_FORMAT(orderDate,'%M-%Y')as monthyear";
       $groupBy=" month(orderDate), year(orderDate)";
       $orderBy="year(orderDate), month(orderDate) ";
    }
    

 
   
    $rows=" $orderdateFormat,sum(discount) as discount_expense,sum(deliveryCharge) as deliveryExpense,sum(gst) as tax_expense, count(*) as orderCompleted  ,sum(totalAmount)-(sum(gst)+sum(deliveryCharge)) as Earning ,sum(totalItem) as itemSold";
    $inventorydata = $data->getData("orderscustomer",$rows,$groupBy,null,$where,$orderBy,null,null);
    $date_current=date("Y-m-d");

    
    
 
      $prevDate = date('Y-m-d',strtotime("-1 month"));
 








 


}else{
    $inventorydata["data"]="";
    $inventorydata["message"]="Please provide inventory type";
    $inventorydata["code"]=500;

}

echo json_encode($inventorydata);
 

}
 ?>