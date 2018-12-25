<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
$columns = get_field('blog_columns','options') ? get_field('blog_columns','options') : '3';

$classes = 'col-xs-12 col-md-'.$columns;
$custom_url = get_field('custom_url');
$open_new_tab = get_field('open_in_new_tab') ? '__blank' : '';

$enable_excerpt = get_field('blog_enable_excerpt','options');
$excerpt_length = get_field('blog_excerpt_length','options') ? get_field('blog_excerpt_length','options') : '20';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	<div class="inner">
		<div class="box-content">
			<div class="entry-img">
				<?php tomochain_post_thumbnail(); ?>
			</div>
			<div class="entry-header">
				<?php
					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php tomochain_post_date(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
		            the_title('<h2 class="entry-title"><a href="' . ($custom_url ? esc_url($custom_url) : get_permalink()) . '" target="' . esc_attr($open_new_tab) . '" rel="bookmark">', '</a></h2>');
				endif;?>
			</div>
			<div class="entry-box">
				<?php if(get_the_excerpt()):?>
					<div class="entry-content">
						<?php
						if($enable_excerpt)
						echo tomochain_excerpt($excerpt_length);

						// wp_link_pages( array(
						// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tomochain' ),
						// 	'after'  => '</div>',
						// ) );
						?>
					</div>
				<?php endif;?>
				<div class="entry-footer">
					<a class="btn-tmp-txt1" href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark"><?php echo esc_html__('See detail','tomochain')?></a>
				</div>
			</div>
		</div>
		<span class="btn_close"><?php echo esc_html__('Close','tomochain');?></span>
	</div>
</article>
