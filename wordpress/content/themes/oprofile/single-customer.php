<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('template-parts/post/full');
    
endwhile; endif;

// on peut récupérer les metadata avec les fonctions WordPres...

$customerUrl = get_post_meta( get_the_ID(), 'url_du_site', true );
$customerGitHubUrl = get_post_meta( get_the_ID(), 'url_github', true );
$customerEmail = get_post_meta( get_the_ID(), 'email', true );

echo '<pre style="color:black">';

var_dump($customerUrl, $customerGitHubUrl, $customerEmail);

echo '</pre>';

// Mais aussi très simplement avec les fonctions fournies par ACF
// https://www.advancedcustomfields.com/resources/
// (voir ci-dessous)

echo '<pre style="color:black">';

var_dump(get_field('email'));

echo '</pre>';


?>

<p><?php the_field('url_du_site'); ?></p>

<?

get_footer();