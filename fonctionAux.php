<?php		
	function entete() {
		session_start();

	echo '<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>AdopteUnHôtel.com</title>
		<link rel="icon" type="image/icone" href="images/logo/picto.PNG"/>
		<link rel="stylesheet" href="style.css"/>

		<script type="text/javascript" src="jquery.js"></script>	
		<script type="text/javascript" src="script.js"></script>		
	</head>		
	<body>						
		<header>
			<h1>Adopte un Hôtel</h1>
		</header>	
		
		<div id="fond"></div>';
		
	}

	function pied() {		
		echo "		<footer>\n";
		echo "			© 2016 Projet Web François KOPKA / Jérémy TEVENIN - Tous droits réservés\n";
		echo "		</footer>\n";
		echo "	</body>\n";
		echo "</html>";
	}
			
	function enteteAdmin() {
		session_start();

		echo '<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>AdopteUnHôtel.com</title>
		<link rel="icon" type="image/icone" href="images/logo/picto.PNG"/>
		<link rel="stylesheet" href="style.css"/>

		<script type="text/javascript" src="jquery.js"></script>	
		<script type="text/javascript" src="script.js"></script>		
	</head>		
	<body>';

		echo "\n";
	}

	function piedAdmin() {		
		echo "	</body>\n";
		echo "</html>";
	}
		
	function menu() {
		echo "<a href=\"ajouterHotel.php\"> Ajouter un hôtel </a><br />\n";
		echo "<a href=\"supprimerHotel.php\"> Supprimer un hôtel </a><br />\n";
		echo "<a href=\"ajouterChambre.php\"> Ajouter une chambre </a><br />\n";
		echo "<a href=\"supprimerChambre.php\"> Supprimer une chambre </a><br />\n";
		echo "<a href=\"accueilConnex.php\"> Revenir à l'accueil </a><br />\n";
	}
		
	// Fonction permmettant l'identification d'une personne via un formulaire de connexion
	function connexion() {
		echo "		<section id=\"connexion\">\n";
		echo "			<form action=\"verificationConnexion.php\" method=\"post\">\n";
		echo "				<h2>Connexion</h2>\n";		
		
		if ( isset($_GET['erreur']) ) { 
			if ($_GET['erreur'] == 'erreur2') {
				echo "				<span class=\"erreurRevel\"><img src=\"images/erreur.png\" alt=\"X\" width=\"15\" height=\"15\"/> Mail invalide ou mot de passe incorrect</span>";
			}
		}
		
		echo "				<label>Adresse mail :</label>\n";
		echo "				<input id=\"mail\" name=\"mail\">\n";
		echo "				<br /><br />\n";

		// On renseigne le mot de passe du compte
		echo "				<label>Mot de passe :</label>\n";
		echo "				<input id=\"mdp\" type=\"password\" name=\"mdp\">\n";		
		echo "				<br /><br /><br />\n";
		
		echo "				<input id=\"valider\" name=\"Valider\" type=\"submit\">\n";				
		echo "			</form>\n";
		echo " 		</section>\n";
	}	
	
	function deconnexion() {
		session_start();
		session_destroy(); // Détruit la session courante

		header("Location: index.php");
	}
?>