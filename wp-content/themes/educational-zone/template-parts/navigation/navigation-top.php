<?php
/**
 * Displays top navigation
 *
 * @package Educational Zone
 */
?>
<div class="toggle-nav mobile-menu">
    <?php if(has_nav_menu('primary')){ ?>
        <button onclick="educational_zone_openNav()" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','educational-zone'); ?></span></button>
    <?php }?>
</div>
<div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'educational-zone' ); ?>">
        <?php if(has_nav_menu('primary')){ ?>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
            ?>
        <?php }?>
    </nav>
    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="educational_zone_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','educational-zone'); ?></span></a>
</div>