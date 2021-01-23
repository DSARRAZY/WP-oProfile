// dans ce fichier js "point d'entrée"

// on peut aller chercher des dépendances de node_modules
import 'reset-css';

// parfois, il faut spécifier un chemin pour aller chercher le bon fichier à l'intérieur du module
import '@fortawesome/fontawesome-free/css/all.min.css';

// on importe notre style custom (SCSS)
import '../scss/main.scss';

// on peut aussi importer du js
import './menu.js';
import './carousel.js';
import './skill.js';

// on peut aussi écrire du js
console.log('je suis dans index.js');