<?php

namespace oProfile\Role;

class DeveloperRole
{

    const ROLE_KEY = 'developer';
    const ROLE_NAME = 'Développeur/Développeuse';

    /**
     * Add the custom Developer role
     *
     */
    static public function add()
    {
        // add_role() permet de déclarer un nouveau rôle
        add_role(
            self::ROLE_KEY, // clef du rôle
            self::ROLE_NAME, // nom d'affichage du rôle
            [
                'read' => true,
                'edit_posts' => true, // cette capability concerne l'ensemble des posts (tous les types), à true si on souhaite utiliser Gutenberg
                'upload_files' => true,
                'edit_others_posts' => true, // pour rendre utilisable les champs ACF

                'edit_projects' => true,
                'publish_projects' => true,
                'read_project' => true,
                'delete_project' => true,
                'edit_others_projects' => false,
                'delete_others_projects' => false,
                'edit_project' => true,

                'edit_customers' => true,
                'publish_customers' => true,
                'read_customer' => true,
                'delete_customer' => true,
                'edit_others_customers' => false,
                'delete_others_customers' => false,
                'edit_customer' => true,

                'manage_technologies' => false,
                'edit_technologies' => true,
                'delete_technologies' => false,
                'assign_technologies' => true,

                'manage_sectors' => false,
                'edit_sectors' => false,
                'delete_sectors' => false,
                'assign_sectors' => true,

                'edit_skill' => true,
                'edit_skills' => true,
                'publish_skills' => true,
                'read_skill' => true,
                'delete_skill' => true,
                'edit_others_skills' => false,
                'delete_others_skills' => false,
                'edit_skill' => true,
            ]
        );
    }

    /**
     * Remove the custom Developer role
     *
     */
    static public function remove()
    {
        remove_role(self::ROLE_KEY);
    }

}