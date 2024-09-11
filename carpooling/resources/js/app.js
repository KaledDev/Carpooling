import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('animated-button').addEventListener('click', function(e) {
e.preventDefault();
const pageTransition = document.getElementById('page-transition');

// Ajoute la classe active pour lancer l'animation
pageTransition.classList.add('active');

// Attends la fin de l'animation avant de rediriger
setTimeout(function() {
window.location.href = e.target.closest('a').href;
}, 600); // 600ms correspond à la durée de l'animation CSS
});
