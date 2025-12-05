<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<?php load_flexible_content(); ?>

<?php endwhile; ?>

<?php
get_footer();