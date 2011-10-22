<pre>
<?php 
//echo print_r(get_defined_vars(), true);
$size = sizeof($node->choice);
$node_content = $node->content;
$max_votes = $node->vote_calc['max_votes'];
$total_votes = $node->vote_calc['total_votes'];
$vote_results = $node->vote_results;
$sorted_vote_results = $node->sorted_votes;
//echo print_r($vote_results , true);

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
		'5' =>  array('RGB(28,71,106)' , 'RGB(216,246,248)'),
		'6' =>  array('RGB(28,71,106)' , 'RGB(127,209,233)'),
		'7' =>  array('RGB(28,71,106)' , 'RGB(254,213,0)'),
	);
?>
</pre>
	<div class="left-panel">
		<div class="bing-contest-header">
			<div class="twitter-share">
					<a href="" class="twitter-share-button" data-count="none">Tweet</a>
				</div>
				<div class="fb-share">
					<fb:share-button class="meta">
					<meta name="title" content="HyperArts"/>
					<meta name="description" content="Read the Static FBML Bible and Rejoice!"/>
					</fb:share-button>
				</div>
				
		</div>
		<div class="description">
					<div class="desc-wrapper"><?php print strip_tags($node_content['body']['#value']); ?></div>
		</div>
		<div class="contest-content">
			<div class="choices">
				<?php for($i = 1; $i <= $size; $i++): ?>
				<?php $choice = $node->choice[$i]; $twitter = $twitter_links[$i]; $fb = $fb_links[$i]; ?>
				  <div class="option">
				  	<div class="picture" style="background:url('<?php print $directory; ?>/images/contest_images/contestants/image_<?php print strtolower($choice['label']); ?>.png') center bottom no-repeat;"></div>
				  	<div class="option-text">
					  	<div class="label">
					  		
					  	<?php print $choice['label']; ?>
					  	</div>
					  	
					  	<?php if($_COOKIE['theglee_voting']): ?>
					  	<div class="desc">Share</div>
					  	<div class="share-options">
					  	<div class="fblike"><fb:like href="<?php print $fb; ?>" ref="top_left" layout="button_count" width="47px" /></div>
					  	 <div class="twitter-follow"><a href="http://twitter.com/<?php print $twitter; ?>" data-show-count="false" 	data-width="60"  data-show-screen-name="false" class="twitter-follow-button">Follow @<?php print $twitter; ?></a></div>
					  	</div>
							<div class="voteoff"><img src="<?php print $directory; ?>/images/contest_images/glee_showsite_bing_vote_button_off.png" /></div>
					  	<?php else: ?>
					  	<div class="desc">
					  		an awesome talent and a fierce competetor
					  	</div>
					  	<div title="Vote for <?php print $choice['label']; ?>" class="vote clicktovote" rel="resultDialog" data-voteoffset="<?php print $choice['vote_offset']; ?>" id="option-<?php print $choice['vote_offset']; ?>">
					  		<img src="<?php print $directory; ?>/images/contest_images/glee_showsite_bing_vote_button_on.png" />
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
						   $pct = (($val/$max_votes) * 330); 
						   if($j==8) $j = 0;
						   $choice = $node->choice[$i+1]; 
						   $str = '';
						   if($pct > 20) {
						   	$str = 'style="left:-70px;"';
						  }
						?>
						<div class="poll-result">
							<div class="poll-bar">
								<div class="poll-label" style="color:<?php print $color[0]; ?>;"><?php print $choice['label']; ?></div>
								<div class="foreground" style="background-color:<?php print $color[1]; ?>;width:<?php  print $pct; ?>px;"></div>
								<div class="poll-count" <?php print $str; ?>><?php print $val; ?> <span> votes</span></div>
							</div>
						</div>
					<?php  endfor;  ?>
			</div>
			<div class="leader">
				<div class="leaderboard">
					<div class="leader-results">
						<div class="leader-header">
							Voting Leaderboard
						</div>
						<div class="leader-top-text">
							<div class="text">Top</div>
							<div class="num">3</div>
						</div>
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
<div class="hidden"><?php   print $content;  ?></div>
<input name="voting_options" id="voting_options" type="hidden" value='<?php print $vote_options; ?>' />

<div id="dialog-overlay"></div>
<div id="dialog-box">
    <div class="dialog-content">
        <div id="dialog-message">Your vote will be submitted. Thanks for voting</div>
        <a href="#" class="button">Close</a>
    </div>
</div>

  
