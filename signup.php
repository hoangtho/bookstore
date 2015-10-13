<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
	
?>

<div id="content">
	<div class='wrapper'>
		<?php // include ('templates/sidebar.php') ?>
		<div id='main-content'>
			<div id="signup">
				<h3>Customer Registration Form</h3>
					<form action='do-signup.php' method='post'>
						<label>Fullname</label><br/><input type="text" name='fullname'><br>
						<label>Username</label><br/> <input type='text' name='username'><br/>
						<label>Password</label><br/> <input type='password' name='password'><br/>
						<label>Confirm Password</label><br/> <input type='password' name='re-password'><br/>
						<label>Email</label><br/> <input type='email' name='email'><br/>
						<label>Address</label><br/> <input type='text' name='address'><br/>						
						<button type='submit' name='submit'>Sign Up</button><br/>
					</form>
			</div><!--END #signup-->
		</div><!--END #main-content-->
	</div><!-- END .wrapper -->
</div><!--END #content-->
	
<?php include ('templates/footer.php') ?>