<?php
$content = get_sub_field('content');
$buttons = get_sub_field('buttons');
$background_image = get_sub_field('background_image');
$primary = $buttons['primary'] ?? [];
$secondary = $buttons['secondary'] ?? [];
?>

<section class="hero"
    <?php if ($background_image): ?>style="background-image: url('<?= esc_url($background_image['url']); ?>');"
    <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero__content">
                    <?= $content; ?>

                    <?php if (!empty($primary['link']) || !empty($secondary['link'])): ?>
                    <div class="hero__buttons">
                        <?php if (!empty($primary['link'])): ?>
                        <a href="<?= esc_url($primary['link']); ?>"
                            class="btn btn--primary"><?= $primary['text']; ?></a>
                        <?php endif; ?>
                        <?php if (!empty($secondary['link'])): ?>
                        <a href="<?= esc_url($secondary['link']); ?>" class="btn"><?= $secondary['text']; ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>