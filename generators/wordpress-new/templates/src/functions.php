<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/includes/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/includes/customizer.php';


/* ========================================================================================== */
/*  OPTIONTREE
/* ========================================================================================== */

/* ============================== */
/*  Filter
/* ============================== */

add_filter( 'ot_theme_mode', '__return_true' );


/* ============================== */
/*  Include
/* ============================== */

require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );


/* ============================== */
/*  Theme Options
/* ============================== */

require( trailingslashit( get_template_directory() ) . 'option-tree/theme-options.php' );


/* ========================================================================================== */
/*  ENQUEUE SCRIPTS
/* ========================================================================================== */

function enqueue_assets() {


/* ============================== */
/*  Fonts
/* ============================== */

//	wp_enqueue_style( 'google-fonts', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://fonts.googleapis.com/css?family=Open+Sans', false, null );


/* ============================== */
/*  Styles
/* ============================== */

//	wp_enqueue_style( 'jquery-ui', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css', false, null );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css' );


/* ============================== */
/*  Scripts
/* ============================== */

	wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', false, null );
//	wp_enqueue_script( 'jquery-ui', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://code.jquery.com/ui/1.11.3/jquery-ui.js', false, null );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr/modernizr.js' );
}

if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'enqueue_assets', 11 );


/* ========================================================================================== */
/*  REGISTER PLUGINS
/* ========================================================================================== */

require_once dirname( __FILE__ ) . '/install-plugins.php';

add_action( 'tgmpa_register', 'register_plugins' );

function register_plugins() {
    $plugins = array(
/**
 *		array(
 *			'name'               => The plugin name.
 *          'slug'               => The plugin slug (typically the folder name).
 *          'source'             => The plugin source.
 *          'required'           => If false, the plugin is only 'recommended' instead of required.
 *          'force_activation'   => If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
 *          'force_deactivation' => If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
 *          'external_url'       => If set, overrides default API URL and points to an external URL.
 *      ),
 */


/* ============================== */
/*  Required Plugins
/* ============================== */

		array(
			'name'               => 'BackupBuddy',
			'slug'               => 'backupbuddy',
			'source'             => 'http://ryanaltvater.com/downloads/backupbuddy.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://ithemes.com/purchase/backupbuddy'
		),
		array(
			'name'               => 'Disable Comments',
			'slug'               => 'disable-comments',
			'source'             => 'https://downloads.wordpress.org/plugin/disable-comments.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/disable-comments'
		),
		array(
			'name'               => 'Duplicate Post',
			'slug'               => 'duplicate-post',
			'source'             => 'https://downloads.wordpress.org/plugin/duplicate-post.3.2.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/duplicate-post'
		),
		array(
			'name'               => 'Relevanssi',
			'slug'               => 'relevanssi',
			'source'             => 'https://downloads.wordpress.org/plugin/relevanssi.3.5.11.1.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/relevanssi'
		),
		array(
			'name'               => 'TinyMCE Advanced',
			'slug'               => 'tinymce-advanced',
			'source'             => 'https://downloads.wordpress.org/plugin/tinymce-advanced.4.6.3.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/tinymce-advanced'
		),
		array(
			'name'               => 'Wordfence Security',
			'slug'               => 'wordfence',
			'source'             => 'https://downloads.wordpress.org/plugin/wordfence.6.3.12.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/wordfence'
		),
		array(
			'name'               => 'WP-Sweep',
			'slug'               => 'wp-sweep',
			'source'             => 'https://downloads.wordpress.org/plugin/wp-sweep.1.0.10.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/wp-sweep'
		),
		array(
			'name'               => 'Yoast SEO',
			'slug'               => 'wordpress-seo',
			'source'             => 'https://downloads.wordpress.org/plugin/wordpress-seo.5.0.1.zip',
			'required'           => true,
			'force_activation'   => true,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/wordpress-seo'
		),


/* ============================== */
/*  Recommended Plugins
/* ============================== */

		array(
			'name'               => 'Advanced Custom Fields',
			'slug'               => 'advanced-custom-fields',
			'source'             => 'https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.11.zip',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => 'https://advancedcustomfields.com'
		),
        array(
            'name'               => 'Akismet',
            'slug'               => 'akismet',
            'source'             => 'https://downloads.wordpress.org/plugin/akismet.3.3.2.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/akismet'
        ),
        array(
            'name'               => 'Asset Queue Manager',
            'slug'               => 'asset-queue-manager',
            'source'             => 'https://downloads.wordpress.org/plugin/asset-queue-manager.1.0.3.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/asset-queue-manager'
        ),
		array(
			'name'               => 'BJ Lazy Load',
			'slug'               => 'bj-lazy-load',
			'source'             => 'https://downloads.wordpress.org/plugin/bj-lazy-load.zip',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/bj-lazy-load'
		),
        array(
            'name'               => 'Breadcrumb NavXT',
            'slug'               => 'breadcrumb-navxt',
            'source'             => 'https://downloads.wordpress.org/plugin/breadcrumb-navxt.5.7.1.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/breadcrumb-navxt'
        ),
        array(
            'name'               => 'Custom User Profile Photo',
            'slug'               => 'custom-user-profile-photo',
            'source'             => 'https://downloads.wordpress.org/plugin/custom-user-profile-photo.0.5.3.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/custom-user-profile-photo'
        ),
        array(
            'name'               => 'Formidable Forms',
            'slug'               => 'formidable',
            'source'             => 'https://downloads.wordpress.org/plugin/formidable.2.03.09.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/formidable'
        ),
        array(
            'name'               => 'Gravitate Event Tracking',
            'slug'               => 'gravitate-event-tracking',
            'source'             => 'https://downloads.wordpress.org/plugin/gravitate-event-tracking.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/gravitate-event-tracking'
        ),
        array(
            'name'               => 'JetPack',
            'slug'               => 'jetpack',
            'source'             => 'https://downloads.wordpress.org/plugin/jetpack.5.1.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/jetpack'
        ),
        array(
            'name'               => 'Menu Image',
            'slug'               => 'menu-image',
            'source'             => 'https://downloads.wordpress.org/plugin/menu-image.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/menu-image'
        ),
        array(
            'name'               => 'Pods',
            'slug'               => 'pods',
            'source'             => 'https://downloads.wordpress.org/plugin/pods.2.6.9.zip',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://wordpress.org/plugins/pods'
        ),
		array(
			'name'               => 'Uber Login Logo',
			'slug'               => 'uber-login-logo',
			'source'             => 'https://downloads.wordpress.org/plugin/uber-login-logo.1.5.1.zip',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => 'https://wordpress.org/plugins/uber-login-logo'
		)
    );


/* ============================== */
/*  Configuration Settings
/* ============================== */

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'The following plugin is required: %1$s.', 'The following plugins are required: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'The following plugin is recommended: %1$s.', 'The following plugins are recommended: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}