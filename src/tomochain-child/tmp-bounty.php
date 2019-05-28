<?php
/* Template name: tmp bounty */

get_template_part('headerbounty');
	$home_url = get_home_url();

	if (function_exists('pll_home_url')) {
		$home_url = pll_home_url();
	}
?>
	<div class="content-area">
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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php
get_template_part('footerbounty'); ?>
