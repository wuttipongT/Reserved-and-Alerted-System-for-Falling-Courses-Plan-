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
	$data0 = array($raw['0']['a'],$raw['0']['bp'],$raw['0']['b'],$raw['0']['cp'],$raw['0']['c'],$raw['0']['dp'],$raw['0']['d'],$raw['0']['f'],$raw['0']['w'],$raw['0']['s'],$raw['0']['u']);

	$labels = array("A","B+",'B',"C+","C","D+","D","F","W","S","U");
	
# The data for the bar chart
//$data0 = array(100, 125, 245, 147, 67);
//$data1 = array(85, 156, 179, 211, 123);
//$data2 = array(97, 87, 56, 267, 157);

# The labels for the bar chart
//$labels = array("Mon", "Tue", "Wed", "Thu", "Fri");

# Create a XYChart object of size 500 x 320 pixels
$c = new XYChart(340, 240);

# Set the plotarea at (100, 40) and of size 280 x 240 pixels
$c->setPlotArea(20, 40, 300, 150);

# Add a legend box at (400, 100)
//$c->addLegend(400, 250);

# Add a title to the chart using 14 points Times Bold Itatic font
$c->addTitle("", "timesbi.ttf", 14);

# Add a title to the y axis. Draw the title upright (font angle = 0)
$textBoxObj = $c->yAxis->setTitle("","Tahoma.ttf");
$textBoxObj->setFontAngle(0);
$textBoxObj = $c->xAxis->setTitle("เกรด","Tahoma.ttf");
$textBoxObj->setFontAngle(0);
# Set the labels on the x axis
$c->xAxis->setLabels($labels);

# Add a stacked bar layer and set the layer 3D depth to 8 pixels
$layer = $c->addBarLayer2(Stack, 8);

# Add the three data sets to the bar layer
$layer->addDataSet($data0, 0x8080ff );
//$layer->addDataSet($data1, 0x80ff80, "Server # 2");
//$layer->addDataSet($data2, 0x8080ff, "Server # 3");

# Enable bar label for the whole bar
$layer->setAggregateLabelStyle();

# Enable bar label for each segment of the stacked bar
//$layer->setDataLabelStyle();

# Output the chart
header("Content-type: image/png");
print($c->makeChart2(PNG));
	
?>