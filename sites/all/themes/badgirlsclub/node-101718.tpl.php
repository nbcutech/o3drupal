<?php 
$size = sizeof($node->choice);
$node_content = $node->content;
$max_votes = $node->vote_calc['max_votes'];
$total_votes = $node->vote_calc['total_votes'];
$vote_results = $node->vote_results;
$sorted_vote_results = $node->sorted_votes;

?>
<!-- testcountsxx
<?php
print $node->maxchoices;
?>
-->
<?php
$desc_names = array(
	'1' =>  'This Bronx Bombshell is ready to bring the drama.',
	'2' =>  'This Voodoo Vixen could be the craziest Bad Girl ever.',
	'3' =>  'Everyone listens to the Powerhouse.',
	'4' =>  'You don\'t want to mess with the Staten Island Spitfire.',
	'5' =>  'There\'s more to this Lady Killer than meets the eye.',
	'6' =>  'Don\'t mistake this Posh Princess for being weak.',
	'7' =>  'There\'s never been a Bad Girl like this Goofy Gangsta.',
);

$fb_links = array(
  '1' =>  'http://www.facebook.com/Angelic.castilloBgc7',
  '2' =>  'http://www.facebook.com/BadGirlsClub7JudiJai',
  '3' =>  'http://www.facebook.com/pages/Nastasia-Townsend/211722655513760',
  '4' =>  'http://www.facebook.com/pages/Priscilla-Mennella/103930166360970',
  '5' =>  'https://www.facebook.com/pages/Shelly-Ray-BGC/190474294347141',
  '6' =>  'https://www.facebook.com/iranianroyalty',
  '7' =>  'https://www.facebook.com/pages/Tiara-So-Boojie-BGC7-Bad-Girl/151805444896827',
);

if($_COOKIE['badgirl_voting']) {
	$offset = $_COOKIE['badgirl_voting'];
	foreach($node->choice as $choice) {
		if($offset == $choice['vote_offset']) {
			$label = $choice['label'];
		}
	}
	
	$fb_share_text = 'I voted for '.$label.' in Bad Girls Fan Favorite Poll ';
   $tweet_text = 'I voted for '.$label.' in the Bad Girls Club fan fav poll! Vote in the #BadGirlsClub fan fav poll: via @BGConOxygen';
  
}

else {
	$fb_share_text = 'Who’s the baddest of them all? Vote in the Bad Girls Club fan fav poll!';
  $tweet_text = 'Who’s the baddest of them all? Vote in the #BadGirlsClub fan fav poll: via @BGConOxygen';
}

$twitter_links = array(
  '1' =>  'Sexkitt3nAngie',
  '2' =>  'judijaikrazi',
  '3' =>  'StasiQuinn',
  '4' =>  'DaGangstaOnBGC7',
  '5' =>  'BGC7ShellyRay',
  '6' =>  'IranianRoyalty',
  '7' =>  'TiaraSoBoojie',
);

$bar_colors = array(
		'0' => array('white' , 'RGB(84,132,206)'),
		'1' =>  array('RGB(28,71,106)' , 'RGB(239,219,96)'),
		'2' =>  array('white' , 'RGB(200,82,143)'),
		'3' =>  array('white' , 'RGB(0,176,223)'),
		'4' =>  array('white' , 'RGB(230,13,4)'),
		'5' =>  array('RGB(28,71,106)' , 'RGB(0,176,223)'),
		'6' =>  array('RGB(28,71,106)' , 'RGB(127,209,233)'),
		'7' =>  array('RGB(28,71,106)' , 'RGB(254,213,0)'),
	);
