<?php get_header('front-page'); ?>
<section>
    <h2 class="section-title">Les articles de la communauté</h2>
    <div class="excerpt-list">

        <?php the_random_posts(4); ?>

    </div>
</section>
<section>
    <h2 class="section-title">Ils nous font confiance</h2>
    <div class="company-list">

        <?php the_companies(); ?>

    </div>
</section>
<?php get_footer(); ?>