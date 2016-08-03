<?php
	$font = "CaflischScriptPro-Regular.otf"; //ไฟล์ font ที่จะใช้
	$image = imagecreate(100,30);	//สร้างภาพโดยการกำหนดขนาด ยาว(แกน x), กว้าง(แกน y)
	$bg = imagecolorallocate($image,100,110,110); //กำหนดสีพื้น (ภาพ,Red,Green,Blue)
	
	$black = imagecolorallocate($image, 0, 0, 0); //กำหดนค่าสีของสีดำซึ่งจะใช้เป็นสีของตัวอักษร
	
	imagettftext($image,28,0,2,25,$black,$font,$str);  //นำตัวอักษรจากฟอร์มมาวาดเป็นรูป
	
	header("Content-type:image/png");	//กำหนดชนิดของภาพตอนแสดงผลผ่าน browser
	imagepng($image);   //แสดงผลภาพที่สร้าง
	imagedestroy($image); //เมื่อ browser ดึงไปแสดงแล้วก็คืนค่าหน่วยคืนค่าหน่วยความจำให้กับระบบ <br>
												//***การใช้หน่วยความจำอย่างประหยัดสำคัญมากในการเขียนโปรแกรม***
?>
