<?
	session_start();
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$obj = new database(HOST, USER , PASSWORD, DBNAME);
	$is_ajax = $_POST['is_ajax'];
	if($is_ajax == 1){//add courses folder admin/deal_courses.php
		$sql = "INSERT INTO courses VALUES(NULL, '$_POST[update]')";
		$obj->mysql_query($sql);
		
	}else if($is_ajax == 2){//add acadyear admin/deal_courses.php
		$sql = "INSERT INTO acadyear VALUES(NULL, '$_POST[acadyear]', '$_POST[update]')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo "1\n".mysql_error();		
		}
		
	}else if($is_ajax == 3){//add subject admin/deal_courses.php
		$sql = "INSERT INTO subject VALUES(";
		$sql .= "NULL, '$_POST[code]', '$_POST[name]', '$_POST[nameEN]', '$_POST[explan]', '$_POST[explanEN]', '$_POST[degree]',";
		$sql .= "'$_POST[category]', $_POST[group], $_POST[courses]";
		$sql .= ")";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 4){//add pre -> Folder admin/setting.php
		foreach($_POST['subpre'] as $val){
			$sql = "INSERT INTO prerequisite VALUES(NULL, '$_POST[subcode]', '$val', $_POST[courses])";
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo '1'."\n".mysql_error();
			}
		}
		
	}else if($is_ajax == 5){
		$rs = $obj->mysql_query($sql);
		$sql = "INSERT INTO status VALUES(NULL, '$_POST[status]')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 6){ //add staff admin/staff.php : form[name=
		$filename = $_FILES['photo']['name'];
		$photo = "images/staff/".$filename;
		$target = '../images/staff/'.$filename;
		if($filename == ""){
			die("1\nกรุณาเลือกรูปภาพด้วยค่ะ");
		}
		copy($_FILES['photo']['tmp_name'], $target);
		$sql = "INSERT INTO staff VALUES(NULL, '', '', '$_POST[name]', '$_POST[education]', '$_POST[email]', '', ";
		$sql .="'$_POST[tel]', '$photo', '$_POST[position]', '$_POST[status]')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 7){//add news admin/news/news.php :form[name=form-news]
		$filename = $_FILES['photo']['name'];
		$type = $_FILES['photo']['type'];
		$tmp = $_FILES['photo']['tmp_name'];
		$target = '../modules/admin/news/images/'.$filename;
		if($filename == ""){
			$filename = 'no.image.png';
		}else{
			copy($tmp, $target);
			fit_image_file_to_width($tmp,300,$type);
			move_uploaded_file($tmp,"../modules/admin/news/img_resize/".$filename);
		}
		$title = $_POST['title'];
		$detail = $_POST['editor1'];
		$n_date = date("Y-m-d");
		$n_time = date("H:i:s");
		$sql = "INSERT INTO news VALUES(NULL, '$filename', '$filename', '$title', '$detail', ";
		$sql .="'$n_date', '$n_time')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 8){
		$acadyear = $_POST['acadyear'];
		$subject = $_POST['subject'];
		$lecturer = $_POST['lecturer'];
		$semester = $_POST['semester'];
		$date_curr = $_POST['date_curr'];
		$date_end = $_POST['date_end'];
		$sql = "INSERT INTO reservation VALUES(NULL, '$subject', '$lecturer', '$acadyear', '$semester', ";
		$sql .="'$date_curr', '$date_end')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 9){
		$type = $_FILES['sub-file-xlsx']['type'];
		if($_FILES['sub-file-xlsx']['name'] == ""){
			echo "1\nกรุณาเลือกไฟล์ด้วยค่ะ!";
		}else if($type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
			/** Include path **/
			set_include_path(get_include_path() . PATH_SEPARATOR . '../PHPExcel/Classes');

			$inputFileType = 'Excel5';
			$inputFileName = $_FILES['sub-file-xlsx']['tmp_name'];
			//$sheetnames = array("example1","example2","example3");
			/** PHPExcel_IOFactory */
			ini_set('memory_limit', '3500M');
			include 'PHPExcel/IOFactory.php';
			//$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			//  Read your Excel workbook
			try {
				$cacheMethod   = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
				$cacheSettings = array('memoryCacheSize' => '800MB');
				//set php excel settings
				PHPExcel_Settings::setCacheStorageMethod(
						$cacheMethod,$cacheSettings
					  );
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			//  Get worksheet dimensions
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();
			$checked = $sheet->getCell('I2');
			$sql = "SELECT courses FROM subject WHERE courses='".$checked->getValue()."' LIMIT 1 ;";
			$rs = $obj->mysql_query($sql) or die("1\n".mysql_error());
			if($obj->mysql_num_rows() > 0){
				$data = mysql_fetch_assoc($rs);
				die("1\nข้อมูลรายวิชาวิชาหลักสูตรฉบับปรับปรุงปี ".$data['courses']." มีอยู่ในฐานข้อมูลแล้ว");
			}
			//  Loop through each row of the worksheet in turn
			for ($row = 2; $row <= $highestRow; $row++){ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
												NULL,
												TRUE,
												FALSE);
				//  Insert row data array into your database of choice here

				$sql = 'INSERT INTO subject VALUES(NULL, ';
				$sql .= '\''.$rowData['0']['0'].'\', \''.$rowData['0']['1'].'\', \''.$rowData['0']['2'].'\', \''.$rowData['0']['3'].'\', ';
				$sql .= '\''.$rowData['0']['4'].'\', \''.$rowData['0']['5'].'\', \''.$rowData['0']['6'].'\', \''.$rowData['0']['7'].'\', \''.$rowData['0']['8'].'\')';
				
				$rs = $obj->mysql_query($sql);
				if(!$rs){
					echo '1'."\n".mysql_error();
					break;
				}
			}
		}else{
			echo "1\nรูปแบบไฟล์ไม่สอดคล้อง";
		}
	
	}else if($is_ajax == 10){
		$std_code = $_POST['std_code'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$sql = "INSERT INTO member ";
		$sql .= "VALUES (NULL,'$std_code', '".base64_encode($password)."', '$std_code', '$email', '', '', '', '', '', '');";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}else{
			$_SESSION['student'] = $std_code;
			$_SESSION['logout'] = "logout.php";
		}
	}else if($is_ajax == 11){
		$reserv_id = $_POST['id'];
		$std_code = $_POST['std_code'];
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$sql = "INSERT INTO reserv ";
		$sql .= "VALUES (NULL, $reserv_id, '$std_code', '$date', '$time');";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
	}else if($is_ajax == 12){
		$type = $_FILES['pre-file']['type'];
		if($_FILES['pre-file']['name'] == ""){
			echo "1\nกรุณาเลือกไฟล์ด้วยค่ะ!";
		}else if($type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					/** Include path **/
			set_include_path(get_include_path() . PATH_SEPARATOR . '../PHPExcel/Classes');
			$inputFileType = 'Excel5';
			$inputFileName = $_FILES['pre-file']['tmp_name'];
			//$sheetnames = array("example1","example2","example3");
			/** PHPExcel_IOFactory */
			ini_set('memory_limit', '3500M');
			include 'PHPExcel/IOFactory.php';
			//$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			//  Read your Excel workbook
			try {
				$cacheMethod   = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
				$cacheSettings = array('memoryCacheSize' => '800MB');
				//set php excel settings
				PHPExcel_Settings::setCacheStorageMethod(
						$cacheMethod,$cacheSettings
					  );
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die("1\n".'Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			//  Get worksheet dimensions
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();
			$checked = $sheet->getCell('C2');
			$sql = "SELECT courses FROM prerequisite WHERE courses='".$checked->getValue()."' LIMIT 1 ;";
			$rs = $obj->mysql_query($sql) or die("1\n".mysql_error());
			if($obj->mysql_num_rows() > 0){
				$data = mysql_fetch_assoc($rs);
				die("1\nข้อมูลเงื่อนไขรายวิชาหลักสูตรฉบับปรับปรุงปี ".$data['courses']." มีอยู่ในฐานข้อมูลแล้ว");
			}
			//  Loop through each row of the worksheet in turn
			for ($row = 2; $row <= $highestRow; $row++){ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
												NULL,
												TRUE,
												FALSE);
				//  Insert row data array into your database of choice here

				$sql = 'INSERT INTO prerequisite VALUES(NULL, ';
				$sql .= '\''.$rowData['0']['0'].'\', \''.$rowData['0']['1'].'\', \''.$rowData['0']['2'].'\')';
				$rs = $obj->mysql_query($sql);
			}
		}else{
			echo "1\nรูปแบบไฟล์ไม่สอดคล้อง";
		}
	}else if($is_ajax == 13){
		ini_set("max_execution_time",'8000MB');
		ini_set('memory_limit', '3500M');
		$type = $_FILES['data-std-file']['type'];
		if($_FILES['data-std-file']['name'] == ""){
			echo "1\nกรุณาเลือกไฟล์ด้วยค่ะ!";
		}else if($type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					/** Include path **/
			set_include_path(get_include_path() . PATH_SEPARATOR . '../PHPExcel/Classes');
			$inputFileType = 'Excel2007';
			$inputFileName = $_FILES['data-std-file']['tmp_name'];
			//$sheetnames = array("example1","example2","example3");Excel5
			/** PHPExcel_IOFactory */
			//ini_set('memory_limit', '3500M');
			include 'PHPExcel/IOFactory.php';
			//$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			//  Read your Excel workbook
			try {
				/*$cacheMethod   = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
				$cacheSettings = array('memoryCacheSize' => '800MB');
				//set php excel settings
				PHPExcel_Settings::setCacheStorageMethod(
						$cacheMethod,$cacheSettings
					  );*/
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die("1\n".'Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			//  Get worksheet dimensions
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();
			$checked = $sheet->getCell('L2');
			$sql = "SELECT admitacadyear FROM student WHERE admitacadyear='".$checked->getValue()."' LIMIT 1 ;";
			$rs = $obj->mysql_query($sql) or die("1\n".mysql_error());
			if($obj->mysql_num_rows() > 0){
				$data = mysql_fetch_assoc($rs);
				die("1\nข้อมูลปีนิสิตปี ".$data['admitacadyear']." มีอยู่ในฐานข้อมูลแล้ว");
			}
			//$rowDatas = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
		//	echo "1\n".$rowDatas['0']['11'];
			//  Loop through each row of the worksheet in turn
			for ($row = 2; $row <= $highestRow; $row++){ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
				//  Insert row data array into your database of choice here
	
				$sql = 'INSERT INTO student VALUES(NULL, ';
				$sql .= '\''.$rowData['0']['0'].'\', \''.$rowData['0']['1'].'\', \''.$rowData['0']['2'].'\', \''.$rowData['0']['3'].'\', ';
				$sql .= '\''.$rowData['0']['4'].'\', \''.$rowData['0']['5'].'\', \''.$rowData['0']['6'].'\', \''.$rowData['0']['7'].'\', ';
				$sql .= '\''.$rowData['0']['10'].'\', \''.$rowData['0']['11'].'\')';
				$obj->mysql_query($sql);
			}
		}else{
			echo "1\nรูปแบบไฟล์ไม่สอดคล้อง";
		}
	}else if( $is_ajax == 14 ){
		ini_set("max_execution_time",'8000MB');
		ini_set('memory_limit', '3500M');
		$type = $_FILES['data-enroll-file']['type'];
		if($_FILES['data-enroll-file']['name'] == ""){
			echo "1\nกรุณาเลือกไฟล์ด้วยค่ะ!";
		}else if($type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					/** Include path **/
			set_include_path(get_include_path() . PATH_SEPARATOR . '../PHPExcel/Classes');
			$inputFileType = 'Excel2007';
			$inputFileName = $_FILES['data-enroll-file']['tmp_name'];
			//$sheetnames = array("example1","example2","example3");
			/** PHPExcel_IOFactory */
			include 'PHPExcel/IOFactory.php';
			//$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			//  Read your Excel workbook
			try {
				$cacheMethod   = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
				$cacheSettings = array('memoryCacheSize' => '800MB');
				//set php excel settings
				PHPExcel_Settings::setCacheStorageMethod(
						$cacheMethod,$cacheSettings
					  );
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die("1\n".'Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			//  Get worksheet dimensions
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();
			$checked = $sheet->getCell('L2');
			$sql = "SELECT acadyear FROM enroll WHERE acadyear='".$checked->getValue()."' LIMIT 1 ;";
			$rs = $obj->mysql_query($sql) or die("1\n".mysql_error());
			if($obj->mysql_num_rows() > 0){
				$data = mysql_fetch_assoc($rs);
				die("1\nข้อมูลผลการลงทะเบียนปีการศึกษา ".$data['acadyear']." มีอยู่ในฐานข้อมูลแล้ว");
			}
			//  Loop through each row of the worksheet in turn
			for ($row = 2; $row <= $highestRow; $row++){ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
												NULL,
												TRUE,
												FALSE);
				//  Insert row data array into your database of choice here

			$sql = 'INSERT INTO enroll VALUES(NULL, ';
			$sql .= '\''.$rowData['0']['0'].'\', \''.$rowData['0']['12'].'\', \''.$rowData['0']['13'].'\', \''.$rowData['0']['14'].'\', ';
			$sql .= '\''.$rowData['0']['15'].'\', \''.$rowData['0']['16'].'\', \''.$rowData['0']['17'].'\', \''.$rowData['0']['18'].'\', ';
			$sql .= '\''.$rowData['0']['19'].'\')';
			$rs = $obj->mysql_query($sql);
			}
		}else{
			echo "1\nรูปแบบไฟล์ไม่สอดคล้อง";
		}
	}else if( $is_ajax == 15 ){
		$username = $_POST['username'];
		$std_code = $_POST['student_code'];
		$email = $_POST['email'];
		$photo =  $_POST['photo'];
		$birthday = $_POST['birthday'];
		$address = $_POST['address'];	
		$sql = "INSERT INTO member ";
		$sql .= "VALUES (NULL,'$username', 'password', '$std_code', '$email', '$photo', '', '$birthday', '$address', '', '');";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}else{
			$_SESSION['student'] = $std_code;
		}
	}else if($is_ajax == 16){
		$require = $_POST['require'];
		$semester = $_POST['semester'];
		$acadyear = $_POST['acadyear'];
		$cause = $_POST['cause'];
		$studentCode = $_POST['studentCode'];
		$date = date("Y-m-d");

		$sub_code = $_POST['sub_code'];
		$subject = $_POST['subject'];
		$group = $_POST['group'];
		$lecturer = $_POST['lecturer'];
		
		$sql = "INSERT INTO report VALUES(NULL, $require, $semester, '$acadyear', '$cause', '$studentCode', '$date')";
		$rs = $obj->mysql_query($sql);
		if(!$rs){
			echo '1'."\n".mysql_error();
		}
		$db =  new database(HOST, USER, PASSWORD, DBNAME);
		$rs = $db->mysql_query("SELECT report_id FROM report ORDER BY report_ID DESC LIMIT 1") or die(mysql_error());
		$report_id = mysql_fetch_assoc($rs);
		$i=0;
		for( ;$i<=5;$i++){
			$sql = "INSERT INTO report_subject VALUES(NULL, '".$sub_code[$i]."', '".$subject[$i]."','".$group[$i]."','".$lecturer[$i]."','".$report_id['report_id']."')";

			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo '1'."\n".mysql_error()."2";
			}
		}
	}else if($is_ajax == 17){
		$filename = $_FILES['image']['name'];
		$target = '../images/banner/'.$filename;
		if(copy($_FILES['image']['tmp_name'], $target)){
			$title = $_POST['title'];
			$url = $_POST['url'];
			$firstline = $_POST['firstline'];
			$secondline = $_POST['secondline'];
			$sql = "INSERT INTO banner VALUES(NULL, '$title', '$filename', '$url', ";
			$sql .="'$firstline', '$secondline')";
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo '1'."\n".mysql_error();
			}
		}else{
			echo '1'."\n No Image!";
		}
	}else if($is_ajax == 18){
		$str = array();
		//print_r($_POST['semester_1']);
		$semester_1 = $_POST['semester_1']; 
		$subid = $semester_1['subid'];
		$subname = $semester_1['subname'];
		$subnameen = $semester_1['subnameen'];
		$credit = $semester_1['credit'];
		$size = sizeof($subid);
		$acadyear = date('Y')+543;
		$i = 0;
		for( ;$i<$size;$i++){
			$sql = "INSERT INTO education VALUES(NULL, '$acadyear','$subid[$i]', '$subname[$i]', '$subnameen[$i]', '$credit[$i]', '".$semester_1['$class']."', '".$semester_1['semester']."')";
			$rs = $obj->mysql_query($sql);
			if(!$rs){
				echo '1'."\n".mysql_error();
			}
		}

		$semester_2 = $_POST['semester_2'];
		$subid2 = $semester_2['subid'];
		$subname2 = $semester_2['subname'];
		$subnameen2 = $semester_2['subnameen'];
		$credit2 = $semester_2['credit'];
		$size = sizeof($subid2);
		$j = 0;
		for( ;$j<$size;$j++){
			//echo "\n\n".$subid2[$j]." ".$subname2[$j]." ".$subnameen2[$j]." ".$credit2[$j]."\n";
			$sql2 = "INSERT INTO education VALUES(NULL, '$acadyear','$subid2[$j]', '$subname2[$j]', '$subnameen2[$j]', '$credit2[$j]', '".$semester_2['$class']."', '".$semester_2['semester']."')";
			$rs2 = $obj->mysql_query($sql2);
			if(!$rs2){
				echo '1'."\n".mysql_error();
			}
		}
	
	}
	function fit_image_file_to_width($file, $w, $mime = 'image/jpeg') {
    list($width, $height) = getimagesize($file);
    $newwidth = $w;
    $newheight = 180;//$w * $height / $width;

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'image/png';
            $src = imagecreatefrompng($file);
            break;
        case 'image/bmp';
            $src = imagecreatefromwbmp($file);
            break;
        case 'image/gif';
            $src = imagecreatefromgif($file);
            break;
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dst, $file);
            break;
        case 'image/png';
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            imagepng($dst, $file);
            break;
        case 'image/bmp';
            imagewbmp($dst, $file);
            break;
        case 'image/gif';
            imagegif($dst, $file);
            break;
    }

    imagedestroy($dst);
}
	session_write_close();
?>