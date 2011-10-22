<?php
include_once 'sweepstakes-functions.php';

$weeklyEpisodes = array(
	'week-0' => '2011-07-21 11:00:00',
	'week-1' => '2011-07-28 11:00:00',
	'week-2' => '2011-08-04 11:00:00',
	'week-3' => '2011-08-11 11:00:00',
	'week-4' => '2011-08-18 11:00:00',
	'week-5' => '2011-08-25 11:00:00'
);

$currentTime = time();

if($currentTime > strtotime($weeklyEpisodes['week-0'])) $currentWeek = 'week-1';

if($currentTime > strtotime($weeklyEpisodes['week-1'])) $currentWeek = 'week-1';

if($currentTime > strtotime($weeklyEpisodes['week-2'])) $currentWeek = 'week-2';

if($currentTime > strtotime($weeklyEpisodes['week-3'])) $currentWeek = 'week-3';

if($currentTime > strtotime($weeklyEpisodes['week-4'])) $currentWeek = 'week-4';

if($currentTime > strtotime($weeklyEpisodes['week-5'])) $currentWeek = 'week-5';

$currentWeekKey = $currentWeek;
$currentWeek = strtotime($weeklyEpisodes[$currentWeek]);

$sweepstakesBegins = date("F j, Y", strtotime('+4 days', $currentWeek));
$sweepstakesBeginsV2 = date("F j", strtotime('+4 days', $currentWeek));
$sweepstakesEnds = date("F j, Y", strtotime('+5 days', $currentWeek));
$dayAfter = date("F j, Y", strtotime('+6 days', $currentWeek));

$startContest = strtotime(date("y-m-d", strtotime('+4 days', $currentWeek)).' 21:00:00'); //echo date("Y-m-d H:i:s", $startContest);
$endContest = strtotime(date("y-m-d", strtotime('+5 days', $currentWeek)).' 01:00:00'); //echo date("Y-m-d H:i:s", $endContest);

$newcontest = $currentWeek;

if($_GET['show'] == 'thank-you'){
	$showFormThankYou = true;
}elseif($_GET['show'] == 'form' || ($currentTime > $startContest && $currentTime < $endContest)){
	$contestLive = true;
	$showEntryForm = true;	
}elseif($_GET['show'] == 'end' || $currentTime > $endContest){
	$showEndContest = true;
}else{
	$showComingSoon = true;
}


if($showEntryForm){
	$BGC_Talent_Call_Facebook_metatags = '<meta property="og:title" content="Enter The Bad Girls Club Talent Call Sweepstakes! TONIGHT ONLY!" />
<meta property="type" content="tv_show" />
<meta property="og:image" content="http://thegleeproject.oxygen.com/sites/all/themes/badgirlsclub/images/bgc-icon.jpg" />
<meta property="og:url" content="http://bad-girls-club.oxygen.com/bad-girls-club-talent-call-sweepstakes" />
<meta property="og:site_name" content="The Bad Girls Club" />
<meta property="fb:admins" content="100000967523112" />
<meta property="og:description" content="Wish you could talk to your fav Season 7 Bad Girl? Watch for our secret key word during the premiere of TONIGHT\'s episode at 9/8c on Oxygen and enter for a chance to win a phone call from the BGC cast member of your choice. Click the link above for official rules & more info." />';
}else{
	$BGC_Talent_Call_Facebook_metatags = '<meta property="og:title" content="Enter The Bad Girls Club Talent Call Sweepstakes!" />
<meta property="type" content="tv_show" />
<meta property="og:image" content="http://thegleeproject.oxygen.com/sites/all/themes/badgirlsclub/images/bgc-icon.jpg" />
<meta property="og:url" content="http://bad-girls-club.oxygen.com/bad-girls-club-talent-call-sweepstakes" />
<meta property="og:site_name" content="The Bad Girls Club" />
<meta property="fb:admins" content="100000967523112" />
<meta property="og:description" content="Wish you could talk to your fav Season 7 Bad Girl? Watch for our secret key word during the premiere '.$sweepstakesBeginsV2.' at 9/8c on Oxygen and enter for a chance to win a phone call from the BGC cast member of your choice. Click the link above for official rules & more info." />';
}

