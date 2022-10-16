<?php
/**
 * Educational Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Educational Zone
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Educational_Zone_Loader.php' );

$educational_zone_loader = new \WPTRT\Autoload\Educational_Zone_Loader();

$educational_zone_loader->educational_zone_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$educational_zone_loader->educational_zone_register();

if ( ! function_exists( 'educational_zone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function educational_zone_setup() {

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );
		
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

        add_image_size('educational-zone-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','educational-zone' ),
	        'footer'=>esc_html__( 'Footer Menu','educational-zone' ),
	        'social'=>esc_html__( 'Social Menu','educational-zone' ),
	        'top'=>esc_html__( 'Top Menu','educational-zone' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
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
		add_theme_support( 'custom-background', apply_filters( 'educational_zone_custom_background_args', array(
			'default-color' => 'f7f7f7',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 40,
			'flex-width'  => true,
		) );

		add_editor_style( array( 'css/editor-style.css' ) );

		add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'educational_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function educational_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'educational_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'educational_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function educational_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'educational-zone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'educational-zone' ),
        'before_widget' => '<section id="%1$s" class="widget card shadow-sm mb-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title card-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'educational-zone' ),
		'id'            => 'woo-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'educational-zone' ),
        'before_widget' => '<section id="%1$s" class="widget card shadow-sm mb-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title card-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'educational-zone' ),
		'id'            => 'educational-zone-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'educational-zone' ),
		'id'            => 'educational-zone-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'educational-zone' ),
		'id'            => 'educational-zone-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'educational_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function educational_zone_scripts() {
    // load bootstrap css
    wp_enqueue_style( 'flatly-css', esc_url(get_template_directory_uri()) . '/assets/css/flatly.css');

    wp_enqueue_style( 'educational-zone-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// fontawesome
	wp_enqueue_style( 'fontawesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_style( 'educational-zone-style', get_stylesheet_uri() );

    wp_style_add_data('educational-zone-style', 'rtl', 'replace');

    // load bootstrap js
    wp_enqueue_script('popper-js', esc_url(get_template_directory_uri()) . '/assets/js/popper.js', array(), '', true );
    wp_enqueue_script('bootstrap-js', esc_url(get_template_directory_uri()) . '/assets/js/bootstrap.js', array(), '', true );    
    wp_enqueue_script('educational-zone-theme-js', esc_url(get_template_directory_uri()) . '/assets/js/theme-script.js', array(), '', true );

    wp_enqueue_script('educational-zone-skip-link-focus-fix', esc_url(get_template_directory_uri()) . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'educational_zone_scripts' );

/**
 * Enqueue theme color style.
 */
function educational_zone_theme_color() {

    $theme_color_css = '';
    $educational_zone_theme_color = get_theme_mod('educational_zone_theme_color');

	$theme_color_css = '
		.socialmedia,.sticky .entry-title::before,#button,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.wp-block-button__link,.main-navigation .sub-menu,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce .woocommerce-ordering select,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
			background: '.esc_attr($educational_zone_theme_color).';
		}
		@media screen and (max-width:1000px){
	         .sidenav #site-navigation {
	        background: '.esc_attr($educational_zone_theme_color).';
	 		}
		}
		.card-body p a, .entry-content a, .entry-summary a, .comment-content a,.navbar-brand a,#colophon a:hover, #colophon a:focus,a:hover,.widget a:hover, .widget a:focus,.main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus, .main-navigation .sub-menu > li > .menu-item-link-return:hover, .main-navigation .sub-menu > li > .menu-item-link-return:focus,.woocommerce-message::before, .woocommerce-info::before, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price,.serv-box h4 a{
			color: '.esc_attr($educational_zone_theme_color).';
		}
		.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.woocommerce-message, .woocommerce-info,.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote{
			border-color: '.esc_attr($educational_zone_theme_color).';
		}
	';
    wp_add_inline_style( 'educational-zone-style',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'educational_zone_theme_color' );

/**
 * Enqueue S Header.
 */
function educational_zone_sticky_header() {

  $educational_zone_sticky_header = get_theme_mod('educational_zone_sticky_header');

  $educational_zone_custom_style= "";

  if($educational_zone_sticky_header != true){

    $educational_zone_custom_style .='.stick_header{';

      $educational_zone_custom_style .='position: static;';
      
    $educational_zone_custom_style .='}';
  } 

  wp_add_inline_style( 'restaurant-zone-style',$educational_zone_custom_style );

}
add_action( 'wp_enqueue_scripts', 'educational_zone_sticky_header' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*radio button sanitization*/
function educational_zone_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function educational_zone_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function educational_zone_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'educational_zone_skip_link_focus_fix' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'educational_zone_loop_columns', 999);
if (!function_exists('educational_zone_loop_columns')) {
	function educational_zone_loop_columns() {
		return 3; // 3 products per row
	}
}

// checkbox sanitization
function educational_zone_sanitize_checkbox( $input ) {
  // Boolean check 
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Get CSS
 */

function educational_zone_getpage_css($hook) {
	if ( 'appearance_page_educational-zone-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'educational-zone-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'educational_zone_getpage_css' );

add_action('after_switch_theme', 'educational_zone_setup_options');

function educational_zone_setup_options () {
	wp_redirect( admin_url() . 'themes.php?page=educational-zone-info.php' );
}

if ( ! defined( 'EDUCATIONAL_ZONE_CONTACT_SUPPORT' ) ) {
define('EDUCATIONAL_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/educational-zone','educational-zone'));
}
if ( ! defined( 'EDUCATIONAL_ZONE_REVIEW' ) ) {
define('EDUCATIONAL_ZONE_REVIEW',__('https://wordpress.org/support/theme/educational-zone/reviews/#new-post','educational-zone'));
}
if ( ! defined( 'EDUCATIONAL_ZONE_LIVE_DEMO' ) ) {
define('EDUCATIONAL_ZONE_LIVE_DEMO',__('https://www.themagnifico.net/eard/education-wordpress-theme/','educational-zone'));
}
if ( ! defined( 'EDUCATIONAL_ZONE_GET_PREMIUM_PRO' ) ) {
define('EDUCATIONAL_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/education-wordpress-theme/','educational-zone'));
}
if ( ! defined( 'EDUCATIONAL_ZONE_PRO_DOC' ) ) {
define('EDUCATIONAL_ZONE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/educational-zone-pro-doc','educational-zone'));
}

add_action('admin_menu', 'educational_zone_themepage');
function educational_zone_themepage(){
	$theme_info = add_theme_page( __('Theme Options','educational-zone'), __('Theme Options','educational-zone'), 'manage_options', 'educational-zone-info.php', 'educational_zone_info_page' );
}

function educational_zone_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap educational-zone-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','educational-zone'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "educational-zone"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Educational Zone , feel free to contact us for any support regarding our theme.", "educational-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "educational-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "educational-zone"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "educational-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "educational-zone"); ?>
						</a></p>
					</div>
				</div>  
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "educational-zone"); ?></h3>
						<p><?php esc_html_e("If You love Educational Zone theme then we would appreciate your review about our theme.", "educational-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "educational-zone"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","educational-zone"); ?></h2>
		<div class="educational-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "educational-zone"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "educational-zone"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "educational-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "educational-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "educational-zone"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "educational-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "educational-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "educational-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Premium Support", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "educational-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="educational-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "educational-zone"); ?>
			</a>
		</div>
	</div>
	<?php
}

