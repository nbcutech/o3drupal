<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
	 
<div id="container">
    <div id="wrapper">

<script type="text/javascript">

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
				type: "GET",
				url: '/sites/all/themes/badgirlsclub/meebo_checkincontest.php?action=add&data=' + jQuery('#bgc7-shout-out form').serialize(),
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

</script>

<link rel="stylesheet" type="text/css" href="/sites/all/themes/badgirlsclub/shout-out-form.css?1">
<div style="display: none;" id="bgc7-shout-out">
	<div>
		<form method="post">
			<div class="bgc7-shout-out-form">
				<div class="inner">
					<p class="top"><strong>Want a shout-out during an episode of the Bad Girls Club? Enter below for a chance to win!</strong></p>
					<p><label>First Name:</label> <input type="text" name="first-name" class="txt_field req" value="" style="" /></p>
		
					<p><label>Last Name:</label> <input type="text" name="last-name" class="txt_field req" value="" style="" /></p>
					
					<p><label>State:</label> <input type="text" name="state" class="txt_field req" value="" style="" /></p>
					
					<p><label>Email:</label> <input type="text" name="email" class="txt_field req" value="" style="" /></p>
									
					<p><input type="submit" name="submit" value="Submit Form" class="submit" style="font-size:12px" /> <a href="http://bad-girls-club.oxygen.com/bad-girls-club-vip-sweepstakes-official-rules" target="_blank" onclick="window.open ('http://bad-girls-club.oxygen.com/bad-girls-club-vip-sweepstakes-official-rules','official-rules','location=1,status=1,width=450,height=450,scrollbars=1'); return false;" class="rules">See the Official Rules</a></p>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
		
		Meebo('onUserCheckin', function() {
			if(meebo_checkcookie()){
				Meebo('addButton', {
					id: "shoutout",
					type: "widget",
					label: "Bad Girls Club VIP Sweepstakes",
					width:231,
					height:331,
					element: "bgc7-shout-out"
				});
				
				var t=setTimeout("Meebo('openWidget', {id: 'shoutout'});", 1000);
			}
		});
		
</script>
		
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
