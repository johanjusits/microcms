<?php
//Handles admin save
if (!empty($_POST['sub_title']) || !empty($_POST['sub_body'])){
	$_SESSION['save_msg'] = "Page has been saved.";
	$newTitle = $_POST['sub_title'];
	$newBody = $_POST['sub_body'];
	$newAccess = $_POST['access'];
	$table = "subpages";

	$subpage->updatePage($table, $curPage, $newTitle, $newBody, $subPageId, $newAccess);

	header("Location: /$curPage.php");
	exit();
} ?>