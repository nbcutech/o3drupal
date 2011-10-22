<div class="attach-row clear-block">
  <div class="bloglist-row-image-frame png">
  
	  <img alt="test2" src="/<?php print $cast_member_picture ?>" class="bloglist-row-image" />

  </div>
  <div  class="bloglist-row-text feature-block-item">
    <div class="bloglist-row-name sectColor-<?php print $cast_member_name ?>"><a class="sectColor-<?php print $cast_member_name ?>" href="http://features.oxygen.com/blogs/outloud/<?php print $cast_member_name ?>"><?php print $cast_member_name ?></a></div>
    <div class="bloglist-row-title"><?php print $fields['title']->content ?></div>
    <span class="bloglist-row-read-more"><?php print $fields['view_node']->content ?></span>
    <span class="bloglist-row-flag"><?php if ($fields['ops_1']->content) print '| '. $fields['ops_1']->content ?></span>  
    <span class="bloglist-row-flag"><?php if ($fields['ops']->content) print '| '. $fields['ops']->content ?></span>
  </div>
</div>