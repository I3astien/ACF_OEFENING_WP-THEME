<?php
$images = get_sub_field('images');
$left = $images['left_image'] ?? null;
$right = $images['right_image'] ?? null;
$heading = get_sub_field('heading');
$text = get_sub_field('text');
$button = get_sub_field('button');
?>

<section class="image-sandwich">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <?php if ($left): ?>
                <div class="image-sandwich__image">
                    <img src="<?= esc_url($left['url']); ?>" alt="<?= $left['alt']; ?>">
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-4">
                <div class="image-sandwich__content">
                    <?= $heading; ?>

                    <?php if ($text): ?>
                    <div class="text-small">
                        <?= $text; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($button && $button['link']): ?>
                    <a href="<?= esc_url($button['link']['url']); ?>" class="btn"><?= $button['text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php if ($right): ?>
                <div class="image-sandwich__image">
                    <img src="<?= esc_url($right['url']); ?>" alt="<?= $right['alt']; ?>">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>