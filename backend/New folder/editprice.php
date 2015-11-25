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
	<br>bookprice<input type="text" name="bookprice">
	<input type="submit" name="save" value="OK" /> 
	</form>
<?php
	if(isset($_POST['save']))
	{
			
			$bookprice=$_POST['bookprice'];
				
			
			$query="UPDATE books
			       SET bookPrice= '$bookprice' 
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