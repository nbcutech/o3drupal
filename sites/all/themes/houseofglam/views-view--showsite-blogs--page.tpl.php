<style>
<!--
/* custom blog views : Earl Dunovant */
.view-display-id-page {
	padding-left: 30px;
	padding-right: 30px;
}

.bloglist-row-image-frame {
	height: 102px; 
	width:152px; 
	float: left;
	background-color:white; 
	background: url('/<?php print $directory; ?>/images/frame.png') no-repeat top
}

.bloglist-row-image {
	height: 89px; 
	width:132px; 
	margin-top: 8px;
	margin-left: 10px;
	background-color: silver;
}

.bloglist-row-text {
	width:auto; 
	padding-left:10px; 

}

.bloglist-row-name {
	text-transform: uppercase;
	font-weight: bold;
}

.bloglist-row-title {
	font-weight: bold;
}

.bloglist-row-teaser {

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
  color: #666;	
}
.bloglist-row-read-more, .bloglist-row-read-more a {
  color: #63349c;
  text-decoration: underline;
}
.blog_section_title {
	color: #663399;
	font-size: large;
	font-weight: bold;
	margin-top: .5em;
	margin-bottom: .5em;
}
.feature_blog_item {
  width: 295px;
  float: left;	
  height: 115px;
  margin: 5px auto;
}

.feature_blog_block {
  background-image: url(/<?php print $directory; ?>/images/feature_blog_bg.jpg);
  background-repeat: no-repeat;
  backgorund-position: 0px 0px;
  height: 250px;
}
.more-blogs-row {
  margin-bottom: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid #ddd;	
}
.feature-block-item {
  display: block;
  float: left;
  width: 130px;
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
