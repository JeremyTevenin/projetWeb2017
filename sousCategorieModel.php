<?php
	include_once('config.php');


class SousCategorie {
	
	private $_db;
	private $nom_categ;
	
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
	
	// Retourne la ligne de la sous-catégorie
	public function getSousCategorie($id) {
		$query = "SELECT * FROM souscategorie WHERE id_categ=$id";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = $request->fetchAll();
		
		return $data;
	}
	
	// Supprime la catégorie renseigné par l'id
	public function supprimerSousCategorie($id) {
		$query = "DELETE FROM souscategorie WHERE id_souscateg=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}

  
	// Ajoute une sous-catégorie renseigné par un nom et un id_categ
	public function ajouterSousCategorie($id_categ, $id_souscateg, $nom) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nom = str_replace("'", "\'", $nom);

		$query = "INSERT INTO souscategorie (id_categ, id_souscateg, nom_souscateg) VALUES('".$id_categ."', '".$id_souscateg."', '".$nom."')";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
		
	// Modifie le nom d'une catégorie en fonction de l'id	
/*	public function modifierCategorie($id, $nom) {
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
	}	*/
}
?>