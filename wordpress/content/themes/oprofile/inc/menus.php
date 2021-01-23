<?php

function oprofile_register_menus() {
    // on déclare des emplacements pour les menus
    register_nav_menus(
        [
            'main-menu' => 'Menu principal',
            'footer-menu' => 'Menu du footer'
        ]
    );
}

add_action('after_setup_theme', 'oprofile_register_menus');

function getMainMenuItems() {
    // get_nav_menu_locations() nous renvoie un array avec 'identifiant-emplacement-menu' => id-menu-associé-dans-le-BO
    $menuLocations = get_nav_menu_locations();
    // var_dump($menuLocations);
    // exit;
    // on récupère l'id du menu
    $mainMenuId = $menuLocations['main-menu'];
    // wp_get_nav_menu_items() nous renvoie un array avec les items d'un menu
    return wp_get_nav_menu_items($mainMenuId);
}