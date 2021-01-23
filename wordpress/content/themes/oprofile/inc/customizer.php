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

    $wp_customize->add_setting(
        'oprofile_theme_footer_color',
        [
            'default'    => '#333333',
            'type'       => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback'  => 'esc_attr',
        ],
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

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
        'oprofile_theme_footer_color',
        [
            'label'      => 'Footer Background Color',
            'settings'   => 'oprofile_theme_footer_color',
            'section'    => 'oprofile_theme_footer',
        ],
    ));

}

add_action('customize_register', 'oprofile_theme_customize_register');

function oprofile_customizer_css() {
    ?>
    <style type="text/css">
      .footer  {
        background-color: <?php echo get_theme_mod( 'oprofile_theme_footer_color' ); ?>;
        }
    </style>
    <?php
};
add_action( 'wp_head', 'oprofile_customizer_css' );