<?php

/**
 * @file
 * Default theme implementation to display the basic html structure
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php if ($rdf->version): ?><?php print " " . $rdf->version . $rdf->namespaces; ?><?php endif; ?>>
<head<?php print $rdf->profile; ?>>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php if ($attributes): ?><?php print " " . $attributes;?><?php endif; ?>>
<div id="skip-link">
  <a href="#content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
</div>
<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>
</body>
</html>
