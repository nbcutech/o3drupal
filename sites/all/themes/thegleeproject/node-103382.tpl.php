<div class="main-content" style="background:none;padding:0px;">
	<div class="left-panel" style="margin:0px;">
			<div class="bing-contest-header" style="height:110px;">
				<div class="bing-logo">
				</div>
			  <div class="twitter-share">
					<a href="http://bit.ly/FanFavWt" data-url="http://bit.ly/FanFavWt" class="twitter-share-button" data-count="none" data-text="Check out the #TheGleeProject Bing Fan Favorite winner's performance & interview: " data-via="TheGleeProject" >Tweet</a>
				</div>
				<div class="fb-share" id="facebookshare">
					<fb:share-button class="meta">
					  <meta name="title" content="Find out who won the Bing Fan Favorite!"></meta>
					  <meta name="description" content="Check out the winner's performance & interview now."></meta>
				    <link rel="image_src" href="/sites/all/themes/thegleeproject/gleeproj_50_50.jpg"></link>
					  <link rel="target_url" href=""></link>
					</fb:share-button>	
				</div>
		  </div>
		
			<div class="videoPanel">
	        <div id="videoplayer"></div>

<script src="http://www.oxygen.com/js/objects/swfObject-1.5.js" type="text/javascript"></script>
<script type="text/javascript">
var player;
var contentMetadataDAO;
function onOutletEvent(e){
	if(e.type == "outletInited"){
		player = Outlet.getOutletExtension("embeddedPlayer");
		
		var contentMetadataDAO = Outlet.getOutletExtension("contentMetadataDAOID");
		contentMetadataDAO.addEventListener("CONTENT_METADATA.clip_info_update", onUpdate);
	}
}

function onUpdate(e){
	$("#metadataTitle").html(player.getMetaData().properties.headline);
}

 	var so = new SWFObject(
		"http://video.nbcuni.com/outlet/embed/OutletEmbeddedPlayerLoader.swf",
		"OutletEmbeddedPlayerLoader", "320", "276", "9", "#000000");
		so.addParam("allowFullScreen", "true");
		so.addParam("allowScriptAccess", "always");
		so.addParam("quality", "high");
	
		so.addVariable("configUrl", "http://video.nbcuni.com/PlayerConfig/oxygen/320x247_outlet_config.xml");
		so.addVariable("starter", "embeddedPlayer");
		so.addVariable("configID", "27004");
		so.addVariable("adCanvasWidth", "320");
		so.addVariable("adCanvasHeight", "276");
		so.addVariable("rssURL", "http://video.oxygen.com/player/feeds/?level=1348060%26showall=1%26type=placement");
			  so.addParam("wmode", "transparent");
		so.addVariable("loopType", "continuousLoop");
		so.addVariable("autoAdvance", "true");	
		so.addVariable("companionContainerID", "companion_281x243");
		so.addVariable("videoControls", "http://video.nbcuni.com/outlet/extensions/impd_controls/styles/usa_outlet.swf");

		so.write("videoplayer");

</script>
<!-- Outlet Player End -->
	        
	    </div>
  	</div>
  </div>
</div>
<div id="fb-root">
    	
    </div>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script>
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
  };
   (function() {
     var e = document.createElement('script');
     e.async = true;
     /*  e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
     * Need to change with this code in production  */
     e.src = 'http://connect.facebook.net/en_US/all.js';
     document.getElementById('fb-root').appendChild(e);
   }());
</script>
