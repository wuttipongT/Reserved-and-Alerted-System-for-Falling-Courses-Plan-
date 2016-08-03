<?php
	//session_unset();
	//session_unregister('sessType');

	ob_start();
	session_start();
	$cookie_name = 'siteAuth';
	$cookie_time = (3600 * 24 * 30); 
	//include("config.inc/config.inc.php");
	if(isset($_COOKIE[$cookie_name])){
	// remove 'site_auth' cookie
		setcookie ($cookie_name, '', time() - $cookie_time);
	}
	session_destroy();
	header("Location: index.php");
	//echo "<meta http-equiv=refresh content=0;URL=index.php >";
	ob_end_flush();
	exit;
 ?>