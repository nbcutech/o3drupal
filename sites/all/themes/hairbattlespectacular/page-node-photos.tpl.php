<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   

<div id="container" class="photos">
    <div id="wrapper">
	    <div id="wideLeft" >
		    <div id="wideLeftContent">
			

			<img src="<?php print $pot;?>/images/photos_header.jpg" class="png" />

			<div id="queuegallery_rating"> <?php print fivestar_widget_form($node) ?></div>
			<span class="gallery_title"><?php print $title ?></span>
			<?php $showCode = oxygen_helpers_get_taxonomy_name_from_node_vid($node, 5); ?>
			<?php print queuegallery_all($node->field_nodequeue_id[0][value], queuegallery_synonym_to_galleryterm($showCode)); ?>
		    </div>
		    <div style="clear:both;"></div>

							<div id="comment-wrapper">
								<script>
								var idcomments_acct = 'acc93c3246315e13e155555cb33ddd7f';
								var idcomments_post_id= "<?php print 'http://' . $_SERVER['HTTP_HOST']. '/node/' . $node->nid ?>";
								var idcomments_post_url;
								</script>
								<span id="IDCommentsPostTitle" style="display:none"></span>
								<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>
							</div>

	    </div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"></div>


<link rel="stylesheet" href="/sites/all/themes/oxygen/queuegallery_comments.css" type="text/css"/>

<style type="text/css">
#wideLeftContent {min-height:0;}
#galleryMenu {
float:right;
margin: 0px 11px 0 0;
position:absolute;
display:inline;
}
 

#comment-wrapper {
padding:0 10px;
}

#comment-wrapper textarea {
width:615px !important;
}

#idc-container .idc-c_collapsed, #idc-container .idc-c {
overflow:visible !important;
}

</style>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/gallery-v1.js?nocache"></script>


<!-- tagging code for Ricky's links - KK - 08-31-11 -->
<script type="text/javascript">
$(document).ready(function(){ 
var currlocation = window.location.href;
if (currlocation.indexOf("hbs-at-rickys-nyc") >= 0) {

$('a').each(function () {

	if($(this).attr('href') == 'http://www.rickysnyc.com/beauty-makeup-products/mattese-elite/mattese-elite-fairy-dust-glitter.html') {
		$(this).click(function() {
  			s.tl(this,'o','HBS Rickys: Gallery: Photo 5: loose glitter');
		});
	};	
	
	if($(this).attr('href') == 'http://www.rickycare.com/hairtemp/brushes/view-all/rickypro-basix-detailer.html') {
		$(this).click(function() {
  			s.tl(this,'o','HBS HBS Rickys: Gallery: Photo 11: detailer brush');
		});
	};	
	
	if($(this).attr('href') == 'http://www.rickysnyc.com/beauty-makeup-products/false-eye-lashes/lashes-party-22.html') {
		$(this).click(function() {
  			s.tl(this,'o','HBS HBS Rickys: Gallery: Photo 12: party lashes');
		});
	};	
	
	if($(this).attr('href') == 'http://www.rickysnyc.com/beauty-makeup-products/false-eye-lashes/lashes-party-31.html') {
		$(this).click(function() {
  			s.tl(this,'o','HBS HBS Rickys: Gallery: Photo 20: similar lashes');
		});
	};
});
};
});
</script>

<!--<script type="text/javascript" src="/sites/all/themes/oxygen/js/jquery.livequery.js"></script>-->
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
