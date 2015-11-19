<html>


<?php
   session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	$i = 1;
	
	
	
	
	
?> 
    
	<h3>Product List</h3>

    <button id="btn_add" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add</button>
	
    <table  border="1">
	
		<tr style="font-size: 1.1em;
			text-align: left;
			padding-top: 5px;
			padding-bottom: 4px;
			background-color:  #8f8c8c;
			color: #ffffff ;">  
			
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookID</th>
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">Book Name</th>
		
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">Book Price</th>
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">Book Description</th>
			
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookCateName</th>
			
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookAuthorName</th>
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">BookImage</th>
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">Edit</th>
			<th style="font-size: 0.8em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;">Delete</th>
		</tr>
		<?php
		while($row=mysqli_fetch_array($result)){
		?>
		<tr> 
			
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $i++; ?></td>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $row['bookName'];?></td>
		
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><?php echo $row['bookPrice'] ;?></td>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;" ><?php echo $row['bookDesc'] ;?></td>
			
			<?php 
			$cate = "SELECT * FROM category WHERE cateId = $row[bookCateID]";
	        $cateresult = mysqli_query($con,$cate);
			while($rowcate=mysqli_fetch_array($cateresult)) {
			?>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;" ><?php echo $rowcate['cateName'] ;?></td>
			<?php }?>
			
			<?php 
			$author = "SELECT * FROM author WHERE authorId = $row[bookAuthorID]";
	        $authorresult = mysqli_query($con,$author);
			while($rowauthor=mysqli_fetch_array($authorresult)) {
			?>
			<td style="font-size: 0.9em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;" ><?php echo $rowauthor['authorName'] ;?></td>
			<?php }?>
			<td>
                <img width="100" height="80"  src="../images/upload/<?php echo ( $row['bookImage'] == '' )? 'trash.png': $row['bookImage']; ?>" alt="<?php echo $row['bookName'] ?>">
            </td>
			 
			<td style="font-size: 0.1em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><a href = "editbook.php?id=<?php echo $row['bookID']; ?>"><img src='images/user_edit.png'></a></td>
			<td style="font-size: 0.1em; border: 1px solid  #8f8c8c; padding: 3px 7px 2px 7px;"><a href = "deletebook.php?id=<?php echo $row['bookID']; ?>"><img src='images/trash.png'></a></td>
			
				
			
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
</html>