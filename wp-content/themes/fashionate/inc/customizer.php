<?php
/**
 * fashionate Theme Customizer.
 *
 * @package fashionate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function get_categories_select() {
	$teh_cats = get_categories();
	 $results=array();
	foreach ($teh_cats as $key ) {
		$results[$key->slug] = $key->name;
	}
	return $results;
}


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function basic_bootstrap_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	$wp_customize->add_section('mytheme_options', array(
		'title'    => __('Front Page Categories', 'fashionate'),
		'priority' => 120,
	));

	$wp_customize->add_setting( 'left_cat',
	    array(
	        'default' => 'uncategorized',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'		=> 'postMessage'
	    )
	);
	 
	$wp_customize->add_control( 'left_cat',
	    array(
	        'type' => 'select',
	        'label' => 'This site is powered by:',
	        'section' => 'mytheme_options',
	        'choices' => get_categories_select(),
	    )
	);

	$wp_customize->add_setting( 'center_cat',
	    array(
	        'default' => 'uncategorized',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'		=> 'postMessage'
	    )
	);
	 
	$wp_customize->add_control( 'center_cat',
	    array(
	        'type' => 'select',
	        'label' => 'This site is powered by:',
	        'section' => 'mytheme_options',
	        'choices' => get_categories_select(),
	    )
	);

	$wp_customize->add_setting( 'right_cat',
	    array(
	        'default' => 'uncategorized',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'		=> 'postMessage'
	    )
	);
	 
	$wp_customize->add_control( 'right_cat',
	    array(
	        'type' => 'select',
	        'label' => 'This site is powered by:',
	        'section' => 'mytheme_options',
	        'choices' => get_categories_select(),
	    )
	);
	


	$wp_customize->add_section('social_icon', array(
		'title'    => __('Social', 'fashionate'),
		'priority' => 120,
	));

	$wp_customize->add_setting('tx_facebook', array(
		'default'        => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_facebook', array(
		'settings' => 'tx_facebook',
		'label'   =>  __('Facebook URL','fashionate'),
		'section' => 'social_icon',
		'type'    => 'text',

	));
	$wp_customize->add_setting('tx_google', array(
		'default'        => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_google', array(
		'settings' => 'tx_google',
		'label'   =>  __('Google URL','fashionate'),
		'section' => 'social_icon',
		'type'    => 'text',

	));
	$wp_customize->add_setting('tx_twitter', array(
		'default'        => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_twitter', array(
		'settings' => 'tx_twitter',
		'label'   =>  __('Twitter URL','fashionate'),
		'section' => 'social_icon',
		'type'    => 'text',

	));

	$wp_customize->add_setting('tx_linkedin', array(
		'default'        => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_linkedin', array(
		'settings' => 'tx_linkedin',
		'label'   =>  __('Linkedin URL','fashionate'),
		'section' => 'social_icon',
		'type'    => 'text',

	));

	$wp_customize->add_section('footer_message', array(
		'title'    => __('Footer Message', 'fashionate'),
		'priority' => 200,
	));

	$wp_customize->add_setting('tx_footer_message', array(
		'default'        => __('Copyright @Fashionate Blog. All Rights Reserved.','fashionate'),
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_footer_message', array(
		'settings' => 'tx_footer_message',
		'label'   =>  __('Footer Message','fashionate'),
		'section' => 'footer_message',
		'type'    => 'textarea',

	));

	$wp_customize->add_section('tx_sidebar_position', array(
		'title'    => __('SideBar Position', 'fashionate'),
		'priority' => 120,
	));

	$wp_customize->add_setting('tx_sidebar', array(
		'default'        => __('right','fashionate'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'		=> 'postMessage'
	));
	$wp_customize->add_control( 'tx_sidebar', array(
		'settings' => 'tx_sidebar',
		'label'   =>  __('Select Sidebar','fashionate'),
		'section' => 'tx_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'left'    => __('Left','fashionate'),
			'right'    => __('Right','fashionate'),
			'no-sidebar'  => __('No Side Bar','fashionate')
		)
	));


}
add_action( 'customize_register', 'basic_bootstrap_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashionate_customize_preview_js() {
	wp_enqueue_script( 'fashionate_customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fashionate_customize_preview_js' );
