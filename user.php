<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
<input type="text" name="username">
<input type="text" name="password">
<input type="email" name="email">
<input type="submit" name="submit">
</form>
<?php
include("api/db.php");
include("api/credential.php");
$data=new DataBase($hostname,$dbname,$username,$password);
echo $username=$_POST['username'];
echo $password=$_POST['password'];
 if(!empty($username)){
$username=strencode($username);
 }
function strtoarry($msg)
{
     $msg=strrev($msg);
    $msg= str_split($msg);
     return $msg;
}
 function strencode($msg)
{
   $msg= strtoarry($msg);
   $str=''; 
   for ($i=0; $i < count($msg) ; $i++) { 
     $str.=ord( $msg[$i]);
   }
    $str;
    $str=base64_encode($str);
    $str=bin2hex($str);
    $str=convert_uuencode($str);
   
   $length=strlen($str);
   return $str;


}
?>
</body>
</html>