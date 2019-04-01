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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!is_404()): ?>
<div class="site-mobile-menu-wrapper">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'header-menu-enterprise',
		'menu_id'        => 'site-mobile-menu',
	) );
	tomochain_social_links();
	?>
</div>
<?php endif; ?>
<div id="page" class="site enterprise">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tomochain' ); ?></a>
	<?php if (!is_404()): ?>
	<div class="header-game-contest">
		<div class="container">
			<div class="row">
				<div class="col-5 col-lg-3">
					<div class="logo-tomo">
						<a href="<?php echo esc_url($home_url); ?>">
							<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/logo-tomochain.png'); ?>" alt="Logo">
						</a>
					</div>
				</div>
				<div class="col-7 col-lg-6">
					<h1 class="main-title-page"><?php esc_html_e( 'TomoChain Game Dappathon', 'tomochain-addons' ); ?></h1>
				</div>
				<div class="col-12 col-lg-3">
					<div class="header-tools">
						<?php
							if ( function_exists('get_field') && ! get_field('hide_language_switcher') ) {
								tomochain_lang_switcher();
							}
							// tomochain_mobile_menu_btn();
						?>
					</div><!-- .header-tools-->
				</div>
			</div>
		</div>
	</div><!-- header-game-contest -->
	<?php endif; ?>

	<div id="content" class="site-content">
