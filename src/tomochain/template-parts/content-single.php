<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-thumbnail">
        <?php the_post_thumbnail('tomo-single-thumbnail'); ?>
    </div>

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				tomochain_posted_by();
                tomochain_categories();
				?>
			</div><!-- .entry-meta -->
		<?php elseif('event' === get_post_type()):
			$start_date = date_i18n(get_option( 'date_format' ), strtotime(get_field('start_date')));
			$end_date   = date_i18n(get_option( 'date_format' ), strtotime(get_field('end_date')));
			$date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');
			?>
			<div class="entry-meta">
				<?php if($date){?>
					<span class="posted-on"><?php echo $date;?></span>
				<?php }?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		// echo tomochain_excerpt(30);
		the_content();

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
