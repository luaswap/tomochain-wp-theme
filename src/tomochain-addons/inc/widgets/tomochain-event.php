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
	class TomoChain_Event_Widget extends WPH_Widget {

		/*
		 * Register widget with WordPress
		 */
		function __construct() {

            $args = array(
                'slug'  => 'tomo_event',
                'label' => '&#x1f4cc; &nbsp;' . __( 'TOMOCHAIN - Event', 'tomochain-addons' ),
                'description' => esc_html__( 'Your site\'s most Events.', 'tomochain-addons' )
            );

            $data_source = array(
				'All Events' 		      => '',
				'Ongoing Events'  => 'current',
				'Upcoming Events' => 'upcoming',
				'Past Events'     => 'past'
			);

            $args['fields'] = array(
                array(
                    'name'   => esc_html__( 'Title', 'tomochain-addons' ),
                    'id'     => 'title',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'    => esc_html__( 'Data Source', 'tomochain-addons' ),
                    'id'      => 'data_source',
                    'type'    => 'select',
                    'class'   => 'widefat',
                    'options' => $data_source
                ),
                array(
                    'name'    => esc_html__( 'Enter numbers of events', 'tomochain-addons' ),
                    'id'      => 'number',
                    'type'    => 'number',
                    'class'   => 'widefat',
                    'std'     => 5
                )
            );

            // create widget
            $this->create_widget( $args );
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

					if ( has_post_thumbnail( get_the_ID() ) ) {
						$output[] = '<a href="' . $custom_url . '" class="tomo-event__thumb" target="'. esc_attr($open_new_tab) .'">';
						$image    = get_the_post_thumbnail_url( get_the_ID(), array(100, 100) );
						$output[] = '<img src="' . $image . '" />';
						$output[] = '</a>';
					}else{
						$output[] = '<a href="' . $custom_url . '" class="tomo-event__thumb" target="'. esc_attr($open_new_tab) .'">';
						$img_url = get_template_directory_uri() . '/assets/images/image-shortcode.jpg';
						$output[] = '<img src="' . $img_url . '" />';
						$output[] = '</a>';
                    }

                    $output[] = '<div class="tomo-event__info">';
                    $output[] = '<p class="text-truncate"><a href="' . $custom_url . '">' . get_the_title() . '</a></p>';

					$start_date = date_i18n(get_option('date_format'), strtotime(get_field('start_date')));
                    $end_date   = date_i18n(get_option('date_format'), strtotime(get_field('end_date')));

                    $date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');

                    $output[] = '<div class="event-meta">';
                    $output[] = '<span class="post-date">' . $date . '</span>';
                    $output[] = '</div>';

					$output[] = '</div>';
					$output[] = '</div>';
				}
			}

			$output[] = '</div>';
			wp_reset_postdata();

			echo implode( "\n", $output );
			echo $args['after_widget'];
		}
	}
}
