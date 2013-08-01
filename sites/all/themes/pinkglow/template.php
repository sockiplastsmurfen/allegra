<?php

/**
 * @file
 * Contains theme preprocess functions.
 */
 
 /**
  * Implements html_head_alter().
  * Override RSS feed.
  */
function pinkglow_html_head_alter(&$head_elements) {
  foreach ($head_elements as $key => $element) {
    if (preg_match('/drupal_add_html_head_link:alternate:.*/', $key)) {
      unset($head_elements[$key]);
    }
  }  
}