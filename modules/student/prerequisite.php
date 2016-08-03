<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$courses = $_GET['courses'];
	$subCode = $_GET['subCode'];
	$obj = new database($host, $username, $password,$dbname);
	$result = $obj->mysql_query('SELECT * FROM prerequisite WHERE courses='.$courses);
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
	echo json_encode( search_array($subCode,$arr) );
	function search_array($pathen,$arr){  
		$arr_result=array();  
		if(count($arr)>0){  
			foreach($arr as $key=>$value){  
				if(preg_match("@".$pathen."@i",$key)){  
					$arr_result[$key]=$value;  
				}  
			}  
			return $arr_result;  
		}  
	}  
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
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
		require_once '../../config.inc/database.php';
		$obj = new database($host, $username, $password,$dbname);

		$rs = $obj->mysql_query("SELECT subPre FROM prerequisite WHERE subID='$key'");
		if($rs){
			$length = $obj->mysql_num_rows(); 
			if($length >1){
				return array($length, $obj->mysql_fetch_assoc());
			}
		}
			
	}
?>