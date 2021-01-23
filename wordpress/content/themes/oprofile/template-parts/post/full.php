<section class="single-post">
    <h2 class="section-title"><?php the_title(); ?></h2>
    <img class="single-post__featured" src="<?php the_post_thumbnail_url(); ?>" alt="Lorem Ipsum">

    <div class="single-post__meta">Par <a href="#"><?php the_author(); ?></a>, le <?php the_date(); ?></div>

    <?php the_content(); ?>
    
</section>