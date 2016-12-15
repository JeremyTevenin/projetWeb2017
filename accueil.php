<?php
	include('connect.php');
	include('vueAccueil.php');
	include('auteurModel.php');
		
	entete();
	
	if (!isset($_SESSION['mail'])) {
		$auteur = new Auteur;
		
		//inscription();
		connexion();
			
		if (isset($_POST['mailC']) && isset($_POST['passwordC'])) {
			$mail = $_POST['mailC'];
			$password = $_POST['passwordC'];
						
			$auteur->connexion($mail, $password);
		}		
		
		if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ville']) 
			&& isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])) {
			
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$ville = $_POST['ville'];
			$mail = $_POST['mail'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			
			$auteur->inscription($nom, $prenom, $ville, $mail, $password, $password2);
		}
	} else {
		header('Location: lepetitscientifique.php');
	}
	
	pied();
?>
			
