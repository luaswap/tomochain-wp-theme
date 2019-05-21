<?php
/* 
*Enterprise Achive page
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
            <div class="enter_wrapper">
                <div class="row">
                    <?php
                        if ( have_posts() ) :
                            /* Start the Loop */
                            
                            while ( have_posts() ) :
                                the_post();?>
                                
                            <?php endwhile;
                        else :
                            $s = esc_html__('No found post!','tomochain-addon');
                            echo sprintf('<h4>%s</h4>',$s);
                        endif;
                    ?>
                </div>
            </div><!-- /enter_wrapper -->
        </div>
    </main>
</div>
<?php
get_template_part('footer'); ?>