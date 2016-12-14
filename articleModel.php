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
	
	public function ajouterArticle($idSousCateg, $idArticle, $idAuteur, $date, $nomArticle) {
		// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
		$nomArticle = str_replace("'", "\'", $nomArticle);
		$nomArticle = htmlspecialchars($nomArticle);

		$query = "INSERT INTO article (id_souscateg, id_article, id_auteur, date, nom_article, texte_page, repertoire, url) 
					VALUES ('".$idSousCateg."', '".$idArticle."', '".$idAuteur."', '".$date."', '".$nomArticle."', '', '', '')";
		
		$request = $this->_db->prepare($query);		
		$request->execute();			
	}
	
	// Supprime la catégorie renseigné par l'id
	/*public function supprimerSousCategorie($id) {
		$query = "DELETE FROM souscategorie WHERE id_souscateg=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}*/
}
?>