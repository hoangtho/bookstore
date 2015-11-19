<?php
   session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	$i = 1;
	
	
	
	$cate = "SELECT * FROM category";
	$cateresult =mysqli_query($con,$cate);
	
	
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
							   <div class="form-group">
								<label for="cateID" class="control-label col-md-3">Categories: </label>
								<div class="col-md-9" id="list">
								<?php while ( $cate_row = mysqli_fetch_array($cateresult) ) { ?>
								<input type="checkbox" name="cateID[]" value="<?php echo $cate_row['cateID'] ?>" ><span style="margin: 0 5px 0 2px;"><?php echo $cate_row['cateName'] ?></span>
								<?php } ?>
								</div>
                    </div>
                                <th>ID</th>
                                <th>Book Name</th>
                                
                                
                                
                                <th>Price</th>
                                
                                <th>Book cate name</th>
                                <th>book author name</th>
                                <th>Book Description</th>
								<th>Book image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while( $row = mysqli_fetch_array($result) ){ ?>
                            <?php
                                //get all the belongings categories
                                // $query_cate = "SELECT * FROM category WHERE cateID = $row[bookID]";
                                // //var_dump($query_cate);
                                // $result_cate = mysqli_query( $con, $query_cate );
                                // $string_cate = array();
                                // $cateID= "";
                                // while( $row_cate = mysqli_fetch_array( $result_cate ) ){
                                    // array_push( $string_cate, $row_cate["cateName"] );
                                    // $cateID = $cateID.$row_cate["cateID"] . '-';                        
                                // }
                                // //var_dump( json_encode($id_cate) );
                                // $cate_string_out = str_replace("[", "", json_encode($string_cate));
                                // $cate_string_out = str_replace("]", "", $cate_string_out);
                                // $cate_string_out = str_replace("\"", "", $cate_string_out);
                                // $cate_string_out = str_replace(",", ", ", $cate_string_out);
                                // $cate_string_out = str_replace("null", "", $cate_string_out);
                                // //get tags of the product
                                // // $query_tag = "SELECT * FROM product_tag WHERE id = $row[pro_tag]";
                                // // $result_tag = mysqli_query($con,$query_tag);
                                // // $tag_string_out = $tag_id = '';
                                // // if( !empty($result_tag) ){
                                    // // $tag_row_temp = mysqli_fetch_array($result_tag);
                                    // // $tag_id = $tag_row_temp["id"];
                                    // // $tag_string_out = $tag_row_temp["name"];
                                // }
                            ?>
                            <tr>
                                <td><?php echo $row["bookID"] ?></td>
                                <td><?php echo $row["bookName"] ?></td>
                                
                               
                               
                                <td><?php echo $row["bookPrice"] ?></td>
								<?php 
			                     $cate = "SELECT * FROM category WHERE cateId = $row[bookCateID]";
	                             $cateresult = mysqli_query($con,$cate);
			                    while($rowcate=mysqli_fetch_array($cateresult)) {
			                     ?>
		                    	<td ><?php echo $rowcate['cateName'] ;?></td>
			                    <?php }?>
                                <?php 
			                        $author = "SELECT * FROM author WHERE authorId = $row[bookAuthorID]";
	                                 $authorresult = mysqli_query($con,$author);
		                        	while($rowauthor=mysqli_fetch_array($authorresult)) {
			                          ?>
		                     	<td ><?php echo $rowauthor['authorName'] ;?></td>
			                     <?php }?>
                                <td><?php echo $row["bookDesc"]?></td>
                                <td>
                                    <img width="80" height="50" class="img-responsive" src="../images/upload/<?php echo ( $row["bookImage"] == '' )? 'logo.gif': $row["bookImage"]; ?>" alt="<?php echo $row["bookName"] ?>">
                                </td>
								<td>
                                    <a id="edit2" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['bookID'] ?>" data-name="<?php echo $row['bookName'] ?>" data-desc="<?php echo $row['bookDesc'] ?>" data-cate="<?php echo $cateID ?>" data-price="<?php echo $row["bookPrice"] ?>" data-image="<?php echo $row["bookImage"] ?>" ><i class="fa fa-pencil"></i></a>
                                    <a style="margin-left: 14px;" onclick="return confirm('Are you sure?')" href="productaction.php?action=delete&bookID=<?php echo $row["bookID"] ?>"><i class="fa fa-times"></i></a>
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
            <div class="modal-body">
                <form action="productaction.php" method="POST" id="pro-form" class="form-horizontal" enctype="multipart/form-data">
                    <input class="form-control hidden" readonly type="text" id="bookID" name="bookID">
                    <div class="form-group">
                        <label for="bookName" class="control-label col-md-3">Name: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="bookName" id="bookName">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="bookPrice" class="control-label col-md-3">Price: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="bookPrice" id="bookPrice">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="cateID" class="control-label col-md-3">Categories: </label>
                        <div class="col-md-9" id="list">
                        <?php while ( $cate_row = mysqli_fetch_array($cateresult) ) { ?>
                            <input type="checkbox" name="cateID[]" value="<?php echo $cate_row['cateID'] ?>" ><span style="margin: 0 5px 0 2px;"><?php echo $cate_row['cateName'] ?></span>
                        <?php } ?>
                        </div>
                    </div>
                   
                    <label for="bookImage" class="control-label col-md-3">Image: </label>
                    <div class="form-group">
                        <div class="col-md-6">
                        <img width="80" height="50" class="img-responsive top-space" src="../images/upload/<?php echo ( $row["bookImage"] == '' )? '': $row["bookImage"]; ?>" alt="" name="bookImage" id="Image-img"/>
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            <input class="" type="file" name="bookImage" id="bookImage">
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
        $("#myModalLabel").text("Edit the Book");
        $("#bookID").val($(this).attr("data-id"));
        $("#bookName").val($(this).attr("data-name"));
        
        $("#bookPrice").val($(this).attr("data-price"));
        
        $("#bookAuthorName").val($(this).attr("data-authorname"));
        
        $("#bookDesc").val($(this).attr("data-desc"));
        $("#bookImage").val($(this).attr("data-image"));

        

        var x = "../images/upload/"+$(this).attr("data-image");
        //alert(x);
       $("img#Image-img").attr( "src", x ); 
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
        
        $("#bookName").val("");
        
        
        $("#bookPrice").val("");
        
        $("#bookAuthorName").val("");
        $("#bookDesc").val("");
		$("#bookImage").val("");
        $("#btn_submit").attr("name","submit_add");
    });
</script>
			
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>