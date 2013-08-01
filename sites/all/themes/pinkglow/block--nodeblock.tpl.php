<?php

/**
 * @file
 * Theme implementation to display a nodeblock.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 */
?>
<?php $tag = $block->subject ? 'section' : 'div'; ?>
<<?php print $tag; ?> id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

</<?php print $tag; ?>>
