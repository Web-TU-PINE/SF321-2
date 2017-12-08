

<?php

$host = 'ap-cdbr-azure-southeast-b.cloudapp.net';
$username = 'b26366fb9f9e2a';
$password = 'f0a52187';
$db_name = 'acsm_c3fa0cb86725a7f';

//Establishes the connection
$con = mysqli_init();
mysqli_real_connect($con, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($con)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

 ?>
