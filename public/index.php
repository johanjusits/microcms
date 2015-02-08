<?php
require_once('../config.php'); 
//Handles login
if (!empty($_POST['email'])){
	$fieldEmail = $_POST['email'];
	$fieldPassword = $_POST['password'];

	$userCheck = new User();
	$getUser = $userCheck->getUserByEmail($fieldEmail);
	if (!empty($getUser)){
		if($fieldPassword == $getUser['password']){
			$message = "Logged in successfully.";
			$_SESSION['email'] = $getUser['email'];
			$_SESSION['level'] = $getUser['level'];
			$_SESSION['timer'] = time() + (60 * 10);
			echo "<script type='text/javascript'>alert('$message');</script>";
		} else {
			$_SESSION['msg'] = "Wrong password.";
		}
	} else {
		$_SESSION['msg'] = "Email wasn't recognized.";
	}
}

?>
<html>
<head>
<link href="style.css" rel="stylesheet" />
</head>
<body>
	<?php require_once('../imports/checkuser.php');
	if (!isset($_SESSION['email'])){
		?> <br><br> <?php
	}
	require_once('../imports/menudata.php'); ?>
	<br>
	<?php if(isset($_SESSION['email'])){
		
	} else { ?>
		<form method="POST" action="">
		<br><br>
		Email:
		<br>
		<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
		<br>
		Password:
		<br>
		<input type="password" name="password" required>
		<input type="submit" value="Log In">
	</form> <?php
	if (isset($_SESSION['msg'])){
			echo "<p style='color:red;'>" . $_SESSION['msg'] . "</p>";
			unset($_SESSION['msg']);
		} 
	if (!isset($_SESSION['email'])){
		echo "Please log in to be able to access the full menu." . "<br>" . "If you're not logged in, your access is limited."
		. "<br>" . "Visitors can log in using test@test.com + test";
		}
	} ?>
	<br>
	<?php require_once('../imports/pagebody.php'); 
	require_once('../imports/savemsg.php'); ?>
</body>
</html>