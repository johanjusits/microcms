<?php 
require_once('../../config.php');
require_once('../../imports/checkaccess.php');
?>
<html>
<head>
<link href="../style.css" rel="stylesheet" />
</head>
<body>
	<?php require_once('../../imports/checkuser.php');
	if (isset($_SESSION['email'])){

	} else {
		?> <br><br> <?php 
	}
	require_once('../../imports/menudata.php'); ?>
	<br><br>
	<?php require_once('../../imports/subpagebody.php');
	require_once('../../imports/savemsg.php'); ?>
</body>
</html>