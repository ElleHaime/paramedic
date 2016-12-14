<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Chrome_HTTPS_WooCommerce' ) ) : 
class Chrome_HTTPS_WooCommerce { 
	function __construct() { $_SERVER['HTTPS'] = false; } 
} 
new Chrome_HTTPS_WooCommerce; 
endif;
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 1000; /* pixels */

/* INCLUDES */
add_theme_support( 'woocommerce' );

/* Add theme option panel */
require_once('admin/index.php'); // load theme option panel

global $flatsome_opt;
$flatsome_opt = $smof_data;


/************ Plugin recommendations **********/
require_once ('inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'flatsome_register_required_plugins' );
function flatsome_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		array(
			'name'     				=> 'WooCommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/woocommerce.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.1.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Ninja Forms', // The plugin name
			'slug'     				=> 'ninja-forms', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/ninja-forms.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.6.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Regenerate Thumbnails', // The plugin name
			'slug'     				=> 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/regenerate-thumbnails.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.2.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		
		array(
			'name'     				=> 'Taxonomy Metadata', // The plugin name
			'slug'     				=> 'taxonomy-metadata', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/taxonomy-metadata.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Unlimited Sidebars Woosidebars', // The plugin name
			'slug'     				=> 'woosidebars', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/woosidebars.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Envato Toolkit', // The plugin name
			'slug'     				=> 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.6.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'YITH WooCommerce Ajax Search', // The plugin name
			'slug'     				=> 'yith-woocommerce-ajax-search', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/yith-woocommerce-ajax-search.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
			array(
			'name'     				=> 'YITH WooCommerce Wishlist', // The plugin name
			'slug'     				=> 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/yith-woocommerce-wishlist.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
			array(
			'name'     				=> 'UX Featured Item Post Type', // The plugin name
			'slug'     				=> 'ux-featured-item', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/ux-featured-item.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
			array(
			'name'     				=> 'Nextend Facebook Connect', // The plugin name
			'slug'     				=> 'nextend-facebook-connect', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/nextend-facebook-connect.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.4.59', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'flatsome',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', '' ),
			'menu_title'                       			=> __( 'Install Plugins', 'flatsome' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'flatsome' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'flatsome' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'flatsome' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'flatsome' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'flatsome' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}


if ( ! function_exists( 'flatsome_setup' ) ) :
function flatsome_setup() {

	/* Custom CSS */
	require( get_template_directory() . '/inc/custom-css.php' );

	/* Custom template tags */
	require( get_template_directory() . '/inc/template-tags.php' );

	/*  Custom functions that act independently of the theme templates */
	require( get_template_directory() . '/inc/extras.php' );



	/* load theme languages */
	load_theme_textdomain( 'flatsome', get_template_directory() . '/languages' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Add support for post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/*  Registrer menus. */
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'flatsome' ),
		'footer' => __( 'Footer Menu', 'flatsome' ),
		'top_bar_nav' => __( 'Top bar Menu', 'flatsome' ),
		'my_account' => __( 'My Account Menu', 'flatsome' ),
	) );

	/*  Enable support for Post Formats */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // flatsome_setup
add_action( 'after_setup_theme', 'flatsome_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function flatsome_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'flatsome' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div class="tx-div small"></div>',
	) );


	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'flatsome' ),
		'id'            => 'shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title shop-sidebar">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Sidebar', 'flatsome' ),
		'id'            => 'product-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title shop-sidebar">',
		'after_title'   => '</h3>',
	) );


	 register_sidebar( array(
		'name'          => __( 'Footer 1 (4 column)', 'flatsome' ),
		'id'            => 'sidebar-footer-1',
		'before_widget' => '<div id="%1$s" class="large-3 columns widget left %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div class="tx-div small"></div>',
	) );


	 register_sidebar( array(
		'name'          => __( 'Footer 2 (4 column)', 'flatsome' ),
		'id'            => 'sidebar-footer-2',
		'before_widget' => '<div id="%1$s" class="large-3 columns widget left %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div class="tx-div small"></div>',
	) );


}
add_action( 'widgets_init', 'flatsome_widgets_init' );


/* INCLUDE FLATSOME WIDGETS */
include_once('inc/widgets/recent-posts.php'); // Load Widget Recent Posts
include_once('inc/widgets/upsell-widget.php'); // Load Upsell widget

/**
 * Enqueue scripts and styles
 */
