<?
	require_once '../../config.inc/config.inc.php';
	require_once '../../config.inc/database.php';

	$obj = new database(HOST, USER, PASSWORD, DBNAME);
	$result = $obj->mysql_query('SELECT * FROM prerequisite WHERE courses=1');
	$arr = array();
	if($result){
		foreach($obj->mysql_fetch_assoc() as $data){
			$i = $data['subID'];
			list($length, $value) = get_num_rows($i);
			if($length > 1){
				$arr[$i] = $value;
			}else{
				$arr[$i] = $data['subPre'];
			}
		}
	}
print_r($arr);
	//prerequisite("1204304", $arr);
	 function prerequisite($sub_code, $arr){
		 if(array_key_exists($sub_code, $arr)){
			if(is_array($arr[$sub_code])){
				print_r($arr[$sub_code]);
			}else {
				echo $arr[$sub_code];
			}
		 }
	 }
	function get_num_rows($key){
		require_once '../../config.inc/config.inc.php';
		require_once '../../config.inc/database.php';
		$obj = new database(HOST, USER, PASSWORD, DBNAME);

		$rs = $obj->mysql_query("SELECT subPre FROM prerequisite WHERE subID='$key'");
		if($rs){
			$length = $obj->mysql_num_rows(); 
			if($length >1){
				return array($length, $obj->mysql_fetch_assoc());
			}
		}
			
	}
?>

