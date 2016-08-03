<?php
		global $objDB;
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$type = $_POST['type_log'];
		if($type==0){//student
			$sql = "SELECT stdID,password FROM member WHERE stdID='$user' AND password='".base64_encode($pass)."' LIMIT 1";
			$objDB->mysql_query($sql);
			if($objDB->mysql_num_rows()>0){
				$_SESSION['student'] = $user;
				echo "<meta http-equiv=refresh content=0;URL=?page=member_profile>";
			}
		}else if($type==1){//staff
			$sql = "SELECT staffID,password FROM staff WHERE staffID='$user' AND password='".base64_encode($pass)."' LIMIT 1";
			$objDB->mysql_query($sql);
			if($objDB->result){
				$sql = "SELECT name,type FROM staff LIMIT 1";	
				$objDB->mysql_query($sql);
				$typeStaff = $objDB->getData("type");
				if($typeStaff==0){//admin
					$_SESSION["admin"] = $user;
					echo "<meta http-equiv=refresh content=0;URL=?page=member_profile>";
				}else if($typeStaff==1){//teacher : advisor,lecturer
					$_SESSION["teacher"] = $user;
					echo "<meta http-equiv=refresh content=0;URL=?page=member_profile>";
				}
			}
		}
?>