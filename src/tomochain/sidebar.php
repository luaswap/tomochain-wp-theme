<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php if('event' == get_post_type()):
			dynamic_sidebar( 'sidebar-event' );
		else:?>
		<?php dynamic_sidebar( 'sidebar-1' ); 

		endif;?>
</aside><!-- #secondary -->
