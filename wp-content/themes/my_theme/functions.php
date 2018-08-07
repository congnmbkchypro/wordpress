<?php
function paginate() {
    if (get_next_post_link()) { ?>
        <div class = "prev"><?php next_posts_link('Older Post'); ?></div>
    <?php if (get_previous_posts_link()) ?>
        <div class = 'next'><?php previous_posts_link('New Post'); ?></div>
    <?php 
    }
}

/**
 * Tao sidebar
 */
$sidebar = [
    'id' => 'id',
    'description' => 'day la description ve sidebar',
    'class' => 'sidebar_class',
    'name' => 'sidebar',
    'before_title' => '<h3 class="widgettitle">',
    'after_sidebar' => '</h3>'
];
register_sidebar($sidebar);

function style() {
    wp_register_style( 'mystyle', get_stylesheet_uri() );
    wp_enqueue_style('mystyle');
}

add_action('wp_enqueue_scripts', 'style');
?>