<?
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$obj = new database(HOST, USER , PASSWORD, DBNAME);
	$is_ajax = $_POST['is_ajax'];
	if($is_ajax == 1){ //delete news
		$id = $_POST['id'];
		$rs = $obj->mysql_query("DELETE FROM news WHERE newsID='$id'");
		if($rs){
			echo '1';
		}
		
	}else if($is_ajax == 2){
		$id = $_POST['id'];
		$rs = $obj->mysql_query("DELETE FROM banner WHERE id='$id'");
		if($rs){
			$v = unlink("../images/banner/".$_POST['img']);
			if(!$v){
				echo "1\n".$v;
			}
		}else {
			echo "1\n".mysql_error();
		}
	}else if($is_ajax == 3){
		$sub = $_POST['sub'];
		$std = $_POST['std'];
		$sql = "SELECT * FROM reserv WHERE reservID='$sub' AND std_code='$std'";
		$obj->mysql_query($sql);
		if($obj->mysql_num_rows() > 0){
			$rs = $obj->mysql_query("DELETE FROM reserv WHERE reservID='$sub' AND std_code='$std'");
			echo "ยกเลิการสำรองที่นั่งเรียบร้อยแล้วค่ะ";
		}else {
			echo "ขออภัย: คุณยังไม่ได้ทำการสำรองที่ันั่ง";
		}
		
	}else if($is_ajax == 4){
		$id = $_POST['id'];
		$rs = $obj->mysql_query("DELETE FROM education WHERE id='$id'");
		if($rs){
			echo '1';
		}
	}
?>