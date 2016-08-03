<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>กระบวนการติดตั้งระบบแนะนำแผนการเรียนและสำรองที่นั่ง</title>
	<meta charset="UTF-8"/>
	<script type="text/javascript" src="../jquery-ui-1.10.3/jquery-1.9.1.js"></script>
	<style>
		body {
  background-color: #DDD;
  background-image: 
    radial-gradient(#CCC 1px, transparent 1px);
  background-size: 5px 5px;
  margin: 0 auto;
  margin-left: 25px;
  margin-right: 25px;
  font-size: 40px;
  font-family: calibri light;
  font-variant: small-caps;
		}

		h1 {
		  margin: 0 0 5px;
		  font-size: 18px;
		  color: #999;
		}

		.box {
		  position: absolute;
		  box-sizing: border-box;
		  left: 50%;
		  height: auto;
		  width: 800px;
		  top: 20px;
		  margin-left: -400px;
		  padding: 20px;
		  font-size: 14px;
		  border-top: 1px solid #ccc;
		  background: white;
		  box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.7);
		  border-radius: 9px;
		}

		.label {
		  position: absolute;
		  top: -10px;
		  left: 20px;
		  height: 30px;
		}
		.label .back-side {
		  border-style: solid;
		  border-width: 5px 5px 5px 5px;
		  border-color: transparent #d97a0d #d97a0d transparent;
		  position: absolute;
		  left: -10px;
		  top: -1px;
		}
		.label .front-side {
		  position: relative;
		  padding: 0 15px;
		  background: orange;
		  color: white;
		  font-size: 14px;
		  font-weight: bold;
		  text-align: center;
		  /*text-shadow: 0 2px 0 rgba(0, 0, 0, 0.5);*/
		  padding-top: 4px;
		}
		.label .front-side:before, .label .front-side:after {
		  content: "";
		  display: block;
		  position: absolute;
		  bottom: -10px;
		}
		.label .front-side:before {
		  left: 0;
		  border-style: solid;
		  border-width: 6px 40px 6px 40px;
		  border-color: orange transparent transparent orange;
		}
		.label .front-side:after {
		  right: 0;
		  border-style: solid;
		  border-width: 6px 40px 6px 40px;
		  border-color: orange orange transparent transparent;
		}

	</style>
</head>
<body>
<div class="box">
  <div class="label">
    <div class="back-side">
    </div>
    <div class="front-side">
      <span>Installation!</span>
    </div>
  </div>
  <br/>
  <img src="images/install.png" style="width: 80px;float:left;"/>
  <b>ยินดีต้อนรับสู่ขั้นตอนการติดตั้งระบบแนะนำแผนการเรียนและสำรองที่นั่ง</b><br /><font style="font-size:13px;">พัฒนาโดย นายวุฒิพงษ์ ทองมนต์ สาขาวิทยาการคอมพิวเตอร์ <br />คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</font>
	<br style="clear:both;"/>
	<hr style="filter:alphar(opacity=40);-moz-opacity:.40;-khtml-opacity:.40;opacity:.40;"/>
	<div style="border:1px dotted #ccc;">
		<?
			switch($_GET['step']){
				case '2' : include_once 'step2.php';break;
				case '3' : include_once 'step3.php';break;
				case '4' : include_once 'step4.php';break;
				case '5' : include_once 'step5.php';break;
				default: include_once 'step1.php';break;
			}
		?>
	</div>
</div>

</body>
<?
	session_write_close();
?>
</html>
<style>
/* The following is all you really need for the effect to work */

.info {
  display: inline-block;
  width: auto;
  padding: 0 12.5px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: white;
  color: white;
  text-shadow: rgba(91, 192, 222, 0.3) 0 1px 1px;
  -webkit-font-smoothing: antialiased;
  font-family: "Source Sans Pro", sans-serif;
  font-size: 25px;
  font-weight: 400;
  letter-spacing: 0.05em;
  margin: 0 1em 1em 0;
  -webkit-border-radius: 0.1em;
  -moz-border-radius: 0.1em;
  -ms-border-radius: 0.1em;
  -o-border-radius: 0.1em;
  border-radius: 0.1em;
  background-image: -webkit-gradient(radial, 5% 5%, 0, 5% 5%, 50, color-stop(0%, #5bc0de), color-stop(100%, #28a1c5));
  background-image: -webkit-radial-gradient(5% 5%, #5bc0de 0%, #28a1c5 50px);
  background-image: -moz-radial-gradient(5% 5%, #5bc0de 0%, #28a1c5 50px);
  background-image: -o-radial-gradient(5% 5%, #5bc0de 0%, #28a1c5 50px);
  background-image: radial-gradient(5% 5%, #5bc0de 0%, #28a1c5 50px);
}

/* Normal white Button as seen in Google.com*/
button {
    color: #444444;
    background: #F3F3F3;
    border: 1px #DADADA solid;
    padding: 5px 10px;
    border-radius: 2px;
    font-weight: bold;
    font-size: 9pt;
	cursor:pointer;
}

button:hover {
    border: 1px #C6C6C6 solid;
    box-shadow: 1px 1px 1px #EAEAEA;
    color: #333333;
    background: #F7F7F7;
}

button:active {
    box-shadow: inset 1px 1px 1px #DFDFDF;   
}

/* Blue button as seen in translate.google.com*/
button.blue {
    color: white;
    background: #4C8FFB;
    border: 1px #3079ED solid;
    box-shadow: inset 0 1px 0 #80B0FB;
}

button.blue:hover {
    border: 1px #2F5BB7 solid;
    box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
    background: #3F83F1;
}

button.blue:active {
    box-shadow: inset 0 2px 5px #2370FE;   
}

/* Orange button as seen in blogger.com*/
button.orange {
    color: white;
    border: 1px solid #FB8F3D; 
    background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
    background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
    background: -ms-linear-gradient(top, #FDA251, #FB8F3D);
}

button.orange:hover {
    border: 1px solid #EB5200;
    background: -webkit-linear-gradient(top, #FD924C, #F9760B); 
    background: -moz-linear-gradient(top, #FD924C, #F9760B); 
    background: -ms-linear-gradient(top, #FD924C, #F9760B); 
    box-shadow: 0 1px #EFEFEF;
}

button.orange:active {
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
}

/* Red Google Button as seen in drive.google.com */
button.red {
    background: -webkit-linear-gradient(top, #DD4B39, #D14836); 
    background: -moz-linear-gradient(top, #DD4B39, #D14836); 
    background: -ms-linear-gradient(top, #DD4B39, #D14836); 
    border: 1px solid #DD4B39;
    color: white;
    text-shadow: 0 1px 0 #C04131;
}

button.red:hover {
     background: -webkit-linear-gradient(top, #DD4B39, #C53727);
     background: -moz-linear-gradient(top, #DD4B39, #C53727);
     background: -ms-linear-gradient(top, #DD4B39, #C53727);
     border: 1px solid #AF301F;
}

button.red:active {
     box-shadow: inset 0 1px 1px rgba(0,0,0,0.2);
    background: -webkit-linear-gradient(top, #D74736, #AD2719);
    background: -moz-linear-gradient(top, #D74736, #AD2719);
    background: -ms-linear-gradient(top, #D74736, #AD2719);
}

</style>