<link rel='stylesheet' href='Scripts/popbox.css' type='text/css' media='screen' charset='utf-8'>
<? if(!$_SESSION["student"]){ alert("เพจนี้กรณีสำรหับเจ้าหน้าที่เท่านั้น ขออภัยในความไม่สะดวก!");header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?mod=reserv" onclick="" style="z-index: 7;">สำรองที่นั่ง</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<style>
	tr:not(.never):hover{
		background: rgba(204,204,204,.10);
	}
	.nav-back,
	.nav-next{
		border-color: transparent #000 transparent transparent;
		border-style: solid;
		border-width: 6px;
		display: inline-block;
		cursor:pointer;
	}
	.nav-next{
		border-color: transparent transparent transparent #000;
	}
	table td,
	table th{
		border:1px solid #ccc;
		/*rgba(204,204,204,.10);*/
	}
</style>
<div style="margin-left: 20px;">
ปีการศึกษา&nbsp;<div class="nav-back"></div>&nbsp;<label id="std-nav-reserv"></label>&nbsp;<div class="nav-next"></div>
</div>
<div id="content-std-reserv"></div>
	<h4 style="float:right;margin-right:10px;">*หมายเหตุ : คลิกที่รายวิชาเพื่อดูข้อมูลรายเอียดอื่นๆเพิ่มเติม</h4>
	<br style="clear:both;"/>
<div id="reserv-dialog" style="display:none;" title="รายชื่อนิสิตที่ร้องขอสำรองที่นั่ง">
	<div id="data-reserv"></div>
	<div id="data-reserv-pagging" style="margin-top: 10px;"></div>
</div>
<style>
ol{
	margin:0 19px;
	padding: 0;
}
#ddd td{
	border:none;
}
</style>
<div id="div-info" style="display:none; padding: 3px; width:100%;">
	<table id="ddd" style="width: 100%; table-layout:fixed; border-collapse:collapse;" cellpadding="5">
		<tr><td width="22%">วิชา</td><td><span id="label-subject">&nbsp;</span></td></tr>
		<tr><td valign="top">อาจารย์ผู้สอน</td><td id="label-lecturer"></td></tr>
		<tr><td>ภาคเรียน</td><td><label id="label-semester">&nbsp;</label></td></tr>
		<tr><td>ปีการศึษา</td><td><label id="label-aca">&nbsp;</label></td></tr>
		<tr><td>เพิ่มเมื่อวันที่</td><td><label id="label-date-curr">&nbsp;</label></td></tr>
		<tr><td>หมดเขต *</td><td><label id="label-date-end">&nbsp;</label></td></tr>
	</table>
</div>
<div id="alert-message" style="display:none" title="แจ้งเตือน"></div>

