<?php

function oprofile_theme_customize_register($wp_customize)
{

    // 1. on créé un panel
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/

    $wp_customize->add_panel(
        'oprofile_theme',
        [
            'title' => 'Configuration du thème oProfile', // titre affiché dans le BO
            'priority' => 0 // ordre d'affichage dans le BO
        ]
    );

    // 2. on créé une section
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
    $wp_customize->add_section(
        'oprofile_theme_footer',
        [
            'title' => 'Footer', // titre affiché dans le BO
            'panel' => 'oprofile_theme' // panel sur lequel on se rattache
        ]
    );

    // 3. on créé un setting
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
    $wp_customize->add_setting(
        'oprofile_theme_footer_email',
        [
            'type' => 'theme_mod' // définit la manière de récupérer le setting sur le front
        ]
    );

    // 4. on créé un control
    // https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
    $wp_customize->add_control(
        'oprofile_theme_footer_email',
        [
            'type' => 'email', // type de champ
            'label' => 'Email du footer',
            'section' => 'oprofile_theme_footer'
        ]
    );

}

add_action('customize_register', 'oprofile_theme_customize_register');
