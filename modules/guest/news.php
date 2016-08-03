<?
if($_SERVER['HTTP_HOST']=='localhost'){
	$base_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}else{
	$base_url='http://'.$_SERVER['HTTP_HOST'];	
}
?>
<?if ($_GET['mod'] == "news"&&isset($_GET['id'])) :
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';
	require_once 'config.inc/function.php';
	if($_GET['id'] == 'all'){
	?>
	<div class="central-top">
		<div id="yarnball">
			<ul class="yarnball">
					<li class="yarnlet first">
						<a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
					</li>
					<li class="yarnlet ">
						<a href="?mod=news" onclick="" style="z-index: 7;">ข่าวสาร</a>
					</li>
					<li class="yarnlet ">
						<a href="?mod=news&id=all" onclick="" style="z-index: 6;">ข่าวสารทั้งหมด</a>
					</li>
					<li class="yarnlet" style="left:50px;">Current page</li>
			</ul>
		</div><!--id="yarnball-->
	</div><!--end central-top-->
	<div class="triangle-r"></div>
	<div id="news-content"></div>
	<div id="news-pagging" style="margin-left: 10px;"></div>
	<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
	<script>
		$(document).ready(function(){
paggeing('#news-pagging','#news-content', 5, 'data.news.php');
function paggeing(page, content, row, url){
	get_num_rows(row, function(source){//acadyear1
		var limit = 6;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			currentPage: 1,
			onPageClick: function(p, e){
				 $.ajax({
					type: 'GET',
					url: 'modules/guest/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});	
			},
			onInit: function(){
				
				var p = $(page).pagination('getCurrentPage');
				 $.ajax({
					type: 'GET',
					url: 'modules/guest/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});
			}
		});
	});
}
function get_num_rows(db, handleData){
	$.post('php-script/pull.data.php', {is_ajax: 5, db: db}, function(source){
		handleData(source);
	});
}
 });
	</script>
	<?
	}else{
	$database = new database($host, $username, $password,$dbname);
?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=news" onclick="" style="z-index: 7;">ข่าวสาร</a>
                </li>
				<li class="yarnlet ">
                    <a href="?mod=news&id=<?echo $_GET['id']?>" onclick="" style="z-index: 6;">
							<?
								$sql = "SELECT title FROM news WHERE newsID=".$_GET['id']." LIMIT 1";
								$database->mysql_query($sql)or die(mysql_error());
								foreach($database->mysql_fetch_assoc() as $data){
									echo $data['title'];
								}
							?>
					</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<?
	$rs = $database->mysql_query("SELECT * FROM news WHERE newsID=".$_GET['id']." LIMIT 1");
	if($rs){

		while($data = mysql_fetch_assoc($rs)){
			$news[] = $data;
		}
		foreach($news as $data){
			echo "<h3 style=\"margin-left: 10px;line-height: 0;\">".$data['title']."</h3><hr style=\"	
width: 95%;filter:alpha(opacity=20); -moz-opacity:0.2; -khtml-opacity: 0.2; opacity: 0.2;\"/>";
			echo "<label style=\"font-size:12px;color:#ccc;margin-left: 10px;line-height:15px;\">".$data['title']."</label>";
			echo '<br/><img src="modules/admin/news/images/'.$data['pic'].'" style="display:block;margin:auto; width: 300px;" />';
			echo '<br/><div style="margin-left: 10px; ">'.$data['detail'].'</div>';
			echo "<hr style=\"width: 95%;filter:alpha(opacity=20); -moz-opacity:0.2; -khtml-opacity: 0.2; opacity: 0.2;\"/>";
			echo '<div style="margin-left:10px;font-size:11px;">ประกาศโดย&nbsp; <b>เจ้าหน้าที่ฝ่ายวิชาการ</b> วันที่ประกาศ '.date_th($data['n_date']).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label onClick="JavaScript:fbs_click(\''.$base_url.'\','.$data['newsID'].')" class="share">แบ่งปันข่าวสาร</label></div>';

echo "<div class=\"fb-comments\" data-href=\"".rawurlencode($base_url.'/index.php?mod=news&id=').$data['newsID']."\" data-width=\"650\"></div>";
			//echo '<iframe src="http://www.facebook.com/plugins/comments.php?href=49.48.98.103/testweb/recommend/index.php?mod=news&id=40&permalink=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:16px;" allowTransparency="true"></iframe> ';
		}
		
	}else{
		die(mysql_error());
	}
	?>
	<style>
	.share{
	cursor:pointer;
}
.share:hover{
	text-decoration:underline;
}
	</style>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=491584437587560";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<?
	}
?>
<?else :?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=news" onclick="" style="z-index: 7;">ข่าวสาร</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style>
	.shadow {
-webkit-border-radius: 2px; /* กำหนดรัศมีของมุมครับ */
-khtml-border-radius: 2px; /* กำหนดรัศมีของมุมครับ */
-moz-border-radius: 2px; /* กำหนดรัศมีของมุมครับ */
border-radius: 2px; /* กำหนดรัศมีของมุมครับ */
-moz-box-shadow: 0 0 3px #B6BDC4; /* กำหนดสีของกรอบและเงาครับ */
-webkit-box-shadow: 0 0 3px #B6BDC4; /* กำหนดสีของกรอบและเงาครับ */
box-shadow: 0 0 3px #B6BDC4; /* กำหนดสีของกรอบและเงาครับ */
padding:7px; /* กำหนดระยะห่างจากขอบด้านในของกรอบถึงขอบของรูป���าพ */
margin: 10px;
}
.a-news{
	word-break:break-word; color:#000;text-decoration:none;display:block;border-bottom:1px dotted  #ccc;
	position:relative;
	float:left;
	width: 300px;
	overflow:hidden;
	padding: 4px;
}
.a-news:hover{
	background-color: rgba(0,0,0,.1);
}
.a-news:after{
	clear: left;
}
.a-first:hover{
	background-color: rgba(0,0,0,.1);
}
.a-news2{
	text-decoration:none;
	color: #000;
}
.a-news2:hover{
	text-decoration: underline;
}
.round_image{
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: #000 0 2px 3px;
-moz-box-shadow: #000 0 2px 3px;
box-shadow: #000 0 2px 3px;
}

</style>
<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
	require_once 'config.inc/database.php';
	$database = new database($host, $username, $password, $dbname);
	$sql = "SELECT * FROM news ORDER BY n_date DESC, n_time DESC LIMIT 18";
	$database->mysql_query($sql) or die(mysql_error());
	$ran_val[] = "images/new/hot-kapook8.gif";
	$ran_val[] = "images/new/hot-kapook9.gif";
	$ran_val[] = "images/new/hot-kapook10.gif";
	$ran_val[] = "images/new/hot-kapook12.gif";
	if($database->mysql_num_rows()> 0){;

	
	$ran = rand(0,3);
	foreach($database->mysql_fetch_assoc() as $index => $data){
		if($index == 0){
			$str = '<div style="float:left;"><img border="0" class="shadow" src="modules/admin/news/img_resize/'.$data['pic_resize'].'" alt=""/> ';
			$str .= '<a href="?mod=news&id='.$data['newsID'].'"style="display:block;margin-left: 10px; text-decoration:none; color:#000;width: 300px !important; padding: 4px;border-bottom:1px dotted #ccc;overflow:hidden;" class="a-first">'.$data['title'].'&nbsp;<img src="'.$ran_val[$ran ].'"/></a></div>';
			echo $str;
		}
		if($index > 0 && $index< 8){
			if(strlen($data['title'])>130){
				$str2 = '<a href="?mod=news&id='.$data['newsID'].'" class="a-news">'.substr($data['title'],0,130).'...'.'</a>';
			}else{
				$str2 = '<a href="?mod=news&id='.$data['newsID'].'" class="a-news">'.$data['title'].'</a>';
			}
			echo $str2;
		}
		if($index == 8){
		echo '<br style="clear:both;line-height:0;"/>';
		}
		if($index >= 8){
			echo '<div style="width:100px;word-break;break-word;display:blokc;float:left; margin:13px;height: 120px;overflow:hidden;"><img src="modules/admin/news/img_resize/'.$data['pic_resize'].'" style="width: 100px;" class="round_image"/><a href="?mod=news&id='.$data['newsID'].'" class="a-news2" style="display:block;word-break:break-word;vertical-align:top;width:100px;">'.$data['title'].'</a></div>';
		}
	}}else{
		echo "<center><b>ไม่มีข้อมูล</b></center>";
	}
?>
<br style="clear:both;line-height:0;"/>
<a href="?mod=news&id=all" class="a-news2" style="float:right;margin:10px;">อ่านข้าวทั้งหมด</a>
<i style="clear:both;line-height:0;"></i>
<hr style="	height: 8px;
width: 90%;
	border: none;
	outline: none;
	background: #fff url('images/shad.png') no-repeat scroll center;"/>
<a id="fb_link" href="#fb_link" onclick="fbs_click();" style="display:none;">Share me on FB</a>
<span class="topic_"><i class="icon-flag"></i>สถิติรายวิชา</span>
<div style="margin:10px;">
	<?
		$fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma","THSarabunNew");
		$fonts_size = array("16px", "24px", '20px');
		$limit = 15;
		$end = 41;//num_rows - $limit;
		$start = rand(0, $end);
		
		$db = new database($host, $username, $password ,$dbname);
		$sql2 = "SELECT * FROM subject WHERE courses=(SELECT update_ FROM courses ORDER BY coursesID DESC LIMIT 1) LIMIT $start,$limit";
		$db->mysql_query($sql2) or die(mysql_error());
		if($db->mysql_num_rows() > 0){
		foreach($db->mysql_fetch_assoc() as $data){
		shuffle($fonts);
		//$randomFont = array_shift($fonts);
		shuffle($fonts_size);
		//$randomFont_size = array_shift($fonts_size);
		end ( $fonts );
		end ( $fonts_size );
			echo '<a href="?mod=static&id='.$data['subID'].'&courses='.$data['courses'].'" class="datum" style="font-family:'.pos($fonts).';font-size:'.pos( $fonts_size).';">'.$data['subName'].'</a>';
		}}else{
			echo "<center><b>ไม่มีข้อมูล</b></center>".$db->mysql_num_rows();
		}
	?>
</div>
	<?endif?>
 <script>
function fbs_click(url,id) {
	//https://www.mysite.com.au/product/detail?advertiseId
	//http://chaosiam.no-ip.info/testweb/recommend
var url = 'http://www.facebook.com/sharer.php?u=' +
    encodeURIComponent(url+'/index.php?mod=news&id=') + id;
 //var url = 'http://www.facebook.com/sharer.php?u=http://49.48.98.103/testweb/recommend/index.php?mod=news&id='+id;
window.open(url, 'facebook-share-dialog', 'left=20,top=20,width=550,height=400,toolbar=0,menubar=0,scrollbars=0,location=0,resizable=1');
return false;
}
 </script>
 <style>
	.datum{
	margin:5px; color: #68938d;text-decoration:none;line-heighr:5px;
	display:inline;
}
.datum:hover{
	color:red;
}
.topic_{
display:block;
width: 80%;
height: 30px;
margin-left: 10px;
font-size: 20px;
padding: 3px;
background-image: linear-gradient(right bottom, rgb(255,255,255) 37%, rgb(245,245,245) 53%);
background-image: -o-linear-gradient(right bottom, rgb(255,255,255) 37%, rgb(245,245,245) 53%);
background-image: -moz-linear-gradient(right bottom, rgb(255,255,255) 37%, rgb(245,245,245) 53%);
background-image: -webkit-linear-gradient(right bottom, rgb(255,255,255) 37%, rgb(245,245,245) 53%);
background-image: -ms-linear-gradient(right bottom, rgb(255,255,255) 37%, rgb(245,245,245) 53%);

background-image: -webkit-gradient(
	linear,
	right bottom,
	left top,
	color-stop(0.37, rgb(255,255,255)),
	color-stop(0.53, rgb(245,245,245))
);
}
 </style>


 