<?php
	//Fonction affichant le haut de la page lorsque l'on est connecte
	function connexion() 
	{ 
		session_start();
		
		if ( isset($_SESSION['pseudo']) ) {
			echo "Bienvenue ".$_SESSION['pseudo'].", bonne chance !<br/>\n";
		} else {
			echo "Bienvenue, bonne chance !<br/>\n";
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
		if ( isset($_SESSION['pseudo']) ) {
			echo "<a href=\"deconnexion.php\">  Deconnexion  </a> \n";
		}
	}
?>
