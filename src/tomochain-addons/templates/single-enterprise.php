<?php
/* 
* Single Enterprise page
*/

get_template_part('headerldetrinside');
?>
<div class="content-area">
    <main class="site-main">
        <div class="container">
            <div class="enter_nav">
                <div class="breadcrumbs">
                    <?php echo tomochain_breadcrumbs();?>
                </div>
            </div><!-- /enter_nav -->
            <div class="container-detail-enter">
                <?php
                while ( have_posts() ) :
                    the_post();?>
                    <?php the_title( '<h1 class="single_subtitle_medium">', '</h1>' ); ?>
                    <div class="entry-meta">
                        <?php tomochain_post_date(); ?>
                        <span class="author"><?php echo sprintf(__('- by %s'),get_the_author());?></span>
                    </div><!-- .entry-meta -->
                    <div class="entry-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                <?php endwhile;
                ?>
            </div><!-- /enter_wrapper -->
            <div class="related-post">
                <h2 class="single_subtitle_medium"><?php esc_html_e('Ohters Publication','tomochain-addon')?></h2>
                <div class="slide">
                    <?php
                        wp_enqueue_script( 'slick-carousel' );
                        $custom_url    = get_field( 'enter_custom_url' );
                        $open_new_tab  = get_field( 'enter_open_in_new_tab' ) ? '__blank' : '';
                        $excerpt_length = get_field('enter_excerpt_length','options') ? get_field('enter_excerpt_length','options') : '20';
                        $custom_taxterms = wp_get_object_terms( get_the_ID(), 'enterprise_cat', array('fields' => 'ids') );
                        // arguments
                        $args = array(
                        'post_type' => 'enterprise',
                        'post_status' => 'publish',
                        'posts_per_page' => 10, // you may edit this number
                        'orderby' => 'rand',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'enterprise_cat',
                                'field' => 'id',
                                'terms' => $custom_taxterms
                            )
                        ),
                        'post__not_in' => array ($post->ID),
                        );
                        $related_items = new WP_Query( $args );
                        if ($related_items->have_posts()) :?>
                            <?php
                                while ( $related_items->have_posts() ) : $related_items->the_post();
                            ?>
                            <div class="enter_type_post">
                                <div class="enter_wpb_wrapper">
                                    <div class="enter_post_img">
                                        <a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark">
                                            <?php the_post_thumbnail('tomo-post-thumbnail');?>
                                        </a>
                                    </div>
                                    <div class="enter_post_txt">
                                        <div class="post_inner">
                                            <h4 class="txt_title"><a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>"><?php echo get_the_title();?></a></h4>
                                            <div class="txt_meta">
                                                <?php tomochain_post_date(); ?>
                                                <?php
                                                    $terms = get_the_terms(get_the_ID(),'enterprise_cat');
                                                    if(!is_wp_error( $terms ) && !empty($terms)){
                                                        foreach($terms as $term):?>
                                                            <span><a href="<?php echo esc_url(get_term_link($term->term_id));?>"><?php echo esc_html($term->name);?></a></span>
                                                <?php
                                                        endforeach;
                                                    }
                                                ?>
                                            </div>
                                            <?php if(get_the_excerpt()):?>
                                                <div class="entry-content">
                                                    <?php
                                                        echo tomochain_excerpt($excerpt_length);
                                                    ?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                                endif;
                            ?>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
get_template_part('footer'); ?>