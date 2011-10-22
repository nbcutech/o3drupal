<?php

/**
 * Implementation of hook_default_page_manager_pages().
 */
function oxygen_drupal_homepage_default_page_manager_pages() {
  $export = array();
$page = new stdClass;
$page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
$page->api_version = 1;
$page->name = 'homepage_oxygen';
$page->task = 'page';
$page->admin_title = 'Oxygen Home Page';
$page->admin_description = 'Drupal version of Oxygen homepage';
$page->path = 'node/homepage-oxygen';
$page->access = array();
$page->menu = array();
$page->arguments = array();
$page->conf = array();
$page->default_handlers = array();
$handler = new stdClass;
$handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
$handler->api_version = 1;
$handler->name = 'page_homepage_oxygen_panel_context';
$handler->task = 'page';
$handler->subtask = 'homepage_oxygen';
$handler->handler = 'panel_context';
$handler->weight = 0;
$handler->conf = array(
  'title' => 'Panel',
  'no_blocks' => 0,
  'pipeline' => 'standard',
  'css_id' => 'oxygen-homepage',
  'css' => '',
  'contexts' => array(),
  'relationships' => array(),
);
$display = new panels_display;
$display->layout = 'twocol';
$display->layout_settings = array();
$display->panel_settings = array(
  'style_settings' => array(
    'default' => NULL,
    'center' => NULL,
    'left' => NULL,
    'right' => NULL,
  ),
);
$display->cache = array();
$display->title = 'Home Page | Online TV Shows | Reality TV Shows | Stars & Fans | Live Out Loud, Oxygen ';
$display->content = array();
$display->panels = array();
  $pane = new stdClass;
  $pane->pid = 'new-1';
  $pane->panel = 'left';
  $pane->type = 'block';
  $pane->subtype = 'promo-20';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $display->content['new-1'] = $pane;
  $display->panels['left'][0] = 'new-1';
  $pane = new stdClass;
  $pane->pid = 'new-2';
  $pane->panel = 'left';
  $pane->type = 'block';
  $pane->subtype = 'block-102';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $display->content['new-2'] = $pane;
  $display->panels['left'][1] = 'new-2';
  $pane = new stdClass;
  $pane->pid = 'new-3';
  $pane->panel = 'left';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Video Player Column',
    'title' => '',
    'body' => '<div id="videoPlayerColumn">
<div id="vbox_player_col" style="display:inline;float:left;">							
	<h3><span class="hp_caption">VIDEO PLAYER</span></h3>	
	<div id="video_holder">

		<div id="videoplayer"><!-- Video player placeholder --></div>
		 <div id="metadataTitle"><!-- Auto Populated --></div>
	</div>							
</div> <!-- End vbox_player_col -->
<div id="vbox_watch_col" class="hp_must_watch_video">
	<h3><span class="hp_caption">MUST WATCH - our fave clips</span></h3>


<?php
$block = module_invoke(\'promo\', \'block\', \'view\', 21);
print $block[\'content\'];
?>

	<script type="text/javascript">
		$jq126(".videoLink").click(function(e){
			targetClip = "http://video.oxygen.com/player/feeds/?clipid=" + ($(this).attr("videoID")); 
			
			embedOxyFeedPlayer("videoplayer", targetClip , false)		
			e.preventDefault();
		
		});
	</script>
</div><!-- END vbox_watch_col -->								
</div> <!-- End videoPlayerColumn -->',
    'format' => '4',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 2;
  $display->content['new-3'] = $pane;
  $display->panels['left'][2] = 'new-3';
  $pane = new stdClass;
  $pane->pid = 'new-4';
  $pane->panel = 'left';
  $pane->type = 'block';
  $pane->subtype = 'block-69';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 3;
  $display->content['new-4'] = $pane;
  $display->panels['left'][3] = 'new-4';
  $pane = new stdClass;
  $pane->pid = 'new-5';
  $pane->panel = 'left';
  $pane->type = 'block';
  $pane->subtype = 'block-68';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 4;
  $display->content['new-5'] = $pane;
  $display->panels['left'][4] = 'new-5';
  $pane = new stdClass;
  $pane->pid = 'new-6';
  $pane->panel = 'left';
  $pane->type = 'block';
  $pane->subtype = 'promo-24';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 5;
  $display->content['new-6'] = $pane;
  $display->panels['left'][5] = 'new-6';
  $pane = new stdClass;
  $pane->pid = 'new-7';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Schedule Box - What\'s On Now',
    'title' => '',
    'body' => '<div id="whatsOnNow">	<a href="http://www.oxygen.com/schedule/"><img src="http://www.oxygen.com/images/schedule-box-update1_final.jpg" border="0" /></a></div>',
    'format' => '2',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => 'whatonnew_pane',
    'css_class' => '',
  );
  $pane->extras = array();
  $pane->position = 0;
  $display->content['new-7'] = $pane;
  $display->panels['right'][0] = 'new-7';
  $pane = new stdClass;
  $pane->pid = 'new-8';
  $pane->panel = 'right';
  $pane->type = 'block';
  $pane->subtype = 'oxygen_obsessed-0';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => 'obsessed_promo_div',
    'css_class' => '',
  );
  $pane->extras = array();
  $pane->position = 1;
  $display->content['new-8'] = $pane;
  $display->panels['right'][1] = 'new-8';
  $pane = new stdClass;
  $pane->pid = 'new-9';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Video Player Companion Ad',
    'title' => '',
    'body' => '<div id="companion_300x250"><!-- video player companion ad --></div>',
    'format' => '4',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 2;
  $display->content['new-9'] = $pane;
  $display->panels['right'][2] = 'new-9';
  $pane = new stdClass;
  $pane->pid = 'new-10';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Channel Finder Oxygen',
    'title' => '',
    'body' => '<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="http://features.oxygen.com/sites/all/themes/features/js/oxy-channel-finder-oxy.js"></script>

<style type="text/css" media="screen">
	@import url( http://features.oxygen.com/sites/all/themes/features/channel-finder-oxy.css );
</style>

<div class="channel-finder">
	<div class="header">
		<h2>I want my Oxygen :: Live Out Loud</h2>
	</div>
	<div class="ch-content">
		<div class="get-zip">
			<p>To find Oxygen in your area please<br />enter your ZIP code</p>
			<p class="input"><input type="text" class="text" id="zipcode" name="zipcode" maxlength="5" value="" /> 
			<input type="button" class="get-provider" name="continue" value="  Continue  " /></p>
		</div>
	</div>
</div>',
    'format' => '4',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 3;
  $display->content['new-10'] = $pane;
  $display->panels['right'][3] = 'new-10';
  $pane = new stdClass;
  $pane->pid = 'new-11';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Facebook Promo',
    'title' => '',
    'body' => '<div id="facebook_promo"> 
	<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script> 
	<div class="facebookInfoBlock"> 
		<div class="facebookShowIcon"><a href="http://www.facebook.com/needlovebad" target="_blank"><img src="http://oxygen.com/images/hp/twitter/lg2_50x50.jpg" border="0" width="50" height="50"></a></div> 
		<div class="facebookShowInfo"> 
			Love Games <br> 
			<span id="lgFacebookFans"></span><!-- currently not in use --> 
		</div> 
		<div class="likeButton"> 
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fneedlovebad&amp;layout=standard&amp;show_faces=false&amp;width=51&amp;action=like&amp;colorscheme=dark&amp;height=27" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:50px;" allowTransparency="true"></iframe> 
		</div> 
	</div> <!-- End facebookInfoBlock -->
	<div class="facebookInfoBlock"> 
		<div class="facebookShowIcon"><a href="http://www.facebook.com/torianddean" target="_blank"><img src="http://www.oxygen.com/images/hp/twitter/sTORI_logo_50x50.jpg" border="0" width="50" height="50"></a></div> 
		<div class="facebookShowInfo"> 
			Tori &amp; Dean: sTORIbook Weddings<br> 
			<span id="sbwFacebookFans"></span><!-- currently not in use --> 
		</div> 
		<div class="likeButton"> 
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Ftorianddean&amp;layout=standard&amp;show_faces=false&amp;width=51&amp;action=like&amp;colorscheme=dark&amp;height=27" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:50px;" allowTransparency="true"></iframe> 
		</div> 
	</div> <!-- End facebookInfoBlock --> 
	<div class="facebookInfoBlock"> 
		<div class="facebookShowIcon"><a href="http://www.facebook.com/thegleeproject" target="_blank"><img src="http://features.oxygen.com/sites/all/themes/features/images/glee_50x50.jpg" border="0" width="50" height="50"></a></div> 
		<div class="facebookShowInfo"> 
			The Glee Project<br> 
			<span id="gleeprojFacebookFans"></span><!-- currently not in use --> 
		</div> 
		<div class="likeButton"> 
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fthegleeproject&amp;layout=standard&amp;show_faces=false&amp;width=51&amp;action=like&amp;colorscheme=dark&amp;height=27" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:50px;" allowTransparency="true"></iframe> 
		</div> 
	</div> <!-- End facebookInfoBlock --> 
	
	<!-- js for FB.api here previously --> 


</div> <!-- end facebook_promo -->',
    'format' => '4',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 4;
  $display->content['new-11'] = $pane;
  $display->panels['right'][4] = 'new-11';
  $pane = new stdClass;
  $pane->pid = 'new-12';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Twitter Promo',
    'title' => '',
    'body' => '<div id="twitter_promo">
	<div class="twitterInfoBlock"> 
		<div class="twitterShowInfo"> 
			Love Games 
			<span>Follow the official Love Games account on Twitter.</span> 
			<a href="http://www.twitter.com/lovegamesoxygen">&gt; Follow</a> 
		</div> 
		<div class="twitterShowIcon"><a href="http://www.twitter.com/lovegamesoxygen" target="_blank"><img src="http://oxygen.com/images/hp/twitter/lg2_50x50.jpg" border="0" width="50" height="50"></a></div> 
	</div>
	<div class="twitterInfoBlock"> 
		<div class="twitterShowInfo"> 
			Tori &amp; Dean: sTORIbook Weddings
			<span>Follow the official Tori &amp; Dean account on Twitter.</span> 
			<a href="http://www.twitter.com/torianddean_hsh">&gt; Follow</a> 
		</div> 
		<div class="twitterShowIcon"><a href="http://www.twitter.com/torianddean_hsh" target="_blank"><img src="http://www.oxygen.com/images/hp/twitter/sTORI_logo_50x50.jpg" border="0" width="50" height="50"></a></div> 
	</div>	
	<div class="twitterInfoBlock"> 
		<div class="twitterShowInfo"> 
			The Glee Project
			<span>Follow the official Glee Project account on Twitter.</span> 
			<a href="http://www.twitter.com/TheGleeProject">&gt; Follow</a> 
		</div> 
		<div class="twitterShowIcon"><a href="http://www.twitter.com/TheGleeProject" target="_blank"><img src="http://features.oxygen.com/sites/all/themes/features/images/glee_50x50.jpg" border="0" width="50" height="50"></a></div> 
	</div> 
								
</div>',
    'format' => '4',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 5;
  $display->content['new-12'] = $pane;
  $display->panels['right'][5] = 'new-12';
  $pane = new stdClass;
  $pane->pid = 'new-13';
  $pane->panel = 'right';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Photo Poll',
    'title' => '',
    'body' => '<div id="photo_poll">
	<script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/3595144.js"></script>
</div>',
    'format' => '2',
    'substitute' => TRUE,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 6;
  $display->content['new-13'] = $pane;
  $display->panels['right'][6] = 'new-13';
$display->hide_title = PANELS_TITLE_FIXED;
$display->title_pane = 'new-1';
$handler->conf['display'] = $display;
$page->default_handlers[$handler->name] = $handler;

  $export['homepage_oxygen'] = $page;
  return $export;
}
