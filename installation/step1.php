<?
	if(isset($_SESSION['dataStep1'])){
		$data = $_SESSION['dataStep1'];
	}
?>
<div class='backbox info'>
  ขั้นตอนที่ 1 ลิขสิทธิ์และข้อตกลง
</div>
<table width="100%" cellpadding="5" style="font-size:13px;">
  <tr>
    <td width="123">&nbsp;</td>
    <td width="645"><b>ลิขสิทธิ์</b></td>
    <td width="144">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระบบแนะนำแผนการเรียนและสำรองที่นั่งรายวิชา (Fall a Study Plan) เป็นระบบที่พัฒนาโดยมีวัตถุประสงค์เพื่ออำนวยความสะดวกในการใช้งานสำหรับผู้ที่ต้องการสำรองที่นั่งรายวิชาและแนะนำแผนการเรียน สาขาวิทยาการคอมพิวเตอร์ คณะวิทยการสารสนเทศ มหาวิทยาลัยมหาสารคาม ห้ามทำการดัดแปลงแก้ไขโค๊ดโดยไม่ได้รับอนุญาติจากเจ้าของผู้พัฒนา และห้ามนำไปจำหน่ายหรือแจกจ่ายโดยไม่ผ่านการเห็นชอบจากทีมผู้พัฒนา</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form name="step1" method="post" action="?step=2"><input type="checkbox" name="accept" id="accept" value="checked" <?=$data['accept']?>>&nbsp;ข้าเจ้ายอมรับข้อตกลงและจะปฏิบัติตามข้อตกลงทุกประการ&nbsp;<span id="warnstep1"></span></form></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
    <td><button class="white" style="width: 100px;">ถัดไป</button></td>
    <td>&nbsp;</td>
    </tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
	$('button[class="white"]').click(function(){
		if($('#accept').is(':checked')){
			$('form[name="step1"]').submit();
		}else {
			alert('กรุณาอ่านข้อตกลงและทำการยอมรับข้อตกลง');
			return false;
		}
		
	});
});
</script>