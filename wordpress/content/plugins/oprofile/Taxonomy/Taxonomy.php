<?php

namespace oProfile\Taxonomy;

class Taxonomy
{

    /**
     * Register a custom taxonomy
     *
     */
    static public function register()
    {
        $labels = static::TAXONOMY_LABELS;

        // register_taxonomy() permet de déclarer/modifier une taxo
        register_taxonomy(
            static::TAXONOMY_KEY, // clef/identifiant
            static::RELATED_CPT_LIST, // on associe la taxo à un ou plusieurs types de contenu
            [
                // même chose que pour les CPT
                'labels' => $labels,
                'public' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
                'capabilities' => static::CAPABILITIES
            ]
        );
    }

    /**
     * Add admin specific caps for the taxonomy
     */
    static public function addAdminCaps()
    {
        // récupérer le rôle administrateur
        $adminRole = get_role('administrator');
        // pour chaque cap prévue pour l'admin sur le CPT courant, on ajoute la cap
        foreach (static::CAPABILITIES as $cap => $customCap) {
            $adminRole->add_cap($customCap);
        }
    }

    /**
     * remove admin specific caps for the taxonomy
     */
    static public function removeAdminCaps()
    {
        // récupérer le rôle administrateur
        $adminRole = get_role('administrator');
        // pour chaque cap prévue pour l'admin sur le CPT courant, on retire la cap
        foreach (static::CAPABILITIES as $cap => $customCap) {
            $adminRole->remove_cap($customCap);
        }
    }
}
