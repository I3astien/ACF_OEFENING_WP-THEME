<?php
$content = get_sub_field('content');
$image = get_sub_field('image');
$link = get_sub_field('link');
?>

<section class="text-sandwich">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $content; ?>
                <img src="<?= esc_url($image['url']); ?>" alt="<?= $image['alt']; ?>">
                <?php if ($link): ?>
                <a href="<?= esc_url($link['url']); ?>" class="btn"><?= $link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
