<?
	$id = $_GET['subID'];
	$aca = $_GET['aca'];
	require ("lib/phpchartdir.php");
	require '../config.inc/config.inc.php';
	require '../config.inc/database.php';
	$database = new database(HOST, USER, PASSWORD, DBNAME);
	$sql = "
SELECT a,bp,b,cp,c,dp,d,f,w,s,u FROM(
  SELECT count(*) as a FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND enroll.subID='$id' AND student.status ='10' AND enroll.grade='A')g
) query1, (
  SELECT count(*) as bp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='B+')g2
) query2, (
  SELECT count(*) as b FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='B')g3
) query3, (
  SELECT count(*) as cp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='C+')g4
) query4, (
  SELECT count(*) as c FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='C+')g5
) query5, (
  SELECT count(*) as dp FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='D+')g6
) query6, (
  SELECT count(*) as d FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10' AND grade='D')g7
) query7, (
  SELECT count(*) as f FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='F')g8
) query8, (
  SELECT count(*) as w FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='W')g9
) query9, (
  SELECT count(*) as s FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='S')g10
) query10 ,(
  SELECT count(*) as u FROM (SELECT DISTINCT enroll.studentCode FROM enroll JOIN student ON enroll.studentCode=student.studentCode WHERE (enroll.acadyear = '$aca' AND subID='$id' AND student.status ='10') AND grade='U')g11
) query11
	";
	$database->mysql_query($sql) or die(mysql_error());
	$raw = $database->mysql_fetch_assoc();
	$past = $raw['0']['a']+$raw['0']['bp']+$raw['0']['b']+$raw['0']['cp']+$raw['0']['c']+$raw['0']['dp']+$raw['0']['d']+$raw['0']['S'];
	$fail = $raw['0']['f']+$raw['0']['w']+$raw['0']['u'];
	$data = array($fail,$past);

	$labels = array("ไม่ผ่าน","ผ่าน");
	
	$c = new PieChart(340, 240);
	$c->setDefaultFonts("Tahoma.ttf"); 
	$c->setPieSize(120, 100, 70);

	//$c->setLabelStyle("Tahoma.ttf",16); 

	$c->addLegend(220, 0);

	$c->setLabelFormat("{percent}%");

	$c->setData($data, $labels);

	$c->setSectorStyle(RoundedEdgeShading, 0xffffff, 1);

	header("Content-type: image/png");
	print_r($c->makeChart2(PNG));
	
?>