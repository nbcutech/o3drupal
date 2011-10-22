<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>Bad Girls Club - Season 6 - Resolution Form</title>

	<style type="text/css">
	body {
		margin: 0;
		padding: 0;
	}
	.BGC6_container {
		width: 520px;
		height: 700px;
		background-image:url(http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/images/BGC6_FB_re.jpg);
		background-repeat:no-repeat;
		background-position:left top;
		position:relative;
	}
	ul.form_holder {
		position:absolute;
		top: 295px;
		left: 134px;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 11px;
		list-style: none;
		margin: 0;
		padding: 0;
		width: 247px;
	}
	ul.form_holder li {
		height: 25px;
	}
	ul.form_holder li:hover {
		background-image:url(http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/images/highlight_bg.jpg);
		background-repeat: repeat-y;
		background-position: left top;
	}
	.BGC6_submit {
		position: absolute;
		top: 105px;
		left: 90px;
	}

	</style>
	<script type="text/javascript">
	function shareResolution(){
	var res_val = "";
		for (var i=0; i < document.resolutionForm.resolution.length; i++) {
			 if (document.resolutionForm.resolution[i].checked)
			{
				 res_val = document.resolutionForm.resolution[i].value;
			}
		}
	FB.ui({method:'stream.publish',
	      link:'http://www.facebook.com/thebadgirlsclub',
	      picture:'http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/images/bgc6_170x170.jpg',
	      caption:'Make your Bad Girl Resolution!',
	      description:'The Bad Girls are #UpToNoGood. Find out what they\'re doing this New Year\'s! The Bad Girls Club returns to Oxygen JAN 10 9/8c. ',
	      message:res_val
	      });
	}
	</script>
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.Canvas.setSize({ width: 520, height: 700 });
    FB.init({
      appId  : '141942945859476',
      status : true, // check login status
      cookie : true, // enable cookies to allow the server to access the session
      xfbml  : true  // parse XFBML
    });
  };

  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
<div class="BGC6_container">
<ul class="form_holder">
<form action="" method="post" name="resolutionForm">
<li><input type="radio" name="resolution" value="I resolve to always speak my mind!" /> I resolve to always speak my mind!</li>
<li><input type="radio" name="resolution" value="I resolve to indulge my cravings!" /> I resolve to indulge my cravings!</li>
<li><input type="radio" name="resolution" value="I resolve to kiss &amp; tell!" /> I resolve to kiss &amp; tell!</li>
<li><input type="radio" name="resolution" value="I resolve to shop 'til I drop!" /> I resolve to shop 'til I drop!</li>
<li><input class="BGC6_submit" type="image" src="http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/images/share_button.jpg" onclick="shareResolution();return false;"  />
</form>
</ul>
<a href="http://www.facebook.com/event.php?eid=153335851380997&num_event_invites=0#!/event.php?eid=153335851380997" style="width:231px; height: 22px; display: block; position: absolute; left: 139px; top: 454px;" target="_blank"></a>
<a href="http://apps.facebook.com/bgcfanstore/" style="width:137px; height: 22px; display: block; position: absolute; left: 139px; top: 487px;" target="_blank"></a>
<a href="http://bit.ly/BGCalbum" style="width:211px; height: 22px; display: block; position: absolute; left: 139px; top: 522px;" target="_blank"></a>
<a href="http://bit.ly/BGC6trailer" style="width:162px; height: 22px; display: block; position: absolute; left: 139px; top: 557px;" target="_blank"></a>
<a href="http://bit.ly/dfmQQv" style="width:182px; height: 22px; display: block; position: absolute; left: 35px; top: 666px;" target="_blank"></a>
<a href="#" onclick='FB.ui({"method":"stream.share","u":"http://facebook.com/thebadgirlsclub"});return false;' style="width:42px; height: 17px; display: block; position: absolute; left: 294px; top: 666px;"></a>
<a href="http://bit.ly/9mN48T" style="width:26px; height: 30px; display: block; position: absolute; left: 341px; top: 658px;" target="_blank"></a>
<a href="http://bit.ly/bgctwitter1" style="width:26px; height: 30px; display: block; position: absolute; left: 371px; top: 658px;" target="_blank"></a>
<a href="http://oxygen.com" style="width:38px; height: 37px; display: block; position: absolute; left: 403px; top: 655px;" target="_blank"></a>
</div>
</body>
</html>
