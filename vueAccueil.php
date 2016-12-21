<?php
function entete() {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Le petit Scientifique</title>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />   
		
		<link href="styleAccueil.css" rel="stylesheet">
		
		<!--Scripts-->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="test.js" type="text/javascript"></script>
		<script src="script.js" type="text/javascript"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
	</head>
	<body>
		<div id="fond">
			<section id="accueil">
			
<?php
}

function pied() {
?>
			</section>
		</div>
	</body>
</html>
<?php
}

function connexion() {
?>
					<div class="card card-container">
						<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
						<form class="form-signin" method='post' action='accueil.php'>
							<input type='email' class="form-control" name='mailC' autocomplete='off' placeholder="Email address" required autofocus id='mailC' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'>	
							<input type='password' class="form-control" name='passwordC' id ='passwordC' placeholder="Password" autocomplete='off' required pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>	
							<button class="btn btn-lg btn-primary btn-block btn-signin" type='submit' name='submitC' id='submitC' value='Valider'>Se connecter</button>
						</form>
						<a href="accueil?inscription" class="btn btn-lg btn-primary btn-block btn-signin">S'inscrire</a>
						<a href="lepetitscientifique.php" class="btn btn-lg btn-primary btn-block btn-signin">Mode invité</a>
					</div>
<?php
}

function inscription() {
?>
				<div class="card card-container">
					<form class="form-signin" method='post' action='accueil.php'>
						<label>Nom : </label>
						<input type='text' class="form-control" name='nom' required='required' id='nom' autocomplete='off' pattern='([-A-z0-9À-ž\s]){1,15}'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurNom" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>

						<label>Prenom : </label>
						<input type='text' class="form-control" name='prenom' required='required' id='prenom' autocomplete='off' pattern='([-A-zÀ-ž\s]){1,15}'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurPrenom" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>
						
						<label>Ville : </label>
						<input type='text' class="form-control" name='ville' required='required' id='ville' autocomplete='off' pattern='([-A-zÀ-ž\s]){1,20}'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurVille" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>
						
						<label>Email : </label>
						<input type='email' class="form-control" name='mail' required='required' id='mail' autocomplete='off' pattern='[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurEmail" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>

						<label>Mot de passe : </label>
						<input type='password' class="form-control" name='password' id ='password' required='required' pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurMDP1" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>

						<label>Confirmer le mot de passe : </label>
						<input type='password' class="form-control" name='password2' id ='password2' required='required' pattern='(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'>
						<img width="25px" height="25px" src="images/cross.png" class="erreurMDP2" style="display:none" alt="" />
						<span class="erreur"></span>
						</br></br>
						
						<button class="btn btn-lg btn-primary btn-block btn-signin" type='submit' name='submit' id='submit' value='Envoyer'>S'inscrire</button>
					</form>
				</div>
<?php
}
?>
