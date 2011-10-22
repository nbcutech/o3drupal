<style>
<!--
/* custom blog views : Earl Dunovant */
.view-display-id-page {
	padding-left: 10px;
	padding-right: 10px;
}

.bloglist-row-image-frame {
	height: 102px; 
	width:152px; 
	float: left;
	background-color:white; 
	background: url('/<?php print $directory; ?>/images/frame2_.png') no-repeat top
}

.bloglist-row-image {
	height: 89px; 
	width:132px; 
	margin-top: 8px;
	margin-left: 10px;
	background-color: silver;
}

.bloglist-row-text {
	width:475px; 
	padding-left:10px; 
	float: left;
	margin-top: 10px;
}

.bloglist-row-name {
	text-transform: uppercase;
	font-weight: bold;
	display: inline;
}

.bloglist-row-text a.sectColor-entertainment {
	background-color: #0894CF;
	color: #ffffff;
	display: inline;
	padding: 1px 8px;
}

.bloglist-row-title {
	font-weight: bold;
	font-size: 1.5em;
	margin-bottom: 2px;
	margin-top: 2px;
}

.bloglist-row-teaser {
	font-size: 1.1em;
}

.bloglist-row-read-more {
	
}

.bloglist-row-flag {
	
}

.bloglist-block-row-image-frame {
	height: 90px; 
	width:120px; 
	margin-right:6px; 
	float: left;
}

.bloglist-block-row-text {
	height: 90px; 
	width:auto; 
	padding-left:3px; 
	overflow: hidden;
}

.bloglist-block-row-title {
	font-weight: bold;
	color: fuchsia;
}

.bloglist-block-row-teaser {

}

.bloglist-block-row-date {
	
}
#wideLeft {
  background-image: none;
  background-color: #fff;
}
.bloglist-row-date {
	color: #999999;
	margin-bottom: 3px;

}
.bloglist-row-read-more, .bloglist-row-read-more a {
  background-color: #999999;
  padding: 0 2px;
  float: right;
  color: #ffffff;
}
.blog_section_title {
	color: #000000;
	font-size: 26px;
	font-weight: normal;
	padding-left: 10px;
	padding-top: 10px;
}
.feature_blog_item {
  width: 320px;
  float: left;	
  height: 115px;
  margin: 5px auto;
 
}

.feature_blog_block {
  background-image: url(/<?php print $directory; ?>/images/feature_blog_bg.gif);
  background-repeat: no-repeat;
  background-position: 0px 0px;
  height: 300px;
  width: 680px;
  margin-bottom: 20px;
}
.more-blogs-row {
  margin-bottom: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid #ddd;	
}
.feature-block-item {
  display: block;
  float: left;
  width: 150px;
}
#contentHeader {
	background: url("/sites/all/themes/features/images/out_loud_header.png") no-repeat scroll 0 0 transparent;
	width: 678px;
}
img.lol_blog_section_banner {
	position: absolute;
	left: 0;
	top: 20px;
}
.clearfloat {
	clear: both;
	font-size: 1px;
	height: 0;
	line-height: 0;
}
#wideLeft .copy {
	color: #000000;
	padding: 5px 0px;
}

-->
</style>




<img alt="" src="/<?php print $directory; ?>/images/entertainment_blogsBanner.gif" class="lol_blog_section_banner" />
<br class="clearfloat" />
<div class="clear-block view view-<?php print $css_name; ?> view-id-<?php print $name; ?> view-display-id-<?php print $display_id; ?> view-dom-id-<?php print $dom_id; ?>">
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  <?php if ($attachment_before): ?>
    <div class="attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>


<!-- <div class="bloglist-page-postby"><?php print $cast_member_name; ?> blogs</div> -->
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

</div> <?php // class view ?>
