<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=report" onclick="" style="z-index: 7;">ออกรายงานสำรองที่นั่งรายวิชานอกสาขา</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style>
	#btn-back,
	#btn-next{
		border-width: 5px;
		border-style:solid;
		border-color:transparent #ccc transparent transparent;
		display:inline-block;
	}
	#btn-next{
		border-color: transparent transparent transparent #ccc;
	}
	#add-sub,
	#rem-report{
		float: right;
		margin: 10px;
		filter:alpha(opacity=40); 
		-moz-opacity:.40; 
		-khtml-opacity: .40; 
		opacity: .40; 
		cursor:pointer;
	}
	#add-sub:hover,
	#rem-report:hover{
		filter:alpha(opacity=100); 
		-moz-opacity:1; 
		-khtml-opacity: 1; 
		opacity: 1; 
	}
	.icon-file{
		filter:alpha(opacity=40); 
		-moz-opacity:.40; 
		-khtml-opacity: .40; 
		opacity: .40; 
	}.icon-file:hover{
		filter:alpha(opacity=100); 
		-moz-opacity:1; 
		-khtml-opacity: 1; 
		opacity: 1; 
	}
	#tb-report{
		width: 600px;
		margin:auto;
		border-collapse:collapse;
	}
	#tb-report td,
	#tb-report th{
		border: 1px solid #ccc;	
	}

