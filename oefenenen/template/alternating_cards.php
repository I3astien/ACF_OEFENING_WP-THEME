<?php
$cards = get_sub_field('cards');
?>

<section class="alternating-cards">
    <?php if ($cards): ?>
    <?php foreach ($cards as $index => $card):
        $is_even = ($index + 1) % 2 === 0;
        $primary = $card['buttons']['primary_link'] ?? null;
        $secondary = $card['buttons']['secondary_link'] ?? null;
    ?>
    <div class="alternating-cards__card <?= $is_even ? 'alternating-cards__card--even' : '' ?>">
        <div class="alternating-cards__image <?= $is_even ? 'alternating-cards__image--right' : '' ?>">
            <img src="<?= esc_url($card['image']['url']); ?>" alt="<?= $card['image']['alt']; ?>">
        </div>

        <div class="alternating-cards__content color-inherit">
            <?= $card['content']; ?>

            <?php if ($primary || $secondary): ?>
            <div class="alternating-cards__buttons">
                <?php if ($primary): ?>
                <a href="<?= esc_url($primary['url']); ?>" class="btn btn--primary"><?= $primary['title']; ?></a>
                <?php endif; ?>

                <?php if ($secondary): ?>
                <a href="<?= esc_url($secondary['url']); ?>" class="btn"><?= $secondary['title']; ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</section>