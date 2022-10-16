<?php
/**
 * Displays top navigation
 *
 * @package Educational Zone
 */
?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-left">
        <div class="welcome-text">
          <?php echo esc_html( get_theme_mod( 'educational_zone_welcome_text','' ) ); ?>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-9">
            <?php if ( has_nav_menu( 'top' ) ): ?>
              <nav class="top-menu-right top-menu">
                <?php
                wp_nav_menu( array(
                  'theme_location' => 'top',
                  'container'      => 'div',
                  'container_id'   => 'main-nav',
                  'menu_id'        => false,
                  'depth'          => 1,
                ) );
                ?>
              </nav>
            <?php endif ?>
          </div>

          <div class="col-md-3">
            <div class="social-media">

              <?php if( get_theme_mod( 'educational_zone_facebook_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'educational_zone_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'educational_zone_twitter_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'educational_zone_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'educational_zone_youtube_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'educational_zone_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'educational_zone_linkedin_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'educational_zone_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>