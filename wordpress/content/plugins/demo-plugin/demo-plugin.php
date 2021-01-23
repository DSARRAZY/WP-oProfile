<?php

/**
 * Plugin Name: Demo Plugin
 */

function sayCoucou() {
    echo '<h3 class="plugin-demo-h3">Coucou je suis un super plugin !</h3>';
}

function styleDemoCoucou() {
    wp_enqueue_style(
        'plugin-demo-css',
        plugin_dir_url( __FILE__ ).'css/style.css'
    );
}

add_action('wp_head', 'sayCoucou');
add_action('wp_footer', 'sayCoucou');
add_action('wp_enqueue_scripts', 'styleDemoCoucou');