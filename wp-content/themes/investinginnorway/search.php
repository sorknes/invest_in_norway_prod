<?php get_template_part('templates/page', 'header'); ?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    <div class="content row">
      <div class="col-xs-12">
        <div class="post search">
          <div class="page-header">
            <div class="entry-title">
              <h1 itemprop="headline">
                <?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
              </h1>
            </div> <!-- /.entry-title -->
          </div> <!-- /.page-header -->
          <div id="entry" class="container" itemprop="description">
            <?php if (!have_posts()) : ?>
              <div class="alert alert-warning">
                <?php _e('Sorry, no results were found.', 'sage'); ?>
              </div>
              <?php //get_search_form(); ?>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content', 'search'); ?>
            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>
          </div>
        </div> <!-- /.post -->
      </div> <!-- /.col -->
    </div> <!-- /.content -->
  </main> <!-- /.main -->
</div> <!-- /.main -->
