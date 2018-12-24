<?php
/**
 * Template part for displaying events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
$columns = get_field('event_columns','options') ? get_field('event_columns','options') : '3';
$classes = 'col-xs-12 col-md-'.$columns;
$custom_url = get_field('event_custom_url');
$open_new_tab = get_field('event_open_in_new_tab') ? '__blank' : '';
$start_date = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('start_date')));
$end_date   = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('end_date')));

$date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');

$enable_excerpt = get_field('event_enable_excerpt','options');
$excerpt_length = get_field('event_excerpt_length','options') ? get_field('event_excerpt_length','options') : '20';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?> data-id="<?php echo esc_attr(get_the_ID());?>">
	
    <?php the_post_thumbnail('tomo-post-thumbnail'); ?>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
            the_title('<h2 class="entry-title">','</h2>');
            // the_title('<h2 class="entry-title"><a href="' . ($custom_url ? esc_url($custom_url) : get_permalink()) . '" target="' . esc_attr($open_new_tab) . '" rel="bookmark">', '</a></h2>');
		endif;

			?>
		<div class="entry-meta">
			<?php if($date){?>
				<span class="posted-on"><?php echo $date;?></span>
			<?php }?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if($enable_excerpt)
		echo tomochain_excerpt($excerpt_length);

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tomochain' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //tomochain_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
