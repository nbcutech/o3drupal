// JavaScript Document
var $jQuery15 = jQuery.noConflict();
var fbCharlimit = 240;
var twCharlimit = 102;

function tgp_my_comment(value){
	if($('#signin_type').val() == 'twitter'){
		var charLimit = twCharlimit;
	}else{
		var charLimit = fbCharlimit;
	}
	
	var stringlen = value.length;
	if(stringlen > charLimit){
		$jQuery15('#my-comment').val(value.substr(0,(charLimit - 1)));
	}else{
		var charsLeft = charLimit - stringlen;
		$jQuery15('div.chars-left span').html(charsLeft);
	}
}

function tgp_comments(){
	$jQuery15.ajax({ 
		type: "GET",
		url: '/sites/all/themes/thegleeproject/tgp_homework.php?action=view&week=' + $jQuery15('#week').val(),
		dataType: "html",
		success: function(html) {
			$jQuery15('div.comment-stream').html(html);
		}
	});	
}

function tgp_comment_share(ID, element){
	$jQuery15.ajax({ 
		type: "GET",
		url: '/sites/all/themes/thegleeproject/tgp_homework.php?action=share&ID=' + ID + '&week=' + $jQuery15('#week').val(),
		dataType: "html",
		success: function(html) {
			element.html(html + ' people shared this');

			var network = 'twitter';
			var partner = 'listerine';
			s.linkTrackVars='prop52';
			s.prop52=partner +' : Share with '+network;
			s.tl(this,'o',partner +' : Share with '+network);
		}
	});	
}

function tgp_comment_like(ID, element, url){
	$jQuery15.ajax({ 
		type: "GET",
		url: '/sites/all/themes/thegleeproject/tgp_homework.php?action=like&ID=' + ID + '&week=' + $jQuery15('#week').val(),
		dataType: "html",
		success: function(html) {
			element.html(html + ' people shared this');
			
			var network = 'facebook';
			var partner = 'listerine';
			s.linkTrackVars='prop52';
			s.prop52=partner +' : Share with '+network;
			s.tl(this,'o',partner +' : Share with' +network);
		}
	});	
}

function tgp_comment_fbshare(){
	$jQuery15.ajax({ 
		type: "GET",
		url: '/sites/all/themes/thegleeproject/tgp_homework.php?action=fb-share',
		dataType: "html",
		success: function(html) {
			//element.html(html + ' people shared this');
		}
	});	
}

function tgp_checkLike(id){
	var thisHref = $jQuery15('#' + id).attr('href');
	var thisID = id;
	var thisIDArray = thisID.split('-');
	var thisNumShares = tgp_comment_like(thisIDArray[2], $('#' + id).parent().find('span'), '');
	tgp_flashcomment(thisID);
}

function tgp_checkShare(id){
	var thisHref = $jQuery15('#' + id).attr('href');
	var thisID = id;
	var thisIDArray = thisID.split('-');
	var thisNumShares = tgp_comment_share(thisIDArray[2], $('#' + id).parent().find('span'), '');
	tgp_flashcomment(thisID);
}

function tgp_showautopost(label){
	$jQuery15('div.autopost strong').html(label);
	$jQuery15('div.autopost').show();
	$jQuery15('#my-comment').removeAttr('readonly');
}

function tgp_checkFBshare(){
	tgp_comment_fbshare();
}

function tgp_closeemail(){
	$jQuery15('div.email-signin-form').parent().hide();
}

function tgp_emailsignform(){
	$jQuery15('div.email-signin-form2').parent().show();
}

function tgp_flashcomment(id){
	/*$jQuery15('#' + id).parent().parent().parent().find('div.flasher').show(1, function(){
		$jQuery15('#' + id).parent().parent().parent().find('div.flasher').fadeOut('slow');
	});*/
	$jQuery15.modaldialog.success('Thank you for sharing this comment.');
}