table tr:hover:not(.th){
	background-color: rgba(0,0,0,.1);
	cursor:pointer;
}
.button {
    position: relative;
    overflow: visible;
    display: inline-block;
    padding: 0.5em 1em;
    border: 1px solid #d4d4d4;
    margin: 0;
   
    text-align: center;
    text-shadow: 1px 1px 0 #fff;
    font:11px/normal sans-serif;
    color: #333;
    white-space: nowrap;
    cursor: pointer;
    outline: none;
    background-color: #ececec;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f4f4f4), to(#ececec));
    background-image: -moz-linear-gradient(#f4f4f4, #ececec);
    background-image: -ms-linear-gradient(#f4f4f4, #ececec);
    background-image: -o-linear-gradient(#f4f4f4, #ececec);
    background-image: linear-gradient(#f4f4f4, #ececec);
    -moz-background-clip: padding; /* for Firefox 3.6 */
    background-clip: padding-box;
    border-radius: 0.2em;
    /* IE hacks */
    zoom: 1;
    *display: inline;
}

.button:hover,
.button:focus,
.button:active,
.button.active {
    border-color: #3072b3;
    border-bottom-color: #2a65a0;
    text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
    color: #fff;
    background-color: #3c8dde;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#599bdc), to(#3072b3));
    background-image: -moz-linear-gradient(#599bdc, #3072b3);
    background-image: -o-linear-gradient(#599bdc, #3072b3);
    background-image: linear-gradient(#599bdc, #3072b3);
}

.button:active,
.button.active {
    border-color: #2a65a0;
    border-bottom-color: #3884cd;
    background-color: #3072b3;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#3072b3), to(#599bdc));
    background-image: -moz-linear-gradient(#3072b3, #599bdc);
    background-image: -ms-linear-gradient(#3072b3, #599bdc);
    background-image: -o-linear-gradient(#3072b3, #599bdc);
    background-image: linear-gradient(#3072b3, #599bdc);
}

/* overrides extra padding on button elements in Firefox */
.button::-moz-focus-inner {
    padding: 0;
    border: 0;
}
</style>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';

	$sql = "SELECT preName, name, sername,level FROM student WHERE studentCode='".$_SESSION['student']."' LIMIT 1";
	$databae = new database($host, $username, $password,$dbname);
	$databae->mysql_query($sql) or die(mysql_error());
	$data = $databae->mysql_fetch_assoc();
	$acadyear = date("Y")+543;
	$lavel = substr($data['0']['level'],28);
	$code = substr($_SESSION['student'], 0, -9);
	$year = substr(($acadyear),-2);
	$class= ($year - $code)+1;
?>
<img src="images/logoIT.png" /><b>คณะวิทยาการสารสนเทศ</b>
<form method="post" action="report/reserv.report.php">
<center><b>แบบคำร้องข้อสำรองทที่นั่ง</b></center>
<br/>
&nbsp;&nbsp;ข้าพเจ้า (<input type='radio' value="นาย" name="pre-name" <?php if($data['0']['preName']=="นาย"): echo "checked"; endif ?>/> นาย/<input type="radio" value="นาง" name="pre-name" <?php if($data['0']['preName']=="นาง"): echo "checked"; endif ?> />นาง/<input type="radio" name="pre-name" value="นางสาว" <?php if($data['0']['preName']=="นางสาว"): echo "checked"; endif ?>/>นางสาว ) <input type="text" value="<? echo $data['0']['name'].' '.$data['0']['sername'];?>" name="name"/>&nbsp;รหัสประจำตัวนิสิต&nbsp;<input type="text" style="width: 130px;" value="<?=$_SESSION['student']?>" name="student_code"/>
&nbsp;&nbsp;สาขาวิชา <input type="text" value="วิทยาการคอมพิวเตอร์" style="width:120px;" /> คณะ <input type="text" value="คณะวิทยาการสารสนเทศ" style="width:135px;" /> ชั้นปี <input type="text" style="width:30px;" value="<?=$class?>" name="class"/>
<div style="display:block;margin-top: 2px;">&nbsp;&nbsp;ระบบ (<input type="radio" value="0" name="ism" <?php if($lavel =="ระบบปกติ"): echo "checked"; endif ?>/>) ปกติ (<input type="radio" value="1" name="ism" <?php if($lavel == "ระบบพิเศษ"): echo "checked"; endif ?>/>) พิเศษ (<input type="radio" value="2" name="ism" <?php if($lavel == "พิเศษต่อเนื่อง"): echo "checked"; endif ?>/>) พิเศษต่อเนื่อง
</div>
<div style="margin-top:-20px;">
&nbsp;&nbsp;<label>ความประสงค์ขอลงทะเบียนเรียนเป็นกรณีพิเศษ</label>
(<input type="radio" name="require" value="0"/><label>)&nbsp;ข้ามกลุ่มเรียน</label>
(<input type="radio" name="require" value="1"/><label>)&nbsp;ข้ามชั้นปี</label>
<label>ภาคเรียนที่</label>&nbsp;<input type="text" name="semester" value="" style="width: 36px;" />&nbsp;<label style="font-size: 30px;">/</label>
&nbsp;<input type="text" name="acadyear" style="width:54px;" value="<?=$acadyear?>" />
<div style="display:block;margin-top:-10px;">&nbsp;&nbsp;<label>สาเหตุเนื่องจาก</label>&nbsp;<input type="text" name="cause" style="width: 540px;" /></div>
<br/>
</div>
<table style="margin:auto;width:638px;table-layout:fixed;">
	<tr class="th">
		<th width="7%">ลำดับที่</th>
		<th width="12%">รหัสวิชา</th>
		<th>ชื่อวิชา</th>
		<th width="9%">กลุ่มเรียน</th>
		<th width="28%">ผู้สอน</th>
	</tr>
	<tr>
		<td align="center">1</td>
		<td><input type="text" name="sub_code[]" style="width: 60px;" /></td>
		<td><input type="text" name="subject[]" style="width: 264px;" /></td>
		<td><input type="text" name="group[]" style="width: 43px;"/></td>
		<td><input type="text" name="lecturer[]" style="width: 160px;"/></td>
	</tr>
</table>
<i id="rem-report" class="icon-minus"></i><i id="add-sub" class="icon-plus"></i>
<br style="clear:both;line-height:0;"/>
<!--<div style="margin-left: 20px;">
<a href="JavaScript:void(0)" id="btn-back"></a>
<label id="year-report"></label>
<a href="JavaScript:void(0)" id="btn-next"></a>
</div>-->
<input id="add-report" style="float:right;margin: 5px 8px 5px 0;" class="button" type="submit" value="ไฟล์แนบ"/>
<i style="clear:both;line-height:0;"></i>
</form>
<?/*
	$database = new database(HOST, USER ,PASSWORD, DBNAME);
	$sql = "SELECT * FROM report JOIN report_subject ON (report.report_id=report_subject.report_id) WHERE studentCode='".$_SESSION['student']."' GROUP BY report_subject.report_id ORDER BY semester ASC, report_date ASC";
	$database->mysql_query($sql) or die(mysql_error());
	echo '<table id="tb-report"><tr class="th"><th width="9%">ลำดับที่</th><th width="14%">รหัสวิชา</th><th>ชื่อวิชา</th><th width="8%">เทอม</th><th width="13%">ปีการศึกษา</th><th width="15%">ออกรายงาน</th></tr>';
	
	if($database->mysql_num_rows() > 0){
		foreach($database->mysql_fetch_assoc() as $i => $data){
			$i += 1;
			$html='<tr><td align="center">'.$i.'</td>';
			$html .='<td style="text-indent: 5px;">'.$data['sub_code'].'</td>';
			$html .='<td style="text-indent: 5px;">'.$data['subject'].'</td>';
			$html .='<td align="center">'.$data['semester'].'</td>';
			$html .='<td align="center">'.$data['acadyear'].'</td>';
			$html .='<td align="center"><i class="icon-file" style="cursor:pointer;" OnClick="fnc_file('.$data['report_id'].')"></i></td></tr>';
			echo $html;
		}
	}else{
		echo 'no data';
	}
	echo '</table>';

	function num_rows($id){
		require_once 'config.inc/config.inc.php';
		require_once 'config.inc/database.php';
		$database = new database(HOST, USER, PASSWORD, DBNAME);
	}*/
?>
<script>
	function fnc_file(id){
		window.location.href="report/reserv.report.php?id="+id;
	}
	$(function($){
/*
		var curr_date = (new Date).getFullYear()+543;
		$('#year-report').text(curr_date);

		$('#btn-back').click(function(){
			curr_date = curr_date-1;
			return curr_date;
		});
		$('#btn-next').click(function(){
			curr_date = curr_date+1;
			return curr_date;
		});

		$('#btn-back, #btn-next').click(function(e){
			$('#year-report').text(e.result);
		});
		
		$('#dialog-report').dialog({
			autoOpen: false,
			width: 'auto',
			height: 'auto',
			title: 'เพิ่มรายงานlสำรองที่นั่ง',
			buttons:{
				'เพิ่มรายงาน' : function(){
					var sub_code = [],
						subject = [],
						group = [],
						lecturer = [];
					$('input[name="sub_code\\[\\]"]').each(function(){
						sub_code.push($(this).val());
					});
					
					$('input[name="subject\\[\\]"]').each(function(){
						subject.push($(this).val());
					});
					$('input[name="group\\[\\]"]').each(function(){
						group.push($(this).val());
					});
					$('input[name="lecturer\\[\\]"]').each(function(){
						 lecturer.push($(this).val());
					});
					var obj = {
						require: $('input[name="require"]:checked').val(),
						semester: $('input[name="semester"]').val(),
						acadyear: $('input[name="acadyear"]').val(),
						cause: $('input[name="cause"]').val(),
						studentCode: "<?echo $_SESSION['student']?>",
						sub_code: sub_code,
						subject: subject,
						group: group,
						lecturer: lecturer,
						is_ajax: 16
					};

						$.post('php-script/add.php',obj, function(source){
							if(source == ''){
								$('#dialog-report').dialog( 'close' );
							}else{
								ch = source.split("\n");
								if(ch[0]==1){
									alert(ch[1]);
								}else{
									alert('Error: other!');
								}
							}
						});
				},
				Close: function(){
					$( this ).dialog( 'close' );
				}

			},close: function(){
				var size = $('table tr').size()-1;
				for(i = 2;i<=size;i++){
					$('#rem'+i).remove();
				}
			}
		});
		$('#add-report').click(function(){
			$('#dialog-report').dialog( 'open' );
		});*/
		var size = $('table tr').size()-1;
		$('#add-sub').click(function(){
			
			if(size == 5){
				alert("เพิ่มรายวิชาได้ไม่เกิน 5 รายวิชา");
				return false;
			}
			size++;
			var html = '<tr id="rem'+size+'"><td align="center">'+size+'</td>';
				 html  += '<td><input type="text" name="sub_code[]" style="width: 60px;" /></td>';
			     html  += '<td><input type="text" name="subject[]" style="width: 264px;" /></td>';
			     html  += '<td><input type="text" name="group[]" style="width: 43px;"/></td>';
				 html  += '<td><input type="text" name=" lecturer[]" style="width: 160px;"/></td></tr>';
			$('table tr:last').after(html);

		});
		$('#rem-report').click(function(){
			if(size== 1){
				alert("Not Remove!");
				return false;
			}
			$('#rem'+size).remove();
			size--;
		});
	})(jQuery);
</script>