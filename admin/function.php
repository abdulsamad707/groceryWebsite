

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
 $apiData=json_decode($apiData,true);


return $apiData;

}


function inventoryItemEarning($type,$subType){
        $totalEarningapi="inventory.php?invtype=".$type;
 $totalEarningapi=getDataFromApi($totalEarningapi,2);

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
function inventory(){

   $totalEarningapi="inventory.php?invtype=monthly";
 $totalEarningapi=getDataFromApi($totalEarningapi,2);
    $arrayEarningTotal=[];
    $arrayTotalItem=[];
     foreach ($totalEarningapi["data"] as $key => $value){
    array_push($arrayEarningTotal,$value["Earning"]);
    array_push($arrayTotalItem,$value["itemSold"]);
     }
     $arrayEarningTotal=array_sum($arrayEarningTotal);
     $totalItemSold=array_sum($arrayTotalItem);
     $currentEarningapi="inventory.php?invtype=current";
 $totalEarningCurrent=getDataFromApi($currentEarningapi,2);
    $arrayEarningCurrent=[];
    $arrayTotalItemCurrent=[];
     foreach ($totalEarningCurrent["data"] as $key => $value){
    array_push($arrayEarningCurrent,$value["Earning"]);
    array_push($arrayTotalItemCurrent,$value["itemSold"]);
     }

     $arrayEarningCurrent=array_sum($arrayEarningCurrent);
     $CurrentItemSold=array_sum($arrayTotalItemCurrent);

    $previousEarningapi="inventory.php?invtype=previous";
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

}
function inveentoryDetail($inventoryType){
 $totalEarningapi="inventory.php?invtype=".$inventoryType;
$totalEarningapi=getDataFromApi($totalEarningapi,2);
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






function orderTotal($order_id){

   
}

          ?>