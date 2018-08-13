<?php get_header(); ?>

<div class="container">
    <div class="content">
        <div id="main-content">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', 'get_post_format');           
            endwhile; endif;    

            paginate();
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>