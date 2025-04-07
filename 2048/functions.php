<?php
/**
 * Enqueue game scripts and styles
 */
function my_2048_game_assets() {
    // Only load on the game template
    if (is_page_template('template-2048.php')) {
        // Enqueue jQuery (included with WordPress)
        wp_enqueue_script('jquery');
        
        // Game CSS
        wp_enqueue_style(
            'game2048-css', 
            get_template_directory_uri() . '/css/game2048.css',
            array(),
            filemtime(get_template_directory() . '/css/game2048.css')
        );
        
        // Game JS
        wp_enqueue_script(
            'game2048-js',
            get_template_directory_uri() . '/js/game2048.js',
            array('jquery'),
            filemtime(get_template_directory() . '/js/game2048.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'my_2048_game_assets');

/**
 * Theme setup
 */
function my_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    
    // Register navigation menus if needed
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');