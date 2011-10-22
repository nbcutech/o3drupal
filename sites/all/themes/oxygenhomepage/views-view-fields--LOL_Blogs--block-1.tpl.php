  <?php
  $currentNode = node_load($fields['nid']->content);
  ?>
  <a href="http://features.oxygen.com/<?= $currentNode->path ?>"><img alt="" src="<?= ($fields['field_obsessed_image_fid']->content != '' ? $fields['field_obsessed_image_fid']->content : $episodic_image) ?>" style="width:80px; height: 60px; border: none;" /></a>
  <div class="out_loud_heading"><?= $fields['name_1']->content ?></div>
  <div class="out_loud_title"><?= $fields['title']->content ?></div>
  <a href="http://features.oxygen.com/<?= $currentNode->path ?>">Read More</a>
