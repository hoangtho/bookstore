<?php
	session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');

	include ('../core/connect.php');
	
	$sql = "SELECT * FROM feedback";
	$result = mysqli_query($con, $sql);
	
	$increase = 1;
?>

	<div id="content">
		<div class='wrapper'>
			<h3>Feedback List</h3>
				<table id="feedback">
					  <tr>
						<th id="fbID"><center>ID</center></th>
						<th id="fbEmail">Customer Email</th>
						<th id="fbContent">Content</th>
						<th id="fbDel"><center>Delete</center></th>
					  </tr>
					  <?php while($row=mysqli_fetch_array($result)){ ?>
					  <tr>
						<td><center><?php echo $increase++;?></center></td>
						<td>
									<?php echo $row['email']; ?>
						</td>
						<td>
									<?php echo $row['content']; ?>
						</td>
						<td>
								<center><a style="margin-left: 14px;" onclick="return confirm('Are you sure to delete this record?')"  href='fb-action.php?fb-del=<?php echo $row['feedbackID']; ?>'><img src='images/trash.png'></a>
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
		