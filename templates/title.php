<?php
	$title = basename($_SERVER['SCRIPT_NAME'], '.php');
	if($title == 'index'){
		$title = 'Book Online Store - Home';
	}
	$title = ucfirst($title);
	
?>