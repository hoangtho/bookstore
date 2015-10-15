<?php 
	session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');

	include ('../core/connect.php');
	// echo $_SESSION['mem_row'];
		$increase = 1;
		$sql = "SELECT * FROM user";
		$result = mysqli_query($con, $sql);
?>

	<div id="content">
		<div class='wrapper'>
			<div id='member'>
				<h3>Members list</h3>
					<table id="mb">
					  <tr>
						<th><center>ID</center></th>
						<th>Username</th>
						<th>Fullname</th>
						<th>Email</th>
						<th>Address</th>
						<th>Level</th>
						<th><center>Edit</center></th>
						<th><center>Delete</center></th>
					  </tr>
					  <?php while($row=mysqli_fetch_array($result)){ ?>
					  <tr>
						<td><center><?php echo $increase++;?></center></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['fullname']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['level']; ?></td>
						<td>
							<center>
								<!-- <a href="" data-toggle="modal" data-target="#myModal"><img src='images/user_edit.png'></a> -->
								<a id="edit2" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['userID'] ?> " data-name="<?php echo $row['username'] ?>"  data-fullname="<?php echo $row['fullname'] ?>" data-address="<?php echo $row["address"] ?>" data-email="<?php echo $row["email"] ?>" data-level="<?php echo $row['level'] ?>" ><img src='images/user_edit.png'></a>
							</center>
						</td>
						<td>
								<center><a  style="margin-left: 14px;" onclick="return confirm('Are you sure to delete this record?')"  href='member-action.php?user-del=<?php echo $row['userID']; ?>'><img src='images/trash.png'></a>
								</center>
						</td>
					  </tr>
					  <?php } ?>
				</table>
				<!--
				<a id='delete' href=''>Delete all</a>
				<a id='add_mb' href=''>Add more</a>
				-->
			</div><!--END #member-->
		</div><!-- END .wrapper -->
	</div><!--END #content-->
	
	
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close form-close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">User Edit Form</h4>
			</div>
			<div class="modal-body">
				<form action="member-action.php" method="POST" id="edit-form" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-2 col-md-offset-3">
							<input class="form-control" type="hidden" id="userID" name="userID">
						</div>
					</div>
					<div class="form-group">
						<label for="fullname" class="col-md-3 control-label">Fullname</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="fullname" id="fullname">
						</div>
					</div>
					<div class="form-group">
						<label for="customer-name" class="col-md-3 control-label">Username</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="username" id="username">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="email" id="email">
						</div>
					</div>
					<div class="form-group">
						<label for="customer-pass" class="col-md-3 control-label">Address</label>
						<div class="col-md-9">
							<textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="level" class="col-md-3 control-label">Level</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="level" id="level">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<input class="btn btn-info btn-danger" type="submit" name="edit" id="btn_submit" value="Save">
							<button type="button" class="btn btn-default form-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
	include ('templates/footer.php');
	}else{
		header('Location:login.php');
	}

?>		


<script>
	$(document).ready(function() {
		$(document).on('click','.form-close',function(evt){
			$('#edit-form').bootstrapValidator('resetForm', true);
		});

	    $('#edit-form').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            'fullname': {
	                validators: {
	                    notEmpty: {
	                        message: 'required'
	                    }
	                }
	            },
				'username': {
	                validators: {
	                    notEmpty: {
	                        message: 'required'
	                    }
	                }
	            },
	            'address': {
	                validators: {
	                    notEmpty: {
	                        message: 'required'
	                    }
	                }
	            },
	            'email':{
	            	validators: {
	                    emailAddress: {
                        	message: 'The email address is not valid'
                    	},
						notEmpty: {
	                        message: 'required'
	                    }
	                }
	            },
				'level':{
	            	validators: {
	                    notEmpty: {
                        	message: 'required'
                    	}
	                }
	            }
	        }
	    });
	});
	$(document).on('click','#edit2',function(evt){
		
		$("#myModalLabel").text("User Edit Form");
		$("#userID").show();
		$("#userID").val($(this).attr("data-id"));
		$("#fullname").val($(this).attr("data-fullname"));
		$("#username").val($(this).attr("data-name"));
		$("#address").val($(this).attr("data-address"));
		$("#email").val($(this).attr("data-email"));
		$("#level").val($(this).attr("data-level"));
	});

</script>
