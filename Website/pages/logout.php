<?php
	session_start();
	$_SESSION['current_user'] = NULL;
	unset($_SESSION['current_user']);
	header("Location: http://sunshine.engr.sjsu.edu/");
	exit;
?>
