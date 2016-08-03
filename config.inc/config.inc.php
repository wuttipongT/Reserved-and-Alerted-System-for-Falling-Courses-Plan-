<?php
//<--PHP Language-->
	//error_reporting(E_ALL ^ E_NOTICE);
	
	//error_reporting(E_ALL ^ E_NOTICE);
	
	/*define("USER","testweb");
	define("PASSWORD","123456");
	define("DBNAME","testweb10");*/
	
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../config.inc/config.txt"));
	define("HOST", $host);
	define("USER", $username);
	define("PASSWORD", $password);
	define("DBNAME", $dbname);
		

	// ---------- Cookie Info ---------- //
	
	$cookie_name = 'siteAuth';
	$cookie_time = (3600 * 24 * 30); // 30 days
	
	// ---------- Invoke Auto-Login if no session is registered ---------- //
	
	$month_th = array("01"=>"ม.ค.", "02"=>"ก.พ", "03"=>"มี.ค.", "04"=>"เม.ย", "05"=>"พ.ค.", "06"=>"มิ.ย.", "07"=>"ก.ค.", "08"=>"ส.ค.", "09"=>"ก.ย.", "10"=>"ต.ค.", "11"=>"พ.ย", "12"=>"ธ.ค.");
	
?>
