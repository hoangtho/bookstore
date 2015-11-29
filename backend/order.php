<?php
	session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');

	include ('../core/connect.php');
	
	$query = "SELECT * FROM `order`";
	$result = mysqli_query($con, $query);
	
	$increase = 1;

?>

	<div id="content">
		<div class='wrapper'>
			<h3>Order List</h3>
				<table id="category">
					  <tr>
						<th id="id"><center>ID</center></th>
						<th id="catName"><center>Customer Name</center></th>
						<th id="catName"><center>Quantity</center></th>
						<th id="catName"><center>Total Price</center></th>
						<th id="catName"><center>Date</center></th>
						<th id="catDel"><center>Delete</center></th>
					  </tr>
					 <?php while($row = mysqli_fetch_array($result)) { ?>
					  <tr>
						<td><center><?php echo $increase++; ?></center></td>
						<td>
							<center>
									<?php echo $row['fullname']; ?>
							</center>
						</td>
						<td>
							<center>
									<?php 
										$sql = "SELECT * FROM `order_detail` WHERE `orderID` = ".$row['orderID'];
										$result1 = mysqli_query($con, $sql);
										
										$count = 0;
										$total = 0;
										while($row1 = mysqli_fetch_array($result1)){
											$count = $count + $row1['quantity'];
											$total = $total + ( $row1['quantity'] * $row1['price'] );
										}
										echo $count;
									?>
							</center>
						</td>
						<td>
							<center>
									<?php  
										echo "$".number_format($total);
									?>
							</center>
						</td>
						<td>
							<center>
									<?php echo $row['orderDate']; ?>
							</center>
						</td>
						
						<td>
								<center><a style="margin-left: 14px;" onclick="return confirm('Are you sure to delete this record?')"  href='order-action.php?order-del=<?php echo $row['orderID']; ?>'><img src='images/trash.png'></a>
								</center>
						</td>
					  </tr>
					  <?php } ?>
				</table>
			</div><!--END #member-->
		</div><!-- END .wrapper -->
	</div><!--END #content-->
	
	
<?php 
	include ('templates/footer.php');
	
	}else{
		header('Location:login.php');
	}

?>	