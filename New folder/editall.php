<?php
   session_start();
   if($_SESSION['login'] && $_SESSION['level'] != 0){
   include ('templates/header.php');
   include('../core/connect.php');
   
   if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
   
?>
   <h3>Edit product</h3>
	<form action="" method="POST">
	<br>product<input type="text" name="product">
	<br>bookDescription<input type="text" name="bookDesc">
	<br>bookPrice<input type="text" name="bookPrice">
	
	<br><input type="submit" name="save" value="OK" /> 
	</form>	
	
	<?php
		if(isset($_POST['save'])){
			$product=$_POST['product'];
			$bookDesc=$_POST['bookDesc'];
			$bookPrice=$_POST['bookPrice'];
			
			
			$query="UPDATE books
			       SET bookName= '$product', bookDesc = '$bookDesc', bookPrice='$bookPrice'
				   WHERE bookID='$id'
				   ";
			mysqli_query($con,$query);
			header('Location: product-list.php');
		}
		
	  
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>