<style>
	#tb-banner{background:#fff; padding: 5px;}
	#tb-banner th{border: 1px solid #ccc;text-align:center;background: rgba(204,204,204,.20);}
	#tb-banner td{border: 1px solid #ccc; text-align:left;}
	#tb-banner tr:not(.tr):hover{
		filter:alpha(opacity=90); -moz-opacity:0.90; -khtml-opacity: 0.90; opacity: 0.90;
	}
	#tb-banner tr:not(.tr){
		cursor:pointer;
	}
</style>
<table cellpadding="3" width="100%" align="center" id="tb-banner" cellspacing="5">
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
	$result = $obj->mysql_query("SELECT * FROM banner LIMIT $_GET[start], $_GET[limit]") or die(mysql_error());
	$amount = $obj->mysql_num_rows($result);
	if($amount == 0){
		echo "<tr><td colspan=\"5\" align=\"center\" style=\"text-align:center;\">ไม่มีข้อมูล</td></tr>";
	}else {
	foreach($obj->mysql_fetch_assoc() as $index  => $data){
?>
	<tr OnMouseOver="fnc_show(<?=$index?>)" OnMouseOut="fnc_hide(<?=$index?>)">
		<td>
		<div id="div-show<?=$index?>" style="position:absolute;right:20px;border-radius: 280px;border:1px solid #000;padding:5px;margin-top: -15px;z-index:100; display:none;" title="คลิกเพื่อลบ" onClick="fnc_del(<?=$data['id']?>,'<?=$data['image']?>')"><i class="icon-remove"></i></div>
		<div title="คลิกเพื่แก้ไข" onClick="fnc_edit2(<?=$data['id']?>)" style="background-image:url('images/banner/<?=$data['image']?>'); width: 100%;height: 100px;background-position:center center;border:none;">
		</div>
		<div style="display:inline-block; width: 80%; background-color: rgba(0,0,0,.50);margin-top:-20px;position:absolute;color:#fff;padding:5px;">
			<?=$data['firstline']?>: <?=$data['secondline']?>
		</div>
		</td>
	</tr>
<?}}?>
</table>
