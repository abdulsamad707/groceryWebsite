<?php
$username="root";
$dbname="myapi";
$password='';
$host_name="localhost";
$pdo=new PDO('mysql:host='.$host_name.';dbname='.$dbname.';',$username,$password);
$sql="SELECT seatno,student_name FROM `students` order by seatno";
$db=$pdo;
$stmt= $pdo->prepare($sql);                                                                                                                                                                                                                                                                                                                                         $db->prepare($sql);
$stmt->execute();
$result_array=array();
while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
    $result_array[]=$data;
}
$html="<table>";
$html.="<tr>";
$html.="<td> Seat No </td>";
$html.="<td> Student Name </td>";
$html.="</tr>";
foreach($result_array as $key => $value){
$html.="<tr>";
$html.="<td>".$value['seatno']."</td>";
$html.="<td>".ucwords($value['student_name'])."</td>";
$html.="<tr>";
}
echo $html;
header("content-type:application/xlsx");
header("Content-Disposition:attachment;filename=students.time().xlsx");
?>