<?php
	include('../core/connect.php');
	
	//DELETE FEEDBACK
	if(isset($_GET['order-del'])){
		$id = $_GET['order-del'];
		
		$sql = "DELETE FROM order WHERE orderID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location:order.php');
	
	}
?>

