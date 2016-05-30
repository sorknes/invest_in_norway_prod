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
				    <header>
				        <?php get_template_part('templates/page', 'header'); ?>
				    </header>
				    <?php get_template_part('templates/content', 'page'); ?>
				</article>
				<?php endwhile; ?>
            </div> <!-- /.col -->
        </div> <!-- /.content -->

		<div class="content row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 256; //192
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
				<?php
					$args = array(
						'post_type' => 'sponsor',
						'posts_per_page' => -1,
						'orderby'=> 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'sponsor_category',
								'field'    => 'slug',
								'terms'    => 'gold-sponsor',
							),
						)
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						<div id="entry" class="container" itemprop="description">
							<div class="entry-content sponsor-list">
								<a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<figure title="<?php the_title(); ?>">
												<?php the_post_thumbnail('medium'); ?>
											</figure>
										</div> <!-- /.col -->
										<div class="col-xs-12 col-sm-8">
											<h3 itemprop="headline"><?php the_title(); ?></h3>
												<?php
												    $posttags = get_the_tags();
												    if ($posttags) {
												    	foreach($posttags as $tag) {
															echo '<div class="meta"><small>';
															echo 'industry: '. $tag->name .' ';
															echo '</div></small>';
												    	}
												    }
												?>
											<?php the_excerpt(); ?>
										</div> <!-- /.col -->
									</div> <!-- /.row -->
								</a>
							</div> <!-- /.entry-content -->
						</div> <!-- /.container -->
					</article> <!-- /article -->
					<?php endwhile;

				wp_reset_query(); ?>
			</div> <!-- /.col -->
		</div> <!-- /.content -->

		<div class="content row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 259; //194
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
				<?php
					$args = array(
						'post_type' => 'sponsor',
						'posts_per_page' => -1,
						'orderby'=> 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'sponsor_category',
								'field'    => 'slug',
								'terms'    => 'silver-sponsor',
							),
						)
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						<div id="entry" class="container" itemprop="description">
							<div class="entry-content sponsor-list">
								<a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<figure title="<?php the_title(); ?>">
												<?php the_post_thumbnail('medium'); ?>
											</figure>
										</div> <!-- /.col -->
										<div class="col-xs-12 col-sm-8">
											<h3 itemprop="headline"><?php the_title(); ?></h3>
												<?php
												    $posttags = get_the_tags();
												    if ($posttags) {
												    	foreach($posttags as $tag) {
															echo '<div class="meta"><small>';
															echo 'industry: '. $tag->name .' ';
															echo '</div></small>';
												    	}
												    }
												?>
											<?php the_excerpt(); ?>
										</div> <!-- /.col -->
									</div> <!-- /.row -->
								</a>
							</div> <!-- /.entry-content -->
						</div> <!-- /.container -->
					</article> <!-- /article -->
					<?php endwhile;

				wp_reset_query(); ?>
			</div> <!-- /.col -->
		</div> <!-- /.content -->

		<div class="content row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 261; //196
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
				<?php
					$args = array(
						'post_type' => 'sponsor',
						'posts_per_page' => -1,
						'orderby'=> 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'sponsor_category',
								'field'    => 'slug',
								'terms'    => 'bronze-sponsor',
							),
						)
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						<div id="entry" class="container" itemprop="description">
							<div class="entry-content sponsor-list">
								<a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<figure title="<?php the_title(); ?>">
												<?php the_post_thumbnail('medium'); ?>
											</figure>
										</div> <!-- /.col -->
										<div class="col-xs-12 col-sm-8">
											<h3 itemprop="headline"><?php the_title(); ?></h3>
												<?php
												    $posttags = get_the_tags();
												    if ($posttags) {
												    	foreach($posttags as $tag) {
															echo '<div class="meta"><small>';
															echo 'industry: '. $tag->name .' ';
															echo '</div></small>';
												    	}
												    }
												?>
											<?php the_excerpt(); ?>
										</div> <!-- /.col -->
									</div> <!-- /.row -->
								</a>
							</div> <!-- /.entry-content -->
						</div> <!-- /.container -->
					</article> <!-- /article -->
					<?php endwhile;

				wp_reset_query(); ?>
			</div> <!-- /.col -->
		</div> <!-- /.content -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
