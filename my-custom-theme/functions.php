<?php
function my_2048_game_scripts() {
    if (is_page_template('template-2048.php')) {
        wp_enqueue_style('game2048-css', get_template_directory_uri() . '/css/game2048.css');
        wp_enqueue_script('game2048-js', get_template_directory_uri() . '/js/game2048.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'my_2048_game_scripts');
?>