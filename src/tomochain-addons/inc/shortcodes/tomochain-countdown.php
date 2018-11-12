<?php
/**
 * Countdown Shortcode
 */
class WPBakeryShortCode_TomoChain_Countdown extends WPBakeryShortCode {
    public function get_string_translation( $singular = true ) {
        $atts = vc_map_get_attributes( $this->getShortcode(), $this->getAtts() );

        $str_second_singular = isset( $atts['str_second_singular'] ) ? $atts['str_second_singular'] : '';
        $str_second_plural   = isset( $atts['str_second_plural'] ) ? $atts['str_second_plural'] : '';
        $str_minute_singular = isset( $atts['str_minute_singular'] ) ? $atts['str_minute_singular'] : '';
        $str_minute_plural   = isset( $atts['str_minute_plural'] ) ? $atts['str_minute_plural'] : '';
        $str_hour_singular   = isset( $atts['str_hour_singular'] ) ? $atts['str_hour_singular'] : '';
        $str_hour_plural     = isset( $atts['str_hour_plural'] ) ? $atts['str_hour_plural'] : '';
        $str_day_singular    = isset( $atts['str_day_singular'] ) ? $atts['str_day_singular'] : '';
        $str_day_plural      = isset( $atts['str_day_plural'] ) ? $atts['str_day_plural'] : '';
        $str_week_singular   = isset( $atts['str_week_singular'] ) ? $atts['str_week_singular'] : '';
        $str_week_plural     = isset( $atts['str_week_plural'] ) ? $atts['str_week_plural'] : '';
        $str_month_singular  = isset( $atts['str_month_singular'] ) ? $atts['str_month_singular'] : '';
        $str_month_plural    = isset( $atts['str_month_plural'] ) ? $atts['str_month_plural'] : '';
        $str_year_singular   = isset( $atts['str_year_singular'] ) ? $atts['str_year_singular'] : '';
        $str_year_plural     = isset( $atts['str_year_plural'] ) ? $atts['str_year_plural'] : '';

        $str = '';

        if ( $singular ) {
            $str .= $str_year_singular . ',' . $str_month_singular . ',' . $str_week_singular . ',' . $str_day_singular . ',' . $str_hour_singular . ',' . $str_minute_singular . ',' . $str_second_singular;
        } else {
            $str .= $str_year_plural . ',' . $str_month_plural . ',' . $str_week_plural . ',' . $str_day_plural . ',' . $str_hour_plural . ',' . $str_minute_plural . ',' . $str_second_plural;
        }

        return $str;
    }

    public function get_countdown_format() {
        $atts = vc_map_get_attributes( $this->getShortcode(), $this->getAtts() );

        $count_frmt = 'DHMS';

        if ( isset( $atts['countdown_opts'] ) && ! empty( $atts['countdown_opts'] ) ) {
            $countdown_opt = explode( ',', $atts['countdown_opts'] );

            if ( is_array( $countdown_opt ) ) {
                $count_frmt = '';

                foreach ( $countdown_opt as $opt ) {
                    if ( $opt == 'syear' ) {
                        $count_frmt .= 'Y';
                    }
                    if ( $opt == 'smonth' ) {
                        $count_frmt .= 'O';
                    }
                    if ( $opt == 'sweek' ) {
                        $count_frmt .= 'W';
                    }
                    if ( $opt == 'sday' ) {
                        $count_frmt .= 'D';
                    }
                    if ( $opt == 'shr' ) {
                        $count_frmt .= 'H';
                    }
                    if ( $opt == 'smin' ) {
                        $count_frmt .= 'M';
                    }
                    if ( $opt == 'ssec' ) {
                        $count_frmt .= 'S';
                    }
                }
            }
        }

        return $count_frmt;
    }
}
vc_map( array(
    'name'        => esc_html__( 'Countdown', 'tomochain-addons' ),
    'base'        => 'tomochain_countdown',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'datetimepicker',
            'heading'     => esc_html__( 'Target time for Countdown', 'tomochain-addons' ),
            'param_name'  => 'datetime',
            'admin_label' => true,
        ),
        array(
            'type'       => 'checkbox',
            'heading'    => esc_html__( 'Select time units to display in countdown timer', 'tomochain-addons' ),
            'param_name' => 'countdown_opts',
            'value'      => array(
                esc_html__( 'Years', 'tomochain-addons' )   => 'syear',
                esc_html__( 'Months', 'tomochain-addons' )  => 'smonth',
                esc_html__( 'Weeks', 'tomochain-addons' )   => 'sweek',
                esc_html__( 'Days', 'tomochain-addons' )    => 'sday',
                esc_html__( 'Hours', 'tomochain-addons' )   => 'shr',
                esc_html__( 'Minutes', 'tomochain-addons' ) => 'smin',
                esc_html__( 'Seconds', 'tomochain-addons' ) => 'ssec',
            ),
        ),
        // String translation.
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Second (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_second_singular',
            'value'      => esc_html__( 'Second', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Seconds (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_second_plural',
            'value'      => esc_html__( 'Seconds', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Minute (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_minute_singular',
            'value'      => esc_html__( 'Minute', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Minutes (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_minute_plural',
            'value'      => esc_html__( 'Minutes', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Hour (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_hour_singular',
            'value'      => esc_html__( 'Hour', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Hours (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_hour_plural',
            'value'      => esc_html__( 'Hours', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Day (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_day_singular',
            'value'      => esc_html__( 'Day', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Days (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_day_plural',
            'value'      => esc_html__( 'Days', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Week (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_week_singular',
            'value'      => esc_html__( 'Week', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Weeks (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_week_plural',
            'value'      => esc_html__( 'Weeks', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Month (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_month_singular',
            'value'      => esc_html__( 'Month', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Months (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_month_plural',
            'value'      => esc_html__( 'Months', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Year (Singular)', 'tomochain-addons' ),
            'param_name' => 'str_year_singular',
            'value'      => esc_html__( 'Year', 'tomochain-addons' ),
        ),
        array(
            'group'      => esc_html__( 'String Translation', 'tomochain-addons' ),
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Years (Plural)', 'tomochain-addons' ),
            'param_name' => 'str_year_plural',
            'value'      => esc_html__( 'Years', 'tomochain-addons' ),
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
