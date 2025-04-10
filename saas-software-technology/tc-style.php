<?php 
	$saas_software_technology_first_theme_color = get_theme_mod('saas_software_technology_first_theme_color');
	$saas_software_technology_second_theme_color = get_theme_mod('saas_software_technology_second_theme_color');
	$saas_software_technology_custom_css ='';

	/*------------------ Theme Color Option -----------*/

	if ($saas_software_technology_first_theme_color) {
		$saas_software_technology_custom_css .= ':root {';
		$saas_software_technology_custom_css .= '--primary-color: ' . esc_attr($saas_software_technology_first_theme_color) . ' !important;';
		$saas_software_technology_custom_css .= '} ';
	}

	if ($saas_software_technology_second_theme_color) {
		$saas_software_technology_custom_css .= ':root {';
		$saas_software_technology_custom_css .= '--secondary-color: ' . esc_attr($saas_software_technology_second_theme_color) . ' !important;';
		$saas_software_technology_custom_css .= '} ';
	}

	/*----------------Width Layout -------------------*/
	$saas_software_technology_theme_lay = get_theme_mod( 'saas_software_technology_width_options','Full Layout');
    if($saas_software_technology_theme_lay == 'Full Layout'){
		$saas_software_technology_custom_css .='body{';
			$saas_software_technology_custom_css .='max-width: 100%;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == 'Contained Layout'){
		$saas_software_technology_custom_css .='body{';
			$saas_software_technology_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == 'Boxed Layout'){
		$saas_software_technology_custom_css .='body{';
			$saas_software_technology_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$saas_software_technology_custom_css .='}';
	}

	/*------ Button Style -------*/
	$saas_software_technology_top_buttom_padding = get_theme_mod('saas_software_technology_top_button_padding');
	$saas_software_technology_left_right_padding = get_theme_mod('saas_software_technology_left_button_padding');
	if($saas_software_technology_top_buttom_padding != false || $saas_software_technology_left_right_padding != false ){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$saas_software_technology_custom_css .='padding-top: '.esc_attr($saas_software_technology_top_buttom_padding).'px; padding-bottom: '.esc_attr($saas_software_technology_top_buttom_padding).'px; padding-left: '.esc_attr($saas_software_technology_left_right_padding).'px; padding-right: '.esc_attr($saas_software_technology_left_right_padding).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_button_border_radius = get_theme_mod('saas_software_technology_button_border_radius');
	$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_button_border_radius).'px;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_btn_font_weight = get_theme_mod('saas_software_technology_btn_font_weight');{
	$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
	$saas_software_technology_custom_css .='font-weight: '.esc_attr($saas_software_technology_btn_font_weight).';';
	$saas_software_technology_custom_css .='}';
	}   
	
	$saas_software_technology_button_letter_spacing = get_theme_mod('saas_software_technology_button_letter_spacing');
	$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$saas_software_technology_custom_css .='letter-spacing: '.esc_attr($saas_software_technology_button_letter_spacing).'px;';
	$saas_software_technology_custom_css .='}';	
	
	//Button Shape
	$saas_software_technology_btn_shape = get_theme_mod('saas_software_technology_btn_shape', 'Round');
	if($saas_software_technology_btn_shape == 'Square' ){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #slider .read-btn a.blogbutton-small, #slider .inner_carousel a.getin-btn, #comments input[type="submit"].submit,.blogbutton-small, .hvr-sweep-to-right:before{';
			$saas_software_technology_custom_css .=' border-radius: 0';
		$saas_software_technology_custom_css .='}';
	}elseif($saas_software_technology_btn_shape == 'Round' ){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #slider .read-btn a.blogbutton-small, #slider .inner_carousel a.getin-btn, #comments input[type="submit"].submit,.blogbutton-small, .hvr-sweep-to-right:before{';
			$saas_software_technology_custom_css .=' border-radius: .3em';
		$saas_software_technology_custom_css .='}';
	}elseif($saas_software_technology_btn_shape == 'Pill' ){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small, #slider .read-btn a.blogbutton-small, #slider .inner_carousel a.getin-btn, #comments input[type="submit"].submit,.blogbutton-small, .hvr-sweep-to-right:before{';
			$saas_software_technology_custom_css .=' border-radius: 2em;';
		$saas_software_technology_custom_css .='}';
	}

	//Button hover effect
	$saas_software_technology_button_hover_effect = get_theme_mod('saas_software_technology_button_hover_effect', 'disable');
	if ($saas_software_technology_button_hover_effect !== 'disable') {
		$saas_software_technology_custom_css .= '.read-btn a.blogbutton-small:hover {';
		switch ($saas_software_technology_button_hover_effect) {
			case 'pulse':
				$saas_software_technology_custom_css .= 'animation: pulse 0.5s ease-in-out;';
				break;
			case 'rubberBand':
				$saas_software_technology_custom_css .= 'animation: rubberBand 0.5s ease-in-out;';
				break;
			case 'swing':
				$saas_software_technology_custom_css .= 'animation: swing 0.5s ease-in-out;';
				break;
			case 'tada':
				$saas_software_technology_custom_css .= 'animation: tada 0.5s ease-in-out;';
				break;
			case 'jello':
				$saas_software_technology_custom_css .= 'animation: jello 0.5s ease-in-out;';
				break;
		}
		$saas_software_technology_custom_css .= '}';
	}

	//keyframes for all animations
	$saas_software_technology_custom_css .= '
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.1); }
		100% { transform: scale(1); }
	}

	@keyframes rubberBand {
		0% { transform: scale(1); }
		30% { transform: scaleX(1.25) scaleY(0.75); }
		40% { transform: scaleX(0.75) scaleY(1.25); }
		50% { transform: scale(1); }
	}

	@keyframes swing {
		20% { transform: rotate(15deg); }
		40% { transform: rotate(-10deg); }
		60% { transform: rotate(5deg); }
		80% { transform: rotate(-5deg); }
		100% { transform: rotate(0deg); }
	}

	@keyframes tada {
		0% { transform: scale(1); }
		10%, 20% { transform: scale(0.9) rotate(-3deg); }
		30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
		40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
		100% { transform: scale(1) rotate(0); }
	}

	@keyframes jello {
		0%, 11.1%, 100% { transform: none; }
		22.2% { transform: skewX(-12.5deg) skewY(-12.5deg); }
		33.3% { transform: skewX(6.25deg) skewY(6.25deg); }
		44.4% { transform: skewX(-3.125deg) skewY(-3.125deg); }
		55.5% { transform: skewX(1.5625deg) skewY(1.5625deg); }
		66.6% { transform: skewX(-0.78125deg) skewY(-0.78125deg); }
		77.7% { transform: skewX(0.390625deg) skewY(0.390625deg); }
		88.8% { transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
	}';

	/*-------------- Woocommerce Button  -------------------*/

	$saas_software_technology_woocommerce_button_padding_top = get_theme_mod('saas_software_technology_woocommerce_button_padding_top');
	if($saas_software_technology_woocommerce_button_padding_top != false){
		$saas_software_technology_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$saas_software_technology_custom_css .='padding-top: '.esc_attr($saas_software_technology_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($saas_software_technology_woocommerce_button_padding_top).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_woocommerce_button_padding_right = get_theme_mod('saas_software_technology_woocommerce_button_padding_right');
	if($saas_software_technology_woocommerce_button_padding_right != false){
		$saas_software_technology_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$saas_software_technology_custom_css .='padding-left: '.esc_attr($saas_software_technology_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($saas_software_technology_woocommerce_button_padding_right).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_woocommerce_button_border_radius = get_theme_mod('saas_software_technology_woocommerce_button_border_radius');
	if($saas_software_technology_woocommerce_button_border_radius != false){
		$saas_software_technology_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_woocommerce_button_border_radius).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_related_product = get_theme_mod('saas_software_technology_related_product',true);

	if($saas_software_technology_related_product == false){
		$saas_software_technology_custom_css .='.related.products{';
			$saas_software_technology_custom_css .='display: none;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_woocommerce_product_border = get_theme_mod('saas_software_technology_woocommerce_product_border',false);

	if($saas_software_technology_woocommerce_product_border == true){
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$saas_software_technology_custom_css .='border: 1px solid #ddd;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_woocommerce_product_padding_top = get_theme_mod('saas_software_technology_woocommerce_product_padding_top',0);
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$saas_software_technology_custom_css .='padding-top: '.esc_attr($saas_software_technology_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($saas_software_technology_woocommerce_product_padding_top).'px;';
		$saas_software_technology_custom_css .='}';

	$saas_software_technology_woocommerce_product_padding_right = get_theme_mod('saas_software_technology_woocommerce_product_padding_right',0);
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$saas_software_technology_custom_css .='padding-left: '.esc_attr($saas_software_technology_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($saas_software_technology_woocommerce_product_padding_right).'px;';
		$saas_software_technology_custom_css .='}';

	$saas_software_technology_woocommerce_product_border_radius = get_theme_mod('saas_software_technology_woocommerce_product_border_radius');
	if($saas_software_technology_woocommerce_product_border_radius != false){
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_woocommerce_product_border_radius).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_woocommerce_product_box_shadow = get_theme_mod('saas_software_technology_woocommerce_product_box_shadow');
	if($saas_software_technology_woocommerce_product_box_shadow != false){
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$saas_software_technology_custom_css .='box-shadow: '.esc_attr($saas_software_technology_woocommerce_product_box_shadow).'px '.esc_attr($saas_software_technology_woocommerce_product_box_shadow).'px '.esc_attr($saas_software_technology_woocommerce_product_box_shadow).'px #aaa;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_product_sale_font_size = get_theme_mod('saas_software_technology_product_sale_font_size');
	$saas_software_technology_custom_css .='.woocommerce span.onsale {';
		$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_product_sale_font_size).'px;';
	$saas_software_technology_custom_css .='}';

	/*---- Preloader Color ----*/
	$saas_software_technology_preloader_color = get_theme_mod('saas_software_technology_preloader_color');
	$saas_software_technology_preloader_bg_color = get_theme_mod('saas_software_technology_preloader_bg_color');
	$saas_software_technology_preloader_background_img = get_theme_mod('saas_software_technology_preloader_background_img');

	if($saas_software_technology_preloader_color != false){
		$saas_software_technology_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_preloader_color).';';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_preloader_bg_color != false){
		$saas_software_technology_custom_css .='.preloader{';
			$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_preloader_bg_color).';';
		$saas_software_technology_custom_css .='}';
	}
	if ( $saas_software_technology_preloader_background_img != false ) {
		$saas_software_technology_custom_css .= '.preloader{';
		$saas_software_technology_custom_css .= 'background: url(' . esc_url( $saas_software_technology_preloader_background_img ) . ');';
		$saas_software_technology_custom_css .= '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$saas_software_technology_custom_css .= '}';
	}

	$saas_software_technology_resp_sidebar = get_theme_mod( 'saas_software_technology_sidebar_hide_show',true);
    if($saas_software_technology_resp_sidebar == true){
    	$saas_software_technology_custom_css .='@media screen and (max-width:575px) {';
		$saas_software_technology_custom_css .='#sidebar{';
			$saas_software_technology_custom_css .='display:block;';
		$saas_software_technology_custom_css .='} }';
	}else if($saas_software_technology_resp_sidebar == false){
		$saas_software_technology_custom_css .='@media screen and (max-width:575px) {';
		$saas_software_technology_custom_css .='#sidebar{';
			$saas_software_technology_custom_css .='display:none;';
		$saas_software_technology_custom_css .='} }';
	}

	$saas_software_technology_menu_toggle_btn_bg_color = get_theme_mod('saas_software_technology_menu_toggle_btn_bg_color');
	if($saas_software_technology_menu_toggle_btn_bg_color != false){
		$saas_software_technology_custom_css .='.toggle-menu i {';
			$saas_software_technology_custom_css .='background: '.esc_attr($saas_software_technology_menu_toggle_btn_bg_color).'';
		$saas_software_technology_custom_css .='}';
	}		

	/*---- Copyright css ----*/
	$saas_software_technology_copyright_fontsize = get_theme_mod('saas_software_technology_copyright_fontsize',16);
	if($saas_software_technology_copyright_fontsize != false){
		$saas_software_technology_custom_css .='#footer p{';
			$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_copyright_fontsize).'px; ';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_copyright_color = get_theme_mod('saas_software_technology_copyright_color');
	$saas_software_technology_custom_css .='#footer p,#footer p a{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_copyright_color).'!important;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_copyright__hover_color = get_theme_mod('saas_software_technology_copyright__hover_color');
	$saas_software_technology_custom_css .='#footer p:hover,#footer p a:hover{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_copyright__hover_color).'!important;';
	$saas_software_technology_custom_css .='}';

	/*-------- Copyright background css -------*/
	$saas_software_technology_copyright_background_color = get_theme_mod('saas_software_technology_copyright_background_color');
	$saas_software_technology_custom_css .='#footer{';
		$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_copyright_background_color).';';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_copyright_top_bottom_padding = get_theme_mod('saas_software_technology_copyright_top_bottom_padding',15);
	if($saas_software_technology_copyright_top_bottom_padding != false){
		$saas_software_technology_custom_css .='#footer {';
			$saas_software_technology_custom_css .='padding-top:'.esc_attr($saas_software_technology_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($saas_software_technology_copyright_top_bottom_padding).'px; ';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_copyright_alignment = get_theme_mod( 'saas_software_technology_copyright_alignment','Center');
    if($saas_software_technology_copyright_alignment == 'Left'){
		$saas_software_technology_custom_css .='#footer p{';
			$saas_software_technology_custom_css .='text-align:start;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_copyright_alignment == 'Center'){
		$saas_software_technology_custom_css .='#footer p{';
			$saas_software_technology_custom_css .='text-align:center;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_copyright_alignment == 'Right'){
		$saas_software_technology_custom_css .='#footer p{';
			$saas_software_technology_custom_css .='text-align:end;';
		$saas_software_technology_custom_css .='}';
	}
	//Footer Social Icon Font size
	$saas_software_technology_footer_icon_font_size = get_theme_mod('saas_software_technology_footer_icon_font_size');
	$saas_software_technology_custom_css .='#footer .socialicons i{';
	$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_footer_icon_font_size).'px;';
	$saas_software_technology_custom_css .='}';

	//Footer Social Icon Alignment
	$saas_software_technology_footer_icon_alignment = get_theme_mod( 'saas_software_technology_footer_icon_alignment','Center');
    if($saas_software_technology_footer_icon_alignment == 'Left'){
		$saas_software_technology_custom_css .='#footer .socialicons{';
			$saas_software_technology_custom_css .='text-align:start;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_icon_alignment == 'Center'){
		$saas_software_technology_custom_css .='#footer .socialicons{';
			$saas_software_technology_custom_css .='text-align:center;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_icon_alignment == 'Right'){
		$saas_software_technology_custom_css .='#footer .socialicons{';
			$saas_software_technology_custom_css .='text-align:end;';
		$saas_software_technology_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$saas_software_technology_woocommerce_sale_top_padding = get_theme_mod('saas_software_technology_woocommerce_sale_top_padding',0);
	$saas_software_technology_woocommerce_sale_left_padding = get_theme_mod('saas_software_technology_woocommerce_sale_left_padding',0);
	$saas_software_technology_custom_css .=' .woocommerce span.onsale{';
		$saas_software_technology_custom_css .='padding-top: '.esc_attr($saas_software_technology_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($saas_software_technology_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($saas_software_technology_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($saas_software_technology_woocommerce_sale_left_padding).'px;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_woocommerce_sale_border_radius = get_theme_mod('saas_software_technology_woocommerce_sale_border_radius', 5);
	$saas_software_technology_custom_css .='.woocommerce span.onsale{';
		$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_woocommerce_sale_border_radius).'px;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_sale_position = get_theme_mod( 'saas_software_technology_sale_position','left');
    if($saas_software_technology_sale_position == 'left'){
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$saas_software_technology_custom_css .='left: 0; right: auto;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_sale_position == 'right'){
		$saas_software_technology_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$saas_software_technology_custom_css .='left: auto; right: 0;';
		$saas_software_technology_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$saas_software_technology_footer_background_color = get_theme_mod('saas_software_technology_footer_background_color');
	$saas_software_technology_custom_css .='.footertown{';
		$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_footer_background_color).';';
	$saas_software_technology_custom_css .='}';

	/*---------------------------Footer Style -------------------*/

	$saas_software_technology_theme_lay = get_theme_mod( 'saas_software_technology_footer_template','saas_software_technology-footer-one');
	if($saas_software_technology_theme_lay == 'saas_software_technology-footer-one'){
		$saas_software_technology_custom_css .='.footertown{';
			$saas_software_technology_custom_css .='';
		$saas_software_technology_custom_css .='}';

	}else if($saas_software_technology_theme_lay == 'saas_software_technology-footer-two'){
		$saas_software_technology_custom_css .='.footertown {';
			$saas_software_technology_custom_css .='background-color: #F2E6D9 !important;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown p,.footertown span,.footertown li a,.footertown #wp-calendar caption,.footertown #wp-calendar td,.footertown #wp-calendar th, .footertown, .footertown h3, .footertown a.rsswidget, .footertown #wp-calendar a, .copyright a, .footertown .custom_details, .footertown ins span, .footertown .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, .footertown ul li a, .footertown table, .footertown th, .footertown td, .footertown caption, #sidebar caption,.footertown nav.wp-calendar-nav a,.footertown .search-form .search-field, .footertown .widget ul li, .footertown .rssSummary, .footertown cite, .footertown strong {';
			$saas_software_technology_custom_css .='color:#000 !important;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown p{';
			$saas_software_technology_custom_css .='color:#000 !important;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown ul li::before{';
			$saas_software_technology_custom_css .='background-color:#000;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown table, .footertown th, .footertown td,.footertown.search-form .search-field,.footertown .tagcloud a{';
			$saas_software_technology_custom_css .='border: 1px solid #000;';
		$saas_software_technology_custom_css .='}';

	}else if($saas_software_technology_theme_lay == 'saas_software_technology-footer-three'){
		$saas_software_technology_custom_css .='.footertown {';
			$saas_software_technology_custom_css .='background-color: #37474F !important;;';
		$saas_software_technology_custom_css .='}';
	}
	else if($saas_software_technology_theme_lay == 'saas_software_technology-footer-four'){
		$saas_software_technology_custom_css .='.footertown {';
			$saas_software_technology_custom_css .='background-color: #102A43 !important;;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown p,.footertown span,.footertown li a,.footertown #wp-calendar caption,.footertown #wp-calendar td,.footertown #wp-calendar th, .footertown, .footertown h3, .footertown a.rsswidget, .footertown #wp-calendar a, .copyright a, .footertown .custom_details, .footertown ins span, .footertown .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, .footertown ul li a, .footertown table, .footertown th, .footertown td, .footertown caption, #sidebar caption,.footertown nav.wp-calendar-nav a,.footertown .search-form .search-field, , .footertown .widget ul li, .footertown .rssSummary, .footertown cite, .footertown strong{';
			$saas_software_technology_custom_css .='color:#000 !important;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown p{';
			$saas_software_technology_custom_css .='color:#fff !important;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown ul li::before{';
			$saas_software_technology_custom_css .='background-color:#000;';
		$saas_software_technology_custom_css .='}';
		$saas_software_technology_custom_css .='.footertown table, .footertown th, .footertown td,.footertown.search-form .search-field,.footertown .tagcloud a{';
			$saas_software_technology_custom_css .='border: 1px solid #000;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_footer_background_img = get_theme_mod('saas_software_technology_footer_background_img');
	if($saas_software_technology_footer_background_img != false){
		$saas_software_technology_custom_css .='.footertown{';
			$saas_software_technology_custom_css .='background: url('.esc_attr($saas_software_technology_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$saas_software_technology_custom_css .='}';
	}


	$saas_software_technology_theme_lay = get_theme_mod( 'saas_software_technology_img_footer','scroll');
	if($saas_software_technology_theme_lay == 'fixed'){
		$saas_software_technology_custom_css .='.footertown{';
			$saas_software_technology_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$saas_software_technology_custom_css .='}';
	}elseif ($saas_software_technology_theme_lay == 'scroll'){
		$saas_software_technology_custom_css .='.footertown{';
			$saas_software_technology_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_scroll_text_transform = get_theme_mod( 'saas_software_technology_scroll_text_transform','Capitalize');
	if($saas_software_technology_scroll_text_transform== 'Capitalize'){
		$saas_software_technology_custom_css .='.scrollup{';
			$saas_software_technology_custom_css .='text-transform:Capitalize;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_scroll_text_transform == 'Lowercase'){
		$saas_software_technology_custom_css .='.scrollup{';
			$saas_software_technology_custom_css .='text-transform:Lowercase;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_scroll_text_transform == 'Uppercase'){
		$saas_software_technology_custom_css .='.scrollup{';
			$saas_software_technology_custom_css .='text-transform:Uppercase;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_footer_img_position = get_theme_mod('saas_software_technology_footer_img_position','center center');
	if($saas_software_technology_footer_img_position != false){
		$saas_software_technology_custom_css .='.footertown{';
			$saas_software_technology_custom_css .='background-position: '.esc_attr($saas_software_technology_footer_img_position).'!important;';
		$saas_software_technology_custom_css .='}';
	}


	/*---- Comment form ----*/
	$saas_software_technology_comment_width = get_theme_mod('saas_software_technology_comment_width', '100');
	$saas_software_technology_custom_css .='#comments textarea{';
		$saas_software_technology_custom_css .=' width:'.esc_attr($saas_software_technology_comment_width).'%;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_comment_submit_text = get_theme_mod('saas_software_technology_comment_submit_text', 'Post Comment');
	if($saas_software_technology_comment_submit_text == ''){
		$saas_software_technology_custom_css .='#comments p.form-submit {';
			$saas_software_technology_custom_css .='display: none;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_comment_title = get_theme_mod('saas_software_technology_comment_title', 'Leave a Reply');
	if($saas_software_technology_comment_title == ''){
		$saas_software_technology_custom_css .='#comments h2#reply-title {';
			$saas_software_technology_custom_css .='display: none;';
		$saas_software_technology_custom_css .='}';
	}

	// Sticky Header padding
	$saas_software_technology_sticky_header_padding = get_theme_mod('saas_software_technology_sticky_header_padding');
	$saas_software_technology_custom_css .='.fixed-header{';
		$saas_software_technology_custom_css .=' padding-top:'.esc_attr($saas_software_technology_sticky_header_padding).'px; padding-bottom:'.esc_attr($saas_software_technology_sticky_header_padding).'px;';
	$saas_software_technology_custom_css .='}';

	// Navigation Font Size 
	$saas_software_technology_nav_font_size = get_theme_mod('saas_software_technology_nav_font_size');
	if($saas_software_technology_nav_font_size != false){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_nav_font_size).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_navigation_case = get_theme_mod('saas_software_technology_navigation_case', 'capitalize');
	if($saas_software_technology_navigation_case == 'uppercase' ){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .=' text-transform: uppercase;';
		$saas_software_technology_custom_css .='}';
	}elseif($saas_software_technology_navigation_case == 'capitalize' ){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .=' text-transform: capitalize;';
		$saas_software_technology_custom_css .='}';
	}

    // site title color option
	$saas_software_technology_site_title_color_setting = get_theme_mod('saas_software_technology_site_title_color_setting');
	$saas_software_technology_custom_css .=' .logo h1 a, .logo p a{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_site_title_color_setting).';';
	$saas_software_technology_custom_css .='} ';

	$saas_software_technology_tagline_color_setting = get_theme_mod('saas_software_technology_tagline_color_setting');
	$saas_software_technology_custom_css .=' .logo p.site-description{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_tagline_color_setting).';';
	$saas_software_technology_custom_css .='} ';   

	//Site title Font size
	$saas_software_technology_site_title_fontsize = get_theme_mod('saas_software_technology_site_title_fontsize');
	$saas_software_technology_custom_css .='.logo h1, .logo p.site-title{';
		$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_site_title_fontsize).'px;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_site_description_fontsize = get_theme_mod('saas_software_technology_site_description_fontsize');
	$saas_software_technology_custom_css .='.logo p.site-description{';
		$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_site_description_fontsize).'px;';
	$saas_software_technology_custom_css .='}';

	/*----- Featured image css -----*/
	$saas_software_technology_featured_image_border_radius = get_theme_mod('saas_software_technology_featured_image_border_radius');
	if($saas_software_technology_featured_image_border_radius != false){
		$saas_software_technology_custom_css .='.inner-service .post-box img{';
			$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_featured_image_border_radius).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_featured_image_box_shadow = get_theme_mod('saas_software_technology_featured_image_box_shadow');
	if($saas_software_technology_featured_image_box_shadow != false){
		$saas_software_technology_custom_css .='.inner-service .service-image img{';
			$saas_software_technology_custom_css .='box-shadow: 8px 8px '.esc_attr($saas_software_technology_featured_image_box_shadow).'px #aaa;';
		$saas_software_technology_custom_css .='}';
	} 

	// featured image dimention
	$saas_software_technology_blog_post_featured_image_dimension = get_theme_mod('saas_software_technology_blog_post_featured_image_dimension', 'default');
	$saas_software_technology_blog_post_featured_image_custom_width = get_theme_mod('saas_software_technology_blog_post_featured_image_custom_width',250);
	$saas_software_technology_blog_post_featured_image_custom_height = get_theme_mod('saas_software_technology_blog_post_featured_image_custom_height',250);
	if($saas_software_technology_blog_post_featured_image_dimension == 'custom'){
		$saas_software_technology_custom_css .='.post .services-box .blog-image img{';
			$saas_software_technology_custom_css .='width: '.esc_attr($saas_software_technology_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($saas_software_technology_blog_post_featured_image_custom_height).';';
		$saas_software_technology_custom_css .='}';
	}

	/*------Shop page pagination ---------*/
	$saas_software_technology_shop_page_pagination = get_theme_mod('saas_software_technology_shop_page_pagination', true);
	if($saas_software_technology_shop_page_pagination == false){
		$saas_software_technology_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$saas_software_technology_custom_css .='display: none;';
		$saas_software_technology_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$saas_software_technology_post_blocks = get_theme_mod('saas_software_technology_post_blocks', 'Without box');
	if($saas_software_technology_post_blocks == 'Within box' ){
		$saas_software_technology_custom_css .='.post-box{';
			$saas_software_technology_custom_css .=' border: 1px solid #222;';
		$saas_software_technology_custom_css .='}';
	}

	//  ------------ Mobile Media Options ----------
	$saas_software_technology_responsive_sticky_header = get_theme_mod('saas_software_technology_responsive_sticky_header',false);
	if($saas_software_technology_responsive_sticky_header == true && get_theme_mod('saas_software_technology_sticky_header',false) == false){
		$saas_software_technology_custom_css .='@media screen and (min-width:575px){
			.fixed-header{';
			$saas_software_technology_custom_css .='position:static !important;';
		$saas_software_technology_custom_css .='} }';
	}

	if($saas_software_technology_responsive_sticky_header == false){
		$saas_software_technology_custom_css .='@media screen and (max-width:575px){
			.fixed-header{';
			$saas_software_technology_custom_css .='position:static !important;';
		$saas_software_technology_custom_css .='} }';
	}
	
	if (get_theme_mod('saas_software_technology_slider_responsive',true) == true && get_theme_mod('saas_software_technology_slider_hide_show',false) == false) {
		$saas_software_technology_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$saas_software_technology_custom_css .=' display: none;';
		$saas_software_technology_custom_css .='} }';
	}
	if (get_theme_mod('saas_software_technology_slider_responsive',true) == false) {
		$saas_software_technology_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$saas_software_technology_custom_css .=' display: none;';
		$saas_software_technology_custom_css .='} }';
	}
	
	if (get_theme_mod('saas_software_technology_slider_button_responsive',true) == true && get_theme_mod('saas_software_technology_slider_button',true) == false) {
		$saas_software_technology_custom_css .='@media screen and (min-width: 575px){
			.read-btn{';
			$saas_software_technology_custom_css .=' display: none;';
		$saas_software_technology_custom_css .='} }';
	}
	if (get_theme_mod('saas_software_technology_slider_button_responsive',true) == false) {
		$saas_software_technology_custom_css .='@media screen and (max-width: 575px){
			.read-btn{';
			$saas_software_technology_custom_css .=' display: none;';
		$saas_software_technology_custom_css .='} }';
		$saas_software_technology_custom_css .='@media screen and (max-width: 575px){
			#slider .carousel-caption{';
			$saas_software_technology_custom_css .=' padding: 0px;';
		$saas_software_technology_custom_css .='} }';
	}

	$saas_software_technology_responsive_show_back_to_top = get_theme_mod('saas_software_technology_responsive_show_back_to_top',true);
	if($saas_software_technology_responsive_show_back_to_top == true && get_theme_mod('saas_software_technology_show_back_to_top',true) == false){
		$saas_software_technology_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$saas_software_technology_custom_css .='visibility:hidden;';
		$saas_software_technology_custom_css .='} }';
	}

	if($saas_software_technology_responsive_show_back_to_top == false){
		$saas_software_technology_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$saas_software_technology_custom_css .='visibility:hidden;';
		$saas_software_technology_custom_css .='} }';
	}

	$saas_software_technology_responsive_preloader_hide = get_theme_mod('saas_software_technology_responsive_preloader_hide',false);
	if($saas_software_technology_responsive_preloader_hide == true && get_theme_mod('saas_software_technology_preloader_hide',false) == false){
		$saas_software_technology_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$saas_software_technology_custom_css .='display:none !important;';
		$saas_software_technology_custom_css .='} }';
	}

	if($saas_software_technology_responsive_preloader_hide == false){
		$saas_software_technology_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$saas_software_technology_custom_css .='display:none !important;';
		$saas_software_technology_custom_css .='} }';
	}

	// menu font weight
	$saas_software_technology_theme_lay = get_theme_mod( 'saas_software_technology_font_weight_menu_option','400');
    if($saas_software_technology_theme_lay == '100'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight:100;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '200'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 200;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '300'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 300;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '400'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 400;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '500'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 500;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '600'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 600;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '700'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 700;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '800'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 800;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_theme_lay == '900'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='font-weight: 900;';
		$saas_software_technology_custom_css .='}';
	}

	// Menu Item Hover Style	
	$saas_software_technology_menus_item = get_theme_mod( 'saas_software_technology_menus_item_style','None');
	if($saas_software_technology_menus_item == 'None'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a{';
			$saas_software_technology_custom_css .='';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_menus_item == 'Zoom In'){
		$saas_software_technology_custom_css .='.primary-navigation ul li a:hover{';
			$saas_software_technology_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$saas_software_technology_custom_css .='}';
	}

	// menu color
	$saas_software_technology_menu_color = get_theme_mod('saas_software_technology_menu_color');

	$saas_software_technology_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_menu_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// menu hover color
	$saas_software_technology_menu_hover_color = get_theme_mod('saas_software_technology_menu_hover_color');
	$saas_software_technology_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_menu_hover_color).' !important;';
	$saas_software_technology_custom_css .='}';
	$saas_software_technology_custom_css .='.primary-navigation ul li a:hover{';
			$saas_software_technology_custom_css .='border-color: '.esc_attr($saas_software_technology_menu_hover_color).' !important;';
	$saas_software_technology_custom_css .='}';

	// Submenu color
	$saas_software_technology_submenu_menu_color = get_theme_mod('saas_software_technology_submenu_menu_color');
	$saas_software_technology_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_submenu_menu_color).' !important;';
	$saas_software_technology_custom_css .='}';

	// Submenu Hover Color Option
	$saas_software_technology_submenu_hover_color = get_theme_mod('saas_software_technology_submenu_hover_color');
	$saas_software_technology_custom_css .='.primary-navigation ul.sub-menu li a:hover {';
	$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_submenu_hover_color).'!important;';
	$saas_software_technology_custom_css .='} ';

	// Breadcrumb color option
	$saas_software_technology_breadcrumb_color = get_theme_mod('saas_software_technology_breadcrumb_color');
	$saas_software_technology_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_breadcrumb_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// Breadcrumb bg color option
	$saas_software_technology_breadcrumb_background_color = get_theme_mod('saas_software_technology_breadcrumb_background_color');
	$saas_software_technology_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_breadcrumb_background_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// Breadcrumb hover color option
	$saas_software_technology_breadcrumb_hover_color = get_theme_mod('saas_software_technology_breadcrumb_hover_color');
	$saas_software_technology_custom_css .='.bradcrumbs a:hover{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_breadcrumb_hover_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// Breadcrumb hover bg color option
	$saas_software_technology_breadcrumb_hover_bg_color = get_theme_mod('saas_software_technology_breadcrumb_hover_bg_color');
	$saas_software_technology_custom_css .='.bradcrumbs a:hover{';
		$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_breadcrumb_hover_bg_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// Category color option
	$saas_software_technology_category_color = get_theme_mod('saas_software_technology_category_color');
	$saas_software_technology_custom_css .='.tc-single-category a{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_category_color).'!important;';
	$saas_software_technology_custom_css .='}';

	// Category bg color option
	$saas_software_technology_category_background_color = get_theme_mod('saas_software_technology_category_background_color');
	$saas_software_technology_custom_css .='.tc-single-category a{';
		$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_category_background_color).'!important;';
	$saas_software_technology_custom_css .='}';

	/*-------- Scrollup icon css -------*/
	$saas_software_technology_scroll_icon_font_size = get_theme_mod('saas_software_technology_scroll_icon_font_size', 18);
	$saas_software_technology_custom_css .='.scrollup{';
		$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_scroll_icon_font_size).'px;';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_scroll_icon_color = get_theme_mod('saas_software_technology_scroll_icon_color');
	$saas_software_technology_custom_css .='.scrollup{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_scroll_icon_color).';';
	$saas_software_technology_custom_css .='}';

	$saas_software_technology_scroll_icon_hover_color = get_theme_mod('saas_software_technology_scroll_icon_hover_color');
	$saas_software_technology_custom_css .='.scrollup:hover{';
		$saas_software_technology_custom_css .='color: '.esc_attr($saas_software_technology_scroll_icon_hover_color).';';
	$saas_software_technology_custom_css .='}';

	// slider hide css
	$saas_software_technology_slider_hide_show = get_theme_mod('saas_software_technology_slider_hide_show',false);
	if($saas_software_technology_slider_hide_show == false) {
		$saas_software_technology_custom_css .='.page-template-custom-frontpage #header{';
			$saas_software_technology_custom_css .='position:static; border-bottom: 1px solid #e2e2e2;';
		$saas_software_technology_custom_css .='}';
	}
	
	/*---- Slider Height ------*/
	$saas_software_technology_slider_height = get_theme_mod('saas_software_technology_slider_height');
	$saas_software_technology_custom_css .='#slider img{';
		$saas_software_technology_custom_css .='height: '.esc_attr($saas_software_technology_slider_height).'px;';
	$saas_software_technology_custom_css .='}';
	$saas_software_technology_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$saas_software_technology_custom_css .='height: auto;';
	$saas_software_technology_custom_css .='} }';

	/*---- Slider Image overlay -----*/
	$saas_software_technology_slider_image_overlay = get_theme_mod('saas_software_technology_slider_image_overlay',false);
	if($saas_software_technology_slider_image_overlay == false){
		$saas_software_technology_custom_css .='#slider img {';
			$saas_software_technology_custom_css .='opacity: 1;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_slider_overlay_color = get_theme_mod('saas_software_technology_slider_overlay_color');
	if($saas_software_technology_slider_overlay_color != false){
		$saas_software_technology_custom_css .='#slider{';
			$saas_software_technology_custom_css .='background-color: '.esc_attr($saas_software_technology_slider_overlay_color).';';
		$saas_software_technology_custom_css .='}';
	}
	/*--------------------------- Slider Opacity -------------------*/
	$saas_software_technology_slider_layout = get_theme_mod( 'saas_software_technology_slider_opacity_color','0.5');
	if($saas_software_technology_slider_layout == '0'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.1'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.1';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.2'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.2';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.3'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.3';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.4'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.4';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.5'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.5';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.6'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.6';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.7'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.7';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.8'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.8';
		$saas_software_technology_custom_css .='}';
		}else if($saas_software_technology_slider_layout == '0.9'){
		$saas_software_technology_custom_css .='#slider img{';
			$saas_software_technology_custom_css .='opacity:0.9';
		$saas_software_technology_custom_css .='}';
		}	

	// Single post image border radious
	$saas_software_technology_single_post_img_border_radius = get_theme_mod('saas_software_technology_single_post_img_border_radius', 0);
	$saas_software_technology_custom_css .='.feature-box img{';
		$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_single_post_img_border_radius).'px;';
	$saas_software_technology_custom_css .='}';

	// Single post image box shadow
	$saas_software_technology_single_post_img_box_shadow = get_theme_mod('saas_software_technology_single_post_img_box_shadow',0);
	$saas_software_technology_custom_css .='.feature-box img{';
		$saas_software_technology_custom_css .='box-shadow: '.esc_attr($saas_software_technology_single_post_img_box_shadow).'px '.esc_attr($saas_software_technology_single_post_img_box_shadow).'px '.esc_attr($saas_software_technology_single_post_img_box_shadow).'px #ccc;';
	$saas_software_technology_custom_css .='}';

	// Grid Post into blocks
	$saas_software_technology_grid_post_blocks = get_theme_mod('saas_software_technology_grid_post_blocks', 'Without box');
	if($saas_software_technology_grid_post_blocks == 'Within box' ){
		$saas_software_technology_custom_css .='.services-box .grid-post-box{';
			$saas_software_technology_custom_css .=' border: 1px solid #222;';
		$saas_software_technology_custom_css .='}';
	}

	// Grid Post Featured image css
	$saas_software_technology_grid_post_featured_image_border_radius = get_theme_mod('saas_software_technology_grid_post_featured_image_border_radius');
	if($saas_software_technology_grid_post_featured_image_border_radius != false){
		$saas_software_technology_custom_css .='.inner-service .grid-post-box img{';
			$saas_software_technology_custom_css .='border-radius: '.esc_attr($saas_software_technology_grid_post_featured_image_border_radius).'px;';
		$saas_software_technology_custom_css .='}';
	}

	// Metabox Seperator
	$saas_software_technology_metabox_seperator = get_theme_mod('saas_software_technology_metabox_seperator','|');
	if($saas_software_technology_metabox_seperator != '' ){
		$saas_software_technology_custom_css .='.metabox .me-2:after{';
			$saas_software_technology_custom_css .=' content: "'.esc_attr($saas_software_technology_metabox_seperator).'"; padding-left:10px;';
		$saas_software_technology_custom_css .='}';		
	}

	// Metabox Seperator
	$saas_software_technology_single_post_metabox_seperator = get_theme_mod('saas_software_technology_single_post_metabox_seperator','|');
	if($saas_software_technology_single_post_metabox_seperator != '' ){
		$saas_software_technology_custom_css .='.metabox .px-2:after{';
			$saas_software_technology_custom_css .=' content: "'.esc_attr($saas_software_technology_single_post_metabox_seperator).'"; padding-left:10px;';
		$saas_software_technology_custom_css .='}';		
	}

	$saas_software_technology_theme_lay = get_theme_mod( 'saas_software_technology_footer_text_transform','Capitalize');
	if($saas_software_technology_theme_lay == 'Capitalize'){
		$saas_software_technology_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
			$saas_software_technology_custom_css .='text-transform:Capitalize;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_theme_lay == 'Lowercase'){
		$saas_software_technology_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
			$saas_software_technology_custom_css .='text-transform:Lowercase;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_theme_lay == 'Uppercase'){
		$saas_software_technology_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
			$saas_software_technology_custom_css .='text-transform:Uppercase;';
		$saas_software_technology_custom_css .='}';
	}

	// widgets heading font size
	$saas_software_technology_widgets_heading_fontsize = get_theme_mod('saas_software_technology_widgets_heading_fontsize',25);
	if($saas_software_technology_widgets_heading_fontsize != false){
		$saas_software_technology_custom_css .='.footertown .widget h3{';
			$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_widgets_heading_fontsize).'px; ';
		$saas_software_technology_custom_css .='}';
	}

	// widgets heading font weight
	$saas_software_technology_widgets_heading_font_weight = get_theme_mod('saas_software_technology_widgets_heading_font_weight', '');
  	$saas_software_technology_custom_css .='.footertown .widget h3{';
    $saas_software_technology_custom_css .='font-weight: '.esc_attr($saas_software_technology_widgets_heading_font_weight).';';
  	$saas_software_technology_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$saas_software_technology_footer_widgets_heading = get_theme_mod( 'saas_software_technology_footer_widgets_heading','Left');
    if($saas_software_technology_footer_widgets_heading == 'Left'){
		$saas_software_technology_custom_css .='footer h3{';
		$saas_software_technology_custom_css .='text-align: left;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_widgets_heading == 'Center'){
		$saas_software_technology_custom_css .='footer h3{';
			$saas_software_technology_custom_css .='text-align: center;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_widgets_heading == 'Right'){
		$saas_software_technology_custom_css .='footer h3{';
			$saas_software_technology_custom_css .='text-align: right;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_footer_widgets_content = get_theme_mod( 'saas_software_technology_footer_widgets_content','Left');
    if($saas_software_technology_footer_widgets_content == 'Left'){
		$saas_software_technology_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer.gallery,aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
		$saas_software_technology_custom_css .='text-align: left;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_widgets_content == 'Center'){
		$saas_software_technology_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$saas_software_technology_custom_css .='text-align: center;';
		$saas_software_technology_custom_css .='}';
	}else if($saas_software_technology_footer_widgets_content == 'Right'){
		$saas_software_technology_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$saas_software_technology_custom_css .='text-align: right !important;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_show_hide_post_categories = get_theme_mod('saas_software_technology_show_hide_post_categories',true);

	if($saas_software_technology_show_hide_post_categories == false){
		$saas_software_technology_custom_css .='.tc-category{';
			$saas_software_technology_custom_css .='display: none;';
		$saas_software_technology_custom_css .='}';
	}

	/*-------- Blog Post Alignment ------*/
	$saas_software_technology_post_alignment = get_theme_mod('saas_software_technology_blog_post_alignment', 'left');
	if($saas_software_technology_post_alignment == 'center' ){
		$saas_software_technology_custom_css .='.services-box,.services-box h2{';
			$saas_software_technology_custom_css .=' text-align: '. $saas_software_technology_post_alignment .'!important;';
		$saas_software_technology_custom_css .='}';
	}elseif($saas_software_technology_post_alignment == 'right' ){
		$saas_software_technology_custom_css .='.services-box,.services-box h2{';
			$saas_software_technology_custom_css .='text-align: '. $saas_software_technology_post_alignment .'!important;';
		$saas_software_technology_custom_css .='}';
	}

	// Blog Post Button Font Size 
	$saas_software_technology_button_font_size = get_theme_mod('saas_software_technology_button_font_size');
	if($saas_software_technology_button_font_size != false){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small{';
			$saas_software_technology_custom_css .='font-size: '.esc_attr($saas_software_technology_button_font_size).'px;';
		$saas_software_technology_custom_css .='}';
	}

	$saas_software_technology_button_text_transform = get_theme_mod( 'saas_software_technology_button_text_transform','Capitalize');
	if($saas_software_technology_button_text_transform == 'Capitalize'){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small{';
			$saas_software_technology_custom_css .='text-transform:Capitalize;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_button_text_transform == 'Lowercase'){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small{';
			$saas_software_technology_custom_css .='text-transform:Lowercase;';
		$saas_software_technology_custom_css .='}';
	}
	if($saas_software_technology_button_text_transform == 'Uppercase'){
		$saas_software_technology_custom_css .='.read-btn a.blogbutton-small{';
			$saas_software_technology_custom_css .='text-transform:Uppercase;';
		$saas_software_technology_custom_css .='}';
	}