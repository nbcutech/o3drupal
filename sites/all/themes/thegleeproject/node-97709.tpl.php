<?
$weeksNav = '';
$weeksOptions = '';
$selected = '';
$on = '';

$weeklyEpisodes = array(
	'week-5' => '2011-07-17 21:00:00',
	'week-6' => '2011-07-24 21:00:00',
	'week-7' => '2011-07-31 21:00:00',
	'week-8' => '2011-08-07 21:00:00',
	'week-9' => '2011-08-14 21:00:00',
	'week-10' => '2011-08-21 21:00:00',
	'week-11' => '2011-08-28 21:00:00'
);

$currentTime = time();

if($currentTime > strtotime($weeklyEpisodes['week-5'])){ $weekToShow = 5; }

if($currentTime > strtotime($weeklyEpisodes['week-6'])){ $weekToShow = 6; }

if($currentTime > strtotime($weeklyEpisodes['week-7'])){ $weekToShow = 7; }

if($currentTime > strtotime($weeklyEpisodes['week-8'])){ $weekToShow = 8; }

if($currentTime > strtotime($weeklyEpisodes['week-9'])){ $weekToShow = 9; }

if($currentTime > strtotime($weeklyEpisodes['week-10'])){ $weekToShow = 10; }

if($currentTime > strtotime($weeklyEpisodes['week-11'])){ $weekToShow = 11; }

switch($_GET['week']){
	case '10':
		$level = '1347391';
		$TGP_theme = 'Glee-ality';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '9':
		$level = '1346816';
		$TGP_theme = 'Generosity';
		$twitterShare = '#TheGleeProject contenders demonstrated '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '8':
		$level = '1345287';
		$TGP_theme = 'Believability';
		$twitterShare = '#TheGleeProject contenders practiced their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '7':
		$level = '1343143';
		$TGP_theme = 'Sexuality';
		$twitterShare = '#TheGleeProject contenders got in touch with their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '6':
		$level = '1341844';
		$TGP_theme = 'Tenacity';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '5':
		$level = '1341086';
		$TGP_theme = 'Pairability';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '4':
		$level = '1339352';
		$TGP_theme = 'Danceability';
		$week4on = 'on';
		$week4selected = 'selected';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '3':
		$level = '1335780'; //'1336013';
		$TGP_theme = 'Vulnerability';
		$week3on = 'on';
		$week3selected = 'selected';
		$twitterShare = '#TheGleeProject contenders embraced their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '2':
		$level = '1334426';
		$TGP_theme = 'Theatricality';
		$week2on = 'on';
		$week2selected = 'selected';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
	case '1':
	default:
		$level = '1333455'; //'1332934';
		$TGP_theme = 'Individuality';
		$week1on = 'on';
		$week1selected = 'selected';
		$twitterShare = '#TheGleeProject contenders showed off their '.$TGP_theme.', now show off yours! More info: ';
		break;
}

$TGP_themes = array('','Individuality','Theatricality','Vulnerability','Danceability','Pairability','Tenacity','Sexuality','Believability','Generosity','Glee-ality');

for($i=1; $i<=$weekToShow; $i++){
	if($_GET['week'] == $i){
		$selected = 'selected';
		$on = 'on';
	}else{
		$selected = '';
		$on = '';
	}
	
	$weeksNav .= '<a href="/homework-neutrogena?week='.$i.'" title="Week '.$i.': '.$TGP_themes[$i].'" class="'.$on.'">Week '.$i.':<span>'.$TGP_themes[$i].'</span></a>';
	$weeksOptions .= '<option value="week-'.$i.'" '.$selected.'>Week '.$i.':</option>';
}

?>

<!-- <?=time().'-'.date("Y-m-d H:i:s"); ?> -->
<div id="node-<?php print $node->nid; ?>">
  <div class="content clear-block">
  
	<style type="text/css" media="screen">
		@import url( '/sites/all/themes/thegleeproject/tgp/tgp2.css' );
		@import url( /sites/all/themes/thegleeproject/tgp/openid.css );
	</style>
	<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/tgp/js/flowplayer-3.2.6.min.js"></script>
	<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/tgp/js/openid-jquery.js"></script>
	<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/tgp/js/openid-en.js"></script>
	<script type="text/javascript" src="/sites/all/themes/thegleeproject/jquery.modaldialog.js"></script>
	<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/tgp/js/tgp-homework.js?v1"></script>
	<div class="assignment-top">
		<div class="weeks-listing"><!--<a href="/homework-neutrogena?week=1" title="Week 1: Individuality" class="<?=$week1on?>">Week 1:<span>Individuality</span></a><a href="/homework-neutrogena?week=2" title="Week 2: Theatricality" class="<?=$week2on?>">Week 2:<span>Theatricality</span></a><a href="/homework-neutrogena?week=3" title="Week 3: Vulnerability" class="<?=$week3on?>">Week 3:<span>Vulnerability</span></a><a href="/homework-neutrogena?week=4" title="Week 4: Danceability" class="<?=$week4on?>">Week 4:<span>Danceability</span></a>--><?=$weeksNav?></div>
		<div class="week-title"><?=$TGP_themes[$_GET['week']]?></div>
		<div class="video-container">
<!-- Outlet Player Start -->

<div class="videoHolder" style="background-color:#000;width:281px;height:243px;margin-bottom:10px;">
	<div id="videoplayer"><!-- Video playerplaceholder --></div>
	<div id="moreVideoBtn"><a href="http://video.oxygen.com/"><img src="/sites/all/themes/thegleeproject/images/moreVideoBtn.jpg" width="281" height="23" border="0"></a></div>       
	<div style="background-color:#000;padding:5px;width:310px;height:15px; display:none"><div id="metadataTitle" style="font-size:12px;color:#fff;"></div></div>
