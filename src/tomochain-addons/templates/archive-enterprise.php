<?php
/* 
*Enterprise Achive page
*/

get_template_part('headerldetrinside');
$page_title = '';
$current_term = '#';
if ( is_tax('enterprise_cat') ) {
    $page_title       = single_term_title('', false);
} elseif ( is_post_type_archive ('enterprise') || is_singular('enterprise')) {
    $page_title = esc_html__( 'Publication','tomochain' );
}
?>
<div class="content-area tmp-enterprise-inside">
    <main class="site-main">
        <div class="container">
            <div class="enter_nav">
                <div class="breadcrumbs">
                    <?php echo tomochain_breadcrumbs();?>
                </div>
            </div><!-- /enter_nav -->
            <div class="enter_label">
                <div class="row">
                    <div class="col-6 col-md-9">
                        <h2 class="single_subtitle_large"><?php echo $page_title;?></h2>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="filter-category">
                            <div class="dropdown">
                                <div class="tomo_custom_select">
                                    <?php
                                        $terms = get_terms( 'enterprise_cat', array('hide_empty' => true,) );
                                    ?>
                                    <select>
                                        <option value="<?php echo get_post_type_archive_link('enterprise');?>"><?php esc_html_e('All Publication','tomochain-addon');?></option>
                                        <?php if(!is_wp_error($terms) && !empty($terms)):
                                                foreach ($terms as $term) {?>
                                                   <option value="<?php echo esc_url(get_term_link($term->term_id));?>"><?php echo esc_html($term->name);?></option>
                                        <?php   }
                                        ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /enter_label -->
            <div class="enter_wrapper">
                <div class="post_filter_wrapper">
                    <div class="row">
                        <?php
                            $i = 0;
                            if ( have_posts() ) :
                                /* Start the Loop */
                                
                                while ( have_posts() ) :
                                    the_post();
                                    tomochain_get_template( 'content-enterprise.php', array('i'=> $i) );
                                    $i++;
                                endwhile;
                            else :
                                $s = esc_html__('No found post!','tomochain-addon');
                                echo sprintf('<h4>%s</h4>',$s);
                            endif;
                        ?>
                    </div>
                    <?php tomochain_pagination(); ?>
                </div>
            </div><!-- /enter_wrapper -->
        </div>
    </main>
</div>
<?php
get_template_part('footer'); ?>