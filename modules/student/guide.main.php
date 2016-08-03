<?
	list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
	require_once '../../config.inc/database.php';
	$user = $_GET['id'];
	$start = $_GET['start'];
	$limit = $_GET['limit'];
	$obj = new database($host, $username, $password,$dbname);
	$rs = $obj->mysql_query("SELECT DISTINCT acadyear FROM enroll WHERE studentCode='$user' LIMIT $start, $limit") or die(mysql_error());
	if(mysql_num_rows($rs) > 0){
	while($aca = mysql_fetch_assoc($rs)){
		$head = '<left style="margin-left: 90px;"><b>ปีการศึกษา '.$aca['acadyear'].'</b></left><br/>';
		$head .= '<center>ภาคเรียนที่ 1</center>';
		echo $head;
		echo '<table style="margin:auto;" cellpadding="3"><tr class="th"><th>รหัสวิชา</th><th width="72%">ชื่อวิชา</th><th>เกรด</th><th>หน่วยกิต</th></tr>';
		$rs2 = $obj->mysql_query("SELECT subID, subName, creditAtempt, grade FROM enroll WHERE semester='1' AND acadyear='".$aca['acadyear']."' AND studentCode='$user'") or die(mysql_error());
		$i = 0;
		while($val = mysql_fetch_assoc($rs2)){
			$html = '<tr id="tr1_'.$val['subID'].'"><td id="subCode_sem1'.$i.'">'.$val['subID'].'</td>';
			$html .= '<td>'.$val['subName'].'</td>';
			$html .= '<td align="center" id="grade1'.$i.'">'.$val['grade'].'</td>';
			$html .= '<td align="center">'.$val['creditAtempt'].'</td></tr>';
			echo $html;
			$i++;
		}
		echo '</table>';
		echo '<center>ภาคเรียนที่ 2</center>';
		echo '<table style="margin:auto;" cellpadding="3"><tr class="th"><th>รหัสวิชา</th><th width="72%">ชื่อวิชา</th><th>เกรด</th><th>หน่วยกิต</th></tr>';
		$rs3 = $obj->mysql_query("SELECT subID, subName, creditAtempt, grade FROM enroll WHERE semester='2' AND acadyear='".$aca['acadyear']."' AND studentCode='$user'") or die(mysql_error());
		$j = 0;
		while($val = mysql_fetch_assoc($rs3)){
			$html = '<tr id="tr2_'.$val['subID'].'"><td id="subCode_sem2'.$j.'">'.$val['subID'].'</td>';
			$html .= '<td>'.$val['subName'].'</td>';
			$html .= '<td align="center">'.$val['grade'].'</td>';
			$html .= '<td align="center">'.$val['creditAtempt'].'</td></tr>';
			echo $html;
			$j++;
		}
		echo '</table>';
	}}else{
		echo "<b style=\"margin-left: 15px;\">ไม่มีข้อมูลการลงทะเบียนเรียนของท่าน!</b>";
	}
	$courses = find_courses($user, $obj);
	function find_courses($id, $db){
		$user_substr =  substr($id, 0, -9); //52, 56, ..
		$sql = "SELECT courses.update_ FROM courses LEFT JOIN acadyear ON courses.coursesID=acadyear.coursesID WHERE acadyear.year LIKE '%$user_substr' LIMIT 1";
		$rs = $db->mysql_query($sql) or die(mysql_error());
		while($data = mysql_fetch_assoc($rs)){
			return $data['update_'];
		}
	}
?>
<h4 style="margin-left: 15px;">*หมายเหตุ: เมาส์ชี้ที่รายวิชาจะมีเงือนไขรายวิชาบอกนะค่ะ</h4>
<div style="display:none; font-family: THSarabunNew;" id="dialog-guide">
	<div id="dialog-div-title"></div>
	<b>ความสำพันธ์ของรายวิชา</b>
	<div id="guide-container"></div>
