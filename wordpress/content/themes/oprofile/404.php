<?php get_header(); ?>

<h1>Oups ! 404 !</h1>

<img class="notfound" src="https://i.pinimg.com/564x/fe/95/1b/fe951b0c2ab71b13b8ca2a96c1242c3f.jpg" alt="">

<?php

// on peut aussi générer un menu avec wp_nav_menu()

wp_nav_menu(
    [
        'theme_location' => 'main-menu'
    ]
);

?>

<?php get_footer(); ?>