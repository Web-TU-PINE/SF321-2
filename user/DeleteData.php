<?php
	include("mySQL.php");
		$mysql= new G_MYSQL;
	  $mysql->G_Connect();
		$idSelect=$_GET['id'];
		$sql="delete from debit_credit where id =$idSelect";
		$result = $mysql->G_ExecuteNonQuery($sql);
		if($result){
		echo"success";
		$mysql->G_Close();
		echo "<script> window.location.assign('GetData.php'); </script>";

		}else{
			echo"เกิดข้อผิดพลาด";
		}

?>
