
<?php

try{
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


 $reqMetod=$_SERVER["REQUEST_METHOD"];
if($reqMetod=="GET"){
if(isset($_GET["id"])){
  $id=$_GET["id"];
$whereConduction="products.id='$id'";
}else{
    $whereConduction=null;
}

$join="left JOIN orderdetail on orderdetail.product_id=products.id left JOIN productrating on productrating.product_id=products.id";
$groupby="products.id";
$rows="products.qty,products.status ,products.id,products.productName,products.price,CONCAT('http://localhost/groceryWebsite/api/',products.image) as ProductImage,products.price*ifnull(sum(orderdetail.qty),0) as revenue ,  ifnull(format(AVG(productrating.rating),2),0.00) as rating,ifnull(sum(orderdetail.qty),0) as qty_sold ,if(products.qty-ifnull(sum(orderdetail.qty),0)>0,products.qty-ifnull(sum(orderdetail.qty),0),0) as qty_remaining";
$productData=$data->getData('products',$rows,$groupby,$join,$whereConduction,null,null,null);
echo json_encode($productData);

}
if($reqMetod=="POST"){


    $product_id=$_POST["pid"];
    $productName=$_POST["productName"];
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
         $productArray["keyword"]=$productName;

         
  /* 1-table
   2-rows
   3-groupBy
   4-join
   5-whereCondition
   6-orderBy
   7-limit


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
 $productArray["keyword"]=$productName;

 $data->updateData("products", $productArray,["id"=>"'$product_id'"]);

 echo json_encode(["msg"=>"Product Update Successfully","status"=>"success"]);




           }


}
}
catch (Exception $e) {
  echo json_encode(["msg"=>"Server Error","status"=>"error"]);
}

?>
