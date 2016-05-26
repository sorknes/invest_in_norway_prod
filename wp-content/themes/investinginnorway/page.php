<?php while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <header>
        <?php get_template_part('templates/page', 'header'); ?>
    </header>
    <?php get_template_part('templates/content', 'page'); ?>
</article>
<?php endwhile; ?>
