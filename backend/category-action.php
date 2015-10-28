<?php
	include('../core/connect.php');
	
	//ADD NEW CATEGORY
	if(isset($_POST['submit_add'])){	
			$name = $_POST['cate-name'];
		
			$sql = "INSERT INTO category(cateName) VALUES ('$name') ";
			mysqli_query($con, $sql);
			
			header('Location:category-list.php');
	}
	
	
	//DELETE CATEGORY
	if(isset($_GET['cate-del'])){
		$id = $_GET['cate-del'];
		
		$sql = "DELETE FROM category WHERE cateID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location:category-list.php');
	
	}
	
	
	//EDIT CATEGORY
	if( isset($_POST['submit_edit']) ){
			$id = $_POST["cateID"];
			$name = $_POST["cate-name"];
		
			$sql = "UPDATE category SET cateName = '{$name}' WHERE cateID = '{$id}'";
		
			mysqli_query($con, $sql);
			
			header('Location: category-list.php');
		}
?>

