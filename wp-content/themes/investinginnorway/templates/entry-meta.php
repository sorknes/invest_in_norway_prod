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
        <div class="meta-entry">
            <div class="author">
              <?php the_author() ?>
            </div>
            <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
        </div>
    </small>
</div>