if(($_POST['action'] == 'submit' && $contestLive) || ($_POST['action'] == 'submit' && $_POST['testing'] == 'true')){
	$error = ContenderCall::validate();
	
	if($error === true){
		ContenderCall::submit();
		header("Location: /bad-girls-club-talent-call-sweepstakes?show=thank-you");
		exit;
	}else{
		if($_POST['signup'] == 1) $checkSignup = ' checked="checked" ';
		$_GET['show'] = 'form';
	}
}

?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
	 
<div id="container"> <!-- <?=time().'-'.date("Y-m-d H:i:s"); ?> -->
    <div id="wrapper">
	 	<style type="text/css" media="screen">
			@import url('/sites/all/themes/badgirlsclub/talent-call.css?v2');
		</style>
		<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/js/contender-call.js?v3"></script>
	 	<div class="contender-call-wrapper">
			<div class="contender-call-left">
				<div class="inner">
					<div class="rules-link">
						<p><a href="/bad-girls-club-talent-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/bad-girls-club-talent-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">Official Rules</a></p>
						<p><a href="/bad-girls-club-talent-call-sweepstakes-prize-details" target="_blank" onclick="window.open ('/bad-girls-club-talent-call-sweepstakes-prize-details','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">Prize Details</a></p>
					</div>
					
					<p class="clear">No purchase necessary. <br />
					Void where prohibited.</p>
					
					<p>Sweepstakes begins <?=$sweepstakesBegins ?> 9PM EST and ends <?=$sweepstakesEnds ?> at 1AM EST.</p>
					
					<p>Subject to Official Rules located at oxygen.com.</p> 
					
					<p>Must be 18 years of age or older and a legal resident of the U.S.</p>
				</div>
			</div>
			<div class="contender-call-right">
				<h1><span>The Bad Girls Club Talent Call Sweepstakes</span>&nbsp;</h1>
				<div class="inner">
					
<? if($showFormThankYou): ?>

					<p class="thank-you">Thank you for entering The Bad Girls Club Talent Call Sweepstakes.</p>
					
					<p><a href="http://bad-girls-club.oxygen.com">Learn more</a> about The Bad Girls Club here.</p>
					<p><a href="http://www.facebook.com/thebadgirlsclub" target="_blank">Like</a> The Bad Girls Club on Facebook. </p>
					<p><a href="http://oxygen.com/newsletter/">Sign up</a> for Oxygen's weekly newsletter. </p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="nter The #BadGirlsClub Talent Call Sweepstakes during MON's premiere for a chance 2 win a call from your fav Bad Girl: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
				
