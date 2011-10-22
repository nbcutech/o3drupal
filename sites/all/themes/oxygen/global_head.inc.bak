<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml"
			xmlns:meebo="http://www.meebo.com/">
<head>
<?php $pot = base_path() . path_to_theme(); ?>
<title>
<?php 
	/***************************add page title for cookstr section************************/
 
	if(preg_match('(^\/recipes\/)',$_SERVER['REDIRECT_URL'])){print "Dinners, Desserts, Drinks, and Other Recipes ";} 
	if(preg_match('(^\/recipes$)',$_SERVER['REDIRECT_URL'])){print "Dinners, Desserts, Drinks, and Other Recipes ";} 

	/***************************add page title for search section************************/
	if(preg_match('(search\.oxygen\.com)',$_SERVER['HTTP_HOST'])){print "Search Results" ;} 

	/***************************add page title for photos hub************************/
	if(preg_match('(^\/galleries\/)',$_SERVER['REDIRECT_URL'])){print "Oxygen Photo Gallery Hub" ;} 
?>

<?php print $title ?> | <?php
global $theme_key;
switch($node->type) {
    case "photos":
        print "Photo Gallery on Oxygen | Pictures, Photos | ";
        break;
    case "bios":
	if ($theme_key=='torianddean'){print "Tori Spelling, Dean McDermott, Liam McDermott, Stella McDermott Bios | ";}
        break;
    case "bios_cast":
	if ($theme_key=='torianddean'){print "Bios, Biography | ";}
	if ($theme_key=='danceyourassoff'){print "Contestants Bios, Biography | ";}
        break;
    case "dyao_fit_club":
	print "Fit Club, Fitness Articles, Personal Stories, and Recipes | ";
	break;
    case "dyao_calculator":
	print "Fit Club, Fitness Calculators | ";
	break;
    case "dyao_recipes":
	print "Fit Club Recipes | ";
	break;
    case "ivillage_article_feed":
	print "Fit Club, Fitness Articles | ";
	break;
    case "ivillage_story_feed":
	print "Fit Club, Fitness Stories | ";
	break;
	case "obsessed":
	print "Obsessed : Things We Love |";
	break;

    case "about":
        break;
}
?>

<?php 
/*	if ($node->field_web_title[0][view]) print $node->field_web_title[0][view] */
	$webpage_title_taxonomy = $node->field_web_title[0][value]; //taxonomy value for the web page title
	$webpage_title_value = $node->taxonomy[$webpage_title_taxonomy]->name;
	if ($webpage_title_taxonomy > 0) print $webpage_title_value . " | "; ?>Oxygen</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
 
	<?php print $head ?>
	<?php print $styles ?>
	<?php print $scripts ?>

<!-- 9-13-11 pulled fb:admins tag out of conditional to apply to all pages; using developer account ID -->	
<meta property="fb:admins" content="100002282751705" />
	
