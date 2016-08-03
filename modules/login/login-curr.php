<?
	global $objDB;
	$user = $_POST["user"];
	$password = $_POST["password"];
	$typeLogin = $_POST["type_log"];
	if($typeLogin==0){ //student
		$sql = " SELECT email , password FROM member WHERE	stdID='$user' and password='".base64_encode($password)."' ";
		$objDB->mysql_query($sql);
		if($objDB->mysql_num_rows()){
			$_SESSION["login"] = $user;
			echo "<meta http-equiv=refresh content=0;URL=?page=member_profile";
		}else {
			echo "กรุณาตรวสสอบ UserName และ Password ของท่าน";
		}
	}else if($typeLogin==1){//staff
		$sql = "SELECT email , password , type FROM staff WHERE staffID='$user' and password='".base64_encode($password)."' ";
		$objDB->mysql_query($sql);
		if($objDB->mysql_num_rows()){
			$_SESSION["login"] = $user;
			$_SESSION["type"] = $db->getData("type");//admin(0) or lecturer(1)
			$adv = "SELECT advisor.staffID FROM staff INNER JOIN advisor ON (staff.staffID=advisor.staffID) WHERE email='$email' ";
			$lec = "SELECT lecturer.staffID FROM staff INNER JOIN lecturer ON (staff.staffID=lecturer.staffID) WHERE email='$email' ";
			if($_SESSION["type"]==1){
				$objDB->mysql_query($adv);
				if($objDB->mysql_num_rows()){
					$_SESSION["advisor"]= $db->mysql_num_rows();
				}	
				$objDB->mysql_query($lec);
				if($objDB->mysql_num_rows()){
					$_SESSION["lecturer"] = $db->mysql_num_rows();
				}
			}
			echo "<meta http-equiv=refresh content=0;URL=?page=staff_profile>";
		}else {
			echo "กรุณาตรวสสอบ UserName และ Password ของท่าน";
		}
	}
?>