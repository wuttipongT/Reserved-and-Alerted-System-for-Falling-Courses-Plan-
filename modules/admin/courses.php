<!--<script type="text/javascript" src="modules/admin/script&css/popup.js"></script>
<link rel="stylesheet" type="text/css" href="modules/admin/script&css/popup.css" />-->
<style>
	table#edu_,
	table#edu_2{
		width: 50%;
		border-collapse:collapse;
		}
		table#edu_2:after{
			clear: both;
		}
	table#edu_ td,
	table#edu_ th,
	table#edu_2 th,
	table#edu_2 td{
		border:1px solid #ccc;
		
	}
	table#edu_2 th,
	table#edu_2 td{
	border-left:none;
	}
	#not_1
	#not_2,{
		width: 95%;
		border-collapse:collapse;
		table-layout:fixed;
	}
	table#not_1 td,
	table#not_2 td{
		border: none;
	}
	#class-center{
		position:relative;
		display:block;
		margin:auto auto;
		width: 100px;
	}
	.ui-autocomplete{
	/*				/max-width: 140px;
   
   
     prevent horizontal scrollbar */ overflow-y: auto; max-height: 100px;
    overflow-x: hidden;
	}
	* html .ui-autocomplete{
		/*width: 140px;*/
		height: 100px;
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
</style>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealcourse" onclick="" style="z-index: 7;">การจัดการหลักสูตร</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style type="text/css">
	.table{
		display:table;
		position:relative;
		border-collapse:collapse;
		position:relative;
		text-align:center;
		margin-left: 20px;
		text-decoration:none;
		vertical-align: middle;
		table-
	}
	.row{
		display:table-row;
	}
	.cell{
		display:table-cell;
		border-bottom: 1px solid rgba(0,0,0,.08);
	}
	.cell:hover{background-color: rgba(0,0,0,.03)}
	.a-deal{width:150px;height:100px;position:relative;text-decoration:none;
		display: table-cell; text-align: center; vertical-align: middle;
	}
	.bd{
		padding:0;
		margin-left:0;
		float:none;
		-webkit-border-radius: 0 4px 4px 0;
			-moz-border-radius: 0 4px 4px 0;
				border-radius:  0 4px 4px 0;
		margin-left: -2px;
		left:-2px;
		position:relative;
	}
	.ui-autocomplete-category {
		font-weight: bold;
		padding: .2em .4em;
		margin: .8em 0 .2em;
		line-height: 1.5;
	}
	#tbt td{
		padding:0;
		margin:0;
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
	.select-search{
		border:none;
		outline:none;
	}
	.select-search:focus,
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
	
</style>
<div style="position:relative;width: 100%; height: 30px;">
<div style="padding: 0;" class="serach-detail">
	<input type="text" id="search-detail" style="display:inline-block; border:none;" class="not input-search1" placeholder="ค้นหา"/><i class="icon-search" style="position:relative;top: 5px;" id="btn-search-detail"></i>&nbsp;|
	<select style="padding: 2px;" class="select-search" id="select-search-detail">
		<option value="1" selected>หลักสูตร</option>
		<option value="2">ปีการศึกษา</option>
		<option value="3">รายวิชา</option>
		<option value="4">เงื่อนไขรายวิชา</option>
	</select>
</div>
</div>
<div class="table">
	<ul class="row">
		<li class="cell">&nbsp;</li>
		<li class="cell"><a id="btn_addcourse" class="a-deal" href="JavaScript:void(0)"><img  style="width: 50px;display:block;margin:auto;" src="images/courses-icon-100.png" style="display:block;margin:auto;"/>หลักสูตร</a></li>
		<li class="cell"><a id="btn_aca" class="a-deal" href="JavaScript:void(0);"><img style="width: 50px;display:block;margin:auto;" src="images/ICON_LessonPlan.png" style="display:block;margin:auto;"/>ปีการศึกษา</a></li>
		<!--<li class="cell"><a id="btn_edu" class="a-deal" href="JavaScript:void(0)"><img src="../../images/add.png" style="display:block;margin:auto;"/>แผนการศึกษา</a></li>-->
		<li class="cell"><a id="btn_sub" class="a-deal" href=""><img style="width: 50px;display:block;margin:auto;" src="images/subject_icon.jpg" style="display:block;margin:auto;"/>รายวิชา</a></li>
		<li class="cell"><a id="btn_pre" class="a-deal" href=""><img style="width: 50px;display:block;margin:auto;" src="images/graph.jpg" style="display:block;margin:auto;"/>เพิ่มเงื่อนไขรายวิชา</a></li>
		<li class="cell">&nbsp;</li>
	</ul>
	<ul class="row">
		<li class="cell">&nbsp;</li>
		<li class="cell"><a id="education" class="a-deal" href="JavaScript:void(0)"><img style="width: 50px;display:block;margin:auto;" src="images/Schedule_icon.jpg" />แผนการศึกษา</a></li>
		<li class="cell"><a id="sub-file" class="a-deal" href="JavaScript:void(0)"><img style="width: 50px;display:block;margin:auto;" src="images/Excel Icon.png" />รายวิชา</a></li>
		<li class="cell"><a id="pre-file" class="a-deal" href="JavaScript:void(0)"><img style="width: 50px;display:block;margin:auto;" src="images/Excel Icon.png"/>เงื่อนไขรายวิชา</a></li>
		<li class="cell">&nbsp;</li>
	</ul>
	<!--<ul class="row">
		
		<li class="cell">&nbsp;</li>
		<li class="cell">&nbsp;</li>
		<li class="cell">&nbsp;</li>
		<li class="cell">&nbsp;</li>
	</ul>-->
</div>
</br/>
<!----------------------------tab----------------------------------->
<div id="tabs" style="margin:20px;">
	<ul>
		<li><a id="a-courses" href="#tabs-1">หลักสูตร</a></li>
		<li><a id="a-aca" href="#tabs-2">ปีการศึกษา</a></li>
		<li><a id="a-sub" href="#tabs-3">รายวิชา</a></li>
		<li><a id="a-pre" href="#tabs-4">เงื่อนไขรายวิชา</a></li>
		<li><a id="a-edu" href="#tabs-5">แผนการศึกษา</a></li>
	</ul>
	<div id="tabs-1" style="display:none;">
		<div id="div-courses"></div>
	</div>
	<div id="tabs-2" style="display:none;">
		หลักสูตร&nbsp;
		<select id="select-courses-content" style="width:70px;">
			<option value="">&nbsp;</option>
		</select>
		
		<div id="div-aca" style="margin-top:10px;"></div>
		<br/>
		<div id="div-pagging-aca"></div>
	</div>
	<div id="tabs-3" style="display:none;">
		หลักสูตร&nbsp;
		<select id="select-sub-content" style="width:70px;">
			<option value="" selected >&nbsp;</option>
		</select>
		<div id="div-sub" style="margin-top:10px;"></div>
		<br/>
		<div id="div-pagging-sub"></div>
	</div>
	<div id="tabs-4" style="display:none;">
		หลักสูตร&nbsp;
		<select id="select-pre-content" style="width:70px;">
			<option value="">&nbsp;</option>
		</select>
		<div id="div-pre" style="margin-top:10px;"></div>
		<br/>
		<div id="div-pagging-pre"></div>
	</div>
		<div id="tabs-5" style="display:none;">
		<div style="border: 1px solid #ccc;padding:2px;border-bottom:none;">
			<div style="margin-left:150px;">
				ปีการศึกษา&nbsp;
				<div id="edu-back"></div><div id="edu-year" style="display:inline-block;margin: 0 5px;"></div><div id="edu-next"></div>
				<label>ชั้นปี</label>
				<select style="padding:2px;" name="class-edu">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				<select style="padding: 2px;" name="semester-edu">
					<option value="1" selected>ภาคต้น</option>
					<option value="2">ภาคปลาย</option>
				</select>
			</div>
		</div>
		<div id="div-edu" style="margin:0;"></div>
	
	</div>
</div>

<!--//** Dialog Courses **//-->
<div id="dialog_courses" style="padding: 10px;display:none;">
	<form name="addcourses" method="post" action="">
		<table cellspacing="5">
			<tr>
				<td valign="center" style="vertical-align:middle;">หลักสูตร (ปรัปปรุง)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input id="courses" type="text" name="course-update" style="display: inline-block;position:relative;width:230px;height:30px;"/></td>
			</tr>
		</table>
	</form>
</div>
<!--//** Dialog Acadyear **//-->
<div id="dialog_aca" style="display:none;">
	<form name="addaca" method="post" action="">
		<table cellspacing="5">
			<tr>
				<td align="right">ปีการศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input id="course-update" type="text" name="course-update" class="highlight bd" style="display: inline-block;position:relative;width:230px;height:30px;"/></td>
			</tr>
			<tr>
				<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
				   <select id="select-update" style="width:60px;padding:3px;">
						<option value="">&nbsp;</option>
					</select>	​
				</td>
			</tr>
		</table>
	</form>
</div>
<!--dialog subject -->
<div id="dialog_sub" style="display:none;">
	<form name="" method="post" action="">
		<table style="table-layout:fixed;">
		<tr>
			<td align="right">รหัสวิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="subID" type="text" name="subID" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">ชื่อวิชา (ภาษาไทย)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="subName" type="text" name="subName" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">ชื่อวิชา (ภาษาอังกฤษ)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="subNameEN" type="text" name="subNameEN" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td style="text-align:top;" align="right">อธิบายรายวิชา (ภาษาไทย)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><textarea id="explan" name="explan" style="width:230px;height:60px;"></textarea></td>
		</tr>
		<tr>
			<td style="text-align:top;" align="right">อธิบายรายวิชา (ภาษาอังกฤษ)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><textarea id="explanEN" name="explanEN" style="width:230px;height:60px;"></textarea></td>
		</tr>
		<tr>
			<td align="right">หน่วยกิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="degree" name="degree" type="text" style="width:230px;height:30px;" /></td>
		</tr>
		<tr>
			<td align="right">หวมดหมุ่&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="select-sub-category" style="padding:5px;">
				   <option value="">&nbsp;</option>
			       <option value="1">หมวดศึกษาทั่วไป</option>
			       <option value="2">หมวดวิชาฉพาะด้าน</option>
			       <option value="3">หมวดวิชาเลือกเสรี</option>
			       <option value="4">หมวดฝึกงาน</option>
				</select>
				​
			</td>
		</tr>
		<tr>
			<td align="right">กลุ่ม&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="select-sub-group" style="padding:5px;">
				   <option value="">&nbsp;</option>
			       <option value="1">กุล่มวิชาแกนคณะ</option>
			       <option value="2">กุล่มวิชาพื้นฐานเอก</option>
			       <option value="3">กุล่มวิชาเอกบังคับ</option>
			       <option value="4">กุล่มวิชาเอกเลือก</option>
				</select>
				​
			</td>
		</tr>
		<tr>
		<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="select-sub-courses" style="padding:2px; width:60px;">
			       <option value="">&nbsp;</option>
				</select>
				​
			</td>
		</tr>
		</table>
	</form>
</div>
<!--//** pre**//-->
<div id="dialog-prerequisite" style="display:none;">
	<form name="addcourses" method="post" action="">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td align="right">รหัสวิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subcode-pre" name="subcode-pre" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right" valign="top">รหัสวิชา (เงื่อนไข)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
					<table id="tbt" style="padding:0;margin:0;"><tr><td>
					<input type="text" id="osubpre1" name="subcodepre-pre" style="width:230px;height:30px;" class="catcom"/>
					</td></tr></table>
				</td>
			</tr>
			<tr><td colspan="2" align="right"><i class="icon-plus" id="add-pre"></i>&nbsp;<i class="icon-remove" id="del-pre"></i></td></tr>
			<tr>
				<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
				   <select id="select-update-pre" style="padding:3px;width: 60px;">
					   <option value="">&nbsp;</option>
					</select>​
				</td>
			</tr>
		</table>
	</form>
</div>

<div id="dialog-pre-search" style="display:none;">
	<form name="dialog-pre-search" method="post" action="">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td align="right">รหัสวิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subcode-pres" name="subcode-pres" style="width:230px;height:30px;" class="catcom"/></td>
			</tr>
			<tr>
				<td align="right" valign="top">รหัสวิชา (เงื่อนไข)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
					<table id="tbts" style="padding:0;margin:0;"></table>
				</td>
			</tr>
			<tr>
				<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
				   <select id="select-update-pres" style="padding:3px;width: 60px;">
					   <option value="">&nbsp;</option>
					</select>​
				</td>
			</tr>
		</table>
	</form>
</div>

<!--edit ----------------------------edit courses------------------------------------>
<div id="dialog-courses-edit" style="padding: 10px; display:none;">
	<form name="addcourses" method="post" action="">
		<table cellspacing="5">
			<tr>
				<td>หลักสูตร (ปรัปปรุง)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input id="courses-edit" type="text" name="course-update" style="width:230px;height:30px;"/></td>
			</tr>
		</table>
		<input id="courses-hidden" type="hidden" />
	</form>
</div>
<!-- aca -->
<div id="dialog-aca-edit" style="display:none;">
	<form name="addaca" method="post" action="">
		<table cellspacing="5">
			<tr>
				<td align="right">ปีการศึกษา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td> 
					<input id="aca-edit" type="text" name="aca_edit" style="width:230px;height:30px;"/>
				</td>
			</tr>
			<tr>
				<td class="add-on" align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
				   <select id="select-aca-courses-update" style="width:60px;padding:3px;">
						<option value="">&nbsp;</option>
					</select>​
				</td>
			</tr>
		</table>
		<input type="hidden" id="acaID" name="acaID" />
	</form>
</div>

<div id="dialog-sub-edit" style='display:none'>
	<form name="" method="post" action="">
		<table style="table-layout:fixed;">
		<tr>
			<td align="right">รหัสวิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			<input id="subcode-edit" type="text" name="subcode-edit" style="width:230px;height:30px;"/>
			</td>
		</tr>
		<tr>
			<td align="right">ชื่อวิชา (ภาษาไทย)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="subName-edit" type="text" name="subName-edit" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td align="right">ชื่อวิชา (ภาษาอังกฤษ)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="subNameEN-edit" type="text" name="subNameEN-edit" style="width:230px;height:30px;"/></td>
		</tr>
		<tr>
			<td style="text-align:top;" align="right">อธิบายรายวิชา (ภาษาไทย)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><textarea id="explan-edit" name="explan-edit" style="width:230px;height:60px;"></textarea></td>
		</tr>
		<tr>
			<td style="text-align:top;" align="right">อธิบายรายวิชา (ภาษาอังกฤษ)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><textarea id="explanEN-edit" name="explanEN-edit" style="width:230px;height:60px;"></textarea></td>
		</tr>
		<tr>
			<td align="right">หน่วยกิต&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td><input id="degree-edit" name="degree-edit" type="text" style="width:230px;height:30px;" /></td>
		</tr>
		<tr>
			<td align="right">หวมดหมุ่&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="sub-category-edit" name="sub-category-edit" style="padding:5px;">
				   <option value="">&nbsp;</option>
			       <option value="1">หมวดศึกษาทั่วไป</option>
			       <option value="2">หมวดวิชาฉพาะด้าน</option>
			       <option value="3">หมวดวิชาเลือกเสรี</option>
			       <option value="4">หมวดฝึกงาน</option>
				</select>
				​
			</td>
		</tr>
				<tr>
			<td align="right">กลุ่ม&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   
			   <select id="sub-group-edit" style="padding:5px;">
				   <option value="">&nbsp;</option>
			       <option value="1">กุล่มวิชาแกนคณะ</option>
			       <option value="2">กุล่มวิชาพื้นฐานเอก</option>
			       <option value="3">กุล่มวิชาเอกบังคับ</option>
			       <option value="4">กุล่มวิชาเอกเลือก</option>
				</select>
				​
			</td>
		</tr>
		<tr>
		<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
			<td>
			   <select id="sub-courses-edit" style="padding:2px; width:60px;">
			       <option value="">&nbsp;</option>
				</select>​
			</td>
		</tr>
		</table>
		<input type="hidden" id="subID-edit" />
	</form>
</div>

<div id="dialog-prerequisite-edit" style="display:none;">
	<form name="addcourses" method="post" action="">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td align="right">รหัสวิชา&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subcode-pre-edit" name="subcode-pre" style="width:230px;height:30px;"/></td>
			</tr>
			<tr>
				<td align="right">รหัสวิชา (เงื่อนไข)&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td><input type="text" id="subpre-edit" name="subcodepre-pre" style="width:230px;height:30px;"/></td>
			</tr>
			<tr>
				<td align="right">หลักสูตร&nbsp;<font color="red" size="4" style="vertical-align:middle;top: 2px;position:relative;"><b>*</b></font></td>
				<td>
				   <select id="select-courses-pre-edit" style="padding:3px;width: 60px;">
					   <option value="">&nbsp;</option>
					</select>​
				</td>
			</tr>
		</table>
		<input type="hidden" id="preID" />
	</form>
</div>

<div id="dialog-sub-file" style="display:none;">
	<div id="show-data">&nbsp;</div>
	<form name="form-sub-file" method="post" action="php-script/add.php" enctype="multipart/form-data">
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td>ไฟล์ (.xlsx)</td>
				<td><input type="file" id="sub-file-xlsx" name="sub-file-xlsx"/></td>
			</tr>
			<tr>
				<td id="td-sub" colspan="2"></td>
			</tr>
		</table>
		<input type="hidden" name="is_ajax" value="9" />
	</form>
</div>
<div id="dialog-pre-file" style="display:none;">
	<form name="form-pre-file" method="post" action="php-script/add.php" enctype="multipart/form-data">
	<span id="gt"></span>
		<table style="border-collapse:collapse;vertical-align: middle;">
			<tr>
				<td>ไฟล์ (.xlsx)</td>
				<td><input type="file" id="pre-file" name="pre-file"/></td>
			</tr>
			<tr>
				<td id="td-pre" colspan="2"></td>
			</tr>
		</table>
		<input type="hidden" name="is_ajax" value="12" />
	</form>
</div>

<div id="dialog-edu" style="display:none;">
<div id="class-center">
	<label>ชั้นปี</label>
<select style="padding:2px;" name="class">
	<option value="1"  selected>1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select>
</div>
<br/>
<table id="edu_" style="float:left;" cellpadding="5">
	<thead>
		<tr>
			<th>
				ภาคต้น
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td valign="top">
				<table id="not_1">
					<tr class="0">
						<td style=" width: 26%;">
							<input type="text" style="width: 90%;" onClick="javaScript:fnc_autocomplite(this,'0')" name="subid[0]" style="margin:0;padding:0;" data-name="sem1" placeholder="รหัสวิชา"/>
						</td>
						<td >
							<input type="text" style="width: 95%;" name="subname[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาไทย" disabled/>
						</td>
						<td style="width:18%;">
							<input type="text" style="width: 95%;" name="credit[0]"style="margin:0;padding:0;" placeholder="หน่วยกิต"/>
						</td>
						<td style="width: 1%;" align="center">
							<a href="JavaScript:void(0)" data-name="sem1" onClick="fnc_more(this,'0')" style="display:block;margin:auto;text-align:center;width:30px;"><i class="icon-search"></i></a>
						</td>
					</tr>
					<tr class="0">
						<td>&nbsp;</td>
						<td colspan="3">
							<input type="text" style="width: 98%;" name="sub-en[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาอังกฤษ" disabled/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<td align="right">รวม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="sum-credit">0</label> &nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยกิต&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tfoot>
</table>
<table id="edu_2" cellpadding="5">
	<thead>
		<tr>
			<th>
				ภาคปลาย
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td valign="top">
				<table id="not_2">
					<tr class="0">
						<td style=" width: 26%;">
							<input type="text" style="width: 90%;" onClick="javaScript:fnc_autocomplite(this,'0')" name="subid[0]" style="margin:0;padding:0;" data-name="sem2" placeholder="รหัสวิชา"/>
						</td>
						<td >
							<input type="text" style="width: 95%;" name="subname[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาไทย" disabled/>
						</td>
						<td style="width:18%;">
							<input type="text" style="width: 95%;" name="credit[0]"style="margin:0;padding:0;" placeholder="หน่วยกิต"/>
						</td>
						<td style="width: 1%;" align="center">
							<a href="JavaScript:void(0)" data-name="sem2" onClick="fnc_more(this, '0')" style="display:block;margin:auto;text-align:center;width:30px;"><i class="icon-search"></i></a>
						</td>
					</tr>
					<tr class="0">
						<td>&nbsp;</td>
						<td colspan="3">
							<input type="text" style="width: 98%;" name="sub-en[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาอังกฤษ" disabled/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<td align="right">รวม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="sum-credit2">0</label> &nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยกิต&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tfoot>
</table>
<div style="clear:both;float:left;">
<i id="add" class="icon-plus" data-name="1" title="ปุ่มเพิ่มรายวิชา"></i>
<i id="remove" class="icon-minus" data-name="1" title="ปุ่มลดรายวิชา"></i>
</div>
<div style="float:right;">
<i id="add2" class="icon-plus" data-name="2" title="ปุ่มเพิ่มรายวิชา"></i>
<i id="remove2" class="icon-minus" data-name="2" title="ปุ่มลดรายวิชา"></i>
</div>
<br style="clear:both;"/><br/>
*หมายเหตุ : กรณีที่ไม่มีรายวิชาในรายการให้เลือก สามารถทำการค้นหารายวิชาได้ด้วยการคลิกปุ่มค้นหา
</div>
<style>
	i#add,
	i#remove,
	i#add2,
	i#remove2{
		opacity: .40;
		-moz-opacity:.40;
		filter:alphar(opacity=40);
		-khtml-opacity: .40;
		cursor:pointer;
	}
	i#add:hover,
	i#remove:hover,
	i#add2:hover,
	i#remove2:hover{
		opacity: 1;
		-moz-opacity:1;
		filter:alphar(opacity=100);
		-khtml-opacity: 1;
	}
