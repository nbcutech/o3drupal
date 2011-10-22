 // JavaScript Document

var $jQuery15 = jQuery.noConflict();
 
var s_linkInternalFilters="javascript:,oxygen.com,badgirlsclubonoxygen.com,quiz.oxygen.com";

var s_account="nbcuglobal,nbcuoxygend,nbcunbcuoxygenbu";
var s_prop8="Cable";
var s_prop9="Oxygen";

var playbackCounter = 0;

var verizonVideoTitle = 'Verizon Check-In Week 5';
var verizonVideoFile = 'TGP_VERIZONACT_105_682_0300.flv';
var verizonVideoPageTitle = 'oxygen|The Glee Project|Verizon Check-In Week 5';

function verizonCheckIn_validate(){
	var phone = $jQuery15('#phone').val(); //console.log(zipcode.length + '-' + zipcode);
	phone = phone.replace(/[^0-9]/g, ''); //console.log(zipcode.length + '-' + zipcode);
	
	if(phone.length == 10){
		return true;
	}else{
		alert('Please enter a valid 10 digit phone number');
		return false;
	}
}

function guidGenerator() {
	 var S4 = function() {
		 return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	 };
	 return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
}

function verizon_omnitureVideoComplete() {
	
	var program = 'Verizon';
	var video_guid = guidGenerator();
	
	var video_title = verizonVideoTitle;
	var video_id = verizonVideoFile;
	var videoData = verizonVideoPageTitle;
	
	s.linkTrackVars='events,prop2,prop7,prop8,prop9,prop42,prop44,prop50,eVar36,eVar40,eVar42,eVar45,eVar47,eVar48,eVar50';
	s.linkTrackEvents='event78';

	s.events="event78";

	s.prop2="FlowPlayer";
	s.prop7="Showsite Player";
	s.prop8="Oxygen";
	s.prop9="oxygen";
	s.prop42=video_id;
	s.prop44="Normal";
	s.prop50="Oxygen";

	s.eVar36=program;
	s.eVar40=video_title;
	s.eVar42=s.prop42;
	s.eVar45="oxygen";
	s.eVar47="FlowPlayer";
	s.eVar48="normal";
	s.eVar50=video_guid;

	s.tl(this,'o',videoData);
}

function verizon_omnitureVideoStart() {
	
	var program = 'Verizon';
	var video_guid = guidGenerator();
	
	var video_title = verizonVideoTitle;
	var video_id = verizonVideoFile;
	var videoData = verizonVideoPageTitle;
	
	s.linkTrackVars='events,prop2,prop7,prop8,prop9,prop42,prop44,prop50,eVar36,eVar40,eVar42,eVar45,eVar47,eVar48,eVar50';
	s.linkTrackEvents='event74';

	s.events="event74";

	s.prop2="FlowPlayer";
	s.prop7="Showsite Player";
	s.prop8="Oxygen";
	s.prop9="oxygen";
	s.prop42=video_id;
	s.prop44="Normal";
	s.prop50="Oxygen";

	s.eVar36=program;
	s.eVar40=video_title;
	s.eVar42=s.prop42;
	s.eVar45="oxygen";
	s.eVar47="FlowPlayer";
	s.eVar48="normal";
	s.eVar50=video_guid;

	s.tl(this,'o',videoData);
}

function restart_video(){
	playbackCounter++;
//	if (window.console && window.console.firebug) {
//	  console.log('restart');
//	}
	//if(playbackCounter > 1){
		verizon_omnitureVideoStart();
	//}
}

function getglue_checkin(username, objectid, title, numcheckins) {
	document.cookie = "logged_in=yes";
	$jQuery15('div.verizon-p1').remove();
	$jQuery15('#glue-widget-overlay').css('display','none');
	$jQuery15('div.verizon-p2').html('<div class="check-number">Phone number: <input type="text" id="phone" name="phone" /> <input type="button" name="submit" id="submit" value=" Submit   " /></div>');
	$jQuery15('div.verizon-p2').css('display','block');
	
	meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'GetGlueCheckIn'});
	
	var network = 'getglue';
	var partner = 'verizon';
	s.linkTrackVars='prop52';
	s.prop52=partner +' : Share with '+network;
	s.tl(this,'o',partner +' : Share with '+network);
}

