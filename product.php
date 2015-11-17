<?php
include('core/connect.php');
 include('templates/header.php');
// echo $_SESSION['mem_row'];


?>

	<div id="content">
		<div class='wrapper'>
			<div id='path'>
				<a href='index.php'>Home</a> &raquo; <a href=''> <?php 
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$query = "SELECT * FROM books WHERE bookID = '$id' ";
					$result = mysqli_query($con, $query);
			
					$row = mysqli_fetch_array($result);
					$sql = "SELECT * FROM category WHERE cateID = ".$row['bookCateID']; $result1 = mysqli_query($con, $sql); $row1 = mysqli_fetch_array($result1); echo ucfirst(strtolower($row1['cateName'])); ?> </a>&raquo; <a href='product.php'><?php echo $row['bookName'];?></a> 
			</div><!-- END #path -->
			<div id='product-content'>
				<img src='images/product1.jpg'>
				<div id='detail'>
					<h4><?php echo $row['bookName'];?></h4>
					<p>
						<?php echo $row['bookDesc']; ?>
					</p>
					<div id='info'>
						<div id='tier-1'>	
							<p>Price: <span>$<?php echo number_format($row['bookPrice']); ?></span></p>
							<a href ='cart.php?themgiohang=<?php echo $row['bookID'] ?>'>Add to Cart</a>
							<?php
						
				}
						?>
						</div><!-- END #tier-1-->
						<div id='tier-2'>
							<p>Safe, Secure Shopping</p>
							<ul>
								<li id='paypal'></li>
								<li id='visa'></li>
								<li id='master'></li>
								<li id='credit'></li>
							</ul>
						</div><!-- END #tier-2 -->
					</div><!-- END #info-->
				</div><!-- END #detail -->
			</div><!-- END #product-content -->
		
		</div><!-- END .wrapper -->
	</div><!--END #content-->
<?php 
include ('templates/footer.php') ?>		