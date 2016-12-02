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
			<fieldset>
				<legend>Inscription</legend>
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
					<label>Nom : </label>
					<input type='text' name='nom' required='required' id='nom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurNom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
		
					<!-- On renseigne le prénom du client -->
					<label>Prenom : </label>
					<input type='text' name='prenom' required='required' id='prenom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurPrenom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
		
					<!-- On renseigne l'adresse -->
					<label>Ville : </label>
					<input type='text' name='ville' required='required' id='ville' pattern='[-a-zA-Zéèàôöîïç\s]{2,25}'>
					<img class="erreurVille" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
		
					<!-- On renseigne la date de naissance -->
					<label>Date de naissance : </label>
					<input type='date' name='dateN' required='required' id='dateN'>
					<img class="erreurDN" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<!-- On renseigne le mail -->
					<label>Email : </label>
					<input type='email' name='mail' required='required' id='mail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'>
					<img class="erreurEmail" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<!-- On renseigne le mot de passe du client -->
					<label>Mot de passe : </label>
					<input type='password' name='password' id ='password' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP1" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<!-- On vérifira que le mot de passe est bien celui que le client veut mettre -->
					<label>Confirmer le mot de passe : </label>
					<input type='password' name='password2' id ='password2' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP2" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
		
					<input id="envoyer" name="Valider" type="submit">	
				</form>
				<!-- Fin du formulaire d'inscription -->
			</fieldset>
		</section>
		
		<div id="opaConnex"></div>
<?php		
		// Vérifie si une session est en cours, sinon le client est automatiquement redirigé vers la page d'accueil
		if ( !isset($_SESSION['mail']) ) {	 
			connexion();
		} else {
			header('Location: accueil.php');
		}
?>			
		<div id="opaAccueil"></div>
		<section id="bienvenueAccueil">
			<h2> Bienvenue sur notre site de réservation d'hôtel ! </h2>
			Sélectionnez la région de votre destination !<br />
			Les régions ne contiennnent pas forcément un hôtel, mais si 
			une ville est attaché à la région, c'est qu'il y a un ou plusieurs hôtels dans la région.<br />	
			Actuellement, vous pouvez réserver vos hôtels dans les régions suivantes :
			<ul>
				<li> Haute-Normandie
				<li> Corse
				<li> Bretagne
				<li> Provence-Alpes Côte d'Azur
				<li> Alsace
				<li> Midi-Pyrénées
			</ul>
			
		</section>
<?php		
	}
?>	
		