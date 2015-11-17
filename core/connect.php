<?php
	global $con;
	
	$dbHost='localhost';
	$dbUser='root';
	$dbPass='';
	$dbName='bookstore';
	
	$con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
	mysqli_query($con,"SET NAMES 'utf8'");
	
	if(mysqli_connect_errno()){
		echo "Fail to connect to MySQL:".mysqli_connect_error();
	}
?>