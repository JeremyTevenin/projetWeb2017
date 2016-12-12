<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
		<script type="text/javascript" src="script.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="styleAcc.css">
		<title>Le petit Scientifique</title>
	</head>
	<body>
		<div id="fond">
        <?php
            include('header.php');
			
			if (!isset($_SESSION['mail'])) {
        ?>
		
		<section id="accueil">
			<section id="connexion">
				<form method='post' action='login_confirm.php'>
					<fieldset>
						<legend>Connexion</legend>
						<!--<p id='valid'></p>-->
						<label>Email : </label>
						<input type='email' name='mailC' autocomplete='off' required='required' id='mailC' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'>
						<br /><br />	
							
						<label>Mot de passe : </label>
						<input type='password' name='passwordC' id ='passwordC' autocomplete='off' required='required' pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>
						<br /><br />		
								
						<label></label>		
						<input type='submit' name='submitC' id='submitC' value='Valider'>
					</fieldset>
				</form>
			</section>
			
			<section id="redirection">
				<fieldset>
					<h3><a href="lepetitscientifique.php">Accéder directement aux articles !</a></h3>
				</fieldset>
			</section>
			
			<section id="inscription">
				<form method='post' action='inscription_confirm.php'>
					<fieldset>
						<legend>Inscription</legend>
						<label>Nom : </label>
						<input type='text' name='nom' required='required' id='nom' autocomplete='off' pattern='([-A-z0-9À-ž\s]){1,15}'>
						<img src="" class="erreurNom" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />

						<label>Prenom : </label>
						<input type='text' name='prenom' required='required' id='prenom' autocomplete='off' pattern='([-A-zÀ-ž\s]){1,15}'>
						<img src="" class="erreurPrenom" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />
						
						<label>Ville : </label>
						<input type='text' name='ville' required='required' id='ville' autocomplete='off' pattern='([-A-zÀ-ž\s]){1,20}'>
						<img src="" class="erreurVille" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />
						
						<label>Email : </label>
						<input type='email' name='mail' required='required' id='mail' autocomplete='off' pattern='[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$'>
						<img src="" class="erreurEmail" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />
						
						<label>Mot de passe : </label>
						<input type='password' name='password' id ='password' required='required' pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>
						<img src="" class="erreurMDP1" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />

						<label>Confirmer le mot de passe : </label>
						<input type='password' name='password2' id ='password2' required='required' pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>
						<img src="" class="erreurMDP2" style="display:none" alt="" />
						<span class="erreur"></span>
						<br /><br />
						
						<label></label>
						<input type='submit' name='submit' id='submit' value='Envoyer'>
						<br />
					</fieldset>
				</form>
			</section>
		</section>
<?php
			} else {
				header('Location: lepetitscientifique.php');
			}
?>
		</div>
	</body>
</html>
