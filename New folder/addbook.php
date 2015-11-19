<?php
  session_start();
   if($_SESSION['login'] && $_SESSION['level'] != 0){
   include ('templates/header.php');
   include('../core/connect.php');
   
   
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	
	$cate = "SELECT * FROM category";
	$cateresult =mysqli_query($con,$cate);
					
			
  
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
   <div >
    <label  class="control-label col-md-3">Categories: </label>
        <div class="col-md-9" id="list">
        <?php while ( $cate_row = mysqli_fetch_array($cateresult) ) { ?>
        <input type="radio" name="cateID" value="<?php echo $cate_row["cateID"] ?>" ><span style="margin: 0 5px 0 2px;"><?php echo $cate_row["cateName"] ?></span>
        <?php } ?>
        </div>
   </div>
   
  <label  class="control-label col-md-3">Image: </label>
 <div >
    <div class="col-md-6">
    <img width="80" height="50"  src="../images/upload/<?php echo ( $row['bookImage'] == '' )? '': $row['bookImage']; ?>" alt="" name="bookImage" id="book-img"/>
    </div>
    <div class="col-md-9 col-md-offset-3">
    <input class="" type="file" name='bookImage' id='bookImage'>
    </div>
 </div>
 

<br>price :<input type="text" name="price">
<br>
<br>Book Author Name :<input type="text" name="authorName">
<br><input type="submit" name="submit" value="add">

</form>


<?php
    if(isset($_POST['submit'])){

		
		$bookname = $_POST['bookname'];
		$desc = $_POST['bookDesc'];
		$price=$_POST['price'];
		$bookImage = $_POST['bookImage'];
	
		$selected = $_POST['cateID'];
		$authorName=$_POST['authorName'];
		
		
		 	
	$query="select * from books WHERE bookName='$bookname' ";
	$result=mysqli_query($con,$query);
	
	$query1="select * from author WHERE authorName='$authorName' ";
	$result1=mysqli_query($con,$query1);
	
	
	
		
	if(mysqli_num_rows($result) !=0 ){
		echo "book is already exist !!";
	}
	else{
	$query2 = "INSERT INTO books (bookName,bookDesc,bookPrice,date,bookImage,bookCateID) VALUES ('$bookname','$desc','$price','$date','$bookImage','$selected')";
	mysqli_query($con,$query2);
	//--!hsdgfjdbghjd-->
	//-----------ofjgfnjf
	// $querycate ="UPDATE books, category
     // SET Table1.LastName = 'DR. XXXXXX' 
         // ,Table2.WAprrs = 'start,stop'
      // FROM Table1 T1, Table2 T2
     // WHERE T1.id = T2.id
      // and T1.id = '010008'";
	  // mysqli_query($con,$querycate);

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