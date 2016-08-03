<style>
	#tb-reserv{border-collapse:collapse;background:#fff; width:100%;}
	#tb-reserv th{border: 1px solid #ccc;text-align:center;background: rgba(204,204,204,.20);}
	#tb-reserv td{border: 1px solid #ccc; text-align:left;}
	#tb-reserv tr:not(.tr):hover{
		background: rgba(204,204,204,.10);
	}
	ol{
	float:left;
}
.clear{clear:both; line-height:0; height:0; font-size: 1px}
	</style>
	
<?
	$id = $_GET['id'];
	$start = $_GET['start'];
	$limit = $_GET['limit'];
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$obj = new database($host, $username, $password,$dbname);
	$obj2 = new database($host, $username, $password,$dbname);
	$sql = "SELECT * FROM reservation ";
	$sql .= "WHERE reservID = $id";

	$rs = $obj->mysql_query($sql) or die(mysql_error());
	foreach($obj->mysql_fetch_assoc() as $data){
		echo '<center><h3>แบบสำรองที่นั่งรายวิชา ' .$data['subject'].' ประจำปีการศึกษา '.$data['acadyear'].' ภาคเรียนที่ '.$data['semester'].'</h3></center>';
		$sql = "SELECT * FROM reserv ";
		$sql .= "WHERE reservID =".$data['reservID']." LIMIT $start, $limit";
		$rs = $obj2->mysql_query($sql) or die(mysql_error());
		
		echo '<table id="tb-reserv" cellpadding="5"><tr><th style="width: 7%;">ลำดับที่</th><th  style="width: 15%;">รหัสนิสิต</th><th>ชื่อ-สกุล</th><th style="width: 10%;">ชั้นปี</th>';
		if($obj2->mysql_num_rows() > 0){
		foreach($obj2->mysql_fetch_assoc() as $index => $val){
			$index += 1;
			list($name, $admit) = getName($val['std_code']);
			echo '<tr><td>'.($index+$start).'</td>';
			echo '<td>'.$val['std_code'].'</td>';
			echo '<td>'.$name.'</td>';
			echo '<td>'.classYear($admit).'</td></tr>';
		}
		}else{
			echo '<tr><td colspan="4" style="text-align:center;">ไม่มีข้อมูล</td></tr>';
		}
		echo '</table>';
		echo '<label style="float:left;">อาจารย์ผู้สอน : &nbsp;</label>';
		foreach(explode('/',$data['lecturers']) as $lec){
			echo $lec."</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
	}

	function getName($std_code){
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
		require_once '../../config.inc/database.php';
		$obj = new database($host, $username, $password,$dbname);
		$sql = "SELECT preName, name, sername, admitacadyear FROM student WHERE studentCode='$std_code'";
		$obj->mysql_query($sql) or die(mysql_error());
		foreach($obj->mysql_fetch_assoc() as $data){
			return array( $data['preName'].$data['name'].' '.$data['sername'], $data['admitacadyear'] );
		}
	}
	function classYear($admit){
		return ((date('Y')+543)-$admit)+1;
	}

?>
<i class="clear"></i>
<br/>
<br/>