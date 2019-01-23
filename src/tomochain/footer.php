<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>

    </div><!-- #content -->
    <?php if (!is_404()): ?>
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo-footer">
                        <?php the_custom_logo(); ?>
                        <h2 class="tomochain-name"><?php echo esc_html__('TomoChain','tomochain');?></h2>
                    </div>
                    <div class="sidebar-footer">
                        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                    </div>

                    <div class="site-info">
                        <?php
                        printf( esc_html__( 'Copyright &copy; %1$s by %2$s.', 'tomochain' ), date('Y'), 'TomoChain Pte. Ltd' );
                        ?>
                    </div><!-- .site-info -->
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="popup_btn tomo_btn_tmp_grad">
    <a href="https://t.me/tomochain" title="" target="_blank">Join our Telegram <i class="fab fa-telegram-plane"></i></a>
    <span class="close" title="Hide This Message">×</span>
</div>

<script type="text/JavaScript">
    $(document).ready(function() {
      // COOKIES
      // if the cookie is true, hide the initial message and show the other one
      if ($.cookie('hide-after-click') == 'yes') {
        $('.popup_btn').addClass('hide-second');
      }

      // when clicked on “X” icon do something
      $('.close').click(function() {
        // check that “X” icon was not cliked before (hidden)
        if (!$('.popup_btn').is('hide-second')) {
          $('.popup_btn').addClass('hide-second');

          // add cookie setting that user has clicked
          $.cookie('hide-after-click', 'yes', {expires: 1 });
        }
        return false;
      })

    });
</script>
</body>
</html>
