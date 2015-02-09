<?php
//Handles admin save
if (!empty($_POST['sub_sub_title']) || !empty($_POST['sub_sub_body'])){
	$_SESSION['save_msg'] = "Page has been saved.";
	$newTitle = $_POST['sub_sub_title'];
	$newBody = $_POST['sub_sub_body'];
	$newAccess = $_POST['access'];
	$table = "sub_subpages";

	$sub_subpage->updatePage($table, $curPage, $newTitle, $newBody, $sub_subPageId, $newAccess);

	header("Location: /$curPage.php");
	exit();
} ?>