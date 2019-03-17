<?php
/*
*/
class Tomochain_Github_API{
	public $base_url = 'https://api.github.com/repos/tomochain/';
	private $access_token = '9612101f1cf014d70c191a104a6a804f24257dd9';
	
	public function __construct(){		
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
				// var_dump($milestone);
				if( (isset($milestone->closed_issues) && 0 != $milestone->closed_issues) || (isset($milestone->closed_issues) && 0 != $milestone->open_issues)){
					$in_progress = $milestone->closed_issues/($milestone->closed_issues + $milestone->open_issues) * 100;
					update_post_meta( $post_id, 'progress', $in_progress );
					if($in_progress < 100){
						update_post_meta( $post_id, 'process', 'in-progress' );
					}else{
						update_post_meta( $post_id, 'process', 'completed' );
					}
				}
				if(isset($milestone->due_on) && !empty($milestone->due_on)){
					$due_on = date('d/m/Y',strtotime($milestone->due_on));
					update_post_meta( $post_id, 'due_date', $due_on );
				}
				if(isset($milestone->closed_at) && !empty($milestone->closed_at)){
					$closed_at = date('d/m/Y',strtotime($milestone->closed_at));
					update_post_meta( $post_id, 'release_date', $closed_at );
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
		$url = $base_url .'tomochain/commits?'.http_build_query($access_token);
		$commit_info = $this->get_info($url);
		$commit_init_array = array();
		$commit_get_array = array();
		foreach ($commit_info as $key => $value) {
			$commit_init_array['author']  = $value->author->login;
			$commit_init_array['date']    = $value->commit->committer->date;
			$commit_init_array['message'] = $value->commit->message;
			$commit_init_array['url'] 	  = $value->html_url;
			array_push($commit_get_array, $commit_init_array);
		}
		if(is_array($commit_get_array)){
			$commit_get_array = json_encode($commit_get_array);
		}
		$commit_dir = $this->create_upload_dir( $wp_filesystem );

		if(!empty($commit_get_array)){
        	$wp_filesystem->put_contents( $commit_dir ."/commit.txt", $commit_get_array,FS_CHMOD_FILE);
        	return $commit_dir . '/commit.txt';
        }
        return;
	}

	public function get_info($url){
		$ch = curl_init($url);
	 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 	curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 
		$resp = curl_exec($ch);

		//return JSON
		$result = json_decode($resp);

		curl_close($ch);
		return $result; 
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