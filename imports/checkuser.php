<?php if(isset($_SESSION['email'])){
		echo "Logged in as: " . $_SESSION['email']; ?>
		<form method="POST" action="">
		<br>
		<input type="submit" value="Log Out" name="logout">
		</form> <?php
	} else {
		echo "Not logged in.";
	} 