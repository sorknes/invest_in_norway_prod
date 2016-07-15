<?php
/**
 * Template Name: Sitemap
 */
?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    	<div class="content row">
            <div class="col-xs-12">
							<div class="post">
								<?php while (have_posts()) : the_post(); ?>
								<div class="page-header page">
								    <div class="entry-title sr-only">
								        <h1 itemprop="headline"><?php the_title(); ?></h1>
								    </div>
								</div>
								<div class="entry-ingress">
								    <?php the_excerpt(); ?>
								</div>
								<?php endwhile; ?>

								<?php wp_reset_query(); ?>

								<div id="entry" class="container" itemprop="description">
								    <div class="entry-content">
											<h2 id="pages">Pages</h2>
											<ul>
												<?php
												// Add pages you'd like to exclude in the exclude here
												wp_list_pages(
													array(
														'exclude' => '11,65,192,194,196',
														'title_li' => '',
													)
												);
												?>
											</ul>
											<h2 id="sponsors">Industry Guide</h2>
												<ul>
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
													<li>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
													</li>
												<?php endwhile;

												wp_reset_query(); ?>
												</ul>
											<h2 id="posts">Posts</h2>
											<ul>
												<?php
												// Add categories you'd like to exclude in the exclude here
												$cats = get_categories('exclude=60');
												foreach ($cats as $cat) {
													echo "<li><h3>".$cat->cat_name."</h3>";
													echo "<ul>";
													query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
													while(have_posts()) {
														the_post();
														$category = get_the_category();
														// Only display a post link once, even if it's in multiple categories
														if ($category[1]->cat_ID == $cat->cat_ID) {
															echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
														}
													}
													echo "</ul>";
													echo "</li>";
												}
												?>
											</ul>
								    </div> <!-- /.entry-content -->
								</div> <!-- /.entry -->
							</div> <!-- /.post -->
            </div> <!-- /.col -->
        </div> <!-- /.content -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
