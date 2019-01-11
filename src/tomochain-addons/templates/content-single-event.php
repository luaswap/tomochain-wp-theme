<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- <div class="post-thumbnail">
        <?php
        	//if(has_post_thumbnail()){
        	//	the_post_thumbnail('tomo-single-thumbnail');
        	//}else{
            //    $img_url = get_template_directory_uri() . '/assets/images/image-single.jpg';
            //?>
                <img src="<?php //echo esc_url($img_url);?>" alt="<?php //echo esc_attr(get_the_title());?>">
            <?php
            //}
        ?>
    </div> -->

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				tomochain_posted_by();
                tomochain_categories();
                tomochain_post_date();
				?>
			</div><!-- .entry-meta -->
		<?php elseif('event' === get_post_type()):
			$start_date = date_i18n(get_option( 'date_format' ), strtotime(get_field('start_date')));
			$end_date   = date_i18n(get_option( 'date_format' ), strtotime(get_field('end_date')));
			$date = $start_date . (strcmp($start_date, $end_date) ? ' - ' . $end_date : '');
			?>
			<div class="entry-meta">
				<span class="event-time">
					<?php if($date){?>
						<span class="posted-on"><?php echo $date;?></span>
					<?php }?>
                </span>
				<span class="event-venue">- <?php the_field('venue'); ?></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		// echo tomochain_excerpt(30);
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tomochain' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer row">
		<?php tomochain_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
