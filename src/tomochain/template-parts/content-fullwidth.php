<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */

$classes = 'col-xs-12 col-md-6';
$custom_url = get_field('custom_url');
$open_new_tab = get_field('open_in_new_tab') ? '__blank' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

    <a class="post-thumbnail" href="<?php echo ($custom_url ? esc_url($custom_url) : '#'); ?>" target="<?php echo esc_attr($open_new_tab); ?>" aria-hidden="true" tabindex="-1">
        <?php the_post_thumbnail('tomo-single-thumbnail'); ?>
    </a>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . ($custom_url ? esc_url($custom_url) : '#') . '" target="' . esc_attr($open_new_tab) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				tomochain_posted_by();
				tomochain_posted_on();
                tomochain_categories();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tomochain' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tomochain' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer row">
		<?php tomochain_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
