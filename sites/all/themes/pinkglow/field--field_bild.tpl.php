<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php foreach ($items as $delta => $item): ?>
  <div class="field-item field-item-<?php print $delta .' '; print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
<?php endforeach; ?>
</div>