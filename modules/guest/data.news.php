<?php
	//error_reporting(E_ALL);
	//echo "ระบบข่าว";

	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	
	$objDB = new database($host, $username, $password,$dbname);
	$Page_Start = $_GET['start'];
	$Per_Page = $_GET['limit'];
	$sql = "SELECT newsID, pic, title FROM news ORDER BY newsID DESC LIMIT $Page_Start , $Per_Page";
	$rs = $objDB->mysql_query($sql);
	if($rs){
	foreach($objDB->mysql_fetch_assoc() as $index => $data_news){
	 ?>
		<a href="?mod=news&id=<?=$data_news['newsID']?>" class="hv a-new-all">
			<div style="float:left;">
				<img src="modules/admin/news/img_resize/<?=$data_news['pic']?>" style="width: 150px; display: block;"/>
			</div>
			 <div style="float:left;width:75%;height:auto;word-break:break-word;text-indent:10px;"><?=$data_news['title']?></div>
		 </a>
	 <?}
	 }?> 
<br/>
<style>
	.a-new-all{
		text-decoration:none;
		color: #000;
		margin:5px;
		display:block; border-bottom:1px dotted #ccc;width: 630px;height: 120px; padding: 5px;
	}
	.hv:hover{
		background-color: rgba(0,0,0,.1);
	}
</style>