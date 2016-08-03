<style>
	#tb-student{border-collapse:collapse;background:#fff;}
	#tb-student th{border: 1px solid #ccc;text-align:center;background: rgba(204,204,204,.20);}
	#tb-student td{border: 1px solid #ccc; text-align:left;}
	#tb-student tr:not(.tr):hover{
		background: rgba(204,204,204,.10);
	}
	#tb_show_detail{
		border-collapse: collapse;
		width: 400px;
	}
	#tb_show_detail th, #tb_show_detail td{
		border: 1px solid #ccc;
	}
</style>
<table cellpadding="5" width="100%" align="center" id="tb-student">
<tr class="tr"><th>รหัสวิชา</th><th>เงื่อนไขรายววิชา</th><th>แก้ไข</td></tr>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
	$result = $obj->mysql_query("SELECT * FROM prerequisite WHERE courses='$_GET[str]' LIMIT $_GET[start], $_GET[limit]");
	$amount = $obj->mysql_num_rows($result);
	if($amount == 0){
		echo "<tr><td colspan=\"5\" align=\"center\">ไม่มีข้อมูล</td></tr>";
	}else {
	foreach($obj->mysql_fetch_assoc() as $data){
?>
	<tr>
		<td><?=$data['subID']?></td>
		<td><?=$data['subPre']?></td>
		<td align="center">
			<a href="Javascript:void(0)" width="100%" onclick="JavaScript:edit(<?=$data['preID']?>, 4)">
				<i class="icon-edit" style="display:block;margin:auto;"></i>
			</a>
		</td>
	</tr>	
<?}?>
<?}?>

</table>
