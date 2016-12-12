<?php
include_once('config.php');

// Permet de gérer la base de données de toutes les catégories
class Categorie {
	private $_db;
	
	// On se connecte à la base MENU
	public function __construct() 	{		
		try {
			$this->_db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBMENU, USER, PASSWD);
		} catch (PDOException $e) {
			print 'Error!: ' . $e_>getMessage() . '<br/>';
			die();
		}
	}
	
	// Retourne un tableau des catégories (id + nom)
	public function getCategories() {
		$query = "SELECT * FROM categorie";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = $request->fetchAll();
		
		return $data;
	}
  
	// Ajoute une catégorie renseignée par un nom
	public function ajouterCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace("'", "\'", $nom);
		$nom = htmlspecialchars($nom);

		$query = "INSERT INTO categorie (id_categ, nom_categ) VALUES('".$id."', '".$nom."')";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
		
	// Modifie le nom d'une catégorie
	public function modifierCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace( "'", "\'", $nom);
		$nom = htmlspecialchars($nom);

		$query = "UPDATE categorie SET nom_categ='".$nom."' WHERE id_categ='".$id."'";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
	
	// Supprime la catégorie renseignée par l'id
	public function supprimerCategorie($id) {
		$query = "DELETE FROM categorie WHERE id_categ=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}	
}
?>
