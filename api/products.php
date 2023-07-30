<?php


header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:GET,POST,PUT');


include("validkey.php");
ob_start();
/*1-table
2-rows
3-groupBy
4-join
5-whereCondition
6-orderBy
7-limit
*/

if(isset($_GET["status"])){
$status=1;
}else{
  $status=0;
}

 $reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="GET"){
if(isset($_GET["id"])){




  $id=$_GET["id"];

  if($status===1){

    if(isset($_GET["productName"]) && $_GET["productName"]!=""){
      $productName=$_GET["productName"];
      $whereConduction= "products.productName LIKE '%$productName%' aND products.status='1' AND products.id='$id'  ";
    }else{
      $whereConduction="products.status='1' AND products.id='$id'";
    }
  

  }else{
    
    if(isset($_GET["productName"]) && $_GET["productName"]!=""){
      $productName=$_GET["productName"];
    $whereConduction="products.productName LIKE '%$productName%' aND products.id='$id'";
    
    }else{
      $whereConduction="products.id='$id'";
    }
  }
  $groupby ="";
  
  $groupby =" group by products.id";

}else{
           
  if($status==1){
    
    if(isset($_GET["productName"]) && $_GET["productName"]!=""){
      $productName=$_GET["productName"];
      $whereConduction="products.productName LIKE '%$productName%'  OR soundex(products.productName)=soundex('$productName') or keyword like '%$productName%'  OR soundex(products.keyword)=soundex('$productName') or products.price >=$productName  aND products.status='1'  ";
    }else{
      $whereConduction="products.status='1' ";
    }

  
  }else{
   
    $vendor=$_GET['vendor'];
     $vendor_id=$_GET['vendor_id'];
    if($vendor=="admin"){
         if(isset($_GET["productName"]) && $_GET["productName"]!=""){
         $productName=$_GET["productName"];
          $whereConduction="products.productName LIKE '%$productName%'  or keyword like '%$productName%'   or products.price >= $productName   AND products.status='1' or products.status='0'   ";
         }else{
          $whereConduction="products.status='1' or products.status='0'";
         }
   
    }else{
      if(isset($_GET["productName"]) && $_GET["productName"]!="" ){
        $productName= $_GET["productName"];
        $whereConduction="products.admin_id='$vendor_id' AND   products.productName  LIKE '%$productName%' or keyword like '%$productName%' or products.price >= $productName";
      }else{
        $whereConduction="products.admin_id='$vendor_id'";
      }
    
    }
  }
 
  $groupby =" group by products.id";
}
 $sql="SELECT if( count(DISTINCT user_id)<1,1,count(DISTINCT user_id)) as countBy, keyword,products.productqty,if(format(ifnull(AVG(orderdetail.rated),0),2)>1,format(ifnull(AVG(orderdetail.rated),0),2),5.00) as rating,products.status,products.price,products.productName,products.id,concat('http://localhost/grocerywebsite/api/',products.image) as ProductImage,ifnull(sum(orderdetail.orderqty),0) as qty_sold, ifnull(products.productqty-(ifnull(sum(orderdetail.orderqty),0)),0) as qty_remaining,ifnull(sum(orderdetail.orderqty*orderdetail.price),0) as revenue from products left join orderdetail on orderdetail.product_id=products.id   where $whereConduction $groupby ";

$productData=$data->sql($sql,"read");
if(isset($_GET["id"])){
  $product_id=$_GET["id"];
  $sqlProductInv="SELECT keyword, products.productName,IFNULL(DATE_Format(orderscustomer.orderDate,'%M-%Y'),'NOTSOLD') as monthorder,IFNULL(sum(orderdetail.orderqty*orderdetail.price),0) as revenue,IFNULL(sum(orderdetail.orderqty),0) as qty_sold FROM products LEFT JOIN orderdetail ON orderdetail.product_id=products.id LEFT JOIN orderscustomer ON orderdetail.order_id=orderscustomer.id WHERE products.id='$product_id' GROUP BY month(orderscustomer.orderDate),year(orderscustomer.orderDate),products.id ";
  $sqlProductInvdata=$data->sql($sqlProductInv,"read");
  $productData["productInven"]=  $sqlProductInvdata["data"];
  $sqlProductInvdaily="SELECT products.productName,IFNULL(DATE_Format(orderscustomer.orderDate,'%d-%M-%Y'),'NOTSOLD') as monthorder,IFNULL(sum(orderdetail.orderqty*orderdetail.price),0) as revenue,IFNULL(sum(orderdetail.orderqty),0) as qty_sold FROM products LEFT JOIN orderdetail ON orderdetail.product_id=products.id LEFT JOIN orderscustomer ON orderdetail.order_id=orderscustomer.id WHERE products.id='$product_id' GROUP BY day(orderscustomer.orderDate),month(orderscustomer.orderDate),year(orderscustomer.orderDate),products.id ";
  $sqlProductInvdatadaily=$data->sql($sqlProductInvdaily,"read");
  $productData["productInvendaily"]=  $sqlProductInvdatadaily["data"];
}
echo json_encode($productData);

}
if($reqMetod=="POST"){


    $product_id=$_POST["pid"];
    $productName=$_POST["productName"];
    $productKeyword=$_POST["keyword"];
$productArray=$_POST;
           if($product_id==0){
               if(isset($_FILES["file"]["name"])){
                $file_name =$_FILES["file"] ['name'];
                $file_tmp = $_FILES["file"]['tmp_name'];
                $file_size =$_FILES["file"]['size'];
                $file_error =$_FILES["file"]['error'];
            
                // Get the file extension
                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));
            
                // Allowed file types
                $allowed = array('jpg', 'jpeg', 'png', 'gif');
            
                // Check if the file type is allowed
                if (in_array($file_ext, $allowed)) {
                  $file_name_new = time() .'.' . $file_ext;

                  // Specify the upload location
                  $file_destination = 'productImage/' . $file_name_new;
                if (move_uploaded_file($file_tmp, $file_destination)) {
                   
                    $status=$productArray['productStatus'];
                    unset($productArray['productStatus']);
                    unset($productArray['pid']);
                    unset($productArray['file']);
         $productArray["image"]="productImage/".$file_name_new;
         $productArray["status"]=$status;
         $productArray["keyword"]=$productKeyword;

         
  /* 1-table
   2-rows
   3-groupBy
   4-join
   5-whereCondition
   6-orderBy
   7-limit
   3hoxB93@1
   Sualehfseeh123@gmail.com
   */

  
  $whereConduction="products.productName='$productName'";
  $productData=$data->getData("products",null,null,null,$whereConduction,null,null,null);
 if( isset($productData['data'][0])){
  echo json_encode(["msg"=>"Product Already Exist","status"=>"error"]);
 }else{

  $data->insert("products",$productArray);
  echo json_encode(["msg"=>"Product Insert Successfully","status"=>"success"]);


        

 }


                 
          
                }



                }else{
                  echo json_encode(["msg"=>"Invalid Image Type","status"=>"error"]);
                }


               }else{
                 echo json_encode(["msg"=>"Please Provide Image","status"=>"error"]);
               }
           }else{
            if(isset($_FILES["file"]["name"])){
              $file_name =$_FILES["file"] ['name'];
              $file_tmp = $_FILES["file"]['tmp_name'];
              $file_size =$_FILES["file"]['size'];
              $file_error =$_FILES["file"]['error'];
          
              // Get the file extension
              $file_ext = explode('.', $file_name);
              $file_ext = strtolower(end($file_ext));
          
              // Allowed file types
              $allowed = array('jpg', 'jpeg', 'png', 'gif');
          
              // Check if the file type is allowed
              if (in_array($file_ext, $allowed)) {

                $whereConduction="products.id='$product_id'";
                $productData=$data->getData("products",null,null,null,$whereConduction,null,null,null);
                $prveImage=$productData['data'][0]['image'];
         
                $file_name_new = time() .'.' . $file_ext;

                // Specify the upload location
                $file_destination = 'productImage/' . $file_name_new;
              if (move_uploaded_file($file_tmp, $file_destination)) {
          
          


              
                $productArray["image"]="productImage/".$file_name_new;
              }


              }else{
                echo json_encode(["msg"=>"Invalid Image Type","status"=>"error"]);
              }
            }
        $status=$productArray['productStatus'];
            unset($productArray['productStatus']);
            unset($productArray['pid']);
            unset($productArray['file']);

 $productArray["status"]=$status;


$sqlProduct="SELECT products.productqty,format(ifnull(AVG(productrating.rating),0),2) as rating,products.status,products.price,products.productName,products.id,concat('http://localhost/grocerywebsite/api/',products.image) as ProductImage,ifnull(sum(orderdetail.orderqty),0) as qty_sold, ifnull(products.productqty-(ifnull(sum(orderdetail.orderqty),0)),0) as qty_remaining,ifnull(sum(orderdetail.orderqty*orderdetail.price),0) as revenue from products left join orderdetail on orderdetail.product_id=products.id  left join productrating  ON productrating.product_id=products.id where products.id='$product_id' group by products.id";
/*qty_remaining+products.productqty*/
$sqlProductdata=$data->sql($sqlProduct,'read');
 $qty_remaining=$sqlProductdata['data']['0']["qty_remaining"];
$sqlProductCart="SELECT ifnull(sum(qty),0) as cartQty FROM carts where  productID= '$product_id'";

$sqlProductCartdata=$data->sql($sqlProductCart,"read");

$cartQty=$sqlProductCartdata["data"][0]['cartQty'];
$qty_remaining=$qty_remaining-$cartQty;
$productArray["productqty"]=$productArray["productqty"];
$productKeyword=$_POST["keyword"];
$productArray["keyword"]=$productKeyword;

/*productqty
  */

 unset($productArray['admin_id']);
 $data->updateData("products", $productArray,["id"=>"'$product_id'"]);
 $productINCart="$product_id";
 /*
 select * FROM products LEFT JOIN carts ON carts.productID=products.id
 LEFT JOIN orderdetail ON orderdetail.product_id=products.id




*/




 echo json_encode(["msg"=>"Product Update Successfully","status"=>"success"]);




           }


}



?>