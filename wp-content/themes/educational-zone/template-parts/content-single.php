<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!has_post_thumbnail()): ?>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <hr>
            <?php if ('post' === get_post_type()) :?>
                <div class="entry-meta">
                    <?php
                        educational_zone_posted_on();
                    ?>
                </div>
            <?php endif; ?>
        </header>
    <?php
    endif; ?>

    <div class="entry-content">
        <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'educational-zone'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'educational-zone'),
                'after' => '</div>',
            ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php educational_zone_entry_footer(); ?>
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->