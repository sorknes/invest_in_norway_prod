<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('post'); ?>>
        <header>
            <div class="page-header page">
                <div class="entry-title">
                    <div class="meta">
                      <div class="entry-meta">
                        <small>Publisert: <time datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></small>
                      </div>
                    </div>
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </div>
                <?php get_template_part('templates/entry-meta'); ?>
            </div> <!-- /.page-header -->
        </header>
        <div id="entry" class="container" itemprop="description">
            <figure class="thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </figure> <!-- /.thumbnail -->
            <div class="entry-content post">
                <div class="col-sm-3">
                  <div class="meta">
                      <div class="meta-entry">
                          <div class="author-profile-pic">
                            <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 96); ?>
                          </div>
                          <div class="author-tag">
                            <small>Forfatter: <?php the_author() ?></small>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-9">
                    <?php the_content(); ?>
                </div>
            </div> <!-- /.entry-content -->
        </div> <!-- /.container -->
        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
    </article> <!-- /.post -->
<?php endwhile; ?>
