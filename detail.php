<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
?>

	<div id="content">
		<div class='wrapper'>
			<div id='detail'>
				<h3>Shopping cart</h3>
					<table id="book">
					  <tr>
						<th></th>
						<th>ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Price</th>
						<th>Delete</th>
					  </tr>
					  <tr>
						<td><input type='checkbox'></td>
						<td>1</td>
						<td>I never knew it was you</td>
						<td>J.D Wammathan</td>
						<td>$34</td>
						<td><a href=''><img src='images/trash.png'></td>
					  </tr>
				</table>
				
				<a id='delete' href=''>Delete all</a>
				<a id='check' href=''>Check out</a>
				<a id='continue' href='index.php'>Continue</a>
			</div><!--END #detail-->
		</div><!-- END .wrapper -->
	</div><!--END #content-->
<?php include ('templates/footer.php') ?>		