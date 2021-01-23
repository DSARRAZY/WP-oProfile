<?php

namespace oProfile;

/**
 * Plugin Name: oProfile
 * Plugin URI: https://oclock.io
 * Description: Fonctionnalités pour la plateforme oProfile
 * Version: 0.1
 * Author: WordPress MM
 */

// on utilise l'autoload PSR-4 de composer
require __DIR__ . '/vendor/autoload.php';

// on peut définir des constantes utiles dans les autres fichiers de notre plugin

// OPROFILE_PLGIN_FILE => chemin vers le fichier oprofile.php (celui dans lequel on est actuellement)
define( 'OPROFILE_PLUGIN_FILE', __FILE__ );
define ( 'OPROFILE_TEMPLATES_DIR', __DIR__ . '/templates/');

// on démarre le plugin
$oprofile = new Plugin();
$oprofile->run();
