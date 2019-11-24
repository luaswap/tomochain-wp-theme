<?php
$taxonomies = array('category');
$excerpt_length = 20;
  $terms = wp_get_object_terms( get_the_ID(), $taxonomies, array( 'fields' => 'ids' ) );
  if ( is_wp_error( $terms ) || empty( $terms ) ) {
    return array();
  }
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'post_date',
    'order'   => 'DESC',
    'tax_query' => array(
      array(
          'taxonomy' => 'category',
          'field'    => 'id',
          'terms' => $terms
      )
    ),
    'post__not_in' => array (get_the_ID()),
    );
  $related_items = new WP_Query( $args );
?>

<div class = "tmc-related-post">
  <h2 class="related-heading"><?php esc_html_e('Related Post','tmc');?></h2>
    <div class="tmc-related-content">
      <?php 
          while ( $related_items->have_posts() ) : $related_items->the_post();
              $permalink   = get_permalink();
              $title_post  = get_the_title();
              ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-img">
                  <?php if(has_post_thumbnail()):
                      tmc_post_thumbnail('post-large-thumb');
                    endif;
                  ?>
                </div>
                <div class="box-content">
                  <div class="entry-header">
                    <?php the_title('<h3 class="entry-title"><a href="' . get_permalink(). '">', '</a></h3>');?>
                  </div>
                </div>
              </article>
          <?php
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
</div>