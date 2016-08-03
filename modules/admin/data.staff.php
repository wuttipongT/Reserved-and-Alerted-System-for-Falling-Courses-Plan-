<style>
	#tb-student{border-collapse:collapse;background:#fff; table-layout:fixed;}
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
<table cellpadding="3" width="100%" align="center" id="tb-student">
<tr class="tr"><th>ชื่อ-สกุล</th><th width="30%">ตำแหน่ง</th><th width="18%">สถานะ</th><th width="10%">แก้ไข</td></tr>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
	$result = $obj->mysql_query("SELECT staffID, name, position, status FROM staff WHERE type=0 LIMIT $_GET[start], $_GET[limit]");
	$amount = $obj->mysql_num_rows($result);
	if($amount == 0){
		echo "<tr><td colspan=\"4\" align=\"center\" style=\"text-align:center;\">ไม่มีข้อมูล</td></tr>";
	}else {
	foreach($obj->mysql_fetch_assoc() as $index  => $data){	
		
?>
	<tr>
		<td><?=$data['name']?></td>
		<td><?=$data['position']?></td>
		<td><?=get_status($data['status'])?></td>
		<td align="center">
			<a href="Javascript:void(0)" style="display:block;width: 100%;" onclick="JavaScript:fnc_edit(<?=$data['staffID']?>)">
				<i class="icon-edit" style="display:block; margin:auto;"></i>
			</a>
		</td>
	</tr>	
<?}}?>
</table>
<?
	function get_status($id){
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
		require_once '../../config.inc/database.php';

		$obj = new database($host, $username, $password,$dbname);
		$obj->mysql_query("SELECT des FROM status WHERE id='".$id."' LIMIT 1");
		$str = "";
		foreach($obj->mysql_fetch_assoc() as $status){
			$str = $status['des'];
		}
		return $str;
	}
?>
