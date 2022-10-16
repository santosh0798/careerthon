<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Educational Zone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <hr>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php educational_zone_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<?php educational_zone_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php educational_zone_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
