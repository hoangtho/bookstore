<?php
	include('/core/connect.php');
	
	$sql = "SELECT * FROM category";
	$result = mysqli_query($con, $sql);
?>	

				<div id='sidebar'>
					<div id="cat">
						<h3 class='title'>Categories</h3>
						<ul>
							<?php
								while($row=mysqli_fetch_array($result)){
							?>
								<li><a href=''><?php echo ucfirst(strtolower($row['cateName'])); ?></a></li>
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