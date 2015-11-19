<?php
   session_start();
   if($_SESSION['login'] && $_SESSION['level'] != 0){
   include ('templates/header.php');
   include('../core/connect.php');
   
   if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
   
   $query ="DELETE FROM books WHERE bookID='$id'";
   mysqli_query($con,$query);
   
    header('Location: product-list.php');
		
    include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>