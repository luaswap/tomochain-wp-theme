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
					<h1 class="main-title-page"><?php echo esc_html__( 'TomoChain Game Dappathon', 'tomochain' ); ?></h1>
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
		<div class="tab-game-contest">
			<div class="container">
				<div class="row row-reverse">
					<div class="col-sm-8">
						<div class="tomochain-contest-countdown">
							<div class="box-countdown">
								<h3 class="txt-title"><?php echo esc_html__('The 2nd round will end in','tomochain')?></h3>

								<!-- <h3 class="txt-title"><?php //echo esc_html__('The 1st contest submission ends in:','tomochain')?></h3> -->
								<div id="clockdiv" class="inner-countdown">
									<div class="txt-clock">
										<span class="days"></span>
										<div class="smalltext"><?php echo esc_html__('days','tomochain')?></div>
									</div>
									<div class="txt-clock">
										<span class="hours"></span>
										<div class="smalltext"><?php echo esc_html__('hours','tomochain')?></div>
									</div>
									<div class="txt-clock">
										<span class="minutes"></span>
										<div class="smalltext"><?php echo esc_html__('minutes','tomochain')?></div>
									</div>
									<div class="txt-clock">
										<span class="seconds"></span>
										<div class="smalltext"><?php echo esc_html__('second','tomochain')?></div>
									</div>
								</div>
								<script>
									function getTimeRemaining(endtime) {
										var t = Date.parse(endtime) - Date.parse(new Date());
										var seconds = Math.floor((t / 1000) % 60);
										var minutes = Math.floor((t / 1000 / 60) % 60);
										var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
										var days = Math.floor(t / (1000 * 60 * 60 * 24));
										if (t <= 0) {
											return {
												'total': 0,
												'days': 0,
												'hours': 0,
												'minutes': 0,
												'seconds': 0
											};
										}
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
									var time_update = "May 22, 2019 24:00:00";
									var deadline = new Date(time_update);
									initializeClock('clockdiv', deadline);
								</script> 
							</div><!-- /box-countdown -->
						</div><!-- /tomochain-contest-countdown -->
					</div>
					<div class="col-sm-4">
						<ul class="tomochain-contest-filter d-none">
							<li>
								<span class="tab-item active"><?php esc_html__('Form Submission', 'tomochain')?></span>
							</li>
							<li class="d-none">
								<span class="tab-item"><?php esc_html__('Contest', 'tomochain')?></span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- tab-game-contest -->