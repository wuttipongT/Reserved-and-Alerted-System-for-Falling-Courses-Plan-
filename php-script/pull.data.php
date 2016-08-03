<?
	session_start();
	$username = $_SESSION['staff'];
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$obj = new database(HOST, USER , PASSWORD, DBNAME);
	$is_ajax = $_REQUEST['is_ajax'];
	if($is_ajax == 1){//get profile
		$sql = "SELECT name, education, email, mobile, photo, position FROM staff WHERE username='$username' LIMIT 1 ";
		$obj->mysql_query($sql);
		echo json_encode($obj->mysql_fetch_assoc());
	}else if($is_ajax == 2){//get courses
		$obj->mysql_query("SELECT * FROM courses ORDER BY coursesID DESC");
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 3){
		$sql = "SELECT subCode, subName, name FROM subject INNER JOIN category ON subject.category=category.id WHERE courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) ;";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 4){//Get Status  admin/deal_courses.php
		$sql = "SELECT * FROM status";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 5){//get num_rows courses admin/deal_courses.php
		$db = $_POST['db'];
		if($db == 1){
			$sql = "SELECT * FROM acadyear WHERE coursesID='".$_POST['where']."' ";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 2){
			$sql = "SELECT * FROM subject WHERE courses='".$_POST['where']."' ";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 3){
			$sql = "SELECT * FROM prerequisite WHERE courses='".$_POST['where']."' ";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 4){
			$sql = "SELECT * FROM staff";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows()-1;
		}else if($db == 5){
			$sql = "SELECT * FROM news";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}
		else if($db == 6){
			$sql = "SELECT * FROM _status";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 7){
			$sql = "SELECT * FROM reservation";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 8){
			$sql = "SELECT * FROM status";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 9){
			$id = $_POST['id'];
			$sql = "SELECT * FROM reserv WHERE reservID=$id";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 10){
			$id = $_POST['key'];
			$sql = "SELECT * FROM student WHERE admitacadyear=$id";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}
		else if($db == 11){
			$id = $_POST['key'];
			$sql = "SELECT * FROM enroll WHERE acadyear=$id";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 12){
			$id = $_POST['id'];
			$sql = "SELECT DISTINCT acadyear FROM enroll WHERE studentCode='$id'";
			$rs = $obj->mysql_query($sql);
			echo mysql_num_rows($rs);	
		}else if($db == 13){
			$sql = "SELECT * FROM banner";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}else if($db == 14){
			$sql = "SELECT * FROM education";
			$obj->mysql_query($sql);
			echo $obj->mysql_num_rows();
		}
	}else if($is_ajax == 6){//get courses admin/courses.php *tab courese
		$sql = "SELECT * FROM courses";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 7){
		$table = $_REQUEST['table'];
		if($table == 1){
			$sql = "SELECT * FROM courses WHERE coursesID='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}else if($table == 2){
			$sql = "SELECT * FROM acadyear WHERE acadyearID='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}else if($table == 3){
			$sql = "SELECT * FROM subject WHERE subID='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}else if($table == 4){
			$sql = "SELECT * FROM prerequisite WHERE preID='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}else if($table == 5){
			$sql = "SELECT * FROM status WHERE id='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}
		else if($table == 6){
			$sql = "SELECT * FROM banner WHERE id='$_REQUEST[id]' LIMIT 1";
			$obj->mysql_query($sql);
			echo json_encode($obj->mysql_fetch_assoc());
		}
		
	}else if($is_ajax == 8){// pull staff profile admin/staff.php : fnc_edit()
		$sql = "SELECT staffID, name, education, email, mobile, photo, position, status ";
		$sql .= "FROM staff WHERE staffID='$_REQUEST[id]' LIMIT 1";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 9){
		$sql = "SELECT * ";
		$sql .= "FROM news WHERE newsID='$_REQUEST[id]' LIMIT 1";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 10){
		$sql = "
		SELECT subCode, subName, name FROM subject 
		INNER JOIN category ON subject.category=category.id  
		INNER JOIN courses ON subject.courses=courses.update_ 
		INNER JOIN acadyear ON courses.coursesID=acadyear.coursesID 
		WHERE acadyear.year = '".$_REQUEST['courses']."'
		";
		
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 11){
		$sql = "SELECT name FROM staff WHERE type='0'";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = array('name'=>"อ. ".$value['name']);
		}
		echo json_encode($data);
	}else if($is_ajax == 12){
		$id = $_REQUEST['id'];
		$sql = "SELECT * ";
		$sql .= "FROM reservation WHERE reservID=$id LIMIT 1";
		$obj->mysql_query($sql);
		$data = array();
		foreach($obj->mysql_fetch_assoc() as $value){
			$data[] = $value;
		}
		echo json_encode($data);
	}else if($is_ajax == 13){//edit profile pass section 1
		$std_code = $_POST['std_code'];
		$password = base64_encode($_POST['currPass']);
		$sql = "SELECT password FROM member WHERE studentCode='$std_code' AND password='$password' LIMIT 1";
		$obj->mysql_query($sql);
		if($obj->mysql_num_rows() > 0){
			echo 1;
		}
	}else if($is_ajax == 14){//reserv
		$id = $_POST['id'];
		$std_code = $_POST['std_code'];
		$sql = "SELECT * FROM  reserv WHERE std_code='$std_code' AND reservID=$id";
		$obj->mysql_query($sql);
		$num_rows = $obj->mysql_num_rows();
		if($num_rows <= 0){
			$sql = "SELECT subject, date_end FROM reservation WHERE reservID='$id' LIMIT 1";
			$rs = $obj->mysql_query($sql) or die(mysql_error());
			$date_curr = date('Y-m-d');
			$data = mysql_fetch_assoc($rs);
			if($date_curr > $data['date_end']){
				echo 0; //หมดเขตสำรองที่นั่ง
			}else{
				$arr = explode(" ",$data['subject']);
				$class = substr($arr['0'],4,-2);
				$admit = ((date('Y')+543)-$class)+1;
				$right = substr($admit, -2);
				$code = substr($std_code, 0, -9);
				if($right >= $code){//class sub >= std year
					echo 1;
				}else {
					echo $right.'/'.$class;
				}
			}
			
			
		}else {
			echo 2;
		}
	}else if($is_ajax == 15){
		$id = $_REQUEST['id'];
		$sql = "SELECT * FROM reservation WHERE reservID=$id";
		$obj->mysql_query($sql);
		$arr = array();
		foreach($obj->mysql_fetch_assoc() as $data){
			$arr[] = $data;
		}
		echo json_encode($arr);
	}else if($is_ajax == 16){
		//header("Content-Type: application/json", true);
		$id = $_REQUEST['id'];
		$courses = $_REQUEST['courses'];
		$sql = "SELECT subCode, subName FROM subject WHERE subCode='$id' AND courses='$courses' LIMIT 1";
		$obj->mysql_query($sql);
		$arr = array();
		foreach($obj->mysql_fetch_assoc() as $data){
			$arr[] = $data;
		}
		echo json_encode($arr);
	}else if($is_ajax == 17){
		$id = $_REQUEST['id'];
		$sql = "SELECT courses.update_ FROM courses JOIN acadyear ON courses.coursesID=acadyear.coursesID WHERE acadyear.year='$id' LIMIT 1";
		$obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
		foreach($obj->mysql_fetch_assoc() as $data){
			echo $data['update_'];
		}}else{
			echo "ไม่มีข้อมูล";
		}
	}else if($is_ajax == 18){
		$sql = "SELECT * FROM banner";
		$obj->mysql_query($sql);
		$arr = array();
		foreach($obj->mysql_fetch_assoc() as $data){
			$arr[] = $data;
		}
		echo json_encode($arr);
	}else if($is_ajax == 19){
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$sql = "SELECT username, password FROM member WHERE username='$username' AND email='$email' LIMIT 1";
		$obj->mysql_query($sql) or die(mysql_error());
		$data = $obj->mysql_fetch_assoc();
		$str = "<table><tr><td>Username :</td><td>".$data['0']['username']."</td></tr>";
		$str .= "<tr><td>Password: </td><td>".base64_decode($data['0']['password'])."</td></tr></table>";

		echo $str;
	}else if($is_ajax == 20){
		$category[1] = "หมวดศึกษาวิชาทั่วไป";
		$category[2] = "หมวดวิชาเฉพาะด้าน";
		$category[3] = "หมวดวิชาเลือกเสรี";
		$category[4] = "หมวดฝึกงาน";
		$id = $_POST['id'];
		$sql = "SELECT subCode, subName, category FROM subject WHERE courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) ;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		$arr = array();
		while($data = mysql_fetch_assoc($rs)){
			$arr[] = array('subCode'=>$data['subCode'], 'subName'=>$data['subName'], 'category'=>$category[$data['category']]);
		}
		echo json_encode($arr);
	}else if($is_ajax == 21){
		$id = $_POST['id'];
		$sql = "SELECT subName, subNameeng, creditAtempt FROM enroll WHERE subID='$id' LIMIT 1";
			$obj->mysql_query($sql) or die(mysql_error());
			if($obj->mysql_num_rows() > 0){
				foreach($obj->mysql_fetch_assoc() as $data){
					echo json_encode(array("subName"=>$data['subName'],"subNameeng"=>$data['subNameeng'],"credit"=>$data['creditAtempt']));
				}
			}
	}else if($is_ajax == 22){
		$id = $_POST['id'];
		$sql = "SELECT subName, subNameeng, credit FROM subject WHERE subCode='$id' LIMIT 1";
		$obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
			foreach($obj->mysql_fetch_assoc() as $data){
				echo json_encode($data);
			}
			
		}
	}else if($is_ajax == 23){
		$sql = "SELECT * FROM education WHERE id='".$_REQUEST['id']."'";
		$obj->mysql_query($sql);
		$arr = array();
		foreach($obj->mysql_fetch_assoc() as $data){
			$arr[] = $data;
		}
		echo json_encode($arr);
	}else if($is_ajax == 24){
		$sql = "SELECT subID, grade, subName, subNameeng FROM enroll WHERE (grade='F' OR grade='W' OR grade='U') AND studentCode='".$_SESSION['student']."' LIMIT 1";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		$arr = array();
		if($obj->mysql_num_rows() > 0){
		while($data = mysql_fetch_assoc($rs)){
			echo $data['subID'];
		}
		}else{
			echo 1;
		}
	}else if($is_ajax == 25){
		$id = $_POST['subCode'];
		$sql = "SELECT grade,acadyear,semester FROM enroll WHERE (grade='A' OR grade='B+' OR grade='B' OR grade='C+' OR grade='C' OR grade='D+' OR grade='D') AND subID='$id' AND studentCode='".$_SESSION['student']."' LIMIT 1";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_assoc($rs);
		echo json_encode(array('numRow'=>mysql_num_rows($rs),'data'=>$data));
	}else if($is_ajax == 26){
		$id =  $_REQUEST['id'];
		$sql = "SELECT date_end FROM reservation WHERE reservID=$id LIMIT 1";
		$rs = $obj->mysql_query($sql);
		$value = mysql_fetch_assoc($rs);
		$date_curr = date('Y-m-d');
		$value['date_end'];
		if($date_curr > $value['date_end']){
			echo 0;
		}else{
			echo 1;
		}
	}else if($is_ajax == 27){
		$id = $_REQUEST['id'];
		$aca = $_REQUEST['aca'];
		$sql = "
SELECT a,bp,b,cp,c,dp,d,f,w,s,u FROM(
  SELECT count(*) as a FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND enroll.subID='$id' AND student.status ='10' AND enroll.grade='A')g
) query1, (
  SELECT count(*) as bp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='B+')g2
) query2, (
  SELECT count(*) as b FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='B')g3
) query3, (
  SELECT count(*) as cp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='C+')g4
) query4, (
  SELECT count(*) as c FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='C+')g5
) query5, (
  SELECT count(*) as dp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='D+')g6
) query6, (
  SELECT count(*) as d FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='D')g7
) query7, (
  SELECT count(*) as f FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='F')g8
) query8, (
  SELECT count(*) as w FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='W')g9
) query9, (
  SELECT count(*) as s FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='S')g10
) query10 ,(
  SELECT count(*) as u FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='U')g11
) query11
	";
	$obj->mysql_query($sql) or die(mysql_error());
	$raw = $obj->mysql_fetch_assoc();
	$past = $raw['0']['a']+$raw['0']['bp']+$raw['0']['b']+$raw['0']['cp']+$raw['0']['c']+$raw['0']['dp']+$raw['0']['d']+$raw['0']['S'];
	$fail = $raw['0']['f']+$raw['0']['w']+$raw['0']['u'];
	$all = $raw['0']['a']+$raw['0']['bp']+$raw['0']['b']+$raw['0']['cp']+$raw['0']['c']+$raw['0']['dp']+$raw['0']['d']+$raw['0']['S']+$raw['0']['f']+$raw['0']['w']+$raw['0']['u'];

	echo json_encode(array("past"=>$past,"fail"=>$fail,"all"=>$all));
	}else if($is_ajax == 28){
		$sql = "SELECT studentCode FROM member WHERE studentCode = $_REQUEST[studentCode] LIMIT 1 ";
		$obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
	//and we send 0 to the ajax request
			echo 1;
		}else{
			echo $_REQUEST['sm_status'];
		}
	}else if($is_ajax == 29){
		$sql = "SELECT $_POST[list] FROM $_POST[tb] WHERE $_POST[field]= '$_POST[key]' LIMIT 1;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
	//and we send 0 to the ajax request
			$str = mysql_fetch_assoc($rs);
			echo $str[$_POST['list']];
		}else{
			echo 0;
		}
	}
	else if($is_ajax == 30){
		$sql = "SELECT $_POST[list] FROM $_POST[tb] WHERE $_POST[field]= '$_POST[key]' AND courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) LIMIT 1;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
	//and we send 0 to the ajax request
			$str = mysql_fetch_assoc($rs);
			echo $str[$_POST['list']];
		}else{
			echo 0;
		}
	}
	else if($is_ajax == 31){
		$sql = "SELECT * FROM $_POST[tb] WHERE $_POST[field]= '$_POST[key]' AND courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) ;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
			$str = array();
			while( $data = mysql_fetch_assoc($rs)){
				$str[] = $data;
			}
			echo json_encode($str);
		}else{
			echo 0;
		}
	}
	else if($is_ajax == 32){
		$sql = "SELECT staffID FROM staff WHERE name LIKE '%$_POST[key]' LIMIT 1;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
	//and we send 0 to the ajax request
			$str = mysql_fetch_assoc($rs);
			echo $str['staffID'];
		}else{
			echo 0;
		}
	}
	else if($is_ajax == 33){
		$sql = "SELECT * FROM $_POST[tb] WHERE $_POST[field] '$_POST[key]' LIMIT 1 ;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
			$data = mysql_fetch_assoc($rs);
			echo json_encode($data);
		}else{
			echo 0;
		}
	}
	else if($is_ajax == 34){
		$sql = "SELECT * FROM $_POST[tb] WHERE studentCode = '$_POST[key]' AND acadyear = '$_POST[aca]' AND semester = '$_POST[sem]' ;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
			echo "<table class=\"tb-std\"><tr><td colspan=\"7\" class=\"tr\" style=\"border:none;table-layout:fixed;width: 800px;\">รหัสนิสิต : $_POST[key]<div style=\"position:absolute;right:0; top:10px; margin-right: 10px;\">ปีการศึกษา $_POST[aca]&nbsp;เทอม&nbsp;$_POST[sem]</div></td></tr>";
			echo "<tr><td>รหัสวิชา</td><td>ชื่อวิชา</td><td>เกรด</td><td>เกรดโหมด</td><td>หน่วยกิต</td><td>แก้ไข</td></tr>";
			while($data = mysql_fetch_assoc($rs)){
				 $i = $data['enrollID'];
				?>
				<tr id="hili<?=$i?>">
					<td rowspan="2" class="sd<?=$i?>"><?=$data['subID']?></td>
					<td class="sn<?=$i?>"><?=$data['subName']?></td>
					<td class="g<?=$i?>"><?=$data['grade']?></td>
					<td class="gm<?=$i?>"><?=$data['gradeMode']?></td>
					<td class="ca<?=$i?>"><?=$data['creditAtempt']?></td>
					<td rowspan="2" style="text-align:center;"><i class="icon-edit" onClick="fnc_edit_enroll(<?=$i?>)"></i></td>
				</tr>
				<tr>
					<td colspan="4" class="sne<?=$i?>"><?=$data['subNameeng']?></td>
				</tr>
				<?
			}
			echo "</table>";
		}else{
			echo 0;
		}
	}else if($is_ajax == 35){
		
		$sql = "SELECT $_POST[list] FROM $_POST[tb] WHERE $_POST[field] LIKE '$_POST[key]%' LIMIT 1;";
		$rs = $obj->mysql_query($sql) or die(mysql_error());
		if($obj->mysql_num_rows() > 0){
	//and we send 0 to the ajax request
			$str = mysql_fetch_assoc($rs);
			echo $str[$_POST['list']];
		}else{
			echo 0;
		}
	}
	session_write_close();
?>