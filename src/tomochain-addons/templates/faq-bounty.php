<?php
/*
* Tempalte name: FAQ Bounty
*/
get_template_part('headerbounty');
?>
	<div class="content-area">
		<main class="site-main">
			<div class="container">
				<!-- content - list -->
				<div class="row">
					<div class="col-12">
							<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
					?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<?php
get_template_part('footerbounty'); ?>
