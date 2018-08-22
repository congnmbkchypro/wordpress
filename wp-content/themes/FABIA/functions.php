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

//Register css file
function styles() {
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
  wp_enqueue_style( 'main-style' );
  wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'styles' );
add_action( 'admin_enqueue_scripts', 'styles' );

//Register js file
function add_script() {
  wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'add_script');
// add_action('admin_enqueue_scripts', 'add_script');
add_action('admin_footer', 'add_script');

// create metabox
function add_metabox_cate() {
  add_meta_box('metabox_cate', 'Category', 'show_metabox_cate', 'post', 'normal', 'high', null);
}
add_action('add_meta_boxes', 'add_metabox_cate');

function show_metabox_cate($post) {
  $cate_all = get_terms('category', 'hide_empty=0');   
  $cate_post = wp_get_post_terms($post->ID, 'category');
  echo "<select name='category' id='category'>";
  echo "<option>Select category</option>";
  foreach ($cate_all as $cate_all) {
    if($cate_all->name == $cate_post[0]->name) { ?>
      <option value="<?php echo $cate_all->term_id ?>" selected><?php echo $cate_all->name ?></option>
    <?php }  else { ?> 
      <option value="<?php echo $cate_all->term_id ?>"><?php echo $cate_all->name ?></option>
    <?php } }
  echo "</select>";
  echo "<div id='future_woman'>fjijiji</div>";
  
}

function save_metaboxes($post_id) {
	$input_metabox = '';
	if (isset($_POST['category'])) {
		$input_metabox = $_POST['category'];
	}
	wp_set_post_terms($post_id, array($input_metabox), 'category');	
}
add_action('save_post', 'save_metaboxes');

?>