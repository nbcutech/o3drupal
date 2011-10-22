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
	'1' =>  'looks like a little boy, but has a powerful and high voice.',
	'2' =>  'has a unique voice and look.',
	'3' =>  'is a natural musician.',
	'4' =>  'is not your typical pop singer.',
	'5' =>  'looks young but has a sophisticated voice.',
	'6' =>  'has a feisty personality that commands attention.',
	'7' =>  'is the relatable class clown.',
	'8' =>  'allows her inner-beauty to shine.',
	'9' =>  'is a triple threat: singer, actor, & dancer.',
	'10' =>  'overcame his insecurities & is ready for the spotlight.',
	'11' =>  'is a beautiful country singer.',
	'12' =>  'is more than his rock star look.',
);

$fb_links = array(
  '1' =>  'http://www.facebook.com/pages/Alex-Newell/207651469253238',
  '2' =>  'http://www.facebook.com/pages/Bryce-Vine/121069837968875',
  '3' =>  'http://www.facebook.com/CameronMitchellMusic',
  '4' =>  'http://www.facebook.com/pages/Damian-McGinty-Official/164984106861201',
  '5' =>  'http://www.facebook.com/pages/Ellis-Wylie/159429557449593',
  '6' =>  'http://www.facebook.com/pages/Emily-Vasquez/213027518708311',
  '7' =>  'http://www.facebook.com/pages/Hannah-McIalwain/161099260617892',
  '8' =>  'http://www.facebook.com/pages/Lindsay-Pearce/160835920643787',
  '9' =>  'http://www.facebook.com/pages/Marissa-von-Bleicken/208478539180769',
  '10' => 'http://www.facebook.com/MatheusSings',
  '11' => 'http://www.facebook.com/pages/McKynleigh-Abraham/214552498558044',
  '12' => 'http://www.facebook.com/experiencesamuellarsen',
);

if($_COOKIE['theglee_voting']) {
	$offset = $_COOKIE['theglee_voting'];
	foreach($node->choice as $choice) {
		if($offset == $choice['vote_offset']) {
			$label = $choice['label'];
		}
	}
	
	$fb_share_text = 'I voted for '.$label.' in The Glee Project Bing Fan Favorite Poll ';
  $tweet_text = 'I voted for '.$label.' in the Bing Fan Favorite poll!Vote for your fav #TheGleeProject contender: via @TheGleeProject';
  
}

else {
	$fb_share_text = 'Vote for your favorite The Glee Project contender in the Bing Fan Favorite poll!';
  $tweet_text = 'Vote for your fav #TheGleeProject contender in the Bing Fan Favorite poll now: via @TheGleeProject';
}

$twitter_links = array(
  '1' =>  'Anew92',
  '2' =>  'brycevine',
  '3' =>  'camronmitchell',
  '4' =>  'DamianMcGintyCT',
  '5' =>  'EllisWylie',
  '6' =>  'MLeeVasquez',
  '7' =>  'hannahmcialwain',
  '8' =>  'singlindsay',
  '9' =>  'MarissavonB_TGP',
  '10' => 'matheussings',
  '11' => 'mckynleigh',
  '12' => 'samuellarsen',
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
				<div class="bing-logo">
				<script type="text/javascript">document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242434320aug29;site=oxygen;sect=bingfanfavorite;sub=242434320aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');
</script>
				</div>
				
				
				
			  <div class="twitter-share">
					<a href="" class="twitter-share-button" data-count="none" data-text="Vote for your fav #TheGleeProject contender in the Bing Fan Favorite poll now: " 
data-via="TheGleeProject" >Tweet</a>
					
					<script type="text/javascript">
document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242077344aug29;site=oxygen;sect=bingfanfavorite;sub=242077344aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');
</script>
					
				</div>
				<div class="fb-share" id="facebookshare">
					<fb:share-button class="meta">
					<meta name="title" content="<?php print $fb_share_text; ?>"></meta>
					<meta name="description" content="Whose team are you on? Show your support by voting for your fav in the Bing Fan Favorite poll."></meta>
					<link rel="image_src" href="/sites/all/themes/thegleeproject/gleeproj_50_50.jpg"/>
					<link rel="target_url" href=""></link>
					</fb:share-button>
					<script type="text/javascript">document.write('<sc'+'ript language=\'JavaScript1.1\' src="http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242077339aug29;site=oxygen;sect=bingfanfavorite;sub=242077339aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?"></s'+'cript>');</script>
				</div>
				<div class="description">
						<div class="desc-wrapper">
							<?php print $node_content['body']['#value']; ?>
						</div>
				</div>
		</div>
	
		<div class="contest-content">
				<div class="choices">
					<?php for($i = 1; $i <= $size; $i++): ?>
					<?php $choice = $node->choice[$i]; $twitter = $twitter_links[$i]; $fb = $fb_links[$i]; $desc= $desc_names[$i]; ?>
					  <div class="option"  style="background:url('/<?php print $directory; ?>/images/contest_images/seperate_heads/image_<?php print strtolower($choice['label']); ?>.jpg') no-repeat;">
					  	<div class="picture"></div>
					  	<div class="option-text">
						  	<div class="label">
						  			<?php print $choice['label']; ?>
						  	</div>
						  	
						  	<?php if($_COOKIE['theglee_voting']): ?> 
							  	<div class="share-options">
							  	  <div class="fblike" style="height:30px; overflow:hidden;"><fb:like href="<?php print $fb; ?>" ref="top_left" layout="button_count" width="47px" /></div>
							  	  <div class="twitter-follow"><a href="http://twitter.com/<?php print $twitter; ?>" data-show-count="false" 	data-width="60"  data-show-screen-name="false" class="twitter-follow-button">Follow @<?php print $twitter; ?></a></div>
							    </div>
								<div class="voteoff">
									<img src="/<?php print $directory; ?>/images/contest_images/glee_showsite_bing_vote_button_off.png" />
								</div>
						  	<?php else: ?>
						  	<div class="cookie hidden">
						  			<div class="share-options">
							  	  	<div class="fblike"><fb:like href="<?php print $fb; ?>" ref="top_left" layout="button_count" width="47px" /></div>
							  	  	<div class="twitter-follow"><a href="http://twitter.com/<?php print $twitter; ?>" data-show-count="false" 	data-width="60"  data-show-screen-name="false" class="twitter-follow-button">Follow @<?php print $twitter; ?></a></div>
							    	</div>
										<div class="voteoff">
											<img src="/<?php print $directory; ?>/images/contest_images/glee_showsite_bing_vote_button_off.png" />
										</div>
						  	</div>
						  	<div class="tobehidden">
							  	<div class="desc">
							  		<?php print $desc; ?>
							  	</div>
						  	  <div title="Vote for <?php print $choice['label']; ?>" class="vote clicktovote" rel="resultDialog" data-voteoffset="<?php print $choice['vote_offset']; ?>" id="option-<?php print $choice['vote_offset']; ?>">
						  		  <img src="/<?php print $directory; ?>/images/contest_images/glee_showsite_bing_vote_button_on.png" />
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
			<input name="voting_options" id="voting_options" type="hidden" value='<?php print $vote_options; ?>' />
			<div class="hidden">
				<?php   print $content;  ?>
			</div>
    </div>
<script type="text/javascript" src="/sites/all/themes/thegleeproject/jquery.modaldialog.js"></script>
  
