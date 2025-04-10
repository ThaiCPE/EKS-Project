<?php
/**
 * SAAS Software Technology: Block Patterns
 *
 * @package SAAS Software Technology
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'saas-software-technology',
		array( 'label' => __( 'SAAS Software Technology', 'saas-software-technology' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'saas-software-technology/banner-section',
		array(
			'title'      => __( 'Banner Section', 'saas-software-technology' ),
			'categories' => array( 'saas-software-technology' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/slider-image.png\",\"id\":245,\"dimRatio\":0,\"isDark\":false,\"align\":\"full\",\"className\":\"saas-software-technology-banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light saas-software-technology-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-245\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/slider-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"saas-software-technology-banner-section-column px-5 mx-5 py-5\"} -->\n<div class=\"wp-block-columns saas-software-technology-banner-section-column px-5 mx-5 py-5\"><!-- wp:column {\"width\":\"60%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:60%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"40px\"}},\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" style=\"font-size:40px\">The Best Sofware As Per Your Needs!</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\">Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-outline\",\"fontSize\":\"small\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-outline has-small-font-size\"><a class=\"wp-block-button__link wp-element-button\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'saas-software-technology/venus-section',
		array(
			'title'      => __( 'About Section', 'saas-software-technology' ),
			'categories' => array( 'saas-software-technology' ),
			'content'    => "<!-- wp:group {\"className\":\"saas-software-technology-about-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group saas-software-technology-about-section\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#070707\"}}} -->\n<h2 class=\"has-text-color\" style=\"color:#070707\">About Us</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>We're Leading Software Developers &amp; publisher!</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"aboutus-icon-column\"} -->\n<div class=\"wp-block-columns aboutus-icon-column\"><!-- wp:column {\"className\":\"aboutus-icon-section\"} -->\n<div class=\"wp-block-column aboutus-icon-section\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"20%\",\"className\":\"number-column1\"} -->\n<div class=\"wp-block-column number-column1\" style=\"flex-basis:20%\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:22px\">1</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>Latest Technology</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"aboutus-icon-section\"} -->\n<div class=\"wp-block-column aboutus-icon-section\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"20%\",\"className\":\"number-column2\"} -->\n<div class=\"wp-block-column number-column2\" style=\"flex-basis:20%\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"22px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:22px\">2</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>Marketing Managment</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:image {\"id\":308,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/about-us-image.png\" alt=\"\" class=\"wp-image-308\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}