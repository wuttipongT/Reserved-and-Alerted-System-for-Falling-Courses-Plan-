<?
	if($_POST['action'] == 'imageup'){
		$pic = $_FILES['resim']['name'];
		$taget = "../images/staff/".basename($pic);
		move_uploaded_file($_FILES['resim']['tmp_name'], $taget);
	}
?>