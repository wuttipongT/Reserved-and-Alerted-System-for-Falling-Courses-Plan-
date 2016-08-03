<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$courses = $_GET['courses'];
	//$subCode = $_GET['subCode'];
	$obj = new database($host, $username, $password,$dbname);
	$obj2 = new database($host, $username, $password,$dbname);
	$result = $obj->mysql_query('SELECT subCode FROM subject WHERE courses='.$courses);
	$arr = array();
	if($result){
		$subID = array();
		$subPre = array();
		foreach($obj->mysql_fetch_assoc() as $i => $data){
			//$subID[] = $data['subCode'];
			//$subPre[] = $data['subCode'];
			$i +=1;
			$arr[] = array(
					'vertex'=> $i,
					'visited'=> false,
					'letter'=> $data['subCode'],
					'neighbours'=>check_pre2($obj2, $data['subCode'], $courses)
			);
		}
		/*
		foreach($subID as $sub){
			foreach($subPre as $pre){
				$arr[$sub][$pre] = check_pre($obj2, $sub, $pre, $courses);
			}
		}*/
	}
//	echo $arr['0201101']['0201100'];
	//print_r(search_array("0201101" ,$arr));
//	print_r($arr);

	$a = breadthFirstSearch(array($_GET['sub_id']), $arr);
	echo json_encode($a);
/*	$b = breadthFirstSearch($a, $arr);
	$c = breadthFirstSearch($b, $arr);
	$d = breadthFirstSearch($c, $arr);
	$e = breadthFirstSearch($d, $arr);*/


	$row = array();
	$col = array();
	$value = array();
	foreach($arr as $destination => $arr2){
		$row[] = $destination;
		$col[] = $destination;
		foreach($arr2 as $data){
			$value[] = $data;
		}
	}
/*
$original = array( 'a','b','c','d','e' );
$inserted = array( 'x' );

array_splice( $original, 0, 0, $inserted ); // splice in at position 3
// $original is now a b c x d e
	echo '<table border="1" style="float:left;"><tr><td>Vertex</td></tr>';
	foreach($col as $d){
		echo '<tr><td>'.$d.'</td></tr>';
	}
	echo '</table>';
	echo '<table border="1" style="float:left;"><tr>';
	$count_row = count($row);
	$i = 0;
	$count_val = count($value)/$count_row;
	foreach($row as $subPre){
		echo '<td>'.$subPre.'</td>';
		if($i == $count_row-1){
			echo '</tr><tr>';	
			foreach($value as $d => $k){
				echo '<td>'.$k.'</td>';
				$d +=1;
				if($d%$count_val == 0){
					echo '</tr>';
				}
			
			}
		}
		$i++;
	}
	
	echo '</table>';*/
function breadthFirstSearch($letter,$list)
{
    $queue = array();
   // array_unshift($queue, $list);

   while(list($index, $vertex)= each($list)){
		foreach($letter as $i => $v){
			if(in_array($v, $vertex['neighbours'])){
				$queue[] = $vertex['letter'];
			}
		}
   }
   return $queue;
   // print_r($list);
}
	function check_pre($obj2, $sub, $pre, $courses){
			$sql = "SELECT * FROM prerequisite WHERE subID='$sub' AND subPre='$pre' AND courses=".$courses." LIMIT 1";
			$rs = $obj2->mysql_query($sql) or die(mysql_error());
			return $reccode = $obj2->mysql_num_rows();
	}
	function check_pre2($obj2, $sub, $courses){
			$sql = "SELECT subPre FROM prerequisite WHERE subID='".$sub."' AND courses=".$courses;
			$rs = $obj2->mysql_query($sql) or die(mysql_error());
			$arr = array();
			//return $reccode = $obj2->mysql_num_rows();
			while($data = mysql_fetch_assoc($rs)){
				$arr[] = $data['subPre'];
			}return $arr;
	}
	function alert($str){
		echo '<script>alert("'.$str.'")</script>';
	}
	function search_array($pathen,$arr){  
		$arr_result=array();  
		if(count($arr)>0){  
			foreach($arr as $key=>$value){
				foreach($value as $index => $val){
					if(preg_match("@".$pathen."@i",$index)){  
						if($val == "1"){
							$arr_result[$key][$index]=$val;
						}
					}
				}  
			}  
			return $arr_result;  
		}  
	}  
?>