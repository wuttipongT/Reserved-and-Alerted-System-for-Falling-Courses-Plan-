<?
	session_start();
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$usr = $_SESSION['staff'];
	$obj = new database(HOST, USER, PASSWORD, DBNAME);
	$is_ajax = $_POST['is_ajax'];
	if($is_ajax == 0){
		

		$id = $_POST['staffID'];
		$name = $_POST['name_staff'];
		$education = $_POST['education'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$position = $_POST['position'];

		$filename = $_FILES['photo']['name'];
		$file = $_FILES['photo']['tmp_name'];
		$target = 'images/staff/'.$filename;
		$rem_photo = $_POST['rem-photo'];
	
		if($filename == ""){
		$sql = 'UPDATE `staff` SET `name` = \''.$name.'\', `education` = \''.$education.'\', ';
		$sql .= '`email` = \''.$email.'\', `mobile` = \''.$mobile.'\',  ';
		$sql .= '`position` = \''.$position.'\' ';
		$sql .= 'WHERE `staffID` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
		}else{
		$sql = 'UPDATE `staff` SET `name` = \''.$name.'\', `education` = \''.$education.'\', ';
		$sql .= '`email` = \''.$email.'\', `mobile` = \''.$mobile.'\',  ';
		$sql .= '`photo` = \''.$target.'\', `position` = \''.$position.'\' ';
		$sql .= 'WHERE `staffID` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}else {
			if($filename){
				$checked = move_uploaded_file($file, "../".$target);
				if(!$checked){
					echo("1\n move_uploaded_file Cannot");
				}
				if($rem_photo){
					unlink('../'.$rem_photo);
				}
			}
			
		}
		}
		
	}else if($is_ajax == 1){//edit profile pass section 1
		$password = base64_encode($_POST['currPass']);
		$sql = "SELECT password FROM staff WHERE username='$usr' AND password='$password' LIMIT 1";
		$obj->mysql_query($sql);
		if($obj->mysql_num_rows() > 0){
			echo 1;
		}
	}else if($is_ajax == 2){//edit profile pass section 1
		$password = base64_encode($_POST['newPass']);
		$sql = "UPDATE staff SET password='$password' WHERE username='$usr'";
		$obj->mysql_query($sql);
		echo 1;
	}else if($is_ajax == 3){
		$update = $_POST['update'];
		$id = $_POST['id'];
		$sql = 'UPDATE `courses` SET `update` = \''.$update.'\' WHERE `coursesID` = '.$id.'
		LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 4){//edit staff admin/staff.php
		$id = $_POST['staff_id'];
		$filename = $_FILES['photo_edit']['name'];

		$name = $_POST['name_edit'];
		$education = $_POST['education_edit'];
		$email = $_POST['email_edit'];
		$tel = $_POST['tel_edit'];
		$position = $_POST['position_edit'];
		$status = $_POST['status_edit'];
		if($filename == ""){
			
			$photo = $_POST['hidden-img'];
			$sql = 'UPDATE `staff` SET `name` = \''.$name.'\', ';
			$sql .= '`education` = \''.$education.'\',`email` = \''.$email.'\', ';
			$sql .= '`mobile` = \''.$tel.'\', ';
			$sql .= '`position` = \''.$position.'\', `status` = \''.$status.'\' ';
			$sql .= 'WHERE `staffID` = '.$id.' LIMIT 1;';
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo "1\n".mysql_error();
			}
		}else {
			$target = '../images/staff/'.$filename;
			$photo = "images/staff/".$filename;
			$sql = 'UPDATE `staff` SET `name` = \''.$name.'\', ';
			$sql .= '`education` = \''.$education.'\',`email` = \''.$email.'\', ';
			$sql .= '`mobile` = \''.$tel.'\', `photo` = \''.$photo.'\', ';
			$sql .= '`position` = \''.$position.'\', `status` = \''.$status.'\' ';
			$sql .= 'WHERE `staffID` = '.$id.' LIMIT 1;';
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo "1\n".mysql_error();
			}
			copy($_FILES['photo_edit']['tmp_name'], $target);
			@unlink("../".$_POST['hidden-img']);
			
		}
		
	}else if($is_ajax == 5){//edit news admin/news/news.php : 
		$id = $_POST['id'];
		$filename = $_FILES['photo_edit']['name'];
		$title = $_POST['title_edit'];
		$detail = $_POST['editor1_edit'];
		
		if($filename == ""){
			$sql = 'UPDATE `news` SET `title` = \''.$title.'\', `detail` = \''.$detail.''
				  . ' \' WHERE `news`.`newsID` = '.$id.' LIMIT 1;';
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo "1\n".mysql_error();
			}
		}else {
			$target = '../modules/admin/news/images/'.$filename;
			$sql = 'UPDATE `news` SET `pic` = \''.$filename.'\', `title` = \''.$title.'\', `detail` = \''.$detail.''
				  . ' \' WHERE `news`.`newsID` = '.$id.' LIMIT 1;';
			$rs = $obj->mysql_query($sql);
			copy($_FILES['photo_edit']['tmp_name'], $target);
			@unlink("../modules/admin/news/images/".$_POST['hidden-img']);
			
			if(!$rs){
				echo "1\n".mysql_error();
			}
		}
		
	}else if($is_ajax == 6){// edit acadyear admin/courses.php : data.acadyear.php 
		$aca = $_POST['aca'];
		$corses = $_POST['courses'];
		$id = $_POST['id'];
		$sql = 'UPDATE `acadyear` SET `year` = \''.$aca.'\', coursesID= \''.$courses.'\' WHERE `acadyearID` = '.$id.'
		LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}
	else if($is_ajax == 7){// edit acadyear admin/courses.php : data.acadyear.php 
	
		$sql = 'UPDATE `subject` SET `subCode` = \''.$_POST['code'].'\', ';
		$sql .= '`subName` = \''.$_POST['name'].'\',`subNameeng` = \''.$_POST['nameEN'].'\', ';
		$sql .= '`explain` = \''.$_POST['explan'].'\', `explaineng` = \''.$_POST['explanEN'].'\', ';
		$sql .= '`credit` = \''.$_POST['degree'].'\', `category` = \''.$_POST['category'].'\', `group_` = \''.$_POST['group'].'\', ';
		$sql .= '`courses` = \''.$_POST['courses'].'\' WHERE `subID` = '.$_POST['id'].' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 8){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$pre = $_POST['pre'];
		$corses = $_POST['courses'];

		$sql = 'UPDATE `prerequisite` SET `subID` = \''.$code.'\', ';
		$sql .= '`subPre` = \''.$pre.'\',`courses` = \''.$corses.'\' ';
		$sql .= 'WHERE `preID` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 9){
		$id = $_POST['id'];
		$acadyear = $_POST['acadyear'];
		$subject = $_POST['subject'];
		$lecturer = $_POST['lecturer'];
		$semester = $_POST['semester'];
		$date_curr = $_POST['date_curr'];
		$date_end = $_POST['date_end'];

		$sql = 'UPDATE `reservation` SET `subject` = \''.$subject.'\', ';
		$sql .= '`lecturers` = \''.$lecturer.'\',`acadyear` = \''.$acadyear.'\', ';
		$sql .= '`semester` = \''.$semester.'\',`date_curr` = \''.$date_curr.'\', ';
		$sql .= '`date_end` = \''.$date_end.'\' WHERE `reservID` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 10){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$sql = 'UPDATE `status` SET `des` = \''.$status.'\' ';
		$sql .= 'WHERE `id` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 11){
		$id = $_POST['std_code'];
		$email = $_POST['email'];
		$sobriquet = $_POST['sobriquet'];
		$year = $_POST['year']-543;
		$birthday = $year."-".$_POST['month']."-".$_POST['birthday'];
		$birthday;
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$mobile = $_POST['mobile'];
		
		$filename = $_FILES['photo']['name'];
		if($filename == ''){
		$file = $_FILES['photo']['tmp_name'];
		$target = 'modules/student/image/'.$filename;
		$rem_photo = $_POST['rem-photo'];
		$sql = 'UPDATE `member` SET `email` = \''.$email.'\', ';
		$sql .= '`sobriquet` = \''.$sobriquet.'\', `birthday` = \''.$birthday.'\',  ';
		$sql .= '`address` = \''.$address.'\', `phone` = \''.$phone.'\',  ';
		$sql .= '`mobile` = \''.$mobile.'\' WHERE `studentCode` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}
		}else{
		$file = $_FILES['photo']['tmp_name'];
		$target = 'modules/student/image/'.$filename;
		$rem_photo = $_POST['rem-photo'];
		$sql = 'UPDATE `member` SET `email` = \''.$email.'\', `photo` = \''.$target.'\', ';
		$sql .= '`sobriquet` = \''.$sobriquet.'\', `birthday` = \''.$birthday.'\',  ';
		$sql .= '`address` = \''.$address.'\', `phone` = \''.$phone.'\',  ';
		$sql .= '`mobile` = \''.$mobile.'\' WHERE `studentCode` = '.$id.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();
		}else {
			if($filename){
				$checked = move_uploaded_file($file, "../".$target);
				if(!$checked){
					echo("1\n move_uploaded_file Cannot");
				}
				if($rem_photo){
					unlink('../'.$rem_photo);
				}
			}
			
		}
		}
	}else if($is_ajax == 12){//edit profile pass section 1
		$std_code = $_POST['std_code'];
		$password = base64_encode($_POST['newPass']);
		$sql = 'UPDATE `member` SET `password` = \''.$password.'\' ';
		$sql .= 'WHERE `studentCode` = '.$std_code.' LIMIT 1;';
		$rs = $obj->mysql_query($sql);
		if($rs){
			echo 1;
		}
	}else if($is_ajax == 13){
		$id = $_POST['id'];
		$title = $_POST['title-edit'];
		$remove = $_POST['unlink'];
		$url = $_POST['url-edit'];
		$firstline = $_POST['firstline-edit'];
		$secondline = $_POST['secondline-edit'];

		$filename = $_FILES['image-edit']['name'];
		$file = $_FILES['image-edit']['tmp_name'];
		$target = 'images/banner/'.$filename;
		if($filename == ''){
			echo "1\nกรุณาเลือกรูปภาพด้วยค่ะ!";
		}else{
			$sql = 'UPDATE `banner` SET `title` = \''.$title.'\', `image` = \''.$filename.'\', ';
			$sql .= '`url` = \''.$url.'\', `firstline` = \''.$firstline.'\',  ';
			$sql .= '`secondline` = \''.$secondline.'\' ';
			$sql .= 'WHERE `id` = '.$id.' LIMIT 1;';
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo "1\n".mysql_error();
			}else {
					move_uploaded_file($file, '../'.$target);
					unlink('../images/banner/'.$remove);
			
			}
		}
		
	}else if($is_ajax == 14){
		$id = $_POST['id'];
		$acadyear = $_POST['acadyear'];
		$class = $_POST['$class'];
		$semester = $_POST['semester'];
		$subid = $_POST['subid'];
		$subname = $_POST['subname'];
		$subnameen = $_POST['suben'];
		$credit = $_POST['credit'];

	$sql = 'UPDATE `education` SET `acadyear` = \''.$acadyear.'\', `subID` = \''.$subid.'\', ';
			$sql .= '`subName` = \''.$subname.'\', `subNameen` = \''.$subnameen .'\',  ';
			$sql .= '`credit` = \''.$credit.'\', `class` = \''.$class.'\', `semester` = \''.$semester.'\' ';
			$sql .= 'WHERE `id` = '.$id.' LIMIT 1;';

		$obj->mysql_query($sql) or die("1\n".mysql_error());
	}else if($is_ajax == 15){
		for($i=0;$i<sizeof($_POST['preID']);$i++){
			$sql = "UPDATE `prerequisite` SET `subID`='$_POST[subcode]', `subPre`='".$_POST['subpre'][$i]."', `courses`='$_POST[courses]' WHERE preID=".$_POST['preID'][$i]." ;";
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo '1'."\n".mysql_error()."ffd".$_POST[subpre][$i];
			}
		}
		
	}else if($is_ajax == 16){

	$sql = 'UPDATE `student` SET `studentCode` = \''.$_POST['studentcode'].'\', `preName` = \''.$_POST['prename'].'\', ';
			$sql .= '`name` = \''.$_POST['names'].'\', `sername` = \''.$_POST['sername'].'\',  ';
			$sql .= '`status` = \''.$_POST['status'].'\', `citizenID` = \''.$_POST['citizenID'].'\', `level` = \''.$_POST['level'].'\', ';
			$sql .= '`faculty` = \''.$_POST['faculty'].'\', `program` = \''.$_POST['program'].'\', `admitacadyear` = \''.$_POST['admitacadyear'].'\' ';
			$sql .= 'WHERE `studentID` = '.$id.' LIMIT 1;';

		$obj->mysql_query($sql) or die("1\n".mysql_error());
	}else if($is_ajax == 17){
		$sql = 'UPDATE `enroll` SET `grade` = \''.$_POST['grade'].'\' ';
		$sql .= 'WHERE `enrollID` = '.$_POST['id'];
		$obj->mysql_query($sql) or die("1\n".mysql_error());
	}
	session_write_close();
?>