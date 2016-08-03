<?
	error_reporting(E_ALL);
	include("config.inc/config.inc.php");
	include("config.inc/database.php");

	$db = new database(HOST,USER,PASSWORD,"courses_2548");
	$sql = "SELECT pre.*,subject.* FROM pre ";
	$sql .= "INNER JOIN subject ON pre.subID=subject.subID WHERE pre.subID='0201101'";
	$db->mysql_query($sql);
	foreach($db->mysql_fetch_assoc() as $data){
		//echo $data['subID']." ".$data['subPreID'];
	}
//	$sql = " SELECT category.*,subject.* FROM category ";
//	$sql .= "LEFT JOIN subject ON category.subID=subject.subID ";
//	$sql .="LEFT JOIN main ON category.mainID=main.mainID ";
//	$sql .="LEFT JOIN spacific ON main.mainID=spacific.spacID ";
//	$sql .="LEFT JOIN major ON spacific.spacID=major.spacID ";
//	$sql .="LEFT JOIN major_elective ON major_elective.majID=major.majID ";

	/*$sql = "SELECT * FROM main ";
	$db->mysql_query($sql);
	foreach($db->mysql_fetch_assoc() as $value){
		echo $value['mainID']." ".$value["name"]."<br>";
		if($value['mainID']==2){
			$sql = "SELECT * FROM spacific LIMIT 2" ;
			$db->mysql_query($sql);
			foreach($db->mysql_fetch_assoc() as $value){
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".@$value["spacID"].@$value["spacName"]." ".@$value["spacCredit"]."<br>";
					if(@$value["spacID"]==2){
						$sql = "SELECT * FROM major" ;
						$db->mysql_query($sql);
						foreach($db->mysql_fetch_assoc() as $value){
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".@$value["marjorName"]." ".@$value["majorCredit"]."<br>";

							if(@$value['majID']==3){
								$sql = "SELECT * FROM major_elective " ;
								$db->mysql_query($sql);
								foreach($db->mysql_fetch_assoc() as $value){
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".@$value["majorEName"]."<br>";
								}
							}
						}
					}
			}
		}
	}*/
?>