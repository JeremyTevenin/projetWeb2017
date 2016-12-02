<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
        <link rel="stylesheet" type='text/css' href="common.css">
		<script type="text/javascript" src="script.js"></script>
		<?php
			include('connect.php');
		?>
	</head>
	<body>
        <?php
            include('header.php');
        ?>
		<section id="inscription">
			<form method='post' action='inscription_confirm.php'>
				<fieldset>
					<legend>Inscription</legend>
					<label>Nom : </label>
					<input type='text' name='nom' required='required' id='nom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurNom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<label>Prenom : </label>
					<input type='text' name='prenom' required='required' id='prenom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurPrenom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Ville : </label>
					<input type='text' name='ville' required='required' id='ville' pattern='[-a-zA-Zéèàôöîïç\s]{2,25}'>
					<img class="erreurVille" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Date de naissance : </label>
					<input type='date' name='dateN' required='required' id='dateN'>
					<img class="erreurDN" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Email : </label>
					<input type='email' name='mail' required='required' id='mail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'>
					<img class="erreurEmail" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Mot de passe : </label>
					<input type='password' name='password' id ='password' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP1" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<label>Confirmer le mot de passe : </label>
					<input type='password' name='password2' id ='password2' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP2" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<input type='submit' name='submit' id='submit' value='Envoyer'>
				</fieldset>
			</form>
		</section>
	</body>
</html>
