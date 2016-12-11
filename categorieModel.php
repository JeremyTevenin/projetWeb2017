<?php
include_once('config.php');

class Categorie {
	
	private $_db;
	
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
  
	// Ajoute une catégorie renseigné par un nom
	public function ajouterCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace("'", "\'", $nom);

		$query = "INSERT INTO categorie (id_categ, nom_categ) VALUES('".$id."', '".$nom."')";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
		
	// Modifie le nom d'une catégorie en fonction de l'id	
	public function modifierCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace( "'", "\'", $nom);

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
