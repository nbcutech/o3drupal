<?php 
$size = sizeof($node->choice);
$node_content = $node->content;
$max_votes = $node->vote_calc['max_votes'];
$total_votes = $node->vote_calc['total_votes'];
$vote_results = $node->vote_results;
$sorted_vote_results = $node->sorted_votes;
$top_vote = $sorted_vote_results[0];

?>

<!-- testcountsxx
<?php
print $node->maxchoices;
?>
-->
<?php

error_reporting(E_ALL);

$names = array(
  '1' => 'Atomic',
  '2' => 'Blondie',
  '3' => 'Bossa Nova',
  '4' => 'J9',
  '5'	=> 'Nostradamus',
  '6'	=> 'Queen B',
);


$desc_names = array(
	'1' =>  'This is Atomic\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'2' =>  'This is Blondie\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'3' =>  'This is Bossa Nova\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'4' =>  'This is J9\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'5'	=>	'This is Nostradamus\' fantasy hairstyle, inspired by Marie Antoinette.',
	'6' =>	'This is Queen B\'s fantasy hairstyle, inspired by Marie Antoinette.',
);



if($_COOKIE['hairbattle_voting']) {
	$offset = $_COOKIE['hairbattle_voting'];
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
				
				</div>
				
				<?php
				 $current_page = 'http://'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI'];
				?>
				
			  <div class="twitter-share">
					<a href="http://bit.ly/DoOverT" data-url="http://bit.ly/DoOverT" class="twitter-share-button" data-count="none" data-text="Vote for the #HairBattle Glam Slam fantasy hairstyle you think should have won this week:" data-via="HairBattle" >Tweet</a>
				</div>
				<div class="fb-share" id="facebookshare">
					

					<fb:share-button class="meta">
				  <meta name="medium" content="mult"></meta>	
					<meta name="title" content="Vote for the Hair Battle Spectacular Glam Slam 'Do Over! "></meta>
					<meta name="description" content="Vote for the Glam Slam fantasy hairstyle that you think should have won this week."></meta>
				  <link rel="image_src" href="http://<?php print $_SERVER['HTTP_HOST']; ?>/sites/all/themes/hairbattlespectacular/images/contest_images/HBS2_80x80.jpg"></link>
					<link rel="target_url" href="http://bit.ly/DoOverF"></link>
					</fb:share-button>
					
				
				</div>
				<div class="description">
						<div class="desc-wrapper">
							<?php print $node_content['body']['#value']; ?>
						</div>
				</div>
		</div>
	
		<div class="contest-content">
				<div class="top-choice">
					 <div class="top-choice-desc">
					 	<div class="lead-name"><?php print $top_vote['label']; ?></div>
					 	<div class="lead-desc"><?php print $desc_names[$top_vote['tag']]; ?></div>
					 	<a href="/hbs/photos/episode-5-off-with-their-headpieces/"><div class="more-link"></div></a>
					 </div>
					 <div class="top-choice-pic" style="background-image:url('http://hair-battle-spectacular.oxygen.com/sites/all/themes/hairbattlespectacular/images/contest_images/HBS_DO_Main_Images/HBS_DoOver_Main_<?php print str_replace(' ','-',strtolower($top_vote['label'])); ?>.jpg?xx');">
					 </div>
				
				</div>
				
				<div class="choices">
					<?php for($i = 1, $j = 0; $i <= $size; $i++,  $j++): ?>
						<?php 
								 $color = $bar_colors[$j];
								 $vote = $vote_results[$i];
							   $val = $vote['value']; 
							   if(!$val) $val = 0;
							   $pct = (($val/$total_votes) * 100); 
							   $pct = round($pct, 2);
							   if($j==7) $j = 0;
							   $choice = $node->choice[$i]; 
							?>
					<?php $choice = $node->choice[$i]; $twitter = $twitter_links[$i]; $fb = $fb_links[$i]; $desc= $desc_names[$i]; ?>
					  <div class="option">
					  	<div class="option-content">
						  	<div class="picture"  style="background:url('/<?php print $directory; ?>/images/contest_images/HBS_DO_Individual/HBS_Individual_<?php print str_replace(' ','-',strtolower($choice['label'])); ?>.jpg?xx') no-repeat;"></div>
						  	<div class="option-text">
							  	
							  	<div class="option-percentage"><span><?php print $pct; ?></span>%</div>
							  	<?php if($_COOKIE['hairbattle_voting']): ?> 
								  
									<div class="voteoff">
										<img src="/<?php print $directory; ?>/images/contest_images/HBSFF_vote_off.jpg" />
									</div>
							  	<?php else: ?>
							  	<div class="tobehidden">
							  	  <div title="Vote for <?php print $choice['label']; ?>" class="vote clicktovote" rel="resultDialog" data-voteoffset="<?php print $choice['vote_offset']; ?>" id="option-<?php print $choice['vote_offset']; ?>">
							  		  <img src="/<?php print $directory; ?>/images/contest_images/HBSFF_vote_on.jpg" />
							  	  </div>
							  	 </div>
							  	<div class="cookie hidden">
											<div class="voteoff">
												<img src="/<?php print $directory; ?>/images/contest_images/HBSFF_vote_off.jpg" />
											</div>
							  	</div>
							  	
							  	<?php endif; ?>
							  	
						  	</div>
					  	</div>
					  	<div class="label"><?php print $choice['label']; ?></div>
					  </div>
					 <?php endfor; ?>
				</div>
				<div style="clear:both"></div>
		</div>
		<div class="contest-results">
			</div>
			<input name="voting_options" id="voting_options" type="hidden" value='<?php print $vote_options; ?>' />
			<div class="hidden">
				<?php   print $content;  ?>
			</div>
    </div>
<script type="text/javascript" src="/sites/all/themes/thegleeproject/jquery.modaldialog.js"></script>
  
