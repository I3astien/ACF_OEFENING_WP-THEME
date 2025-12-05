<?php
if (!defined('ABSPATH')) {
  exit;
}

define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('THEME_TD', 'oefenenen');

require_once THEME_PATH . '/inc/theme-setup.php';
require_once THEME_PATH . '/inc/enqueue.php';
require_once THEME_PATH . '/inc/template-tags.php';
require_once THEME_PATH . '/inc/acf-options.php';