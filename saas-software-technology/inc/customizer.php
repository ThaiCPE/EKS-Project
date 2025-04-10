<?php
/**
 * SAAS Software Technology Theme Customizer
 *
 * @package SAAS Software Technology
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function saas_software_technology_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'saas_software_technology_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'saas_software_technology_customize_partial_blogdescription',
		)
	);

	//About Section
	$wp_customize->add_section( 'saas_software_technology_about_theme' , array(
    	'title' => esc_html__( 'About Theme', 'saas-software-technology' ),
    	'priority' => 10,
	) );

	$wp_customize->add_setting('saas_software_technology_demo_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_demo_link',array(
		'type'=> 'hidden',
		'description' => "<h3>". esc_html__('Theme Demo','saas-software-technology') ."</h3><p>". esc_html__('Our premium version of SAAS Software Technology has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.','saas-software-technology') ."</p> <a target='_blank' href='". esc_url('https://preview.themescaliber.com/saas-software-technology-pro/') ." '>". esc_html__('View Demo','saas-software-technology') ."</a>",
		'section'=> 'saas_software_technology_about_theme'
	));
	
	$wp_customize->add_setting('saas_software_technology_doc_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_doc_link',array(
		'type'=> 'hidden',
		'description' => "<h3>". esc_html__('Theme Documentation','saas-software-technology') ."</h3><p>". esc_html__('We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.','saas-software-technology') ."</p> <a target='_blank' href='". esc_url('https://preview.themescaliber.com/doc/free-saas-software-technology/') ." '>". esc_html__('View Documentation','saas-software-technology') ."</a>",
		'section'=> 'saas_software_technology_about_theme'
	));

	$wp_customize->add_setting('saas_software_technology_forum_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_forum_link',array(
		'type'=> 'hidden',
		'description' => "<h3>". esc_html__('Theme Support','saas-software-technology') ."</h3><p>". esc_html__('Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.','saas-software-technology') ."</p> <a target='_blank' href='". esc_url('https://wordpress.org/support/theme/saas-software-technology/') ." '>". esc_html__('Support Forum','saas-software-technology') ."</a>",
		'section'=> 'saas_software_technology_about_theme'
	));

	$wp_customize->add_setting('saas_software_technology_review_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_review_link',array(
		'type'=> 'hidden',
		'description' => "<h3>". esc_html__('Theme Review','saas-software-technology') ."</h3><p>". esc_html__('If you enjoy using our theme, we’d love to hear your feedback. please leave us a review.','saas-software-technology') ."</p><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/saas-software-technology/reviews/#new-post') ." '>". esc_html__('Rate & Review','saas-software-technology') ."</a>",
		'section'=> 'saas_software_technology_about_theme'
	));		

	//add home page setting pannel
	$wp_customize->add_panel( 'saas_software_technology_panel_id', array(
	    'priority' => 20,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'saas-software-technology' ),
	) );

    $saas_software_technology_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'saas_software_technology_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'saas-software-technology' ),
		'priority'   => 30,
		'panel' => 'saas_software_technology_panel_id'
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'saas_software_technology_first_theme_color', array(
	    'default' => '#ff66a7',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_first_theme_color', array(
  		'label' => __('Theme Color Option1','saas-software-technology'),
	    'section' => 'saas_software_technology_typography',
	    'settings' => 'saas_software_technology_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'saas_software_technology_second_theme_color', array(
	    'default' => '#3566eb',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_second_theme_color', array(
  		'label' => __('Theme Color Option2','saas-software-technology'),
	    'section' => 'saas_software_technology_typography',
	    'settings' => 'saas_software_technology_second_theme_color',
  	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('saas_software_technology_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
		'saas_software_technology_body_font_family', array(
		'section'  => 'saas_software_technology_typography',
		'label'    => __( 'Body Fonts','saas-software-technology'),
		'type'     => 'select',
		'choices'  => $saas_software_technology_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('saas_software_technology_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_body_font_size',array(
		'label'	=> __('Body Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_body_font_size',
		'type'	=> 'text'
	));

	//This is Body Font Weight setting
	$wp_customize->add_setting('saas_software_technology_body_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control('saas_software_technology_body_font_weight',array(
        'type' => 'select',
        'label' => __('Body Font Weight','saas-software-technology'),
        'section' => 'saas_software_technology_typography',
        'choices' => array(
            '100' => __('100','saas-software-technology'),
            '200' => __('200','saas-software-technology'),
            '300' => __('300','saas-software-technology'),
            '400' => __('400','saas-software-technology'),
            '500' => __('500','saas-software-technology'),
            '600' => __('600','saas-software-technology'),
            '700' => __('700','saas-software-technology'),
            '800' => __('800','saas-software-technology'),
            '900' => __('900','saas-software-technology'),
        ),
	) );
	
	// This is Body Color setting
	$wp_customize->add_setting( 'saas_software_technology_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_body_color', array(
		'label' => __('Body Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_body_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_paragraph_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'Paragraph Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	$wp_customize->add_setting('saas_software_technology_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_paragraph_font_size',
		'type'	=> 'text'
	));

	//This is Paragraph Font Weight setting
	$wp_customize->add_setting('saas_software_technology_paragraph_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control('saas_software_technology_paragraph_font_weight',array(
        'type' => 'select',
        'label' => __('Paragraph Font Weight','saas-software-technology'),
        'section' => 'saas_software_technology_typography',
        'choices' => array(
            '100' => __('100','saas-software-technology'),
            '200' => __('200','saas-software-technology'),
            '300' => __('300','saas-software-technology'),
            '400' => __('400','saas-software-technology'),
            '500' => __('500','saas-software-technology'),
            '600' => __('600','saas-software-technology'),
            '700' => __('700','saas-software-technology'),
            '800' => __('800','saas-software-technology'),
            '900' => __('900','saas-software-technology'),
        ),
	) );

	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_paragraph_color', array(
		'label' => __('Paragraph Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_paragraph_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_atag_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( '"a" Tag Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is "a" Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_atag_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_atag_font_weight',array(
		'type' => 'select',
		'label' => __('"a" Tag Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_atag_color', array(
		'label' => __('"a" Tag Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_atag_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_li_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( '"li" Tag Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is "li" Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_li_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_li_font_weight',array(
		'type' => 'select',
		'label' => __('"li" Tag Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );	

	// This is "li" Tag Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_li_color', array(
		'label' => __('"li" Tag Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_li_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h1_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h1 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h1_font_size',array(
		'label'	=> __('h1 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h1_font_size',
		'type'	=> 'text'
	));

	//This is H1 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h1_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h1_font_weight',array(
		'type' => 'select',
		'label' => __('H1 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );	
	
	// This is H1 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h1_color', array(
		'label' => __('h1 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h1_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h2_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h2 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h2_font_size',array(
		'label'	=> __('h2 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h2_font_size',
		'type'	=> 'text'
	));

	//This is H2 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h2_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h2_font_weight',array(
		'type' => 'select',
		'label' => __('H2 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h2_color', array(
		'label' => __('h2 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h2_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h3_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h3 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h3_font_size',array(
		'label'	=> __('h3 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h3_font_size',
		'type'	=> 'text'
	));

	//This is H3 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h3_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h3_font_weight',array(
		'type' => 'select',
		'label' => __('H3 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h3_color', array(
		'label' => __('h3 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h3_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h4_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h4 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h4_font_size',array(
		'label'	=> __('h4 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h4_font_size',
		'type'	=> 'text'
	));

	//This is H4 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h4_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h4_font_weight',array(
		'type' => 'select',
		'label' => __('H4 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h4_color', array(
		'label' => __('h4 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h4_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h5_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h5 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h5_font_size',array(
		'label'	=> __('h5 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h5_font_size',
		'type'	=> 'text'
	));

	//This is H5 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h5_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h5_font_weight',array(
		'type' => 'select',
		'label' => __('H5 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h5_color', array(
		'label' => __('h5 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h5_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('saas_software_technology_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control(
	    'saas_software_technology_h6_font_family', array(
	    'section'  => 'saas_software_technology_typography',
	    'label'    => __( 'h6 Fonts','saas-software-technology'),
	    'type'     => 'select',
	    'choices'  => $saas_software_technology_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('saas_software_technology_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_h6_font_size',array(
		'label'	=> __('h6 Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_typography',
		'setting'	=> 'saas_software_technology_h6_font_size',
		'type'	=> 'text'
	));

	//This is H6 Tag Font Weight setting
	$wp_customize->add_setting('saas_software_technology_h6_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_h6_font_weight',array(
		'type' => 'select',
		'label' => __('H6 Font Weight','saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'choices' => array(
			'100' => __('100','saas-software-technology'),
			'200' => __('200','saas-software-technology'),
			'300' => __('300','saas-software-technology'),
			'400' => __('400','saas-software-technology'),
			'500' => __('500','saas-software-technology'),
			'600' => __('600','saas-software-technology'),
			'700' => __('700','saas-software-technology'),
			'800' => __('800','saas-software-technology'),
			'900' => __('900','saas-software-technology'),
		),
	) );

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'saas_software_technology_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_h6_color', array(
		'label' => __('h6 Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_typography',
		'settings' => 'saas_software_technology_h6_color',
	)));

	//Layouts
	$wp_customize->add_section( 'saas_software_technology_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'saas-software-technology' ),
		'priority'   => 30,
		'panel' => 'saas_software_technology_panel_id'
	) );

	$wp_customize->add_setting('saas_software_technology_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','saas-software-technology'),
        'section' => 'saas_software_technology_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','saas-software-technology'),
            'Contained Layout' => __('Contained Layout','saas-software-technology'),
            'Boxed Layout' => __('Boxed Layout','saas-software-technology'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('saas_software_technology_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	) );
	$wp_customize->add_control('saas_software_technology_theme_options', array(
        'type' => 'radio',
        'label' => __('Sidebar Layout','saas-software-technology'),
        'section' => 'saas_software_technology_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','saas-software-technology'),
            'Right Sidebar' => __('Right Sidebar','saas-software-technology'),
            'One Column' => __('One Column','saas-software-technology'),
            'Three Columns' => __('Three Columns','saas-software-technology'),
            'Four Columns' => __('Four Columns','saas-software-technology'),
            'Grid Layout' => __('Grid Layout','saas-software-technology')
        ),
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('saas_software_technology_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	) );
	$wp_customize->add_control('saas_software_technology_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','saas-software-technology'),
        'section' => 'saas_software_technology_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','saas-software-technology'),
            'Right Sidebar' => __('Right Sidebar','saas-software-technology'),
            'One Column' => __('One Column','saas-software-technology'),
        ),
    ));

    $wp_customize->add_setting('saas_software_technology_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices',
	));
	$wp_customize->add_control('saas_software_technology_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'saas-software-technology'),
		'section'        => 'saas_software_technology_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'saas-software-technology'),
			'Right Sidebar' => __('Right Sidebar', 'saas-software-technology'),
			'One Column'    => __('One Column', 'saas-software-technology'),
		),
	));

    $wp_customize->add_setting( 'saas_software_technology_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','saas-software-technology' ),
        'section' => 'saas_software_technology_left_right'
    ));

	// Preloader
	$wp_customize->add_setting( 'saas_software_technology_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','saas-software-technology' ),
        'section' => 'saas_software_technology_left_right'
    ));

    $wp_customize->add_setting('saas_software_technology_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control( 'saas_software_technology_preloader_type', array(
		'label' => __( 'Preloader Type','saas-software-technology' ),
		'section' => 'saas_software_technology_left_right',
		'type'  => 'select',
		'settings' => 'saas_software_technology_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','saas-software-technology'),
		    'chasing-square' => __('Chasing Square','saas-software-technology'),
	    ),
	));

	$wp_customize->add_setting( 'saas_software_technology_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'saas_software_technology_left_right',
	    'settings' => 'saas_software_technology_preloader_color',
  	)));

  	$wp_customize->add_setting( 'saas_software_technology_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'saas_software_technology_left_right',
	    'settings' => 'saas_software_technology_preloader_bg_color',
  	)));

 	$wp_customize->add_setting('saas_software_technology_preloader_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'saas_software_technology_preloader_background_img',array(
        'label' => __('Preloader Background Image','saas-software-technology'),
        'section' => 'saas_software_technology_left_right'
	)));	

  	$wp_customize->add_setting('saas_software_technology_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_left_right',
	)));

	$wp_customize->add_setting('saas_software_technology_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_left_right',
	)));

	$wp_customize->add_setting('saas_software_technology_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_left_right',
	)));

	$wp_customize->add_setting('saas_software_technology_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_left_right',
	)));

	//Header
	$wp_customize->add_section('saas_software_technology_header',array(
		'title'	=> __('Header','saas-software-technology'),
		'priority'	=> null,
		'panel' => 'saas_software_technology_panel_id',
	));

	//Sticky Header
	$wp_customize->add_setting( 'saas_software_technology_sticky_header',array(
      	'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','saas-software-technology' ),
        'section' => 'saas_software_technology_header'
    ));

    $wp_customize->add_setting('saas_software_technology_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','saas-software-technology'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'saas_software_technology_header',
		'type'=> 'number',
	));

	$wp_customize->add_setting('saas_software_technology_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','saas-software-technology'),
        'section' => 'saas_software_technology_header',
        'choices' => array(
            'uppercase' => __('Uppercase','saas-software-technology'),
            'capitalize' => __('Capitalize','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting( 'saas_software_technology_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'saas_software_technology_sanitize_float',
	) );
	$wp_customize->add_control( 'saas_software_technology_nav_font_size', array(
		'label' => __( 'Navigation Font Size','saas-software-technology' ),
		'section'     => 'saas_software_technology_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('saas_software_technology_font_weight_menu_option',array(
        'default' => '600',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control('saas_software_technology_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','saas-software-technology'),
        'section' => 'saas_software_technology_header',
        'choices' => array(
            '100' => __('100','saas-software-technology'),
            '200' => __('200','saas-software-technology'),
            '300' => __('300','saas-software-technology'),
            '400' => __('400','saas-software-technology'),
            '500' => __('500','saas-software-technology'),
            '600' => __('600','saas-software-technology'),
            '700' => __('700','saas-software-technology'),
            '800' => __('800','saas-software-technology'),
            '900' => __('900','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting('saas_software_technology_menus_item_style',array(
        'default' => '',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_menus_item_style',array(
        'type' => 'select',
		'label' => __('Menu Item Hover Style','saas-software-technology'),
		'section' => 'saas_software_technology_header',
		'choices' => array(
            'None' => __('None','saas-software-technology'),
            'Zoom In' => __('Zoom In','saas-software-technology'),
        ),
	));

	$wp_customize->add_setting('saas_software_technology_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_menu_color', array(
		'label'    => __('Menu Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_header',
		'settings' => 'saas_software_technology_menu_color',
	)));

	$wp_customize->add_setting('saas_software_technology_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_header',
		'settings' => 'saas_software_technology_menu_hover_color',
	)));

	$wp_customize->add_setting('saas_software_technology_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_header',
		'settings' => 'saas_software_technology_submenu_menu_color',
	)));

	$wp_customize->add_setting( 'saas_software_technology_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'saas-software-technology'),
	    'section' => 'saas_software_technology_header',
	    'settings' => 'saas_software_technology_submenu_hover_color',
  	)));

  	$wp_customize->add_setting( 'saas_software_technology_menu_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_menu_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>". esc_html__('More Features in the Premium Version!','saas-software-technology') ."</h3>
        	<ul>
        		<li>". esc_html__('Menu Background Colors','saas-software-technology') ."</li>
        		<li>". esc_html__('Menu Item Fonts','saas-software-technology') ."</li>
        		<li>". esc_html__('Responsive Menu Colors','saas-software-technology') ."</li>
        		<li>". esc_html__('Header Search Icons Colors','saas-software-technology') ."</li>
        		<li>". esc_html__('... and Other Premium Features','saas-software-technology') ."</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/products/software-technology-wordpress-theme') ." '>". esc_html__('Upgrade Now','saas-software-technology') ."</a>",
        'section' => 'saas_software_technology_header'
        )
    );

	//home page slider
	$wp_customize->add_section( 'saas_software_technology_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'saas-software-technology' ),
		'priority'   => null,
		'panel' => 'saas_software_technology_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'saas_software_technology_slider_hide_show',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'saas_software_technology_customize_partial_saas_software_technology_slider_hide_show',
		)
	);

	$wp_customize->add_setting('saas_software_technology_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide Slider','saas-software-technology'),
	   'section' => 'saas_software_technology_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'saas_software_technology_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'saas_software_technology_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'saas_software_technology_slider_page' . $count, array(
			'label' => __( 'Select Slide Image Page', 'saas-software-technology' ),
			'section' => 'saas_software_technology_slidersettings',
			'type'    => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('saas_software_technology_slider_prev_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_slider_prev_icon',array(
		'label'	=>__('Add Slider Prev Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_slidersettings',
		'setting'	=> 'saas_software_technology_slider_prev_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('saas_software_technology_slider_next_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_slidersettings',
		'setting'	=> 'saas_software_technology_slider_next_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting( 'saas_software_technology_slider_small_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'saas_software_technology_slider_small_title', array(
        'label'    => __( 'Add Slider Small Text', 'saas-software-technology' ),
        'section'  => 'saas_software_technology_slidersettings',
        'type'     => 'text'
    ) );

	//Show / Hide slider Arrow
	$wp_customize->add_setting('saas_software_technology_slider_arrow',array(
		'default' => 'true',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	 ));
	 
	 $wp_customize->add_control('saas_software_technology_slider_arrow',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide slider Arrow','saas-software-technology'),
		'section' => 'saas_software_technology_slidersettings',
	 ));
 
	//Show / Hide slider Title
	$wp_customize->add_setting('saas_software_technology_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	
	$wp_customize->add_control('saas_software_technology_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','saas-software-technology'),
	   'section' => 'saas_software_technology_slidersettings',
	));

	//Show / Hide slider Content
	$wp_customize->add_setting('saas_software_technology_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','saas-software-technology'),
	   'section' => 'saas_software_technology_slidersettings',
	));

	$wp_customize->add_setting('saas_software_technology_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_button',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Button','saas-software-technology'),
	   	'section' => 'saas_software_technology_slidersettings'
	));

	$wp_customize->add_setting('saas_software_technology_slider_button_text',array(
        'default'=> 'Read More',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_slider_button_text',array(
        'label' => __('Add Slider Button Text','saas-software-technology'),
        'section'=> 'saas_software_technology_slidersettings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('saas_software_technology_slider_button_link',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('saas_software_technology_slider_button_link',array(
        'label' => esc_html__('Add Button Link','saas-software-technology'),
        'section'=> 'saas_software_technology_slidersettings',
        'type'=> 'url'
    ));

	//Slider excerpt
	$wp_customize->add_setting( 'saas_software_technology_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'    => 'absint',
	) );
	$wp_customize->add_control( 'saas_software_technology_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','saas-software-technology' ),
		'section'     => 'saas_software_technology_slidersettings',
		'type'        => 'number',
		'settings'    => 'saas_software_technology_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'saas_software_technology_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_slider_height', array(
		'label' => esc_html__( 'Slider Height','saas-software-technology' ),
		'section' => 'saas_software_technology_slidersettings',
		'type'    => 'number',
		'description' => __('Measurement is in pixel.','saas-software-technology'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
	) );
	$wp_customize->add_setting('saas_software_technology_slider_opacity_color',array(
		'default'              => 0.5,
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	  ));
	  $wp_customize->add_control( 'saas_software_technology_slider_opacity_color', array(
		  'label'       => esc_html__( 'Slider Image Opacity','saas-software-technology' ),
		  'section'     => 'saas_software_technology_slidersettings',
		  'type'        => 'select',
		  'settings'    => 'saas_software_technology_slider_opacity_color',
		  'choices' => array(
			'0' =>  esc_attr('0','saas-software-technology'),
			'0.1' =>  esc_attr('0.1','saas-software-technology'),
			'0.2' =>  esc_attr('0.2','saas-software-technology'),
			'0.3' =>  esc_attr('0.3','saas-software-technology'),
			'0.4' =>  esc_attr('0.4','saas-software-technology'),
			'0.5' =>  esc_attr('0.5','saas-software-technology'),
			'0.6' =>  esc_attr('0.6','saas-software-technology'),
			'0.7' =>  esc_attr('0.7','saas-software-technology'),
			'0.8' =>  esc_attr('0.8','saas-software-technology'),
			'0.9' =>  esc_attr('0.9','saas-software-technology')
		  ),
	  ));
	$wp_customize->add_setting('saas_software_technology_slider_image_overlay',array(
        'default' => false,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_image_overlay',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Image Overlay','saas-software-technology'),
      	'section' => 'saas_software_technology_slidersettings',
	));

	$wp_customize->add_setting( 'saas_software_technology_slider_overlay_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_slider_overlay_color', array(
	    'label' => __('Slider Overlay Color', 'saas-software-technology'),
	    'section' => 'saas_software_technology_slidersettings',
  	)));

	//About Section
	$wp_customize->add_section('saas_software_technology_about_section',array(
		'title'	=> __('About Section','saas-software-technology'),
		'panel' => 'saas_software_technology_panel_id',
	));

	$wp_customize->add_setting('saas_software_technology_about_hide_show',array(
		'default' => false,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_about_hide_show',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide About Section','saas-software-technology'),
		'section' => 'saas_software_technology_about_section',
	));

	$wp_customize->add_setting('saas_software_technology_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('saas_software_technology_section_title',array(
		'label'	=> esc_html__('Section Title','saas-software-technology'),
		'section'=> 'saas_software_technology_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'saas_software_technology_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'saas_software_technology_about_page', array(
		'label'   => __( 'Select About Page', 'saas-software-technology' ),
		'section' => 'saas_software_technology_about_section',
		'type'    => 'dropdown-pages'
	) );

	for ( $count = 1; $count <= 2; $count++ ) {
		$wp_customize->add_setting( 'saas_software_technology_about_list_text' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'saas_software_technology_about_list_text' . $count, array(
			'label' => __( 'About Text ', 'saas-software-technology' ).$count,
			'section' => 'saas_software_technology_about_section',
			'type'    => 'text'
		) );
	}

	$wp_customize->add_setting( 'saas_software_technology_about_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_about_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>". esc_html__('More Features in the Premium Version!','saas-software-technology') ."</h3>
        	<ul>
        		<li>". esc_html__('Heading Color Option','saas-software-technology') ."</li>
        		<li>". esc_html__('Heading Font Option','saas-software-technology') ."</li>
        		<li>". esc_html__('... and Other Premium Features','saas-software-technology') ."</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/products/software-technology-wordpress-theme') ." '>". esc_html__('Upgrade Now','saas-software-technology') ."</a>",
        'section' => 'saas_software_technology_about_section'
        )
    );
	
	//Blog Post
	$wp_customize->add_section('saas_software_technology_blog_post',array(
		'title'	=> __('Post Settings','saas-software-technology'),
		'panel' => 'saas_software_technology_panel_id',
	));	

	$wp_customize->add_setting('saas_software_technology_blog_post_alignment',array(
        'default' => 'left',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
    ));
	$wp_customize->add_control('saas_software_technology_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'saas-software-technology' ),
        'section' => 'saas_software_technology_blog_post',
        'choices' => array(
            'left' => __('Left Align','saas-software-technology'),
            'right' => __('Right Align','saas-software-technology'),
            'center' => __('Center Align','saas-software-technology')
        ),
    ));

	$wp_customize->add_setting('saas_software_technology_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_blog_post',
		'setting'	=> 'saas_software_technology_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_author_icon',array(
		'label'	=> __('Add Post Author Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_blog_post',
		'setting'	=> 'saas_software_technology_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_comment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_comment_icon',array(
		'label'	=> __('Add Post Comment Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_blog_post',
		'setting'	=> 'saas_software_technology_comment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_time_icon',array(
		'label'	=> __('Add Post Time Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_blog_post',
		'setting'	=> 'saas_software_technology_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('saas_software_technology_show_hide_post_categories',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_show_hide_post_categories',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post category','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting( 'saas_software_technology_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','saas-software-technology' ),
		'section' => 'saas_software_technology_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'saas_software_technology_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','saas-software-technology' ),
		'section' => 'saas_software_technology_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	//Featured Image Dimension
	$wp_customize->add_setting('saas_software_technology_blog_post_featured_image_dimension',array(
		'default' => 'default',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Featured Image Dimension','saas-software-technology'),
		'section'	=> 'saas_software_technology_blog_post',
		'choices' => array(
		'default' => __('Default','saas-software-technology'),
		'custom' => __('Custom Image Size','saas-software-technology'),
	),
	));

	$wp_customize->add_setting('saas_software_technology_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','saas-software-technology'),
		'description'	=> __('Enter a value in pixels. Example:20px','saas-software-technology'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'saas-software-technology' ),),
		'section'=> 'saas_software_technology_blog_post',
		'type'=> 'text',
		'active_callback' => 'saas_software_technology_blog_post_featured_image_dimension'
	));

	$wp_customize->add_setting('saas_software_technology_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('saas_software_technology_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','saas-software-technology'),
		'description'	=> __('Enter a value in pixels. Example:20px','saas-software-technology'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'saas-software-technology' ),),
		'section'=> 'saas_software_technology_blog_post',
		'type'=> 'text',
		'active_callback' => 'saas_software_technology_blog_post_featured_image_dimension'
	));

	$wp_customize->add_setting('saas_software_technology_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','saas-software-technology'),
       'description' => __('Ex: "/", "|", "-", ...','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting('saas_software_technology_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','saas-software-technology'),
        'section' => 'saas_software_technology_blog_post',
        'choices' => array(
            'No Content' => __('No Content','saas-software-technology'),
            'Full Content' => __('Full Content','saas-software-technology'),
            'Excerpt Content' => __('Excerpt Content','saas-software-technology'),
        ),
	) );

    $wp_customize->add_setting( 'saas_software_technology_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'saas_software_technology_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','saas-software-technology' ),
		'section'  => 'saas_software_technology_blog_post',
		'type'  => 'number',
		'settings' => 'saas_software_technology_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'saas_software_technology_button_excerpt_suffix', array(
		'default'   => __('[...]','saas-software-technology' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'saas_software_technology_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','saas-software-technology' ),
		'section'     => 'saas_software_technology_blog_post',
		'type'        => 'text',
		'settings' => 'saas_software_technology_button_excerpt_suffix'
	) );

    $wp_customize->add_setting( 'saas_software_technology_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control( 'saas_software_technology_post_blocks', array(
        'section' => 'saas_software_technology_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'saas-software-technology' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'saas-software-technology' ),
            'Without box' => __( 'Without box', 'saas-software-technology' ),
    )));

    $wp_customize->add_setting('saas_software_technology_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','saas-software-technology'),
       'section' => 'saas_software_technology_blog_post'
    ));

    $wp_customize->add_setting( 'saas_software_technology_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control( 'saas_software_technology_post_navigation_type', array(
        'section' => 'saas_software_technology_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'saas-software-technology' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'saas-software-technology' ),
            'next-prev' => __( 'Next/Prev Button', 'saas-software-technology' ),
    )));

    $wp_customize->add_setting( 'saas_software_technology_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control( 'saas_software_technology_post_navigation_position', array(
        'section' => 'saas_software_technology_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'saas-software-technology' ),
        'choices' => array(
            'top'  => __( 'Top', 'saas-software-technology' ),
            'bottom' => __( 'Bottom', 'saas-software-technology' ),
            'both' => __( 'Both', 'saas-software-technology' ),
    )));

    $wp_customize->add_setting( 'saas_software_technology_post_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_post_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>". esc_html__('More Features in the Premium Version!','saas-software-technology') ."</h3>
        	<ul>
        		<li>". esc_html__('Section Heading Options','saas-software-technology') ."</li>
        		<li>". esc_html__('Animated Elements Colors','saas-software-technology') ."</li>
        		<li>". esc_html__('... and Other Premium Features','saas-software-technology') ."</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/products/software-technology-wordpress-theme') ." '>". esc_html__('Upgrade Now','saas-software-technology') ."</a>",
        'section' => 'saas_software_technology_blog_post'
        )
    );

	// Button Settings
	$wp_customize->add_section( 'saas_software_technology_button_option', array(
		'title' => __('Post Button Settings','saas-software-technology'),
		'panel' => 'saas_software_technology_panel_id',
	));
	$wp_customize->add_setting( 'saas_software_technology_post_button_text', array(
		'default'   => esc_html__('Read More','saas-software-technology' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'saas_software_technology_post_button_text', array(
		'label' => esc_html__('Post Button Text','saas-software-technology' ),
		'section'     => 'saas_software_technology_button_option',
		'type'        => 'text',
		'settings'    => 'saas_software_technology_post_button_text'
	) );

	$wp_customize->add_setting( 'saas_software_technology_button_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'saas_software_technology_sanitize_float',
	) );
	$wp_customize->add_control( 'saas_software_technology_button_font_size', array(
		'label' => __( 'Button Font Size','saas-software-technology' ),
		'section'     => 'saas_software_technology_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	// text trasform
	$wp_customize->add_setting('saas_software_technology_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','saas-software-technology'),
		'choices' => array(
            'Uppercase' => __('Uppercase','saas-software-technology'),
            'Capitalize' => __('Capitalize','saas-software-technology'),
            'Lowercase' => __('Lowercase','saas-software-technology'),
        ),
		'section'=> 'saas_software_technology_button_option',
	));

	$wp_customize->add_setting('saas_software_technology_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','saas-software-technology'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'saas_software_technology_button_option',
		'type'=> 'number',
	));

	$wp_customize->add_setting('saas_software_technology_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','saas-software-technology'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'saas_software_technology_button_option',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'saas_software_technology_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control('saas_software_technology_button_border_radius', array(
        'label'  => __('Button Border Radius','saas-software-technology'),
        'type'=> 'number',
        'section'  => 'saas_software_technology_button_option',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));
	$wp_customize->add_setting('saas_software_technology_btn_font_weight',array(
		'default'=> '',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices',
	));
	$wp_customize->add_control('saas_software_technology_btn_font_weight',array(
		'label'	=> __('Button Font Weight','saas-software-technology'),
		'section'=> 'saas_software_technology_button_option',
		'type' => 'select',
		'choices' => array(
            '100' => __('100','saas-software-technology'),
            '200' => __('200','saas-software-technology'),
            '300' => __('300','saas-software-technology'),
            '400' => __('400','saas-software-technology'),
            '500' => __('500','saas-software-technology'),
            '600' => __('600','saas-software-technology'),
            '700' => __('700','saas-software-technology'),
            '800' => __('800','saas-software-technology'),
            '900' => __('900','saas-software-technology'),
        ),
	));	

	// button letter spacing
	$wp_customize->add_setting( 'saas_software_technology_button_letter_spacing',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_button_letter_spacing', array(
		'label'  =>  esc_html__('Button Letter Spacing','saas-software-technology'),
		'type'=> 'number',
		'section'  => 'saas_software_technology_button_option',
		'input_attrs' => array(
			'step' => 1,
            'min' => 0,
            'max' => 50,
		)
 	));		

	// Button Shape
	$wp_customize->add_setting('saas_software_technology_btn_shape',array(
		'default'=> 'Round',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices',
	));
	$wp_customize->add_control('saas_software_technology_btn_shape',array(
		'label'	=> __('Button Shape','saas-software-technology'),
		'section'=> 'saas_software_technology_button_option',
		'type' => 'select',
		'choices' => array(
			'Square' => __('Square','saas-software-technology'),
			'Round' => __('Round','saas-software-technology'),
			'Pill' => __('Pill','saas-software-technology'),
		),
	));	

	// Button Hover Effect
	$wp_customize->add_setting('saas_software_technology_button_hover_effect',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_button_hover_effect', array(
		'label' => __( 'Button Hover Effect', 'saas-software-technology' ),
		'section' => 'saas_software_technology_button_option',
		'type' => 'select',
		'choices' => array(
			'pulse'     => __( 'Pulse', 'saas-software-technology' ),
			'rubberBand'=> __( 'RubberBand', 'saas-software-technology' ),
			'swing'     => __( 'Swing', 'saas-software-technology' ),
			'tada'      => __( 'Tada', 'saas-software-technology' ),
			'jello'     => __( 'Jello', 'saas-software-technology' ),
			'disable'   => __( 'Disabled', 'saas-software-technology' )
		),
	));

    //Single Post Settings
	$wp_customize->add_section('saas_software_technology_single_post',array(
		'title'	=> __('Single Post Settings','saas-software-technology'),
		'panel' => 'saas_software_technology_panel_id',
	));	

	$wp_customize->add_setting( 'saas_software_technology_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','saas-software-technology' ),
        'section' => 'saas_software_technology_single_post'
    ));
	
	$wp_customize->add_setting('saas_software_technology_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_single_postdate_icon',array(
		'label'	=> __('Add Sigle Post Date Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_single_post',
		'setting'	=> 'saas_software_technology_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_single_postauthor_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_single_postauthor_icon',array(
		'label'	=> __('Add Sigle Post Author Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_single_post',
		'setting'	=> 'saas_software_technology_single_postauthor_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_single_postcomment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_single_postcomment_icon',array(
		'label'	=> __('Add Sigle Post Comment Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_single_post',
		'setting'	=> 'saas_software_technology_single_postcomment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_single_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
        $wp_customize,'saas_software_technology_single_posttime_icon',array(
		'label'	=> __('Add Sigle Post Time Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_single_post',
		'setting'	=> 'saas_software_technology_single_posttime_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('saas_software_technology_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Feature Image','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting( 'saas_software_technology_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float',
	) );
	$wp_customize->add_control( 'saas_software_technology_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','saas-software-technology' ),
		'section'     => 'saas_software_technology_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'saas_software_technology_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'saas_software_technology_sanitize_float',
	));
	$wp_customize->add_control('saas_software_technology_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','saas-software-technology' ),
		'section' => 'saas_software_technology_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('saas_software_technology_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','saas-software-technology'),
       'description' => __('Ex: "/", "|", "-", ...','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

	 $wp_customize->add_setting('saas_software_technology_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
 	));
 	$wp_customize->add_control('saas_software_technology_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','saas-software-technology'),
		'section' => 'saas_software_technology_single_post'
	));

	$wp_customize->add_setting('saas_software_technology_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_category_color', array(
		'label'    => __('Category Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_single_post',
	)));

	$wp_customize->add_setting('saas_software_technology_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_category_background_color', array(
		'label'    => __('Category Background Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_single_post',
	)));

    $wp_customize->add_setting('saas_software_technology_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting( 'saas_software_technology_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'saas-software-technology'),
		'section' => 'saas_software_technology_single_post',
		'type' => 'number',
		'settings' => 'saas_software_technology_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('saas_software_technology_comment_title',array(
       'default' => __('Leave a Reply','saas-software-technology'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_comment_submit_text',array(
       'default' => __('Post Comment','saas-software-technology'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting('saas_software_technology_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','saas-software-technology'),
       'section' => 'saas_software_technology_single_post'
    ));

    $wp_customize->add_setting( 'saas_software_technology_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','saas-software-technology' ),
		'section' => 'saas_software_technology_single_post',
		'type' => 'number',
		'settings' => 'saas_software_technology_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'saas_software_technology_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control( 'saas_software_technology_post_order', array(
        'section' => 'saas_software_technology_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'saas-software-technology' ),
        'choices' => array(
            'categories' => __('Categories', 'saas-software-technology'),
            'tags' => __( 'Tags', 'saas-software-technology' ),
    )));

    $wp_customize->add_setting( 'saas_software_technology_related_post_excerpt_number',array(
	    'default' => 20,
	    'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('saas_software_technology_related_post_excerpt_number',  array(
	    'label' => esc_html__( 'Related Posts Content Limit','saas-software-technology' ),
	    'section' => 'saas_software_technology_single_post',
	    'type'    => 'number',
	    'settings' => 'saas_software_technology_related_post_excerpt_number',
	    'input_attrs' => array(
	    'min' => 0,
	    'max' => 50,
	    'step' => 1,
	),
	));

	//Grid Post Settings
	$wp_customize->add_section('saas_software_technology_grid_post',array(
		'title'	=> __('Grid Post Settings','saas-software-technology'),
		'panel' => 'saas_software_technology_panel_id',
	));	

	$wp_customize->add_setting('saas_software_technology_grid_post_date_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_grid_post_date_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Post Date','saas-software-technology'),
		'section' => 'saas_software_technology_grid_post'
	));
 
	$wp_customize->add_setting('saas_software_technology_grid_post_author_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_grid_post_author_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Post Author','saas-software-technology'),
		'section' => 'saas_software_technology_grid_post'
	));

	$wp_customize->add_setting('saas_software_technology_grid_post_comment_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_grid_post_comment_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Post Comments','saas-software-technology'),
		'section' => 'saas_software_technology_grid_post'
	));
 
	$wp_customize->add_setting('saas_software_technology_grid_post_time_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_grid_post_time_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Post Time','saas-software-technology'),
		'section' => 'saas_software_technology_grid_post'
	)); 

	$wp_customize->add_setting( 'saas_software_technology_grid_post_blocks', array(
		'default'			=> 'Without box',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control( 'saas_software_technology_grid_post_blocks', array(
		'section' => 'saas_software_technology_grid_post',
		'type' => 'select',
		'label' => __( 'Post blocks', 'saas-software-technology' ),
		'choices' => array(
			'Within box'  => __( 'Within box', 'saas-software-technology' ),
			'Without box' => __( 'Without box', 'saas-software-technology' ),
	)));

	$wp_customize->add_setting( 'saas_software_technology_grid_post_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	) );
	$wp_customize->add_control( 'saas_software_technology_grid_post_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','saas-software-technology' ),
		'section' => 'saas_software_technology_grid_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    //404 page settings
	$wp_customize->add_section('saas_software_technology_404_page',array(
		'title'	=> __('404 & No Result Page Settings','saas-software-technology'),
		'priority'	=> null,
		'panel' => 'saas_software_technology_panel_id',
	));

	$wp_customize->add_setting('saas_software_technology_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','saas-software-technology'),
       'section' => 'saas_software_technology_404_page'
    ));

    $wp_customize->add_setting('saas_software_technology_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','saas-software-technology'),
       'section' => 'saas_software_technology_404_page'
    ));

    $wp_customize->add_setting('saas_software_technology_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','saas-software-technology'),
       'section' => 'saas_software_technology_404_page'
    ));

    $wp_customize->add_setting('saas_software_technology_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','saas-software-technology'),
       'section' => 'saas_software_technology_404_page'
    ));

    $wp_customize->add_setting('saas_software_technology_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','saas-software-technology'),
       'section' => 'saas_software_technology_404_page'
    ));

    $wp_customize->add_setting('saas_software_technology_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','saas-software-technology'),
      	'section' => 'saas_software_technology_404_page',
	));

	//Footer
	$wp_customize->add_section('saas_software_technology_footer_section',array(
		'title'	=> __('Footer Section','saas-software-technology'),
		'priority'	=> null,
		'panel' => 'saas_software_technology_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'saas_software_technology_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'saas_software_technology_customize_partial_saas_software_technology_show_back_to_top',
		)
	);

	$wp_customize->add_setting('saas_software_technology_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','saas-software-technology'),
      	'section' => 'saas_software_technology_footer_section',
	));

	$wp_customize->add_setting('saas_software_technology_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SAAS_Software_Technology_Icon_Changer(
        $wp_customize, 'saas_software_technology_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('saas_software_technology_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','saas-software-technology'),
		'section'=> 'saas_software_technology_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('saas_software_technology_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));

	$wp_customize->add_setting('saas_software_technology_scroll_icon_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_scroll_icon_hover_color', array(
		'label'    => __('Back To Top Icon Hover Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));	

	$wp_customize->add_setting('saas_software_technology_back_to_top_text',array(
		'default'	=> __('Back To Top','saas-software-technology'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('saas_software_technology_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('saas_software_technology_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','saas-software-technology'),
        'section' => 'saas_software_technology_footer_section',
        'choices' => array(
            'Left' => __('Left','saas-software-technology'),
            'Right' => __('Right','saas-software-technology'),
            'Center' => __('Center','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting('saas_software_technology_scroll_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_scroll_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Back to Top Text Transform','saas-software-technology'),
		'choices' => array(
            'Uppercase' => __('Uppercase','saas-software-technology'),
            'Capitalize' => __('Capitalize','saas-software-technology'),
            'Lowercase' => __('Lowercase','saas-software-technology'),
        ),
		'section'=> 'saas_software_technology_footer_section',
	));	

	$wp_customize->add_setting( 'saas_software_technology_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','saas-software-technology' ),
      'section' => 'saas_software_technology_footer_section'
    ));

	$wp_customize->add_setting('saas_software_technology_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_footer_background_color', array(
		'label'    => __('Footer Background Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));

	$wp_customize->add_setting('saas_software_technology_footer_template',array(
		'default'	=> 'saas_software_technology-footer-one',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'	
	));
	$wp_customize->add_control('saas_software_technology_footer_template',array(
		'type' => 'select',
		'label'	=> __('Footer style','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'choices' => array(
			'saas_software_technology-footer-one' => __('Style 1', 'saas-software-technology'),
			'saas_software_technology-footer-two' => __('Style 2', 'saas-software-technology'),
			'saas_software_technology-footer-three' => __('Style 3', 'saas-software-technology'),
			'saas_software_technology-footer-four' => __('Style 4', 'saas-software-technology'),
		)
	));	

	$wp_customize->add_setting('saas_software_technology_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'saas_software_technology_footer_background_img',array(
        'label' => __('Footer Background Image','saas-software-technology'),
        'section' => 'saas_software_technology_footer_section'
	)));

	$wp_customize->add_setting('saas_software_technology_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	  ));
	  $wp_customize->add_control('saas_software_technology_footer_img_position',array(
		  'type' => 'select',
		  'label' => __('Footer Image Position','saas-software-technology'),
		  'section' => 'saas_software_technology_footer_section',
		  'choices' 	=> array(
			  'left top' 		=> esc_html__( 'Top Left', 'saas-software-technology' ),
			  'center top'   => esc_html__( 'Top', 'saas-software-technology' ),
			  'right top'   => esc_html__( 'Top Right', 'saas-software-technology' ),
			  'left center'   => esc_html__( 'Left', 'saas-software-technology' ),
			  'center center'   => esc_html__( 'Center', 'saas-software-technology' ),
			  'right center'   => esc_html__( 'Right', 'saas-software-technology' ),
			  'left bottom'   => esc_html__( 'Bottom Left', 'saas-software-technology' ),
			  'center bottom'   => esc_html__( 'Bottom', 'saas-software-technology' ),
			  'right bottom'   => esc_html__( 'Bottom Right', 'saas-software-technology' ),
		  ),
	  ));
  
	$wp_customize->add_setting('saas_software_technology_img_footer',array(
	  'default'=> 'scroll',
	  'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_img_footer',array(
	  'type' => 'select',
	  'label' => __('Footer Background Attatchment','saas-software-technology'),
	  'choices' => array(
		'fixed' => __('fixed','saas-software-technology'),
		'scroll' => __('scroll','saas-software-technology'),
	  ),
	  'section'=> 'saas_software_technology_footer_section',
	));

	$wp_customize->add_setting('saas_software_technology_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices',
    ));
    $wp_customize->add_control('saas_software_technology_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'saas-software-technology'),
        'section'     => 'saas_software_technology_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'saas-software-technology'),
        'choices' => array(
            '1'     => __('One', 'saas-software-technology'),
            '2'     => __('Two', 'saas-software-technology'),
            '3'     => __('Three', 'saas-software-technology'),
            '4'     => __('Four', 'saas-software-technology')
        ),
    ));

    // text trasform
	$wp_customize->add_setting('saas_software_technology_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','saas-software-technology'),
		'section'=> 'saas_software_technology_footer_section',
		'choices' => array(
	      'Uppercase' => __('Uppercase','saas-software-technology'),
	      'Capitalize' => __('Capitalize','saas-software-technology'),
	      'Lowercase' => __('Lowercase','saas-software-technology'),
    	),

	));

    $wp_customize->add_setting('saas_software_technology_widgets_heading_fontsize',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float',
	));	
	$wp_customize->add_control('saas_software_technology_widgets_heading_fontsize',array(
		'label'	=> __('Footer Widgets Heading Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('saas_software_technology_widgets_heading_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
    ));
    $wp_customize->add_control('saas_software_technology_widgets_heading_font_weight',array(
        'type' => 'select',
        'label' => __('Footer Widgets Heading Font Weight','saas-software-technology'),
        'section' => 'saas_software_technology_footer_section',
        'choices' => array(
            '100' => __('100','saas-software-technology'),
            '200' => __('200','saas-software-technology'),
            '300' => __('300','saas-software-technology'),
            '400' => __('400','saas-software-technology'),
            '500' => __('500','saas-software-technology'),
            '600' => __('600','saas-software-technology'),
            '700' => __('700','saas-software-technology'),
            '800' => __('800','saas-software-technology'),
            '900' => __('900','saas-software-technology'),
        ),
	) );

    $wp_customize->add_setting('saas_software_technology_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','saas-software-technology'),
    'section' => 'saas_software_technology_footer_section',
    'choices' => array(
    	'Left' => __('Left','saas-software-technology'),
        'Center' => __('Center','saas-software-technology'),
        'Right' => __('Right','saas-software-technology')
      ),
	) );

	$wp_customize->add_setting('saas_software_technology_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','saas-software-technology'),
    'section' => 'saas_software_technology_footer_section',
    'choices' => array(
    	'Left' => __('Left','saas-software-technology'),
        'Center' => __('Center','saas-software-technology'),
        'Right' => __('Right','saas-software-technology')
        ),
	) );

    $wp_customize->add_setting( 'saas_software_technology_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','saas-software-technology' ),
      'section' => 'saas_software_technology_footer_section'
    ));

    $wp_customize->add_setting('saas_software_technology_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','saas-software-technology'),
        'section' => 'saas_software_technology_footer_section',
        'choices' => array(
            'Left' => __('Left','saas-software-technology'),
            'Right' => __('Right','saas-software-technology'),
            'Center' => __('Center','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting('saas_software_technology_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_copyright_color', array(
		'label'    => __('Copyright Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));

	$wp_customize->add_setting('saas_software_technology_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));

	$wp_customize->add_setting('saas_software_technology_copyright_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_footer_section',
	)));

	$wp_customize->add_setting('saas_software_technology_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float',
	));	
	$wp_customize->add_control('saas_software_technology_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('saas_software_technology_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float',
	));	
	$wp_customize->add_control('saas_software_technology_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'saas_software_technology_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'saas_software_technology_customize_partial_saas_software_technology_footer_copy',
		)
	);
	
	$wp_customize->add_setting('saas_software_technology_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('saas_software_technology_footer_copy',array(
		'label'	=> __('Copyright Text','saas-software-technology'),
		'section'	=> 'saas_software_technology_footer_section',
		'type'		=> 'text'
	));

	//Footer Social Icons
	$wp_customize->add_section('saas_software_technology_social_icons_section',array(
		'title'	=> __('Footer Social Icons','saas-software-technology'),
		'priority'	=> null,
		'panel' => 'saas_software_technology_panel_id',
	));
	$wp_customize->selective_refresh->add_partial(
		'saas_software_technology_facebook_url',
		array(
			'selector'        => '.social-media',
			'render_callback' => 'saas_software_technology_customize_partial_saas_software_technology_facebook_url',
		)
	);
	$wp_customize->add_setting('saas_software_technology_show_footer_social_icon',array(
        'default' => true,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_show_footer_social_icon',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Social Icons','saas-software-technology'),
      	'section' => 'saas_software_technology_social_icons_section',
	));
	$wp_customize->add_setting('saas_software_technology_footer_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('saas_software_technology_footer_facebook_url',array(
		'label'	=> __('Add Facebook link','saas-software-technology'),
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_facebook_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('saas_software_technology_footer_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
		$wp_customize,'saas_software_technology_footer_facebook_icon',array(
		'label'	=> __('Add Facebook Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_facebook_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('saas_software_technology_footer_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('saas_software_technology_footer_twitter_url',array(
		'label'	=> __('Add Twitter link','saas-software-technology'),
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_twitter_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('saas_software_technology_footer_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
		$wp_customize,'saas_software_technology_footer_twitter_icon',array(
		'label'	=> __('Add Twitter Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('saas_software_technology_footer_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('saas_software_technology_footer_instagram_url',array(
		'label'	=> __('Add Instagram link','saas-software-technology'),
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_instagram_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('saas_software_technology_footer_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
		$wp_customize,'saas_software_technology_footer_instagram_icon',array(
		'label'	=> __('Add Instagram Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('saas_software_technology_footer_pintrest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('saas_software_technology_footer_pintrest_url',array(
		'label'	=> __('Add pintrest link','saas-software-technology'),
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_pintrest_url',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('saas_software_technology_footer_pintrest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new saas_software_technology_Icon_Changer(
		$wp_customize,'saas_software_technology_footer_pintrest_icon',array(
		'label'	=> __('Add pintrest Icon','saas-software-technology'),
		'transport' => 'refresh',
		'section'	=> 'saas_software_technology_social_icons_section',
		'setting'	=> 'saas_software_technology_footer_pintrest_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'saas_software_technology_footer_icon_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_float',
	) );
	$wp_customize->add_control( 'saas_software_technology_footer_icon_font_size', array(
		'label' => __( 'Icon Font Size','saas-software-technology' ),
		'section'     => 'saas_software_technology_social_icons_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );
	$wp_customize->add_setting('saas_software_technology_footer_icon_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_footer_icon_alignment',array(
        'type' => 'select',
        'label' => __('Icon Alignment','saas-software-technology'),
        'section' => 'saas_software_technology_social_icons_section',
        'choices' => array(
            'Left' => __('Left','saas-software-technology'),
            'Right' => __('Right','saas-software-technology'),
            'Center' => __('Center','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting( 'saas_software_technology_footer_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'saas_software_technology_footer_icon_color', array(
		'label' => __('Icon Color', 'saas-software-technology'),
		'section' => 'saas_software_technology_social_icons_section',
		'settings' => 'saas_software_technology_footer_icon_color',
	)));

	//Mobile Media Section
	$wp_customize->add_section( 'saas_software_technology_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'saas-software-technology' ),
		'priority'   => null,
		'panel' => 'saas_software_technology_panel_id'
	) );

	$wp_customize->add_setting('saas_software_technology_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SAAS_Software_Technology_Icon_Changer(
        $wp_customize, 'saas_software_technology_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','saas-software-technology'),
		'section'	=> 'saas_software_technology_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('saas_software_technology_open_menu_label',array(
       'default' => __('Open Menu','saas-software-technology'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','saas-software-technology'),
       'section' => 'saas_software_technology_mobile_media_options'
    ));

	$wp_customize->add_setting('saas_software_technology_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new SAAS_Software_Technology_Icon_Changer(
        $wp_customize, 'saas_software_technology_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','saas-software-technology'),
		'section'	=> 'saas_software_technology_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('saas_software_technology_close_menu_label',array(
       'default' => __('Close Menu','saas-software-technology'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('saas_software_technology_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','saas-software-technology'),
       'section' => 'saas_software_technology_mobile_media_options'
    ));

	$wp_customize->add_setting('saas_software_technology_responsive_sticky_header',array(
        'default' => false,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_responsive_sticky_header',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Sticky Header','saas-software-technology'),
      	'section' => 'saas_software_technology_mobile_media_options',
	));

	$wp_customize->add_setting('saas_software_technology_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider','saas-software-technology'),
      	'section' => 'saas_software_technology_mobile_media_options',
	));

	$wp_customize->add_setting('saas_software_technology_slider_button_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_slider_button_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','saas-software-technology'),
      	'section' => 'saas_software_technology_mobile_media_options',
	));

    $wp_customize->add_setting('saas_software_technology_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
	));
	$wp_customize->add_control('saas_software_technology_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','saas-software-technology'),
      	'section' => 'saas_software_technology_mobile_media_options',
	));

	$wp_customize->add_setting( 'saas_software_technology_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','saas-software-technology' ),
        'section' => 'saas_software_technology_mobile_media_options'
    ));

    $wp_customize->add_setting( 'saas_software_technology_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','saas-software-technology' ),
      'section' => 'saas_software_technology_mobile_media_options'
    ));

	$wp_customize->add_setting('saas_software_technology_menu_toggle_btn_bg_color', array(
		'default'           => 'var(--secondary-color)',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'saas_software_technology_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'saas-software-technology'),
		'section'  => 'saas_software_technology_mobile_media_options',
	)));		

	//Woocommerce Section
	$wp_customize->add_section( 'saas_software_technology_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'saas-software-technology' ),
		'priority'   => null,
		'panel' => 'saas_software_technology_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'saas_software_technology_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices',
	) );

	$wp_customize->add_control('saas_software_technology_products_per_row', array(
		'label' => __( 'Product per row', 'saas-software-technology' ),
		'section'  => 'saas_software_technology_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('saas_software_technology_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'saas_software_technology_sanitize_float'
	));	
	$wp_customize->add_control('saas_software_technology_product_per_page',array(
		'label'	=> __('Product per page','saas-software-technology'),
		'section'	=> 'saas_software_technology_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('saas_software_technology_shop_sidebar',array(
       'default' => false,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','saas-software-technology'),
       'section' => 'saas_software_technology_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('saas_software_technology_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices',
	));
	$wp_customize->add_control('saas_software_technology_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'saas-software-technology'),
		'section'        => 'saas_software_technology_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'saas-software-technology'),
			'Right Sidebar' => __('Right Sidebar', 'saas-software-technology'),
		),
	));

	// single product page sidebar
	$wp_customize->add_setting( 'saas_software_technology_wocommerce_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ) );
    $wp_customize->add_control('saas_software_technology_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','saas-software-technology'),
		'section' => 'saas_software_technology_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('saas_software_technology_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'saas_software_technology_sanitize_choices',
	));
	$wp_customize->add_control('saas_software_technology_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'saas-software-technology'),
		'section'        => 'saas_software_technology_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'saas-software-technology'),
			'Right Sidebar' => __('Right Sidebar', 'saas-software-technology'),
		),
	));

	$wp_customize->add_setting('saas_software_technology_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','saas-software-technology'),
       'section' => 'saas_software_technology_woocommerce_options',
    ));

    $wp_customize->add_setting('saas_software_technology_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','saas-software-technology'),
       'section' => 'saas_software_technology_woocommerce_options',
    ));

    $wp_customize->add_setting('saas_software_technology_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','saas-software-technology'),
       'section' => 'saas_software_technology_woocommerce_options',
    ));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control( 'saas_software_technology_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('saas_software_technology_woocommerce_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'saas_software_technology_sanitize_checkbox'
    ));
    $wp_customize->add_control('saas_software_technology_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','saas-software-technology'),
       'section' => 'saas_software_technology_woocommerce_options',
    ));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_product_padding_top',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_product_padding_right',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control( 'saas_software_technology_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('saas_software_technology_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'saas_software_technology_sanitize_choices'
	));
	$wp_customize->add_control('saas_software_technology_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','saas-software-technology'),
        'section' => 'saas_software_technology_woocommerce_options',
        'choices' => array(
            'left' => __('Left','saas-software-technology'),
            'right' => __('Right','saas-software-technology'),
        ),
	) );

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_sale_top_padding',array(
		'default' => 5,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control( 'saas_software_technology_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_woocommerce_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'saas_software_technology_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'saas_software_technology_sanitize_float'
	));
	$wp_customize->add_control('saas_software_technology_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','saas-software-technology' ),
		'type' => 'number',
		'section' => 'saas_software_technology_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'saas_software_technology_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class SAAS_Software_Technology_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		load_template( trailingslashit( get_template_directory() ) . 'inc/saas-software-customize-upsell-section.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'SAAS_Software_Technology_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new SAAS_Software_Technology_Customize_Section_Pro(
				$manager,
				'saas_software_technology_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Software Technology Pro', 'saas-software-technology' ),
					'pro_text' => esc_html__( 'Get Pro','saas-software-technology' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/products/software-technology-wordpress-theme' ),
				)
			)
		);

			// Frontpage Sections Upsell.
			$manager->add_section(
				new SAAS_Software_Technology_Customizer_Upsell_Section(
					$manager, 'saas-software-technology-upsell-frontpage-sections', array(
						'panel'       => 'saas_software_technology_panel_id',
						'priority'    => 500,
						'options'     => array(
							esc_html__( 'Our Services Section', 'saas-software-technology' ),
							esc_html__( 'Our Product Section', 'saas-software-technology' ),
							esc_html__( 'Newsletter Section', 'saas-software-technology' ),
							esc_html__( 'Introduction Section', 'saas-software-technology' ),
							esc_html__( 'Our Videos Counter Section', 'saas-software-technology' ),
							esc_html__( 'Our Pricing Plan Section', 'saas-software-technology' ),
							esc_html__( 'Replace Section', 'saas-software-technology' ),
							esc_html__( 'Testimonials Section', 'saas-software-technology' ),
							esc_html__( 'Our Blog Section', 'saas-software-technology' ),
							esc_html__( 'Brand Section', 'saas-software-technology' ),
						),
						'button_url'  => esc_url( 'https://www.themescaliber.com/products/software-technology-wordpress-theme' ),
						'button_text' => esc_html__( 'View PRO version', 'saas-software-technology' ),
					)
				)
			);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'saas-software-technology-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'saas-software-technology-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
SAAS_Software_Technology_Customize::get_instance();