</style>
<div id="dialog-message" style="display:none"></div>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<script type="text/javascript" src="Scripts/jquery.maskedinput.js"></script>

<script>
$.widget( "custom.catcomplete", $.ui.autocomplete, {
	_renderMenu: function( ul, items ) {
		var that = this,
			currentCategory = "";
		$.each( items, function( index, item ) {
			if ( item.category != currentCategory ) {
				ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
				currentCategory = item.category;
			}
			that._renderItemData( ul, item );
		});
	}
});
</script>
<script type="text/javascript">
var $mess = $( "#dialog-message" );
$(function($){
	$('#a-edu').click(function(){ // education
		
		var $year = (new Date).getFullYear()+543;
		$('#edu-year').text($year);
		var $arr = new Array();
		$arr[0] = $year;
		$arr[1] = $('select[name="class-edu"] :selected').val();
		$arr[2] = $('select[name="semester-edu"] :selected').val();
		$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
		$('#edu-back').click(function(){
			return $year = $year -1;
		});
		$('#edu-next').click(function(){
			return $year = $year+1;
		});
		
		$('#edu-edit-back').click(function(){
			$('#edu-edit-year').text(Number($('#edu-edit-year').text()) -1)
		});
		$('#edu-edit-next').click(function(){
			$('#edu-edit-year').text(Number($('#edu-edit-year').text()) +1)
		});

		$('#edu-back, #edu-next').click(function(e){
			$('#edu-year').text(e.result);
			$arr[0] = e.result;
			$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
		});
		
		$('select[name="class-edu"]').change(function(){
			$arr[1] = $(this).val();
			$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
		});

		$('select[name="semester-edu"]').change(function(){
			$arr[2] = $(this).val();
			$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
		});
		
	});
	var count = $('table#not_1 tr').size()-2;
	var count2 = $('#not_2 tr').size()-2;
	$('#not_1 input[name="subid[0]"], #not_2 input[name="subid[0]"]').bind('keypress', function(e) {
		return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
	});
	$('table#not_1 input[name="credit[0]"]').mask("9(9-9-9)");
	$('table#not_2 input[name="credit[0]"]').mask("9(9-9-9)");
	$('#education').click(function(){
		$('.ui-autocomplete').css({"max-width":"140px","max-height":"200px","overflow-y":"hidden","overflow-x":"hidden"});
		$('* html .ui-autocomplete').css({"width":"140px","height":"200px"});
		$("#dialog-edu").dialog({
			autoOpen: false,
			height: 650,
			width: '90%',
			modal: true,
			position: ['top',5],
			title: 'เพิ่มแผนการศึกษา',
			buttons: {
				"เพิ่มแผนการศึกษา" : function(){
					var subid = [],
						 subname = [],
						 subnameen = [],
						 credit =[],
						 $class = $('select[name="class"] :selected').val(),
						 semester = 1;
					if($class == ""){
						$mess.text('กรุณาเลือกชั้นเรียนด้วยครับ!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}
					$('table#not_1 input[name^="subid"]').each(function(i){
						subid.push($( this ).attr("name","subid["+i+"]").val());
					});
					
					$('table#not_1 input[name^="subname"]').each(function(i){
						subname.push($( this ).attr("name","subname["+i+"]").val());
					});
					$('table#not_1 input[name^="sub-en"]').each(function(i){
						subnameen.push($( this ).attr("name","sub-en["+i+"]").val());
					});
					
					$('table#not_1 input[name^="credit"]').each(function(i){
						credit.push($( this ).attr("name","credit["+i+"]").val());
					});
					var subid2 = [],
						 subname2 = [],
						 subnameen2 = [],
						 credit2 =[],
						 semester2 = 2;

					$('#not_2 input[name^="subid"]').each(function(i){
						subid2.push($( this ).attr("name","subid["+i+"]").val());
					});
					
					$('#not_2 input[name^="subname"]').each(function(i){
						subname2.push($( this ).attr("name","subname["+i+"]").val());
					});
					$('#not_2 input[name^="sub-en"]').each(function(i){
						subnameen2.push($( this ).attr("name","sub-en["+i+"]").val());
					});
					
					$('#not_2 input[name^="credit"]').each(function(i){
						credit2.push($( this ).attr("name","credit["+i+"]").val());
					});
					for(i=0,count=subid.length;i<count;i++){
						if(subid[i] == '' || subname[i]=='' ||  subnameen[i]=='' || credit[i]==''){
							$mess.text("มีค่าว่างลำดับที่ "+(i+1)+" ของเทอม 1");
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
							return false;
						}
					}

					for(j=0,count2=subid2.length;j<count;j++){
						if(subid2[j] == '' || subname2[j]=='' ||  subnameen2[j]=='' || credit2[j]==''){
							$mess.text("มีค่าว่างลำดับที่ "+(j+1)+" ของเทอม 2");
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
							return false;
						}
					}
					var obj_new = {
						semester_1: {
							subid: subid,
							subname: subname,
							subnameen: subnameen,
							credit: credit,
							$class: $class,
							semester: semester
						},
						semester_2: {
							subid: subid2,
							subname: subname2,
							subnameen: subnameen2,
							credit: credit2,
							$class: $class,
							semester: semester2
						},
						is_ajax: 18	
					};
					$.post('php-script/add.php', obj_new, function(source){
						var checked = source.split("\n");
						if(checked[0] == "1"){
							alert(checked[1]);
						}else{
							var $year = (new Date).getFullYear()+543;
							var $arr = new Array();
							$arr[0] = $year;
							$arr[1] = $('select[name="class-edu"] :selected').val();
							$arr[2] = $('select[name="semester-edu"] :selected').val();
							$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
							$('#dialog-edu').dialog('close');
						}
					});
				},
				Cancel: function(){
					$(this).dialog('close');
				}
			},
			close: function(){
				html = '<tr class="0">'+
							'<td style=" width: 26%;">'+
								'<input type="text" style="width: 90%;" onClick="javaScript:fnc_autocomplite(this,\'0\')" name="subid[0]" style="margin:0;padding:0;" data-name=\"sem1\" placeholder="รหัสวิชา"/>'+
							'</td>'+
							'<td >'+
								'<input type="text" style="width: 95%;" name="subname[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาไทย" disabled/>'+
							'</td>'+
							'<td style="width:18%;">'+
								'<input type="text" style="width: 95%;" name="credit[0]"style="margin:0;padding:0;" placeholder="หน่วยกิต"/>'+
							'</td>'+
							'<td style="width: 1%;" align="center">'+
								'<a href="JavaScript:void(0)" data-name="sem1" onClick="fnc_more(this,\'0\')" style="display:block;margin:auto;text-align:center;width:30px;"><i class="icon-search"></i></a>'+
							'</td>'+
						'</tr>'+
						'<tr class="0">'+
							'<td>&nbsp;</td>'+
							'<td colspan="3">'+
								'<input type="text" style="width: 98%;" name="sub-en[0]" style="margin:0;padding:0;"placeholder="ชื่อวิชาภาษาอังกฤษ" disabled/>'+
							'</td>'+
						'</tr>';
						html2 = '<tr class="0">'+
							'<td style=" width: 26%;">'+
								'<input type="text" style="width: 90%;" onClick="javaScript:fnc_autocomplite(this,\'0\')" name="subid[0]" style="margin:0;padding:0;" data-name="sem2" placeholder="รหัสวิชา"/>'+
							'</td>'+
							'<td >'+
								'<input type="text" style="width: 95%;" name="subname[0]" style="margin:0;padding:0;"placeholder="ชื่อวิชาภาษาไทย" disabled/>'+
							'</td>'+
							'<td style="width:18%;">'+
								'<input type="text" style="width: 95%;" name="credit[0]"style="margin:0;padding:0;" placeholder="หน่วยกิต"/>'+
							'</td>'+
							'<td style="width: 1%;" align="center">'+
								'<a href="JavaScript:void(0)" data-name="sem2" onClick="fnc_more(this,\'0\')" style="display:block;margin:auto;text-align:center;width:30px;"><i class="icon-search"></i></a>'+
							'</td>'+
						'</tr>'+
						'<tr class="0">'+
							'<td>&nbsp;</td>'+
							'<td colspan="3">'+
								'<input type="text" style="width: 98%;" name="sub-en[0]" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาอังกฤษ" disabled/>'+
							'</td>'+
						'</tr>';

				$('table#not_1').html(html);
				$('#not_2').html(html2);
				$('#edu_').css("height","auto");
				$('#edu_2').css("height","auto");
					count = 0;
					count2 = 0;
					$('#sum-credit').text('0');
					$('#sum-credit2').text('0');
			},open:function(){
				$('#not_1 input[name="subid[0]"], #not_2 input[name="subid[0]"]').bind('keypress', function(e) {
					return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
				});
				$('table#not_1 input[name="credit[0]"]').mask("9(9-9-9)");
				$('table#not_2 input[name="credit[0]"]').mask("9(9-9-9)");
			}
		});

		$("#dialog-edu").dialog( 'open' );
	});
	$('i#add, i#add2').click(function(e){
		var data = $(this).data();
			if(data.name == 1){
				count++;
				html = "<tr class=\""+count+"\"><td style=\" width: 26%;\"><input type=\"text\" style=\"width:90%;\" onClick=\"javaScript:fnc_autocomplite(this,'"+count+"')\" name=\"subid["+count+"]\" data-name=\"sem1\" placeholder=\"รหัสวิชา\"/></td>"+
				"<td ><input type=\"text\" style=\"width:95%;\" name=\"subname["+count+"]\" placeholder=\"ชื่อวิชาภาษาไทย\" disabled/></td>"+
				"<td style=\"width:18%;\"><input type=\"text\" style=\"width:95%;\" name=\"credit["+count+"]\" placeholder=\"หน่วยกิต\"/></td>"+
				"<td style=\"width: 1%;\"><a href=\"JavaScript:void(0)\" data-name=\"sem1\" onClick=\"fnc_more(this,'"+count+"')\" style=\"display:block;margin:auto;text-align:center;width:30px;\"><i class=\"icon-search\"></i></a></td></tr>"+
				"<tr class=\""+count+"\"><td>&nbsp;</td>"+
				"<td colspan=\"3\"><input type=\"text\" style=\"width:98%;\" name=\"sub-en["+count+"]\" placeholder=\"ชื่อวิชาภาษาอังกฤษ\" disabled/></td></tr>";
	
			$('table#not_1').append(html);
			$('#not_1 input[name="subid['+count+']"]').bind('keypress', function(e) {
		return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
	});
	$('table#not_1 input[name="credit['+count+']"]').mask("9(9-9-9)");
				var h1 = $('#edu_').height(),
					 h2 = $('#edu_2').height();

				if(h1 > h2 ){
					$('#edu_2').css("height",h1);
				}
				if(h1 > 650){
					$("#dialog-edu").css("overflow","auto");
				}
			}else if(data.name == 2){
				count2++;
				html = "<tr class=\""+count2+"\"><td style=\" width: 26%;\"><input type=\"text\" style=\"width:90%;\" onClick=\"javaScript:fnc_autocomplite(this,'"+count2+"')\" name=\"subid["+count2+"]\" data-name=\"sem2\" placeholder=\"รหัสวิชา\"/></td>"+
				"<td ><input type=\"text\" style=\"width:95%;\" name=\"subname["+count2+"]\" placeholder=\"ชื่อวิชาภาษาไทย\" disabled/></td>"+
				"<td style=\"width:18%;\"><input type=\"text\" style=\"width:95%;\" name=\"credit["+count2+"]\" placeholder=\"หน่วยกิต\"/></td>"+
				"<td style=\"width: 1%;\"><a href=\"JavaScript:void(0)\" data-name=\"sem2\" onClick=\"fnc_more(this,'"+count2+"')\" style=\"display:block;margin:auto;text-align:center;width:30px;\"><i class=\"icon-search\"></i></a></td></tr>"+
				"<tr class=\""+count2+"\"><td>&nbsp;</td>"+
				"<td colspan=\"3\"><input type=\"text\" style=\"width:98%;\" name=\"sub-en["+count2+"]\" placeholder=\"ชื่อวิชาภาษาอังกฤษ\" disabled/></td></tr>";
				
				$('#not_2').append(html);
				$('#not_2 input[name="subid['+count+']"]').bind('keypress', function(e) {
					return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
				});
				$('table#not_2 input[name="credit['+count+']"]').mask("9(9-9-9)");
				var h1 = $('#edu_').height(),
					 h2 = $('#edu_2').height();

				if(h2 > h1 ){
					$('#edu_').css("height",h2);
				}
				if(h2 > 650){
					$("#dialog-edu").css("overflow","auto");
				}
			}
	});
	$('i#remove, i#remove2').click(function(){
		data = $(this).data();
		if(data.name==1){
			if(count == 0){
				alert('Not remove');
				return false;
			}
			$('table#not_1 .'+count).remove();
			count--;
			var h1 = $('table#not_1').height(),
				 h2 = $('#not_2').height();

			if(h1 > h2 ){
				//$('#edu_').css("height",$('#edu_2').height());
				$('#edu_').css("height", h1);
				$('#edu_2').css("height", $('#edu_').height());
				
			} 
			if(h1 < h2){
				$('#edu_2').css("height",$('#edu_').height());//--
				if($('#edu_').height() < $('#edu_2').height()){
					
					$('#edu_').css("height", $('#edu_2').height());//$('#edu_2').height()
				}
			}
			if(h1 == h2){
				$('#edu_2').css("height","auto");
			}
			
			
		}else if(data.name == 2){
			if(count2 == 0){
				alert('Not remove');
				return false;
			}
			$('#not_2 .'+count2).remove();
			count2--;
			$('#edu_2').css("height","auto");
			var h1 = $('table#not_1').height(),
				 h2 = $('#not_2').height();

			if(h1 > h2 ){
				$('#edu_2').css("height", $('#edu_').height());
				
			}
			if(h1 < h2 ){
				$('#edu_').css("height", $('#edu_2').height());
				if($('#edu_').height() > $('#edu_2').height()){
					$('#edu_2').css("height", $('#edu_').height());//$('#edu_2').height()
				}
			}
			if(h1 == h2){
				$('#edu_1').css("height","auto");
			}
		}
	});

	$("#select-courses-content").change(function(){
	paggeing($(this).val(), "#div-pagging-aca", '#div-aca', 1, 'data.acadyear.php');//acadyeaar
	});
	$("#select-sub-content").change(function(){
		paggeing($(this).find('option:selected').text() , "#div-pagging-sub", '#div-sub', 2,'data.subject.php');//subject
	});
	$("#select-pre-content").change(function(){
	 paggeing($(this).find('option:selected').text() , "#div-pagging-pre", '#div-pre', 3,'data.sub.pre.php');//sub pre
	});
	$('#a-aca').click(function(){
		_1();
	});
	$('#a-sub').click(function(){
		_2();
	});
	$('#a-pre').click(function(){
		_3()
	});
	
	function updateCourses(){
		_1();
		_2();
		_3();
	}
	function _1(){
		if($("#select-courses-content").find("option:eq(1)")){
			$("#select-courses-content option").remove();
		}
		getAcadyear(function(source){
			$.each(source, function(i, val){
				$("#select-courses-content").append($('<option>', {
					value: val.coursesID,
					text: val.update_
				}));
			});
			var k = $("#select-courses-content option:eq(0)");
			paggeing(k.val(), "#div-pagging-aca", '#div-aca', 1, 'data.acadyear.php');
		});
		
	}
	function _2(){
		if($("#select-sub-content").find("option:eq(1)")){
			$("#select-sub-content option").remove();
		}
		getAcadyear(function(source){
			$.each(source, function(i, val){
				$("#select-sub-content").append($('<option>', {
					value: val.coursesID,
					text: val.update_
				}));
			});
			var k = $("#select-sub-content option:eq(0)");
			paggeing(k.text(), "#div-pagging-sub", '#div-sub', 2,'data.subject.php');
		});	
	}
	function _3(){
		if($("#select-pre-content").find("option:eq(1)")){
			$("#select-pre-content option").remove();
		}
		getAcadyear(function(source){
			$.each(source, function(i, val){
				$("#select-pre-content").append($('<option>', {
					value: val.coursesID,
					text: val.update_
				}));
			});
			var k = $("#select-pre-content option:eq(0)");
			 paggeing(k.text() , "#div-pagging-pre", '#div-pre', 3,'data.sub.pre.php');//sub pre
		});	
	}
	$( "#tabs" ).tabs();
	
	$( '#div-courses' ).load( 'modules/admin/data.courses.php' );

	//dialog courses
	$("#dialog_courses").dialog({
		autoOpen: false,
		height: 'auto',
		width: 'auto',
		modal: true,
		title: 'เพิ่มหลักสูตร',
		buttons: {
			"เพิ่มหลักสูตร" : function(){
				if($("#courses").val() == ''){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				$.ajax({
					type:'POST',
					url: 'php-script/add.php',
					data: {update: $("#courses").val(), is_ajax: 1}
				}).done(function(source){
					$("#dialog_courses").dialog('close');
					updateCourses();
					$( '#div-courses' ).load( 'modules/admin/data.courses.php' );
				});
			},
			Cancel: function(){
				$("#dialog_courses").dialog('close');
			}
		},
		close: function(){
			$("#courses").val('');
		},
		open: function(){
			//$("#courses").mask("a*-999-a999");
			$("#courses").bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
		}
	});
	// dialog acadyear
	var acadyear = $("#course-update");
	$("#dialog_aca").dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'เพิ่มปีการศึกษา',
		buttons: {
			'เพื่มปีการศึกษา': function(){
				if(acadyear.val() == "" || $("#select-update option:selected").val() == ""){
					$mess.text('กรุณากรอกข้อมูล หรือเลือกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}

				$.post("php-script/add.php", {acadyear: acadyear.val(), update: $("#select-update option:selected").val(),  is_ajax: 2}, function(source){
					var ck = source.split("\n");
					if(ck[0] == 1){
						alert(ck[1]);
					}else{
						_1();
						$("#dialog_aca").dialog("close");
					}
				});
				return false;
			},'ยกเลิก': function(){
				$("#dialog_aca").dialog("close");
			}
		},
		open: function(){
			acadyear.bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
			getAcadyear(function(source){
				$.each(source, function(i, val){
					$("#select-update").append($('<option>', {
						value: val.coursesID,
						text: val.update_
					}));
				});
			});	
		},
		close: function(){
			$("#select-update option").not("option:eq(0)").remove();
			acadyear.val('');
		}
	});
	
	// dialog subject
	var code = $('#subID'),
		name = $('#subName'),
		nameEN = $('#subNameEN'),
		explan = $('#explan'),
		explanEN = $('#explanEN'),
		degree = $('#degree');
		all_sub = $([]).add(code).add(name).add(nameEN).add(explan).add(explanEN).add(degree);
	$("#dialog_sub").dialog({
		autoOpen: false,
		width: 600,
		height: 'auto',
		modal: true,
		title: 'เพิ่มรายวิชา',
		buttons: {
			'เพิ่มรายวิชา': function(){
				if(code.val() == '' || name.val() == '' || nameEN.val() == '' || explan.val() == '' || explanEN.val() == '' || degree.val() == '' ){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}else if($('#select-sub-category option:selected').val() == '' || $('#select-sub-group option:selected').val() == '' || $('#select-sub-courses option:selected').val() == ''){
					$mess.text('กรุณาเลือกข้อมูลด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				var obj = {
						code: code.val(),
						name: name.val(),
						nameEN: nameEN.val(),
						explan: explan.val(),
						explanEN: explanEN.val(),
						degree: degree.val(),
						category: $('#select-sub-category option:selected').val(),
						group: $('#select-sub-group option:selected').val(),
						courses: $('#select-sub-courses option:selected').text(),
						is_ajax: 3
					};
					$.post("php-script/add.php", obj, function(source){
						var ck = source.split("\n");
						if(ck[0] == 1){
							$mess.text(ck[1]);
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
						}else{
							_2();
							$("#dialog_sub").dialog('close');
						}

					});
			},
			'ยกเลิก': function(){
				$("#dialog_sub").dialog('close');
			}
		},
		open: function(){
			getAcadyear(function(source){
				$.each(source, function(i, val){
					$("#select-sub-courses").append($('<option>', {
						value: val.coursesID,
						text: val.update_
					}));
				});
			});
			code.mask("9999999");
			degree.mask("9(9-9-9)");
			$('#subNameEN,#explanEN').bind('keypress input paste', function(e) {
				return ( e.which!=40 && e.which!=41 && e.which!=44 && e.which!=58 && e.which!=45 && e.which!=39 && e.which!=46 && e.which!=47 && e.which!=61 && (e.which<65 || e.which>122)) ? false : true ;
			});

			
		/*	$('#subName, #explan').bind('keypress input',function(e){
				if($(this).val().match(/^([a-zA-Z\(\)]+)$/i)){
					$(this).val('');
					return false;
				}else{
					
					return true;
				}
				
			});*/

			$('#subName, #explan').bind('keypress input',function(e){
				var i = 0;
				for( ;i<=$(this).val().length;i++){
					//alert($(this).val().charAt(i));
				if(($(this).val().charAt(i).match(/^([a-zA-Z\(\)])/))){
					$(this).val($(this).val().substr(0,$(this).val().length-1));
					return false;
				}
				}

			});
		},
		close: function(){
			all_sub.val('');
			$("#select-sub-courses option").not("option:eq(0)").remove();
			$('#select-sub-category option:eq(0)').prop('selected', true);
		}
	});
	var subcode_pre = $('#subcode-pre'),
		all_pre = $([]).add(subcode_pre);
	$('#dialog-prerequisite').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'เพิ่มเงื่อนไขรายววิชา',
		buttons: {
			'เพิ่มเงื่อนไขรายวิชา' : function(){
				var subpre = [];
				$('input[id^="osubpre"]').each(function(i){
					subpre.push($(this).val());
				})
				if(subcode_pre.val() == ''){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				$.each(subpre, function(i, hh){
					if(hh == ''){
						$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}
				});
				if($("#select-update-pre option:selected").val() == ''){
					$mess.text('กรุณาเลือกหลักสูตรด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}

				$.post('php-script/add.php',{subcode: subcode_pre.val(), subpre: subpre, courses: $("#select-update-pre option:selected").text(), is_ajax: 4}, function(source){
					alert(source);
					var ck = source.split("\n");
						if(ck[0] == 1){
							$mess.text(ck[1]);
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
						}else{
							_3();
							$("#dialog-prerequisite").dialog('close');
						}
				});
			},'ยกเลิก' : function(){
				$('#dialog-prerequisite').dialog('close');
			}
		},
		open: function(){
			$("#subcode-pre, #osubpre1").bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
			getSubcode(function(source){
				$('.catcom').catcomplete({
					delay: 0,
					source: source
				});
			});
			getAcadyear(function(source){
				$.each(source, function(i, val){
					$('#select-update-pre').append($('<option>', {
						value: val.coursesID,
						text: val.update_
					}));
				});
			});	
		},
		close: function(){
			for(i=$('#tbt tr').size();i>1;i--){
				$('#dt'+i).remove();
			}
			$('#osubpre1').val('');
			$('#select-update-pre option').not('option:eq(0)').remove();
			all_pre.val('');
		}
	});
	
	$('#dialog-pre-search').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'แก้ไขเงื่อนไขรายววิชา',
		buttons: {
			'แก้ไขเงื่อนไขรายวิชา' : function(){
				var subpres = [],
					preID = [];
				$('input[id^="osubpres"]').each(function(i){
					subpres.push($(this).val());
					var data = $(this).data();
					preID.push(data.id);
				})
				if($('#subcode-pres').val() == ''){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				$.each(subpres, function(i, val){
					if(val == ''){
						$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}
				});
				if($("#select-update-pres option:selected").val() == ''){
					$mess.text('กรุณาเลือกหลักสูตรด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}

				$.post('php-script/edit.php',{preID: preID,subcode: $('#subcode-pres').val(), subpre: subpres, courses: $("#select-update-pres option:selected").text(), is_ajax: 15}, function(source){
					var ck = source.split("\n");
						if(ck[0] == 1){
							$mess.text(ck[1]);
							$mess.dialog({
								modal: false,
								title: 'Error Message!',
								buttons: {
									Ok: function() {
										$( this ).dialog( "close" );
									}
								}
							});
						}else{
							_3();
							$("#dialog-pre-search").dialog('close');
						}
				});
			},'ยกเลิก' : function(){
				$('#dialog-pre-search').dialog('close');
			}
		},
		open: function(){
			$('#subcode-pres').bind('keypress', function(e) {
					return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
				});	
			for(i=1;i<=$('input[id^="osubpres"]').size();i++){
				$("#osubpres"+i).bind('keypress', function(e) {
					return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
				});	
			}
				
			getSubcode(function(source){
				$('.catcom').catcomplete({
					delay: 0,
					source: source
				});
			});
			
		},
		close: function(){
			for(i=$('#tbts tr').size();i>0;i--){
				$('#dts'+i).remove();
			}
			$('#select-update-pres option').not('option:eq(0)').remove();
			
		}
	});

	$('#dialog-sub-file').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'เพิ่มข้อมูลรายวิชา',
		modal: true,
		buttons: {
			'เพิ่มข้อมูล': function(){

				$('form[name="form-sub-file"]').ajaxForm({
					//target: '#show-data',
					success: function(source){
						//$('#show-data').html(source);
						var ch = source.split("\n");
						if(ch['0'] == 1){
							$('#td-sub').html("<label style=\"color:red;\">* "+ch['1']+"</label>");
						}else {
							_2();
							$( '#dialog-sub-file' ).dialog( 'close' );
							
						}
					},beforeSerialize:function(){
						$('#td-sub').html('<img src="images/GsNJNwuI-UM.gif"/>');
					}
				}).submit();
			},
			'ยกเลิก': function(){
				$(this).dialog( 'close' );
				
			}
		},close: function(){
			$('#td-sub').html('');
			$( '#dialog-sub-file' ).clearForm();
		}
	});
	
	$('#dialog-pre-file').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		title: 'เพิ่มข้อมูลเงื่อนไขรายวิชา',
		modal: true,
		buttons: {
			'เพิ่มข้อมูล': function(){
				$('form[name="form-pre-file"]').ajaxForm({
					//target: '#show-data',
					success: function(source){
						//alert(source);
						//$('#gt').html(source);
						var ch = source.split("\n");
						if(ch['0'] == 1){
							$('#td-pre').html("<label style=\"color:red;\">* "+ch['1']+"</label>");
						}else {
							_3();
							$( '#dialog-pre-file' ).dialog( 'close' );
							
						}
					},beforeSerialize:function(){
						$('#td-pre').html('<img src="images/GsNJNwuI-UM.gif"/>');
					}
				}).submit();
			},
			'ยกเลิก': function(){
				$(this).dialog( 'close' );
			}
		},close: function(){
			$('#td-pre').html('');
			$( '#dialog-pre-file' ).clearForm();
		}
	});
	//even click 
	$("#btn_addcourse").click(function(){
		$("#dialog_courses").dialog("open");
		return false;
	});
	$("#btn_aca").click(function(){
		$("#dialog_aca").dialog("open");
		return false;
	});

	$("#btn_sub").click(function(){
		$("#dialog_sub").dialog("open");
		return false;
	});
	$("#btn_pre").click(function(){
		$('#dialog-prerequisite').dialog( 'open' );
		return false;
	});
	$('#sub-file').click(function(){
		$('#dialog-sub-file').dialog( 'open' );
	});
	$('#pre-file').click(function(){
		$('#dialog-pre-file').dialog( 'open' );
	});
	/*var data = [
			{ label: "anders", category: "" },
			{ label: "andreas", category: "" },
			{ label: "antal", category: "" },
			{ label: "annhhx10", category: "Products" },
			{ label: "annk K12", category: "Products" },
			{ label: "annttop C13", category: "Products" },
			{ label: "anders andersson", category: "People" },
			{ label: "andreas andersson", category: "People" },
			{ label: "andreas johnson", category: "People" }
		];
*/
		
//--------------------------------------------------edit --------------------------------------------------//
	$('#dialog-courses-edit').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลหลักสูตร',
		buttons: {
			'แก้ไข': function(){
				if($("#courses-edit").val() == ''){
					$mess.text('กรุณากรอกข้อมูลด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				$.post('php-script/edit.php',{id: $('#courses-hidden').val(), update: $('#courses-edit').val(),is_ajax: 3}, function(source){
					var ck = source.split('\n');
					if(ck[0] == 1){
						alert(ck[1]);
					}else {
						$('#dialog-courses-edit').dialog( 'close' );
					}
				});
			},
			'ยกเลิก': function(){
				$('#dialog-courses-edit').dialog( 'close' );
			}
		},open: function(){
			$("#courses-edit").bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
		}
	});
	$('#dialog-aca-edit').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลปีการศึกษา',
		buttons: {
			'แก้ไข': function(){
				if($('#aca-edit').val() == '' || $('#select-aca-courses-update option:selected').val() == ''){
					$mess.text('กรุณากรอกข้อมูลหรือเลือกข้อมูลด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				var obj = {
					id: $('#acaID').val(),
					aca: $('#aca-edit').val(),
					courses: $('#select-aca-courses-update option:selected').val(),
					is_ajax: 6
				}
				$.post('php-script/edit.php', obj, function(source){
					var ck = source.split('\n');
					if(ck[0] == 1){
						$mess.text(ck[1]);
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
					}else {
						$( '#dialog-aca-edit' ).dialog( 'close' );
						var k = $("#select-courses-content option:selected"),
						c=$("#div-pagging-aca").pagination('getCurrentPage');
						paggeing2(k.val(), "#div-pagging-aca", '#div-aca', 1, 'data.acadyear.php',c);
					}
				});
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		close: function(){
			$('#select-aca-courses-update option').not('option:eq(0)').remove();
		},open: function(){
			$("#aca-edit").bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
		}
	});

	$('#dialog-sub-edit').dialog({
		autoOpen: false,
		width: 500,
		height: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลรายวิชา',
		buttons: {
			'แก้ไข': function(){
				if($('#subcode-edit').val() == '' || $('#subName-edit').val() == '' || $('#subNameEN-edit').val() == '' || $('#explan-edit').val() == '' || $('#explanEN-edit').val() == '' || $('#degree-edit').val() == '' ){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}else if($('#sub-category-edit option:selected').val() == '' || $('#sub-group-edit option:selected').val() == '' || $('#sub-courses-edit option:selected').text() == ''){
					$mess.text('กรุณาเลือกข้อมูลด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				var obj = {
					id: $('#subID-edit').val(),
					code: $('#subcode-edit').val(),
					name: $('#subName-edit').val(),
					nameEN: $('#subNameEN-edit').val(),
					explan: $('#explan-edit').val(),
					explanEN: $('#explanEN-edit').val(),
					degree: $('#degree-edit').val(),
					category: $('#sub-category-edit option:selected').val(),
					group: $('#sub-group-edit option:selected').val(),
					courses: $('#sub-courses-edit option:selected').text(),
					is_ajax: 7
				}
				$.post('php-script/edit.php', obj, function(source){
					var ck = source.split('\n');
					if(ck[0] == 1){
						alert(ck[1]);
					}else {
						$( '#dialog-sub-edit' ).dialog( 'close' );
						var courses = $("#select-sub-content option:selected"),
						c=$("#div-pagging-sub").pagination('getCurrentPage');
						paggeing2(courses.text(), "#div-pagging-sub", '#div-sub', 2,'data.subject.php',c);
					}
				});
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		close: function(){
			$('#sub-courses-edit option').not('option:eq(0)').remove();
		},open: function(){
			$('#subcode-edit').mask("9999999");
			$('#degree-edit').mask("9(9-9-9)");
			$('#subNameEN-edit,#explanEN-edit').bind('keypress', function(e) {
				return ( e.which!=40 && e.which!=41 && e.which!=44 && e.which!=58 && e.which!=45 && e.which!=39 && e.which!=46 && e.which!=47 && e.which!=61 && (e.which<65 || e.which>122)) ? false : true ;
			});
			
			$('#subName-edit, #explan-edit').bind('keypress input',function(e){
				var i = 0;
				for( ;i<=$(this).val().length;i++){
					//alert($(this).val().charAt(i));
				if(($(this).val().charAt(i).match(/^([a-zA-Z\(\)])/))){
					$(this).val($(this).val().substr(0,$(this).val().length-1));
					return false;
				}
				}

			});
		}
	});
	$('#dialog-prerequisite-edit').dialog({
		autoOpen: false,
		width: 'auto',
		height: 'auto',
		modal: true,
		title: 'แก้ไขข้อมูลเงื่อนไขรายวิชา',
		buttons: {
			'แก้ไข': function(){
				if($('#subcode-pre-edit').val() == '' || $('#subpre-edit').val() ==''){
					$mess.text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}else if($('#select-courses-pre-edit option:selected').text() == ''){
					$mess.text('กรุณาเลือกหลักสูตรด้วยครับ!');
					$mess.dialog({
						modal: false,
						title: 'Error Message!',
						buttons: {
							Ok: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				}
				var obj = {
					id: $('#preID').val(),
					code: $('#subcode-pre-edit').val(),
					pre: $('#subpre-edit').val(),
					courses: $('#select-courses-pre-edit option:selected').text(),
					is_ajax: 8
				}
				$.post('php-script/edit.php', obj, function(source){
					var ck = source.split('\n');
					if(ck[0] == 1){
						alert(ck[1]);
					}else {
						$( '#dialog-prerequisite-edit' ).dialog( 'close' );
						var k = $("#select-pre-content option:selected"),
						c=$("#div-pagging-pre").pagination('getCurrentPage');
						paggeing2(k.text(), "#div-pagging-pre", '#div-pre', 3,'data.sub.pre.php',c);
					}
				});
			},
			'ยกเลิก': function(){
				$( this ).dialog( 'close' );
			}
		},
		close: function(){
			$('#select-courses-pre-edit option').not('option:eq(0)').remove();
		},open: function(){
			$("#subcode-pre-edit, #subpre-edit").bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
			getSubcode(function(source){
				$('#subcode-pre-edit, #subpre-edit').catcomplete({
					delay: 0,
					source: source
				});
			});
		}
	});
	$('#btn-search-detail').click(function(){

		var key = $('#search-detail').val();
		if(key == ''){
			$mess.text('กรุณากรอกข้อมูลค้นหาด้วยครับ!');
			$mess.dialog({
				modal: false,
				title: 'Error Message!',
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
			return false;
		}
		var type = $('#select-search-detail option:selected').val();
		if(type == 1){
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{list: 'coursesID', tb: 'courses', field: 'update_',key: key, is_ajax: 29},
				success: function( source ){
					if( source == 0){
						$mess.text('ไม่พบข้อมูลหลักสูตร!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						edit(source , 1); //courses
					}
				}
			});
		}else if(type == 2){
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{list: 'acadyearID',tb: 'acadyear', field: 'year', key: key, is_ajax: 29},
				success: function( source ){
					if( source == 0){
						$mess.text('ไม่พบข้อมูลปีการศึกษา!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						edit(source , 2); //courses
					}
				}
			});
		}else if(type == 3){
			var ts = null;
			if($('#ts2 option:selected').val() == 1){
				ts = "subCode";
			}else{
				ts = "subName";
			}
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{list: 'subID',tb: 'subject', field: ts, key: key, is_ajax: 30},
				success: function( source ){
					if( source == 0){
						$mess.text('ไม่พบรายวิชาในหลักสูตร ปัจจุบัน!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						edit(source , 3); //subject
					}
				}
			});
		}else if(type == 4){
		
			$.ajax({
				type: 'POST',
				url: 'php-script/pull.data.php',
				data:{tb: 'prerequisite', field: 'subID', key: key, is_ajax: 31},
				dataType: 'json',
				success: function( source ){
					if( source == 0){
						$mess.text('ไม่พบข้อมูลเงื่อนไขรายวิชา!');
						$mess.dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						return false;
					}else{
						$('#subcode-pres').val(key)
						$.each(source, function(i, val){
							i = i+1;
							html = "<tr id=\"dts"+i+"\"><td><input data-id=\""+val['preID']+"\" type=\"text\" id=\"osubpres"+i+"\" value=\""+val['subPre']+"\" style=\"width:230px;height:30px;\" class=\"catcom\"/></td></tr>";
							$('#tbts').append(html);
						});
						
						getAcadyear(function( response ){
							$.each(response, function(i, val){
								$('#select-update-pres').append($('<option>', {
									value: val.coursesID,
									text: val.update_
								}));
							});
							$('#select-update-pres option').each(function(){
								if($(this).text() == source['0']['courses']){
									$(this).prop('selected', 'true');
								}
							});
						});	
						$('#dialog-pre-search').dialog( 'open' );
					}
				}
			});
		}
	})
	$('#select-search-detail').change(function(){
		if($(this).find('option:selected').val() == 3){
			var html = '<select id="ts2"><option selected value="1">รหัสวิชา</option><option value="2">ชื่อวิชา</option></select>';
			$(this).before('<div id="ts" style="display:inline-block;"></div>');
			$('#ts').html(html);
		}else{
			$('#ts').remove();
		}
	});
	function getSubcode(handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data: {is_ajax: 3},
			success: function(source){
				var countriesArray;
				countriesArray = $.map(source, function (val, i) {return { value: val.subCode, label: val.subCode+" "+val.subName, category: val.name };});
				handleData(countriesArray)
			}
		});
	}
	function getStatus(handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json;charset=utf-8',
			dataType: 'json',
			data: {is_ajax: 4}
		}).done(function(source){
			handleData(source)
		});
	}
	function get_num_rows(db, where, handleData){
		$.post('php-script/pull.data.php', {where: where, is_ajax: 5, db: db}, function(source){
			handleData(source);
		});
	}
	function paggeing(courses, page, content, row, url){
		get_num_rows(row, courses, function(source){//acadyear1
			var limit = 12;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				onPageClick: function(p, e){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&str='+courses,
						success: function(response){
							$(content).html(response);
						}
					});	
				},
				onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&str='+courses,
						success: function(response){
							$(content).html(response);
						}
					}); 
				}
			});
		});
	}
	function paggeing2(courses, page, content, row, url, c){
		get_num_rows(row, courses, function(source){//acadyear1
			var limit = 12;
			$(page).pagination({
				items: source,
				itemsOnPage: limit,
				cssStyle: 'light-theme',
				currentPage: c,
				onPageClick: function(p, e){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(p-1)+'&limit='+limit+'&str='+courses,
						success: function(response){
							$(content).html(response);
						}
					});	
				},
				onInit: function(){
					 $.ajax({
						type: 'GET',
						url: 'modules/admin/'+url+'?start='+limit*(c-1)+'&limit='+limit+'&str='+courses,
						success: function(response){
							$(content).html(response);
						}
					}); 
				}
			});
		});
	}
	$('#add-pre').click(function(){
		
		var i = $('#tbt tr').size()+1,
			html = "<tr id=\"dt"+i+"\"><td><input type=\"text\" id=\"osubpre"+i+"\" style=\"width:230px;height:30px;\" class=\"catcom\"/></td></tr>";
		$('#tbt').append(html);
		getSubcode(function(source){
				$('.catcom').catcomplete({
					delay: 0,
					source: source
				});
			});

			$("#osubpre"+i).bind('keypress', function(e) {
				return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
			});
	});
	$('#del-pre').click(function(){
		var i = $('#tbt tr').size();
		$('#dt'+i).remove();
		
		if(i == 1){
			$mess.text('ลบไม่ได้ ห้ามต่ำกว่า 1 !');
			$mess.dialog({
				modal: false,
				title: 'Error Message!',
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
			return false;
		}i--;
	});
	$('#dialog-eidt-edu').dialog({
			autoOpen: false,
			width: 550,
			height: 'auto',
			title: 'แก้ไขแผนการศึกษา',
			modal: true,
			buttons: {
				Save: function(){
					if($('#subid-edu-edit').val() == '' || $('#subname-edu-edit').val() == '' || $('#suben-edu-edit').val() == '' || $('#credit-edu-edit').val() == ''){
						$( "#dialog-message" ).text('กรุณากรอกข้อมูลให้ครบด้วยครับ!');
						$( "#dialog-message" ).dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						$( "#dialog-message" ).dialog( 'open' );
						return false;
					}else if($('#class-edu-edit option:selected').val() == '' || $('#semester-edu-edit option:selected').val() == ''){
						$( "#dialog-message" ).text('กรุณาเลือกข้อมูลให้ครบด้วยครับ!');
						$( "#dialog-message" ).dialog({
							modal: false,
							title: 'Error Message!',
							buttons: {
								Ok: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						$( "#dialog-message" ).dialog( 'open' );
						return false;
					}
					
					var obj = {
						id: $('#edu-id').val(),
						acadyear: $('#edu-edit-year').text(),
						$class: $('#class-edu-edit option:selected').val(),
						semester: $('#semester-edu-edit option:selected').val(),
						subid: $('#subid-edu-edit').val(),
						subname: $('#subname-edu-edit').val(),
						suben: $('#suben-edu-edit').val(),
						credit: $('#credit-edu-edit').val(),
						is_ajax: 14
					}
					$.post('php-script/edit.php', obj, function(source){
						var checked = source.split("\n");
						if(checked[0] == 1){
							alert(checked[1]);
						}else{
							$('#dialog-eidt-edu').dialog( 'close' );
							var $year = (new Date).getFullYear()+543;
							var $arr = new Array();
							$arr[0] = $year;
							$arr[1] = $('select[name="class-edu"] :selected').val();
							$arr[2] = $('select[name="semester-edu"] :selected').val();
							$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
									
						}
					});
				},
				Cancel: function(){
					$(this).dialog( 'close' );
				}
			},open: function(){
				$('#subid-edu-edit').bind('keypress', function(e) {
					return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
				});
				$('#credit-edu-edit').mask("9(9-9-9)");	
				getSubject(function(source){
					var $data = $.map(source, function(value, index){
						return [{value: value.subCode, label: value.subCode+" "+value.subName,category: value.category}];
					});
					$('#subid-edu-edit').catcomplete({
						delay: 0,
						source: $data,
						select: function(event, ul){
						$.ajax({
								type: 'POST',
								url: 'php-script/pull.data.php',
								data: {id: ul.item['value'], is_ajax: 22},
								//contentType: 'application/json; charset=utf-8',
								dataType: 'json',
								success: function(source){
									$('#subname-edu-edit').val(source['subName']);
									$('#suben-edu-edit').val(source['subNameeng']);
									$('#credit-edu-edit').val(source['credit']);
								},
								error: function(e){alert(e);}
							});
						}
					});
				});
			}
		});
})(jQuery);
function getCourses(handleData){
	handleData($('#select-sub-content option:selected').val());
}
function edit(key, table){
	if(table == 1){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data:{id: key, table: table, is_ajax: 7},
			success: function(source){
				$.each(source, function(i, val){
					$('#courses-hidden').val(val.coursesID);
					$('#courses-edit').val(val.update_);
				});
				$('#dialog-courses-edit').dialog( 'open' );
			}	
		});
	}else if(table == 2){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data:{id: key, table: table, is_ajax: 7},
			success: function(source){
				
				
				getAcadyear(function(response){
					$.each(response, function(i, val){
						$('#select-aca-courses-update').append($('<option>',{
							value: val.coursesID,
							text: val.update_
						}));
					});
					$.each(source, function(i, val){
						$('#acaID').val(val.acadyearID);
						$('#aca-edit').val(val.year);
						$('#select-aca-courses-update option').each(function(){
							if($(this).val() == val.coursesID)
								$(this).prop('selected', true);
						});
						
					});
				});

				$('#dialog-aca-edit').dialog( 'open' );
			}	
		});

	}else if(table == 3){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data: {id: key, table: table, is_ajax: 7},
			success: function(response){
				
				getAcadyear(function(source){
					$.each(source, function(i, val){
						$('#sub-courses-edit').append($('<option>',{
							value: val.coursesID,
							text: val.update_
						}));
					});
					
					$.each(response, function(i ,val){
						$('#subID-edit').val(val.subID);
						$('#subcode-edit').val(val.subCode);
						$('#subName-edit').val(val.subName);
						$('#subNameEN-edit').val(val.subNameeng);
						$('#explan-edit').val(val.explain);
						$('#explanEN-edit').val(val.explaineng);
						$('#degree-edit').val(val.credit);
						$('#sub-category-edit option').each(function(){
							if($(this).val() == val.category){
								$(this).prop('selected', true);
							}
						});
						$('#sub-group-edit option').each(function(){
							if($(this).val() == val.group_){
								$(this).prop('selected', true);
							}
						});
						$('#sub-courses-edit option').each(function(){
							if($(this).text() == val.courses){
								$(this).prop('selected', true);
							}
						});
					});
				});
				
				$('#dialog-sub-edit').dialog( 'open' );
			}
		});
	}else if(table == 4){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json;charset=utf-8',
			dataType: 'json',
			data: {id: key, table: table, is_ajax: 7},
		}).done(function(response){
			$('#preID').val(response['0']['preID']);
			$('#subcode-pre-edit').val(response['0']['subID']);
			$('#subpre-edit').val(response['0']['subPre']);
			getAcadyear(function(source){
				$.each(source, function(i,val){
					$('#select-courses-pre-edit').append($('<option>',{
						value: val.coursesID,
						text: val.update_
					}));
					$('#select-courses-pre-edit option').each(function(){
						if($(this).text() == response['0']['courses'])
							$(this).prop('selected', true);
					});
				});

			})
			$('#dialog-prerequisite-edit').dialog( 'open' );
		});
	}
}
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
function fnc_autocomplite($this,key){
	var total = 0;
		var data = [
			{ label: "1200201", category: "" },
			{ label: "0001008", category: "" },
			{ label: "0001060", category: "" },
			{ label: "0001008", category: "Products" },
			{ label: "0001008", category: "Products" },
			{ label: "0001008", category: "Products" },
			{ label: "0001008", category: "People" },
			{ label: "0001008", category: "People" },
			{ label: "0001008", category: "People" }
		];
		getSubject(function(source){
			var $data = $.map(source, function(value, index){
				return [{value: value.subCode,label: value.subCode+" "+value.subName,category: value.category}];
			});
			$( $this ).catcomplete({
				delay: 0,
				source: $data,
				select: function(event, ul){
				$.ajax({
						type: 'POST',
						url: 'php-script/pull.data.php',
						data: {id: ul.item['value'], is_ajax: 22},
						//contentType: 'application/json; charset=utf-8',
						dataType: 'json',
						success: function(source){
							var data = $($this).data();
							if(data.name=="sem1"){
								$('table#not_1 input[name="subname['+key+']"]').val(source['subName']);
								$('table#not_1 input[name="sub-en['+key+']"]').val(source['subNameeng']);
								$('table#not_1 input[name="credit['+key+']"]').val(source['credit']);

								$('table#not_1 input[name^="credit"]').each(function(i){
									total += Number($('table#not_1 input[name="credit['+i+']"]').val().slice(0, 1));
									$('#sum-credit').text(total)
								});
							}else if(data.name=="sem2"){
								$('#not_2 input[name="subname['+key+']"]').val(source['subName']);
								$('#not_2 input[name="sub-en['+key+']"]').val(source['subNameeng']);
								$('#not_2 input[name="credit['+key+']"]').val(source['credit']);

								var total2 = 0;
								$('#not_2 input[name^="credit"]').each(function(e){
									total2 += Number($('#not_2 input[name="credit['+e+']"]').val().slice(0, 1));
									$('#sum-credit2').text(total2);
								});
							}
								
						},
						error: function(e){alert(e);}
					});
				}
			});
		});
	}
	
	function fnc_more($this, key){
		var data = $($this).data(),
			 id = null;
		if(data.name=="sem1"){
			id = $('table#not_1 input[name="subid['+key+']"]').val();
		}else if(data.name=="sem2"){
			id = $('#not_2 input[name="subid['+key+']"]').val();
		}
		$.ajax({
					type: 'POST',
					url: 'php-script/pull.data.php',
					data: {id: id, is_ajax: 21},
					//contentType: 'application/json; charset=utf-8',
					dataType: 'json',
					success: function(source){
						if(data.name=="sem1"){
							$('table#not_1 input[name="subname['+key+']"]').val(source['subName']);
							$('table#not_1 input[name="sub-en['+key+']"]').val(source['subNameeng']);
							$('table#not_1 input[name="credit['+key+']"]').val(source['credit']);
						}else if(data.name=="sem2"){
							$('#not_2 input[name="subname['+key+']"]').val(source['subName']);
							$('#not_2 input[name="sub-en['+key+']"]').val(source['subNameeng']);
							$('#not_2 input[name="credit['+key+']"]').val(source['credit']);
						}
						var total = 0;
						$('table#not_1 input[name^="credit"]').each(function(i){
							total += Number($('table#not_1 input[name="credit['+i+']"]').val().slice(0, 1));
							$('#sum-credit').text(total);
						});
						var total2 = 0;
						$('#not_2 input[name^="credit"]').each(function(e){
							total2 += Number($('#not_2 input[name="credit['+e+']"]').val().slice(0, 1));
							$('#sum-credit2').text(total2);
						});
					},
					error: function(e){alert("ไม่มีรายวิชานี้ในหลักสูตรหรือในผลการลงทะเบียน");}
				});
	}
	function getSubject(handleData){
		$.ajax({
			type: 'POST',
			url: 'php-script/pull.data.php',
			data: {is_ajax: 20},
			dataType: 'json',
			error: function(e){alert(e);}
		}).done(function(source){
			handleData(source);
		});
	}
	function fnc_edit_edu(key){
		 getEdu(key, function(source){
			$.each(source, function(i, val){
				$('#edu-id').val(val.id);
				$('#edu-edit-year').text(val.acadyear);
				$('#class-edu-edit option').each(function(){
					if($(this).val() == val.class){
						$(this).prop('selected', true);
					}
				});
				$('#semester-edu-edit option').each(function(){
					if($(this).val() == val.semester){
						$(this).prop('selected', true);
					}
				});
				$('#subid-edu-edit').val(val.subID);
				$('#subname-edu-edit').val(val.subName);
				$('#credit-edu-edit').val(val.credit);
				$('#suben-edu-edit').val(val.subNameen);


			});
		 })
		
		$('#dialog-eidt-edu').dialog( 'open' );
	}
	function getEdu(id, handleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			data: {id: id, is_ajax: 23},
			dataType: 'json',
			error: function(e){alert(e);}
		}).done(function(source){
			handleData(source);
		});
	}
	function fnc_del(id){
	$mess.text('ต้องการลบข้อมูลหรือไม่!');
	$mess.dialog({
		modal: false,
		title: 'ข้อความแจ้งเเตือน!',
		buttons: {
			'ลบ': function(){
				$.post("php-script/delete.php",{id: id, is_ajax: 4}, function(source){
					if(source == 1){
						var $year = (new Date).getFullYear()+543;
						var $arr = new Array();
						$arr[0] = $year;
						$arr[1] = $('select[name="class-edu"] :selected').val();
						$arr[2] = $('select[name="semester-edu"] :selected').val();
						$('#div-edu').load('modules/admin/data.education.php?str='+$arr);
						$mess.dialog( "close" );
					}else{
						alert("Error!");
					}
				});
			},
			'ยกเลิก': function(){
				$('#edu-year').text($year);
			}
		}
	});
}
</script>
<div id="dialog-eidt-edu" style="display:none">
<table cellpadding="5">
	<thead>
		<tr>
			<th>
				ปีการศึกษา&nbsp;
				<div id="edu-edit-back"></div><div id="edu-edit-year" style="display:inline-block;margin: 0 5px;"></div><div id="edu-edit-next"></div>
				<label>ชั้นปี</label>
			<select style="padding:2px;" id="class-edu-edit">
				<option value="1"  selected>1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<select style="padding:2px;" id="semester-edu-edit">
				<option value="1"  selected>ภาคต้น</option>
				<option value="2">ภาคปลาย</option>
			</select>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td valign="top">
				<table id="not_">
					<tr class="0">
						<td style=" width: 26%;">
							<input type="hidden" id="edu-id"/>
							<input type="text" style="width: 90%;" id="subid-edu-edit" style="margin:0;padding:0;" data-name="sem1" placeholder="รหัสวิชา"/>
						</td>
						<td >
							<input type="text" style="width: 95%;" id="subname-edu-edit" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาไทย" disabled/>
						</td>
						<td style="width:18%;">
							<input type="text" style="width: 95%;" id="credit-edu-edit" style="margin:0;padding:0;" placeholder="หน่วยกิต"/>
						</td>
					</tr>
					<tr class="0">
						<td>&nbsp;</td>
						<td colspan="3">
							<input type="text" style="width: 98%;" id="suben-edu-edit" style="margin:0;padding:0;" placeholder="ชื่อวิชาภาษาอังกฤษ" disabled/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>