<?php
/* Template name: tmp roadmap */

get_template_part('headerld');
	$home_url = get_home_url();

	if (function_exists('pll_home_url')) {
	    $home_url = pll_home_url();
	}
?>
<div class="header-roadmap">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3">
				<div class="logo-tomo">
					<a href="<?php echo esc_url($home_url); ?>">
						<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/logo-tomochain.png'); ?>" alt="Logo">
					</a>
				</div>
			</div>
			<div class="col-6 col-lg-6">
				<h1 class="main-title-page">Roadmap</h1>
			</div>
			<div class="col-12 col-lg-3">
				<div class="check-time">March 2019</div>
			</div>
		</div>
	</div>
</div>
<div class="content-area tmp-roadmap">
	<main class="site-main">
		<div class="container">
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_template_part('footerld'); ?>
