<?php
/**
 * SAAS Software Technology functions and definitions
 *
 * @package SAAS Software Technology
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function saas_software_technology_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'saas_software_technology_setup' ) ) :

function saas_software_technology_setup() {

	$GLOBALS['content_width'] = apply_filters( 'saas_software_technology_content_width', 640 );

	load_theme_textdomain( 'saas-software-technology', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('saas-software-technology-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'saas-software-technology' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', saas_software_technology_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'saas_software_technology_activation_notice' );
	}	
}
endif;
add_action( 'after_setup_theme', 'saas_software_technology_setup' );

// Dashboard Theme Notification
function saas_software_technology_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'saas-software-technology' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our saas software technology theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'saas-software-technology' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=saas_software_technology_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'saas-software-technology' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function saas_software_technology_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'saas-software-technology' ),
		'description'   => __( 'Appears on blog page sidebar', 'saas-software-technology' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'saas-software-technology' ),
		'description'   => __( 'Appears on page sidebar', 'saas-software-technology' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'         => __( 'Third Column Sidebar', 'saas-software-technology' ),
		'description' => __( 'Appears on page sidebar', 'saas-software-technology' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$saas_software_technology_widget_areas = get_theme_mod('saas_software_technology_footer_widget_layout', '4');
	for ($i=1; $i<=$saas_software_technology_widget_areas; $i++) {
		register_sidebar( array(
			'name'        => __( 'Footer Nav ', 'saas-software-technology' ) . $i,
			'id'          => 'footer-' . $i,
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'saas-software-technology' ),
		'description'   => __( 'Appears on shop page', 'saas-software-technology' ),	
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'saas-software-technology' ),
		'description'   => __( 'Appears on shop page', 'saas-software-technology' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'saas_software_technology_widgets_init' );

/* Theme Font URL */
function saas_software_technology_font_url() {
	$font_family = array(
	    'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Allura',
		'Amatic SC:wght@400;700',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Assistant:wght@200;300;400;500;600;700;800',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Berkshire Swash',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat:wght@400;500;600;700',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Comfortaa:wght@300;400;500;600;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days One',
		'DM Serif Display:ital@0;1',
		'Dosis:wght@200;300;400;500;600;700;800',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Familjen Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'IM Fell English SC',
		'Julius Sans One',
		'Jomhuria',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaisei HarunoUmi:wght@400;500;700',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaushan Script',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Ropa Sans:ital@0;1',
		'Russo One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Sen:wght@400;700;800',
		'Slabo 13px',
		'Slabo 27px',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Shadows Into Light Two',
		'Shadows Into Light',
		'Sacramento',
		'Sail',
		'Shrikhand',
		'League Spartan:wght@100;200;300;400;500;600;700;800;900',
		'Staatliches',
		'Stylish',
		'Tangerine:wght@400;700',
		'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
		'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Unica One',
		'VT323',
		'Varela Round',
		'Vampiro One',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Yeseva One',
		'ZCOOL XiaoWei'
	);
	
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function saas_software_technology_scripts() {
	wp_enqueue_style( 'saas-software-technology-font', saas_software_technology_font_url(), array() );
	wp_enqueue_style( 'saas-software-technology-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'saas-software-technology-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'saas-software-technology-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'saas-software-technology-block-style', get_template_directory_uri().'/css/block-style.css' );

    // Body
    $saas_software_technology_body_color = get_theme_mod('saas_software_technology_body_color', '');
    $saas_software_technology_body_font_family = get_theme_mod('saas_software_technology_body_font_family', '');
    $saas_software_technology_body_font_size = get_theme_mod('saas_software_technology_body_font_size', '');
	$saas_software_technology_body_font_weight = get_theme_mod('saas_software_technology_body_font_weight', '');
	// Paragraph
    $saas_software_technology_paragraph_color = get_theme_mod('saas_software_technology_paragraph_color', '');
    $saas_software_technology_paragraph_font_family = get_theme_mod('saas_software_technology_paragraph_font_family', '');
    $saas_software_technology_paragraph_font_size = get_theme_mod('saas_software_technology_paragraph_font_size', '');
	$saas_software_technology_paragraph_font_weight = get_theme_mod('saas_software_technology_paragraph_font_weight', '');	
	// "a" tag
	$saas_software_technology_atag_color = get_theme_mod('saas_software_technology_atag_color', '');
    $saas_software_technology_atag_font_family = get_theme_mod('saas_software_technology_atag_font_family', '');
	$saas_software_technology_atag_font_weight = get_theme_mod('saas_software_technology_atag_font_weight', '');	
	// "li" tag
	$saas_software_technology_li_color = get_theme_mod('saas_software_technology_li_color', '');
    $saas_software_technology_li_font_family = get_theme_mod('saas_software_technology_li_font_family', '');
	$saas_software_technology_li_font_weight = get_theme_mod('saas_software_technology_li_font_weight', '');
	// H1
	$saas_software_technology_h1_color = get_theme_mod('saas_software_technology_h1_color', '');
    $saas_software_technology_h1_font_family = get_theme_mod('saas_software_technology_h1_font_family', '');
    $saas_software_technology_h1_font_size = get_theme_mod('saas_software_technology_h1_font_size', '');
	$saas_software_technology_h1_font_weight = get_theme_mod('saas_software_technology_h1_font_weight', '');
	// H2
	$saas_software_technology_h2_color = get_theme_mod('saas_software_technology_h2_color', '');
    $saas_software_technology_h2_font_family = get_theme_mod('saas_software_technology_h2_font_family', '');
    $saas_software_technology_h2_font_size = get_theme_mod('saas_software_technology_h2_font_size', '');
	$saas_software_technology_h2_font_weight = get_theme_mod('saas_software_technology_h2_font_weight', '');
	// H3
	$saas_software_technology_h3_color = get_theme_mod('saas_software_technology_h3_color', '');
    $saas_software_technology_h3_font_family = get_theme_mod('saas_software_technology_h3_font_family', '');
    $saas_software_technology_h3_font_size = get_theme_mod('saas_software_technology_h3_font_size', '');
	$saas_software_technology_h3_font_weight = get_theme_mod('saas_software_technology_h3_font_weight', '');
	// H4
	$saas_software_technology_h4_color = get_theme_mod('saas_software_technology_h4_color', '');
    $saas_software_technology_h4_font_family = get_theme_mod('saas_software_technology_h4_font_family', '');
    $saas_software_technology_h4_font_size = get_theme_mod('saas_software_technology_h4_font_size', '');
	$saas_software_technology_h4_font_weight = get_theme_mod('saas_software_technology_h4_font_weight', '');
	// H5
	$saas_software_technology_h5_color = get_theme_mod('saas_software_technology_h5_color', '');
    $saas_software_technology_h5_font_family = get_theme_mod('saas_software_technology_h5_font_family', '');
    $saas_software_technology_h5_font_size = get_theme_mod('saas_software_technology_h5_font_size', '');
	$saas_software_technology_h5_font_weight = get_theme_mod('saas_software_technology_h5_font_weight', '');
	// H6
	$saas_software_technology_h6_color = get_theme_mod('saas_software_technology_h6_color', '');
    $saas_software_technology_h6_font_family = get_theme_mod('saas_software_technology_h6_font_family', '');
    $saas_software_technology_h6_font_size = get_theme_mod('saas_software_technology_h6_font_size', '');
	$saas_software_technology_h6_font_weight = get_theme_mod('saas_software_technology_h6_font_weight', '');

	//footer icon color
	$saas_software_technology_footer_icon_color = get_theme_mod('saas_software_technology_footer_icon_color', '');	

	$saas_software_technology_custom_css ='
	    body{
		    color:'.esc_attr($saas_software_technology_body_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_body_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_body_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_body_font_weight).'!important;
		}
		p,span{
		    color:'.esc_attr($saas_software_technology_paragraph_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_paragraph_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_paragraph_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_paragraph_font_weight).'!important;
		}
		a{
		    color:'.esc_attr($saas_software_technology_atag_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_atag_font_family).';
			font-weight: '.esc_attr($saas_software_technology_atag_font_weight).'!important;
		}
		li{
		    color:'.esc_attr($saas_software_technology_li_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_li_font_family).';
			font-weight: '.esc_attr($saas_software_technology_li_font_weight).'!important;
		}
		h1{
		    color:'.esc_attr($saas_software_technology_h1_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h1_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h1_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h1_font_weight).'!important;
		}
		h2{
		    color:'.esc_attr($saas_software_technology_h2_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h2_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h2_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h2_font_weight).'!important;
		}
		h3{
		    color:'.esc_attr($saas_software_technology_h3_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h3_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h3_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h3_font_weight).'!important;
		}
		h4{
		    color:'.esc_attr($saas_software_technology_h4_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h4_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h4_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h4_font_weight).'!important;
		}
		h5{
		    color:'.esc_attr($saas_software_technology_h5_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h5_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h5_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h5_font_weight).'!important;
		}
		h6{
		    color:'.esc_attr($saas_software_technology_h6_color).'!important;
		    font-family: '.esc_attr($saas_software_technology_h6_font_family).'!important;
		    font-size: '.esc_attr($saas_software_technology_h6_font_size).'px !important;
			font-weight: '.esc_attr($saas_software_technology_h6_font_weight).'!important;
		}

		#footer .socialicons i{
			color:'.esc_attr($saas_software_technology_footer_icon_color).'!important;
	    }				
		';
	wp_add_inline_style( 'saas-software-technology-basic-style',$saas_software_technology_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'saas-software-technology-basic-style',$saas_software_technology_custom_css );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'saas-software-technology-custom-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saas_software_technology_scripts' );

/*radio button sanitization*/
function saas_software_technology_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function saas_software_technology_string_limit_words($string, $word_limit) {
	if ($word_limit == 0) {
        return ''; // Return an empty string if word limit is 0
    }
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function saas_software_technology_blog_post_featured_image_dimension(){
	if(get_theme_mod('saas_software_technology_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

/**
 * Enqueue block editor style
 */
function saas_software_technology_block_editor_styles() {
	wp_enqueue_style( 'saas-software-technology-font', saas_software_technology_font_url(), array() );
	wp_enqueue_style( 'saas-software-technology-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'saas_software_technology_block_editor_styles' );

function saas_software_technology_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );

  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'saas_software_technology_loop_columns');
if (!function_exists('saas_software_technology_loop_columns')) {
	function saas_software_technology_loop_columns() {
		$columns = get_theme_mod( 'saas_software_technology_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'saas_software_technology_shop_per_page', 9 );
function saas_software_technology_shop_per_page( $saas_software_technology_cols ) {
  	$saas_software_technology_cols = get_theme_mod( 'saas_software_technology_product_per_page', 9 );
	return $saas_software_technology_cols;
}

// URL DEFINES
define('SAAS_SOFTWARE_TECHNOLOGY_SITE_URL',__('https://www.themescaliber.com/products/free-saas-wordpress-theme','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_FREE_THEME_DOC',__('https://preview.themescaliber.com/doc/free-saas-software-technology/','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_SUPPORT',__('https://wordpress.org/support/theme/saas-software-technology/','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_REVIEW',__('https://wordpress.org/support/theme/saas-software-technology/reviews/','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_BUY_NOW',__('https://www.themescaliber.com/products/software-technology-wordpress-theme','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_LIVE_DEMO',__('https://preview.themescaliber.com/saas-software-technology-pro/','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_PRO_DOC',__('https://preview.themescaliber.com/doc/saas-software-technology-pro/','saas-software-technology'));
define('SAAS_SOFTWARE_TECHNOLOGY_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','saas-software-technology'));
if ( ! defined( 'SAAS_SOFTWARE_TECHNOLOGY_PRO_URL_PRO_NAME' ) ) {
	define( 'SAAS_SOFTWARE_TECHNOLOGY_PRO_NAME', __( 'SAAS Software Technology Pro Theme', 'saas-software-technology' ));
}
if ( ! defined( 'SAAS_SOFTWARE_TECHNOLOGY_PRO_URL' ) ) {
	define( 'SAAS_SOFTWARE_TECHNOLOGY_PRO_URL', esc_url('https://www.themescaliber.com/themes/saas-software-technology-wordpress-theme/'));
}

function saas_software_technology_credit_link() {
    echo "<a href=".esc_url(SAAS_SOFTWARE_TECHNOLOGY_SITE_URL)." target='_blank'>".esc_html__('SAAS Software Technology WordPress Theme','saas-software-technology')."</a>";
}

function saas_software_technology_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function saas_software_technology_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'saas_software_technology_post_navigation' ) ) {
	function saas_software_technology_post_navigation() {
		$saas_software_technology_pagination_type = get_theme_mod( 'saas_software_technology_post_navigation_type', 'numbers' );
		if ( $saas_software_technology_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'saas-software-technology' ),
	            'next_text'          => __( 'Next page', 'saas-software-technology' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'saas-software-technology' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';

/* Block Pattern */
require get_template_directory() . '/block-patterns.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';