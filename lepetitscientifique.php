<?php
include('connect.php');

include('categorieModel.php');
include('sousCategorieModel.php');
include('articleModel.php');

include('auteurModel.php');

include('vueMenu.php');
include('vueGestionCateg.php');
include('vueGestionSousCateg.php');
include('vueGestionArticle.php');
include('vueGestionAuteur.php');

include('vueLepetitScientifique.php');

entete();

$categorie = new Categorie;
$souscategorie = new SousCategorie;
$article = new Article;

$auteur = new Auteur;

$data1 = $categorie->getCategories();
$data2 = $souscategorie->getSousCategories();
$data3 = $article->getArticles();

$dataAuteur = $auteur->getAuteurs();

menu($data1, $data2, $data3);

contenu();

if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {				
	if (isset($_GET['ajouterCateg'])) {
		tabAjouteCateg($data1);
	}
	
	if (isset($_GET['modifierCateg'])) {
		tabModifierCateg($data1);
	}
	
	if (isset($_GET['supprimerCateg'])) {
		tabSupprimeCateg($data1, $data2);
	}
	
	if (isset($_GET['ajouterSousCateg'])) {
		tabAjouteSousCateg($data2, $data1);
	}
	
	if (isset($_GET['modifierSousCateg'])) {
		tabModifierSousCateg($data2);
	}
	
	if (isset($_GET['supprimerSousCateg'])) {
		tabSupprimeSousCateg($data2, $data3);
	}
					
	if (isset($_GET['supprimerAuteur'])) {
		tabSupprimeAuteur($dataAuteur);
	}
	
	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_nom_categ'])) {
		$categorie->ajouterCategorie($_GET['insert_id_categ'], $_GET['insert_nom_categ']);
	}

	if (isset($_GET['update_id_categ']) && isset($_GET['update_nom_categ'])) {
		$categorie->modifierCategorie($_GET['update_id_categ'], $_GET['update_nom_categ']);
	}

	if (isset($_GET['delete_id_categ'])) {
		$categorie->supprimerCategorie($_GET['delete_id_categ']);
	}

	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_id_souscateg']) && isset($_GET['insert_nom_souscateg'])) {
		$souscategorie->ajouterSousCategorie($_GET['insert_id_categ'], $_GET['insert_id_souscateg'], $_GET['insert_nom_souscateg']);
	}

	if (isset($_GET['update_id_souscateg']) && isset($_GET['update_nom_souscateg'])) {
		$souscategorie->modifierSousCategorie($_GET['update_id_souscateg'], $_GET['update_nom_souscateg']);
	}

	if (isset($_GET['delete_id_souscateg'])) {
		$souscategorie->supprimerSousCategorie($_GET['delete_id_souscateg']);
	}
	
	if (isset($_GET['delete_auteur'])) {
		$auteur->supprimerAuteur($_GET['delete_auteur']);
	}
} else if (isset($_SESSION['mail'])) {
	if (isset($_GET['modifierAuteur'])) {
		tabModifierAuteur();
	}

	if (isset($_GET['update_auteur'])) {
		$auteur->modifierAuteur($_GET['update_auteur'], $_GET['update_password_auteur']);
	}
	
	if (isset($_GET['ajouterArticle'])) {
		ajouterArticle($data1, $data2, $data3);
	}
	
	if (isset($_GET['insert_id_souscateg']) && isset($_GET['insert_id_article']) && isset($_GET['insert_nom_article'])) {
		$date = date("Y-m-d"); 
		$id = $_SESSION['id'];
	
		$article->ajouterArticle($_GET['insert_id_souscateg'], $_GET['insert_id_article'], $id, $date, $_GET['insert_nom_article']);
	}
	
	if (isset($_GET['supprimerArticle'])) {
		tabSupprimerArticle();
	}

}

pied();
?>		

