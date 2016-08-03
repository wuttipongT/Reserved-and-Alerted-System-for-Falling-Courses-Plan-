<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=dealnews" onclick="" style="z-index: 7;">ข้อมูลบุคคลากร</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<div id="staff-content"></div>
<br style="clear:both;"/>
<div id="staff-pagging" style="margin: 8px 10px;"></div>
<script type="text/javascript" src="Scripts/jquery.simplePagination.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/simplePagination.css" />
 <script>
 $(document).ready(function(){
	 paggeing('#staff-pagging','#staff-content', 4, 'data.staff.php');
function paggeing(page, content, row, url){
	get_num_rows(row, function(source){//acadyear1
		var limit = 4;
		$(page).pagination({
			items: source,
			itemsOnPage: limit,
			cssStyle: 'light-theme',
			currentPage: 1,
			onPageClick: function(p, e){
				 $.ajax({
					type: 'GET',
					url: 'modules/guest/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});	
			},
			onInit: function(){
				
				var p = $(page).pagination('getCurrentPage');
				 $.ajax({
					type: 'GET',
					url: 'modules/guest/'+url+'?start='+limit*(p-1)+'&limit='+limit,
					success: function(response){
						$(content).html(response);
					}
				});
			}
		});
	});
}
function get_num_rows(db, handleData){
	$.post('php-script/pull.data.php', {is_ajax: 5, db: db}, function(source){
		handleData(source);
	});
}
 });
 </script>