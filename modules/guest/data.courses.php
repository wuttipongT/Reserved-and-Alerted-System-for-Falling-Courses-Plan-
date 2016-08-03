<meta charset="UTF-8"/>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';

	$database = new database($host, $username, $password, $dbname);
	$database2 = new database($host, $username, $password, $dbname);

	$courses = $_GET['courses_id'];
	$category[] = "หมวดศึกษาวิชาทั่วไป";
	$category[] = "หมวดวิชาเฉพาะด้าน";
	$category[] = "หมวดวิชาเลือกเสรี";
	$category[] = "หมวดฝึกงาน";
	$group[] = "กลุ่มวิชาแกนคณะ";
	$group[] = "กลุ่มวิชาพื้นฐานเอก";
	$group[] = "กลุ่มวิชาเอกบังคับ";
	$group[] = "กลุ่มวิชาเอกเลือก";
	

	$length = sizeof($category);
	$i = 0;
	
	for(;$i<$length;$i++){
		//echo ;
		echo ($i+1)." ".$category[$i];
		$j = $i-1;
		echo nl2br("\n");
		if($i == 0){
				echo "&nbsp;&nbsp;รายละอียดในภาคผนวกในหนังสือหลักสูตร";
		}
		if($i == 1){
		for(;$j<$length;$j++){
				echo '<table><tr><th width="10%">รหัสวิชา</th><th>รายวิชา</th><th width="12%">หน่วยกิต</th></tr>';
				echo "2.".($j+1)." ".$group[$j];
				$sql = "SELECT subject.subCode, subject.subName,subject.credit FROM subject JOIN courses ON  subject.courses=courses.update_ WHERE subject.group_ = '".($j+1)."' AND courses.update_='$courses'";
				$rs = $database->mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($rs) > 0){
				while($data = mysql_fetch_assoc($rs)){
					echo '<tr><td align="center">'.$data['subCode'].'</td><td style="text-indent:5px;">'.$data['subName'].'</td><td align="center">'.$data['credit'].'</td></tr>';
					
				}}else{
					echo '<tr><td align="center" colspan="3">ไม่มีข้อมูล</td></tr>';
				}
				echo '</table>';
				
				echo nl2br("\n");
			}
		}if($i == 2){
			echo "&nbsp;&nbsp;เลือกศึกษารายวิชาอื่นๆ ที่เปิดสอนในสถาบันอุดมศึกษา โดยได้รับความคิดเห็นจากอาจารย์ที่ปรึกษา";
		}if($i == 3){
				echo '<table><tr><th width="10%">รหัสวิชา</th><th>รายวิชา</th><th width="12%">หน่วยกิต</th></tr>';
				$sql2 = "SELECT subject.subCode, subject.subName,subject.credit FROM subject JOIN courses ON  subject.courses=courses.coursesID WHERE subject.category = '".($i+1)."' AND courses.update_='$courses'";
				$rs2 = $database2->mysql_query($sql2) or die(mysql_error());
				while($data2 = mysql_fetch_assoc($rs2)){
					echo '<tr><td align="center">'.$data2['subCode'].'</td><td style="text-indent:5px;">'.$data2['subName'].'</td><td align="center">'.$data2['credit'].'</td>';
					
				}
				echo '</table>';
				echo nl2br("\n");
			}echo nl2br("\n");
		
	}
?>