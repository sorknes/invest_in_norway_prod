<?php
/**
 * Template Name: Homepage
 */
?>

<?php
	/*** start query intro ***/
	$args_intro = "post_type=intro&posts_per_page=1&orderby=date&order=DESC"; //Query the newest from intro (1 item)

	// the Query
	$query_intro = new WP_Query( $args_intro );

	// the Loop
	if ( $query_intro->have_posts() ) {
		$query_intro->the_post();

		$intro_background 		= get_post_custom_values('pt_background');
		$intro_background 		= $intro_background[0];

		$intro_custom_link_text = get_post_custom_values('pt_link_text');
		$intro_custom_link_text = $intro_custom_link_text[0];
		$intro_custom_link 		= get_post_custom_values('pt_link');
		$intro_custom_link 		= $intro_custom_link[0];

    	?>

        <div class="jumbo-wrapper" style="background-image: url('<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'jumbotron-thumb', true); echo $thumb_url[0]; ?>')">
            <div class="jumbotron">
                <div class="container">
                    <div class="row no-gutter">
                        <div class="col-xs-12">
                            <div class="content">
                                <h1 itemprop="headline"><?php echo get_the_title( $query_intro->post->ID ); ?></h1>
                                <?php echo get_the_content( $query_intro->post->ID ); ?>
                            </div>
                            <?php if($intro_custom_link){ ?>
                                <div class="btn-lg-wrapper">
                                    <a itemprop="url" class="btn btn-default btn-lg" href="<?php echo $intro_custom_link ?>" role="button" title="<?php echo $intro_custom_link_text ?>"><?php echo $intro_custom_link_text ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /. jumbotron -->
            <a href="#content" class="arrow-down" title="Scroll to content">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 19.7" style="enable-background:new 0 0 36 19.7;" xml:space="preserve">
                    <path d="M35.6,0.4c-0.5-0.5-1.3-0.5-1.8,0L18,16.2L2.2,0.4c-0.5-0.5-1.3-0.5-1.8,0c-0.5,0.5-0.5,1.3,0,1.8l16.7,16.7c0.2,0.2,0.6,0.4,0.9,0.4c0.3,0,0.7-0.1,0.9-0.4L35.6,2.2C36.1,1.7,36.1,0.9,35.6,0.4L35.6,0.4z M35.6,0.4" />
                </svg>
            </a>
        </div> <!-- /.jumbo-wrapper -->
<?php } // while

wp_reset_postdata(); ?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    	<div class="content row">
			<div class="col-xs-12">
	            <div class="page-header">
	                <?php
	    			$id = 65;
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
	            </div>
			</div>
    	</div> <!-- /.content -->

		<div class="content row">
			<div class="col-xs-12 col-lg-10 col-lg-offset-1">
				<ul class="cat-list">
					<?php wp_list_categories( array(
						'child_of'  => 42,
						'depth' 	=> 1,
						'title_li'  => ''
					) ); ?>
				</ul>
			</div>
		</div>

		<div class="content row">
			<div class="col-xs-12 col-lg-10 col-lg-offset-1">
				<div class="grid">
					<div class="grid-sizer col-xs-2 col-sm-2 col-md-4 col-lg-3"></div>
						<?php query_posts( array(
							'cat'				=> 'show-on-homepage',
							'posts_per_page'	=> 12,
							'order' 			=> 'DESC',
							'depth'				=> 3
						) ); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div <?php post_class('grid-item col-xs-12 col-sm-6 col-md-4 col-lg-3'); ?>>
								<a itemprop="url" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>">
									<article class="grid-item-container">
										<figure>
											<?php the_post_thumbnail('large'); ?>
										</figure>
										<div class="grid-item-content">
											<div class="meta">
												<small>
													<?php
														$categories = get_the_category();
														$separator = ' / ';
														$output = '';

														if($categories){
															foreach($categories as $category) {
																if($category->name !== '_Show on homepage'){
		        													$output .= ''.$category->cat_name.''.$separator;
																}
		    												}

														echo trim($output, $separator);
														}
													?>
												</small>
											</div> <!-- /.meta -->
											<h3 itemprop="headline"><?php the_title(); ?></h3>
											<?php the_excerpt(); ?>
											<div class="author">
												Author: <?php the_author() ?>
											</div> <!-- /.author -->
										</div> <!-- /.grid-item-content -->
									</article> <!-- /.grid-item-container -->
								</a>
							</div> <!-- /.grid-item -->
						<?php endwhile; endif;

						wp_reset_query(); ?>
				</div> <!-- /.grid -->
			</div> <!-- /.col-lg-offeset -->
		</div> <!-- /.row -->
	</main> <!-- /.main -->
</div> <!-- /.container-fluid -->
