<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
require 'config.php';
require 'src/facebook.php';
list($host, $username, $password,$dbname) = explode("/", file_get_contents("config.inc/config.txt"));
require 'config.inc/database.php';

$database = new database($host, $username, $password,$dbname);
header('Content-Type: text/html; charset=utf-8');
$facebook = new Facebook(array(
		'appId'		=>  $appID,
		'secret'	=> $appSecret,
		));
//get the user facebook id		
$user = $facebook->getUser();
if($user){
	try{
		//get the facebook user profile data
		$user_profile = $facebook->api('/me');
		$sql = "SELECT studentCode FROM member WHERE username='".$user_profile['username']."'";
		$database->mysql_query($sql);
		if($database->mysql_num_rows() > 0){
			foreach($database->mysql_fetch_assoc() as $data){
				$_SESSION['student'] = $data['studentCode'];
			}
			$params = array('next' => $base_url);
			//logout url http://chaosiam.dyndns.info/testweb/recommend/http://chaosiam.no-ip.info/testweb/recommend/logout.php
			$logout =$facebook->getLogoutUrl($params);
			$_SESSION['logout']=$logout;
			?>
				<script type="text/javascript">window.close();</script>
			<?
		}else{
				list($m,$d,$y) = explode('/',$user_profile['birthday']);
				$birthday = $y."-".$m."-".$d;
			?>
			<!doctype html>
			<html>
			<head><title></title></head>
			<body>
				<div class="container-face">
					<table width="90%" style="margin: 20px; position:relative;">
					<tr>
						<td><label>รหัสนิสิต : </label></td><td><input id="student-code" type="text"  class="highlight"/></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><a href="JavaScript:void(0)" id="a-regis" class="styled-button-3">ถัดไป</a></td>
					</tr>
					</table>
					<input id="username" type="hidden" value="<?=$user_profile['username']?>"/>
					<input id="email" type="hidden" value="<?=$user_profile['email']?>"/>
					<input id="photo" type="hidden" value="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large"/>
					<input id="birthday" type="hidden" value="<?=$birthday?>"/>
					<input id="address" type="hidden" value="<?=$user_profile['hometown']['name']?>"/>
				</div>
			</body>
			</html>
			<?
			$params = array('next' => 'http://chaosiam.no-ip.info/testweb/recommend/logout.php');
			//logout url
			$logout =$facebook->getLogoutUrl($params);
			$_SESSION['logout']=$logout;
		}
	}catch(FacebookApiException $e){
		error_log($e);
		$user = NULL;
	}		
}
if(empty($user)){
//login url	
$loginurl = $facebook->getLoginUrl(array(
				'scope'			=> 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
				'redirect_uri'	=> $base_url,
				'display'=>'popup'
				));
header('Location: '.$loginurl);
}
//'http://chaosiam.no-ip.info/testweb/recommend/login.php'
?>
<!-- after authentication close the popup -->
<script src="jquery-ui-1.10.3/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(function(){
	$("#a-regis").click(function(){
		if($('#student-code').val() == ''){
			alert('ค่าว่าง');
		}else{
			var obj = {
				username: $('#username').val(),
				student_code: $('#student-code').val(),
				email: $('#email').val(),
				photo: $('#photo').val(),
				birthday: $('#birthday').val(),
				address:$('#address').val(),
				is_ajax: 15
			};
			$.post("php-script/add.php", obj, function(source){
				var check = source.split("\n");
				if(check['0'] == 1){
					alert(check['1']);
				}else{
					window.close();
				}
			});
			
		}
		
	});
	
})(jQuery);
</script>
<style type="text/css">
body{
	background: url(data:;base64,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);

}
.container-face{
		-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
position:absolute;margin:auto;display:block; height: 200px;
top: 50%;
margin-top:-100px;
width:500px;
  left:50%;
  margin-left:-250px;

}
.styled-button-3 {
	-webkit-box-shadow:rgba(0,0,0,0.0.1) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.0.1) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.0.1) 0 1px 0 0;
	background-color:#5B74A8;
	border:1px solid #29447E;
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,sans-serif;
	font-size:12px;
	font-weight:700;
	padding:7px 0;
	width: 100px;
	text-align:center;
	margin: 10px;
	color:#fff;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	text-decoration: none;
	display:block;

}
input.highlight,textarea.highlight{
width:300px;
height: 35px;
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #DDDDDD;
  -moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-webkit-border-bottom-right-radius: 5px;

-moz-border-radius-topleft: 5px;
	-webkit-border-top-left-radius: 5px;
	-moz-border-radius-topright: 5px;
	-webkit-border-top-right-radius: 5px;
}
input.highlight:focus,textarea.highlight:focus{
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid rgba(81, 203, 238, 1);
}
input.highlight2{
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #DDDDDD;

}
</style>