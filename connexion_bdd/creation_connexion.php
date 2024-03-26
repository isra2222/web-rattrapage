<?php
	require 'connexion_bdd/identifiant.php';

	try {
	    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	} catch (PDOException $e) {
	    echo "Erreur de connexion : " . $e->getMessage();
}
?>