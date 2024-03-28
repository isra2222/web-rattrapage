function toggleDropdown(index) 
{
  var dropdownMenu = document.getElementById('dropdownMenu_' + index); 
  dropdownMenu.classList.toggle('active');
}

function rechercher() 
{
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var classe = document.getElementById('classe').value;
}

function adjustFooterPosition() {
    var body = document.body;
    var html = document.documentElement;

    var windowHeight = window.innerHeight;
    var bodyHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

    var footer = document.getElementById('footer');
    
    if (bodyHeight <= windowHeight) {
        footer.style.position = 'fixed';
        footer.style.left = '0';
        footer.style.bottom = '8px';
        footer.style.width = '100%';
    } else {
        footer.style.position = 'static';
    }
}

// Appeler la fonction lors du chargement de la page et lors du redimensionnement de la fenêtre
window.onload = adjustFooterPosition;
window.onresize = adjustFooterPosition;

// Fonction pour afficher les étudiants de la page donnée
function showStudents(page) {
    window.location.href = "quoicoubeh.php?page=" + page;
}