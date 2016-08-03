<? if(!$_SESSION["staff"]){header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealnews" onclick="" style="z-index: 7;">การจัดการสำรองที่นั่ง</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style type="text/css">
	td{
		border:none;
	}
	th{
		background-color: #FFFFBE;
		border:1px solid #ccc;
	}
	tr:not(.never):hover{
		background-color: #FFFFBE;
	}
	.a-add-news{
		text-decoration: none;
		color: #000000;
		text-align: middle;
		display: inline-block;
		text-align: middle;
	}
	
/*#6CF*/
#upload-file-container {
  display: inline-block;
  width: 14px;
  height: 14px;
  margin-top: 1px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("images/glyphicons-halflings.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
  background-position: -456px -48px;
  cursor: pointer;
  opacity:.40;
  filter:alpha(opacity=40);
  filter: “alpha(opacity=40)”;
}
#upload-file-container:hover{
  opacity:1;
filter:alpha(opacity=100);
filter: “alpha(opacity=100)”;
}

#upload-file-container input {
   opacity: 0;
   filter: alpha(opacity = 50);
}
#nav-back,#nav-next{
	border-color:transparent #000 transparent transparent;
	border-style:solid;
	border-width: 5px;
	
	display:inline-block;
}
#nav-next{
	border-color: transparent transparent transparent #000;
}
#add-reserv:hover{
	text-decoration: underline;
}
	.ui-autocomplete{
	/*				/max-width: 140px;
     prevent horizontal scrollbar */ 
	 overflow-y: auto; 
	 max-height: 200px;
    overflow-x: hidden;
	}
	* html .ui-autocomplete{
		/*width: 140px;*/
		height: 200px;
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
</style>
<!--//** --------------------------- **//-->
<div style="position:relative;width: 100%; height: 30px;">
<div style="padding: 0;" class="serach-detail">
	<input type="text" id="search-detail" style="display:inline-block; border:none;" class="not input-search1" placeholder="รหัสวิชา"/><i class="icon-search" style="position:relative;top: 5px;" id="btn-search-detail"></i>&nbsp
	
</div>
</div>
<br/>
<div id="dialog_reserv" style="display:none;">
	<form name="form" method="post" action="">
		<i class="icon-plus" id="add-lec" style="position:absolute;right:0;bottom:0;margin-bottom: 100px;margin-right: 160px;"></i>
		<i class="icon-minus" id="rem-lec" style="position:absolute;right:0;bottom:0;margin-bottom: 100px;margin-right: 140px;"></i>
		<table style="border-collapse: separate; border-spacing: 5px;">
					<tr class="never">
				<td align="right" valign="top"> 
					<label>ปีการศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<input type="text" id="acadyear" name="acadyear" style="width:220px;height:20px;"/>
				</td>
			</tr>
			<tr class="never">
				<td align="right" valign="top">
					<label>เทอม&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<select id="semester" name="semester" style="width:70px; padding:3px;">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</td>
			</tr>
			<tr class="never">
				<td align="right">
					<label>วิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<input id="subject" type="text" name="subject" style="width:300px;height:25px;" />
				</td>
			</tr>
			<tr class="never">
				<td align="right" valign="top">
					<label>อาจารย์ผูสอน</label>
				</td>
				<td align="left" colspan="2" style="text-align:left;">
					<table id="tb-lec" style="margin:0;padding:0;">
						<tr>
						<td>
							<input id="lecturerv1" type="text" name="lecturerv" style="width:300px;height:25px;" placeholder="Keywords: อ."/>
						</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="2">
					ขอบเขตคำร้องข้อสำรองที่นั่ง&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font>
				</td>
			</tr>
			<tr>
				<td>
					จาก&nbsp;<input type="text" id="date_curr" name="date_curr" style="width:250px;height:25px;"/>
				</td>
				<td>
					ถึง&nbsp;<input type="text" id="date_end" name="date_end" style="width:250px;height:25px;"/>
				</td>
			</tr>
		</table>
	</form>
</div>

<!--//** --------------------------- **//-->
<div id="dialog-reserv-edit" style="display:none;">
	<form name="form" method="post" action="">
		<table style="border-collapse: separate; border-spacing: 5px;">
					<tr class="never">
				<td align="right" valign="top"> 
					<label>ปีการศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<input type="text" id="acadyear-edit" style="width:220px;height:20px;"/>
				</td>
			</tr>
			<tr class="never">
				<td align="right" valign="top">
					<label>เทอม&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<select id="semester-edit" style="width:70px; padding:3px;">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</td>
			</tr>
			<tr class="never">
				<td align="right">
					<label>วิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td align="left" colspan="2">
					<input id="subject-edit" type="text" style="width:300px;height:25px;" />
				</td>
			</tr>
			<tr class="never">
				<td align="right" valign="top">
					<label>อาจารย์ผูสอน</label>
				</td>
				<td align="left" colspan="2" style="text-align:left;">
					<table id="tb-lec-edit" style="margin:0;padding:0;">
			
					</table>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="2">
					ขอบเขตคำร้องข้อสำรองที่นั่ง&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font>
				</td>
			</tr>
			<tr>
				<td>
					จาก&nbsp;<input type="text" id="date-curr-edit" style="width:250px;height:25px;"/>
				</td>
				<td>
					ถึง&nbsp;<input type="text" id="date-end-edit" style="width:250px;height:25px;"/>
				</td>
			</tr>
		</table>
		<input id="reservID" type="hidden"/>
	</form>
</div>
<!-----------------------------------------555555555555555555555555555555555-->
<table style="float:right;margin-right: 30px;">
	<tr class="never">
		<td class="th" style="border: none;  border-right: 1px solid #ccc;padding-right:3px;">
			<div id="btn-aca-reserv">
			ปีการศึกษา
			<a href="JavaScript:void(0)" id="nav-back"></a>
			<label id="acadyear-reserv">&nbsp;</label>
			<a href="JavaScript:void(0)" id="nav-next"></a>
			<div>
		</td>
    	<td align="right" class="th" style="border: none; height: 30px;">
			<a id="add-reserv" class="a-add-news" href="JavaScript:void(0)">
				<i class="icon-plus-sign" style="vertical-align: middle;"></i>
				&nbsp;เพิ่มคำร้องขอสำรองที่นั่ง
			</a>
    	</td>
    </tr>
</table>
<br style="clear:both;"/>
<span style="display:block;text-align:center;" >เทอม 
	<select id="semester-c" style="width: 50px;">
		<option value="1" selected>1</option>
		<option value="2">2</option>
	</select>
</span>
<div id="reserv-content"></div>
<br/>
<div id="reverv-pagging"></div>
<style>
	
	table#info {
		position: relative;
		overflow:hidden;
		border:1px solid #d3d3d3;
		background:#fefefe;
		width: inherit;
		-moz-border-radius:5px; /* FF1+ */
		-webkit-border-radius:5px; /* Saf3-4 */
		border-radius:5px;
		
	}
	
	#info th, #info td {padding:5px; }
	
	#info th {text-shadow: 1px 1px 1px #fff; background:#e8eaeb;}
	
	#info td {border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0;}
	
	#info tr.odd-row td {background:#f6f6f6;}
	
	#info td.first, th.first {text-align:left}
	
	#info td.last {border-right:none;}
	
	/*
	Background gradients are completely unnessary but a neat effect.
	*/
	
	#info td {
		background: -moz-linear-gradient(100% 25% 90deg, #fefefe, #f9f9f9);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f9f9f9), to(#fefefe));
	}
	
	tr.odd-row td {
		background: -moz-linear-gradient(100% 25% 90deg, #f6f6f6, #f1f1f1);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f1f1f1), to(#f6f6f6));
	}
	
	#info th {
		background: -moz-linear-gradient(100% 20% 90deg, #e8eaeb, #ededed);
		background: -webkit-gradient(linear, 0% 0%, 0% 20%, from(#ededed), to(#e8eaeb));
	}
	
	/*
	I know this is annoying, but we need dditional styling so webkit will recognize rounded corners on background elements.
	Nice write up of this issue: http://www.onenaught.com/posts/266/css-inner-elements-breaking-border-radius
	
	And, since we've applied the background colors to td/th element because of IE, Gecko browsers also need it.
	*/
	
	tr:first-child th.first {
		-moz-border-radius-topleft:5px;
		-webkit-border-top-left-radius:5px; /* Saf3-4 */
	}
	
	tr:first-child th.last {
		-moz-border-radius-topright:5px;
		-webkit-border-top-right-radius:5px; /* Saf3-4 */
	}
	
	tr:last-child td.first {
		-moz-border-radius-bottomleft:5px;
		-webkit-border-bottom-left-radius:5px; /* Saf3-4 */
	}
	
	tr:last-child td#info.last {
		-moz-border-radius-bottomright:5px;
		-webkit-border-bottom-right-radius:5px; /* Saf3-4 */
	}

</style>
<div id="div-info" style="display:none;">
	<table id="info">
		<tr class="odd-row"><td width="20%" style="text-align:right;">วิชา</td><td><span id="label-subject">&nbsp;</span></td></tr>
		<tr><td valign="top" style="text-align:right;">อาจารย์ผู้สอน</td><td valign="top" id="label-lecturer">&nbsp;</td></tr>
		<tr class="odd-row"><td style="text-align:right;">ภาคเรียน</td><td id="label-semester" style="padding:0;">&nbsp;</label></td></tr>
		<tr><td style="text-align:right;">ปีการศึษา</td><td><label id="label-aca">&nbsp;</label></td></tr>
		<tr class="odd-row"><td style="text-align:right;">เพิ่มเมื่อวันที่</td><td><label id="label-date-curr">&nbsp;</label></td></tr>
		<tr><td style="text-align:right;">หมดเขต</td><td><label id="label-date-end">&nbsp;</label></td></tr>
	</table>
</div>

<div id="reserv-dialog" style="display:none;" title="รายชื่อนิสิตที่ร้องขอสำรองที่นั่ง">
	<div id="data-reserv"></div>
	<div id="data-reserv-pagging" style="margin-top: 10px;"></div>
</div>
<div id="dialog-message" style="display:none"></div>
<script src="jquery-ui-1.10.3/ui/jquery.ui.spinner.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<link rel='stylesheet' href='Scripts/popbox.css' type='text/css' media='screen' charset='utf-8'>
<script src="ckeditor/ckeditor.js"></script>
<script>
$.widget( "custom.catcomplete", $.ui.autocomplete, {
	_renderMenu: function( ul, items ) {
		var that = this,
			currentCategory = "";
		$.each( items, function( index, item ) {
			if ( item.category != currentCategory ) {
				ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
				currentCategory = item.category;
			}
			that._renderItemData( ul, item );
		});
	}
});
</script>
<script>

var $mess = $( "#dialog-message" );
$(document).ready(function(){
	$('#dialog-message').dialog({
		autoOpen: false,
		modal: false,
		title: 'Error Message!',
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	$('#add-lec').click(function(){
		var $i = $('#tb-lec tr').size()+1;
		var html = "<tr><td><input type=\"text\" id=\"lecturerv"+$i+"\" style=\"width:300px;height:25px;\"/></td></tr>";
		$('#tb-lec').append(html);
		getLecturer(function(source){
				$( "#lecturerv"+$i ).autocomplete({
					source: source
				});
			});
		
	});
	$('#rem-lec').click(function(){
		var $i = $('#tb-lec tr').size();
		$('#lecturerv'+$i).parent().parent().remove();
		if($i == 1){

			$mess.text('ห้ามต่ำกว่า 1');
			$mess.dialog('open');
			return false;
		}
	});
	//$('#add-reserv, #btn-aca-reserv').button();
	//paggeing('2548', '#reverv-pagging', , 7, '')
	var sem = $('#semester-c'),
		  currentYear = (new Date).getFullYear()+543;
	$('#acadyear-reserv').text(currentYear);
	$('#nav-back').click(function(){
		currentYear = currentYear-1;
		$('#acadyear-reserv').text(currentYear);
		fnc_dataReserv(currentYear, sem.find('option:selected').val(), '#reserv-content', 'data.reserv.php');
	});

	$('#nav-next').click(function(){
		currentYear = currentYear+1;
		$('#acadyear-reserv').text(currentYear);
		fnc_dataReserv(currentYear, sem.find('option:selected').val(), '#reserv-content', 'data.reserv.php');
	});
	
	sem.change(function(){
		fnc_dataReserv($('#acadyear-reserv').text() , $(this).val(), '#reserv-content', 'data.reserv.php');
	 });
	fnc_dataReserv(currentYear, sem.find('option:selected').val(), '#reserv-content', 'data.reserv.php');
	/*var data = [
			{ label: "anders", category: "" },
			{ label: "andreas", category: "" },
			{ label: "antal", category: "" },
			{ label: "annhhx10", category: "Products" },
			{ label: "annk K12", category: "Products" },
			{ label: "annttop C13", category: "Products" },
			{ label: "anders andersson", category: "People" },
			{ label: "andreas andersson", category: "People" },
			{ label: "andreas johnson", category: "People" }
		];*/
	var acad = $('#acadyear'),
		subject = $('#subject'),
		date_curr = $('#date_curr'),
		date_end = $('#date_end'),
		all_field = $([]).add(acad).add(subject).add(date_curr).add(date_end);
	$('#dialog_reserv').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'เพิ่มคำร้องขอสำรองที่นั่ง',
		buttons:{
			'บันทึกข้อมูล': function(){
				if(acad.val() == '' || subject.val() == '' || $('#semester option:selected').val() =='' || date_curr.val() == '' || date_end.val() == ''){
					//alert("ค่าว่าง");alert(acad.val()+" "+subject.val()+" "+editor.getData()+" "+date_curr.val()+" "+date_end.val());
					alert("กรุณากรอกข้อมูลให้ครบด้วยครับ!");
					return false;
										
				}
				var lec = '';
				$('input[id^="lecturerv"]').each(function(){
					if($( this ).val() == ''){
						$('#dialog-message').text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
						$('#dialog-message').dialog( 'open' );
						return false;
					}
					lec += $( this ).val()+"/";
				});
				var obj = {
					acadyear: acad.val(),
					subject: subject.val(),
					lecturer: lec,
					semester: $('#semester option:selected').val(),
					date_curr: date_curr.val(),
					date_end: date_end.val(),
					is_ajax: 8
				};
				
				$.post("php-script/add.php", obj, function(source){
					var ck = source.split("\n");
					if(ck[0] == 1){
						alert(ck[1]);
					}else{
fnc_dataReserv($('#acadyear-reserv').text(), sem.find('option:selected').val(), '#reserv-content', 'data.reserv.php');
						$("#dialog_reserv").dialog("close");
					}
				});
				
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		open:function(){
			var acadyear = $( "#acadyear" ).spinner(),
				currentYear = (new Date).getFullYear()+543;
				acadyear.spinner( "value", currentYear );
				$( "#date_curr" ).datepicker({
					dateFormat: 'yy-mm-dd'
				} );
				$( "#date_end" ).datepicker( {
					dateFormat: 'yy-mm-dd'
				} );

				$( "#subject" ).focus(function(){
					getSubject($('#acadyear').val(), function(source){
					$( "#subject" ).catcomplete({
						delay: 0,
						source: source
					});
				});
			});
			getLecturer(function(source){
				$( "#lecturerv1" ).autocomplete({
					source: source
				});
			});
		},
		close: function(){
			for(i=$('#tb-lec tr').size();i>1;i--){
				$('#lecturerv'+i).parent().parent().remove();
			}
			all_field.val('');
		}
	});
$('#dialog-reserv-edit').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'แก้ไขคำร้องขอสำรองที่นั่ง',
		buttons:{
			'บันทึกข้อมูล': function(){
				if($('#acadyear-edit').val() == '' || $('#subject-edit').val() == '' || $('#semester-edit option:selected').val() =='' || $('#date-curr-edit').val() == '' || $('#date-end-edit').val() == ''){
					//alert("ค่าว่าง");alert(acad.val()+" "+subject.val()+" "+editor.getData()+" "+date_curr.val()+" "+date_end.val());
					$('#dialog-message').text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$('#dialog-message').dialog( 'open' );
					return false;
										
				}
				var lec = '';
				$('input[id^="lecturer-edit"]').each(function(){
					if($( this ).val() == ''){
						$('#dialog-message').text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
						$('#dialog-message').dialog( 'open' );
						return false;
					}
					lec += $( this ).val()+"/";
				});
				var obj = {
					id: $('#reservID').val(),
					acadyear: $('#acadyear-edit').val(),
					subject: $('#subject-edit').val(),
					lecturer:  lec,
					semester: $('#semester-edit option:selected').val(),
					date_curr: $('#date-curr-edit').val(),
					date_end: $('#date-end-edit').val(),
					is_ajax: 9
				};
				
				$.post("php-script/edit.php", obj, function(source){
					var ck = source.split("\n");
					if(ck[0] == 1){
						alert(ck[1]);
					}else{
						fnc_dataReserv($('#acadyear-reserv').text(), sem.find('option:selected').val(), '#reserv-content', 'data.reserv.php');
						$("#dialog-reserv-edit").dialog("close");
					}
				});
				
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		open:function(){
			var acadyear = $( "#acadyear-edit" ).spinner(),
				currentYear = (new Date).getFullYear()+543;
				acadyear.spinner( "value", currentYear );
				$( "#date-curr-edit" ).datepicker({
					dateFormat: 'yy-mm-dd'
				} );
				$( "#date-end-edit" ).datepicker( {
					dateFormat: 'yy-mm-dd'
				} );

				$( "#subject-edit" ).focus(function(){
					getSubject($('#acadyear-edit').val(), function(source){
					$( "#subject-edit" ).catcomplete({
						delay: 0,
						source: source
					});
				});
			});
			getLecturer(function(source){
				$( "#lecturer-edit" ).autocomplete({
					source: source
				});
			});
		},close: function(){
			for(i=$('#tb-lec-edit tr').size();i>0;i--){
				$('#lecturer-edit'+i).parent().parent().remove();
			}
		}
	});
	
	$('#add-reserv').click(function(){
		$('#dialog_reserv').dialog( 'open' );
		return false;
	});
	function getSubject(courses, handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data: {courses: courses, is_ajax: 10},
			success: function(source){
				var countriesArray;
				countriesArray = $.map(source, function (val, i) {
					return { label: val.subCode+' '+val.subName, category: val.name };
				});
				
				handleData(countriesArray)
				
			}
		});
	}	

	function fnc_dataReserv(where, semester, content, url){
			$.ajax({
				type: 'GET',
				url: 'modules/admin/'+url+'?aca='+where+'&sem='+semester,
				success: function(response){
					$.getScript('Scripts/popbox.js', function(){
						$(content).html(response);
						$('.btn_info, .btn_reserv').button();
						$('.popbox').popbox();
					});
					
				}
			});	
	}
	function get_num_rows(db, handleData){
		$.post('php-script/pull.data.php', {is_ajax: 5, db: db}, function(source){
			handleData(source);
		});
	}
	$mess.dialog({
				modal: false,
				title: 'Error Message!',
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
	$('#btn-search-detail').click(function(){
		var key = $('#search-detail').val();
		if(key == ''){
			$mess.text('กรุณากรอกข้อมูลค้นหาด้วยครับ!');
			$mess.dialog( 'open' );
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'php-script/pull.data.php',
			data:{list: 'reservID', tb: 'reservation', field: 'subject', key: key, is_ajax: 35},
			success: function( source ){
				if( source == 0 ){
					$mess.text('ไม่พบข้อมูลนิสิต!');
					$mess.dialog( 'open' );
					return false;
				}else{
					fnc_edit( source );
				}
			}
		});
	})
});
	function getLecturer(handleData){
		/*var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		*/
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json;charset=utf-8',
			dataType: 'json',
			data: {is_ajax: 11},
			success: function(source){
				var countriesArray;
				$.each(source, function(i,val){
					countriesArray = $.map(source, function (val, i) {
						return [val.name];
					});
				});
				handleData(countriesArray);
			}
		});
	}
function fnc_edit(id){
	$.ajax({
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data:{id: id, is_ajax: 12},
		success: function(source){
			$.each(source, function(i, val){
				$('#reservID').val(val.reservID);
				$('#acadyear-edit').val(val.acadyear);
				$('#subject-edit').val(val.subject);
			//	$('#lecturer-edit').val(val.lecturers);
				var lec_split = val.lecturers,
					lec = lec_split.substring(0, lec_split.length-1).split('/');
				$.each(lec, function(i, val){
					i = i+1;
					var html = "<tr><td><input type=\"text\" id=\"lecturer-edit"+i+"\" style=\"width:300px;height:25px;\" value=\""+val+"\"/></td></tr>";
					$('#tb-lec-edit').append(html);
					getLecturer(function(source){
							$( "#lecturer-edit"+i ).autocomplete({
								source: source
							});
						});
				})
				$('#semester-edit option').each(function(){
					if($(this).val() == val.semester)
						$(this).prop('selected', true)
				});
				$('#date-curr-edit').val(val.date_curr);
				$('#date-end-edit').val(val.date_end);
			})
			$('#dialog-reserv-edit').dialog( 'open' );
		}	
	});
}
function fnc_info(key){
	$('#div-info').dialog( {
		autoOpen: false,
		width: 420,
		height: 'auto',
		modal: true,
		title: 'Info',
		buttons: {
			Ok: function(){
				$( this ).dialog( 'close' );
			}
		}
	} );
	$.ajax( {
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data: {id: key, is_ajax: 15}
	} ).done(function( source ){
		$('#label-subject').text(source['0']['subject']);
		var str = "";
		$.each(source['0']['lecturers'].split('/'), function(i, val){
			str += val+"</br>"	
		});
		$('#label-lecturer').html(str);
		$('#label-semester').text(source['0']['semester']);
		$('#label-aca').text(source['0']['acadyear']);
		date_TH(source['0']['date_curr'] , function(source){
			$('#label-date-curr').text(source);
		})
		date_TH(source['0']['date_end'] , function(source){
			$('#label-date-end').text(source);
		})
		$('#div-info').dialog( 'open' );
	});
}
function date_TH(dateTH, handleData){
	var mount = {
		'01': 'ม.ค.',
		'02': 'ก.พ',
		'03': 'มี.ค.',
		'04': 'เม.ย',
		'05': 'พ.ค.',
		'06': 'มิ.ย.',
		'07': 'ก.ค.',
		'08': 'ส.ค.',
		'09': 'ก.ย.',
		'10': 'ต.ค.',
		'11': 'พ.ย',
		'12': 'ธ.ค.'
	},
		date_split = dateTH.split('-'),
		newMount = null;
	$.each(mount, function(i, val){
		if(date_split['1'] == i){
			newMount = val;
		}
	});
	var newYear = Number(date_split['0'])+543,
		  str = date_split['2']+' '+newMount+' '+newYear;
	handleData(str);
}
function fnc_data(key){
	$('#reserv-dialog').dialog({
		autoOpen: false,
		width: 800,
		height: 600,
		modal:true,
		buttons: {
			Close: function(){
				$(this).dialog( 'close' );	
			}
		}
	});
	paggeing('#data-reserv-pagging', key, 9);
}
function paggeing(page, key, row){
	get_num_rows2(row, key, function(source){//acadyear1
		
	var limit = 10;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			onPageClick: function(p, e){
				$('#data-reserv').load('modules/student/data.reserv.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
					$('#reserv-dialog').dialog( 'open' );
				});
			},
			onInit: function(){
				
					var p = $(page).pagination('getCurrentPage');
					 
					$('#data-reserv').load('modules/student/data.reserv.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
						$('#reserv-dialog').dialog( 'open' );
					});
			}
		});
		
	});
}
function get_num_rows2(db, id, handleData){
	$.post('php-script/pull.data.php', {id: id, is_ajax: 5, db: db}, function(source){
		handleData(source);
	});
}
function fnc_report($key){
	window.location.href = "report/index.php?id="+$key;
}
</script>