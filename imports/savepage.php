<?php
//Handles admin save
if (!empty($_POST['title']) || !empty($_POST['body'])){
	$_SESSION['save_msg'] = "Page has been saved.";
	$newTitle = $_POST['title'];
	$newBody = $_POST['body'];
	$newAccess = $_POST['access'];
	if ($curPage !== "index"){
		$page->updatePage($curPage, $newTitle, $newBody, $pageId, $newAccess);
	} else {
		$page->updatePage($curPage, $newTitle, $newBody, $pageId);
	} 
	header("Location: /$curPage.php");
	exit();
} ?>