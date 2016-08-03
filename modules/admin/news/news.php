<? if(!$_SESSION["staff"]){header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealnews" onclick="" style="z-index: 7;">การจัดการข่าวสาร</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style type="text/css">
	td{
		border-bottom: 1px dashed #ccc;
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
	margin-left:20px;
	display:none;
}

</style>
<table style="border-collapse:collapse;width:500px;text-align:center;margin-left: 50px;">
	<tr class="never">
    	<td align="right" colspan="6" class="th" style="border: none; height: 30px;">
			<a id="add-news" class="a-add-news" href="" style="padding-right: 5px;">
    			<i class="icon-plus-sign" style="vertical-align: middle;"></i>&nbsp;เพิ่มข่าวสาร
			</a>
    	</td>
    </tr>
</table>
<div id="news-content"></div>
<br/>
<div id="news-pagging" style="margin-left: 50px;"></div>
<!--//** --------------------------- **//-->
<div id="dialog_addnews" style="display:none;">
<form name="form-news" method="post" action="php-script/add.php" enctype="multipart/form-data">
		<table style="border-collapse: separate; border-spacing: 5px;">
			<tr class="never">
				<td style="border: none;" align="right">
					<label>หัวข้อข่าว&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td style="border: none;" align="left">
					<input id="title" type="text" name="title" class="highlight" style="width:250px;height:28px;" />
				</td>
			</tr>
			<tr class="never">
				<td style="border: none;" align="right" valign="top">
					<label>เนื้อหาข่าว&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td style="border: none;" align="left">
					<textarea cols="80" id="editor1" name="editor1"></textarea>
				</td>
			</tr>
			<tr class="never">
				<td style="border: none;" align="right" valign="right">&nbsp;</td>
				<td style="border: none;" width="100" align="left" valign="left">
					<label id="upload-file-container" style="cursor:pointer;" for="photo">
					   <input type="file" name="photo" id="photo" />
					</label>
					<label id="filename" style="display: inline-block;"></label>
				</td>
			</tr>
		</table>
		<input name="is_ajax" value="7" type="hidden"/>
	</form>
</div>
<!--//** ------edit--------------------- **//-->
<div id="dialog_editnews" style="display:none;">
	<form name="form-news-edit" method="post" action="php-script/edit.php" enctype="multipart/form-data">
		<table style="border-collapse: separate; border-spacing: 5px;">
			<tr class="never">
				<td style="border: none;" align="right">
					<label>หัวข้อข่าว&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td style="border: none;" align="left">
					<input id="title_edit" type="text" name="title_edit" class="highlight" style="width:250px;height:28px;" />
				</td>
			</tr>
			<tr class="never">
				<td style="border: none;" align="right" valign="top">
					<label>เนื้อหาข่าว&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></label>
				</td>
				<td style="border: none;" align="left">
					<textarea cols="80" id="editor1_edit" name="editor1_edit"></textarea>
				</td>
			</tr>
			<tr class="never">
				<td style="border: none;" align="right" valign="right">&nbsp;</td>
				<td style="border: none;" width="100" align="left" valign="left">
					<label id="upload-file-container" for="photo_edit">
					   <input type="file" name="photo_edit" id="photo_edit" />
					</label>
					<label id="filename_edit" style="display: inline-block;"></label>
				</td>
			</tr>
		</table>
		<input name="is_ajax" value="5" type="hidden"/>
		<input id="idNews_edit" name="id" type="hidden"/>
	</form>
</div>
<div id="dialog-message" style="display:none;"></div>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
// Replace the <textarea id="editor"> with an CKEditor
	// instance, using default configurations.
	var editor_edit = CKEDITOR.replace( 'editor1_edit', {width: '650px',height: '250px',uiColor: '#14B8C4'} ),
	$mess = $( "#dialog-message" );
	var editor = CKEDITOR.replace( 'editor1', {width: '650px',height: '250px',uiColor: '#14B8C4'} );
	paggeing('#news-pagging','#news-content', 5, 'data.news.php');
	//CKEDITOR.replace( 'editor2' );
$(document).ready(function(){
	$mess.dialog({
		autoOpen:false,
		modal: false,
		title: 'Error Message!',
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
	$('#dialog_addnews').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'เพิ่มข่าวสาร',
		buttons: {
			'เพิ่มข่าวสาร': function(){
				if($('#title').val() == '' || editor.getData() == '' || $('input[name="photo"]').val() == ''){
					//$mess.dialog( 'open' );
					alert("กรุณากรอกข้อมูลให้ครบด้วยครับ!");
					
				}else{
				$('#editor1').val(editor.getData());
				submit_news();
				}
			},
			'ยกเลิก': function(){
				$('#dialog_addnews').dialog( 'close' );
			}
		},
		close: function(){
			editor.setData( '' );
			$('#title').val('');
			
		}
	});
	$('#dialog_editnews').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'แก้ไขข่าวสาร',
		buttons: {
			'แก้ไขข่าวสาร': function(){
				if($('#title_edit').val() == '' || editor_edit.getData() == '' || $('input[name="photo_edit"]').val() == ''){
					alert("กรุณากรอกข้อมูลให้ครบด้วยครับ!");
				}else{
				$('#editor1_edit').val(editor_edit.getData());
					$('form[name="form-news-edit"]').ajaxForm({
						success: function(source){
							var ck = source.split("\n");
							if(ck[0] == 1){
								alert(ck[1]);
							}else{
								var c = $('#news-pagging').pagination('getCurrentPage');
								paggeing2('#news-pagging', '#news-content', 5, 'data.news.php', c);
								$("#dialog_editnews").dialog('close');
							}
						}
					}).submit();
				}
			},
			'ยกเลิก': function(){
				$('#dialog_editnews').dialog( 'close' );
			}
		},
		close: function(){
			editor_edit.setData( '' );
			$('#title_edit').val('');
			$('#filename_edit').html('');
		}
	});
	$('#add-news').click(function(){
		$('#dialog_addnews').dialog( 'open' );
		return false;
	});
	
	$('input[type=file]').change(function(e){
		var pathArray = $('input[type=file]').val().split('\\');
		$('#filename').html(pathArray)
	});
});
function submit_news(){
	$('form[name="form-news"]').ajaxForm({
		success: function(source){
			var ck = source.split("\n");
			if(ck[0] == 1){
				$mess.text(ck[1]);
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
				var c = $('#news-pagging').pagination('getCurrentPage');
				paggeing2('#news-pagging', '#news-content', 5, 'data.news.php', c);
				$("#dialog_addnews").dialog('close');
			}
		}
	}).submit();
}
function paggeing(page, content, row, url){
	get_num_rows(row, function(source){//acadyear1
		var limit = 29;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			currentPage: 1,
			onPageClick: function(p, e){
				 $.ajax({
					type: 'GET',
					url: 'modules/admin/news/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});	
			},
			onInit: function(){
				var p = $(page).pagination('getCurrentPage');
				 $.ajax({
					type: 'GET',
					url: 'modules/admin/news/'+url+'?start='+limit*(p-1)+'&limit='+limit,
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
		var limit = 29;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			currentPage: c,
			onPageClick: function(p, e){
				 $.ajax({
					type: 'GET',
					url: 'modules/admin/news/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});	
			},
			onInit: function(){
				var p = $(page).pagination('getCurrentPage');
				 $.ajax({
					type: 'GET',
					url: 'modules/admin/news/'+url+'?start='+limit*(p-1)+'&limit='+limit,
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
function fnc_edit(id){
	$.ajax({
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data: {id: id,is_ajax: 9}
	}).done(function(source){
		$('#idNews_edit').val(source['0']['newsID']);
		$('#title_edit').val(source['0']['title']);
		editor_edit.setData(source['0']['detail']);
		$('#filename_edit').css("float","right").html('<a href="JavaScript:void(0)" onclick="JavaScript:fnc_img()">แสดงภาพ</a>');
		$("#dialog-message").html('<img src="modules/admin/news/images/'+source['0']['pic']+'"/>');
		$('#dialog_editnews').dialog( 'open' );
	});
}
function fnc_img(){
	$mess.dialog({
		modal: false,
		width: 'auto',
		height: 'auto',
		title: 'ภาพข่าวสาร!'
	});
}
function fnc_del(id){
	$mess.text('ต้องการลบข้อมูลหรือไม่!');
	$mess.dialog({
		modal: false,
		title: 'ข้อความแจ้งเเตือน!',
		buttons: {
			'ลบ': function(){
				$.post("php-script/delete.php",{id: id, is_ajax: 1}, function(source){
					if(source == 1){
						$mess.dialog( "close" );
						var c = $('#news-pagging').pagination('getCurrentPage');
				paggeing2('#news-pagging', '#news-content', 5, 'data.news.php', c);
					}else{
						alert("Error!");
					}
				});
			},
			'ยกเลิก': function(){
				$( this ).dialog( "close" );
			}
		}
	});
	$mess.dialog( 'open' );
}
</script>
