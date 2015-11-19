<?php include('templates/header.php');
// echo $_SESSION['mem_row'];


	include('core/connect.php');
	
	
	
	
?>

	<div id="content">
		<div class='wrapper'>
		<?php include ('templates/sidebar.php') ?>
		<div id="main-content">	
		
	<div class="product">
					<div class="title" id="tabs">
						<a href="index.php" class="set number" title="tab1" style="display:block;width:120px;"><p>ALL Books</p></a>
						<!-- BO TAB NEW BOOK <a href="#" class=" number" title="tab2" style="display:block;width:170px;"><p>New Books</p></a> -->
					</div><!--End .title-->
				<!-- TAB 1 -->
				<div id="tab1">
					<?php
					
					$danhmuccon = "";
					
					   if (isset($_GET['category'])) {
						  $danhmuccon = "and bookCateID = " .$_GET['category'];
					   }
					   
					   if(isset($_GET['keyword'])){
						$result = mysqli_query($con, "SELECT * FROM books WHERE (bookName LIKE '%{$_GET['keyword']}%' )" . $danhmuccon);
						
					  }else{
						$result = mysqli_query($con, "SELECT * FROM books WHERE 1=1 ".$danhmuccon);
					}
					   
					while($row=mysqli_fetch_array($result))
					{ 
					?>
					<div class="detail">
						<a href="product.php"><img src="images/img1.png" alt="" /></a>
						<p><a href="product.php?id=<?php echo $row['bookID']?>"><?php if (strlen($row['bookName']) >= 20){
																																				echo substr($row['bookName'], 0, 10). " ... " . substr($row['bookName'], -5);
																																			}
																																			else {
																																				echo $row['bookName'];
																																			} ?></a></p>
						<span><?php echo "$".number_format($row['bookPrice']);?></span> <br/>
						<a href ='cart.php?themgiohang=<?php echo $row['bookID'] ?>' class="cart">Add to Cart</a>
						
					</div><!--End #detail-->
					<?php
					}
					?>
				</div><!--End #tab1-->
			
				<!-- TAB 2 
				<div id="tab2">
					<div class="detail">
						<a href="#"><img src="images/img6.png" alt="" /></a>
						<p><a href="#">A Walk Across the Sun</a></p>
						<span>$35</span> <br/>
						<a href ='' class="cart">Add to Cart</a>
					</div> End #detail 				
				</div> End #tab2-->
				
			</div><!--End .product-->
			
	</div><!--END #main-content-->
</div><!-- END .wrapper -->
	</div><!--END #content-->
<?php include ('templates/footer.php') ?>			