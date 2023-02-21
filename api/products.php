
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
    $whereConduction="products.status='1' AND products.id='$id'";

  }else{
    $whereConduction="products.id='$id'";
  }
  $groupby ="";
  
  $groupby =" group by products.id";

}else{

  if($status==1){
    $whereConduction="products.status='1'";
  }else{
    $whereConduction=" products.status='0' or products.status='1'";
  }

  $groupby =" group by products.id";
}
 $sql="SELECT products.productqty,format(ifnull(AVG(productrating.rating),0),2) as rating,products.status,products.price,products.productName,products.id,concat('http://localhost/grocerywebsite/api/',products.image) as ProductImage,ifnull(sum(orderdetail.qtyorder),0) as qty_sold, ifnull(products.productqty-(ifnull(sum(orderdetail.qtyorder),0)),0) as qty_remaining,ifnull(sum(orderdetail.qtyorder*orderdetail.price),0) as revenue from products left join orderdetail on orderdetail.product_id=products.id  left join productrating  ON productrating.product_id=products.id where $whereConduction $groupby ";

$productData=$data->sql($sql,"read");
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
          
                if (file_exists($prveImag)) {
                  unlink($prveImag);
            
              }


              
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
