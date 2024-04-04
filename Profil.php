<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon profil</title>
	<link rel="stylesheet" href="assets/style_profil.css">
	<link rel="shortcut icon" href="Image/logo.png"/>
	<script defer src="script/profil.js"></script>
</head>
<body>
	<header>

	    <?php include 'header.php'; ?>
	    
	</header>

	<div class="conteneur">
	    <div class="profil">
	    	<div class="overlay" id="overlay"></div>
			<img src="Image/pascontent.png" alt="Image" class="zoomed-image" id="zoomedImage">
			<img src="Image/pascontent.png" alt="Image" class="profil-pic" id="profilPic">
	        <div class="info">
	            <label class="h2">
	            	<?php
						session_start();
						if(isset($_SESSION['nom_utilisateur'])) {
						    $prenom = $_SESSION['nom_utilisateur'];
						    echo $prenom;
						}
					?>
	            </label>
	            <label class="h2">Prénom</label>
	            <p>Adresse mail</p>
	            <p>Adresse</p>
	            <p>Date de naissance</p>
	        </div>
	    </div>
    
    	<div class="conteneur">
	        <div class="profil-info">
	            <div class="info">
	                <h2>Skills</h2>
	                <label>Insérer les compétences</label>
	            </div>
	         </div>
	         <div class="profil-info">
	            <div class="stage-statut">
	                <h2>Statut du stage</h2>
	                <p>Actuellement en recherche de stage</p>
	            </div>
	        </div>
    	</div>
    </div>

	<?php include 'footer.php'; ?>
</body>
</html>