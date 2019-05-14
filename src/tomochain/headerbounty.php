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
$home_url = get_home_url();

if (function_exists('pll_home_url')) {
	$home_url = pll_home_url();
}
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
<div id="page" class="site page-tomo-bounty">
	<?php if (!is_404()): ?>
	<div class="header-bounty">
		<div class="container">
			<div class="row">
				<div class="col-5 col-lg-3">
					<div class="logo-tomo">
						<a href="<?php echo esc_url($home_url); ?>">
							<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/logo-tomobounty.png'); ?>" alt="logo-tomobounty">
						</a>
					</div>
				</div>
				<div class="col-7 col-lg-6">
					<h1 class="main-title-page"><?php echo esc_html__( 'TomoChain Bounties Program', 'tomochain' ); ?></h1>
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
	</div><!-- header-bounty -->
	<?php endif; ?>

	<div id="content" class="site-content-bounty">