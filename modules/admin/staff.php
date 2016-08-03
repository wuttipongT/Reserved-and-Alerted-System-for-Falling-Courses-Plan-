<? if(!$_SESSION["staff"]){header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealnews" onclick="" style="z-index: 7;">การจัดการบุคลากร</a>
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
	.a-add-news:hover,
	.a-add-news:focus{
		text-decoration: underline;
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
<div style="position:relative;width: 100%; height: 30px;">
<div style="padding: 0;" class="serach-detail">
	<input type="text" id="search-detail" style="display:inline-block; border:none;" class="not input-search1" placeholder="ชื่อ-สกุล"/><i class="icon-search" style="position:relative;top: 5px;" id="btn-search-detail"></i>
</div>
</div>
<table style="border-collapse:collapse;width:500px;text-align:center;margin-left: 50px;">
	<tr class="never">
    	<td align="right" colspan="6" class="th" style="border: none; height: 30px;">
			<a id="btn-staff" class="a-add-news" href="JavaScript:void(0);" style="padding-right: 5px;"><i class="icon-plus-sign" style="vertical-align: middle;"></i>&nbsp;เพิ่มบุคลากร</a>&nbsp;
    	</td>
    </tr>
    
    <tr class="never">
		<td>
		<div id="div-staff"></div>
		<br/>
		<div id="div-pagging-staff"></div>
		</td>
    </tr>
</table>
<!--dialog staff -->
<div id="dialog_staff" style="display:none;">
	<form name="form-staff" method="post" action="php-script/add.php" enctype="multipart/form-data">
		<table style="table-layout:fixed;">
		<tr>
			<td align="right">ชื่อ-สกุล&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="name" type="text" name="name" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">การศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="education" type="text" name="education" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">ชื่ออีเมลล์&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="email" type="text" name="email" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">เบอร์ติดต่อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="tel" name="tel" type="text" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right" style="text-align:top;">ตำแหน่ง&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="position" name="position" type="text" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">สถานะ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="status" name="status" style="padding:5px; width:100px;">
				   <option value="" selected>&nbsp;</option>
				</select>
				​
			</td>
		</tr>
		<tr>
			<td align="right">ภาพ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="photo" name="photo" type="file" style="width:230px;height:30px;" /></td>
		</tr>
		<tr><td colspan="2" id="ch2"></td></tr>
		</table>
		<input type="hidden" name="is_ajax" value="6"/>
	</form>
</div>
<!--dialog edit staff -->
<div id="dialog_edit_staff" style="display:none;">
	<form name="form-staff_edit" method="post" action="php-script/edit.php" enctype="multipart/form-data" style="float:left;">
		<table style="table-layout:fixed;">
		<tr>
			<td align="right">ชื่อ-สกุล&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="name_edit" type="text" name="name_edit" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">การศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="education_edit" type="text" name="education_edit" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">ชื่ออีเมลล์&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="email_edit" type="text" name="email_edit" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">เบอร์ติดต่อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="tel_edit" name="tel_edit" type="text" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right" style="text-align:top;">ตำแหน่ง&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="position_edit" name="position_edit" type="text" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">สถานะ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="status_edit" name="status_edit" style="padding:5px; width:100px;">
				   <option value="">&nbsp;</option>
				</select>
				​
			</td>
		</tr>
		<tr>
			<td align="right">ภาพ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="photo_edit" name="photo_edit" type="file" style="width:230px;height:30px;" /></td>
		</tr>
		<tr><td colspan="2" id="ch3"></td></tr>
		</table>
		<input type="hidden" name="is_ajax" value="4"/>
		<input type="hidden" id="hidden-img" name="hidden-img"/>
		<input type="hidden" id="staff_id" name="staff_id"/>
	</form>
	<img id="staff-img" style="width:120px;height:auto; display:block; margin:auto auto; float:right;" />
</div>
<div id="dialog-message" style="display:none;"></div>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script>
$(function($){
	var $mess = $( "#dialog-message" );
		paggeing("#div-pagging-staff", '#div-staff', 4,'data.staff.php');//sub pre
		var name = $('#name'),
		education = $('#education'),
		email = $('#email'),
		tel = $('#tel'),
		position = $('#position'),
		all_staff = $([]).add(name).add(education).add(email).add(tel).add(position);

	$("#dialog_staff").dialog({
		autoOpen: false,
		width: 500,
		heiht: 'auto',
		modal: true,
		title: 'เพิ่มบุคลากร',
		buttons: {
			'เพิ่มบุคลากร': function(){
				if(name.val() == '' || education.val() == '' || email.val() == '' || tel.val() == '' || position.val() == '' || $('select[name="status"] option:selected').val() == ''){
						$mess.text("กรุณากรอกข้อมูลให้ครบถ้วนด้วยครับ!");
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
				}
				$('form[name="form-staff"]').ajaxForm({
					beforeSerialize:function(){
						$('#ch2').html('<img src="images/GsNJNwuI-UM.gif" />&nbsp;รอสักครู่...');
					},
					success: function(source){
						var ck = source.split("\n");
						if(ck[0] == 1){
							$('#ch2').html('');
							$mess.text(ck[1]);
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
						}else{
							var c = $("#div-pagging-staff").pagination('getCurrentPage');
							paggeing2("#div-pagging-staff", '#div-staff', 4, 'data.staff.php', c)
							$("#dialog_staff").dialog('close');
							$('#ch2').html('');
						}
					}
				}).submit();
			},
			'ยกเลิก': function(){
				$("#dialog_staff").dialog( 'close' );
			}
		},
		open: function(){
			getStatus(function(source){
				$.each(source, function(i,val){
					$("#status").append($('<option>',{
						value: val.id,
						text: val.des
					}));
				});
			});
			$(this).find('select, input, textarea').first().blur();
		},
		close: function(){
			$('form[name="form-staff"]').resetForm();
			$('#status option').not('option:eq(0)').remove();
		}
		
	});
	//edit
	$("#dialog_edit_staff").dialog({
		autoOpen: false,
		width: 500,
		heiht: 'auto',
		modal: true,
		title: 'แก้ไขบุคลากร',
		buttons: {
			'แก้ไขบุคลากร': function(){
				if($('#name_edit').val() == '' || $('#education_edit').val() == '' || $('#email_edit').val() == '' || $('#tel_edit').val() == '' || $('#position_edit').val() == '' || $('select[name="status_edit"] option:selected').val() == ''){
						$mess.text("กรุณากรอกข้อมูลให้ครบถ้วนด้วยครับ!");
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
				}
				$('form[name="form-staff_edit"]').ajaxForm({
					beforeSerialize:function(){
						$('#ch3').html('<img src="images/GsNJNwuI-UM.gif" />&nbsp;รอสักครู่...');
					},
					success: function(source){
						var ck = source.split("\n");
						if(ck[0] == 1){
							$('#ch3').html('');
							$mess.text(ck[1]);
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
						}else{
							var c = $("#div-pagging-staff").pagination('getCurrentPage');
							paggeing2("#div-pagging-staff", '#div-staff', 4, 'data.staff.php', c)
							$("#dialog_edit_staff").dialog('close');
							$('#ch3').html('');
						}
					}
				}).submit();
			},
			'ยกเลิก': function(){
				$("#dialog_edit_staff").dialog( 'close' );
			}
		},
		close: function(){
			$("#status_edit option").not("option:eq(0)").remove();
			$('form[name="form-staff_edit"]').resetForm();
		}
	});
	$('#btn-staff').click(function(){
		$("#dialog_staff").dialog( 'open' );
		return false;
	});
	function paggeing(page, content, row, url){
		get_num_rows(row, function(source){//acadyear1
			var limit = 5;
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
	function paggeing2(page, content, row, url, c){
		get_num_rows(row, function(source){//acadyear1
			var limit = 5;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				currentPage: c,
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
	$('#btn-search-detail').click(function(){
		if( $('#search-detail').val() == ''){
			$mess.text("กรุณากรอกข้อมูลค้นหาด้วยค่ะ");
			$mess.dialog({
				modal: false,
				title: 'Error Message!',
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'php-script/pull.data.php',
			data: {key: $('#search-detail').val(), is_ajax: 32},
			success: function( source ){
				if( source == 0){
					$mess.text("ไม่พบรายการค้นหาค่ะ");
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}else{
					fnc_edit( source );
				}
			}
		});
	});
})(jQuery);

function fnc_edit(id){
	$.ajax({
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data: {id: id,is_ajax: 8}
	}).done(function(source){
		$.each(source, function(i, val){
			var b = val.photo;
			$('#name_edit').val(val.name);
			$('#education_edit').val(val.education);
			$('#email_edit').val(val.email);
			$('#tel_edit').val(val.mobile);
			$('#position_edit').val(val.position);
			$('#staff-img').attr("src", b);
			$('#hidden-img').attr("src", b);
			$('#staff_id').val(val.staffID);
			
		});
		getStatus(function(response){
			$.each(response, function(i,val){
				$("#status_edit").append($('<option>',{
					value: val.id,
					text: val.des
				}));
			});
			$("#status_edit option").each(function(){
				if($(this).val() == source['0']['status']){
				 $(this).prop("selected",true);
				}
			});
		});
		$('#dialog_edit_staff').dialog( 'open' );
	});
}
function getStatus(handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json;charset=utf-8',
			dataType: 'json',
			data: {is_ajax: 4}
		}).done(function(source){
			handleData(source)
		});
	}
</script>