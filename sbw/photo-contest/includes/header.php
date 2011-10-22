<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
sTORIbook Weddings Photo Contest | Tori & Dean: sTORIbook Weddings | Oxygen</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" content="Submit your photos for sTORIbook Weddings. The show premieres on Wednesday, April 6th at 10/9c. Show Title for Web Page Title:&amp;nbsp; Tori &amp;amp; Dean: sTORIbook Weddings"/>
<?php if(!empty($_GET['pphotoId'])) {
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	$photo = mysql_fetch_assoc(mysql_query("SELECT * FROM `storibook_ugc` WHERE `name` = '{$_GET['pphotoId']}'"));
	mysql_close($conn);
?>
<meta property="og:title" content="<?php echo $photo['title']; ?>" />
<meta property="og:url" content="http://http://storibook-weddings.oxygen.com/sbw/photo-contest/index.php?ugcId=<?php echo $photo['name']; ?>" />
<meta property="og:image" content="http://storibook-weddings.oxygen.com/sbw/photo-contest/ugc/generated/thumbs/<?php echo $photo['name']; ?>.jpeg" />
<meta property="og:description" content="<?php echo $photo['description']; ?>" />
<meta property="og:site_name" content="sToribook Weddings" />
<? } ?>
<!-- Include all styles -->
<link rel="shortcut icon" href="/sites/all/themes/storibookweddings/favicon.ico" type="image/x-icon"/>
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/storibookweddings/style.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/sbw/photo-contest/openid-selector/css/openidso.css"/>
<link href="/sites/all/themes/oxygen/globalHeader.css" type="text/css" rel="stylesheet"/>
<link href="css/sbw_photo_contest.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet"/>
<link href="fileupload/jquery.fileupload-ui.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet"/>
<link href="Jcrop/css/jquery.Jcrop.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet"/>
<link href="css/openid.css" media="screen" rel="stylesheet" type="text/css" />
<!-- Include all scripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="./js/jquery.opacityrollover.js"></script>
<script type="text/javascript" src="./fileupload/jquery.fileupload.js"></script>
<script type="text/javascript" src="./fileupload/jquery.fileupload-ui.js"></script>
<script type="text/javascript" src="./Jcrop/js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="./js/jquery.form.js"></script>

<script type="text/javascript" src="js/openid-jquery.js"></script>
<script type="text/javascript" src="js/openid-en.js"></script>
<script type="text/javascript">
var authenticated = <?php echo (Login::hasIdentity()) ? "true" : "false"; ?>;
var email = <?php echo (isset($identity["properties"]["email"])) ? "'{$identity["properties"]["email"]}'" : "null";?>;
var showUpload = <?php echo (isset($_GET['upload_image'])) ? "true" : "false";?>;
var imgPath = 'images/';
$(document).ready(function() {
    openid.img_path = imgPath;
    openid.init('openid_identifier');
    openid.setDemoMode(false); //Stops form submission for client javascript-only test purposes

});
</script>
<script type="text/javascript" src="./js/gallery.js?d=<?php echo time(); ?> "></script>
<script src="http://www.nbcudigitaladops.com/hosted/global_header.js"></script>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/OxygenUtils.js"></script>
<!-- Handle OpenID -->
<!-- IE PNG FIX -->
<!--[if lt IE 7]>
            <script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);
              var BlankImgPath = "/sites/all/modules/pngbehave";
 	    </script>
        <style type="text/css">.png { behavior: url(/sites/all/modules/pngbehave/iepngfix.htc)} </style>
        <script type="text/javascript" src="/sites/all/modules/pngbehave/iepngfix_tilebg.js"></script>
