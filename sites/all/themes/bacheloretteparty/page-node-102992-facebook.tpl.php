<?php
	 $current_page = 'http://'.$_SERVER['HTTP_HOST'].'/glam-slam';
	 
global $names;
$names = array(
  '1' => 'Atomic',
  '2' => 'Blondie',
  '3' => 'Bossa Nova',
  '4' => 'J9',
  '5'	=> 'Nostradamus',
  '6'	=> 'Queen B',
);
$desc_fb = "Vote for the Glam Slam fantasy hairstyle that you think should have won this week";
$host = $_SERVER['HTTP_HOST'];
$index = $_COOKIE['hairbattle_voting'];
$name_selec = $names[$index];
global $meta_title;
$meta_title = "I voted for  $name_selec in the Hair Battle Spectacular Glam Slam Do Over!";
$url = "http://www.facebook.com/dialog/feed?name=$meta_title&description=$desc_fb&picture=http://$host/sites/all/themes/hairbattlespectacular/images/contest_images/HBS2_80x80.jpg&link=http://bit.ly/DoOverF&show_error=true&app_id=207471505972894&redirect_uri=$current_page&display=popup";
$desc_names = array(
	'1' =>  'This is Atomic\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'2' =>  'This is Blondie\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'3' =>  'This is Bossa Nova\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'4' =>  'This is J9\'s fantasy hairstyle, inspired by Marie Antoinette.',
	'5'	=>	'This is Nostradamus\' fantasy hairstyle, inspired by Marie Antoinette.',
	'6' =>	'This is Queen B\'s fantasy hairstyle, inspired by Marie Antoinette.',
);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Glam Slam Do Over | Hair Battle Spectacular | Oxygen</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--[if lt IE 7]>
            <script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);
              var BlankImgPath = "/sites/all/modules/pngbehave";
 	    </script>
        <style type="text/css">.png { behavior: url(/sites/all/modules/pngbehave/iepngfix.htc)} </style>
        <script type="text/javascript" src="/sites/all/modules/pngbehave/iepngfix_tilebg.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="/sites/all/themes/hairbattlespectacular/favicon.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/hairbattlespectacular/style.css?H" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/hairbattlespectacular/hairbattle_contest.css?H" />
<script type="text/javascript" src="/misc/jquery.js?H"></script>
<script type="text/javascript" src="/misc/drupal.js?H"></script>
<script type="text/javascript" src="/sites/all/themes/thegleeproject/jquery.cookie.js?H"></script>
<meta name="description" content="Vote for the Glam Slam fantasy hairstyle that you think should have won this week."></meta>
<meta property="og:url" content="http://bit.ly/DoOverF">
</head>
<body style="background:none;margin-left:auto;margin-right:auto;width:610px;">
<div id="jsonnames" class="hidden"><?php print json_encode($names); ?></div>
<div id="jsondesc" class="hidden"><?php print json_encode($desc_names); ?></div>

					<div class="thankyou-panel" >
						<div class="left-pane">
							<div class="title"><?php print $choice['label']; ?></div>
							<div class="summary">
								ABOUT THE HAIR atomic created a wild look with pink and blue accents to suprise the judges.
								blue accents to suprise the judges
							</div>
							<a href="/glam-slam"><div class="back"></div></a>
							<a href="/hbs/photos/episode-5-off-with-their-headpieces/"><div class="more"></div></a>
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
				imgfinal = imgprefix + imgsrc + '.jpg';
	      $('.image').css("background-image","url('"+imgfinal+"')");
	      
	      
	      //Social Sharing Code
	      //Load the html
	      sharetext = 'I have voted for '+ vote_name +' contender in the Hair Battle Spectacular poll now: ';
	      twitterhtml = '<a href="http://bit.ly/DoOverT" class="twitter-share-button" data-count="none" data-text="' + sharetext + '" data-via="HairBattleSpectacular" >Tweet</a>';
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
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
</body>
</html>
