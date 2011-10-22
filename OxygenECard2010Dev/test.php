<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>snowglobe</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css" media="all">
			html, body { height:100%; background:url(bg-02.jpg) repeat-x; background-color: #c3eafb; z-index:0; }
									body { margin:0; padding:0; overflow:auto; text-align:center; }
									#flashContentDiv { position:relative; margin:0 auto; width:450px; height:650px; background:url(bg-03.jpg) no-repeat; z-index:2; }

			#right { position:absolute; top:0; right:0; width:50%; height:650px; background:url(bg-04.jpg) repeat-x; z-index:1; }
			
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript">
		var email_response;
		function flashCallback () {
			var swf = swfobject.getObjectById("flashcontent");
			name = swf.getName();
			to = swf.getTo();
			from = swf.getFrom();
			msg = swf.getMsg();
			$.ajax({
				type: "POST",
				url: "email.php",
				data: "name="+name+"&email="+from+"&recipients="+to+"&message="+msg,
				success: function(response){
					email_response = response;
					console.log(response);
					console.log(typeof response);
				}
			});
			return email_response;
		}
		</script>
	</head>
	<body>
		
		<script type="text/javascript">
			var flashvars = {};
			flashvars.msg = "<?php print urlencode($_GET['msg']); ?>";
			var params = {};
			params.quality = "high";
			params.bgcolor = "#23B1F1";
			params.play = "true";
			params.loop = "true";
			params.scale = "showall";
			params.menu = "true";
			params.devicefont = "false";
			params.wmode = "transparent";
			params.AllowScriptAccess = "always";
			var attributes = {};

			swfobject.embedSWF("snowglobe2.swf", "flashcontent", "450", "650", "9.0.0", false, flashvars, params, attributes);
		</script>
		<div id="flashContentDiv">
		<div id="flashcontent">
			<a href="http://www.adobe.com/go/getflashplayer">
				<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
			</a>
		</div>
		</div>
		<div id="right"></div>


	</body>
</html>
