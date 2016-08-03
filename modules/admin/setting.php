<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealstaff" onclick="" style="z-index: 7;">ตั้งค่า</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style type="text/css">
	.table{
		width:600px;
		height:100px;
		display:table;
		position:relative;
		border-collapse:collapse;
		position:relative;
		text-align:center;
		margin-left: 20px;
		text-decoration:none;
		vertical-align: middle;
	}
	.row{
		display:table-row;
	}
	.cell{
		display:table-cell;
		border-bottom: 1px dashed #ccc;
	}
	.cell:hover{background-color:#6CF;}
	.a-deal{width:80px;height:80px;position:relative;text-decoration:none;
		display: table-cell; text-align: center; vertical-align: middle;
	}
</style>
<style type="text/css">
	.table{
		width:600px;
		height:100px;
		display:table;
		position:relative;
		border-collapse:collapse;
		position:relative;
		text-align:center;
		margin-left: 20px;
		text-decoration:none;
		vertical-align: middle;
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
</style>
<div class="table">
	<ul class="row">
		<li class="cell">&nbsp;</li>
		<li class="cell"><a id="btn-banner" class="a-deal" href=""><img style="width: 50px;display:block;margin:auto;" src="images/banner-icon.jpg" style="display:block;margin:auto;"/>เพิ่มภาพแบนเนอร์</a></li>
		<li class="cell"><a id="btn_status" class="a-deal" href=""><img style="width: 50px;display:block;margin:auto;" src="images/user-settings-icon.png" style="display:block;margin:auto;"/>เพิ่มสถานะบุคลากร</a></li>
		<li class="cell"><a id="btn_forgot" class="a-deal" href=""><img src="images/Vista_icons_08.png" style="display:block;margin:auto; width: 40px;"/>ลืมหรัสผ่าน</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell"><a class="a-deal" href="JavaScript:void(0)">&nbsp;</a></li>
		<li class="cell">&nbsp;</li>
	</ul>
</div>
<br/>
<div id="tabs" style="margin:20px;">
	<ul>
		<li><a href="#tabs-1">แบนเนอร์</a></li>
		<li><a href="#tabs-2">ข้อมูลสถานะ</a></li>
	</ul>
	<div id="tabs-1">
		<div id="banner-content"></div>
		<br/>
		<div id="banner-pagging"></div>
	</div>
	<div id="tabs-2">
		<div id="status-staff-content"></div>
		<br/>
		<div id="status-staff-pagging"></div>
	</div>
</div>
<div id="dialog-status" style="display:none">
<table>
	<tr><td>สถานะ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td>
	<input id="status" type="text" style="width:230px;height:30px;"/></td></tr>
</table>
</div>
<div id="dialog-status-edit" style="display:none;">
<table>
	<tr><td>สถานะ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td>
	<input id="status-edit" type="text" style="width:230px;height:30px;"/></td>
	<input type="hidden" id="statusID"/>
	</tr>
</table>
</div>
<div id="dialog-banner" style="display:none;">
	<form id="form-banner" method="post" enctype="multipart/form-data" action="php-script/add.php">
	<table>
		<tr>
			<td align="right">หัวข้อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="title" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">ภาพ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="file" name="image" />
		</tr>
		<tr>
			<td align="right">ลิงค์&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="url" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">firstline&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="firstline" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">secondline&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="secondline" style="width: 300px;"/>
		</tr>
	</table>
	<input type="hidden" name="is_ajax" value="17" />
	</form>
</div>
<div id="dialog-banner-edit" style="display:none;">
	<form id="form-banner-edit" method="post" enctype="multipart/form-data" action="php-script/edit.php">
	<table>
		<tr>
			<td align="right">หัวข้อ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="title-edit" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">ภาพ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="file" name="image-edit"/>
		</tr>
		<tr>
			<td align="right">ลิงค&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font>์</td><td><input type="text" name="url-edit" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">firstline&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="firstline-edit" style="width: 300px;"/>
		</tr>
		<tr>
			<td align="right">secondline&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td><td><input type="text" name="secondline-edit" style="width: 300px;"/>
		</tr>
	</table>
	<input type="hidden" name="unlink"/>
	<input type="hidden" name="id"/>
	<input type="hidden" name="is_ajax" value="13" />
	</form>
</div>
<div id="dialog-forgot" style="display:none">
	<i class="icon-user" style="display:inline-block;">&nbsp;&nbsp;</i><b style="display:inline-block;margin-left: 5px;">ลืมรหัสผ่านแก้ไขได</b>
	<table>
		<tr><td>ชื่อเข้าใชงาน</td><td><input type="text" name="username" value="52011211206" class="highlight" style="width: 200px;"/></td></tr>
		<tr><td>กรุณากรอกอีเมลล์ </td><td><input type="text" name="email" value="bed.wuttipong@gmail.com" class="highlight" style="width: 200px;"/></td></tr>
	</table>
	<hr style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"/>
	<div id="content-forgot">&nbsp;</div>
	<b>*หมายเหตุ : .....................................</b>
</div>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script>
$(function(){
	paggeing("#banner-pagging", "#banner-content", 13, 'data.banner.php');
	paggeing("#status-staff-pagging", "#status-staff-content", 8, 'data.status.staff.php');
	
	$( "#tabs" ).tabs();

	$("#btn_status").click(function(){
		$("#dialog-status").dialog({
		autoOpen: false,
		width: 400,
		height: 'auto',
		modal: true,
		title: 'เพิ่มข้อมูลสถานะ',
		buttons:{
			'บันทึกข้อมูล': function(){
				var status = $("#status").val();
				if(status == ''){
					alert("ค่าว่าง");
					return false;
				}
				$.post("php-script/add.php", {status: status, is_ajax: 5}, function(source){
					var ck = source.split("\n");
					if(ck[0]==1){
						alert(ck[1]);
					}else {
						var c = $("#status-staff-pagging").pagination('getCurrentPage');
						paggeing2("#status-staff-pagging", "#status-staff-content", 8, 'data.status.staff.php', c);
						$("#dialog-status").dialog( 'close' );		
					}
				});
			},
			'ยกเลิก': function(){
				$("#dialog-status").dialog( 'close' );
			}
		},
		close: function(){
			$("#status").val('');
		}
	});
		$("#dialog-status").dialog( "open" );
		return false;
	});
	$("#btn-banner").click(function(){
		$('#dialog-banner').dialog({
		autoOpen: false,
		width: 500,
		height: 'auto',
		title: 'เพิ่มภาพแบนเนอร์',
		buttons:{
			 'บันทึก' : function(){
				 	$('#form-banner').ajaxForm({
						success: function( source ){
							var ck = source.split("\n");
							if(ck[0]==1){
								alert(ck[1]);
							}else {
								$("#dialog-banner").dialog( 'close' );
								$('#dialog-banner').clearForm();
								var c = $("#status-staff-pagging").pagination('getCurrentPage');
								paggeing2("#banner-pagging", "#banner-content", 13, 'data.banner.php',c);
							}
						}
					}).submit();
			 },
			'ยกเลิก' : function(){
				$( this ).dialog( 'close' );
			 }
		},
		close: function(){
			$('#form-banner').resetForm();
		}
	});
		$("#dialog-banner").dialog( 'open' );
		return false;
	});
	$('#btn_forgot').click(function(){
		$('#dialog-forgot').dialog({
			autoOpen: false,
			width: 500,
			height: 'auto',
			title: 'ลืมรหัสผ่าน',
			buttons:{
				Submit: function(){
					var obj = {
						username: $('input[name="username"]').val(),
						email: $('input[name="email"]').val(),
						is_ajax: 19
					};
					$.ajax({
						url: 'php-script/pull.data.php',
						data: obj,
						success:function(source){
							$('#content-forgot').html(source);
						}
					});
				},
				Cancel: function(){
					$( this ).dialog( 'close' );
					$('#content-forgot').html('');
				}
			}
		});

		$("#dialog-forgot").dialog( 'open' );
		return false;
	});
	function paggeing(page, content, row, url){
		get_num_rows(row, function(source){//acadyear1
			var limit = 12;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
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
					//setInterval(function(){
						var p = $(page).pagination('getCurrentPage');
						 $.ajax({
							type: 'GET',
							url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit,
							success: function(response){
								$(content).html(response);
							}
						});
					//}, 3000);
				}
			});
		});
	}
})(jQuery);
	function get_num_rows(db, handleData){
		$.post('php-script/pull.data.php', {is_ajax: 5, db: db}, function(source){
			handleData(source);
		});
	}
