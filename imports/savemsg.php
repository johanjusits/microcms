<?php
if (isset($_SESSION['save_msg'])){ 
	echo "<br>" . "<p style='color:green;'>" . $_SESSION['save_msg'] . "</p>";
	unset($_SESSION['save_msg']);
} ?>