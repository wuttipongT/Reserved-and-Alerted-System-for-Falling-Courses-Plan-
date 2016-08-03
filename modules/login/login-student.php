<?php
	session_start();
    include("../../config.inc/config.inc.php");
	include("../../config.inc/database.php");
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$autoLogin = trim($_POST['autologin']);
	$objDB = new database(HOST,USER,PASSWORD,DBNAME);
	$objDB->strField = "stdID,password";
	$objDB->strTable = "member";
	$objDB->strCondition = "stdID='$username' AND password='".base64_encode($password)."' LIMIT 1";
	$objSelect = $objDB->selectRecode();
	
	if($objSelect){
		echo 'Y';
		$_SESSION['student'] = $username;
		session_write_close();
	}else {
		echo "Username and Password is Wrong!";
	}
?>