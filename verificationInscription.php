<?php
	include "fonctionAux.php";
	
	entete();
	contenu();
	pied();
	
	function contenu() {		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$adresse= $_POST['adresse'];
		$ville = $_POST['ville'];
		$postal = $_POST['postal'];
		$tel = $_POST['tel'];
		$mail = $_POST['mailI'];
	
		$mdp1 = $_POST['mdp1'];
		$mdp2 = $_POST['mdp2'];

		// Connexion à la base de données
		try {
			$dsn = "mysql:host=localhost;dbname=projetweb";
			$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch(PDOException $e) {
			exit('Erreur lors de la connexion à la base de donnée');
		}
		
		// On ajoute des slashs devant tout les caractères spéciaux pour éviter les injections	
		$nom = htmlspecialchars($nom);
		$prenom = htmlspecialchars($prenom);
		$adresse = htmlspecialchars($adresse);
		$ville = htmlspecialchars($ville);
		$tel = htmlspecialchars($tel);
		$mail = htmlspecialchars($mail);
		
		// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur	
		$requete = "SELECT * FROM client WHERE mail='$mail'";
		$res = $connexion->query($requete);
		
		$lignes = $res->fetchAll();
		if (count($lignes) >= 1) {
			header( "Location: accueil.php?erreur=erreur1" );
			exit();
		}
		$res->closeCursor();
			
		$requete = "SELECT * FROM client";
		$res = $connexion->query($requete);
					
		$adresse = $adresse.", ".$ville." ".$postal;
		
		$connexion->exec("INSERT INTO client(Nom, Prenom, Adresse, Numero_telephone, Mail, Password) VALUES('$nom', '$prenom', '$adresse', '$tel', '$mail', '$mdp2')");
		
		// On affiche le compte qui a été crée
		echo "					<h1>Inscription réussie !</h1> <br><br>";
		echo "<script> window.setTimeout(\"location=('accueil.php');\", 3000);</script>\n";
	}
?>