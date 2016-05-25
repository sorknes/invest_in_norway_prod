<?php
/**
 * Template Name: Sponsor
 */
?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    	<div class="content row">
            <div class="col-xs-12">
                <?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<?php get_template_part('templates/page', 'header'); ?>
					<?php get_template_part('templates/content', 'page'); ?>
				</article>
    			<?php endwhile; ?>
            </div> <!-- /.col -->
        </div> <!-- /.content -->
        <div class="content row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <div class="grid sponsor clearfix">
                <?php
                    $args = array( 'post_type' => 'sponsor', 'posts_per_page' => 10 );
                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-xs-6 col-sm-4 col-md-3 container">
                        <article class="content">
                            <figure data-toggle="tooltip" data-placement="top" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </figure>
                        </article>
                    </div>
                    <?php endwhile;

                    wp_reset_query(); ?>
                </div> <!-- /.grid -->
            </div> <!-- /.col -->
        </div> <!-- /.content -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
