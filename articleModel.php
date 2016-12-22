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
	
	// Retourne la ligne de l'article
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

		// On crée un nom de répertoire valide
		// - preg_replace recherche et remplace l'expression 
		// - str_replace remplace les espaces par '_'
		// - strtolower retourne tout les caractère en minuscule
		$repertoire = preg_replace('/[^a-z0-9-_]/', '', 
					str_replace(array(" ", "'"), "_", 
					strtolower(iconv('utf-8', 'us-ascii//TRANSLIT', iconv('utf-8', 'utf-8//IGNORE', $nomArticle)))));
		
		$url = "$repertoire.php";
				
		$query = "INSERT INTO article (id_souscateg, id_article, id_auteur, date, nom_article, texte_page, repertoire, url) 
					VALUES ('".$idSousCateg."', '".$idArticle."', '".$idAuteur."', '".$date."', '".$nomArticle."', '', '".$repertoire."', '".$url."')";
		
		$request = $this->_db->prepare($query);		
		$request->execute();

		// Crée un dossier avec pour nom le même que celui de l'url, on vérifie avant que le dossier n'existe pas									
		if (!is_dir($repertoire)) {
			mkdir("articles/".$repertoire, 777, true);
		}
	}
	
	// Supprime l'article renseigné par l'id
	public function supprimerArticle($id) {
		$query = "DELETE FROM article WHERE id_article=$id";
		$request = $this->_db->prepare($query);		
		$request->execute();						
	}
}
?>