<?php
include_once('config.php');

// Permet de gérer la base de données de toutes les sous-catégories
class SousCategorie {
	
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
	
	// Retourne un tableau des sous-catégories (id + nom)
	public function getSousCategories() {
		$query = "SELECT * FROM souscategorie";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		return $request->fetchAll();
	}
	
	// Retourne la ligne de la sous-catégorie de l'id renseigné
	public function getSousCategorie($id) {
		$query = "SELECT * FROM souscategorie WHERE id_categ=$id";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = $request->fetchAll();
		
		return $data;
	}
	
	// Supprime la sous-catégorie renseignée par l'id
	public function supprimerSousCategorie($id) {
		$query = "DELETE FROM souscategorie WHERE id_souscateg=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}

	// Ajoute une sous-catégorie renseigné par un nom et un id_categ
	public function ajouterSousCategorie($id_categ, $id_souscateg, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace("'", "\'", $nom);
		$nom = htmlspecialchars($nom);
		
		$query = "INSERT INTO souscategorie (id_categ, id_souscateg, nom_souscateg) VALUES('".$id_categ."', '".$id_souscateg."', '".$nom."')";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}

	// Modifie le nom d'une sous-catégorie en fonction de l'id	
	public function modifierSousCategorie($id, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace( "'", "\'", $nom);
		$nom = htmlspecialchars($nom);

		$query = "UPDATE souscategorie SET nom_souscateg='".$nom."' WHERE id_souscateg='".$id."'";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
	
}
?>