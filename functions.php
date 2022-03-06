<?php
/**
 * eirerepublic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eirerepublic
 */

if ( ! defined( 'EIREREPUBLIC_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'EIREREPUBLIC_VERSION', '1.0.0' );
}

if ( ! function_exists( 'eirerepublic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eirerepublic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on eirerepublic, use a find and replace
		 * to change 'eirerepublic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eirerepublic', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'eirerepublic' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'eirerepublic_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		// Add theme support for custom colour swatches
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => esc_html__( 'Gold' ),
					'slug'  => 'gold',
					'color' => '#c7ab59',
				],
				[
					'name'  => esc_html__( 'Green' ),
					'slug'  => 'green',
					'color' => '#699e3c',
				],
				[
					'name'  => esc_html__( 'Beige' ),
					'slug'  => 'beige',
					'color' => '#ded2ab',
				],
				[
					'name'  => esc_html__( 'Dark Brown' ),
					'slug'  => 'dark-brown',
					'color' => '#302718',
				],
				[
					'name'  => esc_html__( 'Grey' ),
					'slug'  => 'grey',
					'color' => '#999',
				],
				[
					'name'  => esc_html__( 'Light Grey' ),
					'slug'  => 'light-grey',
					'color' => '#ececee',
				],
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'eirerepublic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eirerepublic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eirerepublic_content_width', 640 );
}
add_action( 'after_setup_theme', 'eirerepublic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eirerepublic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eirerepublic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eirerepublic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Footer', 'eirerepublic' ),
			'id' => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'About', 'eirerepublic' ),
			'id' => 'about',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'eirerepublic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eirerepublic_scripts() {
	wp_enqueue_style( 'eirerepublic-style', get_template_directory_uri() . '/dist/style.css', array(), _S_VERSION );
	wp_enqueue_script( 'eirerepublic-scripts', get_template_directory_uri() . '/dist/app.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-scripts', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_style('dashicons');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eirerepublic_scripts' );

/**
 * Get custom logo image URL
 */
function get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0];
}

/**
 * Theme redirects.
 */
function eirerepublic_redirect() {
	if ( is_author() ||
		 is_tag()
	) {
		wp_safe_redirect( home_url( '/' ), 301 ); 
		exit; 
	}
}
add_action( 'template_redirect', 'eirerepublic_redirect' );

/**
 * Adds read more permalink to end of excerpt
 */
function excerpt_readmore($more) {
	return '... <a href="' . get_permalink($post->ID) . '" class="readmore">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

/**
 * Gets nav menu with sub menus 
 */
function wp_get_menu_array($current_menu) {
	$menu_array = wp_get_nav_menu_items($current_menu);

	$menu = array();

	function populate_children($menu_array, $menu_item)
	{
		$children = array();
		if (!empty($menu_array)){
			foreach ($menu_array as $k=>$m) {
				if ($m->menu_item_parent == $menu_item->ID) {
					$children[$m->ID] = array();
					$children[$m->ID]['ID'] = $m->ID;
					$children[$m->ID]['title'] = $m->title;
					$children[$m->ID]['url'] = $m->url;
					unset($menu_array[$k]);
					$children[$m->ID]['children'] = populate_children($menu_array, $m);
				}
			}
		};

		return $children;
	}

	foreach ($menu_array as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID] = array();
			$menu[$m->ID]['ID'] = $m->ID;
			$menu[$m->ID]['title'] = $m->title;
			$menu[$m->ID]['url'] = $m->url;
			$menu[$m->ID]['children'] = populate_children($menu_array, $m);
		}
	}

	return $menu;
}

/**
 * Removes prefix from category title
 */
function remove_category_title_prefix( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'remove_category_title_prefix' );

// Remove heading blocks from excerpts.
function remove_heading_blocks_excerpts( $allowed_blocks ) {
	$key = array_search( 'core/heading', $allowed_blocks );
	
	if ( $key !== false ) {
		unset( $allowed_blocks[ $key ] );
	}
	
	return $allowed_blocks;
}
add_filter( 'excerpt_allowed_blocks', 'remove_heading_blocks_excerpts', 100, 1 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

