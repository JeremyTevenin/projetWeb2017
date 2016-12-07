<?php
	include_once('config.php');


class Categorie {
	
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
	public function getCategories() {
	
		$query = "SELECT * FROM categorie";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = array();
		$data = $request->fetchAll();
		
		return $data;
	}
	
	// Supprime la catégorie renseigné par l'id
	public function supprimerCategorie($id) {
		$query = "DELETE FROM categorie WHERE id_categ=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
}
?>