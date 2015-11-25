<?php 
     session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	
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
                                <th>ID</th>
								
                                <th>Name</th>
                                <th>Thumbnail</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Price</th>
                                <th>Sale Off (%)</th>
                                <th>Status</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while( $row = mysqli_fetch_array($result) ){ ?>
                            <?php 
                                //get all the belongings categories
                                $query_cate = "SELECT * FROM v_product_cate1 WHERE pro_id = $row[pro_id]";
                                //var_dump($query_cate);
                                $result_cate = mysqli_query( $con, $query_cate );
                                $string_cate = array();
                                $cate_id = "";
                                while( $row_cate = mysqli_fetch_array( $result_cate ) ){
                                    array_push( $string_cate, $row_cate["cate_name"] );
                                    $cate_id = $cate_id.$row_cate["cate_id"] . '-';                        
                                }
                                //var_dump( json_encode($id_cate) );
                                $cate_string_out = str_replace("[", "", json_encode($string_cate));
                                $cate_string_out = str_replace("]", "", $cate_string_out);
                                $cate_string_out = str_replace("\"", "", $cate_string_out);
                                $cate_string_out = str_replace(",", ", ", $cate_string_out);
                                $cate_string_out = str_replace("null", "", $cate_string_out);
                                //get tags of the product
                                $query_tag = "SELECT * FROM product_tag WHERE id = $row[pro_tag]";
                                $result_tag = mysqli_query($con,$query_tag);
                                $tag_string_out = $tag_id = '';
                                if( !empty($result_tag) ){
                                    $tag_row_temp = mysqli_fetch_array($result_tag);
                                    $tag_id = $tag_row_temp["id"];
                                    $tag_string_out = $tag_row_temp["name"];
                                }
                            ?>
							
							
                            <tr>
                                <td><?php echo $row["pro_id"] ?></td>
                                <td><?php echo $row["pro_name"] ?></td>
                                <td>
                                    <img width="80" height="50" class="img-responsive" src="../images/upload/<?php echo ( $row["pro_thumb"] == '' )? 'logo.gif': $row["pro_thumb"]; ?>" alt="<?php echo $row["pro_name"] ?>">
                                </td>
								
                                <td><?php echo $cate_string_out ?></td>
                                <td><?php echo $tag_string_out ?></td>
                                <td><?php echo $row["pro_price"] ?></td>
                                <td><?php echo $row["pro_saleoff"] ?></td>
                                <td><?php echo ( $row["pro_status"] == '1' ) ? 'Available' : 'Out Of Stock' ?></td>
                                <td><?php echo $row["pro_stock"] ?></td>
                                <td><?php echo $row["pro_desc"] ?></td>
                                <td>
                                    <a id="edit2" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['pro_id'] ?>" data-name="<?php echo $row['pro_name'] ?>" data-desc="<?php echo $row['pro_desc'] ?>" data-cate="<?php echo $cate_id ?>" data-price="<?php echo $row["pro_price"] ?>" data-saleoff="<?php echo $row["pro_saleoff"] ?>"  data-stock="<?php echo $row["pro_stock"] ?>" data-thumb="<?php echo $row["pro_thumb"] ?>" data-tag="<?php echo $tag_id  ?>" data-status="<?php echo $row["pro_status"]  ?>"><i class="fa fa-pencil"></i></a>
                                    <a style="margin-left: 14px;" onclick="return confirm('Are you sure?')" href="product-action.php?action=delete&pro-id=<?php echo $row["pro_id"] ?>"><i class="fa fa-times"></i></a>
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
                <form action="product-action.php" method="POST" id="pro-form" class="form-horizontal" enctype="multipart/form-data">
                    <input class="form-control hidden" readonly type="text" id="pro-id" name="pro-id">
                    <div class="form-group">
                        <label for="pro-name" class="control-label col-md-3">Name: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="pro-name" id="pro-name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-cate" class="control-label col-md-3">Categories: </label>
                        <div class="col-md-9" id="list">
                        <?php while ( $cate_row = mysqli_fetch_array($category) ) { ?>
                            <input type="checkbox" name="pro-cate[]" value="<?php echo $cate_row["cate_id"] ?>" ><span style="margin: 0 5px 0 2px;"><?php echo $cate_row["cate_name"] ?></span>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-tag" class="control-label col-md-3">Product Tag: </label>
                        <div class="col-md-9">
                        <select name="pro-tag" id="pro-tag">
                        <?php while ( $tag_row = mysqli_fetch_array($tag) ) { ?>
                            <option value="<?php echo $tag_row["id"] ?>"><?php echo $tag_row["name"] ?></option>
                        <?php } ?>
                        </select>
                        </div>
                    </div>
                    <label for="pro-thumb" class="control-label col-md-3">Image: </label>
                    <div class="form-group">
                        <div class="col-md-6">
                        <img width="80" height="50" class="img-responsive top-space" src="../images/upload/<?php echo ( $row["pro_thumb"] == '' )? '': $row["pro_thumb"]; ?>" alt="" name="pro-thumb" id="thumb-img"/>
                        </div>
                        <div class="col-md-9 col-md-offset-3">
                            <input class="" type="file" name="pro-thumb" id="pro-thumb">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-price" class="control-label col-md-3">Price: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="pro-price" id="pro-price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-saleoff" class="control-label col-md-3">Sale Off (%): </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="pro-saleoff" id="pro-saleoff">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-status" class="control-label col-md-3">Status: </label>
                        <div class="col-md-9">
                            <select name="pro-status" id="pro-status">
                                <option value="1">Available</option>
                                <option value="0">Out of Stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-stock" class="control-label col-md-3">Stock: </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="pro-stock" id="pro-stock">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pro-desc" class="control-label col-md-3">Description: </label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="3" name="pro-desc" id="pro-desc"></textarea>
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
                'pro-name': {
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
        $("#pro-id").val($(this).attr("data-id"));
        $("#pro-name").val($(this).attr("data-name"));
        $("#pro-tag").val($(this).attr("data-tag"));
        $("#pro-price").val($(this).attr("data-price"));
        $("#pro-saleoff").val($(this).attr("data-saleoff"));
        $("#pro-status").val($(this).attr("data-status"));
        $("#pro-stock").val($(this).attr("data-stock"));
        $("#pro-desc").val($(this).attr("data-desc"));
        $("#pro-thumb").val($(this).attr("data-thumb"));

        var y = $(this).attr("data-tag");
        $("#pro-tag option[value="+y+"]").prop("selected", true);

        var z = $(this).attr("data-status");
        $("#pro-status option[value="+z+"]").prop("selected", true);

        var x = "../images/upload/"+$(this).attr("data-thumb");
        //alert(x);
        $("img#thumb-img").attr( "src", x ); 
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
        $("#pro-id").val("ID will be auto increment...");
        $("#list").find('input').prop("checked", false);
        $("#pro-tag option").prop("selected", false);
        //$("#pro-status option").prop("selected", false);
        $("#pro-thumb").val("");
        $("#pro-name").val("");
        $("#pro-desc").val("");
        $("#pro-tag").find('option:first').add('selected');
        $("#pro-price").val("");
        $("#pro-saleoff").val("");
        $("#pro-status").val("");
        $("#pro-stock").val("");
        $("#btn_submit").attr("name","submit_add");
    });
</script>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>
