function createFrameAd(targetAdDiv, srcDartString, frameW, frameH){
    	targetAdDiv = "#" + targetAdDiv;
    	$(targetAdDiv).html('');
    	$(targetAdDiv).html('<iframe style="padding:0px;margin:0px;" src="/sites/all/themes/oxygen/js/adFrame.html?' + srcDartString + '" width="' + frameW + '" height="' +  frameH + '" ALLOWTRANSPARENCY name="iFrameContentBlock"	 scrolling="no" frameborder="0"></iframe>');
}


function getQueryString(key) {
	urlPath = window.location.search.substring(1);
	valuesArray = urlPath.split("&");
	for (i=0;i<valuesArray.length;i++) 
	{
		keyValPair = valuesArray[i].split("=");
		if (keyValPair[0] == key) 
		{
			return keyValPair[1];
		}
	}
}

//randDARTNumber function

var randDARTNumber=0;
function genSetRandDARTNumber() {
 randDARTNumber = Math.round(Math.random()*1000000000000);
}

genSetRandDARTNumber();



$(document).ready(function(){
	$(".promo_img_bkg").mouseover(function(){
	$(this).css("background-position", "0px -110px");
	});

	$(".promo_img_bkg").mouseout(function(){
	$(this).css("background-position", "0px 0px");
	});
	

	
/* new function to place Hot Pic 1 url in site sub nav tab for photos */
	var findPhotoLink = function findPhotoLink() {
             if (!document.getElementsByTagName) return false;
             if (!document.getElementById) return false;
             if (!document.getElementById("block-promo-5")) return false;
             if (!document.getElementById("navPhotos")) return false;
             var hotPic = document.getElementById("block-promo-5");
             var links = hotPic.getElementsByTagName("a");
             var linkurl = links[0].getAttribute("href");
             var mainNav = document.getElementById("navPhotos");
             var mainLinks = mainNav.getElementsByTagName("a");
             var mainLinkurl = mainLinks[0].getAttribute("href");
             mainLinks[0].setAttribute("href",linkurl);
    	}
      findPhotoLink();	
	
});

/* Track file downloads and/or promo clicks in Ominture */
function omniTrackCustomLink(fileDescription){
	var s=s_gi('nbcunbcuoxygenbu');
	s.tl(this,'o',fileDescription);
}
