<?php

function oprofile_theme_enqueue_scripts() {

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto+Slab&display=swap'
    );

    wp_enqueue_style(
        'main-css',
        get_theme_file_uri('dist/index.css'),
        ['google-fonts'],
        '20210112'
    );

    wp_enqueue_script(
        'main-js',
        get_theme_file_uri('dist/index.js'),
        [],
        '20210112',
        true
    );
}

add_action('wp_enqueue_scripts', 'oprofile_theme_enqueue_scripts');