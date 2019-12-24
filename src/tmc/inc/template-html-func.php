<?php
if(!function_exists('tmc_report_list')){
	function tmc_report_list(){
		$lists = tmc_get_option('tmc_report_list');
		$show = tmc_get_option('show_report');
		if(!empty($show) && !empty($lists) && is_array($lists)){
			echo '<div class="tmc-top-report">';
			echo '<div class="container">';
			echo '<div class="tmc-report-list">';
			foreach ($lists as $value) {?>
				<div class="tmc-report-item">
					<a href="<?php echo esc_url($value['rp_url']);?>"><?php echo esc_html($value['rp_title']);?></a>
				</div>
			<?php }
			echo '</div>';
			echo '<span class="close"><i class="fas fa-times"></i></span>';
			echo '</div>';
			echo '</div>';
		}
	}
	add_action('tmc_before_site_content','tmc_report_list');
}