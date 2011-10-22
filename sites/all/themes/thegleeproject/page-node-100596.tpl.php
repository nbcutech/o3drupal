<?php
include_once 'contender-call-functions.php';

$weeklyEpisodes = array(
	'week-5' => '2011-07-14 11:00:00',
	'week-6' => '2011-07-21 11:00:00',
	'week-7' => '2011-07-28 11:00:00',
	'week-8' => '2011-08-04 11:00:00',
	'week-9' => '2011-08-11 11:00:00',
	'week-10' => '2011-08-18 11:00:00',
	'week-11' => '2011-08-25 11:00:00'
);

$currentTime = time();

if($currentTime > strtotime($weeklyEpisodes['week-5'])) $currentWeek = 'week-5';

if($currentTime > strtotime($weeklyEpisodes['week-6'])) $currentWeek = 'week-6';

if($currentTime > strtotime($weeklyEpisodes['week-7'])) $currentWeek = 'week-7';

if($currentTime > strtotime($weeklyEpisodes['week-8'])) $currentWeek = 'week-8';

if($currentTime > strtotime($weeklyEpisodes['week-9'])) $currentWeek = 'week-9';

if($currentTime > strtotime($weeklyEpisodes['week-10'])) $currentWeek = 'week-10';

if($currentTime > strtotime($weeklyEpisodes['week-11'])) $currentWeek = 'week-11';


// END Of SWEEPSTAKES
$currentWeek = 'week-7';
$_GET['show'] = 'end';

$currentWeekKey = $currentWeek;
$currentWeek = strtotime($weeklyEpisodes[$currentWeek]);

switch($currentWeekKey){
	case 'week-10': $TGP_theme = 'Glee-ality'; break;
	case 'week-9': $TGP_theme = 'Generosity'; break;
	case 'week-8': $TGP_theme = 'Believability'; break;
	case 'week-7': $TGP_theme = 'Sexuality'; break;
	case 'week-6': $TGP_theme = 'Tenacity'; break;
	case 'week-5': $TGP_theme = 'Pairability'; break;
}

$sweepstakesBegins = date("F j, Y", strtotime('+3 days', $currentWeek));
$sweepstakesEnds = date("F j, Y", strtotime('+4 days', $currentWeek));
$dayAfter = date("F j, Y", strtotime('+5 days', $currentWeek));

$startContest = strtotime(date("y-m-d", strtotime('+3 days', $currentWeek)).' 21:00:00'); //echo date("Y-m-d H:i:s", $startContest);
$endContest = strtotime(date("y-m-d", strtotime('+4 days', $currentWeek)).' 01:00:00'); //echo date("Y-m-d H:i:s", $endContest);

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
	$TGP_Contender_Call_Facebook_metatags = '<meta property="og:title" content="Enter The Glee Project Contender Call Sweepstakes! TONIGHT ONLY!" />
<meta property="type" content="tv_show" />
<meta property="og:image" content="http://thegleeproject.oxygen.com/sites/all/themes/thegleeproject/images/tgp-icon.jpg" />
<meta property="og:url" content="http://thegleeproject.oxygen.com/contender-call-sweepstakes" />
<meta property="og:site_name" content="The Glee Project" />
<meta property="fb:admins" content="100000967523112" />
<meta property="og:description" content="Wish you could talk to your fav contender from The Glee Project? Watch for our secret key word during TONIGHT\'s '.$TGP_theme.' episode at 9/8c on Oxygen and enter for a chance to win a phone call from the contender of your choice. Click the link above for official rules & more info." />';
}else{
	$TGP_Contender_Call_Facebook_metatags = '<meta property="og:title" content="Enter The Glee Project Contender Call Sweepstakes!" />
<meta property="type" content="tv_show" />
<meta property="og:image" content="http://thegleeproject.oxygen.com/sites/all/themes/thegleeproject/images/tgp-icon.jpg" />
<meta property="og:url" content="http://thegleeproject.oxygen.com/contender-call-sweepstakes" />
<meta property="og:site_name" content="The Glee Project" />
<meta property="fb:admins" content="100000967523112" />
<meta property="og:description" content="Wish you could talk to your fav contender from The Glee Project? Watch for our secret key word during the '.$TGP_theme.' episode '.$sweepstakesBegins.' at 9/8c on Oxygen and enter for a chance to win a phone call from the contender of your choice. Click the link above for official rules & more info." />';
}

