<?php
	$idSelect=$_GET['id'];
	require '../Connect/connectdb.php';
	$sql="select * from debit_credit where ID=$idSelect";
	$result= mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);

?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>EditForm</title>
		<link rel="stylesheet" type="text/css" href="Class.css">
	</head>
	<body style="background-color: #60BD88">

		<div class="darkBlueBox pad center">
			<h1 class="left10">ระบบบัญชี</h1><br>
		</div>
		<div style="width: 60%" class="center lightBlueBox pad">
			<h2>Edit Data</h2>
		</div>
		<br><br>
<div >
		<form method="post" action='EditData2.php'>
			<input type="hidden" value="<?php echo $idSelect?>" name='id_select'/>
			<table class="center">
				<tr class="center"><td>Enter Your Department:<input type="text" name='Department' value='<?php echo $row['Department']?>'><br><br></td></tr>
				<tr><td>Enter Your Category:<input type="text" name='Category' value='<?php echo $row['Category']?>'><br><br></td></tr>
				<tr><td>Enter Your Date:<input type="date" name='Date' value='<?php echo $row['Date']?>'><br><br></td></tr>
				<tr><td>Enter Your Debit:<input type="int" name='Debit' value='<?php echo $row['Debit']?>'><br><br></td></tr>
				<tr><td>Enter Your Credit:<input type="int" name='Credit' value='<?php echo $row['Credit']?>'><br><br></td></tr>
				<tr><td class="textCenter"><input style="width: 75px" class="darkBlueBox" type="submit" value="Edit"></td></tr>
			</table>
		</form>
		</div>
	</body>
</html>
