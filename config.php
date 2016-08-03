<?php
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
session_start();
//Facebook App Id and Secret
$appID='491584437587560';
$appSecret='45ef30d5d6eabc7dba5bd2804a327c51';

//URL to your website root
if($_SERVER['HTTP_HOST']=='localhost'){
$base_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}else{
$base_url='http://'.$_SERVER['HTTP_HOST'];	
}
?>