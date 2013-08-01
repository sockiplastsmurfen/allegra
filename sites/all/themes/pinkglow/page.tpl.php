<?php

/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<div id="wrap">
  <header id="header" class="container clearfix" role="banner">
    <?php if ($page['header']): ?>
    <?php print render($page['header']); ?>
    <?php endif; ?>
    
    <div id="logo" class="clearfix">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print implode(' - ', array($site_name, $site_slogan)); ?>"><img src="/sites/all/themes/pinkglow/logo.svgz" alt="<?php print implode(' - ', array($site_name, $site_slogan)); ?>" onerror="this.removeAttribute('onerror'); this.src='<?php print $logo; ?>'"></a>
      <?php else: ?>
        <?php if ($site_name): ?>
        <h1 id="logo-text"><a href="<?php print $front_page; ?>" title="<?php print implode(' - ', array($site_name, $site_slogan)); ?>"><?php print $site_name; ?></a></h1>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php if ($main_menu): ?>
    <nav id="nav" role="navigation">
      <?php if ($page['menu']): ?>
      <?php print render($page['menu']); ?>
      <?php endif; ?>
    </nav>
    <?php endif; ?>
  <?php  if(!drupal_is_front_page()): ?>
  <hr>
  <?php endif; ?>
  </header>

  <div id="content-wrap" class="container clearfix"> 
    <?php if ($page['highlighted']): ?>
    <div id="highlighted"><?php print render($page['highlighted']); ?></div>
    <?php endif; ?>

    <div id="content" role="main">
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
      <h1 class="node-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
      <div class="tabs"><?php print render($tabs); ?></div>
      <?php endif; ?>
      <?php if ($show_messages): ?>
      <?php print $messages; ?>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
      <?php endif; ?>
      
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>
    
      <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar" role="complementary">
      <?php print render($page['sidebar_first']); ?>
      </aside>
      <?php endif; ?>
  </div>


  <footer id="footer-wrap" role="contentinfo">
<?php if ($page['footer']): ?>
<?php print render($page['footer']); ?>
<?php endif; ?>
  </footer>

</div>
