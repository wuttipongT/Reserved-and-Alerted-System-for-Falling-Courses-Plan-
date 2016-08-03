<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../../config.inc/config.txt"));
	require_once '../../../config.inc/database.php';
	$obj = new database($host, $username, $password, $dbname);
?>
<table style="border-collapse:collapse;width:500px;text-align:center;margin-left: 50px;">
    <tr class="never"><th class="th">รหัส</th><th class="th">หัวข้อข่าวสาร</th><th class="th">เพิ่มเมื่อวันที่</th><th class="th">แก้ไข</th><th class="th">ลบ</th></tr>
    <?
	$sql = "SELECT * FROM news LIMIT $_GET[start], $_GET[limit]";
	$obj->mysql_query($sql) or die(mysql_error());
	if($obj->mysql_num_rows() > 0){
	foreach($obj->mysql_fetch_assoc() as $index => $value){?>
    <tr>
        <td class="td"><?=($index+1)+$_GET[start]?></td>
        <td class="td" align="left"><?if(strlen($value['title'])>90){?><?=substr($value['title'],0,90)."...";}else{?><?=$value['title'];}?></td>
        <td class="td"><?=$value['n_date'];?></td>
        <td class="td"><a href="JavaScript:void(0)" onclick="fnc_edit(<?=$value['newsID']?>)"><i class="icon-edit"></i></a></td>
        <td class="td"><a href="JavaScript:void(0)" onclick="fnc_del(<?=$value['newsID']?>)"><i class="icon-trash"></i></a></td>   
    </tr>
    <?}}else{
		echo '<tr><td colspan="6" style="text-align:center;">ไม่มีข้อมูล</td></tr>';
	}?>
</table>