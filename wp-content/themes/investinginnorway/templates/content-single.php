<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('post'); ?>>
        <header>
            <div class="page-header page">
                <div class="entry-title">
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </div>
                <?php get_template_part('templates/entry-meta'); ?>
            </div> <!-- /.page-header -->
        </header>
        <div id="entry" class="container" itemprop="description">
            <figure class="thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </figure> <!-- /.thumbnail -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div> <!-- /.entry-content -->
        </div> <!-- /.container -->
        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
    </article> <!-- /.post -->
<?php endwhile; ?>
