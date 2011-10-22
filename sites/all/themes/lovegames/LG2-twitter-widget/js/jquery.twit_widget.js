// JavaScript Document

function twit_widget_timeago(date_str){
	var time_formats = [
	[60, 'just now', 1], // 60
	[120, '1 minute ago', '1 minute from now'], // 60*2
	[3600, 'minutes', 60], // 60*60, 60
	[7200, '1 hour ago', '1 hour from now'], // 60*60*2
	[86400, 'hours', 3600], // 60*60*24, 60*60
	[172800, 'yesterday', 'tomorrow'], // 60*60*24*2
	[604800, 'days', 86400], // 60*60*24*7, 60*60*24
	[1209600, 'last week', 'next week'], // 60*60*24*7*4*2
	[2419200, 'weeks', 604800], // 60*60*24*7*4, 60*60*24*7
	[4838400, 'last month', 'next month'], // 60*60*24*7*4*2
	[29030400, 'months', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
	[58060800, 'last year', 'next year'], // 60*60*24*7*4*12*2
	[2903040000, 'years', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
	[5806080000, 'last century', 'next century'], // 60*60*24*7*4*12*100*2
	[58060800000, 'centuries', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
	];
	
	//var time = ('' + date_str).replace(/-/g,"/").replace(/[TZ]/g," ").replace(/^\s\s*/, '').replace(/\s\s*$/, ''); //console.log(time);
	var time = date_str;
	if(time.substr(time.length-4,1)==".") time =time.substr(0,time.length-4);
	var seconds = (new Date - new Date(time)) / 1000; 
	var token = 'ago', list_choice = 1;
	if (seconds < 0) {
		seconds = Math.abs(seconds);
		token = 'from now';
		list_choice = 2;
	}
	var i = 0, format;
	while (format = time_formats[i++])
		if (seconds < format[0]) {
			if (typeof format[2] == 'string'){
				return format[list_choice];
			}else{
				if(format[1] == 'just now'){
					return format[1] + ' ' + token;
				}else{
					return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
				}
			}
		}
	return time;
}

(function( $ ){

  var methods = {
    init : function( options ) { 
		//Need static var to check against and use as counters/interval IDs
		$('#twit-widget').data('twitWidgerIntervalID1', 0 );
		$('#twit-widget').data('twitWidgerIntervalID2', 0 );
		$('#twit-widget').data('counters', { slideIndex : 0, currentIndex : 0} );
		$('#twit-widget').data('feed');
		$('#twit-widget').data('firstID');
		$('#twit-widget').data('username');
		
		var settings = {
			'username' : 'twitter',
			'type' : 'username' //Types: username, list
		 };
		
		if ( options ) { 
			$.extend( settings, options );
		}
		
		$('#twit-widget').data('username',  settings['username']);
		
		$.ajax({ 
			type: "GET",
			url: 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' + $('#twit-widget').data('username'),
			dataType: "jsonp",
			success: function(json) {
				$('#twit-widget').data('feed', json);
				
				//Setup Username and Icon and get first tweet
				$.each($('#twit-widget').data('feed'), function(i, item) {
					//Set ID of first tweet for comparison on update feed
					var itemID = item['id'];
					itemID = itemID + 20;
					$('#twit-widget').data('firstID', itemID);
					$('#twit-widget').data('firstID', itemID);
					
					//Follow btn
					$('#twit-widget div.footer a.follow-btn').attr('href', 'http://twitter.com/intent/user?screen_name='+ item.user["screen_name"]);
					
					//User data
					var screen_name = item.user["screen_name"];
					var user_img = item.user["profile_image_url"];
					
					$('#twit-widget div.body').prepend('<div class="tweeter"><img src="'+user_img+'" width="40" height="40" /> <a href="http://twitter.com/intent/user?screen_name='+screen_name+'" class="screen_name">@'+screen_name+'</a></div>');
					
					//Tweet data
					var text = item["text"];
					var createdAt = item["created_at"];
					var source = item["source"];
					var itemID = item["id"];
					
					var tweet = '<div class="tweet">' + text + '<small id="' + itemID + '">' + twit_widget_timeago(createdAt) + ' via ' + source + '</small></div>';
		
					$('#twit-widget div.body div.tweet span').html(tweet);
					
					$(tweet).hide().prependTo("#twit-widget div.body div.tweet-container").show("slow");
					
					return false;
				});
				var newSlideIndex = $('#twit-widget').data('counters').slideIndex;
				
				newSlideIndex++;
				var newCurrentSlide = newSlideIndex;
				
				$('#twit-widget').data('counters', { slideIndex : newSlideIndex, currentIndex : newCurrentSlide} );
				
				$('#twit-widget').data('twitWidgerIntervalID1', window.setInterval("$jQuery15('#twit-widget').twit_widget('rotate');", 7000));
				$('#twit-widget').data('twitWidgerIntervalID2', window.setInterval("$jQuery15('#twit-widget').twit_widget('updateFeed');", 20000));
			}
		});
	 },
	 rotate: function( ) {
		//Update display to add new tweet in current feed
		$.each($('#twit-widget').data('feed'), function(i, item) {			
			//Tweet data
			var text = item["text"];
			var createdAt = item["created_at"];
			var source = item["source"];
			var itemID = item["id"];
			
			if(i == $('#twit-widget').data('counters').slideIndex){ 
				var tweet = '<div class="tweet">' + text + '<small id="' + itemID + '">' + twit_widget_timeago(createdAt) + ' via ' + source + '</small></div>';
	
				$('#twit-widget div.body div.tweet span').html(tweet);
				
				$(tweet).hide().prependTo("#twit-widget div.body div.tweet-container").show("slow");
				
				return false;
			}
		});
		
		var newSlideIndex = $('#twit-widget').data('counters').slideIndex;
		
		newSlideIndex++;
		var newCurrentSlide = newSlideIndex;
		
		$('#twit-widget').data('counters', { slideIndex : newSlideIndex, currentIndex : newCurrentSlide} );
		
	 },
	 updateFeed: function( ) {
		$.ajax({
			type: "GET",
			url: 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' + $('#twit-widget').data('username') + '&since_id=' + $('#twit-widget').data('firstID'),
			dataType: "jsonp",
			success: function(json) { //console.log(json);
				$.each(json, function(i, item) {	
					console.log(item['id']);
					var itemID = item['id'];
					itemID = itemID + 20; 
					
					$('#twit-widget').data('firstID', itemID);
					$('#twit-widget').data('feed', json);
					$('#twit-widget').data('counters', { slideIndex : 0, currentIndex : 0} );
					return false;
				});
			}
		});
	 }
  };

  $.fn.twit_widget = function( method ) {
    
    // Method calling logic
    if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.twit_widget' );
    }    
  
  };

})( jQuery );


(function() {
  if (window.__twitterIntentHandler) return;
  var intentRegex = /twitter\.com(\:\d{2,4})?\/intent\/(\w+)/,
      windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes',
      width = 550,
      height = 420,
      winHeight = screen.height,
      winWidth = screen.width;

  function handleIntent(e) {
    e = e || window.event;
    var target = e.target || e.srcElement,
        m, left, top;

    while (target && target.nodeName.toLowerCase() !== 'a') {
      target = target.parentNode;
    }

    if (target && target.nodeName.toLowerCase() === 'a' && target.href) {
      m = target.href.match(intentRegex);
      if (m) {
        left = Math.round((winWidth / 2) - (width / 2));
        top = 0;

        if (winHeight > height) {
          top = Math.round((winHeight / 2) - (height / 2));
        }

        window.open(target.href, 'intent', windowOptions + ',width=' + width +
                                           ',height=' + height + ',left=' + left + ',top=' + top);
        e.returnValue = false;
        e.preventDefault && e.preventDefault();
      }
    }
  }

  if (document.addEventListener) {
    document.addEventListener('click', handleIntent, false);
  } else if (document.attachEvent) {
    document.attachEvent('onclick', handleIntent);
  }
  window.__twitterIntentHandler = true;
}());