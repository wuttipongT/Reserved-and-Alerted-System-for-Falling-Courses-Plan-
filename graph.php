<?	
	class Graph{
		//protected $st = array();
		
		protected $isVisited = array();
		protected $index = array();
		protected $adjMatrix;
		protected $_length;
		public $relate = array();
		
		public function __construct($adjMatrix){
			foreach($adjMatrix as $i => $val){
				$this->index[] = $i;
			}
			$this->adjMatrix = $adjMatrix;
			$this->_length = sizeof($this->adjMatrix);
			$this->initVisited();
			
		}
		protected function initVisited(){
			for ($i = 0; $i < $this->_length; $i++) {
				$this->isVisited[$i] = 0;
			}
		}
		public function depthFrrst($vertex){
			//echo self::$st;
			//array_push($this->st,$vertex);//b
				$this->isVisited[$vertex] = 1;
				
				$this->relate[] = $vertex;
				for($i=0 ;$i< $this->_length;$i++){//b,0
					if(($this->adjMatrix[$vertex][$i] == 1) && !$this->isVisited[$i]){
						
					//	array_push($this->st,$v);//
					//	$this->isVisited[$i] =1;//a
						$this->depthFrrst($this->index[$i]);
					}
					
				}
			/*while(!empty($this->st)){//!empty(self::$st)
				
				$this->isVisited[$vertex] =1;
					echo "ck\n";
	
				//$v = array_pop($this->st);//bb self::$st
			//	echo $v." ";
				
				
			}*/
		}
		public function __destruct(){
			array_diff($this->relate, array(''));
			echo "<br/>";
		}
	}  
?>