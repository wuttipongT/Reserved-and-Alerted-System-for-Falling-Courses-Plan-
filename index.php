<?ob_start();session_start();
	$_title = "ระบบแนะนำแผนการเรียนและสำรองที่นั่ง คณะวิทยาการสารสนเทศ สาขาวิทยาการคอมพิวเตอร์";
	$footer="การรับชมเว็บไซต์ จะเกิดความสวยงามมากขึ้นเมื่อคุณใช้ Google Chrome Browser
		Copyright (c) 2008-2009 work helps an undergraduate All rights reserved ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title><?=$_title;?></title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/thm.css" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/pwdwidget.css"/>
<link rel="stylesheet" href="fonts/thsarabunnew.css" type="text/css" />
<link rel="stylesheet" href="jquery-ui-1.10.3/themes/custom-theme/jquery-ui-1.10.0.custom.css" type="text/css"/>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->
<script src="jquery-ui-1.10.3/jquery-1.9.1.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.core.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.widget.js"></script>
<!-- tab -->
<script src="jquery-ui-1.10.3/ui/jquery.ui.tabs.js"></script>
<!-- dialog -->
<script src="jquery-ui-1.10.3/ui/jquery.ui.mouse.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.button.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.draggable.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.position.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.resizable.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.button.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.dialog.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.effect.js"></script>
<!-- autocomplete -->
<script src="jquery-ui-1.10.3/ui/jquery.ui.menu.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.autocomplete.js"></script>

<script type="text/javascript" src="Scripts/script.js"></script>
<!--<script src="Scripts/facybox.js" type="text/javascript"></script>
<link href="Scripts/facybox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="Scripts/facyBox/demo/faceplant.css" media="screen" rel="stylesheet" type="text/css" />--> 
<script src="Scripts/nicEdit.js" type="text/javascript"></script>
<?
if(is_dir("installation/")){
	header("Location: installation/index.php");
}
?>
<?
	//include ("config.inc/config.inc.php");
	//include ("config.inc/database.php");
	include ("config.inc/function.php");
	//$objDB = new database(HOST,USER,PASSWORD,DBNAME);
	/*foreach (glob("config.inc/*.php") as $filename){
		include_once $filename;
	}*/
	if((!$_SESSION['student'])&&(!$_SESSION['staff'])){
		//echo '<script type="text/javascript">alert("null")</script>';
		include_once 'modules/login/autologin.php';		
	}
