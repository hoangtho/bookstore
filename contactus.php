<?php include('templates/header.php');
// echo $_SESSION['mem_row'];
?>

<div id="content">
	<div class='wrapper'>
		<?php // include ('templates/sidebar.php') ?>
		<div id='main-content'>
			<div id="contactus">
				<h3>Feedback</h3>
					<form action='do-contact.php' method='post'>
						<label>Your Email</label><br/> <input type='email'><br/>
						<label>Message</label><br/>
						<textarea cols='50' rows='5'></textarea><br/>
						<button type='submit'>Submit</button><br/>
					</form>
			</div><!--END #contactus-->
		</div><!--END #main-content-->
	</div><!-- END .wrapper -->
</div><!--END #content-->
	
<?php include ('templates/footer.php') ?>