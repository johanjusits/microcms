<?php
if($pageInfo['locked'] === "Yes" && $_SESSION['level'] == 0){
	if (!(isset($_SESSION['email']) && $_SESSION['timer'] > time()))
	{
		header("Location: /index.php");
		exit();	
	} 
} ?>