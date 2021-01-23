<?php

namespace oProfile\Taxonomy;

use oProfile\PostType\CustomerPostType;

class ActivitySectorTaxonomy extends Taxonomy
{

    const TAXONOMY_LABELS = [
        'name' => 'Secteurs d\'activités',
        'singular_name' => 'Secteur d\'activité',
        'add_new_item' => 'Ajouter un secteur d\'activité'
    ];

    const TAXONOMY_KEY = 'activity_area';

    const RELATED_CPT_LIST = [CustomerPostType::POST_TYPE_KEY];

    const CAPABILITIES =  [
        'manage_terms' => 'manage_sectors',
        'edit_terms' => 'edit_sectors',
        'delete_terms' => 'delete_sectors',
        'assign_terms' => 'assign_sectors'
    ];
}
