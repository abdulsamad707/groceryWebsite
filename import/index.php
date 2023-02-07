<?php
$con=mysqli_connect('localhost','root','','myapi');
if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xlsx'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
				$getHighestRow=$sheet->getHighestRow();
			for($i=1;$i<=$getHighestRow;$i++){
		
				$name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
				$email=$sheet->getCellByColumnAndRow(2,$i)->getValue();
				if($name!=''){
					$sql = "SELECT * FROM students Where seatno='$name' AND student_name='$email' ";
					$result = mysqli_query($con, $sql);
					
					if (mysqli_num_rows($result) <  0) {
			        
					mysqli_query($con,"insert into students(seatno,student_name) values('$name','$email')");

					}

				}
			}
		}
	}else{
		echo "Invalid file format";
	
	
	
	}

	$username="root";
	$dbname="myapi";
	$password='';
	$host_name="localhost";
	$pdo=new PDO('mysql:host='.$host_name.';dbname='.$dbname.';',$username,$password);
	$sql="SELECT seatno,student_name,status FROM `students` order by seatno";
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
	$html.="<td> Repeator/Improver </td>";
	$html.="</tr>";
	foreach($result_array as $key => $value){
		
	$html.="<tr>";
	$html.="<td>".$value['seatno']."</td>";
	$html.="<td>".ucwords($value['student_name'])."</td>";
	$html.="<td>".$value['status']."</td>";
	$html.="<tr>";
	}
	echo $html;
	header("content-type:application/xlsx");
	header("Content-Disposition:attachment;filename=students.xlsx");



}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="doc"/>
	<input type="submit" name="submit"/>
</form>