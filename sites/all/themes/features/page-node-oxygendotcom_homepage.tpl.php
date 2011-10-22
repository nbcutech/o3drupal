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
						
						<a name="oxygen_channel_finder"></a>
						<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
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
						</div>
<!-- begin timer to remove fandango widget -->						
<?php
$tstampEnd = strtotime("2011-08-20 00:01:00");
if ($tstampEnd > time()): ?>
						<!-- start fandango widget --><a name="fandangoWidget"> </a>
							<div id="fandango-widget" style="display:block;position:relative;margin:10px 0px;">
								<div id="fandango-widgetContainer" style="position:relative;z-index:40;">
									<script language="javascript"  type="text/javascript" src="http://iv.doubleclick.net/adj/nbcu.oxygen/oxygen_home;site=oxygen;sect=home;pageid=hp;dcopt=ist;!category=oxygen;!category=home;sz=300x600;tile=5;pos=5;pm=1;ord=482772079812?">
									</script>	
								</div>
							</div>
							
<style type="text/css">
.fandango_links {
	background-color: #081838;
	text-align: center;
	color: #ffffff;
	font-weight: bold;
	padding-bottom: 3px;
}
.fandango_links a {
	color: #ECE00E;
}
</style>
<script type="text/javascript">						
$jq126(document).ready(function(){
$jq126('.CDE_showtimes_topcreative') .css('height','220px');
$jq126('.CDE_showtimes_topcreative') .css('overflow','hidden');
$jq126('.CDE_showtimes_topcreative').after('<div class="fandango_links"><!-- rules --> <a id="fandango_rules" href="http://thegleeproject.oxygen.com/oxygen-fandango-movie-sweepstakes-official-rules" target="_blank">Click here for rules.</a><!-- info  --> <br />No purchase necessary. <a id="fandango_moreInfo" href="http://thegleeproject.oxygen.com/the-glee-3d-concert-movie-fandango-gift-card-entry" target="_blank">Click here</a> for more info.</div>');
});
</script>
								<!-- start fandango dev url reveal code: will display widget only on oxygen dev-->
                                                        	<script language="javascript" type="text/javascript" >
										var currentEnvironmentUrl = document.URL;
										if(document.URL.indexOf("http://oxygendev.") != -1){ 
											document.getElementById("fandango-widget").style.display="block";	
										}
                                                               </script>
								<!-- end fandango dev url reveal code -->

						<!-- end fandango widget -->
<?php endif; ?>
<!-- end timer to remove fandango widget -->

						<div id="facebook_promo"> 
							<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script> 
							<div class="facebookInfoBlock"> 
								<div class="facebookShowIcon"><a href="http://www.facebook.com/thebadgirlsclub" target="_blank"><img src="http://oxygen.com/images/hp/twitter/BGC7_50x50.jpg" border="0" width="50" height="50"></a></div> 
								<div class="facebookShowInfo"> 
									Bad Girls Club <br> 
									<span id="bfcFacebookFans"></span><!-- currently not in use --> 
								</div> 
								<div class="likeButton"> 
									<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fthebadgirlsclub&amp;layout=standard&amp;show_faces=false&amp;width=51&amp;action=like&amp;colorscheme=dark&amp;height=27" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:50px;" allowTransparency="true"></iframe> 
								</div> 
							</div> <!-- End facebookInfoBlock -->
							<div class="facebookInfoBlock"> 
								<div class="facebookShowIcon"><a href="http://www.facebook.com/hairbattle" target="_blank"><img src="http://www.oxygen.com/images/hp/twitter/HBS2_50x50.jpg" border="0" width="50" height="50"></a></div> 
								<div class="facebookShowInfo"> 
									Hair Battle Spectacular<br> 
									<span id="hbsFacebookFans"></span><!-- currently not in use --> 
								</div> 
								<div class="likeButton"> 
									<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fhairbattle&amp;layout=standard&amp;show_faces=false&amp;width=51&amp;action=like&amp;colorscheme=dark&amp;height=27" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:50px;" allowTransparency="true"></iframe> 
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
									Bad Girls Club 
									<span>Follow the official Bad Girls Club account on Twitter.</span> 
									<a href="http://www.twitter.com/bgconoxygen">&gt; Follow</a> 
								</div> 
								<div class="twitterShowIcon"><a href="http://www.twitter.com/bgconoxygen" target="_blank"><img src="http://oxygen.com/images/hp/twitter/BGC7_50x50.jpg" border="0" width="50" height="50"></a></div> 
							</div>
							<div class="twitterInfoBlock"> 
								<div class="twitterShowInfo"> 
									Hair Battle Spectacular
									<span>Follow the official Hair Battle Spectacular account on Twitter.</span> 
									<a href="http://www.twitter.com/hairbattle">&gt; Follow</a> 
								</div> 
								<div class="twitterShowIcon"><a href="http://www.twitter.com/hairbattle" target="_blank"><img src="http://www.oxygen.com/images/hp/twitter/HBS2_50x50.jpg" border="0" width="50" height="50"></a></div> 
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