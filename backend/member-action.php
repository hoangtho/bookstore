<?php
	include('../core/connect.php');
	
	//DELETE USER
	if(isset($_GET['user-del'])){
		$id = $_GET['user-del'];
		
		$sql = "DELETE FROM user WHERE userID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location: member.php');
	
	}
	
	
	//EDIT USER
	if( isset($_POST["edit"]) ){
		if( isset($_POST["username"]) && !empty($_POST["username"]) ){
			$id = $_POST["userID"];
			$fullname = $_POST["fullname"];
			$username = $_POST["username"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$level = $_POST["level"];

			$sql = "UPDATE user 
						SET fullname = '$fullname', 
								 username = '$username', 
								 email = '$email', 
								 address = '$address', 
								 level = '$level' 
						WHERE userID = '$id' ";
		
			mysqli_query($con, $sql);
			
			header('Location: member.php');
		}
	}
?>