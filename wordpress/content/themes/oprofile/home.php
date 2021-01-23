<?php

get_header();

?>

<section>
    <h2 class="section-title">Les articles de la communauté</h2>
    <div class="excerpt-list">

        <?php

        if (have_posts()) : while (have_posts()) : the_post();

                get_template_part('template-parts/post/excerpt');

            endwhile;
        endif;

        ?>

    </div>
</section>

<?php

get_footer();