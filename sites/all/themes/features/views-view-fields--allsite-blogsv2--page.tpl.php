<?php
$targetPath = "node/";
$targetPath .= $row->nid;
$targetPath = drupal_get_path_alias($targetPath, $path_language = '');
$targetPathSegments = explode('/', $targetPath);
$targetPathRoot = oxygen_helpers_show_id_to_url($targetPathSegments[0]);

$targetPathUrl = $targetPathRoot . "/" . $targetPath;
?>


<div class="attach-row clear-block more-blogs-row">
  <div class="bloglist-row-image-frame png">
	  <a href="<?php print $targetPathUrl ?>"><img alt="" src="<?php print $episodic_image ?>" class="bloglist-row-image" /></a>
  </div>
  <div  class="bloglist-row-text">
    <div class="bloglist-row-name"><?php print $cast_member_short_bio ?></div>
    <div class="bloglist-row-title"><?php print $fields['title']->content ?></div>
    <div class="bloglist-row-date">Blog date <?php print $fields['created']->content ?></div>
    <div class="bloglist-row-teaser"><?php print $fields['teaser']->content ?></div>
    <span class="bloglist-row-read-more"><?php print $fields['view_node']->content ?></span>
    <span class="bloglist-row-flag"><?php if ($fields['ops_1']->content) print '| '. $fields['ops_1']->content ?></span>  
    <span class="bloglist-row-flag"><?php if ($fields['ops']->content) print '| '.  $fields['ops']->content ?></span>
  </div>
</div>
