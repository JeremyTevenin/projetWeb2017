<?php
	include "fonctionAux.php";
		
	entete();
	contenu();
	pied();
	
	function contenu() {
		if (isset($_SESSION['mail'])) {
			header('Location: accueilConnex.php');
		}
?>		
		<div id="opaInscri"></div>
		<section id="inscription">
			<h2>Inscription</h2>

<?php		
		// Renvoie un message d'erreur si l'adresse mail est déjà utilisée
		if (isset($_GET['erreur'])) {
			if ($_GET['erreur'] == 'erreur1') {
				echo "			<span class=\"erreurRevel\"><img src=\"images/erreur.png\" alt=\"X\" width=\"15\" height=\"15\"/> Cette adresse mail est déjà enregistrée !</span>\n";	
			}
		}
?>
			<!-- Formulaire d'ajout d'un compte client -->
			<form action="verificationInscription.php" method="post">	
				<!-- On renseigne le nom du client -->
				<label>Nom :</label>
				<input id="nom" type="text" name="nom" placeholder="Frev" required=required>
				<span class="erreur"></span>
				<br /><br />
	
				<!-- On renseigne le prénom du client -->
				<label>Prénom :</label>
				<input id="prenom" type="text" name="prenom" placeholder="Michel" required=required>
				<span class="erreur"></span>
				<br /><br />
	
				<!-- On renseigne la ville -->
				<label>Ville :</label>
				<input id="ville" type="text" name="ville" placeholder="Rouen" required=required>
				<span class="erreur"></span>
				<br /><br />
				
				<!-- On renseigne la date de naissance -->
				<label>Date de naissance :</label>
				<input id="dateNaissance" type="date" name="dateN" required=required>
				<span class="erreur"></span>
				<br /><br />
	
				<!-- On renseigne le mail -->
				<label>Adresse mail :</label>
				<input id="mailI" type="email" name="mail" placeholder="michel_frev@hotmail.fr">
				<span class="erreur"></span>
				<br /><br />

				<!-- On renseigne le mot de passe du client -->
				<label>Mot de passe :</label>
				<input id="mdp1" type="password" name="mdp1" required=required>
				<span class="erreur"></span>
				<br /><br />
	
				<!-- On vérifira que le mot de passe est bien celui que le client veut mettre -->
				<label>Confirmer mot de passe :</label>
				<input id="mdp2" type="password" name="mdp2" required=required>
				<span class="erreur"></span>
				<br /><br />
	
				<input id="envoyer" name="Valider" type="submit">	
			</form>
			<!-- Fin du formulaire d'inscription -->
		</section>
		
		<div id="opaConnex"></div>
<?php		
		// Vérifie si une session est en cours, sinon le client est automatiquement redirigé vers la page d'accueil
		if (!isset($_SESSION['mail'])) {	 
			connexion();
		} else {
			header('Location: accueil.php');
		}
?>			
		<div id="opaAccueil"></div>
		<section id="bienvenueAccueil">
			<h2> Bienvenue sur notre blog scientifique ! </h2>
			<h3> Bienvenue sur notre blog scientifique 2 ! </h3>
			Cliquez ici s vous voulez directement accéder aux articles.<br />
		</section>
<?php		
	}
?>	
		