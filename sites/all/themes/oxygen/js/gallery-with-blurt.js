/* Last updated Fri, Jul 02, 2010 by Hanan Mahmood */
function attachBlurtBack () {
	$("div.blurts.bl-bb-container").click(function () {
		$("#gallery_share").animate({height: "350px"}, 200);
	});
	$("div.blurts.bl-close.blurts-recorder-close-button").click(function(){
		$("#gallery_share").animate({height: "175px"}, 200);
	});
}
$(document).ready(function(){
	if(typeof blurts == "object") {
		if(!blurts.suspended()) {
			blurts.suspend(); 
		}
		/*blurts.bind([blurts.EV_RECORDER_WILL_APPEAR, blurts.EV_RECORDER_WILL_DISAPPEAR],
		function (e) {
			if(e.event == blurts.EV_RECORDER_WILL_APPEAR) {
				$("#gallery_share").animate({height: "335px"}, 200);
			} else {
				$("#gallery_share").animate({height: "175px"}, 200);
			}
		});*/
	}
 	links = $(".menu").children(".gallery_list_header");
	$(links).click(function(e){
		$(this).siblings().slideToggle(800);
 
		/*change the background image of collpassible menu arrow.  
		By default the ".link" class has background image with 
		closed arrow ">"				
		*/
		$(this).toggleClass("collapsedMenu");
		e.preventDefault(); 
		
	});
	// collapse appropriate menu
	subMenuAnchors = $(".subMenu").children("a");
	//menuAnchors = $(".menu").children("a");
	$.each(subMenuAnchors, function(){
 
	    if ($(this).attr("href")==(location.pathname))
    	{

			$(this).parent().css({"background":"#565656 none repeat scroll 0%", "color" : "#fff"});
		   	$(this).css("color", "#fff");
			$(this).parent().parent().children().show();
			$(this).parent().siblings(".gallery_list_header").addClass("collapsedMenu");
		}
		//console.log("found no match");
	});
 	$("#galleryMenu").show();
	
 	photosArray =  $(".gallery_urls li").children("span"); //grab all photos
 	photosCount = photosArray.size();
 	currentPhotoIndex = 0;
 	firstPhotoIndex = 0;
 	lastPhotoIndex  = photosCount-1;
  			       
	function galleryMoveLeft(){
			
			$("#largeImage").removeAttr('width');
			$("#largeImage").removeAttr('height');
			
  		if(currentPhotoIndex ==firstPhotoIndex)
  		{
      			currentPhotoIndex = lastPhotoIndex;
					
					if($(photosArray[currentPhotoIndex]).attr("href") == '/sites/default/files/images/the-glee-project-episode-4-dance-ability-004.jpg'){
						$("#largeImage").attr({"src":'http://27.media.tumblr.com/tumblr_lngpcnbvAc1qm43kso1_500.jpg','width':'448','height':'299'});
						//$("#largeImage").removeClass('neverThinglink');
					//$("#largeImage").addClass('alwaysThinglink ');
					}else{
						$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
						//$("#largeImage").addClass('neverThinglink');
					}
      			
  		}
  		else// if(currentPhotoIndex <= (lastPhotoIndex))
  		{
      			currentPhotoIndex -=1;
		
					if($(photosArray[currentPhotoIndex]).attr("href") == '/sites/default/files/images/the-glee-project-episode-4-dance-ability-004.jpg'){
						$("#largeImage").attr({"src":'http://27.media.tumblr.com/tumblr_lngpcnbvAc1qm43kso1_500.jpg','width':'448','height':'299'});
						//$("#largeImage").removeClass('neverThinglink');
					//$("#largeImage").addClass('alwaysThinglink ');
					}else{
						$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
						//$("#largeImage").addClass('neverThinglink');
					}
  		}
						//__thinglink.rebuild();
  		updateCaption();
  		updateURL();
  		updateSponsorScript();
 
		/* Refresh ad iframes */
		topBannerString = escape($("#dart_string_728x90").html());
		rightBannerString = escape($("#dart_string_300x250").html());

		createFrameAd("topAdBlock", topBannerString , "728", "90");
		createFrameAd("x95AdBlock", rightBannerString , "300", "250");


  		return false;  
 	};
 
	function galleryMoveRight(){
			
			$("#largeImage").removeAttr('width');
			$("#largeImage").removeAttr('height');
		
     		if(currentPhotoIndex < lastPhotoIndex)
     		{
	  			currentPhotoIndex = currentPhotoIndex +1;			
				
				if($(photosArray[currentPhotoIndex]).attr("href") == '/sites/default/files/images/the-glee-project-episode-4-dance-ability-004.jpg'){
					$("#largeImage").attr({"src":'http://27.media.tumblr.com/tumblr_lngpcnbvAc1qm43kso1_500.jpg','width':'448','height':'299'});
					//$("#largeImage").removeClass('neverThinglink');
					//$("#largeImage").addClass('alwaysThinglink ');
				}else{
					$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
					//$("#largeImage").addClass('neverThinglink');
				}
     		}
     		else //if(currentPhotoIndex == (lastPhotoIndex))
     		{
	  			currentPhotoIndex =firstPhotoIndex;		
							
				if($(photosArray[currentPhotoIndex]).attr("href") == '/sites/default/files/images/the-glee-project-episode-4-dance-ability-004.jpg'){
					$("#largeImage").attr({"src":'http://27.media.tumblr.com/tumblr_lngpcnbvAc1qm43kso1_500.jpg','width':'448','height':'299'});
					//$("#largeImage").removeClass('neverThinglink');
					//$("#largeImage").addClass('alwaysThinglink ');
				}else{
					$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
					//$("#largeImage").addClass('neverThinglink');
				}
     		}
					//__thinglink.rebuild();
     		updateCaption();
     		updateURL();
     		updateSponsorScript();
 
		/* Refresh ad iframes */
		topBannerString = escape($("#dart_string_728x90").html());
		rightBannerString = escape($("#dart_string_300x250").html());

		createFrameAd("topAdBlock", topBannerString , "728", "90");
		createFrameAd("x95AdBlock", rightBannerString , "300", "250");
     		return false; 
 	};
	
 $("#photos_button_left").click(galleryMoveLeft);
 $("#photos_button_right").click(galleryMoveRight);
   $(document).keydown(function(e){
      if (e.keyCode == 37) { 
         galleryMoveLeft;
         return false;
      }
      if (e.keyCode == 39) { 
         galleryMoveRight;
         return false;
      }
  });
 
 
 	function updateURL()
 	{
    	urlHash = location.hash;                //#33 or empty on first load
		urlHashIndex = urlHash.replace("#",""); //changes #33 to 33 or empty on first load
    		if (urlHash != "")
		{
			trimmedURL = location.href.replace(urlHash, "#" + (currentPhotoIndex+1));
			location.href = trimmedURL;
		}
		else
		{
	    		trimmedURL = location.href + ("#" + (currentPhotoIndex+1)) ; 
			location.href = trimmedURL;
		}
		return urlHashIndex;
 	}
 
	function updateCaption()
	{ 
		if (s){s.t();}	// send omniture page view call
   		picCaption = $(photosArray[currentPhotoIndex]).html();
  		$("#gallery_share").height(35); 
		$("#photoBlurtsPlayer").html("");
		genSetRandDARTNumber(); //generate a new randDARTNumber for prev/next buttons

   		$("#photoCaption").html(picCaption);
		if($(photosArray[currentPhotoIndex]).children("a.blurt_photo_comment").length > 0) {
			$("#photo_blurts_img").css("display", "inline");
			$("#photo_share").css("width", "auto");
			blurts_link = $($(photosArray[currentPhotoIndex]).children("a.blurt_photo_comment")[0]).clone();
			$(blurts_link).appendTo("#photoBlurtsPlayer");
		} else {
			$("#photo_blurts_img").css("display", "none");
			$("#photo_share").css("width", "100%");
			$("#photoBlurtsPlayer").html("");
		}
   		$("#photoIndex").html((currentPhotoIndex+1) + " of " + photosCount);
		$("#edit_gallery_image").attr("href", "/node/" + image_list[currentPhotoIndex] + "/edit"); //EDIT photo
	} 
 

	
	//If valid photo index is defined in URL load that photo. Otherwise, load first image and caption after page load
	tempurlHash = location.hash;                //#33 or empty on first load
	
	
	
	splitTempURL = tempurlHash.split('?');
	if(splitTempURL[1] == undefined){
		// Do nothing
	}else{
		tempurlHash = splitTempURL[1];
	}
		
	
//	if(window.console){
//		console.log(tempurlHash);	
//	}
	
	tempurlHashIndex = tempurlHash.replace("#",""); 
	if(tempurlHashIndex != "" && (tempurlHashIndex <= photosCount))
	{
		currentPhotoIndex = (parseInt(tempurlHashIndex)) - 1;
		//$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
				
		if($(photosArray[currentPhotoIndex]).attr("href") == '/sites/default/files/images/the-glee-project-episode-4-dance-ability-004.jpg'){
			$("#largeImage").attr({"src":'http://27.media.tumblr.com/tumblr_lngpcnbvAc1qm43kso1_500.jpg','width':'448','height':'299'});
			//$("#largeImage").removeClass('neverThinglink');
					//$("#largeImage").addClass('alwaysThinglink ');
		}else{
			$("#largeImage").attr("src",$(photosArray[currentPhotoIndex]).attr("href"));
			//$("#largeImage").addClass('neverThinglink');
		}
	
	}
	else
	{
		$("#largeImage").attr("src",$(photosArray[firstPhotoIndex]).attr("href")); 
	}
	//__thinglink.rebuild();
	updateCaption();
 

	/******Add photo node hit counter *******************/
	hitCounterPath = "/photos/access_counter/" + nid + "/" + theme_key;
	$.ajax({ type: "POST",
				url: hitCounterPath ,
				dataType: "html",
				data:{},
				processData: true,
				error: function(XMLHttpRequest, textStatus, errorThrown) {}

	});
	/* Hook up gallery navigation with arrow keyws. */
	$(document).keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
	    switch(code)
	    {
	        case 37:   //left arrow
	            $("#photos_button_left").click();
	            break;
	        case 39: //right arrow
	            $("#photos_button_right").click();          
	            break;
	    }    
	});
	
	/*update sponsorshop banner ad pixel, if exists, with photo change*/
