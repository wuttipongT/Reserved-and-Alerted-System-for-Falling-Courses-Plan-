<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=forgetpass" onclick="" style="z-index: 7;">ลืมรหัสผ่าน</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<form name="forgetpassword" action="?mod=forgetpass" method="post" style="border:1px solid #ccc;margin: 10px;padding:10px;">
	<i class="icon-user" style="display:inline-block;">&nbsp;&nbsp;</i><b style="display:inline-block;margin-left: 5px;">ลืมรหัสผ่านแก้ไขได</b>
	<table>
		<tr><td>ชื่อเข้าใชงาน</td><td><input type="text" name="username" value="52011211206" class="highlight" style="width: 200px;"/></td></tr>
		<tr><td>กรุณากรอกอีเมลล์ </td><td><input type="text" name="email" value="bed.wuttipong@gmail.com" class="highlight" style="width: 200px;"/></td></tr>
		<tr><td>&nbsp;</td><td align="center"><input type="submit" value="บันทึกข้อมูล" class="_btn btn-primary" style="padding:5px;width: 100px;"/></td></tr>
		<input type="hidden" name="submit" value="ok"/>
	</table>
	<hr style="filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5;"/>
	<b>*หมายเหตุ :</b> ในกรณีที่ไม่สามารถส่งเมลล์ได้ให้ติดต่อเจ้าหน้าที่ฝ่ายวิชาการ ของสาขา
</form>
<?
if($_POST['submit'] == 'ok'){
	$database = new database(HOST, USER, PASSWORD, DBNAME);
	$username = $_POST['username'];
	$email = $_POST['email'];
	$sql = "SELECT username, password, email, sobriquet	FROM member WHERE username='$username' AND email='$email' LIMIT 1";
	$rs = $database->mysql_query($sql);
	if($rs){
			if($database->mysql_num_rows() > 0){
				$data = $database->mysql_fetch_assoc();
				$database2 = new database(HOST, USER, PASSWORD, DBNAME);
				$sql2 = "SELECT email FROM staff WHERE type=1 LIMIT 1";
				$database2->mysql_query($sql) or die(mysql_error());
				$data2 = $database2->mysql_fetch_array();
				$email_admin = $data2['0']['email'];
				$strTo = "admin@localhost.com";
				$strSubject = "=?UTF-8?B?".base64_encode("Your Account information username and password.")."?=";
				//$strSubject = "Your Account information username and password.";
				$strHeader = "MIME-Version: 1.0' . \r\n";
				$strHeader .= "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
				$strHeader .= "From: ".enc("เจ้าหน้าที่ฝ่ายวิชาการ <".$email_admin.">");
				$strHeader .= "\r\nReply-To: $email";
				//\nReply-To: webmaster@thaicreate.com
				$strMessage = "";
				$strMessage .= "สวัสดี<br><br>ขอบคุณที่เข้ามาใช้งานบริการของเราและนี้คือชื่อเข้าใช้งานและรหัสผ่านของคุณ</br></br>";
				$strMessage .= "ชื่อเข้าใช้งาน : ".$data['0']['username']."<br>";
				$strMessage .= "รหันผ่าน : ".base64_decode($data['0']['password'])."<br><br>";
				$strMessage .= "ขอบคุณ<br><br>";
				$strMessage .= "เจ้าหน้าที่ฝ่ายวิชาการ สาขาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยมหาสารคาม";
				$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
				if($flgSend)
				{
					echo "ส่งอีเมลถึง $email แล้ว <br/>หากไม่ได้รับอีเมลสำหรับการรีเซ็ตรหัสผ่าน ให้ตรวจดูอีเมลขยะ () หากคุณยังไม่เห็นอีเมล โปรดลองเข้าสู่บัญชีด้วยวิธีอื่น";
				}
				else
				{
					echo "Email Can Not Send.";
				}
			}else{
				echo "ไม่มี Username หรือ email นี้!";
			}
			
	}else{
		die(mysql_error());
	}
}
function enc($s){
 return '=?UTF-8?B?'.base64_encode($s).'?=';
}
?>