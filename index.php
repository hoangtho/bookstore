<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
?>

	<div id="content">
		<div class='wrapper'>
		<?php include ('templates/sidebar.php') ?>
		<div id="main-content">	
	<div class="product">
					<div class="title" id="tabs">
						<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> Best Sellers</p></a>
						<a href="#" class=" number" title="tab2" style="display:block;width:170px;"><p>New Books</p></a>
					</div><!--End .title-->
						
				<div id="tab1">
					<div class="detail">
						<a href="product.php"><img src="images/img1.png" alt="" /></a>
						<p><a href="product.php">I never knew it was you</a></p>
						<span>$34</span> <br/>
						<a href ='' class="cart">Add to Cart</a>
					</div><!--End #detail-->
				</div><!--End #tab1-->
						
				<div id="tab2">
					<div class="detail">
						<a href="#"><img src="images/img6.png" alt="" /></a>
						<p><a href="#">A Walk Across the Sun</a></p>
						<span>$35</span> <br/>
						<a href ='' class="cart">Add to Cart</a>
					</div><!--End #detail-->					
				</div><!--End #tab2-->
				
			</div><!--End .product-->
			
	</div><!--END #main-content-->
</div><!-- END .wrapper -->
	</div><!--END #content-->
<?php include ('templates/footer.php') ?>			