function tgp_homework(){
	$jQuery15('div.assignment-top div.weeks-listing a').click( function (){
		$jQuery15('div.assignment-top div.weeks-listing a').removeClass('on');
		$jQuery15(this).addClass('on');
		var href = $jQuery15(this).attr('href');
		href = href.substr(1);
		$jQuery15('#week').val(href);
	});
	
	$jQuery15('#week').change( function (){ //console.log($jQuery15(this).val());
		$jQuery15('div.assignment-top div.weeks-listing a').removeClass('on');
		var thisValue = $jQuery15(this).val();
		thisValue = '#' + thisValue;
		
		$jQuery15('div.assignment-top div.weeks-listing a').each( function (){
			if($jQuery15(this).attr('href') == thisValue){
				$jQuery15(this).addClass('on');
			}
		});
		
	});
	
	$jQuery15('#submit_comment').click( function(){ //alert('fire');
		if(document.getElementById('autopost').checked){
			var autopost = 'true';
		}else{
			var autopost = 'false';	
		}
		$jQuery15.ajax({ 
			type: "GET",
			url: '/sites/all/themes/thegleeproject/tgp_homework.php?action=add-' + $jQuery15('#signin_type').val() + '&autopost=' + autopost + '&comment=' + $jQuery15('#my-comment').val() + '&screenName=' + $jQuery15('#screenName').val() + '&fromEmail=' + $jQuery15('#fromEmail').val() + '&toEmail=' + $jQuery15('#toEmail').val() + '&week=' + $jQuery15('#week').val(),
			dataType: "html",
			success: function(html) {
				tgp_comments();
				$jQuery15('#my-comment').val('');
				
				meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'add-to-stream'});
			}
		});
	});
	
	$jQuery15('div.comment-buttons a.twitter').click( function (){ //alert('fire');
		$jQuery15('#my-comment').val('');
		window.open('/sites/all/themes/thegleeproject/twitter.php?allow=1&amp;force_write=1','signin','status=1,width=550,height=550,scrollbars=1');
	});
	
	$jQuery15('div.comment-buttons a.facebook').click( function (){ //alert('fire');
		$jQuery15('#my-comment').val('');
		window.open('/sites/all/themes/thegleeproject/index.php','signin','status=1,width=550,height=550,scrollbars=1');
	});
	
	$jQuery15('div.comment-buttons a.email').click( function (){ //alert('fire');
		$jQuery15('#my-comment').val('');
		$jQuery15('div.email-signin-form').parent().show();
	});
	
	$jQuery15('#set-email').click( function (){ //alert('fire');
		document.getElementById("signin_type").value = "email";
		document.getElementById("TGP_submit_button").style.display = "block";
		$jQuery15('div.email-signin-form2').parent().hide();
	});
	
	$jQuery15('#cancel-email').click( function (){ //alert('fire');
		$jQuery15('div.email-signin-form').parent().hide();
	});
	
	$jQuery15('.cancel-email').click( function (){ //alert('fire');
		$jQuery15('div.email-signin-form2').parent().hide();
	});
	
	$jQuery15('div.like-share a.share-tweet').live('click', function (){ //alert('fire');
		if($('#signin_type').val() != 'twitter'){
			var thisID = $jQuery15(this).attr('id');
			window.open('/sites/all/themes/thegleeproject/twitter.php?allow=1&amp;force_write=1&thisID=' + encodeURI(thisID),'signin','status=1,width=550,height=550,scrollbars=1');
		}else{
			var thisHref = $jQuery15(this).attr('href');
			var thisID = $jQuery15(this).attr('id');
			var thisIDArray = thisID.split('-');
			var thisNumShares = tgp_comment_share(thisIDArray[2], $(this).parent().find('span'));
			
			//window.open(thisHref,'shareTweet','status=1,width=550,height=550,scrollbars=1');
			tgp_flashcomment(thisID);
		}
		return false;
	});
	
	$jQuery15('div.like-share a.like-facebook').live('click', function (){ //alert('fire');
		if($('#signin_type').val() != 'facebook'){
			var thisID = $jQuery15(this).attr('id');
			window.open('/sites/all/themes/thegleeproject/index.php?thisID=' + encodeURI(thisID),'signin','status=1,width=550,height=550,scrollbars=1');
		}else{
			var thisHref = $jQuery15(this).attr('href');
			var thisID = $jQuery15(this).attr('id');
			var thisIDArray = thisID.split('-');
			var thisNumShares = tgp_comment_like(thisIDArray[2], $(this).parent().find('span'), '');
			tgp_flashcomment(thisID);
		}
		return false;
	});
	
	$jQuery15('a.fb-share').live('click', function (){ //alert('fire');
		if($('#signin_type').val() != 'facebook'){
			var thisID = $jQuery15(this).attr('id');
			window.open('/sites/all/themes/thegleeproject/index.php?fb-share=true','signin','status=1,width=550,height=550,scrollbars=1');
		}else{
			var thisNumShares = tgp_comment_fbshare(thisIDArray[2], $(this).parent().find('span'), '');
		}
		
		return false;
	});
	
	$jQuery15('#openid_form').submit(function() {
		window.open('', 'openid_auth', 'width=500,height=500,resizeable,scrollbars');
		this.target = 'openid_auth';
	});
	
	$jQuery15('#my-comment').focus( function (){ //alert($jQuery15(this).attr('readonly'));
		if($jQuery15(this).attr('readonly')){
			alert('Please sign in before commenting');	
		}
	});
	
}

$jQuery15(document).ready(function(){
	tgp_homework();
	tgp_comments();
	openid.init('openid_identifier');
	openid.setDemoMode(false);
});