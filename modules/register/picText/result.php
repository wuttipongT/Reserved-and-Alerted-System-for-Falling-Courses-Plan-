<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Login</title>
</head>
<body>
<?
	if(strcmp($_POST['code_input'],$_POST['code_hidden'])==0){  /*��Ǩ�ͺ��� code ����ͧ�ҡѺ����͡��������͹�ѹˤ�����
��õ�Ǩ�ͺ������ҡѹ�ͧʵ�ԧ������������¿ѧ��ѹ 㹷������� strcmp ��Ǩ�ͺ�����ʹ� case ������й�������ٻẺ $str1==$str2 �Ф�Ѻ ����ʵ�ԧ�������˹��¤����Ӥ��������͹����Ţ*/
		echo "<strong>Login success.</strong><br>";
		echo "<br>Hello! Khrun <strong>".$_POST['name']."<strong>";
	}
	else{
		echo "<strong><font color=\"#FF0000\">ERROR</font></strong>";
	}
?>
</body>
</html>
