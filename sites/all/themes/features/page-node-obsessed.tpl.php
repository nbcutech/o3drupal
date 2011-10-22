<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
#contentHeader {
width: 672px;
height: 75px;
background: url(/<?php print $directory; ?>/images/obsessed/main2ColBG.png) 0px 0px no-repeat;
display: block;	
}
#topCap {
  display: none;	
}
#wideLeftContent {
  position:relative;
 min-height:830px;
 height:auto !important;
   height:830px;
}
</style>
<div id="container">
    <div id="wrapper">
		<div id="wideLeft" >
			<img id="topCap" class="png" src="<?php print $pot;?>/images/content_header.png" border="0" />
			<div id="contentHeader" class="png" style="position: relative;"></div>
			<div id="wideLeftContent">
						
				<div class="copy">


<?php

$std_image_string = '<div id="obsessedStoryImage" style="float:left;width:315px;height:230px;background: url(' . $pot . '/images/obsessed/story_image_BG.jpg) 0 0 no-repeat;"><a href="' . $node->field_obsessed_url[0]["value"] . '" target="_blank"><img src="/' . $node->field_obsessed_image[0]["filepath"] . '" width="264" height="178" border="0" style="margin: 25px 0 0 30px; z-index: 9999;"></a></div>';

$w4e_image_string = '<div id="obsessedStoryImage" style="float:left;width:315px;height:230px;background: url(' . $pot . '/images/obsessed/story_image_BG.jpg) 0 0 no-repeat;"><a href="http://ad.doubleclick.net/clk;240175153;4798747;r?http://features.oxygen.com/obsessed/water-for-elephants-in-theaters-april-22" target="_blank"><img src="/' . $node->field_obsessed_image[0]["filepath"] . '" width="264" height="178" border="0" style="margin: 25px 0 0 30px; z-index: 9999;">
<script type="text/javascript">document.write(\'<sc\'+\'ript language="JavaScript1.1" src="http://ad.doubleclick.net/adj/nbcu.oxygen/home_239805997apr22;site=oxygen;sect=home;sub=239805997apr22;genre=;daypart=primetime;!category=home;!category=js;!category=scifi;network=tvn;sz=1x1;tagtype=js;uri=;pos=10;tile=10;ord=\' + randDARTNumber + \'?"></s\'+\'cript>\');</script>
</a></div>';

$smurfs_image_string = '<div id="obsessedStoryImage" style="float:left;width:315px;height:260px;background: url(' . $pot . '/images/obsessed/story_image_BG.jpg) 0 0 no-repeat;"><a href="' . $node->field_obsessed_url[0]["value"] . '" target="_blank"><img src="/' . $node->field_obsessed_image[0]["filepath"] . '" width="264" height="178" border="0" style="margin: 25px 0 0 30px; z-index: 9999;"></a></div>';

if (preg_match("/water-for-elephants-in-theaters-april-22/i", request_uri()) == 1 ) {
    print $w4e_image_string; 
}elseif(strpos($_SERVER['REQUEST_URI'], '/obsessed/the-smurfs') !== false){
	print $smurfs_image_string; 
}else {
  print $std_image_string;
}

?>

					
					<div id="obsessedStoryTitle" style="font-size:18px;font-weight:bold;color:#000;padding: 25px 0 0 0;">
					
						<?php 
							print $node->title; 
							if($node->created > (time()-518400)) {print "<i> --so new</i>";} 
						
						?>
						<span id="obsessedStorySubTitle" style="font-size:18px;font-weight:bold;color:#710074;padding: 2px 0 0 0;">
							<?php /* if($node->created > (time()-518400)) {print " --so new";}  */?>
						</span>
					</div>

					<div id="obsessedStoryMainContent" style="padding: 2px 30px 0 30px;">
					<?php print $content; ?>
					</div>
					<div class="png" id="obsessedNav" style="clear:both;padding:30px; background-color:#fff;">
						<a class="png" id="obsessedAll" href="/obsessed/all-obsessed-articles">all obsessed</a>
						<?php 
							$next_nid = oxygen_obsessed_next(arg(1));

							$clean_path = drupal_get_path_alias('node/'.$next_nid);

							if ($next_nid!="") {
								print '<a class="png" id="obsessedNext" href="/'.$clean_path.'">next story</a>';
							} 
						?>
						<div style="clear:both;"></div>	
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<img class="png" src="<?php print $pot;?>/images/content_footer.png" border="0"/>
		</div>
			

	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>

