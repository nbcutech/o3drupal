function createFrameAd(targetAdDiv, srcDartString, frameW, frameH){
    	targetAdDiv = "#" + targetAdDiv;
    	$(targetAdDiv).html('');
    	$(targetAdDiv).html('<iframe style="padding:0px;margin:0px;" src="/sites/all/themes/oxygen/js/adFrame.html?' + srcDartString + '" width="' + frameW + '" height="' +  frameH + '" ALLOWTRANSPARENCY name="iFrameContentBlock"	 scrolling="no" frameborder="0"></iframe>');
}

$(document).ready(function(){
        
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
	//var page = parseFileName(location.href);

	subMenuAnchors = $(".subMenu").children("a");
	//menuAnchors = $(".menu").children("a");
	$.each(subMenuAnchors, function(){
 
	    if ($(this).attr("href")==(location.pathname))
    	{

			$(this).parent().css({"background":"#5e5e8d none repeat scroll 0%", "color" : "#fff"});
		   	$(this).css("color", "#fff");
			$(this).parent().parent().children().show();
			$(this).parent().siblings(".gallery_list_header").addClass("collapsedMenu");
		}
		//console.log("found no match");
	});
/*	$.each(menuAnchors, function(){
	    if ($(this).attr("href").indexOf(page) > -1)
    	{
			$(this).parent().css({"background":"#5e5e8d none repeat scroll 0%", "color" : "#fff"});
			$(this).css("color", "#fff");
		}
	});	*/

 	$("#galleryMenu").show();

 
 photosArray =  $(".gallery_urls li").children("a"); //grab all photos
 photosCount = photosArray.size();
 currentPhotoIndex = 0;
 firstPhotoIndex = 0;
 lastPhotoIndex  = photosCount-1;
 
 
 
 $("#photos_button_left").click(function(){
  if(currentPhotoIndex ==firstPhotoIndex)
  {
      currentPhotoIndex = lastPhotoIndex;
      $("#largeImage").attr("src",photosArray[currentPhotoIndex].href);
  }
  else// if(currentPhotoIndex <= (lastPhotoIndex))
  {
      currentPhotoIndex -=1;
      $("#largeImage").attr("src",photosArray[currentPhotoIndex].href);
  }
  updateCaption();
  updateURL();
 
/* Refresh ad iframes by HM */
		topBannerString = escape($("#dart_string_728x90").html());
		rightBannerString = escape($("#dart_string_300x250").html());

		createFrameAd("topAdBlock", topBannerString , "728", "90");
		createFrameAd("x95AdBlock", rightBannerString , "300", "250");


  return false;  
 });
 
 
 $("#photos_button_right").click(function(){
     if(currentPhotoIndex < lastPhotoIndex)
     {
	  currentPhotoIndex = currentPhotoIndex +1;
	  $("#largeImage").attr("src",photosArray[currentPhotoIndex].href);
     }
     else //if(currentPhotoIndex == (lastPhotoIndex))
     {
	  currentPhotoIndex =firstPhotoIndex;
	  $("#largeImage").attr("src",photosArray[currentPhotoIndex].href);
     }
     updateCaption();
     updateURL();

 
/* Refresh ad iframes by HM */
		topBannerString = escape($("#dart_string_728x90").html());
		rightBannerString = escape($("#dart_string_300x250").html());

		createFrameAd("topAdBlock", topBannerString , "728", "90");
		createFrameAd("x95AdBlock", rightBannerString , "300", "250");

     return false; 
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
   picCaption = $(photosArray[currentPhotoIndex]).html();
   
	if (s){s.t();}	// send omniture page view call
	genSetRandDARTNumber(); //generate a new randDARTNumber for prev/next buttons

   $("#photoCaption").html(picCaption);
   $("#photoIndex").html((currentPhotoIndex+1) + " of " + photosCount);
   commentsUrl="/photos/next/"+image_list[currentPhotoIndex];
   $("#gallery_all_comments").load(commentsUrl);
} 
 

	
	//If valid photo index is defined in URL load that photo. Otherwise, load first image and caption after page load
	tempurlHash = location.hash;                //#33 or empty on first load
	tempurlHashIndex = tempurlHash.replace("#",""); 
	if(tempurlHashIndex != "" && (tempurlHashIndex <= photosCount))
	{
		currentPhotoIndex = (parseInt(tempurlHashIndex)) - 1;
		$("#largeImage").attr("src",photosArray[currentPhotoIndex].href);
	
	}
	else
	{
		$("#largeImage").attr("src",photosArray[firstPhotoIndex].href); 
	} 
	updateCaption();
 
 
//Delete comments in admin mode 

	$(".unpublish_comment_photo").livequery('click',function(e) 
	{
       	if (confirm('Are you sure to delete this comment')) 
		{
			 $.ajax({ type: "POST",
			        url: $(this).attr("href") ,
			        dataType: "html",
			        data:{},
			        processData: true,
			        error: function(XMLHttpRequest, textStatus, errorThrown) {},
			        success: {}
			    });
			e.preventDefault();
			$(this).parent().parent().hide('slow');

		}
        	else
		{
			e.preventDefault();
		}
	});



//Report comment as offensive

	$("a.report_comment_photo").livequery('click', function(event) { 
//      	$.post($(this).attr("href"), "");
		escapedURL = escape(location.href);
		escapedURL = escapedURL.replace(/\//g,"|");
		escapedURL = escapedURL.replace("%23","/");
		reportURL = $(this).attr("href");
		reportURL = reportURL + "/" + escapedURL;
		
		$.ajax({ type: "POST",
			url: reportURL ,
			dataType: "html",
			data:{},
			processData: true,
			error: function(XMLHttpRequest, textStatus, errorThrown) {},
			success: {}
		});

		$(this).css("background", "transparent url(/themes/torianddean/images/red_report.gif) no-repeat scroll 0 0");
		event.preventDefault();
    });

	
});
