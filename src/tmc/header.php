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
	<?php do_action('tmc_before_site_content');?>
	<?php if (!is_404()): ?>
	<header id="masthead" class="site-header">
		<div class="tmc-header">
			<div class="container">
				<div class="navbar-header">
					<div class="site-branding">
						<?php if(has_custom_logo()){
							the_custom_logo();
						}else{?>
							<h2><a  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h2>
						<?php }
						?>
					</div><!-- .site-branding -->
					<nav id="site-menu" class="main-menu hidden-md-down">
						<?php
						$a = tmc_get_option('tmc_report_list');
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
							// tmc_search_icon_nav();
						?>
					</div><!-- .header-tools-->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>
	<?php do_action('tmc_page_title');?>
	<div id="content" class="site-content">
