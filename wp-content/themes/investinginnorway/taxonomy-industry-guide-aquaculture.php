
<div class="container-fluid">
  <main id="content" class="main" role="main">
    <div class="content row">
        <div class="col-xs-12">
          <article class="post">
          <?php
	    			$id = 11; //192
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$excerpt = apply_filters('the_excerpt', $post->post_excerpt);

            echo '<header><div class="page-header page"><div class="entry-title sr-only">';
            echo '<h1 itemprop="headline">'.$title.'</h1>';
            echo '</div></div></header>';

            echo '<div class="entry-ingress">'.$excerpt.'</div>';

	    			wp_reset_query();
	    			?>
          </article>
        </div> <!-- /.col -->
    </div> <!-- /.content -->

    <div class="content row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 192; //192
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
      </div> <!-- /.col -->

      <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        <div id="entry" class="container" itemprop="description">
          <?php
            $args = array(
              'post_type' => 'industry_guide',
              'posts_per_page' => -1,
              'orderby'=> 'title',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'industry-guide',
                  'field'    => 'slug',
                  'terms'    => 'aquaculture-gold',
                ),
              )
            );

            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-xs-12"> <!-- entry-content sponsor list -->
              <div class="entry-content sponsor list">
                <a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
                  <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                      <div class="circular-logo--wrapper">
                        <figure title="<?php the_title(); ?>">
                          <?php the_post_thumbnail('medium', array('class' => 'circular-logo')); ?>
                        </figure>
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-xs-12 col-sm-8 col-md-9">
                      <h3 itemprop="headline"><?php the_title(); ?></h3>
                        <div class="meta" style="text-align: left">
                          <small>
                            <?php
                              $posttags = get_the_tags();
                              if ($posttags) {
                                echo '<strong>Industry:</strong> ';
                                foreach($posttags as $tag) {
                                  echo $tag->name . ' / ';
                                }
                              }
                            ?>
                          </small>
                        </div>
                      <?php the_excerpt(); ?>
                    </div> <!-- /.col -->
                  </div> <!-- /.row -->
                </a>
              </div> <!-- /.entry-content -->
            </div> <!-- /.col-->
            <?php endwhile;

          wp_reset_query(); ?>
        </div> <!-- /.container -->
      </article> <!-- /article -->
    </div> <!-- /.content -->

    <div class="content row silver">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 194; //194
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
      </div> <!-- /.col -->

      <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        <div id="entry" class="container" itemprop="description">
          <?php
            $args = array(
              'post_type' => 'industry_guide',
              'posts_per_page' => -1,
              'orderby'=> 'title',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'industry-guide',
                  'field'    => 'slug',
                  'terms'    => 'aquaculture-silver',
                ),
              )
            );

            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-xs-12 col-sm-6"> <!-- entry-content sponsor list -->
              <div class="entry-content sponsor list">
                <a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="circular-logo--wrapper">
                        <figure title="<?php the_title(); ?>">
                          <?php the_post_thumbnail('medium', array('class' => 'circular-logo')); ?>
                        </figure>
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-xs-12 col-sm-6">
                      <h3 itemprop="headline"><?php the_title(); ?></h3>
                        <div class="meta" style="text-align: left">
                        </div>
                    </div> <!-- /.col -->
                  </div> <!-- /.row -->
                </a>
              </div> <!-- /.entry-content -->
            </div> <!-- /.col-->
            <?php endwhile;

          wp_reset_query(); ?>
        </div> <!-- /.container -->
      </article> <!-- /article -->
    </div> <!-- /.content -->

    <div class="content row">
			<div class="col-xs-12">
				<div class="page-header">
					<?php
	    			$id = 196; //196
	    			$post = get_post($id);
	    			$title = apply_filters('the_title', $post->post_title);
	    			$content = apply_filters('the_content', $post->post_content);

	    			echo '<h2 class="section-title" itemprop="headline">'.$title.'</h2>'; //POST
	    			echo '<div itemprop="description">'.$content.'</div>';

	    			wp_reset_query();
	    			?>
				</div> <!-- /.page-header -->
      </div> <!-- /.col -->

      <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        <div id="entry" class="container" itemprop="description">
          <?php
            $args = array(
              'post_type' => 'industry_guide',
              'posts_per_page' => -1,
              'orderby'=> 'title',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'industry-guide',
                  'field'    => 'slug',
                  'terms'    => 'aquaculture-bronze',
                ),
              )
            );

            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-xs-6 col-sm-2"> <!-- entry-content sponsor list -->
              <div class="entry-content sponsor list">
                <a href="<?php the_permalink(); ?>" itemprop="url" title="Learn more about: <?php the_title(); ?>">
                  <div class="row">
                    <div class="col-xs-12 circular-logo--wrapper">
                      <figure title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'circular-logo')); ?>
                      </figure>
                    </div> <!-- /.col -->
                  </div> <!-- /.row -->
                </a>
              </div> <!-- /.entry-content -->
            </div> <!-- /.col-->
            <?php endwhile;

          wp_reset_query(); ?>
        </div> <!-- /.container -->
      </article> <!-- /article -->
    </div> <!-- /.content -->
  </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
