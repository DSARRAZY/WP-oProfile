<article class="excerpt" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
    <a href="<?php the_permalink(); ?>">
        <h3 class="excerpt__title"><?php the_title(); ?></h3>
    </a>
    <p class="excerpt__text"><?php echo get_the_excerpt(); ?></p>
</article>