<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Login</title>
</head>
<body>
<?
	if(strcmp($_POST['code_input'],$_POST['code_hidden'])==0){  /*ตรวจสอบว่า code ที่ซ่องมากับที่กรอกเข้าไปเหมือนกันหคือไม่
การตรวจสอบความเท่ากันของสตริงนั้นมีอยู่หลายฟังก์ชัน ในที่นี้ผมใช้ strcmp ตรวจสอบโดยไม่สนใจ case แต่ไม่แนะนำให้ใช้รูปแบบ $str1==$str2 นะครับ เพราะสตริงไม่ได้ใช้หน่วยความจำคงที่เหมือนตัวเลข*/
		echo "<strong>Login success.</strong><br>";
		echo "<br>Hello! Khrun <strong>".$_POST['name']."<strong>";
	}
	else{
		echo "<strong><font color=\"#FF0000\">ERROR</font></strong>";
	}
?>
</body>
</html>
