<?php
	include('connect.php');

	if (isset($_POST['mail']) && isset($_POST['password'])) {
		
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);
		
		$request = $db->prepare("SELECT COUNT(*) AS exist FROM auteur WHERE mail='$mail'");
		$request->execute();
		$name = $request->fetch();
		if ($name['exist'] != 0) {
			$request1 = $db->prepare("SELECT * FROM auteur WHERE mail='$mail'");
			$request1->execute();
			$name1 = $request1->fetch();
			if ($password == $name1['password']) {
				session_regenerate_id();
				$nom = $name1['nom'];
				$prenom = $name1['prenom'];
				
				$_SESSION['mail'] = $mail;
				$_SESSION['nom'] = $nom;
				$_SESSION['prenom'] = $prenom;
				header ("Location: accueil.php");
			} else {
				echo 'Vous n\'avez pas rentré les bons identifiants, vous allez etre redirige dans 5 secondes';
				header ("Refresh: 5;URL=index.php");
			}
		}
	}
	header ("Refresh: 5;URL=index.php");
?>
