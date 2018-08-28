<?php get_header(); ?>
<div class="container">
    <div class="content">
        <div id="post_thumbnail">
            <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
            ?>
        </div>

        <div class="main-content">            
            <div id="date_created" class='date_created'>
                <?php echo get_the_date('F jS, Y'); ?>
            </div>
            <?php            
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content_post', 'get_post_format');                
            endwhile; endif;
            random_post();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
