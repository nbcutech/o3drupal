<div class="clear-block view  view-id-<?php print $name; ?> view-display-id-<?php print $display_id; ?> view-dom-id-<?php print $dom_id; ?>">
<div style="color: #f76399; font-size: large; font-weight: bold;">
featured blogs
</div>
  <?php if ($rows): ?>
	<table style="background-color: #F0ECED; width: 100%;"><tr>
  <?php $rowcount = count($rows); foreach ($rows as $id => $row): ?>
  	<?php $cellcount = $cellcount ? 0: 1; $rowcount--; ?>
    <td width="50%" class="<?php print $classes[$id]; ?>">
      <?php print $row; ?>      
    </td>
    <?php if ($rowcount AND (!$cellcount)) print '</tr><tr>'?>
  <?php endforeach; ?>
  </tr></table>
  
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <div style="margin-top: .5em; margin-bottom: .5em; color: #f76399; font-size: large; font-weight: bold;">more blogs</div>  
  
</div> <?php // class view ?>
