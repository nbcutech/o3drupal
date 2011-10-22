//alert('test');
var thegleeVoting = {};

$(document).ready(function() {

 twttr.events.bind('follow', thegleeVoting.twitter_follow); 
  $('.bing-logo').click(function() {
  	thegleeVoting.bingLogo();
	});
	$('.decisions-header').remove();
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
   		FB.Event.subscribe('edge.create', function(response) {
			  thegleeVoting.fblike(response);
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
	
	var voted = thegleeVoting.checkIfVoted();
	var is_active = $('input#voting_active').val();
	var tovote = (is_active == "false");
	
	if(voted || tovote) {
		$('.tobehidden').hide();
		$('.cookie').show();
		if(voted!=null) {
		var options = thegleeVoting.obj($('#voting_options').val());
		var label = thegleeVoting.getLabelFromOffset(options, voted);
		var tweet_text = 'I voted for ' + label + ' in the Bing Fan Favorite poll!Vote for your fav #TheGleeProject contender: via @TheGleeProject';
		$('.twitter-share-button').attr("data-text", tweet_text);
		//alert("You have already voted for "  + label + ", your vote would not be counted");
                }
	}	
	else {
		thegleeVoting.performVote();
	}
});

thegleeVoting.fblike = function(response) {
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;243653099;4798747;e?http://clk.atdmt.com/MRT/go/340923538/direct;at.PIX_NOFORM_core_Q4HI_BINGcomGleePromo_1x1;ct.1/01/');
	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'fb_like'});
	thegleeVoting.omnitureTrack('facebook', 'bing');        
}

thegleeVoting.bingLogo = function() {
	//document.write('<sc'+'ript language=\'JavaScript1.1\' src=""http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242434320aug29;site=oxygen;sect=bingfanfavorite;sub=242434320aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?""></s'+'cript>');
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;242435001;4798747;k?http://clk.atdmt.com/MRT/go/323227567/direct;wi.1;hi.1/01/');
	window.location.href = 'http://ad.doubleclick.net/clk;242435001;4798747;k?http://clk.atdmt.com/MRT/go/323227567/direct;wi.1;hi.1/01/';
		//document.write('<sc'+'ript language=\'JavaScript1.1\' src=""http://ad.doubleclick.net/adj/nbcu.oxygen/bingfanfavorite_242434320aug29;site=oxygen;sect=bingfanfavorite;sub=242434320aug29;genre=;daypart=primetime;!category=bingfanfavorite;!category=js;!category=oxygen;network=tvn;sz=1x1;tagtype=js;uri=;pos=9;tile=9;ord=' + randDARTNumber + '?""></s'+'cript>');
		$.get('/proxy.php?url=http://ad.doubleclick.net/clk;243648491;4798747;e?http://clk.atdmt.com/MRT/go/340923540/direct;at.PIX_MFEHPG_core_Q4HI_BINGcomGlee_1x1;ct.1/01/');
		window.location.href = 'http://ad.doubleclick.net/clk;243648491;4798747;e?http://clk.atdmt.com/MRT/go/340923540/direct;at.PIX_MFEHPG_core_Q4HI_BINGcomGlee_1x1;ct.1/01/';
}

thegleeVoting.twitter_follow = function(intent_event) {
	$.get('/proxy.php?url=http://ad.doubleclick.net/clk;243653768;4798747;h?http://clk.atdmt.com/MRT/go/340923539/direct;at.PIX_NOFORM_core_Q4HI_BINGcomGleePromo_1x1;ct.1/01/');
	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'twitter_follow'});
	thegleeVoting.omnitureTrack('twitter', 'bing');        
}

thegleeVoting.omnitureTrack = function(network, partner) {
	s.prop52=partner + ' : Share with ' + network; 
       s.tl(this,'o',partner +' : Share with '+network); // Call to initiate omniture tracking call
}

thegleeVoting.getExpiryDate = function () {
		
	var myDate=new Date();
  
  var a = myDate.getDate();
  var t = myDate.getDay(); 
  var r;
  var newDate = new Date();
 
  if(t != 0) {
  	r = a - t + 7;
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
thegleeVoting.performVote = function () {
	$('.clicktovote').click(function(event) {
		var voted = thegleeVoting.checkIfVoted();
		
		var vote_offset = $(this).attr('data-voteoffset');
		var options = thegleeVoting.obj($('#voting_options').val());
	//	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'vote'});
		var label = thegleeVoting.getLabelFromOffset(options, vote_offset);
		//alert('Your vote for ' + label  + " will be submitted" );
		if($('input#edit-choice-'+vote_offset).length) {
			$('input#edit-choice-'+vote_offset).attr("checked", "checked");
		}
		else {
				$('input#edit-choice-'+vote_offset+'-1').attr("checked", "checked");
		}
	
	 if(voted!=null) {
			alert("YOu have already voted for " + label + ". Please vote again next week.");
			//	window.location.reload();
			return;
		}
		else {
			thegleeVoting.setCookieVoting(vote_offset);
		}
		var isIE = thegleeVoting.vIE ();
		if(true) {
			
			if(voted==null) {
				alert('Your vote for ' + label + ' has been submitted! \n Vote again next week and track your favorite contenders popularity on the leader board on the bottom of this page.');
				//thegleeVoting.setCookieVoting(vote_offset);
				if($('input#edit-vote').length) {
					$('input#edit-vote').click();
				}
				else {
					$('input#edit-vote-1').click();
				}
				//window.location.reload();
			}
			else {
				alert("YOu have already voted for " + label + ". Please vote again next week.");
			//	window.location.reload();
			return;
			}
		}
		else {
			$.modaldialog.success('Your vote for <b>' + label + '</b> has been submitted! <br/> Vote again next week and track your favorite contenders popularity on the leader board on the bottom of this page.');
			$('#dialog-button').click(function(event){
			  thegleeVoting.setCookieVoting(vote_offset);
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
thegleeVoting.vIE = function(){return (navigator.appName=='Microsoft Internet Explorer')?parseFloat((new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})")).exec(navigator.userAgent)[1]):-1;}
//Set cookie to remember the user has voted for an option
thegleeVoting.setCookieVoting = function(value) {
	var voting_period = 5;
	var voting = thegleeVoting.getExpiryDate();
	$.cookie('theglee_voting', value, { expires: voting,path: '/' });
}

thegleeVoting.checkIfVoted = function() {
	return $.cookie('theglee_voting');
}

//Return the users vote label from id
thegleeVoting.getLabelFromOffset = function(object, vote_offset) {
	var ret = null;
	$.each(object, function(i, item) {
		if(item.vote_offset == vote_offset) {
			ret = item.label;
		}
	});
	return ret;
}

// returns object .. accepts json string .. includes error handeling and crashes gracefully
thegleeVoting.obj = function (jsonString) {
    if (jsonString == "") { alert("Service Data is empty!"); return false }
    var firstinstance = $.trim(jsonString + "").indexOf("{")==0 || $.trim(jsonString + "").indexOf("[")==0;
    if (firstinstance) {
        return (eval("(" + jsonString + ")"))    
    }
    else {
        return false;
    }
}
