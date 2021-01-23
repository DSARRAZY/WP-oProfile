<?php

namespace oProfile;
// Ce fichier est le "chef d'orchestre" de notre plugin
// on va appeler nos classes et les utiliser
// dans un contexte WordPress, cela revient en gros à greffer des méthodes sur des hooks

// on appelle nos classes
use oProfile\PostType\ProjectPostType;
use oProfile\PostType\CustomerPostType;
use oProfile\Taxonomy\ActivitySectorTaxonomy;
use oProfile\Taxonomy\TechnologyTaxonomy;
use oProfile\Role\DeveloperRole;
use oProfile\PostType\SkillPostType;
use oProfile\Classes\Database;
use oProfile\Classes\Router;

define('UTILS_CLASS', 'oProfile\Classes\Utils');

class Plugin
{

    /**
     * Start the plugin
     *
     */
    public function run()
    {
        // cette méthode permet de "démarrer" le plugin = déclarer des actions (méthodes de classe) à executer via des hooks
        // pour utiliser les callables en POO, la syntaxe est la suivante : [contexte, nom_de_la_methode]
        // donc pour nous : [$this, 'nom_de_la_methode']
        add_action('init', [$this, 'registerPostTypes']);

        add_action('init', [$this, 'registerTaxonomies']);

        register_activation_hook(OPROFILE_PLUGIN_FILE, [$this, 'onPluginActivation']);

        register_deactivation_hook(OPROFILE_PLUGIN_FILE, [$this, 'onPluginDeactivation']);

        add_action('register_form', [$this, 'displayRegisterForm']);

        // on utilise plus la méthode ci-dessous, elle nous empêche d'utiliser ACF correctement
        // add_filter('pre_get_posts', [UTILS_CLASS, 'disableOthersPosts']);

        add_action('admin_enqueue_scripts', [UTILS_CLASS, 'hideOthersPostsCounters']);

        add_action('admin_menu', [UTILS_CLASS, 'hideMenuItemsForDevelopers']);

        add_action('wp_before_admin_bar_render', [UTILS_CLASS, 'hideAdminBarItemsForDevelopers']);

        add_action('admin_bar_menu', [UTILS_CLASS, 'showAdminBarItemsForDevelopers'], 100);

        add_action('init', ['oProfile\Classes\Router', 'init']);

        // lorsque l'utilisateur est créé après la soumission du formulaire d'inscription on appelle la méthode userRegistered
        add_action('user_register', [$this, 'userRegistered']);
    }

    /**
     * Register all CPT
     *
     */
    public function registerPostTypes()
    {
        // on appelle register(), la méthode statique de la class ProjectPostType qui permet de déclarer le CPT project
        ProjectPostType::register();
        // on appelle register(), la méthode statique de la class CustomerPostType qui permet de déclarer le CPT customer
        CustomerPostType::register();
        SkillPostType::register();
    }

    /**
     * Register all Taxonomies
     *
     */
    public function registerTaxonomies()
    {
        ActivitySectorTaxonomy::register();
        TechnologyTaxonomy::register();
        ActivitySectorTaxonomy::addAdminCaps();
        TechnologyTaxonomy::addAdminCaps();
    }

    /**
     * Add all Roles
     *
     */
    public function addRoles()
    {
        DeveloperRole::add();
        CustomerPostType::addAdminCaps();
        ProjectPostType::addAdminCaps();
        SkillPostType::addAdminCaps();
    }

    /**
     * Add all Roles
     *
     */
    public function removeRoles()
    {
        DeveloperRole::remove();
        CustomerPostType::removeAdminCaps();
        ProjectPostType::removeAdminCaps();
        SkillPostType::removeAdminCaps();
    }

    /**
     * On Plugin activation
     *
     */
    public function onPluginActivation()
    {
        Database::generateTechnologyDeveloperTable();
        Router::init();

        // on ajoute nos rôles
        $this->addRoles();
        // on déclare une première fois nos CPT
        $this->registerPostTypes();
        // on regénère les règles de réécriture
        // https://developer.wordpress.org/reference/functions/flush_rewrite_rules/

        $this->registerTaxonomies();

        flush_rewrite_rules();
    }

    /**
     * On Plugin deactivation
     *
     */
    public function onPluginDeactivation()
    {
        $this->removeRoles();
        flush_rewrite_rules();
    }

    /**
     * Add custom form fields on registration form
     *
     */
    public function displayRegisterForm()
    {
        // charger le HTML de notre template
        require OPROFILE_TEMPLATES_DIR . 'register-form.php';
    }

    /**
     * Save custom form data after user submission
     * => l'utilisateur est déjà enregistré en BDD, on y ajoute des données après coup
     * 
     * @param $userId 
     */
    public function userRegistered($userId)
    {
        // on peut enregistrer des données sur l'objet utilisateur lui-même avec wp_update_user()
        // on doit passer un array (ou un objet WP_User) qui contient les données à mettre à jour et l'ID pour déterminer l'utilisateur à affecter
        wp_update_user([
            'ID' => $userId,
            'first_name' => $_POST['user_firstname'],
            'last_name' => $_POST['user_lastname'],
            'description' => $_POST['user_bio'],
            'user_pass' => $_POST['user_password'],
            'user_url' => $_POST['user_url']
        ]);

        // ajouter la méta "github_url" pour cet utilisateur
        update_user_meta(
            $userId, // pour l'utilisateur $userId
            'github_url', // on définit une méta nommée "github_url"
            $_POST['user_github_url'] // on lui affecte la valeur récupérée du formulaire
        );
    }
}
