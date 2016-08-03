<?
	$key = $_GET['str'];
	list($year, $class, $semester) = explode(',', $key);
?>
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
	#not td{
		padding: 5px;
	}
</style>
<table id="edu-tb" cellspacing="5" cellpadding="5">
	<tbody>
		<tr>
			<td valign="middle">
				<table id="not">
				<?
						list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
						require_once '../../config.inc/database.php';
						$obj = new database($host, $username, $password, $dbname);
						
						$obj->mysql_query("SELECT * FROM education WHERE acadyear='$year' AND class='$class' AND semester='$semester' ") or die(mysql_query());
						$sum = 0;
						if($obj->mysql_num_rows() > 0){
								foreach($obj->mysql_fetch_assoc() as $i => $data){
									$sum +=current(explode('(',$data['credit']));
					?>
					<tr>
						<td style=" width: 15%;">
							<?=$data['subID']?>
						</td>
						<td >
							<?=$data['subName']?>
						</td>
						<td style="width:10%; border-right:1px dashed #ccc;">
							<?=$data['credit']?>
						</td>
						<td rowspan="2" style="width:5%;" valign="top" align="center"><i class="icon-edit" onClick="fnc_edit_edu('<?=$data['id']?>')"></i></td>
						<td rowspan="2" style="width:5%;" valign="top" align="center"><i class="icon-remove" onClick="fnc_del('<?=$data['id']?>')"></i></td>
					</tr>
					<tr class="tr-edit" style="<? if($i != ($obj->mysql_num_rows()-1)){echo "border-bottom:1px dashed #ccc;";}?>">
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
	</tfoot>
</table>