<?php get_template_part('template-parts/header/start'); ?>
<div class="hero">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h2 class="hero__title"><?php the_title(); ?></h2>
            <p class="hero__text"><?php echo get_the_content(); ?></p>

    <?php endwhile;
    endif; ?>

    <div class="hero__cta">
        <a href="<?php echo bloginfo('url') . '/les-developpeurs' ?>" class="button">Les profils</a>
        <a href="javascript:void(0)" class="button">Le blog de la communauté</a>
    </div>
</div>
</header>

<main>