<? elseif($showEntryForm): ?>

					<p>Enter for a chance to win a phone call with your favorite Bad Girl from season 7! Watch tonight's so new episode at 9/8c for a code word and submit your entry here*. The sweepstakes ends tomorrow at 1AM EST. One entry per person. Read complete rules <a href="/bad-girls-club-talent-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/bad-girls-club-talent-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>.</p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="TONIGHT ONLY! Enter #BadGirlsClub Talent Call Sweepstakes for a chance 2 win a phone call from your fav Bad Girl: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
					
					<form method="post">
					
						<p><label>First Name:</label> <input type="text" name="first-name" class="txt_field req" value="<?=htmlentities($_POST['first-name'])?>" style="<?=$error['firstName']?>" /></p>
	
						<p><label>Last Name:</label> <input type="text" name="last-name" class="txt_field req" value="<?=htmlentities($_POST['last-name'])?>" style="<?=$error['lastName']?>" /></p>
						
						<p><label>Address:</label> <input type="text" name="address" class="txt_field req" value="<?=htmlentities($_POST['address'])?>" style="<?=$error['address']?>" /></p>
						
						<p><label>City:</label> <input type="text" name="city" class="txt_field req" value="<?=htmlentities($_POST['city'])?>" style="<?=$error['city']?>" /></p>
						
						<p><label>State:</label> <input type="text" name="state" class="txt_field req" value="<?=htmlentities($_POST['state'])?>" style="<?=$error['state']?>" /></p>
						
						<p><label>ZIP Code:</label> <input type="text" name="zipcode" class="txt_field req" value="<?=htmlentities($_POST['zipcode'])?>" style="<?=$error['zipcode']?>" /></p>
						
						<p><label>E-mail Address:</label> <input type="text" name="email" class="txt_field req" value="<?=htmlentities($_POST['email'])?>" style="<?=$error['email']?>" /></p>
						
						<p><label>Phone:</label> <input type="text" name="phone" class="txt_field_small req" value="<?=htmlentities($_POST['phone'])?>" style="<?=$error['phone']?>" /></p>
						
						<p><label>Age:</label> <input type="text" name="age" class="txt_field_small" value="<?=htmlentities($_POST['age'])?>" /></p>
						
						<p><label>TV Service Provider:</label> <input type="text" name="tv-service-provider" class="txt_field" value="<?=htmlentities($_POST['tv-service-provider'])?>" /></p>
						
						<p><label>I watch Oxygen:</label> <input type="text" name="watch-oxygen" class="txt_field" value="<?=htmlentities($_POST['watch-oxygen'])?>" /></p>
						
						<p><label>My home Internet access is:</label> <input type="text" name="interet-access" class="txt_field" value="<?=htmlentities($_POST['interet-access'])?>" /></p>
						
						<p><label>Code Word*:</label> <input type="text" name="code-word" class="txt_field" value="<?=htmlentities($_POST['code-word'])?>" /></p>
						
						<p><input type="checkbox" name="signup" value="1" <?=$checkSignup?> /> Sign up to receive the latest information about Oxygen shows, movies, sweepstakes and other special events.</p>
						
						<p>
							<input type="image" src="/sites/all/themes/badgirlsclub/images/talent-call/enter-now.gif" name="submit" value="submit" />
							<input type="hidden" name="action" value="submit" />
							<? if($_GET['show'] == 'form'): ?> <input type="hidden" name="testing" value="true" /> <? endif; ?>
						</p>
					
					</form>
					
					<p><small>* The code word is not a required field for entry into this sweepstakes.</small></p>

<? elseif($_GET['show'] == 'prepromo'): ?>

					<p>Enter for a chance to win a phone call with your favorite Bad Girl from season 7! Watch Monday's so new episode at 9/8c for a code word, then come back here and submit your entry*. The sweepstakes is open from <?=$sweepstakesBegins ?> at 9pm EST through <?=$sweepstakesEnds ?> at 1AM EST. One entry per person. Read complete rules <a href="/bad-girls-club-talent-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/bad-girls-club-talent-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>.</p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="Enter The #BadGirlsClub Talent Call Sweepstakes during MON's premiere for a chance 2 win a call from your fav Bad Girl: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
					<p><small>* The code word is not a required field for entry into this sweepstakes.</small></p>

<? elseif($showEndContest): ?>

					<p class="thank-you">The Bad Girls Club Talent Call Sweepstakes is now over, 
but get more from this amazing show:</p>
					
					<p><a href="http://bad-girls-club.oxygen.com">Learn more</a> about The Bad Girls Club here.</p>
					<p><a href="http://www.facebook.com/thebadgirlsclub" target="_blank">Like</a> The Bad Girls Club on Facebook. </p>
					<p><a href="http://oxygen.com/newsletter/">Sign up</a> for Oxygen's weekly newsletter. </p>

<? else: ?>

					<p>Enter for a chance to win a phone call with your favorite Bad Girl from season 7! Watch Monday's so new episode at 9/8c for a code word, then come back here and submit your entry*. The sweepstakes is open from <?=$sweepstakesBegins ?> at 9pm EST through <?=$sweepstakesEnds ?> at 1AM EST. One entry per person. Read complete rules <a href="/bad-girls-club-talent-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/bad-girls-club-talent-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>.</p>
										
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="Enter The #BadGirlsClub Talent Call Sweepstakes during MON's premiere for a chance 2 win a call from your fav Bad Girl: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
					<p><small>* The code word is not a required field for entry into this sweepstakes.</small></p>

<? endif; ?>

				</div>
			</div>
			<div class="clear">&nbsp;</div>
		</div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
