

<div class="container-fluid">
	<main id="content" class="main" <?php post_class('post'); ?> role="main">
    <div class="content row">
        <div class="post">
            <header>
                <div class="page-header page">
                    <div class="entry-title">
                        <h1 itemprop="headline"><?php single_cat_title(''); ?></h1>
                    </div>
                </div> <!-- /.page-header -->
            </header>
            <!-- <ul class="cat-list">
              <?php
              if (is_category()) {
              $this_category = get_category($cat);
              if (get_category_children($this_category->cat_ID) != "") {
              wp_list_categories('hide_empty=1&exclude=54,55&depth=2&title_li=&child_of=' . $this_category->cat_ID);
              }
              else {
              $parent = $this_category->category_parent;
              wp_list_categories('hide_empty=1&exclude=54,55&depth=2&title_li=&child_of=' . $parent);
              }
              }
              ?>
            </ul> -->
        </post> <!-- /.post -->
    </div>

    <div class="spacer s70"></div>

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
