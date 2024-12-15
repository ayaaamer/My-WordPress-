<?php
/**
* Customizer Custom Classes.
* @package Storefront Eshop
*/

if ( ! function_exists( 'storefront_eshop_sanitize_number_range' ) ) :
    function storefront_eshop_sanitize_number_range( $storefront_eshop_input, $storefront_eshop_setting ) {
        $storefront_eshop_input = absint( $storefront_eshop_input );
        $storefront_eshop_atts = $storefront_eshop_setting->manager->get_control( $storefront_eshop_setting->id )->input_attrs;
        $storefront_eshop_min = ( isset( $storefront_eshop_atts['min'] ) ? $storefront_eshop_atts['min'] : $storefront_eshop_input );
        $storefront_eshop_max = ( isset( $storefront_eshop_atts['max'] ) ? $storefront_eshop_atts['max'] : $storefront_eshop_input );
        $storefront_eshop_step = ( isset( $storefront_eshop_atts['step'] ) ? $storefront_eshop_atts['step'] : 1 );
        return ( $storefront_eshop_min <= $storefront_eshop_input && $storefront_eshop_input <= $storefront_eshop_max && is_int( $storefront_eshop_input / $storefront_eshop_step ) ? $storefront_eshop_input : $storefront_eshop_setting->default );
    }
endif;

/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Storefront_Eshop_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

            <# if ( data.notice ) { #>
                <h3 class="accordion-section-notice">
                    {{ data.title }}
                </h3>
            <# } #>

            <# if ( !data.notice ) { #>
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            <# } #>
            
        </li>
    <?php }
}