<?php
/**
 * Displays header site branding
 *
 * @package Educational Zone
 */
?>

<div class="custom-header">
	<?php if ( has_header_image() ) { ?>
        <img class="vh-100" src=<?php header_image(); ?>>
	<?php } ?>
    <div class="bg-gradient">
        <div class="site-branding centered">
            <h1>
                <?php
                if (get_theme_mod('header_banner_title_setting')) {
                    echo esc_html(get_theme_mod('header_banner_title_setting'));
                }
                ?>
            </h1>
            <?php
            if ( get_theme_mod( 'header_banner_description_setting' ) ) {
	            echo esc_html(get_theme_mod( 'header_banner_description_setting' ));
            }
            ?>
            <?php
            if ( get_theme_mod( 'header_banner_button_setting' ) ) {
                echo '<a href="'.esc_url(get_theme_mod( 'header_banner_button_setting' )).'" alt="'.esc_attr__( 'Read more','educational-zone' ).'"><button type="button" class="btn btn-light">'.esc_html__( 'Read more','educational-zone' ).'</button></a>';
            }
            ?>
        </div>
    </div>
</div>