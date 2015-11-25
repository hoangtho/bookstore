<?php
	session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');

	include ('../core/connect.php');
	
	if(isset($_GET['data-id'])){
		$dataid=$_GET['data-id'];
	}
		
	
	$sql = "SELECT * FROM category";
	$result = mysqli_query($con, $sql);
	
	$increase = 1;
?>

	<div id="content">
		<div class='wrapper'>
			<h3>Category List</h3>
				<a class="btn btn-info btn_add btn-danger" href="#myModal" data-toggle="modal" data-target="#myModal" id="btn_add">Add</a>
				<table id="category">
					  <tr>
						<th id="id"><center>ID</center></th>
						<th id="catName">Category Name</th>
						<th id="edit"><center>Edit</center></th>
						<th id="catDel"><center>Delete</center></th>
					  </tr>
					  <?php while($row=mysqli_fetch_array($result)){ ?>
					  <tr>
						<td><center><?php echo $increase++;?></center></td>
						<td>
									<?php echo ucfirst(strtolower($row['cateName'])); ?>
						</td>
						<td>
							<center>
								<a id="edit2" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['cateID'] ?> " data-name="<?php echo ucfirst(strtolower($row['cateName'])) ?>" ><img src='images/user_edit.png'></a>
							</center>
						</td>
						<td>
								<center><a style="margin-left: 14px;" onclick="return confirm('Are you sure to delete this record?')"  href='category-action.php?cate-del=<?php echo $row['cateID']; ?>'><img src='images/trash.png'></a>
								</center>
						</td>
					  </tr>
					  <?php } ?>
				</table>
			</div><!--END #member-->
		</div><!-- END .wrapper -->
	</div><!--END #content-->
	
	
	
		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close form-close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Add New Category</h4>
			</div>
            		<div class="modal-body">
				<form action="category-action.php" method="POST" id="cate-form" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-2 col-md-offset-3">
							<input class="form-control" type="hidden" id="cateID" name="cateID">
						</div>
					</div>
					<div class="form-group">
						<label for="cate-name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="cate-name" id="cate-name">
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<input class="btn btn-info btn-danger" type="submit" name="submit_add" id="btn_submit" value="Done">	
							<button type="button" class="btn btn-default form-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close form-close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Add New Category</h4>
			</div>
            		<div class="modal-body">
				<form action="category-action.php" method="POST" id="cate-form" class="form-horizontal">
					<div class="form-group">
						<label for="cate-name" class="col-md-3 control-label">Name: </label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="cate-name" id="cate-name">
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							
							<button type="button" class="btn btn-default form-close" data-dismiss="modal">Close</button>
							<input class="btn btn-info btn-danger" type="submit" name="edit" id="btn_submit" value="Save">	
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

<?php
  if(isset($_POST['']))
?>
	
<?php 
	include ('templates/footer.php');
	
	}else{
		header('Location:login.php');
	}

?>	


<script>
	$(document).ready(function() {
		$(document).on('click','.form-close',function(evt){
			$('#cate-form').bootstrapValidator('resetForm', true);
		});

	    $('#cate-form').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
			
	         fields: {
	            'cate-name': {
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
		
		$("#myModalLabel").text("Edit The Category");

		$("#cateID").show();
		$("#cateID").val($(this).attr("data-id"));
		$("#cate-name").val($(this).attr("data-name"));
		$("#btn_submit").attr("name","submit_edit");
	});

	$(document).on('click','.btn_add',function(evt){
		
		$("#myModalLabel").text("Add new category");
		$("#cateID").hide();
		$("#cate-name").val("");
		$("#btn_submit").attr("name","submit_add");
	});
	
<<<<<<< HEAD
	
=======
	$(document).on('click','#editCate',function(evt){
		
		$("#mymodalLabel").text("Category Edit Form");
		$("#userID").show();
		$("#userID").val($(this).attr("data-id"));
		$("#cate-name").val($(this).attr("data-name"));
		$("#btn_submit").attr("name","edit");
	});
>>>>>>> 5f67f5fecfd93a27a64a3d283f8f7c9b6ac3e73d
	
</script>