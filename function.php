<?php

function PageUrl(){
 

  $fileName=$_SERVER["PHP_SELF"];
   /*
$fileName= basename($fileName);
echo pathinfo($fileName,PATHINFO_EXTENSION);
echo    rtrim($fileName,'.php');
*/
  }
  $httpHOST= $_SERVER['HTTP_HOST'];
  $fileName=$_SERVER["PHP_SELF"];
  $fileName= basename($fileName);
  $ext= pathinfo($fileName,PATHINFO_EXTENSION);
     $ext=".".$ext;
     $shortURL= rtrim($fileName,$ext);
  $urI= $_SERVER["REQUEST_URI"];
  $REQUEST_SCHEME=$_SERVER['REQUEST_SCHEME'];
      define('PAGENAME',$shortURL);
      $fullPATTH=$REQUEST_SCHEME."://".$httpHOST.$urI;
      
     $WEBBASEPATH=rtrim($fullPATTH,$fileName);
  ?>