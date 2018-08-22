<?php get_header(); ?>
<div class="container">
    <div class="content">
        <div class="main-content">
            <img src="<?php echo get_template_directory_uri() ?>/img/old trafford.jpg" alt="img">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content_post', 'get_post_format');    
            // the_meta();
            endwhile; endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
