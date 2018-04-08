<?php
require('../model/database.php');
require('../model/admin_db.php');

session_start();

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_menu';
}

if (!isset($_SESSION['is_valid_admin'])) {
	$action = 'login_admin';
}
switch($action) {
	case 'login_admin':
		if (isset($_POST['username']) AND isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		if (is_valid_admin_login($username, $password)) {
			$_SESSION['is_valid_admin'] = true;
			$_SESSION['admin_username'] = $username;
			include('menu.php');
		} else {
			include('login_page.php');
		}
		break;
	case 'show_menu':
		include('menu.php');
		break;
	case 'logout_admin':
		unset($_SESSION['is_valid_admin']);
		unset($_SESSION['admin_username']);
		header("Location: ../index.php");
		break;
} 
?>