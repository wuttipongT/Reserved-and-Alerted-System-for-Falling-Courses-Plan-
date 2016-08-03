<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="JavaScript:void(0)" onclick="" style="z-index: 7;">ผลการค้นหา</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<?
	$id = $_POST['key'];
	$type = $_POST['type'];
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	$database = new database($host, $username, $password,$dbname);
	$category[1] = 'หมวดศึกษาทั่วไป';
	$category[2] = 'หมวดวิชาเฉพาะด้าน';
	$category[3] = 'หมวดวิชาเลือกเสรี';
	$category[4] = 'หมวดฝึกงาน';

	$group[1] = 'กลุ่มวิชาแกนคณะ';
	$group[2] = 'กลุ่มวิชาพื้นฐานเอก';
	$group[3] = 'กลุ่มวิชาเอกบังคับ';
	$group[4] = 'กลุ่มวิชาเอกเลือก';


	if($type == 0 OR $type == 1){
	$sql = "";
		if($type == 0){
			$sql = "SELECT * FROM subject WHERE subCode='$id' AND courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) LIMIT 1";
		}else if($type == 1){
			$sql = "SELECT * FROM subject WHERE subName='$id' AND courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) LIMIT 1";

		}
	echo '<b style="margin-left:10px;">คำค้นหา</b> '.$id.'<hr style="opacity:.1;-moz-opaciry:.1;khtml-opacity:.1;filter:alphar(opacity=10);width:98%;"/>';
	$database->mysql_query($sql) or die (mysql_error());
	if($database->mysql_num_rows() >0){
	$data = $database->mysql_fetch_assoc();
	
?>
<style>
	#tb-search{
		table-layout:fixed;word-break:break-word;margin: auto;border:none !important;
		
	}
	#tb-search td{
		border:none !important;
	}
	#tb-search tr:hover{
		background-color:transparent;
	}