</div>

<script src="http://www.oxygen.com/js/objects/swfObject-1.5.js" type="text/javascript"></script>
<script type="text/javascript">
var player;
var contentMetadataDAO;
function onOutletEvent(e){
	if(e.type == "outletInited"){
		player = Outlet.getOutletExtension("embeddedPlayer");
		
		var contentMetadataDAO = Outlet.getOutletExtension("contentMetadataDAOID");
		contentMetadataDAO.addEventListener("CONTENT_METADATA.clip_info_update", onUpdate);
	}
}

function onUpdate(e){
	$("#metadataTitle").html(player.getMetaData().properties.headline);
}

 	var so = new SWFObject(
		"http://video.nbcuni.com/outlet/embed/OutletEmbeddedPlayerLoader.swf",
		"OutletEmbeddedPlayerLoader", "281", "243", "9", "#000000");
		so.addParam("allowFullScreen", "true");
		so.addParam("allowScriptAccess", "always");
		so.addParam("quality", "high");
	
		so.addVariable("configUrl", "http://video.nbcuni.com/PlayerConfig/oxygen/320x247_outlet_config.xml");
		so.addVariable("starter", "embeddedPlayer");
		so.addVariable("configID", "27004");
		so.addVariable("adCanvasWidth", "261");
		so.addVariable("adCanvasHeight", "220");
		so.addVariable("rssURL", "http://video.oxygen.com/player/feeds/?level=<?=$level?>%26showall=1%26type=placement");
			  so.addParam("wmode", "transparent");
		so.addVariable("loopType", "continuousLoop");
		so.addVariable("autoAdvance", "true");	
		so.addVariable("companionContainerID", "companion_281x243");
		so.addVariable("videoControls", "http://video.nbcuni.com/outlet/extensions/impd_controls/styles/usa_outlet.swf");

		so.write("videoplayer");

</script>
<!-- Outlet Player End -->

		</div>
		<div class="share-fb-twitter">
			<div class="left">
				<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
			</div>
			<div class="right">
				<a href="" class="twitter-share-button" data-count="none" data-text="Vote for your fav #TheGleeProject contender in the Bing Fan Favorite poll now: " data-via="TheGleeProject" >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		  </div>
		</div>
		<div class="add-your-homework"><a href="#add-homework">&nbsp;</a></div>
	</div>
	<div class="assignment-comments-container">
		<a name="add-homework"></a>
		<div class="week-chooser">
			<select name="week" id="week"><!--<option value="week-1" <?=$week1selected?> >Week 1:</option><option value="week-2" <?=$week2selected?> >Week 2:</option><option value="week-3" <?=$week3selected?> >Week 3:</option><option value="week-4" <?=$week4selected?> >Week 4:</option>--><?=$weeksOptions?></select>
		</div>
		<div class="comment-form">
			<div class="comment-buttons"><a href="#signin-facebook" class="facebook"><span>Facebook</span></a> <a href="#signin-twitter" class="twitter"><span>Twitter</span></a> <a href="#signin-email" class="email"><span>Email</span></a></div>
			<textarea name="my-comment" id="my-comment" onkeyup="return tgp_my_comment(this.value)" readonly="readonly"></textarea>
			<div class="chars-left"><span>-</span> characters left
	<div class="autopost"><input type="checkbox" name="autopost" id="autopost" value="1" /> Post to my <strong>twitter</strong></div></div>
			<div class="submit-button" id="TGP_submit_button" style="display:none">
				<input type="image" src="/sites/all/themes/thegleeproject/tgp/images/add-to-stream-button.jpg" name="submit-button" id="submit_comment" />
				<input type="hidden" name="signin_type" id="signin_type" value="" />
			</div>
		</div>
		<div class="comment-stream"><!-- <?=time() ?>-->
			<? //=TGP_Comments::view() ?>
		</div>
		<div style="display:none">
			<div class="email-signin-form2">
				<a href="#close" class="cancel-email"> X </a>
				<div class="inner">
					<p>Screen Name:<br /><input type="text" class="text" name="screenName" id="screenName" /></p>
					<p>From (email address):<br /><input type="text" class="text" name="fromEmail" id="fromEmail" /></p>
					<p>To (email address):<br /><input type="text" class="text" name="toEmail" id="toEmail" /></p>
					<p style="text-align:center"><br /><input type="button" name="set-email" id="set-email" value="  Submit  " /> &nbsp; &nbsp; <input type="button" name="cancel-email" class="cancel-email" value="  Cancel  " /></p>
				</div>
			</div>
		</div>
		<div style="display:none">			
			<div id="openid-form" class="email-signin-form">
				<a href="#close" id="cancel-email"> X </a>
				<form action="/tgp/authenticate.php" method="get" id="openid_form">
					<input type="hidden" name="action" value="verify" />
					<fieldset>
						<legend>Sign-in or Create New Account</legend>
						<div id="openid_choice">
			
							<p>Please click your account provider:</p>
							<div id="openid_btns"></div>
						</div>
						<div id="openid_input_area">
							<input id="openid_identifier" name="openid_identifier" type="text" value="http://" />
							<input id="openid_submit" type="submit" value="Sign-In"/>
						</div>
						<noscript>
							<p>OpenID is service that allows you to log-on to many different websites using a single indentity.
							Find out <a href="http://openid.net/what/">more about OpenID</a> and <a href="http://openid.net/get/">how to get an OpenID enabled account</a>.</p>
						</noscript>
			
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script src="http://core.insightexpressai.com/adServer/adServerESI.aspx?bannerID=179265"></script>

  </div>
</div>