<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script>
function fnc_cancel(sub, std){
		$.ajax({
			url: 'php-script/pull.data.php',
			data:{id: sub, is_ajax: 26},
			success: function(right){
					if(right == 0){
						$('#alert-message').text('ไม่ได้อยู่ในช่วงสำรองที่นั่งค่ะ');
							$('#alert-message').dialog({
								buttons:{Ok: function(){
									$(this).dialog( 'close' );
								}}
							})	
					}else if(right == 1){
						$.ajax({
							type: 'POST',
							url: 'php-script/delete.php',
							data: {is_ajax: 3, sub: sub, std: std},
							success: function(source){
							$('#alert-message').text(source);
								$('#alert-message').dialog({
									buttons:{Ok: function(){
										$(this).dialog( 'close' );
									}}
								})
							}
						});
					}
				}
		});
}
$(document).ready(function(){
	var current_date = (new Date).getFullYear()+543;
	$('#content-std-reserv').load('modules/student/data.sub.reserv.php?aca='+current_date, function(){
		$.getScript('Scripts/popbox.js', function(){
			$('.popbox').popbox();
		});
		$('.btn_info, .btn_reserv').button();
	});
	$('#std-nav-reserv').text(current_date);
	$('.nav-back').click(function(){
		current_date -=1;
		$('#std-nav-reserv').text(current_date);
			$('#content-std-reserv').load('modules/student/data.sub.reserv.php?aca='+current_date, function(){
				$.getScript('Scripts/popbox.js', function(){
					$('.popbox').popbox();
					$('.btn_info, .btn_reserv').button();
				});
			});
	});
	$('.nav-next').click(function(){
		current_date +=1;
		$('#std-nav-reserv').text(current_date);
			$('#content-std-reserv').load('modules/student/data.sub.reserv.php?aca='+current_date, function(){
				$.getScript('Scripts/popbox.js', function(){
					$('.popbox').popbox();
				});
				$('.btn_info, .btn_reserv').button();
			});
	});
});
function fnc_data(key){
	$('#reserv-dialog').dialog({
		autoOpen: false,
		width: 800,
		height: 600,
		modal:true,
		buttons: {
			Close: function(){
				$(this).dialog( 'close' );	
			}
		}
	});
	paggeing('#data-reserv-pagging', key, 9);
}
function fnc_reserv(key, std_code){
	$.post('php-script/pull.data.php',{id: key, std_code: std_code, is_ajax: 14}, function(right){
		//var currentYear = (new Date).getFullYear()+543,
		if(right == 0){
			$('#alert-message').text('หมดเขตการสำรองที่นั่่งแล้วค่ะ');
				$('#alert-message').dialog({
					buttons:{Ok: function(){
						$(this).dialog( 'close' );
					}}
				})	
		}else if(right == 1){
			$.post('php-script/add.php', {id:key, std_code: std_code, is_ajax: 11}, function(source){
				var check = source.split('\n');
				if(check['0'] == 1){
					$('#alert-message').text(check['1']);
					$('#alert-message').dialog({
						buttons:{Ok: function(){
							$(this).dialog( 'close' );
						}}
					})
				}else{
					$('#alert-message').text('สำรองที่นั่งเรียบร้อยแล้วค่ะ');
					$('#alert-message').dialog({
						buttons:{Ok: function(){
							$(this).dialog( 'close' );
						}}
					})	
				}
			});
			
		}else if(right == 2){
			$('#alert-message').text('นิสิตได้สำรองที่วิชานี้ไว้แล้ว');
			$('#alert-message').dialog({
				buttons:{Ok: function(){
					$(this).dialog( 'close' );
				}}
			})
		}else {
			var str = right.split('/'),
				str2 = str['0']-1,
				str3 = str['0']-2;
			$('#alert-message').text('รายวิชานี้สามารถสำรองที่นั่งตั้งแต่ชั้นปีที่ '+str['1']+' เป็นต้นไป หรือรหัสตั้งแต่  '+str['0']+'xxxxxxxxx, '+str2+', '+str3+' ...');
			$('#alert-message').dialog({
				width: 400,
				buttons:{Ok: function(){
					$(this).dialog( 'close' );
				}}
			})
		}
	})
}
function paggeing(page, key, row){
	get_num_rows(row, key, function(source){//acadyear1
		var limit = 10;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			onPageClick: function(p, e){
				$('#data-reserv').load('modules/student/data.reserv.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
					$('#reserv-dialog').dialog( 'open' );
				});
			},
			onInit: function(){
				
					var p = $(page).pagination('getCurrentPage');
					 
					$('#data-reserv').load('modules/student/data.reserv.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
						$('#reserv-dialog').dialog( 'open' );
					});
			}
		});
	});
}
function get_num_rows(db, id, handleData){
	$.post('php-script/pull.data.php', {id: id, is_ajax: 5, db: db}, function(source){
		handleData(source);
	});
}
function fnc_info(key){
	$('#div-info').dialog( {
		autoOpen: false,
		width: 420,
		height: 'auto',
		modal: true,
		title: 'Info',
		buttons: {
			Ok: function(){
				$( this ).dialog( 'close' );
			}
		}
	} );
	$.ajax( {
		url: 'php-script/pull.data.php',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		data: {id: key, is_ajax: 15}
	} ).done(function( source ){
		$('#label-subject').text(source['0']['subject']);
		$('#label-lecturer').html(source['0']['lecturers']);
		$('#label-semester').text(source['0']['semester']);
		$('#label-aca').text(source['0']['acadyear']);
		date_TH(source['0']['date_curr'] , function(source){
			$('#label-date-curr').text(source);
		})
		date_TH(source['0']['date_end'] , function(source){
			$('#label-date-end').text(source);
		})
		$('#div-info').dialog( 'open' );
	});
}
function date_TH(dateTH, handleData){
	var mount = {
		'01': 'ม.ค.',
		'02': 'ก.พ',
		'03': 'มี.ค.',
		'04': 'เม.ย',
		'05': 'พ.ค.',
		'06': 'มิ.ย.',
		'07': 'ก.ค.',
		'08': 'ส.ค.',
		'09': 'ก.ย.',
		'10': 'ต.ค.',
		'11': 'พ.ย',
		'12': 'ธ.ค.'
	},
		date_split = dateTH.split('-'),
		newMount = null;
	$.each(mount, function(i, val){
		if(date_split['1'] == i){
			newMount = val;
		}
	});
	var newYear = Number(date_split['0'])+543,
		  str = date_split['2']+' '+newMount+' '+newYear;
	handleData(str);
}
</script>