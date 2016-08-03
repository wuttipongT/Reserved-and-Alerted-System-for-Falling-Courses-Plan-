<?
	session_start();
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	require_once '../../config.inc/function.php';
	
	$obj = new database($host, $username, $password,$dbname);
	$obj2 = new database($host, $username, $password,$dbname);
	$aca = $_GET['aca'];
?>
<span style="display:block; text-align:center;">เทอม 1<span>
<table style="border-collapse:collapse;width:600px;text-align:center;margin:auto auto;table-layout:fixed;">
    <tr class="never"><th class="th" width="10%">ลำดับที่</th><th class="th">วิชา</th><th class="th" width="15%">เพิ่มเมื่อวันที่</th><th class="th" width="12%">สำรองที่นั่ง</th><th class="th" width="8%">ยกเลิก</th></tr>
    <?
	$sql = "SELECT reservID, subject, date_curr, date_end FROM reservation WHERE semester=1 AND acadyear = '$aca'";
	$obj->mysql_query($sql)or die(mysql_error());
	if($obj->mysql_num_rows() >0){
		foreach($obj->mysql_fetch_assoc() as $index => $value){?>
		<tr>
			<td class="td"><?=$index+1;?></td>
			<td class="td" align="left" style="cursor:pointer;" >		
	<div class='popbox'>
    <a class='open' href="JavaScript:void(0)">
       <?=$value['subject']?>
    </a>

    <div class='collapse'>
      <div class='box'>
        <div class='arrow'></div>
        <div class='arrow-border'></div>

<button class="btn_info" onclick="JavaScript:fnc_info(<?=$value['reservID'];?>)">Info</button>
<button class="btn_reserv" onclick="fnc_data(<?=$value['reservID']?>)">ข้อมูลสำรองที่นั่ง</button>

      </div>
    </div>
  </div>
			</td>
			<td class="td"><?=date_th($value['date_curr']);?></td>
			<td class="td"><a href="JavaScript:void(0)" onclick="JavaScript:fnc_reserv(<?=$value['reservID']?>,<?=$_SESSION['student']?>)"><i class="icon-edit"></i></a></td>
			 <td><i class="icon-remove" onClick="fnc_cancel('<?=$value['reservID']?>',<?=$_SESSION['student']?>)"></i></td>
		</tr>
		<?}?>
	<?}else {
		echo '<tr><td colspan="5">ไม่มีข้อมูล</td></tr>';
	}?>
</table>
<span style="display:block; text-align:center;">เทอม 2<span>
<table style="border-collapse:collapse;width:600px;text-align:center;margin:auto auto;table-layout:fixed;">
    <tr class="never"><th class="th" width="10%">ลำดับที่</th><th class="th">วิชา</th><th class="th" width="15%">เพิ่มเมื่อวันที่</th><th class="th" width="12%">สำรองที่นั่ง</th><th class="th" width="8%">ยกเลิก</th></tr>
    <?
	$sql2 = "SELECT reservID, subject, date_curr, date_end FROM reservation WHERE semester=2 AND acadyear = '$aca'";
	$obj2->mysql_query($sql2) or die(mysql_error());
	if($obj2->mysql_num_rows() >0){
		foreach($obj2->mysql_fetch_assoc() as $index => $value){?>
		<tr>
			<td class="td"><?=$index+1;?></td>
			<td class="td" align="left" style="cursor:pointer;" >
				<div class='popbox'>
    <a class='open' href="JavaScript:void(0)">
       <?=$value['subject']?>
    </a>

    <div class='collapse'>
      <div class='box'>
        <div class='arrow'></div>
        <div class='arrow-border'></div>

<button class="btn_info" onclick="JavaScript:fnc_info(<?=$value['reservID'];?>)">Info</button>
<button class="btn_reserv" onclick="JavaScript:fnc_data(<?=$value['reservID']?>)">ข้อมูลสำรองที่นั่ง</button>

      </div>
    </div>
  </div>
			</td>
			<td class="td"><?=date_th($value['date_curr']);?></td>
			<td class="td"><a href="JavaScript:void(0)" onclick="JavaScript:fnc_reserv(<?=$value['reservID']?>,<?=$_SESSION['student']?>)"><i class="icon-edit"></i></a></td>
			  <td><i class="icon-remove" onClick="fnc_cancel('<?=$value['reservID']?>','<?=$_SESSION['student']?>')"></i></td>
		</tr>
		<?}?>
	<?}else{
		echo '<tr><td colspan="5">ไม่มีข้อมูล</td></tr>';
	}?>
</table>
<style>
	.icon-remove{
		cursor: pointer;
	}
</style>
<?session_write_close();?>