<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Liste étudiants</title>
	<link rel="stylesheet" href="assets/style_liste_etudiant.css">
	<link rel="shortcut icon" href="Image/logo.png"/>
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
					<a href="#">Mon profil</a>
		            <a href="#">Mes avis</a>
		            <a href="#">Wish List</a>
		            <a href="#">Déconnexion</a>
		        </div>
		    </div>
		</div>
	    
	</header>

	<?php
		require 'connexion_bdd/creation_connexion.php';

	    $sql = "SELECT pseudo,motDePasse FROM utilisateurs";
	    $resultat = $dbh->query($sql);

	    while ($colonne = $resultat->fetch(PDO::FETCH_ASSOC)) {
	        echo '<div class="container">';
	        echo '<div class="profile">';	
	        echo '<img src="Image/profil.png" alt="Profile Picture">';
	        echo '<div class="info">';
	        echo '<h2>' . $colonne['motDePasse'] . ' ' . $colonne['pseudo'] . '</h2>';
	        echo '<p>Email : ...@viacesi.fr</p>';
	        echo '</div></div></div>';
	    }
	?>

	<footer>
		<nav>&copy;2024 | Tinkièt' | Tous droits réservés</nav>
	</footer>
</body>
</html>