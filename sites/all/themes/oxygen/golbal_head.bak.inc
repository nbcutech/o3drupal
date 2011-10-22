<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php $pot = base_path() . path_to_theme(); ?>
<title><?php print $node->title ?> | <?php
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
?><?php if ($node->field_web_title[0][view]) print $node->field_web_title[0][view] . " | "; ?>Oxygen</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
 
	<?php print $head ?>
	<?php print $styles ?>
	<?php print $scripts ?>

<script type="text/javascript" src="/sites/all/themes/oxygen/js/OxygenUtils.js"></script>
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

?>

 

</head>
<body>
<script src="http://www.nbcudigitaladops.com/hosted/global_header.js"></script> 
<div id="mainBg">
  <div id="container">
    <div id="header">
	<div id="logo"><h2 style="margin:0px;padding:0px;"><span style="display:none;">Oxygen</span></h2><a href="http://www.oxygen.com/"><img class="png" src="/<?php  $oxygen = drupal_get_path('theme', 'oxygen'); print $oxygen;?>/images/logo.png" alt="Oxygen" width="145" height="101" border="0"/></a></div>
	
	
	
	
	
	 <div class="globalSearch"> <span style="float:left;width:80px;">search here</span>
	    <form method="get" action="http://66.77.103.204/search">
		<input type="text" name="q" style="margin:0px;padding:2px 0px;float:left;display:inline;background-color:#fcfcfc;width:280px;height:20px;border:none;" maxlength="254">
		<input id="searchBtn" type="image" id="goButton" name="btnG" value="Search" src="<?php print $pot;?>/images/searchBtn.gif" width="35" height="20">
		<input type="hidden" name="site" value="O2_Col">
		<input type="hidden" name="client" value="default_frontend">
		<input type="hidden" name="output" value="xml_no_dtd">
		<input type="hidden" name="proxystylesheet" value="default_frontend">
	    </form>            
	</div>
	<div id="positioner" style="height:90px;">&nbsp;</div>
	<ul id="globalNav"><!--Global Navigation-->
 
	    <li class="global_navHome"><a href="http://www.oxygen.com/default.aspx">Home</a></li>
	    <li class="global_navShows"><a href="http://www.oxygen.com/tvshows/">Shows</a></li>
	    <li class="global_navMovies"><a href="http://www.oxygen.com/movies/">Movies</a></li>
	    <li class="global_navSchedule"><a href="http://www.oxygen.com/schedule/">Schedule</a></li>
	    <li class="global_navVideo"><a href="http://o2.oxygen.com/">Video</a></li>
	    <li class="global_navMusic"><a href="http://www.oxygen.com/soundslikeoxygen/">Music</a></li>
	    <li class="global_navGames"><a href="http://www.oxygen.com/games/">Games</a></li>
	    <li class="global_navQuizzes"><a href="http://quiz.oxygen.com/">Games</a></li>
	    <li class="global_navCommunity"><a href="http://forums.oxygen.com/">Community</a></li>
	    <li class="global_navShop"><a href="http://shop.oxygen.com">Shop</a></li>
	    <li class="global_moreOxygen"><a href="#">More Oxygen</a>
		    <ul id="sub_menu">
			<li class="global_navTweet"><a href="http://www.tweetoverse.com">Tweet</a></li>
			<li class="global_navHormones"><a href="http://www.hormoneoscope.com/">Hormonoscope</a></li>
			<li class="global_navMobile"><a href="http://www.oxygen.com/mobile/">Mobile</a></li>
			<li class="global_navSweeps"><a href="http://www.oxygen.com/sweepstakes/">Sweepstakes</a></li>
			<li class="global_navNewsletter"><a href="http://www.oxygen.com/newsletter/">Newsletter</a></li>
			<li class="global_navWidgets"><a href="http://www.oxygen.com/widgets/">Widgets</a></li>
		    </ul>
	    </li>
	</ul>
    </div>
   
    <div id="adExpander">
		<div id="topAdBlock">
		    <!--Begin Top AD 728x90-->
		     <?php print $topAdBlock ?>
		    <!--End Top 728x90--> 
		</div>
    </div>  
 
   
    <script type="text/javascript"> 
    var sfEls = document.getElementById("sub_menu");
    sfEls.parentNode.onmouseover=function() {
     sfEls.style.display="block";
    }
    sfEls.parentNode.onmouseout=function() {
     sfEls.style.display="none";
    }
   </script>
	


    

