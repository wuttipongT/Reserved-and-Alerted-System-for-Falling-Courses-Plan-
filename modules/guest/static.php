<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=static&id=<?=$_GET['id']?>" onclick="" style="z-index: 7;">รายละเอียดรายวิชา</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<?
	$id = $_GET['id'];
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';
	$database = new database($host, $username, $password,$dbname);
	$sql = "SELECT * FROM subject WHERE subID='$id' AND courses=$_GET[courses] LIMIT 1";
	$database->mysql_query($sql) or die (mysql_error());
	$data = $database->mysql_fetch_assoc();
	$category[] = "หมวดศึกษาวิชาทั่วไป";
	$category[] = "หมวดวิชาเฉพาะด้าน";
	$category[] = "หมวดวิชาเลือกเสรี";
	$category[] = "หมวดฝึกงาน";
	$group[] = "กลุ่มวิชาแกนคณะ";
	$group[] = "กลุ่มวิชาพื้นฐานเอก";
	$group[] = "กลุ่มวิชาเอกบังคับ";
	$group[] = "กลุ่มวิชาเอกเลือก";
?>
	<table style="table-layout:fixed;word-break:break-word;margin:5px;">
		<tr>
			<td width="20%">รหัสวิชา</td><td><?=$data['0']['subCode']?></td>
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
			<td>หลักสูตร</td><td><?=getCourses($data['0']['courses'])?></td>
		</tr>
	</table>
	<?
		$id = $data['0']['subCode'];
		
		function getCourses($id){
		//	require 'config.inc/config.inc.php';
		//	require 'config.inc/database.php';
			list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
			require_once 'config.inc/database.php';
			$db_fn = new database($host, $username, $password,$dbname);
			$sql = "SELECT update_ FROM courses WHERE coursesID='$id' LIMIT 1";
			$db_fn->mysql_query($sql) or die(mysql_error());
			$data = $db_fn->mysql_fetch_assoc();
			return $data['0']['update_'];
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