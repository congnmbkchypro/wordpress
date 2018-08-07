<?php
/**
 * fashionate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fashionate
 */

if ( ! function_exists( 'fashionate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fashionate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fashionate, use a find and replace
	 * to change 'fashionate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fashionate', get_template_directory() . '/languages' );

			/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'link',
		'gallery',
		'audio'
	) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fashionate' ),
	) );

	// Custom logo enable 
	add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'max-width'   => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        ) 
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );



	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fashionate_custom_background_args', array(
		'default-color' => '#f5f5f5',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'fashionate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function fashionate_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'fashionate_custom_excerpt_length', 999 );

function fashionate_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'fashionate_excerpt_more' );


function fashionate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fashionate_content_width', 640 );
}
add_action( 'after_setup_theme', 'fashionate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashionate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashionate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashionate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fashionate_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function fashionate_scripts() {

								// Fahionate Stylesheet
	// Opensans fonts 
	wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans' );

	// Vidolaka fonts
	wp_enqueue_style('Vidaloka', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700' );

	// Bootstrap Stylesheet
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dist/css/bootstrap.css' );

	// Fontawesome Stylesheet
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/dist/css/font-awesome.css' );

	// Owl carousel Stylesheet
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/dist/css/owl.carousel.css' );

	// Bootstrap Stylesheet
	//wp_enqueue_style('fashionate', get_template_directory_uri() . '/dist/css/fashionate.css' );

	// Theme main Stylesheet
	wp_enqueue_style('main-css', get_template_directory_uri() . '/style.css' );



								// Fahionate Scripts

	// Navigation scripts
	wp_enqueue_script( 'fashionate-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), '20151215', true );

	// Skip Scripts
	wp_enqueue_script( 'fashionate-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Bootstrap Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array('jquery'), '20120206', true );

	// Owl carouesl Scripts
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/dist/js/owl.carousel.js', array('jquery'), '20120206', true );

	// Fahionate Main Scripts
	wp_enqueue_script( 'fashionate-js', get_template_directory_uri() . '/dist/js/fashionate.js', array('jquery'), '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashionate_scripts' );


function tx_latest_sticky() {

    /* Get all sticky posts */
    $sticky = get_option( 'sticky_posts' );
    if ($sticky):

    /* Sort the stickies with the newest ones at the top */
    rsort( $sticky );

    /* Get the 5 newest stickies (change 5 for a different number) */
    $sticky = array_slice( $sticky, 0, 5 );

    /* Query sticky posts */
    $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
// The Loop
    if ( $the_query->have_posts() ) {
        $contain ='';
        $contain .= '<div class="owl-carousel owl-theme sticky-post-thumbnail">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            if ( has_post_thumbnail() ) {
                $contain .= '<div><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail() . '</a></div>';
            }

        }
        $contain .= '</div>';

    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    
    
    return $contain;
endif;

}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load text meta.php
 */
require get_template_directory() . '/libs/cat-metabox.php';

/*
 * bootstrap nav walker
 * */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

require get_template_directory() . '/inc/boot-nav.php';
/*
 * tgm plugin
 * */
require get_template_directory() . '/plugin/class-tgm-plugin-activation.php';


require get_template_directory() . '/inc/plugin-activation.php';
