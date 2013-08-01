<?php

/**
 * @file
 * Default theme implementation to display a comment
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<article class="<?php print $classes . ' ' . $zebra; ?> clearfix"<?php print $attributes; ?>>

<header>
  <?php if ($picture): ?>
    <div class="user-picture">
      <?php print $picture; ?>
    </div>
  <?php endif; ?>

  <?php if ($new): ?>
    <span class="new"><?php print $new; ?></span>
  <?php endif; ?>

    <?php print render($title_prefix); ?>
    <h3<?php print $title_attributes; ?>><?php print $title; ?></h3>
    <?php print render($title_suffix); ?>

    <span class="submitted"><?php print $submitted; ?></span>
</header>

    <div class="content"<?php print $content_attributes; ?>>
      <?php
        print render($content); ?>
      <?php if ($signature): ?>
      <footer class="clearfix">
        <hr />
        <?php print $signature; ?>
      </footer>
      <?php endif; ?>
    </div>
</article>
