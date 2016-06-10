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
                            <div class="category">
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
                            </div>
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
