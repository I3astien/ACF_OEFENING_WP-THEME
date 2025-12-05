<?php

if (!defined('ABSPATH')) {
  exit;
}

function oefenenen_theme_setup() {
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menus([
    'primary' => __('Primary Menu', THEME_TD),
    'footer'  => __('Footer Menu', THEME_TD),
  ]);

  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ]);

  load_theme_textdomain(THEME_TD, THEME_PATH . '/languages');
}
add_action('after_setup_theme', 'oefenenen_theme_setup');

function oefenenen_custom_image_sizes() {
  add_image_size('hero-full', 1920, 1080, true);
  add_image_size('card-thumbnail', 600, 400, true);
  add_image_size('content-wide', 1200, 9999, false);
}
add_action('after_setup_theme', 'oefenenen_custom_image_sizes');

add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('show_admin_bar', '__return_false');

function oefenenen_allow_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'oefenenen_allow_svg_upload');
add_filter('post_thumbnail_html', 'oefenenen_remove_image_dimensions', 10);
add_filter('image_send_to_editor', 'oefenenen_remove_image_dimensions', 10);
add_filter('the_content', 'oefenenen_remove_image_dimensions', 10);