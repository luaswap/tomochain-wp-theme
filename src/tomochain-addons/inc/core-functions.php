<?php

function tomochain_get_shortcode_id($name) {
    global $tomochain_shortcode_id;

    if ( ! $tomochain_shortcode_id ) {
        $tomochain_shortcode_id = 1;
    }

    return $name . '-' . ( $tomochain_shortcode_id ++ );
}

function tomochain_text2line( $str ) {
    return trim( preg_replace( "/[\r\v\n\t]*/", '', $str ) );
}

function tomochain_locate_template( $template_name, $template_path = '', $default_path = '' ) {
    if ( ! $template_path ) {
        $template_path = TOMOCHAIN_ADDONS_DIR . '/templates/';
    }

    if ( ! $default_path ) {
        $default_path = TOMOCHAIN_ADDONS_DIR . '/templates/';
    }

    // Look within passed path within the theme - this is priority.
    $template = locate_template(
        array(
            trailingslashit( $template_path ) . $template_name,
            $template_name,
        )
    );

    if ( ! $template ) {
        $template = $default_path . $template_name;
    }

    return apply_filters( 'tomochain_locate_template', $template, $template_name, $template_path );
}

function tomochain_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
    if ( ! empty( $args ) && is_array( $args ) ) {
        extract( $args );
    }

    $located = tomochain_locate_template( $template_name, $template_path, $default_path );

    if ( ! file_exists( $located ) ) {
       return;
    }

    $located = apply_filters( 'tomochain_get_template', $located, $template_name, $args, $template_path, $default_path );

    include $located;
}
function tomochain_dapp_filter($per_page,$paged){
    $categories = get_terms( array(
        'taxonomy' => 'dapp_category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    echo '<ul class="tomochain-dapp-filter" data-number="'.$per_page.'" data-page="'.$paged.'">';
    echo '<li class="selected"><a href="#" data-filter="all">'.esc_html__('All','tomochain-addons').'</a></li> ';

    foreach ( $categories as $category ) {
        $category_link = sprintf(
            '<a href="%1$s" alt="%2$s" data-filter="%3$s">%4$s</a>',
            esc_attr('#'),
            esc_attr( sprintf( esc_html__( 'View all posts in %s', 'tomochain-addons' ), $category->name ) ),
            esc_attr($category->term_id),
            esc_html( $category->name )
        );

        echo '<li>' . sprintf( esc_html__( '%s', 'tomochain-addons' ), $category_link ) . '</li> ';
    }
    echo '</ul>';
}
/**
 * Dapp Pagination Ajax
 */
function tomochain_ajax_pagination( $query = null, $paged = 1 ) {
    if (!$query)
        return;
    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_text' => 'Prev',
        'next_text' => 'Next'
    ]);
    if ($query->max_num_pages > 1) : ?>
        <div class="tomochain-pagination dapp-pagination">
            <ul class="pagination">
                <?php foreach ( $paginate as $page ) :?>
                    <li><?php echo $page; ?></li>
                <?php endforeach; ?>
            </ul>
        </div><!-- .pagination -->
    <?php endif;
}
/*
* Dapp Ajax
*/
add_action('wp_ajax_tomochain_dapp_ajax','tomochain_dapp_ajax');
add_action('wp_ajax_nopriv_tomochain_dapp_ajax','tomochain_dapp_ajax');
function tomochain_dapp_ajax(){
    /**
     * Process data
    */
    $id  = $_POST['params']['id'];
    $paged = intval($_POST['params']['page']);
    $per_page  = intval($_POST['params']['per_page']);
    if( isset( $id ) && !empty( $id ) ){
        $args = array(
            'post_type'      => 'dapp',
            'post_status'    => 'publish',
            'posts_per_page' => $per_page,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'paged'          => $paged
        );
        if('all' != $id){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dapp_category',
                    'field'    => 'id',
                    'terms'    => $id,
                ),
            );
        }
        $dapps = new WP_Query($args);
        wp_reset_postdata();
        ?>
        <?php if( $dapps->have_posts() ):
            while( $dapps->have_posts() ): $dapps->the_post();
                $custom_url = get_field('dapp_custom_url');
                $contract_address_url = get_field('contract_address_url');
                $open_new_tab = get_field('dapp_open_in_new_tab') ? '__blank' : '';
                ?>
                <div class="tomochain-dapp-item">
                    <div class="dapp-thumbnail">
                        <?php
                        if(has_post_thumbnail()) {
                            the_post_thumbnail('tomo-post-thumbnail');
                        }else{ $img_url = get_template_directory_uri() . '/assets/images/image-shortcode.jpg';
                        ?>
                            <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr(get_the_title());?>">
                        <?php }?>
                    </div>
                    <div class="dapp-info">
                        <h3 class="dapp-title text-truncate">
                            <?php echo the_title(); ?>
                        </h3>
                        <div class="dapp-content">
                            <?php the_content();?>
                        </div>
                        <div class="tomo_btn_tmp_trans box_flexbox">
                            <?php if($custom_url):?>
                                <a class="more-info" href="<?php echo esc_url($custom_url)?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                    <?php echo esc_html__('More Info','nootheme')?>
                                </a>
                            <?php endif;?>
                            <?php if($contract_address_url):?>
                                <a href="<?php echo esc_url($contract_address_url)?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                    <?php echo esc_html__('Contract Address','nootheme')?>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;?>
        <?php
        if($dapps->max_num_pages > 1)
            tomochain_ajax_pagination($dapps,$paged);
        ?>
    <?php }
    wp_die();

}
/*
* Dapp Ajax
*/
add_action('wp_ajax_tomochain_roadmap_ajax','tomochain_roadmap_ajax');
add_action('wp_ajax_nopriv_tomochain_roadmap_ajax','tomochain_roadmap_ajax');
function tomochain_roadmap_ajax(){
    /**
     * Process data
    */
    $id  = $_POST['params']['id'];
    if( isset( $id ) && !empty( $id ) ){
        $tax_query = array();
        if('all' != $id){
            $tax_query = array(
                array(
                    'taxonomy' => 'roadmap_category',
                    'field'    => 'term_id',
                    'terms'    => $id,
                ),
            );
        }  
        ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="roadmap-common tomochain-completed">
                    <div class="main-inner">
                        <h2 class="main-title"><?php echo esc_html__('Completed','tomochain-addons')?></h2>
                        <div class="list-box">
                            <?php
                            $args_complete = array(
                                'post_type'      => 'road_map',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'meta_key'       => 'process',
                                'meta_value'     => 'completed',
                                'meta_compare'   => '=',
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                                'tax_query'      => $tax_query
                            );
                            
                            $c = new WP_Query($args_complete);
                            wp_reset_postdata();
                            if( $c->have_posts() ):
                                while( $c->have_posts() ): $c->the_post();
                                    $roadmap_url = get_field('roadmap_url') ? get_field('roadmap_url') : '#';
                                    $github_url = get_field('github_url');
                                    $doc_url = get_field('doc_url');
                                    $released_date = get_field('release_date');
                                    $open_new_tab = get_field('r_open_in_new_tab') ? '__blank' : '';
                            ?>
                                
                                    <div class="box-item">
                                        <div class="item-header">
                                            <?php
                                                if(get_field('item_image')){?>
                                                    <div class="col-logo">
                                                        <img src="<?php echo get_field('item_image');?>">

                                                    </div>
                                            <?php }?>
                                            <div class="col-infor">
                                                <div class="title-prj">
                                                    <a class="txt-name" href="<?php echo esc_url($roadmap_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                        <?php the_title();?>
                                                    </a>
                                                </div>
                                                <div class="update-on">
                                                    <?php if($released_date){?>
                                                        <span><?php echo esc_html__('Released date:','tomochain-addons')?> <?php echo esc_html($released_date);?></span>
                                                    <?php }?>
                                                    <?php if($github_url){?>
                                                        <a href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                            <i class="fab fa-github"></i>
                                                        </a>
                                                    <?php }?>
                                                    <?php if($doc_url){?>
                                                        <a href="<?php echo esc_url($doc_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                            <i class="fa fa-file"></i>
                                                        </a>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <?php the_content();?>
                                        </div>
                                    </div><!-- box-item -->
                                
                                <?php endwhile;?>
                            <?php else:?>
                                <p class="mgs"><?php echo esc_html__('No posts found','tomochain-addons');?></p>
                            <?php endif;?>
                        </div>
                    </div>
                </div><!-- .tomochain-completed -->
            </div>
            <div class="col-lg-6">
                <div class="roadmap-common tomochain-progress">
                    <div class="main-inner">
                        <h2 class="main-title"><?php echo esc_html__('In Progress','tomochain-addons');?></h2>
                        <div class="list-box">
                            <?php
                            $args_inprogress = array(
                                'post_type'      => 'road_map',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'meta_key'       => 'process',
                                'meta_value'     => 'in-progress',
                                'meta_compare'   => '=',
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                                'tax_query'      => $tax_query
                            );
                            $p = new WP_Query($args_inprogress);
                            wp_reset_postdata();
                            if( $p->have_posts() ):
                                while( $p->have_posts() ): $p->the_post();
                                    $roadmap_url = get_field('roadmap_url') ? get_field('roadmap_url') : '#';
                                    $github_url = get_field('github_url');
                                    $doc_url = get_field('doc_url');
                                    $due_date = get_field('due_date');
                                    $progress_number = get_field('progress');
                                    $open_new_tab = get_field('r_open_in_new_tab') ? '__blank' : '';
                            ?>
                                    <div class="box-item">
                                        <div class="item-header">
                                            <?php
                                                if(get_field('item_image')){?>
                                                    <div class="col-logo">
                                                        <img src="<?php echo get_field('item_image');?>">

                                                    </div>
                                            <?php }?>
                                            <div class="col-infor">
                                                <div class="title-prj">
                                                    <a class="txt-name" href="<?php echo esc_url($roadmap_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                        <?php the_title();?>
                                                    </a>
                                                </div>
                                                <div class="update-on">
                                                    <div class="box-progress">
                                                        <div class="innrer-progress">
                                                            <div class="progress-value" style="width:<?php echo esc_attr($progress_number);?>%"></div>
                                                        </div>
                                                        <span><?php echo esc_html($progress_number);?>%</span>
                                                    </div>
                                                    <?php if($due_date){?>
                                                            <span><?php echo esc_html__('Due date:','tomochain-addons')?> <?php echo esc_html($due_date);?></span>
                                                        <?php }?>
                                                        <?php if($github_url){?>
                                                            <a href="<?php echo esc_url($github_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                                <i class="fab fa-github"></i>
                                                            </a>
                                                        <?php }?>
                                                        <?php if($doc_url){?>
                                                            <a href="<?php echo esc_url($doc_url);?>" target="<?php echo esc_attr($open_new_tab);?>">
                                                                <i class="fa fa-file"></i>
                                                            </a>
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <?php the_content();?>
                                        </div>
                                    </div><!-- box-item -->                             
                            <?php endwhile;?>
                            <?php else:?>
                                <p class="mgs"><?php echo esc_html__('No posts found','tomochain-addons');?></p>
                        <?php endif;?>
                    </div>
                    </div>
                </div><!-- .tomochain-progress -->
            </div>
        </div>
    <?php }
    wp_die();

}
