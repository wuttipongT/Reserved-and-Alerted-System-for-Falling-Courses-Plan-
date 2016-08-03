<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=graphs" onclick="" style="z-index: 7;">การแทนที่ด้วยกราฟ</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style>
	table{
		border-collapse:collapse;
	}
	table td{
		border:1px solid #ccc;
		text-align:center;
	}
	#i_start,
	#i_limit{
		display:inline-block;
		border-style: solid;
		border-color: transparent #000 transparent transparent;
		border-width: 7px;
		position:relative;
		margin: 30px;
		width: 7px;
	}
	#i_limit{
		border-color: transparent transparent transparent #000;
	}
#j_start,
	#j_limit{
		display:inline-block;
		border-style: solid;
		border-color: transparent transparent #000 transparent;
		border-width: 7px;
		position:relative;
		margin: 30px 0;
	}
	#j_limit{
		border-color: #000 transparent transparent transparent;
	}
		.course-update:focus,
	.input-search1:focus{
		outline:none;
	}.serach-detail{
		border: 1px solid #ccc;
		width: auto; 
		position: absolute;
		right: 0;
		margin-right: 5px;
		text-indent: 3px;
		 
	}
		i{
		cursor:pointer;
		-moze-opacity: .40;
		opacity: .40;
		-filter-alpha(opacity=40%);
		-webkit-opacity: .40;
		-khtml-opacity: .40;
	}
	i:hover{
		-moze-opacity: 1;
		opacity: 1;
		-filter-alpha(opacity=40%);
		-webkit-opacity: 1;
		-khtml-opacity: 1;
	}
	
	tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}
</style>
<div class="hi5">
<div style="position:relative;width: 100%; height: 30px;">
<div style="padding: 0;" class="serach-detail">
	<input type="text" id="search-detail" style="display:inline-block; border:none;" class="not input-search1" placeholder="รหัสวิชา"/><i class="icon-search" style="position:relative;top: 5px;" id="btn-search-detail"></i>&nbsp
	&nbsp;|&nbsp;หลักสูตร&nbsp;<select style="padding:2px;outline:none;border:none;" id="course-update">
</select>
	<div id="load" style="display:inline-block;width: 20px;margin-right: 5px;">&nbsp;</div>
</div>
</div>
<!--<div style="display:inline-block;position:absolute;margin: 25px 200px;" id="load">&nbsp;</div>
<div style="display:inline-block;position:relative;margin-left: 30px;width: 200px;margin-bottom:0;">
	<a id="i_start" href="JavaScript:void(0)" title="เลื่อนไปขวา"></a>
	<a id="i_limit" href="JavaScript:void(0)" title="เลื่อนไปซ้าย"></a>
</div>-->

<div id="div-content-graphs" style="margin-left: 15px;marin-top:0;">
	<div style="border:3px dashed #ccc;width: 600px;height: 200px;margin-top: 20px;border-radius: 15px;-moz-border-radius: 15px; -webkit-border-radius: 10px; khtml-border-radius: 10px;position:relative;"><div style="width: 400px; height: 50px; font-size: 25px;position:absolute;display:block;margin-left:-200px;left: 50%;margin-top: -25px;top: 50%;">กรอกข้อมูลเพื่อค้นหาความสัมพันธ์รายวิชา</div></div>
</div>
</div>
<div id="dialog-message" style="display:none"></div>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script>
	var $mess = $( "#dialog-message" );	
	$(document).ready(function(){
		$mess.dialog({
			autoOpen: false,
			modal: false,
			title: 'Error Message!',
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
		setInterval(function(){ddd();},500);
		//paggeing('1', "#div-pagging-graphs", '#div-content-graphs', 2,'data.graphs.php');//subject
		getAcadyear(function(source){
			$.each(source, function(i, val){
				$('#course-update').append($('<option>', { 
					value: val.coursesID,
					text : val.update_ 
				}));
			});
			
		});
		$('#btn-search-detail').click(function(){

			var subjectID = $('#search-detail').val();
			if(subjectID == ''){
				$mess.text('กรุณากรอกรหัสวิชาค่ะ');
				$mess.dialog( 'open' );
				return false;
			}
			$.ajax({
				type: 'POST',
				url: 'modules/admin/data.graphs.php',
				data: {subjectID: subjectID, courses: $('#course-update option:selected').text()},
				beforeSend:function(){
					$('#load').html('<img src="images/GsNJNwuI-UM.gif"/>');
				},
				success: function(source){
					$('#div-content-graphs').html( source ,function(){
						
					});
				},
			complete: function(){
			$('#load').html('');
			  }
			});
		});
		
	});
	function getAcadyear(handleData){//courses
	$.ajax({
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data: {is_ajax: 2},
		success: function(source){
			handleData(source)
		}
	});
}
function ddd(){
x = $('#content #bottom').height();
 y = $('.hi5').height();
 if(y > x){
//	sum = x+y;
	$('#content #bottom').css('height', (y+100));
 }
		}
</script>