<?php
function add_metabox()
{
    add_meta_box('the-loai', 'Thể Loại1111', 'show_metabox_contain', 'post', 'advanced', 'high', array(1, 2, 'hello'));
}
 
function show_metabox_contain($post, $metabox)
{
    echo "Nội dung của metabox ";
    echo "<input type = 'text' name = 'user' id='my-input'>";
    // var_dump($post);
    // var_dump($metabox);
}

add_action('add_meta_boxes', 'add_metabox');

add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
 //    if( 'index.php' != $hook ) {
	// // Only applies to dashboard panel
	// return;
 //    }
        
	wp_enqueue_script( 'ajax-script', plugins_url( '/js/my_query.js', __FILE__ ), array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
}

// Same handler function...
add_action( 'wp_ajax_my_action', 'my_action' );
function my_action() {
	global $wpdb;
	error_log($_POST['name']);
	$query = "SELECT * FROM fabia_users where display_name = " . "'".$_POST['name']. "'";
	error_log(print_r($query, true));
	$all = $wpdb->get_results($query);
	error_log(print_r($all, true));
	$whatever = intval( $_POST['name'] );
	
	wp_send_json(array('sucess' => 1 ,'user' => $all ));
}
