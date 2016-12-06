<?php
	include('connect.php');

	if (isset($_POST[ 'nom' ]) && isset($_POST[ 'prenom' ]) && isset($_POST[ 'ville' ]) && isset($_POST[ 'dateN' ]) &&
	isset($_POST[ 'mail' ]) && isset($_POST[ 'password' ]) && isset($_POST[ 'password2' ])) {
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$dateN = $_POST['dateN'];
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
	
		$nom = htmlspecialchars($nom);
		$prenom = htmlspecialchars($prenom);
		$ville = htmlspecialchars($ville);
		$dateN = htmlspecialchars($dateN);
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);
		$password2 = htmlspecialchars($password2);
		
		// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur	
		$query = "SELECT * FROM auteur WHERE mail='$mail'";
		$request = $dbauteur->query($query);
		
		$lignes = $request->fetchAll();
		if (count($lignes) >= 1) {
			header( "Location: index.php" );
			exit();
		}
		$request->closeCursor();
		
		if ($password == $password2) {
			$query = 'INSERT INTO auteur (nom, prenom, ville, dateN, mail, password) VALUES ("' . $nom . '", "' . $prenom . '", "'. $ville . '", "'. $dateN . '", "' . $mail . '", "' . $password . '")';
			$request = $dbauteur->prepare($query);
			$request->execute();
			session_regenerate_id();
			$_SESSION['mail'] = $mail;
			$query = 'SELECT id FROM auteur where mail="' . $mail . '"';
			$req = $dbauteur->prepare($query);
			$req->execute();
			$id = $req->fetch();
		}
	}
	header('Location: lepetitscientifique.php');
?>
