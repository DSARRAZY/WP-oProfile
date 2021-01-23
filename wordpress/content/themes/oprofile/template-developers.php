<?php

// objectif de ce template : lister les développeurs

/*
Template Name: Listing développeurs
*/

get_header();

// on récupère les utilisateurs qui ont le rôle développeur
// https://developer.wordpress.org/reference/functions/get_users/
$developers = get_users(['role__in' => ['developer']]);
// var_dump($developers);

foreach ($developers as $developer) : ?>

    <article class="excerpt">
        <a href="<?php echo get_author_posts_url($developer->ID);?>">
            <h3 class="excerpt__title"><?php echo $developer->display_name; ?></h3>
        </a>
        <p class="excerpt__text"><?php echo get_the_excerpt(); ?></p>
    </article>

<?php endforeach;

get_footer();
