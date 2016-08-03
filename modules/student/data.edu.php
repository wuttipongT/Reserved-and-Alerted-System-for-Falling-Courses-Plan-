<table id="edu-tb" cellspacing="5" cellpadding="5">
	<tbody>
		<tr>
			<td>
				<table id="not">
				<?
				list($host, $username, $password,$dbname) = explode("/", file_get_contents("../../config.inc/config.txt"));
					require_once '../../config.inc/database.php';
						$obj = new database($host, $username, $password, $dbname);
						
						$obj->mysql_query("SELECT * FROM education WHERE acadyear LIKE '%".$_GET['aca']."' AND class='".$_GET['cla']."' AND semester='".$_GET['sem']."' ") or die(mysql_query());
						$sum = 0;
						$subCode = array();
						if($obj->mysql_num_rows() > 0){
								foreach($obj->mysql_fetch_assoc() as $data){
									$sum +=current(explode('(',$data['credit']));
									$subCode[] = $data['subID'];
					?>
					<tr class="<?=$data['subID']?>">
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
					<tr class="<?=$data['subID']?>">
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