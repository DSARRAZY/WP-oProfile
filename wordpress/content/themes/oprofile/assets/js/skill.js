const skillsModule = {
    init() {

        const allButtons = document.querySelectorAll('.skills__item__toggle-btn button');
        console.log(allButtons);
        for (const button of allButtons) {
            button.addEventListener('click', skillsModule.handleButtonClick)
        }
    },
    handleButtonClick(event) {
        const articleElement = event.target.closest('article');
        const paragraph = articleElement.querySelector('.skills__item__text');
        paragraph.classList.toggle('visible');
         if (event.target.innerText == "Cacher") {
            event.target.innerText = "Lire plus";
        } else {
            event.target.innerText = "Cacher";
        }
    }
}

document.addEventListener('DOMContentLoaded', skillsModule.init)