<?php
	include "fonctionAux.php";
		
	entete();
	contenu();
	pied();
	
	function contenu() {
		if (isset($_SESSION['mail'])) {
			$mail = $_SESSION['mail'];
?>		
		<div id="opaBienv"></div>
		<section id="bienvenueAccueil">
			<h2> Bienvenue sur notre blog scientifique ! </h2>
			Cliquez ici si vous voulez directement accéder aux articles.<br />
		
			Vous pouvez aussi vous
			<a href="deconnexion.php"> déconnecter </a>		
			<br /><br /> 
<?php		
			if ($mail == "admin") {
				menu();
			} else {
				echo "<a href=\"client.php\"> Voir ses réservations </a>\n"; 
			}
?>			
			
		</section>
<?php	
		} else {
			header('Location: accueil.php');
		}
	}
?>	
		