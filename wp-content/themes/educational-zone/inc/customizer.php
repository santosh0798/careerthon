<?php
/**
 * Educational Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Educational Zone
 */

use WPTRT\Customize\Section\Educational_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Educational_Zone_Button::class );

    $manager->add_section(
        new Educational_Zone_Button( $manager, 'educational_zone_pro', [
            'title'       => __( 'Education Zone Pro', 'educational-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'educational-zone' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/education-wordpress-theme', 'educational-zone')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'educational-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'educational-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function educational_zone_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {

        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'educational_zone_customize_partial_blogname',
        ));
    }

    // General Settings
     $wp_customize->add_section('educational_zone_general_settings',array(
        'title' => esc_html__('General Settings','educational-zone'),
        'description' => esc_html__('General settings of our theme.','educational-zone'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('educational_zone_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'educational_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'educational_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'educational-zone' ),
        'section'        => 'educational_zone_general_settings',
        'settings'       => 'educational_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    // Theme Color
    $wp_customize->add_section('educational_zone_color_option',array(
        'title' => esc_html__('Theme Color','educational-zone'),
        'description' => esc_html__('Change theme color on one click.','educational-zone'),
    ));

    $wp_customize->add_setting( 'educational_zone_theme_color', array(
        'default' => '#003e7d',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'educational_zone_theme_color', array(
        'label' => esc_html__('Color Option','educational-zone'),
        'section' => 'educational_zone_color_option',
        'settings' => 'educational_zone_theme_color' 
    )));

    //welcome text
    $wp_customize->add_section('educational_zone_welcome_textmessage',array(
        'title' => esc_html__('Welcome text ','educational-zone'),
        'description' => esc_html__('Topbar content','educational-zone'),
    ));

    $wp_customize->add_setting('educational_zone_welcome_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('educational_zone_welcome_text',array(
        'label' => esc_html__('Welcome text','educational-zone'),
        'section' => 'educational_zone_welcome_textmessage',
        'setting' => 'educational_zone_welcome_text',
        'type'  => 'text'
    ));

    //social icons
    $wp_customize->add_section('educational_zone_social_icons',array(
        'title' => esc_html__('Social Icons ','educational-zone'),
        'description' => esc_html__('Topbar content','educational-zone'),
    ));

    $wp_customize->add_setting('educational_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_facebook_url',array(
        'label' => esc_html__('Facebook link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_twitter_url',array(
        'label' => esc_html__('Twitter link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('educational_zone_youtube_url',array(
        'label' => esc_html__('Youtube link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_youtube_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'educational_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'educational_zone_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'educational-zone' ),
        'section'        => 'educational_zone_social_icons',
        'settings'       => 'educational_zone_sticky_header',
        'type'           => 'checkbox',
    )));

    // Banner title
    $wp_customize->add_setting('header_banner_title_setting', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __('Banner Title', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_title_setting',
        'type' => 'text'
    )));

    // Banner description
    $wp_customize->add_setting('header_banner_description_setting', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_description_setting', array(
        'label' => __('Banner description', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_description_setting',
        'type' => 'text'
    )));

    // Banner button
    $wp_customize->add_setting('header_banner_button_setting', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_button_setting', array(
        'label' => __('Banner button link', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_button_setting',
        'type' => 'url'
    )));

    //Our Services section
    $wp_customize->add_section( 'educational_zone_services_section' , array(
        'title'      => __( 'Our Course Settings', 'educational-zone' ),
        'priority'   => null
    ) );

    $wp_customize->add_setting('educational_zone_section_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('educational_zone_section_title',array(
        'label' => __('Add Section Title','educational-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Our Course', 'educational-zone' ),
        ),
        'section'=> 'educational_zone_services_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('educational_zone_section_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('educational_zone_section_text',array(
        'label' => __('Add Section Text','educational-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum is dummy text', 'educational-zone' ),
        ),
        'section'=> 'educational_zone_services_section',
        'type'=> 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('educational_zone_our_services',array(
        'default'   => 'select',
        'sanitize_callback' => 'educational_zone_sanitize_choices',
    ));
    $wp_customize->add_control('educational_zone_our_services',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Services','educational-zone'),
        'description' => __('Image Size (50 x 50)','educational-zone'),
        'section' => 'educational_zone_services_section',
    ));
    
    // Footer
    $wp_customize->add_section('educational_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'educational-zone'),
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_setting('educational_zone_footer_text_setting', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('educational_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'educational-zone'),
        'section' => 'educational_zone_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}

add_action('customize_register', 'educational_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function educational_zone_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function educational_zone_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function educational_zone_customize_preview_js()
{
    wp_enqueue_script('educational-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'educational_zone_customize_preview_js');