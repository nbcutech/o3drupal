<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>
 
    <?php if ($header): ?>
      <?php print $header ?>
 
    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
<?php
$this_node = arg(1);
$author = db_query("SELECT p.value FROM node n, profile_values p WHERE n.nid =  %d AND p.uid = n.uid",$this_node);
$author_name = db_fetch_object($author);
?> 

	<style type="text/css">
	#blogAuthorName{font-size:16px;}
	#blogPostTitle{font-size:12px; font-weight:bold;}
	#blogDate{color:gray; font-size:12px; padding: 5px 0 5px 0;}
	.content{font-size:12px; line-height:16px;}
	.blog_author_name{margin:0 0 5px 0;background:url(/sites/all/themes/danceyourassoff/images/blogs/arrow_closed.gif) no-repeat 0 3px;}
	.open_author_name{background:url(/sites/all/themes/danceyourassoff/images/blogs/arrow_open.gif) no-repeat 0 3px;}
	.blog_author_link{color:#fff;font-weight:bold; font-size:14px;padding-left:18px;}
	.blog_teaser,.blog_link{padding:5px 10px 5px 18px;display:none;font-size:11px; background-color:#4d4f5b;}
	.blog_teaser{color:#c5d6eb;}
	.blog_link a{color:#fff;}
	.node-form{width:425px;}
	#micrositeMenu #navBlogs a, #micrositeMenu #navBlogs a:visited, #micrositeMenu #navBlogs a:active, #micrositeMenu #navBlogs a:hover {
		background-position: -396px -81px;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".blog_author_link").click(function(e){
		    $(this).siblings().toggle();
		    $(this).parent().toggleClass("open_author_name");	
		    e.preventDefault();
		});
	});

	</script>
<div id="container" class="blog">
    <div id="wrapper">
  <div id="wideLeft" >
   <div style="height:30px;position:relative;z-index:1;">
    <img style="position:absolute;" src="/sites/all/themes/danceyourassoff/images/blogs/blogs_two_col_BG.png" class="png">
   </div>
   <div id="wideLeftRepeater" style="background: url(/sites/all/themes/danceyourassoff/images/blogs/BGrepeater.jpg) repeat-y;">
    <div class="copy" style="position:relative;z-index:10;">
     <div id="sub_left_col">
      <div class="blogPic png"><img src="<?php print $pot;?>/images/blogs/authors/<?php print $author_name->value;?>/<?php print $author_name->value;?>166x235.jpg"></div>
     <div id="blogAuthorName"><?php print $author_name->value; ?></div>
      <div id="blogPostTitle"><?php print $node->title; ?></div>	 
	 <div id="blogDate"><?php print date("M j Y",$node->created); ?></div>
      <?php print $content; ?>
     </div>
     <div id="sub_right_col">
<div style="background-color:#656774;padding:6px;width:168px;">
 
<?php
    
    // select all the unique UID "blog" nodes, then join them with users and away we should go
    $result = db_query("SELECT DISTINCT u.name, u.uid FROM {users} u INNER JOIN {node} n ON n.uid = u.uid WHERE n.type = 'blog' ORDER BY u.name");
    while ($node = db_fetch_object($result)) 
    {
        $latestr = db_query("SELECT DISTINCT n.nid, n.title, r.teaser, p.value
                            FROM node n, node_revisions r, profile_values p, term_node t
                            WHERE n.type =  'blog'
                            AND n.nid = r.nid
                            AND n.uid =  %d
                            AND p.uid =  %d
                            AND p.fid = 1
 
                            ORDER BY n.created DESC 
                            LIMIT 1",$node->uid,$node->uid);
        if($latestn = db_fetch_object($latestr))
        {
     
     $highlight="";
     if($latestn->value==$author_name) {$highlight=" current_post_author";}
            print "<div class='blog_author_name" . $highlight . "'>" . l(strtolower($latestn->value), 'blog/' . $node->uid,array('attributes' => array('class' =>'blog_author_link')));
            print "<div class='blog_teaser'>" . $latestn->teaser . "</div>";
            print "<div class='blog_link'>".l("Read ". $latestn->value ."'s blog", 'node/'.$latestn->nid)."</div>\n";
            
            print "</div>\n";
        }
    }
 
    
?>
 
</div>
<img src="/sites/all/themes/danceyourassoff/images/blogs/subnav_footer.jpg">
     </div>
    </div>
    <div style="clear:both;"></div>
   </div>
   
   <div id="wideLeftFooter"><img src="<?php print $pot;?>/images/twoColFooter.jpg"></div>
  </div>
  
     <div id="right"><?php print $right; ?>
     </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;" class="png"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
