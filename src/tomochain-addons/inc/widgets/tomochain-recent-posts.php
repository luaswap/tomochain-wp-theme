<?php
if ( ! class_exists( 'TomoChain_Recent_Posts_Widget' ) ) {

	add_action( 'widgets_init', 'load_tomochain_recent_posts_widget' );

	function load_tomochain_recent_posts_widget() {
		register_widget( 'TomoChain_Recent_Posts_Widget' );
	}

	/**
	 * REcent Posts Widget by ThemeMove
	 *
	 * @property mixed data
	 */
	class TomoChain_Recent_Posts_Widget extends WP_Widget {

		/*
		 * Register widget with WordPress
		 */
		function __construct() {
			parent::__construct( 'tomo_recent_posts',
				'&#x1f4cc; &nbsp;' . __( 'TOMOCHAIN - Recent Posts', 'tomochain-addons' ),
				array( 'description' => __( 'Your site\'s most recent Posts.', 'tomochain-addons' ) ) );
		}

		function widget( $args, $instance ) {
			extract( $args );

			echo $args['before_widget'];

            if ( $instance['title'] ) {
                $output = array( '<h3 class="widget-title">' . $instance['title'] . '</h3>' );
            }

			$query_args = array( 'post_type' => 'post', 'posts_per_page' => $instance['number'] );
			$loop       = new WP_Query( $query_args );

			$output[] = '<div class="recent-posts">';

			while ( $loop->have_posts() ) {

				$loop->the_post();

				$output[] = '<div class="recent-post">';

				if ( has_post_thumbnail( get_the_ID() ) && $instance['show_post_thumbnail'] ) {
					$output[] = '<a href="' . get_permalink() . '" class="recent-post__thumb">';
					$image    = get_the_post_thumbnail_url( get_the_ID(), array(100, 100) );
					$output[] = '<img src="' . $image . '" />';
					$output[] = '</a>';
				}else{
					$output[] = '<a href="' . get_permalink() . '" class="recent-post__thumb">';
					$img_url = get_template_directory_uri() . '/assets/images/image-shortcode.jpg';
					$output[] = '<img src="' . $img_url . '" />';
					$output[] = '</a>';
                }

				$output[] = '<div class="recent-post__info">';

				if ( $instance['show_post_title'] ) {
					$output[] = '<p class="text-truncate"><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
				}

				if ( $instance['show_excerpt'] ) {
					$output[] = '<div class="entry-excerpt">' . get_the_excerpt() . '</div>';
				}

				if ( $instance['show_meta'] ) {
					$output[] = '<div class="post-meta">';
					$output[] = '<span class="post-date">' . get_the_time( 'F j, Y' ) . '</span>';
					$output[] = '</div>';
				}

				$output[] = '</div>';
				$output[] = '</div>';
			}

			$output[] = '</div>';
			wp_reset_postdata();

			echo implode( "\n", $output );
			echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']               = strip_tags( $new_instance['title'] );
			$instance['show_post_thumbnail'] = strip_tags( $new_instance['show_post_thumbnail'] );
			$instance['show_post_title']     = strip_tags( $new_instance['show_post_title'] );
			$instance['show_excerpt']        = strip_tags( $new_instance['show_excerpt'] );
			$instance['show_meta']           = strip_tags( $new_instance['show_meta'] );
			$instance['number']              = strip_tags( $new_instance['number'] );

			return $instance;
		}

		function form( $instance ) {

			// Set up default settings
			$default = array(
				'title'               => '',
				'show_post_thumbnail' => 'on',
				'show_post_title'     => 'on',
				'show_excerpt'        => '',
				'show_meta'           => 'on',
				'number'              => 5,
			);

			$instance = wp_parse_args( (array) $instance, $default );

			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title',
						'tomochain' ); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				       value="<?php echo esc_attr( $instance['title'] ); ?>"/>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_post_thumbnail' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_post_thumbnail' ) ); ?>" <?php checked( $instance['show_post_thumbnail'],
					'on' ); ?> />
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"><?php _e( 'Show post thumbnail',
						'tomochain' ) ?></label>
			</p>
			<p>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'show_post_title' ) ); ?>" <?php checked( $instance['show_post_title'],
					'on' ); ?> />
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"><?php _e( 'Show post title',
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

			<?php
		}
	} // end class
} // end if