function flatsome_scripts() {
	
	global $flatsome_opt;

	/* styles */
	wp_enqueue_style( 'flatsome-icons', get_template_directory_uri() .'/css/fonts.css', array(), '1.9.9.2', 'all' );
	wp_enqueue_style( 'flatsome-animations', get_template_directory_uri() .'/css/animations.css', array(), '1.9.9.2', 'all' );

	/* main style */
	wp_enqueue_style( 'flatsome-style', get_stylesheet_uri(), array(), '1.9.9.2', 'all');	

	/* JS libaries */
	wp_enqueue_script( 'flatsome-modernizer', get_template_directory_uri() .'/js/modernizr.js?v=1.9.9.2', array( 'jquery' ), '20120202', true );
 	wp_enqueue_script( 'flatsome-plugins', get_template_directory_uri() .'/js/plugins.js?v=1.9.9.2', array( 'jquery' ), '20120202', true );
	wp_enqueue_script( 'flatsome-iosslider', get_template_directory_uri() .'/js/jquery.iosslider.min.js?v=1.9.9.2', array( 'jquery' ), '20120202', true );
	wp_enqueue_script( 'flatsome-magnific-popup', get_template_directory_uri() .'/js/jquery.magnific-popup.js?v=1.9.9.2', array( 'jquery' ), '20120202', true );
	wp_enqueue_script( 'flatsome-theme-js', get_template_directory_uri() .'/js/theme.js?v=1.9.9.2', array( 'jquery' ), '20120202', true );
	

	/* Remove styles included plugins have added */
	wp_deregister_style('yith-wcwl-font-awesome');
	wp_deregister_style('yith-wcwl-font-awesome-ie7');
	wp_deregister_style('yith-wcwl-main');
	wp_deregister_style('nextend_fb_connect_stylesheet');
	
	
	if ( ! is_admin() ) {
	wp_deregister_style('woocommerce-layout');	
	wp_deregister_style('woocommerce-smallscreen');	
	wp_deregister_style('woocommerce-general');	
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'flatsome_scripts' );


/* ADD WP ADMIN BAR LINK TO THEME OPTIONS */

// Admin Bar Customisation
function flatsome_admin_bar_render() {
 global $wp_admin_bar;
 // Add a new top level menu link
if (current_user_can( 'manage_options' ) ){
 $optionUrl = get_admin_url().'themes.php?page=optionsframework';
 $blocks_url = get_post_type_archive_link( 'blocks' );
 
 $wp_admin_bar->add_menu( array(
 'parent' => false,
 'id' => 'theme_options',
 'title' => __('Flatsome Theme Options'),
 'href' => $optionUrl
 ));
 /*
 $wp_admin_bar->add_menu( array(
 'parent' => false,
 'id' => 'block_preview',
 'title' => __('UX Blocks Libary'),
 'href' => $blocks_url,
 )); */
}

}
add_action( 'wp_before_admin_bar_render', 'flatsome_admin_bar_render' );


/* UNREGISTRER DEFAULT WOOCOMMERCE HOOKS */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_show_messages', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

if(!$flatsome_opt['coupon_checkout'] || !isset($flatsome_opt['coupon_checkout'])){
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
}

/* add shortcode to widgets */
add_filter('widget_text', 'do_shortcode');

/* add shortcode to excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* add exerpt option to pages */
add_action('init', 'flatsome_post_type_support');
function flatsome_post_type_support() {
	add_post_type_support( 'page', 'excerpt' );
}


/** LOAD GOOGLE FONTS */
include_once( get_template_directory() . '/inc/google-fonts.php' );


/* SHORTCODES */
include_once('inc/shortcodes/accordion.php');
include_once('inc/shortcodes/tabs.php');
include_once('inc/shortcodes/buttons.php');
include_once('inc/shortcodes/grid.php');
include_once('inc/shortcodes/slider.php');
include_once('inc/shortcodes/share_follow.php');
include_once('inc/shortcodes/titles_dividers.php');
include_once('inc/shortcodes/blog_posts.php');
include_once('inc/shortcodes/testimonials.php');
include_once('inc/shortcodes/banners.php');
include_once('inc/shortcodes/google_maps.php');
include_once('inc/shortcodes/product_sliders.php');
include_once('inc/shortcodes/product_lookbook.php');
include_once('inc/shortcodes/product_pinterest_style.php');
include_once('inc/shortcodes/featured_box.php');
include_once('inc/shortcodes/team_members.php');
include_once('inc/shortcodes/messages.php');
include_once('inc/shortcodes/search.php');
include_once('inc/shortcodes/lightbox.php');
include_once('inc/shortcodes/product_flip.php');
include_once('inc/shortcodes/elements.php');
//include_once('inc/shortcodes/icon.php'); (coming soon)


/* SHORTCODE INSERTER */
if(is_admin()){
	include_once('inc/shortcodes/inserter/tinymce.php');
}

/* CUSTOM POST TYPES */
include_once('inc/post-types/blocks.php');

/* ADD CUSTOM WP_EDITOR CSS */
add_filter('mce_css', 'my_editor_style');
function my_editor_style($url) {
  if ( !empty($url) )
    $url .= ',';
  // Change the path here if using sub-directory
  $url .= trailingslashit( get_template_directory_uri() ) . 'css/editor.css';
  return $url;
}


/* ADD IE 8/9 FIX TO HEADER */
function add_ieFix () {
	$ie_css = get_template_directory_uri() .'/css/ie8.css';
    echo '<!--[if lt IE 9]>';
    echo '<link rel="stylesheet" type="text/css" href="'.$ie_css.'">';
    echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo "<script>var head = document.getElementsByTagName('head')[0],style = document.createElement('style');style.type = 'text/css';style.styleSheet.cssText = ':before,:after{content:none !important';head.appendChild(style);setTimeout(function(){head.removeChild(style);}, 0);</script>";
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ieFix');


// Change product pr page if set.
if(isset($flatsome_opt['products_pr_page'])){
	$products = $flatsome_opt['products_pr_page'];
	add_filter( 'loop_shop_per_page', create_function( '$cols', "return $products;" ), 20 );
}


/* Redirect to Homepage when customer log out */
add_filter('logout_url', 'new_logout_url', 10, 2);
function new_logout_url($logouturl, $redir)
{
	$redir = get_option('siteurl');
	return $logouturl . '&amp;redirect_to=' . urlencode($redir);
}


add_action( 'woocommerce_email_after_order_table', 'add_payment_method_to_admin_new_order', 15, 2 );
 
function add_payment_method_to_admin_new_order( $order, $is_admin_email ) {
  if ( $is_admin_email ) {
    echo '<p><strong>Оплата:</strong> ' . $order->payment_method_title . '</p>';
  }
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
$fields['billing']['shipping_address_1'] = array(
    'label'       => __('Способ доставки (Самовывоз/Новая почта)', 'woocommerce'),
    'placeholder' => _x('', 'placeholder', 'woocommerce'),
    'required'    => true,
    'clear'       => false,
    'type'        => 'select',
    'class'       => array('own-css-name'),
    'options'     => array(
'Самовывоз со склада Парамедик' => __('Самовывоз со склада Парамедик', 'woocommerce' ),
'Агрономичное - Отделение №1: ул. Мичурина, 28' => __('Агрономичное - Отделение №1: ул. Мичурина, 28', 'woocommerce' ),
'Акимовка (Запорожская обл.) - Отделение: ул. Патриотов, 10' => __('Акимовка (Запорожская обл.) - Отделение: ул. Патриотов, 10', 'woocommerce' ),
'Александрия (г.Кировогр.обл.райц) - Отделение №1: пл. Кирова, 10' => __('Александрия (г.Кировогр.обл.райц) - Отделение №1: пл. Кирова, 10', 'woocommerce' ),
'Александрия (г.Кировогр.обл.райц) - Отделение № 2 : ул. Диброви, 16' => __('Александрия (г.Кировогр.обл.райц) - Отделение № 2 : ул. Диброви, 16', 'woocommerce' ),
'Александрия (г.Кировогр.обл.райц) - Отделение №3: просп. Ленина, 111' => __('Александрия (г.Кировогр.обл.райц) - Отделение №3: просп. Ленина, 111', 'woocommerce' ),
'Александровка (пгт.Кировог.обл.райц) - Отделение №1: ул. Ленина, 106' => __('Александровка (пгт.Кировог.обл.райц) - Отделение №1: ул. Ленина, 106', 'woocommerce' ),
'Ананьев - Отделение: ул. Независимости, 19' => __('Ананьев - Отделение: ул. Независимости, 19', 'woocommerce' ),
'Андреевка (Харьков) - Отделение №1: ул. Ленина, 5а' => __('Андреевка (Харьков) - Отделение №1: ул. Ленина, 5а', 'woocommerce' ),
'Андрушевка - Отделение: ул. Ивана Франка, 67' => __('Андрушевка - Отделение: ул. Ивана Франка, 67', 'woocommerce' ),
'Апостолово - Отделение: ул. Каманина, 1д' => __('Апостолово - Отделение: ул. Каманина, 1д', 'woocommerce' ),
'Арбузинка - Отделение №1: ул. Набережная, 170' => __('Арбузинка - Отделение №1: ул. Набережная, 170', 'woocommerce' ),
'Артемовск (Донецкая обл.) - Отделение: ул. Горбатова, 69' => __('Артемовск (Донецкая обл.) - Отделение: ул. Горбатова, 69', 'woocommerce' ),
'Артемовск (Донецкая обл.) - Отделение №2 : ул. Чайковского, 41' => __('Артемовск (Донецкая обл.) - Отделение №2 : ул. Чайковского, 41', 'woocommerce' ),
'Арциз - Отделение: ул. 28 июля, 97' => __('Арциз - Отделение: ул. 28 июля, 97', 'woocommerce' ),
'Атюша - Отделение № 1:ул. Ленина, 83' => __('Атюша - Отделение № 1:ул. Ленина, 83', 'woocommerce' ),
'Аулы - Отделение №1: ул. Дзержинского, 20' => __('Аулы - Отделение №1: ул. Дзержинского, 20', 'woocommerce' ),
'Ахтырка - Отделение №1: пров. Миру, 2' => __('Ахтырка - Отделение №1: пров. Миру, 2', 'woocommerce' ),
'Ахтырка - Отделение № 2 : ул. Октябрьская, 18' => __('Ахтырка - Отделение № 2 : ул. Октябрьская, 18', 'woocommerce' ),
'Балабино - Отделение №1: ул. Урицкого, 17' => __('Балабино - Отделение №1: ул. Урицкого, 17', 'woocommerce' ),
'Балаклея (Харьков) - Отделение №1: ул. 8-го Марта, 3б' => __('Балаклея (Харьков) - Отделение №1: ул. 8-го Марта, 3б', 'woocommerce' ),
'Балаклея (Черкассы) - Отделение №1: ул. Ленина, 99' => __('Балаклея (Черкассы) - Отделение №1: ул. Ленина, 99', 'woocommerce' ),
'Балта - Отделение: ул. Ломоносова, 24а' => __('Балта - Отделение: ул. Ломоносова, 24а', 'woocommerce' ),
'Бар - Отделение: ул. Октябрьской Революции, 14' => __('Бар - Отделение: ул. Октябрьской Революции, 14', 'woocommerce' ),
'Барановка - Отделение №1: ул. Дзержинского, 28' => __('Барановка - Отделение №1: ул. Дзержинского, 28', 'woocommerce' ),
'Барвенково - Отделение №1: ул. Первомайская, 6б' => __('Барвенково - Отделение №1: ул. Первомайская, 6б', 'woocommerce' ),
'Барышевка - Отделение: ул. Октябрьская, 69 (маг. "Павлуша" (ПашаМото)' => __('Барышевка - Отделение: ул. Октябрьская, 69 (маг. "Павлуша" (ПашаМото)', 'woocommerce' ),
'Бахмач - Отделение: ул. Ярослава Мудрого, 24' => __('Бахмач - Отделение: ул. Ярослава Мудрого, 24', 'woocommerce' ),
'Баштанка - Отделение: ул. Театральная, 1' => __('Баштанка - Отделение: ул. Театральная, 1', 'woocommerce' ),
'Безлюдовка - Отделение №1: ул. Змеевская, 68а' => __('Безлюдовка - Отделение №1: ул. Змеевская, 68а', 'woocommerce' ),
'Белая Церковь - Отделение №1: ул. 1-ая Совхозная, 5' => __('Белая Церковь - Отделение №1: ул. 1-ая Совхозная, 5', 'woocommerce' ),
'Белая Церковь - Отделение №2: ул. Вокзальная, 22' => __('Белая Церковь - Отделение №2: ул. Вокзальная, 22', 'woocommerce' ),
'Белая Церковь - Отделение №3 : ул. Леваневского, 47/1' => __('Белая Церковь - Отделение №3 : ул. Леваневского, 47/1', 'woocommerce' ),
'Белая Церковь - Отделение №4 (до 30 кг а одно место): бул. Первого Мая, 44' => __('Белая Церковь - Отделение №4 (до 30 кг а одно место): бул. Первого Мая, 44', 'woocommerce' ),
'Белая Церковь - Отделение №5 : бул. 50-летия Победы, 86' => __('Белая Церковь - Отделение №5 : бул. 50-летия Победы, 86', 'woocommerce' ),
'Белая Церковь - Отделение №6: ул. Заярская, 1' => __('Белая Церковь - Отделение №6: ул. Заярская, 1', 'woocommerce' ),
'Белгород-Днестровский - Отделение №1: ул. Победи, 11а' => __('Белгород-Днестровский - Отделение №1: ул. Победи, 11а', 'woocommerce' ),
'Белгород-Днестровский - Отделение №2 : ул. Дзержинского, 54' => __('Белгород-Днестровский - Отделение №2 : ул. Дзержинского, 54', 'woocommerce' ),
'Белз - Отделение №1: ул. Савенко, 8' => __('Белз - Отделение №1: ул. Савенко, 8', 'woocommerce' ),
'Белики - Отделение: ул. Привокзальная, 16' => __('Белики - Отделение: ул. Привокзальная, 16', 'woocommerce' ),
'Белицкое - Отделение: ул. Донецкая, 14' => __('Белицкое - Отделение: ул. Донецкая, 14', 'woocommerce' ),
'Белки - Отделение №1: ул. Центральная, б/н' => __('Белки - Отделение №1: ул. Центральная, б/н', 'woocommerce' ),
'Беловодск - Отделение №1: ул. Ленина, 206 а' => __('Беловодск - Отделение №1: ул. Ленина, 206 а', 'woocommerce' ),
'Белогородка - Отделение №1: ул. Калинина, 2' => __('Белогородка - Отделение №1: ул. Калинина, 2', 'woocommerce' ),
'Белогорье - Отделение №1: ул. Шевченка, 72а' => __('Белогорье - Отделение №1: ул. Шевченка, 72а', 'woocommerce' ),
'Белозерка (Херсонская обл.) - Отделение №1: ул. Карла Маркса, 98' => __('Белозерка (Херсонская обл.) - Отделение №1: ул. Карла Маркса, 98', 'woocommerce' ),
'Белозерье - Отделение №1: ул. Дзержинского, 64' => __('Белозерье - Отделение №1: ул. Дзержинского, 64', 'woocommerce' ),
'Белозёрское (Донецкая обл.) - Отделение №1: ул. Московская, 5' => __('Белозёрское (Донецкая обл.) - Отделение №1: ул. Московская, 5', 'woocommerce' ),
'Белокуракино - Отделение №1: ул. Переездная, 27а' => __('Белокуракино - Отделение №1: ул. Переездная, 27а', 'woocommerce' ),
'Белолуцк - Отделение №1: ул. 1-го Мая, 14' => __('Белолуцк - Отделение №1: ул. 1-го Мая, 14', 'woocommerce' ),
'Белополье - Отделение №1: ул. Ленина, 64а' => __('Белополье - Отделение №1: ул. Ленина, 64а', 'woocommerce' ),
'Беляевка - Отделение: ул. Костина, 9' => __('Беляевка - Отделение: ул. Костина, 9', 'woocommerce' ),
'Бердичев - Отделение №1: ул. Железнодорожная, 14' => __('Бердичев - Отделение №1: ул. Железнодорожная, 14', 'woocommerce' ),
'Бердичев - Отделение № 2: ул. Богунская, 3' => __('Бердичев - Отделение № 2: ул. Богунская, 3', 'woocommerce' ),
'Бердичев - Отделение №3: ул. К.Либкнехта, 56' => __('Бердичев - Отделение №3: ул. К.Либкнехта, 56', 'woocommerce' ),
'Бердичев - Отделение №4: ул. Соборная, 20' => __('Бердичев - Отделение №4: ул. Соборная, 20', 'woocommerce' ),
'Бердичев - Отделение №5: ул. Котляревского, 2б' => __('Бердичев - Отделение №5: ул. Котляревского, 2б', 'woocommerce' ),
'Бердянск - Отделение №1: ул. Юннатов, 10' => __('Бердянск - Отделение №1: ул. Юннатов, 10', 'woocommerce' ),
'Бердянск - Отделение № 2 : ул. К. Маркса, 51' => __('Бердянск - Отделение № 2 : ул. К. Маркса, 51', 'woocommerce' ),
'Бердянск - Отделение №3: ул, Шевченко, 71' => __('Бердянск - Отделение №3: ул, Шевченко, 71', 'woocommerce' ),
'Бердянск - Отделение № 4 : ул. Пионерская, 51' => __('Бердянск - Отделение № 4 : ул. Пионерская, 51', 'woocommerce' ),
'Берегово - Отделение № 1: ул. Богдана Хмельницкого, 43' => __('Берегово - Отделение № 1: ул. Богдана Хмельницкого, 43', 'woocommerce' ),
'Берегомет - Отделение №1: ул. Кобылянская, 2' => __('Берегомет - Отделение №1: ул. Кобылянская, 2', 'woocommerce' ),
'Бережаны - Отделение: ул. И. Франка, 2' => __('Бережаны - Отделение: ул. И. Франка, 2', 'woocommerce' ),
'Березанка - Отделение №1: ул. Суворова, 62' => __('Березанка - Отделение №1: ул. Суворова, 62', 'woocommerce' ),
'Березань - Отделение №1: ул. Ленина, 157' => __('Березань - Отделение №1: ул. Ленина, 157', 'woocommerce' ),
'Березна (Черниговская обл.) - Отделение № 1: ул. Советская, 13' => __('Березна (Черниговская обл.) - Отделение № 1: ул. Советская, 13', 'woocommerce' ),
'Березнеговатое - Отделение №1: ул. Чехова, 22/1' => __('Березнеговатое - Отделение №1: ул. Чехова, 22/1', 'woocommerce' ),
'Березно - Отделение №1: ул. И. Франка, 2 а (ТЦ Гранд)' => __('Березно - Отделение №1: ул. И. Франка, 2 а (ТЦ Гранд)', 'woocommerce' ),
'Березовка - Отделение №1: ул., Шевченка, 35' => __('Березовка - Отделение №1: ул., Шевченка, 35', 'woocommerce' ),
'Берестечко - Отделение №1: ул. Независимости, 1' => __('Берестечко - Отделение №1: ул. Независимости, 1', 'woocommerce' ),
'Берислав (Херсонская обл.) - Отделение №1: ул. Ленина, 224' => __('Берислав (Херсонская обл.) - Отделение №1: ул. Ленина, 224', 'woocommerce' ),
'Бершадь - Отделение: ул. Красноармейская, 13а' => __('Бершадь - Отделение: ул. Красноармейская, 13а', 'woocommerce' ),
'Благовещенка - Отделение №1: ул. Кирова, 87' => __('Благовещенка - Отделение №1: ул. Кирова, 87', 'woocommerce' ),
'Близнецы - Отделение №1: ул. Комсомольская, 27' => __('Близнецы - Отделение №1: ул. Комсомольская, 27', 'woocommerce' ),
'Бобринец - Отделение №1: ул. 16 марта, 68 (вход с ул. Орджоникидзе)' => __('Бобринец - Отделение №1: ул. 16 марта, 68 (вход с ул. Орджоникидзе)', 'woocommerce' ),
'Бобрка - Отделение №1: ул. Слюсарская, 1' => __('Бобрка - Отделение №1: ул. Слюсарская, 1', 'woocommerce' ),
'Бобровица - Отделение: ул. Независимости, 65а (помещение дома "Быта")' => __('Бобровица - Отделение: ул. Независимости, 65а (помещение дома "Быта")', 'woocommerce' ),
'Богдановка (Кировоградская обл.) - Отделение № 1: ул. Мира, 8/3' => __('Богдановка (Кировоградская обл.) - Отделение № 1: ул. Мира, 8/3', 'woocommerce' ),
'Богодухов - Отделение: ул. Шевченко, 10' => __('Богодухов - Отделение: ул. Шевченко, 10', 'woocommerce' ),
'Богуслав (Киевская обл.) - Отделение: ул. Франко, 21' => __('Богуслав (Киевская обл.) - Отделение: ул. Франко, 21', 'woocommerce' ),
'Болград (Измаил) - Отделение: просп. Ленина, 85' => __('Болград (Измаил) - Отделение: просп. Ленина, 85', 'woocommerce' ),
'Болехов - Отделение: ул. Петрушевича, 4' => __('Болехов - Отделение: ул. Петрушевича, 4', 'woocommerce' ),
'Борзна - Отделение №1: ул. Палия Семена, 12в' => __('Борзна - Отделение №1: ул. Палия Семена, 12в', 'woocommerce' ),
'Борислав (Львовская обл.) - Отделение №1: ул. Ковалива, 4' => __('Борислав (Львовская обл.) - Отделение №1: ул. Ковалива, 4', 'woocommerce' ),
'Борисполь - Отделение №1: ул. Привокзальная, 21' => __('Борисполь - Отделение №1: ул. Привокзальная, 21', 'woocommerce' ),
'Борисполь - Отделение №2: ул. Киевский Шлях, 69в' => __('Борисполь - Отделение №2: ул. Киевский Шлях, 69в', 'woocommerce' ),
'Борисполь - Отделение №3 : с. Мартусовка, ул. Моисеева, 70' => __('Борисполь - Отделение №3 : с. Мартусовка, ул. Моисеева, 70', 'woocommerce' ),
'Борисполь - Отделение №4 : ул. Головатого, 20' => __('Борисполь - Отделение №4 : ул. Головатого, 20', 'woocommerce' ),
'Боровая (Киев) - Отделение №1: ул. Театральная, 17а' => __('Боровая (Киев) - Отделение №1: ул. Театральная, 17а', 'woocommerce' ),
'Боровая (Харьков) - Отделение №1: ул. Мира, 40 а' => __('Боровая (Харьков) - Отделение №1: ул. Мира, 40 а', 'woocommerce' ),
'Бородянка - Отделение №1: ул. Ленина, 248/1' => __('Бородянка - Отделение №1: ул. Ленина, 248/1', 'woocommerce' ),
'Боромля - Отделение №1: ул. Кутузова, 1' => __('Боромля - Отделение №1: ул. Кутузова, 1', 'woocommerce' ),
'Борщев - Отделение №1: ул. М.Кривоноса, 2' => __('Борщев - Отделение №1: ул. М.Кривоноса, 2', 'woocommerce' ),
'Бояны - Отделение №1: ул. Главная, 75а' => __('Бояны - Отделение №1: ул. Главная, 75а', 'woocommerce' ),
'Боярка - Отделение № 1: ул. Шевченка, 193' => __('Боярка - Отделение № 1: ул. Шевченка, 193', 'woocommerce' ),
'Боярка - Отделение № 2 : ул. Богдана Хмельницкого, 98' => __('Боярка - Отделение № 2 : ул. Богдана Хмельницкого, 98', 'woocommerce' ),
'Братское - Отделение №1: ул. Ленина, 73' => __('Братское - Отделение №1: ул. Ленина, 73', 'woocommerce' ),
'Брацлав - Отделение №1: ул. Энгельса, 5' => __('Брацлав - Отделение №1: ул. Энгельса, 5', 'woocommerce' ),
'Брилевка - Отделение №1: ул. Больничная, 1а' => __('Брилевка - Отделение №1: ул. Больничная, 1а', 'woocommerce' ),
'Бровары - Отделение №1: ул. Кутузова, 125' => __('Бровары - Отделение №1: ул. Кутузова, 125', 'woocommerce' ),
'Бровары - Отделение №2: ул. Киевская, 302' => __('Бровары - Отделение №2: ул. Киевская, 302', 'woocommerce' ),
'Бровары - Отделение №3: бульв. Независимости, 16 а' => __('Бровары - Отделение №3: бульв. Независимости, 16 а', 'woocommerce' ),
'Бровары - Отделение №4 : ул. Грушевского, 9/1' => __('Бровары - Отделение №4 : ул. Грушевского, 9/1', 'woocommerce' ),
'Бровары - Отделение № 5 : ул. Шевченко, 4а' => __('Бровары - Отделение № 5 : ул. Шевченко, 4а', 'woocommerce' ),
'Броды - Отделение: ул. Леси Украинки, 55' => __('Броды - Отделение: ул. Леси Украинки, 55', 'woocommerce' ),
'Брошнев-Осада - Отделение №1: ул. 22 Января, 82' => __('Брошнев-Осада - Отделение №1: ул. 22 Января, 82', 'woocommerce' ),
'Брусилов - Отделение №1: ул. 1 мая, 47 а' => __('Брусилов - Отделение №1: ул. 1 мая, 47 а', 'woocommerce' ),
'Брюховичи - Отделение №1: ул. Сухомлинского, 2' => __('Брюховичи - Отделение №1: ул. Сухомлинского, 2', 'woocommerce' ),
'Бурынь - Отделение № 1: пл. Первомайская, 1' => __('Бурынь - Отделение № 1: пл. Первомайская, 1', 'woocommerce' ),
'Буск - Отделение: ул. Буского братства, 9' => __('Буск - Отделение: ул. Буского братства, 9', 'woocommerce' ),
'Буча - Отделение №1: ул. Горького, 8' => __('Буча - Отделение №1: ул. Горького, 8', 'woocommerce' ),
'Бучач - Отделение №1: ул. Шухевича, 28' => __('Бучач - Отделение №1: ул. Шухевича, 28', 'woocommerce' ),
'Валки - Отделение №1: ул. Либкнехта Карла, 11а' => __('Валки - Отделение №1: ул. Либкнехта Карла, 11а', 'woocommerce' ),
'Вапнярка - Отделение №1: ул. Ленина, 221д' => __('Вапнярка - Отделение №1: ул. Ленина, 221д', 'woocommerce' ),
'Варва - Отделение №1: ул. Мира, 26' => __('Варва - Отделение №1: ул. Мира, 26', 'woocommerce' ),
'Васильевка (Запорожская обл.) - Отделение №1: ул. Ленина, 2а' => __('Васильевка (Запорожская обл.) - Отделение №1: ул. Ленина, 2а', 'woocommerce' ),
'Васильков - Отделение № 1: ул. Чехова, 3а (территория МРЭО ГАИ)' => __('Васильков - Отделение № 1: ул. Чехова, 3а (территория МРЭО ГАИ)', 'woocommerce' ),
'Васильков - Отделение № 2 : ул. Грушевского, 10' => __('Васильков - Отделение № 2 : ул. Грушевского, 10', 'woocommerce' ),
'Васильковка (Днепропетровская обл.) - Отделение №1: ул. Комунальный, 12 б' => __('Васильковка (Днепропетровская обл.) - Отделение №1: ул. Комунальный, 12 б', 'woocommerce' ),
'Ватутино - Отделение №1: ул. Юбилейная, 25' => __('Ватутино - Отделение №1: ул. Юбилейная, 25', 'woocommerce' ),
'Вашковцы - Отделение №1: ул. Соборная, 2в' => __('Вашковцы - Отделение №1: ул. Соборная, 2в', 'woocommerce' ),
'Великая Александровка (Херсонская обл.) - Отделение: ул. Ленина, 107' => __('Великая Александровка (Херсонская обл.) - Отделение: ул. Ленина, 107', 'woocommerce' ),
'Великая Багачка - Отделение №1: ул. Шевченка, 95' => __('Великая Багачка - Отделение №1: ул. Шевченка, 95', 'woocommerce' ),
'Великая Виска - Отделение №1: просп. Ленина, 46' => __('Великая Виска - Отделение №1: просп. Ленина, 46', 'woocommerce' ),
'Великая Дымерка - Отделение №1: ул. Ленина, 15б' => __('Великая Дымерка - Отделение №1: ул. Ленина, 15б', 'woocommerce' ),
'Великая Лепетиха - Отделение №1: ул. Чкалова, 25' => __('Великая Лепетиха - Отделение №1: ул. Чкалова, 25', 'woocommerce' ),
'Великая Михайловка - Отделение: ул. Ленина, 105' => __('Великая Михайловка - Отделение: ул. Ленина, 105', 'woocommerce' ),
'Великая Новоселка - Отделение №1: ул. Гагарина,22' => __('Великая Новоселка - Отделение №1: ул. Гагарина,22', 'woocommerce' ),
'Великая Писаревка - Отделение: ул. Борцов Революции, 23' => __('Великая Писаревка - Отделение: ул. Борцов Революции, 23', 'woocommerce' ),
'Великие Копани - Отделение: ул. Советская, 12' => __('Великие Копани - Отделение: ул. Советская, 12', 'woocommerce' ),
'Великие Крынки (Глобинский р-н) - Отделение № 1: ул. Ленина, 46' => __('Великие Крынки (Глобинский р-н) - Отделение № 1: ул. Ленина, 46', 'woocommerce' ),
'Великие Лучки - Отделение №1: площадь Освобождения, 6' => __('Великие Лучки - Отделение №1: площадь Освобождения, 6', 'woocommerce' ),
'Великие Мосты - Отделение №1: ул. Сагайдачного, 47' => __('Великие Мосты - Отделение №1: ул. Сагайдачного, 47', 'woocommerce' ),
'Великие Сорочинцы - Отделение № 1: ул. Гоголя, 26' => __('Великие Сорочинцы - Отделение № 1: ул. Гоголя, 26', 'woocommerce' ),
'Великий Березный - Отделение: ул. Штефаника, 3' => __('Великий Березный - Отделение: ул. Штефаника, 3', 'woocommerce' ),
'Великий Бурлук - Отделение: ул. Советская, 36 а' => __('Великий Бурлук - Отделение: ул. Советская, 36 а', 'woocommerce' ),
'Великий Бычков - Отделение №1: ул. Полевая, 14' => __('Великий Бычков - Отделение №1: ул. Полевая, 14', 'woocommerce' ),
'Великодолинское - Отделение №1: ул. Ленина, 103' => __('Великодолинское - Отделение №1: ул. Ленина, 103', 'woocommerce' ),
'Верхнеднепровск - Отделение №1: ул. Театральная, 27' => __('Верхнеднепровск - Отделение №1: ул. Театральная, 27', 'woocommerce' ),
'Верхний Рогачик - Отделение: пер. Почтовый, 4/4.' => __('Верхний Рогачик - Отделение: пер. Почтовый, 4/4.', 'woocommerce' ),
'Верхняя Сироватка - Отделение № 1: ул. Площадь Гагарина, 8а' => __('Верхняя Сироватка - Отделение № 1: ул. Площадь Гагарина, 8а', 'woocommerce' ),
'Верховина - Отделение №1: ул. Ивана Франка, 107а' => __('Верховина - Отделение №1: ул. Ивана Франка, 107а', 'woocommerce' ),
'Верховцево - Отделение: ул. Ленина, 73а' => __('Верховцево - Отделение: ул. Ленина, 73а', 'woocommerce' ),
'Веселиново - Отделение №1: ул. Леніна, 30' => __('Веселиново - Отделение №1: ул. Леніна, 30', 'woocommerce' ),
'Веселое - Отделение №1: ул. Московская, 21' => __('Веселое - Отделение №1: ул. Московская, 21', 'woocommerce' ),
'Вижница - Отделение №1: ул. Украинская, 87' => __('Вижница - Отделение №1: ул. Украинская, 87', 'woocommerce' ),
'Вийтовка - Отделение № 1: ул. Ленина, 32а' => __('Вийтовка - Отделение № 1: ул. Ленина, 32а', 'woocommerce' ),
'Вилково - Отделение №1: ул. Ленина, 29' => __('Вилково - Отделение №1: ул. Ленина, 29', 'woocommerce' ),
'Винница - Отделение №1: ул. Глеба Успенского, 91' => __('Винница - Отделение №1: ул. Глеба Успенского, 91', 'woocommerce' ),
'Винница - Отделение №2: ул. Липовецкая, 6а (ТЦ «Виват»)' => __('Винница - Отделение №2: ул. Липовецкая, 6а (ТЦ «Виват»)', 'woocommerce' ),
'Винница - Отделение №3: ул. Хлебная, 19' => __('Винница - Отделение №3: ул. Хлебная, 19', 'woocommerce' ),
'Винница - Отделение №4: ул. Фурманова, 28' => __('Винница - Отделение №4: ул. Фурманова, 28', 'woocommerce' ),
'Винница - Отделение №5: ул. Келецкая, 83' => __('Винница - Отделение №5: ул. Келецкая, 83', 'woocommerce' ),
'Винница - Отделение №6 : ул. Зодчих, 10' => __('Винница - Отделение №6 : ул. Зодчих, 10', 'woocommerce' ),
'Винница - Отделение № 7: ул. 600-летия, 50' => __('Винница - Отделение № 7: ул. 600-летия, 50', 'woocommerce' ),
'Винница - Отделение №8: ул. Пушкина, 10' => __('Винница - Отделение №8: ул. Пушкина, 10', 'woocommerce' ),
'Винница - Отделение №9: просп. Коцюбинского, 32' => __('Винница - Отделение №9: просп. Коцюбинского, 32', 'woocommerce' ),
'Винница - Отделение №10: Хмельницкое шоссе, 82' => __('Винница - Отделение №10: Хмельницкое шоссе, 82', 'woocommerce' ),
'Винница - Отделение №11: ул. Фрунзе, 58' => __('Винница - Отделение №11: ул. Фрунзе, 58', 'woocommerce' ),
'Винница - Отделение №12: ул. Пирогова, 31' => __('Винница - Отделение №12: ул. Пирогова, 31', 'woocommerce' ),
'Винница - Отделение №13: ул. Грибоедова, 3' => __('Винница - Отделение №13: ул. Грибоедова, 3', 'woocommerce' ),
'Винница - Отделение №14: Сабаровское шоссе, 1б/2д' => __('Винница - Отделение №14: Сабаровское шоссе, 1б/2д', 'woocommerce' ),
'Винница - Отделение №15: ул. Данила Нечая, 77а' => __('Винница - Отделение №15: ул. Данила Нечая, 77а', 'woocommerce' ),
'Винница - Отделение № 16: просп. Коцюбинского, 70, (ТЦ "ПетроЦентр")' => __('Винница - Отделение № 16: просп. Коцюбинского, 70, (ТЦ "ПетроЦентр")', 'woocommerce' ),
'Виноградов - Отделение: ул. И. Франка, 110' => __('Виноградов - Отделение: ул. И. Франка, 110', 'woocommerce' ),
'Виньковцы - Отделение №1: ул. Гагарина, 7а' => __('Виньковцы - Отделение №1: ул. Гагарина, 7а', 'woocommerce' ),
'Вишневец - Отделение №1: ул. Майдан Шевченко, 18' => __('Вишневец - Отделение №1: ул. Майдан Шевченко, 18', 'woocommerce' ),
'Вишневое - Отделение №1: ул. Киевская, 27' => __('Вишневое - Отделение №1: ул. Киевская, 27', 'woocommerce' ),
'Вишневое - Отделение №2 : ул. Леси Украинки, 19' => __('Вишневое - Отделение №2 : ул. Леси Украинки, 19', 'woocommerce' ),
'Вишневое - Отделение №3: ул. Ленина, 21а (Соф. Борщаговка)' => __('Вишневое - Отделение №3: ул. Ленина, 21а (Соф. Борщаговка)', 'woocommerce' ),
'Вишневое - Отделение №4: с. Софиевская Борщаговка, ул. Л. Украинки, 11 (ЖК София)' => __('Вишневое - Отделение №4: с. Софиевская Борщаговка, ул. Л. Украинки, 11 (ЖК София)', 'woocommerce' ),
'Вишневое - Отделение №5: ул. Первомайская, 10' => __('Вишневое - Отделение №5: ул. Первомайская, 10', 'woocommerce' ),
'Владимир-Волынский - Отделение №1: ул. 20-го июля, 8 а' => __('Владимир-Волынский - Отделение №1: ул. 20-го июля, 8 а', 'woocommerce' ),
'Владимир-Волынский - Отделение №2 : ул. Ковельская, 132/1' => __('Владимир-Волынский - Отделение №2 : ул. Ковельская, 132/1', 'woocommerce' ),
'Владимирец - Отделение №1: ул. Полесская, 1в' => __('Владимирец - Отделение №1: ул. Полесская, 1в', 'woocommerce' ),
'Владимировка (Донецкая обл.) - Отделение №1: ул. Симоненко, 17' => __('Владимировка (Донецкая обл.) - Отделение №1: ул. Симоненко, 17', 'woocommerce' ),
'Вознесенск - Отделение №1: просп. Октябрьской революции, 281а/4' => __('Вознесенск - Отделение №1: просп. Октябрьской революции, 281а/4', 'woocommerce' ),
'Вознесенск - Отделение №2: просп. Кирова, 16/6' => __('Вознесенск - Отделение №2: просп. Кирова, 16/6', 'woocommerce' ),
'Волноваха - Отделение №1: ул. Юбилейная, 4' => __('Волноваха - Отделение №1: ул. Юбилейная, 4', 'woocommerce' ),
'Воловец - Отделение №1: ул. Карпатская, 100' => __('Воловец - Отделение №1: ул. Карпатская, 100', 'woocommerce' ),
'Володарка - Отделение №1: ул. Коцюбинского, 29' => __('Володарка - Отделение №1: ул. Коцюбинского, 29', 'woocommerce' ),
'Володарск-Волынский - Отделение №1: ул. Чапаева, 18' => __('Володарск-Волынский - Отделение №1: ул. Чапаева, 18', 'woocommerce' ),
'Володарское - Отделение №1: ул. Ленина, 83а' => __('Володарское - Отделение №1: ул. Ленина, 83а', 'woocommerce' ),
'Волока - Отделение №1: ул. Василе Александри, 80а' => __('Волока - Отделение №1: ул. Василе Александри, 80а', 'woocommerce' ),
'Волочиск - Отделение №1: ул. Пушкина, 14а' => __('Волочиск - Отделение №1: ул. Пушкина, 14а', 'woocommerce' ),
'Волчанск - Отделение №1: ул. Дзержинского, 17' => __('Волчанск - Отделение №1: ул. Дзержинского, 17', 'woocommerce' ),
'Вольногорск - Отделение №1: ул. Ленина, 54 (ТРК Альтаир)' => __('Вольногорск - Отделение №1: ул. Ленина, 54 (ТРК Альтаир)', 'woocommerce' ),
'Вольнянск - Отделение №1: ул. Шевченко, 28а' => __('Вольнянск - Отделение №1: ул. Шевченко, 28а', 'woocommerce' ),
'Воронеж - Отделение №1: ул. Пролетарская, 5' => __('Воронеж - Отделение №1: ул. Пролетарская, 5', 'woocommerce' ),
'Вороновица - Отделение №1: ул. Ленина, 23' => __('Вороновица - Отделение №1: ул. Ленина, 23', 'woocommerce' ),
'Врадиевка - Отделение №1: ул. Героев Врадиевщины,162' => __('Врадиевка - Отделение №1: ул. Героев Врадиевщины,162', 'woocommerce' ),
'Выгода (Ивано-Франковская обл) - Отделение №1: ул. Данила Галицкого, 48' => __('Выгода (Ивано-Франковская обл) - Отделение №1: ул. Данила Галицкого, 48', 'woocommerce' ),
'Выгода (Одесская обл) - Отделение №1: ул. 50-ти летия Октября, 49' => __('Выгода (Одесская обл) - Отделение №1: ул. 50-ти летия Октября, 49', 'woocommerce' ),
'Выришальное (Лохвицкий р-н) - Отделение №1: ул. Октябрськая, 25' => __('Выришальное (Лохвицкий р-н) - Отделение №1: ул. Октябрськая, 25', 'woocommerce' ),
'Высокополье - Отделение №1: ул. Красноармейская, 55' => __('Высокополье - Отделение №1: ул. Красноармейская, 55', 'woocommerce' ),
'Вышгород - Отделение №1: ул. Кургузова, 14' => __('Вышгород - Отделение №1: ул. Кургузова, 14', 'woocommerce' ),
'Вышгород - Отделение №2 : ул. Киевская, 2' => __('Вышгород - Отделение №2 : ул. Киевская, 2', 'woocommerce' ),
'Вышково - Отделение №1: ул. Партизанская, 24' => __('Вышково - Отделение №1: ул. Партизанская, 24', 'woocommerce' ),
'Гадяч - Отделение №1: ул. Лохвицкая, 30в' => __('Гадяч - Отделение №1: ул. Лохвицкая, 30в', 'woocommerce' ),
'Гайворон - Отделение №1: ул. Кирова, 3е' => __('Гайворон - Отделение №1: ул. Кирова, 3е', 'woocommerce' ),
'Гайсин - Отделение №1: ул. И. Франка, 30' => __('Гайсин - Отделение №1: ул. И. Франка, 30', 'woocommerce' ),
'Галич - Отделение №1: ул. Коновальца, 4а (напротив Укрпочты)' => __('Галич - Отделение №1: ул. Коновальца, 4а (напротив Укрпочты)', 'woocommerce' ),
'Гвардейское (Днепропетровск) - Отделение №1: ул. Гагирина, 13' => __('Гвардейское (Днепропетровск) - Отделение №1: ул. Гагирина, 13', 'woocommerce' ),
'Геническ - Отделение: ул. Чкалова, 93' => __('Геническ - Отделение: ул. Чкалова, 93', 'woocommerce' ),
'Геническ - Отделение №2 : ул. Братьев Коваленко, 54' => __('Геническ - Отделение №2 : ул. Братьев Коваленко, 54', 'woocommerce' ),
'Герца - Отделение №1: ул. Горького, 12' => __('Герца - Отделение №1: ул. Горького, 12', 'woocommerce' ),
'Глеваха - Отделение №1: ул. Вокзальная, 11' => __('Глеваха - Отделение №1: ул. Вокзальная, 11', 'woocommerce' ),
'Глееватка - Отделение №1: ул. Праздничная, 36' => __('Глееватка - Отделение №1: ул. Праздничная, 36', 'woocommerce' ),
'Глобино - Отделение №1: ул. Октябрьская, 3' => __('Глобино - Отделение №1: ул. Октябрьская, 3', 'woocommerce' ),
'Глухов (Сумская обл.) - Отделение №1: ул. Терещенков, 45' => __('Глухов (Сумская обл.) - Отделение №1: ул. Терещенков, 45', 'woocommerce' ),
'Глуховцы - Отделение №1: ул. Ленина, 9, кв.3' => __('Глуховцы - Отделение №1: ул. Ленина, 9, кв.3', 'woocommerce' ),
'Глыбокая - Отделение №1: ул. Главная, 99' => __('Глыбокая - Отделение №1: ул. Главная, 99', 'woocommerce' ),
'Гнивань - Отделение №1: ул. Ленина, 43' => __('Гнивань - Отделение №1: ул. Ленина, 43', 'woocommerce' ),
'Гоголево - Отделение № 1: ул. Горьева, 17' => __('Гоголево - Отделение № 1: ул. Горьева, 17', 'woocommerce' ),
'Голая Пристань - Отделение №1: ул. 1-го Мая, 3 (возле автовокзала)' => __('Голая Пристань - Отделение №1: ул. 1-го Мая, 3 (возле автовокзала)', 'woocommerce' ),
'Голобы - Отделение №1: ул. Ткача, 19а' => __('Голобы - Отделение №1: ул. Ткача, 19а', 'woocommerce' ),
'Голованевск - Отделение №1: ул. 50 лет Октября, 1' => __('Голованевск - Отделение №1: ул. 50 лет Октября, 1', 'woocommerce' ),
'Головно - Отделение №1: ул. Октябрьская, 3' => __('Головно - Отделение №1: ул. Октябрьская, 3', 'woocommerce' ),
'Голубовка - Отделение №1: ул. Ленина, 5' => __('Голубовка - Отделение №1: ул. Ленина, 5', 'woocommerce' ),
'Горностаевка - Отделение №1: ул. Ленина, 130' => __('Горностаевка - Отделение №1: ул. Ленина, 130', 'woocommerce' ),
'Городенка - Отделение №1: ул. Чупринки, 12/1' => __('Городенка - Отделение №1: ул. Чупринки, 12/1', 'woocommerce' ),
'Городец - Отделение №1: ул. А. Коломойца, 197а' => __('Городец - Отделение №1: ул. А. Коломойца, 197а', 'woocommerce' ),
'Городище (Черкасы) - Отделение №1: ул. Мира, 107а' => __('Городище (Черкасы) - Отделение №1: ул. Мира, 107а', 'woocommerce' ),
'Городковка - Отделение №1: ул. Ленина, 15' => __('Городковка - Отделение №1: ул. Ленина, 15', 'woocommerce' ),
'Городня - Отделение №1: ул. Ленина, 3' => __('Городня - Отделение №1: ул. Ленина, 3', 'woocommerce' ),
'Городок(Львов) - Отделение №1: ул. Львовская, 64' => __('Городок(Львов) - Отделение №1: ул. Львовская, 64', 'woocommerce' ),
'Городок(Хмельницкий) - Отделение: ул. Грушевского, 11' => __('Городок(Хмельницкий) - Отделение: ул. Грушевского, 11', 'woocommerce' ),
'Горохов - Отделение №1: ул. Шевченко, 16б' => __('Горохов - Отделение №1: ул. Шевченко, 16б', 'woocommerce' ),
'Горское - Отделение №1: ул. Советская, 7' => __('Горское - Отделение №1: ул. Советская, 7', 'woocommerce' ),
'Гоща - Отделение №1: ул. А. Колпака, 2а' => __('Гоща - Отделение №1: ул. А. Колпака, 2а', 'woocommerce' ),
'Градижск - Отделение №1: ул. Киевская, 46' => __('Градижск - Отделение №1: ул. Киевская, 46', 'woocommerce' ),
'Гранитное (Житомирская обл.) - Отделение №1: ул. Ленина, 16' => __('Гранитное (Житомирская обл.) - Отделение №1: ул. Ленина, 16', 'woocommerce' ),
'Гребенка (Полтавская обл.) - Отделение №1: переул. Пионерский, 6' => __('Гребенка (Полтавская обл.) - Отделение №1: переул. Пионерский, 6', 'woocommerce' ),
'Гребенки - Отделение №1: ул. 1-го Мая, 43' => __('Гребенки - Отделение №1: ул. 1-го Мая, 43', 'woocommerce' ),
'Грицев - Отделение №1: ул. Терешковой, 3/1' => __('Грицев - Отделение №1: ул. Терешковой, 3/1', 'woocommerce' ),
'Губиниха - Отделение №1: ул. Берегового, 46' => __('Губиниха - Отделение №1: ул. Берегового, 46', 'woocommerce' ),
'Гуляйполе - Отделение №1: ул. Шевченко, 18в' => __('Гуляйполе - Отделение №1: ул. Шевченко, 18в', 'woocommerce' ),
'Гусятин - Отделение №1: ул. Тернопольская, 1' => __('Гусятин - Отделение №1: ул. Тернопольская, 1', 'woocommerce' ),
'Давыдов - Отделение №1: ул. Галицкая, 23а' => __('Давыдов - Отделение №1: ул. Галицкая, 23а', 'woocommerce' ),
'Дашев - Отделение №1: ул. Чкалова, 2г' => __('Дашев - Отделение №1: ул. Чкалова, 2г', 'woocommerce' ),
'Двуречная - Отделение №1: ул. 35-й Гвардийской дивизии, 20' => __('Двуречная - Отделение №1: ул. 35-й Гвардийской дивизии, 20', 'woocommerce' ),
'Демидов - Отделение №1: ул. Киевская, 67' => __('Демидов - Отделение №1: ул. Киевская, 67', 'woocommerce' ),
'Демидовка - Отделение №1: ул. 17-го Сентября, 10' => __('Демидовка - Отделение №1: ул. 17-го Сентября, 10', 'woocommerce' ),
'Деражня - Отделение №1: ул. Проскуровская, 3' => __('Деражня - Отделение №1: ул. Проскуровская, 3', 'woocommerce' ),
'Джулинка - Отделение №1: проул. Аптечный, 1а' => __('Джулинка - Отделение №1: проул. Аптечный, 1а', 'woocommerce' ),
'Джурин - Отделение №1: ул. Смавзюка, 34' => __('Джурин - Отделение №1: ул. Смавзюка, 34', 'woocommerce' ),
'Диканька - Отделение №1: ул. Ленина, 58/1' => __('Диканька - Отделение №1: ул. Ленина, 58/1', 'woocommerce' ),
'Димитров (Донецкая обл.) - Отделение №1: микрорайон Светлий, "Рынок Лидер" 3/1' => __('Димитров (Донецкая обл.) - Отделение №1: микрорайон Светлий, "Рынок Лидер" 3/1', 'woocommerce' ),
'Дмитровка (Знамянcкий р-н Кировоградская обл.) - Отделение №1: пл. Победы, 7' => __('Дмитровка (Знамянcкий р-н Кировоградская обл.) - Отделение №1: пл. Победы, 7', 'woocommerce' ),
'Днепровка (Запорожская обл.) - Отделение №1: пров. Партизанский, 37' => __('Днепровка (Запорожская обл.) - Отделение №1: пров. Партизанский, 37', 'woocommerce' ),
'Днепровское - Отделение №1: ул. Комсомольская, 9' => __('Днепровское - Отделение №1: ул. Комсомольская, 9', 'woocommerce' ),
'Днепродзержинск - Отделение №1: бул. Независимости, 2а' => __('Днепродзержинск - Отделение №1: бул. Независимости, 2а', 'woocommerce' ),
'Днепродзержинск - Отделение №2: ул. Кирова, 12' => __('Днепродзержинск - Отделение №2: ул. Кирова, 12', 'woocommerce' ),
'Днепродзержинск - Отделение №3: просп. Металлургов, 6 б' => __('Днепродзержинск - Отделение №3: просп. Металлургов, 6 б', 'woocommerce' ),
'Днепродзержинск - Отделение №4: просп. Конституции, 30' => __('Днепродзержинск - Отделение №4: просп. Конституции, 30', 'woocommerce' ),
'Днепродзержинск - Отделение № 5: ул. Бойко, 25' => __('Днепродзержинск - Отделение № 5: ул. Бойко, 25', 'woocommerce' ),
'Днепродзержинск - Отделение №6 : просп. Ленина, 70' => __('Днепродзержинск - Отделение №6 : просп. Ленина, 70', 'woocommerce' ),
'Днепродзержинск - Отделение №7 : ул. Сыровца, 6' => __('Днепродзержинск - Отделение №7 : ул. Сыровца, 6', 'woocommerce' ),
'Днепродзержинск - Отделение №8 : просп. Победы, 2б' => __('Днепродзержинск - Отделение №8 : просп. Победы, 2б', 'woocommerce' ),
'Днепродзержинск - Отделение № 10 : просп. Аношкина, 94' => __('Днепродзержинск - Отделение № 10 : просп. Аношкина, 94', 'woocommerce' ),
'Днепропетровск - Отделение №1: ул. Маршала Малиновского, 98а' => __('Днепропетровск - Отделение №1: ул. Маршала Малиновского, 98а', 'woocommerce' ),
'Днепропетровск - Отделение №2: ул. Академика Янгеля, 40' => __('Днепропетровск - Отделение №2: ул. Академика Янгеля, 40', 'woocommerce' ),
'Днепропетровск - Отделение №3: ул. Тверская, 1' => __('Днепропетровск - Отделение №3: ул. Тверская, 1', 'woocommerce' ),
'Днепропетровск - Отделение №4: ул. Ленинградская, 19' => __('Днепропетровск - Отделение №4: ул. Ленинградская, 19', 'woocommerce' ),
'Днепропетровск - Отделение №5 : ул. Плеханова, 5а' => __('Днепропетровск - Отделение №5 : ул. Плеханова, 5а', 'woocommerce' ),
'Днепропетровск - Отделение №6: ул. Ударников, 27' => __('Днепропетровск - Отделение №6: ул. Ударников, 27', 'woocommerce' ),
'Днепропетровск - Отделение №7 : просп. Кирова, 8а' => __('Днепропетровск - Отделение №7 : просп. Кирова, 8а', 'woocommerce' ),
'Днепропетровск - Отделение №8: просп. Гагарина, 112а' => __('Днепропетровск - Отделение №8: просп. Гагарина, 112а', 'woocommerce' ),
'Днепропетровск - Отделение №9 : ул. Шмидта, 4а' => __('Днепропетровск - Отделение №9 : ул. Шмидта, 4а', 'woocommerce' ),
'Днепропетровск - Отделение №10: ул. Газеты "Правда", 91' => __('Днепропетровск - Отделение №10: ул. Газеты "Правда", 91', 'woocommerce' ),
'Днепропетровск - Отделение №11 : просп. Газеты Правды, 6' => __('Днепропетровск - Отделение №11 : просп. Газеты Правды, 6', 'woocommerce' ),
'Днепропетровск - Отделение №12 : жилой массив Комунар, 3а' => __('Днепропетровск - Отделение №12 : жилой массив Комунар, 3а', 'woocommerce' ),
'Днепропетровск - Отделение №13 : просп. Гагарина, 43' => __('Днепропетровск - Отделение №13 : просп. Гагарина, 43', 'woocommerce' ),
'Днепропетровск - Отделение №14: просп. Героев, 33' => __('Днепропетровск - Отделение №14: просп. Героев, 33', 'woocommerce' ),
'Днепропетровск - Отделение №15: просп. Труда, 9' => __('Днепропетровск - Отделение №15: просп. Труда, 9', 'woocommerce' ),
'Днепропетровск - Отделение №16 : пл. Героев Майдана, 1' => __('Днепропетровск - Отделение №16 : пл. Героев Майдана, 1', 'woocommerce' ),
'Днепропетровск - Отделение №17 : Донецкое шоссе, 1' => __('Днепропетровск - Отделение №17 : Донецкое шоссе, 1', 'woocommerce' ),
'Днепропетровск - Отделение №18: ул. Рабочая, 148' => __('Днепропетровск - Отделение №18: ул. Рабочая, 148', 'woocommerce' ),
'Днепропетровск - Отделение №19: ул. Паникахи, 91' => __('Днепропетровск - Отделение №19: ул. Паникахи, 91', 'woocommerce' ),
'Днепропетровск - Отделение №20: ул. Героев Сталинграда, 3' => __('Днепропетровск - Отделение №20: ул. Героев Сталинграда, 3', 'woocommerce' ),
'Днепропетровск - Отделение №21: ул. Фрунзе, 8' => __('Днепропетровск - Отделение №21: ул. Фрунзе, 8', 'woocommerce' ),
'Днепропетровск - Отделение №22 : ул. Тепличная, 21' => __('Днепропетровск - Отделение №22 : ул. Тепличная, 21', 'woocommerce' ),
'Днепропетровск - Отделение №23 : просп. Кирова, 76' => __('Днепропетровск - Отделение №23 : просп. Кирова, 76', 'woocommerce' ),
'Днепропетровск - Отделение №24 : просп. Газеты Правды, 65а' => __('Днепропетровск - Отделение №24 : просп. Газеты Правды, 65а', 'woocommerce' ),
'Днепропетровск - Отделение №25: просп. Пушкина, 3' => __('Днепропетровск - Отделение №25: просп. Пушкина, 3', 'woocommerce' ),
'Днепропетровск - Отделение №26 : просп. Петровского, 36' => __('Днепропетровск - Отделение №26 : просп. Петровского, 36', 'woocommerce' ),
'Днепропетровск - Отделение №27 : ул. Космонавтов,4' => __('Днепропетровск - Отделение №27 : ул. Космонавтов,4', 'woocommerce' ),
'Днепропетровск - Отделение №28: ул. Березинская, 58' => __('Днепропетровск - Отделение №28: ул. Березинская, 58', 'woocommerce' ),
'Днепропетровск - Отделение №29 : ул. Титова, 21' => __('Днепропетровск - Отделение №29 : ул. Титова, 21', 'woocommerce' ),
'Днепропетровск - Отделение №30 : просп. Героев, 3' => __('Днепропетровск - Отделение №30 : просп. Героев, 3', 'woocommerce' ),
'Днепропетровск - Отделение №31: ул. Рабочая, 89' => __('Днепропетровск - Отделение №31: ул. Рабочая, 89', 'woocommerce' ),
'Днепропетровск - Отделение №32: ул. Дзержинского, 10' => __('Днепропетровск - Отделение №32: ул. Дзержинского, 10', 'woocommerce' ),
'Днепропетровск - Отделение №33: пер. Парусный, 19' => __('Днепропетровск - Отделение №33: пер. Парусный, 19', 'woocommerce' ),
'Днепропетровск - Отделение №34: просп. Калинина, 3а' => __('Днепропетровск - Отделение №34: просп. Калинина, 3а', 'woocommerce' ),
'Днепропетровск - Отделение №35 : ул. Кондукторская, 2б (ж/м Северный)' => __('Днепропетровск - Отделение №35 : ул. Кондукторская, 2б (ж/м Северный)', 'woocommerce' ),
'Днепропетровск - Отделение №36: ул. Жуковского, 2е' => __('Днепропетровск - Отделение №36: ул. Жуковского, 2е', 'woocommerce' ),
'Днепропетровск - Отделение №37: ул. Буденного, 29 (ж. м. Западный)' => __('Днепропетровск - Отделение №37: ул. Буденного, 29 (ж. м. Западный)', 'woocommerce' ),
'Днепропетровск - Отделение №38 : ул. Харьковска, 4' => __('Днепропетровск - Отделение №38 : ул. Харьковска, 4', 'woocommerce' ),
'Днепропетровск - Отделение №39 : Запорожское шоссе, 40' => __('Днепропетровск - Отделение №39 : Запорожское шоссе, 40', 'woocommerce' ),
'Днепропетровск - Отделение №40 (до 30кг): ул. Героев Гражданской войны, 17' => __('Днепропетровск - Отделение №40 (до 30кг): ул. Героев Гражданской войны, 17', 'woocommerce' ),
'Днепропетровск - Отделение №41 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Набережная Победы, 30' => __('Днепропетровск - Отделение №41 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Набережная Победы, 30', 'woocommerce' ),
'Днепропетровск - Отделение №42 , ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА" : ул. Ленина, 14' => __('Днепропетровск - Отделение №42 , ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА" : ул. Ленина, 14', 'woocommerce' ),
'Днепропетровск - Отделение №43  ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Мира, 18' => __('Днепропетровск - Отделение №43  ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Мира, 18', 'woocommerce' ),
'Днепрорудное - Отделение №1: ул. Молодёжная, 7' => __('Днепрорудное - Отделение №1: ул. Молодёжная, 7', 'woocommerce' ),
'Добровеличковка - Отделение №1: ул. Ленина, 104а' => __('Добровеличковка - Отделение №1: ул. Ленина, 104а', 'woocommerce' ),
'Добромиль - Отделение №1: ул. Грушевского, 3' => __('Добромиль - Отделение №1: ул. Грушевского, 3', 'woocommerce' ),
'Доброполье - Отделение №1: просп. Победы, 71' => __('Доброполье - Отделение №1: просп. Победы, 71', 'woocommerce' ),
'Добротвор - Отделение №1: ул. Озерная, 1' => __('Добротвор - Отделение №1: ул. Озерная, 1', 'woocommerce' ),
'Довбыш - Отделение №1: ул. Ивановская, 1 (Дом культуры)' => __('Довбыш - Отделение №1: ул. Ивановская, 1 (Дом культуры)', 'woocommerce' ),
'Долина - Отделение №1: ул. Независимости, 6' => __('Долина - Отделение №1: ул. Независимости, 6', 'woocommerce' ),
'Долинская - Отделение №1: ул. Щорса, 9а' => __('Долинская - Отделение №1: ул. Щорса, 9а', 'woocommerce' ),
'Доманевка - Отделение №1: ул. Ленина, 32' => __('Доманевка - Отделение №1: ул. Ленина, 32', 'woocommerce' ),
'Драбов - Отделение №1: ул. Леніна, 14' => __('Драбов - Отделение №1: ул. Леніна, 14', 'woocommerce' ),
'Драгово - Отделение №1: ул. Ленина, 100' => __('Драгово - Отделение №1: ул. Ленина, 100', 'woocommerce' ),
'Дрогобыч - Отделение №1: ул. Горишня Брама, 183' => __('Дрогобыч - Отделение №1: ул. Горишня Брама, 183', 'woocommerce' ),
'Дрогобыч - Отделение №2 : ул. Бориславская, 2' => __('Дрогобыч - Отделение №2 : ул. Бориславская, 2', 'woocommerce' ),
'Дрогобыч - Отделение №3 : ул. М. Грушевского, 42' => __('Дрогобыч - Отделение №3 : ул. М. Грушевского, 42', 'woocommerce' ),
'Дружба (Сумська обл.) - Отделение №1: ул. Калинина, 12' => __('Дружба (Сумська обл.) - Отделение №1: ул. Калинина, 12', 'woocommerce' ),
'Дружковка - Отделение №1: ул. Базарная, 5 (маг. "Монолит")' => __('Дружковка - Отделение №1: ул. Базарная, 5 (маг. "Монолит")', 'woocommerce' ),
'Дубляны - Отделение №1: ул. Вокзальная, 7' => __('Дубляны - Отделение №1: ул. Вокзальная, 7', 'woocommerce' ),
'Дубно - Отделение №1: ул. Грушевского, 119' => __('Дубно - Отделение №1: ул. Грушевского, 119', 'woocommerce' ),
'Дубовое - Отделение №1: ул. Гагарина, 43' => __('Дубовое - Отделение №1: ул. Гагарина, 43', 'woocommerce' ),
'Дубровица - Отделение №1: ул. Новая, 15' => __('Дубровица - Отделение №1: ул. Новая, 15', 'woocommerce' ),
'Дубровица - Отделение №2 : ул. Почтовая, 19' => __('Дубровица - Отделение №2 : ул. Почтовая, 19', 'woocommerce' ),
'Дунаевцы - Отделение №1: ул. Красинських, 20а' => __('Дунаевцы - Отделение №1: ул. Красинських, 20а', 'woocommerce' ),
'Дымер - Отделение №1: Ленина, 12' => __('Дымер - Отделение №1: Ленина, 12', 'woocommerce' ),
'Еланец - Отделение №1: ул. Карла Маркса, 125' => __('Еланец - Отделение №1: ул. Карла Маркса, 125', 'woocommerce' ),
'Емильчино - Отделение №1: ул. Ленина, 29' => __('Емильчино - Отделение №1: ул. Ленина, 29', 'woocommerce' ),
'Жашков - Отделение № 1: ул. Мира, 9' => __('Жашков - Отделение № 1: ул. Мира, 9', 'woocommerce' ),
'Желтые Воды - Отделение: ул. Заводская 1/14' => __('Желтые Воды - Отделение: ул. Заводская 1/14', 'woocommerce' ),
'Желтые Воды - Отделение №2: ул. Петровского, 50а' => __('Желтые Воды - Отделение №2: ул. Петровского, 50а', 'woocommerce' ),
'Жеребково - Отделение №1: ул. Шевченко, 17' => __('Жеребково - Отделение №1: ул. Шевченко, 17', 'woocommerce' ),
'Жидачов - Отделение №1: ул. Мицкевича, 9' => __('Жидачов - Отделение №1: ул. Мицкевича, 9', 'woocommerce' ),
'Житомир - Отделение № 1: пл. Смолянская, 3' => __('Житомир - Отделение № 1: пл. Смолянская, 3', 'woocommerce' ),
'Житомир - Отделение №2 : ул. Маршала Рыбалко, 28' => __('Житомир - Отделение №2 : ул. Маршала Рыбалко, 28', 'woocommerce' ),
'Житомир - Отделение №3 : ул. Якира, 3' => __('Житомир - Отделение №3 : ул. Якира, 3', 'woocommerce' ),
'Житомир - Отделение №4 : ул. Победы, 99' => __('Житомир - Отделение №4 : ул. Победы, 99', 'woocommerce' ),
'Житомир - Отделение №5 : ул. Б. Тена, 9' => __('Житомир - Отделение №5 : ул. Б. Тена, 9', 'woocommerce' ),
'Житомир - Отделение № 6 : ул. Московская, 41' => __('Житомир - Отделение № 6 : ул. Московская, 41', 'woocommerce' ),
'Житомир - Отделение № 7 : ул. Киевская, 112' => __('Житомир - Отделение № 7 : ул. Киевская, 112', 'woocommerce' ),
'Житомир - Отделение №8: ул. Баранова, 52' => __('Житомир - Отделение №8: ул. Баранова, 52', 'woocommerce' ),
'Житомир - Отделение №9 : ул. Витрука, 9а' => __('Житомир - Отделение №9 : ул. Витрука, 9а', 'woocommerce' ),
'Житомир - Отделение № 10 : просп. Мира, 37' => __('Житомир - Отделение № 10 : просп. Мира, 37', 'woocommerce' ),
'Житомир - Отделение №11: ул. Щорса, 94' => __('Житомир - Отделение №11: ул. Щорса, 94', 'woocommerce' ),
'Житомир - Отделение № 12 : ул. Адмирала Щастного, 1/1' => __('Житомир - Отделение № 12 : ул. Адмирала Щастного, 1/1', 'woocommerce' ),
'Житомир - Отделение №13 : ул. Московская, 26' => __('Житомир - Отделение №13 : ул. Московская, 26', 'woocommerce' ),
'Жмеринка - Отделение №1: ул. Тимирязева, 21' => __('Жмеринка - Отделение №1: ул. Тимирязева, 21', 'woocommerce' ),
'Жовква - Отделение №1: ул. Дорошенка, 3' => __('Жовква - Отделение №1: ул. Дорошенка, 3', 'woocommerce' ),
'Заболотов (Снятинский р-н) - Отделение №1: ул. М. Грушевского, 3' => __('Заболотов (Снятинский р-н) - Отделение №1: ул. М. Грушевского, 3', 'woocommerce' ),
'Заболотье (Волынская обл.) - Отделение №1: ул. Независимости, 3' => __('Заболотье (Волынская обл.) - Отделение №1: ул. Независимости, 3', 'woocommerce' ),
'Завалье (Кировоград обл.) - Отделение №1: ул. Октябрьская, 14' => __('Завалье (Кировоград обл.) - Отделение №1: ул. Октябрьская, 14', 'woocommerce' ),
'Загнитков - Отделение №1: ул. Пионерская, 2а' => __('Загнитков - Отделение №1: ул. Пионерская, 2а', 'woocommerce' ),
'Залещики - Отделение №1: ул. Стефаника, 26а' => __('Залещики - Отделение №1: ул. Стефаника, 26а', 'woocommerce' ),
'Запорожье - Отделение №1: ул. Брянская, 8' => __('Запорожье - Отделение №1: ул. Брянская, 8', 'woocommerce' ),
'Запорожье - Отделение №2: ул. Карпенко-Карого, 52' => __('Запорожье - Отделение №2: ул. Карпенко-Карого, 52', 'woocommerce' ),
'Запорожье - Отделение №3: ул. Айвазовского, 9 (правый берег)' => __('Запорожье - Отделение №3: ул. Айвазовского, 9 (правый берег)', 'woocommerce' ),
'Запорожье - Отделение №4: ул. Якова Новицкого, 4' => __('Запорожье - Отделение №4: ул. Якова Новицкого, 4', 'woocommerce' ),
'Запорожье - Отделение №5: просп. Ленина, 91' => __('Запорожье - Отделение №5: просп. Ленина, 91', 'woocommerce' ),
'Запорожье - Отделение №6: просп. Юбилейній, 12' => __('Запорожье - Отделение №6: просп. Юбилейній, 12', 'woocommerce' ),
'Запорожье - Отделение №7: ул. Космическая, 119' => __('Запорожье - Отделение №7: ул. Космическая, 119', 'woocommerce' ),
'Запорожье - Отделение №8 (до 30 кг на одне місце): просп. Ленина, 43' => __('Запорожье - Отделение №8 (до 30 кг на одне місце): просп. Ленина, 43', 'woocommerce' ),
'Запорожье - Отделение №9: просп. Металлургов, 17' => __('Запорожье - Отделение №9: просп. Металлургов, 17', 'woocommerce' ),
'Запорожье - Отделение №10 : ул. Гаврилова, 7' => __('Запорожье - Отделение №10 : ул. Гаврилова, 7', 'woocommerce' ),
'Запорожье - Отделение №11: просп. Ленина, 208' => __('Запорожье - Отделение №11: просп. Ленина, 208', 'woocommerce' ),
'Запорожье - Отделение № 12: ул. Звенигородская, 1' => __('Запорожье - Отделение № 12: ул. Звенигородская, 1', 'woocommerce' ),
'Запорожье - Отделение № 13 : ул. Сталеваров, 21' => __('Запорожье - Отделение № 13 : ул. Сталеваров, 21', 'woocommerce' ),
'Запорожье - Отделение № 14  : ул. Ладо жская, 14' => __('Запорожье - Отделение № 14  : ул. Ладо жская, 14', 'woocommerce' ),
'Запорожье - Отделение № 15: ул. Курузова, 5' => __('Запорожье - Отделение № 15: ул. Курузова, 5', 'woocommerce' ),
'Запорожье - Отделение № 16: просп. Ленина, 84' => __('Запорожье - Отделение № 16: просп. Ленина, 84', 'woocommerce' ),
'Запорожье - Отделение № 17: ул. Авраменка, 13' => __('Запорожье - Отделение № 17: ул. Авраменка, 13', 'woocommerce' ),
'Запорожье - Отделение №18: ул. Орджоникидзе,11' => __('Запорожье - Отделение №18: ул. Орджоникидзе,11', 'woocommerce' ),
'Запорожье - Отделение №19: ул. Чумаченка, 37' => __('Запорожье - Отделение №19: ул. Чумаченка, 37', 'woocommerce' ),
'Запорожье - Отделение №20: ул. Лермонтова, 15 (ул. Патриотическая, 48)' => __('Запорожье - Отделение №20: ул. Лермонтова, 15 (ул. Патриотическая, 48)', 'woocommerce' ),
'Запорожье - Отделение №21 : ул. Новгородская, 9' => __('Запорожье - Отделение №21 : ул. Новгородская, 9', 'woocommerce' ),
'Запорожье - Отделение №22: ул. Чаривная, 121' => __('Запорожье - Отделение №22: ул. Чаривная, 121', 'woocommerce' ),
'Запорожье - Отделение № 23: ул. Гагарина, 4' => __('Запорожье - Отделение № 23: ул. Гагарина, 4', 'woocommerce' ),
'Запорожье - Отделение №24 : ул. Энтузиастов, 3, пом.37' => __('Запорожье - Отделение №24 : ул. Энтузиастов, 3, пом.37', 'woocommerce' ),
'Запорожье - Отделение №25 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": просп. Ленина, 158' => __('Запорожье - Отделение №25 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": просп. Ленина, 158', 'woocommerce' ),
'Запорожье - Отделение № 26: ул. Северокольцевая, 3' => __('Запорожье - Отделение № 26: ул. Северокольцевая, 3', 'woocommerce' ),
'Зарванцы - Отделение №1: ул. Интернациональная, 20а' => __('Зарванцы - Отделение №1: ул. Интернациональная, 20а', 'woocommerce' ),
'Заречное - Отделение №1: ул. Партизанская, 3' => __('Заречное - Отделение №1: ул. Партизанская, 3', 'woocommerce' ),
'Заречье - Отделение №1: ул. Мичурина, 92а' => __('Заречье - Отделение №1: ул. Мичурина, 92а', 'woocommerce' ),
'Заря (Ровенская обл.) - Отделение №1: ул. Новая, 3а' => __('Заря (Ровенская обл.) - Отделение №1: ул. Новая, 3а', 'woocommerce' ),
'Заставна - Отделение №1: ул. Независимости, 91' => __('Заставна - Отделение №1: ул. Независимости, 91', 'woocommerce' ),
'Засулье - Отделение № 1: ул. Комсомольская, 63' => __('Засулье - Отделение № 1: ул. Комсомольская, 63', 'woocommerce' ),
'Зачепиловка - Отделение №1: пер. Новоселовский, 2' => __('Зачепиловка - Отделение №1: пер. Новоселовский, 2', 'woocommerce' ),
'Збараж - Отделение №1: ул. Чехова, 7' => __('Збараж - Отделение №1: ул. Чехова, 7', 'woocommerce' ),
'Зборов - Отделение №1: ул. Б. Хмельницкого, 58' => __('Зборов - Отделение №1: ул. Б. Хмельницкого, 58', 'woocommerce' ),
'Звенигородка - Отделение №1: ул. Тараса Шевченко, 4' => __('Звенигородка - Отделение №1: ул. Тараса Шевченко, 4', 'woocommerce' ),
'Згуровка - Отделение №1: ул. Ватутина, 4' => __('Згуровка - Отделение №1: ул. Ватутина, 4', 'woocommerce' ),
'Здолбунов - Отделение №1: ул. Независимости, 20' => __('Здолбунов - Отделение №1: ул. Независимости, 20', 'woocommerce' ),
'Зеленогорское - Отделение №1: ул. Шевченко, дом. 2, кв. 2' => __('Зеленогорское - Отделение №1: ул. Шевченко, дом. 2, кв. 2', 'woocommerce' ),
'Зеленодольск - Отделение №1: ул. Ленина, 6' => __('Зеленодольск - Отделение №1: ул. Ленина, 6', 'woocommerce' ),
'Зеньков - Отделение №1: ул. Погребняка, 8б' => __('Зеньков - Отделение №1: ул. Погребняка, 8б', 'woocommerce' ),
'Змиев - Отделение №1: ул. Красноармейская, 21а' => __('Змиев - Отделение №1: ул. Красноармейская, 21а', 'woocommerce' ),
'Змиевка (Херсонская обл.) - Отделение №1: ул. Мира, 9/2' => __('Змиевка (Херсонская обл.) - Отделение №1: ул. Мира, 9/2', 'woocommerce' ),
'Знаменка - Отделение №1: ул. Киевская, 21' => __('Знаменка - Отделение №1: ул. Киевская, 21', 'woocommerce' ),
'Знамянка Вторая - Отделение №1: ул. Ленина, 50б' => __('Знамянка Вторая - Отделение №1: ул. Ленина, 50б', 'woocommerce' ),
'Знобь- Новгородское - Отделение № 1: ул. Вокзальная, 22' => __('Знобь- Новгородское - Отделение № 1: ул. Вокзальная, 22', 'woocommerce' ),
'Золотоноша - Отделение: ул. Обухова, 20' => __('Золотоноша - Отделение: ул. Обухова, 20', 'woocommerce' ),
'Золотоноша - Отделение №2 : ул. Шевченка, 66' => __('Золотоноша - Отделение №2 : ул. Шевченка, 66', 'woocommerce' ),
'Золочев (Львовская обл.) - Отделение №1: вул. Сечевых Стрельцов, 15 б' => __('Золочев (Львовская обл.) - Отделение №1: вул. Сечевых Стрельцов, 15 б', 'woocommerce' ),
'Золочев (Харьковськая обл.) - Отделение №1: ул. 1 Мая, 2а' => __('Золочев (Харьковськая обл.) - Отделение №1: ул. 1 Мая, 2а', 'woocommerce' ),
'Иваничи (Волынская обл.) - Отделение №1: ул. 8-го марта, 5' => __('Иваничи (Волынская обл.) - Отделение №1: ул. 8-го марта, 5', 'woocommerce' ),
'Иванков - Отделение №1: ул. Киевская, 23' => __('Иванков - Отделение №1: ул. Киевская, 23', 'woocommerce' ),
'Ивано-Франково - Отделение №1: ул. Львовская, 55' => __('Ивано-Франково - Отделение №1: ул. Львовская, 55', 'woocommerce' ),
'Ивано-Франковск - Отделение №1: ул. Мазепы, 175б (въезд с ул.Довженко, территория базы "Гурман")' => __('Ивано-Франковск - Отделение №1: ул. Мазепы, 175б (въезд с ул.Довженко, территория базы "Гурман")', 'woocommerce' ),
'Ивано-Франковск - Отделение №2 : ул. Вовчинецкая, 26' => __('Ивано-Франковск - Отделение №2 : ул. Вовчинецкая, 26', 'woocommerce' ),
'Ивано-Франковск - Отделение №3: ул. Железнодорожная, 4' => __('Ивано-Франковск - Отделение №3: ул. Железнодорожная, 4', 'woocommerce' ),
'Ивано-Франковск - Отделение №4: ул. Юности, 62б' => __('Ивано-Франковск - Отделение №4: ул. Юности, 62б', 'woocommerce' ),
'Ивано-Франковск - Отделение № 5 (до 10 кг): ул. Шевченка, 8' => __('Ивано-Франковск - Отделение № 5 (до 10 кг): ул. Шевченка, 8', 'woocommerce' ),
'Ивано-Франковск - Отделение № 6: ул. Надречная, 2а' => __('Ивано-Франковск - Отделение № 6: ул. Надречная, 2а', 'woocommerce' ),
'Ивано-Франковск - Отделение №8 : ул. Миколайчука, 30' => __('Ивано-Франковск - Отделение №8 : ул. Миколайчука, 30', 'woocommerce' ),
'Ивано-Франковск - Отделение №9 : бульв. Южный, 23' => __('Ивано-Франковск - Отделение №9 : бульв. Южный, 23', 'woocommerce' ),
'Ивановка (Одесса) - Отделение №1: ул. Ленина, 72' => __('Ивановка (Одесса) - Отделение №1: ул. Ленина, 72', 'woocommerce' ),
'Ивановка (Херсонская обл.) - Отделение №1: ул. Щорса, 6' => __('Ивановка (Херсонская обл.) - Отделение №1: ул. Щорса, 6', 'woocommerce' ),
'Измаил - Отделение: ул. Некрасова, 3а' => __('Измаил - Отделение: ул. Некрасова, 3а', 'woocommerce' ),
'Измаил - Отделение №2: ул. Комсомольская, 57' => __('Измаил - Отделение №2: ул. Комсомольская, 57', 'woocommerce' ),
'Изюм - Отделение №1: ул. Соборная, 46' => __('Изюм - Отделение №1: ул. Соборная, 46', 'woocommerce' ),
'Изяслав - Отделение №1: ул. Заславская, 6' => __('Изяслав - Отделение №1: ул. Заславская, 6', 'woocommerce' ),
'Илларионово - Отделение №1: ул. Красина, 2' => __('Илларионово - Отделение №1: ул. Красина, 2', 'woocommerce' ),
'Ильинцы - Отделение №1: ул. Ворошилова, 82' => __('Ильинцы - Отделение №1: ул. Ворошилова, 82', 'woocommerce' ),
'Ильичевск - Отделение №1: ул. Паркова, 14' => __('Ильичевск - Отделение №1: ул. Паркова, 14', 'woocommerce' ),
'Ильичевск - Отделение №2 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Данченка, 14/20-н' => __('Ильичевск - Отделение №2 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Данченка, 14/20-н', 'woocommerce' ),
'Ирклиев - Отделение №1: ул. Ленина, 65а' => __('Ирклиев - Отделение №1: ул. Ленина, 65а', 'woocommerce' ),
'Ирпень - Отделение №1: ул. Ленинградская, 4б' => __('Ирпень - Отделение №1: ул. Ленинградская, 4б', 'woocommerce' ),
'Ирпень - Отделение №2: пгт. Гостомель, ул. Чкалова, 37а (на территории "Швидкомийки")' => __('Ирпень - Отделение №2: пгт. Гостомель, ул. Чкалова, 37а (на территории "Швидкомийки")', 'woocommerce' ),
'Ирпень - Отделение №3: пгт. Гостомель, ул. Ленина, 84б' => __('Ирпень - Отделение №3: пгт. Гостомель, ул. Ленина, 84б', 'woocommerce' ),
'Иршава - Отделение №1: ул. Заводская, 10' => __('Иршава - Отделение №1: ул. Заводская, 10', 'woocommerce' ),
'Иршанск - Отделение №1: ул. Гулия, 23' => __('Иршанск - Отделение №1: ул. Гулия, 23', 'woocommerce' ),
'Ичня - Отделение №1: ул. Коваля, 1' => __('Ичня - Отделение №1: ул. Коваля, 1', 'woocommerce' ),
'Кагарлык - Отделение №1: ул. Независимости, 22' => __('Кагарлык - Отделение №1: ул. Независимости, 22', 'woocommerce' ),
'Казанка - Отделение №1: ул. Мира, 207-а' => __('Казанка - Отделение №1: ул. Мира, 207-а', 'woocommerce' ),
'Казатин - Отделение №1: ул. Винниченка, 13/2а' => __('Казатин - Отделение №1: ул. Винниченка, 13/2а', 'woocommerce' ),
'Каланчак - Отделение №1: ул. Пионерская, 77-а' => __('Каланчак - Отделение №1: ул. Пионерская, 77-а', 'woocommerce' ),
'Калиновка (Броварской р-н) - Отделение № 1: ул. Игорева, 4' => __('Калиновка (Броварской р-н) - Отделение № 1: ул. Игорева, 4', 'woocommerce' ),
'Калиновка(Васильковский район) - Отделение №1: ул. Проектная, 1' => __('Калиновка(Васильковский район) - Отделение №1: ул. Проектная, 1', 'woocommerce' ),
'Калиновка(Винница) - Отделение №1: ул. Шмидта, 3' => __('Калиновка(Винница) - Отделение №1: ул. Шмидта, 3', 'woocommerce' ),
'Калиновка(Винница) - Отделение №2 : ул. Дзержинского, 25' => __('Калиновка(Винница) - Отделение №2 : ул. Дзержинского, 25', 'woocommerce' ),
'Калуш - Отделение №1: ул. Каракая, 34' => __('Калуш - Отделение №1: ул. Каракая, 34', 'woocommerce' ),
'Калуш - Отделение №2 : бульв. Независимости, 6' => __('Калуш - Отделение №2 : бульв. Независимости, 6', 'woocommerce' ),
'Каменец-Подольский - Отделение №1: ул. И. Франко, 40а' => __('Каменец-Подольский - Отделение №1: ул. И. Франко, 40а', 'woocommerce' ),
'Каменец-Подольский - Отделение №2 : ул. Первомайская, 7а' => __('Каменец-Подольский - Отделение №2 : ул. Первомайская, 7а', 'woocommerce' ),
'Каменец-Подольский - Отделение №3 : ул. Васильева, 1' => __('Каменец-Подольский - Отделение №3 : ул. Васильева, 1', 'woocommerce' ),
'Каменец-Подольский - Отделение №4 : ул. Шевченка 15' => __('Каменец-Подольский - Отделение №4 : ул. Шевченка 15', 'woocommerce' ),
'Каменец-Подольский - Отделение №5 : ул. Леси Украинки, 39/2' => __('Каменец-Подольский - Отделение №5 : ул. Леси Украинки, 39/2', 'woocommerce' ),
'Каменец-Подольский - Отделение № 6 : ул. Красноармейская, 39' => __('Каменец-Подольский - Отделение № 6 : ул. Красноармейская, 39', 'woocommerce' ),
'Каменка (Черкассы) - Отделение №1: ул. Гагарина, 1' => __('Каменка (Черкассы) - Отделение №1: ул. Гагарина, 1', 'woocommerce' ),
'Каменка (Черновцы) - Отделение №1: ул. Сенюка, 2а' => __('Каменка (Черновцы) - Отделение №1: ул. Сенюка, 2а', 'woocommerce' ),
'Каменка-Бугская - Отделение №1: ул. Чупринки, 15' => __('Каменка-Бугская - Отделение №1: ул. Чупринки, 15', 'woocommerce' ),
'Каменка-Днепровская (Запорожье) - Отделение №1: ул. Советская, 4' => __('Каменка-Днепровская (Запорожье) - Отделение №1: ул. Советская, 4', 'woocommerce' ),
'Камень-Каширский - Отделение №1: ул. Ковельская, 52' => __('Камень-Каширский - Отделение №1: ул. Ковельская, 52', 'woocommerce' ),
'Камышеваха - Отделение №1: ул. Богдана Хмельницкого, 47' => __('Камышеваха - Отделение №1: ул. Богдана Хмельницкого, 47', 'woocommerce' ),
'Канев - Отделение №1: ул. Подмосковка, 3' => __('Канев - Отделение №1: ул. Подмосковка, 3', 'woocommerce' ),
'Канев - Отделение № 2: ул. Дорошенко, 5а' => __('Канев - Отделение № 2: ул. Дорошенко, 5а', 'woocommerce' ),
'Карловка - Отделение №1: ул. Ленина, 30' => __('Карловка - Отделение №1: ул. Ленина, 30', 'woocommerce' ),
'Катеринополь - Отделение №1: ул. Ленина, 47' => __('Катеринополь - Отделение №1: ул. Ленина, 47', 'woocommerce' ),
'Каховка - Отделение №1: ул. Карла Либкнехта, 120' => __('Каховка - Отделение №1: ул. Карла Либкнехта, 120', 'woocommerce' ),
'Каховка - Отделение №2 : ул. Пушкина, 93' => __('Каховка - Отделение №2 : ул. Пушкина, 93', 'woocommerce' ),
'Квасилов (Ровенская обл.) - Отделение №1: ул. Молодёжная, 2Д' => __('Квасилов (Ровенская обл.) - Отделение №1: ул. Молодёжная, 2Д', 'woocommerce' ),
'Кегичевка - Отделение №1: ул. Волошина, 37' => __('Кегичевка - Отделение №1: ул. Волошина, 37', 'woocommerce' ),
'Кельменцы - Отделение №1: ул. Жукова, 24в' => __('Кельменцы - Отделение №1: ул. Жукова, 24в', 'woocommerce' ),
'Киверцы - Отделение №1: ул. Освободителей, 1' => __('Киверцы - Отделение №1: ул. Освободителей, 1', 'woocommerce' ),
'Киев - Отделение №1: ул. Краснознаменная, 34 (Корчеватое)' => __('Киев - Отделение №1: ул. Краснознаменная, 34 (Корчеватое)', 'woocommerce' ),
'Киев - Отделение №2: ул. Бережанская, 9 (Оболонь Луговая)' => __('Киев - Отделение №2: ул. Бережанская, 9 (Оболонь Луговая)', 'woocommerce' ),
'Киев - Отделение №3: ул. Калачевская, 13 (Старая Дарница)' => __('Киев - Отделение №3: ул. Калачевская, 13 (Старая Дарница)', 'woocommerce' ),
'Киев - Отделение №4: ул. Кричевского, 19, м. Житомирская (Святошин)' => __('Киев - Отделение №4: ул. Кричевского, 19, м. Житомирская (Святошин)', 'woocommerce' ),
'Киев - Отделение №5: ул. Федорова, 32 (м. Олимпийская)' => __('Киев - Отделение №5: ул. Федорова, 32 (м. Олимпийская)', 'woocommerce' ),
'Киев - Отделение №6: ул. Николая Василенко, 2 (метро Берестейская)' => __('Киев - Отделение №6: ул. Николая Василенко, 2 (метро Берестейская)', 'woocommerce' ),
'Киев - Отделение №7: ул. Магнитогорская, 1а (м. Черниговская)' => __('Киев - Отделение №7: ул. Магнитогорская, 1а (м. Черниговская)', 'woocommerce' ),
'Киев - Отделение №8: ул. Щекавицкая, 46 б (Подол)' => __('Киев - Отделение №8: ул. Щекавицкая, 46 б (Подол)', 'woocommerce' ),
'Киев - Отделение №9: пер. Вячеслава Чорновола, 54а (р-н Жулянского моста)' => __('Киев - Отделение №9: пер. Вячеслава Чорновола, 54а (р-н Жулянского моста)', 'woocommerce' ),
'Киев - Отделение №10: ул. Онуфрия Трутенко, 6 (метро Васильковская)' => __('Киев - Отделение №10: ул. Онуфрия Трутенко, 6 (метро Васильковская)', 'woocommerce' ),
'Киев - Отделение №11: просп. Краснозвездный, 119 (м. Демеевская)' => __('Киев - Отделение №11: просп. Краснозвездный, 119 (м. Демеевская)', 'woocommerce' ),
'Киев - Отделение №12: ул. Причальная, 5а (Днепровская Набережнаязд, Здолбуновская)' => __('Киев - Отделение №12: ул. Причальная, 5а (Днепровская Набережнаязд, Здолбуновская)', 'woocommerce' ),
'Киев - Отделение №13: ул. Оранжерейна, 3 (метро Дорогожичи)' => __('Киев - Отделение №13: ул. Оранжерейна, 3 (метро Дорогожичи)', 'woocommerce' ),
'Киев - Отделение №14: ул. Краснознаменная, 154 (Пирогов)' => __('Киев - Отделение №14: ул. Краснознаменная, 154 (Пирогов)', 'woocommerce' ),
'Киев - Отделение №15: ул. Малинская, 18 (Новобеличи)' => __('Киев - Отделение №15: ул. Малинская, 18 (Новобеличи)', 'woocommerce' ),
'Киев - Отделение №16: просп. Московский, 16а (м. Петровка)' => __('Киев - Отделение №16: просп. Московский, 16а (м. Петровка)', 'woocommerce' ),
'Киев - Отделение №17: ул. Новоконстантиновская, 22/15 (Стадион "Спартак")' => __('Киев - Отделение №17: ул. Новоконстантиновская, 22/15 (Стадион "Спартак")', 'woocommerce' ),
'Киев - Отделение №18: ул. Молодогвардейская, 22 (Чоколовка)' => __('Киев - Отделение №18: ул. Молодогвардейская, 22 (Чоколовка)', 'woocommerce' ),
'Киев - Отделение №19: ул. Сулеймана Стальского, 23 (Авторынок)' => __('Киев - Отделение №19: ул. Сулеймана Стальского, 23 (Авторынок)', 'woocommerce' ),
'Киев - Отделение №20: пер. Новопечерский, 5 ( м. Дворец Украина)' => __('Киев - Отделение №20: пер. Новопечерский, 5 ( м. Дворец Украина)', 'woocommerce' ),
'Киев - Отделение №21 : ул. Архитектора Николаева, 7' => __('Киев - Отделение №21 : ул. Архитектора Николаева, 7', 'woocommerce' ),
'Киев - Отделение №22: ул. Ревуцкого, 26 (Харьковский масив)' => __('Киев - Отделение №22: ул. Ревуцкого, 26 (Харьковский масив)', 'woocommerce' ),
'Киев - Отделение №23 : просп. Н. Бажана, 24/1 (м. Позняки)' => __('Киев - Отделение №23 : просп. Н. Бажана, 24/1 (м. Позняки)', 'woocommerce' ),
'Киев - Отделение №24: ул. Белорусская, 21 (м. Лукьяновская)' => __('Киев - Отделение №24: ул. Белорусская, 21 (м. Лукьяновская)', 'woocommerce' ),
'Киев - Отделение №25: ул. М. Тимошенко, 9' => __('Киев - Отделение №25: ул. М. Тимошенко, 9', 'woocommerce' ),
'Киев - Отделение №26: ул. Киквидзе, 31 (Верхняя Теличка)' => __('Киев - Отделение №26: ул. Киквидзе, 31 (Верхняя Теличка)', 'woocommerce' ),
'Киев - Отделение №27: просп. Василия Порика, 13в (Виноградар)' => __('Киев - Отделение №27: просп. Василия Порика, 13в (Виноградар)', 'woocommerce' ),
'Киев - Отделение №28: ул. Семьи Сосниных, 7а' => __('Киев - Отделение №28: ул. Семьи Сосниных, 7а', 'woocommerce' ),
'Киев - Отделение №29 : ул. Васильковская, 34(корпус В)' => __('Киев - Отделение №29 : ул. Васильковская, 34(корпус В)', 'woocommerce' ),
'Киев - Отделение №30: ул. Привокзальная, 14 (Дарница ЖД)' => __('Киев - Отделение №30: ул. Привокзальная, 14 (Дарница ЖД)', 'woocommerce' ),
'Киев - Отделение №31 : ул. Московская, 5/2а, м. Арсенальная(Печерск)' => __('Киев - Отделение №31 : ул. Московская, 5/2а, м. Арсенальная(Печерск)', 'woocommerce' ),
'Киев - Отделение №32: ул. Каховская, 60 (Никольская Слободка)' => __('Киев - Отделение №32: ул. Каховская, 60 (Никольская Слободка)', 'woocommerce' ),
'Киев - Отделение №33: ул. Закревского, 18 (Троещина)' => __('Киев - Отделение №33: ул. Закревского, 18 (Троещина)', 'woocommerce' ),
'Киев - Отделение №35 : ул. Фучика, 3 (ЦСКА)' => __('Киев - Отделение №35 : ул. Фучика, 3 (ЦСКА)', 'woocommerce' ),
'Киев - Отделение №36: ул. Елены Телиги, 31/1' => __('Киев - Отделение №36: ул. Елены Телиги, 31/1', 'woocommerce' ),
'Киев - Отделение № 37 (до 30 кг на одне місце): ул. Пражская, 24' => __('Киев - Отделение № 37 (до 30 кг на одне місце): ул. Пражская, 24', 'woocommerce' ),
'Киев - Отделение №38 : ул. Николая Закревского, 29 (Троещина)' => __('Киев - Отделение №38 : ул. Николая Закревского, 29 (Троещина)', 'woocommerce' ),
'Киев - Отделение № 39: ул. Маршала Малиновского, 25 (возле кафе "Талисман")' => __('Киев - Отделение № 39: ул. Маршала Малиновского, 25 (возле кафе "Талисман")', 'woocommerce' ),
'Киев - Отделение № 40: ул. Героев Севастополя, 23а (Отрадный)' => __('Киев - Отделение № 40: ул. Героев Севастополя, 23а (Отрадный)', 'woocommerce' ),
'Киев - Отделение № 41 : бул. Русановский, 4' => __('Киев - Отделение № 41 : бул. Русановский, 4', 'woocommerce' ),
'Киев - Отделение № 42 : ул. Щербакова, 32/38, м. Нивки (Дегтяри)' => __('Киев - Отделение № 42 : ул. Щербакова, 32/38, м. Нивки (Дегтяри)', 'woocommerce' ),
'Киев - Отделение № 43: ул. Голосеевская, 2' => __('Киев - Отделение № 43: ул. Голосеевская, 2', 'woocommerce' ),
'Киев - Отделение № 44: просп. Лесной, 14' => __('Киев - Отделение № 44: просп. Лесной, 14', 'woocommerce' ),
'Киев - Отделение № 45: просп. Юрия Гагарина, 13 (Ленинградская пл.)' => __('Киев - Отделение № 45: просп. Юрия Гагарина, 13 (Ленинградская пл.)', 'woocommerce' ),
'Киев - Отделение № 46 : бульв. Дружбы Народов, 14 (м. Дружбы Народов)' => __('Киев - Отделение № 46 : бульв. Дружбы Народов, 14 (м. Дружбы Народов)', 'woocommerce' ),
'Киев - Отделение № 47: ул. Вышгородская, 38' => __('Киев - Отделение № 47: ул. Вышгородская, 38', 'woocommerce' ),
'Киев - Отделение №48 : вул. Киквидзе, 7/11 (м. Дружбы Народов)' => __('Киев - Отделение №48 : вул. Киквидзе, 7/11 (м. Дружбы Народов)', 'woocommerce' ),
'Киев - Отделение №49: ул. Лайоша Гавро, 1, озеро "Вербное" (Оболонь)' => __('Киев - Отделение №49: ул. Лайоша Гавро, 1, озеро "Вербное" (Оболонь)', 'woocommerce' ),
'Киев - Отделение №50 : просп. Победы, 7в (Цирк)' => __('Киев - Отделение №50 : просп. Победы, 7в (Цирк)', 'woocommerce' ),
'Киев - Отделение №51: ул. Красноткацкая, 91' => __('Киев - Отделение №51: ул. Красноткацкая, 91', 'woocommerce' ),
'Киев - Отделение №52: просп. М. Бажана, 3' => __('Киев - Отделение №52: просп. М. Бажана, 3', 'woocommerce' ),
'Киев - Отделение № 53: ул. Ромена Ролана, 7 (Никольская Борщаговка)' => __('Киев - Отделение № 53: ул. Ромена Ролана, 7 (Никольская Борщаговка)', 'woocommerce' ),
'Киев - Отделение № 54 : просп. Академика Палладина, 25а (м. Академгородок)' => __('Киев - Отделение № 54 : просп. Академика Палладина, 25а (м. Академгородок)', 'woocommerce' ),
'Киев - Отделение №55 : ул. Островского, 60 (Соломенка)' => __('Киев - Отделение №55 : ул. Островского, 60 (Соломенка)', 'woocommerce' ),
'Киев - Отделение №56: ул. Лятошинского, 24' => __('Киев - Отделение №56: ул. Лятошинского, 24', 'woocommerce' ),
'Киев - Отделение № 57: ул. Константиновская, 24 (м. Контрактовая пл.)' => __('Киев - Отделение № 57: ул. Константиновская, 24 (м. Контрактовая пл.)', 'woocommerce' ),
'Киев - Отделение №58: ул. Выборгская, 49' => __('Киев - Отделение №58: ул. Выборгская, 49', 'woocommerce' ),
'Киев - Отделение №59 : ул. Воровского, 39/11' => __('Киев - Отделение №59 : ул. Воровского, 39/11', 'woocommerce' ),
'Киев - Отделение №60: ул. Днепровская набережная, 26и (м. Осокорки)' => __('Киев - Отделение №60: ул. Днепровская набережная, 26и (м. Осокорки)', 'woocommerce' ),
'Киев - Отделение № 61 : просп. Воздухофлотский, 48/2 (Севастопольская пл.)' => __('Киев - Отделение № 61 : просп. Воздухофлотский, 48/2 (Севастопольская пл.)', 'woocommerce' ),
'Киев - Отделение №62: просп. Григоренка, 22/20' => __('Киев - Отделение №62: просп. Григоренка, 22/20', 'woocommerce' ),
'Киев - Отделение №63: ул. Набережно-Хрещатицкая, 15-17/18' => __('Киев - Отделение №63: ул. Набережно-Хрещатицкая, 15-17/18', 'woocommerce' ),
'Киев - Отделение №64 : ул. Васильковская, 55 (м. Выставочный Центр)' => __('Киев - Отделение №64 : ул. Васильковская, 55 (м. Выставочный Центр)', 'woocommerce' ),
'Киев - Отделение № 65  ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА": ул. Богдана Хмельницкого, 84' => __('Киев - Отделение № 65  ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА": ул. Богдана Хмельницкого, 84', 'woocommerce' ),
'Киев - Отделение №66: ул. Сирецкая, 9 (Куреневка)' => __('Киев - Отделение №66: ул. Сирецкая, 9 (Куреневка)', 'woocommerce' ),
'Киев - Отделение №67 : ул. К. Данькевича, 16 (Троещина)' => __('Киев - Отделение №67 : ул. К. Данькевича, 16 (Троещина)', 'woocommerce' ),
'Киев - Отделение №68 : ул. Бориса Гмыри, 1 (м. Позняки)' => __('Киев - Отделение №68 : ул. Бориса Гмыри, 1 (м. Позняки)', 'woocommerce' ),
'Киев - Отделение №69 : ул. Лаврухина, 9 (возле ТРЦ "Район")' => __('Киев - Отделение №69 : ул. Лаврухина, 9 (возле ТРЦ "Район")', 'woocommerce' ),
'Киев - Отделение №70 : просп. Победы, 20, м. Политехнический институт (Шулявка)' => __('Киев - Отделение №70 : просп. Победы, 20, м. Политехнический институт (Шулявка)', 'woocommerce' ),
'Киев - Отделение №71 : бульв. Труда, 5' => __('Киев - Отделение №71 : бульв. Труда, 5', 'woocommerce' ),
'Киев - Отделение №72 : ул. Артема, 14 (Львовская пл.)' => __('Киев - Отделение №72 : ул. Артема, 14 (Львовская пл.)', 'woocommerce' ),
'Киев - Отделение №73 : ул. Прорезная, 9 (м. Хрещатик)' => __('Киев - Отделение №73 : ул. Прорезная, 9 (м. Хрещатик)', 'woocommerce' ),
'Киев - Отделение №74: ул. Межигорская, 56' => __('Киев - Отделение №74: ул. Межигорская, 56', 'woocommerce' ),
'Киев - Отделение №75 : ул. Владимирская, 96а' => __('Киев - Отделение №75 : ул. Владимирская, 96а', 'woocommerce' ),
'Киев - Отделение №76 : просп. Победы, 108/1' => __('Киев - Отделение №76 : просп. Победы, 108/1', 'woocommerce' ),
'Киев - Отделение №77 : просп. Героев Сталинграда, 55' => __('Киев - Отделение №77 : просп. Героев Сталинграда, 55', 'woocommerce' ),
'Киев - Отделение №78 : ул. Магнитогорская, 1а (Дарынок)' => __('Киев - Отделение №78 : ул. Магнитогорская, 1а (Дарынок)', 'woocommerce' ),
'Киев - Отделение №79: ул. Светлицкого, 30/20' => __('Киев - Отделение №79: ул. Светлицкого, 30/20', 'woocommerce' ),
'Киев - Отделение №80 : Харьковское шоссе, 150/15' => __('Киев - Отделение №80 : Харьковское шоссе, 150/15', 'woocommerce' ),
'Киев - Отделение №81 : ул. Саксаганского, 76' => __('Киев - Отделение №81 : ул. Саксаганского, 76', 'woocommerce' ),
'Киев - Отделение №82 : ул. Горького, 157' => __('Киев - Отделение №82 : ул. Горького, 157', 'woocommerce' ),
'Киев - Отделение №84: ул. Курнатовского, 15' => __('Киев - Отделение №84: ул. Курнатовского, 15', 'woocommerce' ),
'Киев - Отделение №85: ул. Маршала Гречко, 24' => __('Киев - Отделение №85: ул. Маршала Гречко, 24', 'woocommerce' ),
'Киев - Отделение №86 : ул. Зодчих, 34б' => __('Киев - Отделение №86 : ул. Зодчих, 34б', 'woocommerce' ),
'Киев - Отделение №87 : ул. Княжий Затон, 14б' => __('Киев - Отделение №87 : ул. Княжий Затон, 14б', 'woocommerce' ),
'Киев - Отделение №88 : ул. Якуба Коласа, 15б' => __('Киев - Отделение №88 : ул. Якуба Коласа, 15б', 'woocommerce' ),
'Киев - Отделение №89: ул. Глубочицкая, 28' => __('Киев - Отделение №89: ул. Глубочицкая, 28', 'woocommerce' ),
'Киев - Отделение №90 : просп. Победы, 80/57' => __('Киев - Отделение №90 : просп. Победы, 80/57', 'woocommerce' ),
'Киев - Отделение №91: ул. Академика Заболотного, 48а' => __('Киев - Отделение №91: ул. Академика Заболотного, 48а', 'woocommerce' ),
'Киев - Отделение №92 : ул. Ленина, 25С (Бортничи)' => __('Киев - Отделение №92 : ул. Ленина, 25С (Бортничи)', 'woocommerce' ),
'Киев - Отделение №93 : ул. Шота Руставели, 31а' => __('Киев - Отделение №93 : ул. Шота Руставели, 31а', 'woocommerce' ),
'Киев - Отделение №94: бульв. Т. Шевченка, 46а' => __('Киев - Отделение №94: бульв. Т. Шевченка, 46а', 'woocommerce' ),
'Киев - Отделение №95 : просп. Голосеевский, 68 ( возле отеля "Мир")' => __('Киев - Отделение №95 : просп. Голосеевский, 68 ( возле отеля "Мир")', 'woocommerce' ),
'Киев - Отделение №96: просп. Комарова, 38а' => __('Киев - Отделение №96: просп. Комарова, 38а', 'woocommerce' ),
'Киев - Отделение № 97 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Ушинского, 1' => __('Киев - Отделение № 97 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Ушинского, 1', 'woocommerce' ),
'Киев - Отделение №98 , Parcel Shop: просп. Московский, 8, (тер-ия завода "Маяк")' => __('Киев - Отделение №98 , Parcel Shop: просп. Московский, 8, (тер-ия завода "Маяк")', 'woocommerce' ),
'Киев - Отделение №99 : ул. Космонавта Волкова, 10 (в магазине "Продукты")' => __('Киев - Отделение №99 : ул. Космонавта Волкова, 10 (в магазине "Продукты")', 'woocommerce' ),
'Киев - Отделение №100 : ул. Инженерная, 1, (маг. "Фуршет")' => __('Киев - Отделение №100 : ул. Инженерная, 1, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение №101 : ул. Большая Васильковская, 143/2' => __('Киев - Отделение №101 : ул. Большая Васильковская, 143/2', 'woocommerce' ),
'Киев - Отделение № 102 : ул. Старовокзальная, 23, (маг. "Фуршет")' => __('Киев - Отделение № 102 : ул. Старовокзальная, 23, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение № 103 (до 5 кг), Parcel Shop: ул. Райдужная, 15, (маг. "Фуршет")' => __('Киев - Отделение № 103 (до 5 кг), Parcel Shop: ул. Райдужная, 15, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение № 104 (до 5 кг), Parcel Shop: ул. Братиславская, 14б, (маг. "Фуршет")' => __('Киев - Отделение № 104 (до 5 кг), Parcel Shop: ул. Братиславская, 14б, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение № 105 : ул. Вышгородская, 21, (маг. "Фуршет")' => __('Киев - Отделение № 105 : ул. Вышгородская, 21, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение №106 : просп. Победы, 94/1, (маг. "Фуршет")' => __('Киев - Отделение №106 : просп. Победы, 94/1, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение № 107 : просп. Воздухофлотский, 66, (маг. "Фуршет")' => __('Киев - Отделение № 107 : просп. Воздухофлотский, 66, (маг. "Фуршет")', 'woocommerce' ),
'Киев - Отделение № 108 : ул. Ивана Кудри, 40 (ЦО "Укртелеком")' => __('Киев - Отделение № 108 : ул. Ивана Кудри, 40 (ЦО "Укртелеком")', 'woocommerce' ),
'Киев - Отделение № 109 : просп. Академика Глушкова, 31а (маг. "Фора")' => __('Киев - Отделение № 109 : просп. Академика Глушкова, 31а (маг. "Фора")', 'woocommerce' ),
'Киев - Отделение № 110 : Харьковское шоссе, 19 (ЖК "Мега Сити")' => __('Киев - Отделение № 110 : Харьковское шоссе, 19 (ЖК "Мега Сити")', 'woocommerce' ),
'Киев - Отделение № 111 : просп. Академика Глушкова, 139 (АЗС "WOG")' => __('Киев - Отделение № 111 : просп. Академика Глушкова, 139 (АЗС "WOG")', 'woocommerce' ),
'Киев - Отделение № 112 : ул. Академика Курчатова, 19а, (маг. "Фора")' => __('Киев - Отделение № 112 : ул. Академика Курчатова, 19а, (маг. "Фора")', 'woocommerce' ),
'Киев - Отделение № 113 : ул. Академика Заболотного, 174а (АЗС "WOG")' => __('Киев - Отделение № 113 : ул. Академика Заболотного, 174а (АЗС "WOG")', 'woocommerce' ),
'Киев - Отделение № 114 : ул. Тимошенко, 19 (маг."Фора")' => __('Киев - Отделение № 114 : ул. Тимошенко, 19 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 115 : просп. Броварской, 3а, (АЗС "WOG")' => __('Киев - Отделение № 115 : просп. Броварской, 3а, (АЗС "WOG")', 'woocommerce' ),
'Киев - Отделение № 116 : пл. Севастопольская, 5' => __('Киев - Отделение № 116 : пл. Севастопольская, 5', 'woocommerce' ),
'Киев - Отделение № 117 : ул. Вышгородская, 46 (маг."Фора")' => __('Киев - Отделение № 117 : ул. Вышгородская, 46 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение №118 : ул. Берковецкая, 6 (АЗС "WOG")' => __('Киев - Отделение №118 : ул. Берковецкая, 6 (АЗС "WOG")', 'woocommerce' ),
'Киев - Отделение №119 : ул. Саперно-Слободская, 10, (маг. "Велика Кишеня")' => __('Киев - Отделение №119 : ул. Саперно-Слободская, 10, (маг. "Велика Кишеня")', 'woocommerce' ),
'Киев - Отделение №120 : просп. Леся Курбаса, 6г (маг. "Велика Кишеня")' => __('Киев - Отделение №120 : просп. Леся Курбаса, 6г (маг. "Велика Кишеня")', 'woocommerce' ),
'Киев - Отделение №121 : ул. Героев Днепра, 31( маг."Велика Кишеня")' => __('Киев - Отделение №121 : ул. Героев Днепра, 31( маг."Велика Кишеня")', 'woocommerce' ),
'Киев - Отделение №122 : ул. Героев Космоса, 4, (БЦ "Форум")' => __('Киев - Отделение №122 : ул. Героев Космоса, 4, (БЦ "Форум")', 'woocommerce' ),
'Киев - Отделение №123 : пров. Ахтырский, 7, корп. 1В (БЦ"ФОРУМ")' => __('Киев - Отделение №123 : пров. Ахтырский, 7, корп. 1В (БЦ"ФОРУМ")', 'woocommerce' ),
'Киев - Отделение №124 : ул. Якутская, 8 (маг. "Сильпо")' => __('Киев - Отделение №124 : ул. Якутская, 8 (маг. "Сильпо")', 'woocommerce' ),
'Киев - Отделение №125 : ул. Здолбуновская, 4 (маг. "Сильпо")' => __('Киев - Отделение №125 : ул. Здолбуновская, 4 (маг. "Сильпо")', 'woocommerce' ),
'Киев - Отделение №126 : пров. Карельский, 3 ( маг. "Сильпо")' => __('Киев - Отделение №126 : пров. Карельский, 3 ( маг. "Сильпо")', 'woocommerce' ),
'Киев - Отделение № 128 : пл. Спортивная, 1, (ТРЦ "Gulliver")' => __('Киев - Отделение № 128 : пл. Спортивная, 1, (ТРЦ "Gulliver")', 'woocommerce' ),
'Киев - Отделение № 129 : бульв. Дарницкий, 23 (маг."Фора")' => __('Киев - Отделение № 129 : бульв. Дарницкий, 23 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 130 : Харьковское шоссе, 8' => __('Киев - Отделение № 130 : Харьковское шоссе, 8', 'woocommerce' ),
'Киев - Отделение № 131 : Днепровская набережная, 7 (маг."Фора")' => __('Киев - Отделение № 131 : Днепровская набережная, 7 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 132 : ул. Оноре де Бальзака, 94 (маг. "Фора")' => __('Киев - Отделение № 132 : ул. Оноре де Бальзака, 94 (маг. "Фора")', 'woocommerce' ),
'Киев - Отделение № 133 : ул. Зодчих, 52 (маг."Фора")' => __('Киев - Отделение № 133 : ул. Зодчих, 52 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 134 : ул. Новопироговская, 31 (маг."Фора")' => __('Киев - Отделение № 134 : ул. Новопироговская, 31 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 135 : ул. Полярная, 8а (маг."Фора")' => __('Киев - Отделение № 135 : ул. Полярная, 8а (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 136 : ул. Святошинская, 16 (маг."Фора")' => __('Киев - Отделение № 136 : ул. Святошинская, 16 (маг."Фора")', 'woocommerce' ),
'Киев - Отделение № 137 : ул. Тростянецкая, 6г (маг. "Фора")' => __('Киев - Отделение № 137 : ул. Тростянецкая, 6г (маг. "Фора")', 'woocommerce' ),
'Килия - Отделение №1: ул. Ленина, 18' => __('Килия - Отделение №1: ул. Ленина, 18', 'woocommerce' ),
'Кирнасовка - Отделение № 1: ул. Ленина, 1б' => __('Кирнасовка - Отделение № 1: ул. Ленина, 1б', 'woocommerce' ),
'Кировоград - Отделение №1: ул. Родниковая, 88а' => __('Кировоград - Отделение №1: ул. Родниковая, 88а', 'woocommerce' ),
'Кировоград - Отделение №2: ул. Евгения Маланюка, 21а' => __('Кировоград - Отделение №2: ул. Евгения Маланюка, 21а', 'woocommerce' ),
'Кировоград - Отделение №3: ул. Большая Перспективная, 40' => __('Кировоград - Отделение №3: ул. Большая Перспективная, 40', 'woocommerce' ),
'Кировоград - Отделение №4: ул. Волкова, 13в' => __('Кировоград - Отделение №4: ул. Волкова, 13в', 'woocommerce' ),
'Кировоград - Отделение №5 : ул. Шевченко, 16б' => __('Кировоград - Отделение №5 : ул. Шевченко, 16б', 'woocommerce' ),
'Кировоград - Отделение № 6 : ул. Короленко, 32 а' => __('Кировоград - Отделение № 6 : ул. Короленко, 32 а', 'woocommerce' ),
'Кировоград - Отделение №7: ул. Космонавта Попова 26, корп. 1' => __('Кировоград - Отделение №7: ул. Космонавта Попова 26, корп. 1', 'woocommerce' ),
'Кировоград - Отделение № 8: ул. Октябрьской Революции, 66а' => __('Кировоград - Отделение № 8: ул. Октябрьской Революции, 66а', 'woocommerce' ),
'Кировоград - Отделение №9 : ул. Кирова, 85' => __('Кировоград - Отделение №9 : ул. Кирова, 85', 'woocommerce' ),
'Кировское (Днепропетровск) - Отделение № 1: ул. Центральная, 44а' => __('Кировское (Днепропетровск) - Отделение № 1: ул. Центральная, 44а', 'woocommerce' ),
'Кицмань - Отделение№1: ул. Независимости, 107 а' => __('Кицмань - Отделение№1: ул. Независимости, 107 а', 'woocommerce' ),
'Клавдиево-Тарасово - Отделение №1: ул. Ленина, 7' => __('Клавдиево-Тарасово - Отделение №1: ул. Ленина, 7', 'woocommerce' ),
'Клевань - Отделение №1: ул. Богдана Хмельницкого, 26' => __('Клевань - Отделение №1: ул. Богдана Хмельницкого, 26', 'woocommerce' ),
'Клесов - Отделение №1: ул. Дзержинского, 32' => __('Клесов - Отделение №1: ул. Дзержинского, 32', 'woocommerce' ),
'Клишковцы - Отделение №1: ул. Главная, 110' => __('Клишковцы - Отделение №1: ул. Главная, 110', 'woocommerce' ),
'Кобеляки - Отделение №1: ул. Шевченка, 40' => __('Кобеляки - Отделение №1: ул. Шевченка, 40', 'woocommerce' ),
'Коблево - Отделение №1: ул. Степная, 4' => __('Коблево - Отделение №1: ул. Степная, 4', 'woocommerce' ),
'Ковель - Отделение №1: ул. Владимирская, 135' => __('Ковель - Отделение №1: ул. Владимирская, 135', 'woocommerce' ),
'Ковель - Отделение №2: ул. Театральная, 18 (кинотеатр им. Л. Украинки)' => __('Ковель - Отделение №2: ул. Театральная, 18 (кинотеатр им. Л. Украинки)', 'woocommerce' ),
'Ковель - Отделение №3 : ул. Левицкого, 2а (район рынка "Брестский")' => __('Ковель - Отделение №3 : ул. Левицкого, 2а (район рынка "Брестский")', 'woocommerce' ),
'Ковшаровка - Отделение №1: Ковшаровка, 35 В' => __('Ковшаровка - Отделение №1: Ковшаровка, 35 В', 'woocommerce' ),
'Кодыма - Отделение №1: ул. Ленина, 102' => __('Кодыма - Отделение №1: ул. Ленина, 102', 'woocommerce' ),
'Козелец - Отделение №1: ул. Комсомольская, 40' => __('Козелец - Отделение №1: ул. Комсомольская, 40', 'woocommerce' ),
'Козельщина - Отделение №1: ул. Советская, 44.' => __('Козельщина - Отделение №1: ул. Советская, 44.', 'woocommerce' ),
'Козин (Киевская обл.) - Отделение № 1: ул. Анатолия Соловьяненко, 68' => __('Козин (Киевская обл.) - Отделение № 1: ул. Анатолия Соловьяненко, 68', 'woocommerce' ),
'Козова - Отделение №1: ул. Привитна, 16' => __('Козова - Отделение №1: ул. Привитна, 16', 'woocommerce' ),
'Козын (Ровенская обл.) - Отделение №1: ул. Берестецкая, 128' => __('Козын (Ровенская обл.) - Отделение №1: ул. Берестецкая, 128', 'woocommerce' ),
'Колки - Отделение №1: ул. 8-го Марта, 14' => __('Колки - Отделение №1: ул. 8-го Марта, 14', 'woocommerce' ),
'Коломыя - Отделение №1: ул. Симоненко, 1 (територрия "Межрайбазы")' => __('Коломыя - Отделение №1: ул. Симоненко, 1 (територрия "Межрайбазы")', 'woocommerce' ),
'Коломыя - Отделение №2 : ул. Гетьманская, 12' => __('Коломыя - Отделение №2 : ул. Гетьманская, 12', 'woocommerce' ),
'Комарно - Отделение №1: площадь Ивана Франка, 32' => __('Комарно - Отделение №1: площадь Ивана Франка, 32', 'woocommerce' ),
'Коминтерновское - Отделение №1: ул. Первомайская, 5' => __('Коминтерновское - Отделение №1: ул. Первомайская, 5', 'woocommerce' ),
'Компанеевка - Отделение №1: ул. Калинина (р-н Базарной площади)' => __('Компанеевка - Отделение №1: ул. Калинина (р-н Базарной площади)', 'woocommerce' ),
'Комсомольск - Отделение №1: вул. Советская, 31' => __('Комсомольск - Отделение №1: вул. Советская, 31', 'woocommerce' ),
'Комсомольск - Отделение №2: ул. Строна, 3' => __('Комсомольск - Отделение №2: ул. Строна, 3', 'woocommerce' ),
'Комсомольск - Отделение №3 : ул. Ленина, 43, оф.1' => __('Комсомольск - Отделение №3 : ул. Ленина, 43, оф.1', 'woocommerce' ),
'Комсомольское (Винницкая обл.) - Отделение №1: ул. Киевская, 42' => __('Комсомольское (Винницкая обл.) - Отделение №1: ул. Киевская, 42', 'woocommerce' ),
'Комсомольское (Харьков) - Отделение №1: ул. Шевченка, 2' => __('Комсомольское (Харьков) - Отделение №1: ул. Шевченка, 2', 'woocommerce' ),
'Конецполь - Отделение №1: ул. Ленина, 46' => __('Конецполь - Отделение №1: ул. Ленина, 46', 'woocommerce' ),
'Конотоп - Отделение № 1: ул. Батуринская, 22а' => __('Конотоп - Отделение № 1: ул. Батуринская, 22а', 'woocommerce' ),
'Конотоп - Отделение № 2 : ул. Братьев Радченко, 51а' => __('Конотоп - Отделение № 2 : ул. Братьев Радченко, 51а', 'woocommerce' ),
'Конотоп - Отделение №3 : ул. Клубная, 8' => __('Конотоп - Отделение №3 : ул. Клубная, 8', 'woocommerce' ),
'Константиновка - Отделение №1: ул. Громова, 6' => __('Константиновка - Отделение №1: ул. Громова, 6', 'woocommerce' ),
'Константиновка - Отделение №2: пл. Победы, 16' => __('Константиновка - Отделение №2: пл. Победы, 16', 'woocommerce' ),
'Копычинцы (Гусятинский р-н) - Отделение №1: ул. Рынок, 34 (Гусятинский район)' => __('Копычинцы (Гусятинский р-н) - Отделение №1: ул. Рынок, 34 (Гусятинский район)', 'woocommerce' ),
'Корец - Отделение №1: с. Гвоздев, ул. Победі, 2г' => __('Корец - Отделение №1: с. Гвоздев, ул. Победі, 2г', 'woocommerce' ),
'Короп - Отделение №1: ул. Горького, 3' => __('Короп - Отделение №1: ул. Горького, 3', 'woocommerce' ),
'Коростень - Отделение №1: ул. Октябрьская, 72а' => __('Коростень - Отделение №1: ул. Октябрьская, 72а', 'woocommerce' ),
'Коростень - Отделение №2: ул. Сосновського 25' => __('Коростень - Отделение №2: ул. Сосновського 25', 'woocommerce' ),
'Коростень - Отделение №3: ул. Кирова, 55' => __('Коростень - Отделение №3: ул. Кирова, 55', 'woocommerce' ),
'Коростышев - Отделение №1: ул. Карла Маркса, 56' => __('Коростышев - Отделение №1: ул. Карла Маркса, 56', 'woocommerce' ),
'Корсунь-Шевченковский - Отделение №1: ул. Красноармейская, 12а' => __('Корсунь-Шевченковский - Отделение №1: ул. Красноармейская, 12а', 'woocommerce' ),
'Корюковка - Отделение №1: переул. Вокзальный, 6' => __('Корюковка - Отделение №1: переул. Вокзальный, 6', 'woocommerce' ),
'Косари (Черкаська обл.) - Отделение № 1: ул. Первомайская, 1' => __('Косари (Черкаська обл.) - Отделение № 1: ул. Первомайская, 1', 'woocommerce' ),
'Косов - Отделение №1: ул. Степана Бандеры, 2' => __('Косов - Отделение №1: ул. Степана Бандеры, 2', 'woocommerce' ),
'Косонь (Косино) - Отделение №1: ул. Кошута, 16' => __('Косонь (Косино) - Отделение №1: ул. Кошута, 16', 'woocommerce' ),
'Костополь - Отделение №1: ул. Ровенская, 107' => __('Костополь - Отделение №1: ул. Ровенская, 107', 'woocommerce' ),
'Костополь - Отделение №2 : ул. Грушевского, 20' => __('Костополь - Отделение №2 : ул. Грушевского, 20', 'woocommerce' ),
'Котельва - Отделение №1: ул. Буденого, 6' => __('Котельва - Отделение №1: ул. Буденого, 6', 'woocommerce' ),
'Котовск - Отделение №1: ул. 50 лет Октября, 192' => __('Котовск - Отделение №1: ул. 50 лет Октября, 192', 'woocommerce' ),
'Коцюбинское - Отделение №1: ул. Доковская, 5б' => __('Коцюбинское - Отделение №1: ул. Доковская, 5б', 'woocommerce' ),
'Краматорск - Отделение №1: ул. Юбилейная, 17 (Декор Сервис)' => __('Краматорск - Отделение №1: ул. Юбилейная, 17 (Декор Сервис)', 'woocommerce' ),
'Краматорск - Отделение №2: ул. Луначарского, 2' => __('Краматорск - Отделение №2: ул. Луначарского, 2', 'woocommerce' ),
'Краматорск - Отделение №3: ул. 19-го Партсъезда, 39' => __('Краматорск - Отделение №3: ул. 19-го Партсъезда, 39', 'woocommerce' ),
'Краматорск - Отделение №4 : ул. Хабаровская, 32' => __('Краматорск - Отделение №4 : ул. Хабаровская, 32', 'woocommerce' ),
'Красилов - Отделение №1: ул. Грушевского, 146' => __('Красилов - Отделение №1: ул. Грушевского, 146', 'woocommerce' ),
'Красилов - Отделение №2 : ул. Булаенка, 13' => __('Красилов - Отделение №2 : ул. Булаенка, 13', 'woocommerce' ),
'Красноармейск - Отделение №1: ул. Артема, 169 (АЗС УкрТАТ Нафта)' => __('Красноармейск - Отделение №1: ул. Артема, 169 (АЗС УкрТАТ Нафта)', 'woocommerce' ),
'Красноармейск - Отделение №2: торг. центр «Шахтёрский» (микрорайон «Шахтёрский»)' => __('Красноармейск - Отделение №2: торг. центр «Шахтёрский» (микрорайон «Шахтёрский»)', 'woocommerce' ),
'Красноград (Харьковская обл) - Отделение №1: ул. Харьковская, 115' => __('Красноград (Харьковская обл) - Отделение №1: ул. Харьковская, 115', 'woocommerce' ),
'Краснокутск - Отделение №1: ул. Ленина, 111' => __('Краснокутск - Отделение №1: ул. Ленина, 111', 'woocommerce' ),
'Краснопавловка - Отделение № 1: Микрорайон, 16' => __('Краснопавловка - Отделение № 1: Микрорайон, 16', 'woocommerce' ),
'Краснополье (Сумская обл.) - Отделение №1: ул. Победы, 49' => __('Краснополье (Сумская обл.) - Отделение №1: ул. Победы, 49', 'woocommerce' ),
'Красный Лиман - Отделение №1: ул. Кирова, 35 а (южная сторонаБ район деревянного моста)' => __('Красный Лиман - Отделение №1: ул. Кирова, 35 а (южная сторонаБ район деревянного моста)', 'woocommerce' ),
'Красный Лиман - Отделение №2: ул. Свободы, 28а, корп. 3' => __('Красный Лиман - Отделение №2: ул. Свободы, 28а, корп. 3', 'woocommerce' ),
'Кременец - Отделение №1: ул. Дубенская, 137' => __('Кременец - Отделение №1: ул. Дубенская, 137', 'woocommerce' ),
'Кременная - Отделение №1: пл. Кооперативная, 40' => __('Кременная - Отделение №1: пл. Кооперативная, 40', 'woocommerce' ),
'Кременчуг - Отделение №1: ул. Флотская, 2' => __('Кременчуг - Отделение №1: ул. Флотская, 2', 'woocommerce' ),
'Кременчуг - Отделение №2 : ул. Октябрьская,31/16(Центр)' => __('Кременчуг - Отделение №2 : ул. Октябрьская,31/16(Центр)', 'woocommerce' ),
'Кременчуг - Отделение №3 : ул. 60-летия Октября, 77' => __('Кременчуг - Отделение №3 : ул. 60-летия Октября, 77', 'woocommerce' ),
'Кременчуг - Отделение №4 : ул. Гагарина, 13' => __('Кременчуг - Отделение №4 : ул. Гагарина, 13', 'woocommerce' ),
'Кременчуг - Отделение №5: ул. Космическая, 1 (Раковка)' => __('Кременчуг - Отделение №5: ул. Космическая, 1 (Раковка)', 'woocommerce' ),
'Кременчуг - Отделение №6 : ул. 50 лет Октября, 96 (Торговый центр Простор)' => __('Кременчуг - Отделение №6 : ул. 50 лет Октября, 96 (Торговый центр Простор)', 'woocommerce' ),
'Кременчуг - Отделение № 7: ул. 1-й Песчаный Тупик,1' => __('Кременчуг - Отделение № 7: ул. 1-й Песчаный Тупик,1', 'woocommerce' ),
'Кременчуг - Отделение №8 : ул. Квартал 101, 2 (Водоканал)' => __('Кременчуг - Отделение №8 : ул. Квартал 101, 2 (Водоканал)', 'woocommerce' ),
'Кременчуг - Отделение №9: просп. 50-летия Октября, 10' => __('Кременчуг - Отделение №9: просп. 50-летия Октября, 10', 'woocommerce' ),
'Кременчуг - Отделение №10  ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА" : ул. 60-летия Октября, 19' => __('Кременчуг - Отделение №10  ТОЧКА ВИДАЧИ "ПРИВАТ БАНКА" : ул. 60-летия Октября, 19', 'woocommerce' ),
'Кривое Озеро - Отделение №1: ул. Шевченко, 6' => __('Кривое Озеро - Отделение №1: ул. Шевченко, 6', 'woocommerce' ),
'Кривой Рог - Отделение №1: ул. Куприна, 123б' => __('Кривой Рог - Отделение №1: ул. Куприна, 123б', 'woocommerce' ),
'Кривой Рог - Отделение №2: ул. Леонида Бородича, 17' => __('Кривой Рог - Отделение №2: ул. Леонида Бородича, 17', 'woocommerce' ),
'Кривой Рог - Отделение №3: ул. Кропивницкого, 29в' => __('Кривой Рог - Отделение №3: ул. Кропивницкого, 29в', 'woocommerce' ),
'Кривой Рог - Отделение №4: ул. Постишева, 2a' => __('Кривой Рог - Отделение №4: ул. Постишева, 2a', 'woocommerce' ),
'Кривой Рог - Отделение №5: ул. 27 Партсъезда, 9б' => __('Кривой Рог - Отделение №5: ул. 27 Партсъезда, 9б', 'woocommerce' ),
'Кривой Рог - Отделение №6: ул. Тухачевского, 41 (пом.65)' => __('Кривой Рог - Отделение №6: ул. Тухачевского, 41 (пом.65)', 'woocommerce' ),
'Кривой Рог - Отделение №7: ул. Ленина, 55' => __('Кривой Рог - Отделение №7: ул. Ленина, 55', 'woocommerce' ),
'Кривой Рог - Отделение №8: ул. Курчатова, 1г' => __('Кривой Рог - Отделение №8: ул. Курчатова, 1г', 'woocommerce' ),
'Кривой Рог - Отделение №9: ул. Щорса, 23а' => __('Кривой Рог - Отделение №9: ул. Щорса, 23а', 'woocommerce' ),
'Кривой Рог - Отделение № 10: ул. Кириленка 25' => __('Кривой Рог - Отделение № 10: ул. Кириленка 25', 'woocommerce' ),
'Кривой Рог - Отделение № 11: ул. Галенка 5/49' => __('Кривой Рог - Отделение № 11: ул. Галенка 5/49', 'woocommerce' ),
'Кривой Рог - Отделение № 12: просп. Южный, 17, кв. 83' => __('Кривой Рог - Отделение № 12: просп. Южный, 17, кв. 83', 'woocommerce' ),
'Кривой Рог - Отделение №13: ул. Мелешкина, 9, пом. 3' => __('Кривой Рог - Отделение №13: ул. Мелешкина, 9, пом. 3', 'woocommerce' ),
'Кривой Рог - Отделение № 14: ул. Лисового, 9 а' => __('Кривой Рог - Отделение № 14: ул. Лисового, 9 а', 'woocommerce' ),
'Кривой Рог - Отделение №15: просп. Мира, 31' => __('Кривой Рог - Отделение №15: просп. Мира, 31', 'woocommerce' ),
'Кривой Рог - Отделение №16: вул. Электрозаводская, 10а' => __('Кривой Рог - Отделение №16: вул. Электрозаводская, 10а', 'woocommerce' ),
'Кривой Рог - Отделение № 17: ул. Федоренко, 5а' => __('Кривой Рог - Отделение № 17: ул. Федоренко, 5а', 'woocommerce' ),
'Кривой Рог - Отделение №19: ул. Мусоргского, 20' => __('Кривой Рог - Отделение №19: ул. Мусоргского, 20', 'woocommerce' ),
'Кривой Рог - Отделение №20: микрорайон Солнечный, 41а' => __('Кривой Рог - Отделение №20: микрорайон Солнечный, 41а', 'woocommerce' ),
'Кривой Рог - Отделение №21: ул. Адмирала Головко, 44а' => __('Кривой Рог - Отделение №21: ул. Адмирала Головко, 44а', 'woocommerce' ),
'Кривой Рог - Отделение № 22 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Кремлевская, 25' => __('Кривой Рог - Отделение № 22 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Кремлевская, 25', 'woocommerce' ),
'Кринички - Отделение №1: ул. Советская, 39а' => __('Кринички - Отделение №1: ул. Советская, 39а', 'woocommerce' ),
'Кролевец - Отделение №1: ул. Карла Маркса, 15' => __('Кролевец - Отделение №1: ул. Карла Маркса, 15', 'woocommerce' ),
'Крыжополь - Отделение №1: ул. Пионерская, 23' => __('Крыжополь - Отделение №1: ул. Пионерская, 23', 'woocommerce' ),
'Крюковщина - Отделение №1: ул. Балукова, 5' => __('Крюковщина - Отделение №1: ул. Балукова, 5', 'woocommerce' ),
'Кузнецовск - Отделение №1: ул. Садовая, 103 (рынок "Копошилка")' => __('Кузнецовск - Отделение №1: ул. Садовая, 103 (рынок "Копошилка")', 'woocommerce' ),
'Кузнецовск - Отделение №2 : микрорайон Ювилейный №1, рынок Северный, киоск № 90' => __('Кузнецовск - Отделение №2 : микрорайон Ювилейный №1, рынок Северный, киоск № 90', 'woocommerce' ),
'Кузнецовск - Отделение №3: ул. Энергетиков, 5' => __('Кузнецовск - Отделение №3: ул. Энергетиков, 5', 'woocommerce' ),
'Куйбышево (Запорожская обл.) - Отделение №1: пер. Почтовый, 27 в (напротив Центра занятости)' => __('Куйбышево (Запорожская обл.) - Отделение №1: пер. Почтовый, 27 в (напротив Центра занятости)', 'woocommerce' ),
'Куликов - Отделение №1: вул. Загорода, 1' => __('Куликов - Отделение №1: вул. Загорода, 1', 'woocommerce' ),
'Куликовка - Отделение №1: ул. Партизанская,2а' => __('Куликовка - Отделение №1: ул. Партизанская,2а', 'woocommerce' ),
'Купянск - Отделение №1: ул. Дзержинского, 56' => __('Купянск - Отделение №1: ул. Дзержинского, 56', 'woocommerce' ),
'Купянск - Отделение №2: ул. Садовая, 1' => __('Купянск - Отделение №2: ул. Садовая, 1', 'woocommerce' ),
'Купянск-Узловой - Отделение №1: пер. Кирова, 1' => __('Купянск-Узловой - Отделение №1: пер. Кирова, 1', 'woocommerce' ),
'Курахове - Отделение №1: ул. Грушева, 28' => __('Курахове - Отделение №1: ул. Грушева, 28', 'woocommerce' ),
'Кучурган - Отделение №1: ул. Ленина, 106' => __('Кучурган - Отделение №1: ул. Ленина, 106', 'woocommerce' ),
'Ладан - Отделение №1: ул. Мира, 75а' => __('Ладан - Отделение №1: ул. Мира, 75а', 'woocommerce' ),
'Ладыжин - Отделение №1: ул. Петра Кравчика, 9' => __('Ладыжин - Отделение №1: ул. Петра Кравчика, 9', 'woocommerce' ),
'Лазорки (Оржицкий р-н) - Отделение № 1:вул. Шевченко, 30а' => __('Лазорки (Оржицкий р-н) - Отделение № 1:вул. Шевченко, 30а', 'woocommerce' ),
'Лазурное (Херсонская обл.) - Отделение №1: ул. Ленина, 56а' => __('Лазурное (Херсонская обл.) - Отделение №1: ул. Ленина, 56а', 'woocommerce' ),
'Лановцы - Отделение: ул. Грушевского, 2' => __('Лановцы - Отделение: ул. Грушевского, 2', 'woocommerce' ),
'Лебедин (Сумская обл.) - Отделение: площадь Интернациональная, 20' => __('Лебедин (Сумская обл.) - Отделение: площадь Интернациональная, 20', 'woocommerce' ),
'Лебедин (Черкаская обл., Шполянский р-н) - Отделение № 1: ул. Ленина, 131' => __('Лебедин (Черкаская обл., Шполянский р-н) - Отделение № 1: ул. Ленина, 131', 'woocommerce' ),
'Летава - Отделение №1: ул. Островского, 60' => __('Летава - Отделение №1: ул. Островского, 60', 'woocommerce' ),
'Летичев - Отделение № 1: ул. 50-летия Октября, 25' => __('Летичев - Отделение № 1: ул. 50-летия Октября, 25', 'woocommerce' ),
'Лиманское (Раздельнянский р-н) - Отделение №1: микрорайон Военный городок' => __('Лиманское (Раздельнянский р-н) - Отделение №1: микрорайон Военный городок', 'woocommerce' ),
'Липовая Долина - Отделение: 3-й переулок Роменской, 1' => __('Липовая Долина - Отделение: 3-й переулок Роменской, 1', 'woocommerce' ),
'Липовец - Отделение: ул. Ленина, 55' => __('Липовец - Отделение: ул. Ленина, 55', 'woocommerce' ),
'Лисичанск - Отделение №1: ул. Макаренко, 208 (база "ЛИСПРОД")' => __('Лисичанск - Отделение №1: ул. Макаренко, 208 (база "ЛИСПРОД")', 'woocommerce' ),
'Лисичанск - Отделение №2: квартал Октябрьской Революции, 5' => __('Лисичанск - Отделение №2: квартал Октябрьской Революции, 5', 'woocommerce' ),
'Литин - Отделение №1: ул. Фабрициуса, 26 (автошкола )' => __('Литин - Отделение №1: ул. Фабрициуса, 26 (автошкола )', 'woocommerce' ),
'Лозоватка - Отделение №1: ул. Ленина, 42' => __('Лозоватка - Отделение №1: ул. Ленина, 42', 'woocommerce' ),
'Лозовая - Отделение №1: пер. Севастопольский, 2б' => __('Лозовая - Отделение №1: пер. Севастопольский, 2б', 'woocommerce' ),
'Лозовая - Отделение №2 : ул. 1-й микрорайон, 17/4' => __('Лозовая - Отделение №2 : ул. 1-й микрорайон, 17/4', 'woocommerce' ),
'Лозовая - Отделение № 3 : ул. Володарского, 23' => __('Лозовая - Отделение № 3 : ул. Володарского, 23', 'woocommerce' ),
'Локачи - Отделение: ул. Луцкая, 1/2' => __('Локачи - Отделение: ул. Луцкая, 1/2', 'woocommerce' ),
'Лопатин (Львовская обл.) - Отделение №1: ул. Центральная, 24а' => __('Лопатин (Львовская обл.) - Отделение №1: ул. Центральная, 24а', 'woocommerce' ),
'Лохвица - Отделение: ул. Бурмистренка, 2а' => __('Лохвица - Отделение: ул. Бурмистренка, 2а', 'woocommerce' ),
'Лубны - Отделение №1: ул. Фабричная, 7' => __('Лубны - Отделение №1: ул. Фабричная, 7', 'woocommerce' ),
'Лубны - Отделение №2: ул. Советская, 21' => __('Лубны - Отделение №2: ул. Советская, 21', 'woocommerce' ),
'Лубны - Отделение №3 : ул. Монастырская, 71' => __('Лубны - Отделение №3 : ул. Монастырская, 71', 'woocommerce' ),
'Лугины - Отделение: ул. Карла Маркаса, 23 а' => __('Лугины - Отделение: ул. Карла Маркаса, 23 а', 'woocommerce' ),
'Лужаны - Отделение №1: ул. Заводская, 28' => __('Лужаны - Отделение №1: ул. Заводская, 28', 'woocommerce' ),
'Лука-Мелешковская - Отделение №1: ул. Восточная, 1' => __('Лука-Мелешковская - Отделение №1: ул. Восточная, 1', 'woocommerce' ),
'Луков - Отделение №1: Ковельская, 4а' => __('Луков - Отделение №1: Ковельская, 4а', 'woocommerce' ),
'Луцк - Отделение №1: ул. Карбышева, 1' => __('Луцк - Отделение №1: ул. Карбышева, 1', 'woocommerce' ),
'Луцк - Отделение №2 : ул. Ковельская, 68' => __('Луцк - Отделение №2 : ул. Ковельская, 68', 'woocommerce' ),
'Луцк - Отделение №3 : ул. Ершова, 11 (напротив "Фуршета" ТЦ "Глобус")' => __('Луцк - Отделение №3 : ул. Ершова, 11 (напротив "Фуршета" ТЦ "Глобус")', 'woocommerce' ),
'Луцк - Отделение №4: ул. Львовская, 152б' => __('Луцк - Отделение №4: ул. Львовская, 152б', 'woocommerce' ),
'Луцк - Отделение №5: ул. Связистов, 1а' => __('Луцк - Отделение №5: ул. Связистов, 1а', 'woocommerce' ),
'Луцк - Отделение №6 : ул. Конякина, 24а' => __('Луцк - Отделение №6 : ул. Конякина, 24а', 'woocommerce' ),
'Луцк - Отделение №7 : ул. Генерала Шухевича, 4' => __('Луцк - Отделение №7 : ул. Генерала Шухевича, 4', 'woocommerce' ),
'Луцк - Отделение №8 : просп. Соборности, 38а' => __('Луцк - Отделение №8 : просп. Соборности, 38а', 'woocommerce' ),
'Луцк - Отделение №9 : ул. Ровненская, 25' => __('Луцк - Отделение №9 : ул. Ровненская, 25', 'woocommerce' ),
'Луцк - Отделение № 10 : просп. Воли, 21' => __('Луцк - Отделение № 10 : просп. Воли, 21', 'woocommerce' ),
'Луцк - Отделение № 11 : ул. Кривой Вал, 24' => __('Луцк - Отделение № 11 : ул. Кривой Вал, 24', 'woocommerce' ),
'Луцк - Отделение №12 : бульв. Дружбы Народов, 4' => __('Луцк - Отделение №12 : бульв. Дружбы Народов, 4', 'woocommerce' ),
'Лысянка - Отделение №1: ул. Кирова, 4' => __('Лысянка - Отделение №1: ул. Кирова, 4', 'woocommerce' ),
'Львов - Отделение №1: ул. Городоцкая, 355/6' => __('Львов - Отделение №1: ул. Городоцкая, 355/6', 'woocommerce' ),
'Львов - Отделение №2: ул. Пластова, 7' => __('Львов - Отделение №2: ул. Пластова, 7', 'woocommerce' ),
'Львов - Отделение №3: ул. Угорская, 22' => __('Львов - Отделение №3: ул. Угорская, 22', 'woocommerce' ),
'Львов - Отделение №4: ул. Кульпарковская, 93а' => __('Львов - Отделение №4: ул. Кульпарковская, 93а', 'woocommerce' ),
'Львов - Отделение №5 : ул. Данилишина, 2' => __('Львов - Отделение №5 : ул. Данилишина, 2', 'woocommerce' ),
'Львов - Отделение №6 : ул. Сиховская, 8' => __('Львов - Отделение №6 : ул. Сиховская, 8', 'woocommerce' ),
'Львов - Отделение №7 : ул. Лычаковская, 15' => __('Львов - Отделение №7 : ул. Лычаковская, 15', 'woocommerce' ),
'Львов - Отделение № 8 : ул. Гетьмана Ивана Мазепы, 37' => __('Львов - Отделение № 8 : ул. Гетьмана Ивана Мазепы, 37', 'woocommerce' ),
'Львов - Отделение № 9: ул. Кульпарковская, 142' => __('Львов - Отделение № 9: ул. Кульпарковская, 142', 'woocommerce' ),
'Львов - Отделение №10 : ул. Левицкого, 7' => __('Львов - Отделение №10 : ул. Левицкого, 7', 'woocommerce' ),
'Львов - Отделение №11 : ул. Городоцкая, 120' => __('Львов - Отделение №11 : ул. Городоцкая, 120', 'woocommerce' ),
'Львов - Отделение №12 : ул. Сирка, 21, (р-н Левандовка)' => __('Львов - Отделение №12 : ул. Сирка, 21, (р-н Левандовка)', 'woocommerce' ),
'Львов - Отделение №13: ул. Ставова, 7в' => __('Львов - Отделение №13: ул. Ставова, 7в', 'woocommerce' ),
'Львов - Отделение №14 : ул. Словацкого, 5' => __('Львов - Отделение №14 : ул. Словацкого, 5', 'woocommerce' ),
'Львов - Отделение №15 : ул. Героев УПА, 6' => __('Львов - Отделение №15 : ул. Героев УПА, 6', 'woocommerce' ),
'Львов - Отделение №16 : просп. Красной Калины, 76' => __('Львов - Отделение №16 : просп. Красной Калины, 76', 'woocommerce' ),
'Львов - Отделение №17: ул. Шевченка, 323' => __('Львов - Отделение №17: ул. Шевченка, 323', 'woocommerce' ),
'Львов - Отделение №18  : ул. Научная, 12а' => __('Львов - Отделение №18  : ул. Научная, 12а', 'woocommerce' ),
'Львов - Отделение №19 : ул. Академика А. Сахарова, 82' => __('Львов - Отделение №19 : ул. Академика А. Сахарова, 82', 'woocommerce' ),
'Львов - Отделение № 20: ул. Медовой Пещеры, 7' => __('Львов - Отделение № 20: ул. Медовой Пещеры, 7', 'woocommerce' ),
'Львов - Отделение № 21 , Parcel Shop: ул. Джорджа Вашингтона, 8' => __('Львов - Отделение № 21 , Parcel Shop: ул. Джорджа Вашингтона, 8', 'woocommerce' ),
'Любар - Отделение №1: ул. Райрады, 3' => __('Любар - Отделение №1: ул. Райрады, 3', 'woocommerce' ),
'Любашевка - Отделение: ул. Ленина, 94' => __('Любашевка - Отделение: ул. Ленина, 94', 'woocommerce' ),
'Любешов - Отделение: ул. Независимости, 60' => __('Любешов - Отделение: ул. Независимости, 60', 'woocommerce' ),
'Любомль - Отделение: ул. 1-го Мая, 18' => __('Любомль - Отделение: ул. 1-го Мая, 18', 'woocommerce' ),
'Люботин - Отделение: ул. Советская, 32/2-19' => __('Люботин - Отделение: ул. Советская, 32/2-19', 'woocommerce' ),
'Лютенька - Отделение № 1: ул. Дружбы, 52' => __('Лютенька - Отделение № 1: ул. Дружбы, 52', 'woocommerce' ),
'Магдалиновка - Отделение: ул. Красноармейская, 2а' => __('Магдалиновка - Отделение: ул. Красноармейская, 2а', 'woocommerce' ),
'Магдалиновка - Отделение № 2 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Советская, 26а' => __('Магдалиновка - Отделение № 2 , ТОЧКА ВЫДАЧИ "ПРИВАТ БАНКА": ул. Советская, 26а', 'woocommerce' ),
'Макаров - Отделение № 1: ул. Комсомольская, 1' => __('Макаров - Отделение № 1: ул. Комсомольская, 1', 'woocommerce' ),
'Малая Виска - Отделение №1: ул. Киевская, 9а' => __('Малая Виска - Отделение №1: ул. Киевская, 9а', 'woocommerce' ),
'Малехов - Отделение №1: ул. Новая, 20а' => __('Малехов - Отделение №1: ул. Новая, 20а', 'woocommerce' ),
'Малин - Отделение №1: ул. Грушевского, 47' => __('Малин - Отделение №1: ул. Грушевского, 47', 'woocommerce' ),
'Малин - Отделение №2 : ул. Кримского, 2' => __('Малин - Отделение №2 : ул. Кримского, 2', 'woocommerce' ),
'Малиновка (Харьковская обл.) - Отделение № 1: пл. 1-го Мая, 3' => __('Малиновка (Харьковская обл.) - Отделение № 1: пл. 1-го Мая, 3', 'woocommerce' ),
'Мамаевцы - Отделение: ул. Шевченка, 158' => __('Мамаевцы - Отделение: ул. Шевченка, 158', 'woocommerce' ),
'Мангуш - Отделение: ул. Ленина,109' => __('Мангуш - Отделение: ул. Ленина,109', 'woocommerce' ),
'Маневичи - Отделение №1: ул. Луцкая, 19' => __('Маневичи - Отделение №1: ул. Луцкая, 19', 'woocommerce' ),
'Маньковка - Отделение: ул. Шевченко, 22' => __('Маньковка - Отделение: ул. Шевченко, 22', 'woocommerce' ),
'Марганец - Отделение: ул. Парковая, 8' => __('Марганец - Отделение: ул. Парковая, 8', 'woocommerce' ),
'Мариуполь - Отделение №1: бульв. Шевченко, 313 (22-й м-рн)' => __('Мариуполь - Отделение №1: бульв. Шевченко, 313 (22-й м-рн)', 'woocommerce' ),
'Мариуполь - Отделение №2: ул. Варганова, 10' => __('Мариуполь - Отделение №2: ул. Варганова, 10', 'woocommerce' ),
'Мариуполь - Отделение №3: ул. Ломизова, 1 (Левый берег)' => __('Мариуполь - Отделение №3: ул. Ломизова, 1 (Левый берег)', 'woocommerce' ),
'Мариуполь - Отделение №4: просп. Нахимова, 108' => __('Мариуполь - Отделение №4: просп. Нахимова, 108', 'woocommerce' ),
'Мариуполь - Отделение №5: ул. Артема, 33 (Центр)' => __('Мариуполь - Отделение №5: ул. Артема, 33 (Центр)', 'woocommerce' ),
'Мариуполь - Отделение № 6: ул. Георгиевская, 10 (Центр)' => __('Мариуполь - Отделение № 6: ул. Георгиевская, 10 (Центр)', 'woocommerce' ),
'Мариуполь - Отделение №7 : просп. Строителей, 86 (в районе магазина "Тысяча мелочей")' => __('Мариуполь - Отделение №7 : просп. Строителей, 86 (в районе магазина "Тысяча мелочей")', 'woocommerce' ),
'Мариуполь - Отделение №8: просп. Победы, 70 (Левый берег)' => __('Мариуполь - Отделение №8: просп. Победы, 70 (Левый берег)', 'woocommerce' ),
'Мариуполь - Отделение №9 : просп. Металлургов, 175 (ориентир магазин "Каспий")' => __('Мариуполь - Отделение №9 : просп. Металлургов, 175 (ориентир магазин "Каспий")', 'woocommerce' ),
'Мариуполь - Отделение №11: просп. Ильича, 69 (напротив кафе "Никополь-Провиданс")' => __('Мариуполь - Отделение №11: просп. Ильича, 69 (напротив кафе "Никополь-Провиданс")', 'woocommerce' ),
'Мариуполь - Отделение №12: просп. Ленина, 121 (ориентир магазин "Надія")' => __('Мариуполь - Отделение №12: просп. Ленина, 121 (ориентир магазин "Надія")', 'woocommerce' ),
'Марковка - Отделение: ул. Лермонтова, 18' => __('Марковка - Отделение: ул. Лермонтова, 18', 'woocommerce' ),
'Машевка - Отделение: ул. Ленина, 109' => __('Машевка - Отделение: ул. Ленина, 109', 'woocommerce' ),
'Меджибож - Отделение №1: ул. Советская, 1' => __('Меджибож - Отделение №1: ул. Советская, 1', 'woocommerce' ),
'Межгорье - Отделение: ул. Промышленная, 3' => __('Межгорье - Отделение: ул. Промышленная, 3', 'woocommerce' ),
'Межевая - Отделение №1: ул. Карла Маркса, 26' => __('Межевая - Отделение №1: ул. Карла Маркса, 26', 'woocommerce' ),
'Мелиоративное (Новомосковский р-н) - Отделение № 1: ул. Молодежная, 26' => __('Мелиоративное (Новомосковский р-н) - Отделение № 1: ул. Молодежная, 26', 'woocommerce' ),
'Мелитополь - Отделение №1: ул. Дзержинского, 21/1 (админ. корпус завода "Агат", ул. Ленина, 2)' => __('Мелитополь - Отделение №1: ул. Дзержинского, 21/1 (админ. корпус завода "Агат", ул. Ленина, 2)', 'woocommerce' ),
'Мелитополь - Отделение №2 : просп. Богдана Хмельницкого, 58/1' => __('Мелитополь - Отделение №2 : просп. Богдана Хмельницкого, 58/1', 'woocommerce' ),
'Мелитополь - Отделение № 3 : ул. 50-летия Победы, 29' => __('Мелитополь - Отделение № 3 : ул. 50-летия Победы, 29', 'woocommerce' ),
'Мелитополь - Отделение №4: ул. Дзержинского, 114/1' => __('Мелитополь - Отделение №4: ул. Дзержинского, 114/1', 'woocommerce' ),
'Мелитополь - Отделение №5 : ул. Дзержинского, 291/1' => __('Мелитополь - Отделение №5 : ул. Дзержинского, 291/1', 'woocommerce' ),
'Меловое - Отделение: ул. Дружбы народов, 103' => __('Меловое - Отделение: ул. Дружбы народов, 103', 'woocommerce' ),
'Мена - Отделение: ул. Красноармейская, 1' => __('Мена - Отделение: ул. Красноармейская, 1', 'woocommerce' ),
'Мерефа - Отделение: ул. Савченко, 1в' => __('Мерефа - Отделение: ул. Савченко, 1в', 'woocommerce' ),
'Мизоч - Отделение №1: ул. Липки, 25' => __('Мизоч - Отделение №1: ул. Липки, 25', 'woocommerce' ),
'Микулинцы - Отделение №1: ул. Грушевского, 42' => __('Микулинцы - Отделение №1: ул. Грушевского, 42', 'woocommerce' ),
'Милая - Отделение № 1: ул. Комарова, 38' => __('Милая - Отделение № 1: ул. Комарова, 38', 'woocommerce' ),
'Миргород - Отделение: ул. Гоголя, 4' => __('Миргород - Отделение: ул. Гоголя, 4', 'woocommerce' ),
'Миргород - Отделение №2 : ул. Сорочинская, 2а' => __('Миргород - Отделение №2 : ул. Сорочинская, 2а', 'woocommerce' ),
'Миргород - Отделение №3: ул. Гоголя, 170в' => __('Миргород - Отделение №3: ул. Гоголя, 170в', 'woocommerce' ),
'Мироновка - Отделение №1: ул. Ленина, 50' => __('Мироновка - Отделение №1: ул. Ленина, 50', 'woocommerce' ),
'Михайловка (Михайловский р-н. Запорожская обл.) - Отделение: ул. 50-летия ВЛКСМ, 19' => __('Михайловка (Михайловский р-н. Запорожская обл.) - Отделение: ул. 50-летия ВЛКСМ, 19', 'woocommerce' ),
'Михайловка (Черкаська обл.) - Отделение № 1: ул. Ленина, 2в' => __('Михайловка (Черкаська обл.) - Отделение № 1: ул. Ленина, 2в', 'woocommerce' ),
'Млинов - Отделение №1: ул. Полищука, 61' => __('Млинов - Отделение №1: ул. Полищука, 61', 'woocommerce' ),
'Могилев - Подольский - Отделение: ул. Покровская, 22' => __('Могилев - Подольский - Отделение: ул. Покровская, 22', 'woocommerce' ),
'Молочанск - Отделение №1: ул. Шевченко, 120' => __('Молочанск - Отделение №1: ул. Шевченко, 120', 'woocommerce' ),
'Монастыриска - Отделение №1: ул. Шевченко, 15 (проходная табачной фабрики)' => __('Монастыриска - Отделение №1: ул. Шевченко, 15 (проходная табачной фабрики)', 'woocommerce' ),
'Монастырище - Отделение: ул. Чапаева, 36' => __('Монастырище - Отделение: ул. Чапаева, 36', 'woocommerce' ),
'Моршин - Отделение №1: ул. Привокзальная, 53б' => __('Моршин - Отделение №1: ул. Привокзальная, 53б', 'woocommerce' ),
'Мостиска - Отделение: ул. Галицкая, 56' => __('Мостиска - Отделение: ул. Галицкая, 56', 'woocommerce' ),
'Мостки (Сватовский р-н) - Отделение №1: ул. Советская, 10а' => __('Мостки (Сватовский р-н) - Отделение №1: ул. Советская, 10а', 'woocommerce' ),
'Мошны - Отделение №1: ул. Ленина, 110' => __('Мошны - Отделение №1: ул. Ленина, 110', 'woocommerce' ),
'Мукачево - Отделение №1: ул. Академика Морозова, 20' => __('Мукачево - Отделение №1: ул. Академика Морозова, 20', 'woocommerce' ),
'Мукачево - Отделение №2 : ул. Мира, 55' => __('Мукачево - Отделение №2 : ул. Мира, 55', 'woocommerce' ),
'Мукачево - Отделение №3 : ул. Осипенка, 35в' => __('Мукачево - Отделение №3 : ул. Осипенка, 35в', 'woocommerce' ),
'Мукачево - Отделение №4: ул. Комунаров, 36' => __('Мукачево - Отделение №4: ул. Комунаров, 36', 'woocommerce' ),
'Мурованые Куриловцы - Отделение: ул. Ленина, 71' => __('Мурованые Куриловцы - Отделение: ул. Ленина, 71', 'woocommerce' ),
'Надворная - Отделение №1: ул. Мазепы, 34' => __('Надворная - Отделение №1: ул. Мазепы, 34', 'woocommerce' ),
'Народичи - Отделение: ул. 1-го Мая,19' => __('Народичи - Отделение: ул. 1-го Мая,19', 'woocommerce' ),
'Наталино (Красноградский р-н) - Отделение №1: ул. Красноармейская, 38' => __('Наталино (Красноградский р-н) - Отделение №1: ул. Красноармейская, 38', 'woocommerce' ),
'Недригайлов (Сумская обл.) - Отделение: ул. Ленина, 24' => __('Недригайлов (Сумская обл.) - Отделение: ул. Ленина, 24', 'woocommerce' ),
'Нежин - Отделение №1: ул. Генерала Корчагина, 2' => __('Нежин - Отделение №1: ул. Генерала Корчагина, 2', 'woocommerce' ),
'Нежин - Отделение №2 : ул. Московская, 11' => __('Нежин - Отделение №2 : ул. Московская, 11', 'woocommerce' ),
'Немешаево - Отделение: ул. 50 лет СССР, 1/1' => __('Немешаево - Отделение: ул. 50 лет СССР, 1/1', 'woocommerce' ),
'Немиров (Винница) - Отделение: ул. Горького, 93' => __('Немиров (Винница) - Отделение: ул. Горького, 93', 'woocommerce' ),
'Неполоковцы - Отделение №1: ул. Главная, 28' => __('Неполоковцы - Отделение №1: ул. Главная, 28', 'woocommerce' ),
'Нетешин - Отделение №1: ул. Высоцкого, 3' => __('Нетешин - Отделение №1: ул. Высоцкого, 3', 'woocommerce' ),
'Нижние Серогозы - Отделение №1: ул. Ленина, 6' => __('Нижние Серогозы - Отделение №1: ул. Ленина, 6', 'woocommerce' ),
'Николаев - Отделение №1: ул. 1-я Слободская, 62' => __('Николаев - Отделение №1: ул. 1-я Слободская, 62', 'woocommerce' ),
'Николаев - Отделение №2: ул. Мореходная, 1а' => __('Николаев - Отделение №2: ул. Мореходная, 1а', 'woocommerce' ),
'Николаев - Отделение №3: ул. Электронная, 81/7' => __('Николаев - Отделение №3: ул. Электронная, 81/7', 'woocommerce' ),
'Николаев - Отделение №4: просп. Октябрьский, 330' => __('Николаев - Отделение №4: просп. Октябрьский, 330', 'woocommerce' ),
'Николаев - Отделение №5: просп. Героев Сталинграда, 77/1' => __('Николаев - Отделение №5: просп. Героев Сталинграда, 77/1', 'woocommerce' ),
'Николаев - Отделение №6: ул. Советская, 13/4' => __('Николаев - Отделение №6: ул. Советская, 13/4', 'woocommerce' ),
'Николаев - Отделение №7 : ул. Космонавтов, 62' => __('Николаев - Отделение №7 : ул. Космонавтов, 62', 'woocommerce' ),
'Николаев - Отделение №8 : ул. Никольская, 49' => __('Николаев - Отделение №8 : ул. Никольская, 49', 'woocommerce' ),
'Николаев - Отделение № 9: ул. Генерала Карпенка, 2/2 а' => __('Николаев - Отделение № 9: ул. Генерала Карпенка, 2/2 а', 'woocommerce' ),
'Николаев - Отделение №10 : просп.Ленина, 86/3' => __('Николаев - Отделение №10 : просп.Ленина, 86/3', 'woocommerce' ),
'Николаев - Отделение №11 : просп.Мира, 13' => __('Николаев - Отделение №11 : просп.Мира, 13', 'woocommerce' ),
'Николаев - Отделение №12 : ул. Пушкинская, 33' => __('Николаев - Отделение №12 : ул. Пушкинская, 33', 'woocommerce' ),
'Николаев - Отделение №13: ул. Красных Маёвщиков, 17/7' => __('Николаев - Отделение №13: ул. Красных Маёвщиков, 17/7', 'woocommerce' ),
'Николаев - Отделение №14: просп. Ленина, 159' => __('Николаев - Отделение №14: просп. Ленина, 159', 'woocommerce' ),
'Николаев - Отделение № 15 : ул. Космонавтов, 53/1' => __('Николаев - Отделение № 15 : ул. Космонавтов, 53/1', 'woocommerce' ),
'Николаев(Львов) - Отделение: ул. Чайковского, 18' => __('Николаев(Львов) - Отделение: ул. Чайковского, 18', 'woocommerce' ),
'Николаевка (Донецк) - Отделение: ул. Пархоменка, 5' => __('Николаевка (Донецк) - Отделение: ул. Пархоменка, 5', 'woocommerce' ),
'Николаевка (Одесса) - Отделение №1: ул. Калинина, 70' => __('Николаевка (Одесса) - Отделение №1: ул. Калинина, 70', 'woocommerce' ),
'Никополь - Отделение №1: ул. Лесная, 1' => __('Никополь - Отделение №1: ул. Лесная, 1', 'woocommerce' ),
'Никополь - Отделение № 2: ул. Электрометаллургов, 4а' => __('Никополь - Отделение № 2: ул. Электрометаллургов, 4а', 'woocommerce' ),
'Никополь - Отделение № 3: просп. Трубников, 32, кв. 1-2' => __('Никополь - Отделение № 3: просп. Трубников, 32, кв. 1-2', 'woocommerce' ),
'Никополь - Отделение №4: ул. Добролюбова, 42' => __('Никополь - Отделение №4: ул. Добролюбова, 42', 'woocommerce' ),
'Новая Басань - Отделение № 1: ул. Шевченко, 40а' => __('Новая Басань - Отделение № 1: ул. Шевченко, 40а', 'woocommerce' ),
'Новая Боровая - Отделение №1: ул. Октябрьская, 1' => __('Новая Боровая - Отделение №1: ул. Октябрьская, 1', 'woocommerce' ),
'Новая Водолага - Отделение: ул. Гагарина, 12' => __('Новая Водолага - Отделение: ул. Гагарина, 12', 'woocommerce' ),
'Новая Збурьевка - Отделение №1: просп. Гагарина, 1а' => __('Новая Збурьевка - Отделение №1: просп. Гагарина, 1а', 'woocommerce' ),
'Новая Каховка - Отделение №1: ул. Промышленная, 5' => __('Новая Каховка - Отделение №1: ул. Промышленная, 5', 'woocommerce' ),
'Новая Каховка - Отделение № 2: ул. Горького, 7а' => __('Новая Каховка - Отделение № 2: ул. Горького, 7а', 'woocommerce' ),
'Новая Одесса - Отделение: ул. Ленина, 175' => __('Новая Одесса - Отделение: ул. Ленина, 175', 'woocommerce' ),
'Новая Ушица - Отделение №1: ул. Подольская, 36е/1' => __('Новая Ушица - Отделение №1: ул. Подольская, 36е/1', 'woocommerce' ),
'Новгород-Северский - Отделение: ул. Шевченко, 23' => __('Новгород-Северский - Отделение: ул. Шевченко, 23', 'woocommerce' ),
'Новгородка - Отделение №1: ул. Кирова, 12' => __('Новгородка - Отделение №1: ул. Кирова, 12', 'woocommerce' ),
'Новоайдар - Отделение: ул. Пролетарская, 46а' => __('Новоайдар - Отделение: ул. Пролетарская, 46а', 'woocommerce' ),
'Новоалександровка (Херсонская обл.) - Отделение №1: ул. 1-го Мая, 96' => __('Новоалександровка (Херсонская обл.) - Отделение №1: ул. 1-го Мая, 96', 'woocommerce' ),
'Новоархангельск - Отделение № 1: ул. Ленина, 20/6а' => __('Новоархангельск - Отделение № 1: ул. Ленина, 20/6а', 'woocommerce' ),
'Нововолынск - Отделение №1: ул. Луцкая, 25' => __('Нововолынск - Отделение №1: ул. Луцкая, 25', 'woocommerce' ),
'Нововолынск - Отделение №2 : просп. Победы, 19 (напротив Водоканала)' => __('Нововолынск - Отделение №2 : просп. Победы, 19 (напротив Водоканала)', 'woocommerce' ),
'Нововолынск - Отделение №3 : ул. Нововолынская, 53 (напротив школы №2)' => __('Нововолынск - Отделение №3 : ул. Нововолынская, 53 (напротив школы №2)', 'woocommerce' ),
'Нововоронцовка - Отделение: ул. Суворова, 2а' => __('Нововоронцовка - Отделение: ул. Суворова, 2а', 'woocommerce' ),
'Новоград-Волынский - Отделение: ул. Вокзальная, 6' => __('Новоград-Волынский - Отделение: ул. Вокзальная, 6', 'woocommerce' ),
'Новоград-Волынский - Отделение № 2 : ул. Воли, 9' => __('Новоград-Волынский - Отделение № 2 : ул. Воли, 9', 'woocommerce' ),
'Новоград-Волынский - Отделение №3 : ул. Пушкина, 3' => __('Новоград-Волынский - Отделение №3 : ул. Пушкина, 3', 'woocommerce' ),
'Новогродовка - Отделение №1: ул. 40 лет Октября, 19' => __('Новогродовка - Отделение №1: ул. 40 лет Октября, 19', 'woocommerce' ),
'Новоднестровск - Отделение: Квартал 22, буд. 1а' => __('Новоднестровск - Отделение: Квартал 22, буд. 1а', 'woocommerce' ),
'Новое - Отделение №1: ул. Металургов, 10' => __('Новое - Отделение №1: ул. Металургов, 10', 'woocommerce' ),
'Новомиргород - Отделение №1: ул. Шевченка, 48' => __('Новомиргород - Отделение №1: ул. Шевченка, 48', 'woocommerce' ),
'Новомосковск - Отделение №1: ул. Ковалёва, 29А' => __('Новомосковск - Отделение №1: ул. Ковалёва, 29А', 'woocommerce' ),
'Новомосковск - Отделение №2 : ул. Великая Ковалевка, 6' => __('Новомосковск - Отделение №2 : ул. Великая Ковалевка, 6', 'woocommerce' ),
'Новомосковск - Отделение № 3 : ул. Советская, 48 б' => __('Новомосковск - Отделение № 3 : ул. Советская, 48 б', 'woocommerce' ),
'Новомосковск - Отделение №4: ул. Красноармейская, 24' => __('Новомосковск - Отделение №4: ул. Красноармейская, 24', 'woocommerce' ),
'Новониколаевка (Запорожская обл.) - Отделение №1: ул. Космическая, 7' => __('Новониколаевка (Запорожская обл.) - Отделение №1: ул. Космическая, 7', 'woocommerce' ),
'Новопокровка (Харьковская обл.) - Отделение № 1: ул. Петровского, 1ж' => __('Новопокровка (Харьковская обл.) - Отделение № 1: ул. Петровского, 1ж', 'woocommerce' ),
'Новопсков - Отделение: ул. Ленина, 10' => __('Новопсков - Отделение: ул. Ленина, 10', 'woocommerce' ),
'Новоселица - Отделение: ул. Пирогова, 15 а' => __('Новоселица - Отделение: ул. Пирогова, 15 а', 'woocommerce' ),
'Новоселки (Киево-Святошинский р-н) - Отделение №1: ул. Васильковская, 2а' => __('Новоселки (Киево-Святошинский р-н) - Отделение №1: ул. Васильковская, 2а', 'woocommerce' ),
'Новотроицкое (Херсонская обл.) - Отделение: ул. Пушкина, 8 а' => __('Новотроицкое (Херсонская обл.) - Отделение: ул. Пушкина, 8 а', 'woocommerce' ),
'Новоукраинка - Отделение: ул. Ленина, 62' => __('Новоукраинка - Отделение: ул. Ленина, 62', 'woocommerce' ),
'Новояворовск - Отделение: ул. Ив. Мазепы, 2' => __('Новояворовск - Отделение: ул. Ив. Мазепы, 2', 'woocommerce' ),
'Новые Белокоровичи - Отделение №1: ул. Фрунзе, 7' => __('Новые Белокоровичи - Отделение №1: ул. Фрунзе, 7', 'woocommerce' ),
'Новые Петровцы - Отделение: ул. Ленина, 222' => __('Новые Петровцы - Отделение: ул. Ленина, 222', 'woocommerce' ),
'Новые Санжары - Отделение: ул. Октябрьская, 76' => __('Новые Санжары - Отделение: ул. Октябрьская, 76', 'woocommerce' ),
'Новый Буг - Отделение: ул. Красная Площадь, 26' => __('Новый Буг - Отделение: ул. Красная Площадь, 26', 'woocommerce' ),
'Новый Быков - Отделение № 1: ул. Ленина, 25а' => __('Новый Быков - Отделение № 1: ул. Ленина, 25а', 'woocommerce' ),
'Новый Калинов - Отделение №1: пл. Авиации, 24/11' => __('Новый Калинов - Отделение №1: пл. Авиации, 24/11', 'woocommerce' ),
'Новый Роздол - Отделение: ул. Яворницкого,8' => __('Новый Роздол - Отделение: ул. Яворницкого,8', 'woocommerce' ),
'Новый Ярычев - Отделение №1: ул. Независимости, 1' => __('Новый Ярычев - Отделение №1: ул. Независимости, 1', 'woocommerce' ),
'Носовка - Отделение: ул. Вокзальная, 2' => __('Носовка - Отделение: ул. Вокзальная, 2', 'woocommerce' ),
'Обертин - Отделение №1: ул. Хотимирская, 1' => __('Обертин - Отделение №1: ул. Хотимирская, 1', 'woocommerce' ),
'Оболонь (Семеновский р-н) - Отделение № 1: ул. Котляревского, 2а' => __('Оболонь (Семеновский р-н) - Отделение № 1: ул. Котляревского, 2а', 'woocommerce' ),
'Обухов - Отделение № 1: ул. Октябрьская, 14а' => __('Обухов - Отделение № 1: ул. Октябрьская, 14а', 'woocommerce' ),
'Обухов - Отделение №2: ул. Киевская, 121ж' => __('Обухов - Отделение №2: ул. Киевская, 121ж', 'woocommerce' ),
'Обухов - Отделение №3 : ул. Киевская, 60а' => __('Обухов - Отделение №3 : ул. Киевская, 60а', 'woocommerce' ),
'Овидиополь - Отделение: ул. Дзержинского, 40' => __('Овидиополь - Отделение: ул. Дзержинского, 40', 'woocommerce' ),
'Овруч - Отделение №1: ул. Базарная, 3' => __('Овруч - Отделение №1: ул. Базарная, 3', 'woocommerce' ),
'Овруч - Отделение №2 : ул. Советская, 60' => __('Овруч - Отделение №2 : ул. Советская, 60', 'woocommerce' ),
'Одесса - Отделение №1: Ленинградское шоссе, 28' => __('Одесса - Отделение №1: Ленинградское шоссе, 28', 'woocommerce' ),
'Одесса - Отделение №2: ул. Базовая, 16 (Промрынок, 7 км)*' => __('Одесса - Отделение №2: ул. Базовая, 16 (Промрынок, 7 км)*', 'woocommerce' ),
'Одесса - Отделение №3: ул. Дальницкая, 23/4' => __('Одесса - Отделение №3: ул. Дальницкая, 23/4', 'woocommerce' ),
'Одесса - Отделение №4: ул. Академика Вильямса, 86' => __('Одесса - Отделение №4: ул. Академика Вильямса, 86', 'woocommerce' ),
'Одесса - Отделение №5 : ул. Академика Филатова, 24' => __('Одесса - Отделение №5 : ул. Академика Филатова, 24', 'woocommerce' ),
'Одесса - Отделение №6: с. Котовка, ул. Кооперативная, 2а (Авторынок "Куяльник")' => __('Одесса - Отделение №6: с. Котовка, ул. Кооперативная, 2а (Авторынок "Куяльник")', 'woocommerce' ),
'Одесса - Отделение №7 : ул. Польская, 9/13' => __('Одесса - Отделение №7 : ул. Польская, 9/13', 'woocommerce' ),
'Одесса - Отделение №8 : ул. Тираспольская, 31 (ЦЕНТР)' => __('Одесса - Отделение №8 : ул. Тираспольская, 31 (ЦЕНТР)', 'woocommerce' ),
'Одесса - Отделение №9 : ул. Сегедская, 14' => __('Одесса - Отделение №9 : ул. Сегедская, 14', 'woocommerce' ),
'Одесса - Отделение №10 : ул. Затонского, 4' => __('Одесса - Отделение №10 : ул. Затонского, 4', 'woocommerce' ),
'Одесса - Отделение №11: ул. Николаевская дорога, 243' => __('Одесса - Отделение №11: ул. Николаевская дорога, 243', 'woocommerce' ),
'Одесса - Отделение №12 : пер. Маяковского, 9' => __('Одесса - Отделение №12 : пер. Маяковского, 9', 'woocommerce' ),
'Одесса - Отделение № 13 : ул. Днепропетровская дорога, 82' => __('Одесса - Отделение № 13 : ул. Днепропетровская дорога, 82', 'woocommerce' ),
'Одесса - Отделение № 14: ул. Маршала Малиновского, 71' => __('Одесса - Отделение № 14: ул. Маршала Малиновского, 71', 'woocommerce' ),
'Одесса - Отделение №15: Тираспольское шоссе, 15б' => __('Одесса - Отделение №15: Тираспольское шоссе, 15б', 'woocommerce' ),
'Одесса - Отделение №16: ул. Академика Королева, 1' => __('Одесса - Отделение №16: ул. Академика Королева, 1', 'woocommerce' ),
'Одесса - Отделение № 17 : ул. Разумовская, 29' => __('Одесса - Отделение № 17 : ул. Разумовская, 29', 'woocommerce' ),
'Одесса - Отделение № 18: ул. Фонтанская дорога, 16/8' => __('Одесса - Отделение № 18: ул. Фонтанская дорога, 16/8', 'woocommerce' ),
'Одесса - Отделение №19: ул. Радостная, 23' => __('Одесса - Отделение №19: ул. Радостная, 23', 'woocommerce' ),
'Одесса - Отделение №20: ул. Малая Арнаутская 119' => __('Одесса - Отделение №20: ул. Малая Арнаутская 119', 'woocommerce' ),
'Одесса - Отделение № 21: просп. Александровский, 21' => __('Одесса - Отделение № 21: просп. Александровский, 21', 'woocommerce' ),
'Одесса - Отделение № 22: ул. Новосельского, 19' => __('Одесса - Отделение № 22: ул. Новосельского, 19', 'woocommerce' ),
'Одесса - Отделение №23: ул. Сахарова, 36' => __('Одесса - Отделение №23: ул. Сахарова, 36', 'woocommerce' ),
'Одесса - Отделение №24 : ул. Среднефонтанская, 34' => __('Одесса - Отделение №24 : ул. Среднефонтанская, 34', 'woocommerce' ),
'Одесса - Отделение №25: просп. Адмиральский, 18' => __('Одесса - Отделение №25: просп. Адмиральский, 18', 'woocommerce' ),
'Одесса - Отделение №26: ул. Днепропетровская дорога, 113б' => __('Одесса - Отделение №26: ул. Днепропетровская дорога, 113б', 'woocommerce' ),
'Одесса - Отделение №27 : ул. Бочарова, 6' => __('Одесса - Отделение №27 : ул. Бочарова, 6', 'woocommerce' ),
'Одесса - Отделение №28: ул. Академика Королева, 94' => __('Одесса - Отделение №28: ул. Академика Королева, 94', 'woocommerce' ),
'Одесса - Отделение №29: ул. 25-й Чапаевской дивизии, 17' => __('Одесса - Отделение №29: ул. 25-й Чапаевской дивизии, 17', 'woocommerce' ),
'Одесса - Отделение №30: ул. Успенская, 7' => __('Одесса - Отделение №30: ул. Успенская, 7', 'woocommerce' ),
'Одесса - Отделение №31(до 30 кг на одно место): ул. Героев Сталинграда, 52' => __('Одесса - Отделение №31(до 30 кг на одно место): ул. Героев Сталинграда, 52', 'woocommerce' ),
'Одесса - Отделение №32: ул. Фонтанская дорога, 58' => __('Одесса - Отделение №32: ул. Фонтанская дорога, 58', 'woocommerce' ),
'Одесса - Отделение №33 : ул. Романа Кармена, 15 (просп. Шевченка)' => __('Одесса - Отделение №33 : ул. Романа Кармена, 15 (просп. Шевченка)', 'woocommerce' ),
'Одесса - Отделение №34 : ул. Сергея Ядова, 16а' => __('Одесса - Отделение №34 : ул. Сергея Ядова, 16а', 'woocommerce' ),
'Одесса - Отделение №35: ул. Академика Королева, 46' => __('Одесса - Отделение №35: ул. Академика Королева, 46', 'woocommerce' ),
'Одесса - Отделение №36: ул. Гайдара, 5' => __('Одесса - Отделение №36: ул. Гайдара, 5', 'woocommerce' ),
'Оженин - Отделение: ул. Мирная, 21' => __('Оженин - Отделение: ул. Мирная, 21', 'woocommerce' ),
'Олевск - Отделение: ул. Промислова, 27' => __('Олевск - Отделение: ул. Промислова, 27', 'woocommerce' ),
'Ольгополь - Отделение №1: ул. 1-го Мая, 26' => __('Ольгополь - Отделение №1: ул. 1-го Мая, 26', 'woocommerce' ),
'Ольшани (Харьковская обл.) - Отделение №1: ул. Советская, 2' => __('Ольшани (Харьковская обл.) - Отделение №1: ул. Советская, 2', 'woocommerce' ),
'Ольшанка (Кировоградская обл.) - Отделение №1: ул. Лагодны, 17' => __('Ольшанка (Кировоградская обл.) - Отделение №1: ул. Лагодны, 17', 'woocommerce' ),
'Оноковцы (ст. Доманинцы) - Отделение №1: ул. Доманинская, 308а' => __('Оноковцы (ст. Доманинцы) - Отделение №1: ул. Доманинская, 308а', 'woocommerce' ),
'Онуфриевка - Отделение: ул. Михаила Скляра, 13' => __('Онуфриевка - Отделение: ул. Михаила Скляра, 13', 'woocommerce' ),
'Опошня - Отделение: ул. Октябрьская, 21' => __('Опошня - Отделение: ул. Октябрьская, 21', 'woocommerce' ),
'Оратов - Отделение №1: ул. Ленина, 107' => __('Оратов - Отделение №1: ул. Ленина, 107', 'woocommerce' ),
'Орджоникидзе - Отделение: ул. Чехова, 1а' => __('Орджоникидзе - Отделение: ул. Чехова, 1а', 'woocommerce' ),
'Орехов - Отделение: ул. Ленинградских курсантов, 57' => __('Орехов - Отделение: ул. Ленинградских курсантов, 57', 'woocommerce' ),
'Оржица - Отделение №1: ул. Мичурина, 1' => __('Оржица - Отделение №1: ул. Мичурина, 1', 'woocommerce' ),
'Остер - Отделение № 1: ул. Гагарина, 12' => __('Остер - Отделение № 1: ул. Гагарина, 12', 'woocommerce' ),
'Острог - Отделение:ул. Князей Острожских, 3' => __('Острог - Отделение:ул. Князей Острожских, 3', 'woocommerce' ),
'Отыния - Отделение №1: ул. Липовая, 44' => __('Отыния - Отделение №1: ул. Липовая, 44', 'woocommerce' ),
'Очаков - Отделение: ул. Луначарского, 18' => __('Очаков - Отделение: ул. Луначарского, 18', 'woocommerce' ),
'Павлоград - Отделение №1: ул. Днепровская, 49 (район СШБ)' => __('Павлоград - Отделение №1: ул. Днепровская, 49 (район СШБ)', 'woocommerce' ),
'Павлоград - Отделение №2 : ул. Ленина, 75' => __('Павлоград - Отделение №2 : ул. Ленина, 75', 'woocommerce' ),
'Павлоград - Отделение №3 : ул. Днепровская, 563а' => __('Павлоград - Отделение №3 : ул. Днепровская, 563а', 'woocommerce' ),
'Павлоград - Отделение №4 : ул. Полтавская, 107/1' => __('Павлоград - Отделение №4 : ул. Полтавская, 107/1', 'woocommerce' ),
'Павлыш - Отделение №1: ул. Ленина, 2а' => __('Павлыш - Отделение №1: ул. Ленина, 2а', 'woocommerce' ),
'Парафиевка - Отделение №1: ул. Шевченко, 97' => __('Парафиевка - Отделение №1: ул. Шевченко, 97', 'woocommerce' ),
'Партизаны - Отделение №1: ул. Геническая, 3а' => __('Партизаны - Отделение №1: ул. Геническая, 3а', 'woocommerce' ),
'Первомайск(Никол.обл.Первомайс.р-н) - Отделение №1: ул. Вознесенская, 52' => __('Первомайск(Никол.обл.Первомайс.р-н) - Отделение №1: ул. Вознесенская, 52', 'woocommerce' ),
'Первомайск(Никол.обл.Первомайс.р-н) - Отделение №2: ул. Достоевского, 2а' => __('Первомайск(Никол.обл.Первомайс.р-н) - Отделение №2: ул. Достоевского, 2а', 'woocommerce' ),
'Первомайск(Никол.обл.Первомайс.р-н) - Отделение №3: ул. Советская, 39' => __('Первомайск(Никол.обл.Первомайс.р-н) - Отделение №3: ул. Советская, 39', 'woocommerce' ),
'Первомайский (Харьковская обл.) - Отделение: ул. Бугайченко, 36' => __('Первомайский (Харьковская обл.) - Отделение: ул. Бугайченко, 36', 'woocommerce' ),
'Первомайское(пгт-Никол.обл.Жовтнев.р-н) - Отделение №1: ул. Юбилейная, 9а' => __('Первомайское(пгт-Никол.обл.Жовтнев.р-н) - Отделение №1: ул. Юбилейная, 9а', 'woocommerce' ),
'Перегинское - Отделение №1: ул. Сечевых Стрельцов, 26' => __('Перегинское - Отделение №1: ул. Сечевых Стрельцов, 26', 'woocommerce' ),
'Перемышляны - Отделение: ул. Привокзальная, 15' => __('Перемышляны - Отделение: ул. Привокзальная, 15', 'woocommerce' ),
'Перечин - Отделение: площадь Народная, 17' => __('Перечин - Отделение: площадь Народная, 17', 'woocommerce' ),
'Перещепино - Отделение №1: микрорайон Кильченский, 10' => __('Перещепино - Отделение №1: микрорайон Кильченский, 10', 'woocommerce' ),
'Переяслав-Хмельницкий - Отделение: ул. Богдана Хмельницкого, 180в' => __('Переяслав-Хмельницкий - Отделение: ул. Богдана Хмельницкого, 180в', 'woocommerce' ),
'Першотравенск (Днепропетровская обл) - Отделение: ул. Октябрьская, 25' => __('Першотравенск (Днепропетровская обл) - Отделение: ул. Октябрьская, 25', 'woocommerce' ),
'Першотравенск (Житомирская обл.) - Отделение №1: ул. Щорса, 6' => __('Першотравенск (Житомирская обл.) - Отделение №1: ул. Щорса, 6', 'woocommerce' ),
'Песковка - Отделение №1: ул. Филиппова, 21б' => __('Песковка - Отделение №1: ул. Филиппова, 21б', 'woocommerce' ),
'Песочин - Отделение №1: ул. Шевченко, 2/82' => __('Песочин - Отделение №1: ул. Шевченко, 2/82', 'woocommerce' ),
'Песчаная (Одесская обл.) - Отделение №1: ул. Приходька, 12, кв. 1' => __('Песчаная (Одесская обл.) - Отделение №1: ул. Приходька, 12, кв. 1', 'woocommerce' ),
'Песчанка - Отделение: ул. Пушкина, 6' => __('Песчанка - Отделение: ул. Пушкина, 6', 'woocommerce' ),
'Песчаный Брод - Отделение № 1: ул. Комсомольская, 20' => __('Песчаный Брод - Отделение № 1: ул. Комсомольская, 20', 'woocommerce' ),
'Петриковка - Отделение: ул. Ленина, 59а' => __('Петриковка - Отделение: ул. Ленина, 59а', 'woocommerce' ),
'Петровка - Роменская - Отделение № 1: ул. Комунистическая, 50' => __('Петровка - Роменская - Отделение № 1: ул. Комунистическая, 50', 'woocommerce' ),
'Петрово - Отделение №1: ул. Литвинова, 19б, (ТРЦ "Мандарин")' => __('Петрово - Отделение №1: ул. Литвинова, 19б, (ТРЦ "Мандарин")', 'woocommerce' ),
'Петропавловка - Отделение: ул. Советская, 44' => __('Петропавловка - Отделение: ул. Советская, 44', 'woocommerce' ),
'Печенеги - Отделение №1: проул. Богдана Хмельницкого, 1' => __('Печенеги - Отделение №1: проул. Богдана Хмельницкого, 1', 'woocommerce' ),
'Пирятин - Отделение: ул. Гребёнковская, 20а' => __('Пирятин - Отделение: ул. Гребёнковская, 20а', 'woocommerce' ),
'Побугское - Отделение №1: ул. Театральная, 9' => __('Побугское - Отделение №1: ул. Театральная, 9', 'woocommerce' ),
'Погребище - Отделение: ул. Шевченка, 30' => __('Погребище - Отделение: ул. Шевченка, 30', 'woocommerce' ),
'Подволочиск - Отделение: ул. Лысенка, 20 А' => __('Подволочиск - Отделение: ул. Лысенка, 20 А', 'woocommerce' ),
'Подгайцы - Отделение: ул. Бережанская, 2' => __('Подгайцы - Отделение: ул. Бережанская, 2', 'woocommerce' ),
'Подгородное - Отделение №1: вул. Партизанская, 60' => __('Подгородное - Отделение №1: вул. Партизанская, 60', 'woocommerce' ),
'Покровское - Отделение: ул. 40 лет Октября, 15' => __('Покровское - Отделение: ул. 40 лет Октября, 15', 'woocommerce' ),
'Пологи - Отделение: ул. Карла Маркса, 291' => __('Пологи - Отделение: ул. Карла Маркса, 291', 'woocommerce' ),
'Полонное - Отделение №1: ул. Ходякова, 27е' => __('Полонное - Отделение №1: ул. Ходякова, 27е', 'woocommerce' ),
'Полтава - Отделение №1: ул. Фрунзе, 225' => __('Полтава - Отделение №1: ул. Фрунзе, 225', 'woocommerce' ),
'Полтава - Отделение №2: ул. Ковпака, 26' => __('Полтава - Отделение №2: ул. Ковпака, 26', 'woocommerce' ),
'Полтава - Отделение №3: ул. Пушкина, 46' => __('Полтава - Отделение №3: ул. Пушкина, 46', 'woocommerce' ),
'Полтава - Отделение №4: ул. Панянка, 65б' => __('Полтава - Отделение №4: ул. Панянка, 65б', 'woocommerce' ),
'Полтава - Отделение №5 : ул. Октябрьская, 73' => __('Полтава - Отделение №5 : ул. Октябрьская, 73', 'woocommerce' ),
'Полтава - Отделение № 6 (до 30 кг одно место): ул. Калинина, 9' => __('Полтава - Отделение № 6 (до 30 кг одно место): ул. Калинина, 9', 'woocommerce' ),
'Полтава - Отделение № 7: ул. М. Бирюзова, 43 а' => __('Полтава - Отделение № 7: ул. М. Бирюзова, 43 а', 'woocommerce' ),
'Полтава - Отделение № 8:: ул. Чураивны 2 в' => __('Полтава - Отделение № 8:: ул. Чураивны 2 в', 'woocommerce' ),
'Полтава - Отделение № 9: ул. Комсомольская, 28' => __('Полтава - Отделение № 9: ул. Комсомольская, 28', 'woocommerce' ),
'Полтава - Отделение №10: ул. Фрунзе, 63' => __('Полтава - Отделение №10: ул. Фрунзе, 63', 'woocommerce' ),
'Полтава - Отделение №11: ул. Красина, 79' => __('Полтава - Отделение №11: ул. Красина, 79', 'woocommerce' ),
'Полтава - Отделение № 12: ул. Сенная, 2/49' => __('Полтава - Отделение № 12: ул. Сенная, 2/49', 'woocommerce' ),
'Полтава - Отделение №13: ул. Великотырновская, 35/2' => __('Полтава - Отделение №13: ул. Великотырновская, 35/2', 'woocommerce' ),
'Поляница (Буковель) - Отделение №1: участок Центр (напротив Церкви)' => __('Поляница (Буковель) - Отделение №1: участок Центр (напротив Церкви)', 'woocommerce' ),
'Помошная - Отделение: ул. Победы, 83' => __('Помошная - Отделение: ул. Победы, 83', 'woocommerce' ),
'Понинка - Отделение №1: ул. Победы, 34/14' => __('Понинка - Отделение №1: ул. Победы, 34/14', 'woocommerce' ),
'Попельня - Отделение: ул. Советская, 100' => __('Попельня - Отделение: ул. Советская, 100', 'woocommerce' ),
'Поповка (Сумская обл.) - Отделение № 1: вул. Братьев Ковтун, 1а' => __('Поповка (Сумская обл.) - Отделение № 1: вул. Братьев Ковтун, 1а', 'woocommerce' ),
'Почаев - Отделение №1: ул. Ярослава Мудрого, 54а' => __('Почаев - Отделение №1: ул. Ярослава Мудрого, 54а', 'woocommerce' ),
'Приазовское - Отделение №1: ул. Горького, 73' => __('Приазовское - Отделение №1: ул. Горького, 73', 'woocommerce' ),
'Прилуки - Отделение №1: ул. Ю. Коптева, 61' => __('Прилуки - Отделение №1: ул. Ю. Коптева, 61', 'woocommerce' ),
'Прилуки - Отделение №2: ул. Первого Мая, 82' => __('Прилуки - Отделение №2: ул. Первого Мая, 82', 'woocommerce' ),
'Прилуки - Отделение №3 : ул. Киевская, 186' => __('Прилуки - Отделение №3 : ул. Киевская, 186', 'woocommerce' ),
'Приморск (Запорожская обл.) - Отделение: ул. Кирова, 91' => __('Приморск (Запорожская обл.) - Отделение: ул. Кирова, 91', 'woocommerce' ),
'Пустомыты - Отделение №1: ул. Грушевского, 11а' => __('Пустомыты - Отделение №1: ул. Грушевского, 11а', 'woocommerce' ),
'Путивль - Отделение: ул. Кирова, 36' => __('Путивль - Отделение: ул. Кирова, 36', 'woocommerce' ),
'Путила - Отделение №1: ул. Украинская, 34' => __('Путила - Отделение №1: ул. Украинская, 34', 'woocommerce' ),
'Пятихатки - Отделение №1: ул. Шевченко, 107' => __('Пятихатки - Отделение №1: ул. Шевченко, 107', 'woocommerce' ),
'Рава-Русская - Отделение: ул. Коновалца, 25/27' => __('Рава-Русская - Отделение: ул. Коновалца, 25/27', 'woocommerce' ),
'Радехов - Отделение: ул. Мишуги, 4' => __('Радехов - Отделение: ул. Мишуги, 4', 'woocommerce' ),
'Радивилов - Отделение: ул. Волковенко, 1а' => __('Радивилов - Отделение: ул. Волковенко, 1а', 'woocommerce' ),
'Радомышль - Отделение №1: пер. Базарный, 7а' => __('Радомышль - Отделение №1: пер. Базарный, 7а', 'woocommerce' ),
'Радошевка - Отделение №1: ул. Ленина, 1а' => __('Радошевка - Отделение №1: ул. Ленина, 1а', 'woocommerce' ),
'Радушное - Отделение № 1: ул. Школьная, 1' => __('Радушное - Отделение № 1: ул. Школьная, 1', 'woocommerce' ),
'Раздельная (Одесса) - Отделение: ул. Первого Мая, 1а' => __('Раздельная (Одесса) - Отделение: ул. Первого Мая, 1а', 'woocommerce' ),
'Ракитное (Белая Церковь) - Отделение: ул. Первомайская, 13' => __('Ракитное (Белая Церковь) - Отделение: ул. Первомайская, 13', 'woocommerce' ),
'Ратно - Отделение №1: ул. Каштановая, 29' => __('Ратно - Отделение №1: ул. Каштановая, 29', 'woocommerce' ),
'Рафаловка - Отделение №1: ул. Садовая, 31' => __('Рафаловка - Отделение №1: ул. Садовая, 31', 'woocommerce' ),
'Рахны-Лисовые - Отделение №1: ул. Ленина, 113' => __('Рахны-Лисовые - Отделение №1: ул. Ленина, 113', 'woocommerce' ),
'Рахов - Отделение: ул. Карпатская, 12' => __('Рахов - Отделение: ул. Карпатская, 12', 'woocommerce' ),
'Рени - Отделение: ул. Шевченко, 29' => __('Рени - Отделение: ул. Шевченко, 29', 'woocommerce' ),
'Репки - Отделение: ул. Любецкая, 5а' => __('Репки - Отделение: ул. Любецкая, 5а', 'woocommerce' ),
'Решетиловка - Отделение: ул. Шевченко, 11а' => __('Решетиловка - Отделение: ул. Шевченко, 11а', 'woocommerce' ),
'Ровно - Отделение №1: ул. Князя Владимира, 109а' => __('Ровно - Отделение №1: ул. Князя Владимира, 109а', 'woocommerce' ),
'Ровно - Отделение №2 : ул. Чорновола, 14/16' => __('Ровно - Отделение №2 : ул. Чорновола, 14/16', 'woocommerce' ),
'Ровно - Отделение №4 : ул. Степана Бандеры, 59' => __('Ровно - Отделение №4 : ул. Степана Бандеры, 59', 'woocommerce' ),
'Ровно - Отделение №5 : просп. Мира, 12' => __('Ровно - Отделение №5 : просп. Мира, 12', 'woocommerce' ),
'Ровно - Отделение № 6: ул. Киевская, 44 (возле кафе Мономах)' => __('Ровно - Отделение № 6: ул. Киевская, 44 (возле кафе Мономах)', 'woocommerce' ),
'Ровно - Отделение № 7 : ул. Королёва, 15 а (возле авторынка)' => __('Ровно - Отделение № 7 : ул. Королёва, 15 а (возле авторынка)', 'woocommerce' ),
'Ровно - Отделение № 8 : ул. Киевская, 21' => __('Ровно - Отделение № 8 : ул. Киевская, 21', 'woocommerce' ),
'Ровно - Отделение № 9 : ул. Евгения Коновальца, 14 (р-н Северный)' => __('Ровно - Отделение № 9 : ул. Евгения Коновальца, 14 (р-н Северный)', 'woocommerce' ),
'Ровно - Отделение №10 : ул. Пересопницкая, 58(возле Драмтеатра)' => __('Ровно - Отделение №10 : ул. Пересопницкая, 58(возле Драмтеатра)', 'woocommerce' ),
'Ровно - Отделение №11: ул. Фабричная, 1' => __('Ровно - Отделение №11: ул. Фабричная, 1', 'woocommerce' ),
'Ровно - Отделение №12 : ул. Черняка, 4' => __('Ровно - Отделение №12 : ул. Черняка, 4', 'woocommerce' ),
'Ровное (Новоукраинский р-н, Кировоградская обл.) - Отделение: ул. Кирова, 126 а' => __('Ровное (Новоукраинский р-н, Кировоградская обл.) - Отделение: ул. Кирова, 126 а', 'woocommerce' ),
'Рогатин - Отделение № 1: ул. Галицкая, 126 (200 м. от заправки ОККО в направлении Львова)' => __('Рогатин - Отделение № 1: ул. Галицкая, 126 (200 м. от заправки ОККО в направлении Львова)', 'woocommerce' ),
'Родинское - Отделение № 1: ул. Маяковского, 15' => __('Родинское - Отделение № 1: ул. Маяковского, 15', 'woocommerce' ),
'Рожище - Отделение: ул. Независимости, 82' => __('Рожище - Отделение: ул. Независимости, 82', 'woocommerce' ),
'Рожнятов - Отделение: ул. Сечевых Стрельцов, 22' => __('Рожнятов - Отделение: ул. Сечевых Стрельцов, 22', 'woocommerce' ),
'Розовка (Запорожская обл.) - Отделение №1: ул. Освободителей , 1б' => __('Розовка (Запорожская обл.) - Отделение №1: ул. Освободителей , 1б', 'woocommerce' ),
'Рокитное (Ровно) - Отделение №1: ул. Ивана Франка, 6а' => __('Рокитное (Ровно) - Отделение №1: ул. Ивана Франка, 6а', 'woocommerce' ),
'Рокитное (Ровно) - Отделение №2 : ул. Шевченко, 9 (возле САМ-Маркета)' => __('Рокитное (Ровно) - Отделение №2 : ул. Шевченко, 9 (возле САМ-Маркета)', 'woocommerce' ),
'Романковцы - Отделение №1: ул. Главная, 43' => __('Романковцы - Отделение №1: ул. Главная, 43', 'woocommerce' ),
'Романов - Отделение: ул. Ленина, 92' => __('Романов - Отделение: ул. Ленина, 92', 'woocommerce' ),
'Ромны - Отделение №1: ул. Дудина, 20в' => __('Ромны - Отделение №1: ул. Дудина, 20в', 'woocommerce' ),
'Ромны - Отделение №2 : ул. Щучки, 4ж' => __('Ромны - Отделение №2 : ул. Щучки, 4ж', 'woocommerce' ),
'Рубежное - Отделение №1: ул. Смирнова, 1а' => __('Рубежное - Отделение №1: ул. Смирнова, 1а', 'woocommerce' ),
'Рубежное - Отделение №3: ул. 30 лет Победы, 12а' => __('Рубежное - Отделение №3: ул. 30 лет Победы, 12а', 'woocommerce' ),
'Рудки - Отделение №1: ул. Возрождения, 1' => __('Рудки - Отделение №1: ул. Возрождения, 1', 'woocommerce' ),
'Ружин - Отделение: ул. Бірюкова, 9/1' => __('Ружин - Отделение: ул. Бірюкова, 9/1', 'woocommerce' ),
'Русская Поляна - Отделение №1: ул. Шраменка, 32' => __('Русская Поляна - Отделение №1: ул. Шраменка, 32', 'woocommerce' ),
'Саврань - Отделение №1: ул. Ленина, 15' => __('Саврань - Отделение №1: ул. Ленина, 15', 'woocommerce' ),
'Самбор - Отделение: ул. Шевченко, 52/8' => __('Самбор - Отделение: ул. Шевченко, 52/8', 'woocommerce' ),
'Самгородок - Отделение №1: ул. Ленина, 53' => __('Самгородок - Отделение №1: ул. Ленина, 53', 'woocommerce' ),
'Сарата - Отделение №1: ул. Ленина, 96' => __('Сарата - Отделение №1: ул. Ленина, 96', 'woocommerce' ),
'Сарны - Отделение №1: ул. Варшавская, 2е' => __('Сарны - Отделение №1: ул. Варшавская, 2е', 'woocommerce' ),
'Сарны - Отделение №2 : ул. Широкая, 13' => __('Сарны - Отделение №2 : ул. Широкая, 13', 'woocommerce' ),
'Сатанов - Отделение №1: ул. Сиреневая, 13' => __('Сатанов - Отделение №1: ул. Сиреневая, 13', 'woocommerce' ),
'Сахновщина - Отделение №1: ул. Южновокзальная, 3' => __('Сахновщина - Отделение №1: ул. Южновокзальная, 3', 'woocommerce' ),
'Свалява - Отделение: ул. Шевченка 2/2' => __('Свалява - Отделение: ул. Шевченка 2/2', 'woocommerce' ),
'Сватово - Отделение №1: пл. Советская, 7' => __('Сватово - Отделение №1: пл. Советская, 7', 'woocommerce' ),
'Свесса - Отделение № 1: ул. Коцюбинского, 1' => __('Свесса - Отделение № 1: ул. Коцюбинского, 1', 'woocommerce' ),
'Светловодск - Отделение №1: ул. 9-го Января, 102' => __('Светловодск - Отделение №1: ул. 9-го Января, 102', 'woocommerce' ),
'Светловодск - Отделение №2 : ул. Богдана Хмельницкого, 34' => __('Светловодск - Отделение №2 : ул. Богдана Хмельницкого, 34', 'woocommerce' ),
'Святогорск - Отделение: ул. Островского, 3' => __('Святогорск - Отделение: ул. Островского, 3', 'woocommerce' ),
'Северодонецк - Отделение №1: ул. Федоренко, 10, корп. 2 (торг. центр "ДЖАЗ")' => __('Северодонецк - Отделение №1: ул. Федоренко, 10, корп. 2 (торг. центр "ДЖАЗ")', 'woocommerce' ),
'Северодонецк - Отделение №2 : ул. Заводская, 21' => __('Северодонецк - Отделение №2 : ул. Заводская, 21', 'woocommerce' ),
'Северодонецк - Отделение №3: ул. Науки, 22' => __('Северодонецк - Отделение №3: ул. Науки, 22', 'woocommerce' ),
'Селидово - Отделение: ул. Гоголя, 2' => __('Селидово - Отделение: ул. Гоголя, 2', 'woocommerce' ),
'Семеновка (Кременчуг) - Отделение: ул. Ленина, 52' => __('Семеновка (Кременчуг) - Отделение: ул. Ленина, 52', 'woocommerce' ),
'Семеновка (Черниговская обл.) - Отделение: ул. Красная Площадь, 58' => __('Семеновка (Черниговская обл.) - Отделение: ул. Красная Площадь, 58', 'woocommerce' ),
'Сергеевка - Отделение №1: ул. Гагарина, 11' => __('Сергеевка - Отделение №1: ул. Гагарина, 11', 'woocommerce' ),
'Серебряное - Отделение: ул. Ленина, 25' => __('Серебряное - Отделение: ул. Ленина, 25', 'woocommerce' ),
'Середина-Буда - Отделение: ул. Васильевская, 3' => __('Середина-Буда - Отделение: ул. Васильевская, 3', 'woocommerce' ),
'Синельниково - Отделение № 1: ул. 40-летия Октября, 19' => __('Синельниково - Отделение № 1: ул. 40-летия Октября, 19', 'woocommerce' ),
'Синельниково - Отделение №2: ул. Мира, 10' => __('Синельниково - Отделение №2: ул. Мира, 10', 'woocommerce' ),
'Скадовск - Отделение: ул. Парижской Коммуны, 103' => __('Скадовск - Отделение: ул. Парижской Коммуны, 103', 'woocommerce' ),
'Скала-Подольская - Отделение №1: ул. Купчинского, 13' => __('Скала-Подольская - Отделение №1: ул. Купчинского, 13', 'woocommerce' ),
'Скалат - Отделение №1: ул. Тернопольская, 60' => __('Скалат - Отделение №1: ул. Тернопольская, 60', 'woocommerce' ),
'Сквира - Отделение: ул. Розы Люксембург, 16' => __('Сквира - Отделение: ул. Розы Люксембург, 16', 'woocommerce' ),
'Сколе - Отделение: ул. Площадь Независимости, 7' => __('Сколе - Отделение: ул. Площадь Независимости, 7', 'woocommerce' ),
'Славута - Отделение: площадь Шевченка 4/1' => __('Славута - Отделение: площадь Шевченка 4/1', 'woocommerce' ),
'Славутич - Отделение №1: ул. Таллинский квартал, 7а' => __('Славутич - Отделение №1: ул. Таллинский квартал, 7а', 'woocommerce' ),
'Славутич - Отделение №2 : ул. Привокзальная, 2' => __('Славутич - Отделение №2 : ул. Привокзальная, 2', 'woocommerce' ),
'Славянск - Отделение №1: ул. Коммунаров, 50' => __('Славянск - Отделение №1: ул. Коммунаров, 50', 'woocommerce' ),
'Славянск - Отделение № 2: ул. Урицкого, 12' => __('Славянск - Отделение № 2: ул. Урицкого, 12', 'woocommerce' ),
'Славянск - Отделение № 3: пер. Глекова, 2а (р-н военкомата)' => __('Славянск - Отделение № 3: пер. Глекова, 2а (р-н военкомата)', 'woocommerce' ),
'Славянск - Отделение №4: пер. Парковый, 5 (район «Артема»)' => __('Славянск - Отделение №4: пер. Парковый, 5 (район «Артема»)', 'woocommerce' ),
'Словечное - Отделение №1: ул. Ленина, 3' => __('Словечное - Отделение №1: ул. Ленина, 3', 'woocommerce' ),
'Смела - Отделение №1: ул. Октябрьская, 18' => __('Смела - Отделение №1: ул. Октябрьская, 18', 'woocommerce' ),
'Смела - Отделение №2: ул. 40 лет Победы, 6' => __('Смела - Отделение №2: ул. 40 лет Победы, 6', 'woocommerce' ),
'Смела - Отделение №3: ул. Ленина, 73' => __('Смела - Отделение №3: ул. Ленина, 73', 'woocommerce' ),
'Смолино - Отделение: ул. Казакова, 43' => __('Смолино - Отделение: ул. Казакова, 43', 'woocommerce' ),
'Смыга - Отделение: ул. Школьная, 23' => __('Смыга - Отделение: ул. Школьная, 23', 'woocommerce' ),
'Снигиревка - Отделение: ул. Октябрьская, 111' => __('Снигиревка - Отделение: ул. Октябрьская, 111', 'woocommerce' ),
'Снятин - Отделение: ул. Шевченко, 251' => __('Снятин - Отделение: ул. Шевченко, 251', 'woocommerce' ),
'Сокаль - Отделение: ул. Тартаковская, 99 (старая автостанция)' => __('Сокаль - Отделение: ул. Тартаковская, 99 (старая автостанция)', 'woocommerce' ),
'Сокиряны - Отделение: ул. Чорновола, 15' => __('Сокиряны - Отделение: ул. Чорновола, 15', 'woocommerce' ),
'Соледар - Отделение № 1: ул. Карпинского, 10а' => __('Соледар - Отделение № 1: ул. Карпинского, 10а', 'woocommerce' ),
'Соленое - Отделение: ул. Гагарина, 26а' => __('Соленое - Отделение: ул. Гагарина, 26а', 'woocommerce' ),
'Солоницевка - Отделение №1: ул. Горького, 25а' => __('Солоницевка - Отделение №1: ул. Горького, 25а', 'woocommerce' ),
'Солотвино - Отделение №1: ул. Сигетская, 2' => __('Солотвино - Отделение №1: ул. Сигетская, 2', 'woocommerce' ),
'Сосница - Отделение: ул. Виноградского, 19 а' => __('Сосница - Отделение: ул. Виноградского, 19 а', 'woocommerce' ),
'Сосновка - Отделение №1: ул. Крывоноса, 4' => __('Сосновка - Отделение №1: ул. Крывоноса, 4', 'woocommerce' ),
'Сосновое - Отделение №1: ул. Шевченко, 29' => __('Сосновое - Отделение №1: ул. Шевченко, 29', 'woocommerce' ),
'Софиевка - Отделение № 1: ул. Октябрьская, 59/1' => __('Софиевка - Отделение № 1: ул. Октябрьская, 59/1', 'woocommerce' ),
'Сошично - Отделение №1: ул. Ковельская, 102' => __('Сошично - Отделение №1: ул. Ковельская, 102', 'woocommerce' ),
'Среднее - Отделение №1: ул. Закарпатская, 75' => __('Среднее - Отделение №1: ул. Закарпатская, 75', 'woocommerce' ),
'Ставище - Отделение: ул. Ленина, 7а' => __('Ставище - Отделение: ул. Ленина, 7а', 'woocommerce' ),
'Станислав - Отделение №1: ул. Ленина, 8' => __('Станислав - Отделение №1: ул. Ленина, 8', 'woocommerce' ),
'Старая Выжевка - Отделение: площадь Мира, 3/5' => __('Старая Выжевка - Отделение: площадь Мира, 3/5', 'woocommerce' ),
'Старая Синява - Отделение: ул. Грушевсково, 54' => __('Старая Синява - Отделение: ул. Грушевсково, 54', 'woocommerce' ),
'Старобельск - Отделение №1: площадь Товарная, 5' => __('Старобельск - Отделение №1: площадь Товарная, 5', 'woocommerce' ),
'Старобельск - Отделение №2 : ул. Трудовая, 12а' => __('Старобельск - Отделение №2 : ул. Трудовая, 12а', 'woocommerce' ),
'Старовойтово - Отделение: ул. Пограничников, 4 (возле таможни «Ягодын»)' => __('Старовойтово - Отделение: ул. Пограничников, 4 (возле таможни «Ягодын»)', 'woocommerce' ),
'Староконстантинов - Отделение: ул.И.Франко,19' => __('Староконстантинов - Отделение: ул.И.Франко,19', 'woocommerce' ),
'Староконстантинов - Отделение № 2 : ул. Грушевского, 39' => __('Староконстантинов - Отделение № 2 : ул. Грушевского, 39', 'woocommerce' ),
'Старый Самбор - Отделение №1: ул. Л.Галицького, 42/8а' => __('Старый Самбор - Отделение №1: ул. Л.Галицького, 42/8а', 'woocommerce' ),
'Стеблев (Черкасская обл.) - Отделение № 1: ул. Калинина, 4а' => __('Стеблев (Черкасская обл.) - Отделение № 1: ул. Калинина, 4а', 'woocommerce' ),
'Стебник - Отделение №1: ул. Грушевского, 1а' => __('Стебник - Отделение №1: ул. Грушевского, 1а', 'woocommerce' ),
'Степань - Отделение №1: ул. Киевская, 55' => __('Степань - Отделение №1: ул. Киевская, 55', 'woocommerce' ),
'Сторожинец - Отделение №1: ул. Шевченка, 33' => __('Сторожинец - Отделение №1: ул. Шевченка, 33', 'woocommerce' ),
'Стоянка - Отделение: Житомирское шоссе, 21 (склад Mary Kay)' => __('Стоянка - Отделение: Житомирское шоссе, 21 (склад Mary Kay)', 'woocommerce' ),
'Стрижавка - Отделение №1: ул. 40-летие Победы, 8а' => __('Стрижавка - Отделение №1: ул. 40-летие Победы, 8а', 'woocommerce' ),
'Стрый - Отделение №1: ул. Грабовецкая, 42' => __('Стрый - Отделение №1: ул. Грабовецкая, 42', 'woocommerce' ),
'Стрый - Отделение №2 : ул. Коссака, 6/58' => __('Стрый - Отделение №2 : ул. Коссака, 6/58', 'woocommerce' ),
'Судовая Вишня - Отделение №1: ул. Ивана Франка, 14а' => __('Судовая Вишня - Отделение №1: ул. Ивана Франка, 14а', 'woocommerce' ),
'Сумы - Отделение №1: ул. 2-я Лебединская, 2а' => __('Сумы - Отделение №1: ул. 2-я Лебединская, 2а', 'woocommerce' ),
'Сумы - Отделение №2 : ул. Петропавловская, 93' => __('Сумы - Отделение №2 : ул. Петропавловская, 93', 'woocommerce' ),
'Сумы - Отделение №3: ул. Харьковская, 105' => __('Сумы - Отделение №3: ул. Харьковская, 105', 'woocommerce' ),
'Сумы - Отделение №4 : ул. Леваневского, 10' => __('Сумы - Отделение №4 : ул. Леваневского, 10', 'woocommerce' ),
'Сумы - Отделение №5: ул. Воровского, 20' => __('Сумы - Отделение №5: ул. Воровского, 20', 'woocommerce' ),
'Сумы - Отделение №6 : пл. Независимости, 1' => __('Сумы - Отделение №6 : пл. Независимости, 1', 'woocommerce' ),
'Сумы - Отделение №7: ул. Белопольский путь, 30/3' => __('Сумы - Отделение №7: ул. Белопольский путь, 30/3', 'woocommerce' ),
'Сумы - Отделение №8 : просп. Михаила Лушпы, 13' => __('Сумы - Отделение №8 : просп. Михаила Лушпы, 13', 'woocommerce' ),
'Сумы - Отделение №9: ул. Екатерины Зеленко, 4' => __('Сумы - Отделение №9: ул. Екатерины Зеленко, 4', 'woocommerce' ),
'Сутиски - Отделение № 1: ул. Победы, 14' => __('Сутиски - Отделение № 1: ул. Победы, 14', 'woocommerce' ),
'Счастливое - Отделение №1: ул. Перспективная, 2' => __('Счастливое - Отделение №1: ул. Перспективная, 2', 'woocommerce' ),
'Счастье - Отделение: ул. Дружбы, 24' => __('Счастье - Отделение: ул. Дружбы, 24', 'woocommerce' ),
'Талалаевка - Отделение: ул. Работническая, 5' => __('Талалаевка - Отделение: ул. Работническая, 5', 'woocommerce' ),
'Тальное - Отделение №1: ул. Соборная, 20' => __('Тальное - Отделение №1: ул. Соборная, 20', 'woocommerce' ),
'Тарасовка - Отделение №1: ул. Шевченко, 3а' => __('Тарасовка - Отделение №1: ул. Шевченко, 3а', 'woocommerce' ),
'Тараща - Отделение №1: ул. Советская, 2а' => __('Тараща - Отделение №1: ул. Советская, 2а', 'woocommerce' ),
'Тарутино - Отделение №1: ул. Садовая, 88' => __('Тарутино - Отделение №1: ул. Садовая, 88', 'woocommerce' ),
'Татарбунары - Отделение №1: ул. Тура, 80а' => __('Татарбунары - Отделение №1: ул. Тура, 80а', 'woocommerce' ),
'Теофиполь - Отделение: ул. Б. Хмельницкого, 2' => __('Теофиполь - Отделение: ул. Б. Хмельницкого, 2', 'woocommerce' ),
'Теплик - Отделение №1: ул. Независимости, 24' => __('Теплик - Отделение №1: ул. Независимости, 24', 'woocommerce' ),
'Теплодар - Отделение №1: ул. Генерала Плиева, 15а' => __('Теплодар - Отделение №1: ул. Генерала Плиева, 15а', 'woocommerce' ),
'Терешки (Полтавский р-н) - Отделение № 1: ул. Шевченко, 12/2' => __('Терешки (Полтавский р-н) - Отделение № 1: ул. Шевченко, 12/2', 'woocommerce' ),
'Терновка - Отделение: ул. Харьковская, 3' => __('Терновка - Отделение: ул. Харьковская, 3', 'woocommerce' ),
'Тернополь - Отделение №1: ул. Подольская, 21' => __('Тернополь - Отделение №1: ул. Подольская, 21', 'woocommerce' ),
'Тернополь - Отделение №2 : ул. Русская, 15' => __('Тернополь - Отделение №2 : ул. Русская, 15', 'woocommerce' ),
'Тернополь - Отделение №3: ул. Западная, 2' => __('Тернополь - Отделение №3: ул. Западная, 2', 'woocommerce' ),
'Тернополь - Отделение №4 : просп. Злуки, 8' => __('Тернополь - Отделение №4 : просп. Злуки, 8', 'woocommerce' ),
'Тернополь - Отделение №5 : ул. Анатолия Живова, 37' => __('Тернополь - Отделение №5 : ул. Анатолия Живова, 37', 'woocommerce' ),
'Тернополь - Отделение №6 : просп. Степана Бандеры, 80' => __('Тернополь - Отделение №6 : просп. Степана Бандеры, 80', 'woocommerce' ),
'Тернополь - Отделение №7 : ул. Леся Курбаса, 5' => __('Тернополь - Отделение №7 : ул. Леся Курбаса, 5', 'woocommerce' ),
'Тернополь - Отделение №8: ул. Медовая, 6 (Центр, возле водоканала)' => __('Тернополь - Отделение №8: ул. Медовая, 6 (Центр, возле водоканала)', 'woocommerce' ),
'Терны - Отделение № 1: ул. Кооперативная, 4' => __('Терны - Отделение № 1: ул. Кооперативная, 4', 'woocommerce' ),
'Тетиев - Отделение: ул. Комсомольская, 3 ц' => __('Тетиев - Отделение: ул. Комсомольская, 3 ц', 'woocommerce' ),
'Тлумач - Отделение: ул. Ольги Кобылянской, 1' => __('Тлумач - Отделение: ул. Ольги Кобылянской, 1', 'woocommerce' ),
'Токмак - Отделение: ул. Революционная, 63' => __('Токмак - Отделение: ул. Революционная, 63', 'woocommerce' ),
'Толстое - Отделение №1: ул. Украинская, 90а' => __('Толстое - Отделение №1: ул. Украинская, 90а', 'woocommerce' ),
'Томаковка - Отделение: ул. Пушкина, 11а' => __('Томаковка - Отделение: ул. Пушкина, 11а', 'woocommerce' ),
'Томашгород - Отделение №1: ул. Железнодорожная, 6' => __('Томашгород - Отделение №1: ул. Железнодорожная, 6', 'woocommerce' ),
'Томашполь - Отделение №1: ул. Черняховского, 4а' => __('Томашполь - Отделение №1: ул. Черняховского, 4а', 'woocommerce' ),
'Торчин - Отделение №1: ул. Независимости, 95' => __('Торчин - Отделение №1: ул. Независимости, 95', 'woocommerce' ),
'Троицкое (Луганская обл.) - Отделение №1: ул. Чкалова, 16' => __('Троицкое (Луганская обл.) - Отделение №1: ул. Чкалова, 16', 'woocommerce' ),
'Троицкое (Одесская обл.Любашовский р-н) - Отделение №1: ул. Ленина, 16' => __('Троицкое (Одесская обл.Любашовский р-н) - Отделение №1: ул. Ленина, 16', 'woocommerce' ),
'Тростянец (Ахтырка) - Отделение: ул. Горького, 58' => __('Тростянец (Ахтырка) - Отделение: ул. Горького, 58', 'woocommerce' ),
'Тростянец (Винницкая обл.) - Отделение №1: ул. 20-го Партсъезда, 1' => __('Тростянец (Винницкая обл.) - Отделение №1: ул. 20-го Партсъезда, 1', 'woocommerce' ),
'Трускавец - Отделение: ул. Ивана Мазепы, 21е' => __('Трускавец - Отделение: ул. Ивана Мазепы, 21е', 'woocommerce' ),
'Тульчин - Отделение №1: ул. Лобача, 36' => __('Тульчин - Отделение №1: ул. Лобача, 36', 'woocommerce' ),
'Тульчин - Отделение №2 : ул. Ленина, 80' => __('Тульчин - Отделение №2 : ул. Ленина, 80', 'woocommerce' ),
'Турбов - Отделение №1: ул. Маяковского, 8' => __('Турбов - Отделение №1: ул. Маяковского, 8', 'woocommerce' ),
'Турийск - Отделение: ул. Привокзальная, 10' => __('Турийск - Отделение: ул. Привокзальная, 10', 'woocommerce' ),
'Турка - Отделение: площадь Ринок, 13/2' => __('Турка - Отделение: площадь Ринок, 13/2', 'woocommerce' ),
'Тывров - Отделение №1: ул. Ленина, 38' => __('Тывров - Отделение №1: ул. Ленина, 38', 'woocommerce' ),
'Тысменица - Отделение №1: ул. Галицкая, 62/2' => __('Тысменица - Отделение №1: ул. Галицкая, 62/2', 'woocommerce' ),
'Тячев - Отделение №1: ул. Ноября, 53' => __('Тячев - Отделение №1: ул. Ноября, 53', 'woocommerce' ),
'Угледар - Отделение №1: ул. Шахтерская, 3' => __('Угледар - Отделение №1: ул. Шахтерская, 3', 'woocommerce' ),
'Ужгород - Отделение №2: ул. Станционная, 16/1' => __('Ужгород - Отделение №2: ул. Станционная, 16/1', 'woocommerce' ),
'Ужгород - Отделение №3 : ул. Берчени, 48' => __('Ужгород - Отделение №3 : ул. Берчени, 48', 'woocommerce' ),
'Ужгород - Отделение №4 : ул. Капушанская,154а' => __('Ужгород - Отделение №4 : ул. Капушанская,154а', 'woocommerce' ),
'Ужгород - Отделение №5 : ул. Грушевского, 74а' => __('Ужгород - Отделение №5 : ул. Грушевского, 74а', 'woocommerce' ),
'Ужгород - Отделение №6 : ул. Ивана Франка, 56' => __('Ужгород - Отделение №6 : ул. Ивана Франка, 56', 'woocommerce' ),
'Узин - Отделение: ул. Первомайская 8а, дом 8' => __('Узин - Отделение: ул. Первомайская 8а, дом 8', 'woocommerce' ),
'Украинка - Отделение: ул. Юности, 8' => __('Украинка - Отделение: ул. Юности, 8', 'woocommerce' ),
'Ульяновка - Отделение: переул. Ленина, 4а' => __('Ульяновка - Отделение: переул. Ленина, 4а', 'woocommerce' ),
'Умань - Отделение №1: ул. Індустріальна, 14а' => __('Умань - Отделение №1: ул. Індустріальна, 14а', 'woocommerce' ),
'Умань - Отделение №2 : ул. Парижской Коммуны, 36' => __('Умань - Отделение №2 : ул. Парижской Коммуны, 36', 'woocommerce' ),
'Умань - Отделение №3,: ул. Ленинской искры, 1/24' => __('Умань - Отделение №3,: ул. Ленинской искры, 1/24', 'woocommerce' ),
'Устилуг - Отделение: ул. Владимирская, 25' => __('Устилуг - Отделение: ул. Владимирская, 25', 'woocommerce' ),
'Фастов - Отделение: ул. Кирова, 34' => __('Фастов - Отделение: ул. Кирова, 34', 'woocommerce' ),
'Фастов - Отделение №2 : ул. Л.Толстого, 6' => __('Фастов - Отделение №2 : ул. Л.Толстого, 6', 'woocommerce' ),
'Фрунзовка - Отделение №1: ул. 1-го Мая, 37' => __('Фрунзовка - Отделение №1: ул. 1-го Мая, 37', 'woocommerce' ),
'Харьков - Отделение №1: ул. Плехановская, 126' => __('Харьков - Отделение №1: ул. Плехановская, 126', 'woocommerce' ),
'Харьков - Отделение №2: просп. Московский, 54а' => __('Харьков - Отделение №2: просп. Московский, 54а', 'woocommerce' ),
'Харьков - Отделение №3: ул. Якира, 124' => __('Харьков - Отделение №3: ул. Якира, 124', 'woocommerce' ),
'Харьков - Отделение №4: ул. Достоевского, 5' => __('Харьков - Отделение №4: ул. Достоевского, 5', 'woocommerce' ),
'Харьков - Отделение № 5: пгт. Песочин, пл. Ю. Кононенко, 1а (Авторынок "Лоск", здание "Приват Банка")' => __('Харьков - Отделение № 5: пгт. Песочин, пл. Ю. Кононенко, 1а (Авторынок "Лоск", здание "Приват Банка")', 'woocommerce' ),
'Харьков - Отделение №6: ул. Академика Павлова, 120' => __('Харьков - Отделение №6: ул. Академика Павлова, 120', 'woocommerce' ),
'Харьков - Отделение №7: просп. Победы, 55е' => __('Харьков - Отделение №7: просп. Победы, 55е', 'woocommerce' ),
'Харьков - Отделение №8 : ул. Малогончаровская, 28/30' => __('Харьков - Отделение №8 : ул. Малогончаровская, 28/30', 'woocommerce' ),
'Харьков - Отделение №9 (до 30кг): ул. Роганская, 101а' => __('Харьков - Отделение №9 (до 30кг): ул. Роганская, 101а', 'woocommerce' ),
'Харьков - Отделение №10: ул. Пушкинская, 96 (напротив парка "Молодежный"' => __('Харьков - Отделение №10: ул. Пушкинская, 96 (напротив парка "Молодежный"', 'woocommerce' ),
'Харьков - Отделение №11 : просп. Гагарина, 41/2' => __('Харьков - Отделение №11 : просп. Гагарина, 41/2', 'woocommerce' ),
'Харьков - Отделение №12: ул. Лукъяновская, 2' => __('Харьков - Отделение №12: ул. Лукъяновская, 2', 'woocommerce' ),
'Харьков - Отделение №13: пгт. Дергачи, ул. Привокзальная, 4' => __('Харьков - Отделение №13: пгт. Дергачи, ул. Привокзальная, 4', 'woocommerce' ),
'Харьков - Отделение №14: просп. Московский, 199б (ТЦ СанСити, 2)' => __('Харьков - Отделение №14: просп. Московский, 199б (ТЦ СанСити, 2)', 'woocommerce' ),
'Харьков - Отделение №15 (до 30 кг на одне место): ул. Петра Свинаренка, 20' => __('Харьков - Отделение №15 (до 30 кг на одне место): ул. Петра Свинаренка, 20', 'woocommerce' ),
'Харьков - Отделение № 16: пгт. Песочин, пл. Ю.Кононенко, 1 а (Атобазар "Лоск", восточная строна)' => __('Харьков - Отделение № 16: пгт. Песочин, пл. Ю.Кононенко, 1 а (Атобазар "Лоск", восточная строна)', 'woocommerce' ),
'Харьков - Отделение № 17 : ул. 23 августа, 59' => __('Харьков - Отделение № 17 : ул. 23 августа, 59', 'woocommerce' ),
'Харьков - Отделение № 18: просп. Гагарина, 127а' => __('Харьков - Отделение № 18: просп. Гагарина, 127а', 'woocommerce' ),
'Харьков - Отделение №19: ул. Морозова, 18' => __('Харьков - Отделение №19: ул. Морозова, 18', 'woocommerce' ),
'Харьков - Отделение № 20 : ул. Новгородская, 4' => __('Харьков - Отделение № 20 : ул. Новгородская, 4', 'woocommerce' ),
'Харьков - Отделение № 21 : ул. Академика Проскуры, 1' => __('Харьков - Отделение № 21 : ул. Академика Проскуры, 1', 'woocommerce' ),
'Харьков - Отделение №22 : ул. Чернишевская, 1' => __('Харьков - Отделение №22 : ул. Чернишевская, 1', 'woocommerce' ),
'Харьков - Отделение №23 : ул. Академика Павлова, 134/16' => __('Харьков - Отделение №23 : ул. Академика Павлова, 134/16', 'woocommerce' ),
'Харьков - Отделение №24 : ул. Полтавский Шлях, 154' => __('Харьков - Отделение №24 : ул. Полтавский Шлях, 154', 'woocommerce' ),
'Харьков - Отделение № 25: просп. Тракторостроителей, 57а' => __('Харьков - Отделение № 25: просп. Тракторостроителей, 57а', 'woocommerce' ),
'Харьков - Отделение №26: ТЦ «Барабашова», Афганская площадка, место 21-П1-55, 56' => __('Харьков - Отделение №26: ТЦ «Барабашова», Афганская площадка, место 21-П1-55, 56', 'woocommerce' ),
'Харьков - Отделение №28 : ул. Культуры, 23' => __('Харьков - Отделение №28 : ул. Культуры, 23', 'woocommerce' ),
'Харьков - Отделение №29 : ул. Командарма Корка, 4' => __('Харьков - Отделение №29 : ул. Командарма Корка, 4', 'woocommerce' ),
'Харьков - Отделение №30: просп. Московский, 259' => __('Харьков - Отделение №30: просп. Московский, 259', 'woocommerce' ),
'Харьков - Отделение №31: ТЦ "Барабашова", Пл. "Вьетнам", мест С-008-21-0782, -0783, -0784' => __('Харьков - Отделение №31: ТЦ "Барабашова", Пл. "Вьетнам", мест С-008-21-0782, -0783, -0784', 'woocommerce' ),
'Харьков - Отделение №32: ул. Красношкольная Набережная, 26' => __('Харьков - Отделение №32: ул. Красношкольная Набережная, 26', 'woocommerce' ),
'Харьков - Отделение №33: ул. Сумская, 124' => __('Харьков - Отделение №33: ул. Сумская, 124', 'woocommerce' ),
'Харьков - Отделение №34: ул. Энгельса, 14' => __('Харьков - Отделение №34: ул. Энгельса, 14', 'woocommerce' ),
'Харьков - Отделение №35: ул. Героев труда, 14 (ТЦ Джокер 2 єтаж)' => __('Харьков - Отделение №35: ул. Героев труда, 14 (ТЦ Джокер 2 єтаж)', 'woocommerce' ),
'Харьков - Отделение №36: ул. Октябрьской революции, 92' => __('Харьков - Отделение №36: ул. Октябрьской революции, 92', 'woocommerce' ),
'Харьков - Отделение №37: ул. Клочковская, 244' => __('Харьков - Отделение №37: ул. Клочковская, 244', 'woocommerce' ),
'Харьков - Отделение №38: просп. Косиора, 184' => __('Харьков - Отделение №38: просп. Косиора, 184', 'woocommerce' ),
'Харьков - Отделение №39: просп. Гагарина, 48' => __('Харьков - Отделение №39: просп. Гагарина, 48', 'woocommerce' ),
'Харьков - Отделение №40: ул. Тарасовская, 3' => __('Харьков - Отделение №40: ул. Тарасовская, 3', 'woocommerce' ),
'Харьков - Отделение № 41: ул. Матюшенко, 7б' => __('Харьков - Отделение № 41: ул. Матюшенко, 7б', 'woocommerce' ),
'Харьков - Отделение № 42: ул. Иванова, 11/13' => __('Харьков - Отделение № 42: ул. Иванова, 11/13', 'woocommerce' ),
'Херсон - Отделение №1: просп. Адмирала Сенявина, 27' => __('Херсон - Отделение №1: просп. Адмирала Сенявина, 27', 'woocommerce' ),
'Херсон - Отделение №2: ул. Ушакова, 50' => __('Херсон - Отделение №2: ул. Ушакова, 50', 'woocommerce' ),
'Херсон - Отделение №3: просп. Адмирала Сенявина, 11а' => __('Херсон - Отделение №3: просп. Адмирала Сенявина, 11а', 'woocommerce' ),
'Херсон - Отделение №4: ул. Патона, 3а' => __('Херсон - Отделение №4: ул. Патона, 3а', 'woocommerce' ),
'Херсон - Отделение №5 : ул. Розы Люксембург, 11а' => __('Херсон - Отделение №5 : ул. Розы Люксембург, 11а', 'woocommerce' ),
'Херсон - Отделение № 6: ул. Горького, 9' => __('Херсон - Отделение № 6: ул. Горького, 9', 'woocommerce' ),
'Херсон - Отделение № 7: просп. 200 лет Херсона, 30' => __('Херсон - Отделение № 7: просп. 200 лет Херсона, 30', 'woocommerce' ),
'Херсон - Отделение № 8: ул. Перекопская ,173' => __('Херсон - Отделение № 8: ул. Перекопская ,173', 'woocommerce' ),
'Херсон - Отделение №9 : ул. Димитрова, 23' => __('Херсон - Отделение №9 : ул. Димитрова, 23', 'woocommerce' ),
'Херсон - Отделение №11: ул. 40-летия Октября, 110' => __('Херсон - Отделение №11: ул. 40-летия Октября, 110', 'woocommerce' ),
'Херсон - Отделение №12: ул. Ладичука, 150' => __('Херсон - Отделение №12: ул. Ладичука, 150', 'woocommerce' ),
'Херсон - Отделение № 13: вул. Зала Эгерсег, 18 (ТРЦ Фабрика)' => __('Херсон - Отделение № 13: вул. Зала Эгерсег, 18 (ТРЦ Фабрика)', 'woocommerce' ),
'Хиров - Отделение №1: ул. Хировская, 133' => __('Хиров - Отделение №1: ул. Хировская, 133', 'woocommerce' ),
'Хмельник (Винницкая обл.) - Отделение №1: ул. 1-го Мая, 38' => __('Хмельник (Винницкая обл.) - Отделение №1: ул. 1-го Мая, 38', 'woocommerce' ),
'Хмельник (Винницкая обл.) - Отделение №2 : ул. 50-ти летия СССР, 6' => __('Хмельник (Винницкая обл.) - Отделение №2 : ул. 50-ти летия СССР, 6', 'woocommerce' ),
'Хмельницкий - Отделение №1: просп. Мира, 99/101' => __('Хмельницкий - Отделение №1: просп. Мира, 99/101', 'woocommerce' ),
'Хмельницкий - Отделение №2: ул. Геологов, 2 (територрия рынка "Пан Каблук")' => __('Хмельницкий - Отделение №2: ул. Геологов, 2 (територрия рынка "Пан Каблук")', 'woocommerce' ),
'Хмельницкий - Отделение №3: ул. Ватутина, 11' => __('Хмельницкий - Отделение №3: ул. Ватутина, 11', 'woocommerce' ),
'Хмельницкий - Отделение №4: проспект Мира, 102/1' => __('Хмельницкий - Отделение №4: проспект Мира, 102/1', 'woocommerce' ),
'Хмельницкий - Отделение №5 : ул. Каменецкая, 52/2' => __('Хмельницкий - Отделение №5 : ул. Каменецкая, 52/2', 'woocommerce' ),
'Хмельницкий - Отделение №6 : ул. Подольская, 73/1' => __('Хмельницкий - Отделение №6 : ул. Подольская, 73/1', 'woocommerce' ),
'Хмельницкий - Отделение №7: ул. Курчатова, 20' => __('Хмельницкий - Отделение №7: ул. Курчатова, 20', 'woocommerce' ),
'Хмельницкий - Отделение № 8 : ул. Хотовицкого, 5' => __('Хмельницкий - Отделение № 8 : ул. Хотовицкого, 5', 'woocommerce' ),
'Хмельницкий - Отделение № 9 : ул. И. Франка, 16' => __('Хмельницкий - Отделение № 9 : ул. И. Франка, 16', 'woocommerce' ),
'Хмельницкий - Отделение № 10 : вул. Заречанская, 4' => __('Хмельницкий - Отделение № 10 : вул. Заречанская, 4', 'woocommerce' ),
'Хмельницкий - Отделение №11 : ул. Проскуровского подполья, 71/1' => __('Хмельницкий - Отделение №11 : ул. Проскуровского подполья, 71/1', 'woocommerce' ),
'Хмельницкий - Отделение №12 : ул. Заречанская, 57/1' => __('Хмельницкий - Отделение №12 : ул. Заречанская, 57/1', 'woocommerce' ),
'Хмельницкий - Отделение №13 : ул. Черновола, 84' => __('Хмельницкий - Отделение №13 : ул. Черновола, 84', 'woocommerce' ),
'Хмельницкий - Отделение №14 : ул. Каменецкая, 159' => __('Хмельницкий - Отделение №14 : ул. Каменецкая, 159', 'woocommerce' ),
'Хмельницкий - Отделение № 15 : Староконстантиновское шоссе, 2/1б' => __('Хмельницкий - Отделение № 15 : Староконстантиновское шоссе, 2/1б', 'woocommerce' ),
'Ходоров - Отделение №1: ул. Кропивницкого, 1' => __('Ходоров - Отделение №1: ул. Кропивницкого, 1', 'woocommerce' ),
'Хорол - Отделение: ул. Карла Маркса, 86/1 (територия автошколы)' => __('Хорол - Отделение: ул. Карла Маркса, 86/1 (територия автошколы)', 'woocommerce' ),
'Хоростков - Отделение №1: ул. Независимости, 60' => __('Хоростков - Отделение №1: ул. Независимости, 60', 'woocommerce' ),
'Хотин - Отделение: ул. Дудниченка, 39г' => __('Хотин - Отделение: ул. Дудниченка, 39г', 'woocommerce' ),
'Христиновка - Отделение: ул. Урицкого, 44' => __('Христиновка - Отделение: ул. Урицкого, 44', 'woocommerce' ),
'Хуст - Отделение №1: ул. Тимирязева, 37' => __('Хуст - Отделение №1: ул. Тимирязева, 37', 'woocommerce' ),
'Хуст - Отделение №2 : ул. Петенька Воеводы (раньше Терека), 1а' => __('Хуст - Отделение №2 : ул. Петенька Воеводы (раньше Терека), 1а', 'woocommerce' ),
'Царичанка - Отделение: ул. Комсомольская, 90' => __('Царичанка - Отделение: ул. Комсомольская, 90', 'woocommerce' ),
'Цибулев - Отделение № 1:ул. Ватутина, 2' => __('Цибулев - Отделение № 1:ул. Ватутина, 2', 'woocommerce' ),
'Циркуны - Отделение №1: ул. Кирова, 24/2' => __('Циркуны - Отделение №1: ул. Кирова, 24/2', 'woocommerce' ),
'Цюрупинск - Отделение: ул. Пролетарская, 100' => __('Цюрупинск - Отделение: ул. Пролетарская, 100', 'woocommerce' ),
'Чайки - Отделение № 1: ул. Коцюбинского, 8' => __('Чайки - Отделение № 1: ул. Коцюбинского, 8', 'woocommerce' ),
'Чаплинка (Херсонская обл.) - Отделение: ул. Советская, 2а' => __('Чаплинка (Херсонская обл.) - Отделение: ул. Советская, 2а', 'woocommerce' ),
'Часов Яр - Отделение № 1: ул. Олега Кошевого, 42' => __('Часов Яр - Отделение № 1: ул. Олега Кошевого, 42', 'woocommerce' ),
'Чемеровцы - Отделение: ул. Центральная, 2' => __('Чемеровцы - Отделение: ул. Центральная, 2', 'woocommerce' ),
'Червоная Слобода - Отделение №1: ул. Октябрьская, 48а' => __('Червоная Слобода - Отделение №1: ул. Октябрьская, 48а', 'woocommerce' ),
'Червоноармейск (Житомир) - Отделение: ул. Карла Маркса, 83' => __('Червоноармейск (Житомир) - Отделение: ул. Карла Маркса, 83', 'woocommerce' ),
'Червоноград (Львов) - Отделение: ул. Б. Хмельницкого, 65' => __('Червоноград (Львов) - Отделение: ул. Б. Хмельницкого, 65', 'woocommerce' ),
'Червоноград (Львов) - Отделение №2: ул. Клюсовская, 20' => __('Червоноград (Львов) - Отделение №2: ул. Клюсовская, 20', 'woocommerce' ),
'Червоное (Сумская обл.) - Отделение № 1: ул. Ленина, 13' => __('Червоное (Сумская обл.) - Отделение № 1: ул. Ленина, 13', 'woocommerce' ),
'Червонозаводское - Отделение: ул. Матросова, 19 б' => __('Червонозаводское - Отделение: ул. Матросова, 19 б', 'woocommerce' ),
'Червонознаменка - Отделение №1: ул. Генерала Плиева, 29/4.' => __('Червонознаменка - Отделение №1: ул. Генерала Плиева, 29/4.', 'woocommerce' ),
'Червоный Донец - Отделение №1: ул. Спортивная, 3' => __('Червоный Донец - Отделение №1: ул. Спортивная, 3', 'woocommerce' ),
'Черкассы - Отделение №1: ул. Хоменка 15' => __('Черкассы - Отделение №1: ул. Хоменка 15', 'woocommerce' ),
'Черкассы - Отделение №2: ул. Чигиринская, 11/1' => __('Черкассы - Отделение №2: ул. Чигиринская, 11/1', 'woocommerce' ),
'Черкассы - Отделение №3: бульв. Шевченко, 150' => __('Черкассы - Отделение №3: бульв. Шевченко, 150', 'woocommerce' ),
'Черкассы - Отделение №4: ул. Гагарина, 79' => __('Черкассы - Отделение №4: ул. Гагарина, 79', 'woocommerce' ),
'Черкассы - Отделение №5: ул. Руднева, 45' => __('Черкассы - Отделение №5: ул. Руднева, 45', 'woocommerce' ),
'Черкассы - Отделение № 6: ул. Волкова, 30' => __('Черкассы - Отделение № 6: ул. Волкова, 30', 'woocommerce' ),
'Черкассы - Отделение № 7: ул. Сумгаитская, 33' => __('Черкассы - Отделение № 7: ул. Сумгаитская, 33', 'woocommerce' ),
'Черкассы - Отделение №8 : ул. Благовестная, 379' => __('Черкассы - Отделение №8 : ул. Благовестная, 379', 'woocommerce' ),
'Черкассы - Отделение №9: ул. Остафия Дашкевича, 34' => __('Черкассы - Отделение №9: ул. Остафия Дашкевича, 34', 'woocommerce' ),
'Черкассы - Отделение №10: ул. Одесская, 8' => __('Черкассы - Отделение №10: ул. Одесская, 8', 'woocommerce' ),
'Черкассы - Отделение №11: ул. Ленина, 6' => __('Черкассы - Отделение №11: ул. Ленина, 6', 'woocommerce' ),
'Черкассы - Отделение № 12: ул. Молоткова, 20' => __('Черкассы - Отделение № 12: ул. Молоткова, 20', 'woocommerce' ),
'Чернигов - Отделение №1: ул. Старобелоуская, 16 а' => __('Чернигов - Отделение №1: ул. Старобелоуская, 16 а', 'woocommerce' ),
'Чернигов - Отделение №2 : просп. Победы, 50' => __('Чернигов - Отделение №2 : просп. Победы, 50', 'woocommerce' ),
'Чернигов - Отделение №3 : просп. Победы, 139' => __('Чернигов - Отделение №3 : просп. Победы, 139', 'woocommerce' ),
'Чернигов - Отделение №4 (до 10 кг): ул. Рокоссовского, 68' => __('Чернигов - Отделение №4 (до 10 кг): ул. Рокоссовского, 68', 'woocommerce' ),
'Чернигов - Отделение №5: ул. Инструментальная, 30' => __('Чернигов - Отделение №5: ул. Инструментальная, 30', 'woocommerce' ),
'Чернигов - Отделение №6 : ул. Шевченко, 46' => __('Чернигов - Отделение №6 : ул. Шевченко, 46', 'woocommerce' ),
'Чернигов - Отделение №7: просп. Мира, 50' => __('Чернигов - Отделение №7: просп. Мира, 50', 'woocommerce' ),
'Чернигов - Отделение №8: ул. Пухова, 142' => __('Чернигов - Отделение №8: ул. Пухова, 142', 'woocommerce' ),
'Черниговка - Отделение №1: вул. Ленина, 379' => __('Черниговка - Отделение №1: вул. Ленина, 379', 'woocommerce' ),
'Чернобай - Отделение: ул. Черкасская, 18' => __('Чернобай - Отделение: ул. Черкасская, 18', 'woocommerce' ),
'Черновцы - Отделение №1: ул. Русская, 234г' => __('Черновцы - Отделение №1: ул. Русская, 234г', 'woocommerce' ),
'Черновцы - Отделение №2: ул. Калиновская, 13 (МТК "Калиновский рынок")' => __('Черновцы - Отделение №2: ул. Калиновская, 13 (МТК "Калиновский рынок")', 'woocommerce' ),
'Черновцы - Отделение №3: ул. Коломыйская, 9г (территория ООО "Холод Сервис")' => __('Черновцы - Отделение №3: ул. Коломыйская, 9г (территория ООО "Холод Сервис")', 'woocommerce' ),
'Черновцы - Отделение №4: ул. Главная, 200' => __('Черновцы - Отделение №4: ул. Главная, 200', 'woocommerce' ),
'Черновцы - Отделение №5: ул. Ковальчука, 13' => __('Черновцы - Отделение №5: ул. Ковальчука, 13', 'woocommerce' ),
'Черновцы - Отделение №6 : ул. Школьная, 1' => __('Черновцы - Отделение №6 : ул. Школьная, 1', 'woocommerce' ),
'Черновцы - Отделение № 7: ул. Кордубы, 12 (район Садовой)' => __('Черновцы - Отделение № 7: ул. Кордубы, 12 (район Садовой)', 'woocommerce' ),
'Черновцы - Отделение №8: ул. Героев Майдана, 186 В' => __('Черновцы - Отделение №8: ул. Героев Майдана, 186 В', 'woocommerce' ),
'Черновцы - Отделение №9: ул. Калиновская, 13 б (рынок Добробут)' => __('Черновцы - Отделение №9: ул. Калиновская, 13 б (рынок Добробут)', 'woocommerce' ),
'Черновцы - Отделение № 10: ул. Котляревского, 7' => __('Черновцы - Отделение № 10: ул. Котляревского, 7', 'woocommerce' ),
'Черновцы - Отделение №11: ул. Александри Василе, 2в (Садгора)' => __('Черновцы - Отделение №11: ул. Александри Василе, 2в (Садгора)', 'woocommerce' ),
'Черновцы (Винница) - Отделение №1: ул. Ленина, 95' => __('Черновцы (Винница) - Отделение №1: ул. Ленина, 95', 'woocommerce' ),
'Черноморское (Одесская обл.) - Отделение №1: ул. Гвардейская, 66' => __('Черноморское (Одесская обл.) - Отделение №1: ул. Гвардейская, 66', 'woocommerce' ),
'Чернухи (Полтавская обл.) - Отделение: ул. Ленина, 39' => __('Чернухи (Полтавская обл.) - Отделение: ул. Ленина, 39', 'woocommerce' ),
'Черняхов (Житомирская обл.) - Отделение №1: ул. Ленина, 11' => __('Черняхов (Житомирская обл.) - Отделение №1: ул. Ленина, 11', 'woocommerce' ),
'Чигирин - Отделение: ул. Комсомольская, 17' => __('Чигирин - Отделение: ул. Комсомольская, 17', 'woocommerce' ),
'Чкалово (Новотроицкий р-н, Херсонская обл.) - Отделение №1: ул. Почтовая, 4' => __('Чкалово (Новотроицкий р-н, Херсонская обл.) - Отделение №1: ул. Почтовая, 4', 'woocommerce' ),
'Чкаловское - Отделение №1: ул. Ленина, 16' => __('Чкаловское - Отделение №1: ул. Ленина, 16', 'woocommerce' ),
'Чоп - Отделение №1: ул. Главная, 29а' => __('Чоп - Отделение №1: ул. Главная, 29а', 'woocommerce' ),
'Чортков - Отделение №1: ул. Жалезнодорожная, 87' => __('Чортков - Отделение №1: ул. Жалезнодорожная, 87', 'woocommerce' ),
'Чугуев - Отделение: ул. Леонова, 4' => __('Чугуев - Отделение: ул. Леонова, 4', 'woocommerce' ),
'Чудей - Отделение №1: ул. Еминеску, 78б' => __('Чудей - Отделение №1: ул. Еминеску, 78б', 'woocommerce' ),
'Чуднов - Отделение: ул. Кирова, 1' => __('Чуднов - Отделение: ул. Кирова, 1', 'woocommerce' ),
'Чутово - Отделение №1: ул. Набережная, 1' => __('Чутово - Отделение №1: ул. Набережная, 1', 'woocommerce' ),
'Шаргород (Винницкая обл.) - Отделение: ул. Ленина, 272' => __('Шаргород (Винницкая обл.) - Отделение: ул. Ленина, 272', 'woocommerce' ),
'Шацк - Отделение: ул. С. Шковороды, 29' => __('Шацк - Отделение: ул. С. Шковороды, 29', 'woocommerce' ),
'Шевченково (Измаил) - Отделение №1: ул. Дунайская,1' => __('Шевченково (Измаил) - Отделение №1: ул. Дунайская,1', 'woocommerce' ),
'Шевченково (Харковская обл.) - Отделение: ул. Ленина, 4' => __('Шевченково (Харковская обл.) - Отделение: ул. Ленина, 4', 'woocommerce' ),
'Шегини - Отделение №1: ул. Дружбы, 12' => __('Шегини - Отделение №1: ул. Дружбы, 12', 'woocommerce' ),
'Шепетовка - Отделение №1: ул. Вали Котика, 33' => __('Шепетовка - Отделение №1: ул. Вали Котика, 33', 'woocommerce' ),
'Шепетовка - Отделение №2 : просп. Мира, 5' => __('Шепетовка - Отделение №2 : просп. Мира, 5', 'woocommerce' ),
'Широкое - Отделение: ул. Ленина, 66' => __('Широкое - Отделение: ул. Ленина, 66', 'woocommerce' ),
'Шишаки - Отделение №1: ул. Дерия, 58 (район Больницы)' => __('Шишаки - Отделение №1: ул. Дерия, 58 (район Больницы)', 'woocommerce' ),
'Шостка - Отделение №1: ул. Ленина, 28' => __('Шостка - Отделение №1: ул. Ленина, 28', 'woocommerce' ),
'Шостка - Отделение № 2 : ул. Мира, 8' => __('Шостка - Отделение № 2 : ул. Мира, 8', 'woocommerce' ),
'Шостка - Отделение №3 : пер. Шевченко, 2' => __('Шостка - Отделение №3 : пер. Шевченко, 2', 'woocommerce' ),
'Шпола - Отделение: ул. Ленина, 67' => __('Шпола - Отделение: ул. Ленина, 67', 'woocommerce' ),
'Шумск - Отделение: ул. Украинская, 36' => __('Шумск - Отделение: ул. Украинская, 36', 'woocommerce' ),
'Щирец - Отделение №1: ул. Княжа, 4г' => __('Щирец - Отделение №1: ул. Княжа, 4г', 'woocommerce' ),
'Щорс - Отделение: ул. Фрунзе, 4' => __('Щорс - Отделение: ул. Фрунзе, 4', 'woocommerce' ),
'Щорск - Отделение: ул. Кооперативная, 20' => __('Щорск - Отделение: ул. Кооперативная, 20', 'woocommerce' ),
'Энергодар - Отделение №1: ул. Центральная, 4' => __('Энергодар - Отделение №1: ул. Центральная, 4', 'woocommerce' ),
'Южное - Отделение: ул. Приморская, 19б (Рынок "Приморский")' => __('Южное - Отделение: ул. Приморская, 19б (Рынок "Приморский")', 'woocommerce' ),
'Южноукраинск - Отделение: бульв. Шевченко, 14' => __('Южноукраинск - Отделение: бульв. Шевченко, 14', 'woocommerce' ),
'Яворов - Отделение №1: ул. П.Тичины,1' => __('Яворов - Отделение №1: ул. П.Тичины,1', 'woocommerce' ),
'Яготин - Отделение №1: ул. Щорса, 2' => __('Яготин - Отделение №1: ул. Щорса, 2', 'woocommerce' ),
'Ямполь (Винница) - Отделение: ул. Б. Хмельницкого, 42' => __('Ямполь (Винница) - Отделение: ул. Б. Хмельницкого, 42', 'woocommerce' ),
'Ямполь (Хмельницкий) - Отделение №1: ул. Чернавина, 42а' => __('Ямполь (Хмельницкий) - Отделение №1: ул. Чернавина, 42а', 'woocommerce' ),
'Ямполь (Шостка) - Отделение: бульв. Юбилейный, 6' => __('Ямполь (Шостка) - Отделение: бульв. Юбилейный, 6', 'woocommerce' ),
'Яноши - Отделение №1: ул. Главная, 96а' => __('Яноши - Отделение №1: ул. Главная, 96а', 'woocommerce' ),
'Яремче - Отделение №1: ул. Степана Бандеры, 6/2' => __('Яремче - Отделение №1: ул. Степана Бандеры, 6/2', 'woocommerce' ),
'Яреськи - Отделение № 1: ул. Ленина, 64а' => __('Яреськи - Отделение № 1: ул. Ленина, 64а', 'woocommerce' ),
'Ярмолинцы - Отделение №!: ул. Щорса, 16/4' => __('Ярмолинцы - Отделение №!: ул. Щорса, 16/4', 'woocommerce' )
    		        )
    );

     return $fields;
}
?>