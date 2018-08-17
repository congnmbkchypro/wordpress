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

add_filter( 'rwmb_meta_boxes', 'prefix_meta_boxes' );
function prefix_meta_boxes( $meta_boxes ) {
    // global $wpdb;
    // $query = "SELECT user_login FROM fabia_users";
    // error_log(print_r($query, true));
    // $all = $wpdb->get_results($query);
    // error_log(print_r($all, true));

    $meta_boxes[] = array(
        'title'  => 'Category custom',
        'fields' => array(
            array(
				'id' => 'Categories',
				'name' => 'Categories',
				'type' => 'select_advanced',
				'options' => array(
					'interview' => 'INTERVIEW',
					'lesson' => ' LESSON',
					'news' => 'NEWS',
                ),
            ),
        ),
    );
    
    echo 'haha';
    return $meta_boxes;
}

// function save_metabox($post_id) {
//     if (array_key_exists('category', $_POST)) {
//         update_post_meta($post_id, 'category', $_POST['category']);
//     }
// }

// add_action('save_post', 'save_metabox');

function add_metabox_category()
{
    add_meta_box('Categories', 'Category', 'show_metabox_category', 'post', 'advanced', 'high', array(1, 2, 'hello'));
}
 
function show_metabox_category($post, $metabox)
{
    echo "Chon category ";
    $args = array(
        'show_option_all'    => '',
        'show_option_none'   => '',
        'option_none_value'  => '-1',
        'orderby'            => 'ID',
        'order'              => 'ASC',
        'show_count'         => 0,
        'hide_empty'         => 0,
        'child_of'           => 0,
        'exclude'            => '',
        'include'            => '',
        'echo'               => 1,
        'selected'           => 0,
        'hierarchical'       => 0,
        'name'               => 'cat',
        'id'                 => '',
        'class'              => 'postform',
        'depth'              => 0,
        'tab_index'          => 0,
        'taxonomy'           => 'category',
        'hide_if_empty'      => false,
        'value_field'	     => 'term_id',
    );

    // wp_dropdown_categories($args);
    wp_dropdown_categories('hide_empty=0');
    // wp_dropdown_categories( 'show_count=1&hierarchical=1' );
    // var_dump($post);
    // var_dump($metabox);
}

function save_metabox_cate($post_id) {
    if (array_key_exists('Categories', $_POST)) {
        update_post_meta($post_id, 'Categories', $_POST['category']);
    }
}

add_action('save_post', 'save_metabox_cate');
 
add_action('add_meta_boxes', 'add_metabox_category');

// --- custom post type ---
function tao_custom_post_type()
{
 
    $label = array(
        'name' => 'Các sản phẩm',
        'singular_name' => 'Sản phẩm',
        'add_new' => 'Add New',
    );
 
    $args = array(
        'labels' => $label,
        'description' => 'Post type đăng sản phẩm',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('post_tag'), 
        'hierarchical' => false,
        'public' => true, 
        'show_ui' => true, 
        'show_in_menu' => true,
        'show_in_nav_menus' => true, 
        'show_in_admin_bar' => true, 
        'menu_position' => 5,
        'menu_icon' => '',
        'can_export' => true, 
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true, 
        'capability_type' => 'post' 
    );
 
    register_post_type('sanpham', $args); 
 
}

add_action('init', 'tao_custom_post_type');
// --- END CUSTOM POST TYPE ---

?>