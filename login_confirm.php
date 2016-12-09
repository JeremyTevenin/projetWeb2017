<?php
	include('connect.php');
	include('config.php');
	
	try {
		$dbauteur = new PDO('mysql:host='.HOSTNAME.';dbname='.DBAUTEUR, USER, PASSWD);
	} catch (PDOException $e) {
		print 'Error!: ' . $e_>getMessage() . '<br/>';
		die();
	}

	if (isset($_POST['mailC']) && isset($_POST['passwordC'])) {
		$mail = $_POST['mailC'];
		$password = $_POST['passwordC'];
		
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);
		
		$request = $dbauteur->prepare("SELECT COUNT(*) AS exist FROM auteur WHERE mail='$mail'");
		$request->execute();
		$name = $request->fetch();
		if ($name['exist'] != 0) {
			$request1 = $dbauteur->prepare("SELECT * FROM auteur WHERE mail='$mail'");
			$request1->execute();
			$name1 = $request1->fetch();
			if ($password == $name1['password']) {
				session_regenerate_id();
				$nom = $name1['nom'];
				$prenom = $name1['prenom'];
				$admin = $name1['admin'];
				
				$_SESSION['mail'] = $mail;
				$_SESSION['nom'] = $nom;
				$_SESSION['prenom'] = $prenom;
				$_SESSION['admin'] = $admin;
				header ("Location: lepetitscientifique.php");
			} else {
				echo 'Vous n\'avez pas rentré les bons identifiants, vous allez etre redirige dans 5 secondes';
				header ("Refresh: 5;URL=index.php");
			}
		}
	}
	header ("Refresh: 5;URL=index.php");
?>
