<?

$weeklyEpisodes = array(
	'week-5' => '2011-07-17 21:00:00',
	'week-6' => '2011-07-24 21:00:00',
	'week-7' => '2011-07-31 21:00:00',
	'week-8' => '2011-08-07 21:00:00',
	'week-9' => '2011-08-14 21:00:00',
	'week-10' => '2011-08-21 21:00:00',
	'week-11' => '2011-08-28 21:00:00'
);

$currentTime = time();

if($currentTime > strtotime($weeklyEpisodes['week-5'])){ $showWeek = 'week=5'; $weekToShow = 5; }

if($currentTime > strtotime($weeklyEpisodes['week-6'])){ $showWeek = 'week=6'; $weekToShow = 6; }

if($currentTime > strtotime($weeklyEpisodes['week-7'])){ $showWeek = 'week=7'; $weekToShow = 7; }

if($currentTime > strtotime($weeklyEpisodes['week-8'])){ $showWeek = 'week=8'; $weekToShow = 8; }

if($currentTime > strtotime($weeklyEpisodes['week-9'])){ $showWeek = 'week=9'; $weekToShow = 9; }

if($currentTime > strtotime($weeklyEpisodes['week-10'])){ $showWeek = 'week=10'; $weekToShow = 10; }

if($currentTime > strtotime($weeklyEpisodes['week-11'])){ $showWeek = 'week=11'; $weekToShow = 11; }
	
if(!isset($_GET['week'])){
	
	header("Location: /homework-neutrogena?".$showWeek);
	exit;
}

switch($_GET['week']){
	case '10':
		$TGP_FB_title = 'Show off your Glee-ality';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent!';
		break;
	case '9':
		$TGP_FB_title = 'Share your Generosity';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your stories of generosity with our community. We want to help YOU develop your natural talent!';
		break;
	case '8':
		$TGP_FB_title = 'Practice your Believability';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent!';
		break;
	case '7':
		$TGP_FB_title = 'Get in touch with your Sexuality';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent!';
		break;
	case '6':
		$TGP_FB_title = 'Show off your Tenacity';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent! ';
		break;
	case '5':
		$TGP_FB_title = 'Grab a friend and share your Pairability';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your and your partner\'s progress with our community. We want to help YOU develop your natural talent!';
		break;
	case '4':
		$TGP_FB_title = 'Show off your Danceability';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your dance moves with our community. We want to help YOU develop your natural talent! ';
		break;
	case '3':
		$TGP_FB_title = 'Embrace your Vulnerability';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent!';
		break;
	case '2':
		$TGP_FB_title = 'Show off your Theatricality';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share your progress with our community. We want to help YOU develop your natural talent! ';
		break;
	case '1':
	default:
		$TGP_FB_title = 'Show off your Individuality';
		$TGP_FB_description = 'The Glee Project contenders did their Homework Assignment, now it\'s time for you to do yours! Get weekly tips and share the qualities that make you, YOU with our community. We want to help YOU develop your natural talent!';
		break;
}

$TGP_Homework_Facebook_metatags = '<meta property="og:title" content="'.$TGP_FB_title.'!" />
<meta property="type" content="tv_show" />
<meta property="og:image" content="http://thegleeproject.oxygen.com/sites/all/themes/thegleeproject/images/tgp-icon.jpg" />
<meta property="og:url" content="http://bit.ly/TGPHWF" />
<meta property="og:site_name" content="The Glee Project" />
<meta property="fb:admins" content="100000967523112" />
<meta property="og:description" content="'.$TGP_FB_description.'" />';

?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php  if ($show_messages && $messages): print $messages; endif; ?>
<div id="container"> <!-- <?=time().'-'.date("Y-m-d H:i:s"); ?> -->
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
					<?php print $content; ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
