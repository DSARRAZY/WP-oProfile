<?php

/**
 * Affiche n articles aléatoirement
 *
 * @param int $number nombre d'articles à afficher
 * @return void
 */
function the_random_posts($number = 8)
{
    $homepage_post_query = new WP_Query(
        [
            // on va chercher des articles
            'post_type' => 'post',
            // on va en chercher 8
            'posts_per_page' => $number,
            // et on va les chercher aléatoirement
            'orderby' => 'rand'
        ]
    );

    if ($homepage_post_query->have_posts()) : while ($homepage_post_query->have_posts()) : $homepage_post_query->the_post();

            get_template_part('template-parts/post/excerpt');

        endwhile;
    endif;
}

/**
 * Affiche les company
 *
 * @return void
 */
function the_companies()
{
    $homepage_company_query = new WP_Query(
        [
            // on va chercher des articles
            // 'post_type' => 'post',
            // 'category_name' => 'company'
            'post_type' => 'customer',
            'posts_per_page' => 8,
            'orderby' => 'name',
            'order' => 'ASC'
        ]
    );

    if ($homepage_company_query->have_posts()) : while ($homepage_company_query->have_posts()) : $homepage_company_query->the_post();

            get_template_part('template-parts/company/excerpt');

        endwhile;
    endif;
}

/**
 * Affiche les compétences d'un développeur
 * @param int $id id du développeur
 * @return void
 */
function developer_skills($id)
{
    // on a besoin de la global $post
    global $post;

    // on récupère les compétences liées à l'utilisateur dont on a fourni l'id en paramètre ($id)
    $featured_skills = get_field('skills', 'user_' . $id);
    // var_dump($featured_skills);
    if ($featured_skills) :
        foreach ($featured_skills as $post) :
            // https://developer.wordpress.org/reference/functions/setup_postdata/
            setup_postdata($post);
            get_template_part('template-parts/skill/excerpt');
        endforeach;
        wp_reset_postdata();
    endif;
}

/**
 * Affiche 3 projets aléatoires
 *
 */
function the_random_others_projects() {

    $random_projects = new WP_Query(
        [
            'post_type' => 'project',
            'orderby' => 'rand',
            'posts_per_page' => 3
        ]
    );

    if ($random_projects->have_posts()) : while ($random_projects->have_posts()) : $random_projects->the_post();

            get_template_part('template-parts/post/excerpt');

        endwhile;
    endif;

}
