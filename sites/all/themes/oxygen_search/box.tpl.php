<?php
// $Id: box.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
  <div class="box-<?php if ($title) { print strtolower(substr($title,0,strpos($title," "))); } ?>">
    <div class="content"><?php print $content; ?></div>
 </div>

