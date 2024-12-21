<?php
get_header(); ?>


<?php if (have_posts()) : while (have_posts()): the_post(); ?>

<?php get_template_part( 'template-parts/content/content'); ?>

<?php endwhile; else: ?>

<?php get_template_part('template-parts/content/content', 'none'); ?>

<?php endif; ?>

<?php get_footer(); ?>