<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('template-parts/post/full');
    
endwhile; endif;

?>

<?php

// https://codex.wordpress.org/Metadata_API
// pour récupérer la valeur d'une metadata, on peut utiliser get_post_meta();
// get_post_meta() a besoin de :
// - l'ID du post => get_the_ID()
// - la key de la metadata => dans notre cas, 'url'
// - on peut aussi lui demander de récupérer uniquement la première valeur (3e paramètre à 'true'), en effet, une metadata peut avoir plusieurs valeurs pour une même clef (si c'est le cas, on peut récupérer un array)

// on récupère la valeur de la metadata 'url'
$projectUrl = get_post_meta( get_the_ID(), 'url', true );

?>

<p>Voici le lien du projet : <a href="<?php echo $projectUrl; ?>"><?php echo $projectUrl; ?></a></p>

<h2 style="color:black;font-size:2em;">Découvrez d'autres projets</h2>

<?php the_random_others_projects(); ?>

<?php

get_footer();