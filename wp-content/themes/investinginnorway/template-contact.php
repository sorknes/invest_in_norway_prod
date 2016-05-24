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
                <div class="section-title page">
    				<h1 itemprop="headline"><?php the_title(); ?></h1>
    				<div itemprop="description">
    					<?php the_content(); ?>
    				</div>
                </div>
    			<?php endwhile; ?>
            </div> <!-- /.col -->
        </div> <!-- /.content -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
