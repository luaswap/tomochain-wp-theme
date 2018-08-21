<?php
/**
 * TomoChain Sendgrid_Widget
 */

require_once WP_PLUGIN_DIR . '/sendgrid-email-delivery-simplified/lib/class-sendgrid-tools.php';
require_once WP_PLUGIN_DIR . '/sendgrid-email-delivery-simplified/lib/class-sendgrid-nlvx.php';
require_once WP_PLUGIN_DIR . '/sendgrid-email-delivery-simplified/vendor/punycode/Punycode.php';
use SendGridTrueBV\Punycode;
if ( ! class_exists( 'TomoChain_Sendgrid_Widget' ) ) {

    add_action( 'widgets_init', 'load_tomochain_sendgrid_widget' );

    function load_tomochain_sendgrid_widget() {
        register_widget( 'TomoChain_Sendgrid_Widget', 1 );
    }

    class TomoChain_Sendgrid_Widget extends WPH_Widget {
        const INVALID_EMAIL_ERROR           = 'email_invalid';
        const SUCCESS_EMAIL_SEND            = 'email_sent';
        const ERROR_EMAIL_SEND              = 'email_error_send';

        function __construct() {
            $args = array(
                'slug'  => 'tomo_sendgrid',
                'label' => '📮 &nbsp;' . esc_html__( 'TOMOCHAIN Sendgrid', 'tomochain' ),
                'description' => esc_html__( 'SendGrid Marketing Campaigns Subscription Widget.', 'tomochain' )
            );

            $args['fields'] = array(
                array(
                    'name'   => esc_html__( 'Message to display before subscription form:', 'tomochain' ),
                    'id'     => 'text',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Message to display for errors:', 'tomochain' ),
                    'id'     => 'error_text',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Message to display for invalid email address:', 'tomochain' ),
                    'id'     => 'error_email_text',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                ),
                array(
                    'name'   => esc_html__( 'Message to display for success:', 'tomochain' ),
                    'id'     => 'success_text',
                    'type'   => 'text',
                    'class'  => 'widefat',
                    'std'    => '',
                    'filter' => 'strip_tags|esc_attr'
                )
            );

            // create widget
            $this->create_widget( $args );
        }

        function widget( $args, $instance ) {
            $text             = isset( $instance['text'] ) ? $instance['text'] : '';
            $error_text       = isset( $instance['error_text'] ) ? $instance['error_text'] : '';
            $error_email_text = isset( $instance['error_email_text'] ) ? $instance['error_email_text'] : '';
            $success_text     = isset( $instance['success_text'] ) ? $instance['success_text'] : '';

            echo '' . $args['before_widget'];
            echo '<form method="post" id="sendgrid_mc_email_form" class="mc_email_form" action="#sendgrid_mc_email_subscribe">';
            echo '  <input class="sendgrid_mc_input sendgrid_mc_input_email" id="sendgrid_mc_email" name="sendgrid_mc_email" type="text" value="" required placeholder="' . $text . '" />';
            echo '  <button class="sendgrid_mc_button" type="submit" id="sendgrid_mc_email_submit">' . esc_html__('Subscribe', 'tomochain') . '</button>';
            echo '</form>';
            echo '' . $args['after_widget'];
        }
    }
}
