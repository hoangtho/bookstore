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
   <h3>Edit product</h3>
		
	
	<table border="1">
		<tr> 
			<th>bookID</th>
			<th>bookName</th>
			<th>bookDesc</th>
			<th>bookPrice</th>
			<th>date</th>
			
		</tr>
		<?php
		$queryc="select * from books where bookID='$id'";
		$resultc=mysqli_query($con,$queryc);
		$row=mysqli_fetch_array($resultc)
		?>
		<tr> 
			
			<td><?php echo $row['bookID'] ; ?></td>
			<td><a href ="editname.php?id=<?php echo $row['bookID']; ?>"> editname</a><?php echo $row['bookName'];?></td>
			<td><a href ="editdesc.php?id=<?php echo $row['bookID']; ?>">editdesc</a><?php echo $row['bookDesc'] ;?></td>
			<td><a href ="editprice.php?id=<?php echo $row['bookID']; ?>">editrice</a><?php echo $row['bookPrice'] ;?></td>
			<td><a href="editdate.php?id=<?php echo $row['bookID']; ?>">editdate</a><?php echo $row['date'] ;?></td>
			
		
			</table>

<?php
   
		
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>