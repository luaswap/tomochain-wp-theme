<?php ?>
<div class="dapp-list">
    <div class="tomochain-dapp-main">
        <?php if( have_posts() ):
            while( have_posts() ): the_post();
                $custom_url = get_field('dapp_custom_url');
                $contract_address_url = get_field('contract_address_url');
                $open_new_tab = get_field('dapp_open_in_new_tab') ? '__blank' : '';
                ?>
                <div class="tomochain-dapp-item">
                    <div class="dapp-thumbnail">
                        <?php
                        if(has_post_thumbnail()) {
                            the_post_thumbnail('tomo-post-thumbnail');
                        }else{ 
                            $img_url = get_template_directory_uri() . '/assets/images/image-shortcode.jpg';
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
                                    <?php echo esc_html__('More Info','tomochain-addons')?>
                                </a>
                            <?php endif;?>
                            <?php if($contract_address_url):?>
                                <a href="<?php echo esc_url($contract_address_url)?>" target="<?php echo esc_attr($open_new_tab); ?>">
                                    <?php echo esc_html__('Contract Address','tomochain-addons')?>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;?>
        <?php tomochain_dapp_pagination(); ?>
    </div>
</div>