<article class="company">
    <img style="width: 200px;" src="<?php the_post_thumbnail_url(); ?>" alt="Le logo de <?php the_title(); ?>" class="company__logo">
    <h3 class="company__title"><?php the_title(); ?></h3>
    <p class="company__text"><?php echo get_the_excerpt(); ?></p>
</article>