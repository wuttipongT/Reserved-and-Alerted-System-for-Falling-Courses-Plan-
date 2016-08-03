<meta charset="UTF-8">
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=regis" onclick="" style="z-index: 7;">สมัครสมาชิก</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<?
	function ranDomStr($length){
		$str2ran = 'abcdefghijklmnopqrstuvwxyz0123456789'; //string ที่เป็นไปได้ที่จะใช้ในการ random ซึ่งสามารถเพิ่มลดได้ตามความต้องการ
		$str_result = "";  //สตริงว่างสำหรับจะรับค่าจากการ random
		while(strlen($str_result)<$length){  //วนลูปจนกว่าจะได้สตริงตามความยาวที่ต้องการ
			$str_result .= substr($str2ran,(rand()%strlen($str2ran)),1); //ต่อ string จาก substring ที่ได้จากการ random ตำแหน่ง ทีละ 1 ตัว 
																													//จนกว่าจะครบตรามความยาวที่ส่งมา
		}
		return($str_result);//ส่งค่ากลับ
	}
	$ran_str = randomstr(6); //สั่ง random string
?>
<style type="text/css">
	table{
		position:relative;
		margin:auto auto;
		border-spacing:10px;
		border-collapse:collapse;
	}
	table td{height:22px;}
	table label{text-align:right;display:block;}
	table #stdID{width:200px;height:22px;}
	table #btn,table #reset,table #submit{width:150px;height:40px;}
	table #pw,table #re-pw,table #email{width:200px;height:22px;}
	table tr td img{display:inline-block;vertical-align:middle;}
	table #code{width:95px;height:22px;display:inline-block;vertical-align:middle;}
.star{color:red;display:inline-block;padding:0;width:10px;height:10px;vertical-align:top;text-align:center;}
.is_available{
	color:green;font-size:12px;
}
.is_not_available{
	color:red;font-size:12px;
}
.strong,.medium,.weak{
	height:5px;border:1px solid #ccc;
}
.strong{background-color:green;}
.medium{background-color:yellow;}
.weak{background-color:red;}
</style>
<form id="myForm" method="post" action="">
	<table >
		<tr>
			<td style="vertical-align:top;"><label>ป้อนรหัสนิสิต<b class="star">*</b></label></td>
			<td width="300">
				<input id="stdID" name="stdID" type="text" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}"/>
				<span id="e-ac" style="text-indent:10px;display:inline-block;"></span>
				<span id="error" style="display:block;vertical-align:middle;color:red;font-size:12px;"></span>
			</td>
			<td width="200"></td>
		</tr>
		<tr>
			<td style="vertical-align:top;"><label>รหัสผ่าน<b class="star">*</b></label></td>
			<td>
				<div class="pwdwidgetdiv" id="thepwddiv"></div>
				<input type="hidden" id="pw" name="pw">
				<span id="passstrength" style="display:inline-block;vertical-align:bottom;color:red;font-size:12px;margin-top:35px;margin-left:-80px;"></span>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="vertical-align:top;"><label>ยืนยันรหัสผ่าน<b class="star">*</b></label></td>
			<td>
				<input id="re-pw" name="re-pw" type="password"/>
				<span id="e-repw" style="display:block;vertical-align:middle;color:red;font-size:12px;"></span>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="vertical-align:top;"><label>ชื่ออีเมลล์<b class="star">*</b></label></td>
			<td>
				<input id="email" name="email" type="text"/>
				<input id="email-hidden" type="hidden" />
				<span id="error-email" style="display:block;vertical-align:middle;color:red;font-size:12px;"></span>
			</td>
			<td><span id=""></span></td>
		</tr>
		<tr>
			<td style="vertical-align:top;"><label>พิมพ์ตัวอักษรในภาพ<b class="star">*</b></label></td>
			<td>
				<img id="imgTxt" src="modules/register/pic_text.php?str=<?=$ran_str?>"/>
				<input id="code" name="code" type="text" class="highlight"/>
				<span id="error-picTxt" style="display:block;vertical-align:middle;color:red;font-size:12px;"></span>
				<input id="code-hidden" type="hidden" name="code_hidden" value="<?=$ran_str?>">
				<a href="JavaScript:refreshImageText();">เปลี่ยตัวอักษร</a>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="left">
				<span>คลิกปุ่ม "ตกลง" เพื่อใช้บริการ ของเว็บไซต์!</span>
				<input id="submit" type="submit" value="ตกลง" style="display:block;" name="submit" class="_btn btn-primary"/>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>


