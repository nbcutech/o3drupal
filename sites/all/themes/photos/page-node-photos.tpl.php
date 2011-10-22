<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<div id="container" class="photo_gallery">
    <div id="wrapper">
	         <img src="<?php print $pot;?>/images/photos_header.png" style="margin-left:11px;" class="png" />
	    <div id="wideLeft" >
		    <div id="wideLeftContent">

			<div id="queuegallery_rating"> <?php print fivestar_widget_form($node) ?></div>
			<span class="gallery_title"><?php print $title ?></span>
			<?php $showCode = oxygen_helpers_get_taxonomy_name_from_node_vid($node, 5); ?>
			<?php print queuegallery_all($node->field_nodequeue_id[0][value], queuegallery_synonym_to_galleryterm($showCode)); ?>
		 
		    </div>
		    <div style="clear:both;"></div>
		    <div id="wideLeftFooter"><img src="<?php print $pot;?>/images/photos_footer.png"></div>
	    </div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>


<link rel="stylesheet" href="/sites/all/themes/oxygen/queuegallery_comments.css" type="text/css"/>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/gallery-v1.js"></script>
<script type="text/javascript" src="/sites/all/themes/oxygen/js/jquery.livequery.js"></script>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
