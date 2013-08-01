<?php

/**
 * @file
 * Theme implementation to display a field.
 *
 * Remove div and class for less and faster html code
 **/
?>
<?php if (!$label_hidden): ?>
  <?php print $label ?>
<?php endif; ?>
<?php foreach ($items as $delta => $item): ?>
  <?php print render($item); ?>
<?php endforeach; ?>
  