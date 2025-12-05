<?php
$button_text = get_field('header_button_text', 'option');
$button_link = get_field('header_button_link', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__inner">
                        <div class="header__nav">
                            <a href="<?= esc_url(home_url('/')); ?>" class="header__logo">
                                <img src="<?= THEME_URL; ?>/assets/logo.png" alt="<?php bloginfo('name'); ?>">
                            </a>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => 'nav',
                                'container_class' => 'nav',
                                'menu_class' => 'nav__menu text-lowercase',
                                'fallback_cb' => false,
                            ));
                            ?>
                        </div>
                        <div class="header__actions">
                            <?php if ($button_text && $button_link): ?>
                            <div class="header__cta">
                                <a href="<?= esc_url($button_link); ?>" class="btn">
                                    <span class="text-capitalize-first"><?= $button_text; ?></span>
                                </a>
                            </div>
                            <?php endif; ?>
                            <button class="header__hamburger" aria-label="Toggle menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-overlay">
        <div class="mobile-nav__container">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mobile-nav',
                'menu_class' => 'nav__menu text-lowercase',
                'fallback_cb' => false,
            ));
            ?>
            <?php if ($button_text && $button_link): ?>
            <div class="mobile-cta">
                <a href="<?= esc_url($button_link); ?>" class="btn">
                    <span class="text-capitalize-first"><?= $button_text; ?></span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <main>