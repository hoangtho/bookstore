<?php
	include('../core/connect.php');
	
	//ADD NEW CATEGORY
	if(isset($_POST['add'])){
		if(isset($_POST['cate-name']) && $_POST['cate-name'] != ''){
			$name = $_POST['cate-name'];
		
			$sql = "INSERT INTO category(cateName) VALUES ('$name') ";
			mysqli_query($con, $sql);
			
			header('Location:category-list.php');
		}else{
			echo "All fields are required!"; // CHANGE TO JQUERY
		}
	}
	
	//Edit category

		if(isset($_GET['cate-edit'])){
		$id = $_GET['cate-edit'];
		$name=$_POST['cate-name'];
		
		$query = "UPDATE category SET cateName='$name' WHERE cateID = '$id' ";
		mysqli_query($con,$query);
	}
	//DELETE CATEGORY
	if(isset($_GET['cate-del'])){
		$id = $_GET['cate-del'];
		
		$sql = "DELETE FROM category WHERE cateID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location:category-list.php');
	
	}
?>

