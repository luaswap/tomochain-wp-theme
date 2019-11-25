<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package st
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
	?>
</div>
<?php endif; ?>
<div class="site">
	<?php if (!is_404()): ?>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<nav id="site-menu" class="main-menu hidden-md-down">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'link_before'    => '<span class="menu-item-text">',
						'link_after'     => '</span>'
					) );
					?>
				</nav><!-- #site-menu -->
				<div class="header-tools">
					<?php
						tmc_mobile_menu_btn();
						tmc_search_icon_nav();
					?>
				</div><!-- .header-tools-->
			</div>
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>
	<?php do_action('tmc_page_title');?>
	<div id="content" class="site-content">
