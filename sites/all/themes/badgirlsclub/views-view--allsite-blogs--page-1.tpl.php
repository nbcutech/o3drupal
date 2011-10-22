<style>
<!--
/* custom blog views : Earl Dunovant */
.view-display-id-page_1 {
	padding-left: 30px;
	padding-right: 30px;
}

.bloglist-row-image-frame {
	height: 102px; 
	width:152px; 
	float: left;
	background-color:white; 
	background: url('/<?php print $directory; ?>/images/frame2.png') no-repeat top
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
	padding-left:3px;
	float: left;
}

.bloglist-row-name {
	text-transform: capitalize;
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
	color: #666;
}

.bloglist-page-postby {
	color:#C92469; 
	font-size: x-large;
	font-weight:bold;
}

.bloglist-page-bio {
	font-size: 1.2em;
	font-weight:bold;
	margin-bottom:30px;
}
#wideLeft {
  background-image: none;
  background-color: #fff;
}
.bloglist-row-date {
  color: #666;	
}
.bloglist-row-read-more, .bloglist-row-read-more a {
  color: #fd3003;
  text-decoration: underline;
}
.cast_blog_summary {
  margin-top: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid #ddd;	
}

-->
</style>
<img alt="" src="/<?php print $directory; ?>/images/blogs_banner2.jpg" />
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


<div class="bloglist-page-postby">posts by <?php print $cast_member_name; ?></div>
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
