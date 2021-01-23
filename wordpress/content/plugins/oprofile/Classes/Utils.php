<?php

namespace oProfile\Classes;

class Utils
{

    static public function disableOthersPosts($wp_query)
    {
        // wp_get_current_user() renvoie un objet correspondant au user connecté / 0 si non connecté
        $user = wp_get_current_user();
        // var_dump($user);
        // si on est sur le Back-office et que l'utilisateur a le rôle développeur
        if (is_admin() && in_array('developer', $user->roles)) {
            // on modifie la requête pour aller chercher uniquement les posts du user courant
            $wp_query->set('author', $user->ID);
        }
    }

    static public function hideOthersPostsCounters()
    {
        $user = wp_get_current_user();
        if (in_array('developer', $user->roles)) {
            wp_enqueue_style('hide_others_posts_counters', plugin_dir_url(OPROFILE_PLUGIN_FILE) . '/assets/css/hide_others_posts_counter.css');
        }
    }

    static public function hideMenuItemsForDevelopers()
    {
        $user = wp_get_current_user();
        if (in_array('developer', $user->roles)) {
            remove_menu_page('edit.php');
            remove_menu_page('edit-comments.php');
            remove_menu_page('tools.php');
        }
    }

    static public function hideAdminBarItemsForDevelopers()
    {
        $user = wp_get_current_user();
        if (in_array('developer', $user->roles)) {
            global $wp_admin_bar;
            $wp_admin_bar->remove_node('new-post');
            $wp_admin_bar->remove_node('comments');
        }
    }

    static public function showAdminBarItemsForDevelopers($wp_admin_bar)
    {
        $user = wp_get_current_user();
        if (in_array('developer', $user->roles)) {
            $args = array(
                'id' => 'developer-dashboard',
                'title' => 'Dashboard Développeur',
                'href' => home_url('developer/dashboard')
            );
            $wp_admin_bar->add_node($args);

            $args = array(
                'id' => 'developer-dashboard-technos',
                'title' => 'Mes technos',
                'href' => home_url('developer/dashboard/update-technologies')
            );
            $wp_admin_bar->add_node($args);
        }
    }
}
