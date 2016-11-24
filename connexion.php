<?php
	include "fonctionAux.php";

	entete();
	contenu();
	pied();
	
	function contenu() {	
		// Vérifie si une session est en cours, sinon le client est automatiquement redirigé vers la page de connexion
		if (!isset($_SESSION['mail'])) {	 
			connexion();
		} else {
			header('Location: accueilConnex.php');
		}
	}
?>