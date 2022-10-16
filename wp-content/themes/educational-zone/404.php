<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Educational Zone
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main card shadow-sm module-border-wrap mb-4">
        <section class="error-404 not-found card-body">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
						'educational-zone' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
						'educational-zone' ); ?></p>
				<?php
				get_search_form();
				the_widget( 'WP_Widget_Recent_Posts' );
				?>
                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories',
							'educational-zone' ); ?></h2>
                    <ul>
						<?php
						wp_list_categories( array(
							'orderby'  => 'count',
							'order'    => 'DESC',
							'title_li' => '',
							'number'   => 10,
						) );
						?>
                    </ul>
                </div><!-- .widget -->
				<?php
				/* translators: %1$s: smiley */
				$educational_zone_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'educational-zone' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$educational_zone_archive_content" );
				the_widget( 'WP_Widget_Tag_Cloud' );
				?>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>