<?php
$og_location = $_SERVER ['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
$nodes = nodequeue_load_nodes($node->field_nodequeue_id[0]["value"], FALSE, 0, 0);
if ($nodes [0]->images ["_original"]) {
$FB_image_source = "http://" . $_SERVER ['SERVER_NAME'] . "/" . $nodes [0]->images ["_original"];
} elseif (preg_match("/\/meet-the-cast-gleeproj\//i", $og_location) == 1) {
$FB_image_source = "http://oxygen.com/tvshows/images/TGP_182x122.jpg";
} else {
$FB_image_source = "http://www.oxygen.com/common/images/_global2010/oxygen_logo_copy.jpg";
}
if ($nodes [0]->body) {
$FB_description = strip_tags($nodes [0]->body);
$FB_description = truncate($FB_description,80);
} elseif (preg_match("/\/meet-the-cast-gleeproj\//i", $og_location) == 1) {
$FB_description = $title . ", a contender on The Glee Project!";
} else {
$FB_description = "Presented by Oxygen.com";
}
 
 if($node->nid==102991) {
 	print '	<meta name="description" content="Vote for the Glam Slam fantasy hairstyle that you think should have won this week."></meta>';
 	print '<meta property="og:url" content="http://bit.ly/DoOverF"></meta>';
}
if($node->nid==102992) {
	global $meta_title;
 	print '	<meta name="description" content="Vote for the Glam Slam fantasy hairstyle that you think should have won this week.."></meta>';
 	print '<meta property="og:title" content="' . $meta_title . '" />';
 	print '<meta property="og:url" content="http://bit.ly/DoOverF"></meta>';
}

if($node->nid==103382) {
	print '<meta property="og:title" content="Find out who won the Bing Fan Favorite!"></meta>
				 <meta property="og:url" content="http://bit.ly/FanFavWf"></meta>
				 <meta name="description" content="Check out the winner\'s performance & interview now." />';
}

if (preg_match("/\/photos\//i", $og_location) == 1 || preg_match("/\/meet-the-cast-gleeproj\//i", $og_location) == 1) {
print '<meta property="og:title" content="' . $title . '" />
<meta property="og:type" content="article" />
<meta property="og:image" content="' . $FB_image_source . '" />
<meta property="og:url" content="http://' . $og_location . '" />
<meta property="og:site_name" content="' .$webpage_title_value . '" />
<meta property="og:description" content="' . $FB_description . '" />
';
}

if(strpos($_SERVER ['REQUEST_URI'],'/homework-neutrogena') !== false){
	//Variable pulled from page-node-97709.tpl.php :: anelson
	echo $TGP_Homework_Facebook_metatags;
}

if(strpos($_SERVER ['REQUEST_URI'],'/contender-call') !== false){
	//Variable pulled from page-node-100596.tpl.php :: anelson
	echo $TGP_Contender_Call_Facebook_metatags;
}

if(strpos($_SERVER ['REQUEST_URI'],'/bad-girls-club-talent-call-sweepstakes') !== false){
	//Variable pulled from page-node-102120.tpl.php :: anelson
	echo $BGC_Talent_Call_Facebook_metatags;
}

/* obssessed tracking pixel for listerine */

if(strpos($_SERVER ['REQUEST_URI'],'/obsessed') !== false){

echo '<script src="http://core.insightexpressai.com/adServer/adServerESI.aspx?bannerID=179033"></script />';


}
?>

<script type="text/javascript" src="/sites/all/themes/oxygen/js/OxygenUtils.js"></script>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/railsAd_showsite.js?k"></script>
<link href="/sites/all/themes/oxygen/globalHeader.css" type="text/css" rel="stylesheet" />
<?php
	/* Adding custom css for admin tabs */
	global $user;
	if (in_array('site administrator', array_values($user->roles))) {
		print '<link href="/sites/all/themes/oxygen/oxy_admin.css" type="text/css" rel="stylesheet" />';
	}
?>

<?php
	if ($node->type=="photos")
	{
		print '<link rel="alternate" title="Oxygen Photo Gallery Feed" href="/photos/rss/' . $node->nid . '.xml" type="application/rss+xml" />';
		// $node->field_nodequeue_id[0]['value'];
	}
	
	if ($node->type=="blog")
	{
		db_query('INSERT INTO node_track_blog_hits (nid, timestamp) VALUES ("' . arg(1) . '", "' . time() . '")');
	}
	
if(strpos($_SERVER['SERVER_NAME'],'thegleeproject.oxygen.com') !== false) {
	print("
<script type='text/javascript' src='http://static.meteorsolutions.com/metsol.js'></script>
<script type='text/javascript'>
meteor.tracking.track('271f87b6-85ee-467d-87d0-a61dc4dcdf92', {'url_storage_source': 'hash', 'query_string_tag_key': ['cid', 'mtag']});
meteor.orion.init();
</script>
	");
}


?>


</head>
<body>
<script src="http://www.nbcudigitaladops.com/hosted/global_header.js"></script> 
<? if($_SERVER['HTTP_HOST'] == 'bad-girls-club.oxygen.com'): ?>

<script type="text/javascript">
window.Meebo||function(c){function p(){return["<",i,' onload="var d=',g,";d.getElementsByTagName('head')[0].",
j,"(d.",h,"('script')).",k,"='//cim.meebo.com/cim?iv=",a.v,"&",q,"=",c[q],c[l]?
"&"+l+"="+c[l]:"",c[e]?"&"+e+"="+c[e]:"","'\"></",i,">"].join("")}var f=window,
a=f.Meebo=f.Meebo||function(){(a._=a._||[]).push(arguments)},d=document,i="body",
m=d[i],r;if(!m){r=arguments.callee;return setTimeout(function(){r(c)},100)}a.$=
{0:+new Date};a.T=function(u){a.$[u]=new Date-a.$[0]};a.v=5;var j="appendChild",
h="createElement",k="src",l="lang",q="network",e="domain",n=d[h]("div"),v=n[j](d[h]("m")),
b=d[h]("iframe"),g="document",o,s=function(){a.T("load");a("load")};f.addEventListener?
f.addEventListener("load",s,false):f.attachEvent("onload",s);n.style.display="none";
m.insertBefore(n,m.firstChild).id="meebo";b.frameBorder="0";b.name=b.id="meebo-iframe";
b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=
d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=
b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,
'\\"')+'");d.close();'}a.T(1)}({network:"badgirlsclub"});
</script>