function verizonCheckIn(){
	$jQuery15('#submit').live('click', function (){
		
		if(verizonCheckIn_validate()){
			$jQuery15.ajax({ 
				type: "GET",
				url: '/sites/all/themes/thegleeproject/verizon-lookup.php?phonenumber=' + $jQuery15('#phone').val(),
				dataType: "text",
				success: function(text) {
					if(text == 'true'){
						$jQuery15('div.verizon-p2').append('<div class="enjoy-video"><div class="video-container"><a href="/sites/all/themes/thegleeproject/video/TGP_VERIZONACT_105_682_0300.flv" style="display:block;width:281px;height:243px" id="player"></a><script>flowplayer("player", "/sites/all/themes/thegleeproject/tgp/flowplayer/flowplayer.commercial-3.2.7.swf",{key: \'#@e9e546d433168a4dd2e\', plugins:{controls:{scrubber: false }}, clip:{autoPlay: true, onFinish: function() { verizon_omnitureVideoComplete(); }, onCuepoint: [500, function() { verizon_omnitureVideoStart(); }] }});</script></div><p><br/>We hope you enjoyed this week\'s exclusive clip.<br/> Check back each week for a new video! </p><a href="#close" id="close-video"><strong>X</strong></a></div>');
						
						meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'VerizonCheckIn'});
						
						s.linkTrackVars='prop26';
						s.prop26="Verizon Check In";
						s.tl(this,'o','Verizon Check In');

					}else{
						$jQuery15('div.verizon-p2').append('<div class="oops"><a href="#close" id="close-oops"><img src="/sites/all/themes/thegleeproject/images/verizon/oops.gif" width="360" height="102" /></a></div>');
					}
				}
			});
		}
	});
	
	$jQuery15('#submit').live('keypress', function(e) {
		
		if(verizonCheckIn_validate()){
			if(e.keyCode==13){
				$jQuery15.ajax({ 
					type: "GET",
					url: '/sites/all/themes/thegleeproject/verizon-lookup.php?phonenumber=' + $jQuery15('#phone').val(),
					dataType: "text",
					success: function(text) {
						if(text == 'true'){
							$jQuery15('div.verizon-p2').append('<div class="enjoy-video"><div class="video-container"><a href="/sites/all/themes/thegleeproject/video/TGP_VERIZONACT_105_682_0300.flv" style="display:block;width:281px;height:243px" id="player"></a><script>flowplayer("player", "/sites/all/themes/thegleeproject/tgp/flowplayer/flowplayer.commercial-3.2.7.swf",{key: \'#@e9e546d433168a4dd2e\', plugins:{controls:{scrubber: false }}, clip:{autoPlay: true, onFinish: function() { verizon_omnitureVideoComplete(); }, onCuepoint: [500, function() { verizon_omnitureVideoStart(); }] }});</script></div><p><br/>We hope you enjoyed this week\'s exclusive clip.<br/> Check back each week for a new video! </p><a href="#close" id="close-video"><strong>X</strong></a></div>');
							
							meteor.tracking.track_conversion('271f87b6-85ee-467d-87d0-a61dc4dcdf92',{'name':'VerizonCheckIn'});
							
							s.linkTrackVars='prop26';
							s.prop26="Verizon Check In";
							s.tl(this,'o','Verizon Check In');
						
						}else{
							$jQuery15('div.verizon-p2').append('<div class="oops"><a href="#close" id="close-oops"><img src="/sites/all/themes/thegleeproject/images/verizon/oops.gif" width="360" height="102" /></a></div>');
						}
					}
				});
			}
		}
	});
	$jQuery15('#close-oops').live('click', function (){
		$jQuery15('div.oops').remove();
		return false;
	});
	
	$jQuery15('#close-video').live('click', function (){
		$jQuery15('div.enjoy-video').remove();
		return false;
	});
}

$jQuery15(document).ready(function(){
	verizonCheckIn();
});