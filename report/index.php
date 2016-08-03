<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header

function Header()
{
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$obj = new database(HOST, USER, PASSWORD, DBNAME);
	
	$sql = "SELECT subject, lecturers, acadyear, semester FROM reservation ";
	$sql .= "WHERE reservID='".$_GET['id']."' LIMIT 1";
	$obj->mysql_query($sql) or die(mysql_error());
	// Logo
	//$this->Image('logo.png',10,6,30);
	// Arial bold 15
	$this->AddFont('THSarabunNew','B','THSarabunNew Bold.php');
	$this->SetFont('THSarabunNew','B',16);
	// Move to the right
	$this->Cell(80);
	// Title
	foreach($obj->mysql_fetch_assoc() as $data){
		$this->Cell(30,10,iconv( 'UTF-8','TIS-620','รายชื่อนิสิตสำรองที่นั่งรายวิชา '.$data['subject'].' ปีการศึกษา '.$data['acadyear'].' ภาคเรียนที่ '.$data['semester']),0,0,'C');
	}
	
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
	
	$w = array(15, 30, 80, 50,15);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,iconv("UTF-8","TIS-620",$header[$i]),1,0,'C');
	$this->Ln();
	// Data
	if(empty($data)){
		$this->Cell(190,8,iconv("UTF-8","TIS-620",'ไม่มีข้อมูล'),1,1,'C',0);
	}
	
	foreach($data as $row)
	{
		$this->Cell($w[0],6,iconv("UTF-8","TIS-620",$row[0]),'LR',0,'C');
		$this->Cell($w[1],6,iconv("UTF-8","TIS-620",$row[1]),'LR');
		$this->Cell($w[2],6,iconv("UTF-8","TIS-620",$row[2]),'LR',0,'L');
		$this->Cell($w[3],6,iconv("UTF-8","TIS-620",$row[3]),'LR',0,'L');
		$this->Cell($w[4],6,iconv("UTF-8","TIS-620",$row[4]),'LR',0,'C');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

// Instanciation of inherited class

$pdf = new PDF('P','mm','A4');
// Column headings
$header = array('ลำดับที่', 'รหัสนิสิต', 'ชื่อ-สกุล', 'ระดับ', 'ชั้นปี');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$data = array();
foreach(fnc_reserv($_GET['id']) as $i => $value){
	$data[] = explode('/',($i+1)."/".$value['studentCode']."/".$value['preName'].$value['name'].' '.$value['sername']."/".$value['level']."/".classYear($value['admitacadyear']));
}
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew','',16);

$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();

function fnc_reserv($id){
	require_once '../config.inc/config.inc.php';
	require_once '../config.inc/database.php';
	$obj = new database(HOST, USER, PASSWORD, DBNAME);
	$sql = "SELECT studentCode, preName, name, sername, level, admitacadyear FROM reserv ";
	$sql .= "INNER JOIN student ON reserv.std_code=student.studentCode ";
	$sql .= "WHERE reserv.reservID='$id'";
	$obj->mysql_query($sql) or die(mysql_error());
	$arr = array();
	foreach($obj->mysql_fetch_assoc() as $data){
		$arr[] = $data;
	}
	return $arr;
}

function classYear($admit){
	return ((date('Y')+543)-$admit)+1;
}
?>
