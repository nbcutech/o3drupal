<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>snowglobe</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css" media="all">
			html, body { height:100%; background:url(bg-02.jpg) repeat-x; background-color: #c3eafb; z-index:0; }
									body { margin:0; padding:0; overflow:auto; text-align:center; }
									#flashContent { position:relative; margin:0 auto; width:450px; height:650px; background:url(bg-03.jpg) no-repeat; z-index:2; }

			#right { position:absolute; top:0; right:0; width:50%; height:650px; background:url(bg-04.jpg) repeat-x; z-index:1; }
			
		</style>
	</head>
	<body>
		<div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="450" height="650" id="snowglobe" align="middle">
				<param name="movie" value="snowglobe2.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#23B1F1" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="wmode" value="transparent" />
				<param name="allowScriptAccess" value="always" />
				<param name="flashvars" value="msg=<?php print urlencode($_GET['msg']); ?>" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="snowglobe2.swf" width="450" height="650">
					<param name="movie" value="snowglobe2.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#23B1F1" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="wmode" value="transparent" />
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="flashvars" value="msg=<?php print urlencode($_GET['msg']); ?>" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
		<div id="right"></div>
	</body>
</html>
