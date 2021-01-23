<?php

namespace oProfile\Classes;

use oProfile\Taxonomy\TechnologyTaxonomy;

class Database
{

    const TABLE_NAME = 'developer_technology_relationships';

    // https://developer.wordpress.org/reference/classes/wpdb/

    /**
     * Create developer_technology_relationships table
     *
     */
    static public function generateTechnologyDeveloperTable()
    {
        // on récupère le connecteur à la BDD de WordPress
        global $wpdb;

        // on récupère le charset actuel
        $charsetCollate = $wpdb->get_charset_collate();

        $tableName = self::TABLE_NAME;

        // on écrit notre requête SQL qui permet de créé la table
        // https://sql.sh/cours/create-table
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$tableName}` (
                `developer_id` BIGINT(20) UNSIGNED NOT NULL,
                `technology_id` BIGINT(20) UNSIGNED NOT NULL,
                `level` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
                PRIMARY KEY(`developer_id`, `technology_id`)
            ) {$charsetCollate};
        ";

        // exécution de la requête
        $wpdb->query($sql);
    }

    /**
     * Create a new relationship between a developer and a technology
     *
     * @param int $developerId
     * @param int $technologyId
     * @param int $level
     * @return void
     */
    static public function addTechnologieByDeveloper($developerId, $technologyId, $level)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;

        $sql = "
            INSERT INTO `{$tableName}`
            (`developer_id`, `technology_id`, `level`)
            VALUES
            (%d, %d, %d)
        ";

        // la chaine $sql contient des parties variables (%d)
        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $developerId,
                $technologyId,
                $level
            ]
        );

        $wpdb->query($preparedQuery);
    }

    /**
     * Delete a technology-developer relation
     *
     * @param int $developerId
     * @param int $technologyId
     */
    static public function deleteTechnologyForDeveloper($developerId, $technologyId)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;

        $sql = "
            DELETE FROM `{$tableName}`
            WHERE `developer_id`=%d
            AND `technology_id`=%d
        ";

        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $developerId,
                $technologyId,
            ]
        );

        $wpdb->query($preparedQuery);
    }

    /**
     * get technologies for a developer
     *
     * @param int $developerId
     */
    static public function getTechnologiesForDeveloper($developerId)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;;

        $sql = "
            SELECT * FROM `{$tableName}` WHERE `developer_id`={$developerId}
        ";

        $technoDevRelationshipList = $wpdb->get_results($sql);

        // var_dump($technoDevRelationshipList);

        // https://www.php.net/manual/fr/function.array-map.php
        // array_map() permet d'executer une fonction sur chaque élément d'un array
        // $element => objet "courant" de l'array
        $technologyList = array_map(function ($element) {
            $technologyTerm = get_term(
                $element->technology_id,
                TechnologyTaxonomy::TAXONOMY_KEY
            );
            // var_dump($technologyTerm);
            return [
                'technologyId' => $technologyTerm->term_id,
                'technologyName' => $technologyTerm->name,
                'technologyDesc' => $technologyTerm->description,
                'level' => $element->level
            ];
        },  $technoDevRelationshipList);

        // var_dump($technologyList);

        return $technologyList;
    }
}