<script src="Scripts/pwdwidget.js" type="text/javascript"></script>
<script type="text/javascript">
var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
	pwdwidget.MakePWDWidget();
  $(document).ready(function() {
		//the min chars for username
		var min_chars = 11;
		//result texts
		var characters_error = 'Minimum amount of chars is 11';
		var checking_html = '<img src="images/GsNJNwuI-UM.gif" /> Checking...';
		//when button is clicked
		$('#stdID').click(function(){
			//run the character number check
			if($('#stdID').val()==''){
				//if it's bellow the minimum show characters_error text
				$('#error').html('กรุณาใส่รหัสนิสิต');
			}
		});
		$('#stdID').change(function(){
			//run the character number check
			if($('#stdID').val().length < min_chars){
				//if it's bellow the minimum show characters_error text
				$('#error').html(characters_error);
			}else{			
				//else show the cheking_text and run the function to check
				//$('#error').html(checking_html);
				
				//check_status();
				//$('#e-ac').html(checking_html);
				//check_account();
				$.ajax({
					url: 'php-script/pull.data.php',
					data: {studentCode: $('#stdID').val(), is_ajax: 28},
					success: function(source){
						if(source == 1){
							$('#error').html('รหัส&nbsp;<b>' +$('#stdID').val()+ '</b>&nbsp;ถูกใช้สมัครสมาชิกไปแล้ว!');
						}else{
							$('#error').html('');
						}
					}
				});
			}
		});
		$('#email').blur(function(){
			var email = $("#email").val();
			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
			if(email==''){
				$('#error-email').html('กรุณาใส่อีเมลล์ของท่าน!');
			}
			else if(filter.test(email)){
				$('#error-email').html(checking_html);
				 finishAjax();
			}else{
				$('#error-email').html('รูปแบบอีเมลล์ไม่ถูกต้อง');
			}
		});
		$('#regpwd_id').blur(function(e){
			if($('#regpwd_id').val()==''){
				$('#passstrength').html('กรุณาใส่รหัสผ่าน!');
			}else {
				$('#pw').val($('#regpwd_id').val());
				$('#passstrength').empty();
			}
		});
		
	$('#code').click(function(e){
			if($('#code').val()==''){
				$('#error-picTxt').html('กรุณากรอกตัวอักษรภาพ !');
			}
		});
	$('#code').blur(function(e){
		 var hidden = $('#code-hidden').val();
		 var code = $('#code').val();
		 if(hidden!=code){
				$('#error-picTxt').html('ตัวอักษรที่ท่านกรอกไม่ตรงกับรูปภาพ! กรุณากรอกใหม่');
			}else{
				$('#error-picTxt').empty();
			}
	});

	
	$("#myForm").submit(function () {
		var sm_status = true;
		
		if($('#stdID').val().length < min_chars){
			//if it's bellow the minimum show characters_error text
			$('#error').html(characters_error);
			sm_status = false;
		}else{
			$('#error').html('');
		}
		if($('#pw').val()!=$('#re-pw').val()){
				$('#e-repw').html('รหัสผ่านไม่ตรงกัน! กรุณากรอกใหม่');
				sm_status = false;
		}else {
			$('#e-repw').empty();
		}
		var email = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		if(email==''){
			$('#error-email').html('กรุณาใส่อีเมลล์ของท่าน!');
			sm_status = false;
		}else {
			if($('#email-hidden').val()==0){
				sm_status = false;
			}
		}
		 var hidden = $('#code-hidden').val();
		 var code = $('#code').val();
			if($('#code').val()==''){
				$('#error-picTxt').html('กรุณากรอกตัวอักษรภาพ !');
				sm_status = false;
			}else if(hidden!=code){
				$('#error-picTxt').html('ตัวอักษรที่ท่านกรอกไม่ตรงกับรูปภาพ! กรุณากรอกใหม่');
				sm_status = false;
			}else{
				$('#error-picTxt').empty();
			}
		$.ajax({
			url: 'php-script/pull.data.php',
			data: {studentCode: $('#stdID').val(),sm_status: sm_status, is_ajax: 28},
			success: function(source){
				if(source == 1){
					$('#error').html('รหัส&nbsp;<b>' +$('#stdID').val()+ '</b>&nbsp;ถูกใช้สมัครสมาชิกไปแล้ว!');
					var sm_status = false;
				}else if(source == 'true'){
					var obj = {
						std_code: $('#stdID').val(),
						password: $('#pw').val(),
						email: $('#email').val(),
						is_ajax: 10
					}
					
					$.post("php-script/add.php",obj , function(source){
						var ch = source.split('\n');
						if(ch[0] == 1){
							alert(ch[1]);
						}else{
							window.location.href = '?mod=profile';
						}
					});
					
				}
			}
		});
		return false;
	});
  });

//function to check username availability	
function check_status(){//เช็ครหัสนิสิต
		//get the username
		var username = $('#stdID').val();
		//use ajax to run the check
		$.post("php-script/verifyAccout.php", { username: username },
			function(result){
				//if the result is 0
				if(result == 0){
					//show that the username is available
					$('#error').html('<span class="is_available">รหัส&nbsp;<b>' +username + '</b>&nbsp;มีอยู่ในฐานข้อมูล!</span>');
				}else{
					//show that the username is NOT available
					$('#error').html('<span class="is_not_available">รหัส&nbsp;<b>' +username + '</b>&nbsp;ไม่มีอยู่ในฐานข้อมูล!</span>');
				}
		});
		//if result is 1
		$.post("php-script/verifyMember.php",{ username: username}, function(result){
			if(result == 1){
				//show that the username is available
				$('#e-ac').html('<img src="images/accept.png" />');
			}else{
				//show that the username is NOT available
				$('#e-ac').html('<img src="images/cancel.png" />');
			}
		});
		
}
function finishAjax(){
  //get the username
		var email = $('#email').val();
		//use ajax to run the check
		$.post("php-script/verifyEmail.php", { email: email },
			function(result){
				//if the result is 1
				if(result == 0){
					//show that the username is available
					$('#error-email').html('<span class="is_not_available">อีเมล์นี้ มีผู้ใช้แล้ว! กรอกอีเมลล์ใหม่</span>');
					$('#email-hidden').val(result);
				}else{
					//show that the username is NOT available
					$('#error-email').html('<span class="is_available">คุณสามารถใช้อีเมล์นี้ได้!</span>');
					$('#email-hidden').val(result);
				}
		});
}
	function refreshImageText() {
	var strcurr = randomString();
	 document.getElementById("imgTxt").src="modules/register/pic_text.php?str="+strcurr;
	 document.getElementById("code-hidden").value=strcurr;
	}
	function randomString(){
		var chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		var string_length = 6;
		var randomString = '';
		for (var i=0;i<string_length ;i++ )
		{
			var rnum = Math.floor(Math.random()*chars.length);
			randomString += chars.substring(rnum,rnum+1);
		}return randomString;
	}
</script>