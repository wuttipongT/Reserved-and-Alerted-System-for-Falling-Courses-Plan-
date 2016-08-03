<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealstaff" onclick="" style="z-index: 7;">การจัดการข้อมูลนิสิต</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style type="text/css">
	.table{
		display:table;
		position:relative;
		border-collapse:collapse;
		position:relative;
		text-align:center;
		margin-left: 20px;
		text-decoration:none;
		vertical-align: middle;
		table-layout:fixed;
	}
	.row{
		display:table-row;
	}
	.cell{
		display:table-cell;
		border-bottom: 1px solid rgba(0,0,0,.08);
	}
	.cell:hover{background-color: rgba(0,0,0,.03)}
	.a-deal{width:150px;height:100px;position:relative;text-decoration:none;
		display: table-cell; text-align: center; vertical-align: middle;
	}
	.bd{
		padding:0;
		margin-left:0;
		float:none;
		-webkit-border-radius: 0 4px 4px 0;
			-moz-border-radius: 0 4px 4px 0;
				border-radius:  0 4px 4px 0;
		margin-left: -2px;
		left:-2px;
		position:relative;
	}
	#nav-std-back,
	#nav-std-next,
	#nav-enroll-back,
	#nav-enroll-next,
	#nav-enroll-backs,
	#nav-enroll-nexts{
		border-color: transparent #000 transparent transparent;
		border-style: solid;
		border-width: 5px;
		display:inline-block;
		cursor:pointer;
	}
	#nav-enroll-next,
	#nav-enroll-nexts,
	#nav-std-next{
		border-color: transparent transparent transparent #000;
	}
		.select-search{
		border:none;
		outline:none;
	}
	.select-search:focus,
	.input-search1:focus{
		outline:none;
	}.serach-detail{
		border: 1px solid #ccc;
		width: auto; 
		position: absolute;
		right: 0;
		margin-right: 5px;
		text-indent: 3px;
		 
	}
		i{
		cursor:pointer;
		-moze-opacity: .40;
		opacity: .40;
		-filter-alpha(opacity=40%);
		-webkit-opacity: .40;
		-khtml-opacity: .40;
	}
	i:hover{
		-moze-opacity: 1;
		opacity: 1;
		-filter-alpha(opacity=40%);
		-webkit-opacity: 1;
		-khtml-opacity: 1;
	}
	
	.tb-std{border-collapse:collapse;background:#fff;}
	/*.tb-std th{border: 1px solid #ccc;text-align:center;background: rgba(204,204,204,.20);}*/
	.tb-std td{border: 1px solid #ccc; text-align:left; padding: 6px;}
	.hili:hover{
		background: rgba(204,204,204,.10);
	}
</style>
<div style="position:relative;width: 100%; height: 30px;">
<div style="padding: 0;" class="serach-detail">
	<input type="text" id="search-detail" style="display:inline-block; border:none;" class="not input-search1" placeholder="รหัสนิสิต" value="52011211206"/><i class="icon-search" style="position:relative;top: 5px;" id="btn-search-detail"></i>&nbsp;|
	<select style="padding: 2px;" class="select-search" id="select-search-detail">
		<option value="1" selected>ข้อมูลนิสิต</option>
		<option value="2">ผลการลงทะเบียน</option>
	</select>
</div>
</div>
<div class="table">
	<ul class="row">
		<li class="cell">&nbsp;</li>
		<li class="cell"><a id="data-std" class="a-deal" href=""><img src="images/file_extension_xls.png" style="display:block;margin:auto;"/>ข้อมูลนิสิต</a></li>
		<li class="cell"><a id="data-enroll" class="a-deal" href=""><img src="images/file_extension_xls.png" style="display:block;margin:auto;"/>ผลการลงทะเบียน</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell">&nbsp;</li>
	</ul>
</div>
<br/>
<div id="tabs" style="margin:0px;">
	<ul>
		<li><a href="#tabs-1">ข้อมูลนิสิต</a></li>
		<li><a href="#tabs-2">ผลการลงทะเบียนเรียน</a></li>
		<li><a href="#tabs-3">สถานะนิสิต</a></li>
	</ul>
	<div id="tabs-1">
		ปีการศึกษา&nbsp;<div id="nav-std-back"></div>&nbsp;<span id="aca-std"></span>&nbsp;<div id="nav-std-next"></div>
		<div id="data-std-content"></div>
		<div id="data-std-pagging" style="margin-top: 10px;"></div>
	</div>
	<div id="tabs-2">
	ปีการศึกษา&nbsp;<div id="nav-enroll-back"></div>&nbsp;<span id="aca-enroll"></span>&nbsp;<div id="nav-enroll-next"></div>
		<div id="data-enroll-content"></div>
		<div id="data-enroll-pagging" style="margin-top: 10px;"></div>
	</div>
	<div id="tabs-3">
		<div id="status-content"></div>
		<br/>
		<div id="status-pagging"></div>
	</div>
</div>
<div id="dialog-data-std" style="display:none;">
	<form name="form-data-std" method="post" action="php-script/add.php" enctype="multipart/form-data">
	<span id="gt"></span>
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td>ไฟล์ ( .xlsx )</td>
				<td><input type="file" id="data-std-file" name="data-std-file"/></td>
			</tr>
			<tr>
				<td id="td-mess"></td>
			</tr>
		</table>
		<input type="hidden" name="is_ajax" value="13" />
	</form>
	<div id="gg"></div>
</div>
<div id="dialog-data-enroll" style="display:none;">
	<form name="form-data-enroll" method="post" action="php-script/add.php" enctype="multipart/form-data">
	<span id="gt"></span>
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td>ไฟล์ ( .xlsx )</td>
				<td><input type="file" id="data-enroll-file" name="data-enroll-file"/></td>
			</tr>
			<tr>
				<td id="td-mess2"></td>
			</tr>
		</table>
		<input type="hidden" name="is_ajax" value="14" />
	</form>
</div>
<div id="dialog-student" style="display:none;">
	<form name="dialog-pre-search" method="post" action="">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td align="right">รหัสนิสิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="studentcode" name="studentcode" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">คำนำหน้าชื่อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="prename" name="prename" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">ชื่อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="names" name="names" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">นามสกุล&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="sername" name="sername" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">สถานะนิสิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="status" name="status" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">รหัสบัตรประจำตัวประชาชน&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="citizenID" name="citizenID" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">ระดับ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="level" name="level" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">คณะ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="faculty" name="faculty" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="program" name="program" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right">ปีที่เข้า&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="admitacadyear" name="admitacadyear" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<input type="hidden" id="id" name="id" />
		</table>
	</form>
</div>
<div id="dialog-enroll2" style="display:none;">
	<form name="dialog-enroll" method="post" action="">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td align="right">รหัสนิสิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="studentcode-enroll" name="studentcode-enroll" style="width:230px;height:30px;" disabled/></td>
			</tr>
			<tr>
				<td align="right">ชื่อวิชา (ภาษาไทย)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subject" name="subject" style="width:230px;height:30px;" disabled/></td>
			</tr>
			<tr>
				<td align="right">ชื่อวิชา (ภาษาอังกฤษ)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subjecteng" name="subjecteng" style="width:230px;height:30px;" disabled/></td>
			</tr>
			<tr>
				<td align="right">เกรด&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="grade" name="grade" style="width:230px;height:30px;"/></td>
			</tr>
			<tr>
				<td align="right">รูปแบบเกรด&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="grademode" name="grademode" style="width:230px;height:30px;" disabled/></td>
			</tr>
			<tr>
				<td align="right">หน่วยกิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="creditAtempt" name="creditAtempt" style="width:230px;height:30px;" disabled/></td>
			</tr>
			<input type="hidden" id="id-enroll" name="id-enroll" />
		</table>
	</form>
</div>
<div id="dialog-enroll" style="display:none;"></div>
<div id="dialog-message" style="display:none"></div>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script>
var $mess = $( "#dialog-message" );
$(function(){
	var acadyear =  (new Date).getFullYear()+543,
		  acadyear_2 = (new Date).getFullYear()+543;
	paggeing2(acadyear, "#data-std-pagging", '#data-std-content', 10,'data.student.php');
	$('#aca-std').text(acadyear);
	$('#nav-std-back').click(function(){
		acadyear -= 1;
		paggeing2(acadyear, "#data-std-pagging", '#data-std-content', 10,'data.student.php');
		$('#aca-std').text(acadyear);
	});
	$('#nav-std-next').click(function(){
		acadyear += 1;
		paggeing2(acadyear, "#data-std-pagging", '#data-std-content', 10,'data.student.php');
		$('#aca-std').text(acadyear);
	});

	paggeing2(acadyear_2, "#data-enroll-pagging", '#data-enroll-content', 11,'data.enroll.php');
	$('#aca-enroll').text(acadyear_2);
	$('#nav-enroll-back').click(function(){
		acadyear_2 -= 1;
		paggeing2(acadyear_2, "#data-enroll-pagging", '#data-enroll-content', 11,'data.enroll.php');
		$('#aca-enroll').text(acadyear_2);
	});
	$('#nav-enroll-next').click(function(){
		acadyear_2 += 1;
		paggeing2(acadyear_2, "#data-enroll-pagging", '#data-enroll-content', 11,'data.enroll.php');
		$('#aca-enroll').text(acadyear_2);
	});
	$( "#tabs" ).tabs();
	$('#dialog-data-std').dialog( {
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'ข้อมูลนักศึกษา',
		modal: true,
		buttons:{
			'ตกลง' : function(){
				$('form[name="form-data-std"]').ajaxForm( {
					success: function( source ){
						var ch = source.split("\n");
						if(ch['0'] == 1){
							alert(ch['1']);
							$('#td-mess').html('');
						}else {
							$('#td-mess').html('');
							var p = $("#data-std-pagging").pagination('getCurrentPage');
						paggeing5(Number($('#aca-std').text()), "#data-std-pagging", '#data-std-content', 10,'data.student.php', p);
							$( '#dialog-data-std' ).dialog( 'close' );
						}
					},
					beforeSerialize: function(){
						$('#td-mess').html('<img src="images/GsNJNwuI-UM.gif"/>');
					}
				} ).submit();
			},
			'ยกเลิก' : function(){
				$( this ).dialog( 'close' );
			}
		},close: function(){
			$( 'form[name="form-data-std"]' ).resetForm();
		}
	} );
	$('#dialog-data-enroll').dialog( {
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'ข้อมูลผลการลงทะเบียน',
		modal: true,
		buttons:{
			'ตกลง' : function(){
				$('form[name="form-data-enroll"]').ajaxForm( {
					success: function( source ){
						var ch = source.split("\n");
						if(ch['0'] == 1){
							alert(ch['1']);
							$('#td-mess2').html('');
						}else {
							$('#td-mess2').html('');
							var p = $("#data-std-pagging").pagination('getCurrentPage');
						paggeing5(Number($('#aca-enroll').text()), "#data-enroll-pagging", '#data-enroll-content', 11,'data.enroll.php', p);
							$( '#dialog-data-enroll' ).dialog( 'close' );
						}
					},beforeSerialize: function(){
						$('#td-mess2').html('<img src="images/GsNJNwuI-UM.gif"/>');
					}
				} ).submit();
			},
			'ยกเลิก' : function(){
				$( this ).dialog( 'close' );
			}
		},close: function(){
			$( 'form[name="form-data-enroll"]' ).resetForm();
		}
	} );
	$('#data-std').click(function(){
		$('#dialog-data-std').dialog( 'open' );
		return false;
	});
	$('#data-enroll').click(function(){
		$('#dialog-data-enroll').dialog( 'open' );
		return false;
	});
	paggeing("#status-pagging", '#status-content', 6,'data.status.php');
	function paggeing(page, content, row, url){
		get_num_rows(row, function(source){//acadyear1
			var limit = 25;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				currentPage: 1,
				onPageClick: function(p, e){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit,
						success: function(response){
							$(content).html(response);
						}
					});	
				},
				onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit,
						success: function(response){
							$(content).html(response);
						}
					});
				}
			});
		});
	}
	function get_num_rows(db, handleData){
		$.post('php-script/pull.data.php', {is_ajax: 5, db: db}, function(source){
			handleData(source);
		});
	}
	function paggeing2(key, page, content, row, url){
		get_num_rows2(row, key, function(source){//acadyear1
			var limit = 25;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				currentPage: 1,
				onPageClick: function(p, e){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&key='+key,
						success: function(response){
							$(content).html(response);
						}
					});	
				},
				onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&key='+key,
						success: function(response){
							$(content).html(response);
						}
					});
				}
			});
		});
	}
	function get_num_rows2(db, key, handleData){
		$.post('php-script/pull.data.php', {key: key, is_ajax: 5, db: db}, function(source){
			handleData(source);
		});
	}
	
		
	var html = '<select id="ts2"><option selected value="1">รหัสนิสิต</option><option value="2">ชื่อ</option><option value="3">นามสกุล</option></select>';
	$('#select-search-detail').before('<div id="ts" style="display:inline-block;"></div>');
	$('#ts').html(html);
	$('#select-search-detail').change(function(){
		if($(this).find('option:selected').val() == 1){
			var html = '<select id="ts2"><option selected value="1">รหัสนิสิต</option><option value="2">ชื่อ</option><option value="3">นามสกุล</option></select>';
			$(this).before('<div id="ts" style="display:inline-block;"></div>');
			$('#ts').html(html);
		}else if($(this).find('option:selected').val() == 2){
			var html = '<label>ปีการศึกษา</label>&nbsp;<div id="nav-enroll-backs" onClick="back()"></div>&nbsp;<span id="aca-enrolls"><?=date("Y")+543?></span>&nbsp;<div id="nav-enroll-nexts" onClick="next()"></div>&nbsp;<label>เทอม&nbsp;</label><select id="sem"><option selected value="1">1</option><option value="2">2</option><option value="3">3</option></select>';
			$(this).before('<div id="ts" style="display:inline-block;"></div>');
			$('#ts').html(html);
		}else{
			$('#ts').remove();
			$('#search-detail').attr("placeholder","รหัสนิสิต");
		}
		
	});
	$('#ts2').change(function(){
		if($(this).find('option:selected').val() == 1){
			$('#search-detail').attr("placeholder","รหัสนิสิต");
		}else if($(this).find('option:selected').val() == 2){
			$('#search-detail').attr("placeholder","ชื่อ");
		}
	});
	$('#btn-search-detail').click(function(){

		var key = $('#search-detail').val();
		if(key == ''){
			$mess.text('กรุณากรอกข้อมูลค้นหาด้วยครับ!');
			$mess.dialog({
				modal: false,
				title: 'Error Message!',
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
			return false;
		}
		var type = $('#select-search-detail option:selected').val();
		if(type == 1){
			var ts = null,data = null;
			if($('#ts2 option:selected').val() == 1){
				ts = "studentCode =";
				data = key;
			}else if($('#ts2 option:selected').val() == 2){
				ts = "name LIKE";
				data = '%'+key;
			}else{
				ts = "sername LIKE";
				data = '%'+key;
			}
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{tb: 'student', field: ts, key: data, is_ajax: 33},
				dataType: 'json',
				success: function( source ){
					if( source == 0 ){
						$mess.text('ไม่พบข้อมูลนิสิต!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}, close: function(){
								$('#search-detail').val('');
							}
						});
						return false;
					}else{
						$('#id').val(source['studentID']);
						$('#studentcode').val(source['studentCode']);
						$('#prename').val(source['preName']);
						$('#names').val(source['name']);
						$('#sername').val(source['sername']);
						$('#status').val(source['status']);
						$('#citizenID').val(source['citizenID']);
						$('#level').val(source['level']);
						$('#faculty').val(source['faculty']);
						$('#program').val(source['program']);
						$('#admitacadyear').val(source['admitacadyear']);
						$('#dialog-student').dialog( 'open' );
					}
				}
			});
		}else if(type == 2){
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{tb: 'enroll', field: 'studentCode', key: key, aca: Number($('#aca-enrolls').text()), sem: $('#sem option:selected').val(), is_ajax: 34},
				dataType: 'html',
				success: function( source ){
					if( source == 0){
						$mess.text('ไม่พบข้อมูลผลการลงทะเบียน!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						$('#dialog-enroll').html(source);
						$('#dialog-enroll').dialog( 'open' );
					}
				}
			});
		}
	})
		
	$('#dialog-student').dialog( {
		autoOpen: false,
		width: 500,
		height: 'auto',
		title: 'ข้อมูลผลนิสิต',
		modal: true,
		buttons:{
			'ตกลง' : function(){
				if($('#studentcode').val() == '' || $('#prename').val() == '' || $('#names').val() == '' || $('#sername').val() == '' || $('#status').val() == '' || $('#citizenID').val() == '' || $('#level').val() == '' || $('#faculty').val() == '' || $('#program').val() == '' || $('#admitacadyear').val() == ''){
					$mess.text('มีข้อมูลว่่าง!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
					return false;
				}
				var obj = {
					id: $('#id').val(),
					studentcode: $('#studentcode').val(),
					prename: $('#prename').val(),
						names: $('#names').val(),
						sername: $('#sername').val(),
						status: $('#status').val(),
						citizenID: $('#citizenID').val(),
						level: $('#level').val(),
						faculty: $('#faculty').val(),
						program: $('#program').val(),
						admitacadyear: $('#admitacadyear').val(),
						is_ajax: 16
				}
				$.post("php-script/edit.php", obj, function( source ){
					var checked = source.split("\n");
					if(checked[0] == 1){
						$mess.text(checked[1]);
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						var p = $("#data-std-pagging").pagination('getCurrentPage');
						paggeing5(Number($('#aca-std').text()), "#data-std-pagging", '#data-std-content', 10,'data.student.php', p);
						$( '#dialog-student').dialog( 'close' );
					}
				});

			},
			'ยกเลิก' : function(){
				$( this ).dialog( 'close' );
			}
		},close: function(){
			$('#search-detail').val('');
		}
	} );
	$('#dialog-enroll').dialog( {
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'ข้อมูลผลการลงทะเบียน',
		modal: true,
		buttons:{
			'ตกลง' : function(){
				$( this ).dialog( 'close' );
			}
		},close: function(){
			//$('#search-detail').val('');
		}
	} );
	function paggeing5(key, page, content, row, url, c){
		get_num_rows2(row, key, function(source){//acadyear1
			
			var limit = 25;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				currentPage: c,
				onPageClick: function(p, e){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&key='+key,
						success: function(response){
							$(content).html(response);
						}
					});	
				},
				onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&key='+key,
						success: function(response){
							$(content).html(response);
						}
					});
				}
			});
		});
	}

})(jQuery);
function back(){
	$('#aca-enrolls').text(Number($('#aca-enrolls').text())-1);
}
function next(){
	$('#aca-enrolls').text(Number($('#aca-enrolls').text())+1);
}
function fnc_edit_enroll(id){
	var html = '<tr id="hili'+id+'">';
		html += '<td rowspan="2" valign="top"><input id="sID-rol"type="text" value="'+$('.sd'+id).text()+'" style="width: 80px;" disabled/></td>';
		html += '<td><input id="sN-rol" type="text" value="'+$('.sn'+id).text()+'" disabled style="width: 95%;"/></td>';
		html += '<td><input id="g-rol" type="text" value="'+$('.g'+id).text()+'" style="width: 40px;"/></td>';
		html += '<td><input id="gM-rol" type="text" value="'+$('.gm'+id).text()+'" disabled style="width: 40px; "/></td>';
		html += '<td><input id="cA-rol" type="text" value="'+$('.ca'+id).text()+'" disabled style="width: 40px;"/></td>';
		html += '<td rowspan="2" style="text-align:center;"><i class="icon-ok" onClick="fnc_save_roll('+id+')"></i></td>';
		html += '</tr>';
		html += '<tr>';
		html += '<td colspan="4"><input id="cNE-rol"type="text" value="'+$('.sne'+id).text()+'" disabled style="width: 95%;"/></td>';
		html += '</tr>';
		$('table.tb-std #hili'+id).next().remove();
		$('table.tb-std #hili'+id).replaceWith(html);
		$('#g-rol').keyup(function(){
			this.value = this.value.toUpperCase();
		});
}
function fnc_save_roll(id){
		obj = {
			id: id,
			grade: $('#g-rol').val(),
			is_ajax: 17
		}
		$.post('php-script/edit.php', obj, function( source ){
			var checked = source.split("\n");
			if( checked[0] == 1 ){
				$mess.text(checked[1]);
				$mess.dialog({
					modal: false,
					title: 'Error Message!',
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}else{
				var html = '<tr id="hili+'+id+'">';
				html += '<td rowspan="2" valign="top">'+$('#sID-rol').val()+'</td>';
				html += '<td>'+$('#sN-rol').val()+'</td>';
				html += '<td>'+$('#g-rol').val()+'</td>';
				html += '<td>'+$('#gM-rol').val()+'</td>';
				html += '<td>'+$('#cA-rol').val()+'</td>';
				html += '<td rowspan="2" style="text-align:center;"><i class="icon-edit" onClick="JavaScript:fnc_edit_enroll('+id+')"></i></td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td colspan="4">'+$('#cNE-rol').val()+'</td>';
				html += '</tr>';
				//$('table.tb-std #hili'+id).next().remove();
				//$('table.tb-std #hili'+id).replaceWith(html);
				
				$('table.tb-std #hili'+id).next().remove();
				$('table.tb-std #hili'+id).replaceWith(html);
			}
		})
	
		
		
}
</script>