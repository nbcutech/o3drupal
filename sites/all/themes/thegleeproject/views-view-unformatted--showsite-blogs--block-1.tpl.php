<h3><img alt="" src="/<?php print $directory; ?>/images/more_blogs_glitter.png" /></h3>  
<?php foreach ($rows as $id => $row): ?>
  <div class="<?php print $classes[$id]; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
