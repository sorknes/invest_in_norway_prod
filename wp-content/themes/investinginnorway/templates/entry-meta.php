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
</div>
