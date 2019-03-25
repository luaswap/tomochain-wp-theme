<?php
/*
*/
class Tomochain_Github_API{
	public $base_url = 'https://api.github.com/repos/tomochain/';
	public $repos;
	private $access_token;
	
	public function __construct(){
		$this->access_token = !empty(get_field('github_access_token','options')) ? get_field('github_access_token','options') : '';
		Tomochain_Github_API::schedule_check();
		add_action('update_milestone',array($this,'update_milestone'));
		add_action('commit_export_file',array($this,'commit_export_file'));

	}
	/* Milestone */
	public static function schedule_check() {
        if ( ! wp_next_scheduled( 'update_milestone' ) ) {
            wp_schedule_event(time(), 'twicedaily', 'update_milestone' );
        }
        if ( ! wp_next_scheduled( 'commit_export_file' ) ) {
            wp_schedule_event(time(), 'twicedaily', 'commit_export_file' );
        }

    }

	/* Update Roadmap via API */
	public function roadmap_info(){
		$args = array(
			'post_type'      => 'road_map',
	        'post_status'    => 'publish',
	        'posts_per_page' => -1,
		);
		$r = new WP_Query($args);
		$tomochain_init = array();
		$tomochain_info = array();
		if($r->have_posts()){
			while( $r->have_posts() ){
				$r->the_post();
				$tomochain_init['id'] = get_the_ID();
				$tomochain_init['milestone'] = get_post_meta(get_the_ID(),'tomochain_milestone',true);
				$tomochain_init['repository'] = get_post_meta(get_the_ID(),'tomochain_repository',true);
				array_push($tomochain_info, $tomochain_init);
			}
			return $tomochain_info;
		}
		return;
	}
	
	public function update_milestone(){
		$tomochain = $this->roadmap_info();
		$base_url = $this->base_url;
		$access_token = array('access_token'=> $this->access_token);
		if(!empty($tomochain) && is_array($tomochain)){
			foreach ($tomochain as $value) {
				$url = $base_url . $value['repository'].'/milestones/'. $value['milestone'].'?'.http_build_query($access_token);
				$post_id = $value['id'];
				$milestone = $this->get_info($url);
				if($milestone !== false){
					if( (isset($milestone->closed_issues) && 0 != $milestone->closed_issues) || (isset($milestone->closed_issues) && 0 != $milestone->open_issues)){
						$in_progress = $milestone->closed_issues/($milestone->closed_issues + $milestone->open_issues) * 100;
						update_post_meta( $post_id, 'progress', $in_progress );
						if($in_progress < 100){
							update_post_meta( $post_id, 'process', 'in-progress' );
						}else{
							update_post_meta( $post_id, 'process', 'completed' );
						}
					}
					if(isset($milestone->html_url) && !empty($milestone->html_url)){
						update_post_meta( $post_id, 'github_url', esc_url($milestone->html_url) );
					}
					if(isset($milestone->due_on) && !empty($milestone->due_on)){
						$due_on = str_replace("T"," ",$milestone->due_on);
						$due_on = strtotime($due_on);
						update_post_meta( $post_id, 'due_date', $due_on );
					}
					if(isset($milestone->closed_at) && !empty($milestone->closed_at)){
						$closed_at = str_replace("T"," ",$milestone->closed_at);
						$closed_at = strtotime($closed_at);
						update_post_meta( $post_id, 'release_date', $closed_at );
					}
				}
			}
		}
		
	}
	/* Update Commit via Github API */
	public function commit_info(){
		$file = $this->commit_export_file();
		
		if ( file_exists( $file ) ) {
			return @file_get_contents( $file );
		}else{
			return false;
		}
	}
	public function commit_export_file(){
		global $wp_filesystem;
     	WP_Filesystem();
		$base_url = $this->base_url;
		$access_token = array('access_token'=> $this->access_token);
		$commit_number = !empty(get_field('commit_number','options')) ? get_field('commit_number','options') : 10;
		$repos = $this->get_repository();

		if(is_array($repos)){
			$commit_init_array = array();
			$commit_get_array = array();
			$commit_limit = $commit_info = $commit_merge = array();
			$i = 0;
			foreach ($repos as $value) {
				$url = $base_url . $value.'/commits?'.http_build_query($access_token);
				
				$commit_info = $this->get_info($url);
				$commit_limit[$i] = array_slice($commit_info, 0 ,$commit_number);
				$commit_merge  = array_merge($commit_merge,$commit_limit[$i]);
				
				$i++;
			}
			foreach ($commit_merge as $value) {
				$date = strtotime(str_replace('T', ' ', $value->commit->committer->date));

				$commit_init_array[$date][]  = array(
					'author' => $value->author->login,
					'date'   => $value->commit->committer->date,
					'message'=> $value->commit->message,
					'url'    => $value->html_url
				);
			}
			if(is_array($commit_init_array)){
				krsort($commit_init_array);
				$commit_init_array = json_encode($commit_init_array);
			}
			$commit_dir = $this->create_upload_dir( $wp_filesystem );

			if(!empty($commit_init_array)){
	        	$wp_filesystem->put_contents( $commit_dir ."/commit.txt", $commit_init_array,FS_CHMOD_FILE);
	        }
	    	return $commit_dir . '/commit.txt';		
		}
	}

	public function get_info($url){
		$request = wp_remote_get($url);
		if ( is_wp_error( $request ) ){
			return false;
		}
		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body );
		return $data;
	}
	public function get_repository(){
		$this->repos = !empty(get_field('repos','options')) ? get_field('repos','options') : '';
		if(!empty($this->repos)){
			$repos = explode(',', $this->repos);
		}else{
			$this->base_url = 'https://api.github.com/users/tomochain/repos';
			$access_token = array('access_token'=> $this->access_token);
			$url = $this->base_url . '?'.http_build_query($access_token);
			$repos_info = $this->get_info($url);
			if(!empty($repos_info)){
				$repos = array();
				foreach ($repos_info as $value) {
					$repos[] = $value->name;
				}
			}
		}
		
		return $repos;
	}
	/*================================================
	GET UPLOAD URL, DIRECTOR
	================================================== */
	function upload_dir_name() {
		return apply_filters( 'upload_dir_name', 'tomochain-addon' );
	}

	function upload_dir() {
		$upload_dir = wp_upload_dir();

		return $upload_dir['basedir'] . '/' . $this->upload_dir_name();
	}

	function upload_url() {
		$upload_dir = wp_upload_dir();

		return $upload_dir['baseurl'] . '/' . $this->upload_dir_name();
	}

	function create_upload_dir( $wp_filesystem = null ) {
		if( empty( $wp_filesystem ) ) {
			return false;
		}

		$upload_dir = wp_upload_dir();
		global $wp_filesystem;

		$upload_dir = $wp_filesystem->find_folder( $upload_dir['basedir'] ) . $this->upload_dir_name();
		if ( ! $wp_filesystem->is_dir( $upload_dir ) ) {
			if ( wp_mkdir_p( $upload_dir ) ) {
				return $upload_dir;
			}

			return false;
		}

		return $upload_dir;
	}
}
new Tomochain_Github_API;