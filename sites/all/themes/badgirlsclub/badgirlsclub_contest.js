//alert('test');
var badgirlsclub = {};

$(document).ready(function() {
 $(".block-google_cse").hide();
 $("#comments").hide();
 twttr.events.bind('follow', badgirlsclub.twitter_follow); 
  $('.bing-logo').click(function() {
  	badgirlsclub.bingLogo();
	});
	$('.decisions-header').remove();
  window.fbAsyncInit = function() 
  {
     FB.init({
         appId: '244546252233073',
         status: true,
         cookie: true,
         xfbml: true
     });
      FB.Canvas.setAutoResize(7);
   		FB.Canvas.setSize({ height: 1500	 });
   		FB.Event.subscribe('edge.create', function(response) {
			  badgirlsclub.fblike(response);
			});
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
  $('.uiGrid').hide();
	
	var voted = badgirlsclub.checkIfVoted();
	if(voted != null) {
		$('.tobehidden').hide();
		$('.cookie').show();
		
		var options = badgirlsclub.obj($('#voting_options').val());
		var label = badgirlsclub.getLabelFromOffset(options, voted);
		var tweet_text = 'I voted for ' + label + ' in the Bing Fan Favorite poll!Vote for your fav #TheGleeProject contender: via @TheGleeProject';
		$('.twitter-share-button').attr("data-text", tweet_text);
		//alert("You have already voted for "  + label + ", your vote would not be counted");
	}	
	else {
		badgirlsclub.performVote();
	}
});

badgirlsclub.fblike = function(response) {
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;242435459;4798747;b?http://clk.atdmt.com/MRT/go/323227570/direct;wi.1;hi.1/01/');
	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'fb_like'});
	badgirlsclub.omnitureTrack('facebook', 'bing');        
}

badgirlsclub.bingLogo = function() {
	//document.write('<sc'+'ript language=\'JavaScript1.1\' src=""http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242434320aug29;site=oxygen;sect=bingfanfavorite;sub=242434320aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?""></s'+'cript>');
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;242435001;4798747;k?http://clk.atdmt.com/MRT/go/323227567/direct;wi.1;hi.1/01/');
	window.location.href = 'http://ad.doubleclick.net/clk;242435001;4798747;k?http://clk.atdmt.com/MRT/go/323227567/direct;wi.1;hi.1/01/';
}

badgirlsclub.twitter_follow = function(intent_event) {
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;242435375;4798747;y?http://clk.atdmt.com/MRT/go/323227571/direct;wi.1;hi.1/01/');
	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'twitter_follow'});
	badgirlsclub.omnitureTrack('twitter', 'bing');        
}

badgirlsclub.omnitureTrack = function(network, partner) {
	s.prop52=partner + ' : Share with ' + network; 
       s.tl(this,'o',partner +' : Share with '+network); // Call to initiate omniture tracking call
}

badgirlsclub.getExpiryDate = function () {
		
	var myDate=new Date();
  
  var a = myDate.getDate();
  var t = myDate.getDay(); 
  var r;
  var newDate = new Date();

  if(t != 1) {
  	r = a - t + 8;

  	newDate.setHours(20, 0 ,0);
  }
  else {
  	var time = myDate.getHours();
  	if(time < 20) {
  		r = a;
  	}
  	else {
  		r = a+7;
  	}
  }	
  newDate.setDate(r);
  newDate.setHours(20, 0 ,0);

  return newDate;
}

//Handlers to catch the option value and submit to server
badgirlsclub.performVote = function () {
	$('.clicktovote').click(function(event) {
		
		var vote_offset = $(this).attr('data-voteoffset');
		var options = badgirlsclub.obj($('#voting_options').val());
	//	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'vote'});
		var label = badgirlsclub.getLabelFromOffset(options, vote_offset);
		//alert('Your vote for ' + label  + " will be submitted" );
		if($('input#edit-choice-'+vote_offset).length) {
			$('input#edit-choice-'+vote_offset).attr("checked", "checked");
		}
		else {
				$('input#edit-choice-'+vote_offset+'-1').attr("checked", "checked");
		}
	
		var isIE = badgirlsclub.vIE ();
		if(true) {
			alert('Your vote for ' + label + ' has been submitted! \n Vote again next week and track your favorite contenders popularity on the leader board on the bottom of this page.');
			badgirlsclub.setCookieVoting(vote_offset);
				if($('input#edit-vote').length) {
					$('input#edit-vote').click();
				}
				else {
					$('input#edit-vote-1').click();
				}
				//window.location.reload();
		}
		else {
			$.modaldialog.success('Your vote for <b>' + label + '</b> has been submitted! <br/> Vote again next week and track your favorite contenders popularity on the leader board on the bottom of this page.');
			$('#dialog-button').click(function(event){
			  badgirlsclub.setCookieVoting(vote_offset);
				if($('input#edit-vote').length) {
					$('input#edit-vote').click();
				}
				else {
					$('input#edit-vote-1').click();
				}
				//window.location.reload();
				
			});
		}
		
	});
}
badgirlsclub.vIE = function(){return (navigator.appName=='Microsoft Internet Explorer')?parseFloat((new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})")).exec(navigator.userAgent)[1]):-1;}
//Set cookie to remember the user has voted for an option
badgirlsclub.setCookieVoting = function(value) {
	var voting_period = 5;
	var voting = badgirlsclub.getExpiryDate();
	$.cookie('badgirl_voting', value, { expires: voting,path: '/' });
}

badgirlsclub.checkIfVoted = function() {
	return $.cookie('badgirl_voting');
}

//Return the users vote label from id
badgirlsclub.getLabelFromOffset = function(object, vote_offset) {
	var ret = null;
	$.each(object, function(i, item) {
		if(item.vote_offset == vote_offset) {
			ret = item.label;
		}
	});
	return ret;
}

// returns object .. accepts json string .. includes error handeling and crashes gracefully
badgirlsclub.obj = function (jsonString) {
    if (jsonString == "") { alert("Service Data is empty!"); return false }
    var firstinstance = $.trim(jsonString + "").indexOf("{")==0 || $.trim(jsonString + "").indexOf("[")==0;
    if (firstinstance) {
        return (eval("(" + jsonString + ")"))    
    }
    else {
        return false;
    }
}