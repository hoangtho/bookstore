<?php
	include('core/connect.php');
	
	
?>	

				<div id='sidebar'>
					<div id="cat">
						<h3 class='title'>Categories</h3>
						<ul>
							<?php
								$sql = "SELECT * FROM category";
								$result = mysqli_query($con, $sql);
								// TONG SO LUONG SACH CUA TUNG CATEGORY ?!
								
								while($row=mysqli_fetch_array($result)){
								$id = $row['cateID'];
								
							?>
								<li><a href='index.php?category=<?php echo $id; ?>'><?php echo ucfirst(strtolower($row['cateName'])); ?> (<?php 				
																																							$total = 0;
																																							$sql1 = "SELECT count(*) FROM books WHERE bookCateID = ".$id;
																																							$result1 = mysqli_query($con, $sql1);
																																									if($result1){
																																										$count = mysqli_fetch_array($result1);
																																										$total = $count[0]; 
																																										
																																									} echo $total;?>)</a><p></p></li>
							<?php
								}
							?>
						</ul>
					</div><!-- END #cat-->
					<div id="byPrice">
						<h3 class='title'>Price</h3>
						<ul>
							<li><a href=''>Under 50$</a></li>
							<li><a href=''>From 50$ - 99$</a></li>
							<li><a href=''>100$ and above</a></li>
						</ul>
					</div><!-- END #byPrice -->
				</div><!-- END #sidebar-->