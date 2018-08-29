<?php
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

require_once( CORE . '/init.php' );

if ( ! function_exists( 'fabia_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm thachpham_theme_setup() thì sẽ tạo mới hàm đó
     */
    function fabia_theme_setup() {

    }
    add_action ( 'init', 'fabia_theme_setup' );
  }

add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');

//Register css file
function styles() {
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
  wp_enqueue_style( 'main-style' );
  wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
  if (is_home()) {
    wp_dequeue_style('custom');
  }
}
add_action('wp_enqueue_scripts', 'styles');

add_filter('rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1);
function my_prefix_add_rest_orderby_params ($params) {
    error_log(print_r($params, true));
    $params['orderby']['enum'][] = 'rand';
    return $params;
}
?>