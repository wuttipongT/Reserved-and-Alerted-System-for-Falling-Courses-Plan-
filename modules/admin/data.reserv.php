
<table style="border-collapse:collapse;width:600px;text-align:center;margin:auto auto;border:1px solid #ccc;table-layout:fixed;"> 
    <tr class="never">
		<th class="th">วิชา</th>
		<th class="th" width="9%">จำนวน</th>
		<th class="th" width="9%">แก้ไข</th>
		<th class="th" width="9%">รายงาน</th>
	</tr>
    <?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$objDB = new database($host, $username, $password, $dbname);
	$acadyear = $_GET['aca'];
	$semester = $_GET['sem'];
	
	$sql = "SELECT * FROM reservation WHERE semester='$semester' AND acadyear='$acadyear' ";
	$objDB->mysql_query($sql);
	if($objDB->mysql_num_rows() > 0){
	foreach($objDB->mysql_fetch_assoc() as $index => $value){?>
    <tr>
        <td class="td" align="left">
			  <div class='popbox'>
    <a class='open' href="JavaScript:void(0)">
       <?=$value['subject']?>
    </a>

    <div class='collapse'>
      <div class='box'>
        <div class='arrow'></div>
        <div class='arrow-border'></div>

<button class="btn_info" onclick="JavaScript:fnc_info(<?=$value['reservID'];?>)">Info</button>
<button class="btn_reserv" onClick="JavaScript:fnc_data(<?=$value['reservID'];?>)">ข้อมูลสำรองที่นั่ง</button>

      </div>
    </div>
  </div>
		</td>
		<td class="td"><?=get_num_rows($value['reservID'])?></td>
        <td class="td">
			<a href="JavaScript:void(0)" onClick="JavaScript:fnc_edit(<?=$value['reservID'];?>)">
				<i class="icon-edit"></i>
			</a>
		</td>
         <td class="td"><a href="JavaScript:void(0)" onclick="fnc_report(<?=$value['reservID'];?>)"><i class="icon-file"></i></a></td> 
    </tr>
    <?}}else{?>
	<tr><td class="td" colspan="4">ไม่มีข้อมูล</td></tr>
	<?}?>
</table>
<?
	function get_num_rows($key){
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
		require_once '../../config.inc/database.php';

		$obj = new database($host, $username, $password,$dbname);
		$sql = "SELECT * FROM reserv WHERE reservID = $key";
		$rs = $obj->mysql_query($sql);
		if($rs){
			return $obj->mysql_num_rows();
		}
	}
	?>

