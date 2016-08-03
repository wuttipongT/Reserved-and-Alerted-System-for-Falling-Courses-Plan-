<?
	require('../fpdf/fpdf.php');
	class PDF extends FPDF{
		//$this->AddFont('THSarabunNew','','THSarabunNew.php');
		function Header(){
			$this->AddFont('THSarabunNew','B','THSarabunNew Bold.php');
			$this->SetFont('THSarabunNew','B',16);
			$this->Image('../images/logoIT.png',5,5,'','','','');
		//	$this->Cell(30,45,iconv("UTF-8","TIS-620", "คณะวิทยาการสารสนเทศ"),0,1,'' );
			$this->Text(35,32,iconv("UTF-8","TIS-620", "คณะวิทยาการสารสนเทศ"));
			$this->Ln(25);
		}
		function LoadData($file)
		{
			// Read file lines
			$lines = file($file);
			$data = array();
			foreach($lines as $line)
				$data[] = explode(';',trim($line));
			return $data;
		}
		function ImprovedTable($header, $data)
		{
			// Column widths
			
			$w = array(30, 60, 18, 50,35);
			// Header
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,iconv("UTF-8","TIS-620",$header[$i]),0,0,'C');
			$this->Ln();
			// Data
			foreach($data as $row)
			{
				$this->Cell($w[0],6,iconv("UTF-8","TIS-620",$row[0]),0,0,'L');
				$this->Cell($w[1],6,iconv("UTF-8","TIS-620",$row[1]),0);
				$this->Cell($w[2],6,iconv("UTF-8","TIS-620",$row[2]),0,0,'L');
				$this->Cell($w[3],6,iconv("UTF-8","TIS-620",$row[3]),0,0,'L');
				$this->Cell($w[4],6,iconv("UTF-8","TIS-620",$row[4]),0,0,'L');
				$this->Ln();
			}
			// Closing line
		//	$this->Cell(array_sum($w),0,'','T');
		}
	}
	$pdf = new PDF("P","mm","A4");
    $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
	
	$pdf->AddPage();
	$pdf->Cell(0,7,iconv("UTF-8","TIS-620", "แบบคำร้องขอสำรองที่นั่ง"),0,1,'C');
	$pdf->SetFont('THSarabunNew','',16);
	$pdf->Ln(5);
	$pdf->Cell(0,7,iconv("UTF-8","TIS-620", "           ข้าพเจ้า(นาย/ นาง/ นางสาว)...................................................รหัสประจำตัวนิสิต................................................................"),0,1,'L');
	if($_POST['pre-name'] == 'นาย'){
	$pdf->Text(45,50,iconv("UTF-8","TIS-620", "___________"));
	}else if($_POST['pre-name'] == 'นาง'){
		$pdf->Text(37,50,iconv("UTF-8","TIS-620", "____        _____"));
	}else if($_POST['pre-name'] == 'นางสาว'){
		$pdf->Text(37,50,iconv("UTF-8","TIS-620", "________"));
	}
	
	$pdf->Text(70,50,iconv("UTF-8","TIS-620", $_POST['name']));
	$pdf->Text(145,50,iconv("UTF-8","TIS-620",  $_POST['student_code']));
	$pdf->Ln(5);

	$pdf->Write(7,iconv("UTF-8","TIS-620", "สาขาวิชา..............................................คณะ................................................ชั้นปี............ระบบ (  ) ปกติ ( ) พิเศษ ( ) พิเศษต่อเนื่อง มีความประสงค์ขอลงทะเบียนเรียนเป็นกรณีพิเศษ ( ) ข้ามกลุ่มเรียน ( ) ข้ามชั้นปี ภาคเรียนที่.........../......................"));
	$pdf->Text(29,63,iconv("UTF-8","TIS-620", "วิทยาการคอมพิวเตอร์"));
	$pdf->Text(78,63,iconv("UTF-8","TIS-620", "วิทยาการสารสนเทศ"));
	$pdf->Text(128,63,iconv("UTF-8","TIS-620", $_POST['class']));
	if($_POST['ism']=='0'){
		$pdf->Text(148,63,iconv("UTF-8","TIS-620", "/"));
	}else if($_POST['ism']=='1'){
		$pdf->Text(161,63,iconv("UTF-8","TIS-620", "/"));
	}else if($_POST['ism']=='2'){
		$pdf->Text(175,63,iconv("UTF-8","TIS-620", "/"));
	}
	
	if($_POST['require'] == '0'){
		$pdf->Text(86,70,iconv("UTF-8","TIS-620", "/"));
	}else if($_POST['require'] == '1'){
		$pdf->Text(112,70,iconv("UTF-8","TIS-620", "/"));
	}
	$pdf->Text(150,70,iconv("UTF-8","TIS-620", $_POST['semester']));
	$pdf->Text(160,70,iconv("UTF-8","TIS-620", $_POST['acadyear']));
	$pdf->Ln(8);
	$pdf->Cell(0,5,iconv("UTF-8","TIS-620", "สาเหตุเนื่องจาก....................................................................................................................................................................................."),0,1,'L');
	$pdf->Text(37,77,iconv("UTF-8","TIS-620", $_POST['cause']));
	$pdf->Ln(8);
	$header = array('รหัสวิชา', 'ชื่อวิชา', 'กลุ่มเรียน', 'ผู้สอน', 'ลายเซ็นอาจารย์ผู้สอน');
	$data = $pdf->LoadData('countries.txt');
	$pdf->ImprovedTable($header,$data);
	$sub_code = $_POST['sub_code'];
	$subject = $_POST['subject'];
	$group = $_POST['group'];
	$lecturer = $_POST['lecturer'];
	$pdf->Text(16,98,iconv("UTF-8","TIS-620", $sub_code['0']));
	$pdf->Text(42,98,iconv("UTF-8","TIS-620", $subject['0']));
	$pdf->Text(106,98,iconv("UTF-8","TIS-620", $group['0']));
	$pdf->Text(121,98,iconv("UTF-8","TIS-620", $lecturer['0']));
	//-----------------------2
	$pdf->Text(16,104,iconv("UTF-8","TIS-620", $sub_code['1']));
	$pdf->Text(42,104,iconv("UTF-8","TIS-620", $subject['1']));
	$pdf->Text(106,104,iconv("UTF-8","TIS-620", $group['1']));
	$pdf->Text(121,104,iconv("UTF-8","TIS-620", $lecturer['1']));
	//-----------3
	$pdf->Text(16,110,iconv("UTF-8","TIS-620", $sub_code['2']));
	$pdf->Text(42,110,iconv("UTF-8","TIS-620", $subject['2']));
	$pdf->Text(106,110,iconv("UTF-8","TIS-620", $group['2']));
	$pdf->Text(121,110,iconv("UTF-8","TIS-620", $lecturer['2']));
	//-----4
	$pdf->Text(16,116,iconv("UTF-8","TIS-620", $sub_code['3']));
	$pdf->Text(42,116,iconv("UTF-8","TIS-620", $subject['3']));
	$pdf->Text(106,116,iconv("UTF-8","TIS-620", $group['3']));
	$pdf->Text(121,116,iconv("UTF-8","TIS-620", $lecturer['3']));
	//----5
	$pdf->Text(16,122,iconv("UTF-8","TIS-620", $sub_code['4']));
	$pdf->Text(42,122,iconv("UTF-8","TIS-620", $subject['4']));
	$pdf->Text(106,122,iconv("UTF-8","TIS-620", $group['4']));
	$pdf->Text(121,122,iconv("UTF-8","TIS-620", $lecturer['4']));
	$pdf->Ln(2);
	$pdf->Cell(0,7,iconv("UTF-8","TIS-620","ความเห็นอาจารย์ที่ปรึกษา                                                                                  นิสิตผู้ยื่นคำร้อง................................"), 0,1,'L');
	$pdf->Cell(0,7,iconv("UTF-8","TIS-620","............................................................                                                                             (...........................................)"), 0,1,'L');
	$pdf->Text(162,137,iconv("UTF-8","TIS-620", $_POST['pre-name'].$_POST['name']));
	$pdf->Cell(0,7,iconv("UTF-8","TIS-620","(..........................................................)                                                                             ............../............/................"), 0,1,'L');
	$date = date("Y-m-d");
	list($d, $m, $y) = date_th($date);
	$pdf->Text(165,144,iconv("UTF-8","TIS-620", " $d      $m    $y"));
	$w = array(30, 60, 18, 50,35);
	$pdf->Ln(8);
	$pdf->Cell(array_sum($w),0,'','T');
	$pdf->Output();
	function date_th($format){
		$month_th = array("01"=>"ม.ค.", "02"=>"ก.พ", "03"=>"มี.ค.", "04"=>"เม.ย", "05"=>"พ.ค.", "06"=>"มิ.ย.", "07"=>"ก.ค.", "08"=>"ส.ค.", "09"=>"ก.ย.", "10"=>"ต.ค.", "11"=>"พ.ย", "12"=>"ธ.ค.");
		list($year, $mount, $day) = explode('-', $format);
		$mount_new = "";
		foreach($month_th as $key => $val){
			if( $key==$mount){
				$mount_new = $val;
			}
		}
		$year = $year+543;
		return array($day,$mount_new,$year);
	}
?>