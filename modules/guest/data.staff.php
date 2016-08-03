	<style>
		#tb-staff{
			width: 290px;
			height:auto;
			margin:auto;
			table-layout:fixed;
			word-wrap:break-word;
			border-collapse:collapse;
		}
		#tb-staff td{
			border:1px solid #ccc;
		}
		.tb-border{
		margin:0;
		padding:0;
		border:1px solid #ccc;
			     -webkit-border-radius: 4px;
    	-moz-border-radius: 4px;
    		border-radius: 4px;
    		
    -webkit-border-radius: 4px;
    	-moz-border-radius: 4px;
    		border-radius: 4px;
		}
	</style>
		
<?php
	//error_reporting(E_ALL);
	//echo "ระบบข่าว";

    list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';

	$objDB = new database($host, $username, $password, $dbname);
	$Page_Start = $_GET['start'];
	$Per_Page = $_GET['limit'];
	$sql = "SELECT staff.*, status.des FROM staff ";
	$sql .= "LEFT JOIN status ON staff.status=status.id WHERE staff.type='0' ";
	$sql .= "ORDER BY staffID DESC LIMIT $Page_Start , $Per_Page";
	  
	$rs = $objDB->mysql_query($sql) or die(mysql_error());
	if($objDB->mysql_num_rows() > 0){
		foreach($objDB->mysql_fetch_assoc() as $index => $data){
 ?>
		
		<fieldset style="float:left;width:290px;margin: 5px; display:block;border:1px solid #ccc;">
		<legend align="right" style="border:1px solid #ccc;padding:5px;"><img src="<?=$data['photo']?>" style="width:150px;height:120px; display:block; margin:auto auto;"/></legend>
		<div class="tb-border">
		<table id="tb-staff" cellspacing="5" cellpadding="5">
		<tr>
			<td width="27%" style="border-right:none;border-top:none;border-left:none;">ชื่อ-สกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  </td>
			<td style="border-left:none;border-top:none;border-right:none;"><?=$data['name']?></td>
		</tr>
		<tr>
			<td style="border-right:none;border-left:none;">การศึกษา&nbsp;&nbsp;&nbsp;:</td>
			<td style="border-left:none;border-right:none;"><?=$data['education']?></td>
		</tr>
		<tr>
			<td style="border-right:none;border-left:none;">อีเมลล์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
			<td style="border-left:none;border-right:none;"><?=$data['email']?></td>
		</tr>
		<tr>
			<td style="border-right:none;border-left:none;">เบอร์ติดต่อ&nbsp:</td>
			<td style="border-left:none;border-right:none;"><?=$data['mobile']?></td>
		</tr>
		<tr>
			<td style="border-right:none;border-left:none;">ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;:</td>
			<td style="border-left:none;border-right:none;"><?=$data['position']?></td>
		</tr>
		<tr>
			<td style="border-right:none;border-bottom:none;border-left:none;">สถานะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
			<td style="border-left:none;border-bottom:none;border-right:none;"><?=get_status($data['status'])?></td>
		</tr>
		</table>
		<div>
		</fieldset>
		<?}}else{
			echo "<center><b>ไม่มีข้อมูล</b></center>";
		}
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