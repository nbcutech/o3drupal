<div class="fluff-me-photo-node" style="position: relative;">
  <a href="/Fluff-Me-Community"><img alt="" src="/<?php print $directory; ?>/images/fluff_me_banner_node.jpg"  border="0" /></a>
  <div class="fluff-me-photo-left">
  <div class="fluff-me-photo-node-item">
    <div class="inner-fluff"><img src="/<?php
echo substr($node->field_ugc_image[0]['filepath'],0,strrpos($node->field_ugc_image[0]['filepath'],'/')).'/full'.strrchr($node->field_ugc_image[0]['filepath'],'/');
 ?>" width="448" height="301" border="0" /></div>
  </div>
  <div class="fluff-me-photo-caption"><?= $node->field_title[0]['value']; ?></div>



</div>
<div class="fluff-me-photo-right" style="position: absolute; top: 103px; left: 483px; width: 154px;">
<div class="fluff-me-node-rate-title" style="background: url(/<?php print $directory; ?>/images/fluff-me-node-rate-me.png) 0px 0px no-repeat; width: 75px; height: 18px; display: block;"></div>
<div class="fluff-me-view-five-star-block"><?php

if (function_exists('fivestar_widget_form')) print fivestar_widget_form($node);

?></div>
<a href="/Fluff-Me-Community/node/add/fluff-me-photo" id="fluff-me-node-add"></a>
<a href="/Fluff-Me-Community/Fluff-Me-Photos" id="fluff-me-node-more"></a>
<a href="/Fluff-Me-Community/jerseycouture/photos/crisis-of-the-day#idc-container-parent" id="fluff-me-node-ask"></a>
</div>
<div style="clear: both;"></div>
</div>
  <div id="comment-wrapper" style="width: 575px;">
	<script>
		var idcomments_acct = 'acc93c3246315e13e155555cb33ddd7f';
		var idcomments_post_id= "<?php print 'http://' . $_SERVER['HTTP_HOST']. '/node/' . $nid ?>";
		var idcomments_post_url;
	</script>
	<span id="IDCommentsPostTitle" style="display:none"></span>
	<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>
  </div>