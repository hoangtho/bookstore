<?php 
	session_start();
	include("core/connect.php");
	
		if($_SESSION['login']){
					$query = "SELECT * FROM user WHERE userID = ".$_SESSION['userID'];
					$r = mysqli_query($con, $query);
					$row = mysqli_fetch_array($r);
					$fullname = $row['fullname'];
					$query1 =  "INSERT INTO `order` (`fullname`) VALUES ('$fullname') ";
					$result = mysqli_query($con, $query1);

					if($result){
						for($i = 0; $i < count($_SESSION['giohang']); $i++){
							$sql1 =  "SELECT max(orderID) FROM order";
							
							echo "SELECT max(orderID) FROM order";
							
							$max = mysqli_query($con, $sql1);
							$row = mysqli_fetch_array($max);
							$orderID = $row[0];
														
							$bookID = $_SESSION['giohang'][$i]['id'];
							$quantity = $_SESSION['giohang'][$i]['soluong'];
							$product = mysqli_query($con, "SELECT `bookPrice` FROM `books` WHERE `bookID` = ".$bookID);
							
							$row = mysqli_fetch_array($product);
							$price = $row['bookPrice'];
							
							$sql =  "INSERT INTO `order_detail` (`orderID`, `bookID`, `quantity`, `price`) VALUES ('{$orderID}', '{$bookID}', '{$quantity}', '{$price}') ";
							
														
							$result = mysqli_query($con, $sql);
						}	
					}
					// unset($_SESSION['giohang']);
					// header("Location: index.php");
		}

	
?>