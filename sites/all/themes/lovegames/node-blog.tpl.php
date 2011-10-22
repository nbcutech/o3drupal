<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<img alt="" src="/<?php print $directory; ?>/images/blogs_banner.jpg" />
<style>
<!--
/* custom blog views : Earl Dunovant */
.blogs {
	padding-left: 30px;
	padding-right: 30px;
}
.bloglist-row-image-frame {
    border: 3px solid #5D057D;
    float: left;
    height: 89px;
    margin-right: 5px;
    width: 132px;
}

.bloglist-row-image {
	height: 89px; 
	width:132px; 
	background-color: silver;
}
.blog-name {
  margin-top: 5px;	
}
.blog-title, .blog-teaser {
  padding-left: 2px;
}
.blog-title {
  margin-top: 3px;	
}
.blog-teaser a, .blog-teaser a:link, .blog-teaser a:hover, .blog-teaser a:active, .blog-teaser a:visited {
  color: #5D057D;
}

#wideLeft {
  background-image: none;
  background-color: #fff;
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

-->
</style>

<?php 
  $alias = drupal_get_path_alias('node/'.arg(1));
  $alias_parts = explode('/', $alias);
  $vocab_id = 5;
  if (count($node->taxonomy)) {
  	foreach ($node->taxonomy as $tid => $term) {
  		if ($term->vid == $vocab_id) {
  			$blogpath = strtolower($term->name);
  		}
  	}
  }
?>

<div id="node-<?php print $node->nid; ?>" class="blogs clear-block">
  <div class="bloglist-row-image-frame">
	  <img alt="" src="/<?php print $cast_member_picture ?>" class="bloglist-row-image" />
  </div>
  <div  class="blog-text" style="height: 110px; width:auto; padding-left:3px; overflow: hidden; line-height: 1.5em; font-family: sans-serif;">
    <div class="blog-name" style="font-size: 20px;color:#5D057D;"><?php print $cast_member_name ?></div>
    <div class="blog-title" style="font-size: 13px;font-weight:bold; color:black;"><?php print $title ?></div>
    <div class="blog-teaser" style="font-size: 13px; font-weight:bold; color:grey; "><?php print format_date($created, 'custom', 'F j, Y'); ?></div>
    	<div class="blog-teaser" style="font-size: 11px; margin-top: 5px;line-height: 15px;"><a href="/blogs/<?php print $blogpath .'/'. $alias_parts[2]; ?>">&#149; View all my blog posts</a>
    		<br />
  			<a href="/blogs/<?php print $blogpath; ?>">&#149; View all blogs from the show</a>
  		</div>
  </div>

  <?php print $content; ?>
	<div id="comment-wrapper">
		<script>
		var idcomments_acct = 'acc93c3246315e13e155555cb33ddd7f';
		var idcomments_post_id= "<?php print 'http://' . $_SERVER['HTTP_HOST']. '/node/' . $node->nid ?>";
		var idcomments_post_url;
		</script>
		<span id="IDCommentsPostTitle" style="display:none"></span>
		<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>
	</div>
</div>
