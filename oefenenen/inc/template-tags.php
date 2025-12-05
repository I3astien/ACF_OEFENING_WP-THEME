<?php

if (!defined('ABSPATH')) {
  exit;
}

function load_flexible_content() {
  if (!function_exists('have_rows')) {
    echo '<!-- ACF Pro is not installed or activated -->';
    return;
  }
  if (!have_rows('pagebuilder')) {
    echo '<!-- No pagebuilder sections found -->';
    return;
  }

  while (have_rows('pagebuilder')) {
    the_row();
    $layout = get_row_layout();
    $template_name = str_replace('_section', '', $layout);
    $template_path = THEME_PATH . '/template/' . $template_name . '.php';

    if (file_exists($template_path)) {
      include $template_path;
    } else {
      echo "<!-- Template not found: {$template_path} -->";
    }
  }
}
function oefenenen_remove_image_dimensions($html) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
  return $html;
}
function oefenenen_get_svg_icon($icon) {
  $icon_path = THEME_PATH . '/assets/images/icons/' . $icon . '.svg';
  if (file_exists($icon_path)) {
    return file_get_contents($icon_path);
  }
  return '';
}