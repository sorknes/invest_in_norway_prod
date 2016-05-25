<div class="entry-ingress">
    <?php the_excerpt(); ?>
</div>
<div id="entry" class="container" itemprop="description">
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</div>
