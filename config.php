<?php
/**
 * CONFIG-FILE!
 * Fill with your personal variables
 * RENAME TO config.php
 */
error_reporting(-1);
ini_set('display_errors', 'On');
//-------------------------------------------------
//define Database variables
//CHANGE THIS TO YOUR VARIABLES
define("DB_HOST", "localhost");
define("DB_DATABASE", "microcms");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "password");
//-------------------------------------------------
//----------------DON'T TOUCH, KK THX BBQ-----------------------------
//startSession
$lifetime=7200;
session_set_cookie_params($lifetime);
session_start();
ob_start();
//Define paths
if(isset($_GET['url'])){
	$url = $_GET['url'];
}else{
	$url = '';
}
/**
 * ROOT_PATH 	= the root (c:/..../...)
 * CURRENT_PATH = /projects/id
 * PATH / $path = homeDir
 */
define('ROOT_PATH',__DIR__);
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$currentUrlNoQuery = explode('?', $_SERVER['REQUEST_URI'])[0];
define("CURRENT_PATH", $currentUrlNoQuery);
$path = str_replace($url, '', CURRENT_PATH);
define("PATH", $path);
$trim = ltrim ($path, '/');
$curPage = substr($trim, 0, -4);

require_once(ROOT_PATH .'/models/01database.php');
require_once(ROOT_PATH . '/models/page.php');
require_once(ROOT_PATH . '/models/subpage.php');
require_once(ROOT_PATH . '/models/sub_subpage.php');
require_once(ROOT_PATH . '/models/user.php');

$page = new Page();
$subpage = new Subpage();
$sub_subpage = new Subsubpage();

$pageInfo = $page->getCurrentPage($curPage);
$allPages = $page->getAll();

$allSubPages = $subpage->getAll();
$subPageInfo = $subpage->getCurrentPage($curPage);

$allSub_subPages = $sub_subpage->getAll();
$sub_subPageInfo = $sub_subpage->getCurrentPage($curPage);

$pageId = $pageInfo['id'];
$subPageId = $subPageInfo['id'];
$sub_subPageId = $sub_subPageInfo['id'];

require_once(ROOT_PATH . '/imports/savepage.php');
require_once(ROOT_PATH . '/imports/savesubpage.php');
require_once(ROOT_PATH . '/imports/savesub_subpage.php');
require_once(ROOT_PATH . '/imports/logout.php');
?>