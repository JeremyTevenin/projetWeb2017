<?php
	//Fonction affichant le haut de la page lorsque l'on est connecte
	function connexion() 
	{ 
		session_start();
		
		if ( isset($_SESSION['mail']) ) {
			echo "Bienvenue ".$_SESSION['prenom'].$_SESSION['nom']." !<br/>\n";
		} else {
			echo "Bienvenue !<br/>\n";
		}

	}
	
	function deconnexion() 
	{ 
		if ( isset($_SESSION['mail']) ) {
			echo "<a href=\"deconnexion.php\">  Deconnexion  </a> \n";
		}
	}
?>
