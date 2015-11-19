<?php
	session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
?>
		<div id='content'>
				<div id='sidebar'>
					<div id='cat'>
					<h3>Category</h3>
					<ul>	
						<?php
							$sql = "SELECT * FROM category";
							$result = mysqli_query($con, $sql);
							
							while($row=mysqli_fetch_array($result)){
							?>
									<li><a><?php echo ucfirst(strtolower($row['cateName'])); ?></a></li>
								<?php
							}
						?>
					</ul>
					</div><!--END #cat-->
					<div id='add-product'>
					<h3>Management</h3>
					<ul>
						<li><a href=''>Add product</a></li>
						<li><a href="category-list.php">Category</a></li>
					</ul>
					</div><!--END #add-product -->
				</div><!-- END #sidebar -->
				<div id='main-content'>
					<h3>List of books</h3>
					<table id="book">
					  <tr>
						<th></th>
						<th>ID</th>
						<th><a href='product-list.php'</a>Product</th>
						<th>Author</th>
						<th>Price</th>
						<th>Date</th>
						<th>Edit</th>
						<th>Delete</th>
					  </tr>
					  <tr>
						<td><input type='checkbox'></td>
						<td>1</td>
						<td>I never kew it was you</td>
						<td>J.D Wammathan</td>
						<td>135$</td>
						<td>2014-10-11 23:12:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr class="alt">
						<td><input type='checkbox'></td>
						<td>2</td>
						<td>The magic</td>
						<td>Brone Brown</td>
						<td>191$</td>
						<td>2014-10-11 23:23:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr>
						<td><input type='checkbox'></td>
						<td>3</td>
						<td>The notebook</td>
						<td>Nicolas Sparks</td>
						<td>99$</td>
						<td>2014-10-11 24:12:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr class="alt">
						<td><input type='checkbox'></td>
						<td>4</td>
						<td>A walk across the sun</td>
						<td>Colin Kadison</td>
						<td>45$</td>
						<td>2014-10-11 25:29:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr>
						<td><input type='checkbox'></td>
						<td>5</td>
						<td>Marathon Papa</td>
						<td>Katherine Heigle</td>
						<td>51$</td>
						<td>2014-11-11 23:12:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr class="alt">
						<td><input type='checkbox'></td>
						<td>6</td>
						<td>Star Wars Episode 1</td>
						<td>Terry Brooks</td>
						<td>34$</td>
						<td>2014-10-11 12:01:56</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr>
						<td><input type='checkbox'></td>
						<td>7</td>
						<td>I never kew it was you</td>
						<td>J.D Wammathan</td>
						<td>135$</td>
						<td>2014-10-11 23:12:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
					  <tr class="alt">
						<td><input type='checkbox'></td>
						<td>8</td>
						<td>True Agape: True Love Will Always Conquer</td>
						<td> George D. Demakas </td>
						<td>56$</td>
						<td>2014-10-11 23:12:34</td>
						<td><a href=''><img src='images/user_edit.png'></a></td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>			  
					</table>
					<a id='del' href=''>Delete items</a>
					<a id='add' href=''>Add items</a>
					<ul id='pagination'>
						<li class='active-pag'><a href=''>1</a></li>
						<li><a href=''>2</a></li>
						<li><a href=''>3</a></li>
						<li><a href=''>next >></a></li>
					</ul>
				</div><!--END #main-content -->
			</div><!-- END #content -->
			
			
		
			
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>


	

			
				