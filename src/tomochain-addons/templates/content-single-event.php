<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- <div class="post-thumbnail">
        <?php
        	//if ( has_post_thumbnail() ) :
        		//the_post_thumbnail('tomo-single-thumbnail');
        	//else :
               //$img_url = get_template_directory_uri() . '/assets/images/image-single.jpg';
        ?>
            <img src="<?php //echo esc_url ( $img_url );?>" alt="<?php //echo esc_attr ( get_the_title() ); ?>">
        <?php //endif; ?>
    </div> -->

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <?php
            $start_date = date_i18n(get_option( 'date_format' ), strtotime(get_field('start_date')));
            $end_date   = date_i18n(get_option( 'date_format' ), strtotime(get_field('end_date')));
            $date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');
        ?>
        <div class="entry-meta">
            <span class="event-time">
                <?php if ( $date ) : ?>
                    <span class="posted-on"><?php echo $date;?></span>
                <?php endif; ?>
            </span>
            <span class="event-venue">- <?php the_field('venue'); ?></span>
        </div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tomochain' ),
			'after'  => '</div>',
		) );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
