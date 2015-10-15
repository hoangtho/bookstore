<?php
	include('../core/connect.php');
	
	//DELETE FEEDBACK
	if(isset($_GET['fb-del'])){
		$id = $_GET['fb-del'];
		
		$sql = "DELETE FROM feedback WHERE feedbackID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location:feedback.php');
	
	}
?>

