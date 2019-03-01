<?php
/**
 * Shortcode attributes
 *
 * @var $loop
 * @var $auto_play
 * @var $auto_play_speed
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_TomoChain_Roadmap_New
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class );

$css_class = array(
	'tomochain-shortcode',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
	implode( ' ', $css_class ),
	$this->settings['base'],
	$atts );
	$args_complete = array(
		'post_type'      => 'road_map',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => 'process',
		'meta_value'     => 'completed',
		'meta_compare'   => '=',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	$args_inprogress = array(
		'post_type'      => 'road_map',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => 'process',
		'meta_value'     => 'in-progress',
		'meta_compare'   => '=',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	$args_activity = array(
		'post_type'      => 'activity',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
	<div class="tomochain-roadmap-page">
		<div class="roadmap-list">
			<ul class="tomochain-roadmap-filter">
				<li class="selected"><a href="#" data-filter="all" data-desc= "<?php echo wp_strip_all_tags($desc_for_all);?>"><?php echo esc_html__('All','tomochain-addons')?></a></li>
				<?php
				$categories = get_terms( array(
					'taxonomy' => 'roadmap_category',
					'hide_empty' => true,
					'orderby' => 'date',
					'order'   => 'ASC'
				) );
				if($categories){
					foreach ($categories as $cat) {?>
						<li><a href="#" data-filter="<?php echo esc_attr($cat->term_id)?>" data-desc= "<?php echo wp_strip_all_tags(term_description($cat->term_id));?>"><?php echo esc_html($cat->name);?></a></li>
				<?php
					}
				}
				?>
			</ul>
			<div class="tomochain-roadmap-main">
				<div class="roadmap-desc-infor">
					<?php
						if($desc_for_all){
							echo esc_html($desc_for_all);
						}
					?>
				</div>
				<div class="row">
					<div class="col-lg-9 tomochain-roadmap-content">
						<div class="row">
							<div class="col-lg-6">
								<div class="roadmap-common tomochain-completed">
									<div class="main-inner">
										<h2 class="main-title"><?php echo esc_html__('Completed','tomochain-addons')?></h2>
										<div class="list-box">
											<?php
											$c = new WP_Query($args_complete);
											wp_reset_postdata();
											if( $c->have_posts() ):
												while( $c->have_posts() ): $c->the_post();

													$github_url = get_field('github_url');
													$doc_url = get_field('doc_url');
													$released_date = get_field('release_date');
													$open_new_tab = get_field('r_open_in_new_tab') ? '__blank' : '';
											?>
													<div class="box-item">
														<div class="item-header">
															<?php
																if(get_field('item_image')){?>
																	<div class="col-logo">
																		<img src="<?php echo get_field('item_image');?>">

																	</div>
															<?php }?>
															<div class="col-infor">
																<div class="title-prj">
																	<?php if($github_url){?>
																		<a class="txt-name" href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																			<?php the_title();?>
																		</a>
																	<?php }?>
																</div>
																<div class="update-on">
																	<?php if($released_date){?>
																		<span><?php echo esc_html__('Released date:','tomochain-addons')?> <?php echo esc_html($released_date);?></span>
																	<?php }?>
																	<?php if($github_url){?>
																		<a href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																			<i class="fab fa-github"></i>
																		</a>
																	<?php }?>
																	<?php if($doc_url){?>
																		<a href="<?php echo esc_url($doc_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																			<i class="fa fa-file"></i>
																		</a>
																	<?php }?>
																</div>
															</div>
														</div>
														<div class="item-body">
															<?php the_content();?>
														</div>
													</div><!-- box-item -->
												<?php endwhile;?>
											<?php endif;?>
										</div>
									</div>
								</div><!-- .tomochain-completed -->
							</div>
							<div class="col-lg-6">
								<div class="roadmap-common tomochain-progress">
									<div class="main-inner">
										<h2 class="main-title"><?php echo esc_html__('In Progress','tomochain-addons');?></h2>
										<div class="list-box">
											<?php
											$p = new WP_Query($args_inprogress);
											wp_reset_postdata();
											 if( $p->have_posts() ):
												while( $p->have_posts() ): $p->the_post();

													$github_url = get_field('github_url');
													$doc_url = get_field('doc_url');
													$due_date = get_field('due_date');
													$progress_number = get_field('progress');
													$open_new_tab = get_field('r_open_in_new_tab') ? '__blank' : '';
											?>
													<div class="box-item">
														<div class="item-header">
															<?php
																if(get_field('item_image')){?>
																	<div class="col-logo">
																		<img src="<?php echo get_field('item_image');?>">

																	</div>
															<?php }?>
															<div class="col-infor">
																<div class="title-prj">
																	<?php if($github_url){?>
																		<a class="txt-name" href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																			<?php the_title();?>
																		</a>
																	<?php }?>
																</div>
																<div class="update-on">
																	<div class="box-progress">
																		<div class="innrer-progress">
																			<div class="progress-value" style="width:<?php echo esc_attr($progress_number);?>%"></div>
																		</div>
																		<span><?php echo esc_html($progress_number);?>%</span>
																	</div>
																	<?php if($due_date){?>
																			<span><?php echo esc_html__('Due date:','tomochain-addons')?> <?php echo esc_html($due_date);?></span>
																		<?php }?>
																		<?php if($github_url){?>
																			<a href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																				<i class="fab fa-github"></i>
																			</a>
																		<?php }?>
																		<?php if($doc_url){?>
																			<a href="<?php echo esc_url($doc_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
																				<i class="fa fa-file"></i>
																			</a>
																		<?php }?>
																</div>
															</div>
														</div>
														<div class="item-body">
															<?php the_content();?>
														</div>
													</div><!-- box-item -->
											<?php endwhile;?>
										<?php endif;?>
									</div>
									</div>
								</div><!-- .tomochain-progress -->
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="tomochain-activities">
							<div class="box-countdown">
								<h3 class="txt-title"><?php echo esc_html__('Next Roadmap Update','tomochain-addons')?></h3>
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
									var time_update = "<?php echo esc_attr($time_update);?>";
									var deadline = new Date(time_update);
									initializeClock('clockdiv', deadline);
								</script>
							</div><!-- /box-countdown -->
							<div class="box-activities">
								<div class="box-title">
									<h3><?php echo esc_html__('Recent Activities','tomochain-addons');?></h3>
									<?php if($see_more){?>
										<a target="_blank" href="<?php echo esc_url($see_more);?>"><?php echo esc_html__('See more','tomochain-addons');?></a>
									<?php }?>
								</div>
								<div class="list-recent">
									<ul>
									<?php 
										$a = new WP_Query($args_activity);
										wp_reset_postdata();
										if( $a->have_posts() ):
											while( $a->have_posts() ): $a->the_post();
												$activty_url = get_field('activity_url') ? get_field('activity_url') : '#';
									?>
												<li>
													<a target="_blank" href="<?php echo esc_url($activty_url);?>"><?php the_title()?></a>
													<?php the_content();?>
													<?php 
														$activity_date = get_field('activity_date');
														if(!empty($activity_date)){
															$ago = strtotime( $activity_date ); ?>
															<p class="days-ago"><?php echo human_time_diff( $ago, current_time( 'timestamp' ) ).' '.esc_html__( 'ago' );?></p>
														<?php }?>
												</li>
											<?php endwhile;?>
										<?php endif;?>
									</ul>
								</div><!-- /list-recent -->
							</div><!-- /box-activities -->
							<div class="box-other">
								<?php
									$discuss = vc_param_group_parse_atts( $discuss );
								?>
								<p class="txt">
									<?php echo esc_html__('Discuss with our Team:','tomochain-addons');?>
									<?php if(is_array($discuss)):
										foreach ($discuss as $value) {
											if(isset($value['name']) && isset($value['url'])){?>
												<a target="_blank" href="<?php echo esc_url($value['url']);?>"><?php echo esc_html($value['name']);?></a>
											<?php }?>
										<?php }
									endif;?>
								</p>
								<?php if($resource){?>
									<p class="txt">
										<?php echo esc_html__('Resoure:','tomochain-addons');?> <a target="_blank" href="<?php echo esc_url($resource);?>"><?php echo esc_html__('Tomochain Document','tomochain-addons');?></a>
									</p>
								<?php }?>
							</div><!-- /box-other -->
						</div><!-- .tomochain-activities -->
					</div>
				</div><!-- .row -->
			</div><!-- .tomochain-roadmap-main -->
		</div>
	</div>
</div>
