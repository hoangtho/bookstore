<?php
   session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	
	
	
?> 

    <h3><a href="addbook.php">Add New</a></h3>
    <table border="1">
	
		<tr> 
			<th>bookID</th>
			<th>bookName</th>
			<th>bookDesc</th>
			<th>bookPrice</th>
			<th>date</th>
			
			
			<th>action</th>
		</tr>
		<?php
		while($row=mysqli_fetch_array($result)){
		?>
		<tr> 
			
			<td><?php echo $row['bookID'] ; ?></td>
			<td><?php echo $row['bookName'];?></td>
			<td><?php echo $row['bookDesc'] ;?></td>
			<td><?php echo $row['bookPrice'] ;?></td>
			<td><?php echo $row['date'] ;?></td>
			
			<td><a href = "editbook.php?id=<?php echo $row['bookID']; ?>">  edit</a><a href = "deletebook.php?id=<?php echo $row['bookID']; ?>">  delete</a></td>
			
				
			
		</tr>
		<?php
	}
		?>
	
	</table>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>
