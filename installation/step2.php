<?
	if(isset($_SESSION['arrData'])){
		$data = $_SESSION['arrData'];
	}
	$_SESSION['dataStep1'] = $_POST;
?>
<div class="info">
ขั้นตอนที่ 2 ตั้งค่าเซิร์ฟเวอร์และฐานข้อมูล
</div>
<br>
<div style="font-size:13px;">
<form name="step2" method="post" action="?step=3">
<table width="100%" border="0" cellpadding="2" style="font-size:13px;">
  <tr>
    <td width="351" align="right">ชื่อเซิร์ฟเวอร์ Server Name</td>
    <td width="573" align="left"><input type="text" class="textbox" name="servername" id="servername" value="<?
		if(is_array($data)){
			echo $data['servername'];
		}else{
			echo "localhost";
		}
	?>">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;">ค่าเริ่มต้น localhost</font></td>
  </tr>
  <tr>
    <td align="right">ชื่อเข้าใช้งานฐานข้อมูล</td>
    <td align="left"><input type="text" class="textbox" name="username" id="username" value="<?
		if(is_array($data)){
			echo $data['username'];
		}else{
			echo "root";
		}
	?>">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;">ค่าเริ่มต้น root</font></td>
  </tr>
  <tr>
    <td align="right">รหัสผ่านเข้าใช้งานฐานข้อมูล</td>
    <td align="left"><input type="password" class="textbox" name="password" id="password" value="<?
	if(is_array($data)){
			echo $data['password'];
		}
		?>">&nbsp;<font style="color:#F00;">*&nbsp;</font></td>
  </tr>
  <tr>
    <td align="right">สร้างฐานข้อมูลชื่อ</td>
    <td align="left"><input type="text" class="textbox" name="dbname" id="dbname" value="<?
	if(is_array($data)){
			echo $data['dbname'];
		}else{
			echo "recommend";
		}
	?>">&nbsp;<font style="color:#F00;">*&nbsp;</font><font style="color:#FF9933;">ค่าเริ่มต้น recommend</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><button class="blue" style="width: 100px;">กลับ</button>
&nbsp;<button class="white" style="width: 100px;">ถัดไป</button><input type="hidden" name="submit" value="ok"></td>
  </tr>
</table>
</form>
</div>
<script>
	$(function(){
		var servername = $('#servername'),
			username = $('#username'),
			password = $('#password'),
			dbname = $('#dbname');
		$('button[class="blue"]').click(function(){
			window.location.href="?step=1";
			return false;
		});
		$('button[class="white"]').click(function(){
			if(servername.val() == "" || username.val() == "" || password.val() == "" || dbname.val() == ""){
				alert("กรุณากรอกข้อมูลให้ครบด้วยครับ");
				return false;
			}
			$('form[name="step2"]').submit();
		});
	})(jQuery);
</script>