<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div id="pic-of-day-recent-title"></div>
<div id="pic-of-day-view-all"><a href="Fluff-Me-Photos"><b>+</b>view all</a></div>
<table class="views-view-grid">
  <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
      <?php
        $row_class = 'row-' . ($row_number + 1);
        if ($row_number == 0) {
          $row_class .= ' row-first';
        }
        elseif (count($rows) == ($row_number + 1)) {
          $row_class .= ' row-last';
        }
      ?>
      <tr class="<?php print $row_class; ?>">
        <?php foreach ($columns as $column_number => $item): ?>
          <td class="<?php print 'col-'. ($column_number + 1); ?>">
            <?php print $item; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>