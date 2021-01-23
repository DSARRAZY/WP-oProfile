console.log('coucou je suis le fichier qui va gérer le menu !');

// 1. On écoute l'event "click" sur le bouton "burger menu"
// 2. Au click sur le bouton, on retire la class "main-menu--hidden" de la nav (on affiche le menu)
// 3. On écoute l'event "click" sur le bouton "close-button"
// 4. Au click sur le bouton, on ajoute la class "main-menu-hidden" sur la nav

const menu = {
    mainMenuElement: document.querySelector('.main-menu'),
    init: function() {
        console.log('menu init');
        // on cible l'élément "bouton burger"
        const burgerButtonElement = document.querySelector('.top-bar__burger-button');
        // je pose l'event listener "click"
        burgerButtonElement.addEventListener('click', menu.handleClickBurgerButton);
        // on cible le bouton de fermeture du menu
        const closeMenuButton = document.querySelector('.close-button');
        // puis on pose un event lister "click"
        closeMenuButton.addEventListener('click', menu.handleClickCloseButton);
    },
    handleClickBurgerButton: function() {
        menu.mainMenuElement.classList.remove('main-menu--hidden');
    },
    handleClickCloseButton: function() {
        menu.mainMenuElement.classList.add('main-menu--hidden');
    }
}

// menu.init();
document.addEventListener('DOMContentLoaded', menu.init);