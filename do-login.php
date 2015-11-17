<?php
	include("core/connect.php");
	session_start();
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		
		$query="SELECT * FROM user WHERE username='$username' AND password='$password' ";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==0){
			echo "Username or Password Wrong!";
		}else{
			//echo"Logined";
			
			$_SESSION['login']="true";
			$row=mysqli_fetch_array($result);

			$_SESSION['userID'] = $row['userID'];
			$_SESSION['username']=$row['username'];
			$_SESSION["level"]=$row["level"];
			
			header("location:index.php");
		}
	}
	
	
?>