


function controlInput() {


    const form = document.querySelector('.form');
    let url = document.querySelector(".url");
    let error = document.querySelector(".error");

    url.addEventListener("input", function (event) {
        // Chaque fois que l'utilisateur tente d'envoyer les données
        // on vérifie que le champ text est valide.
        if (url.validity.valid) {

            console.log("ok");
            error.innerHTML = ""; // On réinitialise le contenu
            error.className = "error"; // On réinitialise l'état visuel du message 
        }
    }, false);



    form.addEventListener("submit", function (event) {
        // Chaque fois que l'utilisateur tente d'envoyer les données
        // on vérifie que le champ text est valide.
        if (!url.validity.valid) {
            console.log('invalid');
            // S'il est invalide, on affiche un message d'erreur personnalisé
            error.innerHTML = "J'attends une location valide, mon cher !";
            error.className = "error active";
            // Et on empêche l'envoi des données du formulaire
            event.preventDefault();
        }
    }, false);
}

controlInput();












