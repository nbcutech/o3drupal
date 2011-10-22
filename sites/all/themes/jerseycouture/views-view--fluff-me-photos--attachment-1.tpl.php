
<div class="view view-id-<?php print $name; ?> view-display-id-<?php print $display_id; ?> view-dom-id-<?php print $dom_id; ?>">
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
  <div class="pic-of-day-submission"><a href="/Fluff-Me-Community/node/add/fluff-me-photo"><img src="/sites/all/themes/jerseycouture/images/fluff_me_upload.png" border="0" alt=""></a></div>
</div> <?php // class view ?>