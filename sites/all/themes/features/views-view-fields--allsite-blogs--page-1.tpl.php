<div class="attach-row clear-block cast_blog_summary">
  <div class="bloglist-row-image-frame png">
	  <img alt="" src="<?php print $episodic_image ?>" class="bloglist-row-image" />
  </div>
  <div  class="bloglist-row-text">
    <div class="bloglist-row-title"><?php print $fields['title']->content ?></div>
    <div class="bloglist-row-date">Blog date <?php print $fields['created']->content ?></div>
    <div class="bloglist-row-teaser"><?php print $fields['teaser']->content ?></div>
		<span class="bloglist-row-read-more"><?php print $fields['view_node']->content ?></span>
    <span class="bloglist-row-flag"><?php if ($fields['ops_1']->content) print '| '. $fields['ops_1']->content ?></span>  
    <span class="bloglist-row-flag"><?php if ($fields['ops']->content) print '| '. $fields['ops']->content ?></span>  
  </div>
</div>