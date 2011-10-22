<div class="fluff-me-photo">
<div><div class="fluff-rate-text">Rate me</div>
<div class="fluff-me-view-five-star-block"><?php
$node = node_load($row->nid);
if (function_exists('fivestar_widget_form')) print fivestar_widget_form($node);

?></div>
<div style="clear: both;"></div>
</div>
<div class="fluff-me-photo-img"><a href="/Fluff-Me-Community/node/<?= $row->nid ?>"><img src="/<?php
echo substr($fields['field_ugc_image_fid']->content,0,strrpos($fields['field_ugc_image_fid']->content,'/')).'/view'.strrchr($fields['field_ugc_image_fid']->content,'/'); ?>" width="186" height="145" border="0" /></a></div>
<div class="fluff-me-photo-text"><?php print $fields['field_title_value']->content ?></div>
<div><?php print $fields['view_node_value']->content ?></div>
<div class="fluff-me-view-link"><a href="/Fluff-Me-Community/node/<?= $row->nid ?>"></a></div>
</div>