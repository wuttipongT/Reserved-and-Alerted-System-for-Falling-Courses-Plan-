<?php
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	include ("config.inc/database.php");
	$objDB = new database($hos,$username,$password,$dbname);
	$cookie_name = 'siteAuth';
	$cookie_time = (3600 * 24 * 30); 
    if(isset($cookie_name)){
    	if(isset($_COOKIE[$cookie_name])){
    		parse_str($_COOKIE[$cookie_name]);
			if($type_log==0){//student
				//Make a verification
				$sql = "SELECT * FROM member WHERE studentCode='$usr' AND password='$hash' LIMIT 1";
				$objRS = $objDB->mysql_query($sql);
				if($objDB->mysql_num_rows() > 0){
					$_SESSION['student'] = $usr;
					session_write_close();
					header("Location: ?page=member_profile");
				}
			}else if($type_log==1){//staff
				$sql = "SELECT * FROM staff WHERE username='$usr' AND password='$hash' LIMIT 1";
				$objRS = $objDB->mysql_query($sql);
				if($objDB->mysql_num_rows() > 0){
					$_SESSION['staff'] = $usr;
					session_write_close();
					header("Location: ?page=member_profile");
				}
			}
    	}
    }
?>