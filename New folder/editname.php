<?php
session_start();
   if($_SESSION['login'] && $_SESSION['level'] != 0){
   include ('templates/header.php');
   include('../core/connect.php');
   
   if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	
	
?>
<table border="1">
	

<form action="" method="POST">
	<br>product<input type="text" name="product">
	<input type="submit" name="save" value="OK" /> 
	</form>
<?php
	if(isset($_POST['save']))
	{
			
			$product=$_POST['product'];
				
			
			$query="UPDATE books
			       SET bookName= '$product' 
				   WHERE bookID='$id' ";
		    mysqli_query($con,$query);
			
			header('Location: product-list.php');
	}
?>
</table>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>