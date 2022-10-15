<?php
// start session
session_start();

//Create Constants to Store Non Repeating Values
define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect('localhost','root', ''); // or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'food-order'); // or die(mysqli_error()); //selecting database

//language
if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "en";
	    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		    if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "bg")
			$_SESSION['lang'] = "bg";
	}

	require_once $_SESSION['lang'].".php";
?>