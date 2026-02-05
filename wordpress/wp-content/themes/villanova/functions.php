<?php

/**
 * Add theme support for various WordPress features.
 *
 * @return void
 */
function wp_blank_setup() {
	// Support programmable title tag.
	add_theme_support( 'title-tag' );

	// Support custom logo.
	add_theme_support( 'custom-logo' );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wp-blank, use a find and replace
	 * to change 'wp-blank' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-blank', get_template_directory() . '/languages' );

	// Register top menu.
	register_nav_menus(
		array(
			'top' => esc_html__( 'Top Menu', 'wp-blank' ),
			'header_right' => esc_html__( 'Header Right Menu', 'wp-blank' ),
			'footer_copyrights' => esc_html__( 'Footer Copyrights', 'wp-blank' )
		)
	);

	// Register sidebars.
	register_sidebar( array(
		'name'          => 'Footer 1 PL',
		'id'            => 'footer_1_pl',
	) );
	register_sidebar( array(
		'name'          => 'Footer 2 PL',
		'id'            => 'footer_2_pl',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3 PL',
		'id'            => 'footer_3_pl',
	) );
	// Register sidebars.
	register_sidebar( array(
		'name'          => 'Footer 1 EN',
		'id'            => 'footer_1_en',
	) );
	register_sidebar( array(
		'name'          => 'Footer 2 EN',
		'id'            => 'footer_2_en',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3 EN',
		'id'            => 'footer_3_en',
	) );
	register_sidebar( array(
		'name'          => 'Footer Copyrights PL',
		'id'            => 'footer_copyrights_pl',
	) );
	register_sidebar( array(
		'name'          => 'Footer Copyrights EN',
		'id'            => 'footer_copyrights_en',
	) );


//	$args = array(
//		'public'    => true,
//		'label'     => 'Services',
//		'menu_icon' => 'dashicons-hammer',
//		'menu_position' => 5,
//		'has_archive' => true,
//		'rewrite' => array('slug' => 'service'),
//	);
//	register_post_type( 'service', $args );
}
add_action( 'after_setup_theme', 'wp_blank_setup' );

function AS_disable_plugin_updates( $value ) {
	$pluginsNotUpdatable = [
		'advanced-custom-fields-pro/acf.php'
	];

	if ( isset($value) && is_object($value) ) {
		foreach ($pluginsNotUpdatable as $plugin) {
			if ( isset( $value->response[$plugin] ) ) {
				unset( $value->response[$plugin] );
			}
		}
	}
	return $value;
}
add_filter( 'site_transient_update_plugins', 'AS_disable_plugin_updates' );

pll_register_string( 'more', 'Czytaj więcej', 'villanova' );
pll_register_string( 'contact_us', 'Napisz do nas', 'villanova' );
pll_register_string( 'contact_data', 'Dane kontaktowe', 'villanova' );
pll_register_string( 'pn_pt', 'Pn-Pt:', 'villanova' );
pll_register_string( 'sb', 'Sb:', 'villanova' );
pll_register_string( 'socialmedia', 'Znajdź nas w mediach społecznościowych:', 'villanova' );
?>
