<meta charset="UTF-8">
<?
	//error_reporting("E_All");
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
	if($_SESSION["student"]){//member
		$sql = "SELECT photo FROM member ";
		$sql .="WHERE studentCode = '".$_SESSION["student"]."' LIMIT 1";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		foreach ($obj->mysql_fetch_assoc() as $value){
?>
		<div class="div-profile">
			<a class="stick" href="?mod=profile" align="middle"><i class="icon-user icon-white" style="margin-left: 10px; display: inline-block;vertical-align: middle;"></i>&nbsp;<?=getName($_SESSION['student'])?></a>
			<div class="ragtangle-stick"></div>
        <?	if($value['photo']==NULL){?>
					<img class="img-profile" src="images/Client.png" />
		<?	}else{?>
					<img class="img-profile" src="<?=$value['photo']?>" />
		<?	}?>  
        </div>
<?
		}
	}else if($_SESSION["staff"]){//admin
		$sql = "SELECT name , photo FROM staff WHERE username = '".$_SESSION["staff"]."' ";
		$obj->mysql_query($sql);
		foreach ($obj->mysql_fetch_assoc() as $value){
?>
		<div class="div-profile">
			<a class="stick" href="?mod=profile" align="middle"><i class="icon-user icon-white" style="margin-left: 10px; display: inline-block;vertical-align: middle;"></i>&nbsp;<?=$value['name']?></a>
			<div class="ragtangle-stick"></div>
        <?	if($value['photo']==NULL){?>
					<img class="img-profile" style="border:1px solid #ccc" src="images/Administrator.png" />
		<?	}else{?>
					<img id="img-left-pro" class="img-profile" style="border:1px solid #ccc" src="<?=$value['photo']?>" />
		<?	}?>  
        </div>
<?
		}
	}
?>
<style style="text/css">
	.div-profile{width:160px;height:185px;position:relative;margin:auto;}
	.div-profile .img-profile{position:inherit;width:160px;height:150px;top:15px;}
	.div-profile .stick{
		color : #000;
		display:block;position:absolute;z-index:201;padding:3px; 0 3px 0;
		
		text-decoration:none; left:-14px;
		top: 6px;
		width:202px;height:auto;
		background-image: linear-gradient(bottom, rgb(102,194,255) 96%, rgb(102,204,255) 0%);
background-image: -o-linear-gradient(bottom, rgb(102,194,255) 96%, rgb(102,204,255) 0%);
background-image: -moz-linear-gradient(bottom, rgb(102,194,255) 96%, rgb(102,204,255) 0%);
background-image: -webkit-linear-gradient(bottom, rgb(102,194,255) 96%, rgb(102,204,255) 0%);
background-image: -ms-linear-gradient(bottom, rgb(102,194,255) 96%, rgb(102,204,255) 0%);
	}
	.stick:hover{
		background-color:#f3f3f3;
	}
	 .div-profile .ragtangle-stick{
		border-color:transparent transparent transparent #ccc;
		border-width:15px;
		border-style:solid;
		position:relative;
		z-index:200;
		top:24px;left:179px;
	 }
</style>
<?
	function getName($std_code){
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
		require_once 'config.inc/database.php';
		$db = new database($host, $username, $password, $dbname);
		$rs = $db->mysql_query("SELECT name, sername FROM student WHERE studentCode='$std_code' LIMIT 1");
		if($rs){
			$data = $db->mysql_fetch_assoc();
			if($data){
				foreach($data as $val){
					return $val['name']." ".$val['sername'];
				}
			}else{
				return $std_code;
			}
		}else{
			return mysql_error();
		}
	}
?>