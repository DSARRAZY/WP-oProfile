<?php

namespace oProfile\PostType;

class ProjectPostType extends PostType
{
    // https://www.php.net/manual/fr/language.oop5.constants.php

    const POST_TYPE_LABELS = [
        'name' => 'Projets',
        'singular_name' => 'Projet',
        'edit_item' => 'Editer un projet',
        'search_items' => 'Rechercher un projet'
    ];
    
    const POST_TYPE_KEY = 'project';

    const CAPABILITIES = [
        'edit_posts' => 'edit_projects',
        'publish_posts' => 'publish_projects',
        'read_post' => 'read_project',
        'delete_post' => 'delete_project',
        'edit_others_posts' => 'edit_others_projects',
        'delete_others_posts' => 'delete_others_projects',
        // http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
        // https://wordpress.stackexchange.com/questions/155644/whats-the-difference-between-role-and-meta-capabilities-when-to-use-map-meta-c
        'edit_post' => 'edit_project'
    ];
}