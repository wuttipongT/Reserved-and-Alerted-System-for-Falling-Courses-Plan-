<style>
	table#edu-tb{
		width: 100%;
		border-collapse:collapse;
		}
	table#edu-tb td,
	table#edu-tb th{
		border:1px solid #ccc;
	}
	#not{
		width: 100%;
		border-collapse:collapse;
		table-layout:fixed;
	}
	table#not td{
		border: none;
	}
	.icon-edit{
		cursor:pointer;
		opacity:.40;
		-moz-opacity:.40;
		filter:alphar(opacity=40);
		khtml-opacity:.40;
	}
	.icon-edit:hover{
		opacity:1;
		-moz-opacity:1;
		filter:alphar(opacity=100);
		khtml-opacity:1;
	}
</style>
<table id="edu-tb" cellspacing="5" cellpadding="5">
	<thead>
		<tr>
			<th>ภาคต้น</th>
			<th>ภาคปลาย</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<table id="not" cellpadding="2">
				<?
						list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
						require_once '../../config.inc/database.php';
						$obj = new database($host, $username, $password, $dbname);
						
						$obj->mysql_query("SELECT * FROM education WHERE acadyear='".$_GET['year']."' AND class='".$_GET['$class']."' AND semester='1' ") or die(mysql_query());
						$sum = 0;
						if($obj->mysql_num_rows() > 0){
								foreach($obj->mysql_fetch_assoc() as $data){
									$sum +=current(explode('(',$data['credit']));
					?>
					<tr>
						<td style=" width: 15%;">
							<?=$data['subID']?>
						</td>
						<td >
							<?=$data['subName']?>
						</td>
						<td style="width:10%;">
							<?=$data['credit']?>
						</td>
					</tr>
					<tr class="tr-edit">
						<td>&nbsp;</td>
						<td colspan="2">
							<?=$data['subNameen']?>
						</td>
					</tr>
					<?
								}
						}else{
					?>
					<td colspan="4" align="center">ไม่มีรายวิชา</td>
					<?
						}
					?>
				</table>
			</td>
			<td>
				<table id="not" cellpadding="2">
				<?						
						$rs = $obj->mysql_query("SELECT * FROM education WHERE acadyear='".$_GET['year']."' AND class='".$_GET['$class']."' AND semester='2' ") or die(mysql_query());
						$sum2 = 0;
						if($obj->mysql_num_rows() > 0){
								while($data = mysql_fetch_assoc($rs)){
									$sum2 +=current(explode('(',$data['credit']));
					?>
					<tr>
						<td style=" width: 15%;">
							<?=$data['subID']?>
						</td>
						<td >
							<?=$data['subName']?>
						</td>
						<td style="width:10%;">
							<?=$data['credit']?>
						</td>
					</tr>
					<tr class="tr-edit">
						<td>&nbsp;</td>
						<td colspan="2">
							<?=$data['subNameen']?>
						</td>
					</tr>
					<?
								}
						}else{
					?>
					<td colspan="4" align="center">ไม่มีรายวิชา</td>
					<?
						}
					?>
				</table>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<td align="right">รวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$sum?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยกิต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td align="right">รวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$sum2?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หน่วยกิต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tfoot>
</table>