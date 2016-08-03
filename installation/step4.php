<div class="info">
ขั้นตอนที่ 4 กำหนดข้อมูลเข้าใช้งานระบบครั้งแรก
</div><br>
<form name="step4" action="?step=5" method="post">
<table width="100%" border="0" cellpadding="2" style="font-size:13px;">
  <tr>
    <td width="338" align="right">ชื่อเข้าใช้งาน</td>
    <td width="598" align="left"><input type="text" class="textbox" name="fusername" id="fusername" value="">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;">ภาษาอังกฤษเท่านั้น</font></td>
  </tr>
  <tr>
    <td align="right">รหัสผ่าน</td>
    <td align="left"><input type="password" class="textbox" name="fpassword" id="fpassword" value="">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;"></font></td>
  </tr>
  <tr>
    <td align="right">ยืนยันรหัสผ่าน</td>
    <td align="left"><input type="password" class="textbox" name="refpassword" id="refpassword" value="">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;"></font></td>
  </tr>
  <tr>
    <td align="right">อีเมล</td>
    <td align="left"><input type="text" class="textbox" name="email" id="email" value="">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;"></font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">
	<button class="blue" style="width:100px;">กลับ</button>&nbsp;
	<button class="white" style="width:100px;">ถัดไป</button>
	<input type="hidden" name="st4" value="ok"></td>
  </tr>
</table>
	<input type="hidden" value="<?=$_POST['hostname'];?>" name="hostname"/>
	<input type="hidden" value="<?=$_POST['username'];?>" name="username"/>
	<input type="hidden" value="<?=$_POST['password'];?>" name="password"/>
	<input type="hidden" value="<?=$_POST['dbname'];?>" name="dbname"/>
</form>
<script>
$(function(){
	$('button[class="blue"]').click(function(){
		window.location.href = "?step=3";
	});
	$('button[class="white"]').click(function(){
		var username = $('#fusername'),
			password = $('#fpassword'),
			repassword = $('#refpassword'),
			email = $('#email');
		if(username.val() == "" || password.val() == "" || repassword.val() == "" || email.val() == ""){
			alert("กรุณากรอกข้อมูลด้วยครับ");
			return false;
		}
		if(password.val() != repassword.val()){
			alert("รหัสผ่านไม่ตรงกัน");
			return false;
		}
		
		$('form[name="step4"]').submit();
	});
})(jQuery);
</script>