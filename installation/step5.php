<div class="info">
ขั้นตอนที่ 5 สิ้นสุดขั้นตอนการติดตั้ง
</div><br>
<?

if($_POST['st4']=="ok"){
	$fusername = $_POST['fusername'];
	$fpassword = base64_encode($_POST['fpassword']);
	$email = $_POST['email'];
	$hostname = $_POST['hostname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dbname = $_POST['dbname'];
	$connect_db = mysql_connect($hostname,$username,$password); // เชื่อมต่อฐานข้อมูล
	mysql_query("SET NAMES UTF8");  // คิวรี่ข้อมูลเป้นภาษา TIS-620
	mysql_query("SET character_set_results=UTF8");// คิวรี่ข้อมูลเป้นภาษา TIS-620
	$selectdb=mysql_select_db($dbname);
	$insert=mysql_query("insert into staff value(NULL,'$fusername','$fpassword','name','educatio','$email','1','','images/Administrator.png','','1')") or die("ไม่สารมารถพื้นข้อมูลเจ้าหน้าที่ลงฐานข้อมูลได้ ".mysql_error());
	if($insert){
		?>
        <table width="950" border="0" cellpadding="5">
  <tr>
    <td width="221">&nbsp;</td>
    <td width="723"><img src="../images/accept.png" width="32" height="32" />&nbsp;สามารถกำหนดค่าเริ่มต้นได้สำเร็จ</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="../images/exclamation.png" width="32" height="32" />&nbsp;เสร็จสิ้นขั้นตอนการติดตั้งกรุณา <font style="font-size:16px; font-weight:bold; color:#FF0000;">ลบ</font> หรือ <font style="font-size:16px; font-weight:bold; color:#FF0000;">เปลียนชื่อ</font> โฟลเดอร์ <font style="font-size:16px; font-weight:bold; color:#060;">installation</font></td>
  </tr>
</table>
<?
	}
	file_put_contents("../config.inc/config.txt",$hostname."/".$username."/".$password."/".$dbname);
	mysql_close();
	unset($_SESSION['dataStep1']);
	unset( $_SESSION["arrData"] );
}
	
?>
