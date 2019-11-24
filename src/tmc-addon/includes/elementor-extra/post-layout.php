<?php
/**
 * Elementor Post Layout Widget.
 * @since 1.0.0
 */
namespace TMC_Elementor_Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Scheme_Color;

class Post_Layout extends Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'tmc-post-layout';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'TMC Post Layout', 'tmc' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'fa fa-newspaper-o';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories() {
		return [ 'tmc-element-widgets' ];
	}
	/*
	* Depend Style
	*/
	public function get_style_depends() {
        return [
            'owl-carousel',
        ];
    }
	/*
	* Depend Script
	*/
	public function get_script_depends() {
        return [
            'owl-carousel',
            'tmc-elementor',
        ];
    }
		/**
	 * Get categories.
	 */
	private function get_post_type_categories( $taxonomy = 'category' ) {
		$options = array();
		if ( ! empty( $taxonomy ) ) {
			// Get categories for post type.
			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}

		return $options;
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Tab Content
		$this->tmc_post_layout_option();
		$this->tmc_post_layout_image();
		$this->tmc_post_layout_title();
		$this->tmc_post_layout_meta();
		$this->tmc_post_layout_content();

		// Tab Style
		$this->tmc_post_layout_style();
	}

	/*
	* Recent New Option
	*/
	private function tmc_post_layout_option(){
		$this->start_controls_section(
			'tmc_post_layout_section',
			[
				'label' => esc_html__( 'General Options', 'tmc' )
			]
		);
		$this->add_control(
			'style',
			[
				'label' 	=> esc_html__( 'Layout', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> array(
					'grid' 		=> esc_html__( 'Grid', 'tmc' ),
					'list' 		=> esc_html__( 'List', 'tmc' ),
					'slider' 	=> esc_html__( 'Slider', 'tmc' ),
				),
				'default' 	=> 'grid',
			]
		);
		$this->add_control(
			'grid_style',
			[
				'label' 	=> esc_html__( 'Grid Style', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> array(
					'default' 		=> esc_html__( 'Default', 'tmc' ),
					'overlay' 		=> esc_html__( 'Overlay', 'tmc' ),
				),
				'default' 	=> 'default',
				'condition' => [
					'style' => ['grid','slider']
				]
			]
		);
		$this->add_control(
			'post_category',
			[
				'label' 	=> esc_html__( 'Category', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT2,
				'multiple' 	=> true,
				'options' 	=> $this->get_post_type_categories('category'),
			]
		);
		// Columns.
		$this->add_responsive_control(
			'columns',
			[
				'type'           => Controls_Manager::SELECT,
				'label'          => '<i class="fa fa-columns"></i> ' . esc_html__( 'Columns', 'tmc' ),
				'default'        => 3,
				'tablet_default' => 2,
				'mobile_default' => 1,
				'options'        => [
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
				],
				'condition' => [
					'style' => ['grid','slider']
				]
			]
		);
		// Order by.
		$this->add_control(
			'order_by',
			[
				'type'    => Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . esc_html__( 'Order by', 'tmc' ),
				'default' => 'date',
				'options' => [
					'date'          => esc_html__( 'Date', 'tmc' ),
					'title'         => esc_html__( 'Title', 'tmc' ),
					'modified'      => esc_html__( 'Modified date', 'tmc' ),
					'comment_count' => esc_html__( 'Comment count', 'tmc' ),
					'rand'          => esc_html__( 'Random', 'tmc' ),
				],
			]
		);
		// Order by.
		$this->add_control(
			'order',
			[
				'type'    => Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . esc_html__( 'Sort by', 'tmc' ),
				'default' => 'desc',
				'options' => [
					'asc'         => esc_html__( 'ASC', 'tmc' ),
					'desc'          => esc_html__( 'DESC', 'tmc' ),
				],
			]
		);
		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'tmc' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( '8', 'tmc' ),
				'description' => esc_html__( '-1 = Get all post.', 'tmc' ),
				'default'     => 8,
			]
		);
		// Read more button hide.
		$this->add_control(
			'grid_pagination',
			[
				'label'     =>  esc_html__( 'Pagination', 'tmc' ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => [
					'style' => ['grid','list'],
				]
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'   => 'yes',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'   => 'yes',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
        $this->add_control(
            'auto_height',
            [
                'label' => esc_html__('Auto Height', 'tmc'),
                'type'     => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'tmc'),
                'label_of' => esc_html__('No', 'tmc'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
		$this->add_control(
			'show_nav',
			[
				'label' => esc_html__( 'Show Navigation', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'default'   => 'yes',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'tmc' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'tmc' ),
				'label_on' => esc_html__( 'On', 'tmc' ),
				'separator' => 'before',
				'condition' => [
					'style' => 'slider',
				]
			]
		);
		$this->end_controls_section();
	}

	/*
	* Recent New -> Image
	*/

	private function tmc_post_layout_image(){
		$this->start_controls_section(
			'tmc_post_layout_image',
			[
				'label' => esc_html__( 'Image', 'tmc' ),
			]
		);

		// Hide image.
		$this->add_control(
			'image_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Image height.
		$this->add_control(
			'image_size',
			[
				'label' 	=> esc_html__( 'Image Size', 'tmc' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> array(
					'thumbnail' => esc_html__( 'Thumbnail', 'tmc' ),
					'medium' 	=> esc_html__( 'Medium', 'tmc' ),
					'large' 	=> esc_html__( 'Large', 'tmc' ),
					'full' 		=> esc_html__( 'Full', 'tmc' ),
				),
				'default' 		=> 'medium',
			]
		);

		// Image link.
		$this->add_control(
			'image_link',
			[
				'label'   => '<i class="fa fa-link"></i> ' . esc_html__( 'Link', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	/*
	* Recent New -> Title
	*/

	private function tmc_post_layout_title(){
		$this->start_controls_section(
			'tmc_post_layout_title',
			[
				'label' => esc_html__( 'Title', 'tmc' ),
			]
		);

		// Hide title.
		$this->add_control(
			'title_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Title tag.
		$this->add_control(
			'title_tag',
			[
				'type'    => Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-code"></i> ' . esc_html__( 'Tag', 'tmc' ),
				'default' => 'h5',
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'span' => 'span',
					'p'    => 'p',
					'div'  => 'div',
				],
			]
		);

		// Title link.
		$this->add_control(
			'title_link',
			[
				'label'   => '<i class="fa fa-link"></i> ' . esc_html__( 'Link', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Content > Meta Options.
	 */
	private function tmc_post_layout_meta() {
		$this->start_controls_section(
			'tmc_post_layout_meta',
			[
				'label' => esc_html__( 'Meta', 'tmc' ),
			]
		);

		// Hide content.
		$this->add_control(
			'meta_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Meta.
		$this->add_control(
			'meta_display',
			[
				'label'       => '<i class="fa fa-info-circle"></i> ' . esc_html__( 'Display', 'tmc' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'default'     => [ 'date' ],
				'multiple'    => true,
				'options'     => [
					'author'   => esc_html__( 'Author', 'tmc' ),
					'date'     => esc_html__( 'Date', 'tmc' ),
					'tags'     => esc_html__( 'Tags', 'tmc' ),
					'comments' => esc_html__( 'Comments', 'tmc' ),
				],
			]
		);

		// No. of Categories.
		$this->add_control(
			'meta_categories_max',
			[
				'type'        => Controls_Manager::NUMBER,
				'label'       => esc_html__( 'No. of Categories', 'tmc' ),
				'placeholder' => esc_html__( 'How many categories to display?', 'tmc' ),
				'default'     => esc_html__( '1', 'tmc' ),
				'condition'   => [
					'meta_display' => 'category',
				],
			]
		);

		// No. of Tags.
		$this->add_control(
			'meta_tags_max',
			[
				'type'        => Controls_Manager::NUMBER,
				'label'       => esc_html__( 'No. of Tags', 'tmc' ),
				'placeholder' => esc_html__( 'How many tags to display?', 'tmc' ),
				'condition'   => [
					'meta_display' => 'tags',
				],
			]
		);

		$this->add_control(
           'meta_color',
           [
               'label'  => esc_html__('Meta Color', 'tmc'),
               'type'   => Controls_Manager::COLOR,
               'scheme' => [
                   'type' =>Scheme_Color::get_type(),
                   'value' => Scheme_Color::COLOR_2,
               ],
               'selectors' => [
                   '{{WRAPPER}} .tmc-pl-meta' => 'color: {{VALUE}}',
               ],
           ]
       );

		// Remove meta icons.
		$this->add_control(
			'meta_remove_icons',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Remove icons', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Content > Content Options.
	 */
	private function tmc_post_layout_content() {
		$this->start_controls_section(
			'tmc_post_layout_content',
			[
				'label' => esc_html__( 'Content', 'tmc' ),
			]
		);

		// Hide content.
		$this->add_control(
			'content_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'tmc' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Length.
		$this->add_control(
			'excerpt_length',
			[
				'type'        => Controls_Manager::NUMBER,
				'label'       => '<i class="fa fa-arrows-h"></i> ' . esc_html__( 'Excerpt Length (words)', 'tmc' ),
				'placeholder' => esc_html__( 'Length of content (words)', 'tmc' ),
				'default'     => 15,
			]
		);

		// Read more button hide.
		$this->add_control(
			'tmc_post_layout_btn',
			[
				'label'     => '<i class="fa fa-check-square"></i> ' . esc_html__( 'Button', 'tmc' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
			]
		);

		// Default button text.
		$this->add_control(
			'tmc_post_layout_btn_text',
			[
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Button text', 'tmc' ),
				'placeholder' => esc_html__( 'Read more', 'tmc' ),
				'default'     => esc_html__( 'Read more', 'tmc' ),
				'condition'   => [
					'tmc_post_layout_btn!'    => '',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Render TMC Post Layout widget output on the frontend.
	 */
	protected function render() {

		// Get settings.
		$settings = $this->get_settings();
		$item_class = $data_slide = $grid_class = '';
		$mobile_class = ( ! empty( $settings['columns_mobile'] ) ? ' tmc-mobile-' . $settings['columns_mobile'] : '' );
		$tablet_class = ( ! empty( $settings['columns_tablet'] ) ? ' tmc-tablet-' . $settings['columns_tablet'] : '' );
		$desktop_class = ( ! empty( $settings['columns'] ) ? ' tmc-desktop-' . $settings['columns'] : '' );
		// $no_thumbnail = !has_post_thumbnail() ? ' no-post-thumbnail' : ' has-post_thumbnail';
		// $grid_class = $no_thumbnail;
		$style = $settings['style'];
		if('grid' == $style){
			$grid_class = $desktop_class . $tablet_class . $mobile_class;
			$item_class = ' tmc-grid-item';
		}elseif('slider' == $style){
			$grid_class = ' owl-carousel';
			$auto_play = $settings['auto_play'] == 'yes' ? true : false;
			$loop 	= $settings['loop'] == 'yes' ? true : false;
			$show_nav = $settings['show_nav'] == 'yes' ? true : false;
			$auto_height = $settings['auto_height'] == 'yes' ? true : false;
			$show_pagination = $settings['show_pagination'] == 'yes' ? true : false;
			$data_slide = array(
				'items' 	=> $settings['columns'],
				'loop'		=> $loop,
				'autoplay'  => $auto_play,
				'auto_height'=> $auto_height,
				'show_nav'  => $show_nav,
				'dot'  		=> $show_pagination,
				'next'      => sprintf(__('%s <i class="fa fa-angle-right" aria-hidden="true"></i>', 'tmc'),esc_html__('Next', 'tmc')),
				'prev'      => sprintf(__('<i class="fa fa-angle-left" aria-hidden="true"></i> %s', 'tmc'),esc_html__('Previous', 'tmc'))
			);
			$data_slide = 'data-slide="'.esc_attr(json_encode($data_slide) ). '"';
		}
		// Arguments for query.
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,

		);
		// Display posts in category.
		if ( ! empty( $settings['post_category'] )) {
			$cat_name = implode(',', $settings['post_category']);
			$args['category_name'] = $cat_name;
		}

		// Items to display.
		$args['posts_per_page'] = $settings['post_per_page'];

		// Order by.
		if ( ! empty( $settings['order_by'] ) ) {
			$args['orderby'] = $settings['order_by'];
		}
		// Order.
		if ( ! empty( $settings['order'] ) ) {
			$args['order'] = $settings['order'];
		}

		// Pagination.
		if ( ! empty( $settings['grid_pagination'] ) ) {
			$paged         = get_query_var( 'paged' );
			if ( empty( $paged ) ) {
				$paged         = get_query_var( 'page' );
			}
			$args['paged'] = $paged;
		}
		// Query.
		$query = new \WP_Query( $args );
		// Output.
		echo '<div class="tmc-post-layout-widget ' . $style . '">';
		echo '<div class="tmc-grid-col' . $grid_class . '" '. $data_slide .'>';
		// Query results.
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<div class="tmc-pl-item-wrap '.$item_class.'">';
				echo '<article class="tmc-pl-item transition300 br5 '.$settings['grid_style'].'">';
				// Image.
				$this->renderImage();

				echo '<div class="tmc-pl-content">';
				// Title.
				$this->renderTitle();

				// Meta.
				$this->renderMeta();

				// Content.
				$this->renderContent();

				// Button.
				if('overlay' != $settings['grid_style'] || 'list' == $settings['style']){
					$this->renderButton();
				}
				echo '</div><!-- .tmc-pl-content -->';
				echo '</article>';
				echo '</div><!-- .tmc-pl-item-wrap -->';

			} // End while().

			// Pagination.
			if ( ! empty( $settings['grid_pagination'] && 'slider' !== $settings['style']) ) { ?>
				<div class="tmc-pagination">
					<?php
					$big           = 999999999;
					$totalpages    = $query->max_num_pages;
					$current       = max( 1, $paged );
					$paginate_args = array(
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'    => '?paged=%#%',
						'current'   => $current,
						'total'     => $totalpages,
						'show_all'  => false,
						'end_size'  => 1,
						'mid_size'  => 3,
						'prev_next' => true,
						'prev_text' => esc_html__( 'Previous', 'tmc' ),
						'next_text' => esc_html__( 'Next', 'tmc' ),
						'type'      => 'plain',
						'add_args'  => false,
					);

					$pagination = paginate_links( $paginate_args ); ?>
					<nav class="pagination">
						<?php echo $pagination; ?>
					</nav>
				</div>
				<?php
			}
		} // End if().

		// Restore original data.
		wp_reset_postdata();

		echo '</div><!-- . tmc-pl-element -->';
		echo '</div><!-- .tmc-post-layout-widget -->';

	}
	/**
	 * Render image.
	 */
	protected function renderImage() {
		$settings = $this->get_settings();

		// Only in editor.
		if ( $settings['image_hide'] !== 'yes' ) {
			// Check if post type has featured image.
			if ( has_post_thumbnail() ) {
				$image_size = $settings['image_size'];
				if ( $settings['image_link'] == 'yes' ) {
					?>
					<div class="tmc-pl-image content-featured">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<div class="content-img">	
								<?php
								the_post_thumbnail(
									$image_size, array(
										'class' => 'img-responsive',
										'alt'   => get_the_title( get_post_thumbnail_id() ),
									)
								); ?>
							</div>
						</a>
						<?php
						if('overlay' == $settings['grid_style']  && 'list' != $settings['style']){
							$this->renderMetaGridCategories();?>
							<a href="<?php the_permalink(); ?>" class="view-more" title="<?php the_title(); ?>"><span aria-hidden="true" class="arrow_right"></span></a>
						<?php }
						?>
					</div>
				<?php } else { ?>
					<div class="tmc-pl-image br5 content-featured">
						<div class="content-img">		
							<?php
							the_post_thumbnail(
								$image_size, array(
									'class' => 'img-responsive',
									'alt'   => get_the_title( get_post_thumbnail_id() ),
								)
							); ?>
						</div>
						<?php 
						if('overlay' == $settings['grid_style'] && 'list' != $settings['style']){
							$this->renderMetaGridCategories();?>
							<a href="<?php the_permalink(); ?>" class="view-more" title="<?php the_title(); ?>"><span aria-hidden="true" class="arrow_right"></span></a>
						<?php }
						?>
					</div>
					<?php
				}
			}
		}
	}
	/**
	 * Render title.
	 */
	protected function renderTitle() {
		$settings = $this->get_settings();
		if('default' == $settings['grid_style'] || 'list' == $settings['style']){
			$this->renderMetaGridCategories();?>
		<?php }
		if ( $settings['title_hide'] !== 'yes' ) { ?>
			<<?php echo $settings['title_tag']; ?> class="tmc-pl-title mt5">
			<?php if ( $settings['title_link'] == 'yes' ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
				<?php
			} else {
				the_title();
			} ?>
			</<?php echo $settings['title_tag']; ?>>
			<?php
		}
	}
	/**
	 * Display categories in meta section.
	 */
	protected function renderMetaGridCategories() {
		$post_type_category = get_the_category();

		if ( $post_type_category ) { ?>
			<span class="tmc-pl-categories">
				<?php
				foreach ( $post_type_category as $category ) {?>
					<span class="tmc-cat-item ">
						<a class="br4 b-all" href="<?php echo get_category_link( $category->term_id ); ?>"
						   title="<?php echo esc_html($category->name); ?>">
							<?php echo esc_html($category->name); ?>
						</a>
					</span>
					<?php
				} ?>
			</span>
			<?php
		}
	}

	/**
	 * Display tags in meta section.
	 */
	protected function renderMetaGridTags() {
		$settings       = $this->get_settings();
		$post_type_tags = get_the_tags();
		$maxTags        = $settings['meta_tags_max'] ? $settings['meta_tags_max'] : '-1';
		$i              = 0; // counter

		if ( $post_type_tags ) { ?>
			<span class="tmc-pl-tags">
				<?php
				echo ( $settings['meta_remove_icons'] == '' ) ? '<i class="fa fa-tags"></i>' : '';

				foreach ( $post_type_tags as $tag ) {
					if ( $i == $maxTags ) {
						break;
					} ?>
					<span class="tmc-tags-item">
						<a href="<?php echo get_tag_link( $tag->term_id ); ?>" title="<?php echo $tag->name; ?>">
							<?php echo $tag->name; ?>
						</a>
					</span>
					<?php
					$i ++;
				} ?>
			</span>
			<?php
		}
	}
	/**
	 * Render meta of post type.
	 */
	protected function renderMeta() {
		$settings = $this->get_settings();

		if ( $settings['meta_hide'] !== 'yes' ) {
			if ( ! empty( $settings['meta_display'] ) ) { ?>
				<div class="tmc-pl-meta">

					<?php
					foreach ( $settings['meta_display'] as $meta ) {

						switch ( $meta ) :
							// Author
							case 'author': ?>
								<span class="entry-author">
									<?php
									echo ( $settings['meta_remove_icons'] == '' ) ? '<i class="fa fa-user"></i>' : '';

									echo get_the_author(); ?>
								</span>
								<?php
								// Date
								break;
							case 'date': ?>
								<span class="entry-date">
									<?php
									echo ( $settings['meta_remove_icons'] == '' ) ? '<i class="fa fa-calendar"></i>' : '';
									echo get_the_date(); echo the_time();?>
								</span>
								<?php
								break;
							case 'tags':
								$this->renderMetaGridTags();

								// Comments/Reviews
								break;
							case 'comments': ?>
								<span class="entry-comments">
									<?php
									echo ( $settings['meta_remove_icons'] == '' ) ? '<i class="fa fa-comment"></i>' : '';
									echo comments_number( esc_html__( 'No comments', 'tmc' ), esc_html__( '1 comment', 'tmc' ), esc_html__( '% comments', 'tmc' ) );
									?>
								</span>
								<?php
								break;
						endswitch;
					} // End foreach().?>

				</div>
				<?php
			}// End if().
		}// End if().
	}
	/**
	 * Render content
	 */
	protected function renderContent() {
		$settings = $this->get_settings();
		if ( $settings['content_hide'] !== 'yes' ) { ?>
			<div class="tmc-pl-desc">
				<p>
					<?php
					if ( empty( $settings['excerpt_length'] ) ) {
						the_excerpt();
					} else {
						echo wp_trim_words( get_the_excerpt(), $settings['excerpt_length'] );
					}
					?>
				</p>
			</div>
			<?php
		}
	}
	/**
	 * Render button
	 */
	protected function renderButton() {
		$settings = $this->get_settings();
		if( $settings['tmc_post_layout_btn'] == 'yes' && ! empty( $settings['tmc_post_layout_btn'] ) ) { 

			if ($settings['style'] == 'list') {?>
			
			<div class="tmc-pl-footer transition300 btn-hover-effect-2">
				<a class="btn btn-primary" href="<?php echo get_the_permalink(); ?>"
				   title="<?php echo $settings['tmc_post_layout_btn_text']; ?>"><?php echo $settings['tmc_post_layout_btn_text']; ?></a>
			</div>
			<?php
			} else { ?>
			<div class="tmc-pl-footer transition300 btn-hover-effect">
				<a class="btn btn-primary" href="<?php echo get_the_permalink(); ?>"
				   title="<?php echo $settings['tmc_post_layout_btn_text']; ?>"><?php echo $settings['tmc_post_layout_btn_text']; ?></a>
			</div>	
			<?php }
		}
	}

	/**
	 * Style > Grid options.
	 */
	private function tmc_post_layout_style() {
		// Tab.
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Options', 'tmc' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Columns margin.
		$this->add_responsive_control(
			'style_columns_margin',
			[
				'label'     => esc_html__( 'Columns Space', 'tmc' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 15,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmc-post-layout-widget' => 'margin: -{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tmc-post-layout-widget .tmc-pl-item-wrap '   => 'padding: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'style!' => 'list' 
				],
			]
		);
		// Row margin.
		$this->add_responsive_control(
			'style_rows_space',
			[
				'label'     => esc_html__( 'Rows Space', 'tmc' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 30,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tmc-pl-item-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'tmc' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .grid .tmc-pl-item .tmc-pl-image img,.slider .tmc-pl-item .tmc-pl-image img' => 'border-top-left-radius: {{SIZE}}{{UNIT}};border-top-right-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .grid .tmc-pl-item .tmc-pl-content,.slider .tmc-pl-item .tmc-pl-content' => 'border-bottom-left-radius: {{SIZE}}{{UNIT}};border-bottom-right-radius: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'style!' => 'list',
					'grid_style' => 'default'
				]
			]
		);
		$this->end_controls_section();
	}
}