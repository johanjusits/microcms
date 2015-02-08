<?php
if (isset($_POST['logout'])){
	$_SESSION = array();
	session_destroy();
	$_SESSION['msg'] = "Logged out successully.";
	header("Location: /index.php");
	exit();
} ?>