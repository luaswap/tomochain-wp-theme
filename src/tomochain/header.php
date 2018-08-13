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
<div class="site-mobile-menu-wrapper">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_id'        => 'site-mobile-menu',
    ) );
    tomochain_social_links();
	?>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tomochain' ); ?></a>

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
					<?php tomochain_mobile_menu_btn(); ?>
				</div><!-- .header-tools-->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
