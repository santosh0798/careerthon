<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

get_header();
?>

    <div id="primary" class="content-area col-sm-12 <?php echo is_active_sidebar('sidebar-1') ? "col-lg-8" : "col-lg-12"; ?>">
        <main id="main" class="site-main card shadow-sm module-border-wrap mb-4">
            <div class="card-body">

                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title('<h4 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header>
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </div>
        </main>
    </div>
<?php
get_sidebar();
get_footer();
