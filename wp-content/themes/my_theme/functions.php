<?php
define('THEME URL', get_stylesheet_directory());

/**
 * chen RSS link
 */
add_theme_support('automatic_feed_links');

/**
 * Them title tag
 */
add_theme_support('title-tag');

/**
 * Them post thumnail
 */
add_theme_support('post-thumbnails');

/**
 * THem post format
 */
add_theme_support('post-formats',
    array(
        'image',
        'video',
        'gallery',
        'quote',
        'link'
    )
);
function paginate() {
    if (get_next_post_link()) { ?>
        <div class = "prev"><?php next_posts_link('Older Post'); ?></div>
    <?php if (get_previous_posts_link()) ?>
        <div class = 'next'><?php previous_posts_link('New Post'); ?></div>
        <a href="<?php previous_posts_link('New Post'); ?>" class="w3-button">&raquo;</a>
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
    'before_title' => '<h3 class="widge title">',
    'after_sidebar' => '</h3>'
];
register_sidebar($sidebar);

function style() {
    wp_register_style( 'mystyle', get_stylesheet_uri() );
    wp_enqueue_style('mystyle');
}

add_action('wp_enqueue_scripts', 'style');

function entry_header() {
    if (is_single()) : ?>
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title = '<?php the_title_attribute(); ?>'>
                <?php the_title(); ?>
            </a>
        </h1>
    <?php
    endif;
}

add_filter('the_author', 'guest_author_name');
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name($name) {
    global $post;
    $author = get_post_meta($post->ID, 'custom_field', true);
    if ($author) {
        $name = $author;
    }
    return $name;
}

?>