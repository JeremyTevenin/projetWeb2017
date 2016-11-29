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
		
		/*//Condition permettant de se rediriger en cas de mauvaise session
		if ( !isset($_SESSION['pseudo']) ) 
		{
			header( 'Location: inscription.php' );
			exit();
		}*/
	}
	
	function deconnexion() 
	{ 
		if ( isset($_SESSION['mail']) ) {
			echo "<a href=\"deconnexion.php\">  Deconnexion  </a> \n";
		}
	}
?>
