<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liste étudiants</title>
	<link rel="stylesheet" href="assets/style_liste_etudiant.css">
	<link rel="shortcut icon" href="Image/logo.png"/>
	<script src="script/liste_etudiant.js"></script>
</head>
<body>
	<header>

	    <img id="logo" src="Image/logo.png" alt="Logo">

	    <div class="liens">
		    <div class="lien-container">
		        <a class="menu-liens"><img src="Image/contact.png"></a>
		        <div class="dropdown">
					<a href="#">Option 7</a>
		            <a href="#">Option 8</a>
		            <a href="#">Option 9</a>
		        </div>
		    </div>
		    <div class="lien-container">
		        <a class="menu-liens"><img src="Image/notif.png"></a>
		        <div class="dropdown">
		            <a href="#">Option 4</a>
		            <a href="#">Option 5</a>
		            <a href="#">Option 6</a>
		        </div>
		    </div>
		    <div class="lien-container">
		        <a class="menu-liens"><img src="Image/profil.png"></a>
		        <div class="dropdown">
					<a href="Profil.html">Mon profil</a>
		            <a href="Avis.php">Mes avis</a>
		            <a href="#">Wish List</a>
		            <a href="Connexion.html">Déconnexion</a>
		        </div>
		    </div>
		</div>
	    
	</header>

  	<div class="search-container">
	    <input type="text" id="nom" placeholder="Nom" class="search-input">
	    <input type="text" id="prenom" placeholder="Prénom" class="search-input">
	    <div class="selection-container">
	        <label for="classe" class="select-label">Sélectionnez une classe :</label>
	        <select id="classe" class="select-input">
	            <option value="classe1">Classe 1</option>
	            <option value="classe2">Classe 2</option>
	        </select>
	    </div>
	    <button onclick="rechercher()" class="search-button">Rechercher</button>
	</div>

	<?php
		require 'connexion_bdd/creation_connexion.php';

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$studentsPerPage = 3; // Nombre d'étudiants par page

		$sql = "SELECT pseudo, motDePasse FROM utilisateurs";
		$result = $dbh->query($sql);
		$totalStudents = $result->rowCount();
		$totalPages = ceil($totalStudents / $studentsPerPage);

		$offset = ($page - 1) * $studentsPerPage;

		$sql = "SELECT pseudo, motDePasse FROM utilisateurs LIMIT $offset, $studentsPerPage";
		$result = $dbh->query($sql);

		$index = 0;

		while ($colonne = $result->fetch(PDO::FETCH_ASSOC)) {
		    echo '<div class="container">';
		    echo '<div class="profile">';
		    echo '<img src="Image/profil.png" alt="Profile Picture">';
		    echo '<div class="info">';
		    echo '<h2>' . $colonne['motDePasse'] . ' ' . $colonne['pseudo'] . '</h2>';
		    echo '<p>Email : ...@viacesi.fr</p>';
		    echo '</div></div>';
		    echo '<div class="points-container" onclick="toggleDropdown(' . $index . ')">';
		    echo '<div class="point"></div>';
		    echo '<div class="point"></div>';
		    echo '<div class="point"></div>';
		    echo '</div>';
		    echo '<div class="dropdown-menu" id="dropdownMenu_' . $index . '">';
		    echo '<a href="#">Profil</a>';
		    echo '<a href="#">Modifier</a>';
		    echo '<a href="#">Supprimer</a>';
		    echo '</div></div>';

		    $index++;
		}
	?>

	<div id="pagination" class="pagination"></div>

	<footer id="footer">
		<nav>&copy;2024 | Tinkièt' | Tous droits réservés</nav>
	</footer>

</body>

<script type="text/javascript">
	// Fonction pour afficher les boutons de pagination
    function showPagination() {
        var totalPages = <?php echo $totalPages; ?>;
        var currentPage = <?php echo $page; ?>;
        var paginationContainer = document.getElementById('pagination');

        paginationContainer.innerHTML = '';

        for (var i = 1; i <= totalPages; i++) {
            var button = document.createElement('button');
            button.innerText = i;
            button.value = i;
            if (i === currentPage) {
                button.classList.add('active');
            }
            button.addEventListener('click', function () {
                showStudents(this.value);
            });
            paginationContainer.appendChild(button);
        }
    }
showPagination();
</script>

</html>