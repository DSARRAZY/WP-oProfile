<?php

namespace oProfile\PostType;

class CustomerPostType extends PostType
{
    // https://www.php.net/manual/fr/language.oop5.constants.php

    const POST_TYPE_LABELS = [
        'name' => 'Clients',
        'singular_name' => 'Client',
        'edit_item' => 'Editer un client',
        'search_items' => 'Rechercher un client'
    ];

    const POST_TYPE_KEY = 'customer';

    const CAPABILITIES = [
        'edit_posts' => 'edit_customers',
        'publish_posts' => 'publish_customers',
        'read_post' => 'read_customer',
        'delete_post' => 'delete_customer',
        'edit_others_posts' => 'edit_others_customers',
        'delete_others_posts' => 'delete_others_customers',
        'edit_post' => 'edit_customer'
    ];
}
