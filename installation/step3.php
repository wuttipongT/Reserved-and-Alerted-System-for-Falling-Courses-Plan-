<div class="info">
ขั้นตอนที่ 3 ตรวจสอบเซิร์ฟเวอร์และการติดตั้ง
</div><br>
<?
if($_POST['submit']=="ok"){
$hostname = $_POST['servername'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];

$connect_db = @mysql_connect($hostname,$username,$password); // เชื่อมต่อฐานข้อมูล
//========================
}?>

<table width="950" border="0" cellpadding="0" style="font-size:13px;">
  <tr>
    <td width="217" align="center">&nbsp;</td>
    <td width="727" align="left">
    <?
	if($connect_db){
		echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามรถเชื่อต่อฐานข้อมูล MySQL ได้</font><br>";
		$createdb=mysql_query("create database IF NOT EXISTS ".$dbname);
		if($createdb){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามรถสร้างฐานข้อมูลชื่อ ".$_POST['dbname']." ได้</font><br>";
		}
		
		mysql_query("SET NAMES UTF8");  // คิวรี่ข้อมูลเป้นภาษา TIS-620
		mysql_query("SET character_set_results=UTF8");// คิวรี่ข้อมูลเป้นภาษา TIS-620
		$selectdb=mysql_select_db($_POST['dbname']);
		if($selectdb){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างเลือกใช้ฐานข้อมูลชื่อ ".$_POST['dbname']." ได้</font><br>";
		}
		$courses=mysql_query("
			CREATE TABLE `courses` (
			  `coursesID` int(11) NOT NULL auto_increment,
			  `update_` int(5) NOT NULL,
			  PRIMARY KEY  (`coursesID`),
			  KEY `update_` (`update_`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		");
		if($courses){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ courses ของระบบได้</font><br>";
		}
		$acadyear=mysql_query("
			CREATE TABLE `acadyear` (
			  `acadyearID` int(11) NOT NULL auto_increment,
			  `year` varchar(5) NOT NULL,
			  `coursesID` int(11) NOT NULL,
			  PRIMARY KEY  (`acadyearID`),
			  KEY `coursesID` (`coursesID`),
			  INDEX (`coursesID`),
			  FOREIGN KEY (`coursesID`) REFERENCES `courses` (`coursesID`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($acadyear){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ acadyear ของระบบได้</font><br>";
		}
		//=====================
		$_status=mysql_query("
			CREATE TABLE `_status` (
			  `id` int(11) NOT NULL auto_increment,
			  `code` int(11) NOT NULL,
			  `des` varchar(80) NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($_status){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ _status ของระบบได้</font><br>";
		}
		//=====================
		$student=mysql_query("
			CREATE TABLE `student` (
			  `studentID` int(11) NOT NULL auto_increment,
			  `studentCode` varchar(15) NOT NULL,
			  `preName` varchar(10) NOT NULL,
			  `name` varchar(30) NOT NULL,
			  `sername` varchar(30) NOT NULL,
			  `status` int(11) NOT NULL,
			  `citizenID` varchar(15) NOT NULL,
			  `level` varchar(20) NOT NULL,
			  `faculty` varchar(20) NOT NULL,
			  `program` varchar(30) NOT NULL,
			  `admitacadyear` int(15) NOT NULL,
			  PRIMARY KEY  (`studentID`),
			  KEY `status` (`status`),
			  KEY `studentCode` (`studentCode`),
			  FOREIGN KEY (`status`) REFERENCES `_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($student){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ student ของระบบได้</font><br>";
		}
		//=====================
		$enroll=mysql_query("
			CREATE TABLE `enroll` (
			  `enrollID` int(11) NOT NULL auto_increment,
			  `studentCode` varchar(15) NOT NULL,
			  `acadyear` int(11) NOT NULL,
			  `semester` int(11) NOT NULL,
			  `subID` varchar(15) NOT NULL,
			  `gradeMode` varchar(10) NOT NULL,
			  `creditAtempt` int(5) NOT NULL,
			  `grade` varchar(5) NOT NULL,
			  `subName` varchar(100) NOT NULL,
			  `subNameeng` varchar(100) NOT NULL,
			  PRIMARY KEY  (`enrollID`),
			  KEY `studentCode` (`studentCode`),
			  FOREIGN KEY (`studentCode`) REFERENCES `student` (`studentCode`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($enroll){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ enroll ของระบบได้</font><br>";
		}
			//=====================
		$member=mysql_query("
			CREATE TABLE `member` (
			  `memberID` int(11) NOT NULL auto_increment,
			  `username` varchar(100) NOT NULL,
			  `password` varchar(15) NOT NULL,
			  `studentCode` varchar(15) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `photo` varchar(50) NOT NULL,
			  `sobriquet` varchar(30) NOT NULL,
			  `birthday` date NOT NULL,
			  `address` text NOT NULL,
			  `phone` varchar(10) NOT NULL,
			  `mobile` varchar(10) NOT NULL,
			  PRIMARY KEY  (`memberID`),
			  KEY `studentCode` (`studentCode`),
			  FOREIGN KEY (`studentCode`) REFERENCES `student` (`studentCode`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($member){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ member ของระบบได้</font><br>";
		}
			//=====================
		$subject=mysql_query("
			CREATE TABLE `subject` (
			  `subID` int(11) NOT NULL auto_increment,
			  `subCode` varchar(10) NOT NULL,
			  `subName` varchar(100) NOT NULL,
			  `subNameeng` varchar(100) NOT NULL,
			  `explain` text NOT NULL,
			  `explaineng` text NOT NULL,
			  `credit` varchar(10) NOT NULL,
			  `category` int(11) NOT NULL,
			  `group_` int(11) NOT NULL,
			  `courses` int(11) NOT NULL,
			  PRIMARY KEY  (`subID`),
			  KEY `courses` (`courses`),
			  FOREIGN KEY (`courses`) REFERENCES `courses` (`update_`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($subject){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ subject ของระบบได้</font><br>";
		}
			//=====================
		$prerequisite=mysql_query("
			CREATE TABLE `prerequisite` (
			  `preID` int(11) NOT NULL auto_increment,
			  `subID` varchar(10) NOT NULL,
			  `subPre` varchar(10) NOT NULL,
			  `courses` int(11) NOT NULL,
			  PRIMARY KEY  (`preID`),
			  KEY `subID` (`subID`,`subPre`),
			  KEY `courses` (`courses`),
			  FOREIGN KEY (`courses`) REFERENCES `courses` (`update_`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($prerequisite){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ prerequisite ของระบบได้</font><br>";
		}
		//=====================
		$reservation=mysql_query("
			CREATE TABLE `reservation` (
			  `reservID` int(11) NOT NULL auto_increment,
			  `subject` varchar(100) NOT NULL,
			  `lecturers` text NOT NULL,
			  `acadyear` varchar(10) NOT NULL,
			  `semester` int(2) NOT NULL,
			  `date_curr` date NOT NULL,
			  `date_end` date NOT NULL,
			  PRIMARY KEY  (`reservID`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($reservation){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ reservation ของระบบได้</font><br>";
		}
			//=====================
		$reserv=mysql_query("
			CREATE TABLE `reserv` (
			  `id` int(11) NOT NULL auto_increment,
			  `reservID` int(11) NOT NULL,
			  `std_code` varchar(11) NOT NULL,
			  `date_` date NOT NULL,
			  `time_` time NOT NULL,
			  PRIMARY KEY  (`id`),
			  KEY `reservID` (`reservID`),
			  KEY `std_code` (`std_code`),
			  FOREIGN KEY (`std_code`) REFERENCES `member` (`studentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
			  FOREIGN KEY (`reservID`) REFERENCES `reservation` (`reservID`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1
		");
		if($reserv){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ reserv ของระบบได้</font><br>";
		}
		//=====================
		$status=mysql_query("
			CREATE TABLE `status` (
			  `id` int(11) NOT NULL auto_increment,
			  `des` varchar(20) NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($status){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ status ของระบบได้</font><br>";
		}
			//=====================
		$staff=mysql_query("
			CREATE TABLE `staff` (
			  `staffID` int(11) NOT NULL auto_increment,
			  `username` varchar(30) NOT NULL,
			  `password` varchar(30) NOT NULL,
			  `name` varchar(30) NOT NULL,
			  `education` varchar(30) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `type` int(5) NOT NULL,
			  `mobile` varchar(10) NOT NULL,
			  `photo` varchar(50) NOT NULL,
			  `position` varchar(30) NOT NULL,
			  `status` int(5) NOT NULL,
			  PRIMARY KEY  (`staffID`),
			  KEY `status` (`status`),
			  FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($staff){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ staff ของระบบได้</font><br>";
		}
		//=====================
	$banner=mysql_query("
			CREATE TABLE `banner` (
			  `id` int(11) NOT NULL auto_increment,
			  `title` varchar(100) NOT NULL,
			  `image` varchar(100) NOT NULL,
			  `url` varchar(100) NOT NULL,
			  `firstline` varchar(100) NOT NULL,
			  `secondline` varchar(100) NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($banner){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ banner ของระบบได้</font><br>";
		}
		//=====================
		$education=mysql_query("
			CREATE TABLE `education` (
			  `id` int(11) NOT NULL auto_increment,
			  `acadyear` int(10) NOT NULL,
			  `subID` varchar(15) NOT NULL,
			  `subName` varchar(100) NOT NULL,
			  `subNameen` varchar(100) default NULL,
			  `credit` varchar(10) NOT NULL,
			  `class` int(5) NOT NULL,
			  `semester` int(5) NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($education){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ education ของระบบได้</font><br>";
		}
		//=====================
		$news=mysql_query("
			CREATE TABLE `news` (
			  `newsID` int(10) NOT NULL auto_increment,
			  `pic` varchar(100) NOT NULL,
			  `pic_resize` varchar(100) NOT NULL,
			  `title` varchar(100) NOT NULL,
			  `detail` text NOT NULL,
			  `n_date` date NOT NULL,
			  `n_time` time NOT NULL,
			  PRIMARY KEY  (`newsID`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
		");
		if($news){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถสร้างตารางข้อมูลชื่อ news ของระบบได้</font><br>";
		}
		//=====================
		$banner1=mysql_query("insert into banner values(1, 'มหาวิทยาลัยมหาสารคาม', 'student.jpg', 'http://www.web.msu.ac.th/msucont.php?mn=mstd', 'อัตลักษณ์', '\"นิสิตกับการช่วยเหลือสังคมและชุมชน\"'),
		(2, 'คณะวิทยาการสารสนเทศ', 'nature.jpg', 'http://www.informatics.msu.ac.th/', 'ปรัชญา', 'ความรู้คู่คุณธรรมนำสังคม');
		
		");
		if($banner1){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถเพิ่มข้อมูลแบนเนอร์ได้</font><br>";
		}

		$datastatus=mysql_query("insert into status values(NULL, 'ทำงานปกติ') ");
		if($datastatus){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถเพิ่มข้อมูสถานะบุคลากรได้</font><br>";
		}
		$_status1=mysql_query("insert into _status values
('', 10, 'นิสิตปัจจุบัน สภาพสมบูรณ์'),
('', 11, 'รักษาสภาพนิสิต'),
('', 12, 'ลาพักการเรียน'),
('', 40, 'สำเร็จการศึกษา'),
('', 41, 'ครบหลักสูตร'),
('', 48, 'ขอสละสิทธิ์'),
('', 49, 'นิสิตที่ไม่มารายงานตัว'),
('', 50, 'ได้รับอนุมัติให้ลาออก'),
('', 51, 'พ้นสภาพนิสิต (20.3.1 ไม่มาลงทะเบียน)'),
('', 52, 'พ้นสภาพนิสิต ( ย้ายวิทยาเขต )'),
('', 53, 'พ้นสภาพนิสิต (20.3.2 ไม่มารักษาสภาพ)'),
('', 54, 'พ้นสภาพนิสิต (20.3.3 ขาดคุณวุฒิ)'),
('', 55, 'พ้นสภาพนิสิต (20.3.4 GPAX< 1.6)'),
('', 56, 'พ้นสภาพนิสิต (20.3.5 GPAX < 1.75 เป็นเวลา 2 ภาค)'),
('', 57, 'พ้นสภาพนิสิต (20.3.6 GPAX < 2.00 เป็นเวลา 4 ภาค)'),
('', 58, 'พ้นสภาพนิสิต (20.3.7 ไม่สำเร็จการศึกษาตามหลักสูตรภายในระยะเวลาที่กำหนดตามข้อ 10)'),
('', 59, 'พ้นสภาพนิสิต (35.2.6 GPAX < 3.00 )'),
('', 60, 'พ้นสภาพนิสิต (35.2.4 ลงทะเบียนในภาคเรียนแรก แต่ลาพักการเรียน 2 ภาคติดต่อกัน)'),
('', 61, 'พ้นสภาพนิสิต (35.2.1 ไม่ลงทะเบียนในภาคเรียนแรก)'),
('', 62, 'พ้นสภาพนิสิต (35.2.2 ไม่ชำระเงินเพื่อรักษาสภาพ)'),
('', 63, 'พ้นสภาพนิสิต (35.2.3 ไม่ลงทะเบียนเรียนภายในกำหนด)'),
('', 64, 'พ้นสภาพนิสิต (35.2.7 สอบประมวลความรู้ 3 ครั้งไม่ผ่าน)'),
('', 65, 'พ้นสภาพนิสิต (35.2.9 ไม่สำเร็จการศึกษาตามหลักสูตรภายในระยะเวลา)'),
('', 66, 'พ้นสภาพนิสิต (ย้ายวิชาเอก)'),
('', 67, 'พ้นสภาพนิสิต (35.2.5 ขาดคุณวุฒิและคุณสมบัติตามข้อ 16 อย่างใดอย่างหนึ่ง)'),
('', 68, 'พ้นสภาพนิสิต (35.2.8 เป็นนิสิตตามข้อ 19.3.3 มีขั้นเฉลี่ยภาคแรกต่ำกว่า 3.00)'),
('', 69, 'พ้นสภาพนิสิต (35.2.10 สอบวิทยานิพนธ์และการศึกษาค้นคว้าอิสระ ได้ระดับขั้น \"ไม่ผ่าน (Fail)\")'),
('', 70, 'พ้นสภาพนิสิต (35.2.14 ความประพฤติเสื่อมเสีย)'),
('', 71, 'พ้นสภาพนิสิต (35.2.15 ทำผิดระเบียบอย่างร้ายแรง)'),
('', 72, 'พ้นสภาพนิสิต (35.2.11 ไม่ได้ศึกษาค้นคว้าวิทยานิพนธ์ และค้นคว้าอิสระ)'),
('', 73, 'พ้นสภาพนิสิต (35.2.12 ทำการทุจริตในการสอบ)'),
('', 74, 'พ้นสภาพนิสิต (35.2.13 จ้างวานผู้อื่นเขียนวิทยานิพนธ์หรือการศึกษาค้นคว้าอิสระ)'),
('', 75, 'ย้ายระบบ'),
('', 76, 'โอนย้ายสถานศึกษา'),
('', 79, 'พ้นสภาพนิสิต (37.4.4  ขาดคุณวุฒิและคุณสมบัติตามข้อ 17 อย่างใดอย่างหนึ่ง)'),
('', 80, 'พ้นสภาพนิสิต(20.3.9 กระทำการทุจริตหรือมีความประพฤติอันเป็นการเสื่อมเสียแก่มหาวิทยาลัย'),
('', 81, 'พ้นสภาพนิสิต (37.2  ตาย)'),
('', 82, 'พ้นสภาพนิสิต (37.3  ลาออกโดยได้รับอนุมัติจากคณบดีบัณฑิตวิทยาลัย)'),
('', 83, 'พ้นสภาพนิสิต (37.4.1  ไม่ลงทะเบียนเรียนอย่างสมบูรณ์ในภาคการศึกษาแรกที่ขึ้นทะเบียนนิสิตตามข้อ  24.3)'),
('', 84, 'พ้นสภาพนิสิต (37.4.2  ไม่ชำระเงินเพื่อรักษาสภาพนิสิตตามข้อ  29.2)'),
('', 85, 'พ้นสภาพนิสิต (37.4.3  ไม่ลงทะเบียนเรียนอย่างสมบูรณ์ในภาคการศึกษาใดภาคการศึกษาหนึ่ง)'),
('', 86, 'พ้นสภาพนิสิต (37.4.5  เมื่อผลการศึกษามีค่าระดับขั้นเฉลี่ยสะสมต่ำกว่า 3.00 ติดต่อกันเกินสองภาคการศึก)'),
('', 87, 'พ้นสภาพนิสิต (37.4.6  สอบประมวลความรู้ 3 ครั้ง ไม่ผ่าน)'),
('', 88, 'พ้นสภาพนิสิต (37.4.7  เป็นนิสิตตามข้อ 20.2 มีค่าระดับขั้นเฉลี่ยสะสมต่ำกว่า 3.00)'),
('', 89, 'พ้นสภาพนิสิต (37.4.8  ไม่สำเร็จการศึกษาตามหลักสูตรภายในระยะเวลา  ตามข้อ 16)'),
('', 90, 'เสียชีวิต'),
('', 91, 'พ้นสภาพนิสิต (20.3.8 ต้องโทษคำพิพากษาถึงที่สุดให้จำคุก)'),
('', 92, 'พ้นสภาพนิสิต (20.3.9 ประพฤติอันเป็นการเสื่อมเสียแก่มหาวิทยาลัย)'),
('', 93, 'พ้นสภาพนิสิต (37.4.9  สอบวิทยานิพนธ์หรือสอบการศึกษาค้นคว้าอิสระหรือสอบการศึกษาปัญหาพิเศษครั้งที่ 2 )'),
('', 94, 'พ้นสภาพนิสิต (37.4.10 จ้างหรือวานให้ผู้อื่นทำวิทยานิพนธ์ หรือการศึกษาค้นคว้าอิสระหรือ การศึกษาปัญหา)'),
('', 95, 'พ้นสภาพนิสิต (37.4.11  รับจ้างทำวิทยานิพนธ์ หรือการศึกษาค้นคว้าอิสระ หรือการศึกษาปัญหาพิเศษ)'),
('', 96, 'พ้นสภาพนิสิต (37.4.12  มีความประพฤติเสื่อมเสียอย่างร้ายแรงขณะที่เป็นนิสิต )'),
('', 97, 'พ้นสภาพนิสิต (37.4.13  ทำผิดระเบียบของมหาวิทยาลัยอย่างร้ายแรง)'),
('', 98, 'พ้นสภาพนิสิต (37.4.14  ไม่ได้ลงทะเบียนรายวิชาวิทยานิพนธ์ หรือการศึกษาค้นคว้า หรือ การศึกษาปัญหาพิเศ)'),
('', 99, 'อื่นๆ์');
		
		");
		if($_status1){
			echo "<img src='../images/accept.png'>&nbsp;<font style='color:#009966;'>สามารถเพิ่มข้อมูลสถานะนิสิตได้</font><br>";
		}

	}else{
		echo "<img src='../images/cancel.png'>&nbsp;<font style='color:#F00;'>ไม่สามรถเชื่อต่อฐานข้อมูล MySQL ได้</font>";
		exit();
	}
	mysql_close();
	$_SESSION['arrData'] = $_POST;
    ?>
    </td>
  </tr>
   <tr>
     <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="left">
	<form method="post" action="?step=4" name="step3">
		<input type="hidden" value="<?=$hostname?>" name="hostname"/>
		<input type="hidden" value="<?=$username?>" name="username"/>
		<input type="hidden" value="<?=$password?>" name="password"/>
		<input type="hidden" value="<?=$dbname?>" name="dbname"/>
	</form>
    <button class="blue" style="width: 100px;">กลับ</button>&nbsp;
	<button class="white" style="width:100px;">ถัดไป</button>
</td>
  </tr>
</table>
<script>
 $(document).ready(function(){
	$('button[class="blue"]').click(function(){
		window.location.href = "?step=2";
	});

	$('button[class="white"]').click(function(){
	//	window.location.href = "?step=4";
		$('form[name="step3"]').submit();
	});
 });
</script>
