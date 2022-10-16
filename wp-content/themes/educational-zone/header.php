<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Educational Zone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} else { do_action( 'wp_body_open' ); }
$educational_zone_sticky_header = get_theme_mod('educational_zone_sticky_header');
    $data_sticky = "false";
    if ($educational_zone_sticky_header) {
        $data_sticky = "true";
    }
 ?>
<?php if(get_theme_mod('educational_zone_preloader_hide','')){ ?>
        <div class="loading">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    <?php } ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'educational-zone'); ?></a>
    
    <header id="masthead" class="site-header fixed-top shadow-sm navbar-dark bg-primary">
        <div class="socialmedia">
            <?php get_template_part('template-parts/socialmedia/socialmedia', 'social'); ?>
        </div>
    </header>
    <div class="header-menu" data-sticky="<?php echo esc_attr($data_sticky); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-9">
                    <div class="navbar-brand">
                       <?php if ( has_custom_logo() ) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <?php $blog_info = get_bloginfo( 'name' ); ?>
                            <?php if ( ! empty( $blog_info ) ) : ?>
                                <?php if ( is_front_page() && is_home() ) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-3">
                    <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
                </div>
            </div>
        </div>
    </div>


    <?php if (is_home() || is_front_page()) : ?>

        <?php get_template_part('template-parts/header/site', 'branding'); ?>

    <?php

    /*
	 * If a regular post or page, and not the front page, show the featured image.
	 */

    elseif ((is_single() || ( is_page() && !is_page_template('featured-image.php') && !is_page_template('fullwidth2.php'))) && has_post_thumbnail()):
        get_template_part('template-parts/header/featured-image', 'header');
    endif; ?>

    <div id="content" class="site-content">
        <div class="container">
            <div class="row">

