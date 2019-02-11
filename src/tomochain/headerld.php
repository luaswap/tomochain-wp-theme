<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!is_404()): ?>
<div class="site-mobile-menu-wrapper">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_id'        => 'site-mobile-menu',
	) );
	tomochain_social_links();
	?>
</div>
<?php endif; ?>
<div class="popup_btn tomo_btn_tmp_grad_disc">
    <a href="https://discord.gg/2S6GdpJ" title="" target="_blank"><span>Join us on Discord</span> <i class="fab fa-discord"></i></a>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tomochain' ); ?></a>
	<?php if (!is_404()): ?>
	<?php endif; ?>

	<div id="content" class="site-content">
