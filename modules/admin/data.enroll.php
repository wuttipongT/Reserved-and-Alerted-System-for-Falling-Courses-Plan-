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
<tr class="tr">
	<th>ลำดับที่</th>
	<th>รหัสนิสิต</th>
	<th>รหัสวิชา</th>
	<th>ชื่อวิชา</th>
	<th>เกรด</th>
	<th>หน่วยกิต</th>
	<th>เทอม</th>
</tr>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
	$key = $_GET['key'];
	$result = $obj->mysql_query("SELECT * FROM enroll WHERE acadyear='$key' LIMIT $_GET[start], $_GET[limit]");
	$amount = $obj->mysql_num_rows($result);
	if($amount == 0){
		echo "<tr><td colspan=\"7\" align=\"center\">ไม่มีข้อมูล</td></tr>";
	}else {
	$arr = array();
	$c = 1;
	foreach($obj->mysql_fetch_assoc() as $index =>$data){
?>
	<tr>
		<td><?=($index+1)+$_GET['start']?></td>
		<td><?=$data['studentCode']?></td>
		<td><?=$data['subID']?></td>
		<td><?=$data['subName']?></td>
		<td><?=$data['grade']?></td>
		<td><?=$data['creditAtempt']?></td>
		<td><?=$data['semester']?></td>
	</tr>	
<?}?>
<?}?>

</table>