?>
<!-- test cookie -->
	<div class="left-panel">
		<div class="bing-contest-header">
		</div>
		<div class="contest-total">
			 <div class="twitter-share">
					<a href="" class="twitter-share-button" data-count="none" data-text="Vote in the #BadGirlsClub fan fav poll now: " 
							data-via="BadGirlsClub" >Tweet</a>
					
					<script type="text/javascript">
						document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242077344aug29;site=oxygen;sect=bingfanfavorite;sub=242077344aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');
					</script>
					
				</div>
				<div class="fb-share" id="facebookshare">
					<fb:share-button class="meta">
					<meta name="title" content="Vote for your favorite Bad Girl!"></meta>
					<meta name="description" content="Who's the baddest of them all? Vote in the Bad Girls Club fan fav poll."></meta>
					<link rel="image_src" href="/sites/all/themes/badgirlsclub/images/bgc-icon.jpg"/>
					<link rel="target_url" href=""></link>
					</fb:share-button>
					<script type="text/javascript">document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242077339aug29;site=oxygen;sect=bingfanfavorite;sub=242077339aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');</script>
				</div>
				<div class="description">
						<div class="desc-wrapper">
							<?php print $node_content['body']['#value']; ?>
						</div>
				</div>
		<div class="contest-content">
			
				<div class="choices">
					<?php for($i = 1; $i <= $size; $i++): ?>
					<?php $choice = $node->choice[$i]; $twitter = $twitter_links[$i]; $fb = $fb_links[$i]; $desc= $desc_names[$i]; ?>
					  <?php $last_class=""; if($i==$size) { $last_class=" last_class"; } ?>
					  
					  <div class="option<?php print $last_class; ?>" style="background:url('/<?php print $directory; ?>/images/contest_images/heads/<?php print strtolower($choice['label']); ?>-heads.png') no-repeat;">
					  	<div class="picture"></div>
					  	<div class="option-text">
						  	<div class="label">
						  			<?php print $choice['label']; ?>
						  	</div>
						  	
						  	<?php if($_COOKIE['badgirl_voting']): ?> 
							  	<div class="share-options">
							  	  <div class="fblike" style="height:30px; overflow:hidden;"><fb:like href="<?php print $fb; ?>" ref="top_left" layout="button_count" width="47px" /></div>
							  	  <div class="twitter-follow"><a href="http://twitter.com/<?php print $twitter; ?>" data-show-count="false" 	data-width="60"  data-show-screen-name="false" class="twitter-follow-button">Follow @<?php print $twitter; ?></a></div>
							    </div>
								<div class="voteoff">
									<img src="/<?php print $directory; ?>/images/contest_images/BGC7_vote_button_off.png" />
								</div>
						  	<?php else: ?>
						  	<div class="cookie hidden">
						  			<div class="share-options">
							  	  	<div class="fblike"><fb:like href="<?php print $fb; ?>" ref="top_left" layout="button_count" width="47px" /></div>
							  	  	<div class="twitter-follow"><a href="http://twitter.com/<?php print $twitter; ?>" data-show-count="false" 	data-width="60"  data-show-screen-name="false" class="twitter-follow-button">Follow @<?php print $twitter; ?></a></div>
							    	</div>
										<div class="voteoff">
											<img src="/<?php print $directory; ?>/images/contest_images/BGC7_vote_button_off.png" />
										</div>
						  	</div>
						  	<div class="tobehidden">
							  	<div class="desc">
							  		<?php print $desc; ?>
							  	</div>
						  	  <div title="Vote for <?php print $choice['label']; ?>" class="vote clicktovote" rel="resultDialog" data-voteoffset="<?php print $choice['vote_offset']; ?>" id="option-<?php print $choice['vote_offset']; ?>">
						  		  <img src="/<?php print $directory; ?>/images/contest_images/BGC7_vote_button_on.png" />
						  	  </div>
						  	 </div>
						  	<?php endif; ?>
					  	</div>
					  </div>
					 <?php endfor; ?>
				</div>
				<div style="clear:both"></div>
		</div>
		<div class="contest-results">
				<div class="results-panel">
						<?php  for($i = 0, $j = 0; $i < $size ; $i++, $j++):  ?>
							<?php 
								 $color = $bar_colors[$j];
								 $vote = $vote_results[$i+1];
							   $val = $vote['value']; 
							   if(!$val) $val = 0;
							   $pct = (($val/$max_votes) * 290); 
							   if($j==7) $j = 0;
							   $choice = $node->choice[$i+1]; 
							   $str = '';
							   if($pct > 60) {
							   	$str = 'style="left:-70px;"';
							  }
							?>
							<div class="poll-result">
								<div class="poll-bar">
									<div class="poll-label" style="color:white;"><?php print $choice['label']; ?></div>
									<div class="foreground" style="background-color:<?php print $color[1]; ?>;width:<?php  print $pct; ?>px;"></div>
									<div class="poll-count" <?php print $str; ?>><?php print $val; ?> <span> votes</span></div>
								</div>
							</div>
						<?php  endfor;  ?>
				</div>
				<div class="leader">
					<div class="leaderboard">
						<div class="leader-results">
							<div class="leader-label">
								<ol>
									<?php for($i = 0; $i < 3; $i++): ?>
										<li class="leader-label-item"><?php print $sorted_vote_results[$i]['label']; ?></li>
									<?php endfor; ?>
								</ol>
							</div>
						</div>
					</div>
					<div class="social-sharing">
				  </div>
				</div>
		</div>
	</div>
			<input name="voting_options" id="voting_options" type="hidden" value='<?php print $vote_options; ?>' />
			<div class="hidden">
				<?php   print $content;  ?>
			</div>
 </div>
<script type="text/javascript" src="/sites/all/themes/badgirlsclub/jquery.modaldialog.js"></script>
  
