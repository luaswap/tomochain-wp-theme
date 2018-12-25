<?php
/*
* Tomochain Event Widget
*/
if ( ! class_exists( 'TomoChain_Event_Widget' ) ) {

	add_action( 'widgets_init', 'load_tomochain_event_widget' );

	function load_tomochain_event_widget() {
		register_widget( 'TomoChain_Event_Widget' );
	}

	/**
	 * Event Widget by ThemeMove
	 *
	 * @property mixed data
	 */
	class TomoChain_Event_Widget extends WP_Widget {

		/*
		 * Register widget with WordPress
		 */
		function __construct() {
			parent::__construct( 'tomo_event',
				'&#x1f4cc; &nbsp;' . __( 'TOMOCHAIN - Event', 'tomochain' ),
				array( 'description' => __( 'Your site\'s most Events.', 'tomochain' ) ) );
		}

		function widget( $args, $instance ) {
			extract( $args );

			echo $args['before_widget'];

            if ( $instance['title'] ) {
                $output = array( '<h3 class="widget-title">' . $instance['title'] . '</h3>' );
            }

			$query_args = array( 
				'post_type' => 'event', 
				'posts_per_page' => $instance['number'] 
			);
			if('upcoming' == $instance['data_source']){
		        $query_args['meta_query'] = array(
		            array(
		                'key'     => 'start_date',
		                'value'   => current_time('mysql'),
		                'compare' => '>',
		                'type'    => 'DATE'
		            ),
		        );
		    }elseif('past' == $instance['data_source']){
		        $query_args['meta_query'] = array(
		            array(
		                'key'     => 'end_date',
		                'value'   => current_time('mysql'),
		                'compare' => '<',
		                'type'    => 'DATE'
		            ),
		        );
		    }elseif('current' == $instance['data_source']){
		        $query_args['meta_query'] = array(
		            'relation'    => 'AND',
		            array(
		                'key'     => 'start_date',
		                'value'   => current_time('mysql'),
		                'compare' => '<=',
		                'type'    => 'DATE'
		            ),
		            array(
		                'key'     => 'end_date',
		                'value'   => current_time('mysql'),
		                'compare' => '>=',
		                'type'    => 'DATE'
		            ),
		        );
		    }
			$loop       = new WP_Query( $query_args );

			$output[] = '<div class="tomo-events">';
			if(have_posts()){
				while ( $loop->have_posts() ) {

					$loop->the_post();

					$custom_url = get_field('event_custom_url');
					if(!$custom_url){
						$custom_url = get_permalink();
					}
					$open_new_tab = get_field('event_open_in_new_tab') ? '__blank' : '';

					$output[] = '<div class="tomo-event">';

					if ( has_post_thumbnail( get_the_ID() ) && $instance['show_post_thumbnail'] ) {
						$output[] = '<a href="' . $custom_url . '" class="tomo-event__thumb" target="'. esc_attr($open_new_tab) .'">';
						$image    = get_the_post_thumbnail_url( get_the_ID(), array(100, 100) );
						$output[] = '<img src="' . $image . '" />';
						$output[] = '</a>';
					}

					$output[] = '<div class="tomo-event__info">';

					if ( $instance['show_post_title'] ) {
						$output[] = '<p class="text-truncate"><a href="' . $custom_url . '">' . get_the_title() . '</a></p>';
					}

					if ( $instance['show_meta'] ) {

						$start_date = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('start_date')));
						$end_date   = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime(get_field('end_date')));

						$date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');

						$output[] = '<div class="entry-meta">';
						$output[] = '<span class="post-date">' . $date . '</span>';
						$output[] = '</div>';
					}

					if ( $instance['show_excerpt'] ) {
						$excerpt = get_the_excerpt();
						if($instance['excerpt_number'] && !empty($excerpt)){
							$excerpt = wp_trim_words( $excerpt, $instance['excerpt_number'] );
	    					$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
						}
						$output[] = '<div class="entry-excerpt">' . $excerpt . '</div>';
					}

					$output[] = '</div>';
					$output[] = '</div>';
				}
			}

			$output[] = '</div>';
			wp_reset_postdata();

			echo implode( "\n", $output );
			echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']               = strip_tags( $new_instance['title'] );
			$instance['data_source']         = strip_tags( $new_instance['data_source'] );
			$instance['show_post_thumbnail'] = strip_tags( $new_instance['show_post_thumbnail'] );
			$instance['show_post_title']     = strip_tags( $new_instance['show_post_title'] );
			$instance['show_excerpt']        = strip_tags( $new_instance['show_excerpt'] );
			$instance['show_meta']           = strip_tags( $new_instance['show_meta'] );
			$instance['number']              = strip_tags( $new_instance['number'] );
			$instance['excerpt_number']      = strip_tags( $new_instance['excerpt_number'] );

			return $instance;
		}

		function form( $instance ) {

			// Set up default settings
			$default = array(
				'title'               => '',
				'data_source'         => '',
				'show_post_thumbnail' => 'on',
				'show_post_title'     => 'on',
				'show_excerpt'        => '',
				'show_meta'           => 'on',
				'number'              => 5,
				'excerpt_number'      => 10,
			);

			$instance = wp_parse_args( (array) $instance, $default );

			$data_source = array(
				'' 		   => 'All',
				'current'  => 'Ongoing Events',
				'upcoming' => 'Upcoming Events',
				'past'     => 'Past Events'
			);
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title',
						'tomochain' ); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				       value="<?php echo esc_attr( $instance['title'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'data_source' ) ); ?>"><?php _e( 'Data Source',
						'tomochain' ); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('data_source'); ?>" name="<?php echo $this->get_field_name('data_source'); ?>">
					<?php foreach( $data_source as $id => $name ): ?>
					<option value="<?php echo esc_attr($id) ?>" <?php selected($id, $instance['data_source']) ?>><?php echo esc_html($name) ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_post_thumbnail' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_post_thumbnail' ) ); ?>" <?php checked( $instance['show_post_thumbnail'],
					'on' ); ?> />
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'show_post_thumbnail' ) ); ?>"><?php _e( 'Show event thumbnail',
						'tomochain' ) ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_post_title' ) ); ?>" <?php checked( $instance['show_post_title'],
					'on' ); ?> />
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"><?php _e( 'Show event title',
						'tomochain' ) ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_excerpt' ) ); ?>" <?php checked( $instance['show_excerpt'],
					'on' ); ?> />
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>"><?php _e( 'Show excerpt',
						'tomochain' ) ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_meta' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_meta' ) ); ?>" <?php checked( $instance['show_meta'],
					'on' ); ?> />
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_meta' ) ); ?>"><?php _e( 'Show meta',
						'tomochain' ) ?></label>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Enter numbers of articles',
						'tomochain' ); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
				       value="<?php echo esc_attr( $instance['number'] ); ?>"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'excerpt_number' ) ); ?>"><?php _e( 'Enter excerpt length',
						'tomochain' ); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'excerpt_number' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'excerpt_number' ) ); ?>"
				       value="<?php echo esc_attr( $instance['excerpt_number'] ); ?>"/>
			</p>

			<?php
		}
	} // end class
} // end if
