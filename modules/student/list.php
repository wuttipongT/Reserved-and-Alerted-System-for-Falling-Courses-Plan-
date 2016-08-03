<meta charset="UTF-8">
<style>
	.ragtangle-stic-nav{
		/*border-color:transparent #9CF transparent transparent;*/
		border-color:transparent rgba(0,0,0,.3) transparent transparent;
		border-width:10px;
		border-style:solid;
		position:absolute;
		z-index:-1;
		top:22px;left:-11px;
	 }
</style>
	<li>
		<a id="nav-left" class="<?=active_menu("profile")?>" href="?mod=profile">
			<i class="icon-info-sign icon-white"></i><span class="indent">แก้ไขข้อมูลส่วนตัว</span>
		</a>
	</li>
	<li class="topic" style="border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1);">
		<i class="icon-th-large icon-white" style="margin-left: 10px; display: inline-block;vertical-align: middle;"></i>&nbsp;สมาชิก
		<div class="ragtangle-stic-nav"></div>
	</li>
	<li>
		<a id="nav-left" class="<?=active_menu('std')?>" href="?mod=std">
			<i class="icon-th-list"></i><span class="indent">ข้อมูลนิสิต</span>
		</a>
	</li>
	<li>
		<a id="nav-left" class="<?=active_menu('enroll')?>" href="?mod=enroll">
			<i class="icon-th-list"></i><span class="indent">ผลการลงทะเบียนเรียน</span>
		</a>
	</li>
		<li>
		<a id="nav-left" class="<?=active_menu('guide')?>" href="?mod=guide">
			<i class="icon-th-list"></i><span class="indent">แนะนำรายวิชาตามแผน</span>
		</a>
	</li>
	<li>
		<a id="nav-left" class="<?=active_menu('reserv')?>" href="?mod=reserv">
			<i class="icon-th-list"></i><span class="indent">สำรองที่นั่งรายวิชา</span>
		</a>
	</li>
		<li>
		<a id="nav-left" class="<?=active_menu('report')?>" href="?mod=report">
			<i class="icon-th-list"></i><span class="indent">รายงานสำรองที่นั่ง</span>
		</a>
