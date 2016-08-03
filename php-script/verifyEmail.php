<?php
include("config.php");
//connect to database
mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DBNAME);

//get the username
$email = mysql_real_escape_string($_POST['email']);

//mysql query to select field username if it's equal to the username that we check '
$result = mysql_query("SELECT email FROM member WHERE email = '$email' LIMIT 1 ");

//if number of rows fields is bigger them 0 that means it's NOT available '
if(mysql_num_rows($result)>0){
	//and we send 0 to the ajax request
	echo 0;
}else{
	//else if it's not bigger then 0, then it's available '
	//and we send 1 to the ajax request
	echo 1;
}

?>