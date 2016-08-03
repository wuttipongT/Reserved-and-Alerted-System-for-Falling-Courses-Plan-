<script type="text/javascript" src="js/oauthpopup.js"></script>

<ul style="margin-top: 2px;">
	<li class="topic" style="border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1);width:222px;background: rgb(102,204,255);border-bottom:none;   
			-webkit-border-top-right-radius: 10px;
    	-moz-border-radius-topright: 10px;
    		border-top-right-radius: 10px;-webkit-border-top-left-radius: 5px;
    	-moz-border-radius-topleft: 5px;
    		border-top-left-radius: 5px;" >
		<i class="icon-lock icon-white" style="margin-left: 10px; display: inline-block;vertical-align: middle;"></i>&nbsp;เข้าสู่ระบบ
		<a class="register" href="?mod=regis" title="สมัครสามาชิก" style="text-indent:5px; z-index: -1;"><i class="icon-user" style="opacity:.40;filter:alpha(opacity=40);filter: “alpha(opacity=40)”;z-index: 5;"></i>&nbsp;สมัครสมาชิก</a>
		<div class="ragtangle-stic-nav-gen"></div>
	</li>
	
</ul>
<div class="nav-right" style="color: #000000;"></div>
<div id="form_log" style="clear:both;height: auto;width:199px;">
<form name="form_log" method="post" action="" style="text-align:left;">
	<input type="text" id="username" name="username" placeholder="Username" style="margin-left:10px;" class="not">
    <input type="password" id="password" name="password" placeholder="Password" style="margin-left:10px;" class="not">
	<style>
		#username:focus,
		#password:focus{
			outline: none;
			
		}
	.nav-right {
	position: absolute;
	right: -14px;
	top:35px;
	float:right;
	width:14px;
	height:14px;
	background: rgb(102,204,255);
	border-bottom-right-radius:100% 50%;
	z-index:500;
}

.nav-right:after {
	content: '';
	position: absolute;
	left:0;
	width:66%;
	height:66%;
	background: #000;
	border-top-right-radius:100% 50%;
	border-bottom-right-radius:100% 50%;
}
	</style>
	<div style="text-align:left;display:block;font-size:12px;vertical-align: middle;margin: 6px 5px; color:#000;"><input type="checkbox" id="autologin" name="autologin" value="1">จำฉันอยู่ในระบบ</div>
	<div id="mess-log" style="text-align:center;color:#000;display:block;width: auto; height: auto;">
<?
	if(isset($_POST['submit'])){
		list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
		require_once 'config.inc/database.php';
		$objDB = new database($host, $username, $password,$dbname);
		$username = $_POST['username'];
		$password = base64_encode($_POST['password']);
		$sql = "SELECT * FROM staff WHERE username='$username' ;";
		$rs = $objDB->mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($rs) > 0){//student
			$bool = 0;
			if($bool==0){
				$sql = "SELECT username FROM staff WHERE username='$username' LIMIT 1 ";
				$objDB->mysql_query($sql);
				if(!$objDB->mysql_fetch_assoc()){
					echo "ชื่อผู้ใช้ไม่ถูกต้อง!";	
				}else {$bool = 1;} 
			}if($bool==1){
				$sql = "SELECT password FROM staff WHERE username='$username' AND password='$password' LIMIT 1";
				$rs = mysql_query($sql);
				if(!mysql_fetch_assoc($rs)){
					echo "Password is Wrong!";
				}else {
					$_SESSION['staff'] = $username;
					session_write_close();
					if($_POST['autologin'] == 1){
						$cookie_name = 'siteAuth';
						$cookie_time = (3600 * 24 * 30); 
						setcookie($cookie_name, 'usr='.$username.'&hash='.$password.'&type_log='.$type_log, time() + $cookie_time);
					}
					header("Location: index.php");
				}
			}
		}else {//staff
			$bool = 0;
			if($bool==0){
				$sql = "SELECT studentCode FROM member WHERE username='$username' LIMIT 1 ";
				$objDB->mysql_query($sql);
				if(!$objDB->mysql_fetch_assoc()){
					echo "Username is Wrong!";	
				}else {$bool = 1;} 
			}if($bool==1){
				$sql = "SELECT password FROM member WHERE username='$username' AND password='$password' LIMIT 1";
				$rs = mysql_query($sql);
				if(!mysql_fetch_assoc($rs)){
					echo "Password is Wrong!";
				}else {
					$_SESSION['student'] = $username;
					$_SESSION['logout'] = "logout.php";
					session_write_close();
					// Autologin Requested?
					if($_POST['autologin'] == 1){
						$cookie_name = 'siteAuth';
						$cookie_time = (3600 * 24 * 30); 
						setcookie($cookie_name, 'usr='.$username.'&hash='.$password.'&type_log='.$type_log, time() + $cookie_time);
					}
					header("Location: ?mod=profile");
				}
			}	
		}		
	}
	
?>
	</div>
	<a class="forgot" href="?mod=forgetpass">ลืมรหัสผ่าน ?</a><input name="submit" class="_btn btn-primary" type="submit" value="เข้าสู่ระบบ" style="width:80px;height: 30px;display: block;float:right; margin-right: 10px;"/>
</form><!--end form-->
</div><!--end form_log-->
<br style="clear:both;"/>
<hr class="hr"/>
<!--

<div style="width: 20px;height: 20px;border: 1px solid #fff; border-radius: 280px;display:block; margin: -18px auto auto auto;background-color: #6CF;">
	<lable style="margin-left: 4px; margin-top: -5px; color:#000;">or</lable>
</div>
-->
<label style="float:left;margin-left: 10px;font-size: 12px;color: #000;">Log In with :</label>
<script type="text/javascript">
$(document).ready(function(){
    $('#log-fac').click(function(e){
        $.oauthpopup({
            path: 'login.php',
			width:600,
			height:300,
            callback: function(){
                window.location.reload();
            }
        });
		e.preventDefault();
    });
});
</script>
<img id="log-fac" src="images/2013-07-24_144330.png" />
<br/>
<style>
	#log-fac{
		width: 60px; 
		margin:2px 10px;
		display: block; 
		float:right; 
		opacity: .50;
		-moz-opacity: .50;
		cursor: pointer;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
		filter: alpha(opacity=50);
	}
	#log-fac:hover,
	#log-fac:focus{
		opacity: 1;
		-moz-opacity: 1;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
		filter: alpha(opacity=100);
	}
	.forgot:after{
		clear:both;
		font-size: 12px;color: #000;
	}
	.hr{
		width: 90%; 
		opacity: .30;
		-moz-opacity: .30;
		cursor: pointer;	
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
		filter: alpha(opacity=30);
		khtml-opacity:.30;
	}
</style>