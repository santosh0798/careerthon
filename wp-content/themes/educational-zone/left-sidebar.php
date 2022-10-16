<?php
/**
* Template Name: Left sidebar
 */

get_header();
get_sidebar();
?>

    <div id="primary" class="content-area col-sm-12 col-lg-9">
        <main id="main" class="site-main card  shadow-sm module-border-wrap">
			<?php
			while (have_posts()) :
				the_post();


				get_template_part('template-parts/content', 'page');

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
