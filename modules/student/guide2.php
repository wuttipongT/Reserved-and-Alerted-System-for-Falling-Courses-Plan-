<? if(!$_SESSION["student"]){ alert("เพจนี้สำรหับนิสิต ขออภัยในความไม่สะดวก!");header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=guide" onclick="" style="z-index: 7;">แนะนำแผนการเรียน</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style>

	table{
		border-collapse: collapse;
		table-layout:fixed;
		word-wrap:break-word;
		
	}
	table:not(#tb-detail) td{
		cursor:pointer;
	}
	table:not(#tb-detail) td,
	table:not(#tb-detail) th{
		border:1px solid #ccc;
		/*rgba(204,204,204,.10);*/
	}

	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	.detail{
		color: rgba(0,0,0,.80);
		text-decoration:none;
	}
	.detail:hover{
		text-decoration:underline;
	}
	</style>
<style>
	table#edu-tb{
		width: 100%;
		border-collapse:collapse;
		font-size: 12px;
		}
	table#edu-tb td,
	table#edu-tb th{
		border:1px solid #ccc;
	}
	#not{
		width: 100%;
		border-collapse:collapse;
		table-layout:fixed;
	}
	table#not td{
		border: none;
	}
	.icon-edit{
		cursor:pointer;
		opacity:.40;
		-moz-opacity:.40;
		filter:alphar(opacity=40);
		khtml-opacity:.40;
	}
	.icon-edit:hover{
		opacity:1;
		-moz-opacity:1;
		filter:alphar(opacity=100);
		khtml-opacity:1;
	}
	#intro-back,
	#intro-next{
		border-style: solid;
		border-color: transparent #000 transparent transparent;
		border-width: 5px;
		display: inline-block;
		position:relative;
		margin-left: 0;
		cursor: pointer;
	}
	#intro-next{
		border-color: transparent transparent transparent #000;
	}
</style>
<?
						list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
						require_once 'config.inc/database.php';
?>
<div class="hi5">
<div style="padding: 10px;">
<div style="border: 1px solid #ccc;padding:2px;border-bottom:none;">
	<div style="width: 200px;border:1px; solid #ccc;margin:auto;position:relative;">
		<label>ชั้นปี</label>
		<select style="padding:2px;" name="class-edu">
			<option value="1" selected>1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>
		<select style="padding: 2px;" name="semester-edu">
			<option value="1" selected>ภาคต้น</option>
			<option value="2">ภาคปลาย</option>
		</select>
	</div>
</div>
<div id="std-edu"></div>
</div>
<div id="descript" style="padding: 10px;margin-top: 10px;">
รายวิชาที่เรียนไม่ผ่านตามแผนหลักสูตร<hr style="opacity:.40;"/>
	<?
		$db= new database($host, $username, $password,$dbname);
		require_once 'graph.php';
		$courses = substr($_SESSION["student"],0,2);
	
		$result = $db->mysql_query("SELECT subCode FROM subject WHERE courses=(SELECT courses.update_ FROM acadyear LEFT JOIN courses ON acadyear.coursesID = courses.coursesID WHERE acadyear.year LIKE '%$courses')");
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
					$matrix[$sub][] = check_pre($db, $sub, $pre, $courses);
				}
			}
		}else{
			die(mysql_error());
		}
		 
	function check_pre($db, $sub, $pre, $courses){
			$sql = "SELECT * FROM prerequisite WHERE subID='$pre' AND subPre='$sub' AND courses=(SELECT courses.update_ FROM acadyear LEFT JOIN courses ON acadyear.coursesID = courses.coursesID WHERE acadyear.year LIKE '%$courses') LIMIT 1";
			$rs = $db->mysql_query($sql) or die(mysql_error());
			return mysql_num_rows($rs);
		}
		$_arr = array();
		$drop = array();
		foreach(getAcadyear($db) as $acadyear){
			foreach(getSemester($db) as $semester){
				echo $semester." / ".$acadyear."<br/>";
				$sql = "SELECT subID, subName, creditAtempt, grade FROM enroll WHERE (grade='F' OR grade='W' OR grade='U') AND semester='$semester' AND acadyear='".$acadyear."' AND studentCode='".$_SESSION['student']."'";
				$source = $db->mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($source) > 0){
				while($data = mysql_fetch_assoc($source)){
					$grapsh = new Graph($matrix);
					$drop[] = $data['subID'];
					$grapsh->depthFrrst($data['subID']);
					$relate = $grapsh->relate;
					$_arr[] = $relate;
					$count = sizeof($relate);
					for($i=0;$i<$count;$i++){
						if($i == 0){
							echo $relate[0]."&nbsp;".$data['subName']."<div style=\"position:absolute;right:0;margin-right: 30px;margin-top: -25px;\">สถานะเกรด : ".$data['grade']."&nbsp;สถานะแก้เกรด : <label class=\"_".$relate[0]."\">-</label></div><br/><font size=\"1\">วิชาที่ไม่สามารถลงทะเบียนเรียน : ";
						}else if($i == $count-1){
							echo "<a href=\"JavaScript:void(0)\" class=\"detail\" onClick=\"fnc_detail(this)\">".$relate[$count-1]."</a>";
						}else{
							echo "<a href=\"JavaScript:void(0)\" class=\"detail\" onClick=\"fnc_detail(this)\">".$relate[$i]."</a>, ";
						}
					}
					echo "</font>";
				}echo "<hr style=\"opacity:.40;\"/>";
				}else{
					echo "ไม่มี<hr style=\"opacity:.40;\"/>";
				}
			}
		}
		function getAcadyear($db){
			$sql = "SELECT DISTINCT acadyear FROM enroll WHERE studentCode='".$_SESSION['student']."'";
			$rs = $db->mysql_query($sql) or die(mysql_error());
			$arr = array();
			while($data = mysql_fetch_assoc($rs)){
				$arr[] = $data['acadyear'];
			}
			return $arr;
		}
		function getSemester($db){
			$sql = "SELECT DISTINCT semester FROM enroll WHERE studentCode='".$_SESSION['student']."'";
			$rs = $db->mysql_query($sql) or die(mysql_error());
			$arr = array();
			while($data = mysql_fetch_assoc($rs)){
				$arr[] = $data['semester'];
			}
			return $arr;
		}
		
	?>
	
