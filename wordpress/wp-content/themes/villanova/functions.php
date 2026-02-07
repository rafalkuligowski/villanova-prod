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



//start
// Register CPTs with Polylang
add_filter('pll_get_post_types', function($post_types) {
    $post_types['usluga'] = 'usluga';
    $post_types['zespol'] = 'zespol';
    $post_types['ambasadorzy'] = 'ambasadorzy';
    $post_types['metamorfozy'] = 'metamorfozy';
    return $post_types;
});

// Add alternative root-level rewrite rules for usluga
add_action('init', function() {
    // Single level: /slug
    add_rewrite_rule(
        '^([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]',
        'bottom'
    );

    // 2-level hierarchy: /parent/child
    add_rewrite_rule(
        '^([^/]+)/([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]/$matches[2]',
        'bottom'
    );

    // 3-level hierarchy: /parent/child/grandchild
    add_rewrite_rule(
        '^([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]/$matches[2]/$matches[3]',
        'bottom'
    );

    // English versions
    add_rewrite_rule(
        '^en/([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]&lang=en',
        'bottom'
    );

    add_rewrite_rule(
        '^en/([^/]+)/([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]/$matches[2]&lang=en',
        'bottom'
    );

    add_rewrite_rule(
        '^en/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?custom_usluga_lookup=$matches[1]/$matches[2]/$matches[3]&lang=en',
        'bottom'
    );
}, 999);

// Register custom query var
add_filter('query_vars', function($vars) {
    $vars[] = 'custom_usluga_lookup';
    return $vars;
});

// Helper function to find usluga by path
function find_usluga_by_path($path) {
    global $wpdb;

    // Try get_page_by_path first
    $post = get_page_by_path($path, OBJECT, 'usluga');
    if ($post) {
        return $post;
    }

    // Fallback: manual query for hierarchical posts
    $parts = explode('/', trim($path, '/'));
    $slug = array_pop($parts); // Get the last part (child slug)

    // Query for posts with this slug
    $posts = $wpdb->get_results($wpdb->prepare(
        "SELECT ID, post_parent, post_name FROM {$wpdb->posts}
        WHERE post_name = %s AND post_type = 'usluga' AND post_status = 'publish'",
        $slug
    ));

    if (empty($posts)) {
        return null;
    }

    // If there's only one, return it
    if (count($posts) === 1) {
        return get_post($posts[0]->ID);
    }

    // If multiple, verify the parent hierarchy
    foreach ($posts as $post_data) {
        if (empty($parts)) {
            // No parent expected, use post with no parent
            if ($post_data->post_parent == 0) {
                return get_post($post_data->ID);
            }
        } else {
            // Check if parent slug matches
            $parent_slug = $parts[count($parts) - 1];
            $parent = get_post($post_data->post_parent);
            if ($parent && $parent->post_name === $parent_slug) {
                return get_post($post_data->ID);
            }
        }
    }

    // Default to first match
    return get_post($posts[0]->ID);
}

// Handle the custom lookup and resolve to actual post
add_action('parse_request', function($wp) {
    if (isset($wp->query_vars['custom_usluga_lookup']) && !empty($wp->query_vars['custom_usluga_lookup'])) {
        $path = $wp->query_vars['custom_usluga_lookup'];

        // First check if it's a page
        $page = get_page_by_path($path, OBJECT, 'page');
        if ($page) {
            $wp->query_vars = array('page_id' => $page->ID);
            return;
        }

        // Check if it's a blog post
        $parts = explode('/', $path);
        if (count($parts) === 2 && $parts[0] === 'blog') {
            $wp->query_vars = array('name' => $parts[1]);
            return;
        }

        // Check other CPTs
        $slug = basename($path);
        $other_cpts = array('zespol', 'ambasadorzy', 'metamorfozy', 'media');
        foreach ($other_cpts as $cpt) {
            $check = get_page_by_path($slug, OBJECT, $cpt);
            if ($check) {
                $wp->query_vars = array(
                    'post_type' => $cpt,
                    $cpt => $slug,
                    'name' => $slug
                );
                return;
            }
        }

        // Finally, check if it's a usluga
        $usluga = find_usluga_by_path($path);

        if ($usluga) {
            // Found the usluga - CRITICAL: Don't set 'name', use only 'p' (post ID)
            $wp->query_vars = array(
                'post_type' => 'usluga',
                'p' => $usluga->ID
            );
        }
    }
}, 0);

// CRITICAL: Remove 'pagename' if it's actually a usluga
add_filter('request', function($query_vars) {
    if (isset($query_vars['pagename']) && isset($query_vars['p']) && isset($query_vars['post_type']) && $query_vars['post_type'] === 'usluga') {
        // Remove pagename - it conflicts with custom post type lookup
        unset($query_vars['pagename']);
        unset($query_vars['name']);
        unset($query_vars['usluga']);
    }
    return $query_vars;
}, 999);

// Stop redirects
add_action('template_redirect', function() {
    remove_action('template_redirect', 'redirect_canonical');
}, 1);

add_filter('redirect_canonical', '__return_false', 999);
add_filter('pll_check_canonical_url', '__return_false', 999);
//end



function custom_breadcrumbs() {
	// Separator i opcje
	$separator = ' / ';
	$home_title = pll__('Strona główna'); // Tłumaczenie ciągu z Polylang
	$blog_page_title = pll__('Blog'); // Tytuł strony bloga

	// Globalne zmienne
	global $post;

	echo '<nav class="breadcrumbs">';

	// Link do strony głównej
	echo '<a href="' . home_url() . '">' . $home_title . '</a>';

	if (!is_front_page()) {
		echo $separator;

		if (is_home()) {
			echo '<span class="current">' . $blog_page_title . '</span>';
		} elseif (is_single()) {

			$parent_id = $post->post_parent;

			if ($parent_id) {
				// Pobierz rodzica i jego breadcrumb
				$parent = get_post($parent_id);
				echo '<a href="' . get_permalink($parent) . '">' . get_the_title($parent) . '</a>' . $separator;
			}

			echo '<span class="current">' . get_the_title() . '</span>';
		} elseif (is_page()) {
			if ($post->post_parent) {
				$parents = get_post_ancestors($post->ID);
				$parents = array_reverse($parents);
				foreach ($parents as $parent) {
					echo '<a href="' . get_permalink($parent) . '">' . get_the_title($parent) . '</a>' . $separator;
				}
			}
			echo '<span class="current">' . get_the_title() . '</span>';
		} elseif (is_category()) {
			// Jeśli to kategoria
			echo '<span class="current">' . single_cat_title('', false) . '</span>';
		} elseif (is_tag()) {
			// Jeśli to tag
			echo '<span class="current">' . single_tag_title('', false) . '</span>';
		} elseif (is_search()) {
			// Jeśli to wyniki wyszukiwania
			echo '<span class="current">Wyniki wyszukiwania dla: "' . get_search_query() . '"</span>';
		} elseif (is_archive()) {
			// Jeśli to archiwum
			echo '<span class="current">' . post_type_archive_title('', false) . '</span>';
		} elseif (is_404()) {
			// Jeśli to strona 404
			echo '<span class="current">' . pll__('Strona nie znaleziona') . '</span>';
		}
	}

	echo '</nav>';
}



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
