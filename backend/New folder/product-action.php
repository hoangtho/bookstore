<?php
   include('../core/connect.php');
   
   //ADD NEW PRODUCT
   
  	if(isset($_POST['add'])){
		if(isset($_POST['pro-name']) && $_POST['pro-name'] != ''){
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			$name = $_POST['pro-name'];
			
		
			$sql = "INSERT INTO category(bookName,bookDesc,bookPrice,date) VALUES ('$name') ";
			mysqli_query($con, $sql);
			
			header('Location:category-list.php');
		}else{
			echo "All fields are required!"; // CHANGE TO JQUERY
		}
	}
?>
<?php
		include ('templates/footer.php');
	}else{
		header('Location: login.php');
	}	
?>