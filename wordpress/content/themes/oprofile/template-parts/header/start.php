<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <?php get_template_part('template-parts/nav/main-nav'); ?>
    <header class="header <?php if (!is_front_page()) : ?>header--small<?php endif; ?>">
        <?php
        // https://codex.wordpress.org/Conditional_Tags
        // var_dump(is_home()); // true si page des articles
        // var_dump(is_front_page()); // true si page d'accueil
        // var_dump(is_single()); // true si on est sur un post (single.php par exemple)
        ?>
        <div class="top-bar">
            <a href="<?php echo bloginfo('url'); ?>">
                <h1 class="top-bar__logo"><?php echo bloginfo('name'); ?></h1>
            </a>
            <div class="top-bar__actions">
                <!-- on utilise javascript:void(0) dans l'attribut href pour empêcher les comportements non désirés au clic -->
                <a href="javascript:void(0)">
                    <i class="fas fa-id-card"></i>
                </a>
                /
                <a href="javascript:void(0)">
                    <i class="fas fa-users"></i>
                </a>
            </div>
            <div class="top-bar__burger-button">
                <i class="fas fa-bars"></i>
            </div>
        </div>