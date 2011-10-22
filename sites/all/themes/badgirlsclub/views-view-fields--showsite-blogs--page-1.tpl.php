<style type="text/css">
.more-blogs-row {
	position: relative;
}

.bloglist-row-image-frame {
	border: solid 3px #B301DA;
}
.bloglist-row-read-more a {
    background-color: #B301DA;
    color: #FFFFFF;
    display: block;
    float: right;
    height: 17px;
    margin-top: 10px;
    padding-top: 2px;
    text-align: center;
    width: 75px;
}
.more-blogs-row {
    border-bottom: 1px solid #DDDDDD;
    margin-bottom: 12px;
    margin-left: 10px;
    padding-bottom: 12px;
    width: 590px;
}
.bloglist-page-postby {
    margin-bottom: 20px;
    margin-top: 10px;
}
.bloglist-row-title {
    color: #000000;
    font-size: 1.4em;
    font-weight: bold;
}
</style>

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
    <div class="bloglist-row-title"><?php print $fields['title']->content ?></div>
    <div class="bloglist-row-date">Blog date <?php print $fields['created']->content ?></div>
    <div class="bloglist-row-teaser"><?php print $fields['teaser']->content ?></div>
		<span class="bloglist-row-read-more"><?php print $fields['view_node']->content ?></span>
    <span class="bloglist-row-flag"><?php if ($fields['ops_1']->content) print '| '. $fields['ops_1']->content ?></span>  
    <span class="bloglist-row-flag"><?php if ($fields['ops']->content) print '| '. $fields['ops']->content ?></span>  
  </div>
</div>