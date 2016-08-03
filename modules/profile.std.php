<div class="central-top">
    <div id="yarnball">
        <ul class="yarnball">
                <li class="yarnlet first">
                    <a href="index.php" style="z-index: 8;"><span class="left-yarn"></span>Home</a>
                </li>
                <li class="yarnlet ">
                    <a href="?page=profile" onclick="" style="z-index: 7;">โปรไฟล์</a>
                </li>
                <li class="yarnlet" style="left:50px;">Current page</li>
        </ul>
    </div><!--id="yarnball-->
</div><!--end central-top-->
<div class="triangle-r"></div>
<div id="tabs" style="margin:20px;font-family: 'THSarabunNew', sans-serif;color: #666;font-size: 13px;">
	<ul>
		<li><a href="#tabs-1">ข้อมูลส่วนตัว</a></li>
	</ul>
	<div id="tabs-1">
		<?require_once 'student/data.profile.php';?>
	</div>
</div>
