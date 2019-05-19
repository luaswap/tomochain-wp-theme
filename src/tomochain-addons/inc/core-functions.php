<?php
// function to display number of posts.
function tomochain_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function tomochain_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
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
/**
 * Dapp Pagination Ajax
 */
function tomochain_dapp_pagination($wp_query = null) {
    if($wp_query == null){
        global $wp_query;
    }
    global $wp_rewrite;

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = wp_kses_post( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link,
        'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%',
        'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links                      = paginate_links( array(
        'base'      => $pagenum_link,
        'format'    => $format,
        'total'     => $wp_query->max_num_pages,
        'current'   => $paged,
        'add_args'  => array_map( 'urlencode', $query_args ),
        'prev_text' => 'prev',
        'next_text' => 'next',
        'type'      => 'list',
        'end_size'  => 3,
        'mid_size'  => 3,
    ) );

    if ( $links ) : ?>
        <div class="tomochain-dapp-pagination">
            <?php echo wp_kses_post( $links ); ?>
        </div><!-- .pagination -->
    <?php
    endif;
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
                                                    <br>
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
                                    $progress_number = substr(get_field('progress'), 0, 2);
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
                                                        <br>
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
/**
 * Thank you when bounty send mail successful
 */
function tomochain_bounty_thank_you() {

    if(isset($_POST['id']) && !empty($_POST['id'])){
        $number_submit = get_post_meta($_POST['id'],'tomochain_number_submit',true);
        if(!empty($number_submit)){
            update_post_meta($_POST['id'],'tomochain_number_submit',$number_submit + 1);
        }else{
            $number_submit = 1;
            update_post_meta($_POST['id'],'tomochain_number_submit',$number_submit);
        }
    }
    wp_die();
}
add_action('wp_ajax_tomochain_bounty_thank_you','tomochain_bounty_thank_you');
add_action('wp_ajax_nopriv_tomochain_bounty_thank_you','tomochain_bounty_thank_you');
/* Redirect to Bounty page */
function tomochain_bounty_redirect(){
    if ( is_post_type_archive( 'bounty' ) || is_tax( 'project' ) || is_tax( 'status' ) ) {
        $url = get_field('bounty_url','options');
        if(!empty($url)){
            wp_redirect($url);
            exit();
        }
    }
}
add_action( 'template_redirect', 'tomochain_bounty_redirect' );