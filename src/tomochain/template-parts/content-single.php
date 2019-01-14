<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomochain
 */
?>

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

		<div class="entry-meta">
            <?php
            tomochain_posted_by();
            tomochain_categories();
            tomochain_post_date();
            ?>
        </div><!-- .entry-meta -->
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
</article><!-- #post-<?php the_ID(); ?> -->