if(($_POST['action'] == 'submit' && $contestLive) || ($_POST['action'] == 'submit' && $_POST['testing'] == 'true')){
	$error = ContenderCall::validate();
	
	if($error === true){
		ContenderCall::submit();
		header("Location: /contender-call-sweepstakes?show=thank-you");
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
			@import url('/sites/all/themes/thegleeproject/contender-call.css');
		</style>
		<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" language="javascript" src="/sites/all/themes/thegleeproject/js/contender-call.js?v3"></script>
	 	<div class="contender-call-wrapper">
			<div class="contender-call-left">
				<div class="inner">
					<div class="rules-link">
						<p><a href="/the-glee-project-contender-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/the-glee-project-contender-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">Official Rules</a></p>
						<p><a href="/the-glee-project-contender-call-sweepstakes-prize-details" target="_blank" onclick="window.open ('/the-glee-project-contender-call-sweepstakes-prize-details','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">Prize Details</a></p>
					</div>
					
					<p class="clear">No purchase necessary. <br />
					Void where prohibited.</p>
					
					<p>Sweepstakes begins <?=$sweepstakesBegins ?> 9PM EST and ends <?=$sweepstakesEnds ?>at 1AM EST.</p>
					
					<p>Subject to Official Rules located at oxygen.com.</p> 
					
					<p>Must be 18 years of age or older and a legal resident of the U.S.</p>
				</div>
			</div>
			<div class="contender-call-right">
				<h1><span>The Glee Project Contender Call Sweepstakes</span>&nbsp;</h1>
				<div class="inner">
					
<? if($showFormThankYou): ?>

					<p class="thank-you">Thank you for entering The Glee Project Contender Call Sweepstakes.</p>
					
					<p><a href="http://thegleeproject.oxygen.com">Learn more</a> about The Glee Project here.</p>
					<p><a href="https://www.facebook.com/reqs.php?fcode=b70461235&f=2200035#!/thegleeproject" target="_blank">Like</a> The Glee Project on Facebook. </p>
					<p><a href="http://oxygen.com/newsletter/">Sign up</a> for Oxygen's weekly newsletter. </p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="Enter #TheGleeProject Contender Call Sweepstakes during SUN's new ep for a chance 2 win a call from your fav contender: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
				
<? elseif($showEntryForm): ?>

					<p>Enter for a chance to win a phone call with your favorite contender! Watch tonight's so new episode at 9/8c for a code word and submit your entry here*. The sweepstakes ends tomorrow at 1AM EST. One entry per person. Read complete rules <a href="/the-glee-project-contender-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/the-glee-project-contender-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>.</p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="TONIGHT ONLY! Enter #TheGleeProject Contender Call Sweepstakes for a chance 2 win a phone call from your fav contender: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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
							<input type="image" src="/sites/all/themes/thegleeproject/images/contender-call/enter-now.gif" name="submit" value="submit" />
							<input type="hidden" name="action" value="submit" />
							<? if($_GET['show'] == 'form'): ?> <input type="hidden" name="testing" value="true" /> <? endif; ?>
						</p>
					
					</form>
					
					<p><small>* The code word is not a required field for entry into this sweepstakes.</small></p>

<? elseif($_GET['show'] == 'prepromo'): ?>

					<p>Enter for a chance to win a phone call with your favorite contender! Watch Sunday's so new episode at 9/8c for a code word, then come back here and submit your entry*. The sweepstakes is open from <?=$sweepstakesBegins ?> at 9pm EST through <?=$sweepstakesEnds ?> at 1AM EST. One entry per person. Read complete rules <a href="/the-glee-project-contender-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/the-glee-project-contender-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>. </p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="Enter #TheGleeProject Contender Call Sweepstakes during SUN's new ep for a chance 2 win a call from your fav contender: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					  </div>
					</div>
					<p><small>* The code word is not a required field for entry into this sweepstakes.</small></p>

<? elseif($showEndContest): ?>

					<p class="thank-you">The Glee Project Contender Call Sweepstakes is now over, 
but get more from this amazing show:</p>
					
					<p><a href="http://thegleeproject.oxygen.com">Learn more</a> about The Glee Project here.</p>
					<p><a href="https://www.facebook.com/reqs.php?fcode=b70461235&f=2200035#!/thegleeproject" target="_blank">Like</a> The Glee Project on Facebook. </p>
					<p><a href="http://oxygen.com/newsletter/">Sign up</a> for Oxygen's weekly newsletter. </p>

<? else: ?>

					<p>Enter for a chance to win a phone call with your favorite contender! Watch Sunday's so new episode at 9/8c for a code word, then come back here and submit your entry*. The sweepstakes is open from <?=$sweepstakesBegins ?> at 9pm EST through <?=$sweepstakesEnds ?> at 1AM EST. One entry per person. Read complete rules <a href="/the-glee-project-contender-call-sweepstakes-official-rules" target="_blank" onclick="window.open ('/the-glee-project-contender-call-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;">here</a>. </p>
					
					<div class="share-social">
						<div class="left">
							<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						</div>
						<div class="right">
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="Enter #TheGleeProject Contender Call Sweepstakes during SUN's new ep for a chance 2 win a call from your fav contender: " >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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
