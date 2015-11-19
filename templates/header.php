<?php include ('templates/title.php'); ?>
<?php include('core/connect.php')?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "$title"; ?></title>
		<meta charset='utf-8'></meta>
		<link href='css/style.css' rel="stylesheet" type="text/css"/>
		<script src='js/jquery-1.11.1.js' type="text/javascript"</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/slider.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
		<script>
			$(document).ready(function(){
				$('a.number').click(function(){
				var an=$('a.set').attr('title');
				$('div#'+an).hide();
				$('a.set').removeClass('set');
				$(this).addClass('set');
				var hien=$(this).attr('title');
				$('div#'+hien).show();
				
				})
			});
		</script>
	</head>
	<body>
		<?php session_start();
		$login=false;
		if(isset($_SESSION["login"])){
			$login=true;
		}
		?>
		<div id='header'>
			<div id='top-menu'>
				<div class="wrapper">
					<ul>
						
						<?php if($login) {?>
						<li>Hi, <a href=""><?php echo $_SESSION["username"]?></a></li>
						<li><a href="logout.php">Log out</a></li>
						<?php if($_SESSION["level"]=='1') {?>
						<li><a href="backend/index.php">Admin Panel</a></li>
						
						<?php }} else {?>
							<li><a href='login.php'>Sign in</a></li>
						<?php } ?>
						
						
						<li><a href=''>Orders</a></li>
						<li><a href=''>Help</a></li>
					</ul>
				</div><!-- END .wrapper -->
			</div><!-- END #top-menu-->
			<div id='main-header'>
				<div class="wrapper">
					<h1><a href='index.php'></a>Book Online Store</h1>
					<form id="search" action="index.php" method="GET">			
						<input type="text" name="keyword" />
						<input type="submit" value="Search" />
					</form>
					<div id='cart'>
						<h4>Your Cart</h4><p><a href='detail.php'><?php if(isset($_SESSION['giohang'])){
																										if($_SESSION['giohang']){
																											echo count($_SESSION['giohang']);
																										} 
																									}else{
																											echo "0";
																											}?> items</a>
																							</p>
																							
					</div><!-- end #cart -->
				</div><!-- END .wrapper -->
			</div><!-- END #main-header -->
			<div id='main-nav'>
				<div class="wrapper">
					<ul>
						<li><a href='index.php' class='active'>Home</a></li>
						<li><a href=''>Category</a></li>
						<li><a href='aboutus.php'>About Us</a></li>
						<li><a href='contactus.php'>Feedback</a></li>
					</ul>
				</div><!-- END .wrapper -->
			</div><!-- END #main-nav -->
		</div><!-- END #header -->
		
		<div class="flex-container">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<a href="#"><img src="images/slide1.jpg" /></a>
					</li>		
					<li>
						<img src="images/slide2.jpg" />
					</li>		
					<li>
						<img src="images/slide3.jpg" />
					</li>
				</ul>
			</div>
		</div>

<script>
$(document).ready(function () {
	$('.flexslider').flexslider({
		animation: 'fade',
		controlsContainer: '.flexslider'
	});
});
</script>