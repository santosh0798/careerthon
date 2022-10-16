<?php
/**
 * The blog posts index template file
 *
 * If the user has selected  your latest blog posts for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Educational Zone
 */

get_header();
?>

    <div id="primary" class="content-area col-sm-12 <?php echo is_active_sidebar('sidebar-1') ? "col-lg-8" : "col-lg-12"; ?>">
        <main id="main" class="site-main">
            <div class="card-columns">
                <?php

                if (have_posts()) :

                while (have_posts()) :the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="card module-border-wrap hvr-glow">

                            <?php if (has_post_thumbnail()): ?>
                                <a class="post-thumbnail" href="<?php the_permalink() ?>">
                                    <img class="card-img-bottom" src="<?php the_post_thumbnail_url() ?>"
                                         alt="<?php the_title_attribute() ?>">
                                </a>
                            <?php endif; ?>
                            <!-- .post-thumbnail -->

                            <div class="card-body">

                                <h3 class="entry-title card-title ">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h3><!-- .entry-tile -->
                                <hr>
                                <p class="entry-meta">
                                    <small><?php educational_zone_posted_on(); ?></small>
                                </p><!-- .entry-meta -->

                                <p class="entry-summary">
                                    <?php
                                    the_excerpt();
                                    ?>
                                </p><!-- .entry-summary -->
                            </div>
                        </div>
                    </article>
                    <!-- #post -->
                <?php endwhile; // End of the loop.
                ?>
            </div>

            <div class="col-lg-12 my-5">
                <?php the_posts_pagination(); ?>

            </div>

            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
