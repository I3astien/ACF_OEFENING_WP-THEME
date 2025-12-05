<?php
$content = get_sub_field('content');
$boxes = get_sub_field('boxes');
?>

<section class="icon-boxes">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($content): ?>
                <div class="icon-boxes__content text-small">
                    <?= $content; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($boxes): ?>
        <div class="row">
            <?php foreach ($boxes as $box): ?>
            <div class="col-12 col-md-4">
                <div class="icon-boxes__item">
                    <?php if ($box['image']): ?>
                    <img src="<?= esc_url($box['image']['url']); ?>" alt="<?= $box['image']['alt']; ?>">
                    <?php endif; ?>
                    <?php if ($box['title']): ?>
                    <h4><?= $box['title']; ?></h4>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>