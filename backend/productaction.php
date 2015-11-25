<?php 
	
   session_start();
	if($_SESSION['login'] && $_SESSION['level'] != 0){
	
	include ('templates/header.php');
	include('../core/connect.php');
	
	$query = "SELECT * FROM books";
	$result=mysqli_query($con,$query);
	$cate = "SELECT * FROM category";
	$cateresult =mysqli_query($con,$cate);
	

	if( isset($_GET["action"]) && isset($_GET["bookID"]) ){
		$action = $_GET["action"];
		$id = $_GET["bookID"];
		switch ($action) {
			case 'delete':
				delRecord('books','bookID',$id);
				redirect("index.php?page=productlist1");
				break;
			default:
				redirect("index.php?page=productlist1");
				break;
		}
	}else{
		if( isset($_POST["submit_add"]) ){
			if( isset($_POST["bookName"]) && $_POST["bookName"] != ''  ){
				$name = $_POST["bookName"];
				$price = $_POST["bookPrice"];
				$selected = $_POST["bookCate"];
				$desc=$_POST["bookDesc"];
				// if( isset($_POST["bookDesc"]) ){
					// $desc = $_POST["bookDesc"];
				// }else{
					// $desc = "";
				// }
				//-------------------------------------------------
				$allowedExts = array("gif", "jpeg", "jpg", "png");
		        $temp = explode(".", $_FILES["bookImage"]["name"]);
		        $extension = end($temp);
				if ((($_FILES["bookImage"]["type"] == "image/gif") 
		            || ($_FILES["bookImage"]["type"] == "image/jpeg") 
		            || ($_FILES["bookImage"]["type"] == "image/jpg") 
		            || ($_FILES["bookImage"]["type"] == "image/pjpeg") 
		            || ($_FILES["bookImage"]["type"] == "image/x-png") 
		            || ($_FILES["bookImage"]["type"] == "image/png")) && ($_FILES["bookImage"]["size"] < 200000) 
		            && in_array($extension, $allowedExts)) {
		                if ($_FILES["bookImage"]["error"] > 0) {
		                    echo "Return Code: " . $_FILES["bookImage"]["error"] . "<br>";
		                } else {
		                    echo "Upload: " . $_FILES["bookImage"]["name"] . "<br>";
		                    echo "Type: " . $_FILES["bookImage"]["type"] . "<br>";
		                    echo "Size: " . ($_FILES["bookImage"]["size"] / 1024) . " kB<br>";
		                    echo "Temp file: " . $_FILES["bookImage"]["tmp_name"] . "<br>";
		                    if (file_exists("../images/upload/" . $_FILES["bookImage"]["name"])) {
		                        $temp = explode(".",$_FILES["bookImage"]["name"]);
		                        $newfilename = rand(1,99999) . '.' .end($temp);
		                        move_uploaded_file($_FILES["bookImage"]["tmp_name"], "../images/upload/" . $newfilename);
		                        $image = $newfilename;
								//Query here
								$query = "INSERT INTO books (bookName, bookPrice,bookImage,bookCateID,bookDesc) VALUES ('$name','$price','$image','$selected','$desc')";
								$result = mysqli_query( $con, $query ) or die ($query);  
								header('Location: productlist1.php');
		                    } else {
		                        move_uploaded_file($_FILES["bookImage"]["tmp_name"], "../images/upload/" . $_FILES["bookImage"]["name"]);
		                        $image = $_FILES["bookImage"]["name"];
		                        //Query here
		                        $query = "INSERT INTO books (bookName,bookPrice,bookImage,bookCateID,bookDesc) VALUES ('$name','$price','$image','$selected','$desc')";
								$result = mysqli_query( $con, $query ) or die ($query);
								header('Location: productlist1.php');
		                    }
		                }
		            } else {
		                $query = "INSERT INTO books (bookName,bookPrice,bookCateID,bookDesc) VALUES ('$name','$price','$selected','$desc')";
						$result = mysqli_query( $con, $query ) or die ($query);
						header('Location: productlist1.php');
		            }
					
		        //---------------------------------------------------------------------------------------
				//$query = "INSERT INTO product (pro_name,pro_desc,pro_price,pro_saleoff,pro_status,pro_stock) VALUES ('$name','$desc','$price','$saleoff','$status','$stock')";
				//$result = mysqli_query( $con, $query ) or die ($query);

				
				// //update author table
				// $author = $_POST["authorName"];
				// $authorquery = "INSERT INTO author(authorName) VALUES ('$author')";
				// mysqli_query($con,$authorquery);
				// //echo mysqli_fetch_array(mysqli_query($con,'SELECT LAST_INSERT_ID()'))[0];
				// redirect("index.php?page=productlist");
			}
		}
		if( isset($_POST["submit_edit"]) ){
			if( isset($_POST['bookName']) && $_POST['bookName'] != ''  ){
				$id = $_POST['bookID'];
				$name = $_POST['bookName'];
				$price = $_POST['bookPrice'];
				$selected = $_POST['cateID'];
				if( isset($_POST['bookDesc']) ){
					$desc = $_POST['bookDesc'];
				}else{
					$desc = "";
				}
				// //clear
				// mysqli_query($con, "DELETE FROM category WHERE cateID='$id'" ) or die ("Error to update pro-cate table.");
				
				//-------------------------------------------------
				$allowedExts = array("gif", "jpeg", "jpg", "png");
		        $temp = explode(".", $_FILES["bookImage"]["name"]);
		        $extension = end($temp);
				if ((($_FILES["bookImage"]["type"] == "image/gif") 
		            || ($_FILES["bookImage"]["type"] == "image/jpeg") 
		            || ($_FILES["bookImage"]["type"] == "image/jpg") 
		            || ($_FILES["bookImage"]["type"] == "image/pjpeg") 
		            || ($_FILES["bookImage"]["type"] == "image/x-png") 
		            || ($_FILES["bookImage"]["type"] == "image/png")) && ($_FILES["bookImage"]["size"] < 200000) 
		            && in_array($extension, $allowedExts)) {
		                if ($_FILES["bookImage"]["error"] > 0) {
		                    echo "Return Code: " . $_FILES["bookImage"]["error"] . "<br>";
		                } else {
		                    echo "Upload: " . $_FILES["bookImage"]["name"] . "<br>";
		                    echo "Type: " . $_FILES["bookImage"]["type"] . "<br>";
		                    echo "Size: " . ($_FILES["bookImage"]["size"] / 1024) . " kB<br>";
		                    echo "Temp file: " . $_FILES["bookImage"]["tmp_name"] . "<br>";
		                    if (file_exists("../images/upload/" . $_FILES["bookImage"]["name"])) {
		                        $temp = explode(".",$_FILES["bookImage"]["name"]);
		                        $newfilename = rand(1,99999) . '.' .end($temp);
		                        move_uploaded_file($_FILES["bookImage"]["tmp_name"], "../images/upload/" . $newfilename);
		                        $image = $newfilename;
		                        // //clear
								// mysqli_query($con, "DELETE FROM category WHERE cateID='$id'" ) or die ("Error to update pro-cate table.");
								
								//Query here
								
								$query = "UPDATE books SET bookName = {'$name'}, bookDesc = {'$desc'}, bookPrice = {'$price'}, bookImage = {'$Image'}, bookCateID = {'$selected'} WHERE bookID = {'$id'}";
								$result = mysqli_query( $con, $query ) or die ($query);
								
								header('Location: productlist1.php'); 
		                    } else {
		                        move_uploaded_file($_FILES["bookImage"]["tmp_name"], "../images/upload/" . $_FILES["bookImage"]["name"]);
		                        $image = $_FILES["bookImage"]["name"];
		                        // //clear
								// mysqli_query($con, "DELETE FROM category WHERE bookID='$id'" ) or die ("Error to update pro-cate table.");
								
		                        //Query here
		                        $query = "UPDATE books SET bookName = '{$name}', bookDesc = '{$desc}', bookPrice = '{$price}', bookImage = '{$image}', bookCateID='{$selected}' WHERE bookID = '{$id}'";
								$result = mysqli_query( $con, $query ) or die ($query);
				
								header('Location: productlist1.php'); 
		                    }
		                }
		            } else {
		            	//clear
						mysqli_query($con, "DELETE FROM category WHERE bookID = '$id'" ) or die ("Error to update pro-cate table.");
						
		                $query = "UPDATE books SET bookName = '$name', bookDesc = '$desc', bookPrice = '$price', bookCateID= '$selected' WHERE bookID = '$id'";
						$result = mysqli_query( $con, $query ) or die ($query);
						header('Location: productlist1.php'); 
		            }
		        //---------------------------------------------------------------------------------------
			}
		}
		
		if(isset($_GET['product-del'])){
		$id = $_GET['product-del'];
		
		$sql = "DELETE FROM books WHERE bookID = '$id' ";
		mysqli_query($con, $sql);
		
		header('Location:productlist1.php');
	
	}
	}
?>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>