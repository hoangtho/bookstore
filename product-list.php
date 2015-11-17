<div class="product">
					<div class="title" id="tabs">
						<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p>Best Sellers</p></a>
						<a href="#" class=" number" title="tab2" style="display:block;width:170px;"><p>New Books</p></a>
					</div><!--End .title-->
				
				<div id="tab1">
					<?php
						$query = "SELECT * FROM books";
						$result = mysqli_query($con, $query);
						
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
			
				<div id="tab2">
					<div class="detail">
						<a href="#"><img src="images/img6.png" alt="" /></a>
						<p><a href="#">A Walk Across the Sun</a></p>
						<span>$35</span> <br/>
						<a href ='' class="cart">Add to Cart</a>
					</div><!--End #detail-->					
				</div><!--End #tab2-->
				
			</div><!--End .product-->