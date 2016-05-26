<?php
/**
 * Template Name: Contact
 */
?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    	<div class="content row">
            <div class="col-xs-12">
				<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="sr-only">
						<?php get_template_part('templates/page', 'header'); ?>
					</div>
					<?php get_template_part('templates/content', 'page'); ?>
				</article>
    			<?php endwhile; ?>
            </div> <!-- /.col -->
        </div> <!-- /.content -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->

<div id="map"></div>
