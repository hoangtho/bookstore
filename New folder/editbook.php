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

   <h3>Edit Product</h3>
   
		
	
	<table border="1">
		<tr style="font-size: 1.1em;
			text-align: left;
			padding-top: 5px;
			padding-bottom: 4px;
			background-color:  #8f8c8c;
			color: #ffffff ;"> 
			<th style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookID</th>
			<th style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookName</th>
			<th style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookDesc</th>
			<th style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookPrice</th>
			
			
		</tr>
		<?php
		$queryc="select * from books where bookID='$id'";
		$resultc=mysqli_query($con,$queryc);
		$row=mysqli_fetch_array($resultc)
		?>
		<tr> 
			
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $row['bookID'] ; ?></td>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"> <?php echo $row['bookName'];?><a href ="editname.php?id=<?php echo $row['bookID']; ?>">     Edit Name</a>  </td>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $row['bookDesc'] ;?><a href ="editdesc.php?id=<?php echo $row['bookID']; ?>">     Edit Desc</a></td>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $row['bookPrice'] ;?><a href ="editprice.php?id=<?php echo $row['bookID']; ?>">    Edit Price</a></td>
			
			
		
			</table>
			<br>
			<h4><a href="editall.php">Edit All</a></h4>

<?php
   
		
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>