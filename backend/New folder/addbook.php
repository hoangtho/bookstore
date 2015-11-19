<?php
  session_start();
   if($_SESSION['login'] && $_SESSION['level'] != 0){
   include ('templates/header.php');
   include('../core/connect.php');
   
  
  
?>
 <form action = "" method="POST">
 
<br> Bookname :<input type="text" name="bookname">
<br>
 <div class="form-group">
 <label for="bookDesc" class="">Description :</label>
 <div >
 <textarea class="form-control" rows="3" name="bookDesc" id="bookDesc"></textarea>
 </div>
 </div>
 <!--<input type="text" name="bookDesc">-->
<br>price :<input type="text" name="price">
<br>
<br>date :<input type="timestamp" name="date">
<br><input type="submit" name="submit" value="add">

</form>

<?php
    if(isset($_POST['submit'])){

		
		$bookname = $_POST['bookname'];
		$desc = $_POST['bookDesc'];
		$price=$_POST['price'];
		$date=$_POST['date'];
		
		
		 	
	$query="select * from books WHERE bookName='$bookname' ";
	$result=mysqli_query($con,$query);
	
		
	if(mysqli_num_rows($result) !=0 ){
		echo "member is already exist !!";
	}
	else{
	$query = "INSERT INTO books (bookName,bookDesc,bookPrice,date) VALUES ('$bookname','$desc','$price','$date')";
	mysqli_query($con,$query);
	

	header('Location: product-list.php');
	
	}
		

	}
	
	
?>
<?php
	include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
	?>