<? endif; ?>
<div id="mainBg">
  <div id="container">
    <div id="oxyHeader">
				<div id="topHeaderHalf" style="background-color: #000000;">
					<div id="Oxygenlogo" style="padding:0 0 0 450px;">
						<span style="display:none;">Oxygen</span>

						<a href="http://www.oxygen.com/"><img src="http://www.oxygen.com/common/images/_global2010/oxygen_logo_copy.jpg" alt="" width="120" height="90" border="0"/></a>
					</div>
					<ul id="globalNav"><!--Global Navigation-->
	
						<li class="navHome"><a href="http://www.oxygen.com" style="display:block;height:45px;width:28px;text-indent:-9999px">Home</a></li>
						<li class="navShows"><a href="http://oxygen.com/tvshows/" style="display:block;height:45px;width:100px;text-indent:-9999px">Shows</a></li>
						<li class="navBlogs"><a href="http://features.oxygen.com/allsite-blogs" style="display:block;height:45px;width:98px;text-indent:-9999px">Blogs</a></li>
						<li class="navPhotos"><a href="http://photos.oxygen.com/" style="display:block;height:45px;width:115px;text-indent:-9999px">Photos</a></li>
						<li class="navVideos"><a href="http://video.oxygen.com/" style="display:block;height:45px;width:107px;text-indent:-9999px">Video</a></li>
						<li class="navFullEps"><a href="http://www.oxygen.com/full-episodes" style="display:block;height:45px;width:214px;text-indent:-9999px">Full Episodes</a></li>
					</ul>
				</div>	<!-- end topHeaderHalf -->
				<div id="bottomHeaderHalf" style="width:984px; margin-left:0px;">
					<ul id="globalSubNav" style="width:984px;">

						<li class="navSchedule"><a href="http://www.oxygen.com/schedule">Schedule</a></li>
						<li class="navBoards"><a href="http://forums.oxygen.com">Message Boards</a></li>					
						<li class="navGames"><a href="http://www.oxygen.com/games/">Games</a></li>
						<li class="navShop"><a href="http://www.shopoholic.com">Shop</a></li>						
						<li class="navMobile"><a href="http://www.oxygen.com/mobile">Mobile</a></li>	
						<li><form method="post" action="http://search.oxygen.com/search-redirect">
								<input   type="text" name="s" style="font-size:9px;margin:8px 0 0 66px;padding:2px 0px;float:left;display:inline;background-color:#fcfcfc;width:170px;height:8px;border:none;" maxlength="254">
								<input id="searchBtn" type="image" id="goButton" name="btnG" value="Search" src="http://www.oxygen.com/common/images/_global/navigation/search_icon.gif" width="24" height="12">

							</form>	</li>					
					<!-- 	<div class="navGames"><a href="http://www.oxygen.com/schedule">Games</a></div>										
						<div class="navShop"><a href="http://www.oxygen.com/schedule">Shop</a></div>															
						<div class="navMobile"><a href="http://www.oxygen.com/schedule">Mobile</a></div> -->
						<!-- <div class="globalSearch"> 
							<span style="float:left;width:80px;">search here</span>
							<form method="post" action="http://search.oxygen.com/search-redirect">
								<input   type="text" name="s" style="margin:0px;padding:2px 0px;float:left;display:inline;background-color:#fcfcfc;width:280px;height:20px;border:none; text-align: center;" maxlength="254">
								<input id="searchBtn" type="image" id="goButton" name="btnG" value="Search" src="http://www.oxygen.com/common/images/_global/navigation/searchBtn.gif" width="35" height="20">
							</form>							
								 
						</div> --><!-- end global search -->
					
					</ul>
	
					<div id="adExpander">
						<!--Begin Top AD 728x90-->
		<div id="topAdBlock">
		    <!--Begin Top AD 728x90-->
		     <?php print $topAdBlock ?>
		    <!--End Top 728x90--> 
		</div>
						<!--End Top 728x90-->	
					
					</div>
				</div> <!-- End bottomHeaderHalf-->
			</div> <!-- end OxyHeader -->
			

    


    

