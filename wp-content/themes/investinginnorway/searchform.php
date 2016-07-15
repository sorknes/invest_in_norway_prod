<form action="<?php echo home_url( '/' ); ?>" method="get">
    <fieldset>
    		<div class="input-group">
      			<input type="text" name="s" id="search" placeholder="<?php _e("Search here...","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
      			<span class="input-group-btn">
      			    <button type="submit" class="btn btn-default btn-search"><?php _e("Search","wpbootstrap"); ?></button>
      			</span> <!-- /.input-group-btn -->
    		</div> <!-- /.input-group -->
    </fieldset>
</form>
