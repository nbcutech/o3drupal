<?php
if(stristr($node->path, "facebook"))
  {
	include 'page-node-102992-facebook.tpl.php';
	return;
  }
?>
<?php
	 $current_page = 'http://'.$_SERVER['HTTP_HOST'].'/glam-slam';
	 
global $names;
$names = array(
 	'1' => 'Blondie',
  '2' => 'Bossa Nova',
  '3' => 'J9',
  '4'	=> 'Nostradamus',
  '5'	=> 'Queen B',
);

$desc_fb = "Vote for the Glam Slam fantasy hairstyle that you think should have won this week";
$host = $_SERVER['HTTP_HOST'];
$index = $_COOKIE['hairbattle_voting'];
$name_selec = $names[$index];
global $meta_title;
$meta_title = "I voted for  $name_selec in the Hair Battle Spectacular Glam Slam Do Over!";
$url = "http://www.facebook.com/dialog/feed?name=$meta_title&description=$desc_fb&picture=http://$host/sites/all/themes/hairbattlespectacular/images/contest_images/HBS2_80x80.jpg&link=http://bit.ly/DoOverF&show_error=true&app_id=207471505972894&redirect_uri=$current_page&display=popup";
$desc_names = array(
	'1' =>  'This is Blondie\'s fantasy hair creation, inspired by an "appearing flowers" magic trick.',
	'2' =>  'This is Bossa Nova\'s fantasy hair creation, inspired by a "never ending paper" magic trick.',
	'3' =>  'This is J9\'s fantasy hair creation, inspired by a "levitating rope" magic trick.',
	'4'	=>	'This is Nostradamus\' fantasy hair creation, inspired by a "linking rings" magic trick.',
	'5' =>	'This is Queen B\'s fantasy hair creation, inspired by a "color changing silks" magic trick.',
);

?>
<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php  if ($show_messages && $messages): print $messages; endif; ?>
<?php

?>
<div id="jsonnames" class="hidden"><?php print json_encode($names); ?></div>
<div id="jsondesc" class="hidden"><?php print json_encode($desc_names); ?></div>
<div id="container">
    <div id="wrapper">
		<div id="wideLeft" style="background: none;" >
			<div id="wideLeftContent">
				<div class="copy">
					<div class="thankyou-panel">
						<div class="left-pane">
							<div class="title"><?php print $choice['label']; ?></div>
							<div class="summary">
								ABOUT THE HAIR atomic created a wild look with pink and blue accents to suprise the judges.
								blue accents to suprise the judges
							</div>
							<a href="/glam-slam"><div class="back"></div></a>
							<a href="/hbs/photos/episode-6-im-a-beautician-not-a-magician/"><div class="more"></div></a>
						</div>
						<div class="right-pane">
							<div class="image"></div>
							<div class="desc">
								ABOUT THE HAIR atomic created a wild look with pink and blue accents to suprise the judges.
								blue accents to suprise the judges
							</div>
							<div class="share">
								 <div class="twitter"></div>
								 <div class="fb-share">
								 	 <div id="fb-root"></div>
								 	 
							<a target="_blank" style="padding:0px;" class="fbsharepopup" href="">
								<img src="<?php print $directory; ?>/images/contest_images/fshare.jpg" /></a>
								 </div>
							</div>
						</div>
					</div>
					
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
			var voted = $.cookie('hairbattle_voting');
			if(voted!=null) {
				var names = json2obj($('#jsonnames').html());
				var vote_name = names[voted];
				var desc = json2obj($('#jsondesc').html());
				$('.title').html(vote_name);
				$('.summary').html(desc[voted]);
				$('.desc').html(desc[voted]);
				var imgprefix = '/sites/all/themes/hairbattlespectacular/images/contest_images/HBS_DO_Main_Images/HBS_DoOver_Main_';
				var imgsrc = vote_name.toLowerCase();
				imgsrc = imgsrc.replace(' ','-');
				imgfinal = imgprefix + imgsrc + '.jpg?xx';
	      $('.image').css("background-image","url('"+imgfinal+"')");
	      
	      
	      //Social Sharing Code
	      //Load the html
	      sharetext = 'I voted for ' + vote_name + ' in the #HairBattleSpectacular \'Do Over! Vote for your fav hairstyle ';
	     // sharetext = 'I have voted for '+  +' contender in the Hair Battle Spectacular poll now: ';
	      twitterhtml = '<a data-url="http://bit.ly/DoOverT" href="http://bit.ly/DoOverT" class="twitter-share-button" data-count="none" data-text="' + sharetext + '" data-via="HairBattle" >Tweet</a>';
	      $('.twitter').html(twitterhtml);
	      
	      
	      //Load the JS FILES
	     
	     $('.fb-share meta[name=title]').attr("content", sharetext);
	     
	      var t = document.createElement('script');
	      t.async = true;
	      t.src  = 'http://platform.twitter.com/widgets.js';
	      document.getElementById('jsonnames').appendChild(t);
	      
	      //load fb
	       window.fbAsyncInit = function() 
  				{
			     FB.init({
			         appId: '205894102787382',
			         status: true,
			         cookie: true,
			         xfbml: true
			     });
			      FB.Canvas.setAutoResize(7);
			   		FB.Canvas.setSize({ height: 1500	 });
			   		FB.Event.subscribe('edge.create', function(response) {
					
						});
			  	};
			  	
			  	var e = document.createElement('script');
	     		e.async = true;
	      	e.src = 'http://connect.facebook.net/en_US/all.js';
	     		document.getElementById('fb-root').appendChild(e);
	     
					$('.fbsharepopup').click(function(event) {
						event.preventDefault();
						newPopup("<?php print $url; ?>");
					});

					// Popup window code
					function newPopup(url) {
						popupWindow = window.open(
							url,'popUpWindow','height=300,width=450,left=10,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no,addressbar=no')
					}
			}
	});
	// returns object .. accepts json string .. includes error handeling and crashes gracefully
function json2obj(jsonString) {
    return (eval("(" + jsonString + ")"));    
}
</script>
<div class="png">
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