?>
<div id="header" style="">
	<!-- jQuery handles to place the header background images -->
	<div id="headerimgs">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
	<!-- Top navigation on top of the images -->
	
	 <h1 class="ribbon">
	<div id="nav-outer" class="ribbon-content">
		<div id="navigation">
			<div id="menu">
				<ul>
					<li><a href="index.php">หน้าหลัก</a></li>
					<li><a class="<?=active_menu_head("news",1)?> <?=active_VIP();?>" href="?mod=news" title="ข่าวสาร">ข่าวสาร</a></li>
					<li><a class="<?=active_menu_head("courses")?>" href="?mod=courses" title="หลักสูตร">หลักสูตร</a></li>
					<li><a class="<?=active_menu_head("staff")?>" href="?mod=staff" title="บุคลากร">บุคลากร</a></li>
					<li><a class="<?=active_menu_head("help")?>" href="?mod=help" title="คู่มือการใช้งาน">คู่มือการใช้งาน</a></li>
					<li><a class="<?=active_menu_head('contact')?>" href="?mod=contact" title="ติดต่อเรา">ติดต่อเรา</a></li>
				</ul>
			</div>
			<div class="hi"><? if(sessionLogin()==0){//student?>
            	<i class="icon-user" style="position: relative;left: -20px;"></i>&nbsp;<b style="color:#FFF;font-size: 12px; display: inline-block;position: relative;top: -18px;left:-20px;">คุณ&nbsp;<?=$_SESSION["student"];?></b>
            	<i class="icon-off" style="position: relative;left: -20px;"></i>&nbsp;<a href="<?=$_SESSION['logout']?>" style="color:#FFF;font-size: 12px;position: relative;top: -18px;left:-20px;">ออกจากระะบบ</a>
                <?}else if(sessionLogin()==1){?>
                	<i class="icon-user"></i>&nbsp;<b style="color:#FFF;font-size: 12px; display: inline-block;position: relative;top: -18px;">คุณ&nbsp;<?=$_SESSION["staff"];?></b>
                	<i class="icon-off"></i>&nbsp;<a href="logout.php" style="color:#FFF;font-size: 12px;position: relative;top: -18px;">ออกจากระะบบ</a><?}?>
           	</div>
			<div id="search" style="z-index: 90;">
				<form name="form-search" action="?mod=search" method="post">
					<!--<a href="#" class="search-btn"></a>-->
					<div class='selectBox'>
						<select style="margin: 3px;padding:3px;outline:none;border:none;display:block;position:relative;" id="select-search-btn" name="type">
							<option value="0" selected>รหัสวิชา</option>
							<option value="1">ชื่อวิชา</option>
							<option value="2">หมวดหมู่</option>
							<option value="3">กลุ่ม</option>
						</select>
					</div>
					<label class="icon-search" style="display:block;margin-top: 8px;margin-left:11px;vertical-align: middle;float:right;border-right:1px solid #ccc;padding:0;width: 20px;cursor:pointer;" id="i-search" for="submit"></label>
					<input type="text" class="search-txt not" placeholder="search" id="input-search" name="key" autocomplete="off"/>
					<div id="category" class="submenu" style="display:none;">
						<ul id="cate" class="root" >
						<li>
						  <a href="JavaScript:void(0)" value="0">หมวดศึกษาทั่วไป</a>
						</li>
						<li >
						  <a href="JavaScript:void(0)" value="1">หมวดวิชาเฉพาะด้าน</a>
						</li>
					   <li >
						  <a href="JavaScript:void(0)" value="2">หมวดวิชาเลือกเสรี</a>
						</li>
						<li >
						  <a href="JavaScript:void(0)" value="3">หมวดฝึกงาน</a>
						</li>
					  </ul>
					</div>
					<div id="group" class="submenu" style="display:none;">
						<ul id="gro" class="root">
						<li>
						  <a href="JavaScript:void(0)" value="0">กลุ่มวิชาแกนคณะ</a>
						</li>
						<li >
						  <a href="JavaScript:void(0)" value="1">กลุ่มวิชาพื้นฐานเอก</a>
						</li>
					   <li >
						  <a href="JavaScript:void(0)" value="2">กลุ่มวิชาเอกบังคับ</a>
						</li>
						<li >
						  <a href="JavaScript:void(0)" value="3">กลุ่มวิชาเอกเลือก</a>
						</li>
					  </ul>
					</div>
				</form>
			</div>
		</div>
	</div>
	</h1>
	<!-- Slideshow controls -->
	<div id="headernav-outer">
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="control" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
	</div>
	<!-- jQuery handles for the text displayed on top of the images -->
	
	<div id="headertxt">
		<p class="caption">
			<span id="firstline"></span>
			<a href="#" id="secondline"></a>
		</p>
		<p class="pictured">
			Pictured:
			<a href="#" id="pictureduri"></a>
		</p>
	</div>
