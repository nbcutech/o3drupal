<?php
if(!empty($_POST) && $_POST['internal'] == 'bgc_oxygen') :
	$url = "https://graph.facebook.com/{$_POST['uid']}/photos";
	$params = array(
		"access_token" => $_POST['access_token'],
		"source" => "@".dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/".$_POST['img'],
		"message" => "Know a few girls (or boys!) who are #UpToNoGood? Tag your friends on the Bad Girl nicknames they match!"
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	$result = curl_exec($ch);
	curl_close();
	echo json_encode($result);
else:
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>Bad Girls Club - Season 6 - Share &amp; Tag</title>

<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body style="margin:0;padding:0;">
<div id="fb-root"></div>
<script>
var selected_img = "sites/all/themes/badgirlsclub/images/external/Bad_Girls_Club_Tag2.jpg";
var perms = null;
var access_token = null;
var uid = null;
FB.Canvas.setSize({ width: 520, height: 670 });
FB.init({
	appId  : '134126166650801',
	status : true, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml  : true  // parse XFBML
});
function share() {
	if(access_token == null || perms == null || uid == null) {
		FB.login(function (response) {
			access_token = response.session.access_token;
			perms = response.perms;
			uid = response.session.uid;
			_share();
		}, {perms: 'publish_stream'});
	} else {
		_share();
	}
}
function _share() {
	$.ajax({
		url: window.location,
		type: 'POST',
		data: 'access_token='+access_token+'&uid='+uid+'&img='+selected_img+'&internal=bgc_oxygen',
		success: function (resp) {
			console.log(resp);
		}
	});
}
</script>
<div style="position:relative; background-image: url(http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/images/external/Bad_Girls_Club_Tag.jpg); background-repeat: no-repeat; background-position: left top;height:670px;width:520px;">
<div id="sharer_button" style="position: absolute;left:360px;top:120px;height: 26px; width:120px;"><input type="button" value="Click to Share" onclick="share();"/></div>
</div>
</body>
</html>
<?endif;?>
