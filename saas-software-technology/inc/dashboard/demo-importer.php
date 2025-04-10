<div class="theme-import">
	<?php 
        // Check if the demo import has been completed
        $saas_software_technology_demo_import_completed = get_option('saas_software_technology_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($saas_software_technology_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'saas-software-technology') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '"  class= "run-import view-site" target="_blank">' . esc_html__('VIEW SITE', 'saas-software-technology') . '</a></span>';
        }

		// POST and update the customizer and other related data
        if (isset($_POST['submit'])) {

            // ------- Create Nav Menu --------
            $saas_software_technology_menuname = 'Main Menus';
            $saas_software_technology_bpmenulocation = 'primary';
            $saas_software_technology_menu_exists = wp_get_nav_menu_object($saas_software_technology_menuname);

            if (!$saas_software_technology_menu_exists) {
                $saas_software_technology_menu_id = wp_create_nav_menu($saas_software_technology_menuname);

                // Create Home Page
                $saas_software_technology_home_title = 'Home';
                $saas_software_technology_home = array(
                    'post_type' => 'page',
                    'post_title' => $saas_software_technology_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $saas_software_technology_home_id = wp_insert_post($saas_software_technology_home);
                // Assign Home Page Template
                add_post_meta($saas_software_technology_home_id, '_wp_page_template', 'page-template/custom-frontpage.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $saas_software_technology_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($saas_software_technology_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'saas-software-technology'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $saas_software_technology_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $saas_software_technology_pages_title = 'Pages';
                $saas_software_technology_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $saas_software_technology_pages = array(
                    'post_type' => 'page',
                    'post_title' => $saas_software_technology_pages_title,
                    'post_content' => $saas_software_technology_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $saas_software_technology_pages_id = wp_insert_post($saas_software_technology_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($saas_software_technology_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'saas-software-technology'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $saas_software_technology_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $saas_software_technology_about_title = 'About Us';
                $saas_software_technology_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $saas_software_technology_about = array(
                    'post_type' => 'page',
                    'post_title' => $saas_software_technology_about_title,
                    'post_content' => $saas_software_technology_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $saas_software_technology_about_id = wp_insert_post($saas_software_technology_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($saas_software_technology_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'saas-software-technology'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $saas_software_technology_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Set the menu location if it's not already set
                if (!has_nav_menu($saas_software_technology_bpmenulocation)) {
                    $saas_software_technology_locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($saas_software_technology_locations)) {
                        $saas_software_technology_locations = array();
                    }
                    $saas_software_technology_locations[$saas_software_technology_bpmenulocation] = $saas_software_technology_menu_id;
                    set_theme_mod('nav_menu_locations', $saas_software_technology_locations);
                }
                
        }     

            //Slider Section
            set_theme_mod( 'saas_software_technology_slider_hide_show', true ); 
            set_theme_mod( 'saas_software_technology_slider_small_title', 'Smart Softwares For A Better Tomarrow!' ); 
            set_theme_mod( 'saas_software_technology_slider_button_text', 'Read More' ); 
            set_theme_mod( 'saas_software_technology_slider_button_link', '#' ); 

            $saas_software_technology_slider_titles = [
                'The Best Software As Per Your Needs!',
                'Innovative Solutions for Every Business',
                'Cutting-Edge Technology at Your Fingertips',
                'Transform Your Business with Our Software',
            ];            
            for($saas_software_technology_i=1;$saas_software_technology_i<=4;$saas_software_technology_i++){
                $saas_software_technology_slider_title = $saas_software_technology_slider_titles[$saas_software_technology_i - 1];
                $saas_software_technology_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard';
                // Create post object
                $saas_software_technology_my_post = array(
                'post_title'    => wp_strip_all_tags( $saas_software_technology_slider_title ),
                'post_content'  => $saas_software_technology_slider_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                );
 
                // Insert the post into the database
                $saas_software_technology_post_id = wp_insert_post( $saas_software_technology_my_post );
 
                if ($saas_software_technology_post_id) {
                  // Set the theme mod for the slider page
                  set_theme_mod('saas_software_technology_slider_page' . $saas_software_technology_i, $saas_software_technology_post_id);
 
                   $saas_software_technology_image_url = get_template_directory_uri().'/images/slider-image'.$saas_software_technology_i.'.png';
 
                 $saas_software_technology_image_id = media_sideload_image($saas_software_technology_image_url, $saas_software_technology_post_id, null, 'id');
 
                     if (!is_wp_error($saas_software_technology_image_id)) {
                         // Set the downloaded image as the post's featured image
                         set_post_thumbnail($saas_software_technology_post_id, $saas_software_technology_image_id);
                     }
                 }
            } 

            //About Section
            set_theme_mod( 'saas_software_technology_about_hide_show', true ); 
            set_theme_mod( 'saas_software_technology_section_title', 'About Us' ); 

            $saas_software_technology_about_texts = array(
                1 => 'Latest Technology',
                2 => 'Marketing Management',
            );
        
            // Loop through and set the theme mods for each About Text
            foreach ( $saas_software_technology_about_texts as $saas_software_technology_count => $saas_software_technology_text ) {
                set_theme_mod( 'saas_software_technology_about_list_text' . $saas_software_technology_count, $saas_software_technology_text );
            }
     
            $saas_software_technology_slider_title = 'We\'re Leading Software Developers & Publisher!';
            $saas_software_technology_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard';

            // Create post object
            $saas_software_technology_my_post = array(
                'post_title'   => wp_strip_all_tags( $saas_software_technology_slider_title ),
                'post_content' => $saas_software_technology_slider_content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
            );

            // Insert the post into the database
            $saas_software_technology_post_id = wp_insert_post( $saas_software_technology_my_post );

            if ( $saas_software_technology_post_id ) {
                // Set the theme mod for the slider page
                set_theme_mod( 'saas_software_technology_about_page', $saas_software_technology_post_id );

                // Define the image URL
                $saas_software_technology_image_url = get_template_directory_uri() . '/images/about.png';

                // Sideload the image and attach it to the post
                $saas_software_technology_image_id = media_sideload_image( $saas_software_technology_image_url, $saas_software_technology_post_id, null, 'id' );

                if ( ! is_wp_error( $saas_software_technology_image_id ) ) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail( $saas_software_technology_post_id, $saas_software_technology_image_id );
                }
            }

            //Copyright Text
            set_theme_mod( 'saas_software_technology_footer_copy', 'By ThemesCaliber' ); 

            // Set the demo import completion flag
    		update_option('saas_software_technology_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'saas-software-technology') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="run-import site-btn" target="_blank">' . esc_html__('VIEW SITE', 'saas-software-technology') . '</a></span>';

        }
    ?>
  
    <p class="note"><?php esc_html_e( 'Please Note: If your website is live and already contains data, we recommend creating a backup first. Running this importer will replace your current settings with the custom values from the demo.', 'saas-software-technology' ); ?></p>
        <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=saas_software_technology_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('saas_software_technology_demo_import_completed')) : ?>
            <form method="post">
                <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','saas-software-technology'); ?>" class="button button-primary button-large">
            </form>
        <?php endif; ?>
        </form>
        <script type="text/javascript">
            function validate(valid) {
                if(confirm("Do you really want to import the theme demo content?")){
                    document.forms[0].submit();
                }
                else {
                    return false;
                }
            }
        </script>
    </div>