</div>
</div>

<script src="jquery-ui-1.10.3/ui/jquery.ui.tooltip.js"></script>
<script>
var arrayFromPHP = <?php echo json_encode($_arr) ?>;
var drop = <?php echo json_encode($drop)?>;
var $std = "<?php echo $_SESSION['student'] ?>";
var aca = $std.substr(0,2);
$(function($){
	//paggeing("#data-guide-pagging", "<?echo $_SESSION['student']?>", 12 );
		var cla = $('select[name="class-edu"] :selected').val(),
			sem = $('select[name="semester-edu"] :selected').val();
		$('#std-edu').load('modules/student/data.edu.php?aca='+aca+'&cla='+cla+'&sem='+sem, function(){
		highlight(arrayFromPHP);
		});
		$('select[name="class-edu"]').change(function(){
			sem = $('select[name="semester-edu"] :selected').val();
			$('#std-edu').load('modules/student/data.edu.php?aca='+aca+'&cla='+$(this).val()+'&sem='+sem, function(){
				highlight(arrayFromPHP);
				ddd()
			});
		});
		$('select[name="semester-edu"]').change(function(){
			cla = $('select[name="class-edu"] :selected').val();
			$('#std-edu').load('modules/student/data.edu.php?aca='+aca+'&cla='+cla+'&sem='+$(this).val(), function(){
			highlight(arrayFromPHP);
			ddd()
			});
		});
		ddd()
	function ddd(){
					 x = $('#content #bottom').height();
 y = $('.hi5').height();
 if(y > x){
//	sum = x+y;
	$('#content #bottom').css('height', (y+500));
 }
		}
})
function fnc_detail($this){
	$('#dialog-detail').dialog({
		autoOpen: false,
		width: 550,
		height: 'auto',
		title: 'รายละเอียดรายวิชา',
		modal: true,
		buttons:{
			Close: function(){
				$(this).dialog( 'close' );
			}
		}
	});
	$('#dialog-detail-content').load('modules/student/sub.detail.php?subid='+$($this).text());
	$('#dialog-detail').dialog( 'open' );
}
function fnc_detail2($this){
	$('#dialog-detail').dialog({
		autoOpen: false,
		width: 550,
		height: 'auto',
		title: 'รายละเอียดรายวิชา',
		modal: true,
		buttons:{
			Close: function(){
				$(this).dialog( 'close' );
			}
		}
	});
	$('#dialog-detail-content').load('modules/student/sub.detail.php?subid='+$($this).attr('class'));
	$('#dialog-detail').dialog( 'open' );
}
function highlight(arr){
	$.each(arr, function(i, val){
		$.ajax({
			type: 'POST',
			url: 'php-script/pull.data.php',
			data:{subCode: drop[i], is_ajax: 25},
			dataType: 'json'
		}).done(function(response){
			if(response['numRow'] > 0){
				$("label._"+drop[i]).text(response['data']['grade']+" เทอม "+response['data']['semester']+"/"+response['data']['acadyear']);
				return false;
			}else{
				for($key in val){
					$('.'+val[$key]).css({"background":"rgba(255, 0, 0, .40"});
					$('.'+val[$key]).next().css({"border-bottom":"1px solid #fff"});
					$('.'+val[$key]).attr("onClick","JavaScript:fnc_detail2(this)");
				}
			}
		});
	});
}
function getDrop(handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			data:{subCode: key, is_ajax: 24}
		}).done(function(source){
			if(source != 1){
				handleData(source);
			}
		});
}
function paggeing(page, key, row){
	get_num_rows(row, key, function(source){//acadyear1
		var limit = 10;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			onPageClick: function(p, e){
				$('#data-guide').load('modules/student/guide.main.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit);
			},
			onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					$.getScript('jquery-ui-1.10.3/jquery-1.9.1.js', function(){
						$('#data-guide').load('modules/student/guide.main.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
							fnc_drop();
						});
					});
			}
		});
	});
}
function get_num_rows(db, id, handleData){
	$.post('php-script/pull.data.php', {id: id, is_ajax: 5, db: db}, function(source){
		handleData(source);
	});
}

</script>
<div id="dialog-detail" style="display:none;">
	<div id="dialog-detail-content">content</div>
</div>