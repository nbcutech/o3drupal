
<div class="block-row clear-block pic-of-day">
  <div class="pic-of-day-title"><img src="/sites/all/themes/jerseycouture/images/fluff-me-pic-title.png" /></div>
  <div class="pic-of-day-image">
  <div id="pic-of-day-item"><a href="/Fluff-Me-Community/node/<?= $row->nid ?>"><img src="/<?php
echo substr($fields['field_ugc_image_fid']->content,0,strrpos($fields['field_ugc_image_fid']->content,'/')).'/home'.strrchr($fields['field_ugc_image_fid']->content,'/');
 ?>" width="234" height="210" border="0" /></a></div>
     <div class="pic-of-day-interact"><div class="pic-of-day-five-star"><?php
$node = node_load($row->nid);
if (function_exists('fivestar_widget_form')) print fivestar_widget_form($node);
?></div>
     <div class="comment-link"><a href="/Fluff-Me-Community/node/<?= $row->nid ?>"></a></div></div>
   </div>
</div>