<![endif]-->
</head>
<body>
<div id="mainBg">
	<div id="container">
		<div id="oxyHeader">
			<div id="topHeaderHalf" style="background-color: #000000;">
				<div id="Oxygenlogo" style="padding:0 0 0 450px;">
					<span style="display:none;">Oxygen</span>
					<a href="http://www.oxygen.com/"><img src="http://www.oxygen.com/common/images/_global2010/oxygen_logo_copy.jpg" alt="" width="120" height="90" border="0"/></a>
				</div>
				<ul id="globalNav">
					<!--Global Navigation-->
					<li class="navHome"><a href="http://www.oxygen.com" style="display:block;height:45px;width:28px;text-indent:-9999px">Home</a></li>
					<li class="navShows"><a href="http://oxygen.com/tvshows/" style="display:block;height:45px;width:100px;text-indent:-9999px">Shows</a></li>
					<li class="navBlogs"><a href="#" style="display:block;height:45px;width:98px;text-indent:-9999px">Blogs</a>
					<!-- subnav -->
					<ul id="subnav_blogs" class="subnav">
						<li style="width:140px;margin-left:135px;"><a href="http://bad-girls-club.oxygen.com/blogs/bgc">BAD&nbsp;GIRLS&nbsp;CLUB:&nbsp;LA</a></li>
						<li style="width:108px;"><a href="http://tori-and-dean.oxygen.com/blogs/td">TORI&nbsp;&amp;&nbsp;DEAN</a></li>
						<li style="width:195px;"><a href="http://hair-battle-spectacular.oxygen.com/blogs/hbs">HAIR&nbsp;BATTLE&nbsp;SPECTACULAR</a></li>
						<li style="width:125px;"><a href="http://jersey-couture.oxygen.com/blogs/jerseycouture">JERSEY&nbsp;COUTURE</a></li>
						<li><a href="http://dyao.oxygen.com/blogs/dyao">DANCE&nbsp;YOUR&nbsp;A**&nbsp;OFF</a></li>
					</ul>
					<!-- end subnav -->
					</li>
					<li class="navPhotos"><a href="http://photos.oxygen.com/" style="display:block;height:45px;width:115px;text-indent:-9999px">Photos</a></li>
					<li class="navVideos"><a href="http://video.oxygen.com/" style="display:block;height:45px;width:107px;text-indent:-9999px">Video</a></li>
					<li class="navFullEps"><a href="http://www.oxygen.com/full-episodes" style="display:block;height:45px;width:214px;text-indent:-9999px">Full Episodes</a></li>
				</ul>
			</div>
			<!-- end topHeaderHalf -->
			<div id="bottomHeaderHalf" style="width:984px; margin-left:0px;">
				<ul id="globalSubNav" style="width:984px;">
					<li class="navSchedule"><a href="http://www.oxygen.com/schedule">Schedule</a></li>
					<li class="navBoards"><a href="http://forums.oxygen.com">Message Boards</a></li>
					<li class="navGames"><a href="http://www.oxygen.com/games/">Games</a></li>
					<li class="navShop"><a href="http://www.shopoholic.com">Shop</a></li>
					<li class="navMobile"><a href="http://www.oxygen.com/mobile">Mobile</a></li>
					<li>
					<form method="post" action="http://search.oxygen.com/search-redirect">
						<input type="text" name="s" style="font-size:9px;margin:8px 0 0 66px;padding:2px 0px;float:left;display:inline;background-color:#fcfcfc;width:170px;height:8px;border:none;" maxlength="254">
						<input id="searchBtn" type="image" id="goButton" name="btnG" value="Search" src="http://www.oxygen.com/common/images/_global/navigation/search_icon.gif" width="24" height="12">
					</form>
					</li>
				</ul>
				<div id="adExpander">
					<!--Begin Top AD 728x90-->
					<div id="topAdBlock">
						<!--Begin Top AD 728x90-->
						<div id="block-oxygen_dart-0" class="png block-oxygen_dart">
							<script type="text/javascript" language="javascript">//<![CDATA[
					document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://iv.doubleclick.net/adj/nbcu.oxygen/oxygen_toridean;;site=oxygen;sect=storibook;sub=ugcphotos;dcopt=ist;!category=oxygen!category=home;sz=728x90,970x66;tile=1;pos=1;' + (top.__nbcudigitaladops_dtparams||'') + 'ord=' + randDARTNumber + '?"></scr' + 'ipt>');//]]></script>
							<noscript>
							<a target='_blank' href='http://iv.doubleclick.net/jump/nbcu.oxygen/oxygen_toridean;;site=oxygen;sect=storibook;sub=ugcphotos;dcopt=ist;!category=oxygen!category=home;sz=728x90;tile=1;pos=1;ord=123456a?'><img src='http://iv.doubleclick.net/ad/nbcu.oxygen/oxygen_toridean;;site=oxygen;sect=storibook;sub=ugcphotos;dcopt=ist;!category=oxygen!category=home;sz=728x90,970x66;tile=1;pos=1;ord=123456a?' border='0' alt=''/></a>
							</noscript>
						</div>
					</div>
					<div id='dart_string_728x90' style='display:none'>
						oxygen_toridean;;site=oxygen;sect=storibook;sub=ugcphotos;dcopt=ist;!category=oxygen!category=home;sz=728x90;tile=1;pos=1;ord=
					</div>
					<div>
						<div>
						</div>
						<!--End Top 728x90-->
					</div>
					<!--End Top 728x90-->
				</div>
			</div>
			<!-- End bottomHeaderHalf-->
		</div>
		<!-- end OxyHeader -->
		<div id="micrositeHeader">
			<img src="/sites/all/themes/storibookweddings/images/TD_header.jpg"/>
		</div>
		<div id="micrositeMenu">
		<div id="micrositeMenuCenter">
		<div id="navHome">
		<a href="/">Tori &amp; Dean sTORIbook Weddings Home</a>
		</div>
		<div id="navPlanners">
		<a href="/meet-the-planners-sbw">Meet the Planners - Tori &amp; Dean sTORIbook Weddings</a>
		</div>
		<div id="navCouples">
		<a href="/meet-the-couples-sbw">Meet the Couples - Tori &amp; Dean sTORIbook Weddings</a>
		</div>		
		<div id="navPhotos">
		<a href="/sbw-photo-gallery-redirect-page">Tori &amp; Dean sTORIbook Weddings Photo Gallery</a>
		</div>
		<div id="navVideos">
		<a href="http://video.oxygen.com/shows/storibook_weddings">Tori &amp; Dean sTORIbook Weddings Videos</a>
		</div>
		<div id="navBlogs">
		<a href="/blogs/sbw">Tori &amp; Dean sTORIbook Weddings Blogs</a>
		</div>
		<div id="navBoards">
		<a href="http://forums.oxygen.com/index.php?showforum=33">Chat On The Tori &amp; Dean sTORIbook Weddings Message Boards</a>
		</div>
		<div id="navOxy">
		<a href="http://www.oxygenlive.com/event.php?show=storibookweddings&coast=EC">Tori &amp; Dean sTORIbook Weddings on OxygenLive</a>
		</div>
		<div id="navPhotoContest">
		<a href="http://storibook-weddings.oxygen.com/sbw/photo-contest">Tori &amp; Dean sTORIbook Weddings Photo Contest</a>
		</div>
		<div id="navAbout">
		<a href="/about-sbw">About Tori &amp; Dean sTORIbook Weddings</a>
		</div>
		<div id="navShop">
		<a href="http://www.shopoholic.com" target="_blank">Tori &amp; Dean sTORIbook Weddings Shop</a>
		</div>
			</div>
		</div>