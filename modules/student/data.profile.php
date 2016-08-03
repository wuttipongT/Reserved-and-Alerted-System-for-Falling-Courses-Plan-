<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';

	$obj = new database($host, $username, $password, $dbname);
	$sql = "SELECT * FROM member WHERE studentCode = '".$_SESSION['student']."' LIMIT 1";
	$obj->mysql_query($sql);
	foreach($obj->mysql_fetch_assoc() as $data){
?>
<div style="width:550px;height:200px;position:relative;">
	<div style="width:550px; height: 20px; padding:5px;background-color:#FFF;">
		<label style="text-indent:10px;display:inline-block;">ข้อมูลส่วนตัว</label>
		<label style="display: inline-block;position:relative;float:right;margin-top: -12px;"><a id="edit-profile-staff" href="JavaScript:void(0)" class="button">แก้ไข</a></label>
		<i style="clear:both;line-height:0;"></i>
	</div>
	<div style="padding:10px position:relative;width:550px;height: auto;">
		<table style="border-collapse: collapse; width:399px;float:left;">
			<tr>
				<td style="border:1px dashed #CCC; width:150px;text-indent: 10px;">รหัสนิสิต</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-name"><?=$data["studentCode"];?></label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC; width:150px;border-top:none;text-indent: 10px;">ชื่ออีเมลล์</td>
				<td style="border:1px dashed #CCC;border-top:none;text-indent: 10px;">
					<label id="lb-name"><?=$data["email"];?></label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC;text-indent: 10px;">ชื่อเล่น</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-education"><?=$data["sobriquet"];?></label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC;text-indent: 10px;">วันเดือนปีเกิด</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-mobile"><?=dateThai2($data["birthday"]);?><label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC;text-indent: 10px;">ที่อยู่</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-mail"><?=$data["address"];?></label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC;text-indent: 10px;">เบอร์บ้าน</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-position"><?=$data["phone"];?></label>
				</td>
			</tr>
			<tr>
				<td style="border:1px dashed #CCC;text-indent: 10px;">เบอร์ส่วนตัว</td>
				<td style="border:1px dashed #CCC;text-indent: 10px;">
					<label id="lb-position"><?=$data["mobile"];?></label>
				</td>
			</tr>
		</table>
	<br/>
		<div style="display:table-cell;width:147px;height:154px;border:1px dashed #CCC;border-left:none;text-align: center;vertical-align: middle;">
			<a id="show-img-pro" href="JavaScript:void(0)">
				<img id="img-pro-change" style="width:120px;height:auto; display:block; margin:auto auto; clear:both;" src="
				<? if($data["photo"]==''){echo 'modules/student/image/Client.png';}else{echo $data["photo"];}?>
				
				"/>
			</a>
			<img id="img-pro" title="ภาพโปรไฟล์" style="display:none;" src="<?=$data["photo"];?>"/>
		</div>
		<input type="hidden" value="<?=$data['memberID'];?>"/>
	</div>
</div>
<br style="line-height:0;clear:both;"/>
<div style="width:550px;height:auto;position:relative;margin-top: 10px;">
	<div style="width:550px; height: 20px; background-color:#FFF;position:relative; padding:5px;">
		<span style="text-indent:10px;display:inline;position:relative;margin-left: 10px;">ข้อมูลการเข้าสู่ระบบ</span>
		<label style="display: inline-block;position:relative;margin-top:-12px;float:right;"><a id="edit-pass" href="JavaScript:void(0);" class="button">แก้ไข</a></label>
		<i style="clear:both;line-hieght:0;"></i>
	</div>
	<div style="padding:10px position:relative;width:550px;height: 370px;">
		<table style="border-collapse: collapse; width:550px;">
			<tr><td style="border:1px dashed #CCC; width:150px;text-indent: 10px;">Username</td><td style="border:1px dashed #CCC;text-indent: 10px;"><?=$data["username"];?></td></tr>
			<tr><td style="border:1px dashed #CCC;text-indent: 10px;">Password</td><td style="border:1px dashed #CCC;text-indent: 10px;">**********</td></tr>
		</table>
	</div>

<div id="edit-profile-dialog" style="display:none">
<form id="imageform" action="php-script/edit.php" method="post" enctype="multipart/form-data">
	<div style="padding:10px position:relative;width:599px;height: auto;">
		<table style="float:left;">
			<tr>
				<td style="width:150px;text-indent: 10px;" align="right">ชื่ออีเมลล์&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td style="text-indent: 10px;"><input id="email" name="email" type="text" value="<?=$data["email"];?>" style="width:160px;height:26px;"/></td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" align="right">ชื่อเล่น</td>
				<td style="text-indent: 10px;">
					<input id="nickname" name="sobriquet" type="text" value="<?=$data["sobriquet"];?>" style="width:160px;height:26px;"/>
				</td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" align="right">วัน/เดือน/ปีเกิด</td>
				<td style="text-indent: 10px;">
				<?
					list($year, $month_, $day) = explode("-", $data["birthday"]);
				?>
					<select id="birthday" name="birthday" style="padding:2px;">
				<option value=" ">Day</option>
				<?
					for($i=1;$i<=31;$i++){
						$j = sprintf("%02d",$i);
						?><option <?=$day=== $j ? ' selected="selected"' : '';?>><?=$j;?></option><?
					}
				?>
			</select>
<select name="month" id="month" style="padding:2px;">
  <option value=" ">Month</option>
  <?PHP $month = array('01'=>"มกราคม ",'02'=>"กุมภาพันธ์ ",'03'=>"มีนาคม ",'04'=>"เมษายน ",'05'=>"พฤษภาคม ",'06'=>"มิถุนายน ",'07'=>"กรกฎาคม ",'08'=>"สิงหาคม ",'09'=>"กันยายน ",'10'=>"ตุลาคม ",'11'=>"พฤศจิกายน ",'12'=>"ธันวาคม ");?>
  <?PHP //echo sprintf("%02d",$i)?>
  <?PHP foreach($month as $index =>$val) {?>
  <option value="<?=$index?>" <?=$month_== $index ? ' selected="selected"' : '';?>>
  <?PHP echo $val;?></option>
  <?PHP }?>
</select>
<select name="year" id="year" style="padding:2px;">
  <option value=" ">Year</option>
  <?PHP for($i=0; $i<=50; $i++) {?>
  <option value="<?PHP echo date("Y")-$i+543?>" <?=$year== date("Y")-$i ? ' selected="selected"' : '';?>><?PHP echo date("Y")-$i+543?></option>
  <?PHP }?>
</select>
				</td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" valign="top" align="right">ที่อยู่</td>
				<td style="text-indent: 10px;"><textarea id="address" name="address" cols="24" value="<?=$data["address"];?>" rows="5"><?=$data['address']?></textarea></td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" align="right">เบอร์บ้าน</td>
				<td style="text-indent: 10px;">
					<input id="phone" name="phone" type="text" value="<?=$data["phone"];?>" style="width:160px;height:26px;"/>
				</td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" align="right">เบอร์ส่วนตัว&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td style="text-indent: 10px;">
					<input id="mobile" name="mobile" type="text" value="<?=$data["mobile"];?>" style="width:160px;height:26px;"/>
				</td>
			</tr>
			<tr>
				<td style="text-indent: 10px;" align="right">ภาพ&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td style="text-indent: 10px;">
					<input type="file" name="photo" id="photo" />
				</td>
			</tr>
			<tr>
				<td colspan="2" id="ch" align="right"></td>
			</tr>
		</table>
		<div style="display:table-cell;width:147px;height:128px;text-align: center;vertical-align: middle;">
			<a href="JavaScript:void(0)" />
				<img style="width:120px;height:auto; display:block; margin:auto auto; clear:both;" src="<?if($data["photo"]==''){echo 'modules/student/image/Client.png';}else{echo $data["photo"];}?>"/>
			</a>
		</div>
	</div>
	<input type="hidden" name="rem-photo" value="<?=$data['photo']?>">
	<input type="hidden" name="is_ajax" value="11"/>
	<input type="hidden" name="std_code" value="<?=$_SESSION['student']?>"/>
</form>
</div>
</div><?}?>

