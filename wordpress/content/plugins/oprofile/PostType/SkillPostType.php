<?php

namespace oProfile\PostType;

class SkillPostType extends PostType
{
    // https://www.php.net/manual/fr/language.oop5.constants.php

    const POST_TYPE_LABELS = [
        'name' => 'Compétences',
        'singular_name' => 'Compétence',
        'edit_item' => 'Editer une compétence',
        'search_items' => 'Rechercher une compétence'
    ];
    
    const POST_TYPE_KEY = 'skill';

    const CAPABILITIES = [
        'edit_posts' => 'edit_skills',
        'publish_posts' => 'publish_skills',
        'read_post' => 'read_skill',
        'delete_post' => 'delete_skill',
        'edit_others_posts' => 'edit_others_skills',
        'delete_others_posts' => 'delete_others_skills',
        // http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
        // https://wordpress.stackexchange.com/questions/155644/whats-the-difference-between-role-and-meta-capabilities-when-to-use-map-meta-c
        'edit_post' => 'edit_skill'
    ];
}