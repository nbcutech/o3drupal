<!--<div class="clear-block view  view-id-<?php print $name; ?> view-display-id-<?php print $display_id; ?> view-dom-id-<?php print $dom_id; ?>">
<div class="blog_section_title">featured blogs</div>-->
  <?php if ($rows): ?>
	<!--<div class="feature_blog_block">-->
  <?php $rowcount = count($rows); foreach ($rows as $id => $row): ?>
  	<?php $cellcount = $cellcount ? 0: 1; $rowcount--; ?>
    <div class="feature_blog_item <?php print $classes[$id]; ?>">
      <?php print $row; ?>      
    </div>
    <?php //if ($rowcount AND (!$cellcount)) print '<div style="clear: both;"></div>'?>
  <?php endforeach; ?><!--<div style="clear: both;"></div>-->
<!--</div>-->
  
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

<!--  <div class="blog_section_title">more blogs</div>  
  
</div> <?php // class view ?>-->
