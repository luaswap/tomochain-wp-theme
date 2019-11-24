<?php
/*
* Wordpress Widget
*/
if ( ! class_exists( 'TMC_Recent_News' ) ) {

	class TMC_Recent_News extends WP_Widget {

		public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget_recent_news',
				'description' => esc_html__( "Your site&#8217;s most recent Posts.", 'tmc' ),
			);
			parent::__construct( 'recent-news', esc_html__( 'TMC Recent News', 'tmc' ), $widget_ops );
			$this->alt_option_name = 'widget_recent_news';
		}

		public function widget( $args, $instance ) {
			$cache = array();
			if ( ! $this->is_preview() ) {
				$cache = wp_cache_get( 'widget_recent_news', 'widget' );
			}

			if ( ! is_array( $cache ) ) {
				$cache = array();
			}

			if ( ! isset( $args[ 'widget_id' ] ) ) {
				$args[ 'widget_id' ] = $this->id;
			}

			if ( isset( $cache[ $args[ 'widget_id' ] ] ) ) {
				echo $cache[ $args[ 'widget_id' ] ];

				return;
			}

			ob_start();

			$title = ( ! empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : esc_html__( 'Recent News', 'tmc' );

			/** This filter is documented in wp-includes/default-widgets.php */
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$number = ( ! empty( $instance[ 'number' ] ) ) ? absint( $instance[ 'number' ] ) : 5;
			if ( ! $number ) {
				$number = 5;
			}
			$show_date = isset( $instance[ 'show_date' ] ) ? $instance[ 'show_date' ] : false;

			/**
			 * Filter the arguments for the Recent Posts widget.
			 *
			 * @since 3.4.0
			 *
			 * @see   WP_Query::get_posts()
			 *
			 * @param array $args An array of arguments used to retrieve the recent posts.
			 */
			$r = new WP_Query( apply_filters( 'widget_news_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
			) ) );

			if ( $r->have_posts() ) :
				?>
				<?php echo $args[ 'before_widget' ]; ?>
				<?php if ( $title ) {
				echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
			} ?>
				<ul>
					<?php while ( $r->have_posts() ) : $r->the_post(); ?>
						<li>
							<div class="recent-post">
								<div class="recent-img">
									<?php if ( has_post_thumbnail() ):
										the_post_thumbnail( array(
											80,
											80,
										) );
									else: ?>
										<img width="70" height="70" src="<?php echo get_template_directory_uri() . '/assets/images/avatar-40.png'; ?>" alt="<?php the_title_attribute(); ?>" />								
									<?php endif; ?>
								</div>
							</div>
							<div class="recent-detail">
								<h5 class="post-title">
									<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
								</h5>
								<?php if ( $show_date ) : ?>
									<span aria-hidden="true" class="icon_calendar"></span>
									<span class="post-date"><?php echo get_the_date(); ?></span>
								<?php endif; ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php echo $args[ 'after_widget' ]; ?>
				<?php
				// Reset the global $the_post as this query will have stomped on it
				wp_reset_postdata();

			endif;

			if ( ! $this->is_preview() ) {
				$cache[ $args[ 'widget_id' ] ] = ob_get_flush();
				wp_cache_set( 'widget_recent_news', $cache, 'widget' );
			} else {
				ob_end_flush();
			}
		}

		public function update( $new_instance, $old_instance ) {
			$instance                = $old_instance;
			$instance[ 'title' ]     = strip_tags( $new_instance[ 'title' ] );
			$instance[ 'number' ]    = (int) $new_instance[ 'number' ];
			$instance[ 'show_date' ] = isset( $new_instance[ 'show_date' ] ) ? (bool) $new_instance[ 'show_date' ] : false;

			return $instance;
		}

		public function form( $instance ) {
			$title     = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
			$number    = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 5;
			$show_date = isset( $instance[ 'show_date' ] ) ? (bool) $instance[ 'show_date' ] : false;
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'tmc' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo esc_html__( 'Number of posts to show:', 'tmc' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php echo esc_html__( 'Display post date?', 'tmc' ); ?></label>
			</p>
			<?php
		}
	}
	
}
function tmc_register_widget() {
	register_widget( 'TMC_Recent_News' );
}

add_action( 'widgets_init', 'tmc_register_widget' );