<?php

namespace oProfile\PostType;

class PostType
{

    /**
     * Register the custom post type
     *
     */
    static public function register()
    {
        // array qui contient nos labels (UI du back office) pour notre CPT
        // static:: permet de récupérer une valeur statique (méthode statique ou constante) depuis une classe qui hérite de la classe courante
        $labels = static::POST_TYPE_LABELS;

        // register_post_type() permet de déclarer un nouveau CPT
        // ici, on souhaite ajouter un custom post type "Projets"
        register_post_type(
            static::POST_TYPE_KEY, // clef/identifiant du CPT
            [
                'labels' => $labels, // les labels (UI)
                'public' => true, // impact plusieurs options (RTFM) - permet de rendre le CPT accessible dans le back-office et sur les templates
                'hierarchical' => true, // CTP hiérarchique ou non
                'show_in_rest' => true, // permet de profiter de l'éditeur "Gutenberg"
                'menu_icon' => 'dashicons-open-folder', // icône à afficher dans le menu du BO
                'supports' => [ // champs / options actives pour le CPT
                    'title', // titre
                    'editor', // éditeur
                    'thumbnail', // images mises en avant
                    'page-attributes', // attributs de pages
                    'custom-fields' // active les champs personalisés
                ],
                'capabilities' => static::CAPABILITIES
            ]
        );
    }

    /**
     * Add admin caps for the CPT
     
     */
    static public function addAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on l'ajoute pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->add_cap($cptCap);
        }
    }

    /**
     * Remove admin caps for the CPT
     *
     */
    static public function removeAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on la supprime pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->remove_cap($cptCap);
        }
    }



}
