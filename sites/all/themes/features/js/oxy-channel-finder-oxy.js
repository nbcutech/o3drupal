// JavaScript Document

var $jQuery15 = jQuery.noConflict();

function oxy_channel_finder_validate(){
	var zipcode = $jQuery15('#zipcode').val(); //console.log(zipcode.length + '-' + zipcode);
	zipcode = zipcode.replace(/[^0-9]/g, ''); //console.log(zipcode.length + '-' + zipcode);
	
	if(zipcode.length == 5){
		return true;
	}else{
		$jQuery15('div.ch-content p.input').find('span.error').remove();
		$jQuery15('div.ch-content p.input').prepend('<span class="error">Please enter a valid 5 digit ZIP code</span>');
		return false;
	}
}

//function oxy_channel_finder_trim(str) {
//	var	str = str.replace(/^\s\s*/, ''),
//		ws = /\s/,
//		i = str.length;
//	while (ws.test(str.charAt(--i)));
//	return unescape(str.slice(0, i + 1));
//}

function oxy_channel_finder_action(){  //console.log('fire');
	var response = '';
	var post = '<?xml version="1.0" encoding="UTF-8"?><K2DATACOLLECTOR><CLIENT>Oxygen</CLIENT><ZIPCODE>' + $jQuery15('#zipcode').val() + '</ZIPCODE></K2DATACOLLECTOR>';
	if(oxy_channel_finder_validate()){
		$jQuery15.ajax({ 
			type: "GET",
			cache: false,
			url: 'http://features.oxygen.com/sites/all/themes/features/channel-finder.php?zip=' + $jQuery15('#zipcode').val() + '&callback=?',
			dataType: "jsonp",
			success: function(json) { //console.log(json);
				$jQuery15.each(json.provider,function(i,item){
																  
					var providerName = item.name; //console.log(providerName);
					var status = item.status;
					var channel = item.channel;
					var hdchannel = item.hdchannel;
					
					if(status == '1'){
						var ch = 'Channel: ' + channel;
						if(hdchannel.length > 0 && hdchannel != 0){
							var hd = '<br /><em>HD:' + hdchannel + '</em>';
						}else{
							var hd = '<br>&nbsp';
						}
					}else{
						var ch = 'Not Available';
						var hd = '<br>&nbsp';
					}
					
					response = response + '<div><div class="provider">' + providerName + '</div><div class="channel">' + ch + hd + '</div><div class="clear">&nbsp;</div></div>';	
				});
				
				$jQuery15('div.get-zip').hide();
				$jQuery15('div.ch-content').append('<div class="reset-channel-finder"><a href="#reset-channel-finder" class="reset-channel-finder" style="color:#7A10B6"><strong>&lt;&lt; Enter a different ZIP code</strong></a></div><h3 class="left">Provider</h3><h3 class="right">Available</h3><div class="prov-avail">' + response + '</div>');
			}
		});
	}
}

function oxy_channel_finder(){
	$jQuery15('input.get-provider').click( function(){
		oxy_channel_finder_action();
	});
	
	$jQuery15('#zipcode').bind('keypress', function(e) {
        if(e.keyCode==13){
				oxy_channel_finder_action();
		  }
	});
	
	$jQuery15('a.reset-channel-finder').live('click', function(){
		$jQuery15('h3.left').remove();
		$jQuery15('h3.right').remove();
		$jQuery15('div.prov-avail').remove();
		$jQuery15('div.reset-channel-finder').remove();
		
		$jQuery15('div.get-zip').slideDown('medium');
		
		return false;
	});
}

$jQuery15(document).ready(function(){
	oxy_channel_finder();
});