<?php
if (!defined('ABSPATH')) {
  exit;
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_sub_page(array(
    'page_title'  => 'Header & Button Settings',
    'menu_title'  => 'Header & Button',
    'menu_slug'   => 'header_button-settings',
    'parent_slug' => 'themes.php',
  ));
}