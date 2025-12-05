<?php
$content = get_sub_field('content');
$images = get_sub_field('images');
?>

<section class="image-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if ($content): ?>
                <div class="image-grid__content text-small">
                    <?= $content; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($images): ?>
        <div class="row">
            <?php foreach ($images as $image): ?>
            <div class="col-12 col-sm-6 col-md-12 col-lg-4">
                <div class="image-grid__item">
                    <img src="<?= esc_url($image['url']); ?>" alt="<?= $image['alt']; ?>">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>