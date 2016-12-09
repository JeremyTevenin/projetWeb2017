<?php
include_once('config.php');

class Article {
	
	private $_db;
	
	public function __construct() 	{		
		try {
			$this->_db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBMENU, USER, PASSWD);
		} catch (PDOException $e) {
			print 'Error!: ' . $e_>getMessage() . '<br/>';
			die();
		}
	}
	
	// Retourne un tableau des articles
	public function getArticles() {
		$query = "SELECT * FROM article";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		return $request->fetchAll();
	}
	
	// Retourne la ligne de la sous-catégorie
	public function getArticle($id) {
		$query = "SELECT * FROM article WHERE id_souscateg=$id";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
		$data = $request->fetchAll();
		
		return $data;
	}
	
	// Supprime la catégorie renseigné par l'id
	/*public function supprimerSousCategorie($id) {
		$query = "DELETE FROM souscategorie WHERE id_souscateg=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}*/
}
?>