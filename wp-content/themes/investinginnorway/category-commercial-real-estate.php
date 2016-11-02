<?php
$id = 200; //200
$post = get_post($id);
$title = apply_filters('the_title', $post->post_title);
$content = apply_filters('the_content', $post->post_content); { ?>

<div class="jumbo-wrapper" style="background-image: url('<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'jumbotron-thumb', true); echo $thumb_url[0]; ?>')">
    <div class="jumbotron">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-xs-12">
                    <div class="content">


    	    			<h1 itemprop="headline"><?php the_title() ?></h1>
    	    			<div itemprop="description">
                            <?php the_content() ?>
                            <?php echo '<div itemprop="description">'.$content.'</div>'; ?>
                        </div>


                    </div>
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

<?php }

wp_reset_query(); ?>

<div class="container-fluid">
	<main id="content" class="main" role="main">
    <div class="content row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1">
            <ul class="cat-list">
                <?php wp_list_categories( array(
                    'child_of'  => 44,
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
              <?php get_template_part('loop', 'newsitems');  //Get the loop-newsitems.php ?>
          </div> <!-- /.grid -->
			</div> <!-- /.col-lg-offeset -->
		</div> <!-- /.row -->
    </main> <!-- /.main -->
</div> <!-- /.container-fluid -->
