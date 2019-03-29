<?php
/* Template name: tmp game contest */

get_template_part('headerld');
	$home_url = get_home_url();

	if (function_exists('pll_home_url')) {
		$home_url = pll_home_url();
	}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
				<h1 class="main-title-page">TomoChain Game Dappathon</h1>
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
<div class="tab-game-contest">
	<div class="container">
		<div class="row row-reverse">
			<div class="col-sm-8">
				<div class="tomochain-contest-countdown">
					<div class="box-countdown">
						<h3 class="txt-title"><?php echo esc_html__('The 1st contest submission ends in:','tomochain-addons')?></h3>
						<div id="clockdiv" class="inner-countdown">
							<div class="txt-clock">
								<span class="days"></span>
								<div class="smalltext"><?php echo esc_html__('days','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="hours"></span>
								<div class="smalltext"><?php echo esc_html__('hours','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="minutes"></span>
								<div class="smalltext"><?php echo esc_html__('minutes','tomochain-addons')?></div>
							</div>
							<div class="txt-clock">
								<span class="seconds"></span>
								<div class="smalltext"><?php echo esc_html__('second','tomochain-addons')?></div>
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
						<span class="tab-item active">Form Submission</span>
					</li>
					<li class="d-none">
						<span class="tab-item">Contest</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div><!-- tab-game-contest -->
<div class="content-area con-game-contest">
	<main class="site-main">
		<div class="container">
			<div class="tab-main-content">
				<div class="tab-pane-tomo">
					<div class="row">
						<div class="col-md-6">
							<div class="box-infor-ct">
								<h2 class="tmp-tile-contest">The First International<br>TomoChain Game Dappathon</h2>
								<div class="txt-desc">FROM GAME DEV TO GAME CHANGER</div>
								<div class="game-avatar">
									<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/game-avatar.png'); ?>" alt="Game Contest">
								</div>
								<div class="txt-prize">
									Win a share of <strong>20,000 USD*</strong>
								</div>
								<div class="btn-contest">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tomoModalCenter">
										Register your interest
									</button>
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="tomoModalCenter" tabindex="-1" role="dialog">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content tomo-modal">
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
										<div class="modal-footer">
											<span class="btn btn-secondary" data-dismiss="modal"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-content-ct">
								<div id="accordion">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Introduction
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
												<p>
													TomoChain is pleased to announce our first international blockchain gaming contest
												</p>
												<p>
													We are inviting all developers, from anywhere in the world to join us in this event to build fun and creative games on the TomoChain blockchain
												</p>
												<p>
													This contest is held online (so truly anyone can enter), and we aim to reach developers all around the world, who are interested in exploring Dapp development and explore how blockchain technology can revolutionize the gaming industry
												</p>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													Prizes
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body txt-body d-none">
												<p>Mini Contest up to <strong>4.000$</strong></p>
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic_winer_1_01.png'); ?>" alt="ic_winer_1_01">
													</div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic_winer_1_02.png'); ?>" alt="ic_winer_1_02">
													</div>
													<div class="col-lg-2"></div>
												</div>
												<p>Final Contest up to <strong>8.000$</strong></p>
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic_winer_2_01.png'); ?>" alt="ic_winer_2_01">
													</div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic_winer_2_02.png'); ?>" alt="ic_winer_2_02">
													</div>
													<div class="col-lg-2"></div>
												</div>
											</div>
											<div class="card-body">
												<ul>
													<li>Total prize pool is 20,000 USD, details to be announced soon</li>
													<li>Have your game judged by leading blockchain and gaming companies</li>
												</ul>
												<p class="txt-note">
													* Prizes will be awarded in TOMO, as per the USD equivalent.
												</p>
											</div>
										</div>
									</div>
									<div class="box-both">
										<div class="flexbox-card">
											<div class="card">
												<div class="card-header" id="headingThree">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															How to join?
															<span class="tomo-angle-down"></span>
														</button>
													</h5>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingThreeSub">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThreeSub" aria-expanded="false" aria-controls="collapseThreeSub">
															Submission
															<span class="tomo-angle-down"></span>
														</button>
													</h5>
												</div>
											</div>
										</div>
										<div class="card-content">
											<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
												<div class="card-body">
													<p>
														This competition is held online. All activities, including registration and submission will be processed online.
													</p>
													<div>
														For participants, experiences in at least one of the following topics are recommended (but not required):
													</div>
													<ul>
														<li>Game development with popular frameworks and languages. Example: Unity, Cocos, and JavaScript</li>
														<li>Blockchain knowledge and experience is a plus but not essential. If you are not familiar with blockchain development, our TomoChain engineers can guide you through building your first blockchain game/Dapp</li>
													</ul>
												</div>
											</div>
											<div id="collapseThreeSub" class="collapse" aria-labelledby="headingThreeSub" data-parent="#accordion">
												<div class="card-body">
													<p>Registration for the contest must be completed and submitted by 15 April. Developers can apply individually or as a team. There is no restriction on the number of team members per team</p>
													<p>All development must be on the TomoChain blockchain (testnet, mainnet).
													Submission format is a video demoing your game. This video can be uploaded privately to any video hosting service such as YouTube, and included in your submission with a private link</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header">
											<h5 class="mb-0">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#timelineModalCenter">
													Timeline
													<!-- <span class="tomo-angle-down"></span> -->
												</button>
											</h5>
										</div>
										<!-- Modal -->
										<div class="modal fade bd-example-modal-xl" id="timelineModalCenter" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
												<div class="modal-content tomo-modal-timeline">
													<div class="img_timeline">
														<h2>TomoChain Game Dappathon Timeline</h2>
														<img class="d-none d-lg-block" src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/game_timeline.png'); ?>" alt="Timeline">
														<img class="d-block d-lg-none" src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/game_timeline_sp.png'); ?>" alt="Timeline">
													</div>
													<div class="modal-footer">
														<span class="btn btn-secondary" data-dismiss="modal"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card d-none">
										<div class="card-header" id="headingfour">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
													Timeline
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
											<div class="card-body img_timeline">
												<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/game_timeline.png'); ?>" alt="Timeline">
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingfive">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
													Judging Criterias
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
											<div class="card-body">
												<p>The game will be scored based on these key areas:</p>
												<ul>
													<li>
														<h5>Gameplay narrative & design</h5>
														<p>Story-telling, game design concept, artwork, and overall style</p>
													</li>
													<li>
														<h5>Community support</h5>
														<p>What is the community reception to your game?</p>
													</li>
													<li>
														<h5>Creativity</h5>
														<p>Is your game concept original or creative? Does your game contain any interesting features or innovations?</p>
													</li>
													<li>
														<h5>Operation stability and Execution</h5>
														<p>Is your game consistently playable and runs smoothly without bugs?</p>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card d-none">
										<div class="card-header" id="headingsix">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
													Judge Board
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
											<div class="card-body board">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/judge_board_1.jpg'); ?>" alt="Judge Board">
														<h2>Long Vuong</h2>
														<p>CEO & Founder TomoChain</p>
													</div>
													<div class="col-6 col-lg-4">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/judge_board_2.jpg'); ?>" alt="Judge Board">
														<h2>Jake Pang</h2>
														<p>Admin at Vietnam Crypto Community</p>
													</div>
													<div class="col-lg-2"></div>
													<div class="col-6 col-lg-4 d-none">
														<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/judge_board_3.jpg'); ?>" alt="Judge Board">
														<h2>Trung Nguyen</h2>
														<p>CEO & Founder TomoChain</p>
													</div>
													<!-- /.col-lg-4 -->
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingseven">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
													Tutorials and Contact
													<span class="tomo-angle-down"></span>
												</button>
											</h5>
										</div>
										<div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
											<div class="card-body tutorial">
												<div class="media">
													<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic-font-1.png'); ?>" alt="">
													<p class="media-body">
														See below for a step by step tutorial on how to build a simple Dapp using solidity, and deployment on the TomoChain blockchain<br>
														<a href="https://medium.com/tomochain/how-to-build-a-dapp-on-tomochain-85532a1192e7" target="_blank">Follow the tutorial</a>
													</p>
												</div>
												<div class="media">
													<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic-font-2.png'); ?>" alt="">
													<p class="media-body">
														For more technical information on TomoChain, please refer to our documentation platform and our Github<br>
														<a href="https://docs.tomochain.com" target="_blank">Read the documentation</a>
													</p>
												</div>
												<div class="media">
													<img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/ic-font-3.png'); ?>" alt="">
													<p class="media-body">
														For developers interested in this competition, please join our Discord channel <b>#gamecompetition</b><br>
														<a href="https://discordapp.com/invite/2S6GdpJ" target="_blank">Join us on Discord</a>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane-tomo d-none">
					Tab 2
				</div>
			</div>
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
