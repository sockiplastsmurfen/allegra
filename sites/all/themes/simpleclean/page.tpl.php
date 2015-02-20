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
  <header id="header" class="clearfix" role="banner">
    <?php if ($page['header']): ?>
    <?php print render($page['header']); ?>
    <?php endif; ?>
    
    <div id="logo" class="clearfix">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      <?php else: ?>
        <?php if ($site_name): ?>
        <h1 id="logo-text"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($site_slogan): ?>
      <p id="slogan"><?php print $site_slogan; ?></p>
      <?php endif; ?>
    </div>

    <?php if ($main_menu): ?>
    <nav id="nav" role="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
    </nav>
    <?php endif; ?>
  </header>

  <div id="content-wrap" class="clearfix"> 
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


  <footer id="footer-wrap" class="clearfix" role="contentinfo">
<?php if ($page['footer']): ?>
<?php print render($page['footer']); ?>
<?php endif; ?>
    <?php if (theme_get_setting('simpleclean_appreciation')): ?>
      <div id="footer">
          <p>This site is powered by <a href="http://drupal.org/">Drupal</a>. Theme: <a href="http://drupal.org/project/simpleclean">Simple Clean</a> by <a href="http://drupal.org/user/765764">acke</a> @ <a href="http://www.happiness.se/">happiness</a>.</p>
      </div>
    <?php endif; ?>
  </footer>

</div>
