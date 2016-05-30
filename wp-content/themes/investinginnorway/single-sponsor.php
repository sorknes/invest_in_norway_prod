<?php while (have_posts()) : the_post(); ?>

    <?php
        $pt_title		= get_post_custom_values('pt_title');
        $pt_title 		= $pt_title[0];
        $pt_phone		= get_post_custom_values('pt_phone');
        $pt_phone 		= $pt_phone[0];
        $pt_email		= get_post_custom_values('pt_email');
        $pt_email 		= $pt_email[0];

        $pt_title_two		= get_post_custom_values('pt_title_two');
        $pt_title_two 		= $pt_title_two[0];
        $pt_phone_two		= get_post_custom_values('pt_phone_two');
        $pt_phone_two 		= $pt_phone_two[0];
        $pt_email_two		= get_post_custom_values('pt_email_two');
        $pt_email_two 		= $pt_email_two[0];

        $pt_title_three		= get_post_custom_values('pt_title_three');
        $pt_title_three 	= $pt_title_three[0];
        $pt_phone_three		= get_post_custom_values('pt_phone_three');
        $pt_phone_three 	= $pt_phone_three[0];
        $pt_email_three		= get_post_custom_values('pt_email_three');
        $pt_email_three 	= $pt_email_three[0];
    ?>

    <article <?php post_class('post'); ?>>
        <header>
            <div class="page-header page">
                <div class="entry-title">
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </div>
                <?php //get_template_part('templates/entry-meta'); ?>
            </div> <!-- /.page-header -->
        </header>
        <div id="entry" class="container" itemprop="description">
            <div class="entry-content sponsor">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <figure title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </figure>
                    </div> <!-- /.col -->
                    <div class="col-xs-12 col-sm-8">
                        <?php the_content(); ?>
                        <div class="contact">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 itemprop="headline">Contact information</h2>
                                </div>
                            </div> <!-- /.row -->
                            <div class="meta-entry">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4">
                                        Name: <br />
                                        Phonenumber: <br />
                                        Email:
                                    </div>
                                    <div class="col-xs-6 col-sm-8">
                                        <?php if ($pt_title) { ?><?php echo $pt_title ?><?php } ?><br />
                                        <?php if ($pt_phone) { ?><?php echo $pt_phone ?><?php } ?> <br />
                                        <?php if ($pt_email) { ?><a href="mailto:<?php echo $pt_email ?>" title="Send email"><?php echo $pt_email ?></a><?php } ?>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.meta-entry -->
                            <?php if ($pt_title_two || $pt_phone_two || $pt_email_two){ ?>
                            <div class="meta-entry">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4">
                                        <?php if ($pt_title_two) { ?>Name:<br /><?php } ?>
                                        <?php if ($pt_phone_two) { ?>Phonenumber:<br /><?php } ?>
                                        <?php if ($pt_email_two) { ?>Email:<?php } ?>
                                    </div>
                                    <div class="col-xs-6 col-sm-8">
                                        <?php if ($pt_title_two) { ?><?php echo $pt_title_two ?><br /><?php } ?>
                                        <?php if ($pt_phone_two) { ?><?php echo $pt_phone_two ?><br /><?php } ?>
                                        <?php if ($pt_email_two) { ?><a href="mailto:<?php echo $pt_email_two ?>" title="Send email"><?php echo $pt_email_two ?></a><?php } ?>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.meta-entry -->
                            <?php } ?>
                            <?php if ($pt_title_three || $pt_phone_three || $pt_email_three){ ?>
                            <div class="meta-entry">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4">
                                        <?php if ($pt_title_three) { ?>Name:<br /><?php } ?>
                                        <?php if ($pt_phone_three) { ?>Phonenumber:<br /><?php } ?>
                                        <?php if ($pt_email_three) { ?>Email:<?php } ?>
                                    </div>
                                    <div class="col-xs-6 col-sm-8">
                                        <?php if ($pt_title_three) { ?><?php echo $pt_title_three ?><br /><?php } ?>
                                        <?php if ($pt_phone_three) { ?><?php echo $pt_phone_three ?><br /><?php } ?>
                                        <?php if ($pt_email_three) { ?><a href="mailto:<?php echo $pt_email_three ?>" title="Send email"><?php echo $pt_email_three ?></a><?php } ?>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.meta-entry -->
                            <?php } ?>
                        </div> <!-- /.contact -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.entry-content -->
        </div> <!-- /.container -->
        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
    </article>
<?php endwhile; ?>
