<?php get_header(); ?>

<?php
    if (have_posts()) : while (have_posts()) : the_post();
        get_template_part('content', 'get_post_format()');        
    endwhile; endif;    
    wp_list_comments();
    comments_template();
?>

<?php get_footer(); ?>