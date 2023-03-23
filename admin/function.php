<?php
include "api_crediential.php";
function getDataFromApi($api_remaining_path,$number_of_paramater){
 if($number_of_paramater > 1){
    $fullPathApi=API_PATH.$api_remaining_path."&key=".API_KEY;
    }else{
        $fullPathApi=API_PATH.$api_remaining_path."?key=".API_KEY;
    }

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $fullPathApi);
 curl_setopt($curl,CURLOPT_POST,false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_HEADER, false);
 $apiData= curl_exec($curl);
 curl_close($curl);
 
/*print_r($apiData);*/
 $apiData=json_decode($apiData,true);

return $apiData;

}


function inventoryItemEarning($type,$subType){
        $totalEarningapi="inventory.php?invtype=".$type."&vendorType=admin&id=0";
 $totalEarningapi=getDataFromApi($totalEarningapi,3);

 $arrayEarningTotal=[];
 $arrayTotalItem=[];
 foreach ($totalEarningapi["data"] as $key => $value){
        array_push($arrayEarningTotal,$value["Earning"]);
        array_push($arrayTotalItem,$value["itemSold"]);
         }
         if($subType==="Earning"){
       return  $arrayEarningTotal=array_sum($arrayEarningTotal);
         }else{
 return $totalItemSold=array_sum($arrayTotalItem);
         }
        
}
function inventory($inventoryType="admin",$rider_id=0){

if($inventoryType=="admin"){
   $totalEarningapi="inventory.php?invtype=monthly&vendorType=admin&id=0";
 $totalEarningapi=getDataFromApi($totalEarningapi,3);

    $arrayEarningTotal=[];
    $arrayTotalItem=[];
     foreach ($totalEarningapi["data"] as $key => $value){
    array_push($arrayEarningTotal,$value["Earning"]);
    array_push($arrayTotalItem,$value["itemSold"]);
     }
     $arrayEarningTotal=array_sum($arrayEarningTotal);
     $totalItemSold=array_sum($arrayTotalItem);
     $currentEarningapi="inventory.php?invtype=current&vendorType=admin&id=0";
 $totalEarningCurrent=getDataFromApi($currentEarningapi,2);
    $arrayEarningCurrent=[];
    $arrayTotalItemCurrent=[];
     foreach ($totalEarningCurrent["data"] as $key => $value){
    array_push($arrayEarningCurrent,$value["Earning"]);
    array_push($arrayTotalItemCurrent,$value["itemSold"]);
     }

     $arrayEarningCurrent=array_sum($arrayEarningCurrent);
     $CurrentItemSold=array_sum($arrayTotalItemCurrent);

    $previousEarningapi="inventory.php?invtype=previous&vendorType=admin&id=0";
 $totalEarningprevious=getDataFromApi($previousEarningapi,2);


    $arrayEarningPrevious=[];
    $previousItemSoldItem=[];
     foreach ($totalEarningprevious["data"] as $key => $value){
    array_push($arrayEarningPrevious,$value["Earning"]);
    array_push($previousItemSoldItem,$value["itemSold"]);
     }

     $arrayEarningPrevious=array_sum($arrayEarningPrevious);
     $previousItemSold=array_sum($previousItemSoldItem);
     $inventory["previousMonthItemSold"]=$previousItemSold;
     $inventory["CurrentMonthItemSold"]=$CurrentItemSold;
     $inventory["previousMonthEarning"]=$arrayEarningPrevious;
     $inventory["totalEarning"]=inventoryItemEarning("monthly","Earning");
     $inventory["currentMonthEarning"]=$arrayEarningCurrent;
     $inventory["totalItemSold"]=      $totalItemSold;
     return $inventory;
   }else{
 
      $totalEarningapicurrent="inventory.php?invtype=current&vendorType=rider&id=$rider_id";
      $totalEarningapis=getDataFromApi($totalEarningapicurrent,3);

      $arrayEarningCurrent=[];
      $arrayTotalItemCurrent=[];
      foreach ($totalEarningapis["data"] as $key => $value){
         array_push($arrayEarningCurrent,$value["Earning"]);
         array_push($arrayTotalItemCurrent,$value["orderCompleted"]);
          }
    
      $totalEarningapiprevious="inventory.php?invtype=previous&vendorType=rider&id=$rider_id";
      $totalEarningapi=getDataFromApi($totalEarningapiprevious,3);
      
    $arrayEarningPrevious=[];
    $previousItemSoldItem=[];
     foreach ($totalEarningapi["data"] as $key => $value){
    array_push($arrayEarningPrevious,$value["Earning"]);
    array_push($previousItemSoldItem,$value["orderCompleted"]);
     }
      $arrayEarningPrevious=array_sum($arrayEarningPrevious);
      $previousItemSold=array_sum($previousItemSoldItem);
      $arrayEarningCurrent=array_sum($arrayEarningCurrent);
      $CurrentItemSold=array_sum($arrayTotalItemCurrent);
      $inventory["previousMonthOrderCompleted"]=$previousItemSold;
      $inventory["CurrentMonthOrderCompleted"]=$CurrentItemSold;
      $inventory["previousMonthEarning"]=$arrayEarningPrevious;
      $inventory["totalEarning"]=$arrayEarningPrevious +$arrayEarningCurrent;
      $inventory["currentMonthEarning"]=$arrayEarningCurrent;
      $inventory["totalItemOrderCompleted"]=  $previousItemSold+$CurrentItemSold;
      return $inventory;
   }
}
function inveentoryDetail($inventoryType,$adminType="admin",$admin_ride=0){
 $totalEarningapi="inventory.php?invtype=".$inventoryType."&vendorType=$adminType&id=$admin_ride";
$totalEarningapi=getDataFromApi($totalEarningapi,3);
  return $totalEarningapi;
}       
function NumberOfActiveUser($userType){
  /* getDataFromApi;*/
  /*?user_type=active_user_current_month
  
  ?user_type=active_user_previous_month
  
  
  */;

 $link="users.php?user_type=active_user_".$userType;
 return getDataFromApi($link,2);

}


function NumberOfActiveRider($userType){
   /* getDataFromApi;*/
   /*?user_type=active_user_current_month
   
   ?user_type=active_user_previous_month
   
   
   */;
 
  $link="riders.php?rider_type=".$userType;
  return getDataFromApi($link,2);
 
 }



function High($orderId){

return   max($orderId);
}
function vendorEarning($id){

   include "../api/db.php";
   clearstatcache();
 
include("../api/credential.php");



$data=new CRUDOPERATION($hostname,$dbname,$username,$password);
$sql="SELECT orderqty,orderdetail.price FROM orderdetail INNER JOIN products ON products.id=orderdetail.product_id WHERE products.admin_id='$id' AND orderdetail.orderqty > 0 ";
$adminData=$data->sql($sql,"read");

echO"<pre>";

$earning=0;
$qtysell=0;
if(isset($adminData["data"][0])){
foreach($adminData["data"] as $value){
 $earning=$earning+($value["orderqty"]*$value["price"]);
 $qtysell=$qtysell+$value["orderqty"];
}
}else{
   $earning=0;
   $qtysell=0;
}

 $earning;
 $qtysell;
 $adminEarning["Earning"]= $earning;
 $adminEarning["QtySold"]= $qtysell;
   return $adminEarning;
}


          ?>