<?php
$columns       = get_field( 'enter_columns','options' ) ? get_field( 'enter_columns','options' ) : '3';
$classes       = 'enter_type_post col-sm-12 col-md-' . $columns;
$custom_url    = get_field( 'enter_custom_url' );
$open_new_tab  = get_field( 'enter_open_in_new_tab' ) ? '__blank' : '';
$excerpt_length = get_field('enter_excerpt_length','options') ? get_field('enter_excerpt_length','options') : '20';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
    <div class="enter_wpb_wrapper">
        <div class="enter_post_img">
            <a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>" target="<?php echo esc_attr($open_new_tab)?>" rel="bookmark">
                <?php if ( has_post_thumbnail() ) :
                        if($i == 0){
                            the_post_thumbnail('full');
                        }else{
                            the_post_thumbnail('tomo-post-thumbnail');
                        }
                    else : $img_url = get_template_directory_uri() . '/assets/images/image-list.jpg'; ?>
                        <img src="<?php echo esc_url( $img_url );?>" alt="<?php echo esc_attr( get_the_title() );?>">
                    <?php endif;
                ?>
            </a>
        </div>
        <div class="enter_post_txt">
            <div class="post_inner">
                <h4 class="txt_title"><a href="<?php echo $custom_url ? esc_url($custom_url) : get_permalink()?>"><?php echo get_the_title();?></a></h4>
                <div class="txt_meta">
                    <?php 
                        $terms = get_the_terms(get_the_ID(),'enterprise_cat');
                        if(!is_wp_error( $terms ) && !empty($terms)){
                            foreach($terms as $term):?>
                                <span><a href="<?php echo esc_url(get_term_link($term->term_id));?>"><?php echo esc_html($term->name);?></a></span>
                    <?php
                            endforeach; 
                        }
                    ?>
                    
                    <?php tomochain_post_date(); ?>
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
</article><!-- /enter_type_post -->