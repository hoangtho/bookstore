<?php include('templates/header.php');
include('core/connect.php');
// echo $_SESSION['mem_row'];
?>

<div id="content">
	<div class='wrapper'>
		<?php // include ('templates/sidebar.php') ?>
		<div id='main-content'>
			<div id="contactus">
				<h3>Feedback</h3>
					<form action='' method='post'>
						<label>Your Email</label><br/> <input type='email' name='email' required><br/>
						<label>Message</label><br/>
						<textarea cols='50' rows='5' required name='message'></textarea><br/>
						<button type='submit' name="submit">Submit</button><br/>
					</form>
			</div><!--END #contactus-->
		</div><!--END #main-content-->
	</div><!-- END .wrapper -->
</div><!--END #content-->
	
<?php include ('templates/footer.php');

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO feedback (email, content)
					VALUES ('$email', '$message')";
		mysqli_query($con, $sql);
		
		header('Location:index.php');
	}

?>