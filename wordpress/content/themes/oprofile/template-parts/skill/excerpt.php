<article class="skills__item">
    <h3 class="skills__item__title"><?php the_title(); ?></h3>
    <div class="skills__item__toggle-btn">
        <button>Lire plus</button>
    </div>
    <p class="skills__item__text"><?php echo get_the_excerpt(); ?></p>
    <div class="skills__item__icon"><i class="<?php the_field('icone'); ?>"></i></div>
</article>