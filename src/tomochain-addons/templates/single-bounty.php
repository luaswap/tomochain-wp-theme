<?php
/*
* Bouty single page
*/
get_template_part('headerbounty');
?>
	<div class="content-area">
		<main class="site-main">
			<div class="container">
				<!-- content - detail -->
				<div class="row">
					<div class="col-12">
						<div class="container-detail-bounty">
							<?php
							while ( have_posts() ) :the_post();
								$project = get_the_terms(get_the_ID(),'project');
								$status = get_the_terms(get_the_ID(),'status');
								$disclose = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
								$reward = get_field('tomo_reward');
								$number_submit = get_post_meta(get_the_ID(),'tomochain_number_submit',true);
								$project_logo = get_field('project_logo');
								$project_url = get_field('project_url');
								tomochain_setPostViews(get_the_ID());
							?>
								<h1 class="tomo-job-title"><?php echo get_the_title();?></h1>
								<div class="box-content-detail">
									<div class="row flex-row-reverse">
										<div class="col-12 col-md-4">
											<table>
												<tbody>
													<tr>
														<td><span class="tm-rocket"></span></td>
														<td><?php echo esc_html_e('Project:','tomochain-addon');?></td>
														<td>
															<?php if(!is_wp_error($project)):
																foreach ($project as $p):?>
																	<a class="logo-project" target="_blank" href="<?php echo esc_url($project_url);?>">
																		<img src="<?php echo esc_url($project_logo);?>">
																		<?php if(!is_wp_error($project)):
																			foreach ($project as $p):?>
																				<span><?php echo esc_html($p->name);?></span>
																			<?php endforeach;?>
																		<?php endif;?>
																	</a>
																<?php endforeach;?>
															<?php endif;?>
														</td>
													</tr>
													<tr>
														<td><span class="tm-flag"></span></td>
														<td><?php echo esc_html_e('Status:','tomochain-addon');?></td>
														<td>
															<?php if(!is_wp_error($status)):
																foreach ($status as $s):?>
																	<span class="stt-active"><?php echo esc_html($s->name);?></span>
																	<!-- <br> -->
																<?php endforeach;?>
															<?php endif;?>
															<!-- <span><?php //echo sprintf( __( 'disclosed %s ago','tomochain-addon' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );?></span> -->
														</td>
													</tr>
													<tr>
														<td><span class="tm-trophy"></span></td>
														<td><?php esc_html_e('Reward:','tomochain-addon')?></td>
														<td><?php if($reward) echo sprintf(esc_html__('%s TOMO','tomochain-addon'),$reward);?></td>
													</tr>
													<tr>
														<td><span class="tm-avatar"></span></td>
														<td><?php esc_html_e('Number of participants:','tomochain-addon')?></td>
														<td><?php echo $number_submit = !empty($number_submit) ? esc_html($number_submit) : 0;?></td>
													</tr>
												</tbody>
											</table>
											<div class="tomo_btn_grad">
												<button><?php esc_html_e('Claim IT','tomochain-addon')?></button>
											</div>
										</div>
										<div class="col-12 col-md-8">
											<h3 class="tomo-bounty-title"><?php esc_html_e('Description','tomochain-addon')?></h3>
											<div class="txt-detail">
												<?php the_content();?>
											</div>
										</div>
									</div>
								</div>
								<div class="box-form-wrap">
									<span class="close tm-times"></span>
									<div class="box-form-detail">
										<h2 class="tomo-job-title"><?php echo get_the_title();?>
										</h2>
										<div class="box-form" data-id="<?php echo esc_attr(get_the_ID());?>">
											<?php 
												$curent_lang = pll_current_language('slug');
												$contact_form = get_field('en_form', 'options');
												if('vi' == $curent_lang){
													$contact_form = get_field('vi_form', 'options');
												}elseif('jp' == $curent_lang){
													$contact_form = get_field('jp_form', 'options');
												}
												elseif('cn' == $curent_lang){
													$contact_form = get_field('cn_form', 'options');
												}elseif('es' == $curent_lang){
													$contact_form = get_field('es_form', 'options');
												}elseif('kr' == $curent_lang){
													$contact_form = get_field('kr_form', 'options');
												}
												if(!empty($contact_form)){
													echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
												}
											?>
										</div>
									</div>
								</div>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_template_part('footerbounty'); ?>