function paggeing2(page, content, row, url, c){
		get_num_rows(row, function(source){//acadyear1
			var limit = 12;
			$(page).pagination({
				items: source,
				currentPage: c,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
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
					//setInterval(function(){
						var p = $(page).pagination('getCurrentPage');
						 $.ajax({
							type: 'GET',
							url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit,
							success: function(response){
								$(content).html(response);
							}
						});
					//}, 3000);
				}
			});
		});
	}
function fnc_edit(id){
	$("#dialog-status-edit").dialog({
		autoOpen: false,
		width: 400,
		height: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลสถานะ',
		buttons:{
			'บันทึกข้อมูล': function(){
				var status = $("#status-edit").val();
				if(status == ''){
					alert("ค่าว่าง");
					return false;
				}
				$.post("php-script/edit.php", {id: $('#statusID').val(), status: status, is_ajax: 10}, function(source){
					var ck = source.split("\n");
					if(ck[0]==1){
						alert(ck[1]);
					}else {
						var c = $("#status-staff-pagging").pagination('getCurrentPage');
						paggeing2("#status-staff-pagging", "#status-staff-content", 8, 'data.status.staff.php', c);
						$("#dialog-status-edit").dialog( 'close' );		
					}
				});
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		close: function(){
			$("#status-edit").val('');
		}
	});
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data:{id: id, table: 5, is_ajax: 7},
			success: function(source){
				$.each(source, function(i, val){
					$('#statusID').val(val.id);
					$('#status-edit').val(val.des);
				});
				$('#dialog-status-edit').dialog( 'open' );
			}	
		});
}
function fnc_edit2(id){
$('#dialog-banner-edit').dialog({
		autoOpen: false,
		width: '500',
		height: 'auto',
		title: 'แก้ไขแบนเนอร์',
		buttons:{
			 'บันทึก' : function(){
				 	$('#form-banner-edit').ajaxForm({
						success: function( source ){
							var ck = source.split("\n");
							if(ck[0]==1){
								alert(ck[1]);
							}else {
								$("#dialog-banner-edit").dialog( 'close' );
								$('#dialog-banner-edit').clearForm();
								var c = $("#status-staff-pagging").pagination('getCurrentPage');
								paggeing2("#banner-pagging", "#banner-content", 13, 'data.banner.php',c);
							}
						}
					}).submit();
			 },
			'ยกเลิก' : function(){
				$( this ).dialog( 'close' );
			 }
		},
		close: function(){
			$( this ).resetForm();
		}
	});
	
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data:{id: id, table: 6, is_ajax: 7},
			success: function(source){
				$.each(source, function(i, val){
					$('input[name="id"]').val(val.id);
					$('input[name="title-edit"]').val(val.title);
					$('input[name="unlink"]').val(val.image);
					$('input[name="url-edit"]').val(val.url);
					$('input[name="firstline-edit"]').val(val.firstline);
					$('input[name="secondline-edit"]').val(val.secondline);
					
				});
				$('#dialog-banner-edit').dialog( 'open' );
			}	
		});
}
function fnc_show(key){
	$('#div-show'+key).show();
}
function fnc_hide(key){
	$('#div-show'+key).hide();
}
function fnc_del(id,image){
	$.post('php-script/delete.php', {id: id, img: image, is_ajax: 2}, function(source){
		var ch = source.split("\n");
		if(ch[0] == 1){
			alert(ch[1]);
		}else {
			var c = $("#status-staff-pagging").pagination('getCurrentPage');
			paggeing2("#banner-pagging", "#banner-content", 13, 'data.banner.php',c);
		}
	});
	
}
</script>
