<?php

	// require'../Connect/dbConnect.php';//เชื่อมต่อฐานข้อมูล
	//รับค่าจากFormมาใส่ในฐานข้อมูล
	include("mySQL.php");
	$mysql = new G_MYSQL;
	$mysql->G_Connect();

	$Department =$_POST['Department'];
	$Category =$_POST['Category'];
	$Date =$_POST['Date'];
	$Debit =$_POST['Debit'];
	$Credit =$_POST['Credit'];







	$idSelect=$_POST['id_select'];

	$sql="UPDATE debit_credit set Date='$Date',Department='$Department',
	Category='$Category', Debit='$Debit',Credit='$Credit' where id=$idSelect";

	$result  =  $mysql->G_ExecuteNonQuery($sql);


	if($result){
	echo"success";
	$mysql->G_Close();
	echo "<script> window.location.assign('GetData.php'); </script>";
	}else{
		echo "เกิดข้อผิดพลาด".mysqli_error($con);
	}
?>
