
<div class="block-row clear-block" style="border-bottom: thin solid gray; margin-bottom: 5px;">
  <div class="bloglist-block-row-image-frame">
	  <img alt="" src="/<?php print $cast_member_picture ?>" style="height: 85px; width:120px; background-color: aqua;" />
  </div>
  <div  class="bloglist-block-row-text">
    <div class="bloglist-block-row-title"><strong><?php print $fields['title']->content ?></strong></div>
    <div class="bloglist-block-row-teaser"><a href="<?php print $external_url ?>"><?php print $fields['teaser']->content ?></a></div>
    <div class="bloglist-block-row-date"><?php print $fields['created']->content ?> </div>
  </div>
</div>