</div>
<!--end headder-->
	<div id="content">
		<div id="nav-left" class="left">
	<? if(userLogin()){
			include("modules/display.php");
		}else{
			include("modules/login/login.php");
		}?>
		<ul>
	<?
		if(sessionLogin()==0){//student
			include("modules/student/list.php");
		}else if(sessionLogin()==1){//staff
			include("modules/admin/list.php");//admin
			/*$type_staff = who_is_type($objDB);
			if($type_staff['type'] == 0){
				
			}else if($type_staff['type'] == 1){
				//--------------
				$sql = "SELECT staffID FROM advisor WHERE staffID='".$_SESSION['teacher']."' LIMIT 1";
				$objDB->mysql_query($sql);
				if($objDB->mysql_num_rows()>0){
					$_SESSION["advisor"] = $_SESSION["staff"];
				}
				$sql = "SELECT staffID FROM lecturer WHERE staffID='".$_SESSION['teacher']."' LIMIT 1";
				$objDB->mysql_query($sql);
				if($objDB->mysql_num_rows()>0){
					$_SESSION["lecturer"] = $_SESSION["staff"];
				}
			}*/
		}else if(sessionLogin()==-1){?>  
      			<li class="topic" style="border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1);">
      				<i class="icon-th-large icon-white" style="margin-left: 10px; display: inline-block;vertical-align: middle;"></i>&nbsp;รายการทั่วไป<div class="ragtangle-stic-nav-gen"></div></li>
				<li>
					<a id="nav-left" class="<?=active_menu("news",1)?>" href="?mod=news" title="ข่าวสาร">
						<i class="icon-th-list"></i><span class="indent">ข่าวสาร</span>
					</a>
				</li>
				<li>
					<a id="nav-left" class="<?=active_menu("courses")?>" href="?mod=courses" title="หลักสูตร">
						<i class="icon-th-list"></i><span class="indent">หลักสูตร</span>
					</a>
				</li>
				<li>
					<a id="nav-left" class="<?=active_menu("staff")?>" href="?mod=staff" title="บุคลากร">
						<i class="icon-th-list"></i><span class="indent">บุคลลากร</span>
					</a>
				</li>
				<li>
					<a id="nav-left" class="<?=active_menu("help")?>" href="?mod=help" title="คู่มือการใช้งาน">
						<i class="icon-th-list"></i><span class="indent">คู่มือการใช้งาน</span>
					</a>
				</li>
				<li>
					<a id="nav-left" class="<?=active_menu('contact')?>" href="?mod=contact" title="ติดต่อเรา">
						<i class="icon-th-list"></i><span class="indent">ติดต่อเรา</span>
					</a>
				</li><?}?>
			</ul>
		</div><!--end id nav-left class left-->
		<div id="article"class="central class_box_shadow">
			<div id="middle"></div>
			<div id="bottom">
				<?=detail();?>
			</div>
		</div><!--end central-->
	</div><!--end content-->
	<i style="clear:both;height:0;line-height:0;"></i>
	<div id="footer">
		<div style="position:relative; width:979px; height: auto; padding: 30px 0; margin: auto auto;">
			<div id="first" style="display: inline-block;width:100px;height: 200px; vertical-align: top;">
				<h3 style="vertical-align: top;"><a href="index.php" style="text-decoration:none;color:#000;">หน้าแรก</a></h3>
			</div>
			<div id="therd" style="display: inline-block;width:250px;height: 200px; border: 1px dashed #000; border-top: none; border-bottom: none;text-indent: 10px;">
				<h3>ดาว์โหลด</h3>
				  	<p><a href="http://www.ccsoftware.msu.ac.th/" style="text-decoration:none;color:#000;" target="_blank">โปรแกรมลิขสิทธิ์ของบริษัท Microsoft</a></p> 
  					<p><a href="http://ncs.msu.ac.th/category/kaspersky" style="text-decoration:none;color:#000;" target="_blank">คู่มือและโแรแกรมป้องกันและกำจัดไวรัส</a></p> 
   					<p><a href="http://www.livemail.msu.ac.th/handbook.php" style="text-decoration:none;color:#000;" target="_blank">คู้มือการใช้งาน windows live mail</a></p>
   					<p><a href="http://www.f0nt.com/release/13-free-fonts-from-sipa/" style="text-decoration:none;color:#000;" target="_blank">ฟอนต์แห่งชาต</a></p>
			</div>
			<div id="seconde" style="display: inline-block;width:300px;height: 200px; text-indent: 10px;border-right: 1px dashed #000;">
				<h3>เกี่ยวกับเรา</h3>
				<p>ระบบแนะนำแผนการเรียนและสำรองที่นั่ง</p>
  				<p>หลักสูตรวิชาวิทยาการคอมพิวเตอร์ </p> 
  				<p>ชั้น 3 it-304 ตึกคณะวิทยาการสารสนเทศ</p> 
				<p>มหาวิทยาลัยมหาสารคาม</p>
			</div>
			<div id="seconde" style="display: inline-block;width:300px;height: 200px;margin-left: 10px;">
				<h3>สงวนลิขสิทธิ์ © 2556 สาขาวิทยาการคอม คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</h3>
				<p>การรับชมเว็บไซต์ จะเกิดความสวยงามมากขึ้นเมื่อคุณใช้</p>
  				<p> Google Chrome Browser </p> 
  				<p>Mozilla Firefox Browser</p> 
			</div>
		</div>
	</div>
