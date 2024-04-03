<?php

require 'connexion_bdd/creation_connexion.php';

$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

$requete = $dbh->prepare("SELECT motDePasse FROM utilisateurs WHERE pseudo = :nom_utilisateur");

if (!$requete->execute(array(':nom_utilisateur' => $nom_utilisateur))) {
    echo "Erreur lors de l'exécution de la requête SQL : " . $requete->errorInfo()[2];
    exit;
}

$resultat = $requete->fetch(PDO::FETCH_ASSOC);
if (!$resultat) {
    echo "Aucun utilisateur trouvé avec ce pseudo.";
    exit;
}
$motDePasseHache = $resultat['motDePasse'];

if (password_verify($mot_de_passe, $motDePasseHache)) {
    header("Location: Accueil.html");
    exit;
} else {
    header("Location: Connexion.html");
    exit;
}

?>
