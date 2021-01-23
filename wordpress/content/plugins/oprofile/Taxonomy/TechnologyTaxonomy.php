<?php

namespace oProfile\Taxonomy;

use oProfile\PostType\ProjectPostType;

class TechnologyTaxonomy extends Taxonomy
{

    const TAXONOMY_LABELS = [
        'name' => 'Technologies',
        'singular_name' => 'Technologie',
        'add_new_item' => 'Ajouter une nouvelle technologie'
    ];

    const TAXONOMY_KEY = 'technology';

    const RELATED_CPT_LIST = [ProjectPostType::POST_TYPE_KEY];

    const CAPABILITIES =  [
        'manage_terms' => 'manage_technologies',
        'edit_terms' => 'edit_technologies',
        'delete_terms' => 'delete_technologies',
        'assign_terms' => 'assign_technologies'
    ];
}
