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
  
  // Retourne un tableau des catégories + des sous-catégoies(id + nom)
	public function getSousCategories() {
		$query = "SELECT * FROM categorie";	
		$request = $this->_db->prepare($query);
		$request->execute();
				
    $data = $request->fetchAll();
    foreach($data as $tupleCateg) {
      $query = "select * FROM souscategorie WHERE id_categ=".$tupleCateg['id_categ'];
      $request = $this->_db->prepare($query);
      $request->execute();

  
      $data = $request->fetchAll();
      foreach($lignes as $tupleSousCateg) {
        echo "						".$tupleCateg['id_categ']."\n";
        echo "						".$tupleCateg['nom_categ']."\n";
      
        echo "						(".$tupleSousCateg['id_souscateg'].") ".$tupleSousCateg['nom_souscateg']."\n";		
      }
    }
			
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
