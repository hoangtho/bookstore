<?php 
     session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	
	$cate = "SELECT * FROM category";
	$cateresult =mysqli_query($con,$cate);
	
	$increase = 1;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Products Management</h3>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <button id="btn_add" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add</button>
                    <div class="top-space"></div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><center>ID</center></th>
                                <th>Name</th>
                                <th>Image</th>
                                
                                <th>Price</th>
                              
                               
                               <th>categories</th>
                                <th>Description</th>
                                <th><center>Edit</center></th>
								<th><center>Delete</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while( $row = mysqli_fetch_array($result) ){ ?>
                           
                                
                         
                            <tr>
							   
                                <td><center><?php echo $increase++;?></center></td>
						        <td><?php echo $row["bookName"] ?></td>
                                <td>
                                    <img width="80" height="50" class="img-responsive" src="../images/upload/<?php echo ( $row["bookImage"] == '' )? 'logo.gif': $row["bookImage"]; ?>" alt="<?php echo $row["bookName"] ?>">
                                </td>
								
                              
                                <td><?php echo $row["bookPrice"] ?></td>
                              
                                <?php 
								$cate1 = "SELECT * FROM category WHERE cateID = $row[bookCateID]";
								$cateresult1 = mysqli_query($con,$cate1);
								while($rowcate=mysqli_fetch_array($cateresult1)) {
								?>
								<td><?php echo $rowcate['cateName'] ; }?></td>
							    
                            
                                <td><?php echo $row["bookDesc"] ?></td>
                              <td>
							<center>
								<a id="editproduct" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['bookID'] ?> " data-name="<?php echo $row['bookName'] ?>" ><img src='images/user_edit.png'></a>
							</center>
						    </td>
						   <td>
								<center><a style="margin-left: 14px;" onclick="return confirm('Are you sure to delete this record?')"  href='productaction.php?product-del=<?php echo $row['bookID']; ?>'><img src='images/trash.png'></a>
								</center>
						   </td>
					       </tr>
					  <?php } ?>
                        </tbody>
                    </table>
                    <button id="btn_add" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add</button>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add a new Product</h4>
            </div>
			<?php
		echo "tong so trang" ;
		?>	
            <div class="modal-body">
                <form action="productaction.php" method="POST" id="pro-form" class="form-horizontal" enctype="multipart/form-data">
                    <input class="form-control hidden" readonly type="text" id="bookID" name="bookID">
                    <div class="form-group">
                        <label for="bookName" class="control-label col-md-3">Name1: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="bookName" id="bookName">
                        </div>
                    </div>
                   
                   
                    <label for="bookImage" class="control-label col-md-3">Image1: </label>
                    <div class="form-group">
                        <div class="col-md-6">
                        <img width="80" height="50" class="img-responsive top-space" src="../images/upload/<?php echo ( $row["bookImage"] == '' )? '': $row["bookImage"]; ?>" alt="" name="bookImage" id="image-img"/>
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            <input class="" type="file" name="bookImage" id="bookImage">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="bookPrice" class="control-label col-md-3">price: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="double" name="bookPrice" id="bookPrice">
                        </div>
                    </div>
                   
                     <div class="form-group">
                        <label for="bookCate" class="control-label col-md-3">Categories: </label>
                        <div class="col-md-9" id="list">
                        <?php while ( $cate_row = mysqli_fetch_array($cateresult) ) { ?>
                            <input type="checkbox" name="bookCate" value="<?php echo $cate_row["cateID"] ?>" ><span style="margin: 0 5px 0 2px;"><?php echo $cate_row["cateName"] ?></span>
                        <?php } ?>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="bookDesc" class="control-label col-md-3">Description: </label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="3" name="bookDesc" id="bookDesc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn btn-default form-close" data-dismiss="modal">Close</button>
                            <input class="btn btn-info" type="submit" name="submit_add" id="btn_submit" value="Done">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click','.form-close',function(evt){
            $('#pro-form').bootstrapValidator('resetForm', true);
        });

        $('#pro-form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'bookName': {
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
        $("#myModalLabel").text("Edit the Product");
        $("#bookID").val($(this).attr("data-id"));
        $("#bookName").val($(this).attr("data-name"));
        
        $("#bookPrice").val($(this).attr("data-price"));
        
        
       
        $("#bookDesc").val($(this).attr("data-desc"));
        $("#bookImage").val($(this).attr("data-image"));

       

        

        var x = "../images/upload/"+$(this).attr("data-image");
        //alert(x);
        $("img#image-img").attr( "src", x ); 
        var values = $(this).attr("data-cate").split('-');
        values.pop();
        $("#list").find('input').prop("checked", false);
        if((values[0] - 0) === 0){
            values[0] = 0;
        }
        $("#list").find('[value=' + values.join('], [value=') + ']').prop("checked", true);

        $("#btn_submit").attr("name","submit_edit");
    });

    $(document).on('click','#btn_add',function(evt){
        $("#myModalLabel").text("Add a new Product...");
        $("#bookID").val("ID will be auto increment...");
        $("#list").find('input').prop("checked", false);
        
        //$("#pro-status option").prop("selected", false);
        $("#bookImage").val("");
        $("#bookName").val("");
        $("#bookDesc").val("");
        
        $("#bookPrice").val("");
       
        
        
        $("#btn_submit").attr("name","submit_add");
    });
</script>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>