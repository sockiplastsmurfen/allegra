<?php

/**
 * @file
 * Contains theme preprocess functions.
 */
 
 /**
  * Implements hook_preprocess_html().
  * Override or insert variables into the html template.
  */
function simpleclean_preprocess_html(&$vars) {
  // Ensure that the $vars['rdf'] variable is an object.
  if (!isset($vars['rdf']) || !is_object($vars['rdf'])) {
    $vars['rdf'] = new StdClass();
  }

  // Uses RDFa attributes if the RDF module is enabled.
  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf']->version = 'version="HTML+RDFa 1.1"';
    $vars['rdf']->namespaces = $vars['rdf_namespaces'];
    $vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
  } 
  else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf']->version = '';
    $vars['rdf']->namespaces = '';
    $vars['rdf']->profile = '';
  }

  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Implements hook_preprocess_html_tag().
 * Purge XHTML.
 */
function simpleclean_process_html_tag(&$vars) {
  $el = &$vars['element'];
  // Remove type="..." and CDATA prefix/suffix.
  unset($el['#attributes']['type'], $el['#value_prefix'], $el['#value_suffix']);

  // Remove media="all" but leave others unaffected.
  if (isset($el['#attributes']['media']) && $el['#attributes']['media'] === 'all') {
    unset($el['#attributes']['media']);
  }
}

/**
 * Implements hook_preprocess_htm_alterl().
 * Changes the default meta content-type tag to the shorter HTML5 version.
 */
function simpleclean_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  // Remove Drupal 7 generator tag.
  // unset($head_elements['system_meta_generator']);
}

/**
 * Implements hook_preprocess_search_block_form().
 * Changes the search block form to use the HTML5 "search" input attribute.
 */
function simpleclean_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

/** 
 * Implements hook_form_alter().
 * Add placeholder to the search block form
 */
function simpleclean_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = t('Enter search terms');
  }
}

/** 
 * Implements hook_process_html().
 * Minify HTML output and remove closing slashes.
 */
function simpleclean_process_html(&$vars) {
  $before = array(
    "/\s\/>/",
    "/\s\/\s>/",
    "/>\s\s+/",
    "/\s\s+</",
    "/>\t+</",
    "/\s\s+(?=\w)/",
    "/(?<=\w)\s\s+/"
  );

  $after = array('>', '>', '> ', ' <', '> <', ' ', ' ');

  // Head.
  $head = $vars['head'];
  $head = preg_replace("/\s\/>/", ">", $head);
  $vars['head'] = $head;

  // Styles.
  $styles = $vars['styles'];
  $styles = preg_replace("/\s\/>/", ">", $styles);
  $vars['styles'] = $styles;

  // Page top.
  $page_top = $vars['page_top'];
  $page_top = preg_replace($before, $after, $page_top);
  $vars['page_top'] = $page_top;

  // Page content.
  if (!preg_match('/<pre|<textarea/', $vars['page'])) {
    $page = $vars['page'];
    $page = preg_replace($before, $after, $page);
    $vars['page'] = $page;
  }

  // Page bottom.
  $page_bottom = $vars['page_bottom'];
  $page_bottom = preg_replace($before, $after, $page_bottom);
//  $vars['page_bottom'] = $page_bottom . drupal_get_js('footer');
}

/**
 * Implements hook_process_node().
 * Format submitted by in articles.
 */
function simpleclean_preprocess_node(&$vars) {
  $node = $vars['node'];
  $vars['date'] = format_date($node->created, 'custom', 'd M Y');

  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $vars['display_submitted'] = TRUE;
    $vars['submitted'] = t('By @username on !datetime', array('@username' => $node->name, '!datetime' => $vars['date']));
    $vars['user_picture'] = theme_get_setting('toggle_node_user_picture') ? theme('user_picture', array('account' => $node)) : '';

    // Add a footer for post.
    $account = user_load($vars['node']->uid);
    $vars['simpleclean_postfooter'] = '';
    if (!empty($account->signature)) {  
      $postfooter = "<div class='post-footer'>" . $vars['user_picture'] . "<h3>" . check_plain(format_username($account)) . "</h3>";
      $cleansignature = strip_tags($account->signature);
      $postfooter .= "<p>" . check_plain($cleansignature) . "</p>";
      $postfooter .= "</div>";
      $vars['simpleclean_postfooter'] = $postfooter;
    } 
  }
  else {
    $vars['display_submitted'] = FALSE;
    $vars['submitted'] = '';
    $vars['user_picture'] = '';
  }

  // Remove Add new comment from teasers on frontpage.
  if ($vars['is_front']) {
    unset($vars['content']['links']['comment']['#links']['comment-add']);
    unset($vars['content']['links']['comment']['#links']['comment_forbidden']);
  }
}

/**
 * Implements hook_process_comment().
 * Format submitted by in comments
 */
function simpleclean_preprocess_comment(&$vars) {
  $comment = $vars['elements']['#comment'];
  $node = $vars['elements']['#node'];
  $vars['created']   = format_date($comment->created, 'custom', 'd M Y');
  $vars['changed']   = format_date($comment->changed, 'custom', 'd M Y');
  $vars['submitted'] = t('By @username on !datetime at about @time.', array('@username' => $comment->name, '!datetime' => $vars['created'], '@time' => format_date($comment->created, 'custom', 'H:i')));
}

/**
 * Implements hook_form_comment_alter().
 * Change button to Post instead of Save.
 */
function simpleclean_form_comment_form_alter(&$form, &$form_state, &$form_id) {
 $form['actions']['submit']['#value'] = t('Post');
 $form['comment_body']['#after_build'][] = 'configure_comment_form'; 
}

/**
 * Remove the format changer.
 */
function configure_comment_form(&$form) {
  $form['und'][0]['format']['#access'] = FALSE;
  return $form;
}

/**
 * Implements hook_css_alter().
 */
function simpleclean_css_alter(&$css) {

  // Sort CSS items, so that they appear in the correct order.
  // This is taken from drupal_get_css().
  uasort($css, 'drupal_sort_css_js');

  // The Print style sheets.
  // I will populate this array with the print css (usually I have only one but just in case.).
  $print = array();

  // I will add some weight to the new $css array so every element keeps its position.
  $weight = 0;

  foreach ($css as $name => $style) {

    // I leave untouched the conditional stylesheets
    // and put all the rest inside a 0 group.
    if ($css[$name]['browsers']['!IE']) {
      $css[$name]['group'] = 0;
      $css[$name]['weight'] = ++$weight;
      $css[$name]['every_page'] = TRUE;
    }

    // I move all the print style sheets to a new array.
    if ($css[$name]['media'] == 'print') {
      // Remove and add to a new array.
      $print[$name] = $css[$name];
      unset($css[$name]);
    }

  }

  // I merge the regular array and the print array.
  $css = array_merge($css, $print);

}

/**
 * Implements hook_js_alter().
 */
function simpleclean_js_alter(&$js) {
  // Sort JS items, so that they appear in the correct order.
  uasort($js, 'drupal_sort_css_js');

  $weight = 0;

  foreach ($js as $name => $javascript) {
    $js[$name]['group'] = -100;
    $js[$name]['weight'] = ++$weight;
    $js[$name]['every_page'] = 1;
  }

  // Move jquery settings to footer.
  $js['settings']['scope'] = 'footer';

  // Merge the array for one js file.
  $js = array_merge($js);
}