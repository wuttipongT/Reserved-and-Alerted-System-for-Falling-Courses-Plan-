<?php 
//PHP Language: OOP
//error_reporting(E_ALL);
	class database{
		private $charset="utf8";
		private $result;
		private $_fetch_array = array();// case use data more one
		private $_fetch_assoc = array();//case use data only
		private $conn;
		private $dbconfig = array(	'HOST'=>NULL,
													'USER'=>NULL,
													'PASSWORD'=>NULL,
													'DBNAME'=>NULL);
		public function __construct($host,$user,$pw,$dbName){
			$this->dbconfig["HOST"] = $host;
			$this->dbconfig["USER"] = $user;
			$this->dbconfig["PASSWORD"] = $pw;
			$this->dbconfig["DBNAME"] = $dbName;
			$this->mysql_connect();// conn to database
		}
		public function mysql_connect(){
			$this->conn=mysql_connect($this->dbconfig['HOST'],$this->dbconfig['USER'],$this->dbconfig['PASSWORD']);

			if(!$this->conn){
				die(mysql_error());
			}else{
				mysql_query("SET NAMES ".$this->charset);
				mysql_select_db($this->dbconfig['DBNAME']);
			}

		}
		public function mysql_query($str){
			$this->result = mysql_query($str);
			return $this->result;
		}
		public function mysql_fetch_array(){
			if(count($this->_fetch_array)>0){
				return $this->_fetch_array;
			}else {
				while ($row = mysql_fetch_array($this->result)){
					$this->_fetch_array[] = $row;
				}return $this->_fetch_array;
			}
		}
		public function mysql_fetch_assoc(){
			while($row = mysql_fetch_assoc($this->result)){
					$this->_fetch_assoc[] = $row;
			}return $this->_fetch_assoc;
		}
		public function mysql_num_rows(){
			return mysql_num_rows($this->result);
		}
		public function getData($attibute){
			foreach($this->mysql_fetch_assoc() as $value){
				return $value[$attibute];
			}
		}
		function insertInto (){
			$strSQL = "INSERT INTO $this->strTable ($this->strField)VALUES($this->strValue)";
			return mysql_query($strSQL);
		}
		function selectRecode(){
			$strSQL = "SELECT $this->strField FROM $this->strTable WHERE $this->strCondition";
			$objQuery = @mysql_query($strSQL);
			return @mysql_fetch_assoc($objQuery);
		}
		function updateRecode(){
			$sqlSQL = "UPDATE $strTable SET $this->strCommand WHERE $this->strCondition";
			return @mysql_query($sqlSQL);
		}
		function deleteRecode(){
			$strSQL = "DELETE FROM $this->strTable WHERE $this->strCondition";
			return @mysql_query($strSQL);
		}
		function __destruct(){
			return @mysql_close($this->conn);
		}
	}
	
?>