<div>
<script src="jquery-ui-1.10.3/ui/jquery.ui.core.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.widget.js"></script>
<!-- dialog -->
<script src="jquery-ui-1.10.3/ui/jquery.ui.mouse.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.button.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.draggable.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.position.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.resizable.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.button.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.dialog.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.effect.js"></script>
<script>
var margin = 45;
	function fnc_drop(){
		/*$("td[name='grade\\[\\]']").each(function(i){
				//$("input[name='category-en\\[\\]']").val('');
				alert($("td[name='grade["+i+"]']").text());
				
				//$('#subname-category-en option[value=""]');
			});*/

		var length = $("td[id^='subCode_sem1']").size()-1,
			 j = 0;
		for( ;j<=length;j++){
			contact_graphs1($("td[id='subCode_sem1"+j+"']").text());
		}
		var c = $("td[id^='subCode_sem2']").size()-1,
			 i = 0;
		for( ;i<=c;i++){
			//alert($("td[id='subCode_sem2"+i+"']").text())
			contact_graphs($("td[id='subCode_sem2"+i+"']").text());
		}
	
	}
	function contact_graphs(subCode){
			$.ajax({
				type: 'GET',
				url: 'modules/student/prerequisite.php',
				//contentType: 'application/json;charset=utf-8',
				dataType: 'json',
				data: {subCode: subCode, courses: "<?echo $courses ;?>"}
			}).done(function( source ){
					if(jQuery.isEmptyObject( source )){
						$('#tr2_'+subCode).attr('title', 'เงื่อนไขรายวิชา : ไม่มี');
					}else{
						$.each(source, function(i ,val){
							if(typeof(source[i]) =="object"){
								var arr = [];
								$.each(val, function(index, value){
									getSub(value.subPre, function(source){
										arr[index]= source['0']['subCode']+" "+source['0']['subName'];
										var html = "เงื่อนไขรายวิชา : "+arr[0]+"\nและ "+arr[1]+"\nหรืออาจเรียนพร้อมกันได้";
										$('#tr2_'+i).attr('title', html);
									});
								})
							}else{
									getSub(val, function(source){
										$('#tr2_'+i).attr('title', 'เงื่อนไขรายวิชา : '+source['0']['subCode']+" "+source['0']['subName']);
									})
								
							}
						})	
					}
			});
	}
	function contact_graphs1(subCode){
			$.ajax({
				type: 'GET',
				url: 'modules/student/prerequisite.php',
				//contentType: 'application/json;charset=utf-8',
				dataType: 'json',
				data: {subCode: subCode, courses: "<?echo $courses ;?>"}
			}).done(function( source ){
					if(jQuery.isEmptyObject( source )){
						$('#tr1_'+subCode).attr('title', 'เงื่อนไขรายวิชา : ไม่มี');
					}else{
						$.each(source, function(i ,val){
							if(typeof(source[i]) =="object"){
								var arr = [];
								$.each(val, function(index, value){
									getSub(value.subPre, function(source){
										arr[index]= source['0']['subCode']+" "+source['0']['subName'];
										var html = "เงื่อนไขรายวิชา : "+arr[0]+"\nและ "+arr[1]+"\nหรืออาจเรียนพร้อมกันได้";
										$('#tr1_'+i).attr('title', html);
									});
								})
							}else{
									getSub(val, function(source){
										$('#tr1_'+i).attr('title', 'เงื่อนไขรายวิชา : '+source['0']['subCode']+" "+source['0']['subName']);
									})
								
							}
						})	
					}
			});
	}
	function contact_relation(subCode){
			$.ajax({
				type: 'GET',
				url: 'modules/student/prerequisite.php',
				//contentType: 'application/json;charset=utf-8',
				dataType: 'json',
				data: {subCode: subCode, courses: "<?echo $courses ;?>"}
			}).done(function( source ){
					if(jQuery.isEmptyObject( source )){
						$('#'+subCode).attr('title', 'เงื่อนไขรายวิชา : ไม่มี');
					}else{
						$.each(source, function(i ,val){
							if(typeof(source[i]) =="object"){
								var arr = [];
								$.each(val, function(index, value){
									getSub(value.subPre, function(source){
										arr[index]= source['0']['subCode']+" "+source['0']['subName'];
										var html = "เงื่อนไขรายวิชา : "+arr[0]+"\nและ "+arr[1]+"\nหรืออาจเรียนพร้อมกันได้";
										$('#'+subCode).attr('title', html);
									});
								})
							}else{
									getSub(val, function(source){
										$('#'+subCode).attr('title', 'เงื่อนไขรายวิชา : '+source['0']['subCode']+" "+source['0']['subName']);
									})
								
							}
						})	
					}
			});
	}
	function fnc_graphs($sub_id, $sub_name){
		$("#dialog-guide").dialog({
			autoOpen: false,
			width: 500,
			height: 400,
			title: 'เพิ่มเติม',
			buttons:{
				Ok: function(){
					$( this ).dialog( 'close' );
				}
			},open: function(){
				$("#dialog-div-title").html('<b>รายวิชา :</b>  '+$sub_id+' '+$sub_name);
				$.ajax({
					type: 'GET',
					url: 'modules/student/graphs.php',
					contentType:'application/json;charset=utf-8',
					dataType: 'json',
					data:{sub_id:$sub_id,courses: '<?echo $courses;?>'},
					success:function( source ){
						if(typeof( source ) == "object"){
							$.each(source , function(i,val){
								getSub(val, function( handdleData ){
									$.each(handdleData, function(i,sub){
										$('#guide-container').append('<a id="'+val+'" style="display:block;" href="JavaScript:fnc_relation(\''+val+'\')">'+val+" "+sub.subName+'</a>');
										contact_relation(val);
									})
								});
								
							});
						}else {
							$('#guide-container').html("ไม่มีข้อมูล");
						}
					}
				});
			},close: function(){
				$('#guide-container').html('');
				margin = 45;
			}
		});

		$("#dialog-guide").dialog( 'open' );
	}
	function getSub(sub_code, handleData){
		var obj = {
			id: sub_code,
			courses: '<?echo $courses;?>',
			 is_ajax: 16
		}
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			data: obj,
			success: function(source){
				handleData(source)
				//alert(source);
			},
			error: function(xhr, status, thrown){
				alert(status)
			}
		});
	}
	
	function fnc_relation($key){
		margin = margin+10;
		
		$.ajax({
					type: 'GET',
					url: 'modules/student/graphs.php',
					contentType:'application/json;charset=utf-8',
					dataType: 'json',
					data:{sub_id:$key,courses: '<?echo $courses;?>'},
					success:function( source ){
						//alert(source);
						
						if(typeof( source ) == "object"){
							if($.isEmptyObject( source )){
								$('#'+$key).after("<label>ไม่มีข้อมูล</label>");
								return false;
							}
							
							$.each(source , function(i,val){
								getSub(val, function( handdleData ){
									
									$.each(handdleData, function(i,sub){
										$('#'+$key).after('<a id="'+val+'" style="display:block;margin-left:'+margin+'px;" href="JavaScript:fnc_relation(\''+val+'\')">'+val+" "+sub.subName+'</a>');
										contact_relation(val);
									})
								});
								
							});
						}
					}
				});
	}
	function fnc_getSubject($sub, handdleData){
		$.ajax({
			url: 'php-script/pull.data.php',
			contentType: 'application/json;charset=utf-8',
			dataType: 'html',
			data:{id: $sub,courses: '<?echo $courses;?>', is_ajax: 16},
			success: function( source ){
				handdleData(source);
			}
			
		});
	}
</script>


