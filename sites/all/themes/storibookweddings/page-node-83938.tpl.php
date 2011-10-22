<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>
    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<style type="text/css">
	.MiamiMapBtn {
		position: absolute;
		display: block;
		width: 16px;
		height: 16px;
	}
	#locationIcon div {
		display: none;
		width: 213px;
		height: 154px;
	}
</style>
<div id="container">
    <div id="wrapper" style="position:relative; text-align: center; background: #ffffff; min-height: 0;">
       <div id="MiamiMap" style="display: block; position: relative; background:#FFFFFF url(/<?php print $directory; ?>/images/MiamiHotSpots/background.jpg) no-repeat 50% 50%; margin: 0px auto; width: 879px; height: 430px;">
       <div id="pin" style="position: absolute; width: 30px; height: 39px; background: url(/<?php print $directory; ?>/images/MiamiHotSpots/pin.png) no-repeat scroll 50% 50% transparent; left: 0px; top: 0px; display: none;"></div>
       <a href="#" class="MiamiMapBtn" style="left: 342px; top: 81px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 360px; top: 118px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 367px; top: 284px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 385px; top: 283px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 500px; top: 130px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 468px; top: 160px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 497px; top: 174px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 438px; top: 255px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 441px; top: 282px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 455px; top: 328px;"></a>
       <a href="#" class="MiamiMapBtn" style="left: 439px; top: 339px;"></a>
       <div id="locationIcon" style="width: 213px; height: 154px; position: absolute; left: 594px; top: 147px;">
         <div class="spotIcon" id="icon_rebelsalon" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/rebelsalon.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_oceans10" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/oceans10.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_play" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/play.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_pleasureemporium" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/pleasureemporium.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_finnegans" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/finnegans.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_sobe" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/sobe.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_palacebar" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/palacebar.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_pinkroom" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/pinkroom.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_lovehate" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/lovehate.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_klutch" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/klutch.png) 0px 0px no-repeat;"></div>
         <div class="spotIcon" id="icon_tedshide" style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/tedshide.png) 0px 0px no-repeat;"></div>
       </div>
       </div>
       <script type="text/javascript">
       var pinPositions = 
         [{"left" : "322px", "top" : "52px", "location" : "rebelsalon" },
         {"left" : "340px", "top" : "90px", "location" : "oceans10" },
         {"left" : "347px", "top" : "257px", "location" : "play" },
         {"left" : "364px", "top" : "255px", "location" : "pleasureemporium" },
         {"left" : "481px", "top" : "104px", "location" : "finnegans" },
         {"left" : "448px", "top" : "133px", "location" : "sobe" },
         {"left" : "477px", "top" : "147px", "location" : "palacebar" },
         {"left" : "417px", "top" : "227px", "location" : "pinkroom" },
         {"left" : "420px", "top" : "255px", "location" : "lovehate" },
         {"left" : "434px", "top" : "300px", "location" : "klutch" },
         {"left" : "419px", "top" : "312px", "location" : "tedshide" }];
         $(".MiamiMapBtn").click(function(pointIndex){
		   var locationIndex = $(".MiamiMapBtn").index(this);
		   $("#pin").css("left", pinPositions[locationIndex].left);
		   $("#pin").css("top", pinPositions[locationIndex].top);
		   $("#pin").show();
		   $("#pin").addClass("png");
		   $(".spotIcon").hide();
		   $("#icon_"+pinPositions[locationIndex].location).show();
		   $("#icon_"+pinPositions[locationIndex].location).addClass("png");
	       pointIndex.preventDefault();
		});
       </script>
       <div style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/bgcLinks.png) no-repeat; 0px 0px; width: 879px; height: 91px; position: relative; margin: 0px auto;">
       <a href="http://video.oxygen.com/shows/bad_girls_club_season_5/sneakpeeks_1/" style="position: absolute; width: 163px; height: 91px; display: block; left: 16px; top: 0px;"></a>
       <a href="http://bad-girls-club.oxygen.com" style="position: absolute; width: 184px; height: 91px; display: block; left: 197px; top: 0px;"></a>
       <a href="http://www.oxygenlive.com" style="position: absolute; width: 177px; height: 91px; display: block; left: 403px; top: 0px;"></a>
       <a href="http://www.shopoholic.com/" style="position: absolute; width: 219px; height: 91px; display: block; left: 650px; top: 0px;"></a>
       </div>
        <div style="background: url(/<?php print $directory; ?>/images/MiamiHotSpots/footerLink.png) no-repeat; 0px 0px; width: 879px; height: 129px; position: relative; margin: 0px auto;">
        <a href="/bad-girls-club-location-guide" style="width: 879px; height: 129px; display: block;"></a>
        </div>
            <?php print $content; ?>


    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
 