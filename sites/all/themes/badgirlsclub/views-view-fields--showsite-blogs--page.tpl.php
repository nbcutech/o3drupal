<?php
global $theme_key;
$siteID = oxygen_helpers_theme_to_show_id($theme_key);

$targetPath = "node/";
$targetPath .= $row->nid;
$targetPath = 'http://'.$_SERVER['HTTP_HOST'].base_path().drupal_get_path_alias($targetPath, $path_language = '');
?>
<div class="attach-row clear-block more-blogs-row">
  <div class="bloglist-row-image-frame png">
	  <a href="<?php print $targetPath ?>"><img alt="" src="<?php print $episodic_image ?>" class="bloglist-row-image" /></a>
  </div>
  <div  class="bloglist-row-text">
    <div class="bloglist-row-name"><a href="/blogs/<?php print $siteID ?>/<?php print $cast_member_short_bio ?>-<?php print $siteID ?>"><?php print $cast_member_short_bio ?></a></div>
    <div class="bloglist-row-title"><?php print $fields['title']->content ?></div>
    <div class="bloglist-row-date">Blog date <?php print $fields['created']->content ?></div>
    <div class="bloglist-row-teaser"><?php print $fields['teaser']->content ?></div>
    <span class="bloglist-row-read-more"><?php print $fields['view_node']->content ?></span>
    <span class="bloglist-row-flag"><?php if ($fields['ops_1']->content) print '| '. $fields['ops_1']->content ?></span>  
    <span class="bloglist-row-flag"><?php if ($fields['ops']->content) print '| '.  $fields['ops']->content ?></span>
  </div>
</div>