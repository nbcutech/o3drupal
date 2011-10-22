<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
	#wideLeft{width:672px; margin:12px 0 0 0;background:none; }
	#wideLeftContent{min-height:2px; position:static;}
	#right{margin:0 0 0 12px;}
	div#right{margin-right:0px;}
	#wideLeft .copy{background-color:#fff;padding:0 30px 0 30px; color:#666666;}
	#wideLeft #storyTitle{font-size:18px;font-weight:bold;color:#000;padding: 25px 0 0 0;color:#710074;}
	#storyMainContent{padding: 2px 0px 10px 0px;}

/* IE-6 HACK \*/
* html #storyMainContent {height: 1%; line-height:1;}
/* End IE-6 HACK */
/* IE-7 HACK \*/
 html>body #storyMainContent {*height: 1%; *line-height:1;}
/* End IE-7 HACK */

	#storyMainContent img{display:inline; float:left; padding: 10px 8px 8px 0;}
	#allArticlesBtn{display:inline; float:left;}
	#nextArticleBtn{display:inline; float:right;}
	#articleButtons{clear:both;padding:30px 30px 30px 0; background-color:#fff;}
</style>
<div id="container" class="celeb_news">
    <div id="wrapper">
		<div id="wideLeft" >
			<img class="png" src="<?php print $pot;?>/images/celebrity_news/celebrity_news_header.png" width="672" height="79" border="0">
			<div id="wideLeftContent">
						
			<span style="display:none;"><h1>Oxygen Celebrity News</h1></span>
				<div class="copy">
					
					<div id="storyTitle">
						<?php print $node->title;  ?>
					</div>

					<div id="storyMainContent">
						<img style="display:inline; float:left;"src="<?php print $node->field_hollywood_image_link[0][value]; ?>"/>
						<?php print $node->body; ?>
						<div id="articleButtons">
							<a id="allArticlesBtn" href="/celebrity-news">
								<img src="/sites/all/themes/features/images/celebrity_news/all-celebrity_btn.gif" width="215" height="19" border="0">
							</a>
							<?php 
								$next_nid = getNextAHStory(arg(1));
								$clean_path = drupal_get_path_alias('node/'.$next_nid);
								if ($next_nid!="") 
								{
									print '<a id="nextArticleBtn" href="/'.$clean_path.'"><img src="/sites/all/themes/features/images/celebrity_news/next-acrticle_btn.gif" border="0"></a>';
								} 
							?>
							<div style="clear:both;"></div>	
						</div>						
					</div>

				</div>
				<div style="clear:both;"></div>
			</div>
			<img class="png" src="<?php print $pot;?>/images/content_footer.png" border="0"/>
		</div>
		<script type="text/javascript">
			$("#storyMainContent p:last").css("font-size", "10px"); //makes the copyright sentence appear smaller
		</script>		
	    <div id="right">
			<?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
