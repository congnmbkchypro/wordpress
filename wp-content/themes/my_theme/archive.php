<?php get_header(); ?>

<div class="container">
    <div class="archive-title">
        <h2>
            <?php
                if ( is_tag() ) :
                        printf( __('Posts Tagged: %1$s'), single_tag_title( '', false ) );
                elseif ( is_category() ) :
                        // printf( __('Posts Categorized: %1$s'), single_cat_title( '', false ) );
                        echo "Posts Categoried: " . single_cat_title('', false);
                elseif ( is_day() ) :
                        printf( __('Daily Archives: %1$s'), get_the_time('l, F j, Y') );
                elseif ( is_month() ) :
                        printf( __('Monthly Archives: %1$s'), get_the_time('F Y') );
                elseif ( is_year() ) :
                        printf( __('Yearly Archives: %1$s'), get_the_time('Y') );
                endif;
            ?>
        </h2>
    </div>

    <?php if ( is_tag() || is_category() ) : ?>
        <div class="archive-description">
                <?php echo category_description(); ?>
        </div>
    <?php endif; ?>

    <?php
    if (have_posts()) : while (have_posts()) : the_post();
        get_template_part('content', 'get_post_format');
    endwhile; endif;    

    paginate();
    ?>
</div>

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>