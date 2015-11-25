<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Panel</title>
		<meta charset='utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href='css/style.css' type='text/css' rel='stylesheet' />	
		<link href='css/bootstrap.css' type='text/css' rel='stylesheet' />
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet' />	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/bootstrapValidator.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
	</head>
	<body>
		<div class='wrapper'>
			<div id='header'>
				<div id='logo'>
					<a href="index.php"><img src='images/logo.gif' alt='admin panel'/></a>
				</div><!--END #logo-->
				<div id='top'>Welcome <?php echo @$_SESSION['username']; ?>, <a href='../index.php'>Visit site</a>  <a id='message' href='#'>Messages</a> <a id='logout' href='login.php'>Logout</a></div>
				<div id='main-nav'>
					<ul>
						<li><a href='index.php'>Home</a></li>
<<<<<<< HEAD
						<li><a href='product-list.php'>Products</a></li>
=======
						<li><a href='product-list.php'</a>Products</li>
						<li><a href=''>Indents</a></li>
>>>>>>> 5f67f5fecfd93a27a64a3d283f8f7c9b6ac3e73d
						<li><a href='member.php'>Members</a></li>
						<li><a href='order.php'>Orders</a></li>
						<li><a href='feedback.php'>Feedback</a></li>
					</ul>
				</div><!-- END #main-nav -->
			</div><!-- END #header -->