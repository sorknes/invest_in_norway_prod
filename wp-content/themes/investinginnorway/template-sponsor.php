<?php
/**
 * Template Name: Sponsor
 */
?>

<div class="container-fluid">
    <div class="content row">
        <main id="content" class="main" role="main">
			<?php while (have_posts()) : the_post(); ?>
            <div class="section-title page">
				<h2 itemprop="headline"><?php the_title(); ?></h2>
				<div itemprop="description">
					<?php the_content(); ?>
				</div>
            </div>
			<?php endwhile; ?>
        </main> <!-- /.main -->
    </div> <!-- /.content -->
</div> <!-- /.container-fluid -->