</body>
<style type='text/css'>
			div.selectBox
			{
				position: relative;
				display: block;
				cursor: default;
				text-align: left;
				color: #888;
				margin: 0;
				padding: 0;
				outline:none;
				border: none;
				width: 80px;
				height: 30px;
				float: right;
				
			}
			span.selected
			{
				color: #000;
				font-size: 12px;
				background-color: #fff;
				width: auto;
				height: 20px;
				padding: 5px;
				border: none;
				outline: none;
				display: block;
				float: left;
			}
			.selectArrow{
				float: right;
				width: 13px;
				height: 30px;
				float: left;
				background-image: url('images/drop.gif');
				background-repeat: no-repeat;
				background-color: #fff;
				background-position: center;	
				cursor:pointer;
			}
			.selectArrow:after{
				clear: both;
			}
			div.selectOptions
			{
				position:absolute;
				top: 29px;
				right: 2;
				width: 64px;
				border: none;
				border-bottom-right-radius:5px;
				border-bottom-left-radius:5px;
				overflow:hidden;
				background:#fff;
				display:none;
				z-index: 50;
				font-size: 12px;
				color: #000;
				text-indent: 5px;
			}
				
			span.selectOption
			{
				display:block;
				width:80%;
				line-height:20px;
			}
			
			span.selectOption:hover
			{
				color:#f6f6f6;
				background:#4096ee;	
			}
.submenu{
background: #fff;
position: absolute;
display:none;
z-index: 100000;
width: 160px;
margin-top: 30px;
padding: 0 0 5px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.45);
right:0;
}
.root
{
list-style:none;
margin:0px;
padding:0px;
font-size: 11px;
padding: 11px 0 0 0px;
border-top:1px solid #dedede;
	
	
}
.submenu  li a {
   
    color: #555555;
    display: block;
    font-family: arial;
    font-weight: bold;
    padding: 6px 15px;
  cursor: pointer;
text-decoration:none;
text-align:left;
}

.submenu li a:hover{
    background:#155FB0;
    color: #FFFFFF;
    text-decoration: none;
    
}
		</style>
<script type="text/javascript">
    jQuery(document).ready(function($) {
		var bool = true;
    	//enableSelectBoxes();
      $("h2",$("#changelog")).css("cursor","pointer").click(function(){
          $(this).next().slideToggle('fast');
      }).trigger("click");
      $(".search-txt").focus(function(){
    	$(this).animate({width:"195px"});
		$('#search').animate({width:"316px"});
	  });
	  $(".search-txt").focusout(function(){
    	$(this).animate({width:"40px"});
		$('#search').animate({width:"160px"});
	  });
	  $('#select-search-btn').change(function(){
		 if($(this).find('option:selected').val() == 2){
			 $('#category').show();
		 }else if($(this).find('option:selected').val() == 3){
			 $('#group').show();
		 }else{
			$('#category,#group').hide();
		 }
	  });
	  $('#i-search').click(function(e){
		if($('#input-search').val() == ""){
			alert('กรุณากรอกข้อมูลด้วยครับ');
			return false;
		}
		//$('#input-search').focus();
		$('form[name="form-search"]').submit();
	  });
	 $('ul#cate li').each(function(){
		$(this).children().click(function(){
			$('#category').hide();
			$('#input-search').val($(this).text());
			$('form[name="form-search"]').submit();
		});
	 });
	 $('ul#gro li').each(function(){
		$(this).children().click(function(){
			$('#group').hide();
			$('#input-search').val($(this).text());
			$('form[name="form-search"]').submit();
		});
	 });
    });
  /*  function enableSelectBoxes(){
				$('div.selectBox').each(function(){//loop
					$(this).children('span.selected').html($(this).children('div.selectOptions').children('span.selectOption:first').html());
					$(this).attr('value',$(this).children('div.selectOptions').children('span.selectOption:first').attr('value'));
					
					$(this).children('span.selected,span.selectArrow').click(function(){
						if($(this).parent().children('div.selectOptions').css('display') == 'none'){
							$(this).parent().children('div.selectOptions').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions').css('display','none');
						}
					});
					
					$(this).find('span.selectOption').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected').html($(this).html());
					});
				});			
			}*/
 </script>
</html>
<?php
    ob_end_flush(); // Flush the output from the buffer
    session_write_close();
?>