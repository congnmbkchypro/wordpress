<?php get_header(); ?>

<div class="container">
    <div class="content">
        <div class="main-content">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            get_template_part('content', 'get_post_format');
        endwhile; endif;    

        // wp_list_comments();
        comments_template();
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>