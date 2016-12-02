<?php
	include "fonctionAux.php";

	// Connexion à la base de données
	try {
		$dsn = "mysql:host=localhost;dbname=projetweb";
		$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch(PDOException $e) {
		exit( 'Erreur lors de la connexion à la base de données');
	}
	
	$mail = $_POST['mail'];
	$mdp = $_POST['mdp'];
	
	$nom_utilisateur = htmlspecialchars($nom_utilisateur);
	$mdp = htmlspecialchars($mdp);	
	
	if (!verifCompte($mail, $mdp)) {
		header( "Location: accueil.php?erreur=erreur2" );
		exit();
	} else {								
		// Crée une nouvelle session si la session n'existait pas ou bien rejoint une session existante si une session est en cours
		session_start();
	
		// Alloue un nouveau tableau donc detruit l'accès à l'ancien s'il en existait un
		$_SESSION = array();

		// Recrée un nouvel identifiant de session
		session_regenerate_id();
		
		$_SESSION['mail'] = $mail;
		$_SESSION['mdp'] = $mdp;
		
		$requete = "SELECT * FROM client WHERE Mail='$mail' and Password='$mdp'";
		$res = $connexion->query($requete);

		while ($droit = $res->fetch()) {
			$admin = $droit['admin'];
		}
		$res->closeCursor(); // fin du traitement de la requête
		
		$_SESSION['admin'] = $admin;
		$_SESSION['id_session'] = session_id();
		header( "Location: accueilConnex.php");
	}	
	
	// Fonction qui vérifie si le nom d'utilisateur et le mot de passe correspondent à un tuple de la base de données
	function verifCompte($mail, $mdp) {
		// Connexion à la base de données
		try {
			$dsn = "mysql:host=localhost;dbname=projetweb";
			$connexion = new PDO($dsn, "root", "");
		} catch(PDOException $e) {
			exit( 'Erreur lors de la connexion à la base de donnée');
		}
		
		// Sélection de la table select count * as exist
		$requete = "SELECT * FROM client WHERE Mail='$mail' and Password='$mdp'";
		$res = $connexion->query($requete);
								
		$lignes = $res->fetchAll();
		if (count($lignes) == 1) {
			return true;
		} else {
			return false;
		}
	}
?>