</style>
<div class="hi5">
	<table id="tb-search">
		<tr>
			<td width="25%">รหัสวิชา</td><td><?=$data['0']['subCode']?></td>
		</tr>
		<tr>
			<td>ชื่อวิชา</td><td><?=$data['0']['subName']?></td>
		</tr>
		<tr>
			<td>ชื่อวิชาภาษาอังกฤษ</td><td><?=$data['0']['subNameeng']?></td>
		</tr>
		<tr>
			<td valign="top">คำอธิบายรายวิชา</td><td><?=$data['0']['explain']?></td>
		</tr>
		<tr>
			<td valign="top">คำอธิบายรายวิชา (EN)</td><td><?=$data['0']['explaineng']?></td>
		</tr>
		<tr>
			<td>หน่วยกิต</td><td><?=$data['0']['credit']?></td>
		</tr>
		<tr>
			<td>หมวดหมู่</td><td><?=$category[($data['0']['category']-1)]?></td>
		</tr>
		<tr>
			<td>กลุ่ม</td><td><?=$group[$data['0']['group_']]?></td>
		</tr>
		<tr>
			<td>หลักสูตร</td><td><?=$data['0']['courses']?></td>
		</tr>
	</table>
	<?
		if($type == 1){
			$id = $data['0']['subCode'];
		}
	?>
		<br/>
	<b style="margin-left: 10px;">กราฟแสดงสถิต</b>
	<style>
		.back,
		.next{
			display:inline-block;
			border-color:transparent #ccc transparent transparent;
			border-width: 5px;
			border-style:solid;
			cursor:pointer;
		}
		.next{
			border-color: transparent transparent transparent #ccc; !importanct;
		}
		#year-search{
			display:inline;
		}
	</style>
	<div style="display:inline-block;">
		<div id="back-search" class="back"></div>&nbsp;
		<div id="year-search">&nbsp;</div>&nbsp;
		<div id="next-search" class="next"></div>
	</div>
	<font size="1" id="status-search">&nbsp;</font>
	<hr style="width: 95%;filter:alpha(opacity=10); -moz-opacity:.1; -khtml-opacity: .1; opacity: .1;"/>
	<div id="chart1" style="display:block;margin:auto;width: 340px;">
	</div>
	<div id="chart2" style="display:block;margin:auto;width: 340px;">
	</div>
	<script>
		$(function(){
			var year = (new Date).getFullYear()+543,
				id = "<?echo $id;?>";
			$('#year-search').text(year);
			aca = year;
			$('#chart1').html('<img src="chart/chart.graph.php?subID='+id+'&aca='+aca+'" />');
			$('#chart2').html('<img src="chart/chart.graph2.php?subID='+id+'&aca='+aca+'" />');
			$.ajax({
				url: 'php-script/pull.data.php',
				data: {id: id,aca: aca, is_ajax: 27},
				dataType: 'json',
				success:function(source){
					$('#status-search').text('ผ่าน : '+source['past']+' ไม่ผ่าน : '+source['fail']+' ทั้งหมด : '+source['all'])
				}
			});
			$("#back-search").click(function(){
				return year -= 1;
			});
			$("#next-search").click(function(){
				return year +=1;
			});
			$("#back-search, #next-search").click(function(e){
				$('#year-search').text(e.result);
					aca = e.result;
					$('#chart1').html('<img src="chart/chart.graph.php?subID='+id+'&aca='+aca+'" />');
					$('#chart2').html('<img src="chart/chart.graph2.php?subID='+id+'&aca='+aca+'" />');
					$.ajax({
						url: 'php-script/pull.data.php',
						data: {id: id,aca: aca, is_ajax: 27},
						dataType: 'json',
						success:function(source){
							$('#status-search').text('ผ่าน : '+source['past']+' ไม่ผ่าน : '+source['fail']+' ทั้งหมด : '+source['all'])
						}
					});
			});
		})(Jquery);
	</script>
	</div>
	<?
		}else{
			echo '<label style="margin-left: 20px;">ไม่พบคำค้น!</label>';
		}
	}else if($type== 2){ //Category
		$key = getIndex($category, $id);
		echo '<b style="margin-left:10px;">คำค้นหา</b> '.$category[$key].'<br/>';
		
		$sql = "SELECT DISTINCT group_ FROM subject WHERE category='".$key."' ";
		$irs = $database->mysql_query($sql) or die(mysql_error());
		if($database->mysql_num_rows() > 0){
			$db = new database($host, $username, $password,$dbname);
			echo "<div class=\"hi5\">";
			while($data = mysql_fetch_assoc($irs)){
				echo "&nbsp;&nbsp;&nbsp;&nbsp;".$group[$data['group_']];
				$sql2 = "SELECT subID, subject.subCode, subject.subName,subject.credit,subject.courses FROM subject JOIN courses ON  subject.courses=courses.update_ WHERE subject.group_ = '".$data['group_']."' AND courses.update_=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) AND subject.category='$key';";
				echo '<table><tr class="th"><th width="10%">รหัสวิชา</th><th>รายวิชา</th><th width="12%">หน่วยกิต</th></tr>';
				$rs = $db->mysql_query($sql2) or die(mysql_error());
				while($data = mysql_fetch_assoc($rs)){
					echo '<tr onClick="fnc_s('.$data['subID'].','.$data['courses'].')"><td align="center">'.$data['subCode'].'</td><td style="text-indent:5px;">'.$data['subName'].'</td><td align="center">'.$data['credit'].'</td></tr>';
				}echo '</table>';
			}
			echo "</div>";
		}else {
			echo '<hr/>ไม่มีรายวิชาในหมวดนี้';
		}
	}else if($type == 3){//group
			$key = getIndex($group, $id);
			echo '<b style="margin-left:10px;">คำค้นหา</b> '.$group[$key].'<br/>';
			$db = new database($host, $username, $password,$dbname);
				$sql2 = "SELECT subID, subject.subCode, subject.subName,subject.credit,subject.courses FROM subject JOIN courses ON  subject.courses=courses.update_ WHERE subject.group_ = '".$key."' AND courses.update_='2548'";
				echo '<table><tr class="th"><th width="10%">รหัสวิชา</th><th>รายวิชา</th><th width="12%">หน่วยกิต</th></tr>';
				$rs = $db->mysql_query($sql2) or die(mysql_error());
				while($data = mysql_fetch_assoc($rs)){
					echo '<tr onClick="fnc_s('.$data['subID'].','.$data['courses'].')"><td align="center">'.$data['subCode'].'</td><td style="text-indent:5px;">'.$data['subName'].'</td><td align="center">'.$data['credit'].'</td></tr>';
				}echo '</table>';
	}
		function getIndex($arr, $id){
			foreach($arr as $i => $data){
				if($data == $id){
					return $i;
				}
			}
		}
		function getCourses($id){
		//	require 'config.inc/config.inc.php';
		//	require 'config.inc/database.php';
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
			$db_fn = new database($host, $username, $password,$dbname);
			$sql = "SELECT update_ FROM courses WHERE coursesID='$id' LIMIT 1";
			$db_fn->mysql_query($sql) or die(mysql_error());
			$data = $db_fn->mysql_fetch_assoc();
			return $data['0']['update_'];
		}
		
	?>
<style>
	table{width:600px;height:auto; ; border-collapse:collapse; word-wrap:break-word;table-layout:fixed;margin:auto;margin: 10px auto;}
	table td,
	table th{vertical-align:top;border:1px solid #ccc;}
	tr:hover:not(.th){
		background-color:#ccc;
		cursor:pointer;
	}
</style>
<script>
	function fnc_s($id,$c){
		window.location.href='?mod=static&id='+$id+'&courses='+$c;
	}
$(function(){

 x = $('#content #bottom').height();
 y = $('.hi5').height();

 if(y > x){
//	sum = x+y;
	$('#content #bottom').css('height', (y+100));
 }
})(jQuery)
</script>