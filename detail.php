<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
		
		include('core/connect.php');
		
		if(isset($_SESSION['giohang'])){
			if(isset($_GET['delCart'])){
				$id = $_GET['delCart'];
				for($i = 0; $i < count($_SESSION['giohang']); $i++){
					if($_SESSION['giohang'][$i]['id'] == $id){
						$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] - 1;
					}
				}
				header('Location: detail.php');
			}
		
			if(isset($_GET['addCart'])){
				$id = $_GET['addCart'];
				for($i = 0; $i < count($_SESSION['giohang']); $i++){
					if($_SESSION['giohang'][$i]['id'] == $id){
						$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] + 1;
					}
				}
				header('Location: detail.php');
			}
		}
		
		

?>

	<div id="content">
		<div class='wrapper'>
			<div id='detail'>
				<h3>Shopping cart</h3>
				<?php if(isset($_SESSION['giohang'])){ ?>
					<table id="book">
					  <tr>
						<th><center>ID</center></th>
						<th><center>Title</center></th>
						<th><center>Author</center></th>
						<th><center>Quantity</center></th>
						<th><center>Price</center></th>
						<th><center>Delete</center></th>
					  </tr>
					  <?php 
						for($i=0; $i<count($_SESSION['giohang']); $i++){
							$query = "SELECT * FROM books WHERE bookID = ".$_SESSION['giohang'][$i]['id'];
							$result = mysqli_query($con, $query);
							$row = mysqli_fetch_array($result);
					  ?>
					  <tr>
						<td><center><?php echo $i+1;?></center></td>
						<td style="font-weight: bold;"><center><?php echo $row['bookName']; ?></center></td>
						<td><center><?php $sql = "SELECT * FROM author WHERE bookID = ".$row['bookAuthorID']; 
															$result1 = mysqli_query($con, $sql);
															$row1 = mysqli_fetch_array($result1);
															echo $row1['authorName']; ?></center></td>
						<td width="30px"><center><a href="detail.php?delCart=<?php echo $_SESSION['giohang'][$i]['id']; ?>"><img src="images/minus.png" width="15px" height="15px" style="margin-right: 5px"></a><?php echo $_SESSION['giohang'][$i]['soluong']; ?><a href="detail.php?addCart=<?php echo $_SESSION['giohang'][$i]['id']; ?>"><img src="images/plus.png" width="15px" height="15px" style="margin-left: 5px"></a></center></td>
						<td><center><?php echo "$".number_format($row['bookPrice']); ?></center></td>
						<td width="30px"><center><a href=''><img src='images/trash.png'></center></td>
					  </tr>
					  <?php
						}
					  ?>
				</table>
				<?php 
						
					}else{
					echo "<p>Your shopping cart contains NO item!</p>";
				
				} ?>
				<p id="total">
				<?php
					if(isset($_SESSION['giohang'])){
						$total = 0;
						for($j = 0; $j < count($_SESSION['giohang']); $j++){
								$query1 = "SELECT * FROM books WHERE bookID = ".$_SESSION['giohang'][$j]['id'];
								$result1 = mysqli_query($con, $query1);
								$row1 = mysqli_fetch_array($result1);
						
								$total = $total + $row1['bookPrice']*$_SESSION['giohang'][$j]['soluong'];
						}
						?>
							Total: <?php echo "$".number_format($total); ?>
						</p><br/><br/>	
						<a id='delete' href=''>Delete all</a>
						<a id='check' href='checkout.php'>Check out</a>
						<a id='continue' href='index.php'>Continue</a>
					<?php
					}
						?>
				
			</div><!--END #detail-->
		</div><!-- END .wrapper -->
	</div><!--END #content-->
<?php include ('templates/footer.php') ?>		