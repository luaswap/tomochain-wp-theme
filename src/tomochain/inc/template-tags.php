<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package tomochain
 */

if ( ! function_exists( 'tomochain_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tomochain_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'tomochain_post_date' ) ) :
    function tomochain_post_date() {

        // global $post;

        // if (function_exists('pll_get_term') && in_category(pll_get_term(11))) {
        //     $start_date = date_i18n(get_option( 'date_format' ), strtotime(get_field('start_date')));
        //     $end_date   = date_i18n(get_option( 'date_format' ), strtotime(get_field('end_date')));

        //     $date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');
        // } else {
            $date = get_the_date(get_option( 'date_format' ));
        // }

        echo '<span class="posted-on">' . $date . '</span>';
    }
endif;

if ( ! function_exists( 'tomochain_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function tomochain_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'tomochain' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'tomochain_categories' ) ) :
    function tomochain_categories() {
        if ( get_the_category_list( ', ' )) : ?>
            <span class="categories"><?php echo get_the_category_list( ', ' ); ?></span>
        <?php
        endif;
    }
endif;

if ( ! function_exists( 'tomochain_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function tomochain_entry_footer() {
        return;
		// Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) :
            global $post;
        ?>
            <div class="post-tags col-xs-12 col-sm-6">
			<?php the_tags( '<ul class="tagcloud"><li class="tag-cloud__item">',
					'</li><li class="tag-cloud__item">',
                    '</li></ul>' ); ?>
            </div>
            <div class="post-share col-xs-12 col-sm-6 text-sm-right">
                <div class="post-share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                        onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo rawurlencode( the_title( '',
                        '',
                        false ) ); ?>%20-%20<?php the_permalink(); ?>"
                        onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
                    <a data-pin-do="skipLink"
                        href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url( $pin_image ); ?>&amp;description=<?php echo rawurlencode( the_title( '',
                            '',
                            false ) ); ?>"
                        onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
                        <i class="fa fa-pinterest"></i>
                    </a>
                    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
                        onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
        <?php
        endif;

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'tomochain' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'tomochain' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'tomochain_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function tomochain_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
        }

        $custom_url = get_field('custom_url');
        $open_new_tab = get_field('open_in_new_tab') ? '__blank' : '';

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php echo $custom_url = esc_url($custom_url) ? esc_url($custom_url) : get_permalink(); ?>" target="<?php echo esc_attr($open_new_tab); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'tomo-post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
