<?php
include_once('config.php');

// Permet de gérer la base de données de tous les auteurs
class Auteur {
	private $_db;
	
	// On se connecte à la base AUTEUR
	public function __construct() 	{		
		try {
			$this->_db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBAUTEUR, USER, PASSWD);
		} catch (PDOException $e) {
			print 'Error!: ' . $e_>getMessage() . '<br/>';
			die();
		}
	}
	
	// Retourne un tableau des auteurs
	public function getAuteurs() {
		$query = "SELECT * FROM auteur";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = $request->fetchAll();
		
		return $data;
	}
  
	// Ajoute une catégorie renseignée par un nom
/*	public function ajouterCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace("'", "\'", $nom);
		$nom = htmlspecialchars($nom);

		$query = "INSERT INTO categorie (id_categ, nom_categ) VALUES('".$id."', '".$nom."')";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}*/
	
	public function inscription($nom, $prenom, $ville, $mail, $password, $password2) {
		$nom = htmlspecialchars($nom);
		$prenom = htmlspecialchars($prenom);
		$ville = htmlspecialchars($ville);
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);
		$password2 = htmlspecialchars($password2);
		
		// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur	
		$query = "SELECT * FROM auteur WHERE mail='$mail'";
		$request = $this->_db->prepare($query);
		$request->execute();
		
		$lignes = $request->fetchAll();
		if (count($lignes) >= 1) {
			header( "Location: index.php" );
			exit();
		}
		$request->closeCursor();
		
		if ($password == $password2) {
			$options = ['cost' => 10];
			$password = password_hash("$password", PASSWORD_BCRYPT, $options);
				
			$query = 'INSERT INTO auteur (nom, prenom, ville, mail, password, admin) VALUES ("'.$nom.'", "'.$prenom.'", "'.$ville.'", "'.$mail.'", "'.$password.'", 0)';
			$request = $this->_db->prepare($query);
			$request->execute();
			session_regenerate_id();
			
			$request1 = $this->_db->prepare("SELECT * FROM auteur WHERE mail='$mail'");
			$request1->execute();
			$name1 = $request1->fetch();
			
			$_SESSION['id'] = $name1['id'];
			$_SESSION['nom'] = $nom;
			$_SESSION['prenom'] = $prenom;
			$_SESSION['mail'] = $mail;
			$_SESSION['admin'] = 0;
		
			header('Location: lepetitscientifique.php');
		} else {
			header('Location: index.php');
		}
	}
		
	public function connexion($mail, $password) {
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);
		
		$request = $this->_db->prepare("SELECT COUNT(*) AS exist FROM auteur WHERE mail='$mail'");
		$request->execute();
		$name = $request->fetch();
		if ($name['exist'] != 0) {
			$request1 = $this->_db->prepare("SELECT * FROM auteur WHERE mail='$mail'");
			$request1->execute();
			$name1 = $request1->fetch();
						
			if (password_verify($password, $name1['password'])) {
				session_regenerate_id();
				$nom = $name1['nom'];
				$prenom = $name1['prenom'];
				$admin = $name1['admin'];
				
				$_SESSION['id'] = $name1['id'];
				$_SESSION['mail'] = $mail;
				$_SESSION['nom'] = $nom;
				$_SESSION['prenom'] = $prenom;
				$_SESSION['admin'] = $admin;
				header ("Location: lepetitscientifique.php");
			} 
		} else {
			header ("Refresh: 5;URL=index.php");
		}
	}	
		
	// Modifie le mot de passe d'un auteur
	public function modifierAuteur($id, $password) {
		$password = htmlspecialchars($password);

		$options = ['cost' => 10];
		$password = password_hash("$password", PASSWORD_BCRYPT, $options);
		
		$query = "UPDATE auteur SET password='".$password."' WHERE id='".$id."'";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
	
	// Supprime la catégorie renseignée par l'id
	public function supprimerAuteur($id) {
		$query = "DELETE FROM auteur WHERE id=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}	
}
?>
