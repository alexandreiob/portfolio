// Fonction pour envoyer la requête AJAX de basculement du mode sombre
function sendToggleDarkModeRequest(isDarkMode) {
    // Crée une instance XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Configure la requête
    xhr.open('POST', '/toggle-dark-mode/home', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Définit la fonction de rappel pour gérer la réponse de la requête
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Toggle dark mode request successful');
            } else {
                console.error('Toggle dark mode request failed');
            }
        }
    };

    // Construit les données de la requête
    const data = 'isDarkMode=' + (isDarkMode ? '1' : '0');

    // Envoie la requête
    xhr.send(data);
}

function toggleDarkMode() {
    // Bascule la classe 'dark-mode' sur le corps du document
    const isDarkMode = document.body.classList.toggle('dark-mode');
    const darkIcon = document.getElementById('dark-icon');
    const lightIcon = document.getElementById('light-icon');

    // Modifie la visibilité des icônes en fonction du mode sombre
    if (isDarkMode) {
        darkIcon.style.display = 'none';
        lightIcon.style.display = 'inline-block';
    } else {
        darkIcon.style.display = 'inline-block';
        lightIcon.style.display = 'none';
    }

    // Enregistre l'état du mode sombre dans un cookie
    const cookieValue = isDarkMode ? "1" : "0";
    document.cookie = "darkMode=" + encodeURIComponent(cookieValue);
    console.log("darkMode cookie value:", cookieValue);

    // Envoie la requête AJAX pour mettre à jour le mode sombre côté serveur
    sendToggleDarkModeRequest(isDarkMode);

    // Forcer le rafraîchissement de la page
    window.location.reload();
}

// Ajoute un écouteur d'événements au bouton de basculement
const toggleButton = document.getElementById('toggle-dark-mode');
toggleButton.addEventListener('click', toggleDarkMode);

// Applique initialement le mode sombre si c'est activé
const body = document.body;
const lightIcon = document.getElementById('light-icon');
const darkIcon = document.getElementById('dark-icon');
const container = document.getElementById('toggle-dark-mode-container');

// Vérifie l'état initial du mode sombre et applique les styles en conséquence
if (isDarkMode) {
    body.classList.add('dark-mode');
    darkIcon.style.display = 'none';
    lightIcon.style.display = 'inline-block';
    container.classList.remove('light-mode'); // Assure-toi que la classe 'light-mode' est supprimée
} else {
    body.classList.remove('dark-mode');
    lightIcon.style.display = 'none';
    container.classList.add('light-mode');
}

// Applique la taille de 90px aux icônes
const iconElements = document.querySelectorAll('#dark-icon img, #light-icon img');
iconElements.forEach(function (icon) {
    icon.style.width = '60px';
    icon.style.height = '60px';
});
