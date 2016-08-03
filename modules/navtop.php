<meta charset="UTF8">
<?php 
error_reporting("E_ALL");
	$val_log	= $_SESSION['login'];
	$val_type	= $_SESSION['type'];
$db = new database(HOST,USER,PASSWORD,DBNAME);
	if($val_type=='0'){//member
		$sql = "SELECT photo FROM member WHERE email='$val_log' ";
		$db->mysql_query($sql);
		$value = $db->getData("photo");
?>
		<a href="?page=staff_profile" class="intro">
<?	if($value==''){?>
			<img class="img-dis-top" src="image/Client.png"/>
<? }	else {?>
			<img class="img-dis-top" src="<?=$value?>"/>
<?}?>
			<div class="triangle-l-top"></div>
			<p><?=$val_log?></p>
		</a>
		<a class="logout" href="?page=logout">ออกจากระบบ</a>
<?
	}else if($val_type=='1'){//staff
	$sql = "SELECT photo FROM staff WHERE email = '$val_log' ";
		$db->mysql_query($sql);
		$value = $db->getData("photo");	
?>
		<a href="?page=staff_profile" class="intro">
<?	if($value==''){?>
			<img class="img-dis-top" src="image/Administrator.png"/>
<? }	else {?>
			<img class="img-dis-top" src="<?=$value?>"/>
<?}?>
			<div class="triangle-l-top"></div>
			<p><?=$val_log?></p>
		</a>
		<a class="logout" href="?page=logout">ออกจากระบบ</a>

<?
	}
?>