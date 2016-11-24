<?php
	include "fonctionAux.php";
	
	entete();
	contenu();
	pied();
	
	function contenu() {		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$dateN = $_POST['dateN'];
		$mail = $_POST['mail'];
	
		$mdp1 = $_POST['mdp1'];
		$mdp2 = $_POST['mdp2'];

		// Connexion à la base de données
		try {
			$dsn = "mysql:host=localhost;dbname=lepetitscientifique";
			$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch(PDOException $e) {
			exit('Erreur lors de la connexion à la base de données');
		}
		
		// On ajoute des slashs devant tout les caractères spéciaux pour éviter les injections	
		$nom = htmlspecialchars($nom);
		$prenom = htmlspecialchars($prenom);
		$ville = htmlspecialchars($ville);
		$dateN = htmlspecialchars($dateN);
		$mail = htmlspecialchars($mail);
		
		// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur	
		$requete = "SELECT * FROM auteur WHERE mail='$mail'";
		$res = $connexion->query($requete);
		
		$lignes = $res->fetchAll();
		if (count($lignes) >= 1) {
			header( "Location: accueil.php?erreur=erreur1" );
			exit();
		}
		$res->closeCursor();
			
		$requete = "SELECT * FROM auteur";
		$res = $connexion->query($requete);
							
		$connexion->exec("INSERT INTO auteur(nom, prenom, ville, dateN, mail, mdp) VALUES('$nom', '$prenom', '$ville', '$dateN', '$mail', '$mdp2')");
		
		// On affiche le compte qui a été crée
		echo "					<h1>Inscription réussie !</h1> <br><br>";
		echo "<script> window.setTimeout(\"location=('accueil.php');\", 3000);</script>\n";
	}
?>