<style>
<!--
#contentHeader {
    background: url("/sites/all/themes/features/images/main2colBG_blog.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 75px;
    width: 672px;
}
#wideLeft .copy {
	padding: 0;
}
.view-display-id-page {
	padding-left: 30px;
	padding-right: 30px;
}

.bloglist-row-image-frame {
	height: 89px; 
	width:132px; 
	float: left;
	border: 3px solid #5D057D;
}

.bloglist-row-image {
	height: 89px; 
	width:132px; 
	background-color: silver;
}

.bloglist-row-text {
	width:440px; 
	padding-left:10px; 
	float: right;
}

.bloglist-row-name {
	text-transform: uppercase;
	font-weight: bold;
}

.bloglist-row-title {
	color: #000000;
	font-size: 1.4em;
	font-weight: bold;
}

.bloglist-row-teaser {
	color: #000000;
	height: 25px;
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
  margin: 2px 0 3px 0
}

.bloglist-row-read-more a {
	color: #ffffff;
	background-color: #5D057D;
	display: block;
	height: 17px;
	width: 75px;
	float: right;
	text-align: center;
	margin-top: 10px;
	padding-top: 2px;
}

.blog_section_title {
	color: #5D057D;
	font-size: 24px;
	font-weight: lighter;
	margin-bottom: 15px;
	font-family: helvetica, arial, sans-serif;
}
.feature_blog_item {
  width: 295px;
  float: left;	
  height: 115px;
	margin: 5px auto 10px auto;
}

.feature_blog_block {
    -moz-border-radius: 16px 16px 16px 16px;
    background-color: #FFEAF9;
    padding: 10px 5px 0px 10px;
    width: 595px;
    margin-bottom: 30px;
}
.more-blogs-row {
  margin-bottom: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid #ddd;
  width: 590px;
  margin-left: 10px;
}
.feature-block-item {
  display: block;
  float: left;
  width: 130px;
}
.feature_blog_block .bloglist-row-title {
	height: 80px;
}
-->
</style>

		<img alt="" src="/<?php print $directory; ?>/images/blogs_banner.jpg" />


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
