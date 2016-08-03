<? if(!$_SESSION["student"]){ alert("เพจนี้สำรหับนิสิต ขออภัยในความไม่สะดวก!");header("Location: index.php");}?>
<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=guide" onclick="" style="z-index: 7;">ผลการลงะทะเบียนเรียน</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>

<div id="hhhh">&nbsp;fdfsfsf</div>
<style>
	tr:not(.th):hover{
		background: rgba(204,204,204,.10);
	}
	table{
		border-collapse: collapse;
		table-layout:fixed;
		word-wrap:break-word;
		
	}
	table td{
		cursor:pointer;
	}
	table td,
	table th{
		border:1px solid #ccc;
		/*rgba(204,204,204,.10);*/
	}

	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}
	</style>
	<div id="data-guide"></div>
	<div id="data-guide-pagging" style="margin-top: 10px; margin-left: 15px;"></div>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<script src="jquery-ui-1.10.3/ui/jquery.ui.tooltip.js"></script>
<script>
$(function($){
	$('#hhhh').html('&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/GsNJNwuI-UM.gif" />&nbsp;กำลังโหลด...');
	paggeing("#data-guide-pagging", "<?echo $_SESSION['student']?>", 12 );

	$( document ).tooltip({
				position: {
					at: "center-90 bottom",
					using: function( position, feedback ) {
						$( this ).css( position );
						$( "<div>" )
							.addClass( "arrow" )
							.addClass( feedback.vertical )
							.addClass( feedback.horizontal )
							.appendTo( this );
					}
				}
	});
})
function paggeing(page, key, row){
	get_num_rows(row, key, function(source){//acadyear1
		var limit = 1;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			onPageClick: function(p, e){
				$('#data-guide').load('modules/student/guide.main.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
					fnc_drop();
					$('#hhhh').html('');
				});
			},
			onInit: function(){
					var p = $(page).pagination('getCurrentPage');
					$.getScript('jquery-ui-1.10.3/jquery-1.9.1.js', function(){
						$('#data-guide').load('modules/student/guide.main.php?id='+key+'&start='+limit*(p-1)+'&limit='+limit, function(){
							fnc_drop();
							$('#hhhh').html('');
						});
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

</script>