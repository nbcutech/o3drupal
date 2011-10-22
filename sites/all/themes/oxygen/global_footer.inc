<?php if (preg_match("/photos.oxygen/i", $_SERVER['SERVER_NAME']) == 1) {
print '
<div id="footer">
	<div id="mainFooterLogos">
			<div class="footerLogo" style="width:134px;">
				<a href="http://www.oxygenlive.com"><img src="http://oxygen.com/common/images/footer/oxylive.png" width="134" height="58" alt="oxygenlive"></a>
				<a href="http://www.oxygenlive.com">Chat, react, and interact LIVE with Oxygen stars and superfans.</a>
			</div>
			<div class="footerLogo" style="width:158px;">
				<a href="http://features.oxygen.com/obsessed/free-oxygenlive-app"><img src="http://oxygen.com/common/images/footer/oxy-mobile-app-footergraphic.png" width="158" height="58" alt="OxygenLive Mobile App"></a>
				<a href="http://features.oxygen.com/obsessed/free-oxygenlive-app">Download our OxygenLive app on your iPhone or iPad.</a>
			</div>
			<div class="footerLogo" style="width:130px;">
				<a href="http://www.shopoholic.com"><img src="http://oxygen.com/common/images/footer/shopoholic.png" width="130" height="58" alt="shopoholic"></a>
				<a href="http://www.shopoholic.com">Get gear, DVD, and more inspired by your fav Oxygen shows. Start shopping now.</a>
			</div>
			<div class="footerLogo" style="width:195px;">
				<a href="http://www.hormoneoscope.com"><img src="http://oxygen.com/common/images/footer/hormoneoscope.png" width="195" height="58" alt="hormoneoscope"></a>
				<a href="http://www.hormoneoscope.com">Download the mood predictor app for your desktop, Facebook or iPhone.</a>
			</div>


	</div>
	<div id="globalSubFooter2">
			<div><a href="http://www.oxygen.com">Home</a>|</div>
			<div><a href="http://www.oxygen.com/tvshows/">TV Shows</a>|</div>
			<div><a href="http://www.oxygen.com/schedule/" target="_blank">Schedule</a>|</div>
			<div><a href="http://www.oxygen.com/games/">Games</a></div>
			<div><a href="http://www.oxygen.com/sweepstakes/">Sweepstakes</a>|</div>
			<div><a href="http://www.oxygen.com/legal/terms.aspx">Terms</a>|</div>			
			<div><a href="http://www.oxygen.com/legal/privacyPolicy.aspx">Privacy Policy</a>|</div>
			<span>
			<a id="_bapw-link" style="color:#ffffff;font-weight:bold;cursor:pointer !important;text-decoration:none !important"><img id="_bapw-icon" style="display:inline !important;vertical-align:middle !important"/> <span class="adchoices" style="font-weight:bold;vertical-align:middle !important">AdChoices</span></a>&nbsp;<script>(function(){var e=document,b,a=(e.location.protocol=="https:"?"https":"http"),c=(a=="https"?"https://info.evidon.com/c/betrad/pub/":"http://cdn.betrad.com/pub/");e.getElementById("_bapw-icon").src=c+"icon1.png";e.getElementById("_bapw-link").onclick=function(){var f=this;function d(i,l){var j=e.getElementsByTagName("head")[0]||e.documentElement,h=false,g=e.createElement("script");function k(){g.onload=g.onreadystatechange=null;j.removeChild(g);l()}g.src=i;g.onreadystatechange=function(){if(!h&&(this.readyState=="loaded"||this.readyState=="complete")){h=true;k()}};g.onload=k;j.insertBefore(g,j.firstChild)}this.onclick="return false";d(a+"://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js",function(){d(c+"pub1.js",function(){BAPW.i(f,{pid:198,ocid:908},false)})});return false};b=new Image();b.src=a+"://l.betrad.com/pub/p.gif?pid=198&ocid=908&ii=1&r="+Math.random()}());</script>
			</span>
			<div><a href="http://www.nbcuni.com/" target="_blank">Corporate Info</a>|</div>
			<div><a href="http://www.oxygen.com/legal/contact.aspx">Contact Us</a></div>
			<div><a href="http://nbc.researchresults.com/?s=64">Join NBCU Panel</a>|</div>
			<div><a href="http://www.comcast.com/independentprogramming" target="_blank">Independent Programming Report</a></div>
			<br><div style="color:#fff;margin-top:7px;display:block;">TM & Copyright © 1998-' . date("Y") . ' Oxygen Media. All Rights Reserved</div>						
			
	</div>

</div><!--end footer-->
';
} else {
    print '
 <div id="footer">
      <div id="footerNewsletter">
          <img src="' . $pot . '/images/h3Newsletter.gif" />
          <span class="description">Sign up to receive special offers and promotions from Oxygen.</span>
          <form action="http://oxygen.com/newsletter/" method="get" name="form5">
          <span class="email">
          <input id="newsletterSignup" type="text" name="email_address" />
          </span>
          <span class="join">
          <button id="newsletterJoin" type="submit">Join</button>
          </span>
          </form>
      </div>
      <div id="footerNavigation">
        <img src="' . $pot . '/images/h3Navigation.gif" />
        <span><a href="http://oxygen.com">Home</a></span>
        <span><a href="http://oxygen.com/tvshows/">TV Shows</a></span>
        <span><a href="http://oxygen.com/schedule/">Schedule</a></span>
        <span><a href="http://oxygen.com/sweepstakes/">Sweepstakes</a></span>
        <span><a href="http://o2.oxygen.com">Video</a></span>
        <span><a href="http://oxygen.com/movies/">Movies</a></span>
        <span><a href="http://oxygen.com/mobile/">Mobile</a></span>
        <span><a href="http://oxygen.com/games/">Games</a></span>
        <span><a href="http://forums.oxygen.com/">Community</a></span><br />
      </div>
      <div id="footerRight">
        <a target="_blank" class="nbcUniversal" href="http://www.nbcuni.com/"><img src="' . $pot . '/images/nbcUniversal.gif" alt="NBC Universal" /></a>
          <div id="nbcuPanel">
            <a target="_blank" href="http://nbc.researchresults.com/?s=64">Join the NBCU Panel</a>
          </div>
      </div>
    </div>
    <div id="globalSubFooter">
      <span>TM & Copyright &copy; 1998-' . date("Y") . ' Oxygen Media. All Rights Reserved</span>
      <a href="http://oxygen.com/legal/terms.aspx">Terms of Use</a> | 
      <a href="http://oxygen.com/legal/privacyPolicy.aspx">Privacy Policy</a> | 
      <a id="_bapw-link" style="padding:0 0 0 8px;color:#CBCBCB;cursor:pointer !important;text-decoration:none !important"><img id="_bapw-icon" style="display:inline !important;vertical-align:top !important"/> <span style="float:none; vertical-align:top !important">AdChoices</span></a>&nbsp;<script>(function(){var e=document,b,a=(e.location.protocol=="https:"?"https":"http"),c=(a=="https"?"https://info.evidon.com/c/betrad/pub/":"http://cdn.betrad.com/pub/");e.getElementById("_bapw-icon").src=c+"icon1.png";e.getElementById("_bapw-link").onclick=function(){var f=this;function d(i,l){var j=e.getElementsByTagName("head")[0]||e.documentElement,h=false,g=e.createElement("script");function k(){g.onload=g.onreadystatechange=null;j.removeChild(g);l()}g.src=i;g.onreadystatechange=function(){if(!h&&(this.readyState=="loaded"||this.readyState=="complete")){h=true;k()}};g.onload=k;j.insertBefore(g,j.firstChild)}this.onclick="return false";d(a+"://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js",function(){d(c+"pub1.js",function(){BAPW.i(f,{pid:198,ocid:908},false)})});return false};b=new Image();b.src=a+"://l.betrad.com/pub/p.gif?pid=198&ocid=908&ii=1&r="+Math.random()}());</script>
      &nbsp;|&nbsp;
      <a target="_blank" href="http://www.nbcuni.com/">Corporate Info</a> | <a href="http://oxygen.com/legal/contact.aspx">Contact Us</a>
    </div>
    ';
}
?>
  
  </div>
</div>


<?php print $footer ?>
<?php print $closure; ?>
<!-- start Vibrant Media IntelliTXT script section -->
	<?php if(1==0):?>
		<script type="text/javascript" src="http://oxygen.us.intellitxt.com/intellitxt/front.asp?ipid=20657"></script>
	<?php endif; ?>
<!-- end Vibrant Media IntelliTXT script section -->

<?php if (preg_match("/thegleeproject/i", $_SERVER['SERVER_NAME']) == 0 && preg_match("/obsessed\/the-smurfs/i", request_uri()) == 0 ): ?>
<!-- Kontera ContentLink(TM); rev KK  -->
<script type='text/javascript'>
var dc_AdLinkColor = 'blue' ;
var dc_isBoldActive= 'no';
var dc_PublisherID = 136535 ;

var str='<script type="text/javascript" src="http://kona.kontera.com/javascript/lib/KonaLibInline.js">';
str+="<";
str+="/script>";

<? if($_SERVER['HTTP_HOST'] == 'bad-girls-club.oxygen.com'): ?>

<? //print_r($_SERVER); ?>

$(document).ready(function(e) {
	if(navigator.userAgent.indexOf('Firefox/3.6') == -1){
		$('head').append(str);
	}
});
</script>

<? else: ?>
</script>
<script type='text/javascript' src='http://kona.kontera.com/javascript/lib/KonaLibInline.js'></script>
<? endif; ?>

<?php endif; ?>

<script src="http://www.nbcudigitaladops.com/hosted/global.js"></script>

<? if($_SERVER['HTTP_HOST'] == 'bad-girls-club.oxygen.com'): ?>

<link rel="stylesheet" type="text/css" href="/sites/all/themes/badgirlsclub/shout-out-form.css?1">
<div style="display: none;" id="bgc7-shout-out">
	<div>
		<form method="post">
			<div class="bgc7-shout-out-form">
				<div class="inner">
					<p class="top"><strong>Want a shout-out during an episode of the Bad Girls Club? Enter below for a chance to win!</strong></p>
					<p><label>First Name:</label> <input type="text" name="first-name" class="txt_field req" value="" style="" /></p>
		
					<p><label>Last Name:</label> <input type="text" name="last-name" class="txt_field req" value="" style="" /></p>
					
					<p><label>State:</label> <input type="text" name="state" class="txt_field req" value="" style="" /></p>
					
					<p><label>Email:</label> <input type="text" name="email" class="txt_field req" value="" style="" /></p>
									
					<p><input type="submit" name="submit" value="Submit Form" class="submit" style="font-size:12px" /> <a href="http://bad-girls-club.oxygen.com/bad-girls-club-vip-sweepstakes-official-rules" target="_blank" onclick="window.open ('http://bad-girls-club.oxygen.com/bad-girls-club-vip-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;" class="rules">See the Official Rules</a></p>
				</div>
			</div>
		</form>
	</div>
</div>

<script src="/sites/all/themes/badgirlsclub/meebo-checkin.js"></script>
<script type="text/javascript">
	Meebo( function(){ 
		jQuery('.about #wideLeft').wrap('<meebo:makeSharable meebo:title="' + document.title + '" />');
		
		jQuery('div.t_get_connected').attr('meebo:notsharable','true');
		jQuery('img').each( function (){
			if(jQuery(this).attr('src') == '/sites/all/themes/badgirlsclub/images/blogs_banner.jpg'){
				jQuery(this).attr('meebo:notsharable','true');
			}
		});
		jQuery('#block-views-showsite_blogs-block_1 div.block-row').each( function (){
			var thisTitle = jQuery(this).find('div.bloglist-block-row-title strong').html();
			var thisUrl = jQuery(this).find('div.bloglist-block-row-teaser a').attr('href');
			jQuery(this).wrap('<meebo:makeSharable meebo:title="' + thisTitle + '" meebo:url="' + thisUrl + '" />');
		});
	});
	
	Meebo('onUserCheckin', function() {
		if(meebo_checkcookie()){
			Meebo('addButton', {
				id: "shoutout",
				type: "widget",
				label: "Bad Girls Club VIP Sweepstakes",
				width:231,
				height:331,
				element: "bgc7-shout-out"
			});
			
			var t=setTimeout("Meebo('openWidget', {id: 'shoutout'});", 1000);
		}
	});
	
	Meebo('domReady');
	Meebo('makeEverythingSharable', {title:document.title});
	Meebo('setDefaultTweet', {title:document.title});
</script>

<? endif; ?>

</body>
</html>
