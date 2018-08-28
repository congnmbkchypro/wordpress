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
add_action( 'wp_enqueue_scripts', 'styles' );

// Get random post
function random_post() {
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => 3,
  );

  $random_post = new WP_Query($args);
  // error_log(print_r($random_post), true);
  // var_dump($random_post);
  echo '<h3 class="random_post">Random post</h3>';
  if ($random_post->have_posts()) : while ($random_post->have_posts()) : $random_post->the_post();
    // echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a><br>';
    ?>
    <ul class="random_post">
      <li>
        <div>
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail();
              } else { ?>
              <img src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" />
            <?php } ?>
          </a>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
      </li>
    </ul>
    <?php
  endwhile; endif;
}
add_action('save_post', 'random_post');

add_action( 'rest_api_init', function () {
  register_rest_route( 'api', '/any', array(
      'methods'   =>  'GET',
      'callback'  =>  'get_random',
  ) );
} );
function get_random() {
  return get_posts( array( 'orderby' => 'rand', 'posts_per_page' => 3) );
}

add_filter( 'rest_review_collection_params', 'prefix_rest_orderby_rand', 10, 1 );
function prefix_rest_orderby_rand( $params ) {
    $params['orderby']['enum'][] = 'rand';
    return $params;
}

// Custom WP API endpoint
    function theme_enable_random_api() {

        // create json-api endpoint

        add_action('rest_api_init', function () {

            // http://example.com/wp-json/random/v2/posts

            register_rest_route('random/v2', '/random', array (
                'methods'             => 'GET',
                'callback'            => 'wp_json_offers_v2__posts',
                'permission_callback' => function (WP_REST_Request $request) {
                    return true;
                }
            ));
        });

        // handle the request

        function wp_json_offers_v2__posts($request) {
            // json-api params

            $parameters = $request->get_query_params();

            // default search args

            $args = array(
                'post_type'     => $parameters['type'],
                'numberposts'   => 9,
                'offset'        => $parameters['offset'],
                'post_not_in'       => $parameters['exclude'],
                'orderby'       => 'rand',
            );

            // run query

            $posts = get_posts($args);
            error_log($posts);
            // return results
            return new WP_REST_Response($posts, 200);
        }

    }

    add_action('init', 'theme_enable_random_api');

// Return all post IDs
function walden_get_all_post_ids() {
	$all_post_ids = get_posts( array(
        // 'numberposts' => -1,
        'post_type'   => 'post',
        'fields'      => 'id',
        'orderby'     => 'rand'
    ) );
  error_log(count($all_post_ids));
    return $all_post_ids;
}
 
// Add Walden/v1/get-all-post-ids route
add_action( 'rest_api_init', function () {
	register_rest_route( 'walden/v1', 'get-all-post-ids', array(
	  'methods' => 'GET',
		'callback' => 'walden_get_all_post_ids',
	) );
} );

// Get random post by rest api
function get_random_post() {
  $random_post = get_posts(array(
    'post_type' => 'post',
    'orderby' => 'rand',
    'posts_per_page' => 3,
  ));
  return $random_post;
}

add_action('rest_api_init', function() {
  register_rest_route('wp/v2', 'random', array(
    'methods' => 'GET',
    'callback' => 'get_random_post',
  ));
});

// function get_excerpt(){
//   $excerpt = get_the_content();
//   $excerpt = preg_replace(" ([.*?])",'',$excerpt);
//   $excerpt = strip_shortcodes($excerpt);
//   $excerpt = strip_tags($excerpt);
//   $excerpt = substr($excerpt, 0, 50);
//   $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
//   $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
//   $excerpt = $excerpt.'... <a href="'.the_permalink().'">more</a>';
//   return $excerpt;
// }

add_filter( 'rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );
add_filter( 'rest_category_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );

function my_prefix_add_rest_orderby_params( $params ) {
    $params['orderby']['enum'][] = 'rand';

    return $params;
}
?>