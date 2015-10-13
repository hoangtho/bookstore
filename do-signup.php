<?php 
	include("core/connect.php");
	
	if(isset($_POST['submit'])){
		$fullname = $_POST['fullname'];
		$name = $_POST['username'];
		$password = sha1($_POST['password']);
		$password1 = sha1($_POST['re-password']);
		$email = $_POST['email'];
		$address = $_POST['address'];
		$query = "SELECT * FROM user WHERE username='$name' ";
		
		$result  = mysqli_query($con, $query);
		
		if ( mysqli_num_rows($result) != 0 ) {
			echo "Username has been used";
		}else if($password != $password1) {
					echo "Your password does not match.";	
				}else{
					$sql ="INSERT INTO user(fullname, username, password, level, email, address)
					VALUES ('$fullname', '$name','$password', 0, '$email', '$address') ";
					$r2 = mysqli_query($con, $sql);
								if(!$r2){
						die(mysqli_error($con));
					}else{
						echo "done";
					}	
				}
		header('location: login.php');
	}
	
?> 
