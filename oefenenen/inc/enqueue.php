<?php
if (!defined('ABSPATH')) {
  exit;
}

function oefenenen_enqueue_assets() {
  add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
  }, 1);

  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap',
    [],
    null
  );

  wp_enqueue_style(
    'bootstrap-grid',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css',
    [],
    '5.3.0'
  );

  $main_css_path = THEME_PATH . '/stylesheets/main.css';
  $main_css_version = file_exists($main_css_path) ? filemtime($main_css_path) : '1.0.0';

  wp_enqueue_style(
    'main-styles',
    THEME_URL . '/stylesheets/main.css',
    ['bootstrap-grid'],
    $main_css_version
  );

  wp_enqueue_script(
    'header-js',
    THEME_URL . '/assets/js/header.js',
    [],
    '1.0.0',
    true
  );
}
add_action('wp_enqueue_scripts', 'oefenenen_enqueue_assets');