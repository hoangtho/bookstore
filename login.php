<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
	
?>

<div id="content">
	<div class='wrapper'>
		<?php // include ('templates/sidebar.php') ?>
		<div id='main-content'>
			<div id="login">
				<h3>Customer Login</h3>
					<form action='do-login.php' method='post'>
						<label>Username</label><br/> <input type='text' name='username' required><br/>
						<label>Password</label><br/> <input type='password' name='password' required><br/>
						<button type='submit' name='submit'>Login</button><br/>
						<a href='#'>Forgotten your password?</a> 
						<a href='signup.php'>Sign up </a>
					</form>
			</div><!--END #login-->
		</div><!--END #main-content-->	
	</div><!-- END .wrapper -->
</div><!--END #content-->
	
<?php include ('templates/footer.php') ?>