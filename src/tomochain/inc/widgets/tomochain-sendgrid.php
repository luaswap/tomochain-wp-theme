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
        const ERROR_EMAIL_SENT              = 'email_error_sent';

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

            add_action('wp_ajax_tomochain_process_subscription', array($this, 'process_subscription'));
            add_action('wp_ajax_nopriv_tomochain_process_subscription', array($this, 'process_subscription'));
        }

        function widget( $args, $instance ) {
            $text             = isset( $instance['text'] ) ? $instance['text'] : '';
            $error_text       = isset( $instance['error_text'] ) ? $instance['error_text'] : '';
            $error_email_text = isset( $instance['error_email_text'] ) ? $instance['error_email_text'] : '';
            $success_text     = isset( $instance['success_text'] ) ? $instance['success_text'] : '';

            echo '' . $args['before_widget'];
            echo '<p class="tomo-sendgrid-text"></p>';
            echo '<form method="post" id="tomo-sendgrid-form" class="tomo-sendgrid-form">';
            echo '  <input id="tomo-sendgrid-email" name="tomo-sendgrid-email" type="email" value="" required placeholder="' . $text . '" />';
            echo '  <button type="submit" id="tomo-sendgrid-button" class="tomo-sendgrid-button">' . esc_html__('Subscribe', 'tomochain') . '</button>';
            echo '</form>';
            echo '' . $args['after_widget'];
        }

        function process_subscription() {
            $result = array(
                'code'    => '',
                'message' => ''
            );
            $email_split = explode( "@", htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') );

            if ( isset( $email_split[1] ) ) {
                $email_domain = $email_split[1];

                try {
                  $Punycode = new Punycode();
                  $email_domain = $Punycode->decode( $email_split[1] );
                }
                catch ( Exception $e ) {
                }

                $email = $email_split[0] . '@' . $email_domain;
            } else {
                    $email = htmlspecialchars( $_POST['email'], ENT_QUOTES, 'UTF-8 ');
            }

            // Bad call
            if ( ! isset( $email ) or ! Sendgrid_Tools::is_valid_email( $email ) ) {
                $result['code']    = self::INVALID_EMAIL_ERROR;
                $result['message'] = esc_html__('Invalid Email.', 'tomochain');
            }

            // Check mail was sent or not
            $token = hash( "sha1", $email );
            $transient = Sendgrid_Tools::get_transient_sendgrid( $token );

            if ( $transient and isset( $transient['email'] ) ) {
                $result['code']    = self::ERROR_EMAIL_SENT;
                $result['message'] = esc_html__('Confirmation email has been sent, please check your inbox.', 'tomochain');
            } else {
                $rs = Sendgrid_OptIn_API_Endpoint::send_confirmation_email( $email );
                if ($rs) {
                    $result['code']    = self::SUCCESS_EMAIL_SEND;
                    $result['message'] = esc_html__('Confirmation email has been sent succesfully, please check your inbox.', 'tomochain');
                } else {
                    $result['code']    = self::ERROR_EMAIL_SEND;
                    $result['message'] = esc_html__('Confirmation email has been sent, please check your inbox.', 'tomochain');
                }
            }

            wp_send_json($result);
        }
    }
}
