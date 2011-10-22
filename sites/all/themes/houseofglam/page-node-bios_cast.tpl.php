<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="bios_cast">
    
<style type="text/css">
#wideLeft {
 width:650px;
}
.bio #wideLeft {
 background: url('http://house-of-glam.oxygen.com/sites/all/themes/houseofglam/images/bio_two_col_BG.jpg') 0 0 no-repeat #ffffff;;
}
.bios_img_bkg {
height:116px;
width:129px;
left:10px;
position:absolute;
top:0;
display:block;
background: url('http://house-of-glam.oxygen.com/sites/all/themes/houseofglam/images/bios/HoG_bio_thumbs_8.jpg') no-repeat 0px 0px;
}
.bioContainerBox {
	height:180px;
}
.bio .promo_copy {
	height: 160px;
	left: 155px;
}
.bio_landing_name {
	color:#9D309D;
}
.bios_cast #wideLeft {
 background: url('http://house-of-glam.oxygen.com/sites/all/themes/houseofglam/images/bio_two_col_BG_blank.jpg') 0 0 no-repeat #ffffff;
}
.bios_cast .copy .bio_text {
	padding:0 330px 0 25px;
	margin-top: 40px;
        font-size: 13px;
        line-height: 190%;
        color: #333333;
}
.qa #wideLeft {
 background: url('http://house-of-glam.oxygen.com/sites/all/themes/houseofglam/images/bio_two_col_BG_blank.jpg') 0 0 no-repeat #ffffff;
}
</style>  
    
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">
				<div class="copy">
				
					<!-- START CONTENT -->
					<div class="bio_header"><img src="<?php print $pot;?>/images/bios/meet_<?php print $node->field_cast_name[0]['value'];?>
.png" width="212" height="35" class="png" /></div>
					<div class="bio_pic"><img src="<?php print $pot;?>/images/bios/photo_<?php print $node->field_cast_name[0]['value'];?>.jpg" width="166" height="235" /></div>				
					<?php print $node->body; ?>
					<!-- END CONTENT -->
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png">
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
