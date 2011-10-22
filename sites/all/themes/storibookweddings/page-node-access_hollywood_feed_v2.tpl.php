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
	#wideLeft #storyTitle{font-size:18px;font-weight:bold;color:#000;padding: 25px 0 0 0;color:#177fb0;}
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
			<a href="/<?=variable_get('readxmltoarticle_landingpath', 'access_hollywood_articles')?>"><img class="png" src="<?php print $pot;?>/access_hollywood_feed_v2/celebrity_news_header.png" width="672" height="79" border="0"></a>
			<div id="wideLeftContent">
						
			<span style="display:none;"><h1><?=variable_get('readxmltoarticle_landingtitle', 'Access Hollywood Feed')?></h1></span>
				<div class="copy">
					
					<div id="storyTitle">
						<?php print $node->title;  ?>
					</div>

					<div id="storyMainContent">
						<img style="display:inline; float:left;"src="<?php print $node->field_image_link[0][value]; ?>"/>
						<?php print $node->body; ?>
						<div id="articleButtons">
							<a id="allArticlesBtn" href="/<?=variable_get('readxmltoarticle_landingpath', 'access_hollywood_articles')?>"><img src="<?php print $pot;?>/access_hollywood_feed_v2/all-articles.gif" width="215" height="19" border="0" alt="All Celebrity Wedding Articles"></a>
							<?php 
								$next_nid = readxmltoarticle_nextarticle($node->nid);
								if(!empty($next_nid)){
									print '<a id="nextArticleBtn" href="/'.$next_nid.'"><img src="'.$pot.'/access_hollywood_feed_v2/next-article.gif" alt="Next Article" width="160" height="19" border="0"></a>';
								} 
							?>
							<div style="clear:both;"></div>	
						</div>						
					</div>

				</div>
				<div style="clear:both;"></div>
			</div>
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
