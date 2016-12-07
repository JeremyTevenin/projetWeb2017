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
	
	// Retourne un tableau des catégories (id + nom)
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
				
		$data = array();
		$data = $request->fetchAll();
		
		return $data;
	}
	
	// Supprime la catégorie renseigné par l'id
	public function supprimerSousCategorie($id) {
		$query = "DELETE FROM souscategorie WHERE id_souscateg=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
}
?>