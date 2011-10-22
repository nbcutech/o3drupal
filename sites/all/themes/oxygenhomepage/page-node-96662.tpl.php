<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/oxygenhomepage/static_header.inc"; ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
 <?php  if ($show_messages && $messages): print $messages; endif; ?>



		<div id="content"><!--Begin Content-->
			<!-- promoOne Row -->
			<div id="firstRow">
				<?php
					$block = module_invoke('promo', 'block', 'view', 20);
					print $block['content'];

				?>

				<div id="whatsOnNow" style="text-align:center;color:#fff; font-weight:bold; font-size:13px;margin-left:8px;display:inline; float:left; width:300px; height:49px;">
					 	<a href="http://www.oxygen.com/schedule/"><img src="http://www.oxygen.com/images/schedule-box-update1_final.jpg" border="0" /></a>
				</div>

				<?php
					$block = module_invoke('oxygen_obsessed', 'block', 'view', 0);
					print $block['content'];

				?>


			</div><!-- end firstRow -->
			<div id="secondRow">
				<div id="leftSection">
<div style="display: none;">
<?php
					$block = module_invoke('block', 'block', 'view', 102);
					print $block['content'];


				?>
				</div>

					<?php
					$block = module_invoke('views', 'block', 'view', 'LOL_Blogs-block_1');
					print $block['content'];
					?>

						<a style="margin-top:-20px;left:325px;z-index:100;display:block; width:305px; height:32px; position:absolute;text-decoration:none;" href="http://video.oxygen.com">&nbsp;</a>
						<a style="margin-top:590px;left:325px;z-index:100;display:block; width:305px; height:32px; position:absolute;text-decoration:none;" href="http://video.oxygen.com">&nbsp;</a>						
						<a style="margin-top:920px;left:705px;z-index:100;display:block; width:250px; height:32px; position:absolute;text-decoration:none;" href="http://www.twitter.com/oxygen">&nbsp;</a>
						<a style="margin-top:1050px;left:5px;z-index:100;display:block; width:150px; height:32px; position:absolute;text-decoration:none;" href="http://www.oxygen.com/movies">&nbsp;</a>
						<a style="margin-top:1050px;left:255px;z-index:100;display:block; width:150px; height:32px; position:absolute;text-decoration:none;" href="http://www.oxygen.com/soundslikeoxygen">&nbsp;</a>						
						<a style="margin-top:1050px;left:455px;z-index:100;display:block; width:150px; height:32px; position:absolute;text-decoration:none;" href="http://www.oxygen.com/sweepstakes">&nbsp;</a>
						<a style="margin-top:-20px;left:0px;z-index:100;display:block; width:305px; height:32px; position:absolute;text-decoration:none;" href="http://features.oxygen.com/blogs/outloud">&nbsp;</a>
						<a style="margin-top:590px;left:0px;z-index:100;display:block; width:305px; height:32px; position:absolute;text-decoration:none;" href="http://features.oxygen.com/blogs/outloud">&nbsp;</a>
						
						<div id="videoPlayerColumn">
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
							$block = module_invoke('promo', 'block', 'view', 21);
							print $block['content'];
?>

								<script type="text/javascript">
									$jq126(".videoLink").click(function(e){
										targetClip = "http://video.oxygen.com/player/feeds/?clipid=" + ($(this).attr("videoID")); 
										
										embedOxyFeedPlayer("videoplayer", targetClip , false)		
										e.preventDefault();
									
									});
								</script>
							</div><!-- END vbox_watch_col -->								
						</div> <!-- End videoPlayerColumn -->

<?php
							/* Most Popular Promos block */
							$block = module_invoke('block', 'block', 'view', 68);
							print $block['content'];
						?>

						<?php
							/* Bottom Promos block */
							$block = module_invoke('promo', 'block', 'view', 24);
							print $block['content'];
						?>
					</div> <!-- End leftColumn -->
					<div id="rightSection">
						<div id="companion_300x250"><!-- video player companion ad --></div>

						<div id="facebook_promo"> 
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
						
						
						</div> <!-- end facebook_promo -->
						
						<div id="twitter_promo">
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
														
						</div> <!-- end twitter_promo -->
						<div id="photo_poll">
							<script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/3595144.js"></script>
						</div><!--  end photo poll -->
					</div><!-- end rightColumn -->
				</div> <!-- End secondRow -->
				
	
<?php

$block = module_invoke('block', 'block', 'view', 69);
							print $block['content'];
?>
		</div>
		
		
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/oxygenhomepage/static_footer.inc"; ?>