function updateSponsorScript() {
	if(!document.getElementById) return false;
	if(!document.getElementById('photoSponsorBanner')) return false;
	var randDARTNumber = Math.round(Math.random()*1000000000000);
	var photoSponsorBanner = document.getElementById('photoSponsorBanner');
	if(document.getElementById('photoSponsorIframe')) {
		var photoSponsorIframe = document.getElementById('photoSponsorIframe')
		photoSponsorBanner.removeChild(photoSponsorIframe);
	}
	
	var iframe = document.createElement('iframe');
	var frmbrdr = document.createAttribute("frameborder");
	var srcString = '<script>document.write("<sc"+"ript language=\'JavaScript1.1\' src=\'http://ad.doubleclick.net/adj/nbcu.oxygen/storibook_ikealogo;site=oxygen;show=storibook;sect=ikealogo;genre=;daypart=primetime;!category=storibook;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?\'></s"+"cript>");<\/script>';
	iframe.id = 'photoSponsorIframe';
	iframe.height = 1;
	iframe.width = 1;
	frmbrdr.nodeValue = 0;
	iframe.setAttributeNode(frmbrdr);
	photoSponsorBanner.appendChild(iframe);
	iframe = (iframe.contentWindow) ? iframe.contentWindow : (iframe.contentDocument.document) ? iframe.contentDocument.document : iframe.contentDocument;
	iframe.document.open();
	iframe.document.write(srcString);
	iframe.document.close();
};
	
	
	$("#photo_blurts_img").click(function () {
		if($("#gallery_share").height() < 100) {
			$("#gallery_share").animate({
				height: "175px"
			}, 500, 
			function () {
				if($("#photoBlurtsPlayer a.blurt_photo_comment").length > 0) {
					$("#photoBlurtsPlayer a.blurt_photo_comment").show();
					blurts.players("div#photoBlurtsPlayer");
					setTimeout("attachBlurtBack()", 1000);
				} else {
					$("#photoBlurtsPlayer").show();
				}
			});
		} else {
			$("#gallery_share").animate({
				height: "35px"
			}, 500, 
			function () {
				$("#photoBlurtsPlayer").hide();
			});
		}
	});
});