<div id="edit-pass-dialog" style="display:none;">
	<table>
		<tr>
			<td>รหัสผ่านเดิม&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="curr-pass" type="password"/></td>
		</tr>
		<tr>
			<td>รหัสผ่านใหม่&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="new-pass" type="password" /></td>
		</tr>
		<tr><td colspan="2"><label id="mess-pro-err"></label></td></tr>
	</table>
</div>
<script src="jquery-ui-1.10.3/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript">
(function($){
	$( "#tabs" ).tabs();
	$("#show-img-pro").click(function(){
		$("#img-pro").dialog();
		return false;
	});
	
	$("#edit-profile-dialog").dialog({
		autoOpen: false,
		height: 'auto',
		width: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลส่วนตัว',
		buttons: {
			"แก้ไข": function() {
				$('#imageform').ajaxForm({
					beforeSerialize:function(){
						$('#ch').html('<img src="images/GsNJNwuI-UM.gif" />&nbsp;รอสักครู่...');
					},
					success:function(source){
						var ch = source.split('\n');
						if(ch[0] == 1){
							alert(ch[1]);
						}else{
							$('#ch').html('');
							$("#edit-profile-dialog").dialog( 'close' );
							window.location.reload();
						}
					}
				}).submit();
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		},open: function(){
			/*$('#birthday').datepicker( {
				dateFormat: 'yy-mm-dd'
			} );*/

		}
	});
	$("#edit-pass-dialog").dialog({
		autoOpen: false,
		height: 'auto',
		width: 450,
		modal: true,
		title: 'เปลี่ยนรหัสผ่าน',
		buttons: {
			"เปลี่ยนรหัสผ่าน" : function(){
				var currPass = $("#curr-pass").val(),
					newPass = $("#new-pass").val();
					//allElement = [].add(currPass).add(newPass);
				if(currPass == '' || newPass == ''){
					$("#mess-pro-err").css("color","red").text("ค่าว่าง!");
					return false;
				}
				$.ajax({
					type: 'POST',
					url: 'php-script/pull.data.php',
					data: {currPass: currPass, std_code: $('input[name="std_code"]').val(),is_ajax: 13},
					success: function(source){
						if(source == 1){
							$("#mess-pro-err").text('');
							$.post("php-script/edit.php", {newPass: newPass, std_code: $('input[name="std_code"]').val(), is_ajax: 12}, function(response){
								if(response == 1){
									$( '#edit-pass-dialog' ).dialog("close");
								}
							});
						}else {
							$("#mess-pro-err").css("color","red").text("รหัสผ่านเดิมไม่ถูกต้อง!");
							return false;
						}
					}
				});
			},
			Cancel: function(){
				$(this).dialog("close");
			}
		},
		close: function(){
			$('#curr-pass').val('');
			$('#new-pass').val('');
		}
	});
	$("#edit-profile-staff").click(function(){
		$("#edit-profile-dialog").dialog("open");
	});
	$("#edit-pass").click(function(){
		$("#edit-pass-dialog").dialog("open");
	});
	
	function update(){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data:{is_ajax: 1}
		}).done(function(source){
			$.each(source, function(i, val){
				$("#lb-name").text(val.name);
				$("#lb-education").text(val.education);
				$("#lb-mobile").text(val.mobile);
				$("#lb-mail").text(val.email);
				$("#lb-position").text(val.position);
				$("#img-pro-change").attr("src", val.photo);
				$("#img-left-pro").attr("src", val.photo);
			})
		});
	}
})(jQuery);
</script>
<style>
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
}
</style>

