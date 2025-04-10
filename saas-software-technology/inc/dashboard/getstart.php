<?php
//about theme info
add_action( 'admin_menu', 'saas_software_technology_gettingstarted' );
function saas_software_technology_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Demo Content', 'saas-software-technology'), esc_html__('Theme Demo Content', 'saas-software-technology'), 'edit_theme_options', 'saas_software_technology_guide', 'saas_software_technology_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function saas_software_technology_admin_theme_style() {
   wp_enqueue_style('saas-software-technology-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'saas_software_technology_admin_theme_style');

//guidline for about theme
function saas_software_technology_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'saas-software-technology' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="saas_software_technology_openCity(event, 'tc_demo')"><?php esc_html_e( 'Theme Demo Content', 'saas-software-technology' ); ?></button>
			<button role="tab" class="tablinks" onclick="saas_software_technology_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'saas-software-technology' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="saas_software_technology_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'saas-software-technology' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="saas_software_technology_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'saas-software-technology' ); ?></button>				
		</div>

		<div  id="tc_demo" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to SAAS Software Technology', 'saas-software-technology' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="demo">
				<h4><?php esc_html_e( 'Click the "Run Importer" button below to load demo content for SAAS Software Technology', 'saas-software-technology' ); ?></h4>
				<?php 
				/* Get Started. */ 
				require get_parent_theme_file_path( '/inc/dashboard/demo-importer.php' );
				?>
			</div>
    	</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to SAAS Software Technology Theme', 'saas-software-technology' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'saas-software-technology' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'saas-software-technology'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'saas-software-technology'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'SAAS Software Technology is a theme for the app, business, corporate, creative, elementor, its company, its solutions, software, Software Company, software development, tech, tech blog, tech support, technology, and technology company websites. This theme is responsive and ideal for digital marketing, marketing, or advertising agency. The theme is best used for SaaS Solutions, Software Management, Tech Startups, Cloud Services, Digital Platforms, IT Services, Enterprise Solutions, Business Automation, Technology Solutions, SaaS Applications, Software Integration, Data Management, Tech Innovations, Software Tools, Business Software. What is SaaS? It means the software as a service! This WP theme is perfect for your business if you want a theme in this niche. The theme’s code and all files are well-organized and well-commented to make it easy to modify. Take a look at SAAS Software Technology today, and you’ll get everything you require to design a cutting-edge website for your company or an online presentation to promote your startup, SaaS, mobile app business, or landing page for your app. It’s a theme that has been tuned to meet the demands of all those working in the field of software, including web application creators and digital agencies. With various flexible templates for your app’s website, landing pages, and other kinds of software showcases, SAAS Software Technology ensures that all aspects of your company are protected. Simply put, SaaS is perfect for landing pages for apps or startups, software, or mobile app-specific website. However, it’s not the only thing you can create your website with the Elementor Page Builder! In addition, the theme comes loaded with powerful tech blog templates ready to shine.', 'saas-software-technology' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Saas Software Technology Theme Information', 'saas-software-technology' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'saas-software-technology' ); ?></a></p>
				<p><a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'saas-software-technology' ); ?></a></p>
				<p><a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'saas-software-technology' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Saas Software Technology Pro Theme', 'saas-software-technology' ); ?></h4>
				<P><?php esc_html_e( 'This software technology WordPress theme is extremely flexible and can be used on all types of software-related websites. It is a fantastic combination of powerful features and robust features. Its Woocommerce compatibility and easy-to-use interface make it the perfect theme to build an online store. The mobile-friendly layout guarantees stunning designs that look great across different sizes of screens. The software technology WordPress theme has a variety of sections, including a Service section for the Gallery, a testimonial blog section, etc. The abundance of options for personalization and customization lets you change it easily according to your needs. Made of safe and clean code, this theme delivers speedier page loading.The software technology WordPress theme comes with SEO user-friendly, translation-ready, retina-ready, multi-purpose, and highly responsive. Perfect for landing pages and app showcase digital agency, cryptocurrency elements, landing pages mobile, mobile application presentation, SaaS software technology, software company Tech blog, and website application. Booking forms online are the main reason this theme stands out from other themes. Therefore, you should consider this software technology WordPress theme to develop a platform to offer software-related services. Additionally, this software-based WordPress theme comes with an integrated Contact Form 7 and an integrated Google map.', 'saas-software-technology' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'saas-software-technology' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'saas-software-technology' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'saas-software-technology' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'saas-software-technology' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'saas-software-technology' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'saas-software-technology' ); ?></P>
					<a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'saas-software-technology' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'saas-software-technology'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'saas-software-technology' ); ?></P>
					<a href="<?php echo esc_url( SAAS_SOFTWARE_TECHNOLOGY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'saas-software-technology'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>