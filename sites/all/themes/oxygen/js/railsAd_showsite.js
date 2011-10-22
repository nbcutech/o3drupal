$(document).ready (function () {
	
	// ad tag that will passthru the javascript custom name=value pairs from the ad server 
	if((typeof(railAdBg)!='undefined')&&(railAdBg)) 
	{ // site specific custom background code. 
		$("#mainBg").css("background-image", "none");
		$("#logo img").attr("src", "/common/images/_global2009/logotransparent_new.png");
		$('body').css({'background-image':'url('+railAdBg+')', 'background-attachment': 'fixed'} ) ;
	} 
	
	if((typeof(railAdBgColor)!='undefined')&&(railAdBgColor)) 
	{ // site specific custom background color code. 
	
		$('body').css({'background-color':'#'+railAdBgColor}); 
	} 
	
	if((typeof(railAdBgRepeat)!='undefined')&&(railAdBgRepeat))
	{ // site specific custom background repeat code. 
		$('body').css({'background-repeat':'no-repeat'/*railAdBgRepeat*/}); 
	} 
	
	if((typeof(railAdBgClickthru)!='undefined')&&(railAdBgClickthru)) 
	{ // site specific custom background click event code. 
		// site specific custom background click event code.
		$('#mainBg').click(function (e) 
		{
			
			evt = e || window.event;
			if (e.target) targ = e.target;
			else if (e.srcElement) targ = e.srcElement;
			if (targ.nodeType == 3) // Safari bug
				targ = targ.parentNode;
			if (targ.id == $('#mainBg').attr('id')) 
			{
				window.open(railAdBgClickthru);
			}
		}); //end mainBg click
		
		
		$('body').click(function (e) 
		{
			
			evt = e || window.event;
			if (e.target) targ = e.target;
			else if (e.srcElement) targ = e.srcElement;
			if (targ.nodeType == 3) // Safari bug
				targ = targ.parentNode;
			if (targ.style == $('body').attr('style')) 
			{
				window.open(railAdBgClickthru);
			}
		});
		
		
		
		
		
	}
});//end document ready