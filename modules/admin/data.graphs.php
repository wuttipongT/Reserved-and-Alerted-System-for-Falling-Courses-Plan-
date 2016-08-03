
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';

	$obj = new database($host, $username, $password, $dbname);
	//$result = $obj->mysql_query("SELECT subCode FROM subject WHERE courses='$_GET[courses]' ") or die(mysql_error());

	$result = $obj->mysql_query("SELECT subCode FROM subject WHERE courses='$_POST[courses]' ;");
	$matrix = array();
	if($result){
		$subID = array();
		$subPre = array();
		while($data = mysql_fetch_assoc($result)){
			$subID[] = $data['subCode'];
			$subPre[] = $data['subCode'];
		}
		foreach($subID as $sub){
			foreach($subPre as $pre){
				$matrix[$sub][] = check_pre($obj, $sub, $pre, $_POST['courses']);
			}
		}
		
		$grapsh = new Graph($matrix);
		$grapsh->depthFirst($_POST['subjectID']);
		echo '<br/><table id="tb-graph" style="width: 93%;margin:auto;table-layout:fixed;"><thead><tr><td width="50">ลำดับที</td่><td width="360">โหนด</td><td>โหนดเพื่อนบ้าน</td></tr></thead>';
		if(sizeof($grapsh->relate) == 1){
			echo '<tr><td colspan="3">ไม่พบความสัมพันธ์รายวิชา</td></tr>';
		}else{
		foreach($grapsh->relate as $i => $data){
			echo '<tr><td>'.($i+1).'</td><td align="left" style="text-align:left;">&nbsp;'.$data." (".getSubName($obj, $data, $_POST['courses']).') </td><td style="text-align:left;">';
				$find = array2DSearch($grapsh->neighbours, $data);
				// แสดงผลการค้นหา
				foreach ($find as $key => $array) {
					foreach ($array as $k => $v) {
						//echo 'Found at : [', $key, '][', $k, ']', '<br />';
						if($data != $v)
							echo '&nbsp;'.$v." ";
					}
				}	
			
			echo '</td></tr>';
		}}
		echo '</table>';
	}else{
		die(mysql_error());
	}
	function getSubName($db, $str, $c){
		$sql = "SELECT subName FROM subject WHERE subCode='$str' AND courses='$c' LIMIT 1";
		$rs = $db->mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_assoc($rs);
		return $data['subName'];
	}

function check_pre($db, $sub, $pre, $courses){
	$sql = "SELECT * FROM prerequisite WHERE subID='$pre' AND subPre='$sub' AND courses='$courses' LIMIT 1";
	$rs = $db->mysql_query($sql) or die(mysql_error());
	return mysql_num_rows($rs);
}

	function array2DSearch($arrays, $needle)
	{
		$retarr = array();
		foreach ($arrays as $key => $value) {
			foreach ($value as $k => $v) {
				// ตรวจสอบตัวที่ต้องการค้นหากับ ค่าใน array
			
				if($needle == $v)
					// เก็บค่าตัวที่ต้องการลง array
					$retarr[$key][$k] = $value['neighbours'];
				
				// ค้นหาตำแหน่งของ comma
				$pos = strpos($v, ',');
				
				// ถ้าตำแหน่ง ไม่เท่ากับ false
				if($pos !== false) {
					// เก็บค่าตัวที่ต้องการลง array
					$retarr[$key][$k] = $value['neighbours'];;
				}
			}
		}
		
		return $retarr;
	}
	
	//echo '<pre>'; print_r($find); echo '</pre>';
	
class Graph{
	//protected $st = array();
	
	protected $isVisited = array();
	protected $index = array();
	protected $adjMatrix;
	protected $_length;
	public $relate = array();
	public $neighbours = array();
	public function __construct($adjMatrix){
		foreach($adjMatrix as $i => $val){
			$this->index[] = $i;
		}
		//print_r($this->index);
		$this->adjMatrix = $adjMatrix;
		$this->_length = sizeof($this->adjMatrix);
		$this->initVisited();
		
	}
	protected function initVisited(){
		for ($i = 0; $i < $this->_length; $i++) {
			$this->isVisited[$i] = 0;
		}
	}
	public function depthFirst($vertex){
		//echo self::$st;
		//array_push($this->st,$vertex);//b
			$this->isVisited[$vertex] = 1;
			$this->relate[] = $vertex;
			for($i=0 ;$i< $this->_length;$i++){//b,0
				if(($this->adjMatrix[$vertex][$i] == 1) && !$this->isVisited[$i]){
					
				//	array_push($this->st,$v);//
				//	$this->isVisited[$i] =1;//a
					$this->depthFirst($this->index[$i]);
					$this->neighbours[] = array('vertex'=>$vertex, 'neighbours'=>$this->index[$i]);
						
					
				}
				
			}
		/*while(!empty($this->st)){//!empty(self::$st)
			
			$this->isVisited[$vertex] =1;
				echo "ck\n";

			//$v = array_pop($this->st);//bb self::$st
		//	echo $v." ";
			
			
		}*/
	}
	public function findNeighbours($v){
		$str = array();
		foreach($this->neighbours as $i => $val){
			if($v == $val['vertex']){
				$str[] = $val['neighbours'];
				return $str;
			}
		}
	}
	public function __destruct(){
		//array_diff($this->relate, array(''));
		//echo "<br/>";
	}
}  
?>