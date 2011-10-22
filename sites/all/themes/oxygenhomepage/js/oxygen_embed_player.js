var player;
var contentMetadataDAO;
function onOutletEvent(e)
{
//    console.log(e);
	if(e.type == "outletInited")
	{
		player = Outlet.getOutletExtension("embeddedPlayer");
//      player.addEventListener("AD_BREAK_EVENT_ON_LOADING", onUpdate);
		var contentMetadataDAO = Outlet.getOutletExtension("contentMetadataDAOID");
		contentMetadataDAO.addEventListener("CONTENT_METADATA.clip_info_update", onUpdate);
	}
}

function onUpdate(e)
{
	document.getElementById("metadataTitle").innerHTML = player.getMetaData().properties.headline;
}

function embedOxyFeedPlayer(targetPlayerDiv, feedURL, hideCompanionAd, companionAdDiv) 
// embedOxyFeedPlayer("videoplayer", "http://video.oxygen.com/player/feeds/?level=1224734%26showall=1%26type=placement", false, "companion_300x250")
{
	var so = new SWFObject(
			"http://video.nbcuni.com/outlet/embed/OutletEmbeddedPlayerLoader.swf",
			"OutletEmbeddedPlayerLoader", "320", "277", "9", "#000000");
	so.addParam("allowFullScreen", "true");
	so.addParam("allowScriptAccess", "always");
	so.addParam("quality", "high");
	so.addParam("wmode", "transparent");
	so.addVariable("configUrl", "http://video.nbcuni.com/PlayerConfig/oxygen/320x247_outlet_config.xml");
	so.addVariable("starter", "embeddedPlayer");
	so.addVariable("configID", "27004");
	so.addVariable("adCanvasWidth", "300");
	so.addVariable("adCanvasHeight", "250");
	so.addVariable("rssURL", feedURL);  // %26 instead of & to play videos in correct order and showall=1 instead of showall=true

	so.addVariable("loopType", "continuousLoop");
	so.addVariable("autoAdvance", "true");
	if (hideCompanionAd == false)
	{ 	
		so.addVariable("companionContainerID", companionAdDiv);
	}	
	so.addVariable("videoControls", "http://video.nbcuni.com/outlet/extensions/impd_controls/styles/usa_outlet.swf");
	so.write(targetPlayerDiv);
}
