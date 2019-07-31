<?php
/* Template name: Bounty Page */

get_template_part('headerbounty');

global $wp_query;
$count_posts = $wp_query->found_posts;
$project_terms = get_terms('project');
$status_terms = get_terms('status');
$perpage = get_field('bounty_per_page','options');
wp_enqueue_script('datatable');
?>
	<div class="content-area">
		<main class="site-main">
			<div class="container">
				<!-- content - list -->
				<div class="row">
					<div class="col-12 col-lg-2">
						<div class="box-widget-bounty">
							<div class="widget-cate">
								<h2><?php esc_html_e('Sort','tomochain-addon');?></h2>
								<select class="select-status d-block d-lg-none">
									<?php
										echo '<option value="">'. esc_html__('All','tomochain-addon') . '&nbsp;(' . $count_posts . ')' .'</option>';
									?>
									<?php if ( !empty( $status_terms ) && !is_wp_error( $status_terms ) ):
										foreach ( $status_terms as $s ):
											echo '<option value="'.($s->name).'">'. $s->name . '&nbsp;(' . $s->count . ')' .'</option>';
										endforeach;
									endif;?>
								</select>
								<ul class="status d-none d-lg-block">
									<?php
										echo '<li class="active" data-value="">'. esc_html__('All','tomochain-addon') . '&nbsp;(' . $count_posts . ')' .'</li>';
									?>
									<?php if ( !empty( $status_terms ) && !is_wp_error( $status_terms ) ):
										foreach ( $status_terms as $s ):
											echo '<li data-value="'.($s->name).'">'. $s->name . '&nbsp;(' . $s->count . ')' .'</li>';
										endforeach;
									endif;?>
								</ul>
							</div>
							<div class="widget-cate">
								<h2><?php esc_html_e('Project','tomochain-addon');?></h2>
								<select class="select-project d-block d-lg-none">
									<?php
										echo '<option value="">'. esc_html__('All','tomochain-addon') . '&nbsp;(' . $count_posts . ')' .'</option>';
									?>
									<?php if ( !empty( $project_terms ) && !is_wp_error( $project_terms ) ):
										foreach ( $project_terms as $p ):
											echo '<option value="'.($p->slug).'">'. $p->name . '&nbsp;(' . $p->count . ')' .'</option>';
										endforeach;
									endif;?>
								</select>
								<ul class="project d-none d-lg-block">
									<?php
										echo '<li class="active" data-value="">'. esc_html__('All','tomochain-addon') . '&nbsp;(' . $count_posts . ')' .'</li>';
									?>
									<?php if ( !empty( $project_terms ) && !is_wp_error( $project_terms ) ):
										foreach ( $project_terms as $p ):
											echo '<li data-value="'.($p->name).'">'. $p->name . '&nbsp;(' . $p->count . ')' .'</li>';
										endforeach;
									endif;?>
								</ul>
							</div>
						</div>
						<div class="box-faq-bounty">
							<?php
							$url = get_field('faq_url','options');
								echo sprintf(__('Have any questions about the bounty program?
							Please read our <a href="%s" title="FAQ" target="_blank">FAQ</a>','tomochain-addon'),$url);
							?>
							<!-- Have any questions about the bounty program?
							Please read our <a href="#" title="FAQ">FAQ</a> -->
						</div>
					</div>
					<div class="col-12 col-lg-10">
						<table class="list-bounty" data-page="<?php echo esc_attr($perpage);?>">
							<thead>
								<tr>
									<th><?php esc_html_e('#','tomochain-addon')?></th>
									<th class="project-sort"><!-- Project --></th>
									<th class="title-sort"><?php esc_html_e('Title','tomochain-addon')?></th>
									<th><?php esc_html_e('Reward (Unit:TOMO)','tomochain-addon')?></th>
								</tr>
							</thead>
							<tbody>
								<?php if(have_posts()):
									$i = 0;
									while (have_posts()):
										the_post();
										$i++;
										$project = get_the_terms(get_the_ID(),'project');
										$status = get_the_terms(get_the_ID(),'status');
										update_post_meta(get_the_ID(),'number_order',$i);
										$reward = get_field('tomo_reward');
										$project_logo = get_field('project_logo');
										$project_url = get_field('project_url');
										$number_submit = get_post_meta(get_the_ID(),'tomochain_number_submit',true);
										?>
										<tr>
											<td class="number-order"><?php echo '#'.$i;?></td>
											<td>
												<span class="logo-project">
													<img src="<?php echo esc_url($project_logo);?>">
													<?php if(!is_wp_error($project)):
														foreach ($project as $p):?>
															<span><?php echo esc_html($p->name);?></span>
														<?php endforeach;?>
													<?php endif;?>
												</span>
											</td>
											<td>
												<a class="txt-tile" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>"><?php echo get_the_title();?></a>
												<div class="txt-status">
													<?php if(!is_wp_error($project)):?>
														<span><?php echo esc_html_e('Project:','tomochain-addon') ?>
															<?php foreach ($project as $p):?>
																<a href="<?php echo esc_url($project_url);?>" target="_blank"><?php echo esc_html($p->name);?></a>
															<?php endforeach;?>
														</span>
														<?php endif;?>
														<?php if(!is_wp_error($status)):
															foreach ($status as $s):?>
																<span title="<?php echo esc_attr_e('Status','tomochain-addon')?>" class="stt-<?php echo esc_attr($s->slug);?>"><?php echo esc_html($s->name);?></span>
															<?php endforeach;?>
														<?php endif;?>
														<span title="View"><span class="tm-eye"></span><?php echo tomochain_getPostViews(get_the_ID());?></span>
													<!-- <span title="Number of participants"><span class="tm-avatar"></span><?php //echo $number_submit = !empty($number_submit) ? esc_html($number_submit) : 0;?></span> -->
												</div>
											</td>
											<td><?php if($reward) echo esc_html($reward);?></td>
										</tr>
									<?php endwhile;?>
								<?php
								endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_template_part('footerbounty'); ?>
