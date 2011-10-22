function meebo_checkform(){
	var formGood = true;
	
	jQuery('#bgc7-shout-out input.req').each( function (){
		var thisVal = jQuery(this).val();
		
		if(thisVal == ''){
			jQuery(this).css('background-color','red');
			formGood = false;
		}else{
			jQuery(this).css('background-color','#999');
		}
	});
	
	return formGood;
}

function meebo_createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function meebo_readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}


function meebo_checkcookie(){
	var cookieValue = meebo_readCookie('bgc_checkin_contest'); //console.log(cookieValue);
	
	if(cookieValue == null){
		return true;
	}else{
		var e = new Date();
		var year_today = e.getFullYear();
		var month_today = e.getMonth();
		var day_today = e.getDate();
		
		var d = new Date(cookieValue);
		var year_cookie = d.getFullYear();
		var month_cookie = d.getMonth();
		var day_cookie = d.getDate();
		
		var date_today = month_today + '-' + day_today + '-' + year_today;
		var date_cookie = month_cookie + '-' + day_cookie + '-' + year_cookie;
		
		if(date_today != date_cookie){
			return true;
		}else{
			return false;
		}
	}
}

function meebo_sendform(){
	jQuery('#bgc7-shout-out form').submit( function (){ 
		if(meebo_checkform()){
			jQuery.ajax({ 
				type: "POST",
				url: 'http://bad-girls-club.oxygen.com/sites/all/themes/badgirlsclub/meebo_checkincontest.php?action=add&data=' + jQuery('#bgc7-shout-out form').serialize(),
				dataType: "html",
				success: function(html) {
					meebo_createCookie('bgc_checkin_contest', new Date().getTime(), 1);
					jQuery('div.bgc7-shout-out-form div.inner').html(html);
					var v=setTimeout("Meebo('closeWidget', {id: 'shoutout'});", 2000);
					var v=setTimeout("Meebo('removeButton', {id: 'shoutout'});", 2100);
				}
			});	
		}
	
		return false;
	});
}

jQuery(document).ready( function (){
	meebo_sendform();
});