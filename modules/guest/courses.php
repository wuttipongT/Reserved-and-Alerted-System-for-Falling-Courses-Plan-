<link rel="stylesheet" href="jquery.ui.scrollbar/css/website.css" type="text/css" media="screen"/>
<script src="jquery.ui.scrollbar/js/jquery.tinyscrollbar.min.js" type="text/javascript"></script>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=courses" onclick="" style="z-index: 7;">หลักสูตร</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<?php
 	$arr = dateTH();
	$year = $arr[2];
	if(@is_null($_GET["year"])){
		$year=$year;
	}else{
		$year=$_GET["year"];
	}
	if(@is_null($_GET["class"])){
		$class=1;
	}else {
		$class=$_GET["class"];
	}
 ?>
 <style>
 .button {
    position: relative;
    overflow: visible;
    display: inline-block;
    padding: 0.5em 1em;
    border: 1px solid #d4d4d4;
    margin: 0;
   
    text-align: center;
    text-shadow: 1px 1px 0 #fff;
    font:11px/normal sans-serif;
    color: #333;
    white-space: nowrap;
    cursor: pointer;
    outline: none;
    background-color: #ececec;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f4f4f4), to(#ececec));
    background-image: -moz-linear-gradient(#f4f4f4, #ececec);
    background-image: -ms-linear-gradient(#f4f4f4, #ececec);
    background-image: -o-linear-gradient(#f4f4f4, #ececec);
    background-image: linear-gradient(#f4f4f4, #ececec);
    -moz-background-clip: padding; /* for Firefox 3.6 */
    background-clip: padding-box;
    border-radius: 0.2em;
    /* IE hacks */
    zoom: 1;
    *display: inline;
}

.button:hover,
.button:focus,
.button:active,
.button.active {
    border-color: #3072b3;
    border-bottom-color: #2a65a0;
    text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
    color: #fff;
    background-color: #3c8dde;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#599bdc), to(#3072b3));
    background-image: -moz-linear-gradient(#599bdc, #3072b3);
    background-image: -o-linear-gradient(#599bdc, #3072b3);
    background-image: linear-gradient(#599bdc, #3072b3);
}

.button:active,
.button.active {
    border-color: #2a65a0;
    border-bottom-color: #3884cd;
    background-color: #3072b3;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#3072b3), to(#599bdc));
    background-image: -moz-linear-gradient(#3072b3, #599bdc);
    background-image: -ms-linear-gradient(#3072b3, #599bdc);
    background-image: -o-linear-gradient(#3072b3, #599bdc);
    background-image: linear-gradient(#3072b3, #599bdc);
}

/* overrides extra padding on button elements in Firefox */
.button::-moz-focus-inner {
    padding: 0;
    border: 0;
}
	.nav-back, 
	.nav-next,
	#edu-back,
	#edu-next,
	#edu-edit-back,
	#edu-edit-next{
		border-style: solid;
		border-color: transparent #000 transparent transparent;
		border-width: 5px;
		display: inline-block;
		position:relative;
		margin-left: 0;
		cursor: pointer;
	}
	.nav-next,
	#edu-next,
	#edu-edit-next{
		border-color: transparent transparent transparent #000;
	}
 </style>
 <button id="edu" style="margin: 20px; float:right;" class="button">แผนการศึกษา</button>
 <div style="text-align:left;padding:0;padding:0 10px; 0 0;">
	<img src="images/msu-logo.png" style="display:inline;"/>
	<h2 style="display:inline-block; vertical-align:top;margin-top:30px;">หลักสูตรการศึกษา</h2>

	<h2 style="margin-top:-30px;display:inline-block;vertical-align:middle;margin-left:-125px;">ระดับปิญญาตรี</h2>
	<h3 style="display:inline-block;margin-left:-75px;position:relative;top:5px;">ปีการศึกษา</h3>
	<a id="a-back" class="back" style="position:relative;top:5px;" href="Javascript:void(0)"></a>&nbsp;<span style="position:relative;top:5px;" id="year"></span>
	<a id="a-next" class="next" style="position:relative;top:5px;" href="Javascript:void(0)"></a>
<div style="position:relative;top: -25px;">
<h3>คณะวิทยาการสารสนเทศ</h3>
<p class="p0"style="display:block;position:relative;top:-13px;">Faculty of Informatics</p>
</div>
<div class="page-courses" style="top:-40px;">
	<p class="p0">หลักสูตรวิทยาศาสตร์บัณฑิต</p>
	<p class="p0">สาขาวิทยาการคอมพิวเตอร์</p>
	<p class="p0">(หลักสูตรปรับปรุง พ.ศ. <label id="update">&nbsp;</label> )</p>
</div>
</div>
<h3 style="position:relative;margin-top:-25px;text-indent:20px;">รายวิชาในหลักสูตร</h3>
<div id="scrollbar1">
		<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		<div class="viewport">
			 <div id="content_courses" class="overview" style="margin-bottom: 10px;">
				   &nbsp;
			</div>
		</div>
	</div>
<div id="kkk" style="display:none;">
		<div style="border: 1px solid #ccc;padding:2px;border-bottom:none;">
			<div style="position:relarive;width: 200px; margin:auto;">
				ปีการศึกษา&nbsp;
				<div id="edu-back"></div><div id="edu-year" style="display:inline-block;margin: 0 5px;"></div><div id="edu-next"></div>
				<label>ชั้นปี</label>
				<select style="padding:2px;" name="class-edu">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</div>
		</div>
		<div id="div-edu" style="margin:0;"></div>
</div>
<style type="text/css">
		p.p0,.a-courses{display:inline-block;height:auto;}
		.a-courses:hover{background:#CCC;}
		.p1{text-indent:.1px;width:50;vertical-align:top;margin:2px 2px 2px 2px;}
		.p2{width:200px;margin:2px 2px 2px 2px;}
		.p3{vertical-align:top;text-align:center;margin:2px 2px 2px 2px;}
	table{width:600px;height:auto; ; border-collapse:collapse; word-wrap:break-word;table-layout:fixed;}
	table td,
	table th{vertical-align:top;border:1px solid #ccc;}
	.page-courses{text-align:center;background-color:#F0F0F0;position:relative;width:660px;height:50px;display:table-cell;vertical-align:middle;padding-left:2px;}
	.page-courses p{display:inline-block;vertical-align:middle;}
	.back{
		border-color:transparent #000 transparent transparent;
		border-width:5px;
		border-style:solid;
		position:relative;
		width:0;
		height:0;
		display:inline-block;
	}
	.next{
		border-color:transparent transparent transparent #000;
		border-width:5px;
		border-style:solid;
		position:relative;
		width:0;
		height:0;
		display:inline-block;
	}
</style>
<script>
	$(document).ready(function(){
			$('#kkk').dialog({
				autoOpen: false,
				width: 1024,
				height: 'auto',
				title: 'แผนการเรียน',
				modal: true,
				buttons:{
					Close: function(){
						$( this ).dialog( 'close' );
					}
				}
			});
		$('#edu').click(function(){
			$('#kkk').dialog( 'open' );
		});
		var $year = (new Date).getFullYear()+543,
						     $class = $('select[name="class-edu"] :selected').val();
						$('#edu-year').text($year);
						$('#div-edu').load('modules/guest/data.education.php?year='+$year+"&$class="+$class);
		
						$('#edu-back').click(function(e){
							$year -=1;
							$('#edu-year').text($year);
							$('#div-edu').load('modules/guest/data.education.php?year='+$year+"&$class="+$class);
							e.preventDefault ( );
							return false;
						});
						$('#edu-next').click(function(){
							$year +=1;
							$('#edu-year').text($year);
							$('#div-edu').load('modules/guest/data.education.php?year='+$year+"&$class="+$class);
						});
		
						$('select[name="class-edu"]').change(function(){
							$('#div-edu').load('modules/guest/data.education.php?year='+$year+"&$class="+$(this).val());
						});
		var currYear = (new Date).getFullYear()+543;
		$('#year').text(currYear);
		getUpdate({result:currYear}, function(source){
			$('#update').text(source);
			$('#content_courses').load("modules/guest/data.courses.php?courses_id="+source, function(){
				$('#scrollbar1').tinyscrollbar();	
			});
		});
		$('#a-back').click(function(){
			currYear = currYear-1;
			$('#year').text(currYear);
			return currYear;
		});
		$('#a-next').click(function(){
			currYear = currYear+1;
			$('#year').text(currYear);
			return currYear;
		});

		$('#a-back,#a-next').click(function(e){
			getUpdate(e, function(source){
				$('#update').text(source);
				$('#content_courses').load("modules/guest/data.courses.php?courses_id="+source, function(){
					$('#scrollbar1').tinyscrollbar();
				});
			});	
		});
		
	});
	function getUpdate(e, handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			data: {id:e.result, is_ajax: 17},
			success: function( source ){
				handleData(source);
			}
		});
	}
</script>

