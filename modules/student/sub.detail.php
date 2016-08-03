
<table id="tb-detail" cellspacing="5" cellpadding="5" style="table-layout:fixed;word-wrap:break-word;">
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$category[1] = "หมวดศึกษาวิชาทั่วไป";
	$category[2] = "หมวดวิชาเฉพาะด้าน";
	$category[3] = "หมวดวิชาเลือกเสรี";
	$category[4] = "หมวดฝึกงาน";
	$group[1] = "กลุ่มวิชาแกนคณะ";
	$group[2] = "กลุ่มวิชาพื้นฐานเอก";
	$group[3] = "กลุ่มวิชาเอกบังคับ";
	$group[4] = "กลุ่มวิชาเอกเลือก";
	$database = new database($host, $username, $password,$dbname);
	$sql = "SELECT * FROM subject WHERE subCode = '".$_GET['subid']."' LIMIT 1";
	$rs = $database->mysql_query($sql) or die(mysql_query());
	while($data = mysql_fetch_assoc($rs)){
		$prerequisite = getPre($database,$data['subCode']);
		$html = "<tr><td width=\"60px\">".$data['subCode']."</td><td>".$data['subName']."</td><td>".$data['credit']."</td><tr>";
		$html .= "<tr><td></td><td colspan=\"2\">".$data['subNameeng']."</td><tr>";
		$html .= "<tr><td></td><td colspan=\"2\">เงื่อนไขรายวิชา : ".$prerequisite['subCode']."&nbsp;".$prerequisite['subName']."</td><tr>";
		$html .= "<tr><td></td><td colspan=\"2\">Prerequisite : ".$prerequisite['subCode']."&nbsp;".$prerequisite['subNameeng']."</td><tr>";
		$html .= "<tr><td colspan=\"3\" style=\"text-indent: 65px;\">".$data['explain']."</td><tr>";
		$html .= "<tr><td colspan=\"3\" style=\"text-indent: 65px;\">".$data['explaineng']."</td><tr>";
		$html .= "<tr><td colsapn=\"3\">&nbsp;</td><tr>";
		$html .= "<tr><td>กลุ่ม</td><td colspan=\"2\">".$group[$data['group_']]."</td><tr>";
		$html .= "<tr><td>หมวดหมู่</td><td colspan=\"2\">".$category[$data['category']]."</td><tr>";
		echo $html;
	}
	function getPre($obj, $id){

		$sql = "
				SELECT * FROM (
					  SELECT subCode, subName, subNameeng FROM subject WHERE subCode=(
						  SELECT subPre FROM  prerequisite WHERE subID='$id' LIMIT 1
					  ) LIMIT 1
				)q1	
		";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		return mysql_fetch_assoc($rs);
	}
?>
</table>
