<?
	/*PHP Function*/
	function navContent($url){
		$str = $url;
		return $str;
	}
	function checkmail($value){
		if(ereg("^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})",$value))
			return true;
		else 
			return false;
	}
	function date_th($format){
		$month_th = array("01"=>"ม.ค.", "02"=>"ก.พ", "03"=>"มี.ค.", "04"=>"เม.ย", "05"=>"พ.ค.", "06"=>"มิ.ย.", "07"=>"ก.ค.", "08"=>"ส.ค.", "09"=>"ก.ย.", "10"=>"ต.ค.", "11"=>"พ.ย", "12"=>"ธ.ค.");
		list($year, $mount, $day) = explode('-', $format);
		$mount_new = "";
		foreach($month_th as $key => $val){
			if( $key==$mount){
				$mount_new = $val;
			}
		}
		$year = $year+543;
		return $day.' '.$mount_new.' '.$year;
	}
	function checkmobile($value){
		if(ereg("([0]{1}+8-9{1}])-([0-9]{8})",$value))
			return true;
		else 
			return false;
	}
	function url_alias_path() {
	return explode('/',$_SERVER['REQUEST_URI']);
	}
	function detail(){
		switch($_GET['mod']){
				//guest
				case "news" : 
								if($_SESSION['staff']){
									include("modules/admin/news/news.php");
								}else{
									include("modules/guest/news.php");
								}
				break;
				case "courses" : 
								if($_SESSION['staff']){
									include("modules/admin/courses.php");
								}else{
									include("modules/guest/courses.php");
								}
				break;
				case "staff" : 
								if($_SESSION['staff']){
									include("modules/admin/staff.php");
								}else{
									include("modules/guest/staff.php");
								}
				break;
				case "help" : include("modules/guest/help.php");break;
				case "contact" : include("modules/guest/contact.php");break;
				//regis,login
				case "regis" : include("modules/register/register.php");break;
				case "login" : include("modules/login/processLogin.php");break;
				case "forgetpass" : include("modules/guest/forget.password.php");break;
				case "processregis" : include("modules/register/process-regis.php");break;
				//admin
				case "profile" : 
								if($_SESSION['staff']){
									include("modules/profile.admin.php");
								}else{
									//include("modules/guest/staff.php");
									include("modules/profile.std.php");
								}
				break;
				case "reserv" : 
								if($_SESSION['staff']){
									include("modules/admin/reserv.php");
								}else{
									include("modules/student/reserv.php");//MEMBER
								}
				break;				
				case "setting" : include("modules/admin/setting.php"); break;
				case "student" : include("modules/admin/student.php");break;
				case "std" : include("modules/student/data.std.php");break;
				case "enroll" : include("modules/student/guide.php");break;
				case "guide" : include("modules/student/guide2.php");break;
				case "report" :include("modules/student/reserv.report.php");break;
				case "graphs" : include("modules/admin/graphs.php");break;
				case "static" : include("modules/guest/static.php");break;
				case "search" : include("modules/guest/search.php");break;
				default : include("modules/guest/news.php");break;
		}
	}

function active_menu($link_chk,$default_active=0){
	if($default_active==1){
		return (substr($_SERVER['QUERY_STRING'],4)==$link_chk||$_SERVER['QUERY_STRING']=="")?"active":"";
	}else {
		return (substr($_SERVER['QUERY_STRING'],4)==$link_chk)?"active":"";
	}
}
function active_menu_head($link_chk,$default_active=0){
	if($default_active==1){
		return (substr($_SERVER['QUERY_STRING'],4)==$link_chk||$_SERVER['QUERY_STRING']=="")?"active-head":"";
	}else {
		return (substr($_SERVER['QUERY_STRING'],4)==$link_chk)?"active-head":"";
	}
}
function active_VIP(){
	$explode = explode("&", $_SERVER["QUERY_STRING"]);
	return (substr($_SERVER['QUERY_STRING'],4)=="addnews"||substr($explode[0],4)=="editnews")?"active":"";
}
function dateTH(){
	$week = array("อาทิตย์" , "จันทร์" , "อังคาร" , "พุธ" , "พฤหัสบดี" , "ศุกร์" , "เสาร์");
	$month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

	$w = $week[date("w")];//W
	$d = date("d");
	$m = $month[date("n")-1];
	$y = date("Y")+543;

	//$t = date("H : i : s");
	return array($d,$m,$y);
}
function alert($str){
	echo '<script type="text/javascript">alert("'.$str.'")</script>';
}
function userLogin(){
	if(session_is_registered("staff")||session_is_registered("student")){
		return true;
	}else{
		return false;
	}
}
function sessionLogin(){
	if(session_is_registered("student")){
		return 0;
	}else if(session_is_registered("staff")){
		return 1;
	}else {
		return -1;	
	}
}
function who_is_type($str){
	$sql = "SELECT type FROM staff WHERE staffID = '".$_SESSION['staff']."' LIMIT 1";
	$str->mysql_query($sql);
	while ($row = mysql_fetch_assoc($str->result)){
		return $row;
	}
}
function who_is_name($str){
	$sql = "SELECT staffID FROM staff WHERE staffID = '".$_SESSION['staff']."' LIMIT 1";
	$str->mysql_query($sql);
	while ($row = mysql_fetch_assoc($str->result)){
		return $row;
	}
}
function dateThai($strDate){
	$strYear = date("Y",strtotime($strDate))+543;
	$strMount = date("n",strtotime($strDate));
	$strDay = date("j",strtotime($strDate));
	$strHour = date("H",strtotime($strDate));
	$strMinute = date("i",strtotime($strDate));
	$strSeconds = date("s",strtotime($strDate));
	$strMountCut = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMountThai = $strMountCut[$strMount];
	return "$strDay $strMountThai $strYear เวลา $strHour:$strMinute";
}
function dateThai2($strDate){
	$strYear = date("Y",strtotime($strDate))+543;
	$strMount = date("n",strtotime($strDate));
	$strDay = date("j",strtotime($strDate));
	$strMountCut = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMountThai = $strMountCut[$strMount];
	return "$strDay $strMountThai $strYear";
}
?>