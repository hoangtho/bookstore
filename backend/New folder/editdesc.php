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
	<br>bookdesc<input type="text" name="bookdesc">
	<input type="submit" name="save" value="OK" /> 
	</form>
<?php
	if(isset($_POST['save']))
	{
			
			$bookdesc=$_POST['bookdesc'];
				
			
			$query="UPDATE books
			       SET bookDesc= '$bookdesc' 
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