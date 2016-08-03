	<? if(!$_SESSION["student"]){ alert("เพจนี้สำรหับนิสิต ขออภัยในความไม่สะดวก!");header("Location: index.php");}?>
	<style>
		/*#tb-data-std{
			border-collapse:collapse;
			word-break:break-word;
			table-layout:fixed;
			width: 95%;
			margin:auto;
		}
		#tb-data-std td{
			border: 1px solid #ccc;
			padding: 5px;
		}*/
	table {
	width: 100%;
  margin: 25px auto;
  border-collapse: collapse;
  border: 1px solid #eee;
  border-bottom: 2px solid #00cccc;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1), 0px 10px 10px rgba(0, 0, 0, 0.05), 0px 10px 10px rgba(0, 0, 0, 0.01), 0px 10px 10px rgba(0, 0, 0, 0.01);
}
table tr:hover td {
  color: #333;
}
table th, table td {
  color: #999;
  border: 1px solid #eee;
  padding: 8px 10px;
  border-collapse: collapse;
}
table th {
  background: #00cccc;
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
}
table th.last {
  border-right: none;
}

tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}
	</style>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=std" onclick="" style="z-index: 7;">ข้อมูลนิสิต</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
	<table id="tb-data-std">
		<?
			//list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
			//require_once 'config.inc/database.php';
			list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
			require_once 'config.inc/database.php';
			$obj2 = new database($host, $username, $password, $dbname);
			$sql = "SELECT student.*,_status.des FROM student RIGHT JOIN _status ON student.status=_status.code ";
			$sql .= "WHERE studentCode='".$_SESSION['student']."' LIMIT 1";
			$rs = $obj2->mysql_query($sql) or die(mysql_error());
			if($obj2->mysql_num_rows() >0){
				while($data = mysql_fetch_assoc($rs)){
					$html = "<tr><td width=\"30%\">รหัสนิสิต</td><td>".$data['studentCode']."</td></tr>";
					$html .= "<tr><td>คำนำหน้า</td><td>".$data['preName']."</td></tr>";
					$html .= "<tr><td>ชื่อ</td><td>".$data['name']."</td></tr>";
					$html .= "<tr><td>สกุล</td><td>".$data['sername']."</td></tr>";
					$html .= "<tr><td>สถานะ</td><td>".$data['des']."</td></tr>";
					$html .= "<tr><td>หมายเลขบัตรประจำประชาชน</td><td>".$data['citizenID']."</td></tr>";
					$html .= "<tr><td>ระดับ</td><td>".$data['level']."</td></tr>";
					$html .= "<tr><td>ปีที่เข้า</td><td>".$data['admitacadyear']."</td></tr>";
					echo $html;
				}
			}else{
				echo "<tr><td style=\"text-align:center;\" >ไม่มีข้อมูล</td></tr>";
			}
		?>
		</table>
