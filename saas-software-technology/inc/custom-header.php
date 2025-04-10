<?php
/**
 * @package SAAS Software Technology
 * @subpackage saas-software-technology
 * @since saas-software-technology 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses saas_software_technology_header_style()
*/

function saas_software_technology_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'saas_software_technology_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 70,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'saas_software_technology_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'saas_software_technology_custom_header_setup' );

if ( ! function_exists( 'saas_software_technology_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see saas_software_technology_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'saas_software_technology_header_style' );
function saas_software_technology_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$saas_software_technology_custom_css = "
        #header, .page-template-custom-frontpage .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		.header-box, .page-template-custom-frontpage #header{
			background: transparent;
		}
		";
	   	wp_add_inline_style( 'saas-software-technology-basic-style', $saas_software_technology_custom_css );
	endif;
}
endif; // saas_software_technology_header_style
