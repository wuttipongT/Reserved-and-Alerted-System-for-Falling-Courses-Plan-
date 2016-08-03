<?
	session_start();
	include("../../config.inc/config.inc.php");
	include("../../config.inc/database.php");
	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	$objDB = new database(HOST,USER,PASSWORD,DBNAME);
	$objDB->strField = "staffID,password";
	$objDB->strTable = "staff";
	$objDB->strCondition = "staffID='$username' AND password='".base64_encode($password)."' LIMIT 1";
	if($objDB->selectRecode()){
		echo "Y";
		$strSQL = "SELECT type FROM staff WHERE staffID='$username' LIMIT 1";
		$objDB->mysql_query($strSQL);
		$type = mysql_fetch_assoc($objDB->result);
		if($type['type']==0){
			$_SESSION['admin'] = $username;
			session_write_close();
			
		}else {
			$_SESSION['teacher'] = $username;
			session_write_close();
		}
	}else {
		echo "Username and Password is Wrong!";
	}
	
	
?>