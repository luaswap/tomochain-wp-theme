<?php
/* Template name: tmp game contest */

get_template_part('headerldgame');
	$home_url = get_home_url();

	if (function_exists('pll_home_url')) {
		$home_url = pll_home_url();
	}
?>
<div class="tab-game-contest">
	<div class="container">
		<div class="row row-reverse">
			<div class="col-sm-8">
				<div class="tomochain-contest-countdown">
					<div class="box-countdown">
						<h3 class="txt-title"><?php echo esc_html_e('The 1st contest submission ends in:','tomochain-addons')?></h3>
						<div id="clockdiv" class="inner-countdown">
							<div class="txt-clock">
								<span class="days"></span>
								<div class="smalltext"><?php echo esc_html_e('days','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="hours"></span>
								<div class="smalltext"><?php echo esc_html_e('hours','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="minutes"></span>
								<div class="smalltext"><?php echo esc_html_e('minutes','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="seconds"></span>
								<div class="smalltext"><?php echo esc_html_e('second','tomochain-addons')?></div>
							</div>
						</div>
						<script>
							function getTimeRemaining(endtime) {
								var t = Date.parse(endtime) - Date.parse(new Date());
								var seconds = Math.floor((t / 1000) % 60);
								var minutes = Math.floor((t / 1000 / 60) % 60);
								var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
								var days = Math.floor(t / (1000 * 60 * 60 * 24));
								return {
									'total': t,
									'days': days,
									'hours': hours,
									'minutes': minutes,
									'seconds': seconds
								};
							}
							function initializeClock(id, endtime) {
								var clock = document.getElementById(id);
								var daysSpan = clock.querySelector('.days');
								var hoursSpan = clock.querySelector('.hours');
								var minutesSpan = clock.querySelector('.minutes');
								var secondsSpan = clock.querySelector('.seconds');

								function updateClock() {
									var t = getTimeRemaining(endtime);

									daysSpan.innerHTML = t.days;
									hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
									minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
									secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

									if (t.total <= 0) {
									  clearInterval(timeinterval);
									}
								}

								updateClock();
								var timeinterval = setInterval(updateClock, 1000);
							}
							//var time_update = "<?php //echo esc_attr($time_update);?>";
							var time_update = "April 15, 2019 23:59:59";
							var deadline = new Date(time_update);
							initializeClock('clockdiv', deadline);
						</script>
					</div><!-- /box-countdown -->
				</div><!-- /tomochain-contest-countdown -->
			</div>
			<div class="col-sm-4">
				<ul class="tomochain-contest-filter d-none">
					<li>
						<span class="tab-item active"><?php esc_html_e('Form Submission', 'tomochain-addons')?></span>
					</li>
					<li class="d-none">
						<span class="tab-item"><?php esc_html_e('Contest', 'tomochain-addons')?></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div><!-- tab-game-contest -->
<div class="content-area con-game-contest">
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
<script>
    var wpcf7Elm = document.querySelector( '.wpcf7' );
    wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
    	jQuery('#tomoModalCenter').modal('hide');
    }, false );
</script>
<?php
get_template_